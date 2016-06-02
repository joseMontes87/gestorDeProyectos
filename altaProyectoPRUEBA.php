<?php

session_start();
include("conexion.php");

$resultado = $con->query("SELECT IDPROYECTO,
								 IDCAMPANIA.t,
								 IDCAMPANIA.c,
								 NOMBRE,
								 TIPO 
						  FROM   ticketreview t,
								 campania c
						  WHERE  IDCAMPANIA.t=IDCAMPANIA.c");

//Cerrar Sesion------------------------------------------------------------------------------------
if(isset($_POST['cerrarSesion'])){
    session_destroy();
    header('Location: login.php');
}

if(isset($_POST['guardar'])){
	$nombre=mysqli_real_escape_string($con,$_POST['nombre']);
	$fecha = date("d,m,y");
    mysqli_query($con,"INSERT INTO campania(NOMBRE,FECHA) values ('$nombre','$fecha')");
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
				<h2>Alta Proyecto</h2>	
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="form-group">
					<label for="">Nombre</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="">
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<label for="">URL Materiales</label>
					<input type="text" class="form-control" name="urlMateriales" id="urlMateriales" value="">
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<label for="">Fecha Vencimiento</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="">
				</div>
			</div>
			<div class="form-group">
				<label for="">Tipo</label>
				<select class="form-control" name="prioridad" id="prioridad">
					<option title="Prioridad">Banner Production</option>
					<option>Web Sites Development</option>
					<option>Search Engine Optimization</option>
				</select>
			</div>
			<div class="col-12">
				<div class="form-group">
					<label for="">URL</label>
					<input type="text" class="form-control" name="url" id="url" placeholder="example:www.quieromioffice.com">
				</div>
			</div>													
		</div>
		<div class="row">
			<div class="col-12">
				<input type="hidden" name="id" value="$id">
				<button type="submit" name="guardar" id="guardar" class="btn btn-default">Guardar</button>
				<a href="index.php" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</form>
	<?php	
		}else{
			echo "Se encuentra en sesion como usuario administrador y no puede cargar tickets, solo aprobarlos";
		}
	}else{
		header("Location: login.php");
		}	
	?>
</div>

</body>

</html>