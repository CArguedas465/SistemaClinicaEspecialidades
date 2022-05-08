<?php
    session_start(); 
    include_once '../clases/paciente.php';
    include_once '../clases/direccion.php';

    $paciente = new paciente();

    $resultado = $paciente -> GetPacientePorCedula($_POST["cedulaPacienteDetalle"]);

    $arrayResultado = $resultado -> fetch_assoc(); 

    $paciente -> setCedula(utf8_encode($arrayResultado["cedula"]));
    $paciente -> setNombre(utf8_encode($arrayResultado["nombre"]));
    $paciente -> setApellido_1(utf8_encode($arrayResultado["apellido_1"]));
    $paciente -> setApellido_2(utf8_encode($arrayResultado["apellido_2"]));
    $paciente -> setFechaNacimiento(utf8_encode($arrayResultado["fecha_nacimiento"]));
    $paciente -> setNacionalidad(utf8_encode($arrayResultado["nacionalidad"]));
    $paciente -> setTelefono_1(utf8_encode($arrayResultado["telefono_1"]));
    $paciente -> setTelefono_2(utf8_encode($arrayResultado["telefono_2"]));
    $paciente -> setExt(utf8_encode($arrayResultado["extension"]));
    $paciente -> setOcupacion(utf8_encode($arrayResultado["ocupacion"]));
    $paciente -> setApodo(utf8_encode($arrayResultado["apodo"]));
    $paciente -> setRecomendado(utf8_encode($arrayResultado["recomendadopor"]));
    $paciente -> setDetallesAdicionales(utf8_encode($arrayResultado["detalles_adicionales"]));

    $direccion = new direccion(); 

    $paciente -> setProvincia($direccion -> GetNombreProvincia($arrayResultado["provincia_codigo_provincia"]));
    $paciente -> setCanton($direccion -> GetNombreCanton($arrayResultado["canton_codigo_canton"]));
    $paciente -> setDistrito($direccion -> GetNombreDistrito($arrayResultado["distrito_codigo_distrito"]));

    $_SESSION["mostrarDetallePaciente"] = true; 
    $_SESSION["pacienteConDetalle"] = serialize($paciente);

    echo "<script>window.setTimeout(function() {window.location.href = '../html/pacientes.php';}, 0);</script>";

?>