<?php
  $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if ($url == 'http://digitalmtx.com/' || $url == 'https://digitalmtx.com/' || $url == 'http://www.digitalmtx.com/') {
    header('Location: https://www.digitalmtx.com');
  }
  @\session_start();
  include ".includesdtm/digitallibs.php";
  include ".includesdtm/librerias.php";
  $librerias = new librerias;
  // $eee=new digitalibs();
  // $eee->usuarios_sin_activar();
/* End composer */
?>
<!DOCTYPE html>
<html>
  	<head>
      <?php
        $librerias->gtm_head();
      ?>
      <meta charset="utf-8">
    	<title>Digital MTX| Inicio</title>
    	<meta name="description" content="Tienda Online de productos IT informatica, catalogo digital, Ventas iniciar sesión o registrar usuario, Mayoristas, Importadores Empresa Colombiana Digital MTX">
      <meta name="keywords" content="Computadores, portátiles, pantallas, baterias, teclados, apple, hp, ishop, repuestos, cargadores, servicio tecnico, soporte tecnico, usb, tecnologia, garantia, pc">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <meta name="author" content="Reinaldo Pastran, Edwin Velasquez Jimenez(lion_3214@hotmail.com), Diego Rodríguez Veloza(@rodvel2910)">

      <link rel="icon" type="image/icon" href="logo2.png">

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
      ?>

    	<?php
      	if (isset($_POST['nover'])) {
        	$_SESSION['nover']=TRUE;
      	}
        
  		if(!isset($_SESSION['nover'])) {
    		$_SESSION['nover'] = FALSE;
  		}

  		if ($_SESSION['nover']!=TRUE && 1 == 2) {
    		?>
      		<input type="checkbox" id="cerrar">
      		<label for="cerrar" id="btn-cerrar">x</label>
      		<div class="modali">
        		<div class="contenidomodal">
          			<a href="https://www.digitalmtx.com/registro.php" target="_blank"><img src="img/pub.png" alt="Beneficios de registrarse"></a>
          			<br>
          			<center>
            			<form method="post" action="">
              				<input type="submit" name="nover" value="No deseo ver mas esta publicidad" class="btn btn-default btn-lg">
            			</form>
          			</center>
        		</div>
      		</div>
    		<?php
  		}

  		$librerias->nav();
    	?>
        
    	<div style="width: 100%;height: 75px;"></div>
      		<div class="row row-banner">
        			<div class="col s12 no-padding">
            			<div class="caja_banner">

              				<?php 
                			if (is_file('img/1.mp4')) {
                  				?>
                  				<div>
                    				<video autoplay muted>
                      					<source src="img/1.mp4?hora=<?php echo time(); ?>" type="video/mp4">
                      					Su navegador no admite la reproducción de este video.
                    				</video>
                  				</div>
                  				<?php 
                			}elseif(is_file('img/1.png')){
                  				?>
                  				<div><img src="img/1.png?hora=<?php echo time(); ?>" alt="Primera imagen del carrusel"></div>
                  				<?php 
                			}

                			if (is_file('img/2.mp4')) {
                  				?>
                  				<div>
                    				<video autoplay muted>
                      					<source src="img/2.mp4?hora=<?php echo time(); ?>" type="video/mp4">
                      					Su navegador no admite la reproducción de este video.
                    				</video>
                  				</div>
                  				<?php 
                			}elseif(is_file('img/2.png')){
                  				?>
                  				<div><img src="img/2.png?hora=<?php echo time(); ?>" alt="Segunda imagen del carrusel"></div>
                  				<?php 
                			}

                			if (is_file('img/3.mp4')) {
                  				?>
                  				<div>
                    				<video autoplay muted>
    				                  	<source src="img/3.mp4?hora=<?php echo time(); ?>" type="video/mp4">
    				                  	Su navegador no admite la reproducción de este video.
                    				</video>
                  				</div>
                  				<?php 
                			}elseif(is_file('img/3.png')){
                  				?>
                  				<div><img src="img/3.png?hora=<?php echo time(); ?>" alt="Tercera imagen del carrusel"></div>
                  				<?php 
                			}

                			if (is_file('img/4.mp4')) {
                  				?>
                  				<div>
                    				<video autoplay muted>
                      					<source src="img/4.mp4?hora=<?php echo time(); ?>" type="video/mp4">
                      					Su navegador no admite la reproducción de este video.
                    				</video>
                  				</div>
                  				<?php 
            				  }elseif(is_file('img/4.png')){
                  				?>
                  				<div><img src="img/4.png?hora=<?php echo time(); ?>" alt="Cuarta imagen del carrusel"></div>
                  				<?php 
            				  }
              				?>
              
            			</div>
        			</div>
  			</div>
    		<hr class="divider">
            <div class="row no-margin">
                <div class="col s12 destacados-titulo-wrapper">
                    <h5 class="destacados-titulo"><i class="material-icons left small red-text text-darken-3">star_border</i><b>Productos Destacados</b><a href="tienda.php" class="btn-small waves-effect waves-light right btn-orange"><i class="material-icons left">important_devices</i>Ver todos</a></h5>
                </div>
            </div>
            <div class="row no-margin">
                <div class="col s12 destacados-wrapper">
                    <?php
                        $mostrar = new digitalibs();
                        $mostrar->mostrar_destacados();
                    ?>
                </div>
            </div>
            <hr class="divider">
            <div class="row">
                <div class="col s12 como-comprar-titulo-wrapper">
                    <h5 class="como-comprar-titulo">¿Como comprar en nuestro portal?</h5>
                </div>
            </div>
            <div class="row no-margin">
                <div class="col s12 como-comprar-wrapper">
                    <div class="col s12 m6 l4 tarjeta-como-comprar-wrapper">
                        <div class="col s12 tarjeta-como-comprar">
                            <div class="row">
                                <div class="col s12">
                                    <i class="material-icons right">looks_one</i>
                                    <h6><b>Añade productos al carrito de compras</b></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <p class="center">
                                        <i class="material-icons small">important_devices</i>
                                        <i class="material-icons small">arrow_right_alt</i>
                                        <i class="material-icons small">shopping_cart</i>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <p>
                                        Podrás visualizar el stock y el color de cada producto y elegir la cantidad que necesites. No necesitas una cuenta para comprar.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l4 tarjeta-como-comprar-wrapper">
                        <div class="col s12 tarjeta-como-comprar">
                            <div class="row">
                                <div class="col s12">
                                    <i class="material-icons right">looks_two</i>
                                    <h6><b>Realiza el pago</b></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <p class="center">
                                        <i class="material-icons small">payment</i>
                                        <i class="material-icons small">arrow_right_alt</i>
                                        <i class="material-icons small">receipt</i>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <p>
                                        Sabemos la importancia de tu tiempo, por eso contamos con diferentes métodos de pago para tu comodidad como: <br><img src="img/pse/logo_pse_small.png" style="height: 30px;">, <img src="img/wompi.png" style="height: 20px;">, <b>Transferencia bancaria</b>, y <b>Contraentrega (en las ciudades principales)</b>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 l4 tarjeta-como-comprar-wrapper">
                        <div class="col s12 tarjeta-como-comprar">
                            <div class="row">
                                <div class="col s12">
                                    <i class="material-icons right">looks_3</i>
                                    <h6><b>Registrate en nuestro portal</b></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <p class="center">
                                        <i class="material-icons small">person</i>
                                        <i class="material-icons small">arrow_right_alt</i>
                                        <i class="material-icons small">check_circle</i>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <p>
                                        Para realizar el seguimiento de tus compras debes regístrate. Aún no tienes una cuenta? <a href="registro.php">Registrate aquí</a>
                                    </p>
                                </div>
                            </div>
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
        <script src="lib/vidgal/js/vidgal.js"></script>
        <script>
          vidgal({
                  sub_botones: true,
                  auto: true,
                  der_botones: true,
                  izq_botones: true,
                  sub_botones_background_color: '#000',
                  sub_botones_size: 3,
                  //efectos:true o un numero del 0 - 55 para escojer el efectos o no mostrar nada
              });
        </script>
        <script src="js/v3/index.js"></script>
    		<?php
              $librerias->btn_wa();
              $librerias->btn_te_llamamos();
              $librerias->btn_carrito();
              $librerias->cliengo();
              $librerias->hotjar();
              $librerias->facebookR();
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