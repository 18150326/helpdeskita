<?php

    session_start();
    $usuario = $_POST['login'];
    $password = $_POST['password'];

    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();

    echo $Usuarios->loginUsuario($usuario, $password);

?>