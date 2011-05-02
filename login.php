<?php
require_once'includes/funciones.php';
conexionps();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<title><?php titulo();?></title>
<link rel="STYLESHEET" type="text/css" href="includes/estilo_login.css"> 

<body>

<div id="contenedor">	

 <div id="areatexto">
	
		<div id="cuadrodialogo">
		<a href="login.php"><img style="border:0;" src="images/logo1.png" alt="Logo" /></a>
        
		  <form action="#" method="post">

		  <br>Nombre:
		  <br>
		  <input type="text" name="user" maxlength="30">
		  <br>
		  <br>
		  Contrase&ntilde;a:
		  <br>
  
		  <input type="password" name="pass" maxlength="50">
		  <br>
		  <br>
		  <!--<input type="image" src="images/button-default1.png"  alt="Entrar" title=" Entrar ">-->
		  <input type="submit" value="Ingresar"  alt="Entrar" title=" Entrar ">
		  <br>
		  <br>
		  <!-- <a HREF="altausuario.php"><img style="border:0;" src="images/button-register.png" ></a>-->
		  
		  <a HREF="altausuario.php"><input type="button" value="Registrarse"></a>
		  
		  </form> 		
		  <br>
		  
		  
		  
		</div>
		
	      
</div>
	<!--fin areatexto-->	
	
 
	
	
	
	<div id="pie">
	<!--fin pie-->
</div>
<!--fin contenedor-->

</div>
</body>
</html>


<?php

if(isset($_POST['user']) && isset($_POST['pass'])){
function pass_cript($pass){#hash seguro donde genero 3 veces el mismo
  for($i=0;$i <3;$i++){
  $pass=md5($pass);
  }
  return $pass;
 }
/* ------------------VIEJO CON ADDSLASHES------------------------------------------------------
if(!get_magic_quotes_gpc()){ #pregunto si las magic_quotes estan desactivadas
  $usuario=$_POST['user'];
  $password=$_POST['pass'];
  $usuario= addslashes($usuario);
  $password= addslashes($password);
}
 else{
  $usuario=$_POST['user'];
  $password=$_POST['pass'];
 }
include("includes/conexion.php");
mysql_select_db("vulntotex",$conexion);
$sql="SELECT * FROM usuarios WHERE usuario_user='$usuario' AND usuario_pass='$password'";
$login=mysql_query($sql,$conexion) or die ('Error en la consulta'. mysql_error());

----------------------------------------------------------------------------------------------*/


	$usuario=$_POST['user'];
    $password=$_POST['pass'];
	$password=pass_cript($password);//generar pass encriptado
		
	$stmt= $mysqli ->prepare("SELECT * FROM usuarios WHERE usuario_user=? and usuario_pass=?");
	$stmt->bind_param('ss', $usuario, $password);
	$stmt->execute();
    $stmt->bind_result($usuario_id, $usuario_user, $usuario_pass, $usuario_email, $usuario_avatar,$usuario_fechaingreso);
	
echo "<br>";
echo "<br>";
echo "<br>";echo "<br>";


if($stmt->fetch()== true) {
  session_start();
  session_name("logeado");
  global $session;
  
  
  $_SESSION['usuario']["usuario_id"] = $usuario_id;
  $_SESSION['usuario']["usuario_user"] = $usuario_user;
  $_SESSION['usuario']["usuario_pass"] = $usuario_pass;
  $_SESSION['usuario']["usuario_email"] = $usuario_email;
  $_SESSION['usuario']["usuario_avatar"] = $usuario_avatar;
  $_SESSION['usuario']["usuario_fechaingreso"]= $usuario_fechaingreso;
  $_SESSION["login"]= true;
  //Habilito el acceso al panel
  //$_SESSION["autentificado"]= "SI";
  
  header("location: index.php");
 }
    else
      {
    header("location: login.php");	
	}
}//if principal
 ?> 
