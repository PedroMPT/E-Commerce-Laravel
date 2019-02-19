@extends('admin.layout.admin')

@section('content')

    <h3>Adicionar Produto</h3>
    <br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <strong>OOPS! </strong>Campos Obrigatórios.<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <form enctype="multipart/form-data" method="POST" action="/product">
            {{ csrf_field() }}
              <div class="form-group">

                <label for="name">Nome do Produto:</label>
                <input type="text" class="form-control" id="name" name="name" >

              </div>

              <div class="form-group">
                <label for="description">Marca:</label>
                <input type="text" class="form-control" id="description" name="description" >

              <div class="form-group" >

                <label for="price" class="text-left">Preço:</label>
                <input type="text" class="form-control" id="price" name="price" >

              </div>

              <div class="form-group">
                <label for="image">Imagem</label>
                <input type="file" class="form-control-file" id="image" name="image">
              </div>

              <div class="form-group">

                <label for="category_id" name="categories">Categoria:</label>
                <select class="form-control" name="category_id" id="category_id" placeholder="Selecione a Categoria">
                @foreach($categories as $category)
                  <option >{{$category->id}}</option>
                @endforeach
                </select>

              </div>

                    <button style="cursor:pointer" type="submit" class="btn btn-primary">Submeter</button>
            </form>
        </div>
    </div>

@endsection
