<?php
$driver 	= "postgre";
$bd 		= "cubilxsp_empresa05";
$usuario 	= "cubilxsp";
$pass 		= "OoTKxn2Puc6v";

include("conectar_dbx.php");

function quito_coma_f($cad){
	return substr($cad,0,strlen(trim($cad))-1);
}

$conn = conectar_db($driver, $bd, $usuario, $pass);

$gn     = fopen("archivo.txt","r");
$a      = 1;
$nAcu   = 0;
while ($line = fgets($gn)) {
	
	//if($a>3){ break; }

	//echo($a.") ".$line)."<br>";
	
	if($a == 1){
		$parte1 = $line;
	}else{
		$parte2 	= $line;
		$cSql 		= $parte1 . quito_coma_f($parte2);
		if($a == 2){
			echo $cSql . "<br>";
		}
		$result 	= pg_query($conn, $cSql);
		$nAfectada  = pg_affected_rows($result);
		$retorno 	= "{$a}) Filas afectadas : ".$nAfectada;
		
		if($nAfectada == 0){
			echo $cSql . "<br>";	
		}

		$nAcu       += $nAfectada;
		echo $retorno . "<br>";
	}

	$a++;
}
fclose($gn);
echo $nAcu . "/" . $a;
?>