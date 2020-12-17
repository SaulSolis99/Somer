<?php 
	include ("conexion.php");
	include_once("header_admin.php");
if (isset($_POST['agregar'])) {
	if(!empty($_POST['modelo']) && !empty($_POST['linea']) && !empty($_POST['estilo']) && !empty($_POST['plantilla']) && !empty($_POST['suela'])&& !empty($_POST['corte']) && !empty($_POST['montado']) && !empty($_POST['color']) && !empty($_POST['precio'])&& !empty($_POST['casquillo'])){

$modelo= $_POST['modelo'];
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

$sql="INSERT INTO producto(modelo, Linea, Estilo, Plantilla, Suela, Corte, Montado, Casquillo, Color, Precio, Imagen) VALUES ('$modelo', '$linea', '$estilo', '$plantilla', '$suela', '$corte', '$montado', '$casquillo', '$color', '$precio', '$image')";
mysqli_query($conex, $sql);
if($modelo!=null)
header('location:admin.php');
}
}
 ?>
<div>
	<div class="container2">
     <div class="login-container">
       <div class="register">
	<form action="agregar.php" method="POST">
		<h2>Añadir Producto</h2>
		<input type="text" placeholder="Ingresa el Modelo" name="modelo" required>
		<input type="text" placeholder="Ingresa la Linea" name="linea" required>
		<input type="text" placeholder="Ingresa el Estilo" name="estilo" required>
		<input type="text" placeholder="Ingresa la Plantilla" name="plantilla" required>
		<input type="text" placeholder="Ingresa la Suela" name="suela" required>
		<input type="text" placeholder="Ingresa el Corte" name="corte" required>
		<input type="text" placeholder="Ingresa el Montado" name="montado" required>
		<input type="text" placeholder="Ingresa el Casquillo" name="casquillo" required>
		<input type="text" placeholder="Ingresa el Color" name="color" required>
		<input type="number" placeholder="Ingresa el Precio" name="precio" required>
		<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="image"/>
		<input type="submit" name="agregar" value="Agregar">
		<button type="button" onclick="location.href='admin.php'">Regresar</button>
	</form>
	</div>
	</div>
</div>
</div>

<?php 
include_once("footer.php");
 ?>