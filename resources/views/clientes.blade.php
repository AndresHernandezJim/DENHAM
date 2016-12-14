@extends('templates.base')
@section('content')
<center><h3>Clientes</h3></center>
<hr>
<br>
<div class="row">
	<div class="col s8 offset-s2">
		<br>
		<center><b>Clientes con mayor numero de compras</b></center>
			<table class="bordered highlight centered" id="app"><thead>
						<tr>
							<td><center>Nombre</center></td>
							<td><center>Total de compras</center></td>
							<td><center>Detalles</center></td>
						</tr>
					</thead>
				<tbody id="tclientes">

				</tbody>
			</table>
	</div>
</div>
<hr>
<div class="row" id="detalles">
<br>
	<div class=" col s8 offset-s2">
		<center><b>Detalles de compras</b></center>
			<table class="bordered highlight centered" id="app"><thead>
						<tr>
							<td><center>producto</center></td>
							<td><center>cantidad</center></td>
						</tr>
					</thead>
				<tbody id="tdetalles">

				</tbody>
			</table>
	</div>
</div>
@stop
@section('script')
<script src="/js/clientes.js"></script>
@stop