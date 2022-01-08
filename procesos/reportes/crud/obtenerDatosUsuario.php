<?php 

    $idUsuario = $_POST['idUsuario'];
    include "../../../clases/Reportes.php";
    $Reportes = new Reportes();

    echo json_encode($Reportes -> obtenerDatosUsuario($idUsuario));

?>