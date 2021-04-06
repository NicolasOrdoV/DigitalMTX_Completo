<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_GET['codigo']))
	{
		$codigo_producto = htmlspecialchars(trim($_GET['codigo']));
	    // Codigo para buscar en tu base de datos acá
	    $mysqli=new mysqli("localhost","root","","digitalmtx_dtmmtx");
	 
	    $sqlsi = "SELECT nombre,categoria,marca FROM dtm_productos  WHERE  codigo  = '$codigo_producto'";
	    
	    $resultado = $mysqli->query($sqlsi);
	    if($resultado->num_rows > 0)
	    {
	    	$fila = $resultado->fetch_assoc();
	     		$datos[]=$fila['nombre'].",".$fila['categoria'].",".$fila['marca'];
	     		echo json_encode($datos);
	    }
	}
} else {
    echo "<p>No se encontro el nombre en la DB!!</p>";
}