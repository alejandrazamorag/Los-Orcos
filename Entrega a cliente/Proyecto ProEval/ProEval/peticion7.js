$(obtener_registros());

function obtener_registros(proyectosE)
{
	$.ajax({
		url : 'consulta8.php',
		type : 'POST',
		dataType : 'html',
		data : { proyectosE: proyectosE },
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
