<?php
require_once ("../../includes/seglogin.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link href="/vulntotex/includes/google-code-prettify/src/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/vulntotex/includes/google-code-prettify/src/prettify.js"></script>


<title><?php titulo()?></title>
<link rel="shortcut icon" href="favicon.ico">
</head>

<body onload="prettyPrint()">

<?php 

if(isset($_GET[solution])){?>
<span class="source">Code Solution</span>
<pre class="prettyprint" id="com"> 
&lt;?php
$index="index.php";
$filename = basename($_GET['file']);
$enlace="descargas/".$filename;
// addition by Jorg Weske
$file_extension = strtolower(substr(strrchr($filename,"."),1));

#------------Bloque Seguridad ------------------
if( $filename == "" ) {
	header("Location:".$index);
&#160;&#160; 
}
elseif( ! file_exists( $enlace )) {
	header("Location:".$index);exit;
}
elseif ($file_extension=="") 	{
	header("Location:".$index);

}
#-----------Fin Bloque Seguridad--------------<br />
if(preg_match('/pdf|txt|zip|rar|xls|doc|ppt|pps|odt|gif|png|jpeg|jpg/i',$file_extension)){<br />
switch($file_extension )
{
&#160;&#160;case "pdf": $ctype="application/pdf"; break;
&#160;&#160;case "zip": $ctype="application/zip"; break;
&#160;&#160;case "doc": $ctype="application/msword"; break;
&#160;&#160;case "xls": $ctype="application/vnd.ms-excel"; break;
&#160;&#160;case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
&#160;&#160;case "gif": $ctype="image/gif"; break;
&#160;&#160;case "png": $ctype="image/png"; break;
&#160;&#160;case "jpeg":
&#160;&#160;case "jpg": $ctype="image/jpg"; break;
&#160;&#160;default: $ctype="application/force-download";
}
header("Pragma: public"); // required
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); // required for certain browsers 
header("Content-Type: $ctype");
header("Content-Disposition: attachment; filename=\"".$filename."\";" );#nombre del archivo en la descarga
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($enlace));
readfile("$enlace");

}
?&gt;
</pre>
<?php }
else {?>
<span class="source">Code Vulnerable</span>
<pre class="prettyprint" id="com">
&lt;?php
$filename = $_GET['file'];
// required for IE, otherwise Content-disposition is ignored
if(ini_get('zlib.output_compression'))
&#160;&#160;ini_set('zlib.output_compression', 'Off');
// addition by Jorg Weske
$file_extension = strtolower(substr(strrchr($filename,"."),1));
if( $filename == "" ) {
&#160;&#160;echo '&lt;script&gt;alert("Enlace Vacio")&lt;/script&gt;';
&#160;&#160;exit;&#160;&#160;
} 
elseif ( ! file_exists( $filename ) ) {
&#160;&#160;echo '&lt;script&gt;alert("Enlace Vacio")&lt;/script&gt;';
&#160;&#160;exit;
};
switch( $file_extension )
{
&#160;&#160;case "pdf": $ctype="application/pdf"; break;
&#160;&#160;case "exe": $ctype="application/octet-stream"; break;
&#160;&#160;case "zip": $ctype="application/zip"; break;
&#160;&#160;case "doc": $ctype="application/msword"; break;
&#160;&#160;case "xls": $ctype="application/vnd.ms-excel"; break;
&#160;&#160;case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
&#160;&#160;case "gif": $ctype="image/gif"; break;
&#160;&#160;case "png": $ctype="image/png"; break;
&#160;&#160;case "jpeg":
&#160;&#160;case "jpg": $ctype="image/jpg"; break;
&#160;&#160;default: $ctype="application/force-download";
}
header("Pragma: public"); // required
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); // required for certain browsers 
header("Content-Type: $ctype");
// change, added quotes to allow spaces in filenames, by Rajkumar Singh
header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($filename));
readfile("$filename");

?&gt;


&lt;? exit(); ?&gt;
</pre>

<?php }?>

</body>
</html>
