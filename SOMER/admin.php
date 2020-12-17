<?php
include_once("header_admin.php");
 ?>
<div class="container">
	<div id="tabs">
  <ul>
    <li><a href="#Productos">Productos</a></li>
    <li><a href="#Pedidos">Pedidos</a></li>
  </ul>
  <div id="Productos">
  	<h2>Productos</h2>
  	<?php
include("Productos.php");
//include("tabPedidos.php");
 ?>
    </div>
  <div id="Pedidos">
  	<h2>Lista de Pedidos</h2>
  	<?php 
  	include("Pedidos.php");
  	 ?>
  </div>
  </div>
</div>
 <?php
include_once("footer.php");
  ?>
