<?php

    session_start();
    $usuario = $_POST['login'];
    $password = $_POST['password'];

    define('METHOD','AES-256-CBC');
    define('SECRET_KEY','Tecnologico');
    define('SECRET_IV','990520');

    $output=FALSE;
    $key=hash('sha256', SECRET_KEY);
    $iv=substr(hash('sha256', SECRET_IV), 0, 16);
    $output=openssl_encrypt($password, METHOD, $key, 0, $iv);
    $encriptada=base64_encode($output);
    //
    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();

    echo $Usuarios->loginUsuario($usuario, $encriptada);

?>
