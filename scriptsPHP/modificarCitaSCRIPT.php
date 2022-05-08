<?php
    include_once '../clases/cita.php';

    echo var_dump($_POST);

    $idCita = $_POST["idCita"];
    $nuevaFecha = $_POST["fecha"];
    $nuevaHora = $_POST["hora"];
    $programadaOCancelada = $_POST["programadaOCancelada"];
    $comentariosDoctor = $_POST["comentariosDoctor"];

    $cita = new cita();

    if ($programadaOCancelada==1) //Se cambia cita
    {
        $resultado = $cita -> ModificarCita($idCita, $nuevaFecha, $nuevaHora, $comentariosDoctor);

        if ($resultado)
        {
            echo '<script>alert("Cita # '.$idCita.' modificada correctamente. Regresando al menú de citas...")</script>';
            echo "<script>window.setTimeout(function() {window.location.href = '../html/citasDoctor.php';}, 0);</script>";
        }
        else
        {
            echo '<script>alert("No se ha podido modificar la cita. Intentar más tarde.")</script>';
            echo "<script>window.setTimeout(function() {window.location.href = '../html/citasDoctor.php';}, 0);</script>";
        }
    }
    else //Se cancela cita
    {
        $resultado = $cita -> CancelarCita($idCita);

        if ($resultado)
        {
            echo '<script>alert("Cita # '.$idCita.' ha sido cancelada y removida de la lista de citas. Regresando al menú de citas...")</script>';
            echo "<script>window.setTimeout(function() {window.location.href = '../html/citasDoctor.php';}, 0);</script>";
        }
        else
        {
            echo '<script>alert("No se ha podido cancelar la cita. Intentar más tarde.")</script>';
            echo "<script>window.setTimeout(function() {window.location.href = '../html/citasDoctor.php';}, 0);</script>";
        }
    }
?>