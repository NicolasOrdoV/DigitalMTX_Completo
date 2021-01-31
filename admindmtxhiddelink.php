<?php
@\session_start();
include ".includesdtm/librerias.php";
$librerias = new librerias;
if((isset($_SESSION['empleado'])&&$_SESSION['empleado']==TRUE)||(isset($_SESSION['cliente'])&&$_SESSION['cliente']==TRUE)) {
    ?>
      	<script>
            location.href="index.php";
      	</script>
    <?php
} elseif(isset($_SESSION['admin']) && $_SESSION['admin'] == TRUE) {
    ?>
        <script>
            location.href = "paneladm.php";
        </script>
    <?php
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
            <meta name="description" content="Nuestra labor esta encaminada a ofrecer productos de la mejor calidad con el mejor precio manejando tiempos de entrega rápido, facilidades de pago">
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
                        <form action='' method='post'>
                            <div class="input-field col s6 offset-s3">
                                <i class="material-icons prefix">email</i>
                                <?php
                                    if (isset($correo)) {
                                        ?>
                                            <input id="id" name="correo" required type="text" class="validate" value="<?php echo $correo; ?>">
                                        <?php
                                    } else {
                                        ?>
                                            <input id="id" name="correo" required type="text" class="validate">
                                        <?php
                                    }
                                ?>
                                <label for="id">Usuario<span class="asterisco">*</span></label>
                            </div>
                            <div class="input-field col s6 offset-s3">
                                <i class="material-icons prefix">lock</i>
                                <input id="pw" name="clave" required type="password" class="validate">
                                <label for="pw">Contraseña<span class="asterisco">*</span></label>
                                <a href="recuperarpw.php" class="helper-text waves-effect waves-dark right-align"><u>¿Olvidaste tu clave?</u></a>
                            </div>
                            <div class="col s12 center">
                                <button class="btn col s6 offset-s3 btn-entrar waves-effect waves-light" name="login" type="submit"><i class="material-icons right">exit_to_app</i>Entrar</button>
                            </div>
                        </form>
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
                if (isset($_POST['login'])) {
                    include __DIR__.'/.includesdtm/adminlibs.php';
                    $usr = $_POST['correo'];
                    $pw = sha1($_POST['clave']);
                    $login = new admin();
                    $login->login($usr, $pw);
                    unset($_POST);
                } 
            ?>
		</body>
	</html>
	<?php
    if(isset($_POST['go'])) {
      	include __DIR__.'/.includesdtm/adminlibs.php';
      	$usr=$_POST['id'];
      	$pw=sha1($_POST['pw']);
      	//$pw=$_POST['pw'];
      	$sesion=new admin();
      	$sesion->login($usr,$pw);
    }
}
?>