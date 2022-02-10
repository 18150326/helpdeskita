<?php
    $datos= array(
       "idReporte" => $_POST['idReporteF']
    );
   
    //echo json_encode($datos);
   include "../../../clases/Reportes.php";
   $Reportes = new Reportes();
   //echo json_encode($datos);
   echo json_encode($Reportes->FirmarReporte($datos));

?>