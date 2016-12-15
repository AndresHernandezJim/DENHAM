@extends('templates.base')
@section('content')
<center><h3>Categorias</h3></center>
<hr>
<br>
<div class="row">
	<div class="col s12" id="grafica" style="height:540px"></div>
</div>
<hr>
@stop
@section('script')
<script src="/js/categorias.js"></script>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        	@if( isset($categorias) && count($categorias) )
      			['Categoría', 'Cantidad'],
        		@foreach($categorias as $item)
          			['{{$item->nombre}}',{{(int)$item->cantidad}}],
          		@endforeach
          	@endif
        ]);

        var options = {
          title: 'Ventas por categoría'
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafica'));

        chart.draw(data, options);
      }
    </script>

@stop