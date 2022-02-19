<?php
    $datos= array(
       "idReporte" => $_POST['idReporteCE']
    );

    //echo json_encode($datos);
    include "../../../clases/ReportesT.php";
    $ReportesT = new ReportesT();
    echo json_encode($ReportesT->CambiarEstado($datos));

?>