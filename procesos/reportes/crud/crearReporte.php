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
      $servidor = "b1o04dzhm1guhvmjcrwb-mysql.services.clever-cloud.com";
      $usuario = "ulpt7sduld7rn0so";
      $password = "88bFiBTpsfGsC3WbaBaT";
      $db = "b1o04dzhm1guhvmjcrwb";
      
      $con = mysqli_connect($servidor, $usuario, $password, $db);
      $con->set_charset("utf8");

      $consulta = "SELECT folio FROM `t_reportes` ORDER BY folio DESC LIMIT 1";
      $result = mysqli_query($con, $consulta);

      $data = array();

      while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
      }

      return intval($data[0]['folio'])+1;
    }
?>