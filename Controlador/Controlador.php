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
            $this->TraerColores();
            break;

            case "TraerColoresInsumos":
            $this->TraerColores();
            break;

            case "TraerTipos":
            $this->TraerTipos();
            break;

            case "GuardarTela":
            $this->GuardarTela();
            break;

        }
    }

    //Esta función va al Módelo, y trae las Unidades de Medidas
    public function TraerUMedidas(){
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
    public function TraerEstados(){
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
    public function TraerColores(){
        //Las variables ERROR y MENSAJE se establecen para el control de Errores
        $error="N";
        $mensaje="";
        $Datos=$this->ConjuntosDAO->TraerColores();
        $return["Error"]=$error;
        $return["Mensaje"]=$mensaje;
        $return["Datos"]=$Datos;
        echo json_encode($return);
    }

    //Esta función va al Módelo, y trae los Tipos de Inventario
    public function TraerTipos(){
        //Las variables ERROR y MENSAJE se establecen para el control de Errores
        $error="N";
        $mensaje="";
        $Datos=$this->ConjuntosDAO->TraerTipos();
        $return["Error"]=$error;
        $return["Mensaje"]=$mensaje;
        $return["Datos"]=$Datos;
        echo json_encode($return);
    }

    //Esta función va al Módelo, y trae Guarda la información de las Telas
    public function GuardarTela(){
        $referencia='';
        $pattern='1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max=strlen($pattern)-1;
        for($i=0;$i<=6;$i++){
            $referencia.=$pattern[mt_rand(0,$max)];
        }
        //Las variables ERROR y MENSAJE se establecen para el control de Errores
        $error="N";
        $mensaje="";
        $descripcion=$_POST["descripcion"];
        $costo=$_POST["costo"];
        $unidad=$_POST["unidad"];
        $ancho=$_POST["ancho"];
        $rendimiento=$_POST["rendimiento"];
        $tipoI=$_POST["tipoI"];
        $estado=$_POST["estado"];
        $arregloColores=$_POST['colores'];
        $arregloCantidades=$_POST['cantidades'];
        $Datos=$this->ConjuntosDAO->GuardarTela($referencia,$descripcion,$costo,$unidad,$ancho,$rendimiento,$tipoI,$estado,$arregloColores,$arregloCantidades);
        $return["Error"]=$error;
        $return["Mensaje"]=$mensaje;
        $return["Datos"]=$Datos;
        echo json_encode($return);
    }
}