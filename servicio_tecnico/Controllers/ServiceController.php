<?php

require 'Models/Service.php';
require 'Models/Mark.php';
require 'Models/User.php';
require 'Models/Product.php';

/**
 * Controlador servicios
 */
class ServiceController
{
	private $model;
	private $mark;
	private $user;
	private $product;

	public function __construct()
	{
		$this->model = new Service;
		$this->mark = new Mark;
		$this->user = new User;
		$this->product = new Product;
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
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE || isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE ) {
			require 'Views/Layout.php';
			$services = $this->model->getAll();
			$total_data = count($services);
			$marks = $this->mark->getAll();
			$users = $this->user->getAll();
			$products = $this->product->getAll();
			require 'Views/Service/new.php';
			require 'Views/Scripts.php';
		}else{
			header('Location: ?controller=login');
		}	
	}

	public function save()
	{
		if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE || isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE ) {
			if (isset($_POST)) {
				$fecha = date('Y-m-d' , $_POST['fecha']);
				$data = [
					'fecha' => $fecha,
					'hora' => $_POST['hora'],
					'nombre_cliente' => $_POST['nombre_cliente'],
					'identificacion_cliente' => $_POST['identificacion_cliente'],
					'telefono_cliente' => $_POST['telefono_cliente'],
					'consecutivo' => $_POST['consecutivo'],
					'correo_cliente' => $_POST['correo_cliente'],
					'observacion_cliente' => $_POST['observacion_cliente'],
					'observacion_equipo' => $_POST['observacion_equipo'],
					'fecha_pactada' => $_POST['fecha_pactada'],
					'tecnico_asignado' => $_POST['tecnico_asignado'],
					'monto' => $_POST['monto']
				];

				$answerNewService = $this->model->newService($data);
				$lastId = $this->model->getLastId();

				$codigo_producto = $_POST['codigo_producto'];
				$serie = $_POST['serie'];
				$tipo_equipo = $_POST['tipo_equipo'];
				$marca = $_POST['marca'];
				$modelo = $_POST['modelo'];

				while (true) {
					$item1 = current($codigo_producto);
					$item2 = current($serie);
					$item3 = current($tipo_equipo);
					$item4 = current($marca);
					$item5 = current($modelo);

					$cp = (($item1 !== false) ? $item1 : '');
					$s  = (($item2 !== false) ? $item2 : '');
					$tp = (($item3 !== false) ? $item3 : '');
					$mc = (($item4 !== false) ? $item4 : '');
					$md = (($item5 !== false) ? $item5 : '');

					$details = [
						'id_sv'           => $lastId,
						'codigo_producto' => $cp,
						'serie'           => $s,
						'tipo_equipo'     => $tp,
						'marca'           => $mc,
						'modelo'          => $md,
						'estado'          => 'Tramite'
					];

					if (isset($lastId[0]->id) && $answerNewService == true) {
						$this->model->newDetailService($details);
					}
					
					$item1 = next($codigo_producto);
					$item2 = next($serie);
					$item3 = next($tipo_equipo);
					$item4 = next($marca);
					$item5 = next($modelo);

					if ($item1 === false && $item2 === false && $item3 === false && $item4 === false && $item5 === false) break;
				}
				header('Location: ?controller=service&method=sucessfull');
			}
		}else{
			header('Location: ?controller=login');
		}		
	}

	public function sucessfull()
	 {
	    if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE)  {
	      require 'Views/Layout.php';
	      require 'Views/Service/succesfull.php';
	      require 'Views/Scripts.php';
	    }else{
	      header('Location: ?controller=login');
	    } 
	}
}