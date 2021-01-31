<?php
@\session_start();
include ".includesdtm/librerias.php";
$librerias = new librerias;
if (isset($_SESSION['admin'])&&$_SESSION['admin']==TRUE) {
	include __DIR__.'/.includesdtm/adminlibs.php';
	include __DIR__."/.includesdtm/digitallibs.php";
	?>
	<!DOCTYPE html>
	<html>
      <head>
        <?php
          $librerias->gtm_head();
        ?>
        <meta charset="utf-8">
        <title>Digital MTX| Nuestra labor esta encaminada a ofrecer productos de la mejor calidad con el mejor precio manejando tiempos de entrega rapido, facilidades de pago</title>
        <meta name="description" content="Nuestra labor esta encaminada a ofrecer productos de la mejor calidad con el mejor precio manejando tiempos de entrega rapido, facilidades de pago">
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
			<div class="row">
                <div class="col s12 destacados-titulo-wrapper">
                    <a class="btn btn-media-accion waves-effect waves-light" href="paneladm.php"><i class="material-icons left">keyboard_arrow_left</i>Volver al panel de administración</a>
                </div>
            </div>
            <div class="row">
                <div class="col s12 destacados-titulo-wrapper center">
                    <i class="material-icons small">edit</i>
                    <h4 class="destacados-titulo">Editar empleado</h4>
                </div>
            </div>
    		<?php
        		$correo=$_GET['correoemp'];
        		$perfilempl=new admin();
        		$perfilempl->perempleado($correo);
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
}else{
	?>
	<script type="text/javascript">
		location.href="index.php";
	</script>
	<?php
}
?>