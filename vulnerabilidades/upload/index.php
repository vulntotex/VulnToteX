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
	<strong>Upload</strong>
	<div id="concepto">
	<p>
	Muchos sitios permiten subir archivos. Ej. Las redes sociales como  Facebook  perimite subir
	fotografias, los foros permiten subir el Avatar, sitios de empleos permiten subir el Curriculum Vitae,
	etc. Si la funcion de carga se encuentra con fallas de seguridad, un atacante podria subir archivos (php, python, perl) malintencionados.
	</p>
	<?php 
	 if(!is_writable("uploads/"))
	 {
		echo '<div class="alerta" align="center"><h3>Alerta</h3> La carpeta <strong>'.getcwd().'/uploads/ </strong> no tiene permiso de escritura </div>';
		
	 }
	?>
	<br>
	
	<strong>1 - </strong> Upload Vulnerable 
	
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="imagenV">
		<input type="hidden" name="MAX_FILE_SIZE" value="100000">
		<input type="submit" value="Cargar" name="Cargar" ><br>
	</form>	
	Cargar imagenes gif y jpeg
	<br>
	<?php
function comprobar_existencia($ruta){
	if(file_exists($ruta)){
		return true;
	}
}	 
//----------Tratamiento Upload Vulnerable---------------------
if(isset($_FILES['imagenV'])){
	$tamano_archivoV = $_FILES['imagenV']['size'];
	$tipo_archivoV = $_FILES['imagenV']['type'];
	$filenameV= basename($_FILES['imagenV']['name']);
	$rutaV = "uploads/".$filenameV;
  if(comprobar_existencia($rutaV) != true){
	if ((strpos($tipo_archivoV, "gif") || strpos($tipo_archivoV, "jpeg")))
	{
		if($tamano_archivoV < 1000000)
		{
			if(move_uploaded_file($_FILES['imagenV']['tmp_name'],$rutaV)) 
			{
			echo '<div align="center"><strong>Imagen subida</strong></div>';
			$id=$_SESSION['usuario']["usuario_id"];
			mysql_query("INSERT INTO upload (usuario_id, uploads ) VALUES ('$id','$rutaV') ");	
			}
		
			
		}
		else 
		{
			echo '<div align="center"><strong>El tamaño '.$tamano_archivoV.' es superior a 100000</strong></div>';
		}		
	}	
	else 
	{
	echo '<div align="center"><strong>Error Extension no permitida</strong></div>';	
	}
  }
  else{
	echo '<div align="center"><strong>Error el archivo ya existe</strong></div>';	
	  	
  }
}
?>
	<br><br>
	<strong>2- </strong> Upload Solution 
	<br>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="imagenS">
		<input type="hidden" name="MAX_FILE_SIZE" value="100000">
		<input type="submit" value="Cargar" name="Cargar" ><br>
	</form>	
	Cargar imagenes gif y jpeg
	<br><br>
	<?php 
//----------Tratamiento Upload Solucion---------------------
if(isset($_FILES['imagenS']))
{
	$tamano_archivoS = $_FILES['imagenS']['size'];
	$tipo_archivoS = $_FILES['imagenS']['type'];
	$filenameS= basename($_FILES['imagenS']['name']);
	$file_extensionS = strtolower(substr(strrchr($filenameS,"."),1));	//compruebo si las características del archivo son las que deseo
	if(preg_match('/(gif|jpg|jpeg)/',$file_extensionS)) 
	{
			$queryfoto=mysql_query("select max(id) as id_imagen from upload");
			if(mysql_num_rows($queryfoto)==NULL)
			{

  				$idimagen=1;

	  		}
	  		else{

			$consulta = mysql_fetch_array($queryfoto);
			$idimagen = $consulta['id_imagen'] + 1;



			}
			
			$rutaS = "uploads/".$idimagen.".".$file_extensionS;
		
		if($tamano_archivoS < 1000000)
		{
			if(move_uploaded_file($_FILES['imagenS']['tmp_name'],$rutaS)) 
			{
			echo '<div align="center"><strong>Imagen subida</strong></div>';
			$id=$_SESSION['usuario']["usuario_id"];
			mysql_query("INSERT INTO upload (usuario_id, uploads ) VALUES ('$id','$rutaS') ");	
			}
		
			
		}
		else 
		{
			echo '<div align="center"><strong>El tamaño '.$tamano_archivoS.' es superior a 100000</strong></div>';
		}		
	}	
	else 
	{
	echo '<div align="center"><strong>Error Extension no permitida</strong></div>';	
	}
}
?>
	
	
<?php 
$query = mysql_query("SELECT uploads from upload where usuario_id=".$_SESSION['usuario']["usuario_id"]);
if(mysql_num_rows($query)!=0){
	echo '<strong>'.$_SESSION['usuario']["usuario_user"].'</strong> Estas son tus subidas:</strong><br><br>';
		while($rowuploads=mysql_fetch_array($query)){
		echo '<a href="'.$rowuploads['uploads'].'" target="_blanck">'.$rowuploads['uploads'].'</a><br>';	
	}
	echo '<br>';
}
	
?>	
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
	<a href= "http://www.owasp.org/index.php/Unrestricted_File_Upload" target="_blanck">http://www.owasp.org/index.php/Unrestricted_File_Upload</a>
    <br>
	<a href="http://blogs.securiteam.com/index.php/archives/1268" target="_blanck">http://blogs.securiteam.com/index.php/archives/1268</a>
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
