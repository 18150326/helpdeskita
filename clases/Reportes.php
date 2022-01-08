<?php

    include "conexion.php";

    class Reportes extends conexion
    {

        //Funcion para agregar los datos de un reporte a la base de datos
        public function crearReporte($datos)
        {   
            $conexion = Conexion::conectar();
            $idUsuario = self::obteneridUsuario($datos['id_usuario']);
            $sql = "INSERT INTO t_reportes( id_usuario,
                                            area_solicitante,
                                            nombre_solicitante,
                                            fecha_elaboracion,
                                            descripcion)
                    VALUES (?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("issss",    $idUsuario,
                                           $datos['area_solicitante'],
                                           $datos['nombre_solicitante'],
                                           $datos['fecha_elaboracion'],
                                           $datos['descripcion']);
            $respuesta = $query->execute();
            $query->close();
            
            return $respuesta;
        }

        //Funcion para proporcionar el ID del usuario que inció sesión
        public function obteneridUsuario($idUsuario)
        {
            $conexion = Conexion::conectar();
            $sql = "SELECT
                        usuarios.id_usuario AS idUsuario
                    FROM  t_usuarios AS usuarios
                         INNER JOIN
                        t_reportes AS reportes ON usuarios.id_usuario = reportes.id_usuario AND usuarios.id_usuario = '$idUsuario'";
            $respuesta = mysqli_query($conexion, $sql);
            $idusuario = mysqli_fetch_array($respuesta)['idUsuario'];
            return $idusuario;
        }




        public function obtenerDatosUsuario($idUsuario)
        {
            $conexion = Conexion::conectar();
            $sql = "SELECT DISTINCT
                            usuarios.id_usuario AS idUsuario
                    FROM
                            t_usuarios AS usuarios
                        INNER JOIN
                            t_reportes AS reportes ON usuarios.id_usuario = reportes.id_usuario
                        AND usuarios.id_usuario = '$idUsuario'";

            $respuesta = mysqli_query($conexion, $sql);
            $usuario = mysqli_fetch_array($respuesta);

            $datos = array (
                'idUsuario' => $usuario['idUsuario']
            );
            return $datos;
        }
}

        
?>