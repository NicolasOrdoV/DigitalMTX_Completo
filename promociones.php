<?php
  session_start();
  include ".includesdtm/adminlibs.php";
  include "./Zebra_Pagination.php";
  include ".includesdtm/librerias.php";
  $librerias = new librerias;
  $pro = new commerce();
?>
<!DOCTYPE html>
<html>
  	<head>
      <?php
        $librerias->gtm_head();
      ?>
      <meta charset="utf-8">
    	<title>Digital MTX | Promociones</title>
    	<meta name="description" content="Tienda Online puedes ver todos nuestros productos informaticos a el mejor precio">
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
      <link rel="stylesheet" href="css/v3/tienda.css">
      <link rel="stylesheet" href="lib/vidgal/css/vidgal.css">
  	</head>
  	<body style="overflow-x: hidden;">

      <?php
        $librerias->gtm_body();
      ?>

    	<?php

        $librerias->nav();
        
    	?>
        <div class="row">
            <div class="row">
                <div class="row">
                    <div class="col s12 destacados-titulo-wrapper">
                        <h4 class="sucursales-titulo center">Promociones</h4>
                    </div>
                </div>
                <div class="col s12 filtros-wrapper">
                    <div class="col s12 valign-wrapper">
                        <form action="" method="GET" class="col s12">
                            <div class="col s12 m3 center">
                                <?php
                                    if (isset($_GET['filtrar']) || isset($_GET['categoria']) || !empty($_GET['like']) || !empty($_GET['tags'])) {
                                        ?>
                                            <b>Filtrado por:</b>
                                        <?php
                                    } else {
                                        ?>
                                            <b>Filtrar por:</b>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="col s12 m2">
                                <div class="input-field col s12" style="margin-top: -20px;">
                                    <select name="categoria">
                                        <option value="" disabled selected>Categoría</option>
                                        <?php 
                                            $filtro=new admin();
                                            $filtro->mcategorias();
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col s12 m2">
                                <div class="input-field col s12" style="margin-top: -20px;">
                                    <select name="marca">
                                        <option value="" disabled selected>Marca</option>
                                        <?php
                                            $filtro->vermarcas();
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col s12 m2">
                                <div class="input-field col s12" style="margin-top: -20px;">
                                    <select name="orderby">
                                        <option value="" disabled selected>Orden</option>
                                        <?php
                                            $opciones_orden = array(
                                                '4-Menor precio',
                                                '1-Mayor precio',
                                                '2-Mayor stock',
                                                '3-Menor stock'
                                            );
                                            for ($i=0; $i < count($opciones_orden); $i++) { 
                                                $datos = explode('-', $opciones_orden[$i]);
                                                if (isset($_GET['orderby']) && $_GET['orderby'] == $datos[0]) {
                                                    ?>
                                                        <option value="<?php echo $datos[0]; ?>" selected><?php echo $datos[1]; ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <option value="<?php echo $datos[0]; ?>"><?php echo $datos[1]; ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col s12 m3 center" style="margin-top: -11px;">
                                <?php
                                    if (isset($_GET['filtrar']) || isset($_GET['categoria']) || !empty($_GET['like']) || !empty($_GET['tags'])) {
                                        ?>
                                            <a href="promociones.php" class="btn btn-eliminar-filtro center waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Quitar filtros"><i class="material-icons">delete</i></a>
                                        <?php
                                    }
                                ?>
                                <button class="btn btn-filtrar waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Aplicar filtros" type="submit" name="filtrar"><i class="material-icons left">filter_list</i>Filtrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 productos-wrapper">
                    <?php
                        if(isset($_GET['filtrar']) || isset($_GET['categoria'])) {
         
                            $qryadd="SELECT * FROM dtm_productos WHERE `descuento` > 0";
                            if(!empty($_GET['categoria'])) {
                                $categoria=$_GET['categoria'];
                                $qryadd .=" WHERE categoria='$categoria'";
                            }
                 
                            if(!empty($_GET['categoria']) && !empty($_GET['marca'])) {
                                $marca=$_GET['marca'];
                                $qryadd .=" AND marca='$marca'";
                            } elseif(empty ($_GET['categoria']) && !empty ($_GET['marca'])) {
                                $marca=$_GET['marca'];
                                $qryadd .=" WHERE marca='$marca'";
                            }
                 
                            if(empty($_GET['categoria']) && empty($_GET['marca']) && !empty($_GET['descuento'])) {
                                if($_GET['descuento']==4) {
                                    $qryadd .=" WHERE descuento='0'";
                                } elseif($_GET['descuento']==1) {
                                    $qryadd .=" WHERE descuento>'0'";
                                }
                            }elseif ((!empty($_GET['categoria']) || !empty($_GET['marca']))&& !empty($_GET['descuento'])) {
                                if ($_GET['descuento']==4) {
                                    $qryadd .=" AND descuento='0'";
                                } elseif($_GET['descuento']==1) {
                                    $qryadd .=" AND descuento>'0'";
                                }
                            }

                            if (!empty($_GET['orderby'])) {
                                if ($_GET['orderby']==4) {
                                    $qryadd .=" order by precio asc";
                                }elseif($_GET['orderby']==1){
                                    $qryadd .=" order by precio desc";
                                }elseif($_GET['orderby']==2){
                                    $qryadd .=" order by stock desc";
                                }elseif($_GET['orderby']==3){
                                    $qryadd .=" order by stock asc";
                                }
                            }
                  
                            $pro->filtro($qryadd);

                        } else {
                            $pro->productos_promociones();
                        }
                    ?> 
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
	<script>
		setInterval(function() {
    		$('#stock').load(location.href+' #stock>*',function() {
				for (var i = 1; i <= numero_destacados; i++) {
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
    				} else if (caracteres <= 18) {
      					$('.titulo_producto_'+i).append("<br><br>");
    				}
    				if (bol==1) {
      					$('.titulo_producto_'+i).html(nueva);
    				}
				}
    		});
		}, 3000);
        $('.filtros-wrapper').find('.dropdown-content').css('z-index', '2');
	</script>
  	</body>
</html>