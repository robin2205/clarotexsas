<?php
include_once str_replace("/Controlador", "", $absolute_path) . '/Modelo/Conexion/ClassPDO.php';
class ConjuntosDAO {

  //ESTA FUNCION LISTA LAS FRASES REGISTRADAS EN LA BASE DE DATOS QUE PERTENECEN AL CONJUNTO INDICADO
  //GROUP BY IdAgrupaciones
  function GuardarProveedores() {
    $pdo = new ClassPDO();
    $sql = "SELECT * FROM ???? WHERE ppppp ORDER BY ";
    return $pdo->Consulta($sql, "S", "ASSOC");
  }

    function EliminarProveedores() {
    $pdo = new ClassPDO();
    $sql = "DELETE * FROM ???? WHERE Ver <> 'N' ORDER BY ";
    return $pdo->Consulta($sql, "S", "ASSOC");
  }


}