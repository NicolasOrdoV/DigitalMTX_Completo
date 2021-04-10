<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "digitalmtx_dtmmtx";
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
$query = "DELETE FROM dtm_detalle_sv WHERE id='$_POST[txtID]'";
echo $consulta = mysqli_query($conn, $query) or die("database error:". mysqli_error($conn));

