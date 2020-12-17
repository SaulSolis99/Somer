<?php
include("conexion.php");

if(isset($_POST['recuperar'])){

  if(!empty($_POST['correo']) && !empty($_POST['cuenta']) && !empty($_POST['captcha'])){

    $correo = $_POST['correo'];
    $cuenta = $_POST['cuenta'];

      $consulta = "SELECT Contraseña, Cuenta FROM usuario WHERE CorreoElectronico ='$correo'";
      $resultado = mysqli_query($conex, $consulta);
      $dato = mysqli_fetch_array($resultado);

      if($dato ['Cuenta'] == $cuenta){
        $contra = $dato['Contraseña'];
        $asunto = "Solicitud de Contraseña"."\r\n";
        $msg = "La contraseña del correo '.$correo.' es '.$contra.'"."\r\n";
        $header = "From: somer_noreply@example.com"."\r\n";
        $header.= "Reply-To: '.$correo.'"."\r\n";
        $header.= "X-Mailer: PHP/". phpversion();
        $mail= @mail("'.$correo.'"."\r\n", $asunto, $msg, $header);

        echo '<script language="javascript">alert("Se ha enviado un correo a '.$correo.' con la contraseña");</script>';
      }else{
        echo '<script language="javascript">alert("El correo o la cuenta no coinciden con ningun dato en la base");</script>';
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
           <input type="email" name="correo" placeholder="Ingresa correo" class="correo">
           <input type="text" name="cuenta" placeholder="Ingresa cuenta" class="cuenta">
           <div class="g-recaptcha" name="captcha" data-sitekey="6Lev2gYaAAAAAAxtq3C7J2D1lqeLC3AKntclXfBa"></div><br><br>
           <input type="submit" name="recuperar" class="submit" value="RECUPERAR"><br>
         </form>
       </div>
       </div>
     </div>
<?php include_once("footer.php"); ?>
