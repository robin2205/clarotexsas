<?php
session_start();
session_unset();
session_destroy();
$_SESSION=array();
setcookie("user", '', time()-7200, '/');
setcookie("tipousuario", '', time()-7200, '/');
setcookie("nombreusuario", '', time()-7200, '/');
header('Location:sessionstart.php');
?>
