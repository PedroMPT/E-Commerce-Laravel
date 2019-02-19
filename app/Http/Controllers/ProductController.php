<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Cart;
use App\Order;
use Session;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (auth()->user()->role != 'admin') {
          return abort(404);
      }
        $products=Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $formInput=$request->except('image');
        $image=$request->file('image');

        if($image){

            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image'] = $imageName;
        }

        Product::create($formInput);

        return redirect()->to('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        $ctx = ['products' => $products];
        return view('admin.product.show',$ctx);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $products = Product::findOrFail($id);
        $ctx = ['products' => $products];
        $cat = ['categories'=> $categories];
        return view('admin.product.edit',$ctx,$cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {

      $products=Product::findOrFail($id);
      $formInput=$request->except('image');
      $image=$request->file('image');

      if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }

      $products->update($formInput);
      return redirect()->route('product.index')->with('success','Produto alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('product.index')->with('success','Produto eliminado com sucesso');
    }

    public function getAddToCart(Request $request, $id){

      $product = Product::find($id);
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->add($product,$product->id);

      $request->session()->put('cart',$cart);
      return redirect()->back();

    }

    public function getCart(){

      if (!Session::has('cart')) {
        return view('cart.shopping-cart',['products' => null]);
      }

      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      return view('cart.shopping-cart ',['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getReduceByOne($id){

      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);

      $cart->reduceByOne($id);

      if (count($cart->items) > 0) {
        Session::put('cart',$cart);
      }else{

        Session::forget('cart');
      }

      return redirect()->route('cart.shoppingCart');

    }

    public function getRemovedItem($id){

      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->removeItem($id);

      if (count($cart->items) > 0) {
        Session::put('cart',$cart);
      }else{

        Session::forget('cart');
      }


      return redirect()->route('cart.shoppingCart');
    }

    public function getCheckout(){

      if (!Session::has('cart')) {
        return view('cart.shopping-cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $total = $cart->totalPrice;
      return view('cart.checkout',['total' => $total]);
    }

    public function postCheckout(Request $request){

        if (!Session::has('cart')) {
          return redirect()->route('cart.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order();
        $order->cart=serialize($cart);
        $order->address = $request->input('address');
        $order->name = $request->input('name');
        $order->payment = $request->input('payment');

        auth()->user()->orders()->save($order);

        Mail::to($order->user)->send(new OrderShipped($order));

        Session::forget('cart');
        session()->flash('success','Produtos adquiridos com sucesso');
        return redirect()->to('/home');
  }
}
