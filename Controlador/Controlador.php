<?php
include_once BASEPATH . '/Modelo/DAO/ConjuntosDAO.php';

class MasterControlador{
    private $ConjuntosDAO;

    //Al crear el objeto del manejador, se crea el Objeto DAO
    function __construct(){
        $this->ConjuntosDAO=new ConjuntosDAO();
    }

    //Esta función es la encargada de decidir que acción o función se va a ejecutar
    function Index($cmd){
        switch($cmd){
            case "TraerUMedidas":
            $this->TraerUMedidas();
            break;

            case "TraerEstados":
            $this->TraerEstados();
            break;

            case "TraerColoresTelas":
            $this->TraerColoresTelas();
            break;



            case "ConsultaPrueba":
            $this->ConsultaPrueba();
            break;

            case "MostrarUsuarios":
            $this->MostrarUsuarios();
            break;
        }
    }

    //Esta función va al Módelo, y trae las Unidades de Medidas
    public function TraerUMedidas() {
        //Las variables ERROR y MENSAJE se establecen para el control de Errores
        $error="N";
        $mensaje="";
        $Datos=$this->ConjuntosDAO->TraerUMedidas();
        $return["Error"]=$error;
        $return["Mensaje"]=$mensaje;
        $return["Datos"]=$Datos;
        echo json_encode($return);
    }

    //Esta función va al Módelo, y trae los Estados
    public function TraerEstados() {
        //Las variables ERROR y MENSAJE se establecen para el control de Errores
        $error="N";
        $mensaje="";
        $Datos=$this->ConjuntosDAO->TraerEstados();
        $return["Error"]=$error;
        $return["Mensaje"]=$mensaje;
        $return["Datos"]=$Datos;
        echo json_encode($return);
    }

    //Esta función va al Módelo, y trae los Colores de las Telas
    public function TraerColoresTelas() {
        //Las variables ERROR y MENSAJE se establecen para el control de Errores
        $error="N";
        $mensaje="";
        $Datos=$this->ConjuntosDAO->TraerColoresTelas();
        $return["Error"]=$error;
        $return["Mensaje"]=$mensaje;
        $return["Datos"]=$Datos;
        echo json_encode($return);
    }





    public function MostrarUsuarios() {
        //LAS VARIABLES ERROR Y MENSAJE SE ESTABLECEN PARA EL CONTROL DE ERRORES
        $error = "N";
        $mensaje = "";
        $NombreUser = $_POST["NombreUsuario"];
        $Datos = $this->ConjuntosDAO->MostrarUsuarios($NombreUser);
        $return["Error"] = $error;
        $return["Mensaje"] = $mensaje;
        $return["Datos"] = $Datos;
        echo json_encode($return);
    }
    public function ConsultaPrueba() {
        //LAS VARIABLES ERROR Y MENSAJE SE ESTABLECEN PARA EL CONTROL DE ERRORES
        $error = "N";
        $mensaje = "";
        $Datos = $this->ConjuntosDAO->ConsultaPrueba();
        $return["Error"] = $error;
        $return["Mensaje"] = $mensaje;
        $return["Datos"] = $Datos;
        echo json_encode($return);
    }
}