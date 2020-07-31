$(obtener_registros());


function obtener_registros(search){
	$('#search').focus()
	$.ajax({
		url : 'search.php',
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


/*
$(document).ready(function(){
  $('#search').focus()

  $('#search').on('keyup', function(){
    var search = $('#search').val()
    
    $.ajax({
      type: 'POST',
      url: 'search.php',
      data: {'search': search},
      beforeSend: function(){
        $('#result').html('<img src="img/pacman.gif">')
      }
    })



    .done(function(resultado){
      $('#result').html(resultado)
    })
    .fail(function(){
      alert('Hubo un error :(')
    })
  })
})

*/