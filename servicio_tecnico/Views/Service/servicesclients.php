<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $identificacion = htmlspecialchars(trim($_POST["identificacion_cliente"]));
 
    // Codigo para buscar en tu base de datos acá
 
 
    $mysqli=new mysqli("localhost","root","","digitalmtx_dtmmtx");
 
    $sqlsi = "SELECT correo,nombre,direccion,telefono FROM dtm_user  WHERE  identificacion  = '$identificacion'";
    $resultado = $mysqli->query($sqlsi);
	$fila = $resultado->fetch_assoc();
    
    $datos[]=$fila['correo'].",".$fila['nombre'].",".$fila['direccion'].",".$fila['telefono'];
    echo json_encode($datos);

} else {
    echo "<p>No se encontro el nombre en la DB!!</p>";
}