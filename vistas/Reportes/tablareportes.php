<?php
    session_start();
    include "../../clases/conexion.php";
    $con = new conexion();
    $conexion1 = $con->conectar();
    $idUsuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
                    reportes.id_reporte AS idReporte,
                    usuarios.id_usuario AS idUsuario,
                    reportes.folio AS folio,
                    reportes.area_solicitante AS areaSolicitante,
                    reportes.nombre_solicitante AS nombreSolicitante,
                    reportes.fecha_elaboracion AS fechaElaboracion,
                    reportes.descripcion AS descripcion,
                    reportes.estado AS estado,
                    finalizados.id_reporte AS idReporte1,
                    finalizados.documento_recogido AS recogido,
                    finalizados.firma_verificacion AS firmaVerificacion
            FROM
                    t_reportes AS reportes
                        INNER JOIN
                    t_usuarios AS usuarios ON usuarios.id_usuario = reportes.id_usuario
                        INNER JOIN
                    t_reportes_finalizados AS finalizados ON reportes.id_reporte = finalizados.id_reporte
            WHERE
                    reportes.id_usuario = $idUsuario ";

    $respuesta = mysqli_query($conexion1, $sql) or die(mysqli_error($conexion1));
    $respuestaArray = array();

    while($row = mysqli_fetch_assoc($respuesta)){
        $respuestaArray[] = $row;
    }
?>

<?php
            $mostrar1 = $respuestaArray;

?>

<table class="table table-sm dt-responsive nowrap" id="tablaReportesDataTable" style="width:100%">

    <thead>

        <th>Id Reporte</th>
        <th>Id Usuario</th>
        <th>Folio</th>
        <th>Area solicitante</th>
        <th>Nombre del solicitante</th>
        <th>Fecha de elaboracion</th>
        <th>Descripcion</th>
        <th>Estado</th>
        <th>Imprimir reporte terminado</th>
        <th>¿Reporte Firmado?</th>
        <th>Reporte recogido</th>

    </thead>

    <tbody>

        <?php
            foreach ($respuestaArray as $mostrar) {
                if(strlen($mostrar['descripcion']) > 25){
                    $descripcion = substr($mostrar['descripcion'], 0, 25)."...";
                }else{
                    $descripcion = $mostrar['descripcion'];
                }
        ?>

        <tr>

            <td><?php echo $mostrar['idReporte']; ?></td>
            <td><?php echo $mostrar['idUsuario']; ?></td>
            <td><?php echo $mostrar['folio']; ?></td>
            <td><?php echo $mostrar['areaSolicitante']; ?></td>
            <td><?php echo $mostrar['nombreSolicitante']; ?></td>
            <td><?php echo $mostrar['fechaElaboracion']; ?></td>
            <td><?php echo $descripcion; ?></td>

            <td>
                <?php if($mostrar['estado'] == 1) {?>
                    <button class="btn btn-warning btn-sm" disabled>
                        Pendiente
                    </button>
                <?php
                } else {
                ?>
                    <button class="btn btn-info btn-sm" disabled>
                        Resuelto
                    </button>
                <?php
                    }
                ?>
            </td>
            <td>
                <?php if($mostrar['estado'] == 3) {?>
                  <button type="button" class="btn btn-info btn-sm" onclick="generarPDF2(<?php echo $mostrar['idReporte']; ?>)">
                      <i class="fas fa-print"></i>
                  </button>
                <?php
                } else {
                ?>
                    <button type="button" class="btn btn-warning btn-sm" disabled>
                        <i class="fas fa-print"></i>
                    </button>
                <?php
                    }
                ?>
            </td>

            <td>
                <?php if($mostrar['estado'] == 3 && $mostrar['firmaVerificacion'] == 1) { ?>
                  <button type="button" class="btn btn-info btn-sm" onclick="firmarReporte(<?php echo $mostrar['idReporte']?>)">
                        <i class="fas fa-check"></i>
                  </button>
                <?php
                } else if($mostrar['estado'] == 3 && $mostrar['firmaVerificacion'] == 2) {
                ?>
                  <button type="button" class="btn btn-success btn-sm" disabled>
                        <i class="fas fa-check"></i>
                  </button>
                <?php
                }
                ?>
            </td>

            <td>
                <?php if($mostrar['recogido'] == 2) { ?>
                  <button type="button" class="btn btn-success btn-sm" disabled>
                        <i class="fas fa-check"></i>
                  </button>
                <?php
                } else {
                ?>
                  <button type="button" class="btn btn-danger btn-sm" disabled>
                        <i class="fas fa-times"></i>
                  </button>
                <?php
                }
                ?>
            </td>

        </tr>

        <?php
        }
        ?>

    </tbody>

</table>

<script>
    $(document).ready(function(){
       $('#tablaReportesDataTable').DataTable();
    });

    function firmarReporte(id)
    {
        document.getElementById("idReporteF").value=id;
        $('#modalFirmarReporte').modal('show');
    }

    function generarPDF2(id)
    {
        //alert(id);
        window.open("../procesos/reportes/pdf/vista_previa_02.php?reporte="+id);
    }
</script>
