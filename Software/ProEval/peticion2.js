$(obtener_registros());

function obtener_registros(proyectost)
{
	$.ajax({
		url : 'consulta3.php',
		type : 'POST',
		dataType : 'html',
		data : { proyectost: proyectost },
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
