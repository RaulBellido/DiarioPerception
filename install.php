<?php
require_once 'includes/connect.php';

$admin = "INSERT INTO users VALUES(NULL, 'Jordi Rodriguez', 'jr.maynou@perception.es', '".sha1("admin")."', '1')";

$insert_user = mysqli_query($db, $admin);


if($insert_user){
	header("Location: ./index.php");
}else echo "El usuario no se ha podido añadir!";

?>