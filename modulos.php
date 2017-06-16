<?php
//Con la variable name recogo la ruta del modulo
@$mod=$_GET["name"];
$tipo=$_COOKIE['tipousuario'];
//Aqui llamamos a toda la estructura antes del bloque central
include("bloques/funciones.php");
//include("bd/conexion.php");
include("bloques/b_head.php");
echo "<body>";
echo "<div>";
include("bloques/b_encabezado.php");
switch($tipo){
    case "1":
    include("bloques/menu/b_menu_admon.php");
    break;
    //default:
    //include("bloques/menu/b_menu_default.php");
}
echo "<div id='wrapper'>";
echo "<div id='page-wrapper'>";
//Esta funcion verifica que en la carpeta modulos exista otra carpeta con nombre $mod y dentro de esta un archivo index.php
function ver($mod)
{
    //abrimos el archivo en lectura
    $id = @fopen("modulos/".$mod."/index.php","r");
    //hacemos las comprobaciones
    if ($id) $abierto = true;
    else $abierto = false;
    //devolvemos el valor
    return $abierto;
    //cerramos el archivo
    fclose($id);
}
//Verificamos que el modulo exista
$abierto=ver($mod);
if($abierto){
    //Llamamos al archivo index.php del modulo este es el archivo predeterminado
    include("modulos/".$mod."/index.php");
}else{
    echo "<p>Lo sentimos, este módulo no está disponible</p>";
}
include("bloques/b_pie.php");
echo "</div>";
echo "</div>";
echo "</div>";
include("bloques/scripts.php");
echo "</body>";
echo "</html>";
?>
