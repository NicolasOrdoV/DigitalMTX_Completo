<?php
@\session_start();
include __DIR__.'/.includesdtm/digitallibs.php';
include ".includesdtm/librerias.php";
$librerias = new librerias;
//if (isset($_SESSION['cliente'])&&$_SESSION['cliente']==TRUE || 1 == 1) {

  if (!isset($_SESSION['cliente'])) {
    session_destroy();
  }
	
	if (isset($_POST['elimventa'])) {
		$cancelarcompra=new digitalibs();
		$num=$_POST['numeroventa'];
		$cancelarcompra->cancelarcompra($num);
	}
	?>
	<!DOCTYPE html>
	<html>
        <head>
            <?php
                $librerias->gtm_head();
            ?>
            <meta charset="utf-8">
            <title>Digital MTX| Compra realizada</title>
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
            <div class="row no-margin">
                <div class="col s12 destacados-titulo-wrapper center">
                    <i class="material-icons small">check_circle</i>
                    <h4 class="destacados-titulo" style="border-bottom: 0;">Compra realizada exitósamente</h4>
                    <h6 style="margin-top: -20px;"><b style="color: #8EC904;">¡Gracias por comprar con nosotros!</b></h6>
                </div>
            </div>
            <div class="row no-margin">
                <div class="col s12 destacados-wrapper">
                        <?php
                            if (isset($_GET['id'])) {
                                  if ($_GET['metodo'] == 'Transferencia') {
                                    ?>
                                        <div class="col s12 center">
                                            <h6><b>Transfierenos o consigna a nuestra cuenta Bancolombia:</b></h6>
                                            <div class="col s12 hide-on-large-only" style="margin-top: 30px;">
                                                <div class="col s12 m6 center">
                                                    <img src="img/pago/bancolombia.png" style="max-height: 150px;height: auto;margin-top: -25px;max-width: 100%">
                                                    <br>
                                                    <b>Cuenta de ahorros:</b> <br>2 0 9 3 5 8 2 5 8 1 7
                                                </div>
                                                <div class="col s12 m6 center">
                                                    <img src="img/qr.png" style="width: 200px;" draggable="false">
                                                </div>
                                            </div>
                                            <table class="striped highlight responsive-table hide-on-med-and-down">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 50%;">
                                                            <div class="right" style="height: 150px;text-align: center;width: 368px;">
                                                                <img src="img/pago/bancolombia.png" style="height: 150px;margin-top: -25px;max-width: 100%">
                                                                <br>
                                                                <b>Cuenta de ahorros:</b> <br>2 0 9 3 5 8 2 5 8 1 7
                                                            </div>
                                                        </td>
                                                        <td><img src="img/qr.png" style="width: 200px;" draggable="false"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col s12 center">
                                            <p>
                                                Luego de transferir o consignar es obligatorio que ingreses a <b>Mis Compras</b> en el menu de usuario y notifiques el pago ingresando la <b>referencia de pago</b> con la cual ubicaremos tu pago y procederemos a completar tu compra.
                                            </p>
                                        </div>
                                        <div class="col s12 center">
                                            <h6>Tu compra posee un lapso valido de 15 dias para ser confirmada por la empresa de lo contrario se cancelará</h6>
                                        </div>
                                    <?php
                                  }
                                  if (!isset($_SESSION['usuario'])) {
                                    ?>
                                        <div class="col s12 center">
                                            <p>
                                                Para realizar el seguimiento detallado de tu compra debes <a href="registro.php?correo=<?php echo urlencode($_GET['correo']); ?>" class="btn btn-media-accion waves-effect waves-light"><i class="material-icons right">keyboard_arrow_right</i>Registrarte</a> o <a href="login.php?correo=<?php echo urlencode($_GET['correo']); ?>" class="btn btn-confirmar-accion waves-effect waves-light"><i class="material-icons right">keyboard_arrow_right</i>Iniciar sesión</a> con el correo: "<b><?php echo $_GET['correo']; ?></b>"
                                            </p>
                                        </div>
                                    <?php
                                  }
                                  ?>
                                  <?php
                                        $num=$_GET['id'];
                                        $compra=new digitalibs();
                                        $compra->compracliente($num);
                            } else {
                            ?>
                                <div class="col s12 center">
                                    <a href="miscompras.php" class="btn btn-confirmar-accion waves-effect waves-light"><i class="material-icons right">keyboard_arrow_right</i>Ver mis compras</a>
                                </div>
                            <?php
                            }

                      if ($_GET['metodo']=='Contraentrega') {
                        ?>
                            <div class="col s12 center" style="margin-bottom: -40px;">
                                <h6><b>El proceso de envio es realizado con la transportadora Envia</b></h6>
                                <p>
                                    <img src="img/pago/envia.png" style="max-width: 100%;">
                                </p>
                            </div>
                        <?php
                      }

                      if ($_GET['metodo'] == 'Pago online Wompi') {
                        $id=$_GET['id'];
                        $wompi=new digitalibs();
                        $wompi->wompi($id);
                      }

                      /*if ($_GET['metodo'] == 'Pago online PAYU') {
                        $id=$_GET['id'];
                        $payu=new digitalibs();
                        $payu->payu($id);
                      }*/
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

      		<script type='text/javascript'>
    			function confirmation() {
      			   if(!confirm('¿Esta seguro de realizar esta acción?')) return false;    
    			}
      		</script>
            <script>
                $("#wompi_form").submit();
                //$("#form_payu").submit();
            </script>
		</body>
	</html>
	<?php
/*} else {
	?>
	<script type="text/javascript">
		location.href="carrito.php";
	</script>
	<?php
}*/
?>