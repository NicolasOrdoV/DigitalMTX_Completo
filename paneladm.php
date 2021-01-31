<?php 
@\session_start();
include ".includesdtm/librerias.php";
$librerias = new librerias;
include __DIR__.'/.includesdtm/adminlibs.php';

if (isset($_POST['editnombre'])&&$_POST['editnombre']==1) {

	//if (count($_POST['editnombre_des'])<=8&&count($_POST['editnombre_des'])>0) {
		$prod=new commerce();
		$prod->reset_productos_0();
		$prod->productos_1($_POST['editnombre_des']);
	/*}else{
		?>
		<script>
			alert("Se excede del limite"); 
		</script>
		<?php 
	}*/

	$_POST['editnombre']=0;

	?>
	<script type="text/javascript">
		location.href="paneladm.php";//#destproductos
	</script>
	<?php	

} elseif((isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE) || (isset($_SESSION['empleado']) && $_SESSION['empleado']==TRUE)) {
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<?php
				$librerias->gtm_head();
			?>
			<meta charset="utf-8">
			<title>Digital MTX | Panel de administración</title>
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
				<link rel="stylesheet" href="css/v3/paneladm.css">
				<link rel="stylesheet" href="lib/vidgal/css/vidgal.css"> 
				 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
				 

	  	</head>
		<body style="overflow-x: hidden;">
			<!-- Start new -->
				<ul id="slide-out" class="sidenav sidenav-fixed">
					<li class="center"><a href="#!" class="logo waves-effect waves-dark inicio"><img src="img/logo.png"></a></li>
					<li><div class="divider"></div></li>
					<li><a class="item_menu waves-effect waves-dark inicio" href="#!"><i class="material-icons left">home</i>Inicio</a></li>
					<li><div class="divider"></div></li>
					<ul class="item_menu_wrapper">
						<?php 
	    					$librerias->nav3();
	    				?>
					</ul>
					<li><div class="divider"></div></li>
					<li><a class="item_menu waves-effect waves-dark salir"><i class="material-icons left">exit_to_app</i>Salir</a></li>
				</ul>
				<div class="row hide-on-large-only">
					<div class="col s12 header-wrapper">
						<i class="material-icons medium sidenav-trigger" data-target="slide-out">menu</i>
						<img src="img/logo.png">
					</div>
				</div>
				<div class="panel valign-wrapper">
					<div class="row row-wrapper" id="default">
						<div class="col s12 center instruccion">
							Para comenzar seleccione un item del menu de la izquierda.
							<br>
							<b>Últimas sesiones</b>
							<br>
							<?php echo $_SESSION['sesionactual']."<br>".$_SESSION['ultimasesion']; ?>
						</div>
					</div>
					<div class="row row-wrapper" id="admemploy">
						<div class="col s12 col-wrapper">
							<div class="row">
								<div class="col s12">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">money_off</i>Administrar empleados</h6>
									<table class="striped highlight responsive-table">
										<thead>
											<tr>
												<th>Ultima sesion</th>
									          	<th>Nombre</th>
									          	<th>Cargo</th>
									          	<th>Email</th>
									          	<th>Editar</th>
									          	<th>Eliminar</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$empleadost=new admin();
											$empleadost->mostrarempleados();
						          		?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="row row-wrapper" id="principal">
						<div class="col s12 col-wrapper">
							<div class="row">
								<div class="col s4">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">money_off</i>Descuentos por categorías o marcas</h6>
							    	<form action="administracionact.php" method="post" onsubmit='return confirmation()'>
							    		<div class="input-field col s12">
											<div class="col s12">
												<label>Categoría</label>
											</div>
											<select class="browser-default" name="categoriad" id="descuento_por_categoria">
												<option value="" selected>Seleccione una opción</option>
												<?php
								            		$muestradesc=new admin();
								            		$muestradesc->mcategorias();
							          			?>
											</select>
										</div>
										<div class="input-field col s12">
											<div class="col s12">
												<label>Marca</label>
											</div>
											<select class="browser-default" name="marcad" id="descuento_por_marca">
												<option value="" selected>Seleccione una opción</option>
												<?php
								            		$muestradesc->vermarcas();
							          			?>
											</select>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="descuento_linea_marca" name="descuentoprod" type="number" min="0" max="99" class="validate" required>
											<label for="descuento_linea_marca">Descuento</label>
										</div>
										<div class="col s12 center">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="descuento"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
										</div>
							    	</form>
								</div>
								<div class="col s4">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">money_off</i>Descuento a producto especifico</h6>
							    	<form method="post" action="administracionact.php" onsubmit='return confirmation()'>
							    		<div class="input-field col s12">
							    			<i class="material-icons prefix">mode_edit</i>
											<input id="codigod" name="codigod" type="text" class="validate" required>
											<label for="codigod">SKU o codigo</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="descprod" name="descprod" type="number" min="0" max="99" class="validate" required>
											<label for="descprod">Descuento</label>
										</div>
										<div class="col s12 center">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="aplicardesc"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
										</div>
							    	</form>
								</div>
								<div class="col s4">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">money</i>Tasa de cambio actual <?php $tasaact=new admin();$tasaact->tasaactual(); ?></h6>
								    <form action="administracionact.php" method="post" onsubmit='return confirmation()'>
								    	<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="tasa" name="tasa" type="number" step="0.01" class="validate" required>
											<label for="tasa">Valor</label>
										</div>
										<div class="col s12 center">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="tasago"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
										</div>
								    </form>
								</div>
							</div>
							<div class="row">
								<div class="col s4">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">inbox</i>Actualizacion de stock</h6>
								    <form action="administracionact.php" method="post" enctype="multipart/form-data">
								    	<div class="file-field input-field col s12">
											<div class="btn btn-media-accion waves-effect waves-light">
												<span>Seleccionar archivo</span>
												<input type="file" name="csv" accept=".csv" required>
											</div>
											<div class="file-path-wrapper">
												<input class="file-path validate" type="text">
											</div>
										</div>
										<div class="col s12 center">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="subircsv"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
										</div>
								    </form>
								</div>
								<div class="col s4">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">attach_money</i>Actualizacion de Precios</h6>
								    <form action="administracionact.php" method="post" class="form-horizontal" enctype="multipart/form-data">
								    	<div class="file-field input-field col s12">
											<div class="btn btn-media-accion waves-effect waves-light">
												<span>Seleccionar archivo</span>
												<input type="file" name="csvs" accept=".csv" required>
											</div>
											<div class="file-path-wrapper">
												<input class="file-path validate" type="text">
											</div>
										</div>
										<div class="col s12 center">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="subircsvs"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
										</div>
								    </form>
								</div>
								<div class="col s4">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">point_of_sale</i>Reporte de ventas</h6>
								    <form action="administracionact.php" method="post">
								    	<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="fecha1" name="fecha1" type="date" class="validate" required>
											<label for="fecha1">Fecha inicial</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="fecha2" name="fecha2" type="date" class="validate" required>
											<label for="fecha2">Fecha final</label>
										</div>
										<div class="col s12 center">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="reporte"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
										</div>
								    </form>
								</div>
							</div>
							<div class="row">
								<div class="col s4">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">people</i>Reporte de clientes</h6>
									<div class="col s12 center">
										<form action="administracionact.php" method="post">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="reporte_clientes"><i class="material-icons right">keyboard_arrow_right</i>Generar</button>
										</form>
									</div>
								</div>
								<div class="col s4">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">payment</i>Métodos de pago habilitados</h6>
									<div class="col s12">
										<form action="administracionact.php" method="post">
											<?php
							            		$muestradesc = new admin();
							            		$muestradesc->metodos_pago();
						          			?>
						          			<div class="col s12 center">
						          				<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="metodos_pago"><i class="material-icons right">keyboard_arrow_right</i>Actualizar</button>
						          			</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row row-wrapper" id="empleados">
						<div class="col s12 col-wrapper">
							<div class="row">
								<div class="col s12">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">work</i>Crear cargo</h6>
									<form action="administracionact.php" method="post">
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="cargo" name="cargo" type="text" class="validate" required>
											<label for="cargo">Nombre del cargo</label>
										</div>
										<div class="col s12 center">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="addcargo"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
										</div>
						         	</form>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">person</i>Registrar empleado</h6>
									<form action="administracionact.php" method="post">
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="nombre" name="nombre" type="text" class="validate" required>
											<label for="nombre">Nombres</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="apellido" name="apellido" type="text" class="validate" required>
											<label for="apellido">Apellidos</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<select name="tipodoc" required>
												<option value="" disabled selected>Seleccione una opción</option>
												<option value="C.C">c.c</option>
					                     		<option value="C.E">c.e</option>
					                     		<option value="pasaporte">pasaporte</option>
											</select>
											<label>Tipo de identificación</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="identificacion" name="identificacion" type="text" class="validate" required>
											<label for="identificacion">Número de identificación</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="correo" name="correo" type="text" class="validate" required>
											<label for="correo">Correo electrónico</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="telefono" name="telefono" type="text" class="validate" required>
											<label for="telefono">Teléfono</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<select name="genero" required>
												<option value="" disabled selected>Seleccione una opción</option>
												<option value="Hombre">Masculino</option>
					                  			<option value="Mujer">Femenino</option>
											</select>
											<label>Género</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="sucursal" name="sucursal" type="text" class="validate" required>
											<label for="sucursal">Sucursal</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<select name="cargo" required>
												<option value="" disabled selected>Seleccione una opción</option>
												<?php
							                  		$cargom=new admin();
							                  		$cargom->mcargos();
						                  		?>
											</select>
											<label for="cargo">Cargo</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="fechanac" name="fechanac" type="date" class="validate" required>
											<label for="fechanac">Fecha de nacimiento</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="pw" name="pw" type="password" class="validate" required>
											<label for="pw">Contraseña</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="pw1" name="pw1" type="password" class="validate" required>
											<label for="pw1">Repita la contraseña</label>
										</div>
										<div class="col s12">
											<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">how_to_reg</i>Permisos</h6>
										</div>
										<div class="row">
											<div class="col s3">
												<p>
													<b>-</b> Aprobación de pagos:
												</p>
												<p>
													<label>
														<input type="radio" name="finanza" value="1">
														<span>Si</span>
													</label>
													<label>
														<input type="radio" name="finanza" value="0">
														<span>No</span>
													</label>
												</p>
											</div>
											<div class="col s3">
												<p>
													<b>-</b> Chat-Soporte al cliente:
												</p>
												<p>
													<label>
														<input type="radio" name="chat" value="1">
														<span>Si</span>
													</label>
													<label>
														<input type="radio" name="chat" value="0">
														<span>No</span>
													</label>
												</p>
											</div>
											<div class="col s3">
												<p>
													<b>-</b> Visualizar perfiles:
												</p>
												<p>
													<label>
														<input type="radio" name="perfiles" value="1">
														<span>Si</span>
													</label>
													<label>
														<input type="radio" name="perfiles" value="0">
														<span>No</span>
													</label>
												</p>
											</div>
											<div class="col s3">
												<p>
													<b>-</b> Permisos despacho:
												</p>
												<p>
													<label>
														<input type="radio" name="despacho" value="1">
														<span>Si</span>
													</label>
													<label>
														<input type="radio" name="despacho" value="0">
														<span>No</span>
													</label>
												</p>
											</div>
											<div class="col s3">
												<p>
													<b>-</b> Agregar productos:
												</p>
												<p>
													<label>
														<input type="radio" name="productos" value="1">
														<span>Si</span>
													</label>
													<label>
														<input type="radio" name="productos" value="0">
														<span>No</span>
													</label>
												</p>
											</div>
											<div class="col s3">
												<p>
													<b>-</b> Modificar contenido:
												</p>
												<p>
													<label>
														<input type="radio" name="contenido" value="1">
														<span>Si</span>
													</label>
													<label>
														<input type="radio" name="contenido" value="0">
														<span>No</span>
													</label>
												</p>
											</div>
											<div class="col s3">
												<p>
													<b>-</b> Generar facturas:
												</p>
												<p>
													<label>
														<input type="radio" name="factura" value="1">
														<span>Si</span>
													</label>
													<label>
														<input type="radio" name="factura" value="0">
														<span>No</span>
													</label>
												</p>
											</div>
											<div class="col s3">
												<p>
													<b>-</b> Envio de Correo masivo:
												</p>
												<p>
													<label>
														<input type="radio" name="mailm" value="1">
														<span>Si</span>
													</label>
													<label>
														<input type="radio" name="mailm" value="0">
														<span>No</span>
													</label>
												</p>
											</div>
											<div class="col s3">
												<p>
													<b>-</b> Generar Guia:
												</p>
												<p>
													<label>
														<input type="radio" name="guia" value="1">
														<span>Si</span>
													</label>
													<label>
														<input type="radio" name="guia" value="0">
														<span>No</span>
													</label>
												</p>
											</div>
											<div class="col s3">
												<p>
													<b>-</b>Historial Guia:
												</p>
												<p>
													<label>
														<input type="radio" name="historial" value="1">
														<span>Si</span>
													</label>
													<label>
														<input type="radio" name="historial" value="0">
														<span>No</span>
													</label>
												</p>
											</div>
											<div class="col s3">
                                                <p>
                                                    <b>-</b> Generar Consecutivo Guia: 
                                                   </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="numguia" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="numguia" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col s3">
                                                <p>
                                                    <b>-</b> Permiso Tecnico: 
                                                   </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="tecnico" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="tecnico" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col s3">
                                                <p>
                                                    <b>-</b> Permiso Recepcion: 
                                                   </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="recep" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="recep" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
										</div>
										<div class="col s12 center">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="rempleado"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
										</div>
						         	</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row row-wrapper" id="admusers">
						<div class="col s12 col-wrapper">
							<div class="row">
								<div class="col s12">
									<?php
			                            $admusers=new admin();
			                            $admusers->misusuarios();
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="row row-wrapper" id="historial">
						<div class="col s12 col-wrapper">
							<div class="row">
								<div class="col s12">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">timer</i>Historial</h6>
									<?php
										$historial = new historial();
			                            $historial->historial();
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="row row-wrapper" id="addproductos">
						<div class="col s12 col-wrapper">
							<div class="row">
								<div class="col s6">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">add</i>Agregar categoría</h6>
									<form action="administracionact.php" method="post" class="form-horizontal">
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="addcategoria" name="addcategoria" type="text" pattern="[A-Z 0-9]{1,50}" class="validate" required>
											<label for="addcategoria">Nombre de la categoría (en mayúsculas)</label>
										</div>
						                <div class="col s12 center">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="addcategoriago"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
										</div>
							        </form>
								</div>
								<div class="col s6">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">delete</i>Eliminar categoría</h6>
									<form action="administracionact.php" method="post" onsubmit="return confirmation()">
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<select name="categoria" required>
												<option value="" disabled selected>Seleccione una opción</option>
												<?php
							                  		$categoriademarcas = new admin();
													$categoriademarcas->mcategorias();
						                  		?>
											</select>
										</div>
						                <div class="col s12 center">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="ecategoria"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
										</div>
							        </form>
								</div>
								<div class="col s6">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">add</i>Agregar marca</h6>
									<form action="administracionact.php" method="post">
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="marcass" name="marcass" type="text" pattern="[A-Z 0-9]{1,50}" class="validate" required>
											<label for="marcass">Nombre de la marca (en mayúsculas)</label>
										</div>
						                <div class="col s12 center">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="addmarcas"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
										</div>
							        </form>
								</div>
								<div class="col s6">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">delete</i>Eliminar marca</h6>
									<form action="administracionact.php" method="post" onsubmit="return confirmation()">
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<select name="marca" required>
												<option value="" disabled selected>Seleccione una opción</option>
												<?php
							                  		$vmarcas=new admin();
							                    	$vmarcas->vermarcas();
						                  		?>
											</select>
										</div>
						                <div class="col s12 center">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="emarca"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
										</div>
							        </form>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">devices</i>Agregar producto</h6>
									<form action="administracionact.php" method="post" enctype="multipart/form-data" class="form-horizontal">
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="nombrep" name="nombrep" type="text" class="validate" required>
											<label for="nombrep">Nombre</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="tags" name="tags" type="text" class="validate" required>
											<label for="tags">Etiquetas (separados por comas ",")</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="compatible" name="compatible" type="text" class="validate" required>
											<label for="compatible">Compatibilidad (separados por comas ",")</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="colores" name="colores" type="text" class="validate" required>
											<label for="colores">Colores (separados por comas ",")</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="codigo" name="codigo" type="text" class="validate" required>
											<label for="codigo">Código SKU o del producto</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<select name="categoria" required>
												<option value="" disabled selected>Seleccione una opción</option>
												<?php
							                  		$categoriademarcas->mcategorias();
						                  		?>
											</select>
											<label for="categoria">Categoría</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<select name="marca" required>
												<option value="" disabled selected>Seleccione una opción</option>
												<?php
							                  		$vmarcas->vermarcas();
						                  		?>
											</select>
											<label for="marca">Marca</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<textarea id="descripcion" name="descripcion" class="materialize-textarea" required></textarea>
											<label for="descripcion">Descripción</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="garantia" name="garantia" type="text" class="validate" required>
											<label for="garantia">Garantía</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="precio" name="precio" type="number" class="validate" required>
											<label for="precio">Precio (en COP)</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="stock" name="stock" type="number" class="validate" required>
											<label for="stock">Stock disponible</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="youtube_video" name="youtube_video" type="text" class="validate" placeholder="La URL debe ser similar a esta: https://www.youtube.com/watch?v=21SAD4as5">
											<label for="youtube_video">Video(opcional)</label>
										</div>
										<div class="input-field col s12 center">
											<p>
												<label>
													<input type="checkbox" name="outlet" id="outlet" value="1" />
													<span>¿Producto en Outlet?</span>
												</label>
											</p>
										</div>
										<div class="file-field input-field col s12">
											<div class="btn btn-media-accion waves-effect waves-light">
												<span>Seleccionar imágenes</span>
												<input type="file" name="imagenes[]" accept="image/png" multiple required>
											</div>
											<div class="file-path-wrapper">
												<input class="file-path validate" type="text" required>
											</div>
										</div>
										<div class="col s12 center">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="addproducto"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row row-wrapper" id="admproductos">
						<div class="col s12 col-wrapper">
							<div class="row">
								<div class="col s12">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">money_off</i>Administrar productos</h6>
									<div class="row">
										<div class="input-field col s12">
											<script type="text/javascript">
								                function myFunctionp() {
							                        var input, filter, table, tr, td, i;
							                        input = document.getElementById("myInput5");
							                        filter = input.value.toUpperCase();
							                        table = document.getElementById("myTable5");
							                        tr = table.getElementsByTagName("tr");
							                
							                        for (i = 0; i < tr.length; i++) {
							                          	td = tr[i].getElementsByTagName("td")[0];
							                          	if (td) {
							                           	 	if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
							                              		tr[i].style.display = "";
							                            	} else {
							                              		tr[i].style.display = "none";
							                            	}
							                          	}       
						                        	}
						                      	}
								            </script>
						                	<i class="material-icons prefix">search</i>
							                <input id="myInput5" type="text" class="validate" onkeyup="myFunctionp()" required>
							                <label for="myInput5">Buscar por código</label>
							            </div>
									</div>
									<div class="row">
										<table class="striped highlight responsive-table" id="myTable5">
											<thead>
												<tr>
													<th>Código</th>
								                    <th>Nombre</th>
								                    <th>Stock</th>
								                    <th>Precio</th>
								                    <th>Descuento</th>
								                    <th>Estado</th>
										          	<th>Editar</th>
										          	<th>Eliminar</th>
												</tr>
											</thead>
											<tbody>
												<?php
								                    $verproductos=new commerce();
								                    $verproductos->verproductos();
							                    ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row row-wrapper" id="destproductos">
						<div class="col s12">
							<div class="row">
								<div class="col s12 col-wrapper">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">important_devices</i>Productos destacados</h6>
									<?php 
						                $verproductos = new commerce();
					                	$res = $verproductos->all_productos();
					                	$escojidos = 0;
					                	for ($p=0; $p <count($res); $p++) {
					                		if ($res[$p]['destacado'] == 1) {
						                		$escojidos++;			
						                	}
					                	}
					                ?>
					                <form method="post">
					                	<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<select name="editnombre_des[]" multiple required>
												<option value="" disabled selected>Seleccione una o varias opciones</option>
												<?php 
					                                for ($i=0; $i <count($res); $i++) {
					                                	if ($res[$i]['destacado'] == 1) {
					                                		?>
						                            			<option value="<?php echo $res[$i]['id']; ?>" selected>
						                            				<?php echo $res[$i]['nombre']; ?> 
						                            			</option>
						                            		<?php 
						                                } else {
						                                	?>
						                            			<option value="<?php echo $res[$i]['id']; ?>"> 
						                            				<?php echo $res[$i]['nombre']; ?> 
						                            			</option>
						                            		<?php 
						                                }
					                                }
				                                ?>
											</select>
											<span class="helper-text">Puede agregar tantos productos como desee. Actualmente hay <?php echo $escojidos; ?> productos destacados</span>
										</div>
										<div class="col s12 center">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="editnombre" value="1"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
										</div>
					                </form>
								</div>
							</div>
						</div>
					</div>
					<div class="row row-wrapper" id="admpcupones">
						<div class="col s12">
							<div class="row">
								<div class="col s12 col-wrapper">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">receipt</i>Administrar cupones</h6>
									<p class="right-align">
										<a class="btn btn-confirmar-accion waves-effect waves-light crear-cupon modal-trigger" href="#myModal"><i class="material-icons right">add</i>Crear</a>
									</p>
									<table class="striped highlight responsive-table">
										<thead>
											<tr>
												<th>ID</th>
			                                    <th>Fecha de creación</th>
			                                    <th>Fecha de límite</th>
			                                    <th>Usos restantes</th>
			                                    <th>Descuento</th>
			                                    <th>Valor mínimo aceptado</th>
			                                    <th>Código</th>
			                                    <th>Opciones</th>
											</tr>
										</thead>
										<tbody>
											<?php
							                    $verproductos = new commerce();
							                    $verproductos->ver_cupones();
						                    ?>
										</tbody>
									</table>
								</div>
							</div>
							<div id="myModal" class="modal modal-fixed-footer">
								<div class="modal-content">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">money_off</i><span class="titulo-modal-cupones">Administrar cupones</span></h6>
									<form id="form-crear-cupon" method="post" action="crear_cupon.php">
										<input type="text" name="accion" id="accion" hidden>
										<input type="number" name="id" id="id" hidden>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="limite" name="limite" type="date" class="validate" required>
											<label for="limite">Fecha límite</label>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="usos" name="usos" type="number" min="0" class="validate" required>
											<label for="usos">Cantidad de usos</label>
											<span class="helper-text">Debe ingresar un número sin puntos ni comas</span>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="descuento" name="descuento" type="text" class="validate" required>
											<label for="descuento">Descuento</label>
											<span class="helper-text">Debe ingresar un número sin puntos ni comas</span>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="minimo" name="minimo" type="text" class="validate" required>
											<label for="minimo">Valor mínimo</label>
											<span class="helper-text">Debe ingresar un número sin puntos ni comas</span>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">mode_edit</i>
											<input id="codigo_cupon" name="codigo_cupon" type="text" class="validate">
											<label for="codigo_cupon">Código del cupón(opcional)</label>
											<span class="helper-text">Si se deja en blanco, se generará un número aleatorio de 6 dígitos</span>
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn-flat btn-confirmar-accion waves-effect waves-light boton-modal-cupones-crear left" form="form-crear-cupon" style="display: none;"></button>
									<button type="submit" class="btn-flat btn-confirmar-accion waves-effect waves-light boton-modal-cupones-actualizar left" form="form-crear-cupon" style="display: none;"></button>
									<button class="modal-close btn-flat btn-cerrar-accion waves-effect waves-light"><i class="material-icons left">cancel</i>Cerrar</button>
								</div>
							</div>							            
						</div>
					</div>
					<div class="row row-wrapper" id="ventas">
						<div class="col s12">
								<?php
		                        $ventas=new commerce();
		                        if ($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE) {
		                        	$ventas->ventas();
		                        }elseif ($_SESSION['finanza']) {
		                        	$ventas->appago();
		                        }elseif ($_SESSION['factura']==TRUE) {
		                        	$ventas->facturapago();
		                        }elseif ($_SESSION['despacho']==TRUE) {
		                        	$ventas->despachopago();
		                        }
								?>
						</div>
					</div>
					<div class="row row-wrapper" id="contenido">
						<div class="col s12">
							<div class="row">
								<div class="col s12 col-wrapper">
									<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">dashboard</i>Administrar el contenido de la página</h6>
									<div class="row">
										<div class="col s6">
											<h6 class="sub-titulo-modulo valign-wrapper"><i class="material-icons left">photo</i>Slideshow #1</h6>
											<?php 
										    	if (is_file('img/1.mp4')) {
								        			?>
									        			<video controls style="max-width: 100%;max-height: 186px;width: 100%;">
															<source src="img/1.mp4" type="video/mp4">
															Su navegador no admite la reproducción de este video.
														</video>
								        			<?php 
								        		} elseif(is_file('img/1.png')) {
								        			?>
								        				<img src="img/1.png" style="max-width: 100%;max-height: 186px;width: 100%;">
								        			<?php 
								        		}
									    	?>
									    	<p class="center">
									    		Se recomienda que se suban archivos de 1500px por 500px
									    		<br>
									    		Se aceptan archivos .PNG o .MP4
							                </p>
							                <form method="post" action="" enctype="multipart/form-data">
							                	<div class="file-field input-field col s12">
													<div class="btn btn-media-accion waves-effect waves-light">
														<span>Seleccionar archivo</span>
														<input type="file" name="slideshow1" accept="video/*,image/*">
													</div>
													<div class="file-path-wrapper">
														<input class="file-path validate" type="text">
													</div>
												</div>
												<div class="col s12 center">
													<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="subirs1"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
												</div>
							                </form>
							                <?php
										        if(isset($_POST['subirs1'])) {

					                                $tipo_formato=isset($_FILES['slideshow1'])?explode("/", $_FILES['slideshow1']['type']):0;

										        	if (($tipo_formato!=0)) {

										        		if ($tipo_formato[1]=="png"||$tipo_formato[1]=="mp4"||$tipo_formato[1]=="PNG"||$tipo_formato[1]=="MP4") {

										        			if (is_file('img/1.png')) {
											        			unlink('img/1.png');
											        		}
															        		
										        			if (is_file('img/1.mp4')) {
											        			unlink('img/1.mp4');
											        		}

											        		if(move_uploaded_file($_FILES['slideshow1']['tmp_name'], mb_strtolower('img/1.'.$tipo_formato[1]))){
				                                              	chmod(mb_strtolower('img/1.'.$tipo_formato[1]), 0777);
				                                              	$historial = new historial();
																$historial->registro_historial('Se modificó con éxito el slideshow #1');
				                                          		?>
															    <script>
															        alert("Tu Slideshow numero 1 se modifico");
															    </script>
														    	<?php
												        	}  

										        		}else{
										        			$historial = new historial();
															$historial->registro_historial('Se intentó modificar el slideshow #1');			
											        		?>
														    <script>
														        alert("Formato no valido");
														    </script>
													    	<?php
											        	}  

										        	}else{
										        		$historial = new historial();
														$historial->registro_historial('Se intentó modificar el slideshow #1');
										        		?>
													    <script>
													        alert("Formato no valido");
													    </script>
												    	<?php
										        	}                                     
										        }
									        ?>
										</div>
										<div class="col s6">
											<h6 class="sub-titulo-modulo valign-wrapper"><i class="material-icons left">photo</i>Slideshow #2</h6>
											<?php 
										    	if (is_file('img/2.mp4')) {
								        			?>
									        			<video controls style="max-width: 100%;max-height: 186px;width: 100%;">
															<source src="img/2.mp4" type="video/mp4">
															Su navegador no admite la reproducción de este video.
														</video>
								        			<?php 
								        		} elseif(is_file('img/2.png')) {
								        			?>
								        				<img src="img/2.png" style="max-width: 100%;max-height: 186px;width: 100%;">
								        			<?php 
								        		}
									    	?>
									    	<p class="center">
									    		Se recomienda que se suban archivos de 1500px por 500px
									    		<br>
									    		Se aceptan archivos .PNG o .MP4
							                </p>
							                <form method="post" action="" enctype="multipart/form-data">
							                	<div class="file-field input-field col s12">
													<div class="btn btn-media-accion waves-effect waves-light">
														<span>Seleccionar archivo</span>
														<input type="file" name="slideshow2" accept="video/*,image/*">
													</div>
													<div class="file-path-wrapper">
														<input class="file-path validate" type="text">
													</div>
												</div>
												<div class="col s12 center">
													<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="subirs2"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
												</div>
							                </form>
							                <?php
										        if(isset($_POST['subirs2'])) {

				                                  	$tipo_formato=isset($_FILES['slideshow2'])?explode("/", $_FILES['slideshow2']['type']):0;

										        	if (($tipo_formato!=0)) {

										        		if ($tipo_formato[1]=="png"||$tipo_formato[1]=="mp4"||$tipo_formato[1]=="PNG"||$tipo_formato[1]=="MP4") {

										        			if (is_file('img/2.png')) {
											        			unlink('img/2.png');
											        		}

											        		if (is_file('img/2.mp4')) {
											        			unlink('img/2.mp4');
											        		}

											        		if(move_uploaded_file($_FILES['slideshow2']['tmp_name'], mb_strtolower('img/2.'.$tipo_formato[1]))){
				                                              	chmod(mb_strtolower('img/2.'.$tipo_formato[1]), 0777);
				                                              	$historial = new historial();
																$historial->registro_historial('Se modificó con éxito el slideshow #2');
				                                          		?>
															    <script>
															        alert("Tu Slideshow numero 2 se modifico");
															    </script>
														    	<?php
												        	}  

										        		}else{
										        			$historial = new historial();
															$historial->registro_historial('Se intentó modificar el slideshow #2');
											        		?>
														    <script>
														        alert("Formato no valido");
														    </script>
													    	<?php
											        	}  

										        	}else{
										        		$historial = new historial();
														$historial->registro_historial('Se intentó modificar el slideshow #2');
										        		?>
													    <script>
													        alert("Formato no valido");
													    </script>
												    	<?php
										        	}                                     
										        }
									        ?>
										</div>
										<div class="col s6">
											<h6 class="sub-titulo-modulo valign-wrapper"><i class="material-icons left">photo</i>Slideshow #3</h6>
											<?php 
										    	if (is_file('img/3.mp4')) {
								        			?>
									        			<video controls style="max-width: 100%;max-height: 186px;width: 100%;">
															<source src="img/3.mp4" type="video/mp4">
															Su navegador no admite la reproducción de este video.
														</video>
								        			<?php 
								        		} elseif(is_file('img/3.png')) {
								        			?>
								        				<img src="img/3.png" style="max-width: 100%;max-height: 186px;width: 100%;">
								        			<?php 
								        		}
									    	?>
									    	<p class="center">
									    		Se recomienda que se suban archivos de 1500px por 500px
									    		<br>
									    		Se aceptan archivos .PNG o .MP4
							                </p>
							                <form method="post" action="" enctype="multipart/form-data">
							                	<div class="file-field input-field col s12">
													<div class="btn btn-media-accion waves-effect waves-light">
														<span>Seleccionar archivo</span>
														<input type="file" name="slideshow3" accept="video/*,image/*">
													</div>
													<div class="file-path-wrapper">
														<input class="file-path validate" type="text">
													</div>
												</div>
												<div class="col s12 center">
													<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="subirs3"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
												</div>
							                </form>
							                <?php
										        if(isset($_POST['subirs3'])){

				                                  	$tipo_formato=isset($_FILES['slideshow3'])?explode("/", $_FILES['slideshow3']['type']):0;

										        	if (($tipo_formato!=0)) {

										        		if ($tipo_formato[1]=="png"||$tipo_formato[1]=="mp4"||$tipo_formato[1]=="PNG"||$tipo_formato[1]=="MP4") {

														        			if (is_file('img/3.png')) {
															        			unlink('img/3.png');
															        		}
															        		if (is_file('img/3.mp4')) {
															        			unlink('img/3.mp4');
															        		}

															        		if(move_uploaded_file($_FILES['slideshow3']['tmp_name'], mb_strtolower('img/3.'.$tipo_formato[1]))){
								                                              	chmod(mb_strtolower('img/3.'.$tipo_formato[1]), 0777);
								                                              	$historial = new historial();
																				$historial->registro_historial('Se modificó con éxito el slideshow #3');
							                                              		?>
																			    <script>
																			        alert("Tu Slideshow numero 3 se modifico");
																			    </script>
																		    	<?php
																        	}  

										        		}else{
										        			$historial = new historial();
															$historial->registro_historial('Se intentó modificar el slideshow #3');	
											        		?>
														    <script>
														        alert("Formato no valido");
														    </script>
													    	<?php
											        	}  

										        	}else{  
										        		$historial = new historial();
														$historial->registro_historial('Se intentó modificar el slideshow #3');	   		
										        		?>
													    <script>
													        alert("Formato no valido");
													    </script>
												    	<?php
										        	}                                     
										        }
									        ?>
										</div>
										<div class="col s6">
											<h6 class="sub-titulo-modulo valign-wrapper"><i class="material-icons left">photo</i>Slideshow #4</h6>
											<?php 
										    	if(is_file('img/4.mp4')) {
								        			?>
									        			<video controls style="max-width: 100%;max-height: 186px;width: 100%;max-height: 186px;width: 100%;">
															<source src="img/4.mp4" type="video/mp4">
															Su navegador no admite la reproducción de este video.
														</video>
								        			<?php 
								        		} elseif(is_file('img/4.png')) {
								        			?>
								        				<img src="img/4.png" style="max-width: 100%;max-height: 186px;width: 100%;max-height: 186px;width: 100%;">
								        			<?php 
								        		}
									    	?>
									    	<p class="center">
									    		Se recomienda que se suban archivos de 1500px por 500px
									    		<br>
									    		Se aceptan archivos .PNG o .MP4
							                </p>
							                <form method="post" action="" enctype="multipart/form-data">
							                	<div class="file-field input-field col s12">
													<div class="btn btn-media-accion waves-effect waves-light">
														<span>Seleccionar archivo</span>
														<input type="file" name="slideshow4" accept="video/*,image/*">
													</div>
													<div class="file-path-wrapper">
														<input class="file-path validate" type="text">
													</div>
												</div>
												<div class="col s12 center">
													<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="subirs4"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
												</div>
							                </form>
							                <?php
										        if(isset($_POST['subirs4'])){

										        	$tipo_formato=isset($_FILES['slideshow4'])?explode("/", $_FILES['slideshow4']['type']):0;

										        	if (($tipo_formato!=0)) {

										        		if ($tipo_formato[1]=="png"||$tipo_formato[1]=="mp4"||$tipo_formato[1]=="PNG"||$tipo_formato[1]=="MP4") {

										        			if (is_file('img/4.png')) {
											        			unlink('img/4.png');
											        		}

											        		if (is_file('img/4.mp4')) {
											        			unlink('img/4.mp4');
											        		}

											        		if(move_uploaded_file($_FILES['slideshow4']['tmp_name'], mb_strtolower('img/4.'.$tipo_formato[1]))){
				                                              	chmod(mb_strtolower('img/4.'.$tipo_formato[1]), 0777);
				                                              	$historial = new historial();
																$historial->registro_historial('Se modificó con éxito el slideshow #4');
				                                          		?>
															    <script>
															        alert("Tu Slideshow numero 4 se modifico");
															    </script>
														    	<?php
												        	}  

										        		}else{
										        			$historial = new historial();
															$historial->registro_historial('Se intentó modificar el slideshow #4');	
											        		?>
														    <script>
														        alert("Formato no valido");
														    </script>
													    	<?php
											        	}  

										        	}else{
										        		$historial = new historial();
														$historial->registro_historial('Se intentó modificar el slideshow #4');	
										        		?>
													    <script>
													        alert("Formato no valido");
													    </script>
												    	<?php
										        	}                 	                                   
										        }
								        	?> 
										</div>
									</div>
									<div class="row">
										<div class="col s12">
											<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">record_voice_over</i>Publicidad</h6>
											<p class="center">
									    		Se aceptan archivos .PNG
							                </p>
									        <div class="col s12 no-padding center">
									        	<img src="img/pub.png" style="width: 500px;">
									        </div>
									        <form method="post" action="" enctype="multipart/form-data">
							                	<div class="file-field input-field col s12">
													<div class="btn btn-media-accion waves-effect waves-light">
														<span>Seleccionar archivo</span>
														<input type="file" name="publicidad1" accept="image/png" required>
													</div>
													<div class="file-path-wrapper">
														<input class="file-path validate" type="text">
													</div>
												</div>
												<div class="col s12 center">
													<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="subirp1"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
												</div>
							                </form>
									        <?php
										        if(isset($_POST['subirp1'])) {
				                                  	if(move_uploaded_file($_FILES['publicidad1']['tmp_name'], 'img/pub.png')) {
				                                      	chmod("img/pub.png", 0777);
				                                      	$historial = new historial();
														$historial->registro_historial('Se modificó con éxito la imágen publicitaria');
				                                      	?>
													    <script>
													        alert("Tu Publicidad se modifico");
													    </script>
											    		<?php
										        	}                                    
									        	}
									        ?>
										</div>
									</div>
									<div class="row">
										<div class="col s12">
											<h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">business</i>Página sobre nosotros</h6>
											<p class="center">
									    		Puede escribir texto plano o usar HTML
							                </p>
							                <form action="" method="post">
							                	<div class="input-field col s12">
							                		<i class="material-icons prefix">mode_edit</i>
													<textarea id="quienes_somos" name="quienes_somos" class="materialize-textarea" data-length="600" required></textarea>
													<label for="quienes_somos">¿Quienes somos?</label>
												</div>
												<div class="input-field col s6">
													<i class="material-icons prefix">mode_edit</i>
													<textarea id="mision" name="mision" class="materialize-textarea" data-length="600" required></textarea>
													<label for="mision">Nuestra misión</label>
												</div>
												<div class="input-field col s6">
													<i class="material-icons prefix">mode_edit</i>
													<textarea id="vision" name="vision" class="materialize-textarea" data-length="600" required></textarea>
													<label for="vision">Nuestra visión</label>
												</div>
												<div class="input-field col s12">
													<i class="material-icons prefix">mode_edit</i>
													<textarea id="valores" name="valores" class="materialize-textarea" data-length="600" required></textarea>
													<label for="valores">Nuestros valores</label>
												</div>
												<div class="col s12 center">
													<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="btn_update_nosotros"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
												</div>
							                </form>
							                <?php
							                if (isset($_POST['btn_update_nosotros'])) {
							                	$verproductos = new commerce();
							                    $verproductos->update_nosotros();
							                }
						                    ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row row-wrapper" id="guia">
						<div class="row">
							<div class="">
								<h4 class="titulo-modulo" style="text-align: center;">SOLICITUD DE DESPACHO ASESOR</h4>
							    <form action="administracionact.php" method="POST">
								 	<div class="row" style="text-align:center;">
								 		<div class="col s1"></div>
								 		<div class="col s1"><p>Punto Venta</p></div>
										<div class="col s3">
											<select name="puntov" required="">
												<option selected="" disabled="" value="">Elige Un Punto</option>
											<?php 
												$puntos=new admin();
												$puntos->puntosVenta();
											?>
											</select>

										</div>
										<input id="fecha" type="text" name="fecha" hidden="true" value="<?php echo date('Y-m-d h:i:s');?>">
										<div class="col s2"><p>Forma de Cobro Envio</p></div>
										<div class="col s3">
											<select name="cobro_envio" required="">
												<option>Contraentrega</option>
												<option>Flete Pago</option>
											</select>
										</div>
									</div>
									<h6>Datos de Envio:</h6>
									<div style="border: 2px solid black;padding: 10px;text-align:center;">
									<div class="row" style="margin-left: 35px;">
											<div class="col s1"><p>Factura No.</p></div>
											<div class="col s2">
												<input type="text" name="fact" required="">
											</div>
											<div class="col s1"><p>NIT/CC</p></div>
											<div class="col s2">
												<input type="text" name="id" required="" id="id">
											</div>
											<div class="col s1"><p>Nombre</p></div>
											<div class="col s4">
												<input type="text" name="nomcli" required="" id="nomcli">
											</div>
									</div>
									<div class="row" style="margin-left: 35px;">
											<div class="col s1"><p>Telefono</p></div>
											<div class="col s2">
												<input type="number" name="tel" required="" id="tel">
											</div>
											<div class="col s1"><p>Dir. de Entrega</p></div>
											<div class="col s4">
												<input id="dirent" type="text" name="dirent" required="" maxlength="60" minlength="5" >
											</div>
											<div class="col s1"><p>Valor Seguro</p></div>
											<div class="col s2">
												<input id="valorase" type="number" name="valorase" required="" placeholder="Solo Numeros">												
											</div>
											<!-- <div class="col s1"></div> -->
											
									</div>
									<div class="row" style="margin-left: 35px;">
										<div class="col s2"><p>Departamento</p></div>
											<div class="col s4">
												<select name="depar" required="" id="departamentos" class="browser-default" style="border: 1px solid grey">
													<option disabled="" selected="">Seleccione</option>
													<?php
														$depar=new admin();
														$depar->departamentos();
													?>
												</select>
											</div>
										
											<div class="col s1"><p>Ciudad</p></div>
											<div class="col s4">
												<select id="ciudad" name="ciudad" required class="browser-default" style="border: 1px solid grey">	
													<option disabled="">Seleccione</option>
												</select>
											</div>
											<!-- <div class="col s1"></div> -->
											
									</div>
									<div class="row" style="margin-left: 35px;" id="obser">
									<div class="col s2"></div> 
										<div class="col s2"><p>Transportadora</p></div>
											<div class="col s4">
												<select name="transport" id="transport" required>
													<?php 
														$trans=new admin();
														$trans->transportadoras();
													?>
												</select>
											</div>
									
									</div>
									<div class="row">
											<div class="col s2"><p>Observaciones</p></div>
											<div class="col s9">
											<textarea id="obser" name="obser" class="materialize-textarea" data-length="600"></textarea>
								
										</div>
									</div>

									</div>
									<div class="row" style="margin-top: 30px;">
										<div class="col s12 center">
											<button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="reguia"><i class="material-icons right">keyboard_arrow_right</i>Grabar</button>
										</div>
									</div>
							    </form>
							</div>
						</div>
						
					</div>
					<div class="row row-wrapper" id="historialg">
						<div class="row">
							<div class="">
								<h4 class="titulo-modulo" style="text-align: center;">Historial Guias</h4>
							    	<?php
							    		$historial=new admin();
							    		$historial->historialg();
							    	?>
							</div>
						</div>
			     	</div>
			     	<div class="row row-wrapper" id="historialgp">
						<div class="row">
							<div class="">
								<h4 class="titulo-modulo" style="text-align: center;">Historial Guias</h4>
							    	<?php
							    		$historial=new admin();
							    		$historial->historialgp();
							    	?>
							</div>
						</div>
			     	</div>
					
					
				</div>
			<!-- End new -->


			<?php
				if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE) {
					$delcompras=new admin();
					$delcompras->ventassinpagar();
				}
			?>

	        <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
	        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	        <script src="https://www.google.com/recaptcha/api.js"></script>
	        <script src="lib/vidgal/js/vidgal.js"></script>
	        <script src="js/v3/index.js"></script>
	        <script src="js/v3/paneladm.js"></script>
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
    		

			<?php
	      		//$librerias->librerias_js(19);
	    	?>

			<script type="text/javascript">
		      	function confirmar() {
			        if(!confirm('¿Desea Salir?')) {
			        	return false;
			        } else {
			          	top.location.href="salir.php";
			        }
		      	}
		    </script>
		    <script type='text/javascript'>
	            function confirmation() {
	            	if(!confirm('¿Esta seguro de realizar esta acción?')) return false;    
	            }
	        </script>
	        <script>
	        	$('.crear-cupon').click(function() {
	        		$('#accion').val('crear');
	        		$('#id').val('');
	        		$('.boton-modal-cupones-actualizar').hide();
	        		$('.titulo-modal-cupones').html('Crear cupón');
	        		$('#limite').val('');
	        		$('#usos').val('');
	        		$('#descuento').val('');
	        		$('#minimo').val('');
	        		$('.boton-modal-cupones-crear').html('<i class="material-icons left">add</i>Crear');
	        		$('.boton-modal-cupones-crear').show();
	        	});
	        	$('.actualizar-cupon').click(function() {
	        		$('#accion').val('actualizar');
	        		$('#id').val($(this).attr('value'));
	        		$('.boton-modal-cupones-crear').hide();
	        		$('.titulo-modal-cupones').html('Actualizar cupón #' + $(this).attr('value'));
	        		var pre_limite = $(this).parent().parent().find('td:nth-child(3)').html().split('/');
	        		var limite = '';
	        		for (var i = 2; i >= 0; i--) {
	        			if (i > 0) {
	        				limite += pre_limite[i]+'-';
	        			} else if(i == 0) {
	        				limite += pre_limite[i];
	        			}
	        		}
	        		$('#limite').val(limite);
	        		$('#usos').val($(this).parent().parent().find('td:nth-child(4)').html());
	        		$('#descuento').val($(this).parent().parent().find('td:nth-child(5)').html());
	        		$('#minimo').val($(this).parent().parent().find('td:nth-child(6)').html());
	        		$('#limite').parent().find('label').addClass('active');
	        		$('#usos').parent().find('label').addClass('active');
	        		$('#descuento').parent().find('label').addClass('active');
	        		$('#minimo').parent().find('label').addClass('active');
	        		$('#codigo_cupon').parent().find('label').addClass('active');
	        		$('.boton-modal-cupones-actualizar').html('<i class="material-icons left">loop</i>Actualizar');
	        		$('.boton-modal-cupones-actualizar').show();
	        	});
	        	$('.eliminar-cupon').click(function() {
	        		if (confirm('Si elimina este cupón, ningún usuario lo podrá usar. Esta acción es permanente, esta seguro de que desea realizarla?')) {
	        			var tr = $(this).parent().parent();
	        			var datos = {
							accion : 'eliminar',
							id : $(this).attr('value'),
						};
						$.ajax({
							url: "crear_cupon.php",
							async: true,
							type: 'POST',
							data: datos,
							success: function(result) {
								if (result == 1) {
									alert('El cupón ha sido eliminado con éxito');
	                    			tr.remove();
								} else {
									alert('No se ha podido eliminar el cupón, intentelo mas tarde');
								}
							}
						});
	        		}
	        	});
	        	$('#descuento_por_categoria').change(function() {
	        		if ($(this).val() != '') {
	        			$('#descuento_por_marca').attr('disabled', true);
	        		} else {
	        			$('#descuento_por_marca').removeAttr('disabled');
	        		}
	        	});
	        	$('#descuento_por_marca').change(function() {
	        		if ($(this).val() != '') {
	        			$('#descuento_por_categoria').attr('disabled', true);
	        		} else {
	        			$('#descuento_por_categoria').removeAttr('disabled');
	        		}
	        	});
	        </script>
		</body>
	</html>
<script type="text/javascript">
	$(document).ready(function(){

		recargarLista();
		
		$('#departamentos').change(function(){
			recargarLista();
		});
	});

	function recargarLista(){
		$.ajax({
			type:'POST',
			url:'municipios.php',
			data:'departamentos='+ $('#departamentos').val(),
			success:function(r){
				$('#ciudad').html(r);
			}
		});
	}


</script>

<script type="text/javascript">
  $(function() {

    // Asigno un evento a un botón de mi formulario

    $('.onoffswitch-checkbox').change(function(e){

        if($('.onoffswitch-checkbox').is(':checked')){
        	var valores = "";
          e.preventDefault();
            console.log("cheked");  
            // id = $(this).find('td:first').html();   
            id = $(this).parents("tr").find(".code").each(function(){
            	valores += $(this).html();
            });     
        	 $.ajax({
							url: "cambiar_estado.php",
							async: true,
							type: 'POST',
							data: "id="+valores,
							success: function(result) {
															
							}
						});  
          
      };

    });

});
</script>
<!-- <script type="text/javascript">
  $(function() {

    // Asigno un evento a un botón de mi formulario

    $("#myonoffswitch").change(function(e){

        if($('#myonoffswitch').is(':checked')){
          e.preventDefault();
            console.log("cheked");  
            // id = $(this).find('td:first').html();   
            id = $(this).parents("tr").find("td").eq(0).html();       
            data = "id="+id+"&estado=4";
          $.ajax({
							url: "cambiar_estado.php",
							async: true,
							type: 'POST',
							data: data,
							success: function(result) {
								
								alert(result);
								
							}
						});
          
      }else
          { 
            e.preventDefault();
            console.log("todo");  
            // id = $(this).find('td:first').html();   
            id = $(this).parents("tr").find("td").eq(0).html();       
            data = "id="+id+"&estado=5";
          $.ajax({
							url: "cambiar_estado.php",
							async: true,
							type: 'POST',
							data: data,
							success: function(result) {
								
								alert(result);
								
							}
						});
        
      }

    })

});
</script> -->

<script type="text/javascript">
	$(function(){
		$('#fact').autocomplete({
			source:"guias.php",
			minLength:2,
			select: function(event,ui){
				event.preventDefault();
				$('#id').val(ui.item.id);
				$('#nomcli').val(ui.item.nomci);
				$('#tel').val(ui.item.tel);
				$('#dirent').val(ui.item.dirent);
				$('#departamentos').val(ui.item.departamentos);
				$('#ciudad').val(ui.item.ciudad);
				$('#transport').val(ui.item.transport);
				$('#valorase').val(ui.item.valorase);
				$('#obser').val(ui.item.obser);
			}

		});
	});
</script>


	<?php
} else {
	?>
		<script type="text/javascript">
			location.href="index.php";
		</script>
	<?php
}
?>