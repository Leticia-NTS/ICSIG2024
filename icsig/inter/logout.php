<?php   
session_start(); 
session_destroy(); 
header("Location: http://icsig/inter/pages/inicio.php", true, 301);
exit();
?>