@extends('shared._layoutSession')
@section('content')
{{--products--}}
@if(isset($products))
<div class="row">
		@forelse($products as $product)
				<div class="small-3 columns">
					<div class="item-wrapper">
						<div class="img-wrapper">

								<a href="#">
									<img src="{{url('images',$product->image)}}" />
								</a>

						</div>

						<h5 class="subheader">
								<p>{{$product->description}}</p>
								<h6>{{$product->name}}</h6>
								<span class="price-tag">{{$product->price}}€</span>
							</h5>
							<a class=" btn btn-danger" href="{{ route('product.addToCart',['id'=>$product->id])}}">Adicionar ao carrinho</a>
					</div>
				</div>

		@empty
		<h3>Vazio</h3>
	 @endforelse
</div>
@endif

</div>

@endsection
