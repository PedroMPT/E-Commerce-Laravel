<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
Use App\Category;
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        $products=Product::all();
        return view('home.index',compact('products','categories'));
    }
}
