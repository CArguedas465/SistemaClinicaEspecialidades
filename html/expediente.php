<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expediente</title>
    <link rel="stylesheet" href="../css/estructuraEstilo.css">
    <link rel="stylesheet" href="../css/modalesEstilo.css">
    <link rel="stylesheet" href="../css/expedienteEstilo.css">
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
        <h1>Expediente</h1>
        <div id="content">
            <form method="get" id="formularioBusqueda">
                <label for="busqueda">Buscar Expediente: </label>
                <input type="text" id="busqueda" name="busqueda">
                <label for="criterioBusqueda">Criterio Búsqueda: </label>
                <select name="criterioBusqueda" id="criterioBusqueda">
                    <option value="N/A">Seleccione un criterio</option>
                    <option value="numeroExpediente">Número de expediente</option>
                    <option value="datosPaciente">Paciente</option>
                </select>
                <input type="button" value="Buscar" onclick="validarBusqueda()">
            </form>
            <div class="contenedorConScroll">
                <table cellspacing="0" id="tablaExpedientes">
                    <thead>
                        <th># de Expediente</th>
                        <th>Paciente</th>
                        <th>Fecha Creación</th>
                        <th>Última actualización</th>
                    </thead>
                    <tbody ondblclick="emergente_ModificarExpediente_Abrir()">
                        <?php
                            include_once '../clases/expedienteC.php';

                            $expediente = new expedienteC(); 

                            $expedientes = $expediente -> GetExpedientes();

                            while ($row = $expedientes -> fetch_assoc())
                            {
                                echo
                                '<tr>
                                    <td>'.$row["id_expediente"].'</td>
                                    <td>'.utf8_encode($row["nombre"]).' '.utf8_encode($row["apellido_1"]).' '.utf8_encode($row["apellido_2"]).'</td>
                                    <td>'.$row["fecha_creacion"].'</td>
                                    <td>'.$row["ultima_actualizacion"].'</td>
                                </tr>'
                                ;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!--Ventanas modales-->

    <!--Ventana modal de modificación de expediente-->

    <?php
        include_once '../clases/expedienteC.php';

        $expediente_2 = unserialize($_SESSION["expedienteDetallado"]);

        

        if ($_SESSION["mostrarDetalleExpediente"]==1)
        {
            // echo $expediente_2 -> getDiabetes();
            // echo $expediente_2 -> getArtritis();
            // echo $expediente_2 -> getTrastornosRenales();
            // echo $expediente_2 -> getAlergiaAspirina();
            // echo $expediente_2 -> getAlergiaSulfas();
            // echo $expediente_2 -> getReaccionesAnestesia();
            // echo $expediente_2 -> getSangradoProlongado();
            // echo $expediente_2 -> getDesmayos();
            // echo $expediente_2 -> getDetalleTratamiento();
            // echo $expediente_2 -> getOtrosPadecimientos();
            // echo $expediente_2 -> getOtrasAlergias();
            echo
            '<div id="modalModificacionExpediente" class="modal" style="display:block">
             <div class="modal-content">
                <span id="closeButton" class="closeButton" onclick="emergente_ModificarExpediente_Cerrar()" >&times;</span>
                <h2>Preguntas del expediente # '.$expediente_2 -> getIdExpediente().'</h2>
                <form action="../scriptsPHP/modificarExpediente.php" id="formularioModificacionExpediente" method="POST">
                    <input value="'.$expediente_2 -> getIdExpediente().'" style="display: none;" type="text" id="_numeroExpediente" name="numeroExpediente">
                    <div id="contenedorRadioButton">';

                            if (($expediente_2-> getDiabetes())==1)
                            {
                                echo
                                '<div id="contenerDiabetes">
                                    <label for="diabetes" style="padding-right: 25px; font-weight: bold;">Diabetes</label>
                                        <label>Sí</label>
                                        <input type="radio" name="diabetes" value="1" style="margin-right: 30px;" checked>
                                        <label>No</label>
                                        <input type="radio" name="diabetes" value="0">
                                </div>'
                                ;
                            }
                            else
                            {
                                echo
                                '<div id="contenerDiabetes">
                                    <label for="diabetes" style="padding-right: 25px; font-weight: bold;">Diabetes</label>
                                        <label>Sí</label>
                                        <input type="radio" name="diabetes" value="1" style="margin-right: 30px;">
                                        <label>No</label>
                                        <input type="radio" name="diabetes" value="0" checked>
                                </div>'
                                ;
                            }

                            if ($expediente_2-> getArtritis()==1)
                            {
                                echo
                                '<div id="contenerArtritis">
                                    <label for="artritis" style="padding-right: 25px; font-weight: bold;">Artritis</label>
                                        <label>Sí</label>
                                        <input type="radio" name="artritis" value="1" style="margin-right: 30px;" checked>
                                        <label>No</label>
                                        <input type="radio" name="artritis" value="0">
                                </div>'
                                ;
                            }
                            else
                            {
                                echo
                                '<div id="contenerArtritis">
                                    <label for="artritis" style="padding-right: 25px; font-weight: bold;">Artritis</label>
                                        <label>Sí</label>
                                        <input type="radio" name="artritis" value="1" style="margin-right: 30px;">
                                        <label>No</label>
                                        <input type="radio" name="artritis" value="0" checked>
                                </div>'
                                ;
                            }

                            if ($expediente_2-> getTrastornosRenales()==1)
                            {
                                echo
                                '<div id="contenerRenales">
                                    <label for="renales" style="padding-right: 25px; font-weight: bold;">Trastornos Renales</label>
                                        <label>Sí</label>
                                        <input type="radio" name="renales" value="1" style="margin-right: 30px;" checked>
                                        <label>No</label>
                                        <input type="radio" name="renales" value="0">
                                </div>'
                                ;
                            }
                            else
                            {
                                echo
                                '<div id="contenerRenales">
                                    <label for="renales" style="padding-right: 25px; font-weight: bold;">Trastornos Renales</label>
                                        <label>Sí</label>
                                        <input type="radio" name="renales" value="1" style="margin-right: 30px;">
                                        <label>No</label>
                                        <input type="radio" name="renales" value="0" checked>
                                </div>'
                                ;
                            }

                            if ($expediente_2-> getAlergiaAspirina()==1)
                            {
                                echo
                                '<div id="contenerAlergiaAspirina">
                                    <label for="alergiaAspirina" style="padding-right: 25px; font-weight: bold;">Alergia Aspirina</label>
                                        <label>Sí</label>
                                        <input type="radio" name="alergiaAspirina" value="1" style="margin-right: 30px;" checked>
                                        <label>No</label>
                                        <input type="radio" name="alergiaAspirina" value="0">
                                </div>'
                                ;
                            }
                            else
                            {
                                echo
                                '<div id="contenerAlergiaAspirina">
                                    <label for="alergiaAspirina" style="padding-right: 25px; font-weight: bold;">Alergia Aspirina</label>
                                        <label>Sí</label>
                                        <input type="radio" name="alergiaAspirina" value="1" style="margin-right: 30px;">
                                        <label>No</label>
                                        <input type="radio" name="alergiaAspirina" value="0" checked>
                                </div>'
                                ;
                            }

                            if ($expediente_2-> getAlergiaSulfas()==1)
                            {
                                echo
                                '<div id="contenerAlergiaSulfas">
                                    <label for="alergiaSulfas" style="padding-right: 25px; font-weight: bold;">Alergia Sulfas</label>
                                        <label>Sí</label>
                                        <input type="radio" name="alergiaSulfas" value="1" style="margin-right: 30px;" checked>
                                        <label>No</label>
                                        <input type="radio" name="alergiaSulfas" value="0">
                                </div>'
                                ;
                            }
                            else
                            {
                                echo
                                '<div id="contenerAlergiaSulfas">
                                    <label for="alergiaSulfas" style="padding-right: 25px; font-weight: bold;">Alergia Sulfas</label>
                                        <label>Sí</label>
                                        <input type="radio" name="alergiaSulfas" value="1" style="margin-right: 30px;">
                                        <label>No</label>
                                        <input type="radio" name="alergiaSulfas" value="0" checked>
                                </div>'
                                ;
                            }
                            echo 
                            '<div id="contenerAlergiaOtros">
                                <label for="alergiaOtros" style="padding-right: 25px; font-weight: bold; display: block; text-align: center;">Alergia Otros</label>
                                <textarea name="alergiaOtros" id="alergia_Otros" cols="30" rows="10">'.$expediente_2->getOtrasAlergias().'</textarea>
                            </div>'
                            ;

                            if ($expediente_2-> getReaccionesAnestesia()==1)
                            {
                                echo
                                '<div id="contenerReacionesAnestesia">
                                    <label for="reaccionesAnestesia" style="padding-right: 25px; font-weight: bold;">Reacciones Anestesia</label>
                                        <label>Sí</label>
                                        <input type="radio" name="reaccionesAnestesia" value="1" style="margin-right: 30px;" checked>
                                        <label>No</label>
                                        <input type="radio" name="reaccionesAnestesia" value="0">
                                </div>'
                                ;
                            }
                            else
                            {
                                echo
                                '<div id="contenerReacionesAnestesia">
                                    <label for="reaccionesAnestesia" style="padding-right: 25px; font-weight: bold;">Reacciones Anestesia</label>
                                        <label>Sí</label>
                                        <input type="radio" name="reaccionesAnestesia" value="1" style="margin-right: 30px;">
                                        <label>No</label>
                                        <input type="radio" name="reaccionesAnestesia" value="0" checked>
                                </div>'
                                ;
                            }
                        
                            if ($expediente_2-> getSangradoProlongado()==1)
                            {
                                echo
                                '<div id="contenerSangradoProlongado">
                                    <label for="sangradoProlongado" style="padding-right: 25px; font-weight: bold;">Sangrado Prolongado</label>
                                        <label>Sí</label>
                                        <input type="radio" name="sangradoProlongado" value="1" style="margin-right: 30px;" checked>
                                        <label>No</label>
                                        <input type="radio" name="sangradoProlongado" value="0">
                                </div>'
                                ;
                            }
                            else
                            {
                                echo
                                '<div id="contenerReacionesAnestesia">
                                    <label for="sangradoProlongado" style="padding-right: 25px; font-weight: bold;">Sangrado Prolongado</label>
                                        <label>Sí</label>
                                        <input type="radio" name="sangradoProlongado" value="1" style="margin-right: 30px;">
                                        <label>No</label>
                                        <input type="radio" name="sangradoProlongado" value="0" checked>
                                </div>'
                                ;
                            }

                            if ($expediente_2-> getDesmayos()==1)
                            {
                                echo
                                '<div id="contenerDesmayos">
                                    <label for="desmayos" style="padding-right: 25px; font-weight: bold;">Desmayos</label>
                                        <label>Sí</label>
                                        <input type="radio" name="desmayos" value="1" style="margin-right: 30px;" checked>
                                        <label>No</label>
                                        <input type="radio" name="desmayos" value="0">
                                </div>'
                                ;
                            }
                            else
                            {
                                echo
                                '<div id="contenerDesmayos">
                                    <label for="desmayos" style="padding-right: 25px; font-weight: bold;">Desmayos</label>
                                        <label>Sí</label>
                                        <input type="radio" name="desmayos" value="1" style="margin-right: 30px;">
                                        <label>No</label>
                                        <input type="radio" name="desmayos" value="0" checked>
                                </div>'
                                ;
                            }

                            echo
                            '<div id="contenerOtrosPadecimientos">
                                <label for="otrosPadecimientos" style="padding-right: 25px; font-weight: bold; display: block; text-align: center;">Otros padecimientos</label>
                                <textarea name="otrosPadecimientos" id="otros_Padecimientos" cols="30" rows="10">'.$expediente_2 -> getOtrosPadecimientos().'</textarea>
                            </div>'
                            ;

                    echo 
                    '</div>
                        <div id="contenedorDetalleTratamiento">
                            <label for="detalleTratamiento" style="display: block; text-align: center; font-size: 25px;">Detalle del tratamiento</label>
                            <br>
                            <textarea name="detalleTratamiento" id="detalle_Tratamiento" cols="30" rows="10">'.$expediente_2 -> getDetalleTratamiento().'</textarea>
                            <input type="button" value="Modificar" onclick="validarModificacionExpediente()">
                        </div>
                    </form>
                    </div>
                </div>';

                $_SESSION["mostrarDetalleExpediente"] = null; 
                $_SESSION["expedienteDetallado"]= null;
        } 
        else 
        {
            echo
            '<div id="modalModificacionExpediente" class="modal">
                <div class="modal-content">
                    <span id="closeButton" class="closeButton" onclick="emergente_ModificarExpediente_Cerrar()" >&times;</span>
                    <h2>Preguntas del expediente</h2>
                    <form action="../scriptsPHP/modificarExpediente.php" id="formularioModificacionExpediente" method="POST">
                        <input style="display: none;" type="text" id="numeroExpediente" name="numeroExpediente">
                        <div id="contenedorRadioButton">
                            <div id="contenerDiabetes">
                                <label for="diabetes" style="padding-right: 25px; font-weight: bold;">Diabetes</label>
        
                                <label>Sí</label>
                                <input type="radio" name="diabetes" value="1" style="margin-right: 30px;">
                                <label>No</label>
                                <input type="radio" name="diabetes" value="0">
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
                            <div id="contenerSangradoProlongado">
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
                            <textarea name="detalleTratamiento" id="detalle_Tratamiento" cols="30" rows="10"></textarea>
                            <input type="button" value="Modificar" onclick="validarModificacionExpediente()">
                        </div>
                    </form>
                </div>
            </div>'
            ;

            $_SESSION["mostrarDetalleExpediente"] = null; 
            $_SESSION["expedienteDetallado"]= null;
        }
    ?>

    <!-- <div id="modalModificacionExpediente" class="modal">
        <div class="modal-content">
            <span id="closeButton" class="closeButton" onclick="emergente_ModificarExpediente_Cerrar()" >&times;</span>
            <h2>Preguntas del expediente</h2>
            <form action="" id="formularioModificacionExpediente">
                <input style="display: none;" type="text" id="numeroExpediente" name="numeroExpediente">
                <div id="contenedorRadioButton">
                    <div id="contenerDiabetes">
                        <label for="diabetes" style="padding-right: 25px; font-weight: bold;">Diabetes</label>

                        <label>Sí</label>
                        <input type="radio" name="diabetes" value="1" style="margin-right: 30px;">
                        <label>No</label>
                        <input type="radio" name="diabetes" value="0">
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
                    <div id="contenerSangradoProlongado">
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
                    <input type="button" value="Modificar" onclick="validarModificacionExpediente()">
                </div>
            </form>
        </div>
    </div> -->

    <!--Formulario oculto: Pantalla detalle expediente.-->
    <form id="formularioDetalleExpediente" style="display: none" method="POST" action="../scriptsPHP/detalleExpedienteSCRIPT.php">
         <input type="text" name="numeroExpedientePaciente" id="numero_ExpedientePaciente"/>
    </form>
</body>
<script src="../js/expediente.js"></script>
<script src="../js/controlSesion.js"></script>
</html>