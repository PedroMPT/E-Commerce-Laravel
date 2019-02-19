@extends('shared._cartLayout')

@section('content')


    <div class="row">

      <div class="col-sm-6 col-md-4 col-md-offset-4 col-sd-offset-3">

        <h1>Checkout</h1>
        <h4>O seu total é: {{ $total }}</h4>
        <form enctype="multipart/form-data" action="{{ route('checkout') }}" method="post" >
            {{ csrf_field() }}

          <div class="col-xs-12">
            <div class="form-group">
              <label for="name">Nome: </label>
              <input type="text" id="name" class="form-control" name="name" required>
            </div>
          </div>

          <div class="col-xs-12">
            <div class="form-group">
              <label for="address">Morada: </label>
              <input type="text" id="address" class="form-control" name="address" required>
            </div>
          </div>

          <div class="col-xs-12">
            <div class="form-group">
              <label for="address">Pagamento: </label>
              <select class="form-control form-control-lg" name="payment">
                <option>Multibanco</option>
                <option>À Cobrança</option>
              </select>
            </div>
          </div>
          <button style="cursor:pointer" type="submit" class="btn btn-primary">Submeter</button>
        </form>

      </div>
    </div>


@endsection
