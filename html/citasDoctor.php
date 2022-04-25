<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <link rel="stylesheet" href="../css/estructuraEstilo.css">
    <link rel="stylesheet" href="../css/citasDoctorEstilo.css">
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
        <a href="agendarCita.php">Agendar Cita</a>
        <h1>
            Citas
        </h1>
        <div id="content">
            <form method="get" id="formularioBusqueda">
                <label for="busqueda">Buscar Cita: </label>
                <input type="text" id="busqueda" name="busqueda">
                <label for="criterioBusqueda">Criterio Búsqueda: </label>
                <select name="criterioBusqueda" id="criterioBusqueda">
                    <option value="N/A">Seleccione un criterio</option>
                    <option value="numeroSolicitud">Número de cita</option>
                    <option value="nombreSolicitante">Nombre Solicitante</option>
                    <option value="fechaSolicitada">Fecha</option>
                    <option value="procedimiento">Procedimiento</option>
                    <option value="solicitante">Momento del Día</option>
                </select>
                <input type="button" value="Buscar" onclick="validarBusqueda()">
            </form>
            <div class="contenedorConScroll">
                <table cellspacing="0" id="tablaCitasPorAprobar">
                    <thead>
                        <th># de Cita</th>
                        <th>Nombre</th>
                        <th>Procedimiento</th>
                        <th>Descripción adicional</th>
                        <th>¿Urgente?</th>
                        <th>Doctor a cargo</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </thead>
                    <tbody onclick="emergente_DetalleCita_Abrir()">
                        <?php
                            include_once '../clases/cita.php';

                            $cita = new cita();

                            $citas = $cita -> GetCitas();

                            while ($row = $citas -> fetch_assoc())
                            {
                                echo
                                '<tr>
                                    <td>'.utf8_encode($row["codigo_cita"]).'</td>
                                    <td>'.utf8_encode($row["nombre"]).' '.utf8_encode($row["apellido_1"]).' '.utf8_encode($row["apellido_2"]).'</td>
                                    <td>'.utf8_encode($row["nombre_procedimiento"]).'</td>
                                    <td>'.utf8_encode($row["descripcion_adicional"]).'</td>';

                                    if ($row["urgente"]==1)
                                    {
                                        echo '<td>Sí</td>';
                                    } 
                                    else
                                    {
                                        echo '<td>No</td>';
                                    }
                                    
                                echo '<td>'.utf8_encode($row["nomDoctor"]).' '.utf8_encode($row["apeDoctor"]).'</td>
                                      <td>'.utf8_encode($row["Fecha"]).'</td>
                                      <td>'.utf8_encode($row["Hora"]).'</td>
                                    </tr>'
                                ;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!--Ventanas Modales-->

        <!--Ventana de detalle de cita-->
        <div id="modalDetalleCita" class="modal">
            <div class="modal-content contenedorConScroll">
                <span id="closeButton" class="closeButton" onclick="emergente_DetalleCita_Cerrar()">&times;</span>
                <h2 id="tituloSolicitudDeCita">Cita</h2>
                    <form method="POST" id="formularioProgramaCitas" action="../scriptsPHP/modificarCitaSCRIPT.php">
                        <label for="_solicitante">Nombre Paciente</label>
                        <input type="text" id="_solicitante" name="solicitante" disabled readonly>
                        <label for="_fechaCita">Fecha</label>
                        <input type="text" id="_fechaCita" name="fechaCita" disabled readonly>
                        <label for="_horaCita">Hora</label>
                        <input type="text" id="_horaCita" name="horaCita" disabled readonly>
                        <label for="procedimiento_Solicitado">Procedimiento solicitado</label>
                        <input type="text" id="procedimiento_Solicitado" name="procedimientoSolicitado" disabled readonly>
                        <label for="_urgente">¿Urgente?</label>
                        <input type="text" id="_urgente" name="urgente" disabled readonly>
                        <label for="_doctorACargo">Doctor a cargo</label>
                        <input type="text" id="_doctorACargo" name="doctorACargo" disabled readonly>
                        <br><br>
                        <label for="_comentariosPaciente">Descripción adicional</label>
                        <br><br>
                        <textarea cols="150" rows="3" id="_comentariosPaciente" name="comentariosPaciente" readonly disabled></textarea>
                        <hr>
                        <h2>Mover cita</h2>
                        <label for="date">Fecha</label>
                        <input type="date" id="_fecha" name="fecha">
                        <label for="hora">Hora</label>
                        <input type="time" id="_hora" name="hora" min="09" max="18">
                        <br>
                        <br>
                        <label for="comentariosDoctor">Comentarios Doctor</label>
                        <br>
                        <br>
                        <input style="display: none;" type="text" id="programada_OCancelada" name="programadaOCancelada">
                        <input style="display: none" type="text" id="id_Cita" name="idCita">
                        <textarea name="comentariosDoctor" id="_comentariosDoctor" cols="30" rows="10"></textarea>
                        <input style="float: left;" type="button" class="btn btn-secondary" value="Volver" onclick="emergente_DetalleCita_Cerrar()"></input>
                        <input style="float: right;" type="button" class="btn btn-danger" value="Cancelar Cita" id="btnCancelarCita"></input>
                        <input style="float: right;" type="button" class="btn btn-success" value="Cambiar Cita" id="btnCambiarCita"></input>
                        <br>
                    </form>              
                <br>
            </div>
        </div>
    </section>
</body>
<script src="../js/citasDoctor.js"></script>
<script src="../js/controlSesion.js"></script>
</html>