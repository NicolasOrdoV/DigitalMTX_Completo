<?php
require_once('conexion.php');
//include ('seguridad.php');

if(!isset($_GET['id']))
	$id='';
else
	$id=$_GET['id'];
	
if($id>0)
{	
	
$query_formu="SELECT * FROM com_vehiculo WHERE INTERNO = '$id' ";
mysql_select_db($database,$conexion);	
$result_formu=mysql_query($query_formu,$conexion);
$row_formu=mysql_fetch_assoc($result_formu);
$totRows_formu=mysql_num_rows($result_formu);

$con_ben = 1;
$con_ref = 1;

if($totRows_formu != 0)
{
?>
		<script languaje="javascript">
			parent.document.form1.PROPIETARIO.value="<? echo $row_formu['NOMBRE']; ?>";	
			parent.document.form1.PROPIETARIO.value="<? echo $row_formu['NOMBRE']; ?>";	
			parent.document.form1.PROPIETARIO.value="<? echo $row_formu['NOMBRE']; ?>";	
		</script>	
<?		
}else
{
?>
	<script>
	if(confirm("Vehiculo no existe, desea crearlo?"))
	{
		window.open('com_nuevo_vehiculo.php?cod=<? echo $id; ?>','ventana', 'width=950,height=450,menubar=no,scrollbars=yes,toolbar=no,location=no,directories=no,resizable=yes,top=0,left=10');
	}else
	{
		parent.document.form1.VEHICULO.value.focus();		
	}
	</script>
<?
}
}