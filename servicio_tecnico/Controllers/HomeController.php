<?php

/**
 * Controlador basico
 */
class HomeHontroller
{
	
	public function index()
	{
		if (isset($_SESSION['user'])) {
			header('Location: ?controller=dashboard');
		}else{
			header('Location: ?controller=login');
		}
	}
}