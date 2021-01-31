<?php
	session_start();
	include ".includesdtm/librerias.php";
	$librerias = new librerias;
	include __DIR__.'/.includesdtm/adminlibs.php';
	if(isset($_SESSION['cliente'])&&$_SESSION['cliente']==true) {
		?>
		  	<script>
		    	location.href="index.php";
		  	</script>
		<?php
	} elseif(isset($_SESSION['empleado']) && $_SESSION['empleado']==true) {
		?>
		  	<script>
		    	location.href = "paneladm.php";
		  	</script>
		<?php
	} elseif (isset($_POST["ingresar"])) {
		$correo = $_POST["usuario"];
		$clave = sha1($_POST["pw"]);
		$empleado = new admin();
		$empleado->empleadologin($correo,$clave);     
	} else {
		?>
			<!DOCTYPE html>
			<html>
				<head>
					<?php
						$librerias->gtm_head();
					?>
					<meta charset="utf-8">
					<title>Digital MTX| Iniciar sesión</title>
					<meta name="description" content="Tienda Online de productos IT informatica, catalogo digital, Ventas iniciar sesión o registrar usuario, Mayoristas, Importadores Empresa Colombiana Digital MTX">
					<meta name="keywords" content="Computadores, portatiles, pantallas, baterias, teclados, apple, hp, ishop, repuestos, cargadores, servicio tecnico, soporte tecnico, usb, tecnologia, garantia, pc">

					<meta name="viewport" content="width=device-width, initial-scale=1">

					<meta name="author" content="Reinaldo Pastran">
					<meta name="author" content="Edwin Velasquez Jimenez(lion_3214@hotmail.com), Diego Rodríguez Veloza(@rodvel2910)">

					<link rel="shortcut icon" type="image/x-icon" href="img/icon.png">

					<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
					<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli&display=swap">
					<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
					<link rel="stylesheet" href="css/v3/librerias/socicon/socicon.css">

					<link rel="stylesheet" href="css/v3/index.css">
					<link rel="stylesheet" href="css/v3/login.css">
					<link rel="stylesheet" href="lib/vidgal/css/vidgal.css">
				</head>
				<body style="overflow-x: hidden;">
					<?php
						$librerias->gtm_body();
						$librerias->nav();
					?>
					<div class="row">
						<div class="container">
							<div class="col s12 center">
								<h5>Iniciar sesión</h5>
							</div>
							<form action="" method="post">
								<div class="input-field col s6 offset-s3">
									<?php
										$correo = '';
										if (isset($_GET['correo'])) {
											$correo = $_GET['correo'];
										}
									?>
									<i class="material-icons prefix">email</i>
									<input id="correo" name="usuario" required type="email" class="validate" value="<?php echo $correo; ?>">
									<label for="correo">Correo electrónico<span class="asterisco">*</span></label>
								</div>
								<div class="input-field col s6 offset-s3">
									<i class="material-icons prefix">lock</i>
									<input id="clave" name="pw" required type="password" class="validate">
									<label for="clave">Contraseña<span class="asterisco">*</span></label>
									<a href="recuperarpw.php" class="helper-text waves-effect waves-dark right-align"><u>¿Olvidaste tu clave?</u></a>
								</div>
								<div class="col s12 center">
									<button class="btn col s6 offset-s3 btn-entrar waves-effect waves-light" name="ingresar" type="submit"><i class="material-icons right">exit_to_app</i>Entrar</button>
								</div>
							</form>
						</div>
					</div>
					<div class="container" style="display: none;">
						<div class="row">
							<div class="col-sm-4"></div>
							<div class="panel panel-primary col-sm-4">
								<div class="panel-body">
									<br>
									<p class="text-center lead">Empleado</p>
									<br>
									<form action='' method='post' class="form-horizontal">
									    <input type='mail' name='usuario' required placeholder='Usuario' class="form-control">
									    <br>
									    <input type='password' name='pw' required placeholder='Contraseña' class="form-control">
									    <br>
									    <input type='submit' value='Ingresar' name='ingresar' class="btn btn-default">
									</form>
								</div>
							</div>
							<div class="col-sm-4"></div>
						</div>
					</div>
					<?php
						$librerias->footer();
			        ?>
			        <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
			        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
			        <script src="https://www.google.com/recaptcha/api.js"></script>
			        <script src="lib/vidgal/js/vidgal.js"></script>
			        <script src="js/v3/index.js"></script>
		    		<?php
						$librerias->btn_wa();
						$librerias->btn_te_llamamos();
						$librerias->btn_carrito();
						$librerias->cliengo();
		    		?>
				</body>
			</html>
		<?php
	}
?>