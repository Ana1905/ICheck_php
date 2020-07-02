<?php
    include 'db-schema.php';
    $database = new Database();
    $username = $_GET['username'];
    $name= $_GET['name'];
    $email=$_GET['email'];
    $password=$_GET['password'];

    $update=$database->UpdateUserInfo($username,$password,$email,$name);

    if ($update) {
  			echo "Se actualizó su información correctamente:"." ".$name." ".$email." ".$password." ";
  	} else {
  		echo "Sorry, try again";
  	}

 ?>
