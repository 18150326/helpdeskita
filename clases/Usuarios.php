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

        //funcion agregar datos personales del usuario fecha_nacimiento, $datos['fechaNacimiento'], ?,
        public function agregarPersona($datos)
        {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_persona(paterno, 
                                          materno, 
                                          nombre, 
                                           
                                          sexo, 
                                          telefono, 
                                          correo, 
                                          fechaInsert)
            VALUES (?, ?, ?,  ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("sssssss",  $datos['paterno'],
                                             $datos['materno'],
                                             $datos['nombre'],
                                             
                                             $datos['sexo'],
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
            $conexion = Conexion::conectar();
            $idPersona = self::agregarPersona($datos);

            if($idPersona > 0 )
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
            }

        }

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
                            persona.sexo AS sexo,
                            persona.correo AS correo,
                            persona.telefono AS telefono
                    FROM
                            t_usuarios AS usuarios
                        INNER JOIN
                            t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
                        INNER JOIN
                            t_persona AS persona ON usuarios.id_persona = persona.id_persona
                        AND usuarios.id_usuario = '$idUsuario'";

            $respuesta = mysqli_query($conexion, $sql);
            $usuario = mysqli_fetch_array($respuesta);

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
                'sexo' => $usuario['sexo'],
                'correo'=> $usuario['correo'],
                'telefono' => $usuario['telefono']
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
                                         sexo = ?,
                                         telefono = ?,
                                         correo = ?,
                                         fechaInsert = ?
                    WHERE id_persona = $idPersona";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssssss',                               
                                                $datos['paterno'],
                                                $datos['materno'],
                                                $datos['nombre'],
                                                $datos['sexo'],
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
            if($exitoPersona)
            {
                $sql = "UPDATE t_usuarios SET id_rol = ?,
                                              usuario = ?,
                                              ubicacion = ?
                        WHERE id_usuario = ?";
                $query = $conexion -> prepare($sql);
                $query -> bind_param('issi',  $datos['idRol'],
                                              $datos['usuario'],
                                              $datos['ubicacion'],
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
