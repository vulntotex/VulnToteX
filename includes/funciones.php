<?php
require_once 'config_db.php';

$DBMS_Error = "<div align=\"center\">
		<pre>No se puede conectar con la Base de Datos, verifica el archivo <strong>/vulntotex/includes/config_db.php</strong>
		</pre>
		Haz Clic <a href=\"/vulntotex/configuracion.php\">Aqui </a> para configurar la Base de Datos 
		</div>";

function titulo(){
	echo "VulnTotex 1.0 Beta";
}


function limpiarTag($tag){
$tag=str_replace("nbsp;", "", $tag);	
$tag=strip_tags($tag);	
return $tag;	
} 

function espacios($tag){
$tag=str_replace(" ", "", $tag);	
return $tag;	
} 
 
function conexion() {
error_reporting(0);	
global $conexion; 
global $server;
global $user;
global $pass;
global $DBMS_Error;
$conexion= mysql_connect($server,$user,$pass) or die ($DBMS_Error); 
}

function conexionps(){
error_reporting(0);	
global $mysqli;
global $server;
global $user;
global $pass;
global $DBMS_Error;
$mysqli = new mysqli($server,$user,$pass, 'vulntotex');
	    if (mysqli_connect_errno()) 
		{
		echo $DBMS_Error;
		exit;
		}	
}

function existe($campo,$tabla,$clave)
{
	global $conexion;
	conexion();
	mysql_select_db("vulntotex",$conexion);	
	$result = mysql_query ("SELECT * FROM $tabla WHERE $campo='$clave'");
	
	return mysql_fetch_array($result);
}

?>