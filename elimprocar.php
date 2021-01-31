<?php
/**
  * @author Reinaldo Emilio Pastran Jerez
  * @author Edwin Velasquez Jimenez
  * @author Diego Rodríguez Veloza <@rodvel2910>
  */
session_start();
include 'carrocompra.php';
$carro=new Carrito();
if (isset($_POST['elim'])) {
    $unique_id=$_POST['uniq'];
    $carro->remove_producto($unique_id);
}
?>