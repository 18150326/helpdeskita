<?php 
	$_POST = json_decode(file_get_contents('php://input'), true);
    $idUsuario = $_POST['idUsuario']; 
    // $idUsuario = 40; 
    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();

    echo json_encode($Usuarios -> obtenerDatosUsuario($idUsuario));

?>