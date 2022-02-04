$(document).ready(function()
{
    $('#cargartablareportes').load("Reportes/tablareportesP_Admin.php");
});

function terminarReporte()
{
    $.ajax({

        type: "POST",
        data: $('#frmterminarReporte').serialize(),
        url: "../procesos/reportes/crud/terminarReporte.php",
        success:function(respuesta)
        {
            respuesta = respuesta.trim();
            if(respuesta == 1)
            {
                $('#cargartablareportes').load("Reportes/tablareportesP_Admin.php");
                $('#frmterminarReporte')[0].reset();
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
