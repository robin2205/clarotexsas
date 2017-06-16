<?php
session_start();
if(isset($_SESSION['usuario'])){
  header('Location:modulos.php?name=clarotex');}
else{
  header('Location:sessionstart.php');}
?>