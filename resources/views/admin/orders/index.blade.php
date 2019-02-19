@extends('admin.layout.admin')

@section('content')

  <div class="row">

    <div class="col-md-8 col-md-offset-2">

      <h1>Encomendas</h1>
      @foreach($orders in $order)

      <div class="panel panel-default">

        <div class="panel-body">
          <ul class="list-group">
            @foreach($order->cart->items as $item)
              <li class="list-group-item">
                  <span class="badge">{{ $item['price'] }} €</span>
                   {{ $item['item']['qty'] }} Unidades
              </li>
            @endforeach
          </ul>
        </div>
        <div class="panel-footer">
          <strong>Total: €{{ $order->cart->totalPrice }}</strong>
        </div>
      </div>
      @endforeach
    </div>

  </div>


@endsection
