<?php
require_once ("../../includes/seglogin.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link href="/vulntotex/includes/google-code-prettify/src/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/vulntotex/includes/google-code-prettify/src/prettify.js"></script>


<title><?php titulo()?></title>
<link rel="shortcut icon" href="favicon.ico">
</head>

<body onload="prettyPrint()">

<?php 

if(isset($_GET[solution])){?>
<span class="source">Code Solution</span>
<pre class="prettyprint" id="com">
&lt;form action="" method="post" enctype="multipart/form-data"&gt;
		&lt;input type="file" name="imagenS"&gt;
		&lt;input type="hidden" name="MAX_FILE_SIZE" value="100000"&gt;
		&lt;input type="submit" value="Cargar" name="Cargar" &gt;&lt;br&gt;
	&lt;/form&gt;	
	
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
		
		if($tamano_archivoS &lt; 1000000)
		{
			if(move_uploaded_file($_FILES['imagenS']['tmp_name'],$rutaS)) 
			{
			echo '&lt;div align="center"&gt;&lt;strong&gt;Imagen subida&lt;/strong&gt;&lt;/div&gt;';
			$id=$_SESSION['usuario']["usuario_id"];
			mysql_query("INSERT INTO upload (usuario_id, uploads ) VALUES ('$id','$rutaS') ");	
			}
		
			
		}
		else 
		{
		
			echo '&lt;div align="center"&gt;&lt;strong&gt;El tamaño '.$tamano_archivoS.' es superior a 100000&lt;/strong&gt;&lt;/div&gt;';
		}		
	}	
	else 
	{
	echo '&lt;div align="center"&gt;&lt;strong&gt;Error Extension no permitida&lt;/strong&gt;&lt;/div&gt;';	
	}
}	
	
 
</pre>
<?php }
else {?>
<span class="source">Code Vulnerable</span>
<pre class="prettyprint" id="com">
&lt;form action="" method="post" enctype="multipart/form-data"&gt;
		&lt;input type="file" name="imagenV"&gt;
		&lt;input type="hidden" name="MAX_FILE_SIZE" value="100000"&gt;
		&lt;input type="submit" value="Cargar" name="Cargar" &gt;&lt;br&gt;
	&lt;/form&gt;
	
if(isset($_FILES['imagenV'])){
	$tamano_archivoV = $_FILES['imagenV']['size'];
	$tipo_archivoV = $_FILES['imagenV']['type'];
	$filenameV= basename($_FILES['imagenV']['name']);
	$rutaV = "uploads/".$filenameV;
	if ((strpos($tipo_archivoV, "gif") || strpos($tipo_archivoV, "jpeg")))
	{
		if($tamano_archivoV &lt; 1000000)
		{
			if(move_uploaded_file($_FILES['imagenV']['tmp_name'],$rutaV)) 
			{
			echo '&lt;div align="center"&gt;&lt;strong&gt;Imagen subida&lt;/strong&gt;&lt;/div&gt;';
			$id=$_SESSION['usuario']["usuario_id"];
			mysql_query("INSERT INTO upload (usuario_id, uploads ) VALUES ('$id','$rutaV') ");	
			}
		
			
		}
		else 
		{
			echo '&lt;div align="center"&gt;&lt;strong&gt;El tamaño '.$tamano_archivoV.' es superior a 100000&lt;/strong&gt;&lt;/div&gt;';
		}		
	}	
	else 
	{
	echo '&lt;div align="center"&gt;&lt;strong&gt;Error Extension no permitida&lt;/strong&gt;&lt;/div&gt;';	
	}
}	

</pre>

<?php }?>

</body>
</html>