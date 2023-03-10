<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

**** COMO ACHICAR LAS COLUMNAS ******* :
echo (strlen($post['content'])>150)?substr($post['content'],0,150).'...':$post['content'];

**** ICONOS BOOSTRAP: *******************
<span class="glyphicon glyphicon-edit iconos"></span>
<span class="glyphicon glyphicon-remove iconos"></span>

****** CODEIGNITER DATABASE FUNCTIONS **********
->db->where();
->db->from()
->db->get();
->db->numrows();
->db->data_seek(id);
->db->error();

$array = array('name' => $name, 'title' => $title, 'status' => $status);
$this->db->where($array);
$this->db->where('name !=', $name);
$this->db->or_where('id >', $id);
		
$this->limit(10, 20)  // 20 is a offset

Este comando se usa reemplazando ->get() por ->get_compiled_select()
->get_compiled_select();

->get_compiled_insert('mytable');  // te genera el query en string

->db->replace('table', $data);  // comando replace into() values()

$this->db->set('name', $name);
$this->db->insert('mytable');

if($this->db->insert("estado")){
	echo "Si que lo ha hecho";
}else{
	echo "No lo hace.";
}

$this->db->where('id', $id);
$this->db->update('mytable', $data);

//$this->db->delete('mytable', array('id' => $id));  // Produces: // DELETE FROM mytable  // WHERE id = $id

// PERMITE RESETEAR EL CONSTRUCTOR DE QUERY //
//$this->db->reset_query()

get_compiled_select();
get_compiled_delete();
get_compiled_insert('mytable');

//$this->db->select_sum('age');
//$query = $this->db->get('members'); // Produces: SELECT SUM(age) as age FROM members

****** USAR LIKE EN CODEIGNITER **********
$this->db->like('title', 'match', 'before');    // Produces: WHERE `title` LIKE '%match' ESCAPE '!'
$this->db->like('title', 'match', 'after');     // Produces: WHERE `title` LIKE 'match%' ESCAPE '!'
$this->db->like('title', 'match', 'none');      // Produces: WHERE `title` LIKE 'match' ESCAPE '!'
$this->db->like('title', 'match', 'both');      // Produces: WHERE `title` LIKE '%match%' ESCAPE '!'

// CONOCER EL ULTIMO ID INSERTADO //
$this->db->insert_id()

$this->db->order_by('title', 'DESC');
$this->db->order_by('title DESC, name ASC');

//=== Al toque obtener un dato ====
$query  = $this->db->query(......);
$row    = $query->row(0, 'User');
echo    $row->name;

//***** USO DE row_array() ********
$query = $this->db->query("YOUR QUERY");
$row = $query->row_array();
if (isset($row)){
  echo $row['title'];
}

	.iconos{
    		font-size:20px;
  	}
      <?php 
        //die("el usuario:" . $_SESSION["ID_USUARIO"]);
        if($this->usuario_model->verifica_acceso($_SESSION["ID_USUARIO"],"RECETAS")){ 
      ?>
      <li><a class="fuerte" href="<?= base_url("receta/agregar"); ?>" title="Ver Recetas">
           <!--<i class="fa fa-dashboard fa-1x"></i>-->
           <span class="glyphicon glyphicon-shopping-cart iconos"></span>
           &nbsp;&nbsp;Recetas
         </a>
      </li>
      <?php } 
      ?>


// ========== CODEIGNITER CREAR UN FORMULARIO ===========//
echo form_open_multipart("gastos/add", 'class="validation" id="form_compra"');
echo form_close();

// ======================================= CODEIGNITER:  PARA HACER UN CONTROL: ====================
 $ar = array(
   "name"  =>"date",
   "id"    =>"date",
   "type"  =>"date",
   "value" => substr($dates,0,10),
   "class" =>"form-control tip"
 );
 echo form_input($ar);

<div class="form-group">
     lang('reference', 'reference'); 
     form_input('reference', set_value('reference'), 'class="form-control tip" id="reference"'); 
</div>

// ======================================= CODEIGNITER:  PARA HACER UN COMBOBOX ====================:
$ar = array('F'=>'Factura','B'=>'Boleta','G'=>'Guia Interna');
echo form_dropdown('tipoDoc',$ar,'','class="form-control tip" id="tipoDoc" required="required"');

//======================================== BOTON GRABAR COMPRA:
<?= form_submit('add_purchase', lang('add_purchase'), 'class="btn btn-primary"'); ?>

// ====== LA SOLUCION DESPUES DE USAR AJAX (SE ACTUALIZA LA PAGINA CON)
location.reload()

======= TRANSACCIONES =========
$this->db->trans_begin();
if ($this->db->trans_status() === FALSE){
    $this->db->trans_rollback();
}else{
    $this->db->trans_commit();
}

// ====== MENSAJE ENVIADOS ======
if ($error)    muestra con alert-danger
if ($warning)  muestra con alert-warning
if ($message)  muestra con alert-success

if(isset($message)){
	if($error){
		echo $this->session->set_flashdata('error', lang("No se pudo grabar."));
	}else{
		echo $this->session->set_flashdata('message',"Se grab?? correctamente.");
	}
}

// ======= COMO HACER UN ENLACE COMO BOTON =======================
Simplemente al enlace le agregas el evento onclick  <a href="#" onclick="funcionX()"></a>

// ======= HACER CLICK EN UN ENLACE DESDE PROGRAMACION ===========
document.getElementById("mi_enlace").click()

<?php if($this->session->userdata["first_name"] == "Administrador"){ ?>

//=========== SE NECESITA ESTE TOKEN PARA PODER USAR AJAX POST ========
"data": function ( d ) {d.spos_token = "6f32282c322e19a9fe88b21b59399267";}

//=========== CENTRAR UNA COLUMNA EN EL DATATABLE ======================
,"className": "text-center"


//=========== TIP IMPORTANTE PARA USO DE RUTAS : =======================
Pues se coloca toda la ruta a partir de la carpeta view:
$this->load->view( $this->theme . "recetas/agregar_recetas" );

//======================================== PARA HACER UN AJAX EN EL POS =====
    function ajax_xxxx(){
        let parametros = {
            tipoDoc     : document.getElementById("tipoDoc").value
        }
        $.ajax({
            data: parametros,
            url : "<?= base_url() ?>pos/verifica_datos_cliente",
            type: "get",
            success: function(response){
                if (response=='1'){
                }else{
                }
            }
        })
    }


$(document).on('click', '.product', function (e) {
        code = $(this).val();
        $.ajax({
            type: "get",
            url: base_url+'pos/get_product/'+code,
            dataType: "json",
            success: function (data) {
                if (data !== null) {
                    add_invoice_item(data);
                } else {
                    bootbox.alert(lang.no_match_found);
                }
            }
        });
    });

//===== ARRAYS EN JAVASCRIPT =========//
var cars = ["Saab", "Volvo", "BMW"];
var cars = new Array("Saab", "Volvo", "BMW"); // Lo mismo
var name = cars[0];  // Accediendo a un array
var person = {firstName:"John", lastName:"Doe", age:46}; // es un objeto

fruits.push("Kiwi"); 	// Agrega un item
fruits.pop(); 		// Elimina el ultimo elemento
fruits.reverse(); 	// los ordena en orden inverso
fruits.splice (ind, cuant, it1, it2, ??? , itN)  // Modifica el array eliminando cuant elementos e insertando it1, it2, ???, itN, desde el ??ndice ind.


// ************** ARRAY EN PHP **************
Array num??rico indexado: 	$variable = array($valor1, $valor2, $valor2,...);
Array asociativo:		$variable = array(clave1=>valor1, clave2=>valor2, clave3=>valor3...);
Array multidimendional:		$equipo_futbol = array(
 					  array("Rooney","Chicharito","Gigs"),
 					  array("Suarez"),
 					  array("Torres","Terry","Etoo")
 					);
 
 foreach($equipo_futbol as $equipo){
 	echo "En este equipo juegan: ";
 	foreach($equipo as $jugador){
 		echo $jugador ." ";
 	}
 	echo "<br>";
 } 
 

********* HACER UN CONTROL TEXT CSS BOOTSTRAP *****************************
<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
    </div>
</div>


****** obtener valores y texto de un select con javascript **** *********
/* Para obtener el texto */
var combo = document.getElementById("producto");
var selected = combo.options[combo.selectedIndex].text;
alert(selected);

***** SUMAR O RESTAR DIAS EN MYSQL **********
select DATE_ADD(NOW(),INTERVAL 20 DAY); # Agrega 20 d??as a la fecha actual
select DATE_ADD(NOW(),INTERVAL 30 MINUTE); # Agrega 30 minutos a la fecha actual
select DATE_ADD(NOW(),INTERVAL 50 YEAR); #Agrega 50 a??os a la fecha actual
select DATE_ADD(NOW(),INTERVAL '10-5' YEAR_MONTH); #Agrega 10 a??os 5 meses a la fecha actual

ini_set('display_errors','1');
ini_set('error_reporting','E_ALL');

            <?php if ($Settings->multi_store && !$this->session->userdata('store_id')) { ?>
                <li class="mm_stores"><a href="<?= site_url('stores'); ?>"><i class="fa fa-building-o"></i> <span><?= lang('stores'); ?></span></a>
                </li>
            <?php } ?>
                <li class="mm_pos"><a href="<?= site_url('pos'); ?>"><i class="fa fa-th"></i> <span><?= lang('pos'); ?></span></a>
                </li>

.table td:nth-child(4) { text-align: left; background-color: yellow; }

$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');

************* PRIMERO SE COLOCA LAS REGLAS, LUEGO SE CORRE LA VALIDACION **********************************
$this->form_validation->set_rules('name', $this->lang->line("name"), 'required');
$this->form_validation->set_rules('email', $this->lang->line("email_address"), 'valid_email');

if ($this->form_validation->run() == true){
		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>date</th>
					<th>serie-correl</th>
					<th>tipoDoc</th>
					<th>Envio_Sunat</th>
					<th>Status</th>
					<th>paid_by</th>
					<th>Total</th>
				</tr>
			</thead>
		<?php
			// a.id, a.date, a.serie, a.correlativo, a.tipoDoc, a.envio_electronico, a.status, tp.paid_by, a.grand_total
			foreach($result as $r){
				echo $this->fm->celda();
				echo $this->fm->celda();
				echo $this->fm->celda();
				echo $this->fm->celda();
				echo $this->fm->celda();
				echo $this->fm->celda();
				echo $this->fm->celda();
				echo $this->fm->celda();
			}
		?>
		</table>


	<!-- PNOTIFY CSS-->
    <link href="<?php echo PNOTIFY_ALL_CSS;?>" rel="stylesheet" />

********* AGREGAR UN ITEM A UN SELECT HTML ***********************
const $select = $("#miSelect");
let valor = 'Lima'
$select.append($("<option>", {
    value: valor,
    text: valor
  }));

******** TRUCO PARA IR CUALQUIER PAGINA (JAVASCRIPT) **************
Dada un href vacio: <a id="enlace" href="mi_destino"></a>
Con Javascript: document.getElementById("enlace").click()


**** Linux grep *****
grep -r pattern /directory/to/search  (busqueda recursiva)


**** Una simple fila en bootstrap ********
			<div class="form-group row" style="border-style:solid; border-color:lightgray; border-width:1px">
				
	    		<label for="" class="col-6 col-sm-1 col-form-label">:</label>
	    		<div class="col-6 col-sm-3">
	    			<?php
	    				$ar = array(
	    					"name" => "",
	    					"id" => "",
	    					type => "",
	    					value => "",
	    					class => ""
	    				);
	    				echo form_input($ar);
	    			?>
	    		</div>

	    		<label for="" class="col-6 col-sm-1 col-form-label">:</label>
	    		<div class="col-6 col-sm-3">
	    			<?php
	    				$ar = array(
	    					"name" => "",
	    					"id" => "",
	    					type => "",
	    					value => "",
	    					class => ""
	    				);
	    				echo form_input($ar);
	    			?>
	    		</div>
	    	</div>

***** COMO SE AGREGA UNA FILA EN UN DATATABLE *******
1) SE AGREGA EN "buttons"
2) Se agrega el campo en "columns"
3) Se agrega en el THEAD titulos y en tr columnas.
4) Se incrementa colspan del tbody


**** LIBRERIA TOASTR (para mensajes) *************************************************
  <script type="text/javascript" src="http://localhost/varios/qsystem/POS/themes/default/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script type="text/javascript" src="http://localhost/varios/qsystem/POS/themes/default/assets/toastr-master/toastr.js"></script>
  <link href="http://localhost/varios/qsystem/POS/themes/default/assets/toastr-master/build/toastr.css" rel="stylesheet"/>

  toastr.info('Flavio es la clase de hombre.')
  toastr.success('Se guardaron los cambios satisfactoriamente', 'Todo en orden')
  toastr.warning('La latencia del server esta aumentando.', 'Alerta!')
  toastr.error('no se puede!\'t.', 'Otro error cr??tico')

      <ion-icon name="checkmark-circle-outline"></ion-icon>chekmark<br>
      <ion-icon name="alert-circle-outline" class="text-danger"></ion-icon>Alert<br>
      <ion-icon name="checkmark-circle-outline" class="text-success"></ion-icon>kokoko<br>

**** ANGULAR Y TOASTR **************************************************************
En app/layouts/components/toast.component.html:
<div id="toast-17" ng-show="loader_f" class="toast-box toast-center">
    <div class="in">
        <ion-icon name="alert-circle-outline" class="text-danger"></ion-icon>
        <div class="text">
            Espere por favor ....
        </div>
    </div>
</div>

Al inicio del component.js (En apps/layouts/familiar)
	$scope.loader_f = false; 

  En la funcion
	$scope.loader_f = true;
        toastbox('toast-17');

    dentro del servicio
	$scope.loader_f = false;

***** TOASTR **********************************************************************
    <script type="text/javascript" src="<?= site_url('themes/default/assets/toastr-master/toastr.js') ?>"></script>
    <link rel="stylesheet" src="<?= site_url('themes/default/assets/toastr-master/build/toastr.css') ?>"/>


***** DISPARAR UN ONCHANGE ******************************************************
var event = new Event('change');  // Create a new 'change' event
element.dispatchEvent(event); // Dispatch it.

****** SIMPLE USO DEL DATATABLE ************************************************
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
            "ajax": "<?= base_url("caja/get_ingresos") ?>"
        } );
    } );
</script>

<h2 style="margin-bottom:26px">Ingresos de Caja</h2>
<table id="example" class="display" style="width:100%; font-size: 11px; margin-bottom: 20px;">
    <thead>
        <tr>
            <th class="col-sm-1">fecha</th>
            <th class="col-sm-1">cod_afi</th>
            <th class="col-sm-1">socio</th>
            <th class="col-sm-3">nombre</th>
            <th class="col-sm-3">concepto</th>
            <th class="col-sm-1">Monto</th>
            <th class="col-sm-2">Obs</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>fecha</th>
            <th>cod_afi</th>
            <th>socio</th>
            <th>nombre</th>
            <th>concepto</th>
            <th>Monto</th>
            <th>Obs</th>
        </tr>
    </tfoot>
</table>

******* listar solo las Columnas de una Tabla ***********
select column_name from columns where table_schema = 'qsdetenx_acad' and table_name = 'pagos';

******* Como realizar un Backup a una BD Mysql ****************
mysqldump -u nombredeusuario -p nombre_basededatos > nombredelarchivo.sql  (enter) Pide contrase??a.
mysqldump --user=TU_USUARIO --password=TU_CONTRASE??A NOMBRE_BASE_DE_DATOS > copia_seguridad.sql

****** DIFERENCIAS ENTRE 2 BASES DE DATOS *******
mysqldump --skip-comments --skip-extended-insert -d --no-data -u root -p dbName1>file1.sql
mysqldump --skip-comments --skip-extended-insert -d --no-data -u root -p dbName2>file2.sql
diff file1.sql file2.sql

****** AUMENTAR 1 DIA  EN FECHA PHP ******
$new_f = date('Y-m-d', strtotime($fecha_del_cierre .' +1 day'));

***** Timezone en PHP *****
date_default_timezone_set('America/Lima');

****** RECORRER UN JSON DESDE JAVASCRIPT (1) CON KEY=>VALOR ***********
var obj = JSON.parse(res)
for(registro in obj){
  console.log( obj[registro]["campo1"] )
  console.log( obj[registro]["campo2"] )
}

****** RECORRER UN JSON DESDE JAVASCRIPT (2) SOLO VALORES ***********
var obj = JSON.parse(res)
for(casco in obj){
  lim_reg = obj[casco].length
  lim_campos = obj[casco][0].length
  for(var i=0; i<lim_reg; i++){
     cad += "<tr>"
     for(var j=0; j<lim_campos-1; j++){
        cad += celda(obj[casco][i][j])
     }
     cad += "</tr>"
  }
}
cad += "</table>"

***** Listar solo Directorios *****
ls -ld */

***** Busqueda de una cadena en una carpeta *****
grep -r "mi cadena"

******* https://www.mclibre.org/consultar/php/lecciones/php-db-inyeccion-sql.html *********
loquesea' or '1'='1
loquesea' OR username LIKE 'a%';--
loquesea' OR username LIKE 'b%';--
loquesea'; INSERT INTO tabla ('user', 'password') VALUES ('hacker', 'hacker'); --
loquesea'; INSERT INTO tec_users ('username', 'password') VALUES ('hacker', 'hacker'); --

****** Datatable - Aumentar Paginaci??n ******
data-page-length='50'

****** Colocar opcion Eliminar en un Query ******
concat('<a href=\"#\" onclick=\"eliminar(',a.id,')\"><span class=\"glyphicon glyphicon-remove iconos\"></span></a>')

***** ENVIO DE MENSAJE A OTRO PANTALLA ********
$this->session->set_flashdata('warning', lang("please_select_store"));

***** Ocultar/Ver un Div con Efectos ******
$('miDiv').fadeIn(1000) // Aparecer
$('miDiv').fadeOut(1000) // Desaparecer

</body>
</html>
