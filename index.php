<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>EUROVISION 2019 - Voto en grupo</title>

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/estilo.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
	
      <form class="form-signin" enctype="multipart/form-data" id="envio" name="crear_grupo" action="php/process.php" method="post" oninput='inputPassRep.setCustomValidity(inputPass.value != inputPassRep.value ? "Las contraseñas no coinciden." : "")'>
        <img src="img/euro-logo.png" />
		<br/>
		<h2 class="form-signin-heading">Crea un grupo</h2>
        <br/>
		<label for="inputNombre" class="sr-only">Nombre del grupo</label>
		<br/>
        <input type="text" id="inputNombre" name="inputNombre" class="form-control" placeholder="Nombre del grupo" required>
        <br/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Crear</button>
		<p>Al crear un nuevo grupo obtendrás un enlace único para invitar a participar a quien tú quieras. </p>
		<p>Si quieres unirte a un grupo ya creado, utiliza el enlace que te enviará el creador</p>
	  </form>
		
    </div>
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
