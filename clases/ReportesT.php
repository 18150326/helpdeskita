<?php

    include "conexion.php";

    class ReportesT extends conexion
    {
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
            
            $sql1= "UPDATE t_reportes
                    SET estado = 3
                    WHERE id_reporte = idReporte";

            $query = $conexion->prepare($sql);
            $query1 = $conexion->prepare($sql1);
            $query->bind_param("iissssssss", $datos['idReporte'],
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
            $query1->execute();
            return $respuesta;
        }

    }

?>