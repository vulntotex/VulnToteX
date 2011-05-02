<?php 
require_once 'includes/seglogin.php'; 
require_once 'includes/funciones.php';
conexion();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<title>VulnTotex 1.0</title>
</head>
<link rel="STYLESHEET" type="text/css" href="includes/estilo_home.css"> 


<body>

<script type="text/javascript">
function irAlIndice() {

    if(confirm("¿Esta seguro de eliminar su Avatar?")) {

        document.location.href= 'borraravatar.php';

    }

} 
</script>
<div id="contenedor">
	<div id="avatar">
	<?php 
	$usuario=$_SESSION['usuario']["usuario_user"];
	mysql_select_db("vulntotex",$conexion);	
	$sql="SELECT usuario_avatar FROM usuarios WHERE usuario_user='$usuario'";
	$login=mysql_query($sql,$conexion) or die ('Error en la consulta'. mysql_error());
	$dato=mysql_fetch_array($login);

if($dato['usuario_avatar']!="")	
	{
		echo '<img width="110" src="'.$dato['usuario_avatar'].'">';
		echo '<a href="#" onclick="irAlIndice();"> <img  style="border:0;" src="images/delete.png"></a>';
	}
	else 
	{
	 $bandera=1;
	}
?>
</div>
  	
<div id="cuadrodialogo">

<?php
echo '<h1>Perfil de <b> <span class="rojo">'.$usuario.'</span></b></h1> ';
echo '<br>';	
echo '<div id="resumen">';//abro div resumen
echo '<strong>Nombre</strong>: &nbsp;&nbsp;'.$_SESSION['usuario']["usuario_user"];
echo '<br>';
echo '<strong>Email</strong>: &nbsp;&nbsp;'.$_SESSION['usuario']["usuario_email"];
echo '<br>';
echo '<strong>Fecha de Registro</strong>: &nbsp;&nbsp;'.$_SESSION['usuario']["usuario_fechaingreso"];
if($bandera==1){
echo '<br><br><br>Sube un Avatar! <span class="rojo">:)</span>';
}
echo '<form action="cargaravatar.php" method="post" enctype="multipart/form-data">
<br>
<input type="file" name="imagen">
<input type="hidden" name="MAX_FILE_SIZE" value="100000">
<input type="submit" value="Cargar" name="Cargar" ><br>
Cargar Avatar (jpg, gif, png)
</form>';
if ($_GET["error"]=="file"){
 echo '<span class="error">Se permite formatos jpg, gif y png </span>';
}

echo '</div>';//cierro div resumen
?>
	 
<div id="pie">
 	<a href="index.php">  <img style="border:0;"  src="images/Home1.png"></a>
</div>
 
   </div> <!--cuado dialogo-->
  
 </div> <!--fin contenedor-->


</body>
</html>
