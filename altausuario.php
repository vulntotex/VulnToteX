<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VulnTotex 1.0</title>
<link rel="STYLESHEET" type="text/css" href="includes/estilo_login.css"> 

<body>
<div id="contenedor">
	
	
	<div id="areatexto">
	
		<div id="cuadrodialogo">
		
	<a href="login.php"><img style="border:0;" src="images/logo1.png" alt="Logo" /></a>
	<form action='#' method='post'>

	<br>
	Usuario:
	<br>
	<input type='text' name='user'>
	<br>

	Contrase&ntilde;a:
	<br>
	<input type='password' name='pass'></input>
	<br>
	Repita Contrase&ntilde;a:
	<br>
	<input type='password' name='pass2'></input>	
	<br>
	Email
	<br>
	<input type='text' name='email'></input>
	<br>
	<br>
	<input name="boton" type="hidden" id="boton" value="1"></input>
	<!-- <input type="image" src="images/button-crear.png" name="boton" id="boton" alt="Registrarse" ></input> -->
	<input type="submit" value="Registrarse" ></input> 
  	<br>
  	<br>
	</form>
		

<?php
//----------------------------------------------FUNCIONES----------------------------------------------------------
function pass_cript($pass){#hash seguro donde genero 3 veces el mismo
  for($i=0;$i <3;$i++){
  $pass=md5($pass);
  }
  return $pass;
 }
 
function verificar_usuario(){
		
	    global $mysqli;
		global $usuario;
	
		
		$stmt= $mysqli ->prepare("SELECT usuario_user FROM usuarios WHERE usuario_user=?");
		$stmt->bind_param('s', $usuario);
		$stmt->execute();
		$stmt->bind_result($result);
		#tercer if
		if($stmt->fetch()== false) 
		{
			verificar_pass();
		}
	else {
	   echo "El usuario ya existe";
      }
 	
 	}
 
  
 function verificar_pass(){
		global $password;
		global $password2;
		
		if($password==$password2){
	
		if(strlen($password) > 6 )
		{ 
           if (preg_match('/[A-Z]+/', $password) && preg_match('/[0-9]+/', $password) && preg_match('/[a-z]+/', $password)) 
          
		    {
		    	alta();
		    } 
		   
		   else 
			{
				echo "El password debe estar constituido por al menos una minuscula, una mayuscula y un digito";
				exit;
			}		
		}
			else
			{
			echo "El password debe ser mayor a 7 caracteres";
			exit;
			
			}
	}				 
 else{
 	echo "Las contrase&ntilde;as deben ser iguales";
 	exit;
   }
 }
 
 function alta(){
			
			global $mysqli;
		    global $usuario;
		    global $password;
			global $email;
			global $nombre;
			$fecha=date('Y-m-d');//tomo al fecha de la forma 2010-09-29
		    verificar_mail($email);
			$password=pass_cript($password);
			$stmt=$mysqli->prepare("INSERT INTO usuarios (usuario_user, usuario_pass, usuario_email, usuario_fechaingreso) VALUES (?, ?, ?, ?)");
		    // Bind your variables to replace the ?s
			$stmt->bind_param('ssss', $usuario, $password, $email, $fecha);
	        // Execute query
		    $stmt->execute();
			printf("%d Fila Insertada.\n", $stmt->affected_rows);  
			// Close statement object
			$stmt->close();
		    echo "El usuario <strong>".$usuario."</strong> ha sido dado de alta!!";
		   }
 
function verificar_mail($email){
 if(!preg_match('/^[_a-zA-Z0-9-]+(.[_a-zA-Z0-9-]+)*@([_a-zA-Z0-9-]+.)*[a-zA-Z0-9-]{2,200}.[a-zA-Z]{2,6}$/',$email)){
 	echo "Email Invalido";
 	exit;
 }
}
 
 //---------------------------------------------FIN FUNCIONESS---------------------------------------------------
require_once 'includes/funciones.php';
conexionps();

#Primer if

if($_POST['boton'])
{	 
	#segundo if
	if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pass']) && !empty($_POST['pass']) && !empty($_POST['pass2'])) 
	
	{ 
		
		$usuario=espacios(limpiarTag($_POST['user']));
		$password=$_POST['pass'];
		$password2=$_POST['pass2'];
		$email=limpiarTag($_POST['email']);
		verificar_usuario();
			
	}#cierre segundo if
   else 
    { 
   echo "Debe rellenar los campos, gracias";
    }
}#cierro primer if	  

?>

		
		
		</div>
	</div>	
</div>
</body>
</html> 	