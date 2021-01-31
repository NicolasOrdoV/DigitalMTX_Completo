<?php
	include_once '.includesdtm/adminlibs.php';

	$commerce = new commerce();
	$res = $commerce->ultimas_compras_real();
	echo $res;
?>