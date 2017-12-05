$(obtener_registros());

function obtener_registros(proyectosAcep)
{
	$.ajax({
		url : 'consulta6.php',
		type : 'POST',
		dataType : 'html',
		data : { proyectosAcep: proyectosAcep },
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
