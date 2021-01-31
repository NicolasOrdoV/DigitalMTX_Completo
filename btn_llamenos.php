<?php
/**
  * @author Reinaldo Emilio Pastran Jerez
  * @author Edwin Velasquez Jimenez
  * @author Diego Rodríguez Veloza <@rodvel2910>
  */

$nombre = $_POST["nombre"];
$celular = $_POST["celular"];
$correo = $_POST["correo"];
$mensaje = $_POST["mensaje"];

$captcha = $_POST['captcha'];
$clave_secreta = "6Lcyry4UAAAAAA-rJsO2s7ykr5Oe5IZ95nB3JAaI";
$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($clave_secreta) .  '&response=' . urlencode($captcha);
$response = file_get_contents($url);
$responseKeys = json_decode($response,true);

if($responseKeys["success"] == 1) {
	if(isset($nombre) && $nombre != '' && isset($celular) && $celular != '' && isset($correo) && $correo != '' && isset($mensaje) && $mensaje != '') {
		$mensaje_correo='
			<html>
				<head>
					<title>Solicitud de llamada por medio de la página web de Digital MTX</title>
					<meta charset="utf-8">
				</head>
				<body style="background: #f1f1f1;font-family: Arial, Helvetica, sans-serif;margin: 0;">
					<br>
					<table style="width: 100%;">
						<tr style="text-align: center;">
							<td></td>
							<td style="padding-bottom: 20px;"><img width="350" height="auto" src="https://www.digitalmtx.com/img/logo.png"></td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 23.3%;"></td>
							<td style="background: #555;border-radius: 15px;color:white;padding: 15px;width: 43.3%;">
								<h3 style="text-align: center;">Solicitud de llamada por medio de la página web de Digital MTX</h3>
								<p>
									<b>Nombre completo: </b> '.$nombre.'
									<br><br>
									<b>Celular: </b> '.$celular.'
									<br><br>
									<b>Correo: </b> '.$correo.'
									<br><br>
									<b>Mensaje: </b>
									<p style="text-align: justify;">
										'.$mensaje.'
									</p>
									<br><br>
									<p style="text-align: center;"><u>Este mensaje es generado automáticamente, por favor no lo responda.</u></p>
									<br><br>
									<p style="text-align: center;">&copy; 2019, todos los derechos reservados || <a style="color: white;" href="https://aserfinc.com">Digital MTX</a>
									</p>
								</p>
							</td>
							<td style="width: 23.3%;"></td>
						</tr>
					</table>
				</body>
			</html>
		';

		$cabezera = "MIME-Version: 1.0" . "\r\n";
		$cabezera .= "Content-Type: text/html; charset=UTF-8\r\n";
		$cabezera .= "From: pagina@digitalmtx.com"."\r\n";

		$correo = "ecommerce@digitalmtx.com";
		//$correo = "electronico@digitalmtx.com";
		//$correo = "desarrolloapp@grupotecnologico.org";

		if(mail($correo, "Solicitud de llamada por medio de la página web de Digital MTX", $mensaje_correo, $cabezera)) {
			echo 1;
			/*@\session_start();
			$_SESSION["llamanos"] = 1;
			header('Location: index.php');*/
		}else{
			echo 0;
			/*@\session_start();
			$_SESSION["llamanos"] = 0;
			header('Location: index.php');*/
		}
	} else {
		echo 0;
		/*@\session_start();
		$_SESSION["llamanos"] = 0;
		header('Location: index.php');*/
	}
} else {
	echo 0;
	/*@\session_start();
	$_SESSION["llamanos"] = 0;
	header('Location: index.php');*/
}

/*if(isset($_POST["g-recaptcha-response"])) {
	$captcha = $_POST['g-recaptcha-response'];
	$clave_secreta = "6LeCQlEUAAAAANbNf0lImkC3KkXusLp0YfsFIrb5";
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($clave_secreta) .  '&response=' . urlencode($captcha);
    $response = file_get_contents($url);
    $responseKeys = json_decode($response,true);

    if($responseKeys["success"] == 1) {
    	if(isset($nombre) && $nombre != '' && isset($celular) && $celular != '' && isset($correo) && $correo != '' && isset($mensaje) && $mensaje != '') {
			$mensaje_correo='
				<html>
					<head>
						<title>Solicitud de llamada por medio de la página web de Digital MTX</title>
						<meta charset="utf-8">
					</head>
					<body style="background: #f1f1f1;font-family: Arial, Helvetica, sans-serif;margin: 0;">
						<br>
						<table style="width: 100%;">
							<tr style="text-align: center;">
								<td></td>
								<td style="padding-bottom: 20px;"><img width="350" height="auto" src="https://www.digitalmtx.com/img/logo.png"></td>
								<td></td>
							</tr>
							<tr>
								<td style="width: 23.3%;"></td>
								<td style="background: #555;border-radius: 15px;color:white;padding: 15px;width: 43.3%;">
									<h3 style="text-align: center;">Solicitud de llamada por medio de la página web de Digital MTX</h3>
									<p>
										<b>Nombre completo: </b> '.$nombre.'
										<br><br>
										<b>Celular: </b> '.$celular.'
										<br><br>
										<b>Correo: </b> '.$correo.'
										<br><br>
										<b>Mensaje: </b>
										<p style="text-align: justify;">
											'.$mensaje.'
										</p>
										<br><br>
										<p style="text-align: center;"><u>Este mensaje es generado automáticamente, por favor no lo responda.</u></p>
										<br><br>
										<p style="text-align: center;">&copy; 2019, todos los derechos reservados || <a style="color: white;" href="https://aserfinc.com">Digital MTX</a>
										</p>
									</p>
								</td>
								<td style="width: 23.3%;"></td>
							</tr>
						</table>
					</body>
				</html>
			';

			$cabezera = "MIME-Version: 1.0" . "\r\n";
			$cabezera .= "Content-Type: text/html; charset=UTF-8\r\n";
			$cabezera .= "From: pagina@digitalmtx.com"."\r\n";

			//$correo = "ingenieria@digitalmtx.com";
			$correo = "desarrolloapp@grupotecnologico.org";

			if(mail($correo, "Solicitud de llamada por medio de la página web de Digital MTX", $mensaje_correo, $cabezera)) {
				@\session_start();
				$_SESSION["llamanos"] = 1;
				header('Location: index.php');
			}else{
				@\session_start();
				$_SESSION["llamanos"] = 0;
				header('Location: index.php');
			}
		} else {
			@\session_start();
			$_SESSION["llamanos"] = 0;
			header('Location: index.php');
		}
    } else {
    	@\session_start();
		$_SESSION["llamanos"] = 0;
		header('Location: index.php');
    }
} else {
	@\session_start();
	$_SESSION["llamanos"] = 0;
	header('Location: index.php');
}/*
?>