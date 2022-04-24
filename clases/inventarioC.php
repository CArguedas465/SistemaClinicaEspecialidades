<?php

    include_once 'conexion.php';

    class inventarioC {
        var $obj_conexion;

        public function __construct(){
            $conexion = new conexion(); 

            $this -> obj_conexion = $conexion -> establecerConexion();
        }

        public function GetInventario()
        {
            $sql = "SELECT *
                    FROM inventario";

            return $this -> obj_conexion -> query($sql);
        }

        public function ActualizarDatoInventario($idpieza, $nuevaCantidad)
        {
            $sql = "UPDATE inventario SET cantidad = ".$idpieza."
                     WHERE id_pieza = ".$nuevaCantidad.";";
                             
            return $this -> obj_conexion -> query($sql);
        }
    }

?>