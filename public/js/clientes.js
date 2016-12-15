$(document).ready(function(){
	// $( "#detalles" ).progressbar({
	//   value: false
 //    });

	$('.cliene').on('click', function(){
		var id = $(this).attr('data-id');
		$('.progress').show();
		$('.progress2').show();
		$('#detalles').hide();
		$.ajax({
			url:'consulta/cliente',
			type:'post',
			data:{
				id:id
			},
			success:function(data){
				$('#tdetalles').html('');
				if(data != "" ){
					data = JSON.parse(data);
					$.each(data, function( key, item){
						$('#tdetalles').append('<tr><td>' + item.producto + '</td><td>' + item.cantidad + '</td></tr>');
					});
				}
				$('#detalles').show();
			},
			complete:function(){
				$('.progress').hide();
				$('.progress2').hide();
			}
		});
	});
});