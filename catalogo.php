<?php 
session_start();
	include("conexion.php");
  ?>

<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
	<title>Catálogo</title>
	<link rel="stylesheet" type="text/css" href="css/estilos1.css">
	<link rel="stylesheet" type="text/css" href="fonts/estilos.css">
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Tamma" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Fascinate+Inline|Orbitron" rel="stylesheet">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.0/normalize.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/seccion.js"></script>
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
<center>
  <div class="prepa">
    <h1>Catálogo&nbsp;&nbsp; <span style="margin-left: 50px; background: -webkit-linear-gradient(yellow,red);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  color: tomato;  "><i class="icon icon-book" style="font-size: 70px;"></i></span></h1>
  </div>
</center>

<div style="margin-top: 00px; margin-right: 50%; margin-left: 10%;"> 
  <a href="#" id="btn-toggle" class="btn-toggle" style="text-decoration:none;">Elige una categoría</a>
 <section class="seccionToggle">
    <div class="catalogo">
     
      <ul>
    <li><a>Autor</a>
<ul>
  <?php  
  $re="SELECT DISTINCT autor FROM productos";
  $query=mysqli_query($con,$re);

  while ($f=mysqli_fetch_array($query)) {
    ?>
    <li><a href="catalogo.php?autor=<?php echo $f['autor']; ?>"><?php echo utf8_encode($f['autor']); ?></a></li>

    <?php
  }

  ?>

</ul>
    </li>
    <li><a>Tema</a>
<ul id="tema">
  <?php  
  $re="SELECT DISTINCT tema FROM productos";
  $query=mysqli_query($con,$re);

  while ($f=mysqli_fetch_array($query)) {
    ?>
    <li><a href="catalogo.php?tema=<?php echo utf8_encode($f['tema']); ?>"><?php echo utf8_encode($f['tema']); ?></a></li>

    <?php
  }

  ?>

</ul>
    </li>

    <li>
      <a href="catalogo.php?precio=precio" style="color: #fff; text-decoration:none;">Precio</a>
    </li>

  </ul>
    </div>
  </section>
  
</div>



<section style="margin-left: 50px; margin-right: -80px;">
<?php 
include ("conexion.php");
if (isset($_GET['autor'])) {
    
    $re="SELECT * FROM productos where autor='".$_GET['autor']."'";
    $query=mysqli_query($con,$re);

    while ($f=@mysqli_fetch_array($query)or die(mysqli_error($con))){
  ?>   
         <div class="producto" style="margin-left: 30px;">
       <center>
        <img src="./libros/<?php echo $f['imagen'];?> " title="ver detalles"><br><br>
        <span><?php echo utf8_encode($f['nombre']);?></span><br><br>
        <a href="./detalles.php?id=<?php echo $f['id']; ?>" style="text-decoration: none;">ver</a><br><br>
        <span><?php echo '$ '.utf8_encode($f['precio']);?></span>
       </center>
      </div>
    
  <?php
    }
  }elseif (isset($_GET['tema'])) {
    include ("conexion.php");
    $re="SELECT * FROM productos where tema='".$_GET['tema']."'";
    $query=mysqli_query($con,$re);
   
    while ($f=@mysqli_fetch_array($query)or die(mysqli_error($con))){
  ?>
         <div class="producto" style="margin-left: 30px;">
       <center>
        <img src="./libros/<?php echo $f['imagen'];?> " title="ver detalles"><br><br>
        <span><?php echo utf8_encode($f['nombre']);?></span><br><br>
        <a href="./detalles.php?id=<?php echo $f['id']; ?>" style="text-decoration: none;">ver</a><br><br>
        <span><?php echo '$ '.utf8_encode($f['precio']);?></span>
       </center>
      </div>

  <?php
      }
  }elseif (isset($_GET['precio'])) {
    include ("conexion.php");
    $re="SELECT * FROM productos ORDER BY precio ";
    $query=mysqli_query($con,$re);
   
    while ($f=@mysqli_fetch_array($query)or die(mysqli_error($con))){
  ?>
         <div class="producto" style="margin-left: 30px;">
       <center>
        <img src="./libros/<?php echo $f['imagen'];?> " title="ver detalles"><br><br>
        <span><?php echo utf8_encode($f['nombre']);?></span><br><br>
        <a href="./detalles.php?id=<?php echo $f['id']; ?>" style="text-decoration: none;">ver</a><br><br>
         <span><?php echo '$ '.utf8_encode($f['precio']);?></span>
       </center>
      </div>

  <?php
      }
      
  }

  ?>﻿
</section>
 <footer class="pie" style="margin-top: 390px; height: 160px">
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