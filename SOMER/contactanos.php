<?php
session_start();
if(isset($_POST['enviar'])){
  if (!empty($_POST['asunto']) && !empty($_POST['msg'])){
    $asunto = $_POST['asunto'];
    $msg = $_POST['msg'];
    if($_SESSION['correo']){
      $email ="nenu.fuhrer99@gmail.com"."\r\n";
      $remitente = $_SESSION['correo'];
      $header = "From: '$remitente'"."\r\n";
      $header.= "Reply-To: nenu.fuhrer99@gmail.com"."\r\n";
      $header.= "X-Mailer: PHP/". phpversion();
    }else{
    $email ="nenu.fuhrer99@gmail.com"."\r\n";
    $header = "From: somer_noreply@example.com"."\r\n";
    $header.= "Reply-To: nenu.fuhrer99@gmail.com"."\r\n";
    $header.= "X-Mailer: PHP/". phpversion();
  }
    $mail= @mail($email, $asunto, $msg, $header);
    if ($mail) {
      echo '<script language="javascript">alert("Correo enviado correctamente");</script>';
    }else {
      echo '<script language="javascript">alert("Hubo un error en el envio");</script>';
    }
  }
}

include_once("header.php");
 ?>

 <div class="container">
   <div class="mail-container">

     <div class="register">
       <h1>CONTACTANOS</h1><br><br>
       <h2>Resolveremos todas las dudas que nos envies</h2><br><br>
     <form class="mail" action="contactanos.php" method="post">
       <input type="text" name="asunto" placeholder="Asunto" required>
       <textarea name="msg" rows="8" cols="80" placeholder="Mensaje" required></textarea>
       <input type="submit" name="enviar" value="Enviar" class="submit">
     </form>

   </div>
   </div>

 </div>

 <?php
include_once("footer.php");
  ?>
