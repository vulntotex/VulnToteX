<?php
require_once ("../../includes/seglogin.php");
require_once ("../../includes/funciones.php");
conexion();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="../../includes/despliegue/animatedcollapse.js"></script>


<title><?php titulo();?></title>
<link rel="STYLESHEET" type="text/css" href="../../includes/estilo.css"> 
<link rel="shortcut icon" href="favicon.ico">
</head>

<body>
<?php 
    require_once '../../includes/sources/avatartemplate.php';
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
include("../../includes/sources/botonera.php");
?>
    </div> 
  <!--div menuhorizontal -->
  
 
<div id="areatexto" >

<div id="cuadro">
	<a href="javascript:collapse1.slideit()"><img style="border:0;"  src="../../images/maximizar.gif"></img></a> 
	<strong>Download</strong>
	<div id="concepto">
	<p>
	Muchos sitios necesitan ofrecer información a sus clientes como ser lista de precios de productos, temarios, binarios, etc. ofreciendo 
	la información en archivos con distintos formatos (DOC, PDF, XLS, ETC) 
	La utilización de las  funciones <a href="http://php.net/manual/en/function.readfile.php" target="_blanck">readfile()</a>
	<a href="http://www.php.net/manual/en/function.fpassthru.php" target="_blanck">fpassthru()</a> sin un adecuado filtro 
	lleva a un atacante a realizar un posible <strong>Directory Transversal</strong> descargando archivos con información confidencial.
	<br>
	<br>
	<strong>1- </strong><A HREF="download_vuln.php?file=descargas/gpl.txt" target="_blanck">Download Vulnerable</A></li>
	<br>
	<strong>2- </strong><A HREF="download.php?file=gpl.txt" target="_blanck">Download Solution</A>
	</p>
	
	</div>
<script type="text/javascript">
	var collapse1=new animatedcollapse("concepto", 600, false, "block")
</script>	
</div>	
	
<div id="cuadro">	
	<a href="javascript:collapse2.slideit()"><img style="border:0;"  src="../../images/maximizar.gif"></img></a>
	
	<strong>Codes</strong>
	
	
	<div id="codes">
	<br>
	<a href="source.php" target="_blanck"> Code Vulnerable</a>
	
	<a href="source.php?solution=true" target="_blanck">Code Solution</a>
	
	
	
	</div>
<script type="text/javascript">
	var collapse2=new animatedcollapse("codes", 600, false, "block")
</script>
</div>

<div id="cuadro">		
 	<a href="javascript:collapse3.slideit()"><img style="border:0;"  src="../../images/maximizar.gif"></img></a> 
	<strong>Mas Información</strong>
	<div id ="moreinfo">
	<br>
	<a href="http://magnobalt.blogspot.com/2010/06/directory-transversal-en-descarga-de.html" target="_blanck">http://magnobalt.blogspot.com/2010/06/directory-transversal-en-descarga-de.html</a>
	<br>
	<a href="http://blog.zerial.org/seguridad/como-validar-correctamente-la-descarga-de-un-archivo-en-php/" target="_blanck">http://blog.zerial.org/seguridad/como-validar-correctamente-la-descarga-de-un-archivo-en-php/</a>
	
    
	</div>
<script type="text/javascript">
	var collapse3=new animatedcollapse("moreinfo", 600, false, "block")
</script>	
</div>

</div><!-- Cierre Area Texto -->





<div id="piepagina">
<?php 
require_once '../../includes/sources/piepagina.php'
?>

</div>

</div>	<!-- Cierre contenedor -->

</body>

</html>
