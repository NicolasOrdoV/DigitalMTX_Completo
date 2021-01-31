<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
include '.includesdtm/adminlibs.php';
include ".includesdtm/librerias.php";
$librerias = new librerias;
$commerce = new commerce();
@\session_start();
?>
<!DOCTYPE html>
<html>
  <head>
      <?php
        $librerias->gtm_head();
        $id = str_replace('-', ' ', $_GET['id']);
        $id = str_replace("*","-", $id);
        $producto = $commerce->info_producto($id);
        $etiquetas = $commerce->producto_etiquetas($id);
      ?>
      <meta charset="utf-8">
      <title>Digital MTX| Productos de Digital MTX</title>
      <meta name="description" content="Nuestra labor esta encaminada a ofrecer productos de la mejor calidad con el mejor precio manejando tiempos de entrega rapido, facilidades de pago">
      <meta name="keywords" content="<?php echo $etiquetas; ?>">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <meta name="author" content="Reinaldo Pastran">
      <meta name="author" content="Edwin Velasquez Jimenez(lion_3214@hotmail.com), Diego Rodríguez Veloza(@rodvel2910)">

      <link rel="shortcut icon" type="image/x-icon" href="img/icon.png">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli&display=swap">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="css/v3/librerias/socicon/socicon.css">
      
      <link rel="stylesheet" href="css/v3/index.css">
      <link rel="stylesheet" href="css/v3/productos.css">
    </head>
  	<body style="overflow-x: hidden;">
      <?php
        $librerias->gtm_body();
            $librerias->nav();
            $path = "productos/".$producto[0]['id']."/";
            $directorio = dir($path);
            $archivo1 = scandir($path);
            //$primera_img = $path.$archivo1[2];
            $orden_imagenes = explode(',', $producto[0]['orden_img']);
            if (count($orden_imagenes) > 1) {
                for ($i=0; $i < 1; $i++) { 
                    if($orden_imagenes[$i]!="." && $orden_imagenes[$i]!="..") {
                        $primera_img = $path.$orden_imagenes[$i];
                    }
                }
            } else {
                for ($i=0; $i < count($archivo1); $i++) { 
                    if($archivo1[$i]!="." && $archivo1[$i]!="..") {
                        $primera_img = $path.$archivo1[$i];
                        break;
                    }
                }
            }
  		?>

        <div class="row">
            <div class="col s12 producto-wrapper">
                <div class="row">
                    <div class="col s12">
                        <div id="categoria_producto"></div>
                    </div>
                </div>
                <div class="col s12 xl5 img-producto-wrapper center">
                    <div class="col s12 no-padding">
                        <div class="img-principal-wrapper"></div>
                        <img src="<?php echo $primera_img; ?>" style="display: none;" title="<?php echo $producto[0]['nombre']; ?>" alt="<?php echo $producto[0]['nombre']; ?>" />
                        <iframe src="https://www.youtube.com/embed/<?php echo $producto[0]['video']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="video-iframe"></iframe>
                    </div>
                    <div class="col s12 no-padding img-mini-wrapper">
                        <?php
                            $contador_img = 0;
                            if (count($orden_imagenes) > 1) {
                                for ($i=0; $i < count($orden_imagenes); $i++) { 
                                    if($orden_imagenes[$i]!="." && $orden_imagenes[$i]!="..") {
                                        ?>
                                            <img src="<?php echo $path.$orden_imagenes[$i]; ?>" alt="<?php echo $producto[0]['nombre']; ?>" class="img-mini-<?php echo $contador_img; ?> tooltipped" data-position="bottom" data-tooltip="Clic para agrandar" /> 
                                        <?php
                                    }
                                    $contador_img++;
                                }
                            } else {
                                for ($i=0; $i < count($archivo1); $i++) { 
                                    if($archivo1[$i]!="." && $archivo1[$i]!="..") {
                                        ?>
                                            <img src="<?php echo $path.$archivo1[$i]; ?>" alt="<?php echo $producto[0]['nombre']; ?>" class="img-mini-<?php echo $contador_img; ?> tooltipped" data-position="bottom" data-tooltip="Clic para agrandar" /> 
                                        <?php
                                    }
                                    $contador_img++;
                                }
                            }
                            if ($producto[0]['video'] != null && $producto[0]['video'] != '') {
                                ?>
                                    <a href="#!" style="background: url('<?php echo 'https://img.youtube.com/vi/'.$producto[0]['video'].'/0.jpg'; ?>');background-size: 100% 100%;background-repeat: no-repeat;background-position: center center;" class="mini-video-wrapper modal-trigger tooltipped" data-position="bottom" data-tooltip="Clic para ver el producto en video">
                                        <i class="material-icons">play_circle_filled</i>
                                    </a>
                                    <!--<div id="modal_video" class="modal modal-fixed-footer">
                                        <div class="modal-content">
                                            <div class="row">
                                                <div class="col s12 titulo-modal-te-llamamos">
                                                    <h4>Video</h4>
                                                </div>
                                                <div class="col s12 texto-modal-te-llamamos">
                                                    <iframe src="https://www.youtube.com/embed/<?php echo $producto[0]['video']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="video-iframe"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
                                        </div>
                                    </div>-->
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="col s12 xl7 info-producto-wrapper no-padding">
                    <?php
                        $commerce->vproductos($id);
                    ?>
                </div>
            </div>
        </div>

        <hr class="divider">
        <div class="row">
            <div class="col s12 destacados-titulo-wrapper">
                <h5 class="destacados-titulo">Otros usuarios también han comprado</h5>
            </div>
        </div>
        <div class="row">
            <div class="col s12 destacados-wrapper">
                <div class="col s12 no-padding ultimas-compras-wrapper">
                    <?php
                        $commerce->ultimas_compras();
                    ?>
                </div>
            </div>
      </div>

  		<hr class="divider">

      <div class="row">
          <div class="col s12 destacados-titulo-wrapper">
              <h5 class="destacados-titulo">Productos destacados<a href="tienda.php" class="btn-small waves-effect waves-light right btn-orange"><i class="material-icons left">important_devices</i>Ver todos</a></h5>
          </div>
      </div>
      <div class="row">
          <div class="col s12 destacados-wrapper">
              <?php
                  $mostrar = new digitalibs();
                  $mostrar->mostrar_destacados();
              ?>
          </div>
      </div>

      <hr class="divider">

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
      <script>
        acortar_nombre_producto();
      </script>
      <script>
        setInterval(function() {
          var datos = {
            ultimo_id : $('.ultimo_panel').attr('id'),
          };
          $.ajax({
            url: "compras_recientes.php",
            async: true,
            type: 'POST',
            data: datos,
            success: function(result) {
              if (result != 0) {
                $('.ultimas-compras-wrapper').html(result);
                $('.carousel.carousel-slider').carousel({
                    fullWidth: true,
                    indicators: true
                }); //Crucial el hecho de reinicializar el carousel
                acortar_nombre_producto_recientes();
              }
            }
          });
        }, 5000);
      </script>
        <script>
            var main_img_start = '<?php echo $primera_img; ?>';
            console.log(main_img_start);
            $('.img-principal-wrapper').css({
                'background': 'url('+ main_img_start +')',
                'background-size': '100% 100%',
                'background-position': 'center center',
            });
            const el = document.querySelector(".img-principal-wrapper");

            el.addEventListener('mouseover', () => {
                el.style.transition = "all .5s";
                $(".img-principal-wrapper").css('background-position', '');
            });

            el.addEventListener("mousemove", (e) => {
              el.style.backgroundPositionX = -e.offsetX + "px";
              el.style.backgroundPositionY = -e.offsetY + "px";
              el.style.backgroundSize = "200%";
              
              setTimeout(function() {
                el.style.transition = "none";
              }, 500);
            });
            el.addEventListener("mouseout", (e) => {
              el.style.backgroundPositionX = "0px";
              el.style.backgroundPositionY = "0px";
              el.style.backgroundSize = "100%";
              el.style.transition = "all .5s";
              $(".img-principal-wrapper").css('background-position', 'center center');
              $(".img-principal-wrapper").css('background-size', '100% 100%');
            });
            $('.img-mini-wrapper img').click(function() {
                $('.img-principal-wrapper').css({
                    'background': 'url('+ $(this).attr('src') +')',
                    'background-size': '100% 100%',
                    'background-position': 'center center',
                });
            });
            $('.collapsible-header').click(function() {
                var texto = $(this).find('.titulo-collapsible').html();
                if(texto == 'Ver etiquetas') {
                    texto = 'Ocultar etiquetas';
                    $(this).find('.titulo-collapsible').html(texto);
                } else if(texto == 'Ocultar etiquetas') {
                    texto = 'Ver etiquetas';
                    $(this).find('.titulo-collapsible').html(texto);
                } else if(texto == 'Ver compatibilidad') {
                    texto = 'Ocultar compatibilidad';
                    $(this).find('.titulo-collapsible').html(texto);
                } else if(texto == 'Ocultar compatibilidad') {
                    texto = 'Ver compatibilidad';
                    $(this).find('.titulo-collapsible').html(texto);
                }
            });
            $('.numero-calificacion').html($('#resultado_calificaciones').val());
            $('.img-mini-wrapper img').click(function() {
                $('.img-principal-wrapper').show();
                $('#video-iframe').hide();
                var src = $('#video-iframe').attr('src');
                $('#video-iframe').attr('src', src);
            });
            $('.mini-video-wrapper').click(function() {
                $('.img-principal-wrapper').hide();
                $('#video-iframe').show();
            });
            $('.imagen-color').click(function() {
              $('#color').val($(this).attr('data-color'));
              $('#codigo-input').val($(this).attr('data-codigo'));
              $('#stock-input').val($(this).attr('data-stock'));
              var precio = $(this).attr('data-precio');
              precio = precio.replace('.', '');
              $('#precio-input').val(precio);
              $('#precio-span').html('<b>Precio:</b> ' + '<b class="precio-nuevo">' + $(this).attr('data-precio') + '$(COP)</b>');
              $('#codigo-span').html($(this).attr('data-codigo'));
              $('#stock-span').html($(this).attr('data-stock'));
              M.Toast.dismissAll();
              //M.toast({html: 'Se ha actualizado la información del producto según el color escogido'});
            });
        </script>
        <?php
          if (isset($_GET['add'])) {
            ?>
              <script>
                M.toast({html: 'Agrega la cantidad que quieras'});
              </script>
            <?php
          }
        ?>
  	</body>
</html>