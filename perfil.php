<?php
session_start();
include __DIR__."/.includesdtm/digitallibs.php";
include ".includesdtm/librerias.php";
$librerias = new librerias;
if($_SESSION['cliente']==TRUE || $_SESSION['empleado']==true || isset($_SESSION['access_token'])) {
	?>
	<!DOCTYPE html>
	<html>
        <head>
            <?php
                $librerias->gtm_head();
            ?>
            <meta charset="utf-8">
            <title>Digital MTX| Perfil</title>
            <meta name="description" content="mayoristas en ventas de productos IT">
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
                <div class="col s12 destacados-titulo-wrapper center">
                    <i class="material-icons small">record_voice_over</i>
                    <h4 class="destacados-titulo no-margin" style="display: inline-block;border-bottom: 0;padding-left: 20px;">Perfil</h4>
                </div>
            </div>
            <div class="row">
                <div class="col s12 destacados-titulo-wrapper">
                    <div class="destacados-titulo"></div>
                </div>
            </div>
            <?php
                if (isset($_SESSION['access_token'])) {
                    ?>
                        <div class="row">
                            <div class="col s12 destacados-wrapper">
                                Estas registrado con tu cuenta de Google
                            </div>
                        </div>
                    <?php
                }
            ?>
            <div class="row no-margin">
                <div class="col s12 destacados-wrapper">
                    <div class="col s12 m4">
                        <div class="col s3 grey darken-3 white-text" style="border: 1px solid #424242;padding-bottom: 10px;padding-top: 10px;">
                            Nombre
                        </div> 
                        <div class="col s8" style="border: 1px solid #999;border-left: 10px solid #999;border-right: 10px solid #999;margin-left: 10px;padding-bottom: 10px;padding-top: 10px;">
                            <?php echo $_SESSION["nombre"]; ?>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="col s3 grey darken-3 white-text" style="border: 1px solid #424242;padding-bottom: 10px;padding-top: 10px;">
                            Correo
                        </div> 
                        <div class="col s8" style="border: 1px solid #999;border-left: 10px solid #999;border-right: 10px solid #999;margin-left: 10px;padding-bottom: 10px;padding-top: 10px;">
                            <?php echo $_SESSION["usuario"]; ?>
                        </div>
                    </div>
                    <?php
                        if (!isset($_SESSION['access_token'])) {
                            ?>
                                <div class="col s12 m4">
                                    <div class="col s3 grey darken-3 white-text" style="border: 1px solid #424242;padding-bottom: 10px;padding-top: 10px;">
                                        Fecha de nacimiento
                                    </div> 
                                    <div class="col s8" style="border: 1px solid #999;border-left: 10px solid #999;border-right: 10px solid #999;margin-left: 10px;padding-bottom: 10px;padding-top: 10px;">
                                        <?php echo $_SESSION["edad"]; ?>
                                    </div>
                                </div>
                                <div class="col s12 m4">
                                    <div class="col s3 grey darken-3 white-text" style="border: 1px solid #424242;padding-bottom: 10px;padding-top: 10px;">
                                        Edad
                                    </div> 
                                    <div class="col s8" style="border: 1px solid #999;border-left: 10px solid #999;border-right: 10px solid #999;margin-left: 10px;padding-bottom: 10px;padding-top: 10px;">
                                        <?php
                                            $fechaNacimiento = $_SESSION["edad"];
                              
                                            if (count(explode("-", $fechaNacimiento)) != 3) { 
                                                $nacimiento = "0000-00-00";
                                            } else {
                                                $nacimiento = $fechaNacimiento;
                                            }

                                            $fnacimiento = explode("-", $nacimiento);
                                            $nYear = intval($fnacimiento[0]);
                                            $nMes  = intval($fnacimiento[1]);
                                            $nDia  = intval($fnacimiento[2]);
                              
                                            $Year  = intval(date('Y'));
                                            $Mes   = intval(date('m'));
                                            $Dia   = intval(date('d'));
                              
                                            $rMes  = 0;
                                            $rYear = 0;
                              
                                            if ($Dia > $nDia) {
                                                $rMes = 1;
                                            }
                              
                                            if ($Mes > $nMes) {
                                                $rYear = 1;
                                            } elseif ($Mes == $nMes) {
                                                if ($rMes == 1) {
                                                    $rYear = 1;
                                                }
                                            }
                              
                                            if ($Dia == $nDia and $Mes == $nMes) {
                                                $rYear = 1;
                                            }
                              
                                            $edad = $Year - $nYear + $rYear - 1;
                              
                                            print($edad." años");
                                        ?> 
                                    </div>
                                </div>
                                <div class="col s12 m4">
                                    <div class="col s3 grey darken-3 white-text" style="border: 1px solid #424242;padding-bottom: 10px;padding-top: 10px;">
                                        Identificación
                                    </div> 
                                    <div class="col s8" style="border: 1px solid #999;border-left: 10px solid #999;border-right: 10px solid #999;margin-left: 10px;padding-bottom: 10px;padding-top: 10px;">
                                        <?php echo $_SESSION["identificacion"]; ?>
                                    </div>
                                </div>
                                <div class="col s12 m4">
                                    <div class="col s3 grey darken-3 white-text" style="border: 1px solid #424242;padding-bottom: 10px;padding-top: 10px;">
                                        Dirección
                                    </div> 
                                    <div class="col s8" style="border: 1px solid #999;border-left: 10px solid #999;border-right: 10px solid #999;margin-left: 10px;padding-bottom: 10px;padding-top: 10px;">
                                        <?php echo $_SESSION["pais"]." - ".$_SESSION["ciudad"]." - ".$_SESSION["direccion"]; ?>
                                    </div>
                                </div>
                                <div class="col s12 m4">
                                    <div class="col s3 grey darken-3 white-text" style="border: 1px solid #424242;padding-bottom: 10px;padding-top: 10px;">
                                        Teléfono
                                    </div> 
                                    <div class="col s8" style="border: 1px solid #999;border-left: 10px solid #999;border-right: 10px solid #999;margin-left: 10px;padding-bottom: 10px;padding-top: 10px;">
                                        <?php echo $_SESSION["telefono"]; ?>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                    <div class="col s12 m4">
                        <div class="col s3 grey darken-3 white-text" style="border: 1px solid #424242;padding-bottom: 10px;padding-top: 10px;">
                            Género
                        </div> 
                        <div class="col s8" style="border: 1px solid #999;border-left: 10px solid #999;border-right: 10px solid #999;margin-left: 10px;padding-bottom: 10px;padding-top: 10px;">
                            <?php echo $_SESSION["genero"]; ?>
                        </div>
                    </div>
                    <?php
                        if (!isset($_SESSION['access_token'])) {
                            ?>
                                <div class="col s12">
                                    <div class="destacados-titulo" style="margin-top: 20px;"></div>
                                    <div class="col s12 center">
                                        <p>
                                            <form action="edicionperfil.php" method="post">
                                                <input type="hidden" name="correo" value="<?php echo $_SESSION['usuario']; ?>">
                                                <button class="btn btn-media-accion waves-effect waves-light" name="edicionperfil" type="submit"><i class="material-icons right">keyboard_arrow_right</i>Editar</button>
                                            </form>
                                        </p>
                                    </div>
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
  		</body>
	</html>
	<?php
} else {
    header("location:login.php");
}
?>
