<?php
/**
  * @author Reinaldo Emilio Pastran Jerez
  * @author Edwin Velasquez Jimenez
  * @author Diego Rodríguez Veloza <@rodvel2910>
  */
session_start();
include __DIR__.'/.includesdtm/digitallibs.php';
if(isset($_POST['pagar'])) {
    $pagocliente=new digitalibs();
    $numeroventa=$_POST['venta'];
    $referencia=$_POST['referencia'];
    $usuario=$_SESSION['usuario'];    
	$pagocliente->clientepago($numeroventa,$usuario,$referencia);  
}
?>