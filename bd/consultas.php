<?php 
/*++++++++++++++++++++++++++++++++++++++++INSERTAR UN USUARIO++++++++++++++++++++++++++++++++++++++*/
mysql_query("SET AUTOCOMMIT=0");
mysql_query("START TRANSACTION");

$sqlPersona = mysql_query("INSERT INTO persona (idpersona, nombre, apellido, dni) VALUES('$nombre, $apellido, $dni,')");
$sqlUsuario = mysql_query("INSERT INTO usuario (idusuario, usuario, clave, tipo) VALUES('$usuario, $clave, $tipo,')");

if ($persona and $usuario) {
    mysql_query("COMMIT");
} else {        
    mysql_query("ROLLBACK");
}



/*++++++++++++++++++++++++++++++++++++++++INSERTAR CAMPANIA++++++++++++++++++++++++++++++++++++++++*/
$sqlCampania = $con->query("INSERT INTO campania (idcampania, nombre, descripcion, fecha) VALUES('$nombre, $descripcion, $fecha,')");




/*++++++++++++++++++++++++++++++++++++++++INSERTAR PROYECTO++++++++++++++++++++++++++++++++++++++++*/
//Hacer un for en un select y traer todas las campanias. Segun la seleccionada, capturo el ID y lo inserto en la tabla PROYECTO para saber a que proyecto corresponde la campania 

$sqlProyecto = $con->query("INSERT INTO proyecto (idproyecto, idcampania, urlmateriales, url, fecha, fechavencimiento, tipo) VALUES('$urlmateriales, $url, $fecha,$fechavencimiento, $tipo')");




/*++++++++++++++++++++++++++++++++++++++++INSERTAR TICKET REVIEW+++++++++++++++++++++++++++++++++++++*/
$sqlTicketReview = $con->query("INSERT INTO ticketreview (idreview, asunto, urladjunto, descripcion) VALUES('$asunto, $urladjunto, $descripcion')");


/*++++++++++++++++++++++++++++++++++++++++INSERTAR TICKET REVIEW++++++++++++++++++++++++++++++++++++++*/

$resultado = $con->query("SELECT asunto, urladjunto, descripcion FROM ticketreview");
?>

<form action="" method="post">
	<table>
		<thead>
			<tr>
				<th>Asunto</th>
				<th>Url Adjunto</th>
				<th>Descripcion</th>
			</tr>
		</thead>
		<tbody>																	
			<?php

		while ($row = $resultado->fetch_assoc()){
			$id=$row["idreview"];
			$asunto=$row["asunto"];
			$urladjunto=$row["urladjunto"];
			$descripcion=$row["descripcion"];								
		?>
			<tr>
				<td><?php echo($id); ?></td>
				<td><?php echo($asunto); ?></td>
				<td><?php echo($urladjunto); ?></td>
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

	<button type="submit" name="aprobar" id="aprobar" class="btn btn-default">Modificar</button>	
</form>

<?
$check=$_POST['check'];

$resultado = $con->query("SELECT idreview, asunto, urladjunto, descripcion FROM ticketreview 
	WHERE idreview=$check");
					
$asuntoReview=$row["asunto"];
$urladjuntoReview=$row["urladjunto"];
$descripcionReview=$row["descripcion"];


$sqlTicket = $con->query("INSERT INTO ticket (idticket, prioridad, asunto, urladjunto, observacion, complejidad, descripcion, fechaentrega) VALUES('$prioridad, $asuntoReview, $urladjuntoReview,$observacionReview,$complejidad,$descripcion,$fechaentrega')");


?>