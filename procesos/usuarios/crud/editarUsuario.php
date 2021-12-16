<?php
    //print_r($_POST);
    $datos = array(
        'idUsuario' => $_POST ['idUsuario'],
        'paterno' => $_POST ['paternou'],
        'materno' => $_POST ['maternou'],
        'nombre' => $_POST ['nombreu'],
        'fechaIn' => $_POST ['fechaInu'],
        'sexo' => $_POST ['sexou'],
        'telefono' => $_POST ['telefonou'],
        'correo' => $_POST ['correou'],
        'usuario' => $_POST ['usuariou'],
        'idRol' => $_POST ['idRolu'],
        'ubicacion' => $_POST ['ubicacionu']
    );

    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    echo $Usuarios -> editarUsuario($datos);
?>