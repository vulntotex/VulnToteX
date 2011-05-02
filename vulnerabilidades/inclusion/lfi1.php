<link href="/vulntotex/includes/google-code-prettify/src/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/vulntotex/includes/google-code-prettify/src/prettify.js"></script>

<?php
$tipo=$_GET['tipo'];
if($_GET['tipo']==1){?>
<pre class="prettyprint" id="com">

function allrfi($pagina)
{
$pagina=strtolower($pagina);		
if(substr($pagina,0,7)=="http://" || substr($pagina,0,6)=="ftp://" || 
	substr($pagina,0,6)=="smb://" || 
	substr($pagina,0,8)=="https://")
	{
	echo "Hacker tu ip es -> ".$_SERVER['REMOTE_ADDR']; 
	}
 else
   {
    include $pagina.".php";
   }
}
</pre>

<?php 
} if($_GET['tipo']==2) {?>
<h1>Code Solution</h1>

<pre class="prettyprint" id="com">
<h2>Funciones <a href="http://php.net/manual/en/function.include.php" target="_blanck">include()</a>, <a href="http://www.php.net/manual/en/function.require.php" target="_blanck">require()</a></h2>

function all($pagina)
{
$pagina=addslashes($pagina);
$whitelist = array ("rfisolution", "rfi2", "rfi1",
				 "lfi1","lfisolution"); //Withe List
    foreach ($whitelist as $white) {
    	if ($pagina==$white) 
            {
			include($pagina.".php");break;
    		 }
      }	
}
</pre>

<pre class="prettyprint" id="com">
<h2>Funcion <a href="http://php.net/manual/en/function.file-get-contents.php" target="_blanck">file_get_content()</a></h2>
function all($pagina)
{
$pagina=addslashes($pagina);
$whitelist = array ("rfisolution", "rfi2", "rfi1",
				 "lfi1","lfisolution"); //Withe List
    foreach ($whitelist as $white) {
    	if ($pagina==$white) 
            {
			echo file_get_contents($pagina);break;
    		 }
      }	
}

<?php 
}
?>
</pre>