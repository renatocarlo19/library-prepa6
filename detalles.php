<?php 
session_start();
	include("conexion.php");
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Detalles</title>
	<link rel="stylesheet" type="text/css" href="css/estilos1.css">
	<link rel="stylesheet" type="text/css" href="fonts/estilos.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Baloo+Tamma" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
</head>
<body>
<div class="social">
    <ul>
      <li style="background-color: #3b5998;"><a href="https://es-la.facebook.com/prepa6/" target="_blank"><i class="iconito fab fa-facebook-f"></i></a></li>
      <li style="background-color: #00abf0;"><a href="https://twitter.com/prepa6_unam" target="_blank"><i class="iconito fab fa-twitter"></i></a></li>
      <li style="background-color: #d95232;"><a href="https://www.instagram.com/explore/locations/42961477/prepa-6-escuela-nacional-preparatoria-antonio-caso/?hl=es-la" target="_blank"><i class="iconito fab fa-instagram"></i></a></li>
      <li style="background-color: #666666;"><a href="mailto:renato.carlo19@gmail.com"><i class="iconito fas fa-envelope"></i></a></li>
    </ul>
  </div>
	<header>
		 <center>
<nav class="menu">
        <!-- Listado de Navegación -->
        <ul>  
            <li><a href="index.php" title="Inicio"><span class="primero"><i class="icon icon-home"></i></span>Inicio</a></li>  
            <li><a href="quienes_somos.php" title="Quienes somos"><span class="segundo"><i class="icon icon-users"></i></span>Quienes Somos</a></li> 
            <li><a href="mas_vendidos.php" title="Más vendidos"><span class="tercero"><i class="icon icon-books"></i></span>Más vendidos</a></li>
            <li><a href="catalogo.php" title="Catálogo"><span class="cuarto"><i class="icon icon-book"></i></span>Catálogo</a></li>
            <li><a href="contacto.php" title="Contacto"><span class="quinto"><i class="icon icon-bubbles2"></i></span>Contacto</a></li> 
       		<li><a href="carritodecompras.php" title="Carrito de compras"><span class="sexto"><i class="icon icon-cart"></i></span>Carrito</a>
       			<ul>
       				<?php  
 		$total = 0;
 		
 			if (isset($_SESSION['carrito'])) {
 				$datos=$_SESSION['carrito'];
 				$total=0;

 				for ($i=0; $i < count($datos); $i++) { 
 			?>
       				<li><div class="nav_carrito">
 				
 					<img src="libros/<?php echo $datos[$i]['Imagen'];?>"><br>
 					<span><?php echo utf8_encode($datos[$i]['Nombre']); ?></span><br><br>
 					<span>Precio: <?php echo $datos[$i]['Precio']; ?></span><br><br>
 					<span>Cantidad: 
 						<input type="text" value="<?php echo $datos[$i]['Cantidad']; ?>"
 						data-precio="<?php echo $datos[$i]['Precio']; ?>
 						" data-id="<?php echo $datos[$i]['Id']; ?>" class="cantidad">
 					</span><br><br>

 					<span class="subtotal">Subtotal: <?php echo $datos[$i]['Precio']*$datos[$i]['Cantidad']; ?></span><br>
 					
 				

 			
       				<?php
				$total=($datos[$i]['Precio']*$datos[$i]['Cantidad'])+$total;
			
 				}

 			}else{
 				echo '<center><h2 class="vacio">El carrito de compras está vacío</h2></center>';
 			}
 			if ($total!=0) {
 				echo '<center><h2 id="total" class="vacio">Total: '.$total.'</h2></center>';
 				echo '<center><a href="compras/compras.php">Comprar</a></center>';
 			}
 		?>
 		</div></li>
       			</ul>
       		</li>
        </ul>    
</nav>
</center>
</header>
<body> 
 
 <section style="margin-bottom: 275px;">
 	<?php 
 		include ("conexion.php");
	 	$re="select * from productos where id=".$_GET['id'];
	 	$query=mysqli_query($con,$re);
	 
	  while ($f=mysqli_fetch_array($query)){
  ?>
		    <img src="./libros/<?php echo $f['imagen'];?>" height="450" width="300" style="margin-left: 50px; margin-top: 80px; -webkit-box-shadow: 10px 13px 29px -14px rgba(0,0,0,0.28);
-moz-box-shadow: 10px 13px 29px -14px rgba(0,0,0,0.28);
box-shadow: 10px 13px 29px -14px rgba(0,0,0,0.28);
"><br>

		    <div class="detalles">
		<center>
		    <span><?php echo utf8_encode($f['nombre']); ?></span>
									 
		    <p><?php echo utf8_encode($f['descripcion']); ?></p><br>
		 
		    <span>$ <?php echo $f['precio'];?></span><br><br>
		    <a href="./carritodecompras.php?id=<?php echo $f['id']; ?>">Añadir al carrito</a>
		 </center>
		  </div>

	<?php
		  }
 	?>﻿
 	
 </section>

<footer class="pie">
	<img src="imagenes/prepa6.jpg">

<h1>Librería Antonio Caso </h1>
<p>Página creada por Carlo Renato G. B. 61A 2018 &nbsp;<span><i class="far fa-copyright"></i></span></p>

<div class="iconos">
<span><i class="icono fab fa-html5"></i></span>
<span><i class="icono fab fa-css3-alt"></i></span>
<span><i class="icono fab fa-js"></i></span>
<span><i class="icono fab fa-php"></i></span>
</div>

</footer>

</body>
</html>