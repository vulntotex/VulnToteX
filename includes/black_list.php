<?php
function prepararParaSql($cadena)
 
{
	$cadena = strip_tags($cadena);	
	$cadena = str_replace ("*", "", $cadena);
	$cadena = str_replace ("%", "", $cadena);
	$cadena = str_replace ("'", "", $cadena);
	$cadena = str_replace ("#", "", $cadena);
	$cadena = str_replace ("\\", "", $cadena);
	$cadena = str_replace("mysql","",$cadena);
	$cadena = str_replace("mssql","",$cadena);
	$cadena = str_replace("query","",$cadena);
	$cadena = str_replace("insert","",$cadena);
	$cadena = str_replace("into","",$cadena);
	$cadena = str_replace("update","",$cadena);
	$cadena = str_replace("delete","",$cadena);
	$cadena = str_replace("select","",$cadena);
	$cadena = str_replace("SELECT","",$cadena);
	$cadena = str_replace("Character","",$cadena);
	$cadena = str_replace("MEMB_INFO","",$cadena);
 	$cadena = str_replace("IN","",$cadena);
 	$cadena = str_replace("OR","",$cadena);
	$cadena = str_replace("or","",$cadena);
	$cadena = str_replace("AND","",$cadena);
	$cadena = str_replace("and","",$cadena);
	$cadena = str_replace("=","",$cadena);
	$cadena = str_replace("'","",$cadena);
 	$cadena = str_replace (";", "", $cadena);
	//$cadena = str_replace (",", "", $cadena);
 
	return $cadena;
} 

?>