<?php
if (isset($_GET['term'])){
	# conectare la base de datos
	include ('conected.php');
	$db_handle = new Conected();

	$return_arr = array();

	$sqlc = "SELECT * FROM dtm_user WHERE nombre like '%".$_GET['term']."%' LIMIT 5";

	$faq = $db_handle->runQuery($sqlc);

	foreach($faq as $k=>$v) {
	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/		
		$row_array['value'] = $faq[$k]['identificacion'];
		$row_array['identificacion']=$faq[$k]['Identificacion'];
		
		$row_array['correo']=$faq[$k]['Correo'];
		$row_array['nombre']=$faq[$k]['Nombres'];
		$row_array['direccion']=$faq[$k]['Direccion'];
		$row_array['telefono']=$faq[$k]['Telefono'];
		$row_array['Identificacion_Cliente']=$faq[$k]['Identificacion'];
		
		array_push($return_arr,$row_array);
	}
	/* Codifica el resultado del array en JSON. */
	echo json_encode($return_arr);
}
       