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
		require 'Views/Layout.php';
		require 'Views/Third/new.php';
		require 'Views/Scripts.php';
	}

	public function save()
	{
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
	}
}