<link href="/vulntotex/includes/google-code-prettify/src/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/vulntotex/includes/google-code-prettify/src/prettify.js"></script>

<pre class="prettyprint" id="com">
function allrfi($pagina)
{
$pagina=strtolower($pagina);		
if(substr($pagina,0,7)=="http://" || substr($pagina,0,6)=="ftp://" 
|| substr($pagina,0,6)=="smb://" || substr($pagina,0,8)=="https://"){
	echo "Hacker tu ip es -> ".$_SERVER['REMOTE_ADDR']; 
    	}
    	else{
    	include $pagina.".php";
    	}
}
</pre>