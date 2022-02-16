<?php

    include "conexion.php";

    class Usuarios extends conexion
    {
        //funcion login usuario
        public function loginUsuario($usuario, $password)
        {
            $conexion = conexion::conectar();
            $sql = "SELECT * FROM t_usuarios WHERE usuario= '$usuario' AND password='$password' ";
            $respuesta = mysqli_query($conexion, $sql);

            if(mysqli_num_rows($respuesta)>0)
            {
                $datosUsuario = mysqli_fetch_array($respuesta);
                $_SESSION['usuario']['nombre'] = $datosUsuario ['usuario'];
                $_SESSION['usuario']['id'] = $datosUsuario['id_usuario'];
                $_SESSION['usuario']['rol'] = $datosUsuario['id_rol'];
                return 1;
            }
            else
            {
                return 0;
            }
        }

        //funcion agregar datos personales del usuario
        public function agregarPersona($datos)
        {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_persona(paterno,
                                          materno,
                                          nombre,
                                          telefono,
                                          correo,
                                          fechaInsert)
            VALUES (?, ?, ?,  ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("ssssss",  $datos['paterno'],
                                             $datos['materno'],
                                             $datos['nombre'],
                                             $datos['telefono'],
                                             $datos['correo'],
                                             $datos['fechaIn']);
            $respuesta = $query->execute();
            $idPersona = mysqli_insert_id($conexion);
            $query->close();
            return $respuesta;
        }

        //funcion agregar datos de usuario
        public function agregarNuevoUsuario($datos)
        {
            //Definicion para la encriptacion
            define('METHOD','AES-256-CBC');
  	        define('SECRET_KEY','Tecnologico');
  	        define('SECRET_IV','990520');

            //Guardar la contraseña
            $contra = $datos['password'];

            //Encriptar la contraseña
      			$output=FALSE;
      			$key=hash('sha256', SECRET_KEY);
      			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
      			$output=openssl_encrypt($contra, METHOD, $key, 0, $iv);
      			$encriptada=base64_encode($output);

            //Desencriptar la contraseña
      			$key=hash('sha256', SECRET_KEY);
      			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
      			$desencriptada=openssl_decrypt(base64_decode($encriptada), METHOD, $key, 0, $iv);



            $conexion = Conexion::conectar();

            $sql = 'INSERT INTO t_persona(paterno, materno, nombre, telefono, correo, fechaInsert)
            VALUES ("'.$datos['paterno'].'", "'.$datos['materno'].'", "'.$datos['nombre'].'",  "'.$datos['telefono'].'", "'.$datos['correo'].'", "'.$datos['fechaIn'].'")';

            mysqli_query ($conexion, $sql);
            $idPersona = mysqli_insert_id($conexion);

            if($idPersona > 0){
                $sql = 'INSERT INTO t_usuarios (id_rol, id_persona, usuario, password, ubicacion, fecha_Insert)
                VALUES ("'.$datos['idRol'].'", "'.$idPersona.'", "'.$datos['usuario'].'",  "'.$encriptada.'", "'.$datos['ubicacion'].'", "'.$datos['fechaIn'].'")';

                $respuesta = mysqli_query($conexion, $sql);
                if($respuesta){
                    return "1";
                }else{
                    return "0";
                }
            }

            /*if($idPersona > 0 )
            {
                $sql = "INSERT INTO t_usuarios (id_rol,
                                                id_persona,
                                                usuario,
                                                password,
                                                ubicacion,
                                                fecha_Insert)
                        VALUES (?, ?, ?, ?, ?, ?)";
                $query = $conexion->prepare($sql);
                $query->bind_param("iissss", $datos['idRol'],
                                              $idPersona,
                                              $datos['usuario'],
                                              $datos['password'],
                                              $datos['ubicacion'],
                                              $datos['fechaIn']);
                $respuesta = $query->execute();
                return $respuesta;
            }
            else
            {
                return 0;
            }*/

        }


      /*  public string function contraseñadecrypt ($dato){
          $passwordEdit2 = $dato;
          return $passwordEdit2;
        }*/

        //funcion obtener los datos de usuario y persona
        public function obtenerDatosUsuario($idUsuario)
        {
            $conexion = Conexion::conectar();
            $sql = "SELECT
                            usuarios.id_usuario AS idUsuario,
                            usuarios.usuario AS nombreUsuario,
                            roles.nombre AS rol,
                            usuarios.id_rol AS idRol,
                            usuarios.ubicacion AS ubicacion,
                            usuarios.estado AS estatus,
                            usuarios.id_Persona AS idPersona,
                            persona.nombre AS nombrePersona,
                            persona.paterno AS ApPaterno,
                            persona.materno AS ApMaterno,
                            persona.fechaInsert AS fechaAlta,
                            persona.correo AS correo,
                            persona.telefono AS telefono,
                            usuarios.password AS contraseña
                    FROM
                            t_usuarios AS usuarios
                        INNER JOIN
                            t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
                        INNER JOIN
                            t_persona AS persona ON usuarios.id_persona = persona.id_persona
                        AND usuarios.id_usuario = '$idUsuario'";

            $respuesta = mysqli_query($conexion, $sql);
            $usuario = mysqli_fetch_array($respuesta);

            define('METHOD','AES-256-CBC');
  	        define('SECRET_KEY','Tecnologico');
  	        define('SECRET_IV','990520');
        //
  			$key=hash('sha256', SECRET_KEY);
  			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
  			$desencriptada=openssl_decrypt(base64_decode($usuario ['contraseña']), METHOD, $key, 0, $iv);

            $datos = array (
                'idUsuario' => $usuario['idUsuario'],
                'nombreUsuario' => $usuario['nombreUsuario'],
                'rol' => $usuario['rol'],
                'idRol' => $usuario['idRol'],
                'ubicacion' => $usuario['ubicacion'],
                'estatus' => $usuario['estatus'],
                'idPersona' => $usuario['idPersona'],
                'nombrePersona' => $usuario['nombrePersona'],
                'ApPaterno' => $usuario['ApPaterno'],
                'ApMaterno' => $usuario['ApMaterno'],
                'fechaAlta' => $usuario['fechaAlta'],
                'correo'=> $usuario['correo'],
                'telefono' => $usuario['telefono'],
                'contraseña' => $usuario ['contraseña'],
                'contraseña2' => $desencriptada

            );
            return $datos;
        }



        //funcion obtener el id persona
        public function obtenerIdPersona($idUsuario)
        {
            $conexion = Conexion::conectar();
            $sql = "SELECT
                          persona.id_persona AS idPersona
                    FROM  t_usuarios AS usuarios
                    INNER JOIN
                          t_persona AS persona ON usuarios.id_persona = persona.id_persona AND usuarios.id_usuario = '$idUsuario'";
            $respuesta = mysqli_query($conexion, $sql);
            $idPersona = mysqli_fetch_array($respuesta)['idPersona'];
            return $idPersona;
        }

        //funcion actualizar/editar datos personales
        public function editarPersona($datos)
        {
            $conexion = Conexion::conectar();
            $idPersona = self::obtenerIdPersona($datos['idUsuario']);
            $sql = "UPDATE t_persona SET
                                         paterno = ?,
                                         materno = ?,
                                         nombre = ?,
                                         telefono = ?,
                                         correo = ?,
                                         fechaInsert = ?
                    WHERE id_persona = $idPersona";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssssss',
                                                $datos['paterno'],
                                                $datos['materno'],
                                                $datos['nombre'],
                                                $datos['telefono'],
                                                $datos['correo'],
                                                $datos['fechaIn']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }


        //funcion actualizar/editar datos de usuario
        public function editarUsuario($datos)
        {
            $conexion = Conexion::conectar();
            $exitoPersona = self::editarPersona($datos);
            $passwordEdit = $datos['contraseña'];
            $passwordEditEncrypt = MD5($passwordEdit);
            if($exitoPersona)
            {
                $sql = "UPDATE t_usuarios SET id_rol = ?,
                                              usuario = ?,
                                              ubicacion = ?,
                                              password = ?
                        WHERE id_usuario = ?";
                $query = $conexion -> prepare($sql);
                $query -> bind_param('isssi',  $datos['idRol'],
                                              $datos['usuario'],
                                              $datos['ubicacion'],
                                              $passwordEditEncrypt,
                                              $datos['idUsuario']);

                $respuesta = $query -> execute();
                $query -> close();
                return $respuesta;
            }
            else
            {
                return 0;
            }
        }


    }

?>
