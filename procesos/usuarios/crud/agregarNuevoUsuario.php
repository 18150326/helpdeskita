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
    /*$datos= array(
       "paterno" => "Ignacio",
       "materno" => "Mati",
       "nombre" => "Josh",
       "fechaIn" => "2021-01-28",
       "fechaNacimiento" => "1999-06-22",
       // "sexo" => ,
       "telefono" => "1114567845",
       "correo" => "asdasd123@hotmail.com",
       "usuario" => "pedro",
       "password" => "123456789",
       "idRol" => "1",
       "ubicacion" => "Lomas #123"
    );*/
    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    echo $Usuarios->agregarNuevoUsuario($datos);

?>
