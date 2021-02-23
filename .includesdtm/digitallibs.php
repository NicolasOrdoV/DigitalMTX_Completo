<?php
/**
  * @author Reinaldo Emilio Pastran Jerez
  * @author Edwin Velasquez Jimenez
  * @author Diego Rodríguez Veloza <@rodvel2910>
  */
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
include_once '.includesdtm/conexion.php';
class digitalibs{
    
    private $conexion;
    private $correo;
    private $pw;
    private $nombre;
    private $apellido;
    private $tipodoc;
    private $identificacion;
    private $genero;
    private $tipopers;
    private $telefono;    
    private $pais;
    private $ciudad;
    private $direccion;
    private $fecha;

    private $conn;

    private $tratamiento_de_datos_personales='
    <p align="justify">
        Razón social: DIGITAL MTX 
        <br><br>
        Nit: 830.085.336-5 
        <br><br>
        Domicilio: CALLE 77 # 16A 38 of 305 
        <br><br>
        Teléfono: 5522190 
        <br><br>
        Correo electrónico: contabilidad@digitalmtx.com 
        <br><br>
        Página web: www.digitalmtx.com 
        <br><br>
        <b>1. NORMATIVIDAD LEGAL Y ÁMBITO DE APLICACIÓN:</b> La presente política de Tratamiento de datos personales es elaborada de conformidad con lo dispuesto en la Constitución Política, la Ley 1581 de 2012, el Decreto Reglamentario 1377 de 2013 y demás disposiciones complementarias y será aplicada por DIGITAL MTX SAS, respecto de la recolección, almacenamiento, uso, circulación, supresión y de todas aquellas actividades que constituyan tratamiento de datos personales. 
        <br><br>
        <b>2. DEFINICIONES:</b> Para efectos de la ejecución de la presente política y de conformidad con la normatividad legal, serán aplicables las siguientes definiciones: 
        <br><br>
        a) Autorización: Consentimiento previo, expreso e informado del Titular para llevar a cabo el Tratamiento de datos personales. 
        <br><br>
        b) Aviso de privacidad: Documento físico, electrónico o en cualquier otro formato generado por el Responsable que se pone a disposición del Titular para el tratamiento de sus datos personales. En el Aviso de Privacidad se comunica al Titular la información relativa a la existencia de las políticas de tratamiento de información que le serán aplicables, la forma de acceder a las mismas y la finalidad del tratamiento que se pretende dar a los datos personales. 
        <br><br>
        c) Base de Datos: Conjunto organizado de datos personales que sea objeto de Tratamiento. 
        <br><br>
        d) Dato personal: Cualquier información vinculada o que pueda asociarse a una o varias personas naturales determinadas o determinables. 
        <br><br>
        e) Dato público: Es el dato calificado como tal según los mandatos de la ley o de la Constitución Política y aquel que no sea semiprivado, privado o sensible. Son públicos, entre otros, los datos relativos al estado civil de las personas, a su profesión u oficio, a su calidad de comerciante o de servidor público y aquellos quepuedan obtenerse sin reserva alguna. Por su naturaleza, los datos públicos pueden estar contenidos, entre otros, en registros públicos, documentos públicos, gacetas y boletines oficiales. 
        <br><br>
        f) Dato privado: Es el dato que por su naturaleza íntima o reservada sólo es relevante para el titular. 
        <br><br>
        g) Datos sensibles: Se entiende por datos sensibles aquellos que afectan la intimidad del Titular o cuyo uso indebido puede generar su discriminación, tales como aquellos que revelen el origen racial o étnico, la orientación política, las convicciones religiosas o filosóficas, la pertenencia a sindicatos, organizaciones sociales, de derechos humanos o que promueva intereses de cualquier partido político o que garanticen los derechos y garantías de partidos políticos de oposición, así como los datos relativos a la salud, a la vida sexual y los datos biométricos. 
        <br><br>
        h) Encargado del Tratamiento: Persona natural o jurídica, pública o privada, que por sí misma o en asocio con otros, realice el Tratamiento de datos personales por cuenta del Responsable del Tratamiento. 
        <br><br>
        i) Responsable del Tratamiento: Persona natural o jurídica, pública o privada, que por sí misma o en asocio con otros, decida sobre la base de datos y/o el Tratamiento de los datos. 
        <br><br>
        j) Titular: Persona natural cuyos datos personales sean objeto de Tratamiento. 
        <br><br>
        k) Tratamiento: Cualquier operación o conjunto de operaciones sobre datos personales, tales como la recolección, almacenamiento, uso, circulación o supresión de los mismos. 
        <br><br>
        <b>3. FINALIDAD CON LA QUE SE EFECTÚA LA RECOLECCIÓN DE DATOS PERSONALES Y TRATAMIENTO DE LOS MISMOS:</b>
        DIGITAL MTX SAS podrá hacer uso de los datos personales para: 
        <br><br>
        a) Ejecutar la relación contractual existente con sus clientes, proveedores y trabajadores, incluida el pago de obligaciones contractuales. 
        <br><br>
        b) Proveer los productos y/o servicios requeridos por sus usuarios. 
        <br><br>
        c) Informar sobre nuevos productos o servicios y/o sobre cambios en los mismos. 
        <br><br>
        d) Evaluar la calidad del producto. 
        <br><br>
        e) Realizar estudios internos sobre hábitos de consumo. 
        <br><br>
        f) Enviar al correo físico, electrónico, celular o dispositivo móvil, vía mensajes de texto (SMS y/o MMS) o a través de cualquier otro medio análogo y/o digital de comunicación creado o por crearse, información comercial, publicitaria o promocional sobre los productos y/o servicios, eventos de tipo comercial, con el fin de impulsar, invitar, dirigir, ejecutar, informar y de manera general, cualquier necesidad en el desarrollo de la operación de DIGITAL MTX SAS y/o por terceras personas. 
        <br><br>
        g) Desarrollar el proceso de selección, evaluación, y vinculación laboral. 
        <br><br>
        h) Soportar procesos de auditoría interna o externa. 
        <br><br>
        i) Registrar la información de empleados y/o pensionados (activos e inactivos) en las bases de datos de DIGITAL MTX SAS, Respecto de los datos (i) recolectados directamente en los puntos de seguridad, (ii) tomados de los documentos que suministran las personas al personal de seguridad y (iii) obtenidos de las video grabaciones que se realizan dentro o fuera de las instalaciones de DIGITAL MTX SAS, éstos se utilizarán para fines de seguridad de las personas, los bienes e instalaciones de DIGITAL MTX SAS y podrán ser utilizados como prueba en cualquier tipo de proceso. 
        <br><br>
        Si un dato personal es proporcionado, dicha información será utilizada sólo para los propósitos aquí señalados, y por tanto, DIGITAL MTX SAS no procederá a vender, licenciar, transmitir, o divulgar la misma, salvo que: (i) exista autorización expresa para hacerlo; (ii) sea necesario para permitir a los contratistas o agentes prestar los servicios encomendados; (iii) sea necesario con el fin de proveer nuestros servicios y/o productos; (iv) sea necesario divulgarla a las entidades que prestan servicios en nombre de DIGITAL MTX SAS o a otras entidades con las cuales se tengan acuerdos; (v) la información tenga relación con una fusión, consolidación, adquisición, desinversión, u otro proceso de restructuración de la sociedad; (vi) que sea requerido o permitido por la ley DIGITAL MTX SAS podrá subcontratar a terceros para el procesamiento de determinadas funciones o
        información. Cuando efectivamente se subcontrate con terceros el procesamiento de información personal o se proporcione información personal a terceros prestadores de servicios, DIGITAL MTX SAS advierte a dichos terceros sobre la necesidad de proteger dicha información personal con medidas de seguridad apropiadas, se prohíbe el uso de la información para fines propios y se solicita que no se divulgue la información personal a otros. 
        <br><br>
        <b>4. PRINCIPIOS APLICABLES AL TRATAMIENTO DE DATOS PERSONALES:</b>El tratamiento de datos personales en DIGITAL MTX SAS se regirá por los siguientes principios:
        <br><br>
        a) Principio de finalidad: El Tratamiento de los datos personales recogidos debe obedecer a una finalidad legítima, la cual debe ser informada al Titular. 
        <br><br>
        b) Principio de libertad: El Tratamiento sólo puede llevarse a cabo con el consentimiento, previo, expreso e informado del Titular. Los datos personales no podrán ser obtenidos o divulgados sin previa autorización, o en ausencia de mandato legal o judicial que releve el consentimiento. 
        <br><br>
        c) Principio de veracidad o calidad: La información sujeta a Tratamiento debe ser veraz, completa, exacta, actualizada, comprobable y comprensible. No será efectuado el Tratamiento de datos parciales, incompletos, fraccionados o que induzcan a error. 
        <br><br>
        d) Principio de transparencia: En el Tratamiento debe garantizarse el derecho del Titular a obtener de DIGITAL MTX SAS en cualquier momento y sin restricciones, información acerca de la existencia de datos que le conciernan. 
        <br><br>
        e) Principio de acceso y circulación restringida: El Tratamiento se sujeta a los límites que se derivan de la naturaleza de los datos personales, de las disposiciones de la presente ley y la Constitución. Los datos personales, salvo la información pública, y lo dispuesto en la autorización otorgada por el titular del dato, no podrán estar disponibles en Internet u otros medios de divulgación o comunicación masiva, salvo que el acceso sea técnicamente controlable para brindar un conocimiento restringido sólo a los Titulares o terceros autorizados. 
        <br><br>
        f) Principio de seguridad: La información sujeta a Tratamiento por parte de DIGITAL MTX SAS se deberá proteger mediante el uso de las medidas técnicas, humanas y administrativas que sean necesarias para otorgar seguridad a los registros evitando su adulteración, pérdida, consulta, uso o acceso no autorizado o fraudulento. 
        <br><br>
        g) Principio de confidencialidad: Todas las personas que intervengan en el Tratamiento de datos personales están obligadas a garantizar la reserva de la información, inclusive después de finalizada su relación con alguna de las labores que comprende el Tratamiento. PARÁGRAFO PRIMERO: En el evento que se recolecten datos personales sensibles, el Titular podrá negarse a autorizar su Tratamiento. 
        <br><br>
        <b>5. DERECHOS DE LOS TITULARES DE DATOS PERSONALES OBJETO DE TRATAMIENTO POR PARTE DE DIGITAL MTX SAS:</b> Los titulares de datos personales por sí o por intermedio de su representante y/o apoderado o su causahabiente podrán ejercer los siguientes derechos, respecto de los datos personales que sean objeto de tratamiento por parte de DIGITAL MTX SAS: 
        <br><br>
        a) Derecho de acceso: En virtud del cual podrá acceder a los datos personales que estén bajo el control de DIGITAL MTX SAS, para efectos de consultarlos de manera gratuita al menos una vez cada mes calendario, y cada vez que existan modificaciones sustanciales de las Políticas de Tratamiento de la información que motiven nuevas consultas. 
        <br><br>
        b) Derecho de actualización, rectificación y supresión: En virtud del cual podrá solicitar la actualización, rectificación y/o supresión de los datos personales objeto de tratamiento, de tal manera que se satisfagan los propósitos del tratamiento. 
        <br><br>
        c) Derecho a solicitar prueba de la autorización: salvo en los eventos en los cuales, según las normas legales vigentes, no se requiera de la autorización para realizar el tratamiento. 
        <br><br>
        d) Derecho a ser informado respecto del uso del dato personal. 
        <br><br>
        e) Derecho a presentar quejas ante la Superintendencia de Industria y Comercio: por infracciones a lo dispuesto en la normatividad vigente sobre tratamiento de datos personales. 
        <br><br>
        f) Derecho a requerir el cumplimiento de las órdenes emitidas por la Superintendencia de Industria y Comercio. PARÁGRAFO PRIMERO: Para efectos del ejercicio de los derechos antes descritos tanto el titular como la persona que lo represente deberá demostrar su identidad y, de ser el caso, la calidad en virtud de la cual representa al titular. PARÁGRAFO SEGUNDO: Los derechos de los menores de edad serán ejercidos por medio de las personas que estén facultadas para representarlos. 
        <br><br>
        <b>6. DEBERES DE DIGITAL MTX SAS:</b> Todos los obligados a cumplir esta política deben tener presente que DIGITAL MTX SAS. está obligada a cumplir los deberes que al respecto imponga la ley. En consecuencia se deben cumplir las siguientes obligaciones: A. Deberes cuando actúa como responsable: (1) Solicitar y conservar, en las condiciones previstas en esta política, copia de la respectiva autorización otorgada por el titular. (2i) Informar de manera clara y suficiente al titular sobre la finalidad de la recolección y los derechos que le asisten por virtud de la autorización otorgada. (3) Informar a solicitud del titular sobre el uso dado a sus datos personales (4) Tramitar las consultas y reclamos formulados en los términos señalados en la presente política (5) Procurar que los principios de veracidad, calidad, seguridad y confidencialidad en los términos establecidos en la siguiente política (6)-Conservar la información bajo las condiciones de seguridad necesarias para impedir su adulteración, pérdida, consulta, uso o acceso no autorizado o fraudulento. (7) Actualizar la información cuando sea necesario. (8) Rectificar los datos personales cuando ello sea procedente. 
        <br><br>
        B. Deberes cuando obra como Encargado del tratamiento de datos personales. Si realiza el tratamiento de datos en nombre de otra entidad u organización (Responsable del tratamiento) deberá cumplir los siguientes deberes: (1) Establecer que el Responsable del tratamiento esté autorizado para suministrar los datos personales que tratará como Encargado (2) Garantizar al titular, en todo tiempo, el pleno y efectivo ejercicio del derecho de hábeas data. (3) Conservar la información bajo las condiciones de seguridad necesarias para impedir su adulteración, pérdida, consulta, uso o acceso no autorizado o fraudulento. (4 Realizar oportunamente la actualización, rectificación o supresión de los datos. (5) Actualizar la información reportada por los Responsables del tratamiento dentro de los cinco (5) días hábiles contados a partir de su recibo. (6) Tramitar las consultas y los reclamos formulados por los titulares en los términos señalados en la presente política. 
        <br><br>
        (7)Registrar en la base de datos la leyenda “reclamo en trámite” en la forma en que se establece en la presente política. (8) Insertar en la base de datos la leyenda “información en discusión judicial” una vez notificado por parte de la autoridad competente sobre procesos judiciales relacionados con la calidad del dato personal. (9) Abstenerse de circular información que esté siendo controvertida por el titular y cuyo bloqueo haya sido ordenado por la Superintendencia de Industria y Comercio. (10) Permitir el acceso a la información únicamente a las personas autorizadas por el titular o facultadas por la ley para dicho efecto. (11) Informar a la Superintendencia de Industria y Comercio cuando se presenten violaciones a los códigos de seguridad y existan riesgos en la administración de la información de los titulares. (12) Cumplir las instrucciones y requerimientos que imparta la Superintendencia de Industria y Comercio. 
        <br><br>
        C. Deberes cuando realiza el tratamiento a través de un Encargado (1) Suministrar al Encargado del tratamiento únicamente los datos personales cuyo tratamiento esté previamente autorizado. Para efectos de la transmisión nacional o internacional de los datos se deberá suscribir un contrato de transmisión de datos personales o pactar cláusulas contractuales según lo establecido en el artículo 25 del decreto 1377 de 2013. (2) Garantizar que la información que se suministre al Encargado del tratamiento sea veraz, completa, exacta, actualizada, comprobable y comprensible. (3) Comunicar de forma oportuna al Encargado del tratamiento todas las novedades respecto de los datos que previamente le haya suministrado y adoptar las demás medidas necesarias para que la información suministrada a este se mantenga actualizada. (4) Informar de manera oportuna al Encargado del tratamiento las rectificaciones realizadas sobre los datos personales para que éste proceda a realizar los ajustes pertinentes. (5) Exigir al Encargado del tratamiento, en todo momento, el respeto a las condiciones de seguridad y privacidad de la información del titular. (6) Informar al Encargado del tratamiento cuando determinada información se encuentre en discusión por parte del titular, una vez se haya presentado la reclamación y no haya finalizado el trámite respectivo. 
        <br><br>
        D. Deberes respecto de la Superintendencia de Industria y Comercio (1) Informarle las eventuales violaciones a los códigos de seguridad y la existencia de riesgos en la administración de la información de los titulares. (2) Cumplir las instrucciones y requerimientos que imparta la Superintendencia de Industria y Comercio. 
        <br><br>
        <b>7. SOLICITUD DE AUTORIZACIÓN AL TITULAR DEL DATO PERSONAL:</b> Con antelación y/o al momento de efectuar la recolección del dato personal, DIGITAL MTX SAS solicitará al titular del dato su autorización para efectuar su recolección y tratamiento, indicando la finalidad para la cual se solicita el dato, utilizando para esos efectos medios técnicos automatizados, escritos u orales, que permitan conservar prueba de la autorización y/o de la conducta inequívoca descrita en el artículo 7 del Decreto 1377 de 2013. Dicha autorización se solicitará por el tiempo que sea razonable y necesario para satisfacer las necesidades que dieron origen a la solicitud del dato y, en todo caso, con observancia de las disposiciones legales que rigen sobre la materia. 
        <br><br>
        <b>8. AVISO DE PRIVACIDAD: </b>En el evento en el que DIGITAL MTX SAS no pueda poner a disposición del titular del dato personal la presente política de tratamiento de la información, publicará el aviso de privacidad que se adjunta al presente documento, cuyo texto conservará para consulta posterior por parte del titular del dato y/o de la Superintendencia de Industria y Comercio. 
        <br><br>
        <b>9. LIMITACIONES TEMPORALES AL TRATAMIENTO DE LOS DATOS PERSONALES.</b> DIGITAL MTX SAS solo podrá recolectar, almacenar, usar o circular los datos personales durante el tiempo que sea razonable y necesario, de acuerdo con las finalidades que justificaron el tratamiento, atendiendo a las disposiciones aplicables a la materia de que se trate y a los aspectos administrativos, contables, fiscales, jurídicos e históricos de la información. Una vez cumplida la o las finalidades del tratamiento y sin perjuicio de normas legales que dispongan lo contrario, procederá a la supresión de los datos personales en su posesión. No obstante lo anterior, los datos personales deberán ser conservados cuando así se requiera para el cumplimiento de una obligación legal o contractual. 
        <br><br>
        <b>10. ÁREA RESPONSABLE Y PROCEDIMIENTO PARA EL EJERCICIO DE LOS DERECHOS DE LOS TITULARES DEL DATO PERSONAL:</b> El ÁREA COMERCIAL DE DIGITAL MTX SAS será la responsable de atender las peticiones, quejas y reclamos que formule el titular del dato en ejercicio de los derechos contemplados en el numeral 5 de la presente política, a excepción del
        descrito en su literal e). Para tales efectos, el titular del dato personal o quien ejerza su representación podrá enviar su petición, queja o reclamo de lunes a viernes de 7:00 a.m a 5:00 p.m al correo electrónico contabilidad@digitalmtx.com llamar a la línea telefónica de DIGITAL MTX SAS, en Bogotá teléfono 5522190 o radicarla en las siguiente dirección que correspondientes a nuestra oficinas. 
        <br><br>
        OFICINA DIRECCIÓN: Calle 77 # 16A 38 of 305 
        <br><br>
        La petición, queja o reclamo deberá contener la identificación del Titular, la descripción de los hechos que dan lugar al reclamo, la dirección, y acompañando los documentos que se quiera hacer valer. Si el reclamo resulta incompleto, se requerirá al interesado dentro de los cinco (5) días siguientes a la recepción del reclamo para que subsane las fallas. Transcurridos dos (2) meses desde la fecha del requerimiento, sin que el solicitante presente la información requerida, se entenderá que ha desistido del reclamo. En caso de que quien reciba el reclamo no sea competente para resolverlo, dará traslado a quien corresponda en un término máximo de dos (2) días hábiles e informará de la situación al interesado. Una vez recibido el reclamo completo, se incluirá en la base de datos una leyenda que diga “reclamo en trámite” y el motivo del mismo, en un término no mayor a dos (2) días hábiles. Dicha leyenda deberá mantenerse hasta que el reclamo sea decidido. El término máximo para atender el reclamo será de quince (15) días hábiles contados a partir del día siguiente a la fecha de su recibo. Cuando no fuere posible atender el reclamo dentro de dicho término, se informará al interesado los motivos de la demora y la fecha en que se atenderá su reclamo, la cual en ningún caso podrá superar los ocho (8) días hábiles siguientes al vencimiento del primer término. 
        <br><br>
        <b>11. DATOS RECOLECTADOS ANTES DE LA EXPEDICIÓN DEL DECRETO 1377 DE 2013: </b>De conformidad con lo dispuesto en el numeral 3 del artículo 10 del Decreto Reglamentario 1377 de 2013 DIGITAL MTX SAS procederá a publicar un aviso en su página web oficial www.digitalmtx.com dirigido a los titulares de datos personales para efectos de dar a conocer la presente política de tratamiento de información y el modo de ejercer sus derechos como titulares de datos personales alojados en las bases de datos de DIGITAL MTX SAS. 
        <br><br>
        <b>12. MEDIDAS DE SEGURIDAD: </b>En desarrollo del principio de seguridad establecido en la Ley 1581 de 2012, DIGITAL MTX SAS adoptará las medidas técnicas, humanas y administrativas que sean necesarias para otorgar seguridad a los registros evitando su adulteración, pérdida, consulta, uso o acceso no autorizado o fraudulento. El personal que realice el tratamiento de los datos personales ejecutará los protocolos establecidos con el fin de garantizar la seguridad de la información. 
        <br><br>
        <b>13. FECHA DE ENTRADA EN VIGENCIA: </b>La presente Política de Datos Personales fue creada el día 1º de Julio de 2.016 y entra en vigencia a partir del día 1º de Agosto de 2016. Cualquier cambio que se presente respecto de la presente política, se informará a través de la pagina web:
        <br><br>
        <a href="http://www.digitalmtx.com">Digital MTX</a><br><br>
        Atentamente: 
        <br><br>
        DIGITAL MTX SAS 
        <br><br>
        DOMICILIO Calle 77 # 16A 38 of 305
    </p>
    ';

    
    /*
     * Funcion constructora llamada automatica para la conexión a la base de datos
     *      
    */
    public function __construct() {
        $this->conn= new conexion();
        $this->conexion=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if(mysqli_errno($this->conexion)){
            echo "Error al conectar a la base de datos";
        }
        $this->conexion->set_charset("utf8");
    }

    /*
     * Conectar() funcion auxiliar para la conexión
     *  
    */
    public function conectar() {
        $this->conn->setnombre_db("dtmmtx");
        $this->conexion=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if(mysqli_errno($this->conexion)){
            echo "Error al conectar a la base de datos";
        } 
        $this->conexion->set_charset("utf8");      
    }
    
    /*
     * Funcion en la cual los clientes pueden iniciar session
     *      
    */
    public function login($correo,$pw) {

        $this->correo=$correo;
        $this->pw='666';

        $res= mysqli_query($this->conexion, "SELECT * FROM dtm_user WHERE correo='$this->correo' LIMIT 1");
        if($row= mysqli_fetch_array($res)) {
            if($row['activo']==0) {
                ?>
                    <script>alert('Para inciar sesión primero debes activar tu cuenta desde tu correo');</script>
                <?php 
            } else {
                // $contrasena = password_hash($row['contrasena'], PASSWORD_DEFAULT);
                $contrasena = password_hash('666', PASSWORD_DEFAULT);
                if (password_verify($this->pw, $contrasena)) {
                    $_SESSION['cliente']=TRUE;
                    if (isset($_SESSION['carrito'])) {
                        $_SESSION['carrito']=$_SESSION['carrito'];
                    }
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['nombre1'] = $row['nombre'];
                    $_SESSION['apellido'] = $row['apellido'];
                    $_SESSION['nombre'] = $row['nombre']." ".$row['apellido'];
                    $_SESSION['usuario'] = $row['correo'];
                    $_SESSION['edad'] = $row['fechanac'];
                    $_SESSION['genero'] = $row['genero'];
                    $_SESSION['pais'] = $row['pais'];
                    $_SESSION['ciudad'] = $row['ciudad'];
                    $_SESSION['direccion'] = $row['direccion'];
                    $_SESSION['cedula'] = $row['identificacion'];
                    $_SESSION['identificacion'] = $row['tipodoc']." ".$row['identificacion'];
                    $_SESSION['telefono'] = $row['telefono'];
                    $_SESSION['codigo'] = $row['codigo'];
                    ?>
                        <script>
                            M.toast({html: 'Redirigiendo'});
                            setTimeout(function() {
                                location.href="index.php";
                            }, 1000);
                        </script>
                    <?php
                } else {
                    //Contraseña incorrecta
                    unset($_POST);
                    ?>
                        <script>
                            M.toast({html: 'Contraseña incorrecta, por favor intente nuevamente.'});
                        </script>
                    <?php
                }
            }
        } else {
            //Correo no encontrado
            unset($_POST);
            ?>
                <script>
                    M.toast({html: 'No existe una cuenta creada con este correo.'});
                </script>
            <?php
        }
    }

    public function login_google() {
        @\session_start();
        $_SESSION['cliente']=TRUE;
        if (isset($_SESSION['carrito'])) {
            $_SESSION['carrito']=$_SESSION['carrito'];
        }
        $_SESSION['id'] = $_POST['id_google'];
        $_SESSION['nombre1'] = $_POST['nombre_google'];
        $_SESSION['usuario'] = $_POST['email_google'];
        $_SESSION['cliente_google'] = 1;
    }
    
    /*
     * Funcion que nos registra a los clientes y envia el correo de activacion de cuenta
     *      
    */
    public function registrar($nombre, $apellido, $tipodoc, $identificacion, $genero, $tipopers,$telefono, $pais, $ciudad, $direccion, $fechanac, $correo, $contrasena, $ins){

        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->tipodoc=$tipodoc;
        $this->identificacion=$identificacion;
        $this->genero=$genero;
        $this->tipopers=$tipopers;
        $this->telefono=$telefono;        
        $this->pais=$pais;
        $this->ciudad=$ciudad;
        $this->direccion=$direccion;
        $this->fecha=$fechanac;        
        $this->correo=$correo;
        $this->pw=$contrasena;

        $fechar=date('Y-m-d');
        $codigo= uniqid();
        $nombrem= $this->nombre." ". $this->apellido;

        $resconfirm=$this->conexion->query("SELECT correo FROM dtm_user WHERE correo='$this->correo'");
        if(mysqli_num_rows($resconfirm)>=1){
            ?>
            <script>
                alert("Ya tenemos un registro con tu email, si el error persiste comunicate con el administrador");
                history.back(1);
            </script>
            <?php
        }else{

            $mayor=0;
            $emp=$this->conexion->query("SELECT * FROM dtm_user");
            while ($row = mysqli_fetch_assoc($emp)){
                if($row['id']>$mayor){
                    $mayor=$row['id'];
                }
            }
            $mayor=$mayor+1;

            $tablas="id,nombre,apellido,tipodoc,identificacion,telefono,pais,ciudad,direccion,genero,correo,contrasena,fechanac,tipoperson,codigo,activo,fecha,ins";
            $valores="$mayor,'$this->nombre','$this->apellido','$this->tipodoc','$this->identificacion','$this->telefono','$this->pais','$this->ciudad','$this->direccion','$this->genero','$this->correo',sha1('$this->pw'),'$this->fecha','$this->tipopers','$codigo','0','$fechar','$ins'";

            $qry="INSERT INTO dtm_user (".$tablas.") VALUES(".$valores.")";

            $asunto="Activacion de cuenta en Digital MTX";
            $cabecera = 'MIME-Version: 1.0' . "\r\n";
            $cabecera .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $cabecera .="From: no-responder@digitalmtx.com";
            
            $mensaje="<html>
                        <body>
                            <img src='https://www.digitalmtx.com/img/logo.png' style='margin:auto;'><br><br> 
                            <h1>Bienvenido a Digital MTX</h1><br><br>
                            <p align='justify'>
                                Hola $nombrem te damos la bienvenida a nuestro portal para activar tu cuenta es necesario 
                                dar click <a href='http://www.digitalmtx.com/activacionacc.php?id=$codigo'>aqui</a>.<br><br>
                                <h2>Los datos de tu registro son los siguientes:</h2><br><br>
                                usuario: $this->correo<br><br>
                                clave: $this->pw<br><br>
                                Por favor guarda bien tus datos y evita compartirlos con otras personas.
                                <br><br>
                                Ahora podras realizar compras en nuestro portal <h1><a href='http://www.digitalmtx.com'>Digital MTX</a></h1>.
                            </p>
                        </body>
                    </html>";

            if($this->conexion->query($qry) and mail($this->correo, $asunto, $mensaje, $cabecera)){
                ?>
                <script>
                    alert("Se ha enviado un correo con tus datos para la activación de tu cuenta en Digital MTX,\n si no ves el mensaje es posible que debas revisar en Spam o correo no deseado.\n Tienes 1 dia para activar tu cuenta");
                    location.href="login.php";
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Error al Registrar el usuario intenta de nuevo");
                    history.back(1);
                </script>
                <?php
            }
        } 

    }
    
    /*
     * Funcion que valida los correos de las cuentas
     *      
    */
    public function activacion($codigo){

        $res1= $this->conexion->query("SELECT activo FROM dtm_user WHERE codigo='$codigo'");
        if ($res1->num_rows > 0) {
            $this->conexion->query("UPDATE dtm_user SET activo='1' WHERE codigo='$codigo'");
            $res=$this->conexion->query("SELECT activo FROM dtm_user WHERE codigo='$codigo' and activo = 1");
            if ($res->num_rows > 0) {
                ?>
                    <script>
                        alert("Tu cuenta Digital MTX a sido activada con éxito \n Felicitaciones ahora puedes comprar en nuestra tienda");
                        location.href="login.php";
                    </script>
                <?php
            }
        } else {
            ?>
                <script>
                    location.href="index.php";
                </script>
            <?php
        }
    }

    /*
     * Funcion creada para la recuperacion de contraseña, y envio de la contraseña 
     * nueva a el correo
     *      
    */
    public function recuperarpw($correo){
        $this->correo=$correo;

        $res=$this->conexion->query("SELECT correo FROM dtm_user WHERE correo='$this->correo'");
        if(mysqli_num_rows($res)>=1){
            $codigo= rand(10000000, 99999999);

            $qryrpw="UPDATE dtm_user SET contrasena=sha1('$codigo') WHERE correo='$this->correo'";
            $cabecera = 'MIME-Version: 1.0' . "\r\n";
            $cabecera .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $cabecera .="From: no-responder@digitalmtx.com";
            $asunto="Recuperacion de clave";

            $mensaje="<html>
                        <body>
                            <img src='https://www.digitalmtx.com/img/logo.png' style='margin:auto;'><br><br>
                            <h1>Recuperacion de clave Digital MTX</h1><br><br>
                            <p align='justify'>
                                <h2>Estos son tus datos temporales para inicio de sesión en nuestro portal</h2><br><br>
                                usuario: $this->correo<br><br>
                                clave: $codigo<br><br>
                                Podras cambiar la clave cuando desees desde nuestro portal
                                <br><br>
                                Ahora podras realizar compras en nuestro portal <h1><a href='http://www.digitalmtx.com'>Digital MTX</a></h1>.
                            </p>
                        </body>
                    </html>";

            if($this->conexion->query($qryrpw) and mail($this->correo, $asunto, $mensaje, $cabecera)){
                ?>
                <script>
                    alert("Se a enviado un correo con tu informacion \n por favor verifica en tu bandeja de entrada o spam");
                    location.href("login.php");
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Tenemos problemas con nuestro servidor en estos momentos intenta mas tarde");
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                alert("Correo no registrado, por favor ingrese bien sus datos");
            </script>
            <?php
        }
    }

    /*
     * Funcion creada para cambiar la contraseña
     *      
    */
    public function changuepw($correo,$old,$new){
        $this->correo=$correo;
        $this->pw=$new;

        $res= $this->conexion->query("SELECT correo,contrasena FROM dtm_user WHERE correo='$this->correo' AND contrasena='$old'");
        if(mysqli_fetch_array($res)){

            if($this->conexion->query("UPDATE dtm_user SET contrasena=sha1('$this->pw') WHERE correo='$this->correo'")){
                ?>
                <script>
                    alert("Su contraseña se a modificado con exito!\n Gracias por preferirnos Digital MTX");
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Actualmente poseemos problemas con el servidor por favor comuniquese con nuestras tiendas para resolverlo");
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                alert("Tu contraseña no coincide con la de la cuenta por favor introduce bien sus datos");
            </script>
            <?php
        }
    }
    
    /*
     * Funcion que edita el nombre por parte del usuario
     *      
    */
    public function editnombre($correo, $nombre){
        $this->correo=$correo;
        $this->nombre=$nombre;

        if ($this->conexion->query("UPDATE dtm_user SET nombre='$this->nombre' WHERE correo='$this->correo'")) {
            $_SESSION['nombre1']= $this->nombre;
            ?>
            <script>
                alert("Nombre modificado correctamente");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("No se a podido modificar tu nombre");
            </script>
            <?php
        }
    }
    
    /*
     * Funcion que edita el apellido por parte del usuario
     *      
    */
    public function editapellido($correo,$apellido){
        $this->correo=$correo;
        $this->apellido=$apellido;

        if ($this->conexion->query("UPDATE dtm_user SET apellido='$this->apellido' WHERE correo='$this->correo'")) {
            $_SESSION['apellido']= $this->apellido;
            ?>
            <script>
                alert("Apellido modificado correctamente");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("No se a podido modificar tu apellido");
            </script>
            <?php
        }
    }
    
    /*
     * Funcion que edita la fecha de nacimiento por parte del usuario
     *      
    */
    public function editfechanacimiento($correo,$fecha){
        $this->correo=$correo;
        $this->fecha=$fecha;

        if ($this->conexion->query("UPDATE dtm_user SET fechanac='$this->fecha' WHERE correo='$this->correo'")) {
            $_SESSION['edad']= $this->fecha;
            ?>
            <script>
                alert("Fecha de nacimiento modificada correctamente");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("No se a podido modificar tu fecha de nacimiento");
            </script>
            <?php
        }
    }
    
    /*
     * Funcion que edita el Pais de nacimiento de parte del usuario
     *      
    */
    public function editpais($correo,$pais){
        $this->correo=$correo;
        $this->pais=$pais;

        if ($this->conexion->query("UPDATE dtm_user SET pais='$this->pais' WHERE correo='$this->correo'")) {
            $_SESSION['pais']= $this->pais;
            ?>
            <script>
                alert("Pais modificado correctamente");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("No se a podido modificar tu pais");
            </script>
            <?php
        }
    }
    
    /*
     * Funcion que edita ciudad de parte del usuario
     *      
    */
    public function editciudad($correo,$ciudad){
        $this->correo=$correo;
        $this->ciudad=$ciudad;

        if ($this->conexion->query("UPDATE dtm_user SET ciudad='$this->ciudad' WHERE correo='$this->correo'")) {
            $_SESSION['ciudad']= $this->ciudad;
            ?>
            <script>
                alert("Ciudad modificado correctamente");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("No se a podido modificar tu ciudad");
            </script>
            <?php
        }
    }
    
    /*
     * Funcion que edita la direccion de parte del usuario
     *      
    */
    public function editdireccion($correo,$direccion){
        $this->correo=$correo;
        $this->direccion=$direccion;

        if ($this->conexion->query("UPDATE dtm_user SET direccion='$this->direccion' WHERE correo='$this->correo'")) {
            $_SESSION['direccion']= $this->direccion;
            ?>
            <script>
                alert("Direccion modificado correctamente");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("No se a podido modificar tu direccion");
            </script>
            <?php
        }
    }
    
    /*
     * Funcion que edita el numero de telefono de parte del usuario
     *      
    */
    public function edittelefono($correo,$telefono){
        $this->correo=$correo;
        $this->telefono=$telefono;

        if ($this->conexion->query("UPDATE dtm_user SET telefono='$this->telefono' WHERE correo='$this->correo'")) {
            $_SESSION['telefono']= $this->telefono;
            ?>
            <script>
                alert("Telefono modificado correctamente");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("No se a podido modificar tu telefono");
            </script>
            <?php
        }
    }


    public function listarcategoria(){

        $res= $this->conexion->query("SELECT * FROM dtm_categoria ORDER BY nombre");
        while ($row= mysqli_fetch_assoc($res)){
            ?>
                <li><a class='dropdown-item mx-auto' href='tienda.php?categoria=<?php echo $row['nombre'];?>'><?php echo $row['nombre'];?></a></li>
            <?php 
        }
    }

    public function categorias_menu() {

        $res= $this->conexion->query("SELECT * FROM dtm_categoria ORDER BY nombre");
        $contador = 0;
        while ($row= mysqli_fetch_assoc($res)){
            if ($contador == 0) {
                ?>
                    <a  style="color: #333;"><div class="col s12 item-categorias item-categorias-first"><?php echo $row['nombre']; ?></div></a>
                <?php 
            } else {
                ?>
                    <a  style="color: #333;"><div class="col s12 item-categorias"><?php echo $row['nombre']; ?></div></a>
                <?php 
            }
            $contador++;
        }
    }

    public function categorias_menu_movil() {

        $res= $this->conexion->query("SELECT * FROM dtm_categoria ORDER BY nombre");
        while ($row= mysqli_fetch_assoc($res)){
            ?>
                <a href="tienda.php?categoria=<?php echo $row['nombre'];?>" style="color: #333;"><div class="col s12 item-categorias"><?php echo $row['nombre']; ?></div></a>
            <?php 
        }
    }

    public function ultimos_productos_categoria() {
        $res= $this->conexion->query("SELECT `id`, `nombre`, `precio` FROM dtm_productos where estado ='4' AND categoria = '".$_POST['categoria']."' ORDER BY id DESC limit 12");
        $array = array();
        while ($row= mysqli_fetch_assoc($res)){
            array_push($array, $row);
        }
        for ($i=0; $i < count($array); $i++) { 
            ?>
                <div class="col s3">
                    <div class="col s12 producto-menu-wrapper center">
                        <?php
                            $path = "productos/".$array[$i]['id']."/";
                            $directorio = dir($path);
                            $archivo1 = scandir($path);
                            $nombre_producto = str_replace("-","*",$array[$i]['nombre']);
                            $nombre_producto = str_replace(" ","-",$nombre_producto);
                            $nombre_producto = urlencode($nombre_producto);
                            for ($z=0; $z < count($archivo1); $z++) { 
                                if ($archivo1[$z] != '.' && $archivo1[$z] != '..') {
                                    ?>
                                        <img src="<?php echo $path.$archivo1[$z];?>" style="width: auto;max-height: 170px;margin: auto;max-width: 100%;" alt="<?php echo $array[$i]['nombre']; ?>">
                                        <button class="btn btn-precio-producto-menu waves-effect waves-dark"><?php echo number_format($array[$i]['precio'],0,",",".");?>$(COP)</button>
                                        <a href="productos.php?id=<?php echo $nombre_producto; ?>" class="hover-producto-menu waves-effect waves-light" title="<?php echo $array[$i]['nombre']; ?>">
                                            <?php echo $path.$archivo1[$z]; ?>
                                            <br>
                                            <button class="btn btn-mas-producto-menu waves-effect waves-dark"><i class="material-icons left">remove_red_eye</i>Ver</button>
                                        </a>
                                    <?php
                                    break;
                                }
                            }
                            $directorio->close();
                            ?>
                    </div>
                </div>
            <?php
        }
    }

    public function listarcategoria_footer(){

        $res= $this->conexion->query("SELECT * FROM dtm_categoria ORDER BY nombre");
        while ($row= mysqli_fetch_assoc($res)){
            ?>
                <a href="tienda.php?categoria=<?php echo $row['nombre'];?>" class="item-tarjeta-footer-link">
                    <p class="item-tarjeta-footer">
                        <?php echo $row['nombre']; ?>
                    </p>
                </a>
            <?php 
        }
    }

    public function usuarios_sin_activar(){
        $fecha = date('Y-m-d');
        $nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
        $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
        $this->conexion->query("DELETE FROM dtm_user WHERE fecha<'$nuevafecha' AND activo='0'");
    }
    
    /*
     * Funcion que muestra todas las ventas realizadas por el usuario.
     * su estado y especificaciones
     *      
    */
    public function ventausr($user) {
        $this->correo=$user;

        $res= $this->conexion->query("SELECT * FROM dtm_compras WHERE usuario='$this->correo' ORDER BY numeroventa DESC");
        $contador = '';
        while ($row= mysqli_fetch_assoc($res)) {

            if ($row['metodopago']=="Pago online PSE") {
                try {

                    //$url = "https://200.1.124.65/PSEHostingWebServices/PSEHostingWS.asmx?wsdl";
                    $url = "https://200.1.124.118/PSEHostingWebServices/PSEHostingWS.asmx?wsdl";
                    $options = [
                        'cache_wsdl'     => 0,
                        'trace'          => 1,
                        'stream_context' => stream_context_create(
                            [
                                'ssl' => [
                                    'verify_peer'       => false,
                                    'verify_peer_name'  => false,
                                    'allow_self_signed' => true
                                ]
                            ]
                        )
                    ];

                    $client = new SoapClient($url, $options);
                    $d = array(
                          "ticketOfficeID" => 8141, //2461
                          "password" => '123',
                          "paymentID" => $row['numeroventa'],
                    );
                    $result = $client->getTransactionInformationHosting($d);

                } catch(Exception $e) {
                    die("No se pudo crear la transacción o hay un error en la conexion, por favor intente más tarde o comuníquese con nuestras líneas de atención al cliente al teléfono (031)552 2190, o a los correos electronicos Ventasnacionales@digitalmtx.com y info@digitalmtx.com");//.$e->getMessage()
                }
                //recoje el codigo de retorno
                $existe_en_pse = $result->getTransactionInformationHostingResult->ReturnCode;
                //recoje el estado de pago PSE
                $estado_pago_pse=(isset($result->getTransactionInformationHostingResult->State))?$result->getTransactionInformationHostingResult->State:"";

                if (isset($result)&&"INVALIDPAYMENTID"!=$existe_en_pse) {

                    foreach ($result->getTransactionInformationHostingResult as $clave => $valor) {

                        $qry="UPDATE dtm_compras SET referencia=".$valor." ,cpago='1' WHERE numeroventa=".$row['numeroventa'];
                        if ($result->getTransactionInformationHostingResult->State=="OK") {
                            $qry="UPDATE dtm_compras SET referencia=".$valor." ,cpago='1', pagado='1', aprobador='PSE' WHERE numeroventa=".$row['numeroventa'];
                        }

                        if ($clave=="TrazabilityCode") {

                            if($this->conexion->query($qry)) {
                                $contador .= $row['numeroventa'].',';
                            }
                    
                        }
                        
                    }

                }
            }

                ?>
                    <div class="row no-margin">
                        <div class="col s12">
                            <div class="col s12 no-padding collapisble-wrapper">
                                <ul class="collapsible">
                                    <li>
                                        <div class="collapsible-header">
                                            <i class="material-icons">local_offer</i>
                                            <span class="titulo-collapsible">Compra realizada el: <b><?php echo $row['fecha']; ?></b> - Código: <b><?php echo $row['numeroventa'];?></b></span>
                                            <span class="badge valign-wrapper" data-badge-caption="">
                                                <?php
                                                    if ($row['referencia'] == null) {
                                                        ?>
                                                            <span class="aviso-sin-confirmar">Sin confirmar</span>
                                                        <?php
                                                    } else {
                                                        ?>
                                                            <span class="aviso-confirmado">Confirmada</span>
                                                        <?php
                                                    }
                                                ?>
                                                <i class="material-icons black-text">keyboard_arrow_right</i>
                                            </span>
                                        </div>
                                        <div class="collapsible-body" id="collapse<?php echo $row['numeroventa']; ?>">
                                            <?php
                                                if ($row['metodopago']=="Pago online PSE") {
                                                    ?>
                                                        <div class="row no-margin" style="margin-top: -20px !important;">
                                                            <div class="col s12">
                                                                <div class="col s12 center">
                                                                    <?php
                                                                        $estado = '';
                                                                        if ($result->getTransactionInformationHostingResult->State == 'CREATED') {
                                                                            $estado = 'Creado';
                                                                        } elseif ($result->getTransactionInformationHostingResult->State == 'PENDING') {
                                                                            $estado = 'Pendiente';
                                                                        } elseif ($result->getTransactionInformationHostingResult->State == 'FAILED') {
                                                                            $estado = 'Fallido';
                                                                        } elseif ($result->getTransactionInformationHostingResult->State == 'NOT_AUTHORIZED') {
                                                                            $estado = 'No autorizado';
                                                                        } elseif ($result->getTransactionInformationHostingResult->State == 'OK') {
                                                                            $estado = 'Aprobado';
                                                                        }
                                                                    ?>
                                                                    <p>
                                                                        <b>Estado del pago realizado por</b> <img src="img/pse/logo_pse_small.png">: <?php echo isset($estado_pago_pse)&&$estado_pago_pse!=""?$estado:"---"; ?>
                                                                    </p>
                                                                    <p>
                                                                        <b>Especificaciones de envio o requerimientos de mi parte:</b>
                                                                    </p>
                                                                    <p>
                                                                        <?php
                                                                            echo $row['especificaciones'];
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                } elseif($row['metodopago'] == 'Pago online Wompi') {
                                                    $order_id = $row['referencia'];
                                                    $url = "https://production.wompi.co/v1/transactions/".$order_id;
                                                    //$url = "https://sandbox.wompi.co/v1/transactions/".$order_id;

                                                    $client = curl_init($url);
                                                    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
                                                    $response = curl_exec($client);

                                                    $result = json_decode($response);
                                                    ?>
                                                        <div class="row no-margin" style="margin-top: -20px !important;">
                                                            <div class="col s12">
                                                                <div class="col s12 center">
                                                                    <?php
                                                                        $estado = 'No se ha podido identificar el estado en el que se encuentra la transacción';
                                                                        if ($result->data->status == 'PENDING') {
                                                                            $estado = 'Transacción pendiente';
                                                                        } elseif ($result->data->status == 'APPROVED') {
                                                                            $estado = 'Transacción aprobada';
                                                                        } elseif ($result->data->status == 'DECLINED') {
                                                                            $estado = 'Transacción rechazada';
                                                                        } elseif ($result->data->status == 'VOIDED') {
                                                                            $estado = 'Transacción anulada';
                                                                        } elseif ($result->data->status == 'ERROR') {
                                                                            $estado = 'Ocurrió un error con el método de pago utilizado';
                                                                        }
                                                                    ?>
                                                                    <p>
                                                                        <b>Estado del pago realizado por</b> <img src="img/wompi.png" style="height: 20px;transform: translateY(5px);">: <?php echo $estado; ?>
                                                                    </p>
                                                                    <p>
                                                                        <b>Especificaciones de envío o requerimientos de mi parte:</b>
                                                                    </p>
                                                                    <p>
                                                                        <?php
                                                                            echo $row['especificaciones'];
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                }
                                            ?>
                                            <div class="row no-margin" style="margin-top: -20px !important;">
                                                <div class="col s12">
                                                    <p>
                                                        <b>Metodo de pago:</b> <?php echo $row['metodopago']; ?>
                                                    </p>
                                                    <p>
                                                        <b>Total a pagar:</b> <?php echo number_format($row['total'],2,",",".")."$".$row['moneda']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row no-margin">
                                                <div class="col s12">
                                                    <?php 
                                                        if ($row['referencia']==NULL) {
                                                            ?>
                                                                <p>
                                                                    <b>Indicanos que ya pagaste tu pedido ingresando una referencia de pago con el cual podamos confirmar el mismo:</b>
                                                                </p>
                                                                <form method='post' action='pagar.php' class='form-inline'>
                                                                    <input type='hidden' name='venta' value='<?php echo $row['numeroventa']; ?>'>
                                                                    <div class="input-field col s12">
                                                                        <i class="material-icons prefix">mode_edit</i>
                                                                        <input id="referencia" name="referencia" type="text" class="validate" required placeholder="Escribenos la referencia para ubicar tu pago">
                                                                        <label for="referencia">Referencia</label>
                                                                    </div>
                                                                    <div class="col s12 center">
                                                                        <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="pagar"><i class="material-icons right">keyboard_arrow_right</i>Notificar</button>
                                                                    </div>
                                                                </form>
                                                            <?php 
                                                        }elseif($row['referencia']!=NULL && $row['pagado']=='1'&&$row['metodopago']=="Pago online PSE"){
                                                            ?>
                                                                <p>
                                                                    <b>Numero de Referencia:</b> <?php echo $row['numeroventa'];?>
                                                                </p>
                                                            <?php 
                                                        }elseif($row['referencia']!=NULL && $row['pagado']=='1'){
                                                            ?>
                                                                <p>
                                                                    <b>Numero de Referencia:</b> <?php echo $row['referencia'];?>
                                                                </p>
                                                            <?php 
                                                        }elseif ($row['metodopago']=="Pago online PSE"){
                                                            ?>
                                                                <p>
                                                                    <b>Referencia de pago:</b> <?php echo $row['numeroventa'];?>
                                                                </p>
                                                            <?php         
                                                        }else{
                                                            /*?>
                                                                <p>
                                                                    <b>Referencia de pago:</b> <?php echo $row['referencia'];?> <button class="btn btn-confirmar-accion waves-effect waves-light modal-trigger" href="#myModal"><i class="material-icons right">keyboard_arrow_right</i>Editar</button>
                                                                </p>
                                                            <?php*/       
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="row no-margin">
                                                <div class="col s12 center">
                                                    <?php
                                                        if ($row['metodopago']=="Pago online PSE") {
                                                            ?>
                                                                <div class="row no-margin">
                                                                    <div class="col s12">
                                                                        <button class="btn btn-confirmar-accion waves-effect waves-light modal-trigger" href="#modal_pse" value="<?php echo $row['numeroventa']; ?>" name="PSE"><i class="material-icons right">keyboard_arrow_right</i>Ver detalles del pago de PSE</button>
                                                                        <div id="modal_pse" class="modal modal-fixed-footer">
                                                                            <div class="modal-content">
                                                                                <div class="row">
                                                                                    <div class="col s12 titulo-modal-te-llamamos">
                                                                                        <h4>Detalle de PSE para la compra con el código: <?php echo $row['numeroventa'];?></h4>
                                                                                    </div>
                                                                                    <div class="col s12 texto-modal-te-llamamos">
                                                                                        <table class="striped highlight responsive-table">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Estado</b></td>
                                                                                                    <td class="left-align">
                                                                                                        <?php
                                                                                                            if ($result->getTransactionInformationHostingResult->State == 'CREATED') {
                                                                                                                echo 'Creado';
                                                                                                            } elseif ($result->getTransactionInformationHostingResult->State == 'PENDING') {
                                                                                                                echo 'Pendiente';
                                                                                                            } elseif ($result->getTransactionInformationHostingResult->State == 'FAILED') {
                                                                                                                echo 'Fallido';
                                                                                                            } elseif ($result->getTransactionInformationHostingResult->State == 'NOT_AUTHORIZED') {
                                                                                                                echo 'No autorizado';
                                                                                                            } elseif ($result->getTransactionInformationHostingResult->State == 'OK') {
                                                                                                                echo 'Aprobado';
                                                                                                            }
                                                                                                        ?>    
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Código</b></td>
                                                                                                    <td class="left-align"><?php echo $result->getTransactionInformationHostingResult->PaymentID; ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Valor</b></td>
                                                                                                    <td class="left-align"><?php echo $result->getTransactionInformationHostingResult->Amount; ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Iva</b></td>
                                                                                                    <td class="left-align"><?php echo $result->getTransactionInformationHostingResult->VATAmount; ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Total</b></td>
                                                                                                    <td class="left-align"><?php echo $result->getTransactionInformationHostingResult->Amount + $result->getTransactionInformationHostingResult->VATAmount; ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Banco escogido</b></td>
                                                                                                    <td class="left-align"><?php echo $result->getTransactionInformationHostingResult->BankName; ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Referencia de pago<span data-toggle="tooltip" data-placement="top" title="Código único de seguimiento de la transacción en PSE">(CUS)</span></b></td>
                                                                                                    <td class="left-align"><?php echo $result->getTransactionInformationHostingResult->TrazabilityCode; ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Tipo de identificación del comprador</b></td>
                                                                                                    <td class="left-align"><?php echo $result->getTransactionInformationHostingResult->Reference2; ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Número de identificación del comprador</b></td>
                                                                                                    <td class="left-align"><?php echo $result->getTransactionInformationHostingResult->Reference3; ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Fecha</b></td>
                                                                                                    <td class="left-align"><?php echo $result->getTransactionInformationHostingResult->SolicitedDate; ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Dirección IP del dispositivo donde se efectuó la compra</b></td>
                                                                                                    <td class="left-align"><?php echo $result->getTransactionInformationHostingResult->Reference1; ?></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col s12">
                                                                        <?php
                                                                            if ($result->getTransactionInformationHostingResult->State == 'PENDING') {
                                                                                ?>
                                                                                    <div class="row">
                                                                                        <div class="col s12">
                                                                                            <p class="center">
                                                                                                <b><u>Por favor verificar si el débito fue realizado en el Banco.</u></b>
                                                                                            </p>
                                                                                            <p style="text-align: justify;">
                                                                                                En este momento su compra con el código #<b><?php echo $row['numeroventa'];?></b> presenta un proceso de pago cuya transacción se encuentra <b>PENDIENTE</b> de recibir confirmación por parte de su entidad financiera, por favor espere unos minutos y vuelva a consultar más tarde para verificar si su pago fue confirmado de forma exitosa. Si desea mayor información sobre el estado actual de su operación puede comunicarse a nuestras líneas de atención al cliente <b>57-1-031 5522190</b> o enviar un correo electronico a <b>ventasnacionales@digitalmtx.com</b> o <b>info@digitalmtx.com</b> y preguntar por el estado de la transacción: <b><?php echo $result->getTransactionInformationHostingResult->TrazabilityCode; ?></b>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php
                                                                            } elseif ($result->getTransactionInformationHostingResult->State == 'OK') {
                                                                                ?>
                                                                                    <div class="row">
                                                                                        <div class="col s12">
                                                                                            <p style="text-align: justify;">
                                                                                                En este momento su compra con el código #<b><?php echo $row['numeroventa'];?></b> ha finalizado su proceso de pago y cuya transacción se encuentra <b>APROBADA</b> en su entidad financiera. Si desea mayor información sobre el estado de su operación puede comunicarse a nuestras líneas de atención al cliente <b>57-1-031 5522190</b> o enviar un correo electronico a <b>ventasnacionales@digitalmtx.com</b> o <b>info@digitalmtx.com</b> y preguntar por el estado de la transacción: <b><?php echo $result->getTransactionInformationHostingResult->TrazabilityCode; ?></b>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                        } elseif ($row['metodopago']=="Pago online Wompi") {
                                                            ?>
                                                                <div class="row no-margin">
                                                                    <div class="col s12">
                                                                        <button class="btn btn-confirmar-accion waves-effect waves-light modal-trigger" href="#modal_pse" value="<?php echo $row['numeroventa']; ?>" name="PSE"><i class="material-icons right">keyboard_arrow_right</i>Ver detalles del pago de Wompi</button>
                                                                        <div id="modal_pse" class="modal modal-fixed-footer">
                                                                            <div class="modal-content">
                                                                                <div class="row no-margin">
                                                                                    <div class="col s12 titulo-modal-te-llamamos">
                                                                                        <h4>Detalle de Wompi para la compra con el código: <?php echo $row['numeroventa'];?></h4>
                                                                                    </div>
                                                                                    <div class="col s12 texto-modal-te-llamamos">
                                                                                        <table class="striped highlight responsive-table">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Estado</b></td>
                                                                                                    <td class="left-align">
                                                                                                        <?php
                                                                                                            if ($result->data->status == 'PENDING') {
                                                                                                                echo 'Transacción pendiente';
                                                                                                            } elseif ($result->data->status == 'APPROVED') {
                                                                                                                echo 'Transacción aprobada';
                                                                                                            } elseif ($result->data->status == 'DECLINED') {
                                                                                                                echo 'Transacción rechazada';
                                                                                                            } elseif ($result->data->status == 'VOIDED') {
                                                                                                                echo 'Transacción anulada';
                                                                                                            } elseif ($result->data->status == 'ERROR') {
                                                                                                                echo 'Ocurrió un error con el método de pago utilizado';
                                                                                                            } else {
                                                                                                                echo 'No se ha podido identificar el estado en el que se encuentra la transacción';
                                                                                                            }
                                                                                                        ?>    
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Código</b></td>
                                                                                                    <td class="left-align"><?php echo $result->data->id; ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Creado el</b></td>
                                                                                                    <td class="left-align"><?php echo $result->data->created_at; ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Moneda</b></td>
                                                                                                    <td class="left-align"><?php echo $result->data->currency; ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Total(con centavos)</b></td>
                                                                                                    <td class="left-align"><?php echo $result->data->amount_in_cents; ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Método de pago</b></td>
                                                                                                    <td class="left-align"><?php echo $result->data->payment_method_type; ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="left-align"><b>Referencia de pago<span data-toggle="tooltip" data-placement="top" title="Código único de seguimiento de la transacción en PSE">(CUS)</span></b></td>
                                                                                                    <td class="left-align"><?php echo $result->data->reference; ?></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col s12">
                                                                        <?php
                                                                            if ($result->status == 'PENDING') {
                                                                                ?>
                                                                                    <div class="row no-margin">
                                                                                        <div class="col s12">
                                                                                            <p class="center">
                                                                                                <b><u>Por favor verificar si el débito fue realizado en el Banco.</u></b>
                                                                                            </p>
                                                                                            <p style="text-align: justify;">
                                                                                                En este momento su compra con el código #<b><?php echo $row['numeroventa'];?></b> presenta un proceso de pago cuya transacción se encuentra <b>PENDIENTE</b> de recibir confirmación por parte de su entidad financiera, por favor espere unos minutos y vuelva a consultar más tarde para verificar si su pago fue confirmado de forma exitosa. Si desea mayor información sobre el estado actual de su operación puede comunicarse a nuestras líneas de atención al cliente <b>57-1-031 5522190</b> o enviar un correo electronico a <b>ventasnacionales@digitalmtx.com</b> o <b>info@digitalmtx.com</b>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php
                                                                            } elseif ($result->status == 'APPROVED') {
                                                                                ?>
                                                                                    <div class="row no-margin">
                                                                                        <div class="col s12">
                                                                                            <p style="text-align: justify;">
                                                                                                En este momento su compra con el código #<b><?php echo $row['numeroventa'];?></b> ha finalizado su proceso de pago y cuya transacción se encuentra <b>APROBADA</b> en su entidad financiera. Si desea mayor información sobre el estado de su operación puede comunicarse a nuestras líneas de atención al cliente <b>57-1-031 5522190</b> o enviar un correo electronico a <b>ventasnacionales@digitalmtx.com</b> o <b>info@digitalmtx.com</b>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="row no-margin">
                                                <div class="col s12">
                                                    <h5 class="destacados-titulo">Productos comprados</h5>
                                                </div>
                                            </div>
                                            <div class="row no-margin">
                                                <div class="col s12">
                                                    <table class="striped highlight responsive-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Código</th>
                                                                <th>Producto</th>
                                                                <th>Cantidad</th>
                                                                <th>Costo unitario</th>
                                                                <th>Total</th>
                                                                <th>Calificar</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                $re= $this->conexion->query("SELECT * FROM dtm_productosv WHERE numeroventa_fk='".$row['numeroventa']."'");
                                                                while ($fila= mysqli_fetch_assoc($re)) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?php echo $fila['cod_producto_fk'];?></td>
                                                                            <td><?php echo $fila['nombrep'];?></td>
                                                                            <td><?php echo $fila['cantidad'];?></td>
                                                                            <td><?php echo number_format($fila['costou'],2,",",".");?>$(COP)</td>
                                                                            <td><?php echo number_format($fila['costo_total'],2,",",".");?>$(COP)</td>
                                                                            <td>
                                                                                <?php
                                                                                    if ($row['cpago']==1 && $row['pagado']==1 && $row['facturado']==1 && $row['despachado']==1 || $row['cpago']==1 && $row['pagado']==0 && $row['facturado']==1 && $row['despachado']==1 || 1==1) {
                                                                                        $calificado = $this->conexion->query("SELECT * FROM dtm_calificaciones WHERE producto = '".$fila['cod_producto_fk']."' AND compra = '".$row['numeroventa']."'");
                                                                                        $estado_calificacion = 0;
                                                                                        while ($row_calificado = mysqli_fetch_assoc($calificado)) {
                                                                                            $estado_calificacion = 1;
                                                                                        }
                                                                                        if ($estado_calificacion == 1) {
                                                                                            ?>
                                                                                                <button class="btn btn-media-accion waves-effect waves-light disabled">Ya calificado</button>
                                                                                            <?php
                                                                                        } else {
                                                                                            ?>
                                                                                                <a href="#modal_calificacion_<?php echo $fila['cod_producto_fk']; ?>" class="btn btn-media-accion waves-effect waves-light modal-trigger" data-codigo-compra="<?php echo $row['numeroventa']; ?>" data-codigo-producto="<?php echo $fila['cod_producto_fk']; ?>"><i class="material-icons right">keyboard_arrow_right</i>Calificar</a>
                                                                                                <div id="modal_calificacion_<?php echo $fila['cod_producto_fk']; ?>" class="modal modal-fixed-footer">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="row">
                                                                                                            <div class="col s12 titulo-modal-te-llamamos">
                                                                                                                <h4>Calificar producto</h4>
                                                                                                            </div>
                                                                                                            <div class="col s12 texto-modal-te-llamamos">
                                                                                                                <div class="col s12">
                                                                                                                    <p>
                                                                                                                        ¿Cuántas estrellas crees que se merece este producto?
                                                                                                                    </p>
                                                                                                                </div>
                                                                                                                <div class="col s12 center">
                                                                                                                    <div style="display: inline-block;transform: translateY(-8px);">1</div>
                                                                                                                    <i class="material-icons small estrella estrella_1" data-estrella="1">stars</i>
                                                                                                                    <i class="material-icons small estrella estrella_2" data-estrella="2">stars</i>
                                                                                                                    <i class="material-icons small estrella estrella_3" data-estrella="3">stars</i>
                                                                                                                    <i class="material-icons small estrella estrella_4" data-estrella="4">stars</i>
                                                                                                                    <i class="material-icons small estrella estrella_5" data-estrella="5">stars</i>
                                                                                                                    <div style="display: inline-block;transform: translateY(-8px);">5</div>
                                                                                                                </div>
                                                                                                                <input class="campo_estrellas" type="number" hidden>
                                                                                                                <div class="input-field col s12">
                                                                                                                    <i class="material-icons prefix">mode_edit</i>
                                                                                                                    <input id="titulo_calificacion<?php echo $fila['cod_producto_fk']; ?>" type="text" class="validate titulo_calificacion">
                                                                                                                    <label for="titulo_calificacion<?php echo $fila['cod_producto_fk']; ?>">¿Qué titulo le colocarías a tu calificación?</label>
                                                                                                                </div>
                                                                                                                <div class="input-field col s12">
                                                                                                                    <i class="material-icons prefix">mode_edit</i>
                                                                                                                    <textarea id="descripcion_calificacion_<?php echo $fila['cod_producto_fk']; ?>" class="materialize-textarea" data-length="255"></textarea>
                                                                                                                    <label for="descripcion_calificacion_<?php echo $fila['cod_producto_fk']; ?>">¿Tienes algún comentario u observación adicional que desees escribir?</label>
                                                                                                                    <span class="helper-text">Este campo es opcional</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <button class="waves-effect waves-light btn-flat btn-te-llamamos-modal white-text left enviar-calificacion" data-codigo-compra="<?php echo $row['numeroventa']; ?>" data-codigo-producto="<?php echo $fila['cod_producto_fk']; ?>"><i class="material-icons left">send</i>Enviar calificación</button>
                                                                                                        <a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php 
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <?php
                                                if ($row['metodopago']!="Pago online PSE" && $row['metodopago']!="Pago online Wompi") {
                                                    ?>
                                                        <div class="row no-margin">
                                                            <div class="col s12 center">
                                                                <p>
                                                                    <a href="compra.php?id=<?php echo $row['numeroventa']; ?>" class="btn btn-registrarse waves-effect waves-light"><i class="material-icons right">keyboard_arrow_right</i>Cancelar compra</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    <?php
                                                }
                                            ?>
                                            <div class="row no-margin">
                                                <div class="col s12 center" style="margin-top: -10px !important;">
                                                    <p>
                                                        <a href="compra.php?id=<?php echo $row['numeroventa'];?>&metodo=<?php echo $row['metodopago'];?>" class="btn btn-media-accion waves-effect waves-light"><i class="material-icons right">keyboard_arrow_right</i>Si no has notificado o enviado la referencia de pago has clic aquí</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr class="divider">
                                            <div class="row no-margin">
                                                <div class="col s12">
                                                    <?php 
                                                        if ($row['cpago']==0) {
                                                            ?>
                                                                <div class="row no-margin">
                                                                    <div class="col s12">
                                                                        <div class="progress">
                                                                            <div class="determinate" style="width: 5%"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col s12 center">
                                                                        <b>Estado de compra:</b> Esperando respuesta del cliente
                                                                    </div>
                                                                </div>
                                                            <?php
                                                        }elseif($row['cpago']==1 && $row['pagado']==0){
                                                            ?>
                                                                <div class="row no-margin">
                                                                    <div class="col s12">
                                                                        <div class="progress">
                                                                            <div class="determinate" style="width: 20%"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col s12 center">
                                                                        <b>Estado de compra:</b> Por confirmar pago
                                                                    </div>
                                                                </div>
                                                            <?php
                                                        }elseif($row['cpago']==1 && $row['pagado']==1 && $row['facturado']==0){
                                                            ?>
                                                                <div class="row no-margin">
                                                                    <div class="col s12">
                                                                        <div class="progress">
                                                                            <div class="determinate" style="width: 35%"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col s12 center">
                                                                        <b>Estado de compra:</b> Pago confirmado
                                                                    </div>
                                                                </div>
                                                            <?php
                                                        }elseif($row['cpago']==1 && $row['pagado']==0 && $row['facturado']==1){
                                                            ?>
                                                                <div class="row no-margin">
                                                                    <div class="col s12">
                                                                        <div class="progress">
                                                                            <div class="determinate" style="width: 50%"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col s12 center">
                                                                        <b>Estado de compra:</b> Pendiente por factura. Los detalles de envío son: <?php echo $row['datos']; ?>
                                                                        <br>
                                                                        <b>Nota:</b> Después de facturar se asignará el despachador para ir al tu dirección y seguir con el proceso
                                                                    </div>
                                                                </div>
                                                            <?php
                                                        }elseif($row['cpago']==1 && $row['pagado']==1 && $row['facturado']==1 && $row['despachado']==0){
                                                            ?>
                                                                <div class="row no-margin">
                                                                    <div class="col s12">
                                                                        <div class="progress">
                                                                            <div class="determinate" style="width: 65%"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col s12 center">
                                                                        <b>Estado de compra:</b> Por despachar
                                                                    </div>
                                                                </div>
                                                            <?php
                                                        }elseif($row['cpago']==1 && $row['pagado']==0 && $row['facturado']==1 && $row['despachado']==0){
                                                            ?>
                                                                <div class="row no-margin">
                                                                    <div class="col s12">
                                                                        <div class="progress">
                                                                            <div class="determinate" style="width: 80%"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col s12 center">
                                                                        <b>Estado de compra:</b> Por despachar
                                                                    </div>
                                                                </div>
                                                            <?php
                                                        }elseif($row['cpago']==1 && $row['pagado']==1 && $row['facturado']==1 && $row['despachado']==1){
                                                            ?>
                                                                <div class="row no-margin">
                                                                    <div class="col s12">
                                                                        <div class="progress">
                                                                            <div class="determinate" style="width: 100%"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col s12 center">
                                                                        <b>Estado de compra:</b> Completado. Los detalles de envío son: <?php echo $row['datos']; ?> 
                                                                    </div>
                                                                </div>
                                                            <?php
                                                        }elseif($row['cpago']==1 && $row['pagado']==0 && $row['facturado']==1 && $row['despachado']==1){
                                                            ?>
                                                                <div class="row no-margin">
                                                                    <div class="col s12">
                                                                        <div class="progress">
                                                                            <div class="determinate" style="width: 100%"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col s12 center">
                                                                        <b>Estado de compra:</b> Pendiente por pago. Los detalles de envío son: <?php echo $row['datos']; ?> 
                                                                    </div>
                                                                </div>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>                
                <?php                        
        }
        ?>
            <script>
                var contador = '<?php echo $contador; ?>';
                if (contador > 0) {
                    alert("Las compras con los códigos " + contador + " aún se encuentran en la lista de pagos a confirmar.");
                }
            </script>
        <?php
    }
    
    /*
     * Funcion que permite al cliente notificar que ya pago su compra
     *      
    */
    public function clientepago($numeroventa,$usuario,$referencia){

        $r= $this->conexion->query("SELECT numeroventa,usuario FROM dtm_compras WHERE numeroventa='$numeroventa' AND usuario='$usuario'");
        if(mysqli_num_rows($r) >= 1) {
            $qry="UPDATE dtm_compras SET referencia='$referencia',cpago='1' WHERE numeroventa='$numeroventa' AND usuario='$usuario'";
            if ($this->conexion->query($qry)) {
                ?>
                <script>
                        //alert("La venta de codigo <?php echo $numeroventa ?> a pasado a la lista de pagos a confirmar de DigitalMTX gracias por preferirnos");
                        alert("La referencia ha sido ingresada correctamente, gracias por preferirnos");
                        location.href="miscompras.php";
                    </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("No se encontró la compra realizada");
                location.href="miscompras.php";
            </script>
            <?php
        }
    }
    
    /*
     * Funcion que permite al usuario modificar su numero de referencia en compra
     *      
    */
    public function mref($numeroventa,$referencia,$usuario){

        $r= $this->conexion->query("SELECT numeroventa,usuario FROM dtm_compras WHERE numeroventa='$numeroventa' AND usuario='$usuario'");
        if (mysqli_num_rows($r)>=1){

            $r2= $this->conexion->query("SELECT numeroventa,pagado FROM dtm_compras WHERE numeroventa='$numeroventa' AND pagado='1'");
            if(mysqli_num_rows($r2)>=1){
                ?>
                <script>
                    alert("Esta compra ya no se puede modificar debido a que ya a sido procesada");
                    location.href="miscompras.php";
                </script>
                <?php
            }else{

                $qry="UPDATE dtm_compras SET referencia='$referencia' WHERE numeroventa='$numeroventa' AND usuario='$usuario'";
                if ($this->conexion->query($qry)) {
                    ?>
                    <script>
                        alert("Tu numero de referencia en la compra <?php echo $numeroventa; ?> se a cambiado a <?php echo $referencia; ?>");
                        location.href="miscompras.php";
                    </script>
                    <?php
                }
            }
        }else{
            ?>
            <script>
                alert("Por favor digita bien tus datos");
                location.href="miscompras.php";
            </script>
            <?php
        }
        
    }
        
    public function mostrarproductos() {

        $res= $this->conexion->query("SELECT * FROM dtm_productos as p INNER JOIN dtm_estados_guias as eg on eg.id = p.estado WHERE stock>=0 ORDER BY descuento DESC LIMIT 4");
        while($row= mysqli_fetch_assoc($res)){
            ?>
            <div class='col-md-3 col-sm-6'>
                <div class='thumbnail wow zoomIn' style='height:500px' style='margin:20px'>

                    <?php 
                    $path="productos/".$row['id']."/";
                    $directorio=dir($path);
                    $archivo1= scandir($path);
                    ?>

                    <a href="productos.php?id=<?php echo $row['id']; ?>">
                        <img src='<?php echo $path.$archivo1[2];?>' style="width: 125px;height: 125px;position: absolute;left: 31%;">
                    </a>

                    <?php
                    $directorio->close();
                    ?>

                    <br><br><br><br><br><br><br><br>

                    <div class='caption'>
                        <a href='productos.php?id=<?php echo $row['id'];?>'>
                            <h3 class='text-center'><?php echo $row['nombre'];?></h3>
                        </a>
                        <br>
                        <p align='center' style='font-size: 15px;'>Categoria: <?php echo $row['categoria'];?>
                            <br>
                            Marca: <?php echo $row['marca'];?>
                            <br>
                            Stock: <?php echo $row['stock'];?>
                            <?php
                        if($row['descuento']==0){
                            ?>
                            <br>Precio: <?php echo number_format($row['precio'],0,",",".");?>$(COP)<br>
                            <?php 
                            echo "";
                        }else{
                            $total=((100-$row['descuento'])*$row['precio'])/100;
                            ?>
                            <br>
                            <strong style='color:red;'>Antes</strong>(Precio: <?php echo number_format($row['precio'],0,",",".");?>$(COP))
                            <br> 
                            menos el <?php echo $row['descuento'];?> %
                            <br>
                            <strong style='color: blue'>Ahora: <?php echo number_format($total,0,",",".");?>.00$(COP)</strong>
                            <?php 
                        }
                        ?>
                        </p> 
                    </div>
                    <br>
                    <a id='bpro' href='productos.php?id=<?php echo $row['id'];?>' class='btn btn-default btn-sm'>ver producto</a> 
                </div> 
            </div>
        <?php
        }
        ?>
        <style>
            #bpro {
                position:absolute;
                bottom:30px;
                left:35%
            } 

            .thumbnail:hover {
                border: 2px solid #2E9AFE;
            }
        </style>
        <?php 
    }

    public function mostrar_destacados() {
        $array = array();

        if($res = $this->conexion->query("SELECT * FROM `dtm_productos` WHERE `destacado` = 1 ORDER BY `destacado`")) {
            if($res->num_rows > 0) {
                while ($row=$res->fetch_assoc()) {
                    array_push($array,$row);
                }
                shuffle($array);
                for ($i=0; $i < 8; $i++) {

                    if(count($array) == 1 || count($array) == 5 && $i == 4) {
                        ?>
                        <div class="col s6" style="transform: translateX(50%);">
                        <?php
                    } elseif(count($array) == 2 || count($array) == 6 && $i >= 4) {
                        ?>
                        <div class="col s12 m6">
                        <?php
                    } elseif(count($array) == 3 || count($array) == 7 && $i >= 4) {
                        ?>
                        <div class="col s12 m4">
                        <?php
                    } else {
                        ?>
                        <div class="col s12 m4 l3">
                        <?php
                    }
                        ?>
                        <div class="col s12 tarjeta-producto-destacados">
                            <?php
                                $path = "productos/".$array[$i]['id']."/";
                                $directorio = dir($path);
                                $archivo1 = scandir($path);
                                $nombre_producto = str_replace("-","*",$array[$i]['nombre']);
                                $nombre_producto = str_replace(" ","-",$nombre_producto);
                                $nombre_producto = urlencode($nombre_producto);
                            ?>
                            <div class="col s12 center"> 
                                <div class="carousel carousel-slider" style="width: auto;max-height: 200px;min-height: 200px;margin: auto;max-width: 100%;">
                                    <?php
                                        for ($z=0; $z < count($archivo1); $z++) { 
                                            if ($archivo1[$z] != '.' && $archivo1[$z] != '..') {
                                                ?>
                                                    <a class="carousel-item"><img src="<?php echo $path.$archivo1[$z];?>" style="width: auto;max-height: 200px;margin: auto;max-width: 100%;"></a>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                                
                                <?php
                                    $directorio->close();
                                ?>
                            </div>
                            <div class="row" style="margin-bottom: 0;">
                                <div class="col s12 center">
                                    <a href='productos.php?id=<?php echo $nombre_producto; ?>' title="<?php echo $array[$i]['nombre']; ?>" style="color: #095F91;">
                                        <h6 class="titulo_producto_<?php echo $i; ?>" style="height: 52px;max-height: 52px;"><?php echo $array[$i]['nombre']; ?></h6>
                                    </a>
                                </div>
                            </div>
                            <a class="col s6 btn btn-ver-destacado waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="Ver los detalles de este producto" href="productos.php?id=<?php echo $nombre_producto; ?>">
                                <i class="material-icons left">remove_red_eye</i>Ver
                            </a>
                            <?php
                                if($array[$i]['descuento']==0) {
                                    $total = $array[$i]['precio'];
                                } else {
                                    $total=((100-$array[$i]['descuento'])*$array[$i]['precio'])/100;
                                }
                            ?>
                            <form method="post" action="addcart.php" class="form-horizontal">
                                <input type="hidden" name="id" value='<?php echo $array[$i]['id'];?>'>
                                <input type="hidden" name="codigo" value='<?php echo $array[$i]["codigo"];?>'>
                                <input type="hidden" name="nombre" value='<?php echo $array[$i]["nombre"];?>'>
                                <input type="hidden" name="stock" value='<?php echo $array[$i]["stock"];?>'>
                                <input type="hidden" name="precio" value='<?php echo $total;?>'>
                                <input type="hidden" name="cantidad" value="1">
                                <button class="col s6 btn btn-anadir-destacado waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Añadir al carrito" name="carro" href="productos.php?id=<?php echo $nombre_producto; ?>" type="submit">
                                    <i class="material-icons left">shopping_cart</i>Añadir
                                </button>
                            </form>
                            <div class="row hide">
                                <div class="col s12">
                                    <div class="col s6">
                                        Disponibles:
                                    </div>
                                    <div class="col s6" style="text-align: right;">
                                        <?php
                                            echo $array[$i]['stock'];
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="col s6 hide">
                                        Precio:
                                    </div>
                                    <div class="col s12 center">
                                        <?php
                                            if($array[$i]['descuento']==0) {
                                                $total = $array[$i]['precio'];
                                                ?>
                                                    <br><br>
                                                    <h4><b>$ <?php echo number_format($array[$i]['precio'],0,",","."); ?></b></h4>
                                                <?php 
                                            } else {
                                                $total=((100-$array[$i]['descuento'])*$array[$i]['precio'])/100;
                                                ?>
                                                    <br>
                                                    <h5 class="descuento">$ <?php echo number_format($array[$i]['precio'],0,",",".");?></h5>
                                                    <h5 style="margin-top: -5px;"><b style="font-size: 1.4em;">$ <?php echo number_format($total,0,",",".");?></b> (-<?php echo $array[$i]['descuento'];?>%)</h5>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <script>
                    var numero_destacados = '<?php echo count($array)-1; ?>';
                </script>
                <?php
            } else {
                ?>
                <script>
                    var contenedor_destacados = document.getElementById('productos');
                    contenedor_destacados.style.display = 'none';
                </script>
                <?php
            }
        } else {
            echo "nope";
        }
    }

    public function compracliente($num){
        @\session_start();
        $query = '';
        if (isset($_SESSION['usuario'])) {
            $query = "SELECT * FROM dtm_compras WHERE numeroventa='$num' AND usuario='".$_SESSION['usuario']."'";
        } else {
            $query = "SELECT * FROM dtm_compras WHERE numeroventa='$num'";
        }
        $res= $this->conexion->query($query);
        if ($row= mysqli_fetch_assoc($res)) {
            ?>
            <div class="row no-margin">
                <div class="col s12">
                    <h6 class="destacados-titulo"><i class="material-icons left">shopping_cart</i>Detalles de la compra con el código: <?php echo $_GET['id']; ?></h6>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="col s12 m4">
                        <h6><i class="material-icons small left">flight</i></h6>
                        <p>
                            <?php
                                if (!is_null($row['especificaciones']) && $row['especificaciones'] != '') {
                                    echo $row['especificaciones'];
                                } else {
                                    echo '<em>No se incluyó una descripción</em>';
                                }
                            ?>
                        </p>
                    </div>
                    <div class="col s12 m4">
                        <h6><i class="material-icons small left">mail</i></h6>
                        <p>
                            <?php echo $row['usuario']; ?>
                        </p>
                    </div>
                    <div class="col s12 m4">
                        <h6><i class="material-icons small left">attach_money</i></h6>
                        <p>
                            <?php echo $row['metodopago']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row no-margin">
                <div class="col s12">
                    <table class="striped highlight responsive-table" id="myTable5">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre de producto</th>
                                <th>Color</th>
                                <th>Cantidad comprada</th>
                                <th>Costo unitario</th>
                                <th>Total productos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $r=$this->conexion->query("SELECT * FROM dtm_productosv WHERE numeroventa_fk='".$row['numeroventa']."'");
                                while ($fila=mysqli_fetch_assoc($r)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $fila['cod_producto_fk'];?></td>
                                            <td><?php echo $fila['nombrep'];?></td>
                                            <td><?php echo ($fila['color']!=""?$fila['color']:"Sin color");?></td>
                                            <td><?php echo $fila['cantidad'];?></td>
                                            <td><?php echo number_format($fila['costou'],2,",",".");?></td>
                                            <td><?php echo number_format($fila['costo_total'],2,",",".");?></td>
                                        </tr>
                                    <?php 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col s12">
                        <h6 class="destacados-titulo"></h6>
                        <p>
                            <h6 class="right-align"><b>Total: <span style="color: #FF0000;"><?php echo number_format($row['total'],2,",",".")."\t".$row['moneda']; ?></span></b></h6>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 center">
                        <?php 
                            if ($row['pagado']==0) {  
                                ?>
                                <form method="post" action="compra.php" class="form-horizontal" onsubmit="return confirmation()" style="display: inline;">
                                    <input type="hidden" name="numeroventa" value="<?php echo $row['numeroventa']; ?>">
                                    <button class="btn-large btn-confirmar-accion waves-effect waves-light" type="submit" name="elimventa"><i class="material-icons right">keyboard_arrow_right</i>Cancelar compra</button>
                                </form>
                                <?php
                            } else {
                                ?>
                                    <button class="btn-large btn-confirmar-accion waves-effect waves-light disabled" type="submit" name="elimventa"><i class="material-icons right">keyboard_arrow_right</i>Cancelar compra</button>
                                <?php 
                            }
                        ?>
                        <?php 
                            if (isset($_GET['metodo']) && $_GET['metodo'] != 'Contraentrega') {
                                if (isset($_SESSION['usuario'])) {
                                    ?>
                                        <p>
                                            <b>Indicanos que ya pagaste tu pedido ingresando una referencia de pago:</b>
                                        </p>
                                        <form method='post' action='pagar.php' class='form-inline'>
                                            <input type='hidden' name='venta' value='<?php echo $row['numeroventa']; ?>'>
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">mode_edit</i>
                                                <input id="referencia" name="referencia" type="text" class="validate" required placeholder="Escribenos la referencia para confirmar tu pago">
                                                <label for="referencia">Referencia</label>
                                            </div>
                                            <div class="col s12 center">
                                                <button class="btn btn-media-accion waves-effect waves-light" type="submit" name="pagar"><i class="material-icons right">keyboard_arrow_right</i>Notificar pago</button>
                                            </div>
                                        </form>
                                    <?php
                                } else {
                                    ?>
                                        <a href="miscompras.php?correo=<?php echo urlencode($row['usuario']); ?>" class="btn-large btn-media-accion waves-effect waves-light"><i class="material-icons right">keyboard_arrow_right</i>Notificar pago</a>
                                    <?php 
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }else{
            ?>
            <script>
                location.href="compra.php";
            </script>
            <?php
        }
    }

    public function cancelarcompra($num){

        $res=$this->conexion->query("SELECT * FROM dtm_productosv WHERE numeroventa_fk='$num'");
        while ($fila=mysqli_fetch_assoc($res)) {

            $r=$this->conexion->query("SELECT stock FROM dtm_productos WHERE codigo='".$fila['cod_producto_fk']."' LIMIT 1");
            while ($f=mysqli_fetch_assoc($r)) {
                $nuevostock=$fila['cantidad']+$f['stock'];
            }

            if ($this->conexion->query("UPDATE dtm_productos SET stock='$nuevostock' WHERE codigo='".$fila['cod_producto_fk']."'")) {
                $this->conexion->query("DELETE FROM dtm_productosv WHERE cod_producto_fk='".$fila['cod_producto_fk']."' AND numeroventa_fk='".$fila['numeroventa_fk']."'");
            }
        }

        if ($this->conexion->query("DELETE FROM dtm_compras WHERE numeroventa='$num'")) {
            ?>
            <script>
                alert("Su compra a sido cancelada con exito, gracias por preferir Digital MTX");
                location.href="tienda.php";
            </script>
            <?php
        }
    }

    public function payu($id){
        $res=$this->conexion->query("SELECT * FROM dtm_compras WHERE numeroventa='$id' AND metodopago='Pago online PAYU' LIMIT 1");
        if ($row=mysqli_fetch_assoc($res)) {
            $apikey="2fkitbh2qkiggslj2j6458jsvc";
            $merchantid="518492";
            $referencecode=$row['numeroventa'];
            $amount=$row['total'];
            $currency=$row['moneda'];
            $signature=md5($apikey."~".$merchantid."~".$referencecode."~".$amount."~".$currency);
            ?>
            <center>
                <form action="https://gateway.payulatam.com/ppp-web-gateway" method="post" id="form_payu">
                     <input type="hidden" name="merchantId" value="518492">
                     <input type="hidden" name="ApiKey" value="2fkitbh2qkiggslj2j6458jsvc">
                     <input type="hidden" name="referenceCode" value="<?php echo $row['numeroventa']; ?>">
                     <input type="hidden" name="accountId" value="520002">
                     <input type="hidden" name="description" value="Compra Productos DigitalMTX">
                     <input type="hidden" name="amount" value="<?php echo $row['total']; ?>">
                     <input type="hidden" name="tax" value="0">
                     <input type="hidden" name="taxReturnBase" value="0">
                     <input type="hidden" name="currency" value="<?php echo $row['moneda']; ?>">
                     <input type="hidden" name="signature" value="<?php echo $signature; ?>">
                     <input type="hidden" name="test" value="0">
                     <input type="hidden" name="buyerEmail" value="<?php echo $row['usuario']; ?>">
                     <input type="hidden" name="paymentMethods" value="MASTERCARD,DINERS,CODENSA,VISA,AMEX"/>
                     <input type="submit" name="" value="Pagar con PayU" class="btn btn-success btn-lg pagar_payu"><!--Pagar con PayU-->
                 </form> 
            </center>

            <h1 class="text-center"><b>Como realizar el pago Online</b></h1>
            <br><br>
            <div class="col-sm-12">
                <p class="lead" align="center">
                   1) El primer paso a seguir es pulsando el boton <img src="img/pago/boton.png"> que se ubica en la parte superior.
                </p><br><br>
                <p class="lead" align="center">
                2) Luego de pulsar el boton te direccionaremos a esta pagina donde elijes tu medio de pago.</p><br>
                <center><img src="img/pago/medios.png" class="img-responsive"></center><br>
                <p class="lead" align="center">
                   3) Elijes tu medio de pago y aceptas los terminos de pago en PayU
                </p><br><br>
                <center><img src="img/pago/pagar.png" class="img-responsive"></center><br>
                <p class="lead" align="center">
                   4) PayU nos dara un <b>numero de pago o referencia de pago</b>
                </p><br><br>
                <center><img src="img/pago/referencia.png" class="img-responsive"></center><br>
                <p class="lead" align="center">
                   5) Luego ingresamos a <b>Mis Compras</b> o en el detalle de nuestra compra pulsamos el boton <img src="img/pago/botonnotificar.png">
                </p><br><br>
                <center><img src="img/pago/notificar.png" class="img-responsive"></center><br><br>
            </div>
            <?php
        }
    }

    public function wompi($id) {
        $res=$this->conexion->query("SELECT * FROM dtm_compras WHERE numeroventa='$id' AND metodopago='Pago online Wompi' LIMIT 1");
        if ($row=mysqli_fetch_assoc($res)) {
            $apikey="2fkitbh2qkiggslj2j6458jsvc";
            $merchantid="518492";
            $referencecode=$row['numeroventa'];
            $amount=$row['total'];
            $currency=$row['moneda'];
            $signature=md5($apikey."~".$merchantid."~".$referencecode."~".$amount."~".$currency);
            $row['total'] = str_replace('.', '', $row['total']);
            ?>
                <form action="https://checkout.wompi.co/p/" method="GET" id="wompi_form">
                    <!-- OBLIGATORIOS -->
                    <!--<input type="hidden" name="public-key" value="pub_test_LNLeSmUx1d5ZmfNxuas7YF359YKGmAo3" />-->
                    <input type="hidden" name="public-key" value="pub_prod_EvWB2GgrPbq7UrlWQB4cssmY98cvpxXs" />
                    <input type="hidden" name="currency" value="COP" />
                    <input type="hidden" name="amount-in-cents" value="<?php echo $row['total']; ?>" />
                    <input type="hidden" name="reference" value="<?php echo $row['numeroventa']; ?>" />
                    <!-- OPCIONALES -->
                    <input type="hidden" name="redirect-url" value="https://digitalmtx.com/miscompras.php" />
                    <button type="submit">Pagar con Wompi</button>
                </form>
            <?php
        }
    }

    public function wompi_recieved($a) {
        $res=$this->conexion->query("SELECT * FROM `dtm_compras` WHERE `referencia` = '$a'");
        if ($res->num_rows < 1) {
            $res=$this->conexion->query("UPDATE `dtm_compras` SET `referencia`='$a', `cpago`='1' order by id DESC limit 1");
        }
    }
    
    public function carrodisplay() {
        ?>
        <div class="row no-margin">
            <?php
            include 'carrocompra.php';
            $this->conn= new conexion();
            $con=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
            $con->set_charset("utf8");

            if (isset($_POST['id'])){
                $id=$_POST['id'];
                $cod=$_POST['codigo'];
                $nombre=$_POST['nombre'];
                $cant=$_POST['cantidad'];
                $stock=$_POST['stock'];
                settype($cant, "integer");
                $precio=$_POST['precio'];
                $articulo= ["id"=>$id, "cantidad"=>$cant , "precio"=>$precio ,"codigo"=>$cod,"nombre"=>$nombre];
            }

            $carro=new Carrito();
            if (!empty($articulo)) {
                $carro->add($articulo);
            }

            @\session_start();
            $carrito=isset($_SESSION["carrito"]['productos'])?$_SESSION["carrito"]['productos']:"";
            $totalized=0;
            if ($carrito) {
                ?>
                    <div class="row no-margin">
                        <div class="col s12">
                            <h6 class="destacados-titulo"><i class="material-icons left">shopping_bag</i>Tu pedido</h6>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="col s12">
                            <div class="col s12 m6">
                                <div class="row">
                                    <div class="col s12">
                                        <table class="striped highlight responsive-table">
                                            <thead>
                                            <tbody>
                                                <?php
                                                    $productos_pse = '';
                                                    foreach ($carrito as $producto) {
                                                        $productos_pse .= $producto['nombre'].', ';
                                                        $nombre_producto = str_replace(' ', '-', $producto['nombre']);
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?php
                                                                        $path = "productos/".$producto['id']."/";
                                                                        $directorio = dir($path);
                                                                        $archivo1 = scandir($path);
                                                                        for ($z=0; $z < count($archivo1); $z++) { 
                                                                            if ($archivo1[$z] != '.' && $archivo1[$z] != '..') {
                                                                                ?>
                                                                                    <a class="carousel-item"><img src="<?php echo $path.$archivo1[$z];?>" style="width: auto;max-height: 200px;margin: auto;max-width: 150px;"></a>
                                                                                <?php
                                                                                break;
                                                                            }
                                                                        }
                                                                        $directorio->close();
                                                                    ?>
                                                                </td>
                                                                <td class="titulo_producto">
                                                                    <form action='productos.php' method='get' id="actualizar_cantidad">
                                                                        <input type="hidden" name='id' value='<?php echo $nombre_producto; ?>'>
                                                                        <input type='hidden' name='add' value='<?php echo $producto['cantidad']; ?>'>
                                                                        <?php
                                                                            echo '<b>'.$producto['nombre'].'</b><br>Código: '.$producto['codigo'].'<br><br><b><span style="color: #DF0209;">'.number_format($producto['precio'],0,",",".").'$(COP)</span></b>';
                                                                        ?>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <div class="col s12 no-padding" style="margin-bottom: 10px;">
                                                                        <?php
                                                                            $consulta_producto_carrito = $con->query("SELECT * FROM `dtm_productos` WHERE `codigo` = '".$producto['codigo']."'");
                                                                            $datos_producto_carrito = array();
                                                                            if ($consulta_producto_carrito->num_rows > 0) {
                                                                                $row = $consulta_producto_carrito->fetch_assoc();
                                                                                array_push($datos_producto_carrito, $row);
                                                                            }
                                                                            if($datos_producto_carrito[0]['descuento']==0) {
                                                                                $total = $datos_producto_carrito[0]['precio'];
                                                                            } else {
                                                                                $total=((100-$datos_producto_carrito[0]['descuento'])*$datos_producto_carrito[0]['precio'])/100;
                                                                            }
                                                                        ?>
                                                                        <form method="post" action="addcart.php" class="form-horizontal">
                                                                            <input type="hidden" name="id" value='<?php echo $datos_producto_carrito[0]['id'];?>'>
                                                                            <input type="hidden" name="codigo" value='<?php echo $datos_producto_carrito[0]["codigo"];?>'>
                                                                            <input type="hidden" name="nombre" value='<?php echo $datos_producto_carrito[0]["nombre"];?>'>
                                                                            <input type="hidden" name="stock" value='<?php echo $datos_producto_carrito[0]["stock"];?>'>
                                                                            <input type="hidden" name="precio" value='<?php echo $total;?>'>
                                                                            <input name="cantidad" value="<?php echo $producto['cantidad']; ?>" style="background: #FFF;border: 1px solid #555;    border-radius: 6px 0px 0px 6px;height: 34px;text-align: center;width: 50px;transform: translateY(3px) translateX(4px);" type="number" min="1" max="<?php echo $datos_producto_carrito[0]["stock"];?>">
                                                                            <button class="col s6 btn btn-anadir-destacado waves-effect waves-light tooltipped hide" data-position="bottom" data-tooltip="Añadir al carrito" name="carro" href="productos.php?id=<?php echo $nombre_producto; ?>" type="submit">
                                                                                <i class="material-icons left">shopping_cart</i>Añadir
                                                                            </button>
                                                                            <button class="btn btn-confirmar-accion waves-effect waves-light tooltipped" data-position="right" data-tooltip="Modificar la cantidad" type="submit" name="carro"><i class="material-icons">loop</i></button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col s12 no-padding">
                                                                        <form action='elimprocar.php' method='post'>
                                                                            <input type='hidden' name='uniq' value='<?php echo $producto['unique_id'];?>'>
                                                                            <button type="submit" class="btn-small btn-flat btn-media-accion eliminar_producto waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="Eliminar producto del carro de compra" name="elim" style="background: transparent !important;color: #000;"><i class="material-icons left" style="color: #df0209;">cancel</i> Eliminar</button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20px !important;">
                                    <div class="col s12">
                                        <h6 class="destacados-titulo"><i class="material-icons left">mode_edit</i>Datos adicionales</h6>
                                    </div>
                                </div>
                                <div class="row no-margin">
                                    <div class="col s12">
                                        <?php
                                            if(isset($_SESSION['direccion'])) {
                                                ?>
                                                    <div class="col s12 m6">
                                                        <form class="form-inline" method="POST" action="cambiar_direccion_compra.php">
                                                            <div class="col s10 input-field inline">
                                                                <i class="material-icons prefix">location_on</i>
                                                                <input id="direccion" name="direccion" type="text" class="validate" required form="buy_form" readonly value="<?php echo $_SESSION['direccion']; ?>">
                                                                <label for="direccion">Dirección actual</label>
                                                            </div>
                                                            <button type="button" class="btn col s2 btn-media-accion cambiar_direccion waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Cambiar dirección de envío"><i class="material-icons">edit</i></button>
                                                            <button type="submit" class="btn btn-confirmar-accion cambiar_direccion_btn waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Cambiar dirección de envío" style="display: none;"><i class="material-icons left">loop</i>Cambiar dirección</button>
                                                        </form>
                                                    </div>
                                                <?php
                                            } else {
                                                ?>
                                                    <div class="col s6">
                                                        <div class="input-field">
                                                            <i class="material-icons prefix">location_on</i>
                                                            <input id="direccion" name="direccion" type="text" class="validate" required form="buy_form">
                                                            <label for="direccion">Dirección actual</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field">
                                                            <i class="material-icons prefix">location_city</i>
                                                            <input id="ciudad" name="ciudad" type="text" class="validate" required form="buy_form">
                                                            <label for="ciudad">Ciudad</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field">
                                                            <i class="material-icons prefix">email</i>
                                                            <?php
                                                                if (isset($_SESSION['usuario'])) {
                                                                    $correo = $_SESSION['usuario'];
                                                                } else {
                                                                    $correo = '';
                                                                }
                                                            ?>
                                                            <input id="correo" name="correo" type="email" class="validate" value="<?php echo $correo; ?>" required form="buy_form">
                                                            <label for="correo">Correo electrónico</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field">
                                                            <i class="material-icons prefix">phone</i>
                                                            <input id="telefono" name="telefono" type="number" min="0" class="validate" required form="buy_form">
                                                            <label for="telefono">Teléfono</label>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="col s12">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">mode_edit</i>
                                            <textarea id="textarea_observaciones" name="detalles" class="materialize-textarea observaciones_pedido validate" data-length="70" form="carrito"></textarea>
                                            <label for="textarea_observaciones">Escriba aqui observaciones o novedades sobre su pedido(opcional)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6" style="border-left: 2px solid #CCC;">
                                <div class="row">
                                    <div class="col s12 center">
                                        <h5><b>RESUMEN DEL PEDIDO</b></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <?php
                                            $cupon = '';
                                            $btn_cupon = '';
                                            if (isset($_POST['cupon'])) {
                                                $cupon = $_POST['cupon'];
                                                $btn_cupon = 'Modificar';
                                                //Validar cupón
                                                $result=$con->query("SELECT * FROM dtm_cupones WHERE `codigo` = '".$cupon."' ");
                                                if ($result->num_rows > 0) {
                                                    $array = array();
                                                    while($row = $result->fetch_assoc()) {
                                                        array_push($array, $row);
                                                    }
                                                    $limite = explode('/', $array[0]['fecha_limite']);
                                                    $nuevo_limite = '';
                                                    for ($i=2; $i >= 0; $i--) {
                                                        if ($i > 0) {
                                                            $nuevo_limite .= $limite[$i].'/';
                                                        } else {
                                                            $nuevo_limite .= $limite[$i];
                                                        }
                                                    }

                                                    if (date('Y/m/d') <= $nuevo_limite && $array[0]['usos'] > 0) {
                                                        //number_format($totalized,0,",",".")
                                                        $total = str_replace('.', '', $_SESSION['total']);
                                                        if ($total >= $array[0]['minimo']) {
                                                            ?>
                                                                <script>
                                                                    alert('Cupón aplicado con éxito');
                                                                </script>
                                                            <?php
                                                            $total_cupon = $total-$array[0]['valor'];
                                                            $total_cupon = number_format($total_cupon,0,",",".");
                                                            $_SESSION['descuento_cupon'] = number_format($array[0]['valor'],0,",",".");
                                                            $_SESSION['codigo'] = $array[0]['codigo'];
                                                        } else {
                                                            ?>
                                                                <script>
                                                                    alert('El valor total de los productos en el carro de compras no supera el valor mínimo del cupón ingresado.\nEl valor mínimo para usar este cupón debe ser: <?php echo number_format($array[0]["minimo"],0,",","."); ?>');
                                                                </script>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                            <script>
                                                                alert('El cupón ingresado se encuentra vencido o ya se agotó');
                                                            </script>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                        <script>
                                                            alert('El cupón ingresado no existe');
                                                        </script>
                                                    <?php
                                                }
                                            } else { 
                                                $btn_cupon = 'Aplicar';
                                            }
                                        ?>
                                        <form action="carrito.php" method="post" id="carrito">
                                            <div class="col s8 offset-s2 no-padding">
                                                <div class="input-field col s8 no-padding">
                                                    <input id="cupon" name="cupon" type="text" value="<?php echo $cupon; ?>" class="validate" required>
                                                    <label for="cupon">¿Tienes un cupón?</label>
                                                </div>
                                                <div class="col s4 no-padding">
                                                    <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="aplicardesc" style="margin-top: 20px;"><i class="material-icons right">keyboard_arrow_right</i><?php echo $btn_cupon; ?> cupón</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <?php
                                            $productos_pse = '';
                                            foreach ($carrito as $producto) {
                                                $productos_pse .= $producto['nombre'].', ';
                                                $nombre_producto = str_replace(' ', '-', $producto['nombre']);
                                                $total=($producto['cantidad']*$producto['precio']);
                                                $totalized=$total+$totalized;
                                                $res=$con->query("SELECT tasa FROM dtm_tasa WHERE id='1'");
                                                if($f=mysqli_fetch_assoc($res)){
                                                    $tasad=$f['tasa'];
                                                    $dolar=$totalized/$tasad;
                                                }
                                            }
                                        ?>
                                        <div class="col s8 offset-s2 no-padding" style="border-bottom: 2px solid #CCC;">
                                            <div class="col s6 no-padding">
                                                <p>
                                                    Subtotal(<?php echo count($carrito); ?>)
                                                </p>
                                            </div>
                                            <div class="col s6 no-padding">
                                                <p style="color: #DF0209;" class="center">
                                                    <b>
                                                        <?php
                                                            $_SESSION['total'] = number_format($totalized,0,",",".");
                                                            echo '<b>'.$_SESSION['total'].'$(COP)</b>';
                                                        ?>
                                                    </b>
                                                </p>
                                            </div>
                                        </div>
                                        <?php
                                            if (isset($total_cupon)) {
                                                ?>
                                                    <div class="col s8 offset-s2 no-padding" style="border-bottom: 2px solid #CCC;">
                                                        <div class="col s6 no-padding">
                                                            <p>
                                                                Descuento
                                                            </p>
                                                        </div>
                                                        <div class="col s6 no-padding">
                                                            <p style="color: #999;" class="center">
                                                                <b>
                                                                    <?php
                                                                        $_SESSION['total_cupon'] = str_replace('.', '', $total_cupon);
                                                                        echo '-'.number_format($array[0]['valor'],0,",",".").'$(COP)';
                                                                    ?>
                                                                </b>
                                                            </p>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                        <div class="col s8 offset-s2 no-padding" style="border-bottom: 2px solid #CCC;">
                                            <div class="col s6 no-padding">
                                                <p>
                                                    <b>Total</b>
                                                </p>
                                            </div>
                                            <div class="col s6 no-padding">
                                                <p style="color: #DF0209;" class="center">
                                                    <b>
                                                        <?php
                                                            if (isset($total_cupon)) {
                                                                $_SESSION['total_cupon'] = str_replace('.', '', $total_cupon);
                                                                echo '<b>'.$total_cupon.'$(COP)';
                                                            } else { 
                                                                $_SESSION['total'] = number_format($totalized,0,",",".");
                                                                echo '<b>'.$_SESSION['total'].'$(COP)</b>';
                                                            }
                                                        ?>
                                                    </b>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col s8 offset-s2 no-padding" style="border-bottom: 2px solid #CCC;">
                                            <div class="col s6 no-padding">
                                                <p>
                                                    <b>Total en dólares</b>
                                                </p>
                                            </div>
                                            <div class="col s6 no-padding">
                                                <p style="color: #DF0209;" class="center">
                                                    <b>
                                                        <?php
                                                            if (isset($total_cupon)) {
                                                                $total_dolar_cupon = str_replace('.', '', $total_cupon);
                                                                $total_dolar_cupon = $total_dolar_cupon/$tasad;
                                                                $_SESSION['total_cupon_dolar'] = $total_dolar_cupon;
                                                                echo '<b>'.number_format($total_dolar_cupon,2,",",".").'$(USD)';
                                                            } else { 
                                                                $_SESSION['total_dolares'] = number_format($dolar,2,",",".");
                                                                echo '<b>'.$_SESSION['total_dolares'].'$(USD)</b>';
                                                            }
                                                        ?>
                                                    </b>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-margin">
                                    <div class="col s12">
                                        <h5 class="center green-text"><b>FORMA DE PAGO</b></h5>
                                    </div>
                                </div>
                                <div class="row no-margin">
                                    <div class="col s12 m8 offset-m2">                            
                                        <?php
                                            $consulta_metodos = $con->query("SELECT * FROM dtm_metodos_pago");
                                            if ($consulta_metodos->num_rows > 0) {
                                                $metodos = array();
                                                while($row = $consulta_metodos->fetch_assoc()) {
                                                    array_push($metodos, $row);
                                                }
                                            }
                                            for ($i=0; $i < count($metodos); $i++) { 
                                                if ($i == 0 && $metodos[$i]['habilitado'] == 1) {
                                                    ?>
                                                        <p>
                                                            <label>
                                                                <input type="radio" id="transferencia" name="metodo" value="Transferencia" required form="buy_form" />
                                                                <span>Pagar con transferencia / Consignación personal</span>
                                                            </label>
                                                        </p>
                                                    <?php
                                                } elseif ($i == 1 && $metodos[$i]['habilitado'] == 1) {
                                                    ?>
                                                        <p>
                                                            <label>
                                                                <input type="radio" id="contraentrega" name="metodo" value="Contraentrega" required form="buy_form" />
                                                                <span>Pagar contraentrega (solo ciudades principales)</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <div class="col s12">
                                                                <div class="input-field col s12" id="ciudades_principales_wrapper" style="display: none;margin-left: 20px;margin-top: -10px;">
                                                                    <select id="ciudades_principales" class="browser-default">
                                                                        <option value="" disabled selected>Seleccione una ciudad</option>
                                                                        <option value="bogota">Bogotá</option>
                                                                        <option value="medellin">Medellin</option>
                                                                        <option value="cali">Cali</option>
                                                                        <option value="barranquilla">Barranquilla</option>
                                                                        <option value="cartagena">Cartagena de Indias</option>
                                                                        <option value="soacha">Soacha</option>
                                                                        <option value="cucuta">Cúcuta</option>
                                                                        <option value="soledad">Soledad</option>
                                                                        <option value="bucaramanga">Bucaramanga</option>
                                                                        <option value="bello">Bello</option>
                                                                        <option value="villavicencio">Villavicencio</option>
                                                                        <option value="ibague">Ibagué</option>
                                                                        <option value="santa">Santa</option>
                                                                        <option value="valledupar">Valledupar</option>
                                                                        <option value="manizales">Manizales</option>
                                                                        <option value="pereira">Pereira</option>
                                                                        <option value="monteria">Monteria</option>
                                                                        <option value="neiva">Neiva</option>
                                                                        <option value="pasto">Pasto</option>
                                                                        <option value="armenia">Armenia</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </p>
                                                    <?php
                                                } elseif ($i == 2 && $metodos[$i]['habilitado'] == 1) {
                                                    if ($totalized < 20000) {
                                                        ?>
                                                            <p style="margin-bottom: 40px;">
                                                                <label>
                                                                    <input type="radio" id="payu" name="metodo" value="Pago online Wompi" required disabled form="buy_form" />
                                                                    <span>Pagar mediante <img src="img/wompi.png" style="height: 5px;margin-right: 30px;margin-left: 30px;transform: scale(4) translateY(-1px);" alt="Pagar mediante Wompi" title="Pagar mediante Wompi"> Tarjeta de crédito</span>
                                                                    <div class="right-align" style="margin-top: -30px;">
                                                                        <img src="img/bancos.png" style="height: 5px;margin-left: 0px;transform: scale(6) translateX(-13px);" alt="Opciones para pagar mediante Wompi" title="Opciones para pagar mediante PayU">
                                                                    </div>
                                                                </label>
                                                            </p>
                                                        <?php
                                                    } else {
                                                        ?>
                                                            <p style="margin-bottom: 40px;">
                                                                <label>
                                                                    <input type="radio" id="payu" name="metodo" value="Pago online Wompi" required form="buy_form" />
                                                                    <span>Pagar mediante <img src="img/wompi.png" style="height: 5px;margin-right: 30px;margin-left: 30px;transform: scale(4) translateY(-1px);" alt="Pagar mediante Wompi" title="Pagar mediante Wompi"> usando tarjeta de crédito</span>
                                                                    <div class="right-align" style="margin-top: -30px;">
                                                                        <img src="img/bancos.png" style="height: 5px;margin-left: 0px;transform: scale(6) translateX(-13px);" alt="Opciones para pagar mediante Wompi" title="Opciones para pagar mediante PayU">
                                                                    </div>
                                                                </label>
                                                            </p>
                                                        <?php
                                                    }
                                                } elseif ($i == 3 && $metodos[$i]['habilitado'] == 1) {
                                                    if ($totalized < 20000) {
                                                        ?>
                                                            <p>
                                                                <label>
                                                                    <input type="radio" id="pse" name="metodo" value="Pago online PSE" required disabled form="buy_form" />
                                                                    <span>Pagar mediante <img src="img/pse/logo_pse_small.png" title="Pagar mediante PSE" style="opacity: 0.5;height: 15px;transform: scale(2.5) translateY(2px);;margin-right: 13px;margin-left: 13px;"> (tarjeta débito, Nequi, DaviPlata)</span>
                                                                </label>
                                                            </p>
                                                        <?php
                                                    } else {
                                                        ?>
                                                            <p>
                                                                <label>
                                                                    <input type="radio" id="pse" name="metodo" value="Pago online PSE" required form="buy_form" />
                                                                    <span>Pagar mediante <img src="img/pse/logo_pse_small.png" style="height: 15px;transform: scale(2.5) translateY(2px);;margin-right: 13px;margin-left: 13px;" title="Pagar mediante PSE"> (tarjeta débito, Nequi, DaviPlata)</span>
                                                                </label>
                                                            </p>
                                                        <?php
                                                    }
                                                }
                                            }
                                        ?>
                                            <?php
                                                if ($totalized < 20000) {
                                                    ?>
                                                        <p style="margin-top: 30px;">
                                                            <span style="font-style: italic;">*Para realizar una compra usando <img src="img/pse/logo_pse_small.png" alt="Pagar mediante PSE" title="Pagar mediante PSE" style="height: 20px;transform: scale(2) translateY(2px);;margin-right: 10px;margin-left: 10px;"> o <img src="img/wompi.png" style="height: 20px;margin-right: 10px;margin-left: 10px;transform: scale(1.2) translateY(5px);" alt="Pagar mediante Wompi" title="Pagar mediante Wompi"> es necesario que el total del pedido sea mayor o igual a 20.000$(COP)</span>
                                                        </p>
                                                    <?php
                                                }
                                            ?>
                                            <input type="hidden" name="total" value="<?php echo $totalized; ?>" form="buy_form">
                                            <input type="hidden" name="moneda" value="COP" form="buy_form">
                                            <input type="hidden" name="productos_pse" value="<?php echo $productos_pse; ?>" form="buy_form">
                                            <?php
                                                if (isset($_SESSION['cliente'])&&$_SESSION['cliente']==TRUE || 1 == 1) {
                                                    ?>
                                                        <div class="col s12 center boton_comprar">
                                                            <form method="post" action="compras.php" class="form-horizontal" id="buy_form">
                                                                <button class="btn-large btn-media-accion waves-effect waves-light" type="submit" name="comprar"><i class="material-icons right">keyboard_arrow_right</i>Comprar</button>
                                                            </form>
                                                        </div>
                                                    <?php 
                                                }else{
                                                    ?>
                                                    <div class="boton_comprar">
                                                        <center><a href='login.php' class='btn btn-lg btn-success'>Inicia sesión y Compra</a></center>
                                                    </div>
                                                    <?php
                                                }
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-------->
                <!--<br><br>
                <table class='table'>
                    <tr>
                        <th>Imagen</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio Unidad</th>
                        <th>Sub total</th>
                        <th>Accion</th>
                    </tr>-->
                <?php 
                /*foreach ($carrito as $producto){
                    ?>
                    <tr>
                        <td>
                        <?php 
                        $path="productos/".$producto['id']."/";
                        $directorio=dir($path);
                        while ($archivo = $directorio->read())
                        {
                            if($archivo!="." OR $archivo!="..")
                            if (strtolower(substr($archivo, -3) == "png"))
                            {
                                ?>
                                <img src='<?php echo $path.$archivo;?>' style="width: 70px;height: 70px;position: absolute">
                                <?php
                            }
                        }

                        $directorio->close();
                        ?>
                        </td>
                        <td><?php echo $producto['codigo'];?></td>
                        <td><?php echo $producto['nombre'];?></td>

                        <?php
                        $res=$con->query("SELECT stock FROM dtm_productos WHERE codigo='".$producto['codigo']."'"); 
                        if($row= mysqli_fetch_assoc($res)){
                            if ($producto['cantidad']>$row['stock']) {
                                ?>
                                <td><font color='red'><b>stock no disponible</b></font></td>
                                <?php 
                                if ($row['stock']<=0) {
                                    ?>
                                    <script>
                                        alert("El producto <?php $producto['nombre'] ?> se a quedado sin stock por lo cual sera eliminado de su carro de compra, gracias por preferir Digital MTX");
                                    </script>
                                    <?php
                                    $carro->remove_producto($producto['unique_id']);
                                    ?>
                                    <script>
                                        location.href="carrito.php";
                                    </script>
                                    <?php
                                }                        
                            }else{
                                ?>
                                <td><?php echo $producto['cantidad'];?></td>
                                <?php 
                            }
                        }

                        $total=($producto['cantidad']*$producto['precio']);
                        ?>
                        <td><?php echo number_format($producto['precio'],0,",",".");?>$(COP)</td>.
                        <td><?php echo number_format($total,0,",",".");?>$(COP)</td>
                        <td>
                            <center>
                                <form action='productos.php' method='get'>
                                    <input type='hidden' name='id' value='<?php echo $producto['id'];?>'>
                                    <input type='hidden' name='add' value='<?php echo $producto['cantidad'];?>'>
                                    <button type='submit' class='btn btn-primary btn-sm' style='margin-bottom:2px;'>Modificar cantidad</button>
                                </form>
                                <form action='elimprocar.php' method='post'>
                                    <input type='hidden' name='uniq' value='<?php echo $producto['unique_id'];?>'>
                                    <button type='submit' name='elim' class='btn-danger btn btn-sm'>Eliminar</button>
                                </form> 
                            </center> 
                        </td>
                    </tr>
                    <?php 
                    $totalized=$total+$totalized;
                          
                }
   
                //$iva=($totalized*0.19);
                //$sub=($totalized*0.89); 
                
                $res=$con->query("SELECT tasa FROM dtm_tasa WHERE id='1'");
                if($f=mysqli_fetch_assoc($res)){
                  $tasad=$f['tasa'];
                  $dolar=$totalized/$tasad;
                }
                ?>
                </table>
                <br>
                <div class='row'>
                    <div class='col-sm-12'>
                        <p class='pull-right lead'>Total: <?php echo number_format($totalized,0,",",".");?>$(COP)
                            <br>
                            Total en dolares: <?php echo number_format($dolar,2,",",".");?>$(USD) 
                        </p> 
                    </div> 
                </div>
                <?php 
            }

            if ($totalized==0) {
                ?>
                    <h1 class='text-center'>Tu carro de compras esta vacio <i class='fa fa-cart-plus' style='font-size: 50px; color:#F78181;'></i></h1>
                    <br><br>
                    <center><a href='tienda.php' class='btn btn-primary btn-lg'>Ir a la Tienda   <i class='fa fa-shopping-bag'></i></a></center>

                    <div style="height: 20px;width: 100%"></div> 
            </div>

            <?php
            }else{
                ?>

            </div>

                <script>
                    setInterval(function() {
                        $("#micarro").load(location.href+" #micarro>*","");
                    }, 1000); 
                </script>
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <ul class="nav nav-tabs">
                                <li style="width: 100%;"><a data-toggle="tab" href="#COP" class="btn btn-lg btn-block"><b style="color: #DBA901">Pagar en</b><b style="color: blue"> Pesos </b><b style="color: red">Colombianos</b>  <i class="fa fa-money" style="font-size: 25px;color: #623057"></i></a></li>
                            </ul>
                            <div class="tab-content">

                                <div id="COP" class="tab-pane fade">
                                 
                                    <br>

                                    <form method="post" action="compras.php" class="form-horizontal">
                                        <textarea maxlength="70" required name="detalles" id="textarea_observaciones" class="form-control btn-md" rows="4" placeholder="Escriba aqui observaciones o novedades sobre su pedido(Máximo 70 caracteres)"></textarea>
                                        <div id="restantes" style="float: right;">
                                            Quedan <span>70</span> caracteres
                                        </div>

                                        <br>

                                        <fieldset>
                                            <legend>Elije un metodo de pago...</legend>
                                            <label>
                                                <input type="radio" name="metodo" value="Transferencia" required> Transferencia - consignacion (personal)
                                            </label>
                                            <br>
                                            <label>
                                                <input type="radio" name="metodo" value="Pago online PSE" required> <img src="img/pse/logo_pse_small.png">Pagar Online PSE
                                            </label>
                                        </fieldset>
                                        <br>

                                        <input type="hidden" name="total" value="<?php echo $totalized; ?>">
                                        <input type="hidden" name="moneda" value="COP">
                                        <?php
                                        if (isset($_SESSION['cliente'])&&$_SESSION['cliente']==TRUE) {
                                            ?>
                                            <center><input class='btn btn-primary btn-md' name='comprar' value='Realizar compra' type='submit'></center>
                                            <?php 
                                        }else{
                                            ?>
                                            <center><a href='login.php' class='btn btn-md btn-primary'>Inicia sesión y Compra</a></center>
                                            <?php
                                        }*/
                                        ?>
                                    <!--</form>

                                </div>

                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <?php

        }
    }

    public function compras() {

        @\session_start();

        $autorizo=0;
        
        $this->conn= new conexion();
        $con=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if (mysqli_errno($con)) {
            echo "Error de conexión";
        }
        $con->set_charset("utf8");

        $numeroventa=0;

        //capturamos el ultimo numero de venta para saber cual vamos a asignar
        $res=$con->query("SELECT * FROM dtm_compras ORDER BY numeroventa DESC LIMIT 1");
        while ($f= mysqli_fetch_array($res)) {
            $numeroventa=$f['numeroventa'];
        }
        if ($numeroventa==0) {
            $numeroventa=1;
        }else{
            $numeroventa=$numeroventa+1;
        }

        $error=0;
        if (isset($_POST['metodo'])&&$_POST['metodo']=="Pago online PSE") {
            
            //$url = "https://200.1.124.65/PSEHostingWebServices/PSEHostingWS.asmx?wsdl";
            $url = "https://200.1.124.118/PSEHostingWebServices/PSEHostingWS.asmx?wsdl";

            $total=0;
            foreach ($_SESSION['carrito']['productos'] as $producto) {
                $stotal=($producto['cantidad']*$producto['precio']);
                $total=$stotal+$total;
            }

            $iva=0; //$iva=($total*0.19);
            if (isset($_SESSION['total_cupon'])) {
                $sub = $_SESSION['total_cupon'];
            } else {
                $sub=($total); //$sub= ($total*0.89); 
            }

            foreach ($_SESSION['carrito']['productos'] as $sacartotal){
                
                //retorna cantidad que hay en el stock de ese producto
                $res=$con->query("SELECT stock FROM dtm_productos WHERE codigo='".$sacartotal['codigo']."' LIMIT 1");
                
                $stock=0;
                $nuevostock=0;
                if($row= mysqli_fetch_assoc($res)){
                    $stock=$row['stock'];
                    $nuevostock=($stock-$sacartotal['cantidad']);
                    if ($sacartotal['cantidad']>$row['stock']) {
                        $sacartotal['cantidad']=$row['stock'];
                    }
                }

                if ($nuevostock<'0') {
                    $error=1;
                    ?>        
                    <script>
                        alert("El producto <?php echo $sacartotal['nombre']; ?> ya no posee el stock requerido parece que otra persona compro el producto antes");
                    </script>
                    <?php
                }

            }

            if ($error!=1) {

                //if(isset($_POST['direccion'])&&$_POST['direccion']!=""){

                    //$con->query("UPDATE `dtm_user` SET `direccion`='".$_POST['direccion']."' WHERE id =".$_SESSION['id']);

                    //if(){

                    //}else{

                    //}
                //}
                try {

                    self::insersion_compra($error, $numeroventa);

                    $options = [
                        'cache_wsdl'     => 0,
                        'trace'          => 1,
                        'stream_context' => stream_context_create(
                            [
                                'ssl' => [
                                    'verify_peer'       => false,
                                    'verify_peer_name'  => false,
                                    'allow_self_signed' => true
                                ]
                            ]
                        )
                    ];


                    $documento_pse = '';
                    if (isset($_SESSION['identificacion'])) {
                        $documento=explode(" ",$_SESSION['identificacion']);

                        if ($documento[0] == "C.C") {
                            $documento[0] = "Cédula";
                        } elseif($documento[0] = "NIT") {
                            $documento[0] = "NIT";
                        }
                        $documento_pse = $_SESSION['identificacion'];
                    } else {
                        $documento_pse = 'Sin documento';
                    }

                    $nombre_pse = '';
                    $apellido_pse = '';
                    if (isset($_SESSION['nombre1']) && isset($_SESSION['apellido'])) {
                        $nombre_pse = $_SESSION['nombre1'];
                        $apellido_pse = $_SESSION['apellido'];
                    } else { 
                        $nombre_pse = 'Sin';
                        $apellido_pse = 'Nombre';
                    }

                    $correo_pse = '';
                    if (isset($_SESSION['usuario'])) {
                        $correo_pse = $_SESSION['usuario'];
                    } else {
                        $correo_pse = $_POST['correo'];
                    }
                    

                    $client = new SoapClient($url, $options);

                    $productos_pse = rtrim($_POST['productos_pse'], ", ");

                    $datos = array(
                        "ticketOfficeID" =>8141 /*2461*/,
                        "amount" => $sub,
                        "vatAmount" => $iva,
                        "paymentID" => $numeroventa,
                        "paymentDescription" => "'".$productos_pse."'",
                        "referenceNumber1" => "'".$_SERVER['REMOTE_ADDR']."'",
                        "referenceNumber2" => "'".$documento_pse."'",
                        "referenceNumber3" => "'".$nombre_pse.' '.$apellido_pse."'",
                        "serviceCode" => "1001",
                        "email" => "'".$correo_pse."'",
                        "entity_url" => "https://www.digitalmtx.com/miscompras.php"
                    );

                    //Respuesta de la creacion de la transaccion
                    $result = $client->createTransactionPaymentHosting($datos);
                    //Recogiendo PaymentIdentifier que es el cogigo que devuelve segun la compra
                    $paymentID = $result->createTransactionPaymentHostingResult->PaymentIdentifier;

                    if (isset($paymentID)) {
                        //header("Location: https://200.1.124.62/PSEHostingUI/GetBankListWS.aspx?enc=".$paymentID);
                        session_regenerate_id(true);
                        session_write_close();
                        header("Location: https://www.psepagos.co/PSEHostingUI/GetBankListWS.aspx?enc=".$paymentID);
                        exit();
                    }else{
                        ?>
                        <script type="text/javascript">
                            alert("No se pudo realizar tu compra, pero ya esta en compra pendientes por si deseas hacer el pago o cancelar el producto");
                        </script>
                        <?php
                        header("Location: https://200.1.124.62/tienda.php");
                    }

                }catch(Exception $e) {
                    die("No se pudo crear la transacción, por favor intente más tarde o comuníquese con nuestras líneas de atención al cliente al teléfono (031)552 2190, o a los correos electronicos Ventasnacionales@digitalmtx.com y info@digitalmtx.com");
                    //.$e->getMessage()
                }

                

            }else{
                ?>
                <script type="text/javascript">
                    alert("No se pudo realizar tu compra");
                </script>
                <?php
            }


        }else{

            foreach ($_SESSION['carrito']['productos'] as $sacartotal){
                
                //retorna cantidad que hay en el stock de ese producto
                $res=$con->query("SELECT stock FROM dtm_productos WHERE codigo='".$sacartotal['codigo']."' LIMIT 1");
                
                $stock=0;
                $nuevostock=0;
                if($row= mysqli_fetch_assoc($res)){
                    $stock=$row['stock'];
                    $nuevostock=($stock-$sacartotal['cantidad']);
                    if ($sacartotal['cantidad']>$row['stock']) {
                        $sacartotal['cantidad']=$row['stock'];
                    }
                }

                if ($nuevostock<'0') {
                    $error=1;
                    ?>        
                    <script>
                        alert("El producto <?php echo $sacartotal['nombre']; ?> ya no posee el stock requerido parece que otra persona compro el producto antes");
                    </script>
                    <?php
                }

            }

            if ($error!=1) {
                self::insersion_compra($error, $numeroventa);
            }else{
                ?>
                <script type="text/javascript">
                    alert("No se pudo realizar tu compra");
                </script>
                <?php
            }
            
        }
             
    }

    public function insersion_compra($error, $numeroventa) {
        
        @\session_start();

        $this->conn= new conexion();
        $con=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if (mysqli_errno($con)) {
            echo "Error de coneccion";
        }
        $con->set_charset("utf8");

        $metodopago=$_POST['metodo'];
        $especificaciones=$_POST['detalles'];
        $moneda=$_POST['moneda'];
        $fecha= date("Y-m-d");
        $referencia="";
        $cpago=0;
        
        $total=$_SESSION['carrito']['todo']['precio_total'];

        if ($total<=0|| $error==1) {
            ?>
            <script type="text/javascript">
                alert("Tus Productos se quedaron sin stock al parecer alguien mas los compro antes");
                location.href="carrito.php";
            </script>
            <?php
        }else{

            $compras=$con->query("SELECT * FROM `dtm_compras`");
            $mayor=0;
            while ($f= mysqli_fetch_array($compras)) {
                if ($f[0]>$mayor) {
                    $mayor=$f[0];
                }
            }
            $mayor=$mayor+1;

            $tablas="";
            $valores="";

            $correo = '';
            $nombre = '';
            $identificacion = '';

            if (isset($_SESSION['usuario'])) {
                $correo = $_SESSION['usuario'];
            } else { 
                $correo = $_POST['correo'];
            }

            if (isset($_SESSION['nombre'])) {
                $nombre = $_SESSION['nombre'];
            } else { 
                $nombre = 'Sin nombre';
            }

            if (isset($_SESSION['identificacion'])) {
                $identificacion = $_SESSION['identificacion'];
            } else { 
                $identificacion = 'Sin identificación';
            }

            $cupon_usado = 0;

            if (isset($_SESSION['descuento_cupon'])) {
                $especificaciones = $especificaciones.' - <b>Se aplicó un descuento de: '.$_SESSION['descuento_cupon'].' $(COP)</b>';
                $result = $con->query("SELECT * FROM `dtm_cupones` WHERE `codigo` = '".$_SESSION['codigo']."'");
                if ($result->num_rows > 0) {
                    $array = array();
                    while($row = $result->fetch_assoc()) {
                        array_push($array, $row);
                    }

                    $cupon_usado = 0;
                    $usuarios = explode(',', $array[0]['usuarios']);

                    for ($i=0; $i < count($usuarios); $i++) { 
                        if ($_POST['correo'] == $usuarios[$i]) { //El usuario ya había usado este cupón
                            $cupon_usado = 1;
                        }
                    }

                    if ($cupon_usado == 0) { //El usuario no había usado este cupón
                        $usos_restantes = $array[0]['usos']-1;
                        $con->query("UPDATE `dtm_cupones` SET  `usos`= '".$usos_restantes."' WHERE `codigo` = '".$_SESSION['codigo']."'");
                        $usuarios_usados = $array[0]['usuarios'].','.$_POST['correo'];
                        $con->query("UPDATE `dtm_cupones` SET  `usuarios`= '".$usuarios_usados."' WHERE `codigo` = '".$_SESSION['codigo']."'");
                    }
                }
            }

            if (!isset($_SESSION['usuario'])) {
                $especificaciones = $especificaciones.' - <b>La dirección colocada es: '.$_POST['direccion'].'</b>'.' - <b>La ciudad colocada es: '.$_POST['ciudad'].'</b>'.' - <b>El correo colocado es: '.$_POST['correo'].'</b>'.' - <b>El teléfono colocado es: '.$_POST['telefono'].'</b>';
            }

            if ($cupon_usado == 0) {
                if ($moneda=='COP') {
                    $tablas="id,numeroventa,referencia, usuario, nombre, identificacion, total, moneda,metodopago,especificaciones,fecha,cpago,pagado,aprobador,facturado,num_factura,facturador,despachado,despachador,datos";
                    if (isset($_SESSION['total_cupon'])) {
                        $total = $_SESSION['total_cupon'];
                    }
                    $valores="$mayor,'$numeroventa','$referencia','".$correo."','".$nombre."','".$identificacion."','$total','$moneda','$metodopago','$especificaciones','$fecha','$cpago','0','','0','','','0','',''";
                }elseif ($moneda=='USD'){
                    $dolar=$_POST['total'];
                    $tablas="id,numeroventa,referencia, usuario, nombre, identificacion, total, moneda,metodopago,especificaciones,fecha,cpago,pagado,aprobador,facturado,num_factura,facturador,despachado,despachador,datos";
                    if (isset($_SESSION['total_cupon_dolar'])) {
                        $dolar = $_SESSION['total_cupon_dolar'];
                    }
                    $valores="$mayor,'$numeroventa','$referencia','".$correo."','".$nombre."','".$identificacion."','$dolar','$moneda','$metodopago','$especificaciones','$fecha','$cpago','0','','0','','','0','',''";
                }

                if ($con->query("INSERT INTO dtm_compras (".$tablas.") VALUES (".$valores.")")) {
                    
                    foreach($_SESSION['carrito']['productos'] as $arreglo){

                        $producto=$con->query("SELECT * FROM dtm_productosv");
                        $mayor2=0;
                        while ($f= mysqli_fetch_array($producto)) {
                            if ($f[0]>$mayor2) {
                                $mayor2=$f[0];
                            }
                        }
                        $mayor2=$mayor2+1;

                        $stock2=0;
                        $nuevostock2=0;

                        $resultv=$con->query("SELECT stock FROM dtm_productos WHERE codigo='".$arreglo['codigo']."'");
                        if ($f= mysqli_fetch_array($resultv)) {
                            $stock2=$f['stock'];
                        }

                        $nuevostock2=($stock2-$arreglo['cantidad']);

                        if($arreglo['nombre']!=NULL){

                            $valores="id,numeroventa_fk,id_fk,nombrep,cod_producto_fk,cantidad,costou,costo_total";
                            if (isset($arreglo['color'])) {
                                $valores="id,numeroventa_fk,id_fk,nombrep,cod_producto_fk,cantidad,costou,costo_total,color";
                            }
                            
                            $qryi="INSERT INTO dtm_productosv (".$valores.") VALUES ($mayor2,'$numeroventa',"
                            . "'".$arreglo['id']."',"
                            . "'".$arreglo['nombre']."',"
                            . "'".$arreglo['codigo']."',"
                            . "'".$arreglo['cantidad']."',"
                            . "'".$arreglo['precio']."',"
                            . "'".$arreglo['total'];

                            $qryi.=isset($arreglo['color'])?"',"."'".$arreglo['color']."')":"')";

                            $con->query($qryi);
                        }

                        $con->query("UPDATE dtm_productos SET stock='$nuevostock2' WHERE codigo='".$arreglo['codigo']."'"); 
                    }
                        
                    unset($_SESSION["carrito"]);
                    if ($_POST['metodo'] != 'Pago online Wompi' && $_POST['metodo'] != 'Pago online PSE') {
                        ?>
                            <script>
                                alert("Compra realizada");
                            </script>           
                        <?php
                    }
                } else {
                    ?>
                    <script type="text/javascript">
                        alert("No se pudo realizar tu compra");
                    </script>
                    <?php
                }
            } else {
                ?>
                    <script>
                        alert('Ya has usado el cupón ingresado previamente');
                    </script>
                <?php
            }
        }

        if ($cupon_usado == 0) {
            if(isset($_POST['metodo'])&&$_POST['metodo']=="Contraentrega") {
                $con->query("UPDATE dtm_compras SET cpago='1', referencia='PCE' WHERE numeroventa = $numeroventa");
            }

            if ($_POST['metodo']=='Transferencia'||$_POST['metodo']=='Pago online'||$_POST['metodo']=='Contraentrega' || $_POST['metodo'] == 'Pago online Wompi') {
                if (isset($_SESSION['usuario'])) {
                    ?>
                        <script>
                            location.href="compra.php?id=<?php echo $numeroventa; ?>&metodo=<?php echo $_POST['metodo']; ?>";  
                        </script>
                    <?php
                } else {
                    ?>
                        <script>
                            location.href="compra.php?id=<?php echo $numeroventa; ?>&metodo=<?php echo $_POST['metodo']; ?>&correo=<?php echo urlencode($_POST['correo']); ?>";  
                        </script>
                    <?php
                }
            }elseif(!isset($_SESSION)){
                ?>
                <script type="text/javascript">
                    location.href="login.php";
                </script>
                <?php
            }
        } else {
            ?>
                <script>
                    window.location.href = 'carrito.php';
                </script>
            <?php
        }

        

    }

    public function cambiar_direccion_compra() {
        $this->conn= new conexion();
        $con=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if (mysqli_errno($con)) {
            echo "Error de coneccion";
        }
        $con->set_charset("utf8");

        @\session_start();

        $result=$con->query("UPDATE `dtm_user` SET `direccion` = '".$_POST['direccion']."' WHERE `id` = '".$_SESSION['id']."' ");

        if ($result === true) {
            $_SESSION['direccion'] = $_POST['direccion'];
            header('Location: carrito.php');
        } else {
            ?>
                <script>
                    alert('No se ha podido actualizar la dirección de envío, intentelo de nuevo');
                    window.location = "carrito.php";
                </script>
            <?php
        }
    }

    public function buscar_productos() {
        $this->conn= new conexion();
        $con=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if (mysqli_errno($con)) {
            echo "Error de conexión con la base de datos - No se puede obtener el listado de los productos";
        }
        $con->set_charset("utf8");

        //$result=$con->query("SELECT `nombre`, `codigo`, `campatibilidad` FROM `dtm_productos`");
        $result=$con->query("SELECT `nombre`, `codigo`, `campatibilidad`,`estado`  FROM `dtm_productos` WHERE `estado` ='4' AND (`nombre` LIKE '%".$buscar."%' OR `codigo` LIKE '%".$buscar."%' OR `campatibilidad` LIKE '%".$buscar."%') ORDER BY `id` DESC LIMIT 25");

        if ($result->num_rows > 0) {
            //$array = array();
            $productos = '';
            while($row = $result->fetch_assoc()) {
                //Se agrega el nombre del producto y el código
                /*$array[$row['nombre'].' - Cod:'.$row['codigo']] = null;
                //Se revisa si tiene compatibilidad para agregarla también por separado
                if (!is_null($row['campatibilidad'])) {
                    $compatibles = explode(',', $row['campatibilidad']);
                    for ($i=0; $i < count($compatibles); $i++) { 
                        $array[$compatibles[$i]] = null;
                    }
                }*/
                $productos .= $row['nombre'].' - Cod:'.$row['codigo'].",";
                if (!is_null($row['campatibilidad'])) {
                    $compatibles = explode(',', $row['campatibilidad']);
                    for ($i=0; $i < count($compatibles); $i++) { 
                        $productos .= "'".$compatibles[$i]."', ";
                    }
                }
            }
            //echo json_encode($array);
            echo $productos;
        } else {
            echo 0;
        }
    }

    public function buscar_productos_b() {
        $this->conn= new conexion();
        $con=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        $con->set_charset("utf8");

        $buscar = '';
        if ($_POST['buscar'][strlen($_POST['buscar'])-1] == ' ') {
            $buscar = rtrim($_POST['buscar'], " ");
        } else {
            $buscar = $_POST['buscar'];
        }
        
        $query = "SELECT `nombre`, `codigo`, `campatibilidad`,`estado`  FROM `dtm_productos` WHERE `estado` ='4' AND (`nombre` LIKE '%".$buscar."%' OR `codigo` LIKE '%".$buscar."%' OR `campatibilidad` LIKE '%".$buscar."%') ORDER BY `id` DESC LIMIT 50";

        $result=$con->query($query);

        $array = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($array, $row);
            }
            for ($i=0; $i < count($array); $i++) { 
                $nombre=$array[$i]['nombre'];
                $nombre_producto = str_replace("-","*",$nombre);
                $nombre_producto = str_replace(" ","-",$nombre_producto);
                $nombre_producto = urlencode($nombre_producto);

                ?>
                    <a href="productos.php?id=<?php echo $nombre_producto;
                     ?>"><li class="collection-item"><?php echo $array[$i]['nombre']; ?></li></a>
                <?php
            }
        } else {
            echo 0;
        }
    }

    public function info_nosotros() {
        $res= $this->conexion->query("SELECT `quienes_somos`, `mision`, `vision`, `valores` FROM dtm_nosotros where `id` = 1");
        $array = array();
        while ($row= mysqli_fetch_assoc($res)){
            array_push($array, $row);
        }
        ?>
            <div class="row no-margin">
                <div class="row">
                    <div class="col s12 sucursales-wrapper">
                        <?php
                            echo $array[0]['quienes_somos'];
                        ?>
                    </div>
                </div>
            </div>
            <div class="row no-margin">
                <div class="col s12 m6">
                    <div class="row no-margin">
                        <div class="col s12 destacados-titulo-wrapper center">
                            <i class="material-icons small">done_all</i>
                            <h4 class="destacados-titulo">Nuestra misión</h4>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="row no-margin">
                            <div class="col s12 sucursales-wrapper mision">
                                <div class="col s12">
                                    <?php
                                        echo $array[0]['mision'];
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="row no-margin">
                        <div class="col s12 destacados-titulo-wrapper center">
                            <i class="material-icons small">event</i>
                            <h4 class="destacados-titulo">Nuestra visión</h4>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="row no-margin">
                            <div class="col s12 sucursales-wrapper vision">
                                <div class="col s12">
                                    <?php
                                        echo $array[0]['vision'];
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-margin">
                <div class="col s12 destacados-titulo-wrapper center">
                    <i class="material-icons small">favorite</i>
                    <h4 class="destacados-titulo">Nuestros valores</h4>
                </div>
            </div>
            <div class="row no-margin">
                <div class="row no-margin">
                    <div class="col s12 sucursales-wrapper">
                        <?php
                            echo $array[0]['valores'];
                        ?>
                    </div>
                </div>
            </div>
        <?php
    }
     
    /*
     * Funcion que libera el cache de la coneccion a la base de datos
     *          
    */
  
   
}