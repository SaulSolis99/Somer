<?php
include("conexion.php");

if(isset($_POST['inicia'])){

  if(!empty($_POST['correo']) && !empty($_POST['contraseña'])){

    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

      $consulta = "SELECT Cuenta FROM usuario WHERE CorreoElectronico ='$correo'";
      $resultado = mysqli_query($conex, $consulta);
      $dato = mysqli_fetch_array($resultado);

      if($dato ['contraseña'] == $contraseña){
        $cuenta = $dato['cuenta'];
        echo '<script language="javascript">alert("Bienvenido ...'.$cuenta.'");</script>';
      }else{
        echo '<script language="javascript">alert("La contraseña ingresada es erronea");</script>';
      }

  }else{
    echo '<script language="javascript">alert("Por favor complete todos los campos");</script>';
  }
}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Imagenes/somer.ico" />
  <title>Recuperar Contraseña</title>
</head>
<body>
<header> <a href="index.php">CALZADO SOLIS</a></header>
   <div class="container">
     <div class="login-container">
       <div class="register">
         <h2>Recuperar Contraseña</h2>
         <form action="login.php" method="POST">
           <input type="text" name="correo" placeholder="Ingresa correo" class="correo">
           <input type="text" name="cuenta" placeholder="Ingresa cuenta" class="cuenta">
           <input type="submit" name="Recuperar" class="submit" value="RECUPERAR"><br>
         </form>
       </div>
       </div>
     </div>
     <footer>
          | <a href="index.html">Inicio</a> | &copy;1952 SOMER S.A. de C.V.
    </footer>
</body>
</html>
