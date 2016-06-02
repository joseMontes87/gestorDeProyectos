<?php 
$host="localhost";
$user="root";
$pw="";
$db="gestorproyectos";

$con = new mysqli($host,$user,$pw,$db);
if(mysqli_connect_error()) die(mysqli_connect_error()); 

?>