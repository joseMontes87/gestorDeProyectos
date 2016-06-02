<?php

session_start();
include("conexion.php");
//Cerrar Sesion------------------------------------------------------------------------------------
if(isset($_POST['cerrarSesion'])){
    session_destroy();
    header('Location: login.php');
}

include("nav.php")
?>

</body>

</html>