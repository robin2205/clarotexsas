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

	function GuardarTela($referencia,$descripcion,$costo,$unidad,$ancho,$rendimiento,$tipoI,$estado,$colores,$cantidades,$arregloColores,$arregloCantidades){
		error_log(print_r($arregloColores,1),0);
		$pdo=new ClassPDO();
		/*ORDEN DE EJECUCIÓN
		1. Guardar tela
		2. Guardar Inventario
		3. Capturar último dato guardado de tela
		4. Capturar último dato guardado de Inventario
		5. Guardar en detallestelas
		6. Guardar colores*/
		$sql="CALL sp_InsertarTelas('$referencia','$descripcion',$costo,$unidad,$ancho,$rendimiento,'$tipoI',$estado)";
		$pdo->Ejecutar($sql);
	}
}