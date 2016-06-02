<?php 

session_start();
include("conexion.php");
//Cerrar Sesion------------------------------------------------------------------------------------
if(isset($_POST['cerrarSesion'])){
    session_destroy();
    header('Location: login.php');
}

$id=$_GET["id"];

$resultado= $con->query("SELECT id,descripcion,observaciones,precio FROM cursos WHERE id LIKE $id");
 
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
						<h1>Insertar Curso</h1>	
					</div>
				</div>
				<?php
					$row=$resultado->fetch_assoc();
					$descripcion=$row["descripcion"];
					$observaciones=$row["observaciones"];
					$precio=$row["precio"];
				?>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label for="">Decripcion</label>
							<input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $descripcion;?>">
						</div>
						<div class="form-group">
							<label for="">Observacion</label>
							<input type="" class="form-control" name="observaciones" id="observaciones" value="<?php echo $observaciones;?>">
						</div>
						<div class="form-group">
							<label for="">Precio</label>
							<input type="" class="form-control" name="precio" id="precio" value="<?php echo $precio;?>">
						</div>
					</div>	
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" name="guardar" id="guardar" class="btn btn-default">Guardar</button>
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