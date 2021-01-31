<?php
/**
  * @author Reinaldo Emilio Pastran Jerez
  * @author Edwin Velasquez Jimenez
  * @author Diego Rodríguez Veloza <@rodvel2910>
  */
require_once "recaptchalib.php";
$secret = "6Lcyry4UAAAAAA-rJsO2s7ykr5Oe5IZ95nB3JAaI";
$response = null;
$reCaptcha = new ReCaptcha($secret);

if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
if ($response != null && $response->success) {

    $nombre=$_POST["nombre"];
    $telefono=$_POST["telefono"];
    $email=$_POST["email"];
    $asunto=$_POST["asunto"];
    $mensaje="Nombre: \t".$nombre."\t Telefono: ".$telefono."\n\n Mensaje: ".$_POST["mensaje"];
    $cabezera= "From: $email";
    
    if(mail("Ventasnacionales@digitalmtx.com,diego.garcia@digitalmtx.com,info@digitalmtx.com", $asunto, $mensaje, $cabezera)) {
        ?>
        <script> 
            alert("Mensaje enviado!"); 
            location.href="index.php"; 
        </script>
        <?php
    } else {
        ?>
        <script> 
            alert("Su mensaje no se pudo enviar intente nuevamente mas tarde"); 
            location.href="index.php"; 
        </script>
        <?php
    }
} else {
    ?>
    <script> 
        alert("Por favor verifica que no eres un robot");
        location.href="contact.php"; 
    </script>
    <?php
}
?>