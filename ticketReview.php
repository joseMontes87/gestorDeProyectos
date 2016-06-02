<?php 

session_start();
include("conexion.php");
//Cerrar Sesion------------------------------------------------------------------------------------
if(isset($_POST['cerrarSesion'])){
    session_destroy();
    header('Location: login.php');
}

if(isset($_POST['ver'])){
	$check=$_POST['check'];
	header('Location: aprobarTicket.php?id='.urlencode($check));
}

$resultado = $con->query("SELECT IDREVIEW,ASUNTO,URLADJUNTO,DESCRIPCION FROM ticketreview");

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
					<h1>Tickets Review</h1>	
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<table id="filterTable" class="table table-bordered">
						<thead>
							<tr>
								<th>Asunto</th>
								<th>Adjuntos</th>
								<th>Descripcion</th>
								<th>Acc</th>
							</tr>
						</thead>
						<tbody>														
						<?php

						while ($row = $resultado->fetch_assoc()){
							$id=$row["IDREVIEW"];
							$asunto=$row["ASUNTO"];
							$urlAdjunto=$row["URLADJUNTO"];
							$descripcion=$row["DESCRIPCION"];							
						?>
							<tr>
								<td><?php echo($asunto); ?></td>
								<td><?php echo($urlAdjunto); ?></td>
								<td><?php echo($descripcion); ?></td>
								<td>
									<input name="check" type="checkbox" id="<?php echo($id); ?>"  value="<?php echo($id); ?>"/>
									<label for="<?php echo($id); ?>"></label>
								</td>
							</tr>
						
						<?php 

						}
						?>
						</tbody>
					</table>
				</div>	
			</div>
			<div class="row">
				<div class="col-12">
					<button type="submit" name="ver" id="ver" class="btn btn-default">Ver</button>
					<button type="submit" name="eliminar" id="eliminar" class="btn btn-default" onclick="confirmar()">Eliminar</button>
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

	<script type="text/javascript" src="js/funciones.js"></script>
	<script language="JavaScript" src="js/jquery.columnfilters.js"></script>	
	<script>
	$(document).ready(function() {
		$('table#filterTable').columnFilters({excludeColumns:[3]});
	});
	</script>
	
</body>

</html>