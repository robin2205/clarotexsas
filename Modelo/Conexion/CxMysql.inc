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
		}
		$db = new \PDO("mysql:host=127.0.0.1;dbname=".$dbname, 'root', '',
			array(
				\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
				\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
				\PDO::ATTR_PERSISTENT => false
				));
		return $db;
	}
	catch(PDOException $e){
		$msg = "Error: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
		error_log($msg, 0);
	}
}
?>