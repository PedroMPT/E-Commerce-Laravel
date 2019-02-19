@extends('shared._cartLayout')

@section('content')

  @if(Session::has('cart'))

    <div class="row">

      <div class="col-sm-6 col-md-6 col-md-offset-3 col-sd-offset-3">
        <ul class="list-group">

          @foreach($products as $product)

            <li class="list-group-item">

              <span class="badge">{{$product['qty']}}</span>
              <strong>{{ $product['item']['name'] }}</strong>
              <span class="label label-sucess">{{ $product['price'] }} €</span>

              <div class="btn-group">

                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" name="button">

                  Alterar <span class="caret"></span>

                </button>

                <ul class="dropdown-menu">

                  <li>
                    <a href="{{ route('cart.reduceByOne',['id' => $product['item']['id']]) }}">Remover 1</a>
                    <a href="{{ route('cart.removeItem',['id' => $product['item']['id']]) }}">Remover total</a>
                  </li>

                </ul>

              </div>

            </li>

          @endforeach

        </ul>
      </div>

    </div>

    <div class="row">

      <div class="col-sm-6 col-md-6 col-md-offset-3 col-sd-offset-3">

        <strong>Total: {{ $totalPrice }} €</strong>
      </div>

    </div>
    <hr>
    <div class="row">

      <div class="col-sm-6 col-md-6 col-md-offset-3 col-sd-offset-3">

        <a href="{{ route('checkout') }}" class="btn btn-success" name="button">Checkout</a>
      </div>
    </div>


  @else

  <div class="row">

    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sd-offset-3">

      <h2>O seu carrinho está vazio :( </h2>

    </div>

</div>


  @endif

@endsection
