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
	<strong>SQL Injection String</strong><br>
	<div id="concepto">
	<form action="" method="get">
		<br><strong>Usuario ID:</strong>
		<br>
		<br>
		<input type="text" name="id" >
		<br>
		<br>
		<input type="submit"  value= "Enviar">
		<input type="submit"  value= "Solucion" name="solution">
		
		<br>
	</form>
	
<?php 
if(isset($_GET['id'])){
if(isset($_GET['solution'])){
	$id=mysql_real_escape_string($_GET['id']);
	//$id=addslashes($_GET['id']);
	echo '<br><strong>id: <span class="azul">'.limpiarTag($id).'</span></strong>';

	} else {
			$id=$_GET['id'];
			echo '<br><strong>id: <span class="azul">'.limpiarTag($id).'</span></strong>';
			
			}	
	
	
	$consulta= mysql_query("SELECT * FROM usuarios WHERE usuario_id='$id'") or die ('Error en la cosulta '. mysql_error());
	if(mysql_num_rows($consulta)!=0){
	$row=mysql_fetch_array($consulta);
 	echo '<br>'; 
 	echo '<strong>Usuario: <span class="azul">'.$row['usuario_user'].'</span></strong>';
	echo '<br>';
	echo '<strong>Password: <span class="azul">'.$row['usuario_pass'].'</span></strong>';
	echo '<br>';
	echo '<strong>Mail: <span class="azul">'.$row['$usuario_email'].'</span></strong>';
	
				
 		}
 	}	


?>

	</div><!-- Cierra Div Concepto -->
<script type="text/javascript">
	var collapse1=new animatedcollapse("concepto", 600, false, "block")
</script>	
</div>


<div id="cuadro">	
	<a href="javascript:collapse2.slideit()"><img style="border:0;"  src="../../../images/maximizar.gif"></img></a> 
	<strong>Codes</strong>
	<div id="codes">
	<br>
	<A HREF="source.php" target="_blank">Code Vulnerable</A> <A HREF="source.php?solution=true" target="_blanck">Code Solution</A><br>
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
	<A HREF="http://foro.elhacker.net/hacking_avanzado/gran_tutorial_sobre_inyecciones_sql_en_mysql-t247535.0.html" target="_blank">http://foro.elhacker.net/hacking_avanzado/gran_tutorial_sobre_inyecciones_sql_en_mysql-t247535.0.html</A>
	<br>
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