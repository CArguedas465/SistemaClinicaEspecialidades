<?php
    include_once '../clases/expedienteC.php';
    include_once '../clases/paciente.php';
;
    $expediente = new expedienteC(); 

    $expediente -> setCedulaPaciente($_POST["cedulaPaciente"]);
    $expediente -> setDiabetes($_POST["diabetes"]);
    $expediente -> setArtritis($_POST["artritis"]);
    $expediente -> setTrastornosRenales($_POST["renales"]);
    $expediente -> setAlergiaAspirina($_POST["alergiaAspirina"]);
    $expediente -> setAlergiaSulfas($_POST["alergiaSulfas"]);
    $expediente -> setOtrasAlergias($_POST["alergiaOtros"]);
    $expediente -> setReaccionesAnestesia($_POST["reaccionesAnestesia"]);
    $expediente -> setSangradoProlongado($_POST["sangradoProlongado"]);
    $expediente -> setDesmayos($_POST["desmayos"]);
    $expediente -> setOtrosPadecimientos($_POST["otrosPadecimientos"]);
    $expediente -> setDetalleTratamiento($_POST["detalleTratamiento"]);

    $resultadoInsercion = $expediente -> CrearExpediente($expediente);

    if ($resultadoInsercion)
    {
        $paciente = new paciente();

        $paciente -> AjustarEstadoExpediente($expediente -> getCedulaPaciente(), 1);

        echo '<script>alert("Expediente # '.$expediente -> getIdExpediente().' para el(la) paciente '.$expediente -> getCedulaPaciente().' ha sido creado. Volviendo a pacientes...")</script>';
        echo "<script>window.setTimeout(function() {window.location.href = '../html/pacientes.php';}, 0);</script>";
    }
    else
    {
        echo '<script>alert("No se ha podido crear expediente. Intentar más tarde.")</script>';
        //echo "<script>window.setTimeout(function() {window.location.href = '../html/pacientes.php';}, 0);</script>";
    }
?>