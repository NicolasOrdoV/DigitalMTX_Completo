<?php
    session_start();
    include __DIR__."/.includesdtm/digitallibs.php";
    include ".includesdtm/librerias.php";
    $librerias = new librerias;
?>
<!DOCTYPE html>
<html>
  <head>
      <?php
        $librerias->gtm_head();
      ?>
      <meta charset="utf-8">
      <title>Digital MTX| Inicio</title>
      <meta name="description" content="Tienda Online de productos IT informatica, catalogo digital, Ventas iniciar sesión o registrar usuario, Mayoristas, Importadores Empresa Colombiana Digital MTX">
      <meta name="keywords" content="Computadores, portatiles, pantallas, baterias, teclados, apple, hp, ishop, repuestos, cargadores, servicio tecnico, soporte tecnico, usb, tecnologia, garantia, pc">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <meta name="author" content="Reinaldo Pastran">
      <meta name="author" content="Edwin Velasquez Jimenez(lion_3214@hotmail.com), Diego Rodríguez Veloza(@rodvel2910)">

      <link rel="shortcut icon" type="image/x-icon" href="img/icon.png">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli&display=swap">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="css/v3/librerias/socicon/socicon.css">

      <link rel="stylesheet" href="css/v3/index.css">
      <link rel="stylesheet" href="css/v3/registro.css">
      <link rel="stylesheet" href="lib/vidgal/css/vidgal.css">
    </head>
  	<body style="overflow-x: hidden;" data-spy="scroll" data-target="#sidebar">
      <?php
        $librerias->gtm_body();
        $librerias->nav();
      ?>
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <h5>Crear cuenta</h5>
                    </div>
                    <div class="col s12">
                        <span class="subtitulo">Datos personales:</span>
                    </div>
                </div>
                <form action="reg.php" method="post" action="" class="sign-up-form">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">person</i>
                            <input id="nombre" name="nombre" required type="text" class="validate">
                            <label for="nombre">Nombres<span class="asterisco">*</span></label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">person</i>
                            <input id="apellido" name="apellido" required type="text" class="validate">
                            <label for="apellido">Apellidos<span class="asterisco">*</span></label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">assignment_ind</i>
                            <select name="tipodoc" required>
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="Pas">Pasaporte</option>
                                <option value="C.C">C.C</option>
                                <option value="C.E">C.E</option>
                                <option value="NIT">NIT</option>
                            </select>
                            <label for="tipodoc">Tipo de documento<span class="asterisco">*</span></label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">assignment_ind</i>
                            <input id="identificacion" name="identificacion" required type="text" class="validate">
                            <label for="identificacion"># de documento<span class="asterisco">*</span></label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">person</i>
                            <select name="genero" required>
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>
                                <option value="Empresa">Empresa</option>
                            </select>
                            <label for="genero">Género<span class="asterisco">*</span></label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">person</i>
                            <select name="tipopersona" required>
                                <option value="" disabled>Seleccione una opción</option>
                                <option value="natural" selected>Natural</option>
                                <option value="juridica">Jurídica</option>
                            </select>
                            <label for="tipopersona">Tipo de persona/empresa<span class="asterisco">*</span></label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">phone</i>
                            <input id="telefono" name="telefono" required type="text" class="validate">
                            <label for="telefono">Teléfono<span class="asterisco">*</span></label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">location_on</i>
                            <select name="pais" required>
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="" id="AF">Elegir opcion...</option>
                                <option value="Afganistán" id="AF">Afganistán</option>
                                <option value="Albania" id="AL">Albania</option>
                                <option value="Alemania" id="DE">Alemania</option>
                                <option value="Andorra" id="AD">Andorra</option>
                                <option value="Angola" id="AO">Angola</option>
                                <option value="Anguila" id="AI">Anguila</option>
                                <option value="Antártida" id="AQ">Antártida</option>
                                <option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
                                <option value="Antillas holandesas" id="AN">Antillas holandesas</option>
                                <option value="Arabia Saudí" id="SA">Arabia Saudí</option>
                                <option value="Argelia" id="DZ">Argelia</option>
                                <option value="Argentina" id="AR">Argentina</option>
                                <option value="Armenia" id="AM">Armenia</option>
                                <option value="Aruba" id="AW">Aruba</option>
                                <option value="Australia" id="AU">Australia</option>
                                <option value="Austria" id="AT">Austria</option>
                                <option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
                                <option value="Bahamas" id="BS">Bahamas</option>
                                <option value="Bahrein" id="BH">Bahrein</option>
                                <option value="Bangladesh" id="BD">Bangladesh</option>
                                <option value="Barbados" id="BB">Barbados</option>
                                <option value="Bélgica" id="BE">Bélgica</option>
                                <option value="Belice" id="BZ">Belice</option>
                                <option value="Benín" id="BJ">Benín</option>
                                <option value="Bermudas" id="BM">Bermudas</option>
                                <option value="Bhután" id="BT">Bhután</option>
                                <option value="Bielorrusia" id="BY">Bielorrusia</option>
                                <option value="Birmania" id="MM">Birmania</option>
                                <option value="Bolivia" id="BO">Bolivia</option>
                                <option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
                                <option value="Botsuana" id="BW">Botsuana</option>
                                <option value="Brasil" id="BR">Brasil</option>
                                <option value="Brunei" id="BN">Brunei</option>
                                <option value="Bulgaria" id="BG">Bulgaria</option>
                                <option value="Burkina Faso" id="BF">Burkina Faso</option>
                                <option value="Burundi" id="BI">Burundi</option>
                                <option value="Cabo Verde" id="CV">Cabo Verde</option>
                                <option value="Camboya" id="KH">Camboya</option>
                                <option value="Camerún" id="CM">Camerún</option>
                                <option value="Canadá" id="CA">Canadá</option>
                                <option value="Chad" id="TD">Chad</option>
                                <option value="Chile" id="CL">Chile</option>
                                <option value="China" id="CN">China</option>
                                <option value="Chipre" id="CY">Chipre</option>
                                <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
                                <option value="Colombia" id="CO">Colombia</option>
                                <option value="Comores" id="KM">Comores</option>
                                <option value="Congo" id="CG">Congo</option>
                                <option value="Corea" id="KR">Corea</option>
                                <option value="Corea del Norte" id="KP">Corea del Norte</option>
                                <option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
                                <option value="Costa Rica" id="CR">Costa Rica</option>
                                <option value="Croacia" id="HR">Croacia</option>
                                <option value="Cuba" id="CU">Cuba</option>
                                <option value="Dinamarca" id="DK">Dinamarca</option>
                                <option value="Djibouri" id="DJ">Djibouri</option>
                                <option value="Dominica" id="DM">Dominica</option>
                                <option value="Ecuador" id="EC">Ecuador</option>
                                <option value="Egipto" id="EG">Egipto</option>
                                <option value="El Salvador" id="SV">El Salvador</option>
                                <option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
                                <option value="Eritrea" id="ER">Eritrea</option>
                                <option value="Eslovaquia" id="SK">Eslovaquia</option>
                                <option value="Eslovenia" id="SI">Eslovenia</option>
                                <option value="España" id="ES">España</option>
                                <option value="Estados Unidos" id="US">Estados Unidos</option>
                                <option value="Estonia" id="EE">Estonia</option>
                                <option value="Etiopia" id="ET">Etiopía</option>
                                <option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
                                <option value="Filipinas" id="PH">Filipinas</option>
                                <option value="Finlandia" id="FI">Finlandia</option>
                                <option value="Francia" id="FR">Francia</option>
                                <option value="Gabón" id="GA">Gabón</option>
                                <option value="Gambia" id="GM">Gambia</option>
                                <option value="Georgia" id="GE">Georgia</option>
                                <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
                                <option value="Ghana" id="GH">Ghana</option>
                                <option value="Gibraltar" id="GI">Gibraltar</option>
                                <option value="Granada" id="GD">Granada</option>
                                <option value="Grecia" id="GR">Grecia</option>
                                <option value="Groenlandia" id="GL">Groenlandia</option>
                                <option value="Guadalupe" id="GP">Guadalupe</option>
                                <option value="Guam" id="GU">Guam</option>
                                <option value="Guatemala" id="GT">Guatemala</option>
                                <option value="Guayana" id="GY">Guayana</option>
                                <option value="Guayana francesa" id="GF">Guayana francesa</option>
                                <option value="Guinea" id="GN">Guinea</option>
                                <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
                                <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
                                <option value="Haití" id="HT">Haití</option>
                                <option value="Holanda" id="NL">Holanda</option>
                                <option value="Honduras" id="HN">Honduras</option>
                                <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
                                <option value="Hungría" id="HU">Hungría</option>
                                <option value="India" id="IN">India</option>
                                <option value="Indonesia" id="ID">Indonesia</option>
                                <option value="Irak" id="IQ">Irak</option>
                                <option value="Irán" id="IR">Irán</option>
                                <option value="Irlanda" id="IE">Irlanda</option>
                                <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
                                <option value="Isla Christmas" id="CX">Isla Christmas</option>
                                <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
                                <option value="Islandia" id="IS">Islandia</option>
                                <option value="Islas Caimán" id="KY">Islas Caimán</option>
                                <option value="Islas Cook" id="CK">Islas Cook</option>
                                <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
                                <option value="Islas Faroe" id="FO">Islas Faroe</option>
                                <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
                                <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
                                <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
                                <option value="Islas Marshall" id="MH">Islas Marshall</option>
                                <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
                                <option value="Islas Palau" id="PW">Islas Palau</option>
                                <option value="Islas Salomón" d="SB">Islas Salomón</option>
                                <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
                                <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
                                <option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
                                <option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
                                <option value="Israel" id="IL">Israel</option>
                                <option value="Italia" id="IT">Italia</option>
                                <option value="Jamaica" id="JM">Jamaica</option>
                                <option value="Japón" id="JP">Japón</option>
                                <option value="Jordania" id="JO">Jordania</option>
                                <option value="Kazajistán" id="KZ">Kazajistán</option>
                                <option value="Kenia" id="KE">Kenia</option>
                                <option value="Kirguizistán" id="KG">Kirguizistán</option>
                                <option value="Kiribati" id="KI">Kiribati</option>
                                <option value="Kuwait" id="KW">Kuwait</option>
                                <option value="Laos" id="LA">Laos</option>
                                <option value="Lesoto" id="LS">Lesoto</option>
                                <option value="Letonia" id="LV">Letonia</option>
                                <option value="Líbano" id="LB">Líbano</option>
                                <option value="Liberia" id="LR">Liberia</option>
                                <option value="Libia" id="LY">Libia</option>
                                <option value="Liechtenstein" id="LI">Liechtenstein</option>
                                <option value="Lituania" id="LT">Lituania</option>
                                <option value="Luxemburgo" id="LU">Luxemburgo</option>
                                <option value="Macao R. A. E" id="MO">Macao R. A. E</option>
                                <option value="Madagascar" id="MG">Madagascar</option>
                                <option value="Malasia" id="MY">Malasia</option>
                                <option value="Malawi" id="MW">Malawi</option>
                                <option value="Maldivas" id="MV">Maldivas</option>
                                <option value="Malí" id="ML">Malí</option>
                                <option value="Malta" id="MT">Malta</option>
                                <option value="Marruecos" id="MA">Marruecos</option>
                                <option value="Martinica" id="MQ">Martinica</option>
                                <option value="Mauricio" id="MU">Mauricio</option>
                                <option value="Mauritania" id="MR">Mauritania</option>
                                <option value="Mayotte" id="YT">Mayotte</option>
                                <option value="México" id="MX">México</option>
                                <option value="Micronesia" id="FM">Micronesia</option>
                                <option value="Moldavia" id="MD">Moldavia</option>
                                <option value="Mónaco" id="MC">Mónaco</option>
                                <option value="Mongolia" id="MN">Mongolia</option>
                                <option value="Montserrat" id="MS">Montserrat</option>
                                <option value="Mozambique" id="MZ">Mozambique</option>
                                <option value="Namibia" id="NA">Namibia</option>
                                <option value="Nauru" id="NR">Nauru</option>
                                <option value="Nepal" id="NP">Nepal</option>
                                <option value="Nicaragua" id="NI">Nicaragua</option>
                                <option value="Níger" id="NE">Níger</option>
                                <option value="Nigeria" id="NG">Nigeria</option>
                                <option value="Niue" id="NU">Niue</option>
                                <option value="Norfolk" id="NF">Norfolk</option>
                                <option value="Noruega" id="NO">Noruega</option>
                                <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
                                <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
                                <option value="Omán" id="OM">Omán</option>
                                <option value="Panamá" id="PA">Panamá</option>
                                <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
                                <option value="Paquistán" id="PK">Paquistán</option>
                                <option value="Paraguay" id="PY">Paraguay</option>
                                <option value="Perú" id="PE">Perú</option>
                                <option value="Pitcairn" id="PN">Pitcairn</option>
                                <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
                                <option value="Polonia" id="PL">Polonia</option>
                                <option value="Portugal" id="PT">Portugal</option>
                                <option value="Puerto Rico" id="PR">Puerto Rico</option>
                                <option value="Qatar" id="QA">Qatar</option>
                                <option value="Reino Unido" id="UK">Reino Unido</option>
                                <option value="República Centroafricana" id="CF">República Centroafricana</option>
                                <option value="República Checa" id="CZ">República Checa</option>
                                <option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
                                <option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
                                <option value="República Dominicana" id="DO">República Dominicana</option>
                                <option value="Reunión" id="RE">Reunión</option>
                                <option value="Ruanda" id="RW">Ruanda</option>
                                <option value="Rumania" id="RO">Rumania</option>
                                <option value="Rusia" id="RU">Rusia</option>
                                <option value="Samoa" id="WS">Samoa</option>
                                <option value="Samoa occidental" id="AS">Samoa occidental</option>
                                <option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
                                <option value="San Marino" id="SM">San Marino</option>
                                <option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
                                <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
                                <option value="Santa Helena" id="SH">Santa Helena</option>
                                <option value="Santa Lucía" id="LC">Santa Lucía</option>
                                <option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
                                <option value="Senegal" id="SN">Senegal</option>
                                <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
                                <option value="Sychelles" id="SC">Seychelles</option>
                                <option value="Sierra Leona" id="SL">Sierra Leona</option>
                                <option value="Singapur" id="SG">Singapur</option>
                                <option value="Siria" id="SY">Siria</option>
                                <option value="Somalia" id="SO">Somalia</option>
                                <option value="Sri Lanka" id="LK">Sri Lanka</option>
                                <option value="Suazilandia" id="SZ">Suazilandia</option>
                                <option value="Sudán" id="SD">Sudán</option>
                                <option value="Suecia" id="SE">Suecia</option>
                                <option value="Suiza" id="CH">Suiza</option>
                                <option value="Surinam" id="SR">Surinam</option>
                                <option value="Svalbard" id="SJ">Svalbard</option>
                                <option value="Tailandia" id="TH">Tailandia</option>
                                <option value="Taiwán" id="TW">Taiwán</option>
                                <option value="Tanzania" id="TZ">Tanzania</option>
                                <option value="Tayikistán" id="TJ">Tayikistán</option>
                                <option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
                                <option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
                                <option value="Timor Oriental" id="TP">Timor Oriental</option>
                                <option value="Togo" id="TG">Togo</option>
                                <option value="Tonga" id="TO">Tonga</option>
                                <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
                                <option value="Túnez" id="TN">Túnez</option>
                                <option value="Turkmenistán" id="TM">Turkmenistán</option>
                                <option value="Turquía" id="TR">Turquía</option>
                                <option value="Tuvalu" id="TV">Tuvalu</option>
                                <option value="Ucrania" id="UA">Ucrania</option>
                                <option value="Uganda" id="UG">Uganda</option>
                                <option value="Uruguay" id="UY">Uruguay</option>
                                <option value="Uzbekistán" id="UZ">Uzbekistán</option>
                                <option value="Vanuatu" id="VU">Vanuatu</option>
                                <option value="Venezuela" id="VE">Venezuela</option>
                                <option value="Vietnam" id="VN">Vietnam</option>
                                <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
                                <option value="Yemen" id="YE">Yemen</option>
                                <option value="Zambia" id="ZM">Zambia</option>
                                <option value="Zimbabue" id="ZW">Zimbabue</option>
                            </select>
                            <label for="pais">País<span class="asterisco">*</span></label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">location_city</i>
                            <input id="ciudad" name="ciudad" required type="text" class="validate">
                            <label for="ciudad">Ciudad<span class="asterisco">*</span></label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">directions</i>
                            <input id="direccion" name="direccion" required type="text" class="validate">
                            <label for="direccion">Dirección<span class="asterisco">*</span></label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">calendar_today</i>
                            <input id="fechanac" name="fechanac" required type="date" class="validate">
                            <label for="fechanac">Fecha de nacimiento<span class="asterisco">*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <span class="subtitulo">Datos de inicio de sesión:</span>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <?php
                                $correo = '';
                                if (isset($_GET['correo'])) {
                                    $correo = $_GET['correo'];
                                }
                            ?>
                            <input id="correo" name="correo" required type="email" class="validate" value="<?php echo $correo; ?>">
                            <label for="correo">Correo electrónico<span class="asterisco">*</span></label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">lock_open</i>
                            <input id="contrasena" name="contrasena" required type="password" class="validate">
                            <label for="contrasena">Contraseña<span class="asterisco">*</span><span class="interrogacion tooltipped" data-position="bottom" data-tooltip="">?</span></label>
                            <div class="progress">
                                <div class="determinate"></div>
                            </div>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">lock</i>
                            <input id="contrasena1" name="contrasena1" required type="password" class="validate">
                            <label for="contrasena1">Repetir contraseña<span class="asterisco">*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6">
                            <p>
                                <label>
                                    <input type="checkbox" required />
                                    <span>Aceptas nuestros <a href="terminos-y-condiciones.php" target="_BLANK" class="waves-effect waves-dark">términos de uso</a></span>
                                </label>
                            </p>
                        </div>
                        <div class="col s12 m6">
                            <p>
                                <label>
                                    <input type="checkbox" value="1" name="inscripcion" />
                                    <span>¿Deseas recibir correos promocionales de nuestra parte?</span>
                                </label>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 center">
                            <div class="g-recaptcha" data-sitekey="6Lcyry4UAAAAAF0evGdXbSr5yR5y4khwyfAn7G-_" style="display: inline-block;"></div>
                            <script src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>"></script>
                        </div>
                    </div>
                    <div class="col s12 center">
                        <button class="btn col s6 offset-s3 btn-registrarse waves-effect waves-light disabled" name="registrar" type="submit"><i class="material-icons right">exit_to_app</i>Registrarse</button>
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
    <script>
        validar_nivel_contrasena();
        $('.interrogacion').hover(function() {
            $(this).attr('data-tooltip', '<p class="left-align">Para hacer la contraseña mas segura, puede incluir: <br> - 8 caracteres <br> - 1 letra minuscula <br> - 1 letra mayúscula <br> - 1 número <br> - 1 caracter de los siguientes: |!"#$%&/()=?¡¿°@´*-+¨-</p>')
        });
    </script>
    <?php
      $librerias->btn_wa();
      $librerias->btn_te_llamamos();
      $librerias->btn_carrito();
      $librerias->cliengo();
      $librerias->hotjar();
    ?>
  	</body>
</html>

<?php 
if(isset($_SESSION['cliente']) && $_SESSION['cliente'] == TRUE) {
    ?>
  	<script>
        alert("Ya estas registrado");
        location.href="index.php";
  	</script>
    <?php
}
?>

