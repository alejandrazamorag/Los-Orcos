$(obtener_registros());

function obtener_registros(proyectosR)
{
	$.ajax({
		url : 'consulta9.php',
		type : 'POST',
		dataType : 'html',
		data : { proyectosR: proyectosR },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
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
