<?php

require 'Models/Bill.php';
require 'Models/Garanty.php';

/**
 * Controlador sellos
 */
class HandtohandController{
	
	private $bill;
	private $garanty;

	public function __construct()
	{
		$this->bill = new Bill;
		$this->garanty = new Garanty;
	}

	public function index()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			require 'Views/Layout.php';
			$bills = $this->bill->getAll();
			require 'Views/Hands/list.php'; 
			require 'Views/Scripts.php';
		}else{
	      header('Location: ?controller=login');
	    }
	}

	public function new1()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			require 'Views/Layout.php';
			require 'Views/Hands/change.php';
			require 'Views/Scripts.php';
		}else{
	      header('Location: ?controller=login');
	    }
	}

	public function findBill()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			if (isset($_POST['NumFactura'])) {
				$Numero_Factura = $_POST['NumFactura'];
				$bills = $this->garanty->getChanges($Numero_Factura);
				require 'Views/Layout.php';
				require 'Views/Hands/change.php';
				require 'Views/Scripts.php'; 
			}
		}else{
	      header('Location: ?controller=login');
	    }	
	}

	public function saveStamp()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
			if ($_POST) {
				$this->bill->updateBill($_POST);
				header('Location: ?controller=handtohand');
			}
		}else{
	      header('Location: ?controller=login');
	    }
	}
}