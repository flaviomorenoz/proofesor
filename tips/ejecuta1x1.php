<?php
$driver 	= "postgre";
$bd 		= "cubilxsp_empresa05";
$usuario 	= "cubilxsp";
$pass 		= "OoTKxn2Puc6v";

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

function quito_coma_f($cad){
	return substr($cad,0,strlen(trim($cad))-1);
}

$conn = conectar_db($driver, $bd, $usuario, $pass);

$gn     = fopen("archivo.txt","r");
$a      = 1;
$nAcu   = 0;
while ($line = fgets($gn)) {
	
	echo($a.") ".$line)."<br>";
	
	$result 	= pg_query($conn, $line);
	$nAfectada  = pg_affected_rows($result);
	$retorno 	= "{$a}) Filas afectadas : ".$nAfectada;
		
	if($nAfectada == 0){
		echo "*****ERROR******* $line" . "<br>";	
	}

	$nAcu       += $nAfectada;
	//echo $retorno . "<br>";

	$a++;
}
fclose($gn);
echo $nAcu . "/" . $a;
?>