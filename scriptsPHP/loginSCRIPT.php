<?php //header('Content-Type: text/html; charset=iso-8859-15'); 

    include_once '../clases/loginC.php';
    include_once '../clases/recuperacion.php';
    session_start();

    $idusuario = $_POST["usuario"];
    $contrasenna = $_POST["contra"];
    $modo = $_POST["modo"];


    $_SESSION["usuarioRestablecer"] = $idusuario; 

    $login = new loginC();
    $recuperacion = new recuperacion(); 

    if ($modo=="0")
    {
        
        $preguntas = $login->GetPreguntasSeguridad($idusuario);

        if (sizeof($preguntas)==0)
        {
            echo '<script>alert("No se ha encontrando ningún usuario con esa identificación. Favor intentar nuevamente.")</script>';
            $_SESSION["EmergentePreguntasUsuario"] = false;
            $_SESSION["usuario"] = null;
            $_SESSION["modo"] = null;
            $_SESSION["contra"] = null;
            echo "<script>window.setTimeout(function() {window.location.href = '../html/login.php';}, 0);</script>";
        }

        // echo $preguntas[0];
        // echo $preguntas[1];
        // echo $preguntas[2];

        $recuperacion->SetPregunta_1($preguntas[0]);
        $recuperacion->SetPregunta_2($preguntas[1]);
        $recuperacion->SetPregunta_3($preguntas[2]);

        $_SESSION["PreguntasUsuario"] = serialize($recuperacion);
        $_SESSION["EmergentePreguntasUsuario"] = true;

        echo "<script>window.setTimeout(function() {window.location.href = '../html/login.php';}, 0);</script>";
        
    } 
    else if ($modo=="0.1")
    {
        $pregunta_1 = strtoupper($_POST["pregunta1_respuesta"]);
        $pregunta_2 = strtoupper($_POST["pregunta2_respuesta"]);
        $pregunta_3 = strtoupper($_POST["pregunta3_respuesta"]);

        $respuestas = $login->GetRespuestas_PreguntasSeguridad($idusuario);

        $respuestas[0] = strtoupper($respuestas[0]);
        $respuestas[1] = strtoupper($respuestas[1]);
        $respuestas[2] = strtoupper($respuestas[2]);

        if (in_array($pregunta_1, $respuestas) and in_array($pregunta_2, $respuestas) and in_array($pregunta_3, $respuestas))
        {
            $nuevaContra = $_POST["contra"];
            $resultadoActualizacion = $recuperacion->ActualizarContrasenna($idusuario, $nuevaContra);

            if ($resultadoActualizacion)
            {
                echo '<script>alert("Respuestas correctas! Gestionando cambio de contraseña y volviendo a pantalla de login...")</script>';
                $_SESSION["EmergentePreguntasUsuario"] = false;
                $_SESSION["usuario"] = null;
                $_SESSION["modo"] = null;
                $_SESSION["contra"] = null;
                echo "<script>window.setTimeout(function() {window.location.href = '../html/login.php';}, 0);</script>";
            }
            else
            {
                echo '<script>alert("Los datos no pueden almacenarse en este momento. Favor intentar más tarde")</script>';
                $_SESSION["EmergentePreguntasUsuario"] = false;
                $_SESSION["usuario"] = null;
                $_SESSION["modo"] = null;
                $_SESSION["contra"] = null;
                echo "<script>window.setTimeout(function() {window.location.href = '../html/login.php';}, 0);</script>";
            }      
        }
        else 
        {
            echo '<script>alert("Respuestas incorrectas. No se ha gestionado el cambio de contraseña. Volviendo a la pantalla de login...")</script>';
            $_SESSION["EmergentePreguntasUsuario"] = false;
            $_SESSION["usuario"] = null;
            $_SESSION["modo"] = null;
            $_SESSION["contra"] = null;
            // echo $pregunta_1;
            // echo $pregunta_2;
            // echo $pregunta_3;

            // echo $respuestas[0];
            // echo $respuestas[1];
            // echo $respuestas[2];
            echo "<script>window.setTimeout(function() {window.location.href = '../html/login.php';}, 0);</script>";
        }
    } 
    else 
    {
        $coincidencias = $login -> Acceso($idusuario, $contrasenna);
        
        if ($coincidencias==1)
        {
            include_once '../clases/expedienteC.php';
            include_once '../clases/paciente.php';

            $expediente = new expedienteC();
            $paciente = new paciente();
            
            $_SESSION["mostrarDetalleExpediente"]=''; 
            $_SESSION["expedienteDetallado"]= serialize($expediente);
            $_SESSION["mostrarDetallePaciente"] = ''; 
            $_SESSION["pacienteConDetalle"] = serialize($paciente);

            echo '<script>alert("Autenticación exitosa. Bienvenido al sistema, '.$idusuario.'...")</script>';
            echo "<script>window.setTimeout(function() {window.location.href = '../html/citasDoctor.php';}, 0);</script>";
        } 
        else
        {
            echo '<script>alert("Credenciales Incorrectas. Favor intentar nuevamente...")</script>';
            echo "<script>window.setTimeout(function() {window.location.href = '../html/login.php';}, 0);</script>";
        }
    }

?>