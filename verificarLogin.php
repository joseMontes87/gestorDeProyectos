<?php 

session_start();
include("conexion.php");

$usuarioPost=mysqli_real_escape_string($con,$_POST['usuario']);
$clavePost=mysqli_real_escape_string($con,$_POST['password']);


$resultado= $con->query("SELECT * FROM usuario WHERE USUARIO='$usuarioPost'");

$resultBd=$resultado->fetch_assoc();
$idUserBd=$resultBd["IDUSUARIO"];
$rolUserBd=$resultBd["IDROL"];
$usuarioBd=$resultBd["USUARIO"];
$claveBd=$resultBd["CLAVE"];


if(isset($usuarioPost) && !empty($usuarioPost)){
	if(isset($clavePost) && !empty($clavePost)){
		if($usuarioPost==$usuarioBd){
			if ($clavePost==$claveBd){
				$_SESSION['usuarioSession']=$idUserBd;
				$_SESSION['rolSession']=$rolUserBd;
				header("Location:index.php");
			}else{
				echo "<script language='JavaScript'>alert('Por favor revise la contraseña ingresada');</script>";
			}		
		}else{
				echo "<script language='JavaScript'>alert('El usuario es incorrecto');</script>";
				header("Location:login.php");
		}
	}else{
		echo "<script language='JavaScript'>alert('Por favor ingrese la contraseña');</script>";
		header("Location:login.php");
	}
}else{
	echo "<script language='JavaScript'>alert('Por favor ingrese el usuario');</script>";
	header("Location:login.php");
}

?>