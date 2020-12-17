<?php 
include ("conexion.php");
$sql='SELECT * FROM producto';
$resultado = mysqli_query($conex, $sql);
 ?>
<head>
	<script>
    function Confirm(){
      confirm("Se eliminara para siempre el elemento seleccionado");
      header(location:'eliminar.php?id='.$filas['modelo']);
  }
  </script>
</head>
 <div>
 	<table cellpadding="20" cellspacing="40" >
 		<thead>
 			<tr>
 				<th>Modelo</th>
 				<th>Linea</th>
 				<th>Estilo</th>
 				<th>Plantilla</th>
 				<th>Suela</th>
 				<th>Corte</th>
 				<th>Montado</th>
 				<th>Casquillo</th>
 				<th>Color</th>
 				<th>Precio</th>
 				<th>Imagen</th>
 				<th>Acciones</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php
 			while($filas=mysqli_fetch_array($resultado)){
 			?>
 			<tr>
 				<td><?php echo $filas['modelo']; ?></td>
 			<td><?php echo $filas['Linea']; ?></td>
 			<td><?php echo $filas['Estilo']; ?></td>
 			<td><?php echo $filas['Plantilla']; ?></td>
 			<td><?php echo $filas['Suela']; ?></td>
 			<td><?php echo $filas['Corte']; ?></td>
 			<td><?php echo $filas['Montado']; ?></td>
 			<td><?php echo $filas['Casquillo'];?></td>
 			<td><?php echo $filas['Color']; ?></td>
 			<td><?php echo $filas['Precio']; ?></td>
 			<td><?php echo $filas['Imagen']; ?></td>
 			<td>
 				<button type="button" onclick="location.href='editar.php?id=<?php echo $filas['modelo']; ?>'">Editar</button>
 				<button type="button" onclick="location.href='eliminar.php?id=<?php echo $filas['modelo']; ?>'">Eliminar</button>
 			</td>
 			</tr>
 			<?php }?>
 		</tbody>
 	</table>
 	<button type="button" onclick="location.href='agregar.php'" style="float: right;">Agregar Producto</button>
 	<center><button type="button" onclick="location.href='index.php'" style="float: center;">Cerrar Sesion</button></center>
 </div>