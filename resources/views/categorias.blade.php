@extends('templates.base')
@section('content')
<center><h3>Categorias</h3></center>
<hr>
<br>
<div class="row">
	<div class="col s6">
		grafica de categorias mas vendidas
	</div>
	<div class="col s6">
		grafica de categorias menos vendidas
	</div>
</div>
<hr>
@stop
@section('script')
<script src="/js/categorias.js"></script>
@stop