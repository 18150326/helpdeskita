<?php
    //print_r($_POST);
    $datos = array(
        'idUsuario' => $_POST ['idUsuario'],
        'paterno' => $_POST ['paternou'],
        'materno' => $_POST ['maternou'],
        'nombre' => $_POST ['nombreu'],
        'fechaIn' => $_POST ['fechaInu'],
        'telefono' => $_POST ['telefonou'],
        'correo' => $_POST ['correou'],
        'usuario' => $_POST ['usuariou'],
        'idRol' => $_POST ['idRolu'],
        'ubicacion' => $_POST ['ubicacionu'],
        'contraseña' => $_POST ['contraseñau']
    );

    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    echo $Usuarios -> editarUsuario($datos);
?>