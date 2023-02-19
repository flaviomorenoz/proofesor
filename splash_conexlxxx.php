<?php
function explaya_conexion(){
	$cad =	"<select name=\"conexion\" id=\"conexion\">
			<option value=\"0\">---Elija---</option>
			<option value=\"1\">POS</option>
		</select>";
	return $cad;
}
function conectais($baldosa){

	if($baldosa == '1'){ // mysql POSC
		$driver 	= "mysql";
		$bd 		= "lacabktv_pos";
		$usuario 	= "lacabktv_root";
		$pass 		= "navarretecamara6";
	}

	$ar = array(
		'driver' => $driver,
		'bd' => $bd,
		'usuario' => $usuario,
		'pass' => $pass,
	);
	return $ar;
}
?>