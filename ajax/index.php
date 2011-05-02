<script type="text/javascript" src="highslide/highslide.js"></script>
<script type="text/javascript" src="highslide/highslide-html.js"></script>
<script type="text/javascript">    
    hs.graphicsDir = 'highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.outlineWhileAnimating = true;
</script>
<link rel="STYLESHEET" type="text/css" href="estilo.css"> 
<!--
<style type="text/css">

</style>
-->
</head>

<body>

<center><h3>Estas son las notificaciones mas recientes</h3><br>

<?php
include('configuracion.php');
$registros=mysql_query("select * from conceptos",$conexion) or die("Problemas en el select:".mysql_error());
while ($reg=mysql_fetch_array($registros))
{
$codigo=$reg['id'];	
$titulo=$reg['nombre'];
?>

<a href="notificacion_completa.php?id=<?php echo $codigo;?>" onclick="return hs.htmlExpand(this, { contentId: 'highslide-html', objectType: 'iframe', objectWidth: 700, objectHeight: 900} )" class="highslide" >
	<? echo $titulo;?></a><br>
<div class="highslide-html-content" id="highslide-html" style="width: 700px">
	<div class="highslide-move" style="border: 0; height: 18px; padding: 2px; cursor: default">
	    <a href="#" onclick="return hs.close(this)" class="control">X</img></a>
	</div>
	
	<div class="highslide-body"></div>
	
	<div style="text-align: center; border-top: 1px solid silver; padding: 5px 0">
		<small>
				

		</small>
	</div>
</div>

  

<?
}
mysql_close($conexion);
?>
</center>
