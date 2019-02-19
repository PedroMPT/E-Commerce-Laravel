@extends('Shared._layout')

@section('content')

@if(Session::has('success'))
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">

			<div class="alert alert-success" style="text-align: center;">
				{{ Session::get('success')}}
			</div>
		</div>
	</div>
@endif

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

@endsection
