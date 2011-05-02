<?php 
require_once 'includes/funciones.php';
conexion();

#-----Borra y crea Base de datos--------
$drop_db = "DROP DATABASE IF EXISTS vulntotex;";
if( !mysql_query( $drop_db ) )
	echo mysql_error();


$crear_db= "CREATE DATABASE vulntotex;";
if( !mysql_query( $crear_db ) )
	echo mysql_error();
	
	
#---Crear Tabla usuarios---------
conexion();
mysql_select_db("vulntotex", $conexion);
$crear_tablaU = "CREATE TABLE usuarios (
  usuario_id int(2) NOT NULL AUTO_INCREMENT,
  usuario_user varchar(30) NOT NULL,
  usuario_pass varchar(32) NOT NULL,
  usuario_email varchar(50) NOT NULL,
  usuario_avatar varchar(100) NOT NULL,
  usuario_fechaingreso date NOT NULL,
  PRIMARY KEY (usuario_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3;";
if( !mysql_query( $crear_tablaU ) )
	echo mysql_error();
	
#---Crear Tabla uploads

$crear_tablaUp=	"CREATE TABLE IF NOT EXISTS upload (
  id int(3) NOT NULL AUTO_INCREMENT,
  usuario_id int(2) NOT NULL,
  uploads varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
if( !mysql_query( $crear_tablaUp ) )
	echo mysql_error();


#--- insertar Registros---------
$insert= "INSERT INTO usuarios VALUES
(1, 'admin', 'd32498006fdbfdcf0e825ef086784db1', 'magnobalt@gmail.com', '', '2010-09-30'),
(2, 'usuario', 'd32498006fdbfdcf0e825ef086784db1', 'dasada@dfadas.com', '', '2010-10-07');";
if(!mysql_query($insert))
 	echo mysql_error();
 	else header( "Location: /vulntotex/configuracion.php?db=true");		
 

?>