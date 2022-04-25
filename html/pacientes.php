<?php 
    session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link rel="stylesheet" href="../css/estructuraEstilo.css">
    <link rel="stylesheet" href="../css/pacientesEstilo.css">
    <link rel="stylesheet" href="../css/modalesEstilo.css">
</head>
<body>
    <nav>
        <div id="logo">
            <img src="../images/teethLogo.png" alt="">
        </div>
        <div id="iconosNavegacion">
            <a href="citasDoctor.php"> 
                <img src="../images/calendar.png" alt="">
            </a>
            <a href="expediente.php">
                <img src="../images/expediente.png" alt="">
            </a>
            <a href="pacientes.php">
                <img src="../images/pacientes.jpg" alt="">
            </a>
            <a href="inventario.php">
                <img src="../images/inventario.png" alt="">
            </a>
            <button onclick="cerrarSesion()">Cerrar Sesión</button>
            <form id="formularioCerrarSesion" action="../scriptsPHP/cerrarSesionSCRIPT.php" style="display: none"></form>
        </div>
    </nav>
    <section>
        <h1>Pacientes</h1>
        <div id="content">
            <div id="busquedaPacientesContenedor">
                <form method="post" id="formularioBusqueda">
                    <label for="busqueda">Buscar Paciente: </label>
                    <input type="text" id="busqueda" name="busqueda">
                    <label for="criterioBusqueda">Criterio Búsqueda: </label>
                    <select name="criterioBusqueda" id="criterioBusqueda">
                        <option value="N/A">Seleccione un criterio</option>
                        <option value="cedulaPaciente">Cédula</option>
                        <option value="nombrePaciente">Nombre</option>
                        <option value="primerApellidoPaciente">Primer Apellido</option>
                        <option value="segundoApellidoPaciente">Segundo Apellido</option>
                        <option value="pacientePoseeExpediente">Posee Expediente</option>
                        <option value="pacienteNoPoseeExpediente">No Posee Expediente</option>
                    </select>
                    <input type="button" value="Buscar" onclick="validarBusqueda()">
                </form>
                <div class="contenedorConScroll">
                    <table cellspacing="0" id="tablaPacientes">
                        <thead>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Número de expediente</th>
                        </thead>
                        <tbody onclick="emergente_DetallePaciente_Abrir()">
                            <?php 
                                include_once '../clases/paciente.php';
                                include_once '../clases/expedienteC.php';

                                $paciente = new paciente(); 

                                $arrayPacientes = $paciente -> GetPacientes();

                                while ($row = $arrayPacientes -> fetch_assoc())
                                {
                                    echo
                                    '<tr>
                                        <td>'.utf8_encode($row["cedula"]).'</td>
                                        <td>'.utf8_encode($row["nombre"]).'</td>
                                        <td>'.utf8_encode($row["apellido_1"]).'</td>
                                        <td>'.utf8_encode($row["apellido_2"]).'</td>
                                    ';
                                    if ($row["poseeExpediente"]==0)
                                    {
                                        echo '<td><button class="crearExpedienteClick">Crear expediente</button></td></tr>';

                                    } 
                                    else
                                    {
                                        $expediente = new expedienteC();

                                        $resultado = $expediente -> GetNumeroExpediente_Paciente($row["cedula"]);

                                        $arrayIdIventario = $resultado -> fetch_assoc();

                                        echo '<td onclick="emergente_DetallePaciente_Abrir()">'.$arrayIdIventario["id_expediente"].'</td></tr>';
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div id="agregarPacienteContenedor">
                <h2>Agregar Paciente</h2>
                <form action="../scriptsPHP/agregarPacienteSCRIPT.php" id="formularioAgregarPaciente" method="POST">
                    <label for="cedulaNuevoPaciente">Cédula</label>
                    <input type="number" pattern="[0-9]+" id="cedula_NuevoPaciente" name="cedulaNuevoPaciente" style="width: 210px;">
                    <label for="nombreNuevoPaciente">Nombre</label>
                    <input type="text" id="nombre_NuevoPaciente" name="nombreNuevoPaciente" style="width: 393px;">
                    <label for="apellido1NuevoPaciente">Primer Apellido</label>
                    <input type="text" id="apellido1_NuevoPaciente" name="apellido1NuevoPaciente" style="width: 393px;">
                    <label for="apellido2NuevoPaciente">Segundo Apellido</label>
                    <input type="text" id="apellido2_NuevoPaciente" name="apellido2NuevoPaciente" style="width: 393px;">
                    <label for="nacimientoNuevoPaciente">Fecha Nacimiento</label>
                    <input type="date" id="nacimiento_NuevoPaciente" name="nacimientoNuevoPaciente" style="text-align: center;">
                    <label for="nacionalidadNuevoPaciente">Nacionalidad</label>
                    <input type="text" id="nacionalidad_NuevoPaciente" name="nacionalidadNuevoPaciente" style="width: 330px;">
                    <label for="telefono1NuevoPaciente">Teléfono 1</label>
                    <input type="number" pattern="[0-9]+" id="telefono1_NuevoPaciente" name="telefono1NuevoPaciente" style="width: 210px;">
                    <label for="telefono2NuevoPaciente">Teléfono 2</label>
                    <input type="number" pattern="[0-9]+" id="telefono2_NuevoPaciente" name="telefono2NuevoPaciente" style="width: 210px;">
                    <label for="extNuevoPaciente">Ext.</label>
                    <input type="text" pattern="[0-9]+" id="ext_NuevoPaciente" name="extNuevoPaciente" style="width: 100px;">
                    <label for="ocupacionNuevoPaciente">Ocupación</label>
                    <input type="text" id="ocupacion_NuevoPaciente" name="ocupacionNuevoPaciente" style="width: 180px;">
                    <?php
                        include_once '../clases/direccion.php';

                        $direccion = new direccion();

                        /*Popula provincias*/ 
                        echo '<label for="provincia_NuevoPaciente">Provincia</label>
                              <select id="provincia_NuevoPaciente" name="provinciaNuevoPaciente">
                                <option value="N/A">Elegir</option>';
                        $provincias = $direccion -> GetProvincias();
                        while ($row = $provincias -> fetch_assoc())
                        {
                            echo '<option value="'.$row["codigo_provincia"].'">'.utf8_encode($row["nombre_provincia"]).'</option>';
                        } 
                        echo '</select>';

                        /*Popula cantones*/
                        echo '<label for="canton_NuevoPaciente">Canton</label>
                              <select id="canton_NuevoPaciente" name="cantonNuevoPaciente">
                                <option value="N/A">Elegir</option>';
                        $cantones = $direccion -> GetCantones();
                        while ($row = $cantones -> fetch_assoc())
                        {
                            echo '<option value="'.$row["codigo_canton"].'">'.utf8_encode($row["nombre_canton"]).'</option>';
                        }
                        echo '</select>';

                        /*Popula distritos*/
                        echo '<label for="distrito_NuevoPaciente">Distrito</label>
                              <select id="distrito_NuevoPaciente" name="distritoNuevoPaciente" style="width: 200px">
                                <option value="N/A">Elegir</option>';
                        $distritos = $direccion -> GetDistritos();
                        while ($row = $distritos -> fetch_assoc())
                        {
                            echo '<option value="'.$row["codigo_distrito"].'">'.utf8_encode($row["nombre_distrito"]).'</option>';
                        }
                        echo '</select>';
                    ?>
                    <label for="apodoNuevoPaciente">Apodo</label>
                    <input type="text" id="apodo_NuevoPaciente" name="apodoNuevoPaciente">
                    <label for="recomendadoBooleanNuevoPaciente">¿Recomendado?</label>
                    <select id="recomendadoBoolean_NuevoPaciente" value="N/A" name="recomendadoBooleanNuevoPaciente" onchange="bloquearRecomendacion()" style="text-align: center; width: 70px;">
                        <option value="N/A">Elegir</option>
                        <option value="true">Sí</option>
                        <option value="false">No</option>
                    </select>
                    <label for="recomendadoPacienteNuevo">En caso de haber sido recomendado, ¿por quién?</label>
                    <input type="text" id="recomendado_PacienteNuevo" name="recomendadoPacienteNuevo" style="border: 1px solid red;" disabled>
                    <input style="display: none" type="text" id="recomendacionAEnviar" name="recomendadoPacienteNuevo"/>
                    <label for="detallesAdicionalesPacienteNuevo">Detalles Adicionales</label>
                    <input type="text" id="detallesAdicionales_PacienteNuevo" name="detallesAdicionalesPacienteNuevo" style="width: 450px;">
                    <input type="button" value="Agregar" onclick="validarAgregarPaciente()">
                </form>
            </div>
        </div>
    </section>

    <!--Ventanas modales-->

    <!--Ventana crear expediente-->
    <div id="modalPreguntasExpediente" class="modal">
        <div class="modal-content">
            <span id="closeButton" class="closeButton" onclick="emergente_CrearExpediente_Cerrar()">&times;</span>
            <h2>Preguntas del expediente</h2>
            <form action="../scriptsPHP/crearExpedienteSCRIPT.php" id="formularioCreacionExpediente" method="POST">
                <input style="display: none;" type="text" id="cedulaPaciente" name="cedulaPaciente">
                <div id="contenedorRadioButton">
                    <div id="contenerDiabetes">
                        <label for="diabetes" style="padding-right: 25px; font-weight: bold;">Diabetes</label>

                        <label>Sí</label>
                        <input type="radio" name="diabetes" value="1" style="margin-right: 30px;">
                        <label>No</label>
                        <input type="radio"  name="diabetes" value="0">
                    </div>
                    <div id="contenerArtritis">
                        <label for="artritis" style="padding-right: 25px; font-weight: bold;">Artritis</label>

                        <label>Sí</label>
                        <input type="radio" name="artritis" value="1" style="margin-right: 30px">
                        <label>No</label>
                        <input type="radio" name="artritis" value="0">
                    </div>
                    <div id="contenerRenales">
                        <label for="renales" style="padding-right: 25px; font-weight: bold;">Trastornos Renales</label>

                        <label>Sí</label>
                        <input type="radio" name="renales" value="1" style="margin-right: 30px">
                        <label>No</label>
                        <input type="radio" name="renales" value="0">
                    </div>
                    <div id="contenerAlergiaAspirina">
                        <label for="alergiaAspirina" style="padding-right: 25px; font-weight: bold;">Alergia Aspirina</label>

                        <label>Sí</label>
                        <input type="radio" name="alergiaAspirina" value="1" style="margin-right: 30px">
                        <label>No</label>
                        <input type="radio" name="alergiaAspirina" value="0">
                    </div>
                    <div id="contenerAlergiaSulfas">
                        <label for="alergiaSulfas" style="padding-right: 25px; font-weight: bold;">Alergia Sulfas</label>

                        <label>Sí</label>
                        <input type="radio" name="alergiaSulfas" value="1" style="margin-right: 30px">
                        <label>No</label>
                        <input type="radio" name="alergiaSulfas" value="0">
                    </div>
                    <div id="contenerAlergiaOtros">
                        <label for="alergiaOtros" style="padding-right: 25px; font-weight: bold; display: block; text-align: center;">Alergia Otros</label>

                        <textarea name="alergiaOtros" id="alergia_Otros" cols="30" rows="10"></textarea>
                    </div>
                    <div id="contenerReacionesAnestesia">
                        <label for="reaccionesAnestesia" style="padding-right: 25px; font-weight: bold;">Reacciones Anestesia</label>

                        <label>Sí</label>
                        <input type="radio" name="reaccionesAnestesia" value="1" style="margin-right: 30px">
                        <label>No</label>
                        <input type="radio" name="reaccionesAnestesia" value="0">
                    </div>
                    <div id="contenerSangradadoProlongado">
                        <label for="sangradoProlongado" style="padding-right: 25px; font-weight: bold;">Sangrado Prolongado</label>

                        <label>Sí</label>
                        <input type="radio" name="sangradoProlongado" value="1" style="margin-right: 30px">
                        <label>No</label>
                        <input type="radio" name="sangradoProlongado" value="0">
                    </div>
                    <div id="contenerDesmayos">
                        <label for="desmayos" style="padding-right: 25px; font-weight: bold;">Desmayos</label>

                        <label>Sí</label>
                        <input type="radio" name="desmayos" value="1" style="margin-right: 30px">
                        <label>No</label>
                        <input type="radio" name="desmayos" value="0">
                    </div>
                    <div id="contenerOtrosPadecimientos">
                        <label for="otrosPadecimientos" style="padding-right: 25px; font-weight: bold; display: block; text-align: center;">Otros padecimientos</label>

                        <textarea name="otrosPadecimientos" id="otros_Padecimientos" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div id="contenedorDetalleTratamiento">
                    <label for="detalleTratamiento" style="display: block; text-align: center; font-size: 25px;">Detalle del tratamiento</label>
                    <br>
                    <textarea name="detalleTratamiento" id="detalleTratamiento" cols="30" rows="10"></textarea>
                    <input type="button" value="Crear" onclick="validarCreacionExpediente()">
                </div>
            </form>
        </div>
    </div>
     <!--Ventana detalle paciente-->
     <?php
        include_once '../clases/paciente.php';

        $paciente_2 = unserialize($_SESSION["pacienteConDetalle"]);
        echo $paciente -> getCedula();
        echo $paciente -> getNombre();
        echo $paciente -> getFechaNacimiento();
        

        if ($_SESSION["mostrarDetallePaciente"]==1)
        {
            echo
                '<div id="modalDetallePaciente" class="modal" style="display: block">
                <div class="modal-content" style="text-align: center;">
                    <span id="closeButton" class="closeButton" onclick="emergente_DetallePaciente_Cerrar()">&times;</span>
                    <h2>Detalle del Paciente</h2>
                    <label for="cedulaNuevoPaciente">Cédula</label>
                    <input value="'.$paciente_2 -> getCedula().'" type="text" id="cedulaNuevoPaciente" name="cedulaNuevoPaciente" style="width: 210px;" disabled>
                    <label for="nombreNuevoPaciente">Nombre</label>
                    <input value="'.$paciente_2 -> getNombre().'" type="text" id="nombreNuevoPaciente" name="nombreNuevoPaciente" style="width: 393px;" disabled>
                    <label for="apellido1NuevoPaciente">Primer Apellido</label>
                    <input value="'.$paciente_2 -> getApellido_1().'" type="text" id="apellido1NuevoPaciente" name="apellido1NuevoPaciente" style="width: 393px;" disabled>
                    <label for="apellido2NuevoPaciente">Segundo Apellido</label>
                    <input value="'.$paciente_2 -> getApellido_2().'" type="text" id="apellido2NuevoPaciente" name="apellido2NuevoPaciente" style="width: 393px;" disabled>
                    <label for="nacimientoNuevoPaciente">Fecha Nacimiento</label>
                    <input value="'.$paciente_2 -> getFechaNacimiento().'" type="date" id="nacimientoNuevoPaciente" name="nacimientoNuevoPaciente" style="text-align: center;" disabled>
                    <label for="nacionalidadNuevoPaciente">Nacionalidad</label>
                    <input value="'.$paciente_2 -> getNacionalidad().'" type="text" id="nacionalidadNuevoPaciente" name="nacionalidadNuevoPaciente" style="width: 330px;" disabled>
                    <label for="telefono1NuevoPaciente">Teléfono 1</label>
                    <input value="'.$paciente_2 -> getTelefono_1().'" type="text" id="telefono1NuevoPaciente" name="telefono1NuevoPaciente" style="width: 210px;" disabled>
                    <label for="telefono2NuevoPaciente">Teléfono 2</label>
                    <input value="'.$paciente_2 -> getTelefono_2().'" type="text" id="telefono2NuevoPaciente" name="telefono2NuevoPaciente" style="width: 210px;" disabled>
                    <label for="extNuevoPaciente">Ext.</label>
                    <input value="'.$paciente_2 -> getExt().'" type="text" id="extNuevoPaciente" name="extNuevoPaciente" style="width: 100px;" disabled>
                    <label for="ocupacionNuevoPaciente">Ocupación</label>
                    <input value="'.$paciente_2 -> getOcupacion().'" type="text" id="ocupacionNuevoPaciente" name="ocupacionNuevoPaciente" style="width: 180px;" disabled>
                    <label for="provinciaNuevoPaciente">Provincia</label>
                    <input value="'.$paciente_2 -> getProvincia().'" type="text" id="provinciaNuevoPaciente" name="provinciaNuevoPaciente" disabled>
                    <label for="cantonNuevoPaciente">Cantón</label>
                    <input value="'.$paciente_2 -> getCanton().'" type="text" id="cantonNuevoPaciente" name="cantonNuevoPaciente" disabled>
                    <label for="distritoNuevoPaciente">Distrito</label>
                    <input value="'.$paciente_2 -> getDistrito().'" type="text" id="distritoNuevoPaciente" name="distritoNuevoPaciente" disabled>
                    <label for="apodoNuevoPaciente">Apodo</label>
                    <input value="'.$paciente_2 -> getApodo().'" type="text" id="apodoNuevoPaciente" name="apodoNuevoPaciente" disabled>
                    <label for="recomendadoPacienteNuevo">Recomendado Por:</label>
                    <input value="'.$paciente_2 -> getRecomendado().'" type="text" id="recomendadoPacienteNuevo" name="recomendadoPacienteNuevo" disabled>
                    <label for="detallesAdicionalesPacienteNuevo">Detalles Adicionales</label>
                    <input value="'.$paciente_2 -> getDetallesAdicionales().'" type="text" id="detallesAdicionalesPacienteNuevo" name="detallesAdicionalesPacienteNuevo" style="width: 450px;" disabled>
                </div>
            </div>'
            ;

            $_SESSION["pacienteConDetalle"] = null;
            $_SESSION["mostrarDetallePaciente"] = null;
        }
        else 
        {
            echo
            '<div id="modalDetallePaciente" class="modal">
            <div class="modal-content" style="text-align: center;">
                <span id="closeButton" class="closeButton" onclick="emergente_DetallePaciente_Cerrar()">&times;</span>
                <h2>Detalle del Paciente</h2>
                <label for="cedulaNuevoPaciente">Cédula</label>
                <input type="text" id="cedulaNuevoPaciente" name="cedulaNuevoPaciente" style="width: 210px;" disabled>
                <label for="nombreNuevoPaciente">Nombre</label>
                <input type="text" id="nombreNuevoPaciente" name="nombreNuevoPaciente" style="width: 393px;" disabled>
                <label for="apellido1NuevoPaciente">Primer Apellido</label>
                <input type="text" id="apellido1NuevoPaciente" name="apellido1NuevoPaciente" style="width: 393px;" disabled>
                <label for="apellido2NuevoPaciente">Segundo Apellido</label>
                <input type="text" id="apellido2NuevoPaciente" name="apellido2NuevoPaciente" style="width: 393px;" disabled>
                <label for="nacimientoNuevoPaciente">Fecha Nacimiento</label>
                <input type="date" id="nacimientoNuevoPaciente" name="nacimientoNuevoPaciente" style="text-align: center;" disabled>
                <label for="nacionalidadNuevoPaciente">Nacionalidad</label>
                <input type="text" id="nacionalidadNuevoPaciente" name="nacionalidadNuevoPaciente" style="width: 330px;" disabled>
                <label for="telefono1NuevoPaciente">Teléfono 1</label>
                <input type="text" id="telefono1NuevoPaciente" name="telefono1NuevoPaciente" style="width: 210px;" disabled>
                <label for="telefono2NuevoPaciente">Teléfono 2</label>
                <input type="text" id="telefono2NuevoPaciente" name="telefono2NuevoPaciente" style="width: 210px;" disabled>
                <label for="extNuevoPaciente">Ext.</label>
                <input type="text" id="extNuevoPaciente" name="extNuevoPaciente" style="width: 100px;" disabled>
                <label for="ocupacionNuevoPaciente">Ocupación</label>
                <input type="text" id="ocupacionNuevoPaciente" name="ocupacionNuevoPaciente" style="width: 180px;" disabled>
                <label for="cantonNuevoPaciente">Cantón</label>
                <input type="text" id="cantonNuevoPaciente" name="cantonNuevoPaciente" disabled>
                <label for="provinciaNuevoPaciente">Provincia</label>
                <input type="text" id="provinciaNuevoPaciente" name="provinciaNuevoPaciente" disabled>
                <label for="distritoNuevoPaciente">Distrito</label>
                <input type="text" id="distritoNuevoPaciente" name="distritoNuevoPaciente" disabled>
                <label for="apodoNuevoPaciente">Apodo</label>
                <input type="text" id="apodoNuevoPaciente" name="apodoNuevoPaciente" disabled>
                <label for="recomendadoPacienteNuevo">Recomendado Por:</label>
                <input type="text" id="recomendadoPacienteNuevo" name="recomendadoPacienteNuevo" disabled>
                <label for="detallesAdicionalesPacienteNuevo">Detalles Adicionales</label>
                <input type="text" id="detallesAdicionalesPacienteNuevo" name="detallesAdicionalesPacienteNuevo" style="width: 450px;" disabled>
            </div>
        </div>'
            ;
        }
     ?>

    <!--Formulario oculto: Pantalla detalle paciente.-->
    <form id="formularioDetallePaciente" style="display: none" method="POST" action="../scriptsPHP/detallePacienteSCRIPT.php">
         <input type="text" name="cedulaPacienteDetalle" id="cedulaPaciente_Detalle"/>
    </form>
    
</body>
<script src="../js/pacientes.js"></script>
<script src="../js/controlSesion.js"></script>
</html>