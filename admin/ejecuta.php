<?php  
	include ("../conexion.php");
	if ($_POST['Caso']=="Eliminar") {
		mysqli_query($con,"DELETE FROM productos WHERE Id=".$_POST['Id']);
		unlink("../libros/".$_POST['Imagen']);
		echo('El producto se ha eliminado');
	}

	if ($_POST['Caso']=="Modificar") {
		mysqli_query($con,"UPDATE productos SET nombre='".$_POST['Nombre']."' WHERE id=".$_POST['Id']);
		mysqli_query($con,"UPDATE productos SET descripcion='".$_POST['Descripcion']."' WHERE id=".$_POST['Id']);
		mysqli_query($con,"UPDATE productos SET precio='".$_POST['Precio']."' WHERE id=".$_POST['Id']);
		mysqli_query($con,"UPDATE productos SET mas_vendido='".$_POST['Mas_vendido']."' WHERE Id=".$_POST['Id']);
		mysqli_query($con,"UPDATE productos SET autor='".$_POST['Autor']."' WHERE id=".$_POST['Id']);
		mysqli_query($con,"UPDATE productos SET tema='".$_POST['Tema']."' WHERE id=".$_POST['Id']);

		
		echo('El producto se ha modificado');
	}
?>