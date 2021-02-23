<?php

require 'Models/Service.php';
require 'Models/Mark.php';

/**
 * Controlador servicios
 */
class ServiceController
{
	private $model;
	private $mark;

	public function __construct()
	{
		$this->model = new Service;
		$this->mark = new Mark;
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
		require 'Views/Layout.php';
		$services = $this->model->getAll();
		$total_data = count($services);
		$marks = $this->mark->getAll();
		require 'Views/Service/new.php';
		require 'Views/Scripts.php';
	}
}