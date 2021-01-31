<?php
/**
  * @author Reinaldo Emilio Pastran Jerez
  * @author Edwin Velasquez Jimenez
  * @author Diego Rodríguez Veloza <@rodvel2910>
  */
session_start();
if(isset($_POST['registrar'])) {

    if ($_POST['contrasena']==$_POST['contrasena1']) {
    	
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
            include __DIR__.'/.includesdtm/digitallibs.php';
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $tipodoc=$_POST['tipodoc'];
            $identificacion=$_POST['identificacion'];
            $genero=$_POST['genero'];
            $tipopers=$_POST['tipopersona'];
            $telefono=$_POST['telefono'];
            $pais=$_POST['pais'];
            $ciudad=$_POST['ciudad'];
            $direccion=$_POST['direccion'];
            $fechanac=$_POST['fechanac'];
            $correo=$_POST['correo'];
            $contrasena= $_POST['contrasena'];

            if (empty($_POST['inscripcion'])) {
                $ins='0';
            } else {
                $ins=$_POST['inscripcion'];
            }
            $registrar=new digitalibs();
            $registrar->registrar($nombre, $apellido, $tipodoc, $identificacion, $genero, $tipopers, $telefono, $pais, $ciudad, $direccion, $fechanac, $correo, $contrasena,$ins);
        } else {
        	?>
            <script> 
                alert("Por favor verifica que no eres un robot");
                history.back(1);
            </script>
            <?php
        }

    } else {
        ?>
        <script type="text/javascript">
            alert("La contraseña debe ser igual a la confirmacion de contraseña");
            history.back(1);
        </script>
        <?php
    }
}
?>