<?php

require 'Models/Service.php';
require 'Models/TechnicalR.php';
require 'Models/Audit.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../garantias/vendor/autoload.php';   

/**
 * Controlador de servicios para revision
 */
class RevisionController
{
	private $model;
	private $service;
	private $audit;

	public function __construct()
	{
		$this->service = new Service;
		$this->model = new Technical;
		$this->audit = new Audit;
	}

	public function index()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE || isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE ) {
			if (isset($_GET['name'])) {
				$name = $_GET['name'];
				require 'Views/Layout.php';
				$services = $this->service->getAllServicesWithEmployee($name);
				require 'Views/RevisionTechnique/list.php';
				require 'Views/Scripts.php';
			}
		}else{
			header('Location: ?controller=login');
		}
	}

	public function details()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE) {
			if (isset($_GET['name'])) {
				$name = $_GET['name'];
				$id = $_GET['id'];
				$data = $this->service->getByIdTec($name,$id);
				$consecutives = $this->model->consecutives($id); 
				//$details = $this->garanty->getAlDetails($id);
			    require 'Views/Layout.php';
				require 'Views/RevisionTechnique/details.php';
				require 'Views/Scripts.php';
			}
		}else{
			header('Location: ?controller=login');
		}	
	}

	public function save()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE) {
			$data = [
	           'id_sv' => $_POST['id_sv'],
	           'fecha_tec' => $_POST['fecha_tec'],
	           'hora_tec' => $_POST['hora_tec'],
	           'informe_tecnico' => $_POST['informe_tecnico'],
	           'Id_Empleado' => $_POST['Id_Empleado']
			];
			date_default_timezone_set('America/Bogota');
            $hora_actual = date("h:i a");
			//$id = $_REQUEST['Id_Garantia'];
			$this->model->newRevision($data);
			$role = $this->model->consecutives($_POST['id_sv']);
			$datesForAudit = $this->service->getByIdSVA($_POST['id_sv']);
			$dates = [];
			if ($role[0]->estado == "Tramite" || $role[0]->estado == "Sin revisar" || $role[0]->estado == "En reparación") {
				$dates = [
					'id' => $data['id_sv'],
					'estado' => $_POST['estado_tecnico']
				];
				$this->model->editStatusServices($dates);
			}else{
				$dates = [
					'id' => $data['id_sv'],
					'estado' => $_POST['estado_tecnico']
				];
				$this->model->editStatusServices($dates);
			}
			$this->model->editStatusServices($dates);
			$auditArray = [
				'fecha'                  => date('d-m-Y'),
				'hora'                   => $hora_actual,
				'nombre_cliente'         => $datesForAudit[0]->nombre_cliente,
				'identificacion_cliente' => $datesForAudit[0]->identificacion_cliente,
				'telefono_cliente'       => $datesForAudit[0]->telefono_cliente,
				'consecutivo'            => $datesForAudit[0]->consecutivo,
				'direccion_cliente'      => $datesForAudit[0]->direccion_cliente,
				'correo_cliente'         => $datesForAudit[0]->correo_cliente,
				'observacion_cliente'    => $datesForAudit[0]->observacion_cliente,
				'observacion_equipo'     => $datesForAudit[0]->observacion_equipo,
				'fecha_pactada'          => $datesForAudit[0]->fecha_pactada,
				'tecnico_asignado'       => $datesForAudit[0]->tecnico_asignado,
				'monto'                  => $datesForAudit[0]->monto,
				'codigo_producto'        => $datesForAudit[0]->codigo_producto,
				'tipo_servicio'          => $datesForAudit[0]->tipo_servicio,
				'serie'                  => $datesForAudit[0]->serie,
				'tipo_equipo'            => $datesForAudit[0]->tipo_equipo,
				'marca'                  => $datesForAudit[0]->marca,
				'modelo'                 => $datesForAudit[0]->modelo,
				'estado'                 => $dates['estado'],
				'fecha_tec'              => $_POST['fecha_tec'],
	            'hora_tec'               => $_POST['hora_tec'],
	            'informe_tecnico'        => $_POST['informe_tecnico'],
	            'id_empleado_fk'         => $_POST['Id_Empleado']
			];
			$this->audit->newAudit($auditArray);
			$mail = new PHPMailer(true);
			try {
				$email=$role['correo_cliente'];   // Add a recipient
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
										Proceso de la Garantia:'.$role[0]->consecutivo.'
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
					
				  
									  Su actual estado de la garantia se encuentra en '.$role[0]->estado .'<br><br>
									  
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
				header('Location: ?controller=revision&method=sucessfull');
				
			} catch (Exception $e) {
		      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		    }
		}else{
			header('Location: ?controller=revision');
		}	
	}

	public function sucessfull()
	{
	   if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE) {
	      	require 'Views/Layout.php';
	      	require 'Views/RevisionTechnique/succesfull.php';
	      	require 'Views/Scripts.php';
	    }else{
	      header('Location: ?controller=login');
	    } 
	}

	public function story()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE) {
			if (isset($_GET['name'])) {
				$name = $_GET['name'];
				require 'Views/Layout.php';
				$dates = $this->model->getByStoryForTechnical($name);
		      	require 'Views/RevisionTechnique/story.php';	      	
		      	require 'Views/Scripts.php';
			}
		}else{
	      header('Location: ?controller=login');
	    }	
	}

	public function detailsStory()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE) {
			if ($_POST) {
				$id = $_POST['id'];
				require 'Views/Layout.php';
				$data = $this->model->getByIdDetails($id);
				require 'Views/RevisionTechnique/detailsStory.php';
				require 'Views/Scripts.php';
			}
		}else{
	      header('Location: ?controller=login');
	    }	
	}
}