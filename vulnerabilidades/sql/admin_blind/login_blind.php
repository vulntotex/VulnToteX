<?php 
include_once ("../../../includes/funciones.php");
conexion()
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>
<?php include_once ("../../../includes/funciones.php");
titulo()
?></title>
<link rel="STYLESHEET" type="text/css" href="/vulntotex/includes/estilo_home.css"> 

<body>
<div id="contenedor">
  		
		<div id="cuadrodialogo">
		  <h1>Blind SQL</h1>
		  
<?php
function pass_cript($pass){#hash seguro donde genero 3 veces el mismo
  for($i=0;$i <3;$i++){
  $pass=md5($pass);
  }
  return $pass;
 }
$usuario=$_POST['usuario'];
$password=$_POST['pass'];

$password=pass_cript($password);
mysql_select_db('vulntotex',$conexion);
$sql="SELECT * FROM usuarios WHERE usuario_user='$usuario'";
$login=@mysql_query($sql,$conexion);
$row=@mysql_fetch_array($login);
if(isset($row) && !empty($row)){ //verifico que la variable $row tenga informacion
 if ($row['usuario_pass']==$password){ 
		echo '<div id="resumen">';
		echo '<h4><span class="rojo">ACCESO PERMITIDO</span></h4>';
		echo '<br>';
		echo '<strong>Usuario: </strong>'.$row['usuario_user'];
		echo '<br>';
		echo '<strong>Password:</strong> '.$row['usuario_pass'];
		echo '<br>';
		echo '<strong>Mail: </strong>'.$row['usuario_email'];
		echo '</div>';
 }
else { 
        header("location: login.php?errorusuario=p");
  }
 }#cieere if vierificar devolucion
else{
 header("location: login.php");
  }



#foo' or  (SELECT COUNT(*) FROM USUARIO) and '1'='1 esta es la consulta q tiro, cuando se cumple me muestra la leyedra de que el usuario es correcto 
#pero la contrase�a no lo es es decir q la consulta tiro un true si no me tira un error de mysql
#foo' or  (SELECT COUNT(*) FROM usuarios)  = 2--%20 para verificar cuantos campos tiene la tabla
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
