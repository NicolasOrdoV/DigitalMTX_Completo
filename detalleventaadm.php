<?php
session_start();
include ".includesdtm/librerias.php";
$librerias = new librerias;
if (isset($_SESSION['admin'])&&$_SESSION["admin"]==TRUE || $_SESSION['finanza'] == 1) {
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
        <title>Digital MTX| Tienda virtual de productos IT a precio mayorista, servicios digitales</title>
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
  		</head>
  		<body style="overflow-x: hidden;">
            <?php
                $librerias->gtm_body();
                $librerias->nav();
            ?>
            <div class="row">
                <div class="col s12 destacados-titulo-wrapper">
                    <a class="btn btn-media-accion waves-effect waves-light" href="administracion_de_ventas.php"><i class="material-icons left">keyboard_arrow_left</i>Volver a la administración de ventas</a>
                </div>
            </div>
            <div class="row">
                <div class="col s12 destacados-titulo-wrapper center">
                    <i class="material-icons small">assignment</i>
                    <h4 class="destacados-titulo">Detalle de venta</h4>
                </div>
            </div>
            <div class="row">
                <div class="col s12 destacados-wrapper">
                    <?php
                        $ventaendetalle=new commerce();
                        $ventanum=$_GET['numeroventadtmmtx'];
                        $ventaendetalle->verventa($ventanum);
                    ?>
                </div>
            </div>
    		<?php
                $librerias->footer();
            ?>
            <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            <script src="https://www.google.com/recaptcha/api.js"></script>
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
} else {
    ?>
  	<script type="text/javascript">
        //location.href="index.php";
  	</script>
    <?php
}
?>


