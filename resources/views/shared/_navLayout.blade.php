<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      <a href="/home" class="navbar-brand"><i class="fas fa-dumbbell"></i> Forte & Grosso</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-nav-demo">
      <ul class="nav navbar-nav navbar-right">
        @if(auth()->check())

          <li class="nav-item font-weight-bold"> <a href="#" class="nav-link"> Olá, {{ auth()->user()->name }}</a></li>
          <li class="nav-item"> <a href="/logout" class="nav-link"> Logout </a></li>
          <li class="nav-item">
            <a href="{{route('cart.shoppingCart')}}"><span class="badge text-right"> {{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span><i class="fas fa-shopping-cart"></i> Carrinho de Compras </a>

          </li>

          @if(auth()->user()->role == 'admin')
            <li class="nav-item"><a href="/admin">Gestão de Produtos</a></li>
          @endif

        @else
          <li class="nav-item"><a href="/register">Sign Up</a></li>
          <li class="nav-item"><a href="/login">Login</a></li>
        @endif



      </ul>
    </div>
  </div>
</nav>
