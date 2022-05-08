<?php 
    include_once 'conexion.php';
    class paciente 
    {
        var $obj_conexion; 
        var $cedula,
            $nombre, 
            $apellido_1,
            $apellido_2,
            $fechaNacimiento,
            $nacionalidad, 
            $telefono1,
            $telefono2,
            $ext, 
            $ocupacion, 
            $provincia,
            $canton,
            $distrito, 
            $apodo,
            $recomendado,
            $detallesAdicionales;
    

        public function __construct()
        {
            $conexion = new conexion(); 

            $this -> obj_conexion = $conexion -> establecerConexion();
        }

        public function AgregarPaciente($paciente)
        {
            $sql = 
            "INSERT INTO paciente VALUES (
                ".$paciente -> getCedula().",
                '".$paciente -> getNombre()."',
                '".$paciente -> getApellido_1()."',
                '".$paciente -> getApellido_2()."',
                DATE('".$paciente -> getFechaNacimiento()."'),
                '".$paciente -> getNacionalidad()."',
                ".$paciente -> getTelefono_1().",
                ".$paciente -> getTelefono_2().",
                '".$paciente -> getExt()."',
                '".$paciente -> getOcupacion()."',
                '".$paciente -> getApodo()."',
                '".$paciente -> getRecomendado()."',
                '".$paciente -> getDetallesAdicionales()."',
                ".$paciente -> getProvincia().",
                ".$paciente -> getCanton().",
                ".$paciente -> getDistrito().",
                0
            );"
            ;

            $this ->obj_conexion->set_charset("utf8");

            return $this->obj_conexion ->query($sql);
        }

        public function GetPacientePorCedula($cedula)
        {
            $sql = "SELECT * 
                    FROM paciente
                    WHERE cedula = ".$cedula.";";
            
            return $this -> obj_conexion -> query($sql);
        }

        public function GetPacientes()
        {
            $sql = "SELECT *
                    FROM paciente;";
            
            return $this -> obj_conexion -> query($sql);
        }

        public function CedulaNoExiste($cedula)
        {
            $sql = "SELECT COUNT(*) as Conteo FROM paciente
                    WHERE cedula = ".$cedula.";";

            $resultado = $this->obj_conexion -> query($sql);

            $arrayResultado = $resultado -> fetch_assoc();

            if ($arrayResultado["Conteo"]==0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function AjustarEstadoExpediente($cedula, $estado)
        {
            $sql = "UPDATE paciente SET poseeExpediente =".$estado."
                    WHERE cedula = ".$cedula.";";

            return $this -> obj_conexion -> query($sql);
        }

        public function getCedula() {
            return $this -> cedula;
        }
    
        public function setCedula($cedula) {
            $this -> cedula = $cedula;
        }

        public function getNombre() {
            return $this -> nombre;
        }
    
        public function setNombre($nombre) {
            $this -> nombre = $nombre;
        }

        public function getApellido_1() {
            return $this -> apellido_1;
        }
    
        public function setApellido_1($apellido_1) {
            $this -> apellido_1 = $apellido_1;
        }
        public function getApellido_2() {
            return $this -> apellido_2;
        }
    
        public function setApellido_2($apellido_2) {
            $this -> apellido_2 = $apellido_2;
        }
        public function getFechaNacimiento() {
            return $this -> fechaNacimiento;
        }
    
        public function setFechaNacimiento($fechaNacimiento) {
            $this -> fechaNacimiento = $fechaNacimiento;
        }
        public function getNacionalidad() {
            return $this -> nacionalidad;
        }
    
        public function setNacionalidad($nacionalidad) {
            $this -> nacionalidad = $nacionalidad;
        }
        public function getTelefono_1() {
            return $this -> telefono1;
        }
    
        public function setTelefono_1($telefono1) {
            $this -> telefono1 = $telefono1;
        }
        public function getTelefono_2() {
            return $this -> telefono2;
        }
    
        public function setTelefono_2($telefono2) {
            $this -> telefono2 = $telefono2;
        }
        public function getExt() {
            return $this -> ext;
        }
    
        public function setExt($ext) {
            $this -> ext = $ext;
        }
        public function getOcupacion() {
            return $this -> ocupacion;
        }
    
        public function setOcupacion($ocupacion) {
            $this -> ocupacion = $ocupacion;
        }
        public function getProvincia() {
            return $this -> provincia;
        }
    
        public function setProvincia($provincia) {
            $this -> provincia = $provincia;
        }
        public function getCanton() {
            return $this -> canton;
        }
    
        public function setCanton($canton) {
            $this -> canton = $canton;
        }
        public function getDistrito() {
            return $this -> distrito;
        }
    
        public function setDistrito($distrito) {
            $this -> distrito = $distrito;
        }
        public function getApodo() {
            return $this -> apodo;
        }
    
        public function setApodo($apodo) {
            $this -> apodo = $apodo;
        }
        public function getRecomendado() {
            return $this -> recomendado;
        }
    
        public function setRecomendado($recomendado) {
            $this -> recomendado = $recomendado;
        }
        public function getDetallesAdicionales() {
            return $this -> detallesAdicionales;
        }
    
        public function setDetallesAdicionales($detallesAdicionales) {
            $this -> detallesAdicionales = $detallesAdicionales;
        }
    }
?>