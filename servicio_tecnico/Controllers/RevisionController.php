<?php

require 'Models/Service.php';
require 'Models/TechnicalR.php';

/**
 * Controlador de servicios para revision
 */
class RevisionController
{
	private $model;
	private $service;

	public function __construct()
	{
		$this->service = new Service;
		$this->model = new Technical;
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
	           'fecha' => $_POST['fecha'],
	           'hora' => $_POST['hora'],
	           'informe_tecnico' => $_POST['informe_tecnico'],
	           'Id_Empleado' => $_POST['Id_Empleado']
			];
			date_default_timezone_set('America/Bogota');
            $hora_actual = date("h:i a");
			//$id = $_REQUEST['Id_Garantia'];
			$this->model->newRevision($data);
			$role = $this->model->consecutives($_POST['id_sv']);
			$dates = [];
			if ($role[0]->estado == "Tramite" || $role[0]->estado == "Sin revisar" || $role[0]->estado == "En reparación") {
				$dates = [
					'id' => $data['id_sv'],
					'estado' => $_POST['estado_tecnico']
				];
				$this->model->editStatusServices($dates);
				echo '<pre>';
				var_dump($dates);
				echo '</pre>';

			}else{
				$dates = [
					'id' => $data['id_sv'],
					'estado' => $_POST['estado_tecnico']
				];
				$this->model->editStatusServices($dates);
				echo '<pre>';
				var_dump($role);
				echo '</pre>';
			}
			$this->model->editStatusServices($dates);
			header('Location: ?controller=revision&method=sucessfull');
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
}