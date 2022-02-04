<?php
include "../../clases/conexion.php";
$con = new conexion();
$conexion1 = $con->conectar();

// Iniciamos las variables para filtrar las fechas
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];
$sql= "";

if ($desde != "" && $hasta != "")
{
     $sql = "SELECT
            reportes.id_reporte AS idReporte,
            reportes.estado AS estado,
            mantenimiento.descripcion AS mantenimiento,
            finalizados.tipo_servicio AS tipoServicio,
            finalizados.asignado AS asignado,
            finalizados.fecha_realizacion AS fechaRealizacion,
            finalizados.trabajo_realizado AS trabajoRealizado,
            finalizados.verificado_liberado AS verificadoLiberado,
            finalizados.fecha_verificado AS fechaVerificado,
            finalizados.aprobado AS aprobado,
            finalizados.fecha_aprobado AS fechaAprobado,
            finalizados.firma_verificacion AS firmaVerificacion
            FROM
            t_reportes AS reportes
            INNER JOIN
            t_reportes_finalizados AS finalizados ON finalizados.id_reporte = reportes.id_reporte
            INNER JOIN
            t_cat_mantenimiento AS mantenimiento ON finalizados.id_mantenimiento = mantenimiento.id_mantenimiento
            WHERE finalizados.fecha_realizacion BETWEEN '$desde' AND '$hasta'";
}
else
{
    $sql = "SELECT
            reportes.id_reporte AS idReporte,
            reportes.estado AS estado,
            mantenimiento.descripcion AS mantenimiento,
            finalizados.tipo_servicio AS tipoServicio,
            finalizados.asignado AS asignado,
            finalizados.fecha_realizacion AS fechaRealizacion,
            finalizados.trabajo_realizado AS trabajoRealizado,
            finalizados.verificado_liberado AS verificadoLiberado,
            finalizados.fecha_verificado AS fechaVerificado,
            finalizados.aprobado AS aprobado,
            finalizados.fecha_aprobado AS fechaAprobado,
            finalizados.firma_verificacion AS firmaVerificacion
            FROM
            t_reportes AS reportes
            INNER JOIN
            t_reportes_finalizados AS finalizados ON finalizados.id_reporte = reportes.id_reporte
            INNER JOIN
            t_cat_mantenimiento AS mantenimiento ON finalizados.id_mantenimiento = mantenimiento.id_mantenimiento";

}
$respuesta = mysqli_query($conexion1, $sql) or die(mysqli_error($conexion1));
// echo $sql;
/*if ($respuesta) {
    echo "se ejecutó correctamente";
}*/
?>

<table class="table table-sm dt-responsive nowrap" id="tablaReportesAdminDataTable" style="width:100%">

    <thead>

        <th>Id Reporte</th>
        <th>Mantenimiento</th>
        <th>Tipo serivicio</th>
        <th>Asignado</th>
        <th>Fecha realizacion</th>
        <th>Trabajo realizado</th>
        <th>Verificado</th>
        <th>Fecha de verificado</th>
        <th>Aprobado</th>
        <th>Fecha de aprobado</th>
        <th>Imprimir reporte</th>
        <th>Firmado</th>
    
    </thead>

    <tbody>
        
        <?php
            while($mostrar = mysqli_fetch_array($respuesta)){
        ?>

        <tr>

            <td><?php echo $mostrar['idReporte']; ?></td>
            <td><?php echo $mostrar['mantenimiento']; ?></td>
            <td><?php echo $mostrar['tipoServicio']; ?></td>
            <td><?php echo $mostrar['asignado']; ?></td>
            <td><?php echo $mostrar['fechaRealizacion']; ?></td>
            <td><?php echo $mostrar['trabajoRealizado']; ?></td>
            <td><?php echo $mostrar['verificadoLiberado']; ?></td>
            <td><?php echo $mostrar['fechaVerificado']; ?></td>
            <td><?php echo $mostrar['aprobado']; ?></td>
            <td><?php echo $mostrar['fechaAprobado']; ?></td>
            
            <td>
                <?php if($mostrar['estado' == 2]){?>
                    <button class="btn btn-warning btn-sm">
                        <i class="fas fa-print"></i>
                    </button>
                <?php
                }
                ?>
            </td>

            <td>
                <?php if($mostrar['firmaVerificacion'] == 1) { ?>
                  <button type="button" class="btn btn-danger btn-sm">
                        <i class="fas fa-question"></i>
                  </button>
                <?php
                } else if($mostrar['firmaVerificacion'] == 2) {
                ?>
                  <button type="button" class="btn btn-success btn-sm" >
                        <i class="fas fa-check"></i>
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
       $('#tablaReportesAdminDataTable').DataTable(); 
    });
</script>