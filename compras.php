<!DOCTYPE html>
<?php
/**
* @author Reinaldo Emilio Pastran Jerez
* @author Edwin Velasquez Jimenez
* @author Diego Rodríguez Veloza <@rodvel2910>
*/
session_start();
if (isset($_POST['comprar'])) {
	include __DIR__.'/.includesdtm/digitallibs.php';
	$compra=new digitalibs();
	$compra->compras();
}
?>