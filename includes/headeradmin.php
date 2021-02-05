<?php /*
  <header id="admini">
  <form  action="logout.php" method="POST">

  <?php echo "<h1 id='bienvenida'>Bienvenido ".$_SESSION["logged"]["name"]."</h1>"; ?>

  <nav>
  <a href="index.php" class="btn btn-success">Home</a>
  <a href="crearempleado.php" class="btn btn-primary">Crear nuevo usuario</a>

  <button class="btn btn-danger" type="submit"><span>Cerrar Sesión</span></button>
  </nav>
  </form>

  </header> */ ?>


<header>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<!-- Brand -->
		<a class="navbar-brand">ADMIN</a>

		<!-- Links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="index.php" class="nav-link">Registro Trabajadores</a>
			</li>
			<li class="nav-item">
				<a href="crearempleado.php" class="nav-link">Crear nuevo usuario</a>
			</li>
			<li class="nav-item">
				<a href="logout.php" class="nav-link" type="submit">Cerrar Sesión</a>
			</li>
		</ul>
	</nav>
</header>