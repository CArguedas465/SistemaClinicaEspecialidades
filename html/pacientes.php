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
            <a href="principal.php">
                <img src="../images/home.png" alt="">
            </a>
            <a href="citasDoctor.html"> <!--Esto debe dinamizarse con PHP para cargar la página de citas correcta.-->
                <img src="../images/calendar.png" alt="">
            </a>
            <a href="expediente.html">
                <img src="../images/expediente.png" alt="">
            </a>
            <a href="pacientes.php">
                <img src="../images/pacientes.jpg" alt="">
            </a>
            <a href="inventario.php">
                <img src="../images/inventario.png" alt="">
            </a>
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
                            <th>Primer Nombre</th>
                            <th>Segundo Nombre</th>
                            <th>Número de expediente</th>
                        </thead>
                        <tbody onclick="emergente_DetallePaciente_Abrir()">
                            <tr>
                                <td>1487965</td>
                                <td>Daniel Masís Díaz</td>
                                <td>15/04/2022</td>
                                <td>Limpieza dental</td>
                                <td><button class="crearExpedienteClick">Crear expediente</button></td>
                            </tr>
                            <tr>
                                <td>1487965</td>
                                <td>Daniel Masís Díaz</td>
                                <td>15/04/2022</td>
                                <td>Limpieza dental</td>
                                <td>No</td>
                            </tr>
                            <tr>
                                <td>9811817</td>
                                <td>Daniel Masís Díaz</td>
                                <td>15/04/2022</td>
                                <td>Limpieza dental</td>
                                <td><button class="crearExpedienteClick">Crear expediente</button></td>
                            </tr>
                            <tr>
                                <td>1487965</td>
                                <td>Daniel Masís Díaz</td>
                                <td>15/04/2022</td>
                                <td>Limpieza dental</td>
                                <td>No</td>
                            </tr>
                            <tr>
                                <td>1487965</td>
                                <td>Daniel Masís Díaz</td>
                                <td>15/04/2022</td>
                                <td>Limpieza dental</td>
                                <td><button class="crearExpedienteClick">Crear expediente</button></td>
                            </tr>
                            <tr>
                                <td>1487965</td>
                                <td>Daniel Masís Díaz</td>
                                <td>15/04/2022</td>
                                <td>Limpieza dental</td>
                                <td>No</td>
                            </tr>
                            <tr>
                                <td>1487965</td>
                                <td>Daniel Masís Díaz</td>
                                <td>15/04/2022</td>
                                <td>Limpieza dental</td>
                                <td>No</td>
                            </tr>
                            <tr>
                                <td>1487965</td>
                                <td>Daniel Masís Díaz</td>
                                <td>15/04/2022</td>
                                <td>Limpieza dental</td>
                                <td>No</td>
                            </tr>
                            <tr>
                                <td>1487965</td>
                                <td>Daniel Masís Díaz</td>
                                <td>15/04/2022</td>
                                <td>Limpieza dental</td>
                                <td>No</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div id="agregarPacienteContenedor">
                <h2>Agregar Paciente</h2>
                <form action="" id="formularioAgregarPaciente" method="get">
                    <label for="cedulaNuevoPaciente">Cédula</label>
                    <input type="number" pattern="[0-9]+" id="cedulaNuevoPaciente" name="cedulaNuevoPaciente" style="width: 210px;">
                    <label for="nombreNuevoPaciente">Nombre</label>
                    <input type="text" id="nombreNuevoPaciente" name="nombreNuevoPaciente" style="width: 393px;">
                    <label for="apellido1NuevoPaciente">Primer Apellido</label>
                    <input type="text" id="apellido1NuevoPaciente" name="apellido1NuevoPaciente" style="width: 393px;">
                    <label for="apellido2NuevoPaciente">Segundo Apellido</label>
                    <input type="text" id="apellido2NuevoPaciente" name="apellido2NuevoPaciente" style="width: 393px;">
                    <label for="nacimientoNuevoPaciente">Fecha Nacimiento</label>
                    <input type="date" id="nacimientoNuevoPaciente" name="nacimientoNuevoPaciente" style="text-align: center;">
                    <label for="nacionalidadNuevoPaciente">Nacionalidad</label>
                    <input type="text" id="nacionalidadNuevoPaciente" name="nacionalidadNuevoPaciente" style="width: 330px;">
                    <label for="telefono1NuevoPaciente">Teléfono 1</label>
                    <input type="number" pattern="[0-9]+" id="telefono1NuevoPaciente" name="telefono1NuevoPaciente" style="width: 210px;">
                    <label for="telefono2NuevoPaciente">Teléfono 2</label>
                    <input type="number" pattern="[0-9]+" id="telefono2NuevoPaciente" name="telefono2NuevoPaciente" style="width: 210px;">
                    <label for="extNuevoPaciente">Ext.</label>
                    <input type="number" pattern="[0-9]+" id="extNuevoPaciente" name="extNuevoPaciente" style="width: 100px;">
                    <label for="ocupacionNuevoPaciente">Ocupación</label>
                    <input type="text" id="ocupacionNuevoPaciente" name="ocupacionNuevoPaciente" style="width: 180px;">
                    <label for="cantonNuevoPaciente">Cantón</label>
                    <input type="text" id="cantonNuevoPaciente" name="cantonNuevoPaciente">
                    <label for="provinciaNuevoPaciente">Provincia</label>
                    <input type="text" id="provinciaNuevoPaciente" name="provinciaNuevoPaciente">
                    <label for="distritoNuevoPaciente">Distrito</label>
                    <input type="text" id="distritoNuevoPaciente" name="distritoNuevoPaciente">
                    <label for="apodoNuevoPaciente">Apodo</label>
                    <input type="text" id="apodoNuevoPaciente" name="apodoNuevoPaciente">
                    <label for="recomendadoBooleanNuevoPaciente">¿Recomendado?</label>
                    <select id="recomendadoBooleanNuevoPaciente" value="N/A" name="recomendadoBooleanNuevoPaciente" onchange="bloquearRecomendacion()" style="text-align: center; width: 70px;">
                        <option value="N/A">Elegir</option>
                        <option value="true">Sí</option>
                        <option value="false">No</option>
                    </select>
                    <br>
                    <label for="recomendadoPacienteNuevo">En caso de haber sido recomendado, ¿por quién?</label>
                    <input type="text" id="recomendadoPacienteNuevo" name="recomendadoPacienteNuevo" style="border: 1px solid red;" disabled>
                    <label for="detallesAdicionalesPacienteNuevo">Detalles Adicionales</label>
                    <input type="text" id="detallesAdicionalesPacienteNuevo" name="detallesAdicionalesPacienteNuevo" style="width: 450px;">
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
            <form action="" id="formularioCreacionExpediente">
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

                        <textarea name="alergiaOtros" id="alergiaOtros" cols="30" rows="10"></textarea>
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
     <div id="modalDetallePaciente" class="modal">
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
    </div>
    


</body>
<script src="../js/pacientes.js"></script>
</html>