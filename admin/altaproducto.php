<?php
	$server="localhost";
	$username="root";
	$password="renato19";
	$db='proyecto';
	$con=mysqli_connect($server,$username,$password,$db)or die("no se ha podido establecer la conexion").mysqli_error($con);
	$sdb=mysqli_select_db($con,$db)or die("la base de datos no existe");

	if(!isset($_POST['nombre']) &&  !isset($_POST['descripcion']) && !isset($_POST['precio']) && !isset($_POST['autor']) && !isset($_POST['mas_vendido']) && !isset($_POST['tema'])){
		header("Location: agregarproducto.php");
	}else{
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			$imagen="";
			$random=rand(1,9999);
			if (   ($_FILES["file"]["type"] == "image/gif")
				|| ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/jpg")
				|| ($_FILES["file"]["type"] == "image/pjpeg")
				|| ($_FILES["file"]["type"] == "image/x-png")
				|| ($_FILES["file"]["type"] == "image/png")   ){
				//Verificamos que sea una imagen
		  	if ($_FILES["file"]["error"] > 0){
		  		//verificamos que venga algo en el input file
		    	echo "Error numero: " . $_FILES["file"]["error"] . "<br>";
		    }else{
		    	//subimos la imagen

		    	$imagen= $random.'_'.$_FILES["file"]["name"];
		    	if(file_exists("../libros/".$random.'_'.$_FILES["file"]["name"])){
		      		echo $_FILES["file"]["name"] . " Ya existe. ";
		      	}else{
		      		move_uploaded_file($_FILES["file"]["tmp_name"],
		      		"../libros/" .$random.'_'.$_FILES["file"]["name"]);
		      		echo "Archivo guardado en " . "../libros/" .$random.'_'. $_FILES["file"]["name"];
		      		$producto=$_POST['nombre'];
		      		$autor=$_POST['autor'];
					$descripcion=$_POST['descripcion'];
					$tema=$_POST['tema'];
					$precio=$_POST['precio'];
	
					if ($_POST['mas_vendido']=='on') {
						$mas_vendido=1;
					}else{
						$mas_vendido=0;
					}

					$Sql=("INSERT INTO productos (nombre,descripcion,imagen,precio,mas_vendido,autor,tema) VALUES(
							'".utf8_decode($producto)."',
							'".utf8_decode($descripcion)."',
							'$imagen',
							'$precio',
							'$mas_vendido',
							'$autor',
							'$tema') ");
					mysqli_query($con,$Sql)or die(mysqli_error($con));
					
		      }
		    }
		  }else{
		  echo "Formato no soportado";
		  }

		
	}
?>
