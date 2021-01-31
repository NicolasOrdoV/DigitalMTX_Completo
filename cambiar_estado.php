<?php
	include_once '.includesdtm/adminlibs.php';

	$id=$_REQUEST['id'];

	$conexion=mysqli_connect("localhost","digitalmtx_dmtx","C,u/tA/?NRy><XT/4","digitalmtx_dtmmtx");
  		// $conexion=mysqli_connect("localhost","root","steven666","digitalmtx_dtmmtx");
		$query=("SELECT * FROM dtm_productos WHERE codigo = '$id'");
		$result=mysqli_query($conexion,$query) or die("no");
		$row=mysqli_fetch_assoc($result);	
		$codigo=$row['estado'];	


	$res = new commerce;

	if($codigo == 4){

	$res->cambiar_estado2($id);
}
	if($codigo == 5){
	$res->cambiar_estado($id);		
}	
?>