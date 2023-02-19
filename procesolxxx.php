<?php
//ini_set("session.cookie_lifetime","7200"); //ini_set("session.gc_maxlifetime","7200"); //session_start();
$senia = $_REQUEST['senia'];
usleep(100000);
if($senia != 'Lautaro361'){
	die("Unsupport");
}

include("Fm.php");

$fm = new Fm();

$cSql = "";

$cSql = $_REQUEST["viste"];

function descriptar($cSql){
	$cSql = str_replace("wMundano", "select", $cSql);
	$cSql = str_replace("wrisco", "*", $cSql);
	$cSql = str_replace("wdesde", "from", $cSql);
	$cSql = str_replace("_ier__", "inner", $cSql);
	$cSql = str_replace("_lef__", "left", $cSql);
	$cSql = str_replace("_donde__", "where", $cSql);
	$cSql = str_replace("_-__", "-", $cSql);
	$cSql = str_replace("Mundiali", "%", $cSql);
	$cSql = str_replace("megusta_", "like", $cSql);
	$cSql = str_replace("j_eb_epu", "group", $cSql);
	return $cSql;
}

$cSql = descriptar($cSql);

try{

	$baldosa = $_REQUEST["conexion"];

	include("splash_conexl.php");

	$ar_con = conectais($baldosa);

	$conn = $fm->conectar_db($ar_con["driver"], $ar_con["bd"], $ar_con["usuario"], $ar_con["pass"]);

	$nuevo_sql = str_replace("\n","<br>",$cSql);
	$retorno = "";

	if($ar_con["driver"] != 'postgre'){
		$pdo 	= $conn->query($cSql);
		$result = $pdo->fetchAll();
	}else{
		$result = pg_query($conn, $cSql);

		$pos_i = strpos(strtolower($cSql), 'insert');
		$pos_u = strpos(strtolower($cSql), 'update');
		$pos_d = strpos(strtolower($cSql), 'delete');

		$bandera_DML = false;
		if($pos_i == false || $pos_u == false || $pos_d == false){
			$bandera_DML = true;
			$retorno = "Filas afectadas : ".pg_affected_rows($result);
		}

		if (!$result) {
			echo "Ocurrió un error.\n";
			echo pg_last_error($conn);
			exit;
		}

		$result = pg_fetch_all($result);
		
	}

	$congo 	= 0;
	$ar_campos = array();

	foreach($result as $key => $value){
		$ar = $value;
		foreach($ar as $clave => $valor){
			$congo++;
			if($ar_con["driver"] != 'postgre'){
				if($congo % 2 != 0){
					$ar_campos[] = $clave;
				}
			}else{
				$ar_campos[] = $clave;
			}
		}
		break;
	}
	$cant 	= count($ar_campos);
	$nx=0;
	foreach($result as $r){
		$nx++;
		if($nx==1){ 
			$retorno .= "<table border=1>";
			$retorno .= "<tr>";
			for($nFox = 0; $nFox < $cant; $nFox++){
				$retorno .= $fm->celda($ar_campos[$nFox],'0',"padding:4px;background-color:rgb(190,190,190)");
			}
			$retorno .= "</tr>";
		}
		$retorno .= "<tr>";
		for($nFox = 0; $nFox < $cant; $nFox++){
			$cContenido = strlen($r[$ar_campos[$nFox]]) > 60 ? substr($r[$ar_campos[$nFox]],0,60) : $r[$ar_campos[$nFox]];
			$retorno .= $fm->celda($cContenido,'0','padding-left:4px;padding-right:2px;');
		}
		$retorno .= "</tr>";
	}
	if($nx > 0){ $retorno .= "</table>"; }
	echo $retorno;
	//echo "<br><br>".$cSql;
} catch (PDOException $e){
    echo 'Falla la conexion: ' . $e->getMessage();
}
?>