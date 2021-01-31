<?php
session_start();
include ".includesdtm/librerias.php";
$librerias = new librerias;
if ((isset($_SESSION['admin'])&&$_SESSION['admin']==TRUE)||(isset($_SESSION['mailm'])&&$_SESSION['mailm']==TRUE)) {

 if (isset($_POST['vprevia'])) {
		$colorheader=$_POST['colorheader'];
	    $letrasheader=$_POST['letrasheader'];

	    $colortabla1=$_POST['colortabla1'];
	    $colortextot1=$_POST['colortextot1'];
	    $texto1t1=$_POST['texto1t1'];
	    $texto2t1=$_POST['texto2t1'];
	    // $imagent1=$_POST['imagent1'];

	    $colortabla2=$_POST['colortabla2'];
	    $imagent2=$_POST['imagent2'];
	    $colortextot2=$_POST['colortextot2'];
	    $textot2=$_POST['textot2'];

	    $colortabla3=$_POST['colortabla3'];
	    $colortituloimagent3=$_POST['colortituloimagent3'];
	    $imagen1t3=$_POST['imagen1t3'];
	    $tituloimg1t3=$_POST['tituloimg1t3'];
	    $linkimg1t3=$_POST['linkimg1t3'];
	    $imagen2t3=$_POST['imagen2t3'];
	    $tituloimg2t3=$_POST['tituloimg2t3'];
	    $linkimg2t3=$_POST['linkimg2t3'];
	    $imagen3t3=$_POST['imagen3t3'];
	    $tituloimg3t3=$_POST['tituloimg3t3'];
	    $linkimg3t3=$_POST['linkimg3t3'];
	    $imagen4t3=$_POST['imagen4t3'];
	    $tituloimg4t3=$_POST['tituloimg4t3'];
	    $linkimg4t3=$_POST['linkimg4t3'];
	    $imagen5t3=$_POST['imagen5t3'];
	    $tituloimg5t3=$_POST['tituloimg5t3'];
	    $linkimg5t3=$_POST['linkimg5t3'];
	    $imagen6t3=$_POST['imagen6t3'];
	    $tituloimg6t3=$_POST['tituloimg6t3'];
	    $linkimg6t3=$_POST['linkimg6t3'];

	    $colortabla4=$_POST['colortabla4'];
	    $imagent4=$_POST['imagent4'];
	    $colortextot4=$_POST['colortextot4'];
	    $titulot4=$_POST['titulot4'];
	    $desct4=$_POST['desct4'];
	    $linkt4=$_POST['linkt4'];

	    $colortabla5=$_POST['colortabla5'];
	    $colortextot5=$_POST['colortextot5'];
	    $titulot5=$_POST['titulot5'];
	    $desct5=$_POST['desct5'];
	    $linkt5=$_POST['linkt5'];
	    $imagent5=$_POST['imagent5'];

	    $colortabla6=$_POST['colortabla6'];
	    $colorletrat6=$_POST['colorletrat6'];
	    $desct6=$_POST['desct6'];

	    $colortabla7=$_POST['colortabla7'];
	    $colortituloimagent7=$_POST['colortituloimagent7'];
	    $imagen1t7=$_POST['imagen1t7'];
	    $tituloimg1t7=$_POST['tituloimg1t7'];
	    $linkimg1t7=$_POST['linkimg1t7'];
	    $imagen2t7=$_POST['imagen2t7'];
	    $tituloimg2t7=$_POST['tituloimg2t7'];
	    $linkimg2t7=$_POST['linkimg2t7'];

	    $backgroundboton=$_POST['backgroundboton'];
	    $colorletraboton=$_POST['colorletraboton'];

	    $body = '
	      	<!DOCTYPE html>
	      	<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
	         	<head>
	            	<title></title>
            		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	            	<meta name="viewport" content="width=device-width,initial-scale=1">
	            	<style>
	              		#outlook a{padding:0}
	              		.ReadMsgBody{width:100%}
	              		.ExternalClass{width:100%}
	              		.ExternalClass *{line-height:100%}
	              		body{margin:0;padding:0;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}
	              		table,td{border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0}
	              		img{border:0;height:auto;line-height:100%;outline:0;text-decoration:none;-ms-interpolation-mode:bicubic}
	              		p{display:block;margin:13px 0}
	              		@media only screen and (max-width:480px){
	                		@-ms-viewport{width:320px}
	                		@viewport{width:320px}
	              		}
	            	</style>
	            	<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">
	            	<style type="text/css">@import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);</style>
	            	<style type="text/css">
	              		@media only screen and (min-width:480px) {
	                		.mj-column-per-50{width:50%!important}
	                		.mj-column-per-25{width:25%!important}
	                		.mj-column-per-75{width:75%!important}
	                		.mj-column-per-33{width:33.333333333333336%!important}
	                		.mj-column-per-100{width:100%!important}
	                		.mj-column-px-200{width:200px!important}
	              	  		.mj-column-px-400{width:400px!important}
	              		}
	            	</style>
	            	<style>
	              		noinput.mj-menu-checkbox{display:block!important;max-height:none!important;visibility:visible!important}
              			@media only screen and (max-width:480px) {
	                		.mj-menu-checkbox[type=checkbox]~.mj-inline-links{display:none!important}
	                		.mj-menu-checkbox[type=checkbox]:checked~.mj-inline-links,.mj-menu-checkbox[type=checkbox]~.mj-menu-trigger{display:block!important;max-width:none!important;max-height:none!important;font-size:inherit!important}
	                		.mj-menu-checkbox[type=checkbox]~.mj-inline-links>a{display:block!important}
	                		.mj-menu-checkbox[type=checkbox]:checked~.mj-menu-trigger .mj-menu-icon-close{display:block!important}
	                		.mj-menu-checkbox[type=checkbox]:checked~.mj-menu-trigger .mj-menu-icon-open{display:none!important}
	              		}
	            	</style>
	         	</head>
	         	<body style="background:#d6dde5">
	            	<div class="mj-container" style="background-color: #d6dde5;">
	               		<table style="font-size: 0; width: 100%;" border="0" cellspacing="0" cellpadding="0">
	                  		<tbody>
	                     		<tr>
	                        		<td>
	                           			<div style="margin: 0 auto; max-width: 600px;">
	                              			<table style="font-size: 0; width: 100%;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                 			<tbody>
	                                    			<tr>
	                                       				<td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0; padding: 20px 0; padding-bottom: 20px;"> </td>
	                                    			</tr>
	                                 			</tbody>
	                              			</table>
	                           			</div>
	                        		</td>
	                     		</tr>
	                  		</tbody>
	               		</table>
	               		<div style="margin: 0 auto; max-width: 600px; background: '.$colorheader.';">
	                  		<table style="font-size: 0; width: 100%; background: '.$colorheader.';" border="0" cellspacing="0" cellpadding="0" align="center">
	                     		<tbody>
	                        		<tr>
		                           		<td style="text-align: center; vertical-align: top; font-size: 0; padding: 10px 25px;">
		                              		<div class="mj-column-per-50 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
		                                 		<table border="0" width="100%" cellspacing="0" cellpadding="0">
		                                    		<tbody>
		                                       			<tr>
		                                          			<td style="word-wrap: break-word; font-size: 0; padding: 10px;" align="center">
		                                             			<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
		                                                			<tbody>
		                                                   				<tr>
		                                                      				<td style="width: 280px;"><a href="https://www.digitalmtx.com" target="_blank"><img style="border: none; border-radius: 0; display: block; font-size: 13px; outline: 0; text-decoration: none; height: 100px;" src="http://www.digitalmtx.com/img/logo.png" alt="Digital MTX" height="100" /></a></td>
		                                                   				</tr>
		                                                			</tbody>
		                                             			</table>
		                                          			</td>
		                                       			</tr>
		                                    		</tbody>
		                                 		</table>
		                              		</div>
	                              			<div class="mj-column-per-50 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
		                                          			<td style="word-wrap: break-word; font-size: 0; padding-top: 5px;" align="center">
		                                             			<div>
		                                                			<input id="c0bf3f259d875799" class="mj-menu-checkbox" style="display: none!important; max-height: 0; visibility: hidden;" type="checkbox" />
		                                                			<div class="mj-menu-trigger" style="display: none; max-height: 0; max-width: 0; font-size: 0; overflow: hidden;">
		                                                				<label class="mj-menu-label" style="display: block; cursor: pointer; mso-hide: all; -moz-user-select: none; user-select: none; text-align: center; color: #fa8739; font-size: 30px; font-family: Ubuntu,Helvetica,Arial,sans-serif; text-transform: uppercase; text-decoration: none; line-height: 30px; padding: 10px;" for="c0bf3f259d875799">
		                                                					<span class="mj-menu-icon-open" style="mso-hide: all;">?</span>
		                                                					<span class="mj-menu-icon-close" style="display: none; mso-hide: all;">?</span>
		                                                				</label>
		                                                			</div>
		                                                			<div class="mj-inline-links" style="width: 100%; text-align: center;">
		                                                				<a style="display: inline-block; text-decoration: none; text-transform: uppercase; color: '.$letrasheader.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; font-weight: 400; line-height: 22px; padding: 15px 10px;" href="https://www.digitalmtx.com">
		                                                					Inicio
		                                                				</a>
		                                                				<a style="display: inline-block; text-decoration: none; text-transform: uppercase; color: '.$letrasheader.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; font-weight: 400; line-height: 22px; padding: 15px 10px;" href="https://www.digitalmtx.com/nosotros.php">
		                                                					Nosotros
		                                                				</a>
		                                                				<a style="display: inline-block; text-decoration: none; text-transform: uppercase; color: '.$letrasheader.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; font-weight: 400; line-height: 22px; padding: 15px 10px;" href="https://www.digitalmtx.com/tienda.php">
		                                                					Tienda
		                                                				</a>
	                                                				</div>
		                                             			</div>
		                                          			</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>
	                           			</td>
	                        		</tr>
	                     		</tbody>
	                  		</table>
	               		</div>

	               		<div style="margin: 0 auto; max-width: 600px; background: '.$colortabla1.';">
	                  		<table style="font-size: 0; width: 100%; background: '.$colortabla1.';" border="0" cellspacing="0" cellpadding="0" align="center">
	                     		<tbody>
	                        		<tr>
	                           			<td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0; padding: 20px 0; padding-bottom: 0; padding-top: 0;">
	                              			<div class="mj-column-px-200 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
		                                          			<td style="word-wrap: break-word; font-size: 0; padding: 10px 25px 10px 25px;" align="left">
		                                             			<div style="cursor: auto; color: '.$colortextot1.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 26px; line-height: normal; text-align: left;">
		                                                			<p style="font-size: 17px;">Sr(a) {{sr}}</p>
		                                                			<p style="line-height: normal;">'.$texto1t1.'</p>
		                                                			<p style="font-size: 13px;">'.$texto2t1.'</p>
		                                             			</div>
		                                          			</td>
	                                       				</tr>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 10px 25px 10px 25px;" align="center">
	                                             				<table style="border-collapse: separate;" border="0" cellspacing="0" cellpadding="0" align="center">
		                                                			<tbody>
		                                                   				<tr>
		                                                      				<td style="border: none; border-radius: 3px; color: '.$colorletraboton.'; cursor: auto; padding: 10px 25px;" align="center" valign="middle" bgcolor="'.$backgroundboton.'">
		                                                      					<a style="text-decoration: none; background: '.$backgroundboton.'; color: '.$colorletraboton.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 16px; font-weight: 400; line-height: 120%; text-transform: none; margin: 0;" href="https://www.digitalmtx.com/tienda.php" target="_blank">COMPRA YA
		                                                      					</a>
		                                                      				</td>
		                                                   				</tr>
		                                                			</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>

	                              			<div class="mj-column-px-400 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 0;" align="center">
	                                             				<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>
	                           			</td>
	                        		</tr>
	                     		</tbody>
	                  		</table>
	               		</div>

	               		<div style="margin: 0 auto; max-width: 600px; background: '.$colortabla2.';">
	                  		<table style="font-size: 0; width: 100%; background: '.$colortabla2.';" border="0" cellspacing="0" cellpadding="0" align="center">
	                     		<tbody>
	                        		<tr>
	                           			<td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0; padding: 20px 0; padding-bottom: 0; padding-top: 0;">
	                              			<div class="mj-column-per-25 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 10px 0 10px 0;" align="center">
	                                             				<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="width: 42px;"><img style="border: none; border-radius: 0; display: block; font-size: 13px; outline: 0; text-decoration: none; height: 50px;" src="'.$imagent2.'" alt="Box free shipping" height="50" />
	                                                      					</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>
	                              			<div class="mj-column-per-75 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 10px 25px 10px 25px;" align="left">
	                                             				<div style="cursor: auto; color: '.$colortextot2.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 18px; line-height: 22px; text-align: left;">
	                                                				<p>'.$textot2.'</p>
	                                             				</div>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>
	                           			</td>
	                        		</tr>
	                     		</tbody>
	                  		</table>
	               		</div>

	               		<div style="margin: 0 auto; max-width: 600px; background: '.$colortabla3.';">
	                  		<table style="font-size: 0; width: 100%; background: '.$colortabla3.';" border="0" cellspacing="0" cellpadding="0" align="center">
	                     		<tbody>
	                        		<tr>
	                           			<td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0; padding: 20px 0; padding-bottom: 20px; padding-top: 10px;">

	                              			<div class="mj-column-per-33 outlook-group-fix" style="vertical-align: bottom; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table style="vertical-align: bottom;" border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 30px 0 20px 0;" align="center">
	                                             				<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="width: 129px;"><img style="border: none; border-radius: 0; display: block; font-size: 13px; outline: 0; text-decoration: none; width: 120; height: 120;" src="'.$imagen1t3.'" alt="" width="120" height="120" />
	                                                      					</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="center">
	                                             				<div style="cursor: auto; color: '.$colortituloimagent3.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 15px; font-weight: bold; line-height: 22px; text-align: center;">
	                                                				<p>'.$tituloimg1t3.'</p>
	                                             				</div>
	                                          				</td>
	                                       				</tr>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 15px 30px; padding-top: 0; padding-bottom: 10px;" align="center">
	                                             				<table style="border-collapse: separate;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
		                                                      				<td style="border: none; border-radius: 3px; color: '.$colorletraboton.'; cursor: auto; padding: 10px 25px;" align="center" valign="middle" bgcolor="'.$backgroundboton .'">
		                                                      					<a style="text-decoration: none; background: '.$backgroundboton .'; color: '.$colorletraboton.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; font-weight: 400; line-height: 120%; text-transform: none; margin: 0;" href="'.$linkimg1t3.'" target="_blank">COMPRAR</a> 
		                                                      				</td>
		                                                   				</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>

	                              			<div class="mj-column-per-33 outlook-group-fix" style="vertical-align: bottom; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table style="vertical-align: bottom;" border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 30px 0 20px 0;" align="center">
	                                             				<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="width: 178px;">
	                                                         					<center>
	                                                         						<img style="border: none; border-radius: 0; display: block; font-size: 13px; outline: 0; text-decoration: none; width: 120px; height: 120px;" src="'.$imagen2t3.'" alt="" width="120" height="120" />
                                                         						</center>
	                                                      					</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="center">
	                                             				<div style="cursor: auto; color: '.$colortituloimagent3.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 15px; font-weight: bold; line-height: 22px; text-align: center;">
	                                                				<p>'.$tituloimg2t3.'</p>
	                                             				</div>
	                                          				</td>
	                                       				</tr>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 15px 30px; padding-top: 0; padding-bottom: 10px;" align="center">
	                                             				<table style="border-collapse: separate;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="border: none; border-radius: 3px; color: '.$colorletraboton.'; cursor: auto; padding: 10px 25px;" align="center" valign="middle" bgcolor="'.$backgroundboton .'">
	                                                      						<a style="text-decoration: none; background: '.$backgroundboton .'; color: '.$colorletraboton.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; font-weight: 400; line-height: 120%; text-transform: none; margin: 0;" href="'.$linkimg2t3.'" target="_blank">COMPRAR
	                                                      						</a>
                                                      						</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>

	                              			<div class="mj-column-per-33 outlook-group-fix" style="vertical-align: bottom; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table style="vertical-align: bottom;" border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 30px 0 20px 0;" align="center">
	                                             				<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
		                                                   				<tr>
		                                                      				<td style="width: 72px;"><img style="border: none; border-radius: 0; display: block; font-size: 13px; outline: 0; text-decoration: none; width: 120px; height: 120px;" src="'.$imagen3t3.'" alt="" width="120" height="120" />
		                                                      				</td>
		                                                   				</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
				                                       	<tr>
				                                          	<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="center">
				                                             	<div style="cursor: auto; color: '.$colortituloimagent3.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 15px; font-weight: bold; line-height: 22px; text-align: center;">
				                                                	<p>'.$tituloimg3t3.'</p>
				                                             	</div>
			                                          		</td>
				                                       	</tr>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 15px 30px; padding-top: 0; padding-bottom: 10px;" align="center">
	                                             				<table style="border-collapse: separate;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="border: none; border-radius: 3px; color: '.$colorletraboton.'; cursor: auto; padding: 10px 25px;" align="center" valign="middle" bgcolor="'.$backgroundboton .'">
	                                                      						<a style="text-decoration: none; background: '.$backgroundboton .'; color: '.$colorletraboton.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; font-weight: 400; line-height: 120%; text-transform: none; margin: 0;" href="'.$linkimg3t3.'" target="_blank">COMPRAR</a>
	                                                      					</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
                                          					</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>
	                           			</td>
	                        		</tr>
                     			</tbody>
	                  		</table>
	               		</div>

	               		<div style="margin: 0 auto; max-width: 600px; background: '.$colortabla3.';">
	                  		<table style="font-size: 0; width: 100%; background: '.$colortabla3.';" border="0" cellspacing="0" cellpadding="0" align="center">
	                     		<tbody>
	                        		<tr>
		                           		<td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0; padding: 20px 0; padding-bottom: 20px; padding-top: 10px;">

		                              		<div class="mj-column-per-33 outlook-group-fix" style="vertical-align: bottom; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
		                                 		<table style="vertical-align: bottom;" border="0" width="100%" cellspacing="0" cellpadding="0">
		                                    		<tbody>
		                                       			<tr>
		                                          			<td style="word-wrap: break-word; font-size: 0; padding: 20px 0 20px 0;" align="center">
		                                             			<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
			                                                		<tbody>
			                                                   			<tr>
			                                                      			<td style="width: 129px;"><img style="border: none; border-radius: 0; display: block; font-size: 13px; outline: 0; text-decoration: none; width: 120px; height: 120px;" src="'.$imagen4t3.'" alt="" width="120" height="120" /></td>
			                                                   			</tr>
			                                                		</tbody>
			                                             		</table>
		                                          			</td>
		                                       			</tr>
		                                       			<tr>
		                                          			<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="center">
		                                             			<div style="cursor: auto; color: '.$colortituloimagent3.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 15px; font-weight: bold; line-height: 22px; text-align: center;">
		                                                			<p>'.$tituloimg4t3.'</p>
		                                             			</div>
		                                          			</td>
		                                       			</tr>
		                                       			<tr>
		                                          			<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 10px 25px;" align="center">
		                                             			<table style="border-collapse: separate;" border="0" cellspacing="0" cellpadding="0" align="center">
		                                                			<tbody>
		                                                   				<tr>
		                                                      				<td style="border: none; border-radius: 3px; color: '.$colorletraboton.'; cursor: auto; padding: 10px 25px;" align="center" valign="middle" bgcolor="'.$backgroundboton .'">
		                                                      					<a style="text-decoration: none; background: '.$backgroundboton .'; color: '.$colorletraboton.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; font-weight: 400; line-height: 120%; text-transform: none; margin: 0;" href="'.$linkimg4t3.'" target="_blank">COMPRAR</a>
	                                                      					</td>
		                                                   				</tr>
		                                                			</tbody>
		                                             			</table>
		                                          			</td>
		                                       			</tr>
		                                    		</tbody>
		                                 		</table>
		                              		</div>

		                              		<div class="mj-column-per-33 outlook-group-fix" style="vertical-align: bottom; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
		                                 		<table style="vertical-align: bottom;" border="0" width="100%" cellspacing="0" cellpadding="0">
		                                    		<tbody>
		                                       			<tr>
		                                          			<td style="word-wrap: break-word; font-size: 0; padding: 20px 0 20px 0;" align="center">
		                                             			<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
		                                                			<tbody>
		                                                   				<tr>
		                                                      				<td style="width: 200px;">
		                                                         				<center>
		                                                         					<img style="border: none; border-radius: 0; display: block; font-size: 13px; outline: 0; text-decoration: none; width: 120px; height: 120px;" src="'.$imagen5t3.'" alt="" width="120" height="120" />
		                                                         				</center>
	                                                      					</td>
		                                                   				</tr>
		                                                			</tbody>
		                                             			</table>
		                                          			</td>
		                                       			</tr>
		                                       			<tr>
		                                          			<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="center">
		                                             			<div style="cursor: auto; color: '.$colortituloimagent3.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 15px; font-weight: bold; line-height: 22px; text-align: center;">
		                                                			<p>'.$tituloimg5t3.'</p>
		                                             			</div>
		                                          			</td>
		                                       			</tr>
		                                       			<tr>
		                                          			<td style="word-wrap: break-word; font-size: 0; padding: 15px 30px; padding-top: 0; padding-bottom: 10px;" align="center">
		                                             			<table style="border-collapse: separate;" border="0" cellspacing="0" cellpadding="0" align="center">
		                                                			<tbody>
		                                                   				<tr>
		                                                      				<td style="border: none; border-radius: 3px; color: '.$colorletraboton.'; cursor: auto; padding: 10px 25px;" align="center" valign="middle" bgcolor="'.$backgroundboton .'">
		                                                      					<a style="text-decoration: none; background: '.$backgroundboton .'; color: '.$colorletraboton.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; font-weight: 400; line-height: 120%; text-transform: none; margin: 0;" href="'.$linkimg5t3.'" target="_blank">COMPRAR</a>
	                                                      					</td>
		                                                   				</tr>
		                                                			</tbody>
		                                             			</table>
		                                          			</td>
		                                       			</tr>
		                                    		</tbody>
		                                 		</table>
		                              		</div>

		                              		<div class="mj-column-per-33 outlook-group-fix" style="vertical-align: bottom; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
		                                 		<table style="vertical-align: bottom;" border="0" width="100%" cellspacing="0" cellpadding="0">
		                                    		<tbody>
		                                       			<tr>
		                                          			<td style="word-wrap: break-word; font-size: 0; padding: 20px 0 20px 0;" align="center">
		                                             			<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
		                                                			<tbody>
		                                                   				<tr>
		                                                      				<td style="width: 72px;"><img style="border: none; border-radius: 0; display: block; font-size: 13px; outline: 0; text-decoration: none; width: 120px; height: 120px;" src="'.$imagen6t3.'" alt="" width="120" height="120" />
		                                                      				</td>
		                                                   				</tr>
		                                                			</tbody>
		                                             			</table>
		                                          			</td>
		                                       			</tr>
		                                       			<tr>
		                                          			<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="center">
		                                             			<div style="cursor: auto; color: '.$colortituloimagent3.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 15px; font-weight: bold; line-height: 22px; text-align: center;">
		                                                			<p>'.$tituloimg6t3.'</p>
		                                             			</div>
		                                          			</td>
		                                       			</tr>
		                                       			<tr>
		                                          			<td style="word-wrap: break-word; font-size: 0; padding: 15px 30px; padding-top: 0; padding-bottom: 10px;" align="center">
		                                             			<table style="border-collapse: separate;" border="0" cellspacing="0" cellpadding="0" align="center">
			                                                		<tbody>
			                                                   			<tr>
			                                                      			<td style="border: none; border-radius: 3px; color: '.$colorletraboton.'; cursor: auto; padding: 10px 25px;" align="center" valign="middle" bgcolor="'.$backgroundboton .'">
			                                                      				<a style="text-decoration: none; background: '.$backgroundboton .'; color: '.$colorletraboton.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; font-weight: 400; line-height: 120%; text-transform: none; margin: 0;" href="'.$linkimg6t3.'" target="_blank">COMPRAR</a>
		                                                      				</td>
			                                                   			</tr>
			                                                		</tbody>
		                                             			</table>
		                                          			</td>
		                                       			</tr>
		                                    		</tbody>
		                                 		</table>
		                              		</div>
		                           		</td>
	                        		</tr>
	                     		</tbody>
	                  		</table>
	               		</div>

	               		<div style="margin: 0 auto; max-width: 600px; background: '.$colortabla4.';">
	                  		<table style="font-size: 0; width: 100%; background: '.$colortabla4.';" border="0" cellspacing="0" cellpadding="0" align="center">
	                     		<tbody>
	                        		<tr>
	                           			<td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0; padding: 20px 0; padding-bottom: 0; padding-top: 0;">

	                              			<div class="mj-column-per-50 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 0;" align="center">
	                                             				<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="width: 300px;"><img style="border: none; border-radius: 0; display: block; font-size: 13px; outline: 0; text-decoration: none; width: 100%; height: auto;" src="'.$imagent4.'" alt="Man 1" width="300" height="auto" />
	                                                      					</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>

	                              			<div class="mj-column-per-50 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="left">
	                                             				<div style="cursor: auto; color: '.$colortextot4.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; line-height: 22px; text-align: left;">
	                                                				<p style="font-size: 19px;">'.$titulot4.'</p>
	                                                				<p>'.$desct4.'</p>
	                                             				</div>
	                                          				</td>
	                                       				</tr>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 15px 30px; padding-top: 0; padding-bottom: 10px;" align="center">
	                                             				<table style="border-collapse: separate;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="border: none; border-radius: 3px; color: '.$colorletraboton.'; cursor: auto; padding: 10px 25px;" align="center" valign="middle" bgcolor="'.$backgroundboton.'">
	                                                      						<a style="text-decoration: none; background: '.$backgroundboton.'; color: '.$colorletraboton.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; font-weight: 400; line-height: 120%; text-transform: none; margin: 0;" href="'.$linkt4.'" target="_blank">COMPRAR</a>
	                                                      					</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>

	                           			</td>
	                        		</tr>
	                     		</tbody>
	                  		</table>
	               		</div>

	               		<div style="margin: 0 auto; max-width: 600px; background: '.$colortabla5.';">
	                  		<table style="font-size: 0; width: 100%; background: '.$colortabla5.';" border="0" cellspacing="0" cellpadding="0" align="center">
	                     		<tbody>
	                        		<tr>
	                           			<td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0; padding: 20px 0; padding-bottom: 0; padding-top: 0;">

	                              			<div class="mj-column-per-50 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="left">
	                                             				<div style="cursor: auto; color: '.$colortextot5.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; line-height: 22px; text-align: left;">
	                                                				<p style="font-size: 19px;">'.$titulot5.'</p>
	                                                				<p>'.$desct5.'</p>
	                                             				</div>
	                                          				</td>
	                                       				</tr>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 15px 30px; padding-top: 0; padding-bottom: 10px;" align="center">
	                                             				<table style="border-collapse: separate;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="border: none; border-radius: 3px; color: '.$colorletraboton.'; cursor: auto; padding: 10px 25px;" align="center" valign="middle" bgcolor="'.$backgroundboton.'">
	                                                      						<a style="text-decoration: none; background: '.$backgroundboton.'; color: '.$colorletraboton.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; font-weight: 400; line-height: 120%; text-transform: none; margin: 0;" href="'.$linkt5.'" target="_blank">COMPRAR</a>
	                                                      					</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>

	                              			<div class="mj-column-per-50 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 0;" align="center">
	                                             				<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="width: 300px;"><img style="border: none; border-radius: 0; display: block; font-size: 13px; outline: 0; text-decoration: none; width: 100%; height: auto;" src="'.$imagent5.'" alt="Man 2" width="300" height="auto" />
	                                                      					</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>
	                           			</td>
	                        		</tr>
	                     		</tbody>
	                  		</table>
	               		</div>

	               		<div style="margin: 0 auto; max-width: 600px; background: '.$colortabla6.';">
	                  		<table style="font-size: 0; width: 100%; background: '.$colortabla6.';" border="0" cellspacing="0" cellpadding="0" align="center">
	                     		<tbody>
	                        		<tr>
	                           			<td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0; padding: 20px 0; padding-bottom: 0; padding-top: 0;">
	                              			<div class="mj-column-per-100 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 10px 25px 10px 25px;" align="center">
	                                             				<div style="cursor: auto; color: '.$colorletrat6.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; line-height: 22px; text-align: center;">
	                                                				<p style="font-size: 27px;">'.$desct6.'</p>
	                                             				</div>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>
	                           			</td>
	                        		</tr>
	                     		</tbody>
	                  		</table>
	               		</div>

	               		<div style="margin: 0 auto; max-width: 600px; background: '.$colortabla7.';">
	                  		<table style="font-size: 0; width: 100%; background: '.$colortabla7.';" border="0" cellspacing="0" cellpadding="0" align="center">
	                     		<tbody>
	                        		<tr>
	                           			<td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0; padding: 20px 0; padding-bottom: 20px; padding-top: 20px;">

	                              			<div class="mj-column-per-50 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="center">
	                                             				<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="width: 199px;"><img style="border: none; border-radius: 0; display: block; font-size: 13px; outline: 0; text-decoration: none; width: 100%; height: auto;" src="'.$imagen1t7.'" alt="" width="250" height="auto" />
	                                                      					</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="center">
	                                             				<div style="cursor: auto; color: '.$colortituloimagent7.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 15px; font-weight: bold; line-height: 22px; text-align: center;">
	                                                				<p>'.$tituloimg1t7.'</p>
	                                             				</div>
	                                          				</td>
	                                       				</tr>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 15px 30px; padding-top: 0; padding-bottom: 10px;" align="center">
	                                             				<table style="border-collapse: separate;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="border: none; border-radius: 3px; color: '.$colorletraboton.'; cursor: auto; padding: 10px 25px;" align="center" valign="middle" bgcolor="'.$backgroundboton.'">
	                                                      						<a style="text-decoration: none; background: '.$backgroundboton.'; color: '.$colorletraboton.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; font-weight: 400; line-height: 120%; text-transform: none; margin: 0;" href="'.$linkimg1t7.'" target="_blank">COMPRAR</a>
	                                                      					</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>

	                              			<div class="mj-column-per-50 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="center">
	                                             				<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="width: 199px;"><img style="border: none; border-radius: 0; display: block; font-size: 13px; outline: 0; text-decoration: none; width: 100%; height: auto;" src="'.$imagen2t7.'" alt="Camden backpack" width="199" height="auto" /></td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="center">
	                                             				<div style="cursor: auto; color: '.$colortituloimagent7.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 15px; font-weight: bold; line-height: 22px; text-align: center;">
	                                                				<p>'.$tituloimg2t7.'</p>
	                                             				</div>
	                                          				</td>
	                                       				</tr>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 15px 30px; padding-top: 0; padding-bottom: 10px;" align="center">
	                                             				<table style="border-collapse: separate;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="border: none; border-radius: 3px; color: '.$colorletraboton.'; cursor: auto; padding: 10px 25px;" align="center" valign="middle" bgcolor="'.$backgroundboton.'">
	                                                      						<a style="text-decoration: none; background: '.$backgroundboton.'; color: '.$colorletraboton.'; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; font-weight: 400; line-height: 120%; text-transform: none; margin: 0;" href="'.$linkimg2t7.'" target="_blank">COMPRAR</a>
                                                      						</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>
	                           			</td>
                        			</tr>
	                     		</tbody>
	                  		</table>
	               		</div>

	               		<div style="margin: 0 auto; max-width: 600px; background: #000;">
	                  		<table style="font-size: 0; width: 100%; background: #000;" border="0" cellspacing="0" cellpadding="0" align="center">
	                     		<tbody>
	                        		<tr>
	                           			<td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0; padding: 20px 0; padding-bottom: 20px; padding-top: 20px;">

	                              			<div class="mj-column-per-33 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 10px 25px;" align="center">
	                                             				<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="width: 72px;"><img style="border: none; border-radius: 0; display: block; font-size: 13px; outline: 0; text-decoration: none; width: 100%; height: auto;" src="http://191n.mj.am/img/191n/3s/x47.png" alt="Cards" width="72" height="auto" />
	                                                      					</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="center">
	                                             				<div style="cursor: auto; color: #fff; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; line-height: 22px; text-align: center;">
	                                                				<p style="font-size: 15px; font-weight: bold;">METODOS DE PAGOS</p>
	                                                				<p>Tenemos todos los aceptados por PayU</p>
	                                             				</div>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>

	                              			<div class="mj-column-per-33 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 10px 25px 0 25px;" align="center">
	                                             				<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="width: 70px;"><img style="border: none; border-radius: 0; display: block; font-size: 13px; outline: 0; text-decoration: none; width: 100%; height: auto;" src="http://191n.mj.am/img/191n/3s/x48.png" alt="Currencies" width="70" height="auto" />
	                                                      					</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="center">
	                                             				<div style="cursor: auto; color: #fff; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; line-height: 22px; text-align: center;">
	                                                				<p style="font-size: 15px; font-weight: bold;">PESOS O DOLARES</p>
	                                                				<p>Elije con que moneda quieres pagar</p>
	                                             				</div>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>

	                              			<div class="mj-column-per-33 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 10px 25px 8px 25px;" align="center">
	                                             				<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="width: 82px;"><img style="border: none; border-radius: 0; display: block; font-size: 13px; outline: 0; text-decoration: none; width: 100%; height: auto;" src="http://191n.mj.am/img/191n/3s/x4y.png" alt="Express" width="82" height="auto" />
	                                                      					</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="center">
	                                             				<div style="cursor: auto; color: #fff; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; line-height: 22px; text-align: center;">
	                                                				<p style="font-size: 15px; font-weight: bold;">ENVIOS RAPIDOS</p>
	                                                				<p>Envios responsables y rapidos</p>
	                                             				</div>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>
	                           			</td>
	                        		</tr>
	                     		</tbody>
	                  		</table>
	               		</div>

	               		<div style="margin: 0 auto; max-width: 600px; background: #F53B21;">
	                  		<table style="font-size: 0; width: 100%; background: #F53B21;" border="0" cellspacing="0" cellpadding="0" align="center">
	                     		<tbody>
	                        		<tr>
	                           			<td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0; padding: 20px 0; padding-bottom: 0; padding-top: 0;">

	                              			<div class="mj-column-per-33 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 10px 0 0 0;" align="center">
	                                             				<table style="border-collapse: collapse; border-spacing: 0;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                				<tbody>
	                                                   					<tr>
	                                                      					<td style="width: 180px;">
	                                                         					<div style="cursor: auto; color: #fff; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; line-height: 22px; text-align: center;">
	                                                            					<p>© Digital MTX</p>
	                                                         					</div>
	                                                      					</td>
	                                                   					</tr>
	                                                				</tbody>
	                                             				</table>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>

	                              			<div class="mj-column-per-33 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 0 25px 0 25px;" align="center">
	                                             				<div style="cursor: auto; color: #fff; font-family: Ubuntu,Helvetica,Arial,sans-serif; font-size: 13px; line-height: 22px; text-align: center;">
	                                                				<p>
	                                                					<a style="text-decoration: none; color: inherit;" href="https://www.digitalmtx.com">Pagina Web</a>
                                                					</p>
	                                             				</div>
	                                          				</td>
	                                       				</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>

	                              			<div class="mj-column-per-33 outlook-group-fix" style="vertical-align: top; display: inline-block; direction: ltr; font-size: 13px; text-align: left; width: 100%;">
	                                 			<table border="0" width="100%" cellspacing="0" cellpadding="0">
	                                    			<tbody>
	                                       				<tr>
	                                          				<td style="word-wrap: break-word; font-size: 0; padding: 10px 25px 10px 25px;" align="center">
	                                             				<div>
	                                                				<table style="float: none; display: inline-table;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                   					<tbody>
	                                                      					<tr>
	                                                         					<td style="padding: 4px; vertical-align: middle;">
	                                                            					<table style="background: #3b5998; border-radius: 3px; width: 20px;" border="0" cellspacing="0" cellpadding="0">
	                                                               						<tbody>
	                                                                  						<tr>
	                                                                     						<td style="font-size: 0; vertical-align: middle; width: 20px; height: 20px;">
	                                                                     							<a href="https://www.facebook.com/DigitalMTX"><img style="display: block; border-radius: 3px;" src="https://www.mailjet.com/images/theme/v1/icons/ico-social/facebook.png" alt="facebook" width="20" height="20" /></a>
	                                                                     						</td>
	                                                                  						</tr>
	                                                               						</tbody>
	                                                            					</table>
	                                                         					</td>
	                                                      					</tr>
	                                                   					</tbody>
	                                                				</table>

	                                                				<table style="float: none; display: inline-table;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                   					<tbody>
	                                                      					<tr>
	                                                         					<td style="padding: 4px; vertical-align: middle;">
	                                                            					<table style="background: #55acee; border-radius: 3px; width: 20px;" border="0" cellspacing="0" cellpadding="0">
	                                                               						<tbody>
	                                                                  						<tr>
	                                                                     						<td style="font-size: 0; vertical-align: middle; width: 20px; height: 20px;">
	                                                                     							<a href="https://twitter.com/DigitalMTX"><img style="display: block; border-radius: 3px;" src="https://www.mailjet.com/images/theme/v1/icons/ico-social/twitter.png" alt="twitter" width="20" height="20" /></a>
                                                                     							</td>
	                                                                  						</tr>
	                                                               						</tbody>
	                                                            					</table>
	                                                         					</td>
	                                                      					</tr>
	                                                   					</tbody>
	                                                				</table>

	                                                				<table style="float: none; display: inline-table;" border="0" cellspacing="0" cellpadding="0" align="center">
	                                                   					<tbody>
	                                                      					<tr>
	                                                         					<td style="padding: 4px; vertical-align: middle;">
	                                                            					<table style="background: #dc4e41; border-radius: 3px; width: 20px;" border="0" cellspacing="0" cellpadding="0">
	                                                               						<tbody>
	                                                                  						<tr>
	                                                                     						<td style="font-size: 0; vertical-align: middle; width: 20px; height: 20px;">
	                                                                     							<a href="https://www.instagram.com/digitalmtx/"><img style="display: block; border-radius: 3px;" src="https://www.mailjet.com/images/theme/v1/icons/ico-social/instagram.png" alt="instagram" width="20" height="20" /></a>
                                                                     							</td>
	                                                                  						</tr>
	                                                               						</tbody>
	                                                            					</table>
	                                                         					</td>
	                                                      					</tr>
	                                                   					</tbody>
	                                                				</table>
	                                             				</div>
	                                          				</td>
                                       					</tr>
	                                    			</tbody>
	                                 			</table>
	                              			</div>
	                           			</td>
	                        		</tr>
	                     		</tbody>
	                  		</table>
	               		</div>

	               		<div style="margin: 0 auto; max-width: 600px;">
	                  		<table style="font-size: 0; width: 100%;" border="0" cellspacing="0" cellpadding="0" align="center">
	                     		<tbody>
	                        		<tr>
	                           			<td style="text-align: center; vertical-align: top; direction: ltr; font-size: 0; padding: 20px 0; padding-bottom: 20px; padding-top: 20px;"> 
	                           			</td>
	                        		</tr>
	                     		</tbody>
	                  		</table>
	               		</div>

	            	</div>
	        	</body>
	      	</html>';
  	
}
		    


  if (isset($_POST['vprevia'])) {

        echo $body."
          <html>
             <br>
             <center>
                <form action='' method='post'>
                   <input type='hidden' name='colorheader' value='$colorheader'>
                   <input type='hidden' name='letrasheader' value='$letrasheader'>
                   <input type='hidden' name='colortabla1' value='$colortabla1'>
                   <input type='hidden' name='colortextot1' value='$colortextot1'>
                   <input type='hidden' name='texto1t1' value='$texto1t1'>
                   <input type='hidden' name='texto2t1' value='$texto2t1'>
                 
                   <input type='hidden' name='colortabla2' value='$colortabla2'>
                   <input type='hidden' name='imagent2' value='$imagent2'>
                   <input type='hidden' name='colortextot2' value='$colortextot2'>
                   <input type='hidden' name='textot2' value='$textot2'>
                   <input type='hidden' name='colortabla3' value='$colortabla3'>
                   <input type='hidden' name='colortituloimagent3' value='$colortituloimagent3'>
                   <input type='hidden' name='colortituloimagent3' value='$colortituloimagent3'>
                   <input type='hidden' name='imagen1t3' value='$imagen1t3'>
                   <input type='hidden' name='tituloimg1t3' value='$tituloimg1t3'>
                   <input type='hidden' name='linkimg1t3' value='$linkimg1t3'>
                   <input type='hidden' name='imagen2t3' value='$imagen2t3'>
                   <input type='hidden' name='tituloimg2t3' value='$tituloimg2t3'>
                   <input type='hidden' name='linkimg2t3' value='$linkimg2t3'>      
                   <input type='hidden' name='imagen3t3' value='$imagen3t3'>
                   <input type='hidden' name='tituloimg3t3' value='$tituloimg3t3'>
                   <input type='hidden' name='linkimg3t3' value='$linkimg3t3'>
                   <input type='hidden' name='imagen4t3' value='$imagen4t3'>
                   <input type='hidden' name='tituloimg4t3' value='$tituloimg4t3'>
                   <input type='hidden' name='linkimg4t3' value='$linkimg4t3'>
                   <input type='hidden' name='imagen5t3' value='$imagen5t3'>
                   <input type='hidden' name='tituloimg5t3' value='$tituloimg5t3'>
                   <input type='hidden' name='linkimg5t3' value='$linkimg5t3'>
                   <input type='hidden' name='imagen6t3' value='$imagen6t3'>
                   <input type='hidden' name='tituloimg6t3' value='$tituloimg6t3'>
                   <input type='hidden' name='linkimg6t3' value='$linkimg6t3'>
                   <input type='hidden' name='colortabla4' value='$colortabla4'>
                   <input type='hidden' name='imagent4' value='$imagent4'>
                   <input type='hidden' name='colortextot4' value='$colortextot4'>
                   <input type='hidden' name='titulot4' value='$titulot4'>
                   <input type='hidden' name='desct4' value='$desct4'>
                   <input type='hidden' name='linkt4' value='$linkt4'>
                   <input type='hidden' name='colortabla5' value='$colortabla5'>
                   <input type='hidden' name='colortextot5' value='$colortextot5'>
                   <input type='hidden' name='titulot5' value='$titulot5'>
                   <input type='hidden' name='desct5' value='$desct5'>
                   <input type='hidden' name='linkt5' value='$linkt5'>
                   <input type='hidden' name='imagent5' value='$imagent5'>
                   <input type='hidden' name='colortabla6' value='$colortabla6'>
                   <input type='hidden' name='colorletrat6' value='$colorletrat6'>
                   <input type='hidden' name='desct6' value='$desct6'>
                   <input type='hidden' name='colortabla7' value='$colortabla7'>
                   <input type='hidden' name='colortituloimagent7' value='$colortituloimagent7'>
                   <input type='hidden' name='imagen1t7' value='$imagen1t7'>
                   <input type='hidden' name='tituloimg1t7' value='$tituloimg1t7'>
                   <input type='hidden' name='linkimg1t7' value='$linkimg1t7'>
                   <input type='hidden' name='imagen2t7' value='$imagen2t7'>
                   <input type='hidden' name='tituloimg2t7' value='$tituloimg2t7'>
                   <input type='hidden' name='linkimg2t7' value='$linkimg2t7'>
                   <input type='hidden' name='backgroundboton' value='$backgroundboton'>
                   <input type='hidden' name='colorletraboton' value='$colorletraboton'>
                   <input type='submit' name='enviar' value='Enviar Correos' class='btn btn-outline-primary btn-md'>      
                </form>
             </center>
          </html>";

  	} elseif(isset($_POST['enviar'])) {

  		include_once '.includesdtm/conexion.php';
  		$conn= new conexion();
    	//$con=new mysqli("localhost", "digitalmtx_dmtx", "D!g!t@lmtxc4r","digitalmtx_dtmmtx");
    	$con=new mysqli($conn->gethost(), $conn->getusuario_db(), $conn->getcontrasena_db(),$conn->getnombre_db());

    	$qry="SELECT * FROM dtm_user WHERE activo='1' and ins='1'";
    	$res=$con->query($qry);

    	$done=0;
    	$error=0;
    	$row=true;/*$row=mysqli_fetch_assoc($res)*/
    	while ($row) {

      		$nombre= explode(" ",'Diego alberto');
      		$apellido= explode(" ", 'Rodriguez Veloza');
      		$body= str_replace("{{sr}}", $nombre[0]."\t".$apellido[0], $body);
      		$header = "From: Digital MTX <no-responder@gtcloud.org> \r\n";//grupotecnologico.org
      		$header .= "X-Mailer: PHP5/". phpversion()."\n";
      		$header .= 'MIME-Version: 1.0' . "\n";
      		$header .= "Content-Type: text/html; charset=UTF-8";
      		//$email= $row['correo'];
      		$email= 'desarrolloapp@grupotecnologico.org';//avargas@grupotecnologico.org----diringenieria@wdcmayorista.com
      		//arthurstiben@gmail.com
      		$asunto="Sr(a). ".strtoupper('Diego')." tenemos ofertas para ti";

      		if(mail($email, $asunto, $body, $header)) {
          		echo "<br>enviado ".$email;
          		$done=$done+1;
      		} else {
          		echo "<br><b>error</b> ".$email;
          		$error=$error+1;
      		}

      		$body= str_replace($nombre[0]."\t".$apellido[0], "{{sr}}", $body);

      		$row=false;

    	}

    	echo "<br>".$done." correos se enviaron<br>".$error." correos no se enviaron";

  	} else {
		?>
		<!DOCTYPE html>
    	<html>
    		<head>
	            <?php
	                $librerias->gtm_head();
	            ?>
	            <meta charset="utf-8">
	            <title>Digital MTX| Correo masivo</title>
	            <meta name="description" content="Nuestra labor esta encaminada a ofrecer productos de la mejor calidad con el mejor precio manejando tiempos de entrega rapido, facilidades de pago">
	            <meta name="keywords" content="Computadores, portatiles, pantallas, baterias, teclados, apple, hp, ishop, repuestos, cargadores, servicio tecnico, soporte tecnico, usb, tecnologia, garantia, pc">

	            <meta name="viewport" content="width=device-width, initial-scale=1">

	            <meta name="author" content="Reinaldo Pastran">
	            <meta name="author" content="Edwin Velasquez Jimenez(lion_3214@hotmail.com), Diego Rodríguez Veloza(@rodvel2910)">

	            <link rel="shortcut icon" type="image/x-icon" href="img/icon.png">

	            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli&display=swap">
	            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	            <link rel="stylesheet" href="https://d1azc1qln24ryf.cloudfront.net/114779/Socicon/style-cf.css?u8vidh">

	            <link rel="stylesheet" href="css/v3/index.css">
	            <link rel="stylesheet" href="lib/vidgal/css/vidgal.css">
	        </head>
			<body style="overflow-x: hidden;">
				<?php
	                $librerias->gtm_body();
	                $librerias->nav();
	            ?>
	            <div class="row">
	                <div class="col s12 destacados-titulo-wrapper">
	                    <a class="btn btn-media-accion waves-effect waves-light" href="paneladm.php"><i class="material-icons left">keyboard_arrow_left</i>Volver al panel de administración</a>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col s12 destacados-titulo-wrapper center">
	                    <i class="material-icons small">email</i>
	                    <h4 class="destacados-titulo">Correo masivo</h4>
	                </div>
	            </div>
	            <div class="row">
                	<div class="col s12 destacados-wrapper">
                		<div class="row">
                			<div class="col s12 center">
                				<a href="./plantilla2.html" target="_blank" class="btn btn-confirmar-accion waves-effect waves-light"><i class="material-icons right">keyboard_arrow_right</i>Ver plantilla original</a>
                			</div>
                		</div>
                		<form action="" method="POST" target="_blank">
                			<div class="row">
                				<!-- Start header-->
	                				<div class="col s6">
	                					<div class="col s12 destacados-sub-titulo-wrapper">
						                    <h5 class="destacados-titulo">Header</h5>
						                </div>
						                <div class="col s12">
						                	<div class="row">
						                		<div class="input-field col s6">
													<label for="colorheader">Background header</label>
													<br><br>
													<input id="colorheader" name="colorheader" type="color"/>  
												</div>
												<div class="input-field col s6">
													<label for="colorheader">Color menu header</label>
													<br><br>
													<input id="colorletrasheader" name="letrasheader" type="color"/> 
												</div>
						                	</div>
						                	<div class="row">
						                		<div class="col s12 center">
													<a href="#modal1" class="btn btn-media-accion waves-effect waves-light modal-trigger"><i class="material-icons right">keyboard_arrow_right</i>Ver ejemplo</a>
												</div>
						                	</div>
						                	<div id="modal1" class="modal modal-fixed-footer">
												<div class="modal-content">
													<div class="row">
														<div class="col s12 titulo-modal-te-llamamos">
															<h4>Ejemplo de header</h4>
														</div>
														<div class="col s12 texto-modal-te-llamamos">
															<div class="modal-body">
	                                     						<img class="img-responsive" src="./img/mail/seccion0.png" alt="" width="100%" /> 
	                                     					</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
												</div>
											</div>
						                </div>
	                				</div>
                				<!-- End header-->
                				<!-- Start botones-->
	                				<div class="col s6">
	                					<div class="col s12 destacados-sub-titulo-wrapper">
						                    <h5 class="destacados-titulo">Botones</h5>
						                </div>
						                <div class="col s12">
						                	<div class="row">
						                		<div class="input-field col s6">
													<label for="backgroundboton">Background de todos los botones</label>
													<br><br>
													<input id="backgroundboton" name="backgroundboton" type="color" />  
												</div>
												<div class="input-field col s6">
													<label for="colorletraboton">Color de letra de todos los botones</label>
													<br><br>
													<input id="colorletraboton" name="colorletraboton" type="color" /> 
												</div>
						                	</div>
						                </div>
	                				</div>
                				<!-- End botones-->
				            </div>
				            <div class="row">
                				<!-- Start sección #1 -->
	                				<div class="col s6">
	                					<div class="col s12 destacados-sub-titulo-wrapper">
						                    <h5 class="destacados-titulo">Sección #1</h5>
						                </div>
						                <div class="col s12">
						                	<div class="row">
						                		<div class="input-field col s6">
													<label for="bgs1">Background seccion 1</label>
													<br><br>
													<input id="bgs1" name="colortabla1" type="color" />
												</div>
												<div class="input-field col s6">
													<label for="colorletras1">Color texto seccion 1</label>
													<br><br>
													<input id="colorletras1" name="colortextot1" type="color"/>
												</div>
												<div class="input-field col s6">
													<input id="texto1t1" name="texto1t1" type="text"/>
													<label for="texto1t1">Texto 1 seccion 1</label>
												</div>
												<div class="input-field col s6">
													<input id="texto2t1" name="texto2t1" type="text"/>
													<label for="texto2t1">Texto 2 seccion 1</label>
												</div>
												
						                	</div>
						                	<div class="row">
						                		<div class="col s12 center">
													<a href="#modal2" class="btn btn-media-accion waves-effect waves-light modal-trigger"><i class="material-icons right">keyboard_arrow_right</i>Ver ejemplo</a>
												</div>
						                	</div>
						                	<div id="modal2" class="modal modal-fixed-footer">
												<div class="modal-content">
													<div class="row">
														<div class="col s12 titulo-modal-te-llamamos">
															<h4>Ejemplo de sección #1</h4>
														</div>
														<div class="col s12 texto-modal-te-llamamos">
															<div class="modal-body">
	                                     						<img class="img-responsive" src="./img/mail/seccion1.png" alt="" width="100%" /> 
	                                     					</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
												</div>
											</div>
						                </div>
	                				</div>
                				<!-- End sección #1 -->
                				<!-- Start sección #2 -->
	                				<div class="col s6">
	                					<div class="col s12 destacados-sub-titulo-wrapper">
						                    <h5 class="destacados-titulo">Sección #2</h5>
						                </div>
						                <div class="col s12">
						                	<div class="row">
						                		<div class="input-field col s6">
													<label for="colortabla2">Background seccion 2</label>
													<br><br>
													<input id="colortabla2" name="colortabla2" type="color" />
												</div>
												<div class="input-field col s6">
													<label for="colortextot2">Color texto seccion 2</label>
													<br><br>
													<input id="colortextot2" name="colortextot2" type="color"/>
												</div>
												<div class="input-field col s6">
													<input id="imagent2" name="imagent2" type="text"/>
													<label for="imagent2">Imagen seccion 2</label>
												</div>
												<div class="input-field col s6">
													<input id="textot2" name="textot2" type="text"/>
													<label for="textot2">Texto seccion 2</label>
												</div>
						                	</div>
						                	<div class="row">
						                		<div class="col s12 center">
													<a href="#modal3" class="btn btn-media-accion waves-effect waves-light modal-trigger"><i class="material-icons right">keyboard_arrow_right</i>Ver ejemplo</a>
												</div>
						                	</div>
						                	<div id="modal3" class="modal modal-fixed-footer">
												<div class="modal-content">
													<div class="row">
														<div class="col s12 titulo-modal-te-llamamos">
															<h4>Ejemplo de sección #2</h4>
														</div>
														<div class="col s12 texto-modal-te-llamamos">
															<div class="modal-body">
	                                     						<img class="img-responsive" src="./img/mail/seccion2.png" alt="" width="100%" /> 
	                                     					</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
												</div>
											</div>
						                </div>
	                				</div>
                				<!-- End sección #2 -->
                				<!-- Start sección #3 -->
	                				<div class="col s12">
	                					<div class="col s12 destacados-sub-titulo-wrapper">
						                    <h5 class="destacados-titulo">Sección #3</h5>
						                </div>
						                <div class="col s12">
						                	<div class="row">
						                		<div class="input-field col s6">
													<label for="colortabla3">Background seccion 3</label>
													<br><br>
													<input id="colortabla3" name="colortabla3" type="color" />
												</div>
												<div class="input-field col s6">
													<label for="colortituloimagent3">Color titulos seccion 3</label>
													<br><br>
													<input id="colortituloimagent3" name="colortituloimagent3" type="color"/>
												</div>
												<div class="col s12">
													<hr class="divider">
												</div>
												<div class="col s6">
													<div class="col s12">
														<h5 class="destacados-sub-titulo">Item #1</h5>
														<div class="input-field col s6">
															<input id="imagen1t3" name="imagen1t3" type="text"/>
															<label for="imagen1t3">Imagen item 1</label>
														</div>
														<div class="input-field col s6">
															<input id="tituloimg1t3" name="tituloimg1t3" type="text"/>
															<label for="tituloimg1t3">Titulo item 1</label>
														</div>
														<div class="input-field col s6">
															<input id="linkimg1t3" name="linkimg1t3" type="text"/>
															<label for="linkimg1t3">Enlace item 1</label>
														</div>
													</div>
												</div>
												<div class="col s6">
													<div class="col s12">
														<h5 class="destacados-sub-titulo">Item #2</h5>
														<div class="input-field col s6">
															<input id="imagen2t3" name="imagen2t3" type="text"/>
															<label for="imagen2t3">Imagen item 2</label>
														</div>
														<div class="input-field col s6">
															<input id="tituloimg2t3" name="tituloimg2t3" type="text"/>
															<label for="tituloimg2t3">Titulo item 2</label>
														</div>
														<div class="input-field col s6">
															<input id="linkimg2t3" name="linkimg2t3" type="text"/>
															<label for="linkimg2t3">Enlace item 2</label>
														</div>
													</div>
												</div>
												<div class="col s6">
													<div class="col s12">
														<h5 class="destacados-sub-titulo">Item #3</h5>
														<div class="input-field col s6">
															<input id="imagen3t3" name="imagen3t3" type="text"/>
															<label for="imagen3t3">Imagen item 3</label>
														</div>
														<div class="input-field col s6">
															<input id="tituloimg3t3" name="tituloimg3t3" type="text"/>
															<label for="tituloimg3t3">Titulo item 3</label>
														</div>
														<div class="input-field col s6">
															<input id="linkimg3t3" name="linkimg3t3" type="text"/>
															<label for="linkimg3t3">Enlace item 3</label>
														</div>
													</div>
												</div>
												<div class="col s6">
													<div class="col s12">
														<h5 class="destacados-sub-titulo">Item #4</h5>
														<div class="input-field col s6">
															<input id="imagen4t3" name="imagen4t3" type="text"/>
															<label for="imagen4t3">Imagen item 4</label>
														</div>
														<div class="input-field col s6">
															<input id="tituloimg4t3" name="tituloimg4t3" type="text"/>
															<label for="tituloimg4t3">Titulo item 4</label>
														</div>
														<div class="input-field col s6">
															<input id="linkimg4t3" name="linkimg4t3" type="text"/>
															<label for="linkimg4t3">Enlace item 4</label>
														</div>
													</div>
												</div>
												<div class="col s6">
													<div class="col s12">
														<h5 class="destacados-sub-titulo">Item #5</h5>
														<div class="input-field col s6">
															<input id="imagen5t3" name="imagen5t3" type="text"/>
															<label for="imagen5t3">Imagen item 5</label>
														</div>
														<div class="input-field col s6">
															<input id="tituloimg5t3" name="tituloimg5t3" type="text"/>
															<label for="tituloimg5t3">Titulo item 5</label>
														</div>
														<div class="input-field col s6">
															<input id="linkimg5t3" name="linkimg5t3" type="text"/>
															<label for="linkimg5t3">Enlace item 5</label>
														</div>
													</div>
												</div>
												<div class="col s6">
													<div class="col s12">
														<h5 class="destacados-sub-titulo">Item #6</h5>
														<div class="input-field col s6">
															<input id="imagen6t3" name="imagen6t3" type="text"/>
															<label for="imagen6t3">Imagen item 6</label>
														</div>
														<div class="input-field col s6">
															<input id="tituloimg6t3" name="tituloimg6t3" type="text"/>
															<label for="tituloimg6t3">Titulo item 6</label>
														</div>
														<div class="input-field col s6">
															<input id="linkimg6t3" name="linkimg6t3" type="text"/>
															<label for="linkimg6t3">Enlace item 6</label>
														</div>
													</div>
												</div>
						                	</div>
						                	<div class="row">
						                		<div class="col s12 center">
													<a href="#modal4" class="btn btn-media-accion waves-effect waves-light modal-trigger"><i class="material-icons right">keyboard_arrow_right</i>Ver ejemplo</a>
												</div>
						                	</div>
						                	<div id="modal4" class="modal modal-fixed-footer">
												<div class="modal-content">
													<div class="row">
														<div class="col s12 titulo-modal-te-llamamos">
															<h4>Ejemplo de sección #3</h4>
														</div>
														<div class="col s12 texto-modal-te-llamamos">
															<div class="modal-body">
	                                     						<img class="img-responsive" src="./img/mail/seccion3.png" alt="" width="100%" /> 
	                                     					</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
												</div>
											</div>
						                </div>
	                				</div>
                				<!-- End sección #3 -->
                				<!-- Start sección #4 -->
	                				<div class="col s6">
	                					<div class="col s12 destacados-sub-titulo-wrapper">
						                    <h5 class="destacados-titulo">Sección #4</h5>
						                </div>
						                <div class="col s12">
						                	<div class="row">
						                		<div class="input-field col s6">
													<label for="colortabla4">Background seccion 4</label>
													<br><br>
													<input id="colortabla4" name="colortabla4" type="color" />
												</div>
												<div class="input-field col s6">
													<label for="colortextot4">Color texto seccion 4</label>
													<br><br>
													<input id="colortextot4" name="colortextot4" type="color"/>
												</div>
												<div class="input-field col s6">
													<input id="imagent4" name="imagent4" type="text"/>
													<label for="imagent4">Imagen seccion 4</label>
												</div>
												<div class="input-field col s6">
													<input id="titulot4" name="titulot4" type="text"/>
													<label for="titulot4">Titulo seccion 4</label>
												</div>
												<div class="input-field col s6">
													<input id="desct4" name="desct4" type="text"/>
													<label for="desct4">Descripcion seccion 4</label>
												</div>
												<div class="input-field col s6">
													<input id="linkt4" name="linkt4" type="text"/>
													<label for="linkt4">Enlace boton seccion 4</label>
												</div>
						                	</div>
						                	<div class="row">
						                		<div class="col s12 center">
													<a href="#modal5" class="btn btn-media-accion waves-effect waves-light modal-trigger"><i class="material-icons right">keyboard_arrow_right</i>Ver ejemplo</a>
												</div>
						                	</div>
						                	<div id="modal5" class="modal modal-fixed-footer">
												<div class="modal-content">
													<div class="row">
														<div class="col s12 titulo-modal-te-llamamos">
															<h4>Ejemplo de sección #4</h4>
														</div>
														<div class="col s12 texto-modal-te-llamamos">
															<div class="modal-body">
	                                     						<img class="img-responsive" src="./img/mail/seccion4.png" alt="" width="100%" /> 
	                                     					</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
												</div>
											</div>
						                </div>
	                				</div>
                				<!-- End sección #4 -->
                				<!-- Start sección #5 -->
	                				<div class="col s6">
	                					<div class="col s12 destacados-sub-titulo-wrapper">
						                    <h5 class="destacados-titulo">Sección #5</h5>
						                </div>
						                <div class="col s12">
						                	<div class="row">
						                		<div class="input-field col s6">
													<label for="colortabla5">Background seccion 5</label>
													<br><br>
													<input id="colortabla5" name="colortabla5" type="color" />
												</div>
												<div class="input-field col s6">
													<label for="colortextot5">Color texto seccion 5</label>
													<br><br>
													<input id="colortextot5" name="colortextot5" type="color"/>
												</div>
												<div class="input-field col s6">
													<input id="titulot5" name="titulot5" type="text"/>
													<label for="titulot5">Titulo seccion 5</label>
												</div>
												<div class="input-field col s6">
													<input id="desct5" name="desct5" type="text"/>
													<label for="desct5">Descripcion seccion 5</label>
												</div>
												<div class="input-field col s6">
													<input id="linkt5" name="linkt5" type="text"/>
													<label for="linkt5">Enlace boton seccion 5</label>
												</div>
												<div class="input-field col s6">
													<input id="imagent5" name="imagent5" type="text"/>
													<label for="imagent5">Imagen seccion 5</label>
												</div>
						                	</div>
						                	<div class="row">
						                		<div class="col s12 center">
													<a href="#modal6" class="btn btn-media-accion waves-effect waves-light modal-trigger"><i class="material-icons right">keyboard_arrow_right</i>Ver ejemplo</a>
												</div>
						                	</div>
						                	<div id="modal6" class="modal modal-fixed-footer">
												<div class="modal-content">
													<div class="row">
														<div class="col s12 titulo-modal-te-llamamos">
															<h4>Ejemplo de sección #5</h4>
														</div>
														<div class="col s12 texto-modal-te-llamamos">
															<div class="modal-body">
	                                     						<img class="img-responsive" src="./img/mail/seccion5.png" alt="" width="100%" /> 
	                                     					</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
												</div>
											</div>
						                </div>
	                				</div>
                				<!-- End sección #5 -->
                				<!-- Start sección #6 -->
	                				<div class="col s12">
	                					<div class="col s12 destacados-sub-titulo-wrapper">
						                    <h5 class="destacados-titulo">Sección #6</h5>
						                </div>
						                <div class="col s12">
						                	<div class="row">
						                		<div class="input-field col s6">
													<label for="colortabla6">Background seccion 6</label>
													<br><br>
													<input id="colortabla6" name="colortabla6" type="color" />
												</div>
												<div class="input-field col s6">
													<label for="colorletrat6">Color texto seccion 6</label>
													<br><br>
													<input id="colorletrat6" name="colorletrat6" type="color"/>
												</div>
												<div class="input-field col s6">
													<input id="desct6" name="desct6" type="text"/>
													<label for="desct6">Descripcion seccion 6</label>
												</div>
						                	</div>
						                	<div class="row">
						                		<div class="col s12 center">
													<a href="#modal7" class="btn btn-media-accion waves-effect waves-light modal-trigger"><i class="material-icons right">keyboard_arrow_right</i>Ver ejemplo</a>
												</div>
						                	</div>
						                	<div id="modal7" class="modal modal-fixed-footer">
												<div class="modal-content">
													<div class="row">
														<div class="col s12 titulo-modal-te-llamamos">
															<h4>Ejemplo de sección #6</h4>
														</div>
														<div class="col s12 texto-modal-te-llamamos">
															<div class="modal-body">
	                                     						<img class="img-responsive" src="./img/mail/seccion6.png" alt="" width="100%" /> 
	                                     					</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
												</div>
											</div>
						                </div>
	                				</div>
                				<!-- End sección #6 -->
                				<!-- Start sección #7 -->
	                				<div class="col s12">
	                					<div class="col s12 destacados-sub-titulo-wrapper">
						                    <h5 class="destacados-titulo">Sección #7</h5>
						                </div>
						                <div class="col s12">
						                	<div class="row">
						                		<div class="input-field col s6">
													<label for="colortabla7">Background seccion 7</label>
													<br><br>
													<input id="colortabla7" name="colortabla7" type="color" />
												</div>
												<div class="input-field col s6">
													<label for="colortituloimagent7">Color titulos seccion 7</label>
													<br><br>
													<input id="colortituloimagent7" name="colortituloimagent7" type="color"/>
												</div>
												<div class="col s12">
													<hr class="divider">
												</div>
												<div class="col s6">
													<div class="col s12">
														<h5 class="destacados-sub-titulo">Item #1</h5>
														<div class="input-field col s6">
															<input id="imagen1t7" name="imagen1t7" type="text"/>
															<label for="imagen1t7">Imagen item 1</label>
														</div>
														<div class="input-field col s6">
															<input id="tituloimg1t7" name="tituloimg1t7" type="text"/>
															<label for="tituloimg1t7">Titulo item 1</label>
														</div>
														<div class="input-field col s6">
															<input id="linkimg1t7" name="linkimg1t7" type="text"/>
															<label for="linkimg1t7">Enlace item 1</label>
														</div>
													</div>
												</div>
												<div class="col s6">
													<div class="col s12">
														<h5 class="destacados-sub-titulo">Item #2</h5>
														<div class="input-field col s6">
															<input id="imagen2t7" name="imagen2t7" type="text"/>
															<label for="imagen2t7">Imagen item 2</label>
														</div>
														<div class="input-field col s6">
															<input id="tituloimg2t7" name="tituloimg2t7" type="text"/>
															<label for="tituloimg2t7">Titulo item 2</label>
														</div>
														<div class="input-field col s6">
															<input id="linkimg2t7" name="linkimg2t7" type="text"/>
															<label for="linkimg2t7">Enlace item 2</label>
														</div>
													</div>
												</div>
						                	</div>
						                	<div class="row">
						                		<div class="col s12 center">
													<a href="#modal8" class="btn btn-media-accion waves-effect waves-light modal-trigger"><i class="material-icons right">keyboard_arrow_right</i>Ver ejemplo</a>
												</div>
						                	</div>
						                	<div id="modal8" class="modal modal-fixed-footer">
												<div class="modal-content">
													<div class="row">
														<div class="col s12 titulo-modal-te-llamamos">
															<h4>Ejemplo de sección #7</h4>
														</div>
														<div class="col s12 texto-modal-te-llamamos">
															<div class="modal-body">
	                                     						<img class="img-responsive" src="./img/mail/seccion7.png" alt="" width="100%" /> 
	                                     					</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
												</div>
											</div>
						                </div>
	                				</div>
                				<!-- End sección #7 -->
                				<!-- Start vista previa -->
                					<div class="col s12">
	                					<div class="col s12 destacados-sub-titulo-wrapper">
						                    <h5 class="destacados-titulo">Generar vista previa</h5>
						                </div>
						                <div class="col s12">
						                	<div class="row">
						                		<div class="col s12 center">
													<button class="btn-large btn-confirmar-accion waves-effect waves-light modal-trigger" name="vprevia" type="submit"><i class="material-icons right">keyboard_arrow_right</i>Vista previa</button>
												</div>
						                	</div>
						                </div>
						            </div>
                				<!-- End vista previa -->
				            </div>
                		</form>
                	</div>
                </div>
	    		<?php
		      	    $librerias->footer();
	    		?>
	            <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
	            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	            <script src="https://www.google.com/recaptcha/api.js"></script>
	            <script src="lib/vidgal/js/vidgal.js"></script>
	            <script src="js/v3/index.js"></script>
	            <?php
	                $librerias->btn_wa();
	                $librerias->btn_te_llamamos();
	                $librerias->btn_carrito();
	                $librerias->cliengo();
	            ?>
	            <script>
	                for (var i = 0; i <= numero_destacados; i++) {

	                    var titulo = $('.titulo_producto_'+i).html();
	                    var caracteres = $('.titulo_producto_'+i).html().length;
	                    var nueva = $('.titulo_producto_'+i).text();
	                    var bol=0;

	                    if(caracteres > 23) {
	                        bol=1;
	                        nueva="";
	                        for (var j = 0; j < 24; j++) {
	                            if(j == 21 || j == 22 || j == 23) {
	                                nueva += ".";
	                            } else {
	                                nueva += titulo[j];
	                            }
	                        }
	                    } else if (caracteres <= 15) {
	                        $('.titulo_producto_'+i).append("<br><br>");
	                    }

	                    if (bol==1) {
	                        $('.titulo_producto_'+i).html(nueva);
	                    }
	                }
	            </script>
			</body>
		</html>
		<?php
    }
    
} else {
    ?>
    <script type="text/javascript">
      	location.href="index.php";
    </script>
    <?php
}
?>