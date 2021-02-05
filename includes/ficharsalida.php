<?php
	include 'redirect.php';
	require_once 'connect.php';

	// SESION D EENVIAR Y PILLAR LO DEL TEXTAREA Y METERLO EN EL APARTADO DE COMENT
	$comentario= $_POST["work"];
	
	$log = "INSERT INTO registrolog VALUES(NULL,0,'{$_SESSION["logged"]["name"]}','{$comentario}',NOW())";
	$insert_log = mysqli_query($db, $log);
	
	header("Location: ../index.php");
	
?> 