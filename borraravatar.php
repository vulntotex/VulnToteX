<?php
include("includes/seglogin.php");


$id=$_SESSION['usuario']["usuario_id"];
//consulta mysql---------------------------------------------------------------
$consulta=mysql_query("SELECT usuario_avatar from usuarios WHERE usuario_id='$id'");
$dato=mysql_fetch_array($consulta);

$_SESSION['usuario']['usuario_avatar']=$dato['usuario_avatar'];//actualizo el el avatar en session


if(unlink($_SESSION['usuario']['usuario_avatar'])){
mysql_query("UPDATE usuarios SET usuario_avatar='' WHERE usuario_id='$id'") or die (mysql_error());

header("location:homeuser.php");
}
//--------------------------------------------------------

?>
