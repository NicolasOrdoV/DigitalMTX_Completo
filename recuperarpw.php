<?php
session_start();
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
        <title>Digital MTX| Inicio</title>
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
        <link rel="stylesheet" href="css/v3/login.css">
        <link rel="stylesheet" href="lib/vidgal/css/vidgal.css">
    </head>
    <body style="overflow-x: hidden;">
        <?php
            $librerias->gtm_body();
            $librerias->nav();
        ?>
        <div class="row">
            <div class="container">
                <div class="col s12 center">
                    <h5>Recupera tu contraseña</h5>
                </div>
                <div class="col s12 center">
                  <p>
                    Deberás ingresar el correo asociado a la cuenta existente.
                  </p>
                  <p>
                    Te enviarémos una contraseña temporal que podrás cambiar en cualquier momento.
                  </p>
                </div>
                <form action="" method="post">
                    <div class="input-field col s6 offset-s3">
                        <i class="material-icons prefix">email</i>
                        <input id="correo" name="mail" required type="email" class="validate">
                        <label for="correo">Correo electrónico<span class="asterisco">*</span></label>
                    </div>
                    <div class="col s12 center">
                        <button class="btn col s6 offset-s3 btn-entrar waves-effect waves-light" name="recuperarpw" type="submit"><i class="material-icons right">vpn_key</i>Recuperar contraseña</button>
                    </div>
                </form>
            </div>
        </div>

      <div class="container" style="display: none;">
          <div class="row">
              <div class="col-sm-12">
                <a href="index.php"><img src="img/logo.png" class="img-responsive" style="margin: auto;"></a>
              </div>

              <div class="col-sm-3"></div>

              <div class="col-sm-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h1 class="text-center">Recuperacion de contraseña</h1>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="" method="post">
                            <label for="ejemplo_email_3" class="col-sm-4 pull-left" >Correo electronico</label>
                            <div class="col-sm-8">
                              <input type="mail" name="mail" class="form-control btn-lg" placeholder="Correo electronico" required>
                              <br>
                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                              <p align="justify">Se te sera enviada una contraseña temporal con la cual podras ingresar a nuestro portal y cambiarla</p>
                            </div>
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                              <input type="submit" name="recuperarpw" value="Recuperar contraseña" class="btn btn-danger btn-block">
                            </div>
                        </form>
                    </div>
                </div>
              </div>
              <div class="col-sm-3"></div>
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
<?php

if(isset($_POST['recuperarpw'])){
    $correo=$_POST['mail'];
    $recpw=new digitalibs();
    $recpw->recuperarpw($correo);
}

if($_SESSION['cliente']==TRUE){
    ?>
  <script>
  location.href="index.php"
  </script>
    <?php
}
?>


