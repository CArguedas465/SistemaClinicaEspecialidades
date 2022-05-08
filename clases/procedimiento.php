<?php
    include_once 'conexion.php';

    class procedimiento
    {
        var $obj_conexion;

        public function __construct()
        {
            $conexion = new conexion();

            $this -> obj_conexion = $conexion -> establecerConexion();
        }

        public function GetProcedimientos()
        {
            $sql = "SELECT *
                    FROM procedimiento;";

            return $this -> obj_conexion -> query($sql);
        }

        public function GetDoctorParaProcedimiento($codigo_procedimiento)
        {
            $sql = "SELECT codigo_doctor 
                    FROM doctor 
                    WHERE especialidad_codigo_especialidad = 
                        (SELECT especialidad_asociada 
                        FROM procedimiento 
                        WHERE id_procedimiento = ".$codigo_procedimiento."); ";

            $resultado = $this->obj_conexion ->query($sql);

            $cont = 0;

            $arrayDoctores = array();

            while ($row = $resultado -> fetch_array())
            {
                $arrayDoctores[$cont] = $row[0];
                $cont++;
            }

            $doctorAleatorio = rand(0, sizeof($arrayDoctores));

            return $arrayDoctores[$doctorAleatorio];
        }
    }
?>