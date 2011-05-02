<link href="/vulntotex/includes/google-code-prettify/src/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/vulntotex/includes/google-code-prettify/src/prettify.js"></script>

<pre class="prettyprint" id="com">
function all($pagina){
$pagina=addslashes($pagina);
$whitelist= array("rfisolution", "rfi2", "rfi1", "lfi1","lfisolution"); 
    foreach ($whitelist as $white) 
    {
    	if ($pagina==$white) 
        {
			echo file_get_contents($pagina);break;
    	}
    }	
}
</pre>