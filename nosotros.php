<?php
  session_start();
  include __DIR__."/.includesdtm/digitallibs.php";
  include ".includesdtm/librerias.php";
  $librerias = new librerias;
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            $librerias->gtm_head();
        ?>
        <meta charset="utf-8">
        <title>Digital MTX| Nosotros</title>
        <meta name="description" content="mayoristas en ventas de productos IT, Tienda On line tecnologia y los mejores precios">
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
        <link rel="stylesheet" href="css/v3/nosotros.css">
        <link rel="stylesheet" href="lib/vidgal/css/vidgal.css">
    </head>
  	<body style="overflow-x: hidden;">
        <?php
            $librerias->gtm_body();
            $librerias->nav();
        ?>
        <div class="row no-margin">
            <div class="col s12 destacados-titulo-wrapper center">
                <i class="material-icons small">record_voice_over</i>
                <h4 class="destacados-titulo">¿Quienes somos?</h4>
            </div>
        </div>
        <?php
            $info_nosotros = new digitalibs();
            $info_nosotros->info_nosotros();
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
            $librerias->hotjar();
        ?>
  	</body>
</html>