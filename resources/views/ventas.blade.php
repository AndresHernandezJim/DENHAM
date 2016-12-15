@extends('templates.base')
	@section('content')
		<center><h3>Ventas</h3></center>
		<hr>
		<br>
		<div class="row">
			
			<div class="col s2 offset-s5">
			<br><br>
			<center><b>Seleccione el año</b></center>
				<form>
					{{csrf_field()}}
					@if( isset($anio) && count($anio) )
						<select name="anio" id="anio" class="browser-default">
						<option></option>
							@foreach($anio as $val)
								<option value="{{$val->anio}}">{{$val->anio}}</option>
							@endforeach
						</select>
					@endif
				</form>
			</div>
		</div>
		<hr>
		<div class="row" id="grafica" style="height:540px;"></div>
	@stop
	@section('script')
		<script src="/js/ventas.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	@stop