
<?php
session_start();
include ".includesdtm/librerias.php";
$librerias = new librerias;
if ((isset($_SESSION['admin'])&&$_SESSION['admin']==TRUE)||(isset($_SESSION['productos'])&&$_SESSION['productos']==TRUE)) {
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
                <div class="col s12 destacados-titulo-wrapper center">
                    <i class="material-icons small">edit</i>
                    <h4 class="destacados-titulo">Editar producto</h4>
                </div>
            </div>
            <div class="row">
                <div class="col s12 destacados-wrapper">
                    <?php
                        if (isset($_GET['codigo'])) {
                            $codigo=$_GET['codigo'];
                            $articulo=new commerce();
                            $articulo->eproducto($codigo);
                        } else {
                            ?>
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <form action="" method="get" class="form-horizontal">
                                    <input type="text" name="codigo" placeholder="Buscar codigo" required class="form-control btn-md">
                                    <br>
                                    <center><input type="submit" class="btn btn-primary btn-sm" value="Buscar codigo"></center>
                                </form>
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
                var imagenes_agregadas = '';
                var numero_imagenes_agregadas = 0;
                var numero_imagenes_totales = $('#numero_imagenes_totales').val();
                $('.btn-agregar-imagen').click(function() {
                    imagenes_agregadas += $(this).attr('data-imagen') + ',';
                    $(this).attr('disabled', true);
                    $('#orden_imagenes').val(imagenes_agregadas);
                    numero_imagenes_agregadas++;
                    if (numero_imagenes_agregadas == numero_imagenes_totales) {
                        $('.btn-confirmar-order-imagenes').attr('disabled', false);
                    }
                });
            </script>
            <script>
                $('#buscar_productos').keyup(function() {
                    var buscar = $(this).val().toLowerCase();
                    $('.tr_productos').each(function() {
                        var encontro = $(this).html().toLowerCase();
                        var encontro_b = encontro;
                        encontro = encontro.replace('á', 'a');
                        encontro = encontro.replace('é', 'e');
                        encontro = encontro.replace('í', 'i');
                        encontro = encontro.replace('ó', 'o');
                        encontro = encontro.replace('ú', 'u');
                        encontro = encontro.indexOf(buscar);
                        if (encontro != -1) {
                            $(this).show();
                        } else {
                            encontro_b = encontro_b.indexOf(buscar);
                            if (encontro_b != -1) {
                                $(this).show();
                            } else {
                                $(this).hide();
                            }
                        }
                    });
                });
                var array_asociados = [];
                var asociados_previos = $('#productos_asociados').val();
                asociados_previos = asociados_previos.split(',');
                for (var i = 0; i < asociados_previos.length; i++) {
                    if (asociados_previos[i] != '') {
                        array_asociados.push(asociados_previos[i]);
                    }
                }
                $('.btn-asociar-productos').click(function() {
                    var id = $(this).attr('data-id');
                    var repetido = 0;
                    var array_asociados_b = [];
                    for (var i = 0; i < array_asociados.length; i++) {
                        if (array_asociados[i] == id) {
                            repetido = 1;
                        }
                    }
                    if (repetido == 0) {
                        array_asociados.push(id);
                        $(this).html('<i class="material-icons">cancel</i>');
                        $(this).removeClass('btn-media-accion');
                        $(this).addClass('btn-confirmar-accion');
                    } else {
                        for (var i = 0; i < array_asociados.length; i++) {
                            if (array_asociados[i] == id) {
                                delete array_asociados[i];
                            }
                        }
                        $(this).html('Asociar');
                        $(this).addClass('btn-media-accion');
                        $(this).removeClass('btn-confirmar-accion');
                    }
                    for (var i = 0; i < array_asociados.length; i++) {
                        if (array_asociados[i] != null) {
                            array_asociados_b.push(array_asociados[i]);
                        }
                    }
                    if (array_asociados_b.length > 0) {
                        $('.btn-productos-asociados').removeClass('disabled');
                    } else {
                        $('.btn-productos-asociados').addClass('disabled');
                    }
                    $('#productos_asociados').val(array_asociados_b.join());
                });
                $('.ver_calificaciones').click(function() {
                    var datos = {
                        accion : 'ver_calificacion',
                        codigo: $(this).attr('data-codigo-producto'),
                    };
                    $.ajax({
                        url: "calificaciones.php",
                        async: true,
                        type: 'POST',
                        data: datos,
                        success: function(result) {
                            $('#modal_calificaciones').find('.texto-modal-te-llamamos').html(result);
                            $('.btn_visible').click(function() {
                                var btn_visible = $(this);
                                var datos = {
                                    accion : 'modificar_visible',
                                    id : $(this).attr('data-id'),
                                    visible: $(this).attr('data-visible'),
                                };
                                $.ajax({
                                    url: "calificaciones.php",
                                    async: true,
                                    type: 'POST',
                                    data: datos,
                                    success: function(result) {
                                        if (result == 1) {
                                            if (datos.visible == 1) {
                                                btn_visible.attr('data-visible', 0);
                                                btn_visible.attr('data-id', datos.id);
                                                btn_visible.removeClass('red');
                                                btn_visible.addClass('green');
                                                btn_visible.html('<i class="material-icons white-text">check_circle</i>');
                                            } else {
                                                btn_visible.attr('data-visible', 1);
                                                btn_visible.attr('data-id', datos.id);
                                                btn_visible.removeClass('green');
                                                btn_visible.addClass('red');
                                                btn_visible.html('<i class="material-icons white-text">cancel</i>');
                                            }
                                            M.toast({html: 'Se ha modificado la visibilidad de esta calificación con éxito'});
                                        } else {
                                            M.toast({html: 'No se ha podido modificar la visibilidad de esta calificación'});
                                        }
                                    }
                                });
                            });
                        }
                    });
                });
            </script>
		</body>
	</html>
	<?php
}else{
  	?>
  	<script>
      	location.href="index.php";
  	</script>
  	<?php
}
?>