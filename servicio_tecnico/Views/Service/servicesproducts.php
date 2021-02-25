<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$codigo_producto = $_POST['codigo_producto'];
	while (true) {
		$item = current($codigo_producto);
		$producto = (($item !== false) ? $item : '');
		$identificacion = htmlspecialchars(trim($producto));
 
	    // Codigo para buscar en tu base de datos acá
	    $mysqli=new mysqli("localhost","root","","digitalmtx_dtmmtx");
	 
	    $sqlsi = "SELECT nombre,categoria,marca FROM dtm_productos  WHERE  codigo  = '$identificacion'";
	    $resultado = $mysqli->query($sqlsi);
		$fila = $resultado->fetch_assoc();
	    
	    $datos[]=$fila['nombre'].",".$fila['categoria'].",".$fila['marca'];
	    echo json_encode($datos);

	    $item = next($codigo_producto);
		if ($item === false) break;
	}
} else {
    echo "<p>No se encontro el nombre en la DB!!</p>";
}