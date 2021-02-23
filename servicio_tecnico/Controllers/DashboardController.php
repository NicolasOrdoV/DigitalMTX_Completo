<?php

require 'Models/Person.php';
require 'Models/User.php';
require 'Models/TechnicalService.php';

/**
 * Controlador principal
 */
class DashboardController
{
	private $person;
	private $user;
	private $sv;

	public function __construct()
	{
		$this->person = new Person;
		$this->user = new User;
		$this->sv = new TechnicalService;
	}

	public function index()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE || isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE ) {
			require 'Views/Layout.php';
			$dataClients = $this->user->getAll();
			$limitClients = $this->user->getAllFive();
			$totalClients = count($dataClients);
			$dataGaranties = $this->sv->getAll();
			$limitGaranties = $this->sv->getAllFive();
			$totalGaranties = count($dataGaranties);
			$dataPersons = $this->person->getAll();
			$limitPersons = $this->person->getAllFive();
			$totalPersons = count($dataPersons);
			require 'Views/Home.php';
			require 'Views/Scripts.php';	
		}else{
			header('Location: ?controller=login');
		}	
	}
}