<?php
	/* $namehost="localhost";
	$usuario="root";
	$password="1234";
	$bd="prueba"; */

	$namehost="us-east.connect.psdb.cloud";
	$usuario="xvdg9lm26tojv17lz1fd";
	$password="pscale_pw_jHzegmN0jNmc5XYcdni8rzQR8CgG2N9Ur3jooVYOIGr";
	$bd="bd_crud_php";
	
	$conexion = mysqli_connect($namehost, $usuario, $password) or die (mysqli_error());
	mysqli_select_db($conexion, $bd) or die(mysqli_error());

?>