@extends('templates.base')
@section('content')
<center><h3>Productos</h3></center>
<hr>
<br>
<div class="row">
	<div class="col s6">
		<br>
		<center><b>Productos mas vendidos</b></center>
			<table class="bordered highlight centered" id="app"><thead>
						<tr>
							<td><center>Producto</center></td>
							<td><center>Ventas</center></td>
						</tr>
					</thead>
				<tbody id="tpromas">

				</tbody>
			</table>
	</div>
	<div class="col s6">
		grafiquita
	</div>
</div>
<hr>
<div class="row">
	<div class="col s6">
		<br>
		<center><b>Productos menos vendidos</b></center>
			<table class="bordered highlight centered" id="app"><thead>
						<tr>
							<td><center>Producto</center></td>
							<td><center>Ventas</center></td>
						</tr>
					</thead>
				<tbody id="tpromem">

				</tbody>
			</table>
	</div>
	<div class="col s6">
		grafiquita
	</div>
</div>
@stop
@section('script')
<script src="/js/productos.js"></script>
@stop