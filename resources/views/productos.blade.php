@extends('templates.base')

	@section('content')
		<center><h3>Productos</h3></center>
		<hr>
		<br>
		<div class="row">
			<div class="col s6">
				<br>
				<center><b>Productos mas vendidos</b></center>
				<table class="bordered highlight centered" id="app">
					<thead>
						<tr>
							<th><center>Producto</center></th>
							<th><center>Ventas</center></th>
						</tr>
					</thead>
					<tbody id="tpromas">
						@if( isset($productos_max) && count($productos_max))
							@foreach($productos_max as $key => $item)
								<tr>
									<td>
										<input type="checkbox" id="test{{$key}}" class="producto" data-id="{{$item->id}}" name="hol">
										<label for="test{{$key}}">
											{{$item->producto}}
										</label>
									</td>
									<td>{{$item->cantidad}}</td>
								</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
			<div class="col s6">
				<br>
				<center><b>Productos menos vendidos</b></center>
				<table class="bordered highlight centered" id="app">
					<thead>
						<tr>
							<th>Seleccionar</th>
							<th><center>Producto</center></th>
							<th><center>Ventas</center></th>
						</tr>
					</thead>
					<tbody id="tpromem">
						@if( isset($productos_min) && count($productos_min))
							@foreach($productos_min as $key => $item)
								<tr>
									<td>
										<input type="checkbox" id="test{{$key}}b" class="producto" data-id="{{$item->id}}" name="hol">
										<label for="test{{$key}}b">
											{{$item->producto}}
										</label>
									</td>
									<td>{{$item->cantidad}}</td>
								</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
		<hr>
		<div class="row" id="graf">
			<div class="col s12" id="grafica" style="height:540px"></div>
		</div>
	@stop

	@section('script')
		<script src="/js/productos.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	   	<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
	   	</script>

	@stop