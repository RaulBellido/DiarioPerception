<?php
session_start();
require_once 'includes/headeradmin.php';
require_once 'includes/connect.php';

// Conseguir usuario
if (!isset($_GET["name"]) || empty($_GET["name"])) {
	header("Location:index.php");
} else
	$name = $_GET["name"];

$sql = "SELECT * FROM users WHERE name='" . $name . "';";
$userdatos = mysqli_query($db, $sql);
$userinfo = mysqli_fetch_assoc($userdatos);

function setValueField($data, $field, $textarea = false) {
	if (isset($data) && count($data) >= 1) {
		if ($textarea != false) {
			echo $data[$field];
		} else {
			echo "value='{$data[$field]}'";
		}
	}
}

// Validar el formulario
if (isset($_POST["submit"])) {

	// Update usuario en la BD

	$encuentra = "SELECT * from users WHERE name = '{$_POST["name"]}'";
	$usu_encontrado = mysqli_query($db, $encuentra);

	if (!mysqli_fetch_assoc($usu_encontrado)) {
		if ($_POST["name"] != $name) {
			$log = "UPDATE registrolog set usuName = '" . $_POST["name"] . "' WHERE usuName = '" . $name . "'";
			$update_log = mysqli_query($db, $log);
		}

		$sql = "UPDATE users set name = '{$_POST["name"]}', "
				. "email = '{$_POST["email"]}' "
				. "WHERE name = '{$name}'";


		$update_user = mysqli_query($db, $sql);

		if ($update_user)
			header("Location:index.php");
		else
			echo "El usuario no se ha actualizado correctamente";
	} else
		
		?>  <script>alert('Ese nombre de trabajador ya existe');window.location = 'index.php'</script><?php
}
?>

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
		<div class="wrapper">
			<section id='steezy'>
				<h2>Editar usuario <?php echo $userinfo["name"]; ?></h2>
				<form action="" method="POST" enctype="multipart/form-data">

					<label for="name">Nombre:</label>
					<input type="text" name="name" class="form-control" <?php setValueField($userinfo, "name"); ?>/> 

					<br/>

					<label for="email">Email:</label>
					<input type="email" name="email" class="form-control" <?php setValueField($userinfo, "email"); ?>/> 

					<br/>

					<input type="submit" value="Enviar" name="submit" class="btn btn-success" />

				</form>
				<a id="exit" href="index.php" class="btn btn-danger" type="submit">Cancelar</a>
			</section>
		</div>
	</body>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
	integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
	integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
	integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>