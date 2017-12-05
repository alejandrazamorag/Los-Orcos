$(obtener_registros());

function obtener_registros(proyectosAA)
{
	$.ajax({
		url : 'consulta5.php',
		type : 'POST',
		dataType : 'html',
		data : { proyectosAA: proyectosAA },
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
