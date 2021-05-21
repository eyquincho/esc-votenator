<?php require ("config.php"); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>EUROVISION 2021 - Voto en grupo</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
					<img src="img/euro-logo.png" style="height:100px" /><br/>
					
				</div>
				<div class="card-body">
					<h5 class="card-title">Crea un grupo</h5>
					<p class="card-text">Al crear un nuevo grupo obtendrás un enlace único para invitar a participar a quien tú quieras. </p>
					<p class="card-text">Si quieres unirte a un grupo ya creado, utiliza el enlace que te enviará el creador</p>
					<form class="form-signin" enctype="multipart/form-data" id="envio" name="crear_grupo" action="process.php" method="post">
						<?php
							if (isset($_GET['e'])){ ?>
								<div class="alert alert-danger" role="alert">
									El grupo al que has intentado acceder no existe. Puede que hayas introducido mal la dirección, o que nunca haya existido. Pide que te vuelvan a dar el enlace, o crea tu propio grupo.
								</div>
						<?php	}else {}
						?>
					<div class="form-group">
						<input type="text" id="inputNombre" name="inputNombre" class="form-control" placeholder="Nombre del grupo" required><br/>
					</div>
						<button class="btn btn-primary" type="submit">Crear</button>
					</form><br />
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
	</body>
</html>
