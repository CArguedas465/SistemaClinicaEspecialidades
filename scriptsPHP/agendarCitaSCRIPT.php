<?php
    include_once '../clases/cita.php';
    include_once '../clases/paciente.php';
    include_once '../clases/procedimiento.php';

    $cita = new cita(); 

    $cita -> setFecha($_POST["fecha"]);
    $cita -> setHora($_POST["hora"]);
    $cita -> setDescripcionAdicional($_POST["descripcionAdicional"]);
    $cita -> setProcedimiento($_POST["procedimiento"]);
    $cita -> setPacienteCedula($_POST["cedula"]);
    $cita -> setUrgencia($_POST["urgente"]);

    $paciente = new paciente(); 

    if ($paciente -> CedulaNoExiste($cita -> getPacienteCedula()))
    {
        echo '<script>alert("Para poder agendar una cita, el paciente debe haber sido previamente registrado en el sistema. Favor ir a menú PACIENTES para efectuar el registro previo a agendar una cita.")</script>';
        echo "<script>window.setTimeout(function() {window.location.href = '../html/agendarCita.php';}, 0);</script>";
    }
    else
    {
        $procedimiento = new procedimiento();

        $doctor = $procedimiento -> GetDoctorParaProcedimiento($cita -> getProcedimiento());

        $resultadoInsercion = $cita -> CrearCita($cita, $doctor);

        if ($resultadoInsercion)
        {
            echo '<script>alert("Cita # '.$cita -> getCodigoCita().' para el paciente '.$cita -> getPacienteCedula().' ha sido agregada al sistema.")</script>';
            echo "<script>window.setTimeout(function() {window.location.href = '../html/citasDoctor.php';}, 0);</script>";
        } 
        else
        {
            echo '<script>alert("No se ha podido agregar la cita al sistema. Favot intentar más tarde.")</script>';
            //echo "<script>window.setTimeout(function() {window.location.href = '../html/agendarCita.php';}, 0);</script>";
        }
    }


?>