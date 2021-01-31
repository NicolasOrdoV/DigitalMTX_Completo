<?php
  session_start();
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
		<title>Digital MTX| Sucursales de trabajo Digital MTX Colombia</title>
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
		<link rel="stylesheet" href="css/v3/sucursales.css">
		<link rel="stylesheet" href="lib/vidgal/css/vidgal.css">

		<?php
      		//$librerias->librerias_css_head(26);
    	?>
  	</head>
  	<body style="overflow-x: hidden;">
  		<?php
			$librerias->gtm_body();
			$librerias->nav();
		?>
		<div class="row no-margin">
            <div class="col s12 destacados-titulo-wrapper">
                <h4 class="sucursales-titulo center">Nuestras Sucursales</h4>
            </div>
        </div>
        <div class="row no-margin">
        	<div class="row no-margin">
	            <div class="col s12 destacados-titulo-wrapper">
	                <h5 class="destacados-titulo"><i class="material-icons left small">location_city</i>Oficina Principal</h5>
	            </div>
	        </div>
	        <div class="row no-margin">
	        	<div class="col s12 sucursales-wrapper">
	        		<div class="col s12 no-padding">
	        			<div class="col s12">
	        				<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
		        				<i class="material-icons left small">location_on</i> Av. Calle 80 No. 69 – 70 Bodega 36
		        			</div>
		        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
		        				<i class="material-icons left small">print</i> 552 2190 Ext. 299 y 300
		        			</div>
		        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
		        				<i class="material-icons left small">phone</i> (1) 621-1317
		        			</div>
		        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
		        				<i class="material-icons left small">phone_iphone</i> (313) 208-0688
		        				<br>
		        				(316) 831-1535
		        			</div>
		        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
		        				<i class="material-icons left small">email</i> ventasnacionales@digitalmtx.com
		        				<br>
		        				ventasnacionales2@digitalmtx.com
		        			</div>
		        		</div>
	        		</div>
	        	</div>
	        </div>
        </div>
        <div class="row no-margin">
        	<div class="row no-margin">
	            <div class="col s12 destacados-titulo-wrapper">
	                <h5 class="destacados-titulo"><i class="material-icons left small">location_city</i>Oficinas Bogotá</h5>
	            </div>
	        </div>
	        <div class="row no-margin">
	        	<div class="col s12 sucursales-wrapper">
	        		<div class="row no-margin">
		        		<div class="col s12 no-padding">
		        			<div class="col s12">
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">location_on</i> Carrera 15 No. 78-33
			        			</div>
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">local_mall</i> C.C Unilago Local 2-238
			        			</div>
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">print</i> 552 2190 Ext. 237 - 238
			        			</div>
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">phone</i> (1) 744-3959
			        			</div>
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">phone_iphone</i> (318) 271-0939
			        			</div>
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">email</i> ventasunilago@digitalmtx.com
			        			</div>
			        		</div>
		        		</div>
	        		</div>
	        		<div class="row no-margin">
	        			<div class="col s12">
		        			<hr class="divider">
		        		</div>
	        		</div>
	        		<div class="row no-margin">
		        		<div class="col s12 no-padding">
		        			<div class="col s12">
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">location_on</i> Carrera 15 No. 77-05
			        			</div>
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">local_mall</i> Centro de alta Tecnologia Local 1-81
			        			</div>
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">print</i> 552 2190 Ext. 181
			        			</div>
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">phone</i> (1) 704-3886
			        			</div>
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">phone_iphone</i> (350) 283-2516
			        			</div>
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">email</i> ventascat@digitalmtx.com
			        			</div>
			        		</div>
		        		</div>
	        		</div>
	        		<div class="row">
	        			<div class="col s12">
		        			<hr class="divider">
		        		</div>
	        		</div>
	        		<div class="row no-margin">
		        		<div class="col s12 no-padding">
		        			<div class="col s12">
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">location_on</i> Carrera 10 No. 21-30
			        			</div>
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">local_mall</i> C.C Isotecnologico Local 105
			        			</div>
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">print</i> 552 2190 Ext. 105
			        			</div>
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">phone</i> (1) 747-0224
			        			</div>
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">phone_iphone</i> (316) 878-2531
			        			</div>
			        			<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
			        				<i class="material-icons left small">email</i> ventascentro@digitalmtx.com
			        			</div>
			        		</div>
		        		</div>
	        		</div>
	        	</div>
	        </div>
        </div>
        <div class="row no-margin">
        	<div class="row no-margin">
	            <div class="col s12 destacados-titulo-wrapper">
	                <h5 class="destacados-titulo"><i class="material-icons left small">location_city</i>Oficina Medellín</h5>
	            </div>
	        </div>
	         <div class="row no-margin">
	        	<div class="col s12 sucursales-wrapper">
	        		<div class="row no-margin">
						<div class="col s12 no-padding">
							<div class="col s12">
								<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
									<i class="material-icons left small">location_on</i> Carrera 48 No. 10-45
								</div>
								<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
									<i class="material-icons left small">local_mall</i> Monterrey Gran C.C Local 311
								</div>
								<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
									<i class="material-icons left small">print</i> (1) 552 2190 Ext. 311
								</div>
								<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
									<i class="material-icons left small">phone</i> (4) 604-6813
								</div>
								<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
									<i class="material-icons left small">phone_iphone</i> (350) 283-2517
								</div>
								<div class="col s12 m6 l4 no-padding valign-wrapper item-sucursal">
									<i class="material-icons left small">email</i> ventasmedellin@digitalmtx.com
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