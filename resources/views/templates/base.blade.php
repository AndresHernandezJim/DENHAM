<!DOCTYPE html>
<html>
<head>
@yield('styles')

<title>DENHAM</title>
<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
<meta name="csrf-token" content="{{csrf_token()}}"/>
  <link rel="stylesheet" type="text/css" href="/css/materialize.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/css/app1.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body>
<header>
</ul>
<nav class=" teal lighten-2">
  <div class="nav-wrapper ">
    <a href="/" class="brand-logo form">&nbsp;DENHAM</a>
    <ul class="right hide-on-med-and-down">
    <li><a class="" href="/ventas" >Ventas&nbsp<i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
    <li><a class="" href="/productos" data-activates="dropdown1">Productos&nbsp;<i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>    
      <li><a class="" href="/categorias" data-activates="dropdown2">Categorias &nbsp; &nbsp;<i class="fa fa-cubes" aria-hidden="true"></i></a></li> 
      <li><a class="" href="clientes" data-activates="dropdown3">Clientes &nbsp<i class="fa fa-users" aria-hidden="true"></i></a></li> 
    </ul>
  </div>
</nav>  
</header>
@yield('navegacion')
<br>
<div class="row">
  
    <div class="col s10 offset-s1 card-panel  blue lighten-5">
  @yield('content')
    </div>
  </div>
<script src="/js/jquery-2.2.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/js/materialize.min.js"></script>
<script src="/js/principal.js"></script>
<script src="/js/app.js"></script>
@yield('script')
</body>
</html>