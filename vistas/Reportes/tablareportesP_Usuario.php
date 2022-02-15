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
                    reportes.estado AS estado
            FROM
                    t_reportes AS reportes
                        INNER JOIN
                    t_usuarios AS usuarios ON usuarios.id_usuario = reportes.id_usuario
            WHERE
                    reportes.id_usuario = $idUsuario AND reportes.estado NOT LIKE 3 ";

    $respuesta = mysqli_query($conexion1, $sql) or die(mysqli_error($conexion1));
    $respuestaArray = array();

    while($row = mysqli_fetch_assoc($respuesta)){
        $respuestaArray[] = $row;
    }
?>

<?php
            $mostrar1 = $respuestaArray;

?>

<button id="button-crear_reportes" class="btn btn-primary" data-toggle="modal" data-target="#modalcrearReporte"
                onclick="obtenerDatosUsuario(<?php echo $mostrar1[0]['idUsuario']?>)" >
          Crear reporte
</button>

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
              } else if($mostrar['estado'] == 2) {
              ?>
                  <button class="btn btn-info btn-sm" disabled>
                      En proceso
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
