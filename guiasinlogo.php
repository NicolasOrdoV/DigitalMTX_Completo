<?php
$conexion=mysqli_connect("localhost","digitalmtx_dmtx","C,u/tA/?NRy><XT/4","digitalmtx_dtmmtx");
// $conexion=mysqli_connect("localhost","root","steven666","digitalmtx_dtmmtx");
$id=$_GET['idfact'];
$idre=$_GET['cedula'];
$query=("SELECT *,e.nombre as nombres,t.nombre as nom, pv.nombre as pvnom, d.nombre as dnom, m.nombre as mnom FROM dtm_guia as g INNER JOIN dtm_transportadoras as t INNER JOIN dtm_estados_guias as e INNER JOIN dtm_puntos_venta as pv INNER JOIN dtm_departamentos as d INNER JOIN dtm_municipios as m where g.id_estado=e.id and g.transportadora = t.id and pv.id=g.punto_venta and d.id=g.depart and m.id= g.ciudad and g.factura = '$id'");
$result=mysqli_query($conexion,$query) or die("no");
$row=mysqli_fetch_assoc($result);
	$pv=$row['pvnom'];
	$nomcli=$row['nomcli'];
	$idcli=$row['idcli'];
	$depar=utf8_decode(strtoupper($row['dnom']));
	$muni=utf8_decode($row['mnom']);
	$direc=$row['dirent'];
	$tel=$row['tel'];
	$transportadora=$row['nom'];
	$valorase=number_format($row['valorase'],2,",",".");
	$factura=$row['factura'];
	$cobro=$row['cobro_envio'];
	$fecha=$row['fecha_envio'];
	$fechac=$row['fecha_creado'];

$query2=("SELECT * FROM dtm_remitentes WHERE cedula= '$idre'");
$result2=mysqli_query($conexion,$query2) or die("no");
$row2=mysqli_fetch_assoc($result2);
	$nomre=$row2['nombre'];
	$telre=$row2['tel'];
	$direcre=$row2['direc'];



require ("fpdf/fpdf.php");
$pdf = new FPDF('P','pt','A4');
$pdf->SetLeftMargin(40);
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(515,20,"",'LTR',"C");
$pdf->ln();
$pdf->Cell(200,15,"REMITENTE:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(310,15,"$nomre",'R',0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(200,15,"NIT/CC:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(310,15,"$idre",'R',0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(200,15,"TELEFONO:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(310,15,"$telre",'R',0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(200,15,"DIRECCION:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','',8);
$pdf->Cell(310,15,"$direcre",'R',0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(515,15,"",'RL',0);
$pdf->ln();
$pdf->Cell(515,15,"",'RL',0);
$pdf->ln();
$pdf->Cell(200,15,"DESTINATARIO:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(310,15,"$nomcli",'R',0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(200,15,"NIT/CC:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(310,15,"$idcli",'R',0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(200,15,"DEPARTAMENTO:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(310,15,"$depar",'R',0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(200,15,"MUNICIPIO:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','',8);
$pdf->Cell(310,15,"$muni",'R',0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(200,15,"DIRECCION:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','',8);
$pdf->Cell(310,15,"$direc",'R',0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(200,15,"CELULAR:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(310,15,"$tel",'R',0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(200,15,"TRANSPORTADORA:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(310,15,"$transportadora",'R',0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(200,15,"ASEGURADO POR:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(310,15,"$$valorase",'R',0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(200,15,"FACTURA:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(310,15,"$factura",'R',0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(200,15,"COBRO:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(310,15,"$cobro",'R',0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(200,15,"FECHA SOLICITUD:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(310,15,"$fechac",'R',0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->ln();
$pdf->Cell(200,15,"FECHA ENVIO:",'L',0,"R");
$pdf->Cell(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(310,15,"$fecha",'R',0,"L");
$pdf->SetFont('Arial','BIU',10);
$pdf->ln();
$pdf->Cell(515,20,"",'LR');
$pdf->ln();
$pdf->Cell(515,15,"REVISAR ANTES DE FIRMAR RECIBIDO ANTE LA TRANSPORTADORA",'LR',0,"C");
$pdf->ln();
$pdf->SetFont('Arial','B',15);
$pdf->Cell(515,20,"-DELICADO-",'LRB',0,"C");

$pdf->Output()

?>
