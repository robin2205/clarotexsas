<?php
include_once "CxMysql.inc";
class ClassPDO {
  public $Conx;
  public function Consulta($Qry, $Retorna = 'S', $TipoRespuesta = 'NUM') {
    try {
      $dbh = conectarPDO_MYSQL($BaseDatos = 'clarotexsas');
      $sql = $dbh->prepare($Qry);
      $sql->execute();
      if($Retorna == 'S'){
        return $sql->fetchAll(PDO::FETCH_ASSOC);
      }
    } catch (PDOException $e) {
      echo 'Falló la conexión: ' . $e->getMessage();
    }
  }

  /*public function Consultar($Qry) {
    $dbh = conectarPDO_MYSQL($BaseDatos);
    $sql = $dbh->prepare($Qry);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }*/

  public function Ejecutar($sql) {
    $row = $this->Consulta($sql, 'N', 'ASSOC');
    return $row;
  }

  public function getId($table, $field, $where) {
    $row = $this->Consulta($sql, 'N', 'ASSOC');
    return $row;
  }

}