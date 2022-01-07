<?php
    //print_r($_POST);
    $datos= array(
       "id_usuario" => $_POST['idUsuario'],
       "area_solicitante" => $_POST['areaSolicitante'],
       "nombre_solicitante" => $_POST['nombreSolicitante'],
       "fecha_elaboracion" => $_POST['fechaElaboracion'],
       "descripcion" => $_POST['descripcion']
    );

    include "../../../clases/Reportes.php";
    $Reportes = new Reportes();
    echo $Reportes->crearReporte($datos);

?>