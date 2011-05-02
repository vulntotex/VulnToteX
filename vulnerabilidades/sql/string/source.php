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
<pre class="prettyprint" id="com"> 

<?php 

if(isset($_GET[solution])){?>
----------------------<a href="http://php.net/manual/es/function.mysql-real-escape-string.php" target="_blanck">mysql_real_escape_string</a>---------------------------------------------------------------------------

if(isset($_GET['id'])){
$id=mysql_real_escape_string($_GET['id']);//FUNCION mysql_real_escape_string()
$consulta= mysql_query("SELECT * FROM usuarios WHERE usuario_id='$id'") 
	or die ('Error en la cosulta '. mysql_error());
		if(mysql_num_rows($consulta)!=0){
 		$row=mysql_fetch_array($consulta);
 		echo '&lt;br&gt;'; 
 		echo '&lt;strong&gt;Usuario: &lt;span class="azul"&gt;'.$row['usuario_user'].'&lt;/span&gt;&lt;/strong&gt;';
		echo '&lt;br&gt;';
		echo '&lt;strong&gt;Password: &lt;span class="azul"&gt;'.$row['usuario_pass'].'&lt;/span&gt;&lt;/strong&gt;';
		echo '&lt;br&gt;';
		echo '&lt;strong&gt;Mail: &lt;span class="azul"&gt;'.$row['usuario_email'].'&lt;/span&gt;&lt;/strong&gt;';
				
 	}
}

----------------------<a href="http://php.net/manual/es/function.addslashes.php" target="_blanck">addslashes()</a> ---------------------------------------------------------------------------

if(isset($_GET['id'])){
$id=addslashes($_GET['id']);//FUNCION mysql_real_escape_string()
$consulta= mysql_query("SELECT * FROM usuarios WHERE usuario_id='$id'") 
	or die ('Error en la cosulta '. mysql_error());
		if(mysql_num_rows($consulta)!=0){
 		$row=mysql_fetch_array($consulta);
 		echo '&lt;br&gt;'; 
 		echo '&lt;strong&gt;Usuario: &lt;span class="azul"&gt;'.$row['usuario_user'].'&lt;/span&gt;&lt;/strong&gt;';
		echo '&lt;br&gt;';
		echo '&lt;strong&gt;Password: &lt;span class="azul"&gt;'.$row['usuario_pass'].'&lt;/span&gt;&lt;/strong&gt;';
		echo '&lt;br&gt;';
		echo '&lt;strong&gt;Mail: &lt;span class="azul"&gt;'.$row['usuario_email'].'&lt;/span&gt;&lt;/strong&gt;';
				
 	}
}

-------------------Prepared Statements----------------------------------------------------------------------------------
if(isset($_GET['id'])){
$id=$_GET['id'];
//settype($id, int);
require_once '../../../includes/conexionps.php';

	$stmt= $mysqli ->prepare("SELECT usuario_user, usuario_pass, usuario_email FROM usuarios WHERE usuario_id=?");
	$stmt->bind_param('s', $id);
	$stmt->execute();
    	$stmt->bind_result( $usuario_user, $usuario_pass, $usuario_email);
    	$stmt->fetch();
	    	echo '&lt;br&gt;'; 
 		echo '&lt;strong&gt;Usuario: &lt;span class="azul"&gt;'.$usuario_user.'&lt;/span&gt;&lt;/strong&gt;';
		echo '&lt;br&gt;';
		echo '&lt;strong&gt;Password: &lt;span class="azul"&gt;'.$usuario_pass.'&lt;/span&gt;&lt;/strong&gt;';
		echo '&lt;br&gt;';
		echo '&lt;strong&gt;Mail: &lt;span class="azul"&gt;'.$usuario_email.'&lt;/span&gt;&lt;/strong&gt;';

}

<?php }
else {?>
if(isset($_GET['id'])){
$id=$_GET['id'];
	$consulta= mysql_query("SELECT * FROM usuarios WHERE usuario_id='$id'") 
	or die ('Error en la cosulta '. mysql_error());
		if(mysql_num_rows($consulta)!=0){
 		$row=mysql_fetch_array($consulta);
 		echo '&lt;br&gt;'; 
 		echo '&lt;strong&gt;Usuario: &lt;span class="azul"&gt;'.$row['usuario_user'].'&lt;/span&gt;&lt;/strong&gt;';
		echo '&lt;br&gt;';
		echo '&lt;strong&gt;Password: &lt;span class="azul"&gt;'.$row['usuario_pass'].'&lt;/span&gt;&lt;/strong&gt;';
		echo '&lt;br&gt;';
		echo '&lt;strong&gt;Mail: &lt;span class="azul"&gt;'.$row['usuario_email'].'&lt;/span&gt;&lt;/strong&gt;';
				
 	}
}
<?php }?>

</pre>
</body>
</html>
