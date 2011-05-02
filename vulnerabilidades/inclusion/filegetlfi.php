<?php
require_once ("../../includes/seglogin.php");
include_once ("../../includes/funciones.php");
conexion();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="../../includes/despliegue/animatedcollapse.js"></script>

<title><?php titulo()?></title>
<link rel="STYLESHEET" type="text/css" href="../../includes/estilo.css"> </link>
<link rel="shortcut icon" href="favicon.ico"></link>
</head>

<body onload="prettyPrint()">
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
error_reporting(2);


//-------------------COMIENZOO FUNCIONES -------------------

function allrfi($pagina){
$pagina=strtolower($pagina);		
if(substr($pagina,0,7)=="http://" || substr($pagina,0,6)=="ftp://" || substr($pagina,0,6)=="smb://" || substr($pagina,0,8)=="https://")
	{
	echo "Hacker tu ip es -> ".$_SERVER['REMOTE_ADDR']; 
    }
    else{
    include $pagina.".php";
    	
    }
	
}#cierre funcion allrfi

function all($pagina){
$pagina=addslashes($pagina);
$whitelist = array ("rfisolution", "rfi2", "rfi1", "lfi1","lfisolution"); //Withe List
    foreach ($whitelist as $white) {
    	if ($pagina==$white) 
            {
			include ($pagina.".php"); 	             break;
    		 }
      }	
}

//-------------------CIERRO FUNCIONES -------------------



if(isset($_GET['pagina']) && isset($_GET['tipo']))
{
	if ($_GET['tipo'] < 3){
		$pagina=$_GET['pagina'];
	
//----------------------NIVEL 1------------------------------
		if ($_GET['tipo']==1)
		{
		allrfi($pagina);//CASO NORMAL VULN ALL
		}

//-----------------FIN NIVEL 1--------------------------------

//-------------------NIVEL 2 FIX-------------------------------
		if ($_GET['tipo']==2){
		all($pagina);	
		}

//------------------FIN NIVEL 2 FIX---------------------------
	}
}
else {?>
<div id="cuadro">
	<a href="javascript:collapse1.slideit()"><img style="border:0;"  src="../../images/maximizar.gif"></img></a> 
	<strong>¿Que es Inclusiion de archivo Local?</strong>
	<div id="concepto">
		<p>
		En algunos casos no es posible poder incluir una URL en la variable vulnerable, ya sea por parte de la configuración del servidor 
		o del programador. En estas ocaciones se debe verificar la inclusión de archivos locales del servidor: 	archivos de configuacion, logs,
		imagenes con metadatos, etc.<br>
		<br>
		<strong>1- </strong><A HREF="?tipo=1&pagina=lfi1">Local File Inclusion</A>
	
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
		<A HREF="?tipo=2&pagina=lfi1">Code Solution</A>
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
    	<A HREF="http://0verl0ad.blogspot.com/2008/08/local-file-inclusion-infectando.html">http://0verl0ad.blogspot.com/2008/08/local-file-inclusion-infectando.html</A><br>
    	<A HREF="http://www.owasp.org/index.php/Top_10_2007-A3">http://www.owasp.org/index.php/Top_10_2007-A3</A>
    </div>
<script type="text/javascript">
	var collapse3=new animatedcollapse("moreinfo", 600, false, "block")
</script>
</div>   
	
    
    
<?php 

}?>

	








</div><!-- Cierre Area Texto -->





<div id="piepagina">
<?php 
require_once '../../includes/sources/piepagina.php';
?>
</div>

</div>	<!-- Cierre contenedor -->

</body>

</html>
