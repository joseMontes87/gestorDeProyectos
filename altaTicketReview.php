<?php

session_start();
include("conexion.php");
//Cerrar Sesion------------------------------------------------------------------------------------
if(isset($_POST['cerrarSesion'])){
    session_destroy();
    header('Location: login.php');
}

if(isset($_POST['enviar'])){
	$asunto=mysqli_real_escape_string($con,$_POST['asunto']);
	$urlAdjunto=mysqli_real_escape_string($con,$_POST['urlAdjunto']);
	$descripcion=mysqli_real_escape_string($con,$_POST['descripcion']);
	
    mysqli_query($con,"INSERT INTO ticketreview(ASUNTO,URLADJUNTO,DESCRIPCION) values ('$asunto','$urlAdjunto','$descripcion')");
}

include("nav.php")
?>

<div class="container">
		<?php
		if(isset($_SESSION['usuarioSession'])){
			if($_SESSION['rolSession']==2){
		?>
		<form action="" method="post">
			<div class="row">
				<div class="col-12">
					<h2>Ticket Review</h2>	
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="form-group">
						<label for="">Asunto</label>
						<input type="text" class="form-control" name="asunto" id="asunto" value="">
					</div>
					<div class="form-group">
						<label for="">Url Adjunto</label>
						<input type="" class="form-control" name="urlAdjunto" id="urlAdjunto" value="">
					</div>
					<div class="form-group">
						<label for="">Descripcion de la tarea</label>
						<textarea class="form-control" name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<button type="submit" name="enviar" id="enviar" class="btn btn-default">Enviar</button>
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