<?php
session_start();
session_unset();
session_destroy();
$_SESSION=array();
setcookie("user", '', time()-86400, '/');
setcookie("tipousuario", '', time()-86400, '/');
header('Location:sessionstart.php');
?>
