$(document).ready(function()
{
    $('#cargartablareportes').load("Reportes/tablareportesP_Usuario.php");
});


function crearReporte()
{
    $.ajax({

        type: "POST",
        data: $('#frmcrearReporte').serialize(),
        url: "../procesos/reportes/crud/crearReporte.php",
        success:function(respuesta)
        {
            respuesta = respuesta.trim();
            // console.log(respuesta);
            if(respuesta == 1)
            {
                $('#cargartablareportes').load("Reportes/tablareportesP_Usuario.php");
                $('#frmcrearReporte')[0].reset();
                Swal.fire("Operación realizada","Reporte realizado! ","success");
                $('#frmcrearReporte').modal('hide');
            }
            else
            {
                Swal.fire("Operación no realizada","Error al realizar el reporte", "error");
            }
        }

    });
    return false;
}



function obtenerDatosUsuario(idUsuario)
{
    $.ajax({

        type: "POST",
        data: "idUsuario=" + idUsuario,
        url: "../procesos/reportes/crud/obtenerDatosUsuario.php",
        success:function(respuesta)
        {
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta);
            $('#idUsuario').val(respuesta['idUsuario']);
        }

    });
}
