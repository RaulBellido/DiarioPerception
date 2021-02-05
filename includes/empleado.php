<?php
// Buscar dentro de registrolog por nombre de usuario y ordenar por coment_id de mas grande a mas peque, pillar el estado del mas grande.	

$sqllog = "SELECT * FROM registrolog WHERE usuName = '{$_SESSION["logged"]["name"]}' AND fecha = (select max(fecha) from registrolog)";
$registro = mysqli_query($db, $sqllog);
$_SESSION["logregistro"] = mysqli_fetch_assoc($registro);
?>

<div class="wrapper">
	<section>


		<?php if ($_SESSION["logregistro"]["estado"] == 0) { ?>

			<h2>FICHAR ENTRADA</h2>

			<form id="entrada" action="./includes/ficharentrada.php" method="POST">
				<button class="btn btn-success entrada-button" type="submit"><span>FICHAR ENTRADA</span></button>
			</form>



		<?php } else { ?>

			<h2>FICHAR SALIDA</h2>

			<form id="salida" action="./includes/ficharsalida.php" method="POST" enctype="multipart/form-data">

				<div class="form-group green-border-focus cuadrar">
					<label for="work">Comenta el trabajo que has realizado hoy:</label>
					<textarea name="work" class="form-control" rows="3" required></textarea>
				</div>
				</br>

				<div id="salida-button">
					<input class="btn btn-warning entrada-button" type="submit" value="FICHAR SALIDA" name="submit" class="btn btn-success" />
				</div>
			</form>

		<?php } ?>
		<form id="cerrar" action="logout.php" method="POST">
			<button class="btn btn-danger entrada-button" type="submit"><span>Cerrar Sesión</span></button>
		</form>
	</section>
</div>