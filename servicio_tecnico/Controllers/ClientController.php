<?php

require 'Models/User.php';

/**
 * Controlador clientes
 */
class ClientController
{
	private $model;

	public function __construct()
	{
		$this->model = new User;
	}

	public function newClient()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE || isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE ) {
			require 'Views/Layout.php';
			require 'Views/Client/new.php';
			require 'Views/Scripts.php';
		}else{
			header('Location: ?controller=login');
		}	
	}

	public function save()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE || isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE ) {
			if (isset($_POST)) {
				$users = $this->model->getAll();
				$countUser = count($users);
				$user = [
					'id' => $countUser,
					'nombre' => $_POST['nombre'],
					'apellido' => $_POST['apellido'],
					'tipodoc' => 'NULL',
					'identificacion' => $_POST['identificacion'],
					'telefono' => $_POST['telefono'],
					'pais' => 'NULL',
					'ciudad' => 'NULL',
					'direccion' => $_POST['direccion'],
					'genero' => 'NULL',
					'correo' => $_POST['correo'],
					'contrasena' => 'NULL',
					'fechanac' => 'NULL',
					'tipoperson' => 'NULL',
					'codigo' => 'NULL',
					'activo' => 0,
					'fecha' => 'NULL',
					'ins' => 0
				];
				$this->model->newUser($user);
				header('Location: ?controller=service&method=newService');
			}
		}else{
			header('Location: ?controller=login');
		}	
	}
}