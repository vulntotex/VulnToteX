<?php
require_once ("../../../includes/seglogin.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link href="/vulntotex/includes/google-code-prettify/src/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/vulntotex/includes/google-code-prettify/src/prettify.js"></script>


<title><?php titulo()?></title>
<link rel="STYLESHEET" type="text/css" href="../../includes/estilo.css"> 
<link rel="shortcut icon" href="favicon.ico">
</head>

<body onload="prettyPrint()">

<?php 

if(isset($_GET[solution])){?>
<span class="source">Code Solution</span>
<pre class="prettyprint" id="com"> 
$usuario=mysql_real_escape_string($_POST['usuario']);
$password=mysql_real_escape_string($_POST['pass']);

$password=pass_cript($password);//Llamada a funcion que encripta password
mysql_select_db('vulntotex',$conexion);
$sql="SELECT * FROM usuarios WHERE usuario_user='$usuario'";
$login=mysql_query($sql,$conexion) or die ('Error en la consulta'. mysql_error());
$row=mysql_fetch_array($login);
if(isset($row) && !empty($row)){ 
 if ($row['usuario_pass']==$password)
 { 
		echo "&lt;br&gt;";
		echo "&lt;h4&gt;&lt;strong&gt;ACCESO PERMITIDO&lt;/strong&gt;&lt;/h4&gt;";
		echo "&lt;div id='resumen'&gt;";
		echo "&lt;br&gt;";echo "&lt;br&gt;";
		echo "&lt;strong&gt;Usuario: &lt;/strong&gt;".$row['usuario_user'];
		echo "&lt;br&gt;";
		echo "&lt;strong&gt;Password:&lt;/strong&gt; ".$row['usuario_pass'];
		echo "&lt;br&gt;";
		echo "&lt;strong&gt;Mail: &lt;/strong&gt;".$row['usuario_email'];
		echo "&lt;/div&gt;";
 }
  else { 
        header("location: login.php?errorusuario=p");
  		}
 }#cieere if vierificar devolucion
	else{
 	header("location: login.php");
  	}
</pre>

<?php }
else {?>
<span class="source">Code Vulnerable</span>
<pre class="prettyprint" id="com">
$usuario=$_POST['usuario'];
$password=$_POST['pass'];

$password=pass_cript($password);//Llamada a funcion que encripta password
mysql_select_db('vulntotex',$conexion);
$sql="SELECT * FROM usuarios WHERE usuario_user='$usuario'";
$login=mysql_query($sql,$conexion) or die ('Error en la consulta'. mysql_error());
$row=mysql_fetch_array($login);
if(isset($row) && !empty($row)){ 
 if ($row['usuario_pass']==$password)
 { 
		echo "&lt;br&gt;";
		echo "&lt;h4&gt;&lt;strong&gt;ACCESO PERMITIDO&lt;/strong&gt;&lt;/h4&gt;";
		echo "&lt;div id='resumen'&gt;";
		echo "&lt;br&gt;";echo "&lt;br&gt;";
		echo "&lt;strong&gt;Usuario: &lt;/strong&gt;".$row['usuario_user'];
		echo "&lt;br&gt;";
		echo "&lt;strong&gt;Password:&lt;/strong&gt; ".$row['usuario_pass'];
		echo "&lt;br&gt;";
		echo "&lt;strong&gt;Mail: &lt;/strong&gt;".$row['usuario_email'];
		echo "&lt;/div&gt;";
 }
  else { 
        header("location: login.php?errorusuario=p");
  		}
 }#cieere if vierificar devolucion
	else{
 	header("location: login.php");
  	}
</pre>
<?php }?>

</body>
</html>
