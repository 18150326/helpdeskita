<?php

    include "conexion.php";

    class ReportesT extends conexion
    {
        public function terminarReporte($datos)
        {
            $conexion = Conexion::conectar();
            $sql = "
            INSERT INTO t_reportes_finalizados(id_reporte, id_mantenimiento, tipo_servicio, asignado, fecha_realizacion, 
            trabajo_realizado, verificado_liberado, fecha_verificado, aprobado, fecha_aprobado) 
              VALUES (
              '".$datos['idReporte']."', '".$datos['id_mantenimiento']."', '".$datos['tipo_servicio']."', 
              '".$datos['asignado']."', '".$datos['fecha_realizacion']."', '".$datos['trabajo_realizado']."', 
              '".$datos['verificado_liberado']."', '".$datos['fecha_verificado']."', '".$datos['aprobado']."', 
              '".$datos['fecha_aprobado']."')";
            
            $sql1= "UPDATE t_reportes SET estado = 3
                    WHERE id_reporte = '".$datos['idReporte']."'";

            // echo json_encode($sql1);
            /*echo $sql."</br>";
            echo $sql1."</br>";*/
            $resultado = mysqli_query($conexion,$sql);
            $resultado2 = mysqli_query($conexion,$sql1);

            if($resultado && $resultado2){
              return 1;
            }else{
              return 0;
            }
        }


        public function CambiarEstado($datos)
        {
          $conexion = Conexion::conectar();
          $sql = "UPDATE t_reportes SET estado = 2
          WHERE id_reporte = '".$datos['idReporte']."'";
          $resultado = mysqli_query($conexion,$sql);
          if($resultado){
            return 1;
          }else{
            return 0;
          }
        }

        public function RecogerReporte($datos)
        {
          $conexion = Conexion::conectar();
          $sql = "UPDATE t_reportes_finalizados SET documento_recogido = 2
          WHERE id_reporte = '".$datos['idReporte']."'";
          $resultado = mysqli_query($conexion,$sql);
          if($resultado){
              return 1;
            }else{
              return 0;
            }
        }

    }

?>