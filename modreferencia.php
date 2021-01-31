<?php
/**
  * @author Reinaldo Emilio Pastran Jerez
  * @author Edwin Velasquez Jimenez
  * @author Diego Rodríguez Veloza <@rodvel2910>
  */
session_start();
include __DIR__.'/.includesdtm/digitallibs.php';
if (isset($_POST['mref'])) {
    $mref=new digitalibs();
    $numeroventa=$_POST['codigo'];
    $referencia=$_POST['referencia'];
    $usuario=$_SESSION['usuario'];    
    $mref->mref($numeroventa,$referencia,$usuario);
}
?>