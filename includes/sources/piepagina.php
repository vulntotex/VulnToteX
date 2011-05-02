<script type="text/javascript">
function salir() 

{

    if(confirm("¿Desea Salir?")) {

        document.location.href= '/vulntotex/salir.php';

    }

} 
</script>
<?php 
echo 'You are logged in as <strong><a href="/vulntotex/homeuser.php">'. $_SESSION['usuario']["usuario_user"].'</a></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="/vulntotex/index.php">  <img style="border:0;"  src="/vulntotex/images/Home1.png"></a>';
echo '<a href="#" onClick="salir();"> <img style="border:0;"  src="/vulntotex/images/cerrar-sesion.png"></a>';
?>