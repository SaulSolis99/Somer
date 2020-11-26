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
include_once("header.php");

 ?>
 <script src='https://www.google.com/recaptcha/api.js'></script>
   <div class="container">
     <div class="login-container">
       <div class="register">
         <h2 align="center">Recuperar Contraseña</h2>
         <form action="login.php" method="POST">
           <input type="text" name="correo" placeholder="Ingresa correo" class="correo">
           <input type="text" name="cuenta" placeholder="Ingresa cuenta" class="cuenta">
           <div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW"></div><br><br>
           <input type="submit" name="Recuperar" class="submit" value="RECUPERAR"><br>
         </form>
       </div>
       </div>
     </div>
<?php include_once("footer.php"); ?>
