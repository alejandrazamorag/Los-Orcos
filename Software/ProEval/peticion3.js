$(obtener_registros());

function obtener_registros(proyectosu)
{
	$.ajax({
		url : 'consulta4.php',
		type : 'POST',
		dataType : 'html',
		data : { proyectosu: proyectosu },
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
