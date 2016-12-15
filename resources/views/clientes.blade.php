@extends('templates.base')
@section('styles')
<style>
  #progressbar .ui-progressbar-value {
    background-color: #ccc;
  }
  </style>
@stop
  
@section('content')
<center><h3>Clientes</h3></center>
<hr>
<br>
<div class="row">
	<div class="col s12" style="height: 400px; overflow-y: scroll;">
		<br>
		<center><b>Clientes con mayor numero de compras</b></center>
			<table class="bordered highlight centered" id="app">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Total de compras</th>
					</tr>
				</thead>
				<tbody id="tclientes">
				@if( isset($clientes) && count($clientes) )
					@foreach($clientes as $item)
						<tr class="cliene" data-id="{{$item->id}}">
							<td>{{$item->Cliente}}</td>
							<td>${{number_format($item->precio,2)}}</td>
						</tr>
					@endforeach
				@endif
				</tbody>
			</table>
	</div>
</div>
<hr>
<div class="progress" style="display:none">
    <div class="indeterminate" style="width: 70%"></div>
    
   
</div>
<div class="progress2" style="display:none">
	<div>
    	<center>
    		<img src="/images/cangu.gif">
    	</center>
    </div>
</div>
      
<div class="row" id="detalles" style="display:none;">
<br>
	<div class=" col s12" style="height: 400px; overflow-y: scroll;">
		<center><b>Detalles de compras</b></center>
			<table class="bordered highlight centered" id="app"><thead>
						<tr>
							<td><center>producto</center></td>
							<td><center>cantidad</center></td>
						</tr>
					</thead>
				<tbody id="tdetalles"></tbody>
			</table>
	</div>
</div>
@stop
@section('script')
<script src="/js/clientes.js"></script>
@stop