<?php

    class conexion
    {
        public function conectar() 
        {
            $servidor = "b1o04dzhm1guhvmjcrwb-mysql.services.clever-cloud.com";
            $usuario = "ulpt7sduld7rn0so";
            $password = "88bFiBTpsfGsC3WbaBaT";
            $db = "b1o04dzhm1guhvmjcrwb";
            $conexion = mysqli_connect($servidor,$usuario,$password,$db);

            return $conexion;
        }
    }
?>