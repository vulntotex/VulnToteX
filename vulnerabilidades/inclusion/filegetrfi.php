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
<link rel="STYLESHEET" type="text/css" href="../../includes/estilo.css"> 
<link rel="shortcut icon" href="favicon.ico">
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
function http($pagina){
if(substr($pagina,0,7)=="http://")
	{
	echo "Hacker tu ip es -> ".$_SERVER['REMOTE_ADDR']; 
    }
    else
    {	
    include $pagina.".php";
    	
    }
	
}#cierre funcion http

function httpmin($pagina){	
$pagina=strtolower($pagina);		
  
if(substr($pagina,0,7)=="http://")
	{
	echo "Hacker tu ip es -> ".$_SERVER['REMOTE_ADDR']; 
    }
    else
    {
    include $pagina.".php";
  
    }
	
}#cierre funcion httpmin

function allrfi($pagina){
$pagina=strtolower($pagina);		
if(substr($pagina,0,7)=="http://" || substr($pagina,0,6)=="ftp://" || substr($pagina,0,6)=="smb://" || substr($pagina,0,8)=="https://")
	{
	echo "Hacker tu ip es -> ".$_SERVER['REMOTE_ADDR']; 
    }
    else{
    include $pagina.".php";
    	
    }
	
}#cierre funcion all

//-------------------CIERRO FUNCIONES -------------------



if(isset($_GET['pagina']) && isset($_GET['tipo']))
{
	if ($_GET['tipo'] < 5){
$pagina=$_GET['pagina'];
	
//----------------------NIVEL 1------------------------------
if ($_GET['tipo']==1)
{
include $pagina.".php";//CASO NORMAL VULN ALL
}

//-----------------FIN NIVEL 1--------------------------------

//-------------------NIVEL 2-------------------------------
if ($_GET['tipo']==2){
http($pagina);	
}

//------------------FIN NIVEL 2---------------------------
//-------------------NIVEL 3-------------------------------
if ($_GET['tipo']==3){
httpmin($pagina);
}

//------------------FIN NIVEL 3---------------------------
//------------------NIVEL 4 FIX---------------------------

if ($_GET['tipo']==4){
allrfi($pagina);
}


//------------------FIN NIVEL 4 FIX------------------------


//----------------Fixed RFI---------------------------------------
#http($pagina);
#http://localhost/zambonet/zambonet/fileget.php?pagina=ftp://balt:123456@localhost/zambonet/zambonet/rfi/upload.txt
#http_ftp($pagina);
#allrfi($pagina);
//----------------Fin RFI---------------------------------------


//----------------Fixed LFI---------------------------------------
#all($pagina);
	}
}
else {?>
<div id="cuadro">
	<a href="javascript:collapse1.slideit()"><img style="border:0;"  src="../../images/maximizar.gif"></img></a> 
	<strong>¿Que es Inclusiion de archivo Remoto?</strong>
	
	<div id="concepto">
	<p> 
	En algunos casos es posible incluir una URL dentro de la variable vulnerable y poder ejecutar script remotos.
	PHP es vulnerable a Remote File Inclusion, permitiendo incluir archivos externos al servidor, en caso de que la variable <span class ="rojo"> allow_url_include</span>
	y <span class ="rojo"> allow_url_fopen</span> esten en modo On
	<br>
	<br>
	<strong>1- </strong><A HREF="?tipo=1&pagina=rfi1">Remote File Inclusion</A></li>
	<br>
	<strong>2- </strong><A HREF="?tipo=2&pagina=rfi2">Remote File Inclusion</A>
	</p>
	 
	</div>
<script type="text/javascript">
	var collapse1=new animatedcollapse("concepto", 600, false, "block")
</script>	
</div>	 
	
<div id="cuadro">	
	<a href="javascript:collapse2.slideit()"><img style="border:0;"  src="../../images/maximizar.gif"></img></a> 
	<strong>Codes</strong>
	<div id ="codes">
	<br>
	<A HREF="?tipo=4&pagina=rfisolution">Code Solution</A>
	
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
	<A HREF="http://en.wikipedia.org/wiki/Remote_File_Inclusion" target="_blanck">http://en.wikipedia.org/wiki/Remote_File_Inclusion</A>
	<br>
    <A HREF="http://www.owasp.org/index.php/Top_10_2007-A3" target="_blanck">http://www.owasp.org/index.php/Top_10_2007-A3</A>
    <br>
    <A HREF="http://www.owasp.org/index.php/File_System#Includes_and_Remote_files" target="_blank">http://www.owasp.org/index.php/File_System#Includes_and_Remote_files</A>

	</div>	
<script type="text/javascript">
	var collapse3=new animatedcollapse("moreinfo", 600, false, "block")
</script>
</div>
<?php 
}
?>







</div><!-- Cierre Area Texto -->





<div id="piepagina">
<?php 
require_once '../../includes/sources/piepagina.php';
?>
</div>

</div>	<!-- Cierre contenedor -->

</body>

</html>