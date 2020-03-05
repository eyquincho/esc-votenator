<?php
//Creado por Quincho, así que a saber...
//13.05.2017
session_start();
ob_start();
require_once ("config.php");
require("php/conDB.php");
conexionDB();
mysqli_query ($_SESSION['con'],"SET NAMES 'utf8'");
header('Content-Type: text/html; charset=UTF-8'); 

if (!isset($_GET['id'])) {
	header("Location: index.php");
} else {}

$id_grupo=$_GET['id'];
$tabla = "esc_gr_".$_GET['id'];
$tabla_paises = "esc_participantes";
$sql_name = "SELECT `nombre_grupo` FROM `esc_grupos` WHERE `id_grupo` ='".$_GET['id']."'";
$cons_name = mysqli_query($_SESSION['con'],$sql_name);
if(mysqli_num_rows($cons_name)== 0){
   header("Location: index.php?e=404");
}
while($row_name = mysqli_fetch_array($cons_name)){
	$name_group = $row_name[0];
}
// Si name_group está vacío, volver a index con aviso
//FUNCION PARA EXTRAER EL RESUMEN DE VOTOS DE LA BASE DE DATOS

//FUNCION RECIBIR VOTOS

function GuardarVotos(){
	if (isset ($_POST['EnviarNuevoVoto'])){
		if (!isset ($_POST['nombre'],$_POST['12puntos'],$_POST['10puntos'],$_POST['8puntos'],$_POST['7puntos'],$_POST['6puntos'],$_POST['5puntos'],$_POST['4puntos'],$_POST['3puntos'],$_POST['2puntos'],$_POST['1puntos'])) {
			echo "<div class=\"alert alert-danger\" role=\"alert\">Debes añadir el voto por todos los paises, y el nombre.</div>";
		} else {
			$juez=$_POST['nombre'];
			$p12=$_POST['12puntos'];
			$p10=$_POST['10puntos'];
			$p8=$_POST['8puntos'];
			$p7=$_POST['7puntos'];
			$p6=$_POST['6puntos'];
			$p5=$_POST['5puntos'];
			$p4=$_POST['4puntos'];
			$p3=$_POST['3puntos'];
			$p2=$_POST['2puntos'];
			$p1=$_POST['1puntos'];
			
			$array_duplicados = array($p12, $p9, $p8, $p7, $p6, $p5, $p4, $p3, $p2, $p1);
			if(count(array_unique($array_duplicados))<count($array_duplicados))
				{
					echo "<div class=\"alert alert-danger\" role=\"alert\">No puedes votar por el mismo pais dos veces</div>";
				}else{
			
			//Vemos si el usuario ya ha votado
			$tabla_grupo = "esc_gr_".$_GET['id'];
			$sql_yaexiste="SELECT * FROM $tabla_grupo WHERE juez ='$juez'";
			$result=mysqli_query($_SESSION['con'], $sql_yaexiste);
			$teconozco = mysqli_num_rows($result);
			switch ($teconozco) {
				case 0:
					$save_newvote= "INSERT INTO $tabla_grupo (`juez`, `$p12`, `$p10`,`$p8`,`$p7`,`$p6`,`$p5`,`$p4`,`$p3`,`$p2`,`$p1`) VALUES ('$juez', 12, 10, 8, 7, 6, 5, 4, 3, 2, 1)";
					if (mysqli_query($_SESSION['con'], $save_newvote)or die(mysqli_error($_SESSION['con']))) {
						echo "<div class=\"alert alert-success\" role=\"alert\">Añadidos los votos de <strong>".$juez."</strong> correctamente</div>";
					}else {
						echo "<div class=\"alert alert-warning\" role=\"alert\">Ha ocurrido un error y no se han podido guardar los cambios.</div>";
					}
					break;
				case 1:
					echo "<div class=\"alert alert-warning\" role=\"alert\">Ya ha votado alguien con ese nombre...</div>";
			}
				}
		}
		
	} else {
		
	}
}


?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Eurovision - <?php echo $name_group;?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<link rel="stylesheet" href="css/theme.bootstrap_4.css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<style>
			body {
			  background-color: #6495ED;
			}
		</style>
		<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GOOGLE_ANALYTICS; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo GOOGLE_ANALYTICS; ?>');
</script>

    </head>
    <body>
		<div class="container">
		<div class="card">
		<div class="card-header">
			<center><img src="img/euro-logo.png" style="height:50px" /><center>
			<br/>
			<center><p>Grupo de votación de <strong><?php echo $name_group;?></strong></p><center>
		</div>
		<div class="card-block">
		<?php 
			//Arrancamos todas las funciones que sean necesarias
			GuardarVotos();
		?>
			<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#ViewCountries"><i class="fa fa-globe" aria-hidden="true"> Ver paises participantes</i></button>
			<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#NewVoto"><i class="fa fa-envelope" aria-hidden="true"> Añade un nuevo voto</i></button>
			<button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#ViewClas"><i class="fa fa-signal" aria-hidden="true"> Ver clasificación</i></button>
		
		<center><strong>Envia la dirección de esta página a quien quieras, para que pueda participar, o escanea este QR.</strong></center>
		<center><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https%3A%2F%2Fwww.muruais.com%2Fesc%2Fgrupo.php%3Fid%3D<?php echo $id_grupo; ?>&choe=UTF-8" title="Codigo QR para compartir" /></center>
		
		<!-- Modal añadir voto -->
		<div class="modal fade" id="NewVoto" tabindex="-1" role="dialog" aria-labelledby="CabeceraVotar" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title" id="CabeceraNewPlayer">Registro de voto</h4>
			  </div>
			<div class="modal-body">
				<form enctype="multipart/form-data" id="envio" name="envio_votos" class="col-lg-12" action="grupo.php?id=<?php echo $id_grupo; ?>" method="post">
					<label class="sr-only" for="Nombre">Mi nombre es</label>
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<div class="input-group-addon">@</div>
							<input type="text" class="form-control" name="nombre" id="Nombre" placeholder="Nombre" required>
						</div>
						<br />
						<span>... y por la gloria de Eurovision...</span>
						<br />
						<?php
						$query_participantes= "SELECT `id`, `pais` FROM `esc_participantes`";
						$result_participantes= mysqli_query ($_SESSION['con'],$query_participantes);
						while($row = mysqli_fetch_array($result_participantes)){
								$paises[]=$row;
							}
						$array = array(12, 10, 8, 7, 6, 5, 4, 3, 2, 1);
						foreach ($array as $valor) {?>
							<label class="sr-only" for="<?php echo $valor; ?>puntos"><?php echo $valor; ?> puntos</label>
							<div class="input-group mb-2 mr-sm-2 mb-sm-0">
								<div class="input-group-addon"><?php echo $valor; ?></div>
								<select class="form-control select" name="<?php echo $valor; ?>puntos" required>
									<option value="">Le doy mis <?php echo $valor;?> puntos a...</option>
									<?php
										foreach ($paises as $i) {
											echo "<option value=".$i[0].">".$i[1]."</option>";
										}
									?>
									
								</select>
							</div>	
						<?php
						}
						?>
						<br />
					<span>Revisalo bien, más adelante no podrás cambiarlo!</span>
					<button type="submit" name="EnviarNuevoVoto" class="btn btn-primary">Enviar votos</button>
				</form>
				</div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			  </div>
			</div>
		  </div>
		</div>	
		
		<!-- Final modal votar -->	
		
		<!-- Modal participantes -->
		<div class="modal fade" id="ViewCountries" tabindex="-1" role="dialog" aria-labelledby="CabeceraVotar" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title" id="CabeceraNewPlayer">Participantes</h4>
			  </div>
			<div class="modal-body">
				<table class="table">
				  <thead>
					<tr>
					  <th>Pais</th>
					  <th><strong>Artista</strong><br/>Canción</th>
					  <th>Video</th>
					</tr>
				  </thead>
				  <tbody>
					<?php
						$sql_paises="SELECT * FROM $tabla_paises";
						$result_paises=mysqli_query($_SESSION['con'], $sql_paises);
						while ($pais = mysqli_fetch_object($result_paises)){
					?>
				  	<tr>
						<th scope="row"><img src="flags/<?php echo $pais->pais; ?>.png"/> <?php echo $pais->pais; ?></th>
						<th><strong><?php echo $pais->artista; ?></strong><br/><?php echo $pais->cancion; ?></th>
						<td><a class="btn btn-danger" href="<?php echo $pais->video; ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></td>
					</tr>					
						<?php }?>
				  </tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
			</div>
		  </div>
		</div>	
		<!-- Final modal participantes -->
		
		<!-- Modal clasificacion -->
		<div class="modal fade" id="ViewClas" tabindex="-1" role="dialog" aria-labelledby="CabeceraVotar" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title" id="CabeceraNewPlayer">Clasificación</h4>
			  </div>
			<div class="modal-body">
				<table id="clasificacion" class="table">
				  <thead>
					<tr>
					  <th>Bandera</th>
					  <th>Pais</th>
					  <th>Puntos</th>
					</tr>
				  </thead>
				  <tbody>
					<?php
					$ix=1;
					while ($ix<=26){
						$sql_paises="SELECT `pais` FROM $tabla_paises WHERE `id` = $ix";
						$result_paises=mysqli_query($_SESSION['con'], $sql_paises);
							while ($pais = mysqli_fetch_array($result_paises)){
								$nombre_pais = $pais[0];
							}
						$sql_puntos="SELECT Sum(`$ix`) FROM `$tabla`";
						$result_puntos=mysqli_query($_SESSION['con'], $sql_puntos);
							while ($puntos = mysqli_fetch_array($result_puntos)){
								$puntos_final = $puntos[0];
							}
					?>	
					<tr>
						<td><img src="flags/<?php echo $nombre_pais; ?>.png"/></td>
						<td><?php echo $nombre_pais; ?></td>
						<td><?php echo $puntos_final; ?></td>
					</tr>
					<?php
						$ix++;
					}
					?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
			</div>
		  </div>
		</div>	
		<!-- Final modal clasificacion -->
	</div>
	</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap4.min.js"></script>
	<script src="js/tablas-esc.js"></script>
	<script>
	
		$('select').change(function() {
			var myOpt = [];
			$("select").each(function () {
				myOpt.push($(this).val());
			});
			$("select").each(function () {
				$(this).find("option").prop('hidden', false);
				var sel = $(this);
				$.each(myOpt, function(key, value) {
					if((value != "") && (value != sel.val())) {
						sel.find("option").filter('[value="' + value +'"]').prop('hidden', true);
					}
				});
			});
		});
	</script>
    </body>
</html>
