<?php
    include_once '../clases/expedienteC.php';

    $expediente = new expedienteC(); 

    $expediente -> setIdExpediente($_POST["numeroExpediente"]);
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

    $resultado = $expediente -> ModificarExpediente($expediente);

    if ($resultado)
    {
        echo '<script>alert("Expediente # '.$expediente -> getIdExpediente().' ha sido modificado. Volviendo a expedientes...")</script>';
        echo "<script>window.setTimeout(function() {window.location.href = '../html/expediente.php';}, 0);</script>";
    }
    else
    {
        echo '<script>alert("No se ha podido modificar el expediente. Intentar más tarde.")</script>';
        echo "<script>window.setTimeout(function() {window.location.href = '../html/expediente.php';}, 0);</script>";
    }


?>