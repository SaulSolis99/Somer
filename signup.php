<?php
include("conexion.php");

if(isset($_POST['registra'])){

	if(!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['contraseña']) && !empty($_POST['ccontraseña']) && !empty($_POST['fecha_nac']) && !empty($_POST['edad']) && !empty($_POST['cuenta'])
&& !empty(['apemat']) && !empty(['apepat']) && !empty(['telefono']) && !empty(['direccion']) && !empty(['codigopostal']) && !empty(['localidad']) && !empty(['provincia']) && !empty(['pais'])){

		$nombre = $_POST['nombre'];
		$cuenta = $_POST['cuenta'];
		$apemat = $_POST['apemat'];
		$apepat = $_POST['apepat'];
		$tel = $_POST['telefono'];
		$dir = $_POST['direccion'];
		$cp = $_POST['codigopostal'];
		$loc = $_POST['localidad'];
		$prov = $_POST['provincia'];
		$pais = $_POST['pais'];
		$foto = $_POST['foto'];
		$correo = $_POST['correo'];
		$contra = $_POST['contraseña'];
		$ccontra = $_POST['ccontraseña'];
		$fecha_nac = $_POST['fecha_nac'];
		$edad = $_POST['edad'];

		$tiempo = strtotime($fecha_nac);
    $ahora = time();
    $edad1 = ($ahora-$tiempo)/(60*60*24*365.25);
    $edad1 = floor($edad1);

		if($edad >= 18 && $edad == $edad1){
			if($contra == $ccontra){
					$consulta = "INSERT INTO `usuario`(`Cuenta`, `Contraseña`, `Tipo`, `Nombres`, `ApellidoMat`, `ApellidoPat`, `Telefono`, `CorreoElectronico`, `Edad`, `FechaNacimiento`, `Direccion`, `CodigoPostal`, `Localidad`, `Provincia`, `Pais`, `Pedidos_Folio`, `ImagenUsu`)
					 VALUES ($cuenta , $contra ,`User`,$nombre, $apemat, $apepat, $tel, $correo , $edad, $fecha_nac, $dir, $cp, $loc, $prov, $pais,``,$foto)";
					$resultado = mysqli_query($conex, $consulta);
				if($resultado){
						echo '<script language="javascript">alert("Usuario registrado exitosamente");</script>';
				}else{
					echo '<script language="javascript">alert("El correo '.$correo.' ya fue registrado anteriormente o hubo un error");</script>';
				}
			}else{
				echo '<script language="javascript">alert("La contraseña no coincide con la confirmacion");</script>';
			}
		}else{
				echo '<script language="javascript">alert("Usuario menor de edad... no puede registrarse");</script>';
			}
			}

	}else{
		echo '<script language="javascript">alert("Por favor complete todos los campos");</script>';
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
  <title> Registrarse</title>
</head>
<body>
	<header> <a href="index.php">CALZADO SOLIS</a></header>
   <div class="container">
     <div class="login-container">
       <div class="register">
         <h2>Registrarse</h2>
         <form action="signup.php" method="POST">
					 <input type="text" name="cuenta" placeholder="Ingresa tu cuenta" class="cuenta">
           <input type="text" name="nombre" placeholder="Ingresa tu nombre(s)" class="nombre">
					 <input type="text" name="apemat" value="Ingresa tu apellido materno" class="apemat">
					 <input type="text" name="apepat" value="Ingresta tu apellido paterno" class="apepat">
					 <input type="numberfield" name="telefono" value="Ingresa numero telefonico" class="telefono">
           <input type="text" name="correo" placeholder="Ingresa tu correo" class="correo">
					 <input type="date" id="bday" name="fecha_nac" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" placeholder="Fecha de Nacimiento">
					 <input type="text" name="edad" placeholder="Ingresa tu edad">
					 <input type="text" name="direccion" value="Ingresa tu direccion" class="direccion">
					 <input type="numberfield" name="codigopostal" value="Ingresa tu codigo postal" class="cp">
					 <input type="text" name="localidad" value="Ingresa tu localidad" class="localidad">
					 <input type="text" name="provincia" value="Ingresa tu provincia" class="provincia">
					 <input type="text" name="pais" value="Ingresa tu pais" class="pais">
					 <input type="image" name="foto" value="ingresa una foto para tu perfil" class="imagen">
           <input type="password" name="contraseña" placeholder="Ingresa contraseña" class="pass">
           <input type="password" name="ccontraseña" placeholder="Confirma contraseña" class="repass">
           <input type="submit" name="registra" class="submit" value="REGISTRARSE"><br>
             <a href="login.php"> ¿Ya estas registrado? Inicia sesion aqui</a>
         </form>
       </div>
       </div>
     </div>
<footer>
          | <a href="index.php">Inicio</a> | Illescas Velázquez Raúl | Gonzalez Muñoz José Sebastian | Solis Lagunes Oscar Saul | &copy;1952 SOMER S.A. de C.V.
		</footer>
</body>
</html>
