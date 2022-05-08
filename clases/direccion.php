<?php
    include_once 'conexion.php';

    class direccion 
    {
        var $obj_conexion; 

        public function __construct()
        {
            $conexion = new conexion();

            $this -> obj_conexion = $conexion -> establecerConexion();
        }

        public function GetProvincias()
        {
            $sql = "SELECT *
                    FROM provincia
                    WHERE codigo_provincia != -1;";

            return $this -> obj_conexion ->query($sql);
        }

        public function GetCantones()
        {
            $sql = "SELECT *
                    FROM canton
                    WHERE codigo_canton != -1;";

            return $this -> obj_conexion ->query($sql);
        }

        public function GetDistritos()
        {
            $sql = "SELECT *
                    FROM distrito
                    WHERE codigo_distrito != -1
                    ORDER BY nombre_distrito;";

            return $this -> obj_conexion ->query($sql);
        }

        public function GetNombreProvincia($idProvincia)
        {
            $sql = "SELECT nombre_provincia 
                    FROM provincia
                    WHERE codigo_provincia = ".$idProvincia.";";

            $resultado = $this -> obj_conexion -> query($sql);

            $arrayResultado = $resultado -> fetch_assoc();

            return utf8_encode($arrayResultado["nombre_provincia"]);
        }

        public function GetNombreCanton($idCanton)
        {
            $sql = "SELECT nombre_canton 
                    FROM canton
                    WHERE codigo_canton = ".$idCanton.";";

            $resultado = $this -> obj_conexion -> query($sql);

            $arrayResultado = $resultado -> fetch_assoc();

            return utf8_encode($arrayResultado["nombre_canton"]);
        }

        public function GetNombreDistrito($idDistrito)
        {
            $sql = "SELECT nombre_distrito
                    FROM distrito
                    WHERE codigo_distrito = ".$idDistrito.";";

            $resultado = $this -> obj_conexion -> query($sql);

            $arrayResultado = $resultado -> fetch_assoc();

            return utf8_encode($arrayResultado["nombre_distrito"]);
        }
    }
?>