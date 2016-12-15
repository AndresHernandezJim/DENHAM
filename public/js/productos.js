$(document).ready(function(){
	$('#graf').hide();
	function runEffect(){
	  var options = {};
	  $( '#graf' ).show( "blind", options, 500);
	};
	$('.producto').on('click', function(){
		var id = parseInt($(this).attr('data-id'));
		var context = $(this);
		var text ="Historial de ventas del producto";
		if( id > 0 ){
			var ids = []
			$.each($('input:checkbox:checked'), function(key,item){
				ids.push(item.getAttribute('data-id'));
			});
			$.ajax({
				type:'post',
				url:'/consulta/producto',
				data:{
					id:id,
					ids:ids
				},
				success:function(data){
					if( data != ""){
						runEffect();
						data = JSON.parse(data);
						var data = google.visualization.arrayToDataTable(data);

						var options = {
							title: text,
							hAxis: {title: 'AÑO',  titleTextStyle: {color: '#333'}},
							vAxis: {minValue: 0}
						};

						var chart = new google.visualization.AreaChart(document.getElementById('grafica'));
						chart.draw(data, options);
					}
				},
			});
		}
	});
});