<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=,, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body style="display: flex;
min-height: 100vh;
flex-direction: column;">

  
  <header>
    <nav class="pink"> <!-- inicio menu -->
        <div class="nav-wrapper">
          <a href="{{route('site.index')}}" class="hide-on-small-only" class="brand-logo">Estudando Laravel</a>
           <ul id="nav-mobile" class="left">
            <li><a href="{{route('site.index')}}" >Home</a></li>
            <li class="hide-on-small-only"><a href="#" class='dropdown-trigger' data-target='dropdown1'>Categoria<i class="material-icons right">expand_more</i></a></li>
            <li  class="show-on-small hide-on-med-and-up"><a href="#" class='dropdown-trigger' data-target='dropdown1'>Cat...<i class="material-icons right">expand_more</i></a></li>
            <ul id='dropdown1' class='dropdown-content'>
              @foreach ($categoriasMenu as $categoriaM)
               <li><a href="{{route('site.categoria', $categoriaM->id)}}">{{$categoriaM->nome}}</a></li>
              @endforeach
            </ul>
            <li class="hide-on-small-only"><a href="{{route('site.carrinho')}}">Carrinho<span class="new badge pink" data-badge-caption="">{{$itens = \Cart::getContent()->count()}}</span></a></li>
         </ul>
         @auth
         <ul id="nav-mobile" class="right">
          <span><li><a href="#" class='dropdown-trigger' data-target='dropdown2'>Olá {{auth()->user()->firstName}}<i class="tiny material-icons right">expand_more</i></a></li></span>
         </ul>
         @else
         <ul id="nav-mobile" class="right">
          <span><li><a href="{{route('login.form')}}">Entrar<i class="material-icons right">elocked</i></a></li></span>
         </ul>
         @endauth
         <ul id='dropdown2' class='dropdown-content'>
            <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li><a href="{{route('login.logout')}}">Sair</a></li>         
        </ul>
        
        </div>
      </nav><!-- fim menu -->
  </header>
  <main style="flex: 1 0 auto;">
    @yield('conteudo')
  </main>
  <footer  class="page-footer pink ">
      <div class="row">
        <div class="col s12 center">
          <h5 class="white-text">© Todos os direitos Reservados a <a class="white-text" href="http://spgweb.com.br">Script Praia Grande Web</a></h5>
        </div>
      </div>
  </footer>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
  var elemDrop = document.querySelectorAll('.dropdown-trigger');
  var instanceDrop = M.Dropdown.init(elemDrop, {
    converTrigger: false,
    constrainWidth: false
  });
</script>
</body>
</html>