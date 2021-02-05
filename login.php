<?php 
// Inicio sesiones
session_start();

if(isset($_SESSION["logged"])){
	header("Location: index.php");
}

// Comprobar que ha introducido un correo o contraseña, sino dar error
?>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./assets/login.css" />
	<link rel="icon" type="image/ico" href="images/perception.png">	
	<title>Registros</title>
	
</head>
<body>
	<div id="login-button">
		<img src="images/login.png"/>
	</div>
	<div id="container">
		<h2>Identificate</h2>
		<span class="close-btn">
			<img src="images/close.png"></img>
		</span>

		<?php // ARREGLAR ERROR 
		if(isset($_SESSION["fail"])){ ?>
		<a id="fail"> <?php echo $_SESSION["fail"]; ?></a>
		<?php unset($_SESSION["fail"]);}?>

		<form action="login-user.php" method="post" autocomplete="off">
		  <input name="email" type="email" placeholder="Email"  class="form-control" required />
		  <input name="password" type="password" placeholder="Password" class="form-control" required />
		  <br/>
		  <input id="entrarfichaje" type="submit" class="btn btn-success" name="submit" value="Entrar"/>
		</form>
	</div>
	
	<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="./assets/loginScript.js"></script>
</body>
</html>