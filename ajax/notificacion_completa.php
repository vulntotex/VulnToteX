<?php

include('configuracion.php');
$registros=mysql_query("select * from conceptos",$conexion) or die("Problemas en el select:".mysql_error());
  
$id=($_GET['id']);

if(is_numeric($id)){

while ($reg=mysql_fetch_array($registros))
{
  if ($id==$reg['id']){
  	echo '<title>'.$reg['nombre'].'</title>';
  	echo'<center>';
  echo '<h3>'.$reg['nombre'].'</h3><br>';
  echo '<pre>'.$reg['texto'].'</pre>';
  echo'</center>';
  }
  
}
}else{die("<center><br><b>El Registro no existe</b></center>"); 
}

?>
