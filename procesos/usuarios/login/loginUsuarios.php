<?php
    
    include "../../../clases/Usuarios.php";
    session_start();
    $usuario = $_POST['login'];
    $password = $_POST['password'];

    /*$usuario = "admin";
    $password = "L4LL4v3M@3str@";*/

    
    $encriptada = getEncryptedPassword($password);
    
    
    $Usuarios = new Usuarios();
    
    echo $Usuarios->loginUsuario($usuario, $encriptada);

?>
