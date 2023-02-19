<?php
$mi_version = 1.1;
include("splash_conex.php");
?>
<html>
    <head>
		<meta charset="utf-8" />
		<title><?= $mi_version ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

	    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
	    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
	    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <style type="text/css">
        	.marcos{
        		font-family: verdana;
        		font-size: 12px;
        		margin-top: 10px;
        		border-style: none;
        		border-color: gray;
        		border-width: 1px;
        		position: absolute;
        	}
        	.marco-padre{
        		border-style: solid;
        		border-color: rgb(160,160,160);
        		border-width: 1px;
        		position: relative;
        	}
        	body{
        		background-color: rgb(250,250,250);
        	}
        	table{
        		border-collapse: collapse;
        	}
        	table td{
        		font-family: verdana;
        		font-size: 12px;
        		max-height: 80px;
        	}
        	table tr{
        		font-family: verdana;
        		font-size: 12px;
        		max-height: 80px;
        	}
        	.verlo{
        		border-style: solid;
        		border-width: 1px;
        		border-color: black;
        	}
        	.texto-area{
        		font-family: courier;
        		font-size: 14px;
        		font-weight: bold;
        	}
        </style>
        <script>
        	$(document).ready(function() {
        	})
        </script>
    </head>
<body>
	<div class="container-fluid">

		<div class="row" style="display:flex">
			<div class="col-sm-6 text-center">
				
					<div>
						<label>Connie:</label>
						<?= explaya_conexion() ?>
					</div>

			</div>
		</div>

		<div class="row" style="display:flex">
			
			<div class="col-sm-12 verlo">
				
		        <div class="marco-padre" style="height:270px;">
		        	<div class="marcos" style="left:1px;width:700px;">
		        		<textarea id="query" name="query" class="texto-area" rows="11" cols="170"><?= isset($cSql) ? $cSql : "select * from" ?></textarea><br>
		        		<button type="button" onclick="migrania(document.getElementById('query').value,'resultado','resultadot')">Ejecutar</button>
		        		<input type="hidden" name="modo" value="1">
		        	</div>
		        </div>
			</div>
			
		</div>

		<div class="row">
			
			<div id="resultado" class="col-sm-12 verlo" style="overflow: scroll; padding-top: 6px;">
			</div>

		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	function migrania(cQuery,cObj){
		let cComando = cQuery.substr(0,6)
		let bandera = true
		
		if (cComando == 'delete'){
			if (!confirm("confirma que desea eliminar?")){
				bandera = false
			}
		}

		if(bandera){
			if(document.getElementById('conexion').value != '0'){
				var cDato = criptar(cQuery)
				$.ajax({
					data 	:{viste: cDato, conexion: $('#conexion').val(), senia: 'Lautaro361'},
					type 	: 'get',
					url 	: './proceso.php',
					success : function(res){
						document.getElementById(cObj).innerHTML = res
					}
				})
			}else{
				alert("Seleccione BD")
			}
		}

	}

	function criptar(cQuery){ // Ver 1.0
		var cDato = ""
		cDato = cQuery.replace(/select/g,"wMundano")
		cDato = cDato.replace('*',"wrisco")
		cDato = cDato.replace('*',"wrisco")
		cDato = cDato.replace('*',"wrisco")
		cDato = cDato.replace(/from/g,"wdesde")
		cDato = cDato.replace(/inner/g,"_ier__")
		cDato = cDato.replace(/left/g,"_lef__")
		cDato = cDato.replace(/where/g,"_donde__")
		cDato = cDato.replace(/-/g,"_-__")
		cDato = cDato.replace(/%/g,"Mundiali")
		cDato = cDato.replace(/like/g,"megusta_")
		cDato = cDato.replace(/group/g,"j_eb_epu")

		return cDato
	}	
</script>