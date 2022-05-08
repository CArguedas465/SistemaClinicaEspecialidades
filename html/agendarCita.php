<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita</title>
    <link rel="stylesheet" href="../css/estructuraEstilo.css">
    <link rel="stylesheet" href="../css/citasPacienteEstilo.css">
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
        <h1>Agendar Cita</h1>
        <div id="content">
            <p>Para solicitar una cita, el paciente debe estar previamente agregado al sistema.</p>
                <form method="POST" id="formularioAgendarCita" action="../scriptsPHP/agendarCitaSCRIPT.php">
                    <label for="cedula">Cédula</label>
                    <input type="number" name="cedula" id="_cedula">
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" id="_fecha">
                    <label for="hora">Hora</label>
                    <input type="time" name="hora" id="_hora"/>
                    <label for="urgente">Urgente</label>
                    <select name="urgente" id="_urgente">
                        <option value="N/A">Seleccione una opción</option>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                    <br>
                    <label for="procedimiento">Procedimiento potencial</label>
                    <?php
                        include_once '../clases/procedimiento.php';

                        $procedimiento = new procedimiento();

                        echo '<select id="_procedimiento" name="procedimiento">
                                <option value="N/A">Seleccione una opción</option>';
                                $procedimientos = $procedimiento -> GetProcedimientos();
                                while ($row = $procedimientos -> fetch_assoc())
                                {
                                    echo '<option value="'.$row["id_procedimiento"].'">'.utf8_encode($row["nombre_procedimiento"]).'</option>';
                                } 
                        echo '</select>';
                    ?>
                    <br>
                    <label for="descripcionAdicional">Descripción Adicional</label>
                    <textarea name="descripcionAdicional" id="_descripcionAdicional" cols="30" rows="20"></textarea>
                    <input type="button" value="Solicitar Cita" onclick="validar()">
                </form>
        </div>
    </section>
</body>
<script src="../js/agendarCita.js"></script>
<script src="../js/controlSesion.js"></script>
</html>