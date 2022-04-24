<?php 
    include_once '../clases/inventarioC.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="../css/estructuraEstilo.css">
    <link rel="stylesheet" href="../css/inventarioEstilo.css">
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
        <h1>Inventario</h1>
        <div class="contenedorConScroll">
            <form method="POST" id="formularioInventario" action="../scriptsPHP/inventarioSCRIPT.php">
                <?php 

                    $obj_inventario = new inventarioC();

                    $inventario = $obj_inventario -> GetInventario();

                    $cont = 0;

                    while ($row = $inventario -> fetch_assoc())
                    {
                        echo
                        '<div class="bloqueImagen">
                        <img src="'.$row["imagen"].'" alt="">
                        <input class="instrumentos" type="text" style="display: none;" id="repInstrumento'.$cont.'" name="Inst'.$cont.'" value="'.$row["id_pieza"].'"> 
                        <label>Instrumento # '.$row["id_pieza"].' - '.utf8_encode($row["nombre_pieza"]).'</label>
                        <br>
                        <label for="">Disponible</label>
                        <input type="text" value="'.$row["cantidad"].'" id="instrumento'.$cont.'" readonly >
                        <input type="button" value="▲" id="aumentarInstrumento_'.$cont.'" onclick="aumentar(this.id)">
                        <input type="button" value="▼" id="disminuirInstrumento_'.$cont.'" onclick="disminuir(this.id)">
                        </div>'
                        ;
                        $cont++;
                    }

                    $cont = 0;
                    
                ?>
            </form> 
        </div>
        <div id="botonActualizarContenedor">
            <button onclick="actualizarInventario()">Actualizar</button> <!--Hacer submit del lado de javascript con este botón-->
        </div>
    </section>
</body>
<script src="../js/inventario.js"></script>
</html>