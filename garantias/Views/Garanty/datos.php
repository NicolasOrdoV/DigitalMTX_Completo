<?php 
// $conexion=mysqli_connect('localhost','root','steven666','digitalmtx_dtmmtx');
$conexion=mysqli_connect("localhost","root","","digitalmtx_dtmmtx");
//mysql_set_charset('utf8',$conexion);
$municipio=$_POST['Municipio'];

	$sql="SELECT d.id,d.nombre,m.nombre FROM dtm_departamentos d , dtm_municipios m
                WHERE d.id = m.codigodepartamento_fk AND d.nombre = '$municipio'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<p>
                <b>Municipio</b>
            </p>
            <div class='form-group form-float'>
            <select id='lista2' name='Municipio' class='form-control'>
                    <option value=''>Seleccione...</option>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[2].'>'.ucwords(strtolower($ver[2])).'</option>';
	}

	echo  $cadena."</select></div>";