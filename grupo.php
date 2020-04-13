<?php
	session_start();
	ob_start();
	require_once ("config.php");
	require("conDB.php");
	conexionDB();
	mysqli_query ($_SESSION['con'],"SET NAMES 'utf8'");
	header('Content-Type: text/html; charset=UTF-8'); 
	$id_grupo=$_GET['id'];
	$tabla_puntuaciones = "esc_puntuaciones";
	$tabla = "esc_gr_".$_GET['id'];
	
	// Revisar si hay un grupo indicado en la url, y si lo hay comprobar que existe
	if (!isset($_GET['id'])) {
		header("Location: index.php");
	} else {}
	$sql_nombre = "SELECT `nombre_grupo` FROM `esc_grupos` WHERE `id_grupo` ='".$id_grupo."'";
	$cons_nombre = mysqli_query($_SESSION['con'],$sql_nombre);
	if(mysqli_num_rows($cons_nombre)== 0){
		header("Location: index.php?e=404");
	}
	while($row_nombre = mysqli_fetch_array($cons_nombre)){
		$nombre_grupo = $row_nombre[0];
	}
	
	
	$tabla_paises = "esc_participantes";
	// Contar el número de paises en la base de datos, para adaptar las consultas
	$sql_contar_paises = "SELECT COUNT(id) AS unidades FROM $tabla_paises";
	$result_contar_paises = mysqli_query($_SESSION['con'],$sql_contar_paises);
	$contar_paises = mysqli_fetch_assoc($result_contar_paises);
	$paises_participantes = $contar_paises['unidades'];
	
	
	// +++++
	// Función para guardar los votos de un usuario
	// +++++
	function GuardarVotos($tabla, $grupo){
		if (isset ($_POST['EnviarNuevoVoto'])){
			if (!isset ($_POST['nombre'],$_POST['12puntos'],$_POST['10puntos'],$_POST['8puntos'],$_POST['7puntos'],$_POST['6puntos'],$_POST['5puntos'],$_POST['4puntos'],$_POST['3puntos'],$_POST['2puntos'],$_POST['1puntos'])) {
				echo "<div class=\"alert alert-danger\" role=\"alert\">Debes añadir todos los votos, y tu nombre.</div>";
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
				// Comprobar si hay algún voto duplicado
				$array_duplicados = array($p12, $p10, $p8, $p7, $p6, $p5, $p4, $p3, $p2, $p1);
				if(count(array_unique($array_duplicados))<count($array_duplicados))
					{
						echo "<div class=\"alert alert-danger\" role=\"alert\">No puedes votar por el mismo pais dos veces</div>";
					}else{
				// Comprobar si el usuario ya ha votado
				// Si no lo ha hecho, guardamos el voto
				$sql_yaexiste="SELECT * FROM $tabla WHERE juez ='$juez'";
				$result=mysqli_query($_SESSION['con'], $sql_yaexiste);
				$teconozco = mysqli_num_rows($result);
				switch ($teconozco) {
					case 0:
						$save_newvote= "INSERT INTO $tabla (`juez`, `grupo`, `$p12`, `$p10`,`$p8`,`$p7`,`$p6`,`$p5`,`$p4`,`$p3`,`$p2`,`$p1`) VALUES ('$juez', '$grupo', 12, 10, 8, 7, 6, 5, 4, 3, 2, 1)";
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
	<title>Eurovision - <?php echo $nombre_grupo;?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/theme.bootstrap_4.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<style>
		body {
		  background-color: #6495ED;
		}
	</style>
	<!-- Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GOOGLE_ANALYTICS; ?>"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', '<?php echo GOOGLE_ANALYTICS; ?>');
	</script>
</head>
<body>
	<div class="container"><br />
		<div class="card text-center">
			<div class="card-header">
				<center><img src="img/euro-logo.png" style="height:50px" /><center><br/>
				<center><p>Grupo de votación de <strong><?php echo $nombre_grupo;?></strong></p><center>
			</div>
			<div class="card-body">
				<?php 
					//Arrancamos todas las funciones que sean necesarias
					GuardarVotos($tabla_puntuaciones, $id_grupo);
				?>
				<button type="button" class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#modal-paises"><i class="fa fa-globe" aria-hidden="true"> Ver paises participantes</i></button>
				<button type="button" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#modal-votar"><i class="fa fa-envelope" aria-hidden="true"> Añade un nuevo voto</i></button>
				<button type="button" class="btn btn-outline-secondary btn-block" data-toggle="modal" data-target="#modal-clasificacion"><i class="fa fa-signal" aria-hidden="true"> Ver clasificación</i></button>
				<button type="button" class="btn btn-outline-warning btn-block" data-toggle="modal" data-target="#modal-participantes"><i class="fa fa-users" aria-hidden="true"> Ver votaciones</i></button>
				<hr class="col-xs-12">
				<strong>Envia la dirección de esta página a quien quieras, para que pueda participar, o escanea este QR.</strong><br />
				<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo urlencode("http://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>&choe=UTF-8" title="Codigo QR para compartir" />
				<hr class="col-xs-12">
				<a target="_blank" href="index.php">Crear otro grupo</a><br />
				<!-- Modal añadir voto -->
				<div class="modal fade" id="modal-votar" tabindex="-1" role="dialog" aria-labelledby="CabeceraVotar" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="CabeceraNewPlayer">Registro de voto</h4>
							</div>
							<div class="modal-body">
								<form enctype="multipart/form-data" id="envio" name="envio_votos" class="col-lg-12" action="grupo.php?id=<?php echo $id_grupo; ?>" method="post">
									<label class="sr-only" for="Nombre">Mi nombre es</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">@</span>
											</div>
											<input type="text" class="form-control" name="nombre" id="Nombre" placeholder="Nombre" required>
										</div><br />
										<span>... y por la gloria de Eurovision...</span><br />
										<?php
											$query_participantes= "SELECT `id`, `pais` FROM `esc_participantes`";
											$result_participantes= mysqli_query ($_SESSION['con'],$query_participantes);
											while($row = mysqli_fetch_array($result_participantes)){
													$paises[]=$row;
												}
											$array = array(12, 10, 8, 7, 6, 5, 4, 3, 2, 1);
											foreach ($array as $valor) {
										?>
											<label class="sr-only" for="<?php echo $valor; ?>puntos"><?php echo $valor; ?> puntos</label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><?php echo $valor; ?></span>
												</div>
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
										?><br />
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
				<!-- Modal paises participantes -->
				<div class="modal fade" id="modal-paises" tabindex="-1" role="dialog" aria-labelledby="CabeceraVotar" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="CabeceraNewPlayer">Paises Participantes</h4>
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
											<th scope="row"><img src="flags/<?php echo $pais->iso3; ?>.png"/> <?php echo $pais->pais; ?></th>
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
				<div class="modal fade" id="modal-clasificacion" tabindex="-1" role="dialog" aria-labelledby="CabeceraVotar" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="CabeceraNewPlayer">Clasificación</h4>
							</div>
							<div class="modal-body">
								<table id="clasificacion" class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Pais</th>
											<th>Puntos</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$ix=1;
											while ($ix<=$paises_participantes){
												$sql_paises="SELECT `pais`, `iso3` FROM $tabla_paises WHERE `id` = $ix";
												$result_paises=mysqli_query($_SESSION['con'], $sql_paises);
												while ($pais = mysqli_fetch_array($result_paises)){
													$nombre_pais = $pais[0];
													$bandera_pais = $pais[1];
												}
												$sql_puntos="SELECT Sum(`$ix`) FROM `$tabla_puntuaciones` WHERE `grupo` = '".$id_grupo."'";
												$result_puntos=mysqli_query($_SESSION['con'], $sql_puntos);
												while ($puntos = mysqli_fetch_array($result_puntos)){
													$puntos_final = $puntos[0];
												}
										?>	
										<tr>
											<td></td>
											<td><img src="flags/<?php echo $bandera_pais; ?>.png"/> <?php echo " ".$nombre_pais; ?></td>
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
				<!-- Modal votaciones -->
				<div class="modal fade" id="modal-participantes" tabindex="-1" role="dialog" aria-labelledby="CabeceraVotar" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="CabeceraNewPlayer">Participantes en <?php echo $nombre_grupo;?></h4>
							</div>
							<div class="modal-body">
								<div class="accordion" id="ListadoVotos">
									<?php
										// Abrimos un while que vaya por todas las filas de la tabla del grupo
										// Contamos el número de votantes para hacer el while el número correcto de veces
										$sql_contar_votantes = "SELECT COUNT(id) AS num FROM `$tabla_puntuaciones` WHERE `grupo` = '".$id_grupo."'";
										$result_contar_votantes = mysqli_query($_SESSION['con'],$sql_contar_votantes);
										$contar_votantes = mysqli_fetch_assoc($result_contar_votantes);
										// Hacemos un string para el query del while, con todos los números de los países participantes
										$outall = "";
										for ($x = 1; $x <= $paises_participantes; $x++) {
											$outall .= ", `$x`";
										}
										
										$iv=1;
										while ($iv<=$contar_votantes['num']) {
											$sql_votantes =	"SELECT `juez` $outall FROM `$tabla_puntuaciones` WHERE `id` = $iv AND `grupo` = '".$id_grupo."'";
											$result_votantes=mysqli_query($_SESSION['con'], $sql_votantes);
											while ($votante = mysqli_fetch_array($result_votantes)){
												?>
												<div class="card">
													<div class="card-header" id="cabeceraUsuario">
														<h2 class="mb-0">
															<button class="btn collapsed" type="button" data-toggle="collapse" data-target="#acordeonUsuario<?php echo $votante[0]; ?>" aria-expanded="false" aria-controls="collapseOne">
																<?php echo $votante[0]; ?>
															</button>
														</h2>
													</div>
													<div id="acordeonUsuario<?php echo $votante[0]; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#ListadoVotos">
														<div class="card-body">
														<table id="votantes" class="table datavotante">
														<thead>
															<tr>
																<th>Puntos</th>
																<th>Pais</th>
															</tr>
														</thead>
														<tbody>
															<?php
																// Guardamos los nombres de los paises participantes en un array, para no tener que hacer consultas en cada linea de la tabla
																$query_paises_participantes = "SELECT pais, iso3 FROM $tabla_paises";
																$result_paises_participantes = mysqli_query($_SESSION['con'], $query_paises_participantes);
																$pais_participante = array();
																while($row = mysqli_fetch_assoc($result_paises_participantes))
																{
																		$pais_participante[] = $row['pais'];
																		$bandera_participante[] = $row['iso3'];
																}
																$iz = 1;
																while ($iz<=$paises_participantes) {
																	if ($votante[$iz]>0) {
																		echo "<tr>";
																		echo "<td>".$votante[$iz]."</td>";
																		echo "<td><img src=\"flags/".$bandera_participante[$iz].".png\"/> ".$pais_participante[$iz]."</td>";
																		echo "</tr>";
																	}
																	$iz++;
																}
															?>
														</tbody>
														</table>
														</div>
													</div>
												</div>
												<?php
											}
											$iv++;
										}
									?>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
					</div>
				</div>	
				<!-- Final modal votaciones -->
			</div>
			<div class="card-footer text-muted">
				<a target="_blank" href="https://twitter.com/eyquincho">@EyQuincho</a> | <a target="_blank" href="https://github.com/eyquincho/escvs">GitHub</a> 
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
