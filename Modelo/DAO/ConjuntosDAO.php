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
		$pdo=new ClassPDO();
		$sql="CALL sp_InsertarTelas('$referencia','$descripcion',$costo,$unidad,$ancho,$rendimiento,'$tipoI',$estado)";
		$pdo->Ejecutar($sql);
		#Seleccionamos el último idVenta que se generó
		$sql2="SELECT MAX(idtelas) AS id FROM telas";
		$respuesta=$pdo->Consulta($sql2);
		$idVenta=$respuesta[0]["id"];
		#Hallamos la cantidad de colores y cantidades a guardar
		$conteo=count($colores);
		for($i=0;$i<$conteo;$i++){
			#Guardamos el Inventario de Telas
			$sql3="CALL sp_InsertarInvTelas('$cantidades[$i]','$cantidades[$i]')";
			$pdo->Ejecutar($sql3);
			#Seleccionamos el idInventario que se guardó
			$sql4="SELECT MAX(idinventarioTelas) AS idInv FROM inventariotelas";
			$respuesta2=$pdo->Consulta($sql4);
			$idInventario=$respuesta2[0]["idInv"];
			#Guardamos el color con el inventario asignado
			$sql5="CALL sp_InsertarDetColorTelas($idVenta,$colores[$i],$idInventario)";
			$pdo->Ejecutar($sql5);
		}
		$mensaje="La información se guardó Adecuadamente";
		return $mensaje;
	}
}