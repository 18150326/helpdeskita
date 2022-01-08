$(document).ready(function()
{
    $('#cargartablareportes').load("Reportes/tablareportes.php");
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
            if(respuesta == 1)
            {
                $('#cargartablareportes').load("Reportes/tablareportes.php");
                $('#frmcrearReporte')[0].reset();
                Swal.fire("Operación realizada","Reporte realizado! " + respuesta,"success");

            }
            else
            {
                Swal.fire("Operación no realizada","Error al realizar el reporte" + respuesta, "error");
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