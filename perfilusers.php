<?php
session_start();
include __DIR__."/.includesdtm/digitallibs.php";
include ".includesdtm/librerias.php";
$librerias = new librerias;
if($_SESSION['empleado']==TRUE && $_SESSION['perfiles']==TRUE || $_SESSION['admin']==TRUE) {
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
            <link rel="stylesheet" href="lib/vidgal/css/vidgal.css">
        </head>
  		<body style="overflow-x: hidden;">
  			<?php
                $librerias->gtm_body();
                $librerias->nav();
                include __DIR__.'/.includesdtm/adminlibs.php';
                $correo=$_GET['correo'];
                $perfilusr=new admin();
                $perfilusr->perfilesusr($correo);
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
            <script>
                for (var i = 0; i <= numero_destacados; i++) {

                    var titulo = $('.titulo_producto_'+i).html();
                    var caracteres = $('.titulo_producto_'+i).html().length;
                    var nueva = $('.titulo_producto_'+i).text();
                    var bol=0;

                    if(caracteres > 23) {
                        bol=1;
                        nueva="";
                        for (var j = 0; j < 24; j++) {
                            if(j == 21 || j == 22 || j == 23) {
                                nueva += ".";
                            } else {
                                nueva += titulo[j];
                            }
                        }
                    } else if (caracteres <= 15) {
                        $('.titulo_producto_'+i).append("<br><br>");
                    }

                    if (bol==1) {
                        $('.titulo_producto_'+i).html(nueva);
                    }
                }
            </script>
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