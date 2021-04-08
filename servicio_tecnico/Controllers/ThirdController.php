<?php

require 'Models/Third.php';

/**
 * Controlador terceros
 */
class ThirdController
{
	private $model;

	public function __construct()
	{
		$this->model = new Third;
	}

	public function new()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				require 'Views/Layout.php';
				require 'Views/Third/new.php';
				require 'Views/Scripts.php';
			}
		}else{
	      header('Location: ?controller=login');
	    }
	}

	public function save()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			if ($_POST) {
				$data = $this->model->getAll();
				$id = count($data);
				$array = [
					'id' => $id,
					'Nombre_Proveedor' => $_POST['Nombre_Proveedor'] 
				];
				$this->model->save($array);
				header('Location: ?controller=service&method=third');
			}
		}else{
	      header('Location: ?controller=login');
	    }
	}
}