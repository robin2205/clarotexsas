<?php
@$mod=$_GET["mod"];
$name=$_GET["name"];
$tipo=$_COOKIE['tipousuario'];
include("bloques/menu.php");
//BEGIN CONTENT
echo"<div class='page-content'>";
//Lo que hace esto es casi lo mismo que el modulos.php pero solo para la carpeta mods del modulo actual
function veru($mo)
{
    //abrimos el archivo en lectura
    $id = @fopen("modulos/".$_GET["name"]."/modulos/".$mo.".php","r");
    //hacemos las comprobaciones
    if ($id) $abierto = true;
    else $abierto = false;
    //devolvemos el valor
    return $abierto;
    //cerramos el archivo
    fclose($id);
}
$abierto = veru($mod);
if ($abierto){
    include("modulos/".$name."/modulos/".$mod.".php");
}else{
    //Si no existe el mod cargamos por defecto el inicio.php
    include("modulos/".$name."/modulos/inicio.php");
}
echo"</div>";
//END CONTENT
?>