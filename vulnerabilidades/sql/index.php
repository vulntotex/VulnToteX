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
	<strong>¿Que es SQL Injection?</strong>
	<div id="concepto">
	<p>Un ataque de Inyección SQL consiste en la inserción o “inyección” de datos en una consulta SQL desde un cliente de la 
aplicación. El éxito en una inyección SQL puede leer datos sensibles de la base de datos, modificar los datos 
(insertar/actualizar/borrar), realizar operaciones de administración sobre la base de datos (como reiniciar el DBMS), 
recuperar el contenido de un archivo del sistema de archivos del DBMS y, en algunos casos, ejecutar ordenes en el sistema
operativo. Los ataques de inyección SQL son un tipo de ataques de inyección, en los que ordenes SQL son inyectados en 
texto para afectar la correcta realización de una consulta SQL predefinida. </p>
	<!--<p>Consiste en el mal filtrado de los datos pasados por parte del usuario, a una consulta en una aplicacion, lo cual permite cambiar el
	comportamiento normal de la salida de la misma, pudiendo quebrar en algunos casos y dependiendo el escenario
	la <strong>integridad, disponibilidad y condifencialidad </strong> de los datos.</p>-->
	<?php 
	if( ini_get( 'magic_quotes_gpc' ) == true ) 
	{
	echo '<div class="alerta" align="center"><h3>Alerta</h3> Magic Quotes en estado On, no va a poder inyectar codigo, configure en Off</div>';
	}
	
	?>
	</div>
<script type="text/javascript">
	var collapse1=new animatedcollapse("concepto", 600, false, "block")
</script>	
</div>	
	
<div id="cuadro">	
	<a href="javascript:collapse2.slideit()"><img style="border:0;"  src="../../images/maximizar.gif"></img></a>
	<strong>Fallas a Completar</strong>
	
	<div id="codes">
	
	<ul type="square">
	<li><strong><A HREF="admin/">SQLi: Login Bypass</A></strong></li>
	<li><strong><A HREF="numeric/">SQLi: Numeric </A></strong></li>
	<li><strong><A HREF="string/">SQLi: String </A></strong></li>
	<li><strong><A HREF="admin_blind/index.php">SQLi: Blind </A></strong></li>
	</ul>
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
    <A HREF="http://www.securiteam.com/securityreviews/5DP0N1P76E.html">http://www.securiteam.com/securityreviews/5DP0N1P76E.html</A><br>
    <A HREF="http://magnobalt.blogspot.com/2010/04/sql-injection-parte-i.html">http://magnobalt.blogspot.com/2010/04/sql-injection-parte-i.html</A><br>
   	<A HREF="http://www.owasp.org/index.php/SQL_Injection_Prevention_Cheat_Sheet">http://www.owasp.org/index.php/SQL_Injection_Prevention_Cheat_Sheet</A><br>
	<A HREF="http://foro.elhacker.net/hacking_avanzado/gran_tutorial_sobre_inyecciones_sql_en_mysql-t247535.0.html">http://foro.elhacker.net/hacking_avanzado/gran_tutorial_sobre_inyecciones_sql_en_mysql-t247535.0.html</A><br>
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