<?php
    include_once '../clases/paciente.php';

    $paciente = new paciente(); 

    $paciente -> setCedula($_POST["cedulaNuevoPaciente"]);
    $paciente -> setNombre($_POST["nombreNuevoPaciente"]);
    $paciente -> setApellido_1($_POST["apellido1NuevoPaciente"]);
    $paciente -> setApellido_2($_POST["apellido2NuevoPaciente"]);
    $paciente -> setFechaNacimiento($_POST["nacimientoNuevoPaciente"]);
    $paciente -> setNacionalidad($_POST["nacionalidadNuevoPaciente"]);
    $paciente -> setTelefono_1($_POST["telefono1NuevoPaciente"]);
    if ($_POST["telefono2NuevoPaciente"] == '')
    {
        $paciente -> setTelefono_2(0);
    }
    else {
        $paciente -> setTelefono_2($_POST["telefono2NuevoPaciente"]);
    }
    $paciente -> setExt($_POST["extNuevoPaciente"]);
    $paciente -> setOcupacion($_POST["ocupacionNuevoPaciente"]);
    if($_POST["provinciaNuevoPaciente"] == 'N/A')
    {
        $paciente -> setProvincia(-1);
    } 
    else
    {
        $paciente -> setProvincia($_POST["provinciaNuevoPaciente"]);
    }
    if ($_POST["cantonNuevoPaciente"] == 'N/A')
    {
        $paciente -> setCanton(-1);
    }
    else
    {
        $paciente -> setCanton($_POST["cantonNuevoPaciente"]);
    }
    if ($_POST["distritoNuevoPaciente"] == 'N/A')
    {
        $paciente -> setDistrito(-1);
    }
    else
    {
        $paciente -> setDistrito($_POST["distritoNuevoPaciente"]); 
    }

    $paciente -> setApodo($_POST["apodoNuevoPaciente"]);
    $paciente -> setRecomendado($_POST["recomendadoPacienteNuevo"]);
    $paciente -> setDetallesAdicionales($_POST["detallesAdicionalesPacienteNuevo"]);

    if ($paciente -> CedulaNoExiste($paciente -> getCedula()))
    {
        $resultadoInsercion = $paciente -> AgregarPaciente($paciente);

        if ($resultadoInsercion)
        {
            echo '<script>alert("'.$paciente -> getNombre().' '.$paciente -> getApellido_1().' '.$paciente -> getApellido_2().' ha sido adicionado(a) al sistema. Volviendo a pacientes...")</script>';
            echo "<script>window.setTimeout(function() {window.location.href = '../html/pacientes.php';}, 0);</script>";
        } 
        else
        {
            echo '<script>alert("El paciente no ha podido ser ingresado. Favor intentar más tarde.")</script>';
            echo "<script>window.setTimeout(function() {window.location.href = '../html/pacientes.php';}, 0);</script>";
        }
    }
    else 
    {
        echo '<script>alert("La cédula ya se encuentra registrada en el sistema. Favor introducir una cédula diferente. Regresando a pacientes...")</script>';
        echo "<script>window.setTimeout(function() {window.location.href = '../html/pacientes.php';}, 0);</script>";
    }
?>
