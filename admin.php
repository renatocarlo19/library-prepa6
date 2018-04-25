<?php 
session_start();
	$server="localhost";
	$username="root";
	$password="renato19";
	$db='proyecto';
	$con=mysqli_connect($server,$username,$password,$db)or die("no se ha podido establecer la conexion").mysqli_error($con);
	$sdb=mysqli_select_db($con,$db)or die("la base de datos no existe");
	
	if(isset($_SESSION['Usuario'])){

	}else{
		header("Location: index.php?Error=Acceso denegado");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="css/estilos2.css">
	<link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fonts.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</head>
<body>
<header>
	<span class="libro"><i class="fas fa-book"></i></span>
	<nav class="menu2">
	  <menu>
	    <li><a href="./index.php">Inicio</a></li>
	    <li><a href="#" class="selected">Admin</a></li>
	    <li><a href="admin/agregarproducto.php">Agregar</a></li>
	    <li><a href="admin/modificar.php">Modificar</a></li>
	    <li><a href="./login/cerrar.php">Salir</a></li>
	  </menu>
	</nav>
	 <h1 style="text-align: right; margin-right: 250px; margin-top: -50px; color: #fff; font-family: 'Shrikhand', cursive;">Panel de administrador</h1>
</header>
<section class="ultimas_compras">
	<br><center><h1 style="font-size: 30px; font-family: 'Shrikhand', cursive">Últimas Compras</h1></center>
	<table class="tabla_productos">	
		<tr>
			<td style="font-family: 'Shrikhand', cursive">Imagen</td>
			<td style="font-family: 'Shrikhand', cursive">Nombre</td>
			<td style="font-family: 'Shrikhand', cursive">Precio</td>
			<td style="font-family: 'Shrikhand', cursive">Cantidad</td>
			<td style="font-family: 'Shrikhand', cursive">Subtotal</td>
		</tr>	
	

		<?php
			$re=mysqli_query($con,"SELECT * FROM compras");
			$numeroventa=0;
			while ($f=mysqli_fetch_array($re)) {
					if($numeroventa	!=$f['numeroventa']){
						echo '<tr><td>Compra Número: '.$f['numeroventa'].' </td></tr>';
					}
					$numeroventa=$f['numeroventa'];
					echo '<tr>
						<td><img src="./libros/'.$f['imagen'].'" width="100px" heigth="100px" /></td>
						<td class="texto">'.utf8_encode($f['nombre']).'</td>
						<td class="texto">'.$f['precio'].'</td>
						<td class="texto">'.$f['cantidad'].'</td>
						<td class="texto">'.$f['subtotal'].'</td>

					</tr>';
			}
		?>
	</table>
	</section>
</body>
</html>