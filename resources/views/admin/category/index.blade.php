@extends('admin.layout.admin')

@section('content')

  <div class="navbar">
    <ul class="nav navbar-nav">
            @if(!empty($categories))
            @forelse($categories as $category)
                <li class="active">
                    <a href="{{route('category.show',$category->id)}}">{{$category->name}}</a>
                    {{-- delete button --}}
                                        <form action="{{route('category.destroy',$category->id)}}"  method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                         </form>
                </li>
            @empty
                <li>No Items</li>
            @endforelse
                @endif

        </ul>
    </ul>
        <a class="btn btn-primary pull-right navbar-right" data-toggle="modal" href="#category">Adicionar Categoria</a>
        <div class="modal fade" id="category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Adicionar Nova</h4>
                    </div>
                    <form enctype="multipart/form-data" method="POST" action="/category">
                      {{ csrf_field() }}
                      <div class="modal-body">
                          <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" class="form-control" id="name" name="name">
                          </div>


                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                          <button type="submit" class="btn btn-primary">Guardar Alterações</button>
                      </div>
                  </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        </div>

        {{--products--}}
     @if(isset($products))


     <table class="table table-hover">
     	<thead>
     		<tr>
     			<th>Produtos</th>
     		</tr>
     	</thead>
     	<tbody>
 @forelse($products as $product)
     <tr><td>{{$product->name}}</td></tr>
     	@empty
         <tr><td>no data</td></tr>
         @endforelse

         </tbody>
     </table>
     @endif

  </div>

@endsection
