<?php 
include ("conexion.php");
$sql='SELECT Folio, Cuenta, Facturacion, Cantidad, Monto, FechaEntrega, CorreoElectronico, Telefono, Referencia, CodigoPostal, Direccion 
FROM pago 
INNER JOIN usuario 
ON pago.Usuario_Cuenta=usuario.Cuenta 
INNER JOIN pedidos 
ON pago.Pedidos_Folio=pedidos.Folio
INNER JOIN carrito
on pedidos.Folio=carrito.Pedidos_Folio';
$resultado = mysqli_query($conex, $sql);
 ?>

 <div>
 	<table cellpadding="20" cellspacing="40">
 		<thead>
 			<tr>
 				<th>Folio</th>
 				<th>Cuenta</th>
 				<th>Facturacion</th>
 				<th>Cantidad</th>
 				<th>Monto</th>
 				<th>Fecha Entrega</th>
 				<th>Correo Electronico</th>
 				<th>Telefono</th>
 				<th>Referencia</th>
 				<th>Codigo Postal</th>
 				<th>Direccion</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php
 			while($filas=mysqli_fetch_array($resultado)){
 			?>
 			<tr>
 				<td><?php echo $filas['Folio']; ?></td>
 			<td><?php echo $filas['Cuenta']; ?></td>
 			<td><?php if($filas['Facturacion']==0)echo "No"; else echo"Si"; ?></td>
 			<td><?php echo $filas['Cantidad']; ?></td>
 			<td><?php echo $filas['Monto']; ?></td>
 			<td><?php echo $filas['FechaEntrega']; ?></td>
 			<td><?php echo $filas['CorreoElectronico']; ?></td>
 			<td><?php echo $filas['Telefono'];?></td>
 			<td><?php echo $filas['Referencia']; ?></td>
 			<td><?php echo $filas['CodigoPostal']; ?></td>
 			<td><?php echo $filas['Direccion']; ?></td>
 			</tr>
 			<?php }?>
 		</tbody>
 	</table>
 	<center><button type="button" onclick="location.href='index.php'" style="float: center;">Cerrar Sesion</button></center>
 </div>