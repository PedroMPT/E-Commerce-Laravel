@extends('admin.layout.admin')

@section('content')

<h3>Produtos</h3>
@if(Session::has('success'))
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">

			<div class="alert alert-success" style="text-align: center;">
				{{ Session::get('success')}}
			</div>
		</div>
	</div>
@endif

<br>
  <table class="table">
  <thead>
    <tr>
      <th scope="col" class="text-center">Nome</th>
      <th scope="col" class="text-center">Marca</th>
      <th scope="col" class="text-center">Preço</th>
      <th scope="col" class="text-center">Mostrar</th>
      <th scope="col" class="text-center">Editar</th>
      <th scope="col" class="text-center">Eliminar</th>

    </tr>
  </thead>
  <tbody>
    @forelse( $products as $product)
      <tr>
        <td> {{ $product->name }} </td>
        <td> {{ $product->description }} </td>
        <td> {{ $product->price }} </td>
        <td>
          <a class="btn btn-info" href="{{ route('product.show',$product->id) }}">Mostrar</a>
        </td>

        <td>
          <a class="btn btn-warning" href="{{ route('product.edit',$product->id) }}">Editar</a>
        </td>

        <td>
          <form action="{{ route('product.destroy',$product->id) }}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Eliminar</button>
          </form>
        </td>
      </tr>

      @empty
      <tr>
        <td>Vazio</td>
      </tr>

  </tbody>

    @endforelse

  </table>

@endsection
