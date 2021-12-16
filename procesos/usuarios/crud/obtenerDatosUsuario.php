<?php 

    $idUsuario = $_POST['idUsuario']; 
    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();

    echo json_encode($Usuarios -> obtenerDatosUsuario($idUsuario));

?>