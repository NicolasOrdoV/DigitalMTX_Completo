<?php
session_start();
include ".includesdtm/librerias.php";
$librerias = new librerias;

include __DIR__.'/.includesdtm/adminlibs.php';
include __DIR__.'/.includesdtm/digitallibs.php';//(isset($_SESSION['empleado'])&&$_SESSION['empleado']==TRUE)

?>	<!DOCTYPE html>
	<html>
        <head>
            <?php
                $librerias->gtm_head();
            ?>
            <meta charset="utf-8">
            <title>Digital MTX| Tienda virtual de productos IT a precio mayorista, servicios digitales</title>
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
            ?>
<body>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Digital MTX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="Assets/img/logo-rojo.png">
</head>

<body>
    <main class="container-fluid">
	    <section class="row mt-3">
	        <div class="card w-100 m-auto">
	            <div class="card-header bg-danger container-fluid">
	                <h2 class="m-auto">
	                	<a href="?controller=login" class="btn btn-danger"><<</a>Consultar garantia
	                </h2>
	            </div>
	            <div class="card-body w-100">
	            	<form action="?controller=client&method=show" method="POST">
	            		<div class="form-group">
		                    <label> Nombre</label>
		                    <input type="text" name="bill" class="form-control" placeholder="Ingrese el consecutivo asignado de garantia(G-...)" required>
		                    <div class="invalid-feedback">Por favor no dejar campos vacios.</div>
		                    <div class="valid-feedback">Campo validado correctamente.</div>
		                </div>
		                <div class="form-group">
		                    <button type="submit" id="submit" class="btn btn-danger">Buscar</button>
		                </div>
	            	</form>
	            </div>
	        </div>
	        <?php
	         	if(isset($data)){ 
	        		if(!empty($data)){?>
				        <div class="card w-100 m-auto">
				        	<div class="card-body w-100">
				            	<h2><b>Producto</b></h2>
				            	<br>
				            	<?php foreach($data as $show){?>
				                    <div class="row clearfix">
				                    	<div class="col-sm-12">
				                            <h3>Numero garantía</h3>
				                            <h3><?php echo $show->No_garantia?></h3>
				                        </div>
				                        <div class="col-sm-3">
				                            <h5>Codigo del producto</h5>
				                            <p><?php echo $show->Codigo_Producto?></p>
				                        </div>
				                        <div class="col-sm-3">
				                            <h5>Descripcion producto</h5>
				                            <p><?php echo $show->Descripcion_Producto?></p>
				                        </div>
				                        <div class="col-sm-3">
				                            <h5>Serial</h5>
				                            <p><?php echo $show->Sello_Producto?></p>
				                        </div>
				                        <div class="col-sm-3">
				                            <h5>Cantidad</h5>
				                            <p><?php echo $show->Cantidad_Producto?></p>
				                        </div>
				                    </div>
				                    <div class="row clearfix">
				                        <div class="col-sm-3">
				                            <h5>Flete</h5>
				                            <p><?php echo $show->Flete?></p>
				                        </div>
				                        <div class="col-sm-3">
				                            <h5>Ciudad</h5>
				                            <p><?php echo $show->Departamento?></p>
				                        </div>
				                        <div class="col-sm-3">
				                            <h5>Municipio</h5>
				                            <p><?php echo $show->Municipio?></p>
				                        </div>
				                        <div class="col-sm-3">
				                            <h5>Valor del producto</h5>
				                            <p><?php echo $show->Valor_Flete?></p>
				                        </div>
				                    </div>
				                    <div class="row clearfix">
				                    	<div class="col-sm-12">
				                            <h1>ESTADO: <?php echo $show->Estado?></h1>
				                        </div>
				                    </div>
				                    <hr>
			                    <?php } ?>
			                    <div class="row clearfix">
			                    	<div class="col-sm-12">
			                            <h3 class="text-center">Fecha expedición: <?php echo $data[0]->Fecha_ingreso?></h3>
			                        </div>
			                    </div>
				            </div>
				        </div>
	        <?php
	            }else{ ?>
	        	<div class="alert alert-danger">
	        		<p>No se encontro ningun registro con ese consecutivo</p>
	        	</div>
	        <?php } 
	    	}?>	
	    </section>
	</main>
    <script src="Assets/js/jquery-2.2.4.min.js"></script>
    <script src="Assets/js/popper.min.js"></script>
    <script src="Assets/js/bootstrap.min.js"></script>
</body>
</html>




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
    		<script>
      			setInterval(function() {
        			$('#ventas').load(location.href+' #ventas>*','');
      			}, 10000); 
    		</script>
  		</body>
	</html>
	<?php
?>