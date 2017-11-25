$(obtener_registros());

function obtener_registros(proyectosPro)
{
	$.ajax({
		url : 'consulta7.php',
		type : 'POST',
		dataType : 'html',
		data : { proyectosPro: proyectosPro },
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
