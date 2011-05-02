<?
echo "Hola ".$_GET['nombre'];
echo $_SERVER['SERVER_NAME'];
echo "<br>FEcha: ".date('d-m-Y');
$email="francisco@dadasd.com";
if(preg_match('/^[_a-zA-Z0-9-]+(.[_a-zA-Z0-9-]+)*@([_a-zA-Z0-9-]+.)*[a-zA-Z0-9-]{2,200}.[a-zA-Z]{2,6}$/',$email))
{
	echo "correcto";
}

?> 
