<?php
include_once("modelo/Producto.php");
session_start();
$sErr="";
$oProd = new Producto(); //no necesito include porque lo tiene Alumno.php
$i=0;
 ?>
        <div id="contenido">
			<section>
			<script src="js/tablaProductos.js"></script>
			<div id="espacio1">

			</div>
			</section>
		</div>
