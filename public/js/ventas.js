$(document).ready(function(){
	$( '#grafica' ).hide();
	function runEffect(){
	  var options = {};
	  $( '#grafica' ).show( "blind", options, 500);
	};
	$('#anio').on('change', function(){
		var id = parseInt($(this).val());
		console.log(id);
		if(id > 0){
			$.ajax({
				type:'post',
				url:'consulta/venta',
				data:{
					id:id
				},
				success:function(data){
					if( data != "" ){
						data = JSON.parse(data);
						runEffect();
						var data = google.visualization.arrayToDataTable(data.data);

						var options = {
						  title: 'Company Performance',
						  curveType: 'function',
						  legend: { position: 'bottom' }
						};

						var chart = new google.visualization.LineChart(document.getElementById('grafica'));

						chart.draw(data, options);
					}
					else
						$('#valor').val('');
					console.log(data);
				}
			});
		}
		else
			$('#valor').val('');
	});
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);	
});