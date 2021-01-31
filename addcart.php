<?php
/**
  * @author Reinaldo Emilio Pastran Jerez
  * @author Edwin Velasquez Jimenez
  * @author Diego Rodríguez Veloza <@rodvel2910>
  */

session_start();
include 'carrocompra.php';
//print_r($_POST);
if (isset($_POST['carro'])) {
    $id=$_POST['id'];
    $cod=$_POST['codigo'];
    $nombre=$_POST['nombre'];
    $cant=$_POST['cantidad'];

    $color=isset($_POST['color'])?$_POST['color']:"";
    
    settype($cant, "integer");
    $precio=$_POST['precio'];

    $articulo=["id"=>$id, "cantidad"=>$cant , "precio"=>$precio ,"codigo"=>$cod,"nombre"=>$nombre];
    if (isset($_POST['color'])) {
    	$articulo= ["id"=>$id, "cantidad"=>$cant , "precio"=>$precio ,"codigo"=>$cod,"nombre"=>$nombre,"color"=>$color];
    }
    
}

print_r($_POST);

//agrega al carrito
$carro=new Carrito();
if (!empty($articulo)) {
	$carro->add($articulo);
	header("location:carrito.php");
}
?>

    <html>
        <script>
            alert("Se agregaron <?php /*echo $cant; ?>  <?php echo $nombre; */?> a tu carro de compra");
            location.href="carrito.php";
        </script>
    </html>

        
        