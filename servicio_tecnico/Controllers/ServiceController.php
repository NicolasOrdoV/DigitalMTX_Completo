<?php

require 'Models/Service.php';
require 'Models/Mark.php';
require 'Models/User.php';
require 'Models/Product.php';
require 'Models/Employee.php';
require 'Models/TechnicalR.php';

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

	public function __construct()
	{
		$this->model = new Service;
		$this->mark = new Mark;
		$this->user = new User;
		$this->product = new Product;
		$this->employee = new Employee;
		$this->technical = new Technical;
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
					'correo_cliente' => $_POST['correo_cliente'],
					'observacion_cliente' => $_POST['observacion_cliente'],
					'observacion_equipo' => $_POST['observacion_equipo'],
					'fecha_pactada' => $_POST['fecha_pactada'],
					'tecnico_asignado' => $_POST['tecnico_asignado'],
					'monto' => $_POST['monto']
				];

				$answerNewService = $this->model->newService($data);
				$lastId = $this->model->getLastId();

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

					$cp = (($item1 !== false) ? $item1 : '');
					$s  = (($item2 !== false) ? $item2 : '');
					$tp = (($item3 !== false) ? $item3 : '');
					$mc = (($item4 !== false) ? $item4 : '');
					$md = (($item5 !== false) ? $item5 : '');

					$details = [
						'id_sv'           => $lastId[0]->id,
						'codigo_producto' => $cp,
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
					$item2 = next($serie);
					$item3 = next($tipo_equipo);
					$item4 = next($marca);
					$item5 = next($modelo);

					if ($item1 === false && $item2 === false && $item3 === false && $item4 === false && $item5 === false) break;
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
		            $asunto="DigitalMTX: Notificacion de garantia.";


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
		                      <p><b>Observacion Garantia:</b> '.$date['observacion_equipo'].'</p>
		                    </div>
		                    <small style="font-size: 6px; justify-content: center;">"Garantía: El horario de atención es de lunes a viernes de 09:00 a 13:00 en la calle 77 # 16A – 38 Oficina 303¤2)Para el ingreso del producto a garantía el cliente deberá entregar el documento de compra y el producto completo con sus empaques, accesorios, manuales, sin daños físicos que invaliden la garantía. 3)El periodo para dar¤solución a la garantía es de (8) ocho días hábiles, a partir de la fecha de radicado. 4)La Garantía no cubre en los siguientes casos: • Cuando el producto presenta daño físico, por mal uso, mala manipulación, transporte o descuido. • Cuando los sellos de garantía se encuentren removidos o sobre etiquetados remarcados. • Daños causados por descargas eléctricas o uso de voltaje incorrecto. • Daños generados por presencia de elementos nocivos que no forman parte del producto. • Si el cliente ha cambiado el software original de fábrica. 5)Toda garantía que no se reclame en (1) mes a partir de la fecha de ingreso, se hará un cobro de bodegaje, transcurrido los (6) meses será declarada en abandono y se procederá a su destrucción. 6)Si el cliente no presenta el documento de compra del¤producto, deberá presentar un documento relacionando el producto, NIT, fecha de compra, la copia del documento de compra se entregara en un plazo de (5) días hábiles. 7)Para la entrega de la garantía, el cliente presentara el¤formato de garantía original, no se entregara el producto con fotocopia del formato o sin el formato de garantía. 8)El periodo de garantía que cubre Digital MTX a los clientes en los productos son: cargadores de caja roja (2)años, cargadores para Mac y universal (1)año, baterías para portátil (1)año, pantallas para computador (6)meses, teclados (6)meses, baterías para celular (3)meses, pantallas para celular (3)meses. Importante: Al firmar y/o recibir el documento de compra que certifique el despacho correspondiente queda entendido que el cliente acepta incondicionalmente la presente política y condiciones de garantía, renuncia a cualquier tipo de reclamo que no esté considerado en el presente documento. Más información de políticas de garantías en nuestro sitio web https://www.digitalmtx.com o realice sus consultas y/o reclamos en el correo electrónico centrodeservicio@digitalmtx.com"</small>
		                   
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
	                    <p><b>Observacion Garantia:</b> '.$dates[0]->observacion_equipo.'</p><br>
	                  </div>
	               <small style="font-size: 6px; justify-content: center;">"Garantía: El horario de atención es de lunes a viernes de 09:00 a 13:00 en la calle 77 # 16A – 38 Oficina 303¤2)Para el ingreso del producto a garantía el cliente deberá entregar el documento de compra y el producto completo con sus empaques, accesorios, manuales, sin daños físicos que invaliden la garantía. 3)El periodo para dar solución a la garantía es de (8) ocho días hábiles, a partir de la fecha de radicado. 4)La Garantía no cubre en los siguientes casos: • Cuando el producto presenta daño físico, por mal uso, mala manipulación, transporte o descuido. • Cuando los sellos de garantía se encuentren removidos o sobre etiquetados remarcados. • Daños causados por descargas eléctricas o uso de voltaje incorrecto. • Daños generados por presencia de elementos nocivos que no forman parte del producto. • Si el cliente ha cambiado el software original de fábrica. 5)Toda garantía que no se reclame en (1) mes a partir de la fecha de ingreso, se hará un cobro de bodegaje, transcurrido los (6) meses será declarada en abandono y se procederá a su destrucción. 6)Si el cliente no presenta el documento de compra del¤producto, deberá presentar un documento relacionando el producto, NIT, fecha de compra, la copia del documento de compra se entregara en un plazo de (5) días hábiles. 7)Para la entrega de la garantía, el cliente presentara el¤formato de garantía original, no se entregara el producto con fotocopia del formato o sin el formato de garantía. 8)El periodo de garantía que cubre Digital MTX a los clientes en los productos son: cargadores de caja roja (2)años, cargadores para Mac y universal (1)año, baterías para portátil (1)año, pantallas para computador (6)meses, teclados (6)meses, baterías para celular (3)meses, pantallas para celular (3)meses. Importante: Al firmar y/o recibir el documento de compra que certifique el despacho correspondiente queda entendido que el cliente acepta incondicionalmente la presente política y condiciones de garantía, renuncia a cualquier tipo de reclamo que no esté considerado en el presente documento. Más información de políticas de garantías en nuestro sitio web https://www.digitalmtx.com o realice sus consultas y/o reclamos en el correo electrónico centrodeservicio@digitalmtx.com"</small> <br><br><br><br>
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
	               <small style="font-size: 6px; justify-content: center;">"Garantía: El horario de atención es de lunes a viernes de 09:00 a 13:00 en la calle 77 # 16A – 38 Oficina 303¤2)Para el ingreso del producto a garantía el cliente deberá entregar el documento de compra y el producto completo con sus empaques, accesorios, manuales, sin daños físicos que invaliden la garantía. 3)El periodo para dar solución a la garantía es de (8) ocho días hábiles, a partir de la fecha de radicado. 4)La Garantía no cubre en los siguientes casos: • Cuando el producto presenta daño físico, por mal uso, mala manipulación, transporte o descuido. • Cuando los sellos de garantía se encuentren removidos o sobre etiquetados remarcados. • Daños causados por descargas eléctricas o uso de voltaje incorrecto. • Daños generados por presencia de elementos nocivos que no forman parte del producto. • Si el cliente ha cambiado el software original de fábrica. 5)Toda garantía que no se reclame en (1) mes a partir de la fecha de ingreso, se hará un cobro de bodegaje, transcurrido los (6) meses será declarada en abandono y se procederá a su destrucción. 6)Si el cliente no presenta el documento de compra del¤producto, deberá presentar un documento relacionando el producto, NIT, fecha de compra, la copia del documento de compra se entregara en un plazo de (5) días hábiles. 7)Para la entrega de la garantía, el cliente presentara el¤formato de garantía original, no se entregara el producto con fotocopia del formato o sin el formato de garantía. 8)El periodo de garantía que cubre Digital MTX a los clientes en los productos son: cargadores de caja roja (2)años, cargadores para Mac y universal (1)año, baterías para portátil (1)año, pantallas para computador (6)meses, teclados (6)meses, baterías para celular (3)meses, pantallas para celular (3)meses. Importante: Al firmar y/o recibir el documento de compra que certifique el despacho correspondiente queda entendido que el cliente acepta incondicionalmente la presente política y condiciones de garantía, renuncia a cualquier tipo de reclamo que no esté considerado en el presente documento. Más información de políticas de garantías en nuestro sitio web https://www.digitalmtx.com o realice sus consultas y/o reclamos en el correo electrónico centrodeservicio@digitalmtx.com"</small> <br><br><br><br>
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
	                              <P><b>Fecha de ingreso: </b>'.$product->fecha_.'</p><br>
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
				$this->technical->editStatusServices($_POST);
				$data = $this->model->getByIdSV($_POST['id']);
				$mail = new PHPMailer(true);
				try {
					$email=$data['correo_cliente'];   // Add a recipient
				    	// $email='steven-0198@hotmail.com';   // Add a recipient
		            $header = "From: Digital MTX SAS <no-responder@digitalmtx.com> \r\n";
		            $header .= "X-Mailer: PHP5/". phpversion()."\n";
		            $header .= 'MIME-Version: 1.0' . "\n";
		            $header .= "Content-Type: text/html; charset=UTF-8";          
		            $asunto="DigitalMTX: Notificacion de garantia.";

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
}