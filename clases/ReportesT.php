<?php

    include "conexion.php";

    class ReportesT extends conexion
    {
        //Funcion para obtener y usar el arreglos con los id reporte
        public function obteneridReporte($idReporte)
        {
            $conexion = Conexion::conectar();
            $sql = "SELECT 
                            reportes.id_reporte as idReporte,
                            reportes.estado as estado
                    FROM
                            t_reportes as reportes
                    WHERE
                            reportes.estado = 1";
            $respuesta = mysqli_query($conexion, $sql);
            $idreporte = mysqli_fetch_array($respuesta)['idReporte'];
            return $idreporte;
        }


        //funcion para extraer un arreglo con los id de reportes que esten pendientes
        public function obtenerDatosreporte($idReporte)
        {
            $conexion = Conexion::conectar();
            $sql = "SELECT 
                            reportes.id_reporte as idReporte,
                            reportes.estado as estado
                    FROM
                            t_reportes as reportes
                    WHERE
                            reportes.estado = 1";

            $respuesta = mysqli_query($conexion, $sql);
            $reporte = mysqli_fetch_array($respuesta);

            $datos = array (
                'idReporte' => $reporte['idReporte']
            );
            return $datos;
        }


        public function terminarReporte($datos)
        {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_reportes_finalizados(id_reporte,
                                                       id_mantenimiento,
                                                       tipo_servicio,
                                                       asignado,
                                                       fecha_realizacion,
                                                       trabajo_realizado,
                                                       verificado_liberado,
                                                       fecha_verificado,
                                                       aprobado,
                                                       fecha_aprobado)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iissssssss", $datos['id_reporte'],
                                             $datos['id_mantenimiento'],
                                             $datos['tipo_servicio'],
                                             $datos['asignado'],
                                             $datos['fecha_realizacion'],
                                             $datos['trabajo_realizado'],
                                             $datos['verificado_liberado'],
                                             $datos['fecha_verificado'],
                                             $datos['aprobado'],
                                             $datos['fecha_aprobado']);
            $respuesta = $query->execute();
            return $respuesta;
        }


        public function actualizarEstadoReporte($datos)
        {
            $conexion = Conexcion::conectar();
            $sql = "UPDATE
                           t_reportes
                    SET
                           estado = 2
                    WHERE
                           t_reportes.id_reporte = '$idReporte'";
            $query = mysqli_query($conexion, $sql);
            $respuesta = $query->execute();
            return $respuesta;
        }

    }

?>