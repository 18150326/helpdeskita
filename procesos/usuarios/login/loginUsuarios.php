<?php
    
    include "../../../clases/Usuarios.php";
    session_start();
    $usuario = $_POST['login'];
    $password = $_POST['password'];

    
    $encriptada = getEncryptedPassword($password);
    
    
    $Usuarios = new Usuarios();
    
    echo $Usuarios->loginUsuario($usuario, $encriptada);

?>
