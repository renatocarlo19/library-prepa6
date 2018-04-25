<?php
	session_start();
	include("conexion.php");
		if (isset($_SESSION['carrito'])) {
			if (isset($_GET['id'])) {

				$arreglo=$_SESSION["carrito"];
				$encontro=false;
				$numero=0;

				for ($i=0; $i < count($arreglo) ; $i++) {
					if ($arreglo[$i]["Id"]==$_GET["id"]) {
						$encontro=true;
						$numero=$i;
					}
				}

				if ($encontro==true){
					$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
					$_SESSION['carrito']=$arreglo;
				}else{

					$nombre="";
					$precio=0;
					$imagen="";
					$re = "SELECT * FROM productos where id=".$_GET['id'];
					$consulta=mysqli_query($con,$re);
					while ($f = mysqli_fetch_array($consulta)) {
						$nombre=$f['nombre'];
						$precio=$f['precio'];
						$imagen=$f['imagen'];
					}
					$datosNuevos= array('Id' => $_GET['id'],
									  'Nombre'=>$nombre,
									  'Precio'=>$precio,
									  'Imagen'=>$imagen,
									  'Cantidad'=>1);

					array_push($arreglo, $datosNuevos);
					$_SESSION['carrito']=$arreglo;
				}
			}
		}
		else{
			if (isset($_GET['id'])) {
				$nombre="";
				$precio=0;
				$imagen="";
				$re = "SELECT * FROM productos where id=".$_GET['id'];
				$consulta=mysqli_query($con,$re);
				while ($f = mysqli_fetch_array($consulta)) {
					$nombre=$f['nombre'];
					$precio=$f['precio'];
					$imagen=$f['imagen'];
				}
				$arreglo[]= array('Id' => $_GET['id'],
								  'Nombre'=>$nombre,
								  'Precio'=>$precio,
								  'Imagen'=>$imagen,
								  'Cantidad'=>1);

				$_SESSION['carrito']=$arreglo;

			}
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="fonts/estilos.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
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
					<li>
		       	<?php
		 			$total = 0;
		 			if (isset($_SESSION['carrito'])) {
		 				$datos=$_SESSION['carrito'];
		 				$total=0;
		 				for ($i=0; $i < count($datos); $i++) {
		 		?>
							<div class="nav_carrito">
			 					<img src="libros/<?php echo $datos[$i]['Imagen'];?>" /><br />
			 					<span><?php echo utf8_encode($datos[$i]['Nombre']); ?></span><br /><br />
			 					<span>Precio: <?php echo $datos[$i]['Precio']; ?></span><br /><br />
			 					<span>Cantidad:
			 						<input type="text" value="<?php echo $datos[$i]['Cantidad']; ?>"
			 						data-precio="<?php echo $datos[$i]['Precio']; ?>"
			 						data-id="<?php echo $datos[$i]['Id']; ?>"
			 						class="cantidad" />
			 					</span><br /><br />

			 					<span class="subtotal">Subtotal: <?php echo $datos[$i]['Precio']*$datos[$i]['Cantidad']; ?></span><br />
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
						 	</div>
					</li>
	       		</ul>
	       	</li>
        </ul>
	</nav>
		</center>
	</header>
	<section>
		<?php
		$total = 0;
			if (isset($_SESSION['carrito'])) {
				$datos=$_SESSION['carrito'];
				$total=0;

				for ($i=0; $i < count($datos); $i++) {
			?>
					<div class="producto">
						<center>
							<img src="libros/<?php echo $datos[$i]['Imagen'];?>" /><br />
							<span><?php echo utf8_encode($datos[$i]['Nombre']); ?></span><br />
							<span>Precio: $<?php echo $datos[$i]['Precio']; ?></span><br />
							<span>Cantidad:
								<input type="text" value="<?php echo $datos[$i]['Cantidad']; ?>"
								data-precio="<?php echo $datos[$i]['Precio']; ?>"
								data-id="<?php echo $datos[$i]['Id']; ?>" class="cantidad" />
							</span><br /><br />

							<span class="subtotal">Subtotal: $<?php echo $datos[$i]['Precio']*$datos[$i]['Cantidad']; ?></span><br /><br />
							<a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id']?>">Eliminar</a>
						</center>
					</div>

				<?php
					$total=($datos[$i]['Precio']*$datos[$i]['Cantidad'])+$total;
				}
			}else{
				echo '<br><br><br><br><br><h2 id="centrado"><Center>El carrito de compras está vacío</Center></h2><br><br>';
			}
			if ($total!=0) {
				echo '<center><h2 id="total">Total: $'.$total.'</h2></center>';
				echo '<br><center><a href="compras/compras.php" class="enlace">Comprar</a></center><br><br>';
			}
		?>
		<center><a href="./index.php" class="enlace">Ver catálogo</a></center>
 	</section>
</body>
</html>
