<?php
include_once '.includesdtm/conexion.php';

$id=$_GET['id'];
$fecha=$_GET['fecha'];
$fact=$_GET['fact'];
$conexion=mysqli_connect("localhost","digitalmtx_dmtx","C,u/tA/?NRy><XT/4","digitalmtx_dtmmtx");
  		// $conexion=mysqli_connect("localhost","root","steven666","digitalmtx_dtmmtx");
$query=("SELECT * FROM dtm_user WHERE identificacion = '$id'");
$result=mysqli_query($conexion,$query) or die("no");
$row=mysqli_fetch_assoc($result);
	$email=$row['correo'];
	$name=strtoupper($row['nombre']." ".$row['apellido']);

	       	$done='';
      		$header = "From: Digital MTX SAS <no-responder@digitalmtx.com> \r\n";
      		$header .= "X-Mailer: PHP5/". phpversion()."\n";
      		$header .= 'MIME-Version: 1.0' . "\n";
      		$header .= "Content-Type: text/html; charset=UTF-8";      		
      		$asunto="DigitalMTX: Notificacion de compra.";
      		$body="<html>
<head>
  <title>Envio link para numero guia</title>
</head>
<body>
<div style='text-align:center'>
<img src='https://www.digitalmtx.com/img/logo2.png' align='center height='200' width='200' >
<h2 >Notificacion de compra</h2>
</div >
<p>Apreciado(a) $name;</p>
Gracias por realizar tu compra en Digital MTX SAS.
A continuacion, encontraras el link donde puedes verificar todo el detalle de tu compra y el numero de guia de envio:
<br>
<br>
<a href='https://www.digitalmtx.com/detalleguiaemail.php?numfact=$fact'>https://www.digitalmtx.com/detalleguiaemail.php?numfact=$fact</a>
<p>Fecha de compra: $fecha</p>
<p>Factura: $fact</p>
Este mensaje de correo electrónico se ha enviado desde una direccion exclusivamente para envios.
No respondas este mensaje.Para obtener mas informacion sobre tu compra, visita los siguientes enlaces:<br><br>

Contáctenos:<br>
<a href='https://www.digitalmtx.com/contact.php' target='_blank'>https://www.digitalmtx.com/contact</a><br><br>
Politicas de privacidad:<br>
<a href='https://www.digitalmtx.com/politicas.pdf' target='_blank'>https://www.digitalmtx.com/politicas</a>
<br>
<br><br><br>
<img src='https://www.digitalmtx.com/img/firma_compras.png' align='center'>

</body>
</html>";

      		mail($email, $asunto, $body, $header);
          		echo "<br>enviado ".$email;
          		$done=$done+1;
     		
    	echo "<br>".$done." correos se enviaron";
   echo $body;

   	header("Location:historial_guias_pend.php");

      ?>
