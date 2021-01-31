<?php
session_start();
include ".includesdtm/librerias.php";
$librerias = new librerias;
if (isset($_SESSION['finanza'])&&$_SESSION['finanza']==TRUE) {
    include __DIR__.'/.includesdtm/adminlibs.php';
    include __DIR__.'/.includesdtm/digitallibs.php';
	?>
	<!DOCTYPE html>
	<html>
  		<head>
    		<?php
                $librerias->gtm_head();
            ?>
            <meta charset="utf-8">
            <title>Digital MTX| Confirmar Pago</title>
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
  		</head>
  		<body style="overflow-x: hidden;">
            <?php
                $librerias->gtm_body();
                $librerias->nav();
            ?>
    		<div class="row">
                <?php
                    $confirm=new commerce();
                    $numeroventa=$_POST['numeroventadtmmtx'];
                    $confirm->confirmpago($numeroventa);
                ?>      
            </div>
			<?php
                    $librerias->footer();
                ?>
                <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
                <script src="https://www.google.com/recaptcha/api.js"></script>
                <script src="js/v3/index.js"></script>
                <script src="js/v3/facebook.js"></script>
                <?php
                    $librerias->btn_wa();
                    $librerias->btn_te_llamamos();
                    $librerias->btn_carrito();
                    $librerias->cliengo();
                    $librerias->hotjar();
                ?>
  		</body>
	</html>
	<?php
} else {
    ?>
  	<script>
    	location.href="index.php";
  	</script>
    <?php
}
?>



