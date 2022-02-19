<?php

    include "conexion.php";

    class Reportes extends conexion
    {

        //Funcion para agregar los datos de un reporte a la base de datos
        public function crearReporte($datos)
        {
            $servidor = "b1o04dzhm1guhvmjcrwb-mysql.services.clever-cloud.com";
            $usuario = "ulpt7sduld7rn0so";
            $password = "88bFiBTpsfGsC3WbaBaT";
            $db = "b1o04dzhm1guhvmjcrwb";

            $con = mysqli_connect($servidor, $usuario, $password, $db);
            $con->set_charset("utf8");

            $sql = "INSERT INTO t_reportes(folio, id_usuario, area_solicitante, nombre_solicitante,fecha_elaboracion,descripcion)
            VALUES ('".$datos['folio']."', '".$datos['id_usuario']."', '".$datos['area_solicitante']."', '".$datos['nombre_solicitante']."', '".$datos['fecha_elaboracion']."', '".$datos['descripcion']."')";
            // echo $sql;
            /*$sql =<<<EOT
            INSERT INTO t_reportes(folio, id_usuario, area_solicitante, nombre_solicitante,fecha_elaboracion,descripcion)
            VALUES ("{$datos['folio']}", "{$datos['id_usuario']}", "{$datos['area_solicitante']}", "{$datos['nombre_solicitante']}", "{$datos['fecha_elaboracion']}",  "{$datos['descripcion']}")
            EOT;*/


            $result = mysqli_query($con, $sql);

            if($result){
              return "1";
            }else{
              return "0";
            }
        }

        //Funcion para proporcionar el ID del usuario que inció sesión
        public function obteneridUsuario($idUsuario)
        {
            $conexion = Conexion::conectar();
            $sql = "SELECT
                        usuarios.id_usuario AS idUsuario
                    FROM  t_usuarios AS usuarios
                         /*INNER JOIN
                        t_reportes AS reportes ON usuarios.id_usuario = reportes.id_usuario*/
                    WHERE usuarios.id_usuario = '$idUsuario'";
            $respuesta = mysqli_query($conexion, $sql);
            $idusuario = mysqli_fetch_array($respuesta)['idUsuario'];
            return $idusuario;
        }



        //funcion para extraer y usar el id de usuario en la funcion obteneridUsuario
        public function obtenerDatosUsuario($idUsuario)
        {
            $conexion = Conexion::conectar();
            $sql = "SELECT DISTINCT
                            usuarios.id_usuario AS idUsuario
                    FROM
                            t_usuarios AS usuarios
                        /*INNER JOIN
                            t_reportes AS reportes ON usuarios.id_usuario = reportes.id_usuario*/
                        WHERE usuarios.id_usuario = '$idUsuario'";

            $respuesta = mysqli_query($conexion, $sql);
            $usuario = mysqli_fetch_array($respuesta);

            $datos = array (
                'idUsuario' => $usuario['idUsuario']
            );
            return $datos;
        }


        public function FirmarReporte($datos)
        {
          $conexion = Conexion::conectar();
          $sql ="UPDATE t_reportes_finalizados
                 SET firma_verificacion = 2
                 WHERE id_reporte = '".$datos['idReporte']."' ";
          $resultado = mysqli_query($conexion, $sql);
          if($resultado)
          {
            return 1;
          }
          else{
            return 0;
          }
          //return $sql;
        }


    }


?>
