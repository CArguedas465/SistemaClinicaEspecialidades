<?php
    session_start(); 
    include_once '../clases/expedienteC.php';

    $idExpediente = $_POST["numeroExpedientePaciente"];

    $expediente = new expedienteC(); 

    $resultado = $expediente -> GetExpediente($idExpediente);

    $datosExpediente = $resultado -> fetch_assoc(); 

    $expediente -> setIdExpediente($idExpediente);
    $expediente -> setDiabetes($datosExpediente["diabetes"]);
    $expediente -> setArtritis($datosExpediente["artritis"]);
    $expediente -> setTrastornosRenales($datosExpediente["trastornos_renales"]);
    $expediente -> setAlergiaAspirina($datosExpediente["alergia_aspirina"]);
    $expediente -> setAlergiaSulfas($datosExpediente["diabetes"]);
    $expediente -> setReaccionesAnestesia($datosExpediente["alergia_sulfas"]);
    $expediente -> setSangradoProlongado($datosExpediente["sangrado_prolongado"]);
    $expediente -> setDesmayos($datosExpediente["desmayos"]);
    $expediente -> setDetalleTratamiento($datosExpediente["detalle_tratamiento"]);
    $expediente -> setOtrosPadecimientos($datosExpediente["otros_padecimientos"]);
    $expediente -> setOtrasAlergias($datosExpediente["otras_alergias"]);

    $_SESSION["mostrarDetalleExpediente"]=true; 
    $_SESSION["expedienteDetallado"]= serialize($expediente);

    echo "<script>window.setTimeout(function() {window.location.href = '../html/expediente.php';}, 0);</script>";
    



    

    

?>