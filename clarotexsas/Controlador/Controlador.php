<?php

include_once BASEPATH . '/Modelo/DAO/ConjuntosDAO.php';

class MasterControlador {

  private $ConjuntosDAO;
  //AL CREAR EL OBJETO DEL MANEJADOR SE CREA EL OBJETO DAO
  function __construct() {
    $this->ConjuntosDAO = new ConjuntosDAO();
  }
  //ESTA FUNCION ES LA ENCARGADA DE DECIDIR QUE ACCION O FUNCION SE DEBE EJECUTAR
  function Index($cmd) {
    switch ($cmd) {
      //SE LEEN LOS CONJUNTOS DE FRASES REGISTRADOS EN LA BASE DE DATOS Y SE ENVIAN AL CLIENTE
      case "GuardarProveedores":
      $this->GuardarProveedores();
      break;

    }
  }

  public function GuardarProveedores() {
    //LAS VARIABLES ERROR Y MENSAJE SE ESTABLECEN PARA EL CONTROL DE ERRORES
    $error = "N";
    $mensaje = "";
    //SE LLAMA A LA FUNCION ENCARGADA DE CONECTARSE Y LISTAR LOS CONJUNTOS
    $Datos = $this->ConjuntosDAO->GuardarProveedores();
    $return["Error"] = $error;
    $return["Mensaje"] = $mensaje;
    $return["Datos"] = $Datos;
    echo json_encode($return);
  }

}