<?php  
	session_start();
		$server="localhost";
	$username="root";
	$password="renato19";
	$db='proyecto';
	$con=mysqli_connect($server,$username,$password,$db)or die("no se ha podido establecer la conexion").mysqli_error($con);
	$sdb=mysqli_select_db($con,$db)or die("la base de datos no existe");

		$arreglo=$_SESSION["carrito"];
		$numeroventa=0; 
		
		$re = mysqli_query($con,"SELECT * FROM compras order by numeroventa DESC limit 1")or die(mysqli_error($con));

	while ($f=mysqli_fetch_array($re)) {
		$numeroventa=$f['numeroventa'];
	}
	if ($numeroventa==0) {
		$numeroventa=1;
	}else{
		$numeroventa++;
	}

	for ($i=0; $i < count($arreglo); $i++) { 
		mysqli_query($con,"insert into compras (numeroventa,imagen,nombre,precio,cantidad,subtotal) values(
			".$numeroventa.",
			'".$arreglo[$i]['Imagen']."',
			'".$arreglo[$i]['Nombre']."',
			'".$arreglo[$i]['Precio']."',
			'".$arreglo[$i]['Cantidad']."',
			'".$arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']."')")or die(mysqli_error($con));
	}
	unset($_SESSION['carrito']);
	header("Location: ../admin.php");

?>