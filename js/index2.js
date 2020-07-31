$(obtener_registros());


function obtener_registros(search){
	$('#search').focus()
	$.ajax({
		url : 'search2.php',
		type : 'POST',
		dataType : 'html',
		data : {search: search},
		})

	.done(function(resultado){
		$("#result").html(resultado);
	})
}

$(document).on('keyup', '#search', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});
