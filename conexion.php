<?php  
	
	$server="localhost";
	$username="root";
	$password="renato19";
	$db='proyecto';
	$con=mysqli_connect($server,$username,$password,$db)or die("no se ha podido establecer la conexion").mysqli_error($con);
	$sdb=mysqli_select_db($con,$db)or die("la base de datos no existe");

?>