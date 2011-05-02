<?php
session_start();
session_name("logeado");
$_SESSION = array();
session_unset();    // Destruye todas las variables de la sesion
session_destroy();          // Finalmente, destruye la sesion
header("Location:index.php");
?>