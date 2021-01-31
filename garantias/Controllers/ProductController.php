<?php

require 'Models/Product.php';

/**
 * controlador productos
 */
class ProductController
{
	private $model;

	public function __construct()
	{
		$this->model = new Product;
	}

	public function list1()
	{
		if (isset($_SESSION['user']) ||isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE) {
			require 'Views/Layout.php';
	        $products = $this->model->getAll();
	        require 'Views/Products/list.php';
	        require 'Views/Scripts.php';
        }else{
			header('Location: ?controller=login');
		}
	}

	public function new1()
	{
		if (isset($_SESSION['user'])||isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE) {
			require 'Views/Layout.php';
	        require 'Views/Products/new.php';
	        require 'Views/Scripts.php';
        }else{
			header('Location: ?controller=login');
		}
	}

	public function save()
	{
		if (isset($_SESSION['user'])||isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE) {
			$this->model->newProduct($_REQUEST);
			header('Location: ?controller=product&method=list1');
		}else{
			header('Location: ?controller=login');
		}
	}
}