@extends('admin.layout.admin')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Produto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product.index') }}"> Voltar</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ops!</strong> Verifique os input's.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form enctype="multipart/form-data" action="{{ route('product.update', $products->id) }}" method="post">
      @csrf
      {{ method_field('put') }}
        <div class="form-group">

          <label for="name">Nome do Produto:</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $products->name }}">

        </div>

        <div class="form-group">
          <label for="description">Descrição:</label>
          <input type="text" class="form-control" id="description" name="description" value="{{ $products->description }}">

        <div class="form-group" >

          <label for="price" class="text-left">Preço:</label>
          <input type="text" class="form-control" id="price" name="price" value="{{ $products->price }}">

        </div>

        <div class="form-group">
          <label for="image">Imagem</label>
          <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <div class="form-group">

          <label for="category_id" name="categories">Categoria:</label>
          <select class="form-control" name="category_id" id="category_id" value="{{ $products->category_id }}">
          @foreach($categories as $category)
            <option >{{$category->id}}</option>
          @endforeach
          </select>

        </div>

              <button style="cursor:pointer" type="submit" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
</div>

@endsection
