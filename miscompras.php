<?php 
@\session_start();
include __DIR__.'/.includesdtm/digitallibs.php';
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
        <title>Digital MTX| Mis compras</title>
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
        <link rel="stylesheet" href="css/v3/mis_compras.css">
    </head>
  	<body style="overflow-x: hidden;">
        <?php
            $librerias->gtm_body();
            $librerias->nav();
            if (isset($_GET['id']) && $_GET['id']!="") {
                $order_id = $_GET['id'];
                $url = "https://production.wompi.co/v1/transactions/".$order_id;
                //$url = "https://sandbox.wompi.co/v1/transactions/".$order_id;

                $client = curl_init($url);
                curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
                $response = curl_exec($client);
                $result = json_decode($response);

                if (isset($result->error)) {
                    /*?>
                        <b>Ha ocurrido un error al consultar la transacción realizada.</b>
                    <?php*/
                } else {
                    //Se debe insertar en la base de datos esta referencia $_GET['id'] en la compra que coincida con el correo obtenido
                    $ventausr = new digitalibs();
                    $ventausr->wompi_recieved($result->data->id);
                    //print_r($result->data->status);
                }
            }
        ?>
        <div class="row no-margin">
            <div class="col s12 destacados-titulo-wrapper center">
                <i class="material-icons small">record_voice_over</i>
                <h4 class="destacados-titulo" style="display: inline-block;border: 0;padding-left: 20px;">Mis compras</h4>
            </div>
        </div>
        <div class="row no-margin">
            <div class="col s12 destacados-titulo-wrapper center">
                <div class="destacados-titulo"></div>
            </div>
        </div>
        <div class="row no-margin">
            <div class="col s12 destacados-wrapper">
                <?php
                    if (isset($_SESSION['usuario'])) {
                        $ventausr=new digitalibs();
                        $ventausr->ventausr($_SESSION['usuario']);
                    } else {
                        ?>
                            <div class="alert alert-danger" role="alert" style="text-align: center;">
                                <?php
                                    if (isset($_GET['correo'])) {
                                        ?>
                                            <p>
                                                Para realizar el seguimiento detallado de su compra debe <a class="btn btn-primary" href="registro.php?correo=<?php echo urlencode($_GET['correo']); ?>">Registrarse</a> o 
                                                <a class="btn btn-primary" href="login.php?correo=<?php echo urlencode($_GET['correo']); ?>">Iniciar sesión</a> con el correo: "<?php echo $_GET['correo']; ?>"</b>
                                        <?php
                                    } else {
                                        ?>
                                            <p>
                                                Para realizar el seguimiento detallado de su compra debe <a class="btn btn-primary" href="registro.php">Registrarse</a> o 
                                                <a class="btn btn-primary" href="login.php">Iniciar sesión</a></b>
                                        <?php
                                    }
                                ?>
                                </p>
                            </div>
                        <?php
                    }
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
        <script>
            /*$('.estrella_1').hover(function() {
                $(this).addClass('amber-text text-darken-4');
            });
            $('.estrella_2').hover(function() {
                $('.estrella_1').addClass('amber-text text-darken-4');
                $(this).addClass('amber-text text-darken-4');
            });
            $('.estrella_3').hover(function() {
                $('.estrella_1').addClass('amber-text text-darken-4');
                $('.estrella_2').addClass('amber-text text-darken-4');
                $(this).addClass('amber-text text-darken-4');
            });
            $('.estrella_4').hover(function() {
                $('.estrella_1').addClass('amber-text text-darken-4');
                $('.estrella_2').addClass('amber-text text-darken-4');
                $('.estrella_3').addClass('amber-text text-darken-4');
                $(this).addClass('amber-text text-darken-4');
            });
            $('.estrella_5').hover(function() {
                $('.estrella_1').addClass('amber-text text-darken-4');
                $('.estrella_2').addClass('amber-text text-darken-4');
                $('.estrella_3').addClass('amber-text text-darken-4');
                $('.estrella_4').addClass('amber-text text-darken-4');
                $(this).addClass('amber-text text-darken-4');
            });*/
            $('.estrella').click(function() {
                if ($(this).hasClass('estrella_1')) {
                    $('.estrella_1').addClass('amber-text text-darken-4');
                    $('.estrella_2').removeClass('amber-text text-darken-4');
                    $('.estrella_3').removeClass('amber-text text-darken-4');
                    $('.estrella_4').removeClass('amber-text text-darken-4');
                    $('.estrella_5').removeClass('amber-text text-darken-4');
                } else if($(this).hasClass('estrella_2')) {
                    $('.estrella_1').addClass('amber-text text-darken-4');
                    $('.estrella_2').addClass('amber-text text-darken-4');
                    $('.estrella_3').removeClass('amber-text text-darken-4');
                    $('.estrella_4').removeClass('amber-text text-darken-4');
                    $('.estrella_5').removeClass('amber-text text-darken-4');
                } else if($(this).hasClass('estrella_3')) {
                    $('.estrella_1').addClass('amber-text text-darken-4');
                    $('.estrella_2').addClass('amber-text text-darken-4');
                    $('.estrella_3').addClass('amber-text text-darken-4');
                    $('.estrella_4').removeClass('amber-text text-darken-4');
                    $('.estrella_5').removeClass('amber-text text-darken-4');
                } else if($(this).hasClass('estrella_4')) {
                    $('.estrella_1').addClass('amber-text text-darken-4');
                    $('.estrella_2').addClass('amber-text text-darken-4');
                    $('.estrella_3').addClass('amber-text text-darken-4');
                    $('.estrella_4').addClass('amber-text text-darken-4');
                    $('.estrella_5').removeClass('amber-text text-darken-4');
                } else if($(this).hasClass('estrella_5')) {
                    $('.estrella_1').addClass('amber-text text-darken-4');
                    $('.estrella_2').addClass('amber-text text-darken-4');
                    $('.estrella_3').addClass('amber-text text-darken-4');
                    $('.estrella_4').addClass('amber-text text-darken-4');
                    $('.estrella_5').addClass('amber-text text-darken-4');
                }
                $(this).parent().parent().find('.campo_estrellas').val($(this).attr('data-estrella'));
            });
            $('.enviar-calificacion').click(function() {
                var estrellas = $(this).parent().parent().find('.campo_estrellas');
                var titulo_calificacion = $(this).parent().parent().find('.titulo_calificacion');
                var descripcion = $(this).parent().parent().find('.materialize-textarea');
                var codigo_producto = $(this).attr('data-codigo-producto');
                var codigo_compra = $(this).attr('data-codigo-compra');
                if (estrellas.val() == '') {
                    M.toast({html: 'Necesitas seleccionar una cantidad de estrellas'});
                } else if(titulo_calificacion.val() == '' || titulo_calificacion.hasClass('invalid')) {
                    M.toast({html: 'Necesitas escribir un titulo valido'});
                    titulo_calificacion.focus();
                } else if(descripcion.hasClass('invalid')) {
                    M.toast({html: 'La descripción no puede tener mas caracteres de los permitidos (255)'});
                    descripcion.focus();
                } else {
                    if (descripcion.val() == '') {
                        var datos = {
                            accion : 'crear_calificacion',
                            estrellas : estrellas.val(),
                            titulo_calificacion : titulo_calificacion.val(),
                            codigo_producto : codigo_producto,
                            codigo_compra : codigo_compra,
                        };
                    } else {
                        var datos = {
                            accion : 'crear_calificacion',
                            estrellas : estrellas.val(),
                            titulo_calificacion : titulo_calificacion.val(),
                            descripcion : descripcion.val(),
                            codigo_producto : codigo_producto,
                            codigo_compra : codigo_compra,
                        };
                    }
                    $.ajax({
                        url: "calificaciones.php",
                        async: true,
                        type: 'POST',
                        data: datos,
                        success: function(result) {
                            if (result == 1) {
                                M.toast({html: 'Producto calificado correctamente'});
                            } else {
                                M.toast({html: 'No se ha podido calificar este producto'});
                                //console.log(result);
                            }
                        }
                    });
                }
            });
        </script>
  	</body>
</html>
