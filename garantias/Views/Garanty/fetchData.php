<?php 

include "config.php";

if(isset($_POST['search'])){
    $search = mysqli_real_escape_string($con,$_POST['search']);

    $query = "SELECT * FROM dtm_productos WHERE codigo like'%".$search."%'";
    $result = mysqli_query($con,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['codigo'],"label"=>$row['nombre'],"codigo"=>$row['codigo'],"marca"=>$row['marca']);
    }

    echo json_encode($response);
}

exit;


