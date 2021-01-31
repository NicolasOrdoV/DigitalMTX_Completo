<?php
  session_start();
  require_once "recaptchalib.php";
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
        <title>Digital MTX| Contacto -- Contáctanos</title>
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
        <link rel="stylesheet" href="css/v3/contact.css">
        <link rel="stylesheet" href="lib/vidgal/css/vidgal.css">

        <?php
            //$librerias->librerias_css_head(8);
        ?> 
    </head>
  	<body style="overflow-x: hidden;">
        <?php
            $librerias->gtm_body();
            $librerias->nav();
		?>
        <div class="row no-margin">
            <div class="col s12 destacados-titulo-wrapper">
                <h4 class="contacto-titulo center">Contactenos</h4>
            </div>
        </div>
        <div class="row no-margin">
            <div class="col s12">
                <p class="center">
                    Si desea contactarnos o comprar algún producto por favor comuníquese a través del siguiente formulario, así podremos procesar sus pedidos y aclarar sus dudas.
                </p>
            </div>
        </div>
        <div class="row no-margin">
            <div class="col s12 contacto-wrapper">
                <div class="row no-margin">
                    <div class="col s12 m6">
                        <form role="form" method="POST" action="contacto.php">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="nombre" name="nombre" type="text" class="validate" required>
                                <label for="nombre">Nombre completo</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">phone</i>
                                <input id="telefono" name="telefono" type="text" class="validate" required>
                                <label for="telefono">Teléfono</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input id="email" name="email" type="email" class="validate" required>
                                <label for="email">Correo electrónico</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">subject</i>
                                <select name="asunto">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Compra de producto">Compra de Producto</option>
                                    <option value="Asunto general">Asunto General</option>
                                    <option value="PQRS">PQRS</option>
                                </select>
                                <label>Asunto</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">speaker_notes</i>
                                <textarea id="mensaje" name="mensaje" class="materialize-textarea" minlength="15" required></textarea>
                                <label for="mensaje">Mensaje</label>
                            </div>
                            <div class="row">
                                <div class="col s12 captcha-wrapper">
                                    <div class="g-recaptcha" data-sitekey="6Lcyry4UAAAAAF0evGdXbSr5yR5y4khwyfAn7G-_"></div>
                                    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>"></script>
                                </div>
                            </div>
                            <div class="col s12">
                                <button type="submit" class="btn col s12 btn-enviar-contacto waves-effect waves-light">Enviar<i class="material-icons right">send</i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col s12 m6">
                        <iframe id="mapa-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1988.3004472061896!2d-74.0608145734192!3d4.665030414284302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9a58cefddec7%3A0x69e9c883ec2a9356!2sDigital+MTX!5e0!3m2!1ses!2sco!4v1502827274453" width="100%" height="375" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="row no-margin">
                    <div class="col s12">
                        <div class="col s12 m6 l4 item-contacto-wrapper">
                            <div class="col s12 item-contacto">
                                <div class="row">
                                    <div class="col s12 center no-padding">
                                        <i class="material-icons small">location_city</i>
                                    </div>
                                    <div class="col s12 center no-padding">
                                        <b>Oficina principal</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <i class="material-icons left">print</i> 552 2190 Ext 299-300
                                    </div>
                                    <div class="col s12">
                                        <i class="material-icons left">phone_iphone</i> (316) 831-1535 - (313) 208-0688
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 item-contacto-wrapper">
                            <div class="col s12 item-contacto">
                                <div class="row">
                                    <div class="col s12 center no-padding">
                                        <i class="material-icons small">location_city</i>
                                    </div>
                                    <div class="col s12 center no-padding">
                                        <b>Oficina Bogotá - Unilago</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <i class="material-icons left">print</i> 552 2190 Ext 237-238
                                    </div>
                                    <div class="col s12">
                                        <i class="material-icons left">phone_iphone</i> (318) 271-0939
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 item-contacto-wrapper">
                            <div class="col s12 item-contacto">
                                <div class="row">
                                    <div class="col s12 center no-padding">
                                        <i class="material-icons small">location_city</i>
                                    </div>
                                    <div class="col s12 center no-padding">
                                        <b>Oficina Bogotá - Alta Tecnología</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <i class="material-icons left">print</i> 552 2190 Ext 181
                                    </div>
                                    <div class="col s12">
                                        <i class="material-icons left">phone_iphone</i> (350) 283-2516
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 item-contacto-wrapper">
                            <div class="col s12 item-contacto">
                                <div class="row">
                                    <div class="col s12 center no-padding">
                                        <i class="material-icons small">location_city</i>
                                    </div>
                                    <div class="col s12 center no-padding">
                                        <b>Oficina Bogotá - Isotecnologico</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <i class="material-icons left">print</i> 552 2190 Ext 105
                                    </div>
                                    <div class="col s12">
                                        <i class="material-icons left">phone_iphone</i> (316) 878-2531
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 item-contacto-wrapper">
                            <div class="col s12 item-contacto">
                                <div class="row">
                                    <div class="col s12 center no-padding">
                                        <i class="material-icons small">location_city</i>
                                    </div>
                                    <div class="col s12 center no-padding">
                                        <b>Oficina Medellín</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <i class="material-icons left">print</i> 552 2190 Ext 311
                                    </div>
                                    <div class="col s12">
                                        <i class="material-icons left">phone_iphone</i> (350) 283-2517
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 item-contacto-wrapper">
                            <div class="col s12 item-contacto">
                                <div class="row">
                                    <div class="col s12 center no-padding">
                                        <i class="material-icons small">location_city</i>
                                    </div>
                                    <div class="col s12 center no-padding">
                                        <b>Compras</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 center">
                                        <button class="btn-small btn-contacto-correo waves-effect waves-light"><i class="material-icons left">email</i>Por Correo</button>
                                        <button class="btn-small btn-contacto-whatsapp waves-effect waves-light"><i class="socicon-whatsapp left"></i>Por Whatsapp</button>
                                    </div>
                                </div>
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