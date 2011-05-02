<?php 
	$usuario=$_SESSION['usuario']["usuario_user"];
	mysql_select_db("vulntotex",$conexion);	
	$sql="SELECT usuario_avatar FROM usuarios WHERE usuario_user='$usuario'";
	$login=mysql_query($sql,$conexion);
	$dato=mysql_fetch_array($login);
if($dato['usuario_avatar']!="")	
	{
		echo '<div id="avatar">';	
		echo '<img width="110" src="/vulntotex/'.$dato['usuario_avatar'].'">';
		echo '</div>';
}	
	
?>