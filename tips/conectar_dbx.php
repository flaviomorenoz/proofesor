<?php
function conectar_db($driver="mysql", $dbname, $usuario, $clave){
	if($driver != 'postgre'){
		$conn 		= new PDO("{$driver}:host=localhost;dbname=$dbname", $usuario, $clave);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}else{
		//$conn 		= new PDO("{$driver}:host=localhost;port=5432;dbname=$dbname", $usuario, $clave);
		$conn = pg_connect("host=localhost user={$usuario} password='{$clave}' dbname={$dbname}");
	}
	
	return $conn;
}
?>