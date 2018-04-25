<?php
session_start();
$server="localhost";
	$username="root";
	$password="renato19";
	$db='proyecto';
	$con=mysqli_connect($server,$username,$password,$db)or die("no se ha podido establecer la conexion").mysqli_error($con);
	$sdb=mysqli_select_db($con,$db)or die("la base de datos no existe");
	
$re=mysqli_query($con,"select * from usuarios where Usuario='".$_POST['Usuario']."' AND Password='".$_POST['Password']."'")	or die(mysqli_error($con));

	while ($f=mysqli_fetch_array($re)) {
		$arreglo[]=array('Nombre'=>$f['Nombre'],
			'Apellido'=>$f['Apellido'],'Imagen'=>$f['Imagen']);
	}
	if(isset($arreglo)){
		$_SESSION['Usuario']=$arreglo;
		header("Location: ../admin.php");
	}else{
		header("Location: ../login.php?error=datos no validos");
	}
?>