@extends('shared._layoutSession')

@section('content')

    <h2>Login</h2>

    <form method="POST" action="/login">

        {{ csrf_field() }}
        <div class="form-group">

            <label for="email">Email: </label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <div class="alert alert-danger">{{$errors->first('email')}}</div>
            @endif

        </div>

        <div class="form-group">

            <label for="password">Password: </label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">

            @if ($errors->has('password'))
                <div class="alert alert-danger">{{$errors->first('password')}}</div>
            @endif

        </div>

        <div class="form-group">

            <button style="cursor:pointer" type="submit" class="btn btn-primary">Login</button>

        </div>

    </form>

@endsection
