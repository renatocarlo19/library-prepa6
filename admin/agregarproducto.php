<?php
session_start();
	include "../conexion.php";
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
	<script type="text/javascript" src="./js/jquery-1.10.2.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
	<meta charset="utf-8">
</head>
<body>
	<header>
	
	<section>
	<nav class="menu2">
	  <menu>
	    <li><a href="../index.php">Inicio</a></li>
		<li><a href="../admin.php">Admin</a></li>
	    <li><a href="#" class="selected">Agregar</a></li>
	    <li><a href="modificar.php">Modificar</a></li>
	    <li><a href="../login/cerrar.php">Salir</a></li>
	  </menu>
	</nav>
</header>
	<center><h1>Agregar un Nuevo Producto</h1></center><br><br>
	<form action="altaproducto.php" method = "post" enctype="multipart/form-data" class="formulario">
		<center>
		<fieldset>
			Nombre<br>
			<input type="text" name="nombre">
		</fieldset>
		<fieldset>
			Autor<br>
			<input type="text" name="autor">
		</fieldset>
		<fieldset>
			Descripción<br>
			<td><textarea cols="70" rows="10" name="descripcion"></textarea></td>
		</fieldset>
		<fieldset>
			Tema<br>
			<input type="text" name="tema">
		</fieldset>
		<fieldset>
			Imagen<br>
			<input type="file" name="file">
		</fieldset>
		<fieldset>
			Precio<br>
			<input type="text" name="precio">
		</fieldset>
		<fieldset class="mas_vendido">
			<input type="checkbox" name="mas_vendido">
			<p>Más vendido</p>
			
		</fieldset>

		<br><br><input type="submit" name="accion" value="Enviar" class="aceptar" style="margin: 0;">
	</form>	
	</center>
		</form>
	</section>
</body>
</html>