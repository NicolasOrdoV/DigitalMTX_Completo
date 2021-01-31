<?php
	@\session_start();
	include ".includesdtm/librerias.php";
	$librerias = new librerias;
	include __DIR__."/.includesdtm/digitallibs.php"; 
	/* Start composer */
		//include('composer/config.php');
	/* End composer*/

	if((isset($_SESSION['cliente'])&&$_SESSION['cliente']==true) || (isset($_SESSION['empleado'])&&$_SESSION['empleado']==true)) {
		?>
	  	<script>
	    	location.href="index.php";
	  	</script>
		<?php
	} elseif(isset($_POST['login_google'])) {
		@\session_start();
        $_SESSION['cliente']=TRUE;
        if (isset($_SESSION['carrito'])) {
            $_SESSION['carrito']=$_SESSION['carrito'];
        }
        $_SESSION['id'] = $_POST['id_google'];
        $_SESSION['nombre1'] = $_POST['nombre_google'];
        $_SESSION['usuario'] = $_POST['email_google'];
        $_SESSION['cliente_google'] = 1;
	} else {
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<?php
					$librerias->gtm_head();
				?>
				<meta charset="utf-8">
				<title>Digital MTX| Inicio</title>
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

				<meta name="google-signin-client_id" content="524526093645-vfg207cqlrmd368cov1h5vl0oq3718jk.apps.googleusercontent.com"> <!-- Es necesario para el login con Google -->
				<style>
					#my-signin2 {
						display: inline-block;
						height: 36px;
						width: 100%;
					}
					.abcRioButton.abcRioButtonLightBlue, .abcRioButton.abcRioButtonBlue {
						background: transparent;
						box-shadow: none;
						width: 100% !important;
					}
				</style>
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
								<input id="correo" name="correo" required type="email" class="validate" value="<?php echo $correo; ?>">
								<label for="correo">Correo electrónico<span class="asterisco">*</span></label>
							</div>
							<div class="input-field col s6 offset-s3">
								<i class="material-icons prefix">lock</i>
								<input id="clave" name="clave" required type="password" class="validate">
								<label for="clave">Contraseña<span class="asterisco">*</span></label>
								<a href="recuperarpw.php" class="helper-text waves-effect waves-dark right-align"><u>¿Olvidaste tu clave?</u></a>
							</div>
							<div class="row">
								<div class="col s12 center">
									<button class="btn col s6 offset-s3 btn-entrar waves-effect waves-light" name="login" type="submit"><i class="material-icons right">exit_to_app</i>Entrar</button>
								</div>
							</div>
						</form>
						<div class="col s12 center">
							<a href="javascript:void(0);" onclick="fbLogin();" id="fbLink" class="btn col s6 m3 offset-s3 offset-m3 btn-facebook waves-effect waves-light"><i class="socicon-facebook right"></i>Entrar con</a>
							<div class="btn col s6 m3 offset-s3 btn-google waves-effect waves-light"><div id="my-signin2" class="g-signin2"></div></div>
						</div>
					</div>
				</div>
				<div class="row no-margin">
					<div class="container">
						<div class="col s12 center">
							<a href="registro.php" class="btn col s6 offset-s3 btn-registrarse waves-effect waves-light"><i class="material-icons right">touch_app</i><span class="hide-on-small-only">¿No tienes cuenta? Haz clic aquí</span><span class="show-on-small hide-on-med-and-up">Registrarte</span></a>
						</div>
					</div>
				</div>
				<div class="row no-margin">
					<div class="col s12">
						<!-- Display login status -->
						<div id="status" style="display: none;"></div>

						<!-- Facebook login or logout button -->
						<a href="javascript:void(0);" onclick="fbLogin();" style="display: none;" id="fbLink"><img src="https://academia.softdepot.mx/wp-content/uploads/2016/04/FBloginbutton.png" style="height: 100px;" /></a>

						<!-- Display user's profile info -->
						<div class="ac-data" id="userData" style="display: none;"></div>
					</div>
				</div>
		    	<?php
					$librerias->footer();
		        ?>
		        <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
		        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		        <script src="https://www.google.com/recaptcha/api.js"></script>
		        <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
		        <script src="js/v3/index.js"></script>
		        <script src="js/v3/facebook.js"></script>
		        <script>
		        	/* Start login con Google */
			        	function onSignIn(googleUser) {
							var profile = googleUser.getBasicProfile();
							/*console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
							console.log('Name: ' + profile.getName());
							console.log('Image URL: ' + profile.getImageUrl());
							console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.*/
							var datos = {
				                accion: 'login_google',
				                login_google: 1,
				                id_google: profile.getId(),
				                nombre_google: profile.getName(),
				                email_google: profile.getEmail(),
				            };
				            $.ajax({
				                url: "login.php",
				                async: true,
				                type: 'POST',
				                data: datos,
				                success: function(result) {
				                    console.log(result);
				                    M.toast({html: 'Redirigiendo'});
				                }
				            });
				            $('#id_google').val(profile.getId());
							$('#nombre_google').val(profile.getName());
							$('#email_google').val(profile.getEmail());
							alert('Se ha iniciado sesión con su cuenta de Google');
							window.location.href = 'index.php';
						}
						function renderButton() {
							gapi.signin2.render('my-signin2', {
								'scope': 'profile email',
								'longtitle': false,
								'theme': 'dark',
								'onsuccess': onSignIn,
							});
						}
					/* End login con Google */
		        </script>
	    		<?php
					$librerias->btn_wa();
					$librerias->btn_te_llamamos();
					$librerias->btn_carrito();
					$librerias->cliengo();
					$librerias->hotjar();
					/* Start login normal */
						if (isset($_POST['login'])) {
							    $correo = $_POST['correo'];
							    $pw = sha1($_POST['clave']);
							    $login = new digitalibs();
							    $login->login($correo, $pw);
							    unset($_POST);
						} 
					/* End login normal */
	    		?>
		  	</body>
		</html>
		<?php 
	}
?>