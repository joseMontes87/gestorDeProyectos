<?php

session_start();
include("conexion.php");

$resultado = $con->query("SELECT IDPROYECTO,
								 p.IDCAMPANIA,
								 c.IDCAMPANIA,
								 p.NOMBRE,
								 TIPO 
						  FROM   proyecto p,
								 campania c
						  WHERE  c.IDCAMPANIA=p.IDCAMPANIA");

$resultado2 = $con->query("SELECT IDCAMPANIA,
								  NOMBRE 
						  FROM    campania");

//Cerrar Sesion------------------------------------------------------------------------------------
if(isset($_POST['cerrarSesion'])){
    session_destroy();
    header('Location: login.php');
}

if(isset($_POST['guardar'])){
	$nombre=mysqli_real_escape_string($con,$_POST['nombre']);
	$urlMateriales=mysqli_real_escape_string($con,$_POST['urlMateriales']);
	$fechaVencimiento=mysqli_real_escape_string($con,$_POST['fechaVencimiento']);
	$tipo=mysqli_real_escape_string($con,$_POST['tipo']);
	$url=mysqli_real_escape_string($con,$_POST['url']);
	$idCampania=mysqli_real_escape_string($con,$_POST['campania']);
	$fecha = date("d,m,y");

	echo("Nombre: ".$nombre."<br>");
	echo("Materiales: ".$urlMateriales."<br>");
	echo("vencimiento: ".$fechaVencimiento."<br>");
	echo("tipo: ".$tipo."<br>");
	echo("url: ".$url."<br>");
	echo("fecha: ".$fecha."<br>");
	echo("campania: ".$idCampania."<br>");

    mysqli_query($con,"INSERT INTO proyecto(IDCAMPANIA,
    										NOMBRE,
    										URLMATERIALES,
    										FECHAVENCIMIENTO,
    										TIPO,
    										URL,
    										FECHA) 
    						values ('$idCampania',
    								'$nombre',
								    '$urlMateriales',
								    '$fechaVencimiento',
								    '$tipo',
								    '$url',
								    '$fecha')");

header("Location:altaProyecto.php");
}

include("nav.php")
?>

<div class="container">
	<?php
	if(isset($_SESSION['usuarioSession'])){
		if($_SESSION['rolSession']==1){
	?>
	<div class="row">
		<div class="col-xs-12 col-md-6">				
			<form action="" method="post">
				<div class="row">
					<div class="col-12">
						<h2>Alta Proyecto</h2>	
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<label for="">Campaña</label>
						<select class="form-control" name="campania" id="campania">
						<?php  
						while($row=$resultado2->fetch_assoc()){
							$nombre=$row["NOMBRE"];
							$id=$row["IDCAMPANIA"];
						?>
							<option value="<?php echo $id ?>"><?php echo $nombre ?></option>
						<?php 
						}
						?>
						</select>
					</div>				
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
							<input type="date" class="form-control" name="fechaVencimiento" id="fechaVencimiento" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="">Tipo</label>
						<select class="form-control" name="tipo" id="tipo">
							<option>Banner Production</option>
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
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<h2>Proyectos</h2>	
					<label for="">Algo</label>				
					<select multiple class="form-control">	
					<?php  
						while($row=$resultado->fetch_assoc()){
							$nombre=$row["NOMBRE"];
							$tipo=$row["TIPO"];
						?>							
						<option><?php echo($tipo); ?>: <?php echo($nombre); ?></option>
						<?php 
						}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<input type="hidden" name="id" value="$id">
					<button type="submit" name="guardar" id="guardar" class="btn btn-default">Ver</button>
					<button type="submit" name="ocultar" id="ocultar" class="btn btn-default" onclick="confirmar()">Ocultar</button>
				</div>
			</div>		
		</div>		
	</div>
	<?php	
		}else{
			echo "Se encuentra en sesion como usuario administrador y no puede cargar tickets, solo aprobarlos";
		}
	}else{
		header("Location: login.php");
		}	
	?>
    <script type="text/javascript" src="js/funciones.js"></script> 

</div>

</body>

</html>