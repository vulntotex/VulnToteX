<?php 
require_once ("../../../includes/seglogin.php");
require_once ("../../../includes/funciones.php");
conexion();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php 
titulo()
?></title>

<link rel="STYLESHEET" type="text/css" href="/vulntotex/includes/estilo_home.css"> 

<body>
<div id="contenedor">
 
	
		<div id="cuadrodialogo">
		  <h1>Login Bypass</h1>
          <div id="resumen">
          <form action="prologin.php" method="post">

		  <br>Nombre:
		  <br>
		  <input type="text" name="usuario" maxlength="888">
		  <br>
		  <br>
		  Contrasena:
		  <br>
		  <input type="password" name="pass" maxlength="50">
		  <br>
		  <br>
		  <input type="submit" value="Enviar">
		  <input type="submit"  value= "Solucion" name="solution">

		  </form> 		
		  
		   
<?php
			if(isset($_GET['errorusuario'])){
				if ($_GET["errorusuario"]=="p"){
					echo "<br>";
					echo "<b>Password Incorrecto</b>";
					}
			}	
		   ?>
</div> <!--fin resumen-->
		   
<div id="pie">
	<a href="/vulntotex/index.php" title="Home">  <img style="border:0;"  src="/vulntotex/images/Home1.png"></a>
</div>

</div>
<!--fin cuadrodialogo-->
	    		
 	
	
	
</div>
<!--fin contenedor-->


</body>
</html>
		  