<?php
    include_once '../clases/conexion.php';

    class recuperacion 
    {
        private $pregunta_1, $pregunta2, $pregunta3; 
        var $obj_conexion; 

        public function __construct()
        {
            $conexion = new conexion(); 

            $this->obj_conexion = $conexion -> establecerConexion();
        }

        public function GetPregunta_1()
        {
            return $this->pregunta_1;
        }

        public function GetPregunta_2()
        {
            return $this->pregunta_2;
        }

        public function GetPregunta_3()
        {
            return $this->pregunta_3;
        }

        
        public function SetPregunta_1($preg)
        {
            $this->pregunta_1 = $preg;
        }

        public function SetPregunta_2($preg)
        {
            $this->pregunta_2 = $preg;
        }

        public function SetPregunta_3($preg)
        {
            $this->pregunta_3 = $preg;
        }

        public function ActualizarContrasenna($idusuario, $nuevaContra)
        {
            $sql = "UPDATE usuario SET contrasenna = '".$nuevaContra."' 
                    WHERE id_usuario = '".$idusuario."';";
            
            $resultado = $this->obj_conexion->query($sql);
            return $resultado;
        }
    }
?>
