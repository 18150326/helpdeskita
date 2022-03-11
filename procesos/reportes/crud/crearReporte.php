<?php
    
    $datos= array(
       "id_usuario" => $_POST['idUsuario'],
       "area_solicitante" => $_POST['areaSolicitante'],
       "nombre_solicitante" => $_POST['nombreSolicitante'],
       "fecha_elaboracion" => $_POST['fechaElaboracion'],
       "descripcion" => $_POST['descripcion'],
       "folio" => generarID()
    );


    include "../../../clases/Reportes.php";
    $Reportes = new Reportes();
    echo $Reportes->crearReporte($datos);


    function generarID (){
      include "../../../clases/conexion_general.php";

      $consulta = "SELECT folio FROM `t_reportes` ORDER BY folio DESC LIMIT 1";
      $result = mysqli_query($conexion, $consulta);

      $data = array();

      while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
      }

      return intval($data[0]['folio'])+1;
    }
?>