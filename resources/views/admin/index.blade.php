@extends('admin.layout.admin')
@section('content')
    <h3>Bem-Vindo,  {{ auth()->user()->name }}</h3>
@endsection
