<?php

session_start();
include("conexion.php");
//Cerrar Sesion------------------------------------------------------------------------------------
if(isset($_POST['cerrarSesion'])){
    session_destroy();
    header('Location: login.php');
}

$resultado= $con->query("SELECT * FROM usuario WHERE IDUSUARIO='" . $_SESSION['usuarioSession'] . "'");

$row = $resultado->fetch_assoc();
$idRol=mysqli_real_escape_string($con,$row["IDROL"]);

$id=mysqli_real_escape_string($con,$row["IDUSUARIO"]);
$nombre=mysqli_real_escape_string($con,$row["NOMBRE"]);
$apellido=mysqli_real_escape_string($con,$row["APELLIDO"]);
$email=mysqli_real_escape_string($con,$row["EMAIL"]);
$usuario=mysqli_real_escape_string($con,$row["USUARIO"]);
$clave=mysqli_real_escape_string($con,$row["CLAVE"]);

if(isset($_POST['modificar'])){
	$nombre=mysqli_real_escape_string($con,$_POST['nombre']);
	echo ("Nombre: ".$nombre);
	$apellido=mysqli_real_escape_string($con,$_POST['apellido']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$usuario=mysqli_real_escape_string($con,$_POST['usuario']);
	$clave=mysqli_real_escape_string($con,$_POST['clave']);

	if(isset($nombre) && !empty($nombre)){
		if(isset($apellido) && !empty($apellido)){
			if(isset($email) && !empty($email)){
				if(isset($usuario) && !empty($usuario)){
					if(isset($clave) && !empty($clave)){
						mysqli_query($con, "UPDATE usuario SET NOMBRE ='$nombre', APELLIDO='$apellido', EMAIL='$email', USUARIO ='$usuario', CLAVE ='$clave' WHERE IDUSUARIO=$id");
					}
				}
			}else echo"El precio no puede estar vacio";
		}else echo"Las observaciones no puede estar vacia";
	}else echo"La descripcion no puede estar vacia";
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
						<h1>Modificar Usuario</h1>	
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label for="">Nombre</label>
							<input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre;?>"placeholder="Nombre">
						</div>
						<div class="form-group">
							<label for="">Apellido</label>
							<input type="" class="form-control" name="apellido" id="apellido" placeholder="apellido" value="<?php echo $apellido;?>">
						</div>	
						<div class="form-group">
							<label for="">Email</label>
							<input type="" class="form-control" name="email" id="email" value="<?php echo $email;?>">
						</div>
<!--  						<div class="form-group">
							<label for="">Rol</label>
							<select class="form-control" name="autoridad" id="autoridad">
								<option value="1">Admin</option>
								<option value="2">Cuentas</option>
								<option value="3">Desarrollo</option>
							</select>
						</div> -->													
						<div class="form-group">
							<label for="">Usuario</label>
							<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $usuario;?>">
						</div>
						<div class="form-group">
							<label for="">Contraseña</label>
							<input type="password" class="form-control" name="clave" id="clave" placeholder="" value="<?php echo $clave;?>">
						</div>				
					</div>	
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" name="modificar" id="modificar" class="btn btn-default">Modificar</button>
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