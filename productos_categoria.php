<?php
	include_once '.includesdtm/digitallibs.php';

	$res = new digitalibs;
	if ($_POST['accion'] == 'ultimos_productos_categoria') {
		$res->ultimos_productos_categoria();
	}
?>