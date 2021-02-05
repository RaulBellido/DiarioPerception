<?php
session_start();
require_once 'includes/connect.php';

if(isset($_POST["submit"])){
	
	$email = trim($_POST["email"]);
	$password = sha1($_POST["password"]);
	
	$sqlusu = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";
	$login = mysqli_query($db, $sqlusu);
	
	
	if(isset($_SESSION["fail"])){
			unset($_SESSION["fail"]);
		}
		
	if($login && mysqli_num_rows($login) == 1){
		$_SESSION["logged"] = mysqli_fetch_assoc($login);

		header("Location: index.php");
	}else{
		$_SESSION["fail"] = "Correo o contraseña incorrecta";
	}
}
header("Location: login.php");
?>


