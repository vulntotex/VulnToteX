<link href="/vulntotex/includes/google-code-prettify/src/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/vulntotex/includes/google-code-prettify/src/prettify.js"></script>

<pre class="prettyprint" id="com">

function http($pagina)
{
if(substr($pagina,0,7)=="http://"){
	echo "Hacker tu ip es -> ".$_SERVER['REMOTE_ADDR']; 
    	}
    else{	
    	include $pagina.".php";
    	}
}
</pre>