<?php 
	include ("conexion.php");
	include_once("header_admin.php");
	if (!empty($_GET['id'])) {
	
$id=$_GET['id'];
$sql="SELECT * FROM producto WHERE modelo='$id'";
$resultado=mysqli_query($conex, $sql);
  }
   while($fila=mysqli_fetch_array($resultado)){
 ?>
<div>
	<div class="container2">
     <div class="login-container">
       <div class="register">
	<form action="editar.php" method="POST">
		<h2>Editar Producto</h2>
		<input type="hidden" name="id" value="<?php echo $fila['modelo'] ?>">
		<h2>Modelo: <?php echo $fila['modelo'] ?></h2><br>
		<input type="text" name="linea" value="<?php echo $fila['Linea'] ?>">
		<input type="text" name="estilo" value="<?php echo $fila['Estilo'] ?>">
		<input type="text" name="plantilla" value="<?php echo $fila['Plantilla'] ?>">
		<input type="text" name="suela" value="<?php echo $fila['Suela'] ?>">
		<input type="text" name="corte" value="<?php echo $fila['Corte'] ?>">
		<input type="text" name="montado" value="<?php echo $fila['Montado'] ?>">
		<input type="text" name="casquillo" value="<?php echo $fila['Casquillo'] ?>">
		<input type="text" name="color" value="<?php echo $fila['Color'] ?>">
		<input type="number" name="precio" value="<?php echo $fila['Precio'] ?>">
		<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="image"/>
		<input type="submit" name="editar" value="Actualizar">
		<button type="button" onclick="location.href='admin.php'">Regresar</button>
	</form>
	</div>
	</div>
</div>
</div>

<?php 
}
if (isset($_POST['editar'])) {
	if(!empty($_POST['linea']) && !empty($_POST['estilo']) && !empty($_POST['plantilla']) && !empty($_POST['suela'])&& !empty($_POST['corte']) && !empty($_POST['montado']) && !empty($_POST['color']) && !empty($_POST['precio'])){

$id= $_POST['id'];
$linea=$_POST['linea'];
$estilo=$_POST['estilo'];
$plantilla=$_POST['plantilla'];
$suela=$_POST['suela'];
$corte=$_POST['corte'];
$casquillo=$_POST['casquillo'];
$montado=$_POST['montado'];
$color=$_POST['color'];
$precio=$_POST['precio'];
$image=$_POST['image'];

$sql2="UPDATE producto SET Linea='$linea',Estilo='$estilo',Plantilla='$plantilla',Suela='$suela',Corte='$corte',Montado='$montado',Casquillo='$casquillo',Color='$color',Precio='$precio', Imagen='$image' WHERE modelo='$id'";
$resul= mysqli_query($conex, $sql2);
if($resul)
header('location:admin.php');
}
}
include_once("footer.php");
 ?>