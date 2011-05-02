<?php
session_start();
//session_name("logeado");
require_once 'funciones.php';




//antes de hacer los cálculos, compruebo que el usuario está logueado
//utilizamos el mismo script que antes
 //if ($session[autentificado] != "SI") {
    //si no está logueado lo envío a la página de autentificación
   // header("Location: /vulntotex/login.php");
   
 //} else {
    //sino, calculamos el tiempo transcurrido
    /*$fechaGuardada = $_SESSION["ultimoAcceso"];
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

    //comparamos el tiempo transcurrido
     if($tiempo_transcurrido >= 6000000000000) {
     	//si pasaron 10 minutos o más*/
      	//session_destroy(); // destruyo la sesión
      	//header("Location: login.php"); //envío al usuario a la pag. de autenticación
      	//sino, actualizo la fecha de la sesión
   //  }
     /*else
     {
    	$_SESSION["ultimoAcceso"] = $ahora;
     }
     */
    

$club_row = existe( "usuario_user", "usuarios", $_SESSION['usuario']["usuario_user"] );
    if ( !$club_row || $club_row["usuario_user"] != $_SESSION['usuario']["usuario_user"] || $club_row["usuario_pass"] != $_SESSION['usuario']["usuario_pass"] || empty($_SESSION['usuario']["usuario_user"]))
		{
		$session[login] = false;
		header( "Location: /vulntotex/login.php" );
		exit;
		}

     
     
     
?>