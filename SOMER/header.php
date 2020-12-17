<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title> Calzado_Solis </title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="Imagenes/somer.ico" />
  <style type="text/css">

    /* {
      margin:0px;
      padding:0px;
    }*/

    #menu_principal {
       position: relative;
      z-index:1;
      margin:auto;
      width:100%; /*Alineacion del menu 500px*/
      font-family:Roboto, sans-serif;/*Formato de la letra*/
      justify-content: center;
      display: flex;
      align-items: center;
    }

    ul, ol {
      list-style:none;
    }

    .nav > li {
      float:left;
    }

    .nav li a {
      background-color:#000;/*color de fondo del menu*/
      color:#fff; /*Color de la letra del menu*/
      text-decoration:none;
      padding:10px 12px; /*20px = ancho y 24px = largo (10px y 12px)*/
      display:block;
    }

    .nav li a:hover {
      background-color:#434343;
    }

    .nav li ul {
      display:none;
      position:absolute;
      min-width:140px;
    }

    .nav li:hover > ul {
      display:block;
    }

    .nav li ul li {
      position:relative;
    }

    .nav li ul li ul {
      right:-140px;
      top:0px;
    }
  </style>
</head>
    <body>
    	<header> <a href="index.php">CALZADO SOLIS</a></header>
      <div id="menu_principal">
  			<ul class="nav">
  				<li><a href="">Productos</a>
  					<ul>
  						<li><a href="">Lineas</a></li>
  						<li><a href="">Colores</a></li>
  						<li><a href="">Plantillas</a></li>
  						<li><a href="">Suelas</a></li>
  						<li><a href="">Montado</a></li>
  						<li><a href="">Casquillos</a></li>
  						<li><a href="">Estilos</a></li>
  						<li><a href="">Sub-Estilo</a></li>
  						<li><a href="">Cortes</a></li>
  					</ul>
  				</li>
  				<li><a href="">Atencion al Cliente</a>
  					<ul>
  						<li><a href="ubicanos.php">Ubicacion</a></li>
  						<li><a href="contactanos.php">Contactanos</a></li>
  					</ul>
  				</li>
  				<li><a href="">Acerca de Nosotros</a>
  					<ul>
  						<li><a href="">Historia</a></li>
  						<li><a href="">Mision</a></li>
  						<li><a href="">Vision</a></li>
  						<li><a href="">Valores</a></li>
  						<li><a href="">Certificaciones</a></li>
  						<li><a href="">Materiales</a></li>
  					</ul>
  				</li>
  				<li><a href="login.php">Sesión</a>
  					<ul>
  						<li><a href="login.php">Iniciar Sesión</a></li>
  						<li><a href="signup.php">Registrarse</a></li>
  						<li><a href="recover.php">Sesion Actual</a></li>
  					</ul>
  				</li>
  				<li><a href="">Pedido</a>
  					<ul>
  						<li><a href="">Informacion Cliente</a></li>
  						<li><a href="">Formas de Pago</a></li>
  					</ul>
  				</li>
  			</ul>
  		</div>
  		<!--div id="Buscador">
  			<input type="search" placeholder="Buscar...">
  			<button>Buscar</button>
  		</div-->

  	</form>
