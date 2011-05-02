<?php
require_once ("../../../includes/seglogin.php");
require_once ("../../../includes/funciones.php");
conexion();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="../../../includes/despliegue/animatedcollapse.js"></script>


<title><?php titulo();?></title>
<link rel="STYLESHEET" type="text/css" href="../../../includes/estilo.css"> 
<link rel="shortcut icon" href="favicon.ico">
</head>

<body>
<?php 
    require_once '../../../includes/sources/avatartemplate.php';
?>

<div id="contenedor" align="center">

<div id="logo" >
<!-- <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="900" height="100">
    <param name="movie" value="bannerzambonet.swf" />
    <param name="quality" value="high" />
	<param name="wmode" value="transparent"> 
    <embed src="../../banner/bannerzambonet.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="860" height="100" wmode="transparent" ></embed>
  </object> -->
</div> 
<!--div logo-->


  <div id="menuhorizontal" align="left">
<?php 
include("../../../includes/sources/botonera.php");
?>
    </div> 
  <!--div menuhorizontal -->
  
 
<div id="areatexto" >

<div id="cuadro">
	<a href="javascript:collapse1.slideit()"><img style="border:0;"  src="../../../images/maximizar.gif"></img></a> 
	<strong>¿Que es Blind SQL Injection?</strong>
	<div id="concepto">
	<p>
	En una técnica que permite inyectar código SQL donde el atacante no obtiene ningun error de la aplicacion,
	solamente utiliza resultado booleano para diferenciar si la inyección tuvo exito o no. Esta técnica es mas
	compleja que las anteriores pero no imposible.
	</p>
	<strong>1- </strong><A HREF="login.php">SQLi: BLIND SQL</A>
	
	</div>
<script type="text/javascript">
	var collapse1=new animatedcollapse("concepto", 600, false, "block")
</script>	
</div>	
	
<div id="cuadro">	
	<a href="javascript:collapse2.slideit()"><img style="border:0;"  src="../../../images/maximizar.gif"></img></a>
	<strong>Codes</strong>
	
	<div id="codes">
	<br>
	<a href= "source.php" target="_blank" title = "Codigo Vulnerable" >Code Vulnerable</a> 
	<a href= "source.php?solution=true" target="_blank" title = "Codigo Vulnerable" >Code Solution</a> 
	
 	
	</div>
<script type="text/javascript">
	var collapse2=new animatedcollapse("codes", 600, false, "block")
</script>
</div>

<div id="cuadro">		
 	<a href="javascript:collapse3.slideit()"><img style="border:0;"  src="../../../images/maximizar.gif"></img></a> 
	<strong>Mas Información</strong>
	<div id ="moreinfo">
	<br>
    <A HREF="http://www.owasp.org/index.php?title=Blind_SQL_Injection" target="_blanck">http://www.owasp.org/index.php?title=Blind_SQL_Injection</A><br>
   </div>
<script type="text/javascript">
	var collapse3=new animatedcollapse("moreinfo", 600, false, "block")
</script>	
</div>

</div><!-- Cierre Area Texto -->





<div id="piepagina">
<?php 
require_once '../../../includes/sources/piepagina.php';

?>
</div>

</div>	<!-- Cierre contenedor -->

</body>

</html>