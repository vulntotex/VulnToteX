<?php 
require_once ("../../../includes/seglogin.php");
require_once ("../../../includes/funciones.php");
conexion();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>
<?php
titulo()
?></title>
<link rel="STYLESHEET" type="text/css" href="/vulntotex/includes/estilo_home.css"> 

<body>
<div id="contenedor">
  <div id="cuadrodialogo">
		 <h1>Login Bypass</h1>
		  
<?php
function pass_cript($pass){#hash seguro donde genero 3 veces el mismo
  for($i=0;$i <3;$i++){
  $pass=md5($pass);
  }
  return $pass;
 }
//----------Verifico boton Solucion o Vulnerable ------------------ 
if(isset($_POST['solution']))
{
	$usuario=mysql_real_escape_string($_POST['usuario']);
	$password=$_POST['pass'];
	
} else 
{ 
	$usuario=$_POST['usuario'];
	$password=$_POST['pass'];
}

//------------------------------------------------------------------
$password=pass_cript($password);
//mysql_select_db('vulntotex',$conexion);
$sql="SELECT * FROM usuarios WHERE usuario_user='$usuario' and usuario_pass='$password'";
$login=mysql_query($sql,$conexion) or die ('Error en la consulta'. mysql_error().'<br>Consulta '.$sql);
$row=mysql_fetch_array($login);
echo '<div id="resumen">';
echo 'Consulta: <span class="rojo">'.$sql.'</span><br>';
if(isset($row) && !empty($row))
	{ //verifico que la variable $row tenga informacion
 		
		
		echo '<div align="center"><h4><span class="rojo">ACCESO PERMITIDO</span></h4></div>';
		echo '<br>';
		echo '<strong>Usuario: </strong>'.$row['usuario_user'];
		echo '<br>';
		echo '<strong>Password:</strong> '.$row['usuario_pass'];
		echo '<br>';
		echo '<strong>Mail: </strong>'.$row['usuario_email'];
		
	 }
	 else 
	 {
	 		echo '<div align="center"><h4><span class="rojo">ACCESO NO PERMITIDO</span></h4></div>';
	 }	
echo '</div>';	 
?> 



 	
<div id="pie">
 	<a href="login.php">  <img style="border:0;"  src="/vulntotex/images/Back.png"></a>&nbsp;
 	<a href="/vulntotex/index.php">  <img style="border:0;"  src="/vulntotex/images/Home1.png"></a>
 	</div><!--fin pie-->
	
</div> <!--fin cuadrodialogo-->
</div>
<!--fin contenedor-->

</body>
</html>

