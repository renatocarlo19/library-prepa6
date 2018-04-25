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
		header("Location: ./index.php?Error=Acceso denegado");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos3.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../js/modificar.js"></script>
</head>
<body>
	<header>	
	<section>
		<nav class="menu2">
			<menu>
				<li><a href="../index.php">Inicio</a></li>
				<li><a href="../admin.php">Admin</a></li>
	    		<li><a href="./agregarproducto.php" >Agregar</a></li>
	    		<li><a href="./modificar.php" class="selected">Modificar</a></li>
	    		<li><a href="../login/cerrar.php">Salir</a></li>
			</menu>
		</nav>
	</header>

		<h1>MODIFICAR Y/O ELIMINAR</h1>
		<table width="90%" style="margin:5%;" class="modificar">
			<tr>
				<td>Id</td>
				<td>Nombre</td>
				<td>Descripcion</td>
				<td>Precio</td>
				<td>Más vendido</td>
				<td>Autor</td>
				<td>Tema</td>
				<td>Eliminar</td>
				<td>Modificar</td>
			</tr>
		<?php 
			$resultado=mysqli_query($con,"SELECT * FROM productos");
			while($row=mysqli_fetch_array($resultado)){
				echo '
				<tr>
					<td>
						<input type="hidden" value="'.$row[0].'">'.$row[0].'
						<input type="hidden" class="imagen" value="'.$row[3].'">
					</td>
					<td><input type="text" class="nombre" value="'.utf8_encode($row[1]).'"></td>
					<td><input type="text" class="descripcion" value="'.utf8_decode($row[2]).'"></td>
					<td><input type="text" class="precio" value="'.$row[4].'"></td>
					<td><input type="text" class="mas_vendido" value="'.$row[5].'"></td>
					<td><input type="text" class="autor" value="'.$row[6].'"></td>
					<td><input type="text" class="tema" value="'.$row[7].'"></td>

					<td><button class="eliminar" data-id="'.$row[0].'">Eliminar</button></td>
					<td><button class="modificar" data-id="'.$row[0].'">Modificar</button></td>
				</tr>
				';
			}
		?>
	</table>
	</section>
</body>
</html>