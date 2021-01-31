<?php
/**
  * @author Reinaldo Emilio Pastran Jerez
  * @author Edwin Velasquez Jimenez
  * @author Diego Rodríguez Veloza <@rodvel2910>
  */
include_once '.includesdtm/adminlibs.php';
session_start();
session_destroy();
header("location:index.php");
$salir=new admin();						            
$salir->salir();
?>