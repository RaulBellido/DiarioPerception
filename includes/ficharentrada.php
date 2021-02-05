<?php
	include 'redirect.php';
	require_once 'connect.php';
	
	$log = "INSERT INTO registrolog VALUES(NULL,1,'{$_SESSION["logged"]["name"]}',NULL,NOW())";
	$insert_log = mysqli_query($db, $log);

	header("Location: ../index.php");
?> 