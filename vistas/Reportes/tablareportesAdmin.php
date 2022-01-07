<?php
    include "../../clases/conexion.php";
    $con = new conexion();
    $conexion1 = $con->conectar();
    $sql = "SELECT 
                        reportes.id_reporte AS idReporte,
                        usuarios.id_usuario AS idUsuario,
                        reportes.folio AS folio,
                        reportes.area_solicitante AS areaSolicitante,
                        reportes.nombre_solicitante AS nombreSolicitante,
                        reportes.fecha_elaboracion AS fechaElaboracion,
                        reportes.descripcion AS descripcion,
                        reportes.estado AS estado
            FROM
                t_reportes AS reportes
                 INNER JOIN
                t_usuarios AS usuarios ON usuarios.id_usuario = reportes.id_usuario";
    $respuesta = mysqli_query($conexion1, $sql) or die(mysqli_error($conexion1));
?>

<table class="table table-sm dt-responsive nowrap" id="tablaReportesAdminDataTable" style="width:100%">

    <thead>

        <th>Id Reporte</th>
        <th>Id Usuario</th>
        <th>Folio</th>
        <th>Area solicitante</th>
        <th>Nombre del solicitante</th>
        <th>Fecha de elaboracion</th>
        <th>Descripcion</th>
        <th>Estado</th>
    
    </thead>

    <tbody>
        
        <?php
            while($mostrar = mysqli_fetch_array($respuesta)){
        ?>

        <tr>

            <td><?php echo $mostrar['idReporte']; ?></td>
            <td><?php echo $mostrar['idUsuario']; ?></td>
            <td><?php echo $mostrar['folio']; ?></td>
            <td><?php echo $mostrar['areaSolicitante']; ?></td>
            <td><?php echo $mostrar['nombreSolicitante']; ?></td>
            <td><?php echo $mostrar['fechaElaboracion']; ?></td>
            <td><?php echo $mostrar['descripcion']; ?></td>
            
            <td>
                <?php if($mostrar['estado'] == 1) {?>
                    <button class="btn btn-warning btn-sm disabled">
                        Pendiente
                    </button>
                <?php
                } else {
                ?>
                    <button class="btn btn-info btn-sm disabled">
                        Resuelto
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