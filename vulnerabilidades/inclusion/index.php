<?php 
require_once ("../../includes/seglogin.php");
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

<?php 
#error_reporting(0);
?>


<div id="cuadro">
	<a href="javascript:collapse1.slideit()"><img style="border:0;"  src="../../images/maximizar.gif"></img></a> 
	<strong>¿Que es Inclusion de Archivo?</strong>
	<div id="concepto">
	<p> Muchas veces, se nesesita leer archivos
	sobre la solicutud del usuario, si estos parametros están de un modo inseguro, un atacante podría
	manipular esté comportamiento para poder incluir archivos remotos o locales, dependiendo el
	contexto del mismo.
    La inclusión de archivos, se basa en funciones propias de php como ser <a href="http://php.net/manual/en/function.include.php" target="_blank">include()</a>,
    <a href="http://www.php.net/manual/en/function.require.php" target="_blank">require()</a>,
    <a href="http://www.php.net/manual/en/function.include-once.php" target="_blank">include_once()</a>, <a href="http://www.php.net/manual/en/function.require-once.php" target="_blank">require_once()</a>.
    
    </p>
    </div>
<script type="text/javascript">
	var collapse1=new animatedcollapse("concepto", 600, false, "block")
</script>
    
</div>

<div id="cuadro">
	<a href="javascript:collapse2.slideit()"><img style="border:0;"  src="../../images/maximizar.gif"></img></a> 
	<strong></>Fallas a completar</strong>
	<div id="codes">

	<ul type="square">
	<li><strong><A HREF="filegetrfi.php">RFI - Remote Inclusion</A></strong></li>
	<li><strong><A HREF="filegetlfi.php">LFI - Local Inclusion</A></strong></li>
	</ul>
	</div>
<script type="text/javascript">
	var collapse2=new animatedcollapse("codes", 600, false, "block")
</script>	
</div>
<div id="cuadro">
	<a href="javascript:collapse3.slideit()"><img style="border:0;"  src="../../images/maximizar.gif"></img></a> 		
    <strong>Mas Información</strong>
    <div id="moreinfo">
    <br>
    <A HREF="http://en.wikipedia.org/wiki/Remote_File_Inclusion" target="_blanck">http://en.wikipedia.org/wiki/Remote_File_Inclusion</A><br>
    <A HREF="http://www.owasp.org/index.php/Top_10_2007-A3" target="_blanck">http://www.owasp.org/index.php/Top_10_2007-A3</A>
    <br>
    <A HREF="http://www.owasp.org/index.php/File_System#Includes_and_Remote_files" target="_blank">http://www.owasp.org/index.php/File_System#Includes_and_Remote_files</A>
    <br>
    <A HREF="http://magnobalt.blogspot.com/2010/09/charla-unne-rfi-lfi-directory.html" target="_blanck">http://magnobalt.blogspot.com/2010/09/charla-unne-rfi-lfi-directory.html</A>'
    </div>
<script type="text/javascript">
	var collapse3=new animatedcollapse("moreinfo", 600, false, "block")
</script>    
</div>

	








</div><!-- Cierre Area Texto -->





<div id="piepagina">
<?php 
require_once '../../includes/sources/piepagina.php';
?>
</div>

</div>	<!-- Cierre contenedor -->

</body>

</html>