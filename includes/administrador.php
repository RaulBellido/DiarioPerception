<?php
require_once 'headeradmin.php';

$users = mysqli_query($db, "SELECT * FROM users WHERE role=0");
$num_total_users = mysqli_num_rows($users);

if ($num_total_users > 0) {
	$rows_per_page = 8;
	$page = false;

	if (isset($_GET["page"])) {
		$page = $_GET["page"];
	}

	if (!$page) {
		$start = 0;
		$page = 1;
	} else {
		$start = ($page - 1) * $rows_per_page;
	}

	$total_pages = ceil($num_total_users / $rows_per_page);

	$sql = "SELECT * FROM users WHERE role=0 ORDER BY user_id DESC LIMIT {$start}, {$rows_per_page};";
	$users = mysqli_query($db, $sql);
	?>
	<div class="wrapper">
		<section id='steezy'>
			<h2> <?php echo "Bienvenido " . $_SESSION["logged"]["name"]; ?></h2>
			<div class="table-area">
				<table class="responsive-table table">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Email</th>
							<th>Ver Registro</th>
							<th>Editar Usuario</th>
							<th>Eliminar Usuario</th>
						</tr>
					</thead>
					<?php while ($user = mysqli_fetch_assoc($users)) { ?>
						<tbody>	
							<tr>
								<td><?= $user["name"] ?></td>
								<td><?= $user["email"] ?></td>
								<td><a href="verregistro.php?name=<?= $user["name"] ?>" class="btn btn-success">Ver</a></td>
								<td><a href="editregistro.php?name=<?= $user["name"] ?>" class="btn btn-warning">Editar</a></td>
								<td><a href="eliminarregistro.php?id=<?= $user["user_id"] ?>" class="btn btn-danger">Borrar</a></td>
							</tr>
						</tbody>
					<?php } ?>
				</table>
			</div>
			<?php
		} else {
			echo "<div id='nowork'>No existe ningun trabajador</div>";
		}
		?>
	</section>
</div>