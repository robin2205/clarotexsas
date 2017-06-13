<?php
session_start();
session_cache_limiter('private_no_expire');
if(isset($_SESSION['usuario'])){
    header('Location:modulos/login/index.php');}
$errores='';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $usuario=filter_var(strtolower($_POST['user']),FILTER_SANITIZE_STRING);
    $clave=$_POST['clave'];
    try{
        $conexion=new PDO('mysql:host=localhost;dbname=clarotexsas','root','');}
    catch(PDOException $e){
        echo "Error:".$e->getMessage();}
    $sql="SELECT * FROM usuarios WHERE usuario=:usuario AND password=:clave";
    $statement=$conexion->prepare($sql);
    // $statement=$conexion->prepare('SELECT usuarios.idusuarios, usuarios.nombreusuario, usuarios.password, usuarios.tipousuario, tipo_usuario.idtipo_usuario,tipo_usuario.tipousuario
    //     FROM usuarios
    //     INNER JOIN tipo_usuario
    //     ON usuarios.tipousuario = tipo_usuario.idtipo_usuario
    //     WHERE nombreusuario=:usuario AND password=:clave');
    $statement->execute(array(':usuario'=>$usuario,':clave'=>$clave));
    $resultado=$statement->fetch();
    if($resultado!=false){
        $_SESSION['usuario']=$usuario;
        //COOKIES
        $user=$_POST["user"];
        setcookie("user",$user,time()+7200,'/');
        $tipousuario= $resultado["perfil"];
        setcookie("tipousuario",$tipousuario,time()+7200,'/');
        //COOKIES
        header('Location:modulos.php?name=clarotex');}
    else{
        $errores.='Usuario o Contraseña Incorrectos';}
}
require 'modulos/login/index.php';
?>