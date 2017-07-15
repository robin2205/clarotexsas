<?php
include_once str_replace("/Controlador","",$absolute_path).'/Modelo/Conexion/ClassPDO.php';
class ConjuntosDAO {
	#Esta función realiza la conexión con la BD y trae las Unidades de Medidas
	function TraerUMedidas(){
		$pdo=new ClassPDO();
		$sql="SELECT * FROM unidaddemedidas";
		return $pdo->Consulta($sql,"S","ASSOC");
	}

	#Esta función realiza la conexión con la BD y trae los Estados
	function TraerEstados(){
		$pdo=new ClassPDO();
		$sql="SELECT * FROM estados";
		return $pdo->Consulta($sql,"S","ASSOC");
	}

	#Esta función realiza la conexión con la BD y trae los Colores de las Telas
	function TraerColores(){
		$pdo=new ClassPDO();
		$sql="SELECT * FROM colores ORDER BY color ASC";
		return $pdo->Consulta($sql,"S","ASSOC");
	}

	#Esta función realiza la conexión con la BD y trae los Tipos de Inventario
	function TraerTipos(){
		$pdo=new ClassPDO();
		$sql="SELECT * FROM tipoinventario";
		return $pdo->Consulta($sql,"S","ASSOC");
	}

	function GuardarTela($referencia,$descripcion,$costo,$unidad,$ancho,$rendimiento,$tipoI,$estado,$colores,$cantidades){
		//error_log(print_r($colores,1),0);
		$pdo=new ClassPDO();
		$sql="CALL sp_InsertarTelas('$referencia','$descripcion',$costo,$unidad,$ancho,$rendimiento,'$tipoI',$estado)";
		$id["Datos"]=json_encode($pdo->Consulta($sql,"S","ASSOC"));
		//$pdo["Datos"]=$Datos;
		error_log($id["Datos"],0);
		break;
		#Hallamos la cantidad de colores y cantidades a guardar
		$conteo=count($colores);
		#Hallamos el último id de tela guardado
		$sql2="SELECT MAX(idtelas) AS id FROM telas";
		$id=json_encode($pdo->Consulta($sql2));
		error_log(print_r($id,1),0);
		// for($i=0;$i<$conteo;$i++){
		// 	$sql3="CALL sp_InsertarInvTelas('$cantidades[$i]','$cantidades[$i]')";
		// 	$pdo->Ejecutar($sql3);
		// 	$sql4="SELECT MAX(idinventarioTelas) FROM inventariotelas";
		// 	$idInv=$pdo->Consulta($sql4,"S","ASSOC");
		// 	$sql5="CALL sp_InsertarDetColorTelas($id[0],$colores[$i],$idInv[0])";
		// 	$pdo->Ejecutar($sql5);
		// }
	}
}