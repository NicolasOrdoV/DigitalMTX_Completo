<?php
	include_once '.includesdtm/adminlibs.php';

	$res = new commerce;
	if ($_POST['accion'] == 'facebook_login') {
		$res->facebook_login();
	}
?>