<?php 
require_once 'includes/funciones.php';
conexion();
require_once 'includes/seglogin.php';

mysql_select_db("vulntotex",$conexion);//conexto a la base de datos
$id= $_SESSION['usuario']["usuario_id"];//traigo el id del usuario logueado
$usuario=$_SESSION['usuario']["usuario_user"];//obtengo el nombre de usuario
$tamano_archivo = $_FILES['imagen']['size'];
$filename= basename($_FILES['imagen']['name']);//obtengo el nombre original del archivo
$file_extension = strtolower(substr(strrchr($filename,"."),1));	//compruebo si las características del archivo son las que deseo
$ruta = "avatars/" . $id."avatar.".$file_extension; // creo el nombre del archivo en base al nombre del usuario

if(preg_match('/(gif|png|jpg|jpeg)/',$file_extension) && ($tamano_archivo < 5000000)){
   
	if(move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta ))
	{

		echo "este es el id ".$id; 
		echo "<br>esta es la ruta ".$ruta;
		echo "<br>esta es la ext ".$file_extension;
		
		mysql_query("UPDATE usuarios SET usuario_avatar='$ruta' WHERE usuario_id='$id'") or die (mysql_error());
         $tamano = GetImageSize($ruta);

    		   		if($tamano[0]> 100){

      		 			if($tamano[1]> 100){
    	    			/*begin: dimensionar imagen*/

							
							switch( $file_extension ) {

							case 'gif':
							$imagen_src = imagecreatefromgif("$ruta");
							break;

							case 'jpg':
							$imagen_src = imagecreatefromjpeg("$ruta");
							break;
							
							case 'png':
							$imagen_src=imagecreatefrompng("$ruta");
							break; 	

				  			}
		  					//Con imagecreatefrom* lo que hacemos es crear una nueva imagen desde la url absoluta de la imagen que queremos y nos devuelve el identificador a esa nueva imagen creada.

							$imagen_dst = @imagecreatetruecolor(100,100);
							//creamos una nueva imagen con tru color

							if ( empty($imagen_dst) ) {
						 		//esto es por si no esta definida la true color
								$imagen_dst = imagecreate(100,100);
							}


							imagealphablending($imagen_dst, false);
							//le seteamos el modo de blending a la imagen
							//(para mejorar la calidad de la imagen que vamos a crear)


							imagecopyresampled($imagen_dst,$imagen_src,0,0,0,0,100,100,imagesx($imagen_src),imagesy($imagen_src));


							imagejpeg($imagen_dst,$ruta);   //creamos la imagen nueva
							imagedestroy($imagen_src);    //liberamos las imagenes viejas
							imagedestroy($imagen_dst);

    		 		   } //fin del if del tamaño
  	    			}//fin del if de tamaño
		header("Location:homeuser.php");
	
	}
		else {
		
				echo "error al cargar";
			  }
}
else { 
	
	header("Location:homeuser.php?error=file");
	
	
}
			
?>
