<?php
session_start();
include __DIR__.'/.includesdtm/adminlibs.php';
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
        <title>Digital MTX| Carrito</title>
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
    </head>
  	<body style="overflow-x: hidden;">
        <?php
            $librerias->gtm_body();
            $librerias->nav();
        ?>
        <div class="row">
            <div class="col s12 destacados-titulo-wrapper center" style="position: relative;">
                <i class="material-icons small">shopping_cart</i>
                <h4 class="destacados-titulo" style="border: 0;display: inline;">Carrito</h4>
                <a href='tienda.php' class="btn btn-media-accion waves-effect waves-light" style="position: absolute;right: 90px;" type="submit" name="addproducto"><i class="material-icons right">keyboard_arrow_right</i>Seguir comprando</a>
            </div>
        </div>
        <div class="row">
            <div class="col s12 destacados-wrapper">
                <?php
                    $vertienda = new digitalibs();
                    $vertienda->carrodisplay();
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
            $librerias->hotjar();
        ?>
    	<script type="text/javascript">
          $('#textarea_observaciones').keyup(function() {
            var caracteres = $('#textarea_observaciones').val().length;
            $('#restantes span').html(70-caracteres);
          });
          /*$('#textarea_observaciones_dolar').keyup(function() {
            var caracteres = $('#textarea_observaciones_dolar').val().length;
            $('#restantes_dolar span').html(70-caracteres);
          });*/
          $('[data-toggle="tooltip"]').tooltip();

          $('.cambiar_direccion').click(function() {
            $(this).parent().find('#direccion').attr('readonly', false);
            $(this).hide();
            $('.cambiar_direccion_btn').html('Cambiar dirección');
            $('.cambiar_direccion_btn').attr('type', 'submit');
            $('.cambiar_direccion_btn').show();
          });

        $('input').click(function() {
            if ($(this).attr('type') == 'radio') {
                if ($(this).attr('id') == 'contraentrega') {
                    $('#ciudades_principales_wrapper').show();
                    $('#ciudades_principales').attr('required', true);
                } else {
                    $('#ciudades_principales_wrapper').hide();
                    $('#ciudades_principales').attr('required', false);
                }
            }
        });

        $('#ciudades_principales').change(function() {
            var ciudad = $(this).val();
            $('#ciudad').val(ciudad);
            $('#ciudad').parent().find('label').addClass('active');
        });

          /*$('#contraentrega').change(function() {
           alert($(this).prop('checked'));
          });*/

    	</script>
  	</body>
</html>