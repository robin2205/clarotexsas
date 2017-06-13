<?php
session_start();
$absolute_path = str_replace('\\', '/', dirname(__FILE__));
define('BASEPATH', $absolute_path);
if (!defined('BASEPATH')) {
    $contenido = "https://www.master2000.net/web/error404.html";
    exit('No direct script access allowed');
} else {
    include_once 'Controlador/MasterControlador.php';
    $a = new MasterControlador();
    if (isset($_REQUEST["cmd"])) {
        $cmd = $_REQUEST["cmd"];
    } else {
        $cmd = "Index";
    }
    $a->Index($cmd);
}