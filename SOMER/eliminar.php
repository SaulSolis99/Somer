
<?php 
include("conexion.php");
$msj="Se eliminara para siempre el elemento seleccionado";
echo '<script language="javascript">if(confirm("'.$msj.'")){';
$id=$_GET['id'];
$sql="DELETE FROM producto WHERE modelo='$id'";
mysqli_query($conex, $sql);
header('location:admin.php');
echo'}else{';
header('location:admin.php');
echo '}</script>';
 ?>

