<?php
include_once str_replace("/Controlador", "", $absolute_path) . '/Modelo/Conexion/ClassPDO.php';
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


	#
	function ConsultaPrueba() {
		$pdo = new ClassPDO();
		$sql = "SELECT * FROM tipoinventario INNER JOIN detallestelas ON tipoinventario.idtipoInventario=detallestelas.idTipo WHERE tipoinventario.idtipoInventario='T'";
		return $pdo->Consulta($sql, "S", "ASSOC");
	}

	#
	function MostrarUsuarios($Nombre) {
		$pdo=new ClassPDO();
		$sql="SELECT * FROM usuarios WHERE usuario = '$Nombre'";
		return $pdo->Consulta($sql, "S", "ASSOC");
	}
}