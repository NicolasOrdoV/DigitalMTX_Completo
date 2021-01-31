<?php
session_start();
include ".includesdtm/librerias.php";
$librerias = new librerias;
include __DIR__.'/.includesdtm/digitallibs.php';
if(isset($_SESSION['cliente'])) {
    if($_SESSION['cliente']==TRUE || isset($_SESSION['access_token'])) {
      	?>
      	<!DOCTYPE html>
      	<html>
            <head>
                <?php
                    $librerias->gtm_head();
                ?>
                <meta charset="utf-8">
                <title>Digital MTX| Cambiar contraseña</title>
                <meta name="description" content="Mayoristas en ventas de productos IT">
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
                <link rel="stylesheet" href="css/v3/registro.css">
            </head>
        	<body style="overflow-x: hidden;">
                <?php
                    $librerias->gtm_body();
                    $librerias->nav();
                ?>
                <div class="row no-margin">
                    <div class="col s12 destacados-titulo-wrapper center">
                        <i class="material-icons small">record_voice_over</i>
                        <h4 class="destacados-titulo">Cambiar contraseña</h4>
                    </div>
                </div>
                <div class="row no-margin">
                    <div class="container">
                        <div class="col s12 destacados-wrapper">
                            <div class="col s12">
                                <form class="form-horizontal" action="" method="post">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">mode_edit</i>
                                        <input id="pwact" name="pwact" type="password" class="validate" required>
                                        <label for="pwact">Contraseña actual</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">mode_edit</i>
                                        <input id="contrasena" name="pwnew1" type="password" class="validate" required>
                                        <label for="contrasena">Contraseña nueva<span class="asterisco">*</span><span class="interrogacion tooltipped" data-position="bottom" data-tooltip="">?</span></label>
                                        <div class="progress">
                                          <div class="determinate"></div>
                                        </div>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">mode_edit</i>
                                        <input id="pwnew2" name="pwnew2" type="password" class="validate" required>
                                        <label for="pwnew2">Repite tu contraseña nueva</label>
                                    </div>
                                    <div class="col s12 center">
                                        <button class="btn btn-media-accion waves-effect waves-light btn-registrarse disabled" name="cambio" type="submit"><i class="material-icons right">keyboard_arrow_right</i>Cambiar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
          		<?php
                    $librerias->footer();
                ?>
                <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
                <script src="https://www.google.com/recaptcha/api.js"></script>
                <script src="js/v3/index.js"></script>
                <script>
                  validar_nivel_contrasena();
                  $('.interrogacion').hover(function() {
                      $(this).attr('data-tooltip', '<p class="left-align">Para hacer la contraseña mas segura, puede incluir: <br> - 8 caracteres <br> - 1 letra minuscula <br> - 1 letra mayúscula <br> - 1 número <br> - 1 caracter de los siguientes: |!"#$%&/()=?¡¿°@´*-+¨-</p>')
                  });
                </script>
                <?php
                    $librerias->btn_wa();
                    $librerias->btn_te_llamamos();
                    $librerias->btn_carrito();
                    $librerias->cliengo();
                ?>
        	</body>
      	</html>
      	<?php
          	if(isset($_POST['cambio'])) {
            	if($_POST['pwnew1']==$_POST['pwnew2']){
              		$old=sha1($_POST['pwact']);
              		$new=$_POST['pwnew1'];
              		$correo=$_SESSION['usuario'];
              		$changuepw=new digitalibs();
              		$changuepw->changuepw($correo,$old,$new);
        		} else {
              		?>
            		<script>
                  		alert("Las contraseñas nuevas deben ser iguales");
                	</script>
              		<?php
            	}
          	}

	} else {
        ?>
      	<script type="text/javascript">
            location.href="login.php";
      	</script>
        <?php
  	}
} else {
    ?>
  	<script type="text/javascript">
        location.href="login.php";
  	</script>
    <?php
}
?>