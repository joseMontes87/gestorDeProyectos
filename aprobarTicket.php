<?php 

session_start();
include("conexion.php");
//Cerrar Sesion------------------------------------------------------------------------------------
if(isset($_POST['cerrarSesion'])){
    session_destroy();
    header('Location: login.php');
}

$id=$_GET["id"];
$resultado = $con->query("SELECT IDREVIEW,ASUNTO,URLADJUNTO,DESCRIPCION FROM ticketreview WHERE IDREVIEW LIKE $id");
$resultado = $con->query("SELECT IDREVIEW,ASUNTO,URLADJUNTO,DESCRIPCION FROM ticketreview WHERE IDREVIEW LIKE $id");


if(isset($_POST['aprobar'])){
	$asunto=mysqli_real_escape_string($con,$_POST['asunto']);
	$urlAdjunto=mysqli_real_escape_string($con,$_POST['urlAdjunto']);
	$descripcion=mysqli_real_escape_string($con,$_POST['descripcion']);
	$observacion=mysqli_real_escape_string($con,$_POST['observacion']);
	$prioridad=mysqli_real_escape_string($con,$_POST['prioridad']);
	$complejidad=mysqli_real_escape_string($con,$_POST['complejidad']);
	
	mysqli_query($con,"DELETE FROM ticketreview WHERE idreview=$id");
	mysqli_query($con,"INSERT INTO ticket(PRIORIDAD,
										DESCRIPCION,
										     ASUNTO,
										 URLADJUNTO,
										OBSERVACION,
										COMPLEJIDAD) 
						values ('$prioridad',
								'$asunto',
								'$urlAdjunto',
								'$observacion',
								'$complejidad')");
									
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
						<h2>Ticket Review</h2>	
					</div>
				</div>
				<?php
					$row=$resultado->fetch_assoc();
					$idreview=$row["IDREVIEW"];
					$asunto=$row["ASUNTO"];
					$urlAdjunto=$row["URLADJUNTO"];
					$descripcion=$row["DESCRIPCION"];
				?>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label for="">Asunto</label>
							<input type="text" class="form-control" name="asunto" id="asunto" value="<?php echo $asunto;?>">
						</div>
						<div class="form-group">
							<label for="">Url Adjunto</label>
							<input type="" class="form-control" name="urlAdjunto" id="urlAdjunto" value="<?php echo $urlAdjunto;?>">
						</div>
						<div class="form-group">
							<label for="">Descripcion</label>
							<input type="" class="form-control" name="descripcion" id="descripcion" value="<?php echo $descripcion;?>">
						</div>

						<h2>Ticket Complete</h2>
						<div class="form-group">
							<label for="">Asignar</label>
							<input type="" class="form-control" name="asignar" id="asignar" value="">
						</div>						
						<div class="form-group">
							<label for="">Prioridad</label>
							<select class="form-control" name="prioridad" id="prioridad">
								<option title="Prioridad">Baja</option>
								<option>Media</option>
								<option>Alta</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Complejidad</label>
							<select class="form-control" name="complejidad" id="complejidad">
								<option title="Complejidad">Baja</option>
								<option>Media</option>
								<option>Alta</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Observaciones</label>
							<input type="" class="form-control" name="observacion" id="observacion" value="">
						</div>	
					</div>	
				</div>
				<div class="row">
					<div class="col-12">
						<input type="hidden" name="id" value="$id">
						<button type="submit" name="aprobar" id="aprobar" class="btn btn-default">Aprobar</button>
						<a href="index.php" class="btn btn-default">Regresar</a>
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