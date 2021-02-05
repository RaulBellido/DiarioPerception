<?php
session_start();
require_once './includes/headeradmin.php';
require_once './includes/connect.php';

// Conseguir usuario
if (!isset($_GET["name"]) || empty($_GET["name"])) {
	header("Location:index.php");
} else
	$name = $_GET["name"];

$sql = "SELECT * FROM registrolog WHERE usuName='" . $name . "' ORDER BY fecha DESC;";
$logreg = mysqli_query($db, $sql);

$num_total_users = mysqli_num_rows($logreg);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
			  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
			  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="./assets/adminuserconfig.css" />
		<link rel="icon" type="image/ico" href="images/perception.png">	
		<title>Registros</title>
    </head>
    <body>
		<?php if ($num_total_users > 0) { ?>
			<div class="wrapper">
				<section id='steezy'>
					<h2>Registros de <?php echo $name ?></h2>

					<div class="table-area">
						<table class="responsive-table table">
							<tr>
								<th>Tipo Registro</th>
								<th>Comentario</th>
								<th>Hora</th>
							</tr>
							<?php
							while ($reg = mysqli_fetch_assoc($logreg)) {
								($reg["estado"] == 1 ? $var = "Entrada" : $var = "Salida");
								($var == "Entrada" ? $style = "alert alert-success" : $style = "alert alert-danger");
								?>

								<tr class=" <?php echo $style ?> ">

									<td><?php echo $var; ?></td> 
									<td><?php echo $reg["comentario"]; ?></td> 
									<td><?php echo $reg["fecha"]; ?></td> 
								</tr>


							<?php } ?>
						</table>
				</section>
			</div>

		<?php } else echo "<script>  alert('Usuario no dispone de registros');window.location= 'index.php'</script>"; ?>
	</body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
	integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
	integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
	integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>