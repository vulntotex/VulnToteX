<?php 
session_start();
require_once 'includes/funciones.php';
conexion();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<title><?php titulo()?></title>
<link rel="STYLESHEET" type="text/css" href="includes/estilo.css"> 
<link rel="shortcut icon" href="favicon.ico">
</head>

<body>
<?php 
if($conexion){
require_once 'includes/sources/avatartemplate.php';
}
?>

<div id="contenedor" align="center">


<div id="logo" >
<!-- <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="900" height="100">
    <param name="movie" value="bannerzambonet.swf" />
    <param name="quality" value="high" />
	<param name="wmode" value="transparent"> 
    <embed src="banner/bannerzambonet.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="860" height="100" wmode="transparent" ></embed>
  </object>-->
</div> 
<!--div logo-->


  <div id="menuhorizontal" align="left">
<?php 
require_once 'includes/sources/botonera.php';
?>
  </div> 
  <!--div menuhorizontal -->
  	

<div id="areatexto" >	
	<h1> Configuración Base de Datos</h1>
<p>
Desde aqui es posible crear/resetear la base de datos <strong>VulnToteX</strong>.
Si sucede algun error verifica los datos en el archivo <strong>/vulntotex/includes/config_db.php</strong>
</p>

<form action="#" method="post">
		<input name="crear_db" type="submit" value="Crear/Resetear DB">
		
</form>
<br>
<?php 
if( isset( $_POST[ 'crear_db' ] ) ) {

		require_once 'includes/vulntotexdb.php';
	}

if( isset($_GET['db'])) {
	echo 'Base de Datos <strong>VulnToteX</strong> creada sastifactoriamente';
}	
?>


</div>





<div id="piepagina">
<?php 
#echo 'You are logged in as <strong><a href="homeuser.php">'. $_SESSION['usuario']["usuario_user"].'</a></strong><br>';
require_once 'includes/sources/piepagina.php';
?>
</div>

</div>	<!-- Cierre contenedor -->

</body>

</html>
