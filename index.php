<?php
	session_start();
	include("conexion.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Inicio</title>
		<link rel="stylesheet" type="text/css" href="css/estilos1.css" />
		<link rel="stylesheet" type="text/css" href="fonts/estilos.css" />
		<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Baloo+Tamma" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet" />,
	</head>

	<body>
		<header>
			<div class="prepa6">
				<h1>Librería&nbsp;&nbsp; Antonio&nbsp; Caso</h1><img src="imagenes/logo.png">
			</div>
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
				</ul>
				</nav>
			</center>
		</header>

		<div class="social">
		    <ul>
			    <li style="background-color: #3b5998;"><a href="https://es-la.facebook.com/prepa6/" target="_blank"><i class="iconito fab fa-facebook-f"></i></a></li>
			    <li style="background-color: #00abf0;"><a href="https://twitter.com/prepa6_unam" target="_blank"><i class="iconito fab fa-twitter"></i></a></li>
			    <li style="background-color: #d95232;"><a href="https://www.instagram.com/explore/locations/42961477/prepa-6-escuela-nacional-preparatoria-antonio-caso/?hl=es-la" target="_blank"><i class="iconito fab fa-instagram"></i></a></li>
			    <li style="background-color: #666666;"><a href="mailto:renato.carlo19@gmail.com"><i class="iconito fas fa-envelope"></i></a></li>
		    </ul>
		</div>

		<center>
			<div style="margin-top: 100px; margin-bottom: -50px;">
				<div id="cp_widget_cc7c42cc-5af4-4bf2-ba7c-685ed288f4ab">...</div>
				<script type="text/javascript" />
					var cpo = []; cpo["_object"] ="cp_widget_cc7c42cc-5af4-4bf2-ba7c-685ed288f4ab"; cpo["_fid"] = "AMFA2N-M0ldp";
					var _cpmp = _cpmp || []; _cpmp.push(cpo);
					(function() { var cp = document.createElement("script"); cp.type = "text/javascript";
					cp.async = true; cp.src = "//www.cincopa.com/media-platform/runtime/libasync.js";
					var c = document.getElementsByTagName("script")[0];
					c.parentNode.insertBefore(cp, c); })();
				</script>
				<noscript>
					<span>New Gallery 2018/4/3</span><span>originaldate</span><span> 1/1/0001 6:00:00 AM</span><span>width</span><span> 598</span><span>height</span><span> 305</span><span>originaldate</span><span> 1/1/0001 6:00:00 AM</span><span>width</span><span> 1366</span>
					<span> height</span><span> 768</span><span>originaldate</span><span> 1/1/0001 6:00:00 AM</span><span>width</span><span> 1920</span><span>height</span><span> 1080</span>
				</noscript>
			</div>
		</center>
		<section style="margin-left: 30px; margin-right: -100px;">
		 	<?php
		 		include ("conexion.php");
			 	$re="SELECT * FROM productos where mas_vendido!=1";
			 	$query=mysqli_query($con,$re);

			  	while ($f=mysqli_fetch_array($query)){
		  	?>
					<div class="producto" style="margin-left: 30px;">
					   	<center>
						    <img src="./libros/<?php echo $f['imagen'];?> " title="ver detalles" /><br /><br />
						    <span><?php echo utf8_encode($f['nombre']);?></span><br /><br />
						    <a href="./detalles.php?id=<?php echo $f['id']; ?>" style="text-decoration: none;">ver</a>
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
