<?php

    include_once 'conexion.php';

    class loginC {
        var $obj_conexion;

        public function __construct(){
            $conexion = new conexion(); 

            $this -> obj_conexion = $conexion -> establecerConexion();
        }

        public function GetPreguntasSeguridad($idusuario)
        {
            $sql = "SELECT pregunta 
                    FROM usuario_posee_preguntas upp 
                    JOIN pregunta p ON (p.codigo_pregunta = upp.pregunta_codigo_pregunta)
                    WHERE usuario_id_usuario = '".$idusuario."'";

            $resultado = $this->obj_conexion->query($sql);

            $cont = 0;

            $array2 = array();

            while ($row = $resultado -> fetch_array())
            {
                $array2[$cont] = utf8_encode($row[0]);
                $cont++;
            }

            return $array2;
        }

        public function GetRespuestas_PreguntasSeguridad($idusuario)
        {
            $sql = "SELECT respuesta 
                    FROM usuario_posee_preguntas upp 
                    JOIN pregunta p ON (p.codigo_pregunta = upp.pregunta_codigo_pregunta)
                    WHERE usuario_id_usuario = '".$idusuario."'";

            $resultado = $this->obj_conexion->query($sql);
            $cont = 0;

            $array2 = array();

            while ($row = $resultado -> fetch_array())
            {
                $array2[$cont] = utf8_encode($row[0]);
                $cont++;
            }

            return $array2;
        }

        public function Acceso($idusuario, $contra)
        {
            $sql = "SELECT COUNT(*) 
                    FROM usuario 
                    WHERE id_usuario = '".$idusuario."' AND contrasenna = '".$contra."';";

            $resultado = $this->obj_conexion->query($sql);
            $array = $resultado -> fetch_array(); 

            return $array[0]; 
        }
    }

?>