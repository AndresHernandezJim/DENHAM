@extends('templates.base')
@section('content')
<center><h3>Ventas</h3></center>
<hr>
<br>
<div class="row">
	<div class="col s3">
		<p>
			<b>Facturación media anual: $<b>
			<input type="text" readonly="" id="valor">
		</p>
	</div>
	<div class="col s3 offset-s3">
	<br><br>
		<form>
			{{csrf_field()}}
			<select name="año1" id="año1" class="browser-default">
				<option value="" Disabled selected>Año</option>
				     <option value="1996">1996</option>
				     <option value="1997">1997</option>
				     <option value="1997">1998</option>
			</select>
		</form>
	</div>
</div>
<hr>
<div class="row" id="grafica">
	aqui debera estar la grafica :v
</div>
@stop
@section('script')
<script src="/js/ventas.js"></script>
@stop