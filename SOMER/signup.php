<?php
include("conexion.php");
session_start();
if(isset($_POST['registra'])){

	if(!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['contraseña']) && !empty($_POST['ccontraseña']) && !empty($_POST['fecha_nac']) && !empty($_POST['edad']) && !empty($_POST['cuenta'])
&& !empty($_POST['apemat']) && !empty($_POST['apepat']) && !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['codigopostal']) && !empty($_POST['localidad']) && !empty($_POST['estado'])
 && !empty($_POST['pais'])){

		$nombre = $_POST['nombre'];
		$cuenta = $_POST['cuenta'];
		$apemat = $_POST['apemat'];
		$apepat = $_POST['apepat'];
		$tel = $_POST['telefono'];
		$dir = $_POST['direccion'];
		$cp = $_POST['codigopostal'];
		$loc = $_POST['localidad'];
		$est = $_POST['estado'];
		$pais = $_POST['pais'];
		if(isset($_POST["imagen"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
			}
		}
		$correo = $_POST['correo'];
		$contra = $_POST['contraseña'];
		$ccontra = $_POST['ccontraseña'];
		$longitud = [".strlen($contra)."];
		$fecha_nac = $_POST['fecha_nac'];
		$edad = $_POST['edad'];
		$tipo = "User\r\n";

		$tiempo = strtotime($fecha_nac);
    $ahora = time();
    $edad1 = ($ahora-$tiempo)/(60*60*24*365.25);
    $edad1 = floor($edad1);

		if($edad >= 18 && $edad == $edad1){
			if($contra == $ccontra){
					$consulta = "INSERT INTO usuario(Cuenta, Contraseña, Tipo, Nombres, ApellidoMat, ApellidoPat, Telefono, CorreoElectronico, Edad, FechaNacimiento, Direccion, CodigoPostal, Localidad, Estado, Pais)
					 VALUES ('$cuenta' , '$contra' ,'$tipo','$nombre', '$apemat', '$apepat', '$tel', '$correo' , '$edad', '$fecha_nac', '$dir', '$cp', '$loc','$est', '$pais')";
					$resultado = mysqli_query($conex, $consulta);
				if($resultado){
						echo '<script language="javascript">alert("Usuario registrado exitosamente");</script>';
						$_SESSION['cuenta']=$cuenta;
						$_SESSION['correo']=$correo;
						$_SESSION['contra']=$contra;
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
include_once("header.php");
 ?>

   <div class="container2">
		 <div class="lado">
		 <div class="signup-image">
		 	<div class="login-container">
				<div class="register">
					<h2 align="center">Registrar Usuario</h2>
					<img src="Imagenes/profile.png" alt="perfil" height="250px" width="230px" align="center">
					<form action="signup.php" method="POST">
						<form action="upload.php" method="post" enctype="multipart/form-data">
			 			<input type="file" name="image"/>
			 			<input type="submit" class=submit name="imagen" value="SUBIR FOTO"/>
	 			</form>
					</form>
				</div>
		 	</div>
		 </div>
		 </div>
		 <div class="lado">
     <div class="signup-container">
       <div class="register">
         <form action="signup.php" method="POST">
					 <input type="text" name="cuenta" placeholder="Ingresa tu cuenta" class="cuenta">
           <input type="text" name="nombre" placeholder="Ingresa tu nombre(s)" class="nombre">
					 <input type="text" name="apepat" placeholder="Ingresa tu apellido paterno" class="apepat">
					 <input type="text" name="apemat" placeholder="Ingresta tu apellido materno" class="apemat">
					 <input type="number" name="telefono" placeholder="Ingresa numero telefonico" class="telefono">
           <input type="email" name="correo" placeholder="Ingresa tu correo" class="correo">
					 <input type="date" id="bday" name="fecha_nac" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" placeholder="Fecha de Nacimiento">
					 <input type="number" name="edad" placeholder="Ingresa tu edad">
					 <input type="text" name="direccion" placeholder="Ingresa tu direccion" class="direccion">
					 <input type="number" name="codigopostal" placeholder="Ingresa tu codigo postal" class="cp">
					 <input type="text" name="localidad" placeholder="Ingresa tu localidad" class="localidad">
					 <input type="text" name="estado" placeholder="Ingresa tu estado" class="estado">
					 <input type="text" name="pais" placeholder="Ingresa tu pais" class="pais">
           <input type="password" name="contraseña" placeholder="Ingresa contraseña" class="pass">
           <input type="password" name="ccontraseña" placeholder="Confirma contraseña" class="repass">
           <input type="submit" name="registra" class="submit" value="REGISTRAR"><br>
         </form>
       </div>
       </div>
		 </div>
     </div>

<?php
include_once("footer.php");
?><?php
include("conexion.php");
session_start();
if(isset($_POST['registra'])){

	if(!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['contraseña']) && !empty($_POST['ccontraseña']) && !empty($_POST['fecha_nac']) && !empty($_POST['edad']) && !empty($_POST['cuenta'])
&& !empty($_POST['apemat']) && !empty($_POST['apepat']) && !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['codigopostal']) && !empty($_POST['localidad']) && !empty($_POST['estado'])
 && !empty($_POST['pais'])){

		$nombre = $_POST['nombre'];
		$cuenta = $_POST['cuenta'];
		$apemat = $_POST['apemat'];
		$apepat = $_POST['apepat'];
		$tel = $_POST['telefono'];
		$dir = $_POST['direccion'];
		$cp = $_POST['codigopostal'];
		$loc = $_POST['localidad'];
		$est = $_POST['estado'];
		$pais = $_POST['pais'];
		if(isset($_POST["imagen"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
			}
		}
		$correo = $_POST['correo'];
		$contra = $_POST['contraseña'];
		$ccontra = $_POST['ccontraseña'];
		$longitud = [".strlen($contra)."];
		$fecha_nac = $_POST['fecha_nac'];
		$edad = $_POST['edad'];
		$tipo = "User\r\n";

		$tiempo = strtotime($fecha_nac);
    $ahora = time();
    $edad1 = ($ahora-$tiempo)/(60*60*24*365.25);
    $edad1 = floor($edad1);

		if($edad >= 18 && $edad == $edad1){
			if($contra == $ccontra){
					$consulta = "INSERT INTO usuario(Cuenta, Contraseña, Tipo, Nombres, ApellidoMat, ApellidoPat, Telefono, CorreoElectronico, Edad, FechaNacimiento, Direccion, CodigoPostal, Localidad, Estado, Pais)
					 VALUES ('$cuenta' , '$contra' ,'$tipo','$nombre', '$apemat', '$apepat', '$tel', '$correo' , '$edad', '$fecha_nac', '$dir', '$cp', '$loc','$est', '$pais')";
					$resultado = mysqli_query($conex, $consulta);
				if($resultado){
						echo '<script language="javascript">alert("Usuario registrado exitosamente");</script>';
						$_SESSION['cuenta']=$cuenta;
						$_SESSION['correo']=$correo;
						$_SESSION['contra']=$contra;
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
include_once("header.php");
 ?>

   <div class="container2">
		 <div class="lado">
		 <div class="signup-image">
		 	<div class="login-container">
				<div class="register">
					<h2 align="center">Registrar Usuario</h2>
					<img src="Imagenes/profile.png" alt="perfil" height="250px" width="230px" align="center">
					<form action="signup.php" method="POST">
						<form action="upload.php" method="post" enctype="multipart/form-data">
			 			<input type="file" name="image"/>
			 			<input type="submit" class=submit name="imagen" value="SUBIR FOTO"/>
	 			</form>
					</form>
				</div>
		 	</div>
		 </div>
		 </div>
		 <div class="lado">
     <div class="signup-container">
       <div class="register">
         <form action="signup.php" method="POST">
					 <input type="text" name="cuenta" placeholder="Ingresa tu cuenta" class="cuenta">
           <input type="text" name="nombre" placeholder="Ingresa tu nombre(s)" class="nombre">
					 <input type="text" name="apepat" placeholder="Ingresa tu apellido paterno" class="apepat">
					 <input type="text" name="apemat" placeholder="Ingresta tu apellido materno" class="apemat">
					 <input type="number" name="telefono" placeholder="Ingresa numero telefonico" class="telefono">
           <input type="email" name="correo" placeholder="Ingresa tu correo" class="correo">
					 <input type="date" id="bday" name="fecha_nac" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" placeholder="Fecha de Nacimiento">
					 <input type="number" name="edad" placeholder="Ingresa tu edad">
					 <input type="text" name="direccion" placeholder="Ingresa tu direccion" class="direccion">
					 <input type="number" name="codigopostal" placeholder="Ingresa tu codigo postal" class="cp">
					 <input type="text" name="localidad" placeholder="Ingresa tu localidad" class="localidad">
					 <input type="text" name="estado" placeholder="Ingresa tu estado" class="estado">
					 <input type="text" name="pais" placeholder="Ingresa tu pais" class="pais">
           <input type="password" name="contraseña" placeholder="Ingresa contraseña" class="pass">
           <input type="password" name="ccontraseña" placeholder="Confirma contraseña" class="repass">
           <input type="submit" name="registra" class="submit" value="REGISTRAR"><br>
         </form>
       </div>
       </div>
		 </div>
     </div>

<?php
include_once("footer.php");
?>