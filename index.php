<?php
try{
	include_once("Fm.php");
	//$rutaC = "./proceso.php";
	//ini_set("session.cookie_lifetime","7200");
	//ini_set("session.gc_maxlifetime","7200");
	//session_start();

	$fm = new Fm();

    if(isset($_POST["conexion"])){
		include("inicial.php");
	}else{
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		body{
			font-family: courier;
		}
	</style>
</head>
<body>
	<form name="form1" id="form1" method="post" action="index.php">

		<div>
			<label>Connie : </label>
		</div>

		<div>
			<input type="hidden" name="conexion" id="conexion">
			<input type="submit" value="Enviar">
		</div>

	</form>
	<div>

	</div>
</body>
</html>
<?php
	}
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
?>