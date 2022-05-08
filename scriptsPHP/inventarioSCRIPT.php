<?php
    include_once '../clases/inventarioC.php';
    // echo sizeof($_POST); 
    // echo var_dump($_POST);

    $inventario = new inventarioC();

    $cont = 0;

    foreach ($_POST as $llave => $valor)
    {
        $array = explode(",", $valor, 15);
        $resultado = $inventario -> ActualizarDatoInventario($array[1], $array[0]);
        if ($resultado)
        {
            $cont++;
        } 
    }

    if ($cont==sizeof($_POST))
    {
        echo '<script>alert("Inventario actualizado correctamente. Regresando al inventario...")</script>';
        echo "<script>window.setTimeout(function() {window.location.href = '../html/inventario.php';}, 0);</script>";
    }
    else
    {
        echo '<script>alert("No se han podido actualizar todos los instrumentos. Favor intentar más tarde.")</script>';
        echo "<script>window.setTimeout(function() {window.location.href = '../html/inventario.php';}, 0);</script>";
    }
?>