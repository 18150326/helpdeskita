<?php
    $datos= array(
       "idReporte" => $_POST['idReporte'],
       "id_mantenimiento" => $_POST['mantenimiento'],
       "tipo_servicio" => $_POST['tipoServicio'],
       "asignado" => $_POST['asignado'],
       "fecha_realizacion" => $_POST['fechaRealizacion'],
       "trabajo_realizado" => $_POST['trabajoRealizado'],
       "verificado_liberado" => $_POST['verificadoLiberado'],
       "fecha_verificado" => $_POST['fechaVerificado'],
       "aprobado" => $_POST['aprobado'],
       "fecha_aprobado" => $_POST['fechaAprobado']
    );

    /*$datos= array(
        "idReporte" => 2,
        "id_mantenimiento" => 1,
        "tipo_servicio" => "a",
        "asignado" => "a",
        "fecha_realizacion" => "a",
        "trabajo_realizado" => "a",
        "verificado_liberado" => "a",
        "fecha_verificado" => "a",
        "aprobado" => "a",
        "fecha_aprobado" => "a"
     );*/
    // echo json_encode($datos);

    include "../../../clases/ReportesT.php";
    $Reportes = new ReportesT();
    // echo $Reportes->terminarReporte($datos);
    echo json_encode($Reportes->terminarReporte($datos));

?>