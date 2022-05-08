<?php
    if(isset($_SESSION))
    {
        session_destroy();
    }
    echo "<script>window.setTimeout(function() {window.location.href = '../html/login.php';}, 0);</script>";
?>