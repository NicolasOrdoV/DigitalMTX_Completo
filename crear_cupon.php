<?php
	include_once '.includesdtm/adminlibs.php';

	$res = new commerce;
	if ($_POST['accion'] == 'crear') {
		$res->crear_cupon();
	} elseif($_POST['accion'] == 'actualizar') {
		$res->actualizar_cupon();
	} elseif($_POST['accion'] == 'eliminar') {
		echo $res->eliminar_cupon();
	}
?>