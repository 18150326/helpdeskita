<?php
    $datos= array(
       "idReporte" => $_POST['idReporteR']
    );

    //echo json_encode($datos);
    include "../../../clases/ReportesT.php";
    $ReportesT = new ReportesT();
    echo json_encode($ReportesT->RecogerReporte($datos));

?>