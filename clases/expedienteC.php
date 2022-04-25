<?php
    include_once 'conexion.php';
    
    class expedienteC
    {
        var $obj_conexion; 

        var $idExpediente;

        var $diabetes,
            $artritis,
            $trastornos_renales, 
            $alergia_aspirina, 
            $alergia_sulfas, 
            $reacciones_anestesia,
            $sangrado_prolongado, 
            $desmayos, 
            $detalleTratamiento, 
            $otrosPadecimientos,
            $otrasAlergias,
            $cedulaPaciente;


        public function __construct()
        {
            $conexion = new conexion();

            $this -> obj_conexion = $conexion -> establecerConexion();
        }

        public function ModificarExpediente($expediente)
        {
            $sql = "UPDATE expediente SET
                    diabetes = ".$expediente -> getDiabetes().",
                    artritis = ".$expediente -> getArtritis().",
                    trastornos_renales = ".$expediente -> getTrastornosRenales().",
                    alergia_aspirina = ".$expediente -> getAlergiaAspirina().",
                    alergia_sulfas = ".$expediente -> getAlergiaSulfas().",
                    reacciones_anestesia = ".$expediente -> getReaccionesAnestesia().",
                    sangrado_prolongado = ".$expediente -> getSangradoProlongado().",
                    desmayos = ".$expediente -> getDesmayos().",
                    ultima_actualizacion = SYSDATE(),
                    detalle_tratamiento = '".$expediente -> getDetalleTratamiento()."',
                    otros_padecimientos = '".$expediente -> getOtrosPadecimientos()."',
                    otras_alergias = '".$expediente -> getOtrasAlergias()."'
                    WHERE id_expediente = ".$expediente -> getIdExpediente().";
                    ";
            
            return $this->obj_conexion->query($sql);
        }

        public function GetExpediente($idExpediente)
        {
            $sql = "SELECT * 
                    FROM expediente
                    WHERE id_expediente = ".$idExpediente.";";

            return $this -> obj_conexion -> query($sql);
        }

        public function GetExpedientes()
        {
            $sql = "SELECT id_expediente, nombre, apellido_1, apellido_2, fecha_creacion, ultima_actualizacion
                    FROM expediente ex
                    JOIN paciente pa ON (pa.cedula=ex.paciente_cedula);";

            return $this -> obj_conexion -> query($sql);
        }

        public function GetNumeroExpediente_Paciente($cedula)
        {
            $sql = "SELECT id_expediente 
                    FROM expediente
                    WHERE paciente_cedula = ".$cedula.";";
                
            return $this -> obj_conexion -> query($sql);
        }

        public function GenerarIdExpediente()
        {
            $coincidencia = 1;
            $id = 0;

            while ($coincidencia!=0)
            {
                $id = rand(10000, 99999);

                $sql = "SELECT COUNT(*) as CONTEO 
                    FROM expediente
                    WHERE id_expediente = ".$id .";";

                $resultado = $this -> obj_conexion -> query($sql);
                $arrayRes = $resultado -> fetch_assoc();

                $coincidencia = $arrayRes["CONTEO"];
            }

            return $id;
        }

        public function CrearExpediente($expediente)
        {
            $this -> idExpediente = $this->GenerarIdExpediente();

            $sql = "INSERT INTO expediente VALUES(
                ".$this->idExpediente.",
                ".$expediente -> getDiabetes().",
                ".$expediente -> getArtritis().",
                ".$expediente -> getTrastornosRenales().",
                ".$expediente -> getAlergiaAspirina().",
                ".$expediente -> getAlergiaSulfas().",
                ".$expediente -> getReaccionesAnestesia().",
                ".$expediente -> getSangradoProlongado().",
                ".$expediente -> getDesmayos().",
                SYSDATE(),
                SYSDATE(),
                CONCAT(SYSDATE(), ': ', '".$expediente -> getDetalleTratamiento()."'),
                '".$expediente -> getOtrosPadecimientos()."',
                '".$expediente -> getOtrasAlergias()."',
                ".$expediente -> getCedulaPaciente()."
            );";

            echo $sql;

            $this ->obj_conexion->set_charset("utf8");

            return $this -> obj_conexion -> query($sql);

        }

        public function getIdExpediente() {
            return $this -> idExpediente;
        }

        public function setIdExpediente($idExp) {
            $this -> idExpediente = $idExp;
        }

        public function getDiabetes() {
            return $this -> diabetes;
        }
    
        public function setDiabetes($diabetes) {
            $this -> diabetes = $diabetes;
        }

        public function getArtritis() {
            return $this -> artritis;
        }
    
        public function setArtritis($artritis) {
            $this -> artritis = $artritis;
        }

        public function getTrastornosRenales() {
            return $this -> trastornos_renales;
        }
    
        public function setTrastornosRenales($trastornos_renales) {
            $this -> trastornos_renales = $trastornos_renales;
        }

        public function getAlergiaAspirina() {
            return $this -> alergia_aspirina;
        }
    
        public function setAlergiaAspirina($alergia_aspirina) {
            $this -> alergia_aspirina = $alergia_aspirina;
        }

        public function getAlergiaSulfas() {
            return $this -> alergia_sulfas;
        }
    
        public function setAlergiaSulfas($alergia_sulfas) {
            $this -> alergia_sulfas = $alergia_sulfas;
        }

        public function getReaccionesAnestesia() {
            return $this -> reacciones_anestesia;
        }
    
        public function setReaccionesAnestesia($reacciones_anestesia) {
            $this -> reacciones_anestesia = $reacciones_anestesia;
        }

        public function getSangradoProlongado() {
            return $this -> sangrado_prolongado;
        }
    
        public function setSangradoProlongado($sangrado_prolongado) {
            $this -> sangrado_prolongado = $sangrado_prolongado;
        }

        public function getDesmayos() {
            return $this -> desmayos;
        }
    
        public function setDesmayos($desmayos) {
            $this -> desmayos = $desmayos;
        }

        public function getDetalleTratamiento() {
            return $this -> detalleTratamiento;
        }
    
        public function setDetalleTratamiento($detalleTratamiento) {
            $this -> detalleTratamiento = $detalleTratamiento;
        }

        public function getOtrosPadecimientos() {
            return $this -> otrosPadecimientos;
        }
    
        public function setOtrosPadecimientos($otrosPadecimientos) {
            $this -> otrosPadecimientos = $otrosPadecimientos;
        }

        public function getOtrasAlergias() {
            return $this -> otrasAlergias;
        }
    
        public function setOtrasAlergias($otrasAlergias) {
            $this -> otrasAlergias = $otrasAlergias;
        }

        public function getCedulaPaciente() {
            return $this -> cedulaPaciente;
        }
    
        public function setCedulaPaciente($cedulaPaciente) {
            $this -> cedulaPaciente = $cedulaPaciente;
        }
    }
?>