<?php
function conectarPDO_MYSQL($dbname)
{
	try{
		//error_log($dbname,0);
		if ($dbname) {
			if ($_SESSION["CodigoBaseDatos"]) {
				$dbname = $_SESSION["CodigoBaseDatos"];
			}else{
				$_SESSION["CodigoBaseDatos"]= $dbname;
			}
		}else{
			$dbname='clarotexsas';
			//error_log("rrrrrr".$_SESSION["CodigoBaseDatos"],0);
		}
		//error_log($_SERVER['_Ulqsym_'].$_SERVER['_Plqsym_'],0);
		$db = new \PDO("mysql:host=127.0.0.1;dbname=".$dbname, 'root', '',
		//$db = new \PDO("mysql:host=209.133.196.174:3306;dbname=".$dbname, 'jcmanjar', 'DvNTKSF7yHwR6UK',
			array(
				\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
				\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
				\PDO::ATTR_PERSISTENT => false
				));
		//$db->setAttribute( PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8 );
		//fnActualizacionCamposControlCambios($db);
		return $db;
	}
	catch(PDOException $e){
		$msg = "Error: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
		error_log($msg, 0);
	}
}
?>