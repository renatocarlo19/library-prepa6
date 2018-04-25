<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="css/estilos6.css">
</head>
<body>
	<header>
		
	</header>
	<center>
	<section>
	<form id="formulario" method="post" action="./login/verificar.php" class="login">
		<?php 
		if(isset($_GET['error'])){
			echo '<center>Datos No Validos</center><br><br>';
		}
		?>
		<label for="usuario">Usuario</label><br>
		<input type="text" id="usuario" name="Usuario" placeholder="usuario" ><br>
		<label for="password">Password</label><br>
		<input type="password" id="password" name="Password" placeholder="password" ><br>
		<input type="submit" name="aceptar" value="Aceptar" class="aceptar">
	</form>
	</section>
	</center>
</body>
</html>