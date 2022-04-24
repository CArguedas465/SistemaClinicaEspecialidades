<?php 
    session_start(); 
    include_once '../clases/recuperacion.php'; 
    header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/loginEstilo.css">
    <link rel="stylesheet" href="../css/modalesEstilo.css">
    <script src="../js/login.js"></script>
</head>
<body>
    <div id="portada">
        <div id="logo">
            <img src="../images/teethLogo.png">
        </div>
        <div id="titleContainer">
            <h1>Clínica Especialidades</h1>
        </div>
        <div id="imageContainer">
            <img src="../images/doctorFigure2.png" id="figuraDoctor">
        </div>
    </div>
    <div id="registro">
        <h1>¡Hola!</h1>
        <form method="POST" id="formularioCredenciales" autocomplete="off" action="../scriptsPHP/loginSCRIPT.php">
            <input type="text" style="display: none;" id="modo_credenciales" name="modo">

            <input type="text" placeholder="ID DE USUARIO" name="usuario" id="usuarioIni">
            <input type="password" placeholder="CONTRASEÑA" name="contra">
            <input type="button" value="LOG IN" onclick="validacionCredenciales()">
        </form>
        <button onclick="emergente_RestablecerContra_Abrir()">Olvidé mi contraseña</button>
        <!-- <button onclick="emergente_PacienteNuevo_Abrir()">Soy paciente nuevo</button> -->
    </div>

    <!--Ventanas modales-->

    <!--Restablecer contraseña-->
    <?php     
        $recuperacion = unserialize($_SESSION["PreguntasUsuario"]);
        
        echo $_SESSION["EmergentePreguntasUsuario"];
        if ($_SESSION["EmergentePreguntasUsuario"]==1)
        {
            echo 
            '<div id="modalRestablecerContra" class="modal" style="display: block;">
             <div class="modal-content">
                <span id="closeButton" class="closeButton" onclick="emergente_RestablecerContra_Cerrar()">&times;</span>
                <h2>Restablecer Contraseña</h2>
                <p>Responder a las siguientes preguntas de seguridad:</p>
                <form action="../scriptsPHP/loginSCRIPT.php" id="formularioRestablecerContra" method="POST">
                    <input style="display: none;" type="text" name="usuario" value="'.$_SESSION["usuarioRestablecer"].'">
                    <input style="display: none;" type="text" name="modo" value="0.1">


                    <h4 name="pregunta_1">'.$recuperacion->GetPregunta_1().'</h4>
                    <input type="text" id="p1" name="pregunta1_respuesta">
                    <h4 name="pregunta_2">'.$recuperacion->GetPregunta_2().'</h4>
                    <input type="text" id="p2" name="pregunta2_respuesta">
                    <h4 name="pregunta_3">'.$recuperacion->GetPregunta_3().'</h4>
                    <input type="text" id="p3" name="pregunta3_respuesta">
                    <h4>Nueva contraseña: </h4>
                    <input type="password" name="contra" id="nContra">
                    <input type="button" value="Restablecer" onclick="validacionRestablecimientoContra()">
                </form>
                </div>
            </div>'
            ;
         } //else
        // {
        //     echo 
        //     '<div id="modalRestablecerContra" class="modal" style="display: none;">
        //      <div class="modal-content">
        //         <span id="closeButton" class="closeButton" onclick="emergente_RestablecerContra_Cerrar()">&times;</span>
        //         <h2>Restablecer Contraseña</h2>
        //         <p>Responder a las siguientes preguntas de seguridad:</p>
        //         <form action="../scriptsPHP/loginSCRIPT.php" id="formularioRestablecerContra" method="POST">
        //             <input style="display: none;" type="text" id="idUsuario_R" name="usuario" value="'.$_SESSION["usuarioRestablecer"].'">
        //             <input style="display: none;" type="text" name="modo" value="0.1">


        //             <h4 name="pregunta_1">N/A</h4>
        //             <input type="text" id="p1" name="pregunta1_respuesta">
        //             <h4 name="pregunta_2">N/A</h4>
        //             <input type="text" id="p2" name="pregunta2_respuesta">
        //             <h4 name="pregunta_3">N/A</h4>
        //             <input type="text" id="p3" name="pregunta3_respuesta">
        //             <h4>Nueva contraseña: </h4>
        //             <input type="password" name="contra" id="nContra">
        //             <input type="button" value="Restablecer" onclick="validacionRestablecimientoContra()">
        //         </form>
        //         </div>
        //     </div>'
        //     ;
        // }

        $_SESSION["EmergentePreguntasUsuario"] = false;
        $_SESSION["usuario"] = null;
        $_SESSION["modo"] = null;
    ?>
    <!--Nuevo paciente-->

    <!-- <div id="modalPacienteNuevo" class="modal">
        <div class="modal-content">
            <span id="closeButton" class="closeButton" onclick="emergente_PacienteNuevo_Cerrar()">&times;</span>
            <h2>¡Envía una solicitud para tu primera consulta!</h2>
            <p>¡Envía una solicitud con tus datos personales, el día y la razón de tu consulta, y uno de los doctores se pondrá en contacto pronto!</p>
            <form action="" id="formularioNuevoPaciente">
                <label for="cedula">Cédula</label>
                <input type="number" name="cedula" id="cedula">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">
                <label for="apellido_1">Primer Apellido</label>
                <input type="text" name="apellido_1" id="apellido_1">
                <label for="apellido_2">Segundo Apellido</label>
                <input type="text" name="apellido_2" id="apellido_2">
                <label for="telefono">Número de Teléfono</label>
                <input type="number" name="telefono" id="telefono">
                <label for="fecha">Fecha Ideal para su cita</label>
                <input type="date" name="fecha" id="fecha">
                <label for="urgente">Urgente</label>
                <select name="urgente" id="urgente">
                    <option value="N/A">Seleccione una opción</option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>
                <label for="procedimiento">Procedimiento potencial</label>
                <select name="procedimiento" id="procedimiento">
                    <option value="N/A">Seleccione una opción</option>
                    <option value="procedimiento1">Procedimiento 1</option>
                    <option value="procedimiento2">Procedimiento 2</option>
                </select>
                <br>
                <label for="descripcionAdicional">Descripción Adicional</label>
                <textarea name="descripcionAdicional" id="descripcionAdicional" cols="30" rows="20"></textarea>
                <input type="button" value="Enviar" onclick="validacionSolicitudNuevoPaciente()">
            </form>
        </div>
    </div> -->
</body>
</html>