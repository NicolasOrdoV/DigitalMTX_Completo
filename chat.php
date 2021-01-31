<?php
include ".includesdtm/librerias.php";
$librerias = new librerias;

if($_POST['var_chat'] == 1) {
	echo $librerias->chat();
}
?>