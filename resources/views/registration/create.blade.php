@extends('shared._layoutSession')

@section('content')

    <h2>Registo</h2>

    <form method="POST" action="/register">

        {{ csrf_field() }}

        <div class="form-group">

            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            @if ($errors->has('name'))
          	<span class="error-message">
          		<strong>{{ $errors->first('name') }}</strong>
          	</span>
          	@endif

        </div>

        <div class="form-group">

            <label for="exampleInputEmail1">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
            <span class="error-message">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif

        </div>

        <div class="form-group">

            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
            @if ($errors->has('password'))
            <span class="error-message">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif

        </div>

        <div class="form-group">

            <label for="password_confirmation">Confirmar Password: </label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
            @if ($errors->has('password_confirmation'))
            <span class="error-message">
              <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
        </div>


        <div class="form-group">

            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submeter</button>

        </div>

    </form>

@endsection
