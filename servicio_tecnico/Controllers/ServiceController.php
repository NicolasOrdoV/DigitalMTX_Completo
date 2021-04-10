<?php

require 'Models/Service.php';
require 'Models/Mark.php';
require 'Models/User.php';
require 'Models/Product.php';
require 'Models/Employee.php';
require 'Models/TechnicalR.php';
require 'Models/Provider.php';
require 'Models/TypeService.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../garantias/vendor/autoload.php';   
/**
 * Controlador servicios
 */
class ServiceController
{
	private $model;
	private $mark;
	private $user;
	private $product;
	private $employee;
	private $technical;
	private $provider;
	private $typeService;

	public function __construct()
	{
		$this->model = new Service;
		$this->mark = new Mark;
		$this->user = new User;
		$this->product = new Product;
		$this->employee = new Employee;
		$this->technical = new Technical;
		$this->provider = new Provider;
		$this->typeService = new TypeService;
	}

	public function index()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE || isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE ) {
			require 'Views/Layout.php';
			$services = $this->model->getAll();
			$total_data = count($services);
			require 'Views/Service/list.php';
			require 'Views/Scripts.php';
		}else{
			header('Location: ?controller=login');
		}	
	}

	public function newService()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE || isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE ) {
			require 'Views/Layout.php';
			$services = $this->model->getAll();
			$total_data = count($services);
			$marks = $this->mark->getAll();
			$users = $this->user->getAll();
			$products = $this->product->getAll();
			$technicals = $this->employee->getAll();
			$types = $this->typeService->getAll();
			require 'Views/Service/new.php';
			require 'Views/Scripts.php';
		}else{
			header('Location: ?controller=login');
		}	
	}

	public function save()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE || isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE ) {
			if (isset($_POST)) {
				$data = [
					'fecha' => $_POST['fecha'],
					'hora' => $_POST['hora'],
					'nombre_cliente' => $_POST['nombre_cliente'],
					'identificacion_cliente' => $_POST['identificacion_cliente'],
					'telefono_cliente' => $_POST['telefono_cliente'],
					'consecutivo' => $_POST['consecutivo'],
					'direccion_cliente' => $_POST['direccion_cliente'],
					'correo_cliente' => $_POST['correo_cliente'],
					'observacion_cliente' => $_POST['observacion_cliente'],
					'observacion_equipo' => $_POST['observacion_equipo'],
					'fecha_pactada' => $_POST['fecha_pactada'],
					'tecnico_asignado' => $_POST['tecnico_asignado'],
					'monto' => $_POST['monto']
				];

				$answerNewService = $this->model->newServiceT($data);
				$lastId = $this->model->getLastId();

				$codigo_producto = $_POST['codigo_producto'];
				$tipo_servicio = $_POST['tipo_servicio'];
				$serie = $_POST['serie'];
				$tipo_equipo = $_POST['tipo_equipo'];
				$marca = $_POST['marca'];
				$modelo = $_POST['modelo'];

				while (true) {
					$item1 = current($codigo_producto);
					$item2 = current($tipo_servicio);
					$item3 = current($serie);
					$item4 = current($tipo_equipo);
					$item5 = current($marca);
					$item6 = current($modelo);

					$cp = (($item1 !== false) ? $item1 : '');
					$ts = (($item2 !== false) ? $item2 : '');
					$s  = (($item3 !== false) ? $item3 : '');
					$tp = (($item4 !== false) ? $item4 : '');
					$mc = (($item5 !== false) ? $item5 : '');
					$md = (($item6 !== false) ? $item6 : '');

					$details = [
						'id_sv'           => $lastId[0]->id,
						'codigo_producto' => $cp,
						'tipo_servicio'   => $ts,
						'serie'           => $s,
						'tipo_equipo'     => $tp,
						'marca'           => $mc,
						'modelo'          => $md,
						'estado'          => 'Tramite'
					];

					if (isset($lastId[0]->id) && $answerNewService == true) {
						$this->model->newDetailService($details);
					}
					
					$item1 = next($codigo_producto);
					$item2 = next($tipo_servicio);
					$item3 = next($serie);
					$item4 = next($tipo_equipo);
					$item5 = next($marca);
					$item6 = next($modelo);

					if ($item1 === false && $item2 === false && $item3 === false && $item4 === false && $item5 === false && $item6 === false) break;
				}

				$dates = $this->model->getAllDetails($lastId[0]->id);
				$services = $this->model->getAllDetailsServices($lastId[0]->id);
				$mail = new PHPMailer(true);
				try {
					$email=$dates['correo_cliente'];   // Add a recipient
		            // $email='steven-0198@hotmail.com';   // Add a recipient
		            $header = "From: Digital MTX SAS <no-responder@digitalmtx.com> \r\n";
		            $header .= "X-Mailer: PHP5/". phpversion()."\n";
		            $header .= 'MIME-Version: 1.0' . "\n";
		            $header .= "Content-Type: text/html; charset=UTF-8";          
		            $asunto="DigitalMTX: Notificacion de servicio tecnico.";


		            $body = '<!DOCTYPE html>
		            <html lang="en" >
		            <head>
		              <meta charset="UTF-8">
		              <title>CodePen - PDF Factura</title>
		              

		            </head>
		            <body>
		            <!-- partial:index.partial.html -->
		            <center>
		              <div style="width: 580px;">
		                <table CELLSPACING=1 CELLPADDING=4 style="border-collapse: collapse; font-size: 8px; line-height: .75; font-family: sans-serif; position: relative;">
		                  <tr>
		                    <td VALIGN="TOP" COLSPAN=4 HEIGHT=20>
		                      <img src="https://www.digitalmtx.com/img/logo2.png" alt="" width="70px">
		                      <div style="display: inline-block; margin-left: 320px;">
		                        <p style="font-weight: bold;">Digital MTX</p>
		                        <p>Fecha de impresion: '.$date['fecha'].'</p>
		                      </div>
		                      <hr>
		                      <p style="font-size:12px; text-align: center; margin-top: 20px;"><b>Comprobante de Servicio tecnico:'.$date['consecutivo'].'</b></p>
		                    </td>
		                  </tr>
		                  <tr>
		                    <td WIDTH="45%" VALIGN="TOP" HEIGHT=36>
		                      <p><b>Nombre</b>'.$date['nombre_nliente'].'</p>
		                      <p><b>Identificacion</b> '.$date['identificacion_cliente'].'</p>
		                      <p><b>Correo:</b> '.$date['correo_cliente'].'</p>
		                      <p><b>Direccion:</b> '.$date['direccion_cliente'].'</p>
		                      
		                    </td>
		                  </tr>
		                </table>

		                <p style="font-size: 12px; text-align: left;"><b><i><u>Productos</u></i></b></p>
		                <table border style="border: 1px solid black; font-family: arial, sans-serif; border-collapse: collapse; width: 100%; font-size: 8px;">
		                  <tr>
		                    <th>Serie</th>
		                    <th>Modelo</th>
		                    <th>Tipo de equipo</th>
		                    <th>Marca</th>
		                  </tr>';
		                  foreach ($services as $service) {
		                  $body .= '<tr>
		                    <td style="text-align:center">'.$service->serie.'</td>
		                    <td style="text-align:center">'.$service->modelo.'</td>
		                    <td style="text-align:center">'.$service->tipo_equipo.'</td>
		                    <td style="text-align:center">'.$service->marca.'</td>
		                  </tr>';
		                }
		                $body .= '</table><br>
		                <div style="display: flex; justify-content: space-between; text-align: left; font-size: 10px;">
		                  <div>
		                    <div style="display:table; margin:auto; text-align:left;">
		                      <p><b>Observacion Equipo:</b> '.$date['observacion_equipo'].'</p>
		                    </div>
		                    <small style="font-size: 6px; justify-content: center;">"Servicio tecnico: El horario de atención es de lunes a viernes de 09:00 a 13:00 en la calle 77 # 16A – 38 Oficina 303¤2)Para el ingreso del producto a garantía el cliente deberá entregar el documento de compra y el producto completo con sus empaques, accesorios, manuales, sin daños físicos que invaliden la garantía. 3)El periodo para dar¤solución a la garantía es de (8) ocho días hábiles, a partir de la fecha de radicado. 4)La Garantía no cubre en los siguientes casos: • Cuando el producto presenta daño físico, por mal uso, mala manipulación, transporte o descuido. • Cuando los sellos de garantía se encuentren removidos o sobre etiquetados remarcados. • Daños causados por descargas eléctricas o uso de voltaje incorrecto. • Daños generados por presencia de elementos nocivos que no forman parte del producto. • Si el cliente ha cambiado el software original de fábrica. 5)Toda garantía que no se reclame en (1) mes a partir de la fecha de ingreso, se hará un cobro de bodegaje, transcurrido los (6) meses será declarada en abandono y se procederá a su destrucción. 6)Si el cliente no presenta el documento de compra del¤producto, deberá presentar un documento relacionando el producto, NIT, fecha de compra, la copia del documento de compra se entregara en un plazo de (5) días hábiles. 7)Para la entrega de la garantía, el cliente presentara el¤formato de garantía original, no se entregara el producto con fotocopia del formato o sin el formato de garantía. 8)El periodo de garantía que cubre Digital MTX a los clientes en los productos son: cargadores de caja roja (2)años, cargadores para Mac y universal (1)año, baterías para portátil (1)año, pantallas para computador (6)meses, teclados (6)meses, baterías para celular (3)meses, pantallas para celular (3)meses. Importante: Al firmar y/o recibir el documento de compra que certifique el despacho correspondiente queda entendido que el cliente acepta incondicionalmente la presente política y condiciones de garantía, renuncia a cualquier tipo de reclamo que no esté considerado en el presente documento. Más información de políticas de garantías en nuestro sitio web https://www.digitalmtx.com o realice sus consultas y/o reclamos en el correo electrónico centrodeservicio@digitalmtx.com"</small>
		                   
		              </div>
		            </center>
		            <!-- partial -->
		              
		            </body>
		            </html>
		            ';
		            mail($email, $asunto, $body, $header);
		            // $mail->Body = $html;

		            // $mail->send();
            		header('Location: ?controller=service&method=sucessfull');
				} catch (Exception $e) {
		        	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		        }
			}
		}else{
			header('Location: ?controller=login');
		}		
	}

	public function edit()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE)  {
			if (isset($_POST['id'])) {
				$id = $_POST['id'];
				require 'Views/Layout.php';
				$data = $this->model->getByid($id);
	            require 'Views/Service/edit.php';
	            require 'Views/Scripts.php';
			}
		}else{
			header('Location: ?controller=login');
		}	
	}

	public function saveEdit()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE)  {
			if (isset($_POST)) {
				$data = [
					'id' => $_POST['id'],
					'fecha' => $_POST['fecha'],
					'hora' => $_POST['hora'],
					'nombre_cliente' => $_POST['nombre_cliente'],
					'identificacion_cliente' => $_POST['identificacion_cliente'],
					'telefono_cliente' => $_POST['telefono_cliente'],
					'consecutivo' => $_POST['consecutivo'],
					'direccion_cliente' => $_POST['direccion_cliente'],
					'correo_cliente' => $_POST['correo_cliente'],
					'observacion_cliente' => $_POST['observacion_cliente'],
					'observacion_equipo' => $_POST['observacion_equipo'],
					'fecha_pactada' => $_POST['fecha_pactada'],
					'tecnico_asignado' => $_POST['tecnico_asignado'],
					'monto' => $_POST['monto']
				];

				$answerEditService = $this->model->editMoneyServices($data);
				//echo $answerEditService; 

				$idDetail = $_POST['idDetail'];
				$codigo_producto = $_POST['codigo_producto'];
				$serie = $_POST['serie'];
				$tipo_equipo = $_POST['tipo_equipo'];
				$marca = $_POST['marca'];
				$modelo = $_POST['modelo'];

				while (true) {
					$item1 = current($codigo_producto);
					$item2 = current($serie);
					$item3 = current($tipo_equipo);
					$item4 = current($marca);
					$item5 = current($modelo);
					$item6 = current($idDetail);

					$cp = (($item1 !== false) ? $item1 : '');
					$s  = (($item2 !== false) ? $item2 : '');
					$tp = (($item3 !== false) ? $item3 : '');
					$mc = (($item4 !== false) ? $item4 : '');
					$md = (($item5 !== false) ? $item5 : '');
					$id = (($item6 !== false) ? $item6 : '');

					$details = [
						'id'              => $id,
						'id_sv'           => $_POST['id'],
						'codigo_producto' => $cp,
						'serie'           => $s,
						'tipo_equipo'     => $tp,
						'marca'           => $mc,
						'modelo'          => $md
					];

					if ($answerEditService == true && $id != null) {
						$this->technical->editStatusServices($details);
					}else{
						unset($details[0]);
						$details['Estado'] = "Tramite";
						$this->model->newDetailService($details);
					}

					$item1 = next($codigo_producto);
					$item2 = next($serie);
					$item3 = next($tipo_equipo);
					$item4 = next($marca);
					$item5 = next($modelo);
					$item6 = next($idDetail);

					if ($item1 === false && $item2 === false && $item3 === false && $item4 === false && $item5 === false && $item6 === false) break;
				}
            	header('Location: ?controller=service&method=sucessfull');
			}
		}else{
			header('Location: ?controller=login');
		}	
	}

	public function sucessfull()
	 {
	    if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE)  {
	      require 'Views/Layout.php';
	      require 'Views/Service/succesfull.php';
	      require 'Views/Scripts.php';
	    }else{
	      header('Location: ?controller=login');
	    } 
	}

	public function consecutive()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE)  {
			if (isset($_POST['id'])) {
	        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
	        $id = $_POST['id'];
	        $dates = $this->model->getByIdSV($id);
	        date_default_timezone_set('America/Bogota');
	        $hora_actual = date("h:i a");
	        /*foreach ($dates as $product) {
	          echo $product->Descripcion_Producto.'<br>';
	        }*/
	        //$productos = [];
	        // foreach ($dates as $producte) {
	          $html = '<!DOCTYPE html>
	          <html lang="en" >
	          <head>
	            <meta charset="UTF-8">
	            <title>Consecutivo</title>
	            <script src="https://kit.fontawesome.com/a076d05399.js"></script>

	          </head>
	          <body>
	          <!-- partial:index.partial.html -->
	          <center>
	            <div style="width: 880px;">
	              <table CELLSPACING=1 CELLPADDING=4 style="border-collapse: collapse; font-size: 8px; line-height: .75; font-family: sans-serif; position: relative;">
	                <tr>
	                  <td VALIGN="TOP" COLSPAN=4 HEIGHT=20>
	                    <img src="https://www.digitalmtx.com/img/logo2.png" alt="" width="70px">
	                    <div style="display: inline-block; margin-left: 320px;">
	                      <p>Fecha de impresion: '.$dates[0]->fecha.'  Hora impresion: '.$hora_actual.'</p>
	                    </div>
	                    <hr>
	                    <p style="font-size:12px; text-align: center; margin-top: 20px;"><b>Comprobante de Servicio tecnico: '.$dates[0]->consecutivo.'</b></p>
	                  </td>
	                </tr>
	                <tr>
	                  <td WIDTH="45%" VALIGN="TOP" HEIGHT=36>
	                    <p><b>Nombre:</b> '.$dates[0]->nombre_cliente.'</p><br>
	                    <p><b>Identificación:</b> '.$dates[0]->identificacion_cliente.'</p><br>
	                    <p><b>Telefono:</b> '.$dates[0]->telefono_cliente.'</p><br>
	                    <p><b>Correo:</b> '.$dates[0]->correo_cliente.'</p><br>
	                  </td>
	                </tr>
	              </table>
	              
	              <p style="font-size: 12px; text-align: left;"><b><i><u>Productos</u></i></b></p>
	              <table border style="border: 1px solid black; font-family: arial, sans-serif; border-collapse: collapse; width: 100%; font-size: 8px;">
	                <tr>
	                    <th>Serie</th>
		                <th>Modelo</th>
		                <th>Tipo de equipo</th>
		                <th>Marca</th>
	                </tr>';
	                foreach ($dates as $producte){ 
	               $html .= '<tr style="text-align:center">
	                          <th>'.$producte->serie.'</th><br>
	                          <th>'.$producte->modelo.'</th><br>
	                          <th>'.$producte->tipo_equipo.'</th><br> 
	                          <th>'.$producte->marca.'</th><br>
	                        </tr>';
	                }
	              $html .= '</table><br>

	              <div style="display: flex; justify-content: space-between; text-align: left; font-size: 10px;">
	                <div>
	                  <div style="display:table; margin:auto; text-align:left;">
	                    <p><b>Observacion Equipo:</b> '.$dates[0]->observacion_equipo.'</p><br>
	                  </div>
	               <small style="font-size: 6px; justify-content: center;">"Servicio tecnico: El horario de atención es de lunes a viernes de 09:00 a 13:00 en la calle 77 # 16A – 38 Oficina 303¤2)Para el ingreso del producto a garantía el cliente deberá entregar el documento de compra y el producto completo con sus empaques, accesorios, manuales, sin daños físicos que invaliden la garantía. 3)El periodo para dar solución a la garantía es de (8) ocho días hábiles, a partir de la fecha de radicado. 4)La Garantía no cubre en los siguientes casos: • Cuando el producto presenta daño físico, por mal uso, mala manipulación, transporte o descuido. • Cuando los sellos de garantía se encuentren removidos o sobre etiquetados remarcados. • Daños causados por descargas eléctricas o uso de voltaje incorrecto. • Daños generados por presencia de elementos nocivos que no forman parte del producto. • Si el cliente ha cambiado el software original de fábrica. 5)Toda garantía que no se reclame en (1) mes a partir de la fecha de ingreso, se hará un cobro de bodegaje, transcurrido los (6) meses será declarada en abandono y se procederá a su destrucción. 6)Si el cliente no presenta el documento de compra del¤producto, deberá presentar un documento relacionando el producto, NIT, fecha de compra, la copia del documento de compra se entregara en un plazo de (5) días hábiles. 7)Para la entrega de la garantía, el cliente presentara el¤formato de garantía original, no se entregara el producto con fotocopia del formato o sin el formato de garantía. 8)El periodo de garantía que cubre Digital MTX a los clientes en los productos son: cargadores de caja roja (2)años, cargadores para Mac y universal (1)año, baterías para portátil (1)año, pantallas para computador (6)meses, teclados (6)meses, baterías para celular (3)meses, pantallas para celular (3)meses. Importante: Al firmar y/o recibir el documento de compra que certifique el despacho correspondiente queda entendido que el cliente acepta incondicionalmente la presente política y condiciones de garantía, renuncia a cualquier tipo de reclamo que no esté considerado en el presente documento. Más información de políticas de garantías en nuestro sitio web https://www.digitalmtx.com o realice sus consultas y/o reclamos en el correo electrónico centrodeservicio@digitalmtx.com"</small> <br><br><br><br>
	               <p style="text-align:center;">Original</p>  
	            <img src="https://www.digitalmtx.com/img/logo2.png" width="10"> __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __
	          <!-- partial -->
	          <br><br><br><br>
	          <div style="width: 880px;">
	          <table CELLSPACING=1 CELLPADDING=4 style="border-collapse: collapse; font-size: 8px; line-height: .75; font-family: sans-serif; position: relative;">
	                <tr>
	                  <td VALIGN="TOP" COLSPAN=4 HEIGHT=20>
	                    <img src="https://www.digitalmtx.com/img/logo2.png" alt="" width="70px">
	                    <div style="display: inline-block; margin-left: 320px;">
	                      <p>Fecha de impresion: '.$dates[0]->fecha.'  Hora impresion: '.$hora_actual.'</p>
	                    </div>
	                    <hr>
	                    <p style="font-size:12px; text-align: center; margin-top: 20px;"><b>Comprobante de Servicio tecnico: '.$dates[0]->consecutivo.'</b></p>
	                  </td>
	                </tr>
	                <tr>
	                  <td WIDTH="45%" VALIGN="TOP" HEIGHT=36>
	                    <p><b>Nombre:</b> '.$dates[0]->nombre_cliente.'</p><br>
	                    <p><b>Identificación:</b> '.$dates[0]->identificacion_cliente.'</p><br>
	                    <p><b>Direccion:</b> '.$dates[0]->direccion_cliente.'</p><br>
	                    <p><b>Correo:</b> '.$dates[0]->correo_cliente.'</p><br>
	                  </td>
	                </tr>
	              </table>
	              
	              <p style="font-size: 12px; text-align: left;"><b><i><u>Productos</u></i></b></p>
	              <table border style="border: 1px solid black; font-family: arial, sans-serif; border-collapse: collapse; width: 100%; font-size: 8px;">
	                <tr>
	                    <th>Serie</th>
		                <th>Modelo</th>
		                <th>Tipo de equipo</th>
		                <th>Marca</th>
	                </tr>';
	                foreach ($dates as $producte){ 
	               $html .= '<tr style="text-align:center">
	                          <th>'.$producte->serie.'</th><br>
	                          <th>'.$producte->modelo.'</th><br>
	                          <th>'.$producte->tipo_equipo.'</th><br>
	                          <th>'.$producte->marca.'</th><br>
	                        </tr>';
	                }
	              $html .= '</table><br>

	              <div style="display: flex; justify-content: space-between; text-align: left; font-size: 10px;">
	                <div>
	                  <div style="display:table; margin:auto; text-align:left;">
	                    <p><b>Observacion Garantia:</b> '.$dates[0]->observacion_equipo.'</p><br>
	                  </div>
	               <small style="font-size: 6px; justify-content: center;">"Servicio tecnico: El horario de atención es de lunes a viernes de 09:00 a 13:00 en la calle 77 # 16A – 38 Oficina 303¤2)Para el ingreso del producto a garantía el cliente deberá entregar el documento de compra y el producto completo con sus empaques, accesorios, manuales, sin daños físicos que invaliden la garantía. 3)El periodo para dar solución a la garantía es de (8) ocho días hábiles, a partir de la fecha de radicado. 4)La Garantía no cubre en los siguientes casos: • Cuando el producto presenta daño físico, por mal uso, mala manipulación, transporte o descuido. • Cuando los sellos de garantía se encuentren removidos o sobre etiquetados remarcados. • Daños causados por descargas eléctricas o uso de voltaje incorrecto. • Daños generados por presencia de elementos nocivos que no forman parte del producto. • Si el cliente ha cambiado el software original de fábrica. 5)Toda garantía que no se reclame en (1) mes a partir de la fecha de ingreso, se hará un cobro de bodegaje, transcurrido los (6) meses será declarada en abandono y se procederá a su destrucción. 6)Si el cliente no presenta el documento de compra del¤producto, deberá presentar un documento relacionando el producto, NIT, fecha de compra, la copia del documento de compra se entregara en un plazo de (5) días hábiles. 7)Para la entrega de la garantía, el cliente presentara el¤formato de garantía original, no se entregara el producto con fotocopia del formato o sin el formato de garantía. 8)El periodo de garantía que cubre Digital MTX a los clientes en los productos son: cargadores de caja roja (2)años, cargadores para Mac y universal (1)año, baterías para portátil (1)año, pantallas para computador (6)meses, teclados (6)meses, baterías para celular (3)meses, pantallas para celular (3)meses. Importante: Al firmar y/o recibir el documento de compra que certifique el despacho correspondiente queda entendido que el cliente acepta incondicionalmente la presente política y condiciones de garantía, renuncia a cualquier tipo de reclamo que no esté considerado en el presente documento. Más información de políticas de garantías en nuestro sitio web https://www.digitalmtx.com o realice sus consultas y/o reclamos en el correo electrónico centrodeservicio@digitalmtx.com"</small> <br><br><br><br>
	               <p style="text-align:center;">Copia</p>

	                   
	          </body>
	          </html>
	          ';
	          $mpdf->WriteHTML($html);
	        // }
	        $mpdf->Output();
	      }
		}else{
	      header('Location: ?controller=login');
	    }	
	}

	public function ticket()
    {
	    if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
	      if (isset($_REQUEST['id'])) {
	        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8' , 'format' => [44, 60]]);
	        $id = $_REQUEST['id'];
	        $data = $this->model->getByIdSV($id);
	        foreach ($data as $product) {
	          $html = '<div style="width: 1880px;">
	                    <table CELLSPACING=1 CELLPADDING=4 style="border-collapse: collapse; font-size: 68px; line-height: .75; font-family: sans-serif; position: relative;">
	                          <tr>
	                            <td WIDTH="100%" VALIGN="TOP" HEIGHT=66>
	                              <P><b>Consecutivo: </b>'.$product->consecutivo.'</p><br>
	                              <P><b>Fecha de ingreso: </b>'.$product->fecha.'</p><br>
	                              <P><b>Referencia: </b>'.$product->serie.'</p><br>
	                              <P><b>Numero Factura: </b>'.$product->marca.'</p><br>
	                            </td>
	                          </tr>
	                        </table>
	                  </div>';
	          $mpdf->AddPage('L');
	          $mpdf->WriteHTML($html);
	        }
	        $mpdf->Output();
	      }
	    }else{
	      header('Location: ?controller=login');
	    }
	}

	public function detailsReparation()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			if ($_GET) {
				$name = $_GET['name'];
				$id = $_GET['id'];
				require 'Views/Layout.php';
				$data = $this->model->getByIdDetails($name,$id);
				require 'Views/service/detailsReparation.php';
				require 'Views/Scripts.php';
			}
		}else{
	      header('Location: ?controller=login');
	    }
	}

	public function prefinish()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			require 'Views/Layout.php';
			$details = $this->model->getAllPreFinish();
			require 'Views/Service/prefinish.php';
			require 'Views/Scripts.php';
		}else{
	      header('Location: ?controller=login');
	    }	
	}

	public function detailsPreFinish()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			if ($_GET['name']) {
				$name = $_GET['name'];
				$id = $_GET['id'];
				require 'Views/Layout.php';
				$data = $this->model->getByIdTecRevision($name,$id);
				require 'Views/Service/detailsPreFinish.php';
				require 'Views/Scripts.php';
			}
		}else{
	      header('Location: ?controller=login');
	    }	
	}

	public function savePre()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			if ($_POST) {
				$dates = [
					'id' => $_POST['id'],
					'estado' => $_POST['estado']
				];
				$dateMoney = [
					'id' => $_POST['id_sv'],
					'monto_final' => $_POST['monto_final'] 
				];
				$this->technical->editStatusServices($dates);
				$this->model->editMoneyServices($dateMoney);
				$data = $this->model->getByIdSV($_POST['id']);
				$mail = new PHPMailer(true);
				try {
					$email=$data['correo_cliente'];   // Add a recipient
				    	// $email='steven-0198@hotmail.com';   // Add a recipient
		            $header = "From: Digital MTX SAS <no-responder@digitalmtx.com> \r\n";
		            $header .= "X-Mailer: PHP5/". phpversion()."\n";
		            $header .= 'MIME-Version: 1.0' . "\n";
		            $header .= "Content-Type: text/html; charset=UTF-8";          
		            $asunto="DigitalMTX: Notificacion de servicio tecnico.";

				    $body    = '
					  <!DOCTYPE html>
					  <html lang="en" >
					  <head>
						<meta charset="UTF-8">
						<title>Digital MTX Garantias</title>
						<style type="text/css">
					  @media only screen and (max-width: 600px) {
						  .main {
							  width: 320px !important;
						  }
						  .top-image {
							  width: 100% !important;
						  }
						  .inside-footer {
							  width: 320px !important;
						  }
						  table[class="contenttable"] {
							  width: 320px !important;
							  text-align: left !important;
						  }
						  td[class="force-col"] {
							  display: block !important;
						  }
						  td[class="rm-col"] {
							  display: none !important;
						  }
						  .mt {
							  margin-top: 15px !important;
						  }
						  *[class].width300 {
							  width: 255px !important;
						  }
						  *[class].block {
							  display: block !important;
						  }
						  *[class].blockcol {
							  display: none !important;
						  }
						  .emailButton {
							  width: 100% !important;
						  }
						  .emailButton a {
							  display: block !important;
							  font-size: 18px !important;
						  }
					  }
					  </style>
					  
					  </head>
					  <body>
					  <!-- partial:index.partial.html -->
					  <body link="#00a5b5" vlink="#00a5b5" alink="#00a5b5">
					  
					  <table class=" main contenttable" align="center" style="font-weight: normal;border-collapse: collapse;border: 0;margin-left: auto;margin-right: auto;padding: 0;font-family: Arial, sans-serif;color: #555559;background-color: white;font-size: 16px;line-height: 26px;width: 600px;">
						  <tr>
							<td class="border" style="border-collapse: collapse;border: 1px solid #eeeff0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
							  <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
								<tr>
								  <td colspan="4" valign="top" class="image-section" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background-color: #fff;border-bottom: 4px solid  #F44336">
									<a href="https://www.digitalmtx.com/"><img class="top-image" src="https://www.digitalmtx.com/img/logo2.png" style="line-height:100;width: 100px;" alt="Digital MTX"></a>
									<p style="float: right;">Hora modificado: '.$hora_actual.'</p>
								  </td>
								</tr>
								<tr>
								  <td valign="top" class="side title" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;vertical-align: top;background-color: white;border-top: none;">
									<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
									  <tr>
										<td class="head-title" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 28px;line-height: 34px;font-weight: bold; text-align: center;">
										  <div class="mktEditable" id="main_title">
											Proceso de la Garantia:'.$data->consecutivo.'
										  </div>
										</td>
									  </tr>
									  <tr>
										<td class="sub-title" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;padding-top:5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 18px;line-height: 29px;font-weight: bold;text-align: center;">
										<div class="mktEditable" id="intro_title">
										  Estimado Usuario
										</div></td>
									  </tr>
									  <tr>
										<td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;"></td>
									  </tr>
									  
									  <tr>
										<td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 15px 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 21px;">
										  <hr size="1" color="#eeeff0">
										</td>
									  </tr>
									  <tr>
										<td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
										<div class="mktEditable" id="main_text">
						
					  
										  Su actual estado de la garantia se encuentra en '.$data->estado .'<br><br>
										  
										</div>
										</td>
									  </tr>
									  <tr>
										<td style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
										 &nbsp;<br>
										</td>
									  </tr>
									  
					  
									</table>
								  </td>
								</tr>			
								<tr bgcolor="#fff" style="border-top: 4px solid  #F44336;">
								  <td valign="top" class="footer" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background: #fff;text-align: center;">
									<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
									  <tr>
										<td class="inside-footer" align="center" valign="middle" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 12px;line-height: 16px;vertical-align: middle;text-align: center;width: 580px;">
					  <div id="address" class="mktEditable">
				        <b>Digital MTX</b><br>
		                    2020<br> 
					    Para mas informacion consulte <a style="color: #F44336;" href="https://digitalmtx.com/garantias/?controller=client&method=list1">aqui</a> su estado de garantia
					  </div>
										</td>
									  </tr>
									</table>
								  </td>
								</tr>
							  </table>
							</td>
						  </tr>
						</table>
						</body>
					  <!-- partial -->
						
					  </body>
					  </html>
					  ';
				    mail($email, $asunto, $body, $header);
					header('Location: ?controller=service&method=prefinish');
				} catch (Exception $e) {
			      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			    }
			}
		}else{
	      header('Location: ?controller=login');
	    }	
	}

	public function story()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			require 'Views/Layout.php';
			$data = $this->model->getByIdStory();
			require 'Views/Service/story.php';
			require 'Views/Scripts.php';
		}else{
	      header('Location: ?controller=login');
	    }	
	}

	public function details()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			if ($_POST) {
				$id = $_POST['id'];
				$name = $_POST['name'];
				require 'Views/Layout.php';
				$data = $this->model->getByIdDetails($name,$id);
				require 'Views/Service/detailsStory.php';
				require 'Views/Scripts.php';
			}
		}else{
	      header('Location: ?controller=login');
	    }	
	}

	public function excelComplete()
	{          
	    $timestamp = time();
	    $filename = 'Servicios_tecnicos_' . $timestamp . '.xls';
	    
	    header("Pragma: public");
	    header("Expires: 0");
	    header("Content-type: application/x-msdownload");
	    header("Content-Type: text/csv; charset-utf8");
	    header("Content-Disposition: attachment; filename=\"$filename\"");
	    header("Pragma: no-cache");
	    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	    
	    $isPrintHeader = false;
	    $productResult = $this->model->getComplete();
	    
	    if ( !$isPrintHeader ) {
	        $html = '<table>
	                <thead>
	                    <tr>
	                        <th>Consecutivo</th>
	                        <th>Fecha ingreso</th>
	                        <th>Hora ingreso</th>
	                        <th>Nombre Cliente</th>
	                        <th>Identificacion Cliente</th>
	                        <th>Correo Cliente</th>
	                        <th>Telefono Cliente</th>
	                        <th>Observacion Tecnico</th>
	                        <th>Empleado</th>
	                        <th>Codigo Producto</th>
	                        <th>Tipo Producto</th>
	                        <th>Marca Producto</th>
	                        <th>Serie Producto</th>
	                        <th>Observacion Cliente</th>
	                        <th>Estado</th>
	                        <th>Fecha anexo Tecnico</th>
	                        <th>Hora Anexo Tecnico</th>
	                        <th>Informe tecnico</th>
	                        <th>Nombre tercero</th>
	                        <th>Orden tercero</th>
	                        <th>Monto tercero</th>
	                        <th>¿Por que se mando al tercero?</th>
	                    </tr>
	                </thead>
	                <tbody>';
	                foreach ($productResult as $garanty) {
	                  $html .= '<tr>
	                    <td>'.$garanty->consecutivo.'</td>
	                    <td>'.$garanty->fecha.'</td>
	                    <td>'.$garanty->hora.'</td>
	                    <td>'.$garanty->nombre_cliente.'</td>
	                    <td>'.$garanty->identificacion_cliente.'</td>
	                    <td>'.$garanty->correo_cliente.'</td>
	                    <td>'.$garanty->telefono_cliente.'</td>
	                    <td>'.$garanty->informe_tecnico.'</td>
	                    <td>'.$garanty->tecnico_asignado.'</td>
	                    <td>'.$garanty->codigo_producto.'</td>
	                    <td>'.$garanty->tipo_equipo.'</td>
	                    <td>'.$garanty->marca.'</td>
	                    <td>'.$garanty->serie.'</td>
	                    <td>'.$garanty->observacion_cliente.'</td>
	                    <td>'.$garanty->estado.'</td>
	                    <td>'.$garanty->fecha_tec.'</td>
	                    <td>'.$garanty->hora_tec.'</td>
	                    <td>'.$garanty->informe_tecnico.'</td>
	                    <td>'.$garanty->nombre_tercero.'</td>
	                    <td>'.$garanty->orden_tercero.'</td>
	                    <td>'.$garanty->monto_tercero.'</td>
	                    <td>'.$garanty->observacion_razon_tercero.'</td>
	                  </tr>';
	                }  
	                $html .= '</tbody>
	            </table>';
	        echo $html;    
	        $isPrintHeader = true;
	    }
	    exit();
	}

	public function third()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			require 'Views/Layout.php';
			$data = $this->model->getAllThird();
			require 'Views/Service/third.php';
			require 'Views/Scripts.php';
		}else{
	      header('Location: ?controller=login'); 
	    }	
	}

	public function detailsThird()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			if ($_REQUEST['id']) {
				$id = $_REQUEST['id'];
				require 'Views/Layout.php';
				$providers = $this->provider->getAll();
				$data = $this->model->getAllDetailsThird($id);
				require 'Views/Service/detailsThird.php';
				require 'Views/Scripts.php';
			}
		}else{
	      header('Location: ?controller=login');
	    }
	}

	public function saveThird()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			$data = [];
			if (isset($_POST['nombre_tercero'])) {
				$data = [
					'id'             => $_POST['id_sv'],
					'nombre_tercero' => $_POST['nombre_tercero1'],
					'orden_tercero'             => $_POST['orden_tercero'],
				    'monto_tercero'             => $_POST['monto_tercero'],
				    'observacion_razon_tercero' => $_POST['observacion_razon_tercero']
				];
			}
			$data1 = [
				'id'                        => $_POST['id_sv'],
				'estado'                    => 'Tercero remitido'
			];
			$this->technical->editStatusServicesThird($data);
			$this->technical->editStatusServices($data1);
			$data = $this->model->getByIdSV($_POST['id_sv']);
			$mail = new PHPMailer(true);
			try {
				$email=$data['correo_cliente'];   // Add a recipient
			    	// $email='steven-0198@hotmail.com';   // Add a recipient
	            $header = "From: Digital MTX SAS <no-responder@digitalmtx.com> \r\n";
	            $header .= "X-Mailer: PHP5/". phpversion()."\n";
	            $header .= 'MIME-Version: 1.0' . "\n";
	            $header .= "Content-Type: text/html; charset=UTF-8";          
	            $asunto="DigitalMTX: Notificacion de servicio tecnico.";

			    $body    = '
				  <!DOCTYPE html>
				  <html lang="en" >
				  <head>
					<meta charset="UTF-8">
					<title>Digital MTX Garantias</title>
					<style type="text/css">
				  @media only screen and (max-width: 600px) {
					  .main {
						  width: 320px !important;
					  }
					  .top-image {
						  width: 100% !important;
					  }
					  .inside-footer {
						  width: 320px !important;
					  }
					  table[class="contenttable"] {
						  width: 320px !important;
						  text-align: left !important;
					  }
					  td[class="force-col"] {
						  display: block !important;
					  }
					  td[class="rm-col"] {
						  display: none !important;
					  }
					  .mt {
						  margin-top: 15px !important;
					  }
					  *[class].width300 {
						  width: 255px !important;
					  }
					  *[class].block {
						  display: block !important;
					  }
					  *[class].blockcol {
						  display: none !important;
					  }
					  .emailButton {
						  width: 100% !important;
					  }
					  .emailButton a {
						  display: block !important;
						  font-size: 18px !important;
					  }
				  }
				  </style>
				  
				  </head>
				  <body>
				  <!-- partial:index.partial.html -->
				  <body link="#00a5b5" vlink="#00a5b5" alink="#00a5b5">
				  
				  <table class=" main contenttable" align="center" style="font-weight: normal;border-collapse: collapse;border: 0;margin-left: auto;margin-right: auto;padding: 0;font-family: Arial, sans-serif;color: #555559;background-color: white;font-size: 16px;line-height: 26px;width: 600px;">
					  <tr>
						<td class="border" style="border-collapse: collapse;border: 1px solid #eeeff0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
						  <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
							<tr>
							  <td colspan="4" valign="top" class="image-section" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background-color: #fff;border-bottom: 4px solid  #F44336">
								<a href="https://www.digitalmtx.com/"><img class="top-image" src="https://www.digitalmtx.com/img/logo2.png" style="line-height:100;width: 100px;" alt="Digital MTX"></a>
								<p style="float: right;">Hora modificado: '.$hora_actual.'</p>
							  </td>
							</tr>
							<tr>
							  <td valign="top" class="side title" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;vertical-align: top;background-color: white;border-top: none;">
								<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
								  <tr>
									<td class="head-title" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 28px;line-height: 34px;font-weight: bold; text-align: center;">
									  <div class="mktEditable" id="main_title">
										Proceso de la Garantia:'.$data->consecutivo.'
									  </div>
									</td>
								  </tr>
								  <tr>
									<td class="sub-title" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;padding-top:5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 18px;line-height: 29px;font-weight: bold;text-align: center;">
									<div class="mktEditable" id="intro_title">
									  Estimado Usuario
									</div></td>
								  </tr>
								  <tr>
									<td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;"></td>
								  </tr>
								  
								  <tr>
									<td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 15px 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 21px;">
									  <hr size="1" color="#eeeff0">
									</td>
								  </tr>
								  <tr>
									<td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
									<div class="mktEditable" id="main_text">
					
				  
									  Su actual estado de la garantia se encuentra en '.$data->estado .'<br><br>
									  
									</div>
									</td>
								  </tr>
								  <tr>
									<td style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
									 &nbsp;<br>
									</td>
								  </tr>
								  
				  
								</table>
							  </td>
							</tr>			
							<tr bgcolor="#fff" style="border-top: 4px solid  #F44336;">
							  <td valign="top" class="footer" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background: #fff;text-align: center;">
								<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
								  <tr>
									<td class="inside-footer" align="center" valign="middle" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 12px;line-height: 16px;vertical-align: middle;text-align: center;width: 580px;">
				  <div id="address" class="mktEditable">
			        <b>Digital MTX</b><br>
	                    2020<br> 
				    Para mas informacion consulte <a style="color: #F44336;" href="https://digitalmtx.com/garantias/?controller=client&method=list1">aqui</a> su estado de garantia
				  </div>
									</td>
								  </tr>
								</table>
							  </td>
							</tr>
						  </table>
						</td>
					  </tr>
					</table>
					</body>
				  <!-- partial -->
					
				  </body>
				  </html>
				  ';
			    mail($email, $asunto, $body, $header);
				header('Location: ?controller=service&method=third');
			} catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}	
		}else{
	      header('Location: ?controller=login');
	    }	
	}

	public function detailsThirdComing()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			if ($_POST['id']) {
				$id = $_POST['id'];
				require 'Views/Layout.php';
				$data = $this->model->getAllDetailsThird($id);
				require 'Views/Service/detailsThirdComing.php';
				require 'Views/Scripts.php';
			}
		}else{
	      header('Location: ?controller=login');
	    }	
	}

	public function saveThirdComing()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			if ($_POST) {
				$data = [
					'id' => $_POST['id_sv'],
					'estado' => $_POST['estado_tecnico']
				];
				$this->technical->editStatusServices($data);
				header('Location: ?controller=service&method=third');
			}
		}else{
	      header('Location: ?controller=login');
	    }
	}

	public function finish()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			require 'Views/Layout.php';
			$data = $this->model->getAllFinish(); 
			require 'Views/Service/finish.php';
			require 'Views/Scripts.php';
		}else{
	      header('Location: ?controller=login');
	    }	
	}

	public function detailsFinish()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			if ($_GET['id']) {
				$id = $_GET['id'];
				require 'Views/Layout.php';
				$data = $this->model->getByIdTecRevisionFinale($id);
				//$countPreFinish = count($data);
				//echo $countPreFinish;
				$status = [];
				foreach ($data as $finish) {
					$status[] = $finish->estado;		
				}
				
				$indexR = array_search('Reparación terminada', $status);
				$indexT = array_search('Tramite', $status);
				$indexThird = array_search('Se pasa a un tercero', $status);
				//var_dump($status);
				if (empty($indexR) && empty($indexT) && empty($indexThird)) {
					//echo $indexR;
					//echo $indexT;
					require 'Views/Service/detailsFinish.php';
				}else{
					//echo $indexR.'<br>';
					//echo $indexT;
					require 'Views/Service/lackFinish.php';
				}
				require 'Views/Scripts.php';
			}
		}else{
	      header('Location: ?controller=login');
	    }	
	}

	public function saveFi()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			if ($_POST) {
				$id = $_POST['id'];
				while (TRUE) {
					$item1 = current($id);
					$cp = (($item1 !== false) ? $item1 : '');
					$data = [ 
					'id'     => $cp,
					'estado' => $_POST['estado']
					];
					$respChangeStatus = $this->technical->editStatusServices1($data);
					$item1 = next($id);
					if ($item1 === false)break;
				}
				$data = $this->model->getByIdSV($_POST['id']);
				$mail = new PHPMailer(true);
				try {
					$email=$data['correo_cliente'];   // Add a recipient
				    	// $email='steven-0198@hotmail.com';   // Add a recipient
		            $header = "From: Digital MTX SAS <no-responder@digitalmtx.com> \r\n";
		            $header .= "X-Mailer: PHP5/". phpversion()."\n";
		            $header .= 'MIME-Version: 1.0' . "\n";
		            $header .= "Content-Type: text/html; charset=UTF-8";          
		            $asunto="DigitalMTX: Notificacion de servicio tecnico.";

				    $body    = '
					  <!DOCTYPE html>
					  <html lang="en" >
					  <head>
						<meta charset="UTF-8">
						<title>Digital MTX Garantias</title>
						<style type="text/css">
					  @media only screen and (max-width: 600px) {
						  .main {
							  width: 320px !important;
						  }
						  .top-image {
							  width: 100% !important;
						  }
						  .inside-footer {
							  width: 320px !important;
						  }
						  table[class="contenttable"] {
							  width: 320px !important;
							  text-align: left !important;
						  }
						  td[class="force-col"] {
							  display: block !important;
						  }
						  td[class="rm-col"] {
							  display: none !important;
						  }
						  .mt {
							  margin-top: 15px !important;
						  }
						  *[class].width300 {
							  width: 255px !important;
						  }
						  *[class].block {
							  display: block !important;
						  }
						  *[class].blockcol {
							  display: none !important;
						  }
						  .emailButton {
							  width: 100% !important;
						  }
						  .emailButton a {
							  display: block !important;
							  font-size: 18px !important;
						  }
					  }
					  </style>
					  
					  </head>
					  <body>
					  <!-- partial:index.partial.html -->
					  <body link="#00a5b5" vlink="#00a5b5" alink="#00a5b5">
					  
					  <table class=" main contenttable" align="center" style="font-weight: normal;border-collapse: collapse;border: 0;margin-left: auto;margin-right: auto;padding: 0;font-family: Arial, sans-serif;color: #555559;background-color: white;font-size: 16px;line-height: 26px;width: 600px;">
						  <tr>
							<td class="border" style="border-collapse: collapse;border: 1px solid #eeeff0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
							  <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
								<tr>
								  <td colspan="4" valign="top" class="image-section" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background-color: #fff;border-bottom: 4px solid  #F44336">
									<a href="https://www.digitalmtx.com/"><img class="top-image" src="https://www.digitalmtx.com/img/logo2.png" style="line-height:100;width: 100px;" alt="Digital MTX"></a>
									<p style="float: right;">Hora modificado: '.$hora_actual.'</p>
								  </td>
								</tr>
								<tr>
								  <td valign="top" class="side title" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;vertical-align: top;background-color: white;border-top: none;">
									<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
									  <tr>
										<td class="head-title" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 28px;line-height: 34px;font-weight: bold; text-align: center;">
										  <div class="mktEditable" id="main_title">
											Proceso de la Garantia:'.$data->consecutivo.'
										  </div>
										</td>
									  </tr>
									  <tr>
										<td class="sub-title" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;padding-top:5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 18px;line-height: 29px;font-weight: bold;text-align: center;">
										<div class="mktEditable" id="intro_title">
										  Estimado Usuario
										</div></td>
									  </tr>
									  <tr>
										<td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;"></td>
									  </tr>
									  
									  <tr>
										<td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 15px 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 21px;">
										  <hr size="1" color="#eeeff0">
										</td>
									  </tr>
									  <tr>
										<td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
										<div class="mktEditable" id="main_text">
						
					  
										  Su actual estado de la garantia se encuentra en '.$data->estado .'<br><br>
										  
										</div>
										</td>
									  </tr>
									  <tr>
										<td style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
										 &nbsp;<br>
										</td>
									  </tr>
									  
					  
									</table>
								  </td>
								</tr>			
								<tr bgcolor="#fff" style="border-top: 4px solid  #F44336;">
								  <td valign="top" class="footer" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background: #fff;text-align: center;">
									<table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
									  <tr>
										<td class="inside-footer" align="center" valign="middle" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 12px;line-height: 16px;vertical-align: middle;text-align: center;width: 580px;">
					  <div id="address" class="mktEditable">
				        <b>Digital MTX</b><br>
		                    2020<br> 
					    Para mas informacion consulte <a style="color: #F44336;" href="https://digitalmtx.com/garantias/?controller=client&method=list1">aqui</a> su estado de garantia
					  </div>
										</td>
									  </tr>
									</table>
								  </td>
								</tr>
							  </table>
							</td>
						  </tr>
						</table>
						</body>
					  <!-- partial -->
						
					  </body>
					  </html>
					  ';
				    mail($email, $asunto, $body, $header);
					header('Location: ?controller=service&method=finish');
				} catch (Exception $e) {
			      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			    }
			}
		}else{
	      header('Location: ?controller=login');
	    }
	}
}