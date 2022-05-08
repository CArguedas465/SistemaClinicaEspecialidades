<?php
    include_once 'conexion.php';
    class cita {
        var $obj_conexion;

        var $codigo_cita, 
            $fecha, 
            $hora, 
            $descripcionAdicional,
            $procedimiento, 
            $pacienteCedula,
            $urgente;

        public function __construct()
        {
            $conexion = new conexion(); 

            $this -> obj_conexion = $conexion -> establecerConexion(); 
        }

        public function GetCitas()
        {
            $sql = "SELECT codigo_cita, p.nombre, p.apellido_1, apellido_2, nombre_procedimiento, descripcion_adicional, SUBSTRING_INDEX(fecha, ' ', 1) AS Fecha, SUBSTRING_INDEX(fecha, ' ', -1) AS Hora, urgente, doc.nombre AS nomDoctor, doc.apellido_1 AS apeDoctor
                    FROM cita c
                    JOIN paciente p ON (c.paciente_cedula = p.cedula) 
                    JOIN procedimiento pr ON (pr.id_procedimiento = c.procedimiento_id_procedimiento)
                    JOIN doctor doc ON (c.doctor_codigo_doctor = doc.codigo_doctor);";

            return $this -> obj_conexion -> query($sql);
        }

        public function GenerarIdCita()
        {
            $coincidencia = 1;
            $id = 0;

            while ($coincidencia!=0)
            {
                $id = rand(10000, 99999);

                $sql = "SELECT COUNT(*) as CONTEO 
                    FROM cita
                    WHERE codigo_cita = ".$id .";";

                $resultado = $this -> obj_conexion -> query($sql);
                $arrayRes = $resultado -> fetch_assoc();

                $coincidencia = $arrayRes["CONTEO"];
            }

            return $id;
        }

        public function CrearCita($cita, $doctorSeleccionado)
        {
            $this -> codigo_cita = $this -> GenerarIdCita();

            $sql = "INSERT INTO cita VALUES(
                ".$this -> codigo_cita.",
                '".$cita -> getFecha()." ".$cita -> getHora()."',
                '".$cita -> getDescripcionAdicional()."',
                ".$doctorSeleccionado.",
                ".$cita -> getProcedimiento().",
                ".$cita -> getUrgencia().",
                ".$cita -> getPacienteCedula()."
            );";

            echo $sql;

            return $this -> obj_conexion -> query($sql);
        }


        public function ModificarCita($idCita, $nuevaFecha, $nuevaHora, $comentariosDoctor)
        {
            $sql = "UPDATE cita SET 
                    fecha = '".$nuevaFecha." ".$nuevaHora."', 
                    descripcion_adicional = CONCAT(descripcion_adicional, ',   ACTUALIZACIÓN ', SYSDATE(), '-> ', '".$comentariosDoctor."')
                    WHERE codigo_cita = ".$idCita.";";

            $this ->obj_conexion->set_charset("utf8");

            return $this-> obj_conexion -> query($sql);
        }

        public function CancelarCita($idCita)
        {
            $sql = "DELETE FROM cita WHERE codigo_cita = ".$idCita.";";

            return $this -> obj_conexion -> query($sql);
        }

        public function getCodigoCita() {
            return $this -> codigo_cita;
        }
    
        public function setCodigoCita($codigo_cita) {
            $this -> codigo_cita = $codigo_cita;
        }

        public function getFecha() {
            return $this -> fecha;
        }
    
        public function setFecha($fecha) {
            $this -> fecha = $fecha;
        }

        public function getHora() {
            return $this -> hora;
        }
    
        public function setHora($hora) {
            $this -> hora = $hora;
        }

        public function getDescripcionAdicional() {
            return $this -> descripcionAdicional;
        }
    
        public function setDescripcionAdicional($descripcionAdicional) {
            $this -> descripcionAdicional = $descripcionAdicional;
        }

        public function getProcedimiento() {
            return $this -> procedimiento;
        }
    
        public function setProcedimiento($procedimiento) {
            $this -> procedimiento = $procedimiento;
        }

        public function getPacienteCedula() {
            return $this -> pacienteCedula;
        }
    
        public function setPacienteCedula($pacienteCedula) {
            $this -> pacienteCedula = $pacienteCedula;
        }

        public function getUrgencia()
        {
            return $this -> urgente;
        }

        public function setUrgencia($urgencia)
        {
            $this -> urgente = $urgencia;
        }
    }
?>