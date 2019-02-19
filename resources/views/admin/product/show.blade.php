@extends('admin.layout.admin')

@section('content')

  <div class="row">
    <div class="pull-right">
      <a class="btn btn-info" href="{{ route('product.index')}}">Voltar</a>
    </div>
  </div>

  <div class="row">
    <div class="small-3 columns">
    	<div class="item-wrapper">
    		<div class="img-wrapper">
    					<img src="{{url('images',$products->image)}}" />
    		</div>
    		<h5 class="subheader">
    				<p>{{$products->description}}</p>
    				<h6>{{$products->name}}</h6>
    				<span class="price-tag">{{$products->price}}€</span>
    			</h5>
        </div>
      </div>
    </div>

@endsection
