<?php
	require_once("../UTILS/conection.php");

	$con = mysqli_connect(server,user,password);
	$query= "CREATE DATABASE IF NOT EXISTS ".bbddaraluga;
	$resultado = mysqli_query($con,$query);
	if($resultado){
		echo "La base de datos ha sido creada o ya existe";
	}
?>