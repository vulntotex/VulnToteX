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
<h2>Funcion <a href="http://php.net/manual/es/function.mysql-real-escape-string.php" target="_blanck">mysql_real_escape_string</a></h2>
<pre class="prettyprint" id="com"> 
$usuario=mysql_real_escape_string($_POST['usuario']);
$password=$_POST['pass'];
$password=pass_cript($password);//Llamada a funcion que encripta password
mysql_select_db('vulntotex',$conexion);
$sql="SELECT * FROM usuarios WHERE usuario_user='$usuario' and usuario_pass='$password'";
$login=mysql_query($sql,$conexion) or die ('Error en la consulta'. mysql_error());
$row=mysql_fetch_array($login);
</pre>


<h2>Funcion <a href="http://php.net/manual/es/function.addslashes.php" target="_blanck">addslashes()</a></h2>
<pre class="prettyprint" id="com"> 
$usuario=addslashes($_POST['usuario']);
$password=$_POST['pass'];
$password=pass_cript($password);//Llamada a funcion que encripta password
mysql_select_db('vulntotex',$conexion);
$sql="SELECT * FROM usuarios WHERE usuario_user='$usuario' and usuario_pass='$password'";
$login=mysql_query($sql,$conexion) or die ('Error en la consulta'. mysql_error());
$row=mysql_fetch_array($login);
</pre>

<h2>Prepared Statement</h2>
<pre class="prettyprint" id="com"> 
$usuario=$_POST['user'];
$password=$_POST['pass'];
$password=pass_cript($password);//Llamada a funcion que encripta password
$stmt= $mysqli ->prepare("SELECT * FROM usuarios WHERE usuario_user=? and usuario_pass=?");
$stmt->bind_param('ss', $usuario, $password);
$stmt->execute();
$stmt->bind_result($usuario_id, $usuario_user, $usuario_pass, $usuario_email, 
$usuario_avatar,$usuario_fechaingreso);
</pre>

<?php }
else {?>
<span class="source">Code Vulnerable</span>
<pre class="prettyprint" id="com"> 
$usuario=$_POST['usuario'];
$password=$_POST['pass'];
$password=pass_cript($password);
mysql_select_db('vulntotex',$conexion);
$sql="SELECT * FROM usuarios WHERE usuario_user='$usuario' and usuario_pass='$password'";
$login=mysql_query($sql,$conexion) or die ('Error en la consulta'. mysql_error());
$row=mysql_fetch_array($login);
</pre>
<?php }?>


</body>
</html>
