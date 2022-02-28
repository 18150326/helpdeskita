<?php

    $datos= array(
       "paterno" => $_POST['paterno'],
       "materno" => $_POST['materno'],
       "nombre" => $_POST['nombre'],
       "fechaIn" => $_POST['fechaIn'],
       "telefono" => $_POST['telefono'],
       "correo" => $_POST['correo'],
       "usuario" => $_POST['usuario'],
       "password" => $_POST['contraseña'],
       "idRol" => $_POST['idRol'],
       "ubicacion" => $_POST['ubicacion']
    );
    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    echo $Usuarios->agregarNuevoUsuario($datos);

?>
