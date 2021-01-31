<?php
	include_once '.includesdtm/adminlibs.php';

	$res = new commerce;
	if ($_POST['accion'] == 'crear_calificacion') {
		$res->crear_calificacion();
	} elseif ($_POST['accion'] == 'ver_calificacion') {
		$res->ver_calificacion();
	} elseif ($_POST['accion'] == 'modificar_visible') {
		$res->modificar_visible();
	}
?>