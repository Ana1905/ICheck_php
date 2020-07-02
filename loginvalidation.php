<?php

include 'db-schema.php';

if (isset($_GET['username']) && isset($_GET['password'])){
	$username = $_GET['username'];
	$password = $_GET['password'];

	$database = new Database();
	$usuario = $database->getUser($username, $password);
	if ($usuario) {
			echo "<script>window.location.href='ICheck_homepage_AboutUs.php?username=".$username."'</script>";
	} else {
		echo "<script>window.location.href='ICheck_login.php?alert=no+user+find';</script>";
	}

} else {
	echo 'Lo sentimos usuario le faltan datos';
}

 ?>
