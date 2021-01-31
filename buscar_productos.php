<?php
	include_once '.includesdtm/digitallibs.php';

	$res = new digitalibs;
	if (isset($_POST['accion']) && $_POST['accion'] == 'buscador') {
		$res->buscar_productos();
	} elseif(isset($_POST['accion']) && $_POST['accion'] == 'buscador_b') {
		$res->buscar_productos_b();
	} elseif(isset($_POST['id_google'])) {
		$res->login_google();
	}
?>