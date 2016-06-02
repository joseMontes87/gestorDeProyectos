<?php

session_start();
include("conexion.php");
//Cerrar Sesion------------------------------------------------------------------------------------
if(isset($_POST['cerrarSesion'])){
    session_destroy();
    header('Location: login.php');
}

if(isset($_POST['crear'])){
	$nombre=mysqli_real_escape_string($con,$_POST['nombre']);
	$apellido=mysqli_real_escape_string($con,$_POST['apellido']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$usuario=mysqli_real_escape_string($con,$_POST['usuario']);
	$clave=mysqli_real_escape_string($con,$_POST['clave']);
	$autoridad=mysqli_real_escape_string($con,$_POST['autoridad']);

    mysqli_query($con,"INSERT INTO usuario(IDROL,NOMBRE,APELLIDO,EMAIL,USUARIO,CLAVE) values ($autoridad,'$nombre','$apellido','$email','$usuario','$clave')");
}

include("nav.php")
?>

	<div class="container">
		<?php
		if(isset($_SESSION['usuarioSession'])){
			if($_SESSION['rolSession']==1){
		?>

		<form action="" method="post">
			<div class="row">
				<div class="col-12">
					<h1>Alta de Usuario</h1>	
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="form-group">
						<label for="">Nombre</label>
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" >
					</div>
					<div class="form-group">
						<label for="">Apellido</label>
						<input type="" class="form-control" name="apellido" id="apellido" placeholder="apellido">
					</div>	
					<div class="form-group">
						<label for="">Email</label>
						<input type="" class="form-control" name="email" id="email" placeholder="Dni">
					</div>
					<div class="form-group">
						<label for="">Rol</label>
						<select class="form-control" name="autoridad" id="autoridad">
							<option>Tipo Usuario</option>
							<option value="1">Admin</option>
							<option value="2">Cuentas</option>
							<option value="3">Desarrollo</option>
						</select>
					</div>														
					<div class="form-group">
						<label for="">Usuario</label>
						<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
					</div>
					<div class="form-group">
						<label for="">Contraseña</label>
						<input type="password" class="form-control" name="clave" id="clave" placeholder="">
					</div>				
				</div>	
			</div>
			<div class="row">
				<div class="col-12">
					<button type="submit" name="crear" id="crear" class="btn btn-default">Crear Usuario</button>
					<a href="login.php" class="btn btn-default">Regresar</a>
				</div>
			</div>
		</form>
		<?php	
			}else{
				echo "Su usuario no tiene permisos para acceder";
			}
		}else{
			header("Location: login.php");
			}	
		?>
	</div>

</body>

</html>