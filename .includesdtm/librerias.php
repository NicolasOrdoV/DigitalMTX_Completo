<?php
/*ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);*/
/**
  * @author Reinaldo Emilio Pastran Jerez
  * @author Edwin Velasquez Jimenez
  * @author Diego Rodríguez Veloza <@rodvel2910>
  */

include_once '.includesdtm/conexion.php';

class librerias
{

    public function __construct() {
    
        $this->conn= new conexion();
        //$this->conexion=new mysqli("localhost", "digitalmtx_dmtx", "Clave","digitalmtx_dtmmtx");
        $this->conexion=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if(mysqli_errno($this->conexion)){
            echo "Error al conectar con la base de datos";
        }
        $this->conexion->set_charset("utf8");
    }

    public function btn_wa() {
        ?>
            <a class="btn-wa waves-effect waves-light tooltipped" data-position="right" data-tooltip="Ahora puedes comprar por Whatsapp"><div class="col s12 center no-padding"><i class="socicon-whatsapp small"></i></div></a>
            <script>
                function btn_whatsapp(producto, codigo) {
                    if (producto == 0) {
                        window.open("https://api.whatsapp.com/send?phone=573153497488&text=Quiero comprar un producto que ví en su página web");
                    } else {
                        window.open("https://api.whatsapp.com/send?phone=573153497488&text=Quiero comprar el siguiente producto: "+producto+" con el código: "+codigo+" que ví en su página web");
                    }
                }
                $('.btn-wa').click(function() {
                    btn_whatsapp(0);
                });
                $('.btn-wa-product').click(function() {
                    var producto = $('.nombre-product').html();
                    var codigo = $('.codigo-product').html();
                    btn_whatsapp(producto, codigo);
                });
            </script>
        <?php
    }

    public function facebookR(){
        ?>
        <!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '417068816323778');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=417068816323778&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<?php
    }

    public function btn_carrito() {
        $total = 0;
        $contador_productos = 0;
        @\session_start();
        if (isset($_SESSION['carrito']['productos'])) {
            foreach ($_SESSION['carrito']['productos'] as $producto) {
                $contador_productos++;
                $stotal=($producto['cantidad']*$producto['precio']);
                $total=$stotal+$total;
            }
        }
        if ($total != 0) {
            ?>
                <div class="contador-productos"><?php echo $contador_productos; ?></div>
                <a class="btn-carrito waves-effect waves-light tooltipped" href="carrito.php" data-position="left" data-tooltip="Ver el carrito<br>Total: <?php echo number_format($total,0,",",".")."$(COP)"; ?>"><div class="col s12 center"><i class="material-icons small">shopping_cart</i></div></a>
            <?php
        } else {
            ?>
                <a class="btn-carrito waves-effect waves-light tooltipped" href="tienda.php" data-position="left" data-tooltip="Ir a la tienda"><div class="col s12 center"><i class="material-icons small">store</i></div></a>
            <?php
        }
    }

    public function btn_te_llamamos() {
        ?>
            <a class="btn-te-llamamos waves-effect waves-light tooltipped modal-trigger" href="#modal_te_llamamos" data-position="right" data-tooltip="¿Te llamamos?"><div class="col s12 center"><i class="material-icons small">phone</i></div></a>
            <div id="modal_te_llamamos" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <div class="row">
                        <div class="col s12 titulo-modal-te-llamamos">
                            <h4>Quieres que te llamemos?</h4>
                        </div>
                        <div class="col s12 texto-modal-te-llamamos">
                            <div class="input-field col s6">
                                <input id="nombre" type="text" class="validate">
                                <label for="nombre">Nombre completo</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="celular" type="number" class="validate">
                                <label for="celular">Celular</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="correo" type="email" class="validate">
                                <label for="correo">Correo</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="mensaje" type="text" class="validate">
                                <label for="mensaje">Mensaje</label>
                            </div>
                            <div class="col s12">
                                <div class="g-recaptcha" data-sitekey="6Lcyry4UAAAAAF0evGdXbSr5yR5y4khwyfAn7G-_"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="waves-effect waves-light btn-flat btn-te-llamamos-modal white-text left" id="btn_llamenos"><i class="material-icons left">send</i>Enviar mensaje</button>
                    <a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
                </div>
            </div>
        <?php
    }

    public function gtm_head() {
        ?>
            <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-PHQNX5F');</script>
            <!-- End Google Tag Manager -->
        <?php
    }

    public function gtm_body() {
        ?>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PHQNX5F" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
        <?php
    }

    public function cliengo() {
        ?>
            <!-- Código de instalación Cliengo para http://www.digitalmtx.com -->
            <script type="text/javascript" src="//app.b2chat.io/live/b2chat-min.js"></script>
<script>_jq(window).bind("load", function() {B2Chat.init('46e0f6d4-df5f-458f-858a-73e3752197bd');});</script>
        <?php
    }

    public function hotjar() {
        ?>
            <!-- Hotjar Tracking Code for www.digitalmtx.com -->
            <script>
                (function(h,o,t,j,a,r){
                    h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                    h._hjSettings={hjid:1916983,hjsv:6};
                    a=o.getElementsByTagName('head')[0];
                    r=o.createElement('script');r.async=1;
                    r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                    a.appendChild(r);
                })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
            </script>
        <?php
    }

    public function nav()
    {
        @\session_start();
        ?>
        <ul id="slide-out" class="sidenav">
            <?php
                @\session_start();
                if (isset($_SESSION['id']) || isset($_SESSION['access_token']) || isset($_SESSION['sesion_facebook'])) {
                    ?>
                        <li class="no-padding">
                            <ul class="collapsible collapsible-accordion">
                                <li>
                                    <a class="collapsible-header" style="padding-left: 32px;"><i class="material-icons small left">account_box</i><span>Hola, <?php echo $_SESSION['nombre1']; ?></span><i class="material-icons right">arrow_drop_down</i></a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="perfil.php"><i class="material-icons left">account_circle</i>Mi cuenta</a></li>
                                            <li><a href="miscompras.php"><i class="material-icons left">add_shopping_cart</i>Mis compras</a></li>
                                            <li><a href="cambiarpw.php"><i class="material-icons left">lock</i>Cambiar contraseña</a></li>
                                            <li><a href="salir.php"><i class="material-icons left">exit_to_app</i>Cerrar sesión</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    <?php
                } else {
                    ?>
                        <li><a href="login.php"><i class="material-icons left">account_box</i>Iniciar sesión</a></li>
                    <?php
                }
            ?>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header" style="padding-left: 32px;"><i class="material-icons left">group</i>Nosotros<i class="material-icons right">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="nosotros.php"><i class="material-icons left">record_voice_over</i>¿Quienes somos?</a></li>
                                <li><a href="sucursales.php"><i class="material-icons left">apartment</i>Sucursales</a></li>
                                <li><a href="contact.php"><i class="material-icons left">email</i>Contactenos</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
             <li><a href="medio-ambiente.php"><i class="material-icons small left">spa</i>Medio ambiente</a></li>
             <li><a href="outlet.php"><i class="material-icons small left">autorenew</i>Outlet</a></li>
             <li><a href="promociones.php"><i class="material-icons small left">money_off</i>Promociones</a></li>
        </ul>
        <div class="row pre-header-wrapper-row">
            <div class="col s12 pre-header-wrapper">
                <div class="col s12 center">
                    VENTA TELEFÓNICA PBX: (1) 552 2190 - 315 349 7488
                    <div class="redes-pre-header-wrapper hide-on-small-only">
                        <a href="http://www.facebook.com/DigitalMTX"><i class="socicon-facebook waves-effect waves-light"></i></a>
                        <a href="https://api.whatsapp.com/send?phone=573117325343&text=Quiero comprar un producto que ví en su página web"><i class="socicon-whatsapp waves-effect waves-light"></i></a>
                        <a href="https://instagram.com/digitalmtx?igshid=1xv230gr6346a"><i class="socicon-instagram waves-effect waves-light"></i></a>
                    </div>
                </div>
                <div class="col s7 pre-header-menu hide">
                    <?php
                        @\session_start();
                        if (isset($_SESSION['id']) || isset($_SESSION['access_token']) || isset($_SESSION['sesion_facebook'])) {
                            ?>
                                <a class="btn-small waves-effect waves-light dropdown-trigger" data-target="dropdown2"><i class="material-icons left">account_box</i><?php echo $_SESSION['nombre1']; ?><i class="material-icons right">keyboard_arrow_down</i></a>
                                <ul id="dropdown2" class="dropdown-content">
                                    <li><a href="perfil.php" class="waves-effect waves-dark"><i class="material-icons left">account_circle</i>Mi cuenta</a></li>
                                    <li><a href="miscompras.php" class="waves-effect waves-dark"><i class="material-icons left">add_shopping_cart</i>Mis compras</a></li>
                                    <li><a href="cambiarpw.php" class="waves-effect waves-dark"><i class="material-icons left">lock</i>Cambiar contraseña</a></li>
                                    <li><a href="salir.php" class="waves-effect waves-dark"><i class="material-icons left">exit_to_app</i>Cerrar sesión</a></li>
                                </ul>
                            <?php
                        } else {
                            ?>
                                <a href="login.php" class="btn-small waves-effect waves-light"><i class="material-icons left">account_box</i>Iniciar sesión</a>
                            <?php
                        }
                    ?>
                    <a class="btn-small waves-effect waves-light dropdown-trigger" data-target="dropdown4"><i class="material-icons left">group</i>Nosotros<i class="material-icons right">keyboard_arrow_down</i></a>
                    <ul id="dropdown4" class="dropdown-content">
                        <li><a href="nosotros.php" class="waves-effect waves-dark"><i class="material-icons left">record_voice_over</i>¿Quienes somos?</a></li>
                        <li><a href="sucursales.php" class="waves-effect waves-light"><i class="material-icons left">apartment</i>Sucursales</a></li>
                        <li><a href="contact.php" class="waves-effect waves-light"><i class="material-icons left">email</i>Contactenos</a></li>
                    </ul>
                    <span class="btn-small waves-effect waves-light dropdown-trigger" data-target="dropdown1"><i class="material-icons left">important_devices</i>Productos<i class="material-icons right">keyboard_arrow_down</i></span>
                    <ul id="dropdown1" class="dropdown-content">
                        <?php
                            include_once ".includesdtm/digitallibs.php";
                            $vertienda = new digitalibs();
                            $vertienda->listarcategoria();

                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row header-wrapper-row">
            <div class="buscar-movil-wrapper hide-on-large-only">
                <ul class="sugeridas" class="collection"></ul>
                <form class="buscar_mobile_movil" action="tienda.php" method="GET">
                    <input id="buscar_movil" class="buscar_movil" type="text" name="like" placeholder="¿Qué estás buscando?" required>
                    <button type="submit" name="blike" class="btn-buscar right waves-effect waves-light"><i class="material-icons">search</i></button>
                </form>
            </div>
            <div class="col s12 header-wrapper valign-wrapper">
                <div class="col s12 m6 l4 xl3 no-margin valign-wrapper">
                    <a href="index.php" class="waves-effect waves-dark logo-header-wrapper"><img src="img/logo_blanco.png" class="logo-header"></a>
                    <div class="btn-categorias-wrapper valign-wrapper menu-header">
                        <i class="material-icons">menu</i> <span>CATEGORÍAS</span>
                    </div>
                </div>
                <div class="col s5 xl7 no-margin hide-on-med-and-down">
                    <div class="input-field col s12 buscar-wrapper">
                        <ul class="sugeridas" class="collection"></ul>
                        <form class="buscar_mobile" action="tienda.php" method="GET">
                            <input id="buscar" class="buscar" type="text" name="like" placeholder="¿Qué estas buscando?" required>
                            <button type="submit" name="blike" class="btn-buscar right waves-effect waves-light"><i class="material-icons">search</i></button>
                        </form>
                    </div>
                </div>
                <div class="col m6 l5 xl4 center hide-on-small-only btn-header-wrapper">
                    <?php
                        @\session_start();
                        if (isset($_SESSION['id'])) {
                            ?>
                                <a class="waves-effect waves-light btn-header dropdown-trigger" data-target="dropdown5" href=""><i class="material-icons left">person</i><div>Hola, <?php echo $_SESSION['nombre']; ?> <i class="material-icons menu-user">keyboard_arrow_down</i></div></a>
                                <ul id="dropdown5" class="dropdown-content">
                                    <li><a href="perfil.php" class="waves-effect waves-dark"><i class="material-icons left">account_circle</i>Mi cuenta</a></li>
                                    <li><a href="miscompras.php" class="waves-effect waves-dark"><i class="material-icons left">add_shopping_cart</i>Mis compras</a></li>
                                    <li><a href="misenvios.php"><i class="material-icons left">check_circle_outline</i>Mis envios</a></li>
                                    <li><a href="cambiarpw.php" class="waves-effect waves-dark"><i class="material-icons left">lock</i>Cambiar contraseña</a></li>
                                    <li><a href="salir.php" class="waves-effect waves-dark"><i class="material-icons left">exit_to_app</i>Cerrar sesión</a></li>                        
                                </ul>
                            <?php
                        } else {
                            ?>
                                <a class="waves-effect waves-light btn-header" href="registro.php"><i class="material-icons left">person</i><div>Crear Cuenta</div></a>
                            <?php
                        }
                    ?>
                    <a class="waves-effect waves-light btn-header" href="carrito.php">
                        <div style="position: absolute;left: 80px;top:5px;">
                            <?php
                                $total = 0;
                                $contador_productos = 0;
                                @\session_start();
                                if (isset($_SESSION['carrito']['productos'])) {
                                    foreach ($_SESSION['carrito']['productos'] as $producto) {
                                        $contador_productos++;
                                        $stotal=($producto['cantidad']*$producto['precio']);
                                        $total=$stotal+$total;
                                    }
                                }
                                if ($total != 0) {
                                    echo $contador_productos;
                                } else {
                                    echo 0;
                                }
                            ?>
                            </div>
                        <i class="material-icons left">shopping_cart</i>
                        <div>Carrito</div>
                    </a>
                </div>
            </div>
            <div class="col s12 post-header">
                <div class="hide-on-large-only">
                    <a class="btn-flat btn-post-header waves-effect waves-light right sidenav-trigger" href="#" data-target="slide-out" style="margin-right: 40px;"><i class="material-icons small left">menu</i><span>Menu</span></a>
                </div>
                <div class="hide-on-med-and-down">
                    <?php
                        @\session_start();
                        if (!isset($_SESSION['id'])) {
                            ?>
                                <a class="btn-flat btn-post-header waves-effect waves-light right" href="login.php"><i class="material-icons small left">account_box</i><span>Iniciar Sesión</span></a>
                            <?php
                        }
                    ?>
                    <a class="btn-flat btn-post-header waves-effect waves-light right" href="contact.php"><i class="material-icons small left">phone</i><span>Contactenos</span></a>
                    <a class="btn-flat btn-post-header waves-effect waves-light right" href="medio-ambiente.php"><i class="material-icons small left">spa</i><span>Medio Ambiente</span></a>
                    <a class="btn-flat btn-post-header waves-effect waves-light right" href="nosotros.php"><i class="material-icons small left">group</i><span>Nosotros</span></a>
                    <a class="btn-flat btn-post-header waves-effect waves-light right" href="sucursales.php"><i class="material-icons small left">store_mall_directory</i><span>Sucursales</span></a>
                    <a class="btn-flat btn-post-header waves-effect waves-light right" href="outlet.php"><i class="material-icons small left">autorenew</i><span>Outlet</span></a>
                    <a class="btn-flat btn-post-header waves-effect waves-light right" href="promociones.php"><i class="material-icons small left">money_off</i><span>Promociones</span></a>
                </div>
            </div>
            <div class="col s12 post-header-menu-wrapper">
                <div class="col s12 post-header-menu">
                    <div class="col s12 m3 categorias-wrapper categorias-wrapper-normal no-padding hide-on-small-only">
                        <?php
                            include_once ".includesdtm/digitallibs.php";
                            $vertienda = new digitalibs();
                            $vertienda->categorias_menu();
                        ?>
                    </div>
                    <div class="col s12 m3 categorias-wrapper no-padding hide-on-med-and-up">
                        <?php
                            include_once ".includesdtm/digitallibs.php";
                            $vertienda = new digitalibs();
                            $vertienda->categorias_menu_movil();
                        ?>
                    </div>
                    <div class="col s9 hide-on-small-only">
                        <div class="col s12 titulo-ultimos-productos-categorias no-padding">
                            Últimos productos agregados en la categoría: <span class="categoria-seleccionada">ACCESORIOS PARA PORTÁTILES Y PC</span> <a href="tienda.php?categoria=ACCESORIOS%20PARA%20PORTATILES%20Y%20PC" class="btn-small btn-ver-categoria right waves-effect waves-light"><i class="material-icons left">important_devices</i>Ver categoría</a>
                        </div>
                    </div>
                    <div class="col s12 m9 productos-categorias no-padding hide-on-small-only"></div>
                </div>
            </div>
        </div>
        <?php 
    }

    public function nav2()
    {   
        @\session_start();
        ?>
        <nav class="navbar navbar-default navbar-fixed-top  wow slideInDown" style="height: 80px;background-color: #f3f7f8">
            <div class="container">
                <div class="container-fluid">
                
                    <div class="navbar-header" style="background-color: #f3f7f8">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" >
                            <span class="sr-only">Menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand wow slideInLeft" href="index.php"><img src="img/logo.png" style="height: 60px;" alt="Ir a la pagina principal de DigitalMTX" title="Ir a la pagina principal de DigitalMTX"></a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right wow slideInRight">
                            <?php
                            if(isset($_SESSION['cliente'])&&$_SESSION['cliente']==TRUE){
                                ?>
                                <li class="dropdown" >
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION["nombre"] ?>
                                        <span class="caret"></span> 
                                    </a>
                                    <ul class="dropdown-menu" style="background-color: #f3f7f8">
                                        <li><a href="perfil.php"><i class="fa fa-user"></i> Perfil</a></li>
                                        <li><a href="miscompras.php"><i class="fa fa-cart-plus"></i> Mis Compras</a></li>
                                        <li><a href="cambiarpw.php"><i class="fa fa-key"></i> Cambiar mi contraseña</a></li>
                                    </ul>
                                </li> 

                                <li><a class='secc' href='javascript:void(0);' onclick='confirmar()'><i class='fa fa-sign-out'></i>Cerrar sesión</a></li>    
                                <?php 
                            }elseif ((isset($_SESSION['empleado'])&&$_SESSION['empleado']==TRUE) || (isset($_SESSION['admin'])&&$_SESSION['admin']==TRUE)) {
                                ?>
                                <li><a class='secc' href='paneladm.php'><i class='fa fa-user'></i>Panel administracion</a></li>
                                <?php
                            }else{
                                ?>
                                <li><a class='secc' href='login.php'><i class='fa fa-user'></i>Iniciar sesión</a></li>
                                <?php 
                            }
                                ?>
                                <li><a href="sucursales.php"><i class="fa fa-home" aria-hidden="true"></i> Sucursales</a></li>
                                <li><a href="contact.php"><i class="fa fa-phone" aria-hidden="true"></i> Contáctenos</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-star-o"></i>Productos
                                        <span class="caret"></span> 
                                    </a>
                                    <ul class="dropdown-menu" style="background-color: #f3f7f8">
                                        <?php
                                        include_once ".includesdtm/digitallibs.php";
                                        $vertienda=new digitalibs();
                                        $vertienda->listarcategoria();
                                        ?>
                                    </ul>
                                </li>      
                        </ul>
                        <form class="navbar-form navbar-left" action="" method="GET">
                            <div class="form-group">
                                <input type="text" class="form-control btn-sm" placeholder="Buscar" name="like">          
                            </div>
                            <button type="submit" class="btn btn-default btn-sm" name="blike">Buscar</button>
                        </form>
                    </div>

                </div>
            </div>
        </nav>
        <?php
    }

    public function nav3() {
        if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']) && $_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'] == TRUE) {
            ?>
                <li><a class="item_menu waves-effect waves-dark principal"><i class="material-icons left">apps</i>General</a></li>
                <li><a class="item_menu waves-effect waves-dark empleados"><i class="material-icons left">person_add</i>Agregar Empleado</a></li>
                <li><a class="item_menu waves-effect waves-dark admemploy"><i class="material-icons left">account_box</i>Empleados</a></li>
                <li><a class="item_menu waves-effect waves-dark admusers"><i class="material-icons left">people</i>Clientes</a></li>
                <li><a class="item_menu waves-effect waves-dark historial"><i class="material-icons left">timer</i>Historial</a></li>
            <?php
        }
        if((isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']) && $_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'] == TRUE) || (isset($_SESSION['productos']) && $_SESSION['productos']==TRUE)) {
            ?>
                <li><a class="item_menu waves-effect waves-dark addproductos"><i class="material-icons left">add_box</i>Agregar producto</a></li>
                <li><a class="item_menu waves-effect waves-dark admproductos"><i class="material-icons left">devices</i>Productos</a></li>
                <li><a class="item_menu waves-effect waves-dark destproductos"><i class="material-icons left">important_devices</i>Destacados</a></li>
                <li><a class="item_menu waves-effect waves-dark admpcupones"><i class="material-icons left">receipt</i>Cupones</a></li>
            <?php
        }
        if ((isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE)||(isset($_SESSION['ventas'])&&$_SESSION['ventas']==TRUE)) {
            ?>
                <li><a class="item_menu waves-effect waves-dark" href="administracion_de_ventas.php"><i class="material-icons left">bar_chart</i>Ventas</a></li>
            <?php
        }
        if ((isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE)||(isset($_SESSION['perfiles'])&&$_SESSION['perfiles']==TRUE)) {
            ?>
                <li><a class="item_menu waves-effect waves-dark" href='<?php echo isset($_SESSION["correo"])? "perfilusers.php?correo=".$_SESSION["correo"]:''; ?>' target="_blank"><i class="material-icons left">account_circle</i>Perfil</a></li>
            <?php
        }
        if ((isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE)||(isset($_SESSION['mailm'])&&$_SESSION['mailm']==TRUE)) {
            ?>
                <li><a class="item_menu waves-effect waves-dark" href='mailmtx.php' target="_blank"><i class="material-icons left">email</i>Correo masivo</a></li>
            <?php
        }
        if ((isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE)||(isset($_SESSION['contenido'])&&$_SESSION['contenido']==TRUE)) {
            ?>
                <li><a class="item_menu waves-effect waves-dark contenido"><i class="material-icons left">dashboard</i>Contenido</a></li>
            <?php
        }
        if ((isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE)||(isset($_SESSION['contenido'])&&$_SESSION['contenido']==TRUE)){
            ?>
                <li><a class="item_menu waves-effect waves-dark" href="garantias/?controller=person&method=template" target="_self"><i class="material-icons left">dashboard</i>Garantias</a></li>
            <?php
        }

        if ((isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE)||(isset($_SESSION['contenido'])&&$_SESSION['contenido']==TRUE)){
            ?>
                <li><a class="item_menu waves-effect waves-dark" href="servicio_tecnico/?controller=dashboard" target="_self"><i class="material-icons left">dashboard</i>Servicio tecnico</a></li>
            <?php
        }


        //-----------------------------------------------------------------------------------------
         if ((isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE)||(isset($_SESSION['guia'])&&$_SESSION['guia']==TRUE)) {
            ?>
                <li><a class="item_menu waves-effect waves-dark guia"><i class="material-icons left">dashboard</i>Generar Envio</a></li>
            <?php
        }
         if ((isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE)||(isset($_SESSION['historial'])&&$_SESSION['historial']==TRUE)) {
            ?>
                <li><a class="item_menu waves-effect waves-dark " href="historial_guias.php" target="_self"><i class="material-icons left">dashboard</i>Ver Guias</a></li>
            <?php
        }

         if ((isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE)||(isset($_SESSION['numguia'])&&$_SESSION['numguia']==TRUE)) {
            ?>
                <li><a class="item_menu waves-effect waves-dark" href="historial_guias_pend.php" target="_self"><i class="material-icons left">dashboard</i>Cargar Consecutivo Guia</a></li>
            <?php
        }

        if (isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE) {
            ?>
                <li><a class="item_menu waves-effect waves-dark" href="garantias/?controller=person&method=template" target="_self"><i class="material-icons left">dashboard</i>Tecnico Garantias</a></li>
            <?php
        }

        if (isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE) {
            ?>
                <li><a class="item_menu waves-effect waves-dark" href="servicio_tecnico/?controller=dashboard" target="_self"><i class="material-icons left">dashboard</i>Tecnico servicios</a></li>
            <?php
        }

         if (isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
            ?>
                <li><a class="item_menu waves-effect waves-dark" href="garantias/?controller=person&method=template" target="_self"><i class="material-icons left">dashboard</i>Recepcionar Garantia</a></li>
            <?php
        }
        if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE){
            ?>
                <li><a class="item_menu waves-effect waves-dark" href="garantias/?controller=person&method=template" target="_self"><i class="material-icons left">dashboard</i>Garantias</a></li>
            <?php
        }
    }

    
    public function librerias_css_head($a) {
        ?>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="author" content="Reinaldo Pastran">
            <meta name="author" content="Edwin Velasquez Jimenez(lion_3214@hotmail.com), Diego Rodríguez Veloza(@rodvel2910)">
            <meta name="keywords" content="Computadores, portatiles, pantallas, baterias, teclados, apple, hp, ishop, repuestos, cargadores, servicio tecnico, soporte tecnico, usb, tecnologia, garantia, pc">
            <link rel="shortcut icon" type="image/x-icon" href="img/icon.png">
            <?php

                $array_libs_b = array(
                /* 0 */     '<link rel="stylesheet" href="css/estilos.css">',
                /* 1 */     '<link rel="stylesheet" href="css/bootstrap.css">',
                /* 2 */     '<link rel="stylesheet" href="css/bootstrap.min.css">',
                /* 3 */     '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">',
                /* 4 */     '<link href="bootstrap4/styles.css" media="all" rel="stylesheet">',
                /* 5 */     '<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">',
                /* 6 */     '<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">'
                );

                if($a == 1) { /* index.php */
                    echo $array_libs_b[0];
                    echo $array_libs_b[1];
                    echo $array_libs_b[2];
                    echo $array_libs_b[3];
                    echo $array_libs_b[4];
                    echo $array_libs_b[5];
                    echo $array_libs_b[6];
                ?>
                    <!--<link href="bootstrap4/skitter.css" media="all" rel="stylesheet">-->
                    <link href="lib/vidgal/css/vidgal.css" rel="stylesheet">
                <?php
                } elseif($a == 2) { /* admindmtxhiddenlink.php */
                    echo $array_libs_b[0];
                    echo $array_libs_b[1];
                    echo $array_libs_b[2];
                    echo $array_libs_b[3];
                    echo $array_libs_b[5];
                    echo $array_libs_b[6];
        
                } elseif($a == 3) { /* administracion_de_ventas.php */
                    echo $array_libs_b[0];
                    echo $array_libs_b[1];
                    echo $array_libs_b[2];
                    echo $array_libs_b[3];
                    echo $array_libs_b[4];
                    echo $array_libs_b[5];
                    echo $array_libs_b[6];
                } elseif($a == 4 || $a == 7 || $a == 9 || $a == 10 || $a == 11 || $a == 21 || $a == 22 || $a == 27) { /* cambiarpw.php */
                    echo $array_libs_b[0];
                    echo $array_libs_b[1];
                    echo $array_libs_b[2];
                    echo $array_libs_b[3];
                    echo $array_libs_b[4];
                    echo $array_libs_b[5];
                    echo $array_libs_b[6];
                } elseif($a == 5 || $a == 12) { /* carrito.php */
                    echo $array_libs_b[0];
                    echo $array_libs_b[2];
                    echo $array_libs_b[3];
                    echo $array_libs_b[5];
                    echo $array_libs_b[6];  
                } elseif($a == 6 || $a == 15 || $a == 20 || $a == 24 || $a == 26) { /* compra.php */
                    echo $array_libs_b[0];
                    echo $array_libs_b[2];
                    echo $array_libs_b[3];
                    echo $array_libs_b[4];
                    echo $array_libs_b[5];
                    echo $array_libs_b[6];  
                } elseif($a == 8 || $a == 18) { /* contact.php */
                    echo $array_libs_b[0];
                    echo $array_libs_b[1];
                    echo $array_libs_b[3];
                    echo $array_libs_b[4];
                    echo $array_libs_b[5];
                    echo $array_libs_b[6];  
                } elseif ($a == 13 || $a == 17) { /* facturar_pago.php */
                    echo $array_libs_b[0];
                    echo $array_libs_b[3];
                    echo $array_libs_b[4];
                    echo $array_libs_b[5];
                    echo $array_libs_b[6];  
                } elseif ($a == 14) { /* indexforempleados.php */
                    echo $array_libs_b[0];
                    echo $array_libs_b[1];
                    echo $array_libs_b[2];
                    echo $array_libs_b[3];
                    echo $array_libs_b[5];
                    echo $array_libs_b[6];  
                } elseif ($a == 16) { /* mailmtx.php */
                    ?>
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
                    <?php   
                } elseif ($a == 19) { /* paneladm.php */
                    echo $array_libs_b[1];
                    echo $array_libs_b[2];
                    echo $array_libs_b[3];
                    echo $array_libs_b[5];
                    echo $array_libs_b[6];
                ?>
                    <link rel="stylesheet" href="css/paneladm.css">
                <?php   
                } elseif ($a == 23) { /* productos.php */
                    echo $array_libs_b[0];
                    echo $array_libs_b[3];
                    echo $array_libs_b[4];
                    echo $array_libs_b[5];
                    echo $array_libs_b[6];
                ?>
                    <link href="css/cloud-zoom.css" rel="stylesheet">
                <?php   
                } elseif ($a == 25) { /* registro.php */
                    echo $array_libs_b[0];
                    echo $array_libs_b[3];
                    echo $array_libs_b[4];
                    echo $array_libs_b[5];
                    echo $array_libs_b[6];
                ?>
                    <link rel="stylesheet" href="lib/demo/bootstrap.min.css">
                    <link rel="stylesheet" href="dist/css/jquery-entropizer.min.css">
                <?php   
                }

            ?>
        <?php
    }

    public function librerias_js($a) {

        $array_libs=array(
        /* 0 */     '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>',
        /* 1 */     '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>',
        /* 2 */     '<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>',
        /* 3 */     '<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>',
        /* 4 */     '<script src="https://www.google.com/recaptcha/api.js"></script>',
        /* 5 */     '<script src="https://www.googletagmanager.com/gtag/js?id=UA-111188390-1"></script>',
        /* 6 */     '<script src="js/jquery.js"></script>',
        /* 7 */     '<script src="js/jquery.min.js"></script>',
        /* 8 */     '<script src="js/bootstrap.min.js"></script>',
        /* 9 */     '<script src="js/bootstrap.js"></script>',
        /* 10 */    '<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>',
        );
        if($a == 1) { /* Index.php */
            ?>
                <?php
                    echo $array_libs[0];
                    echo $array_libs[1];
                    echo $array_libs[2];
                    echo $array_libs[3];
                ?>
                <!--<script src="bootstrap4/jquery-2.1.1.min.js"></script>-->
                <!--<script src="bootstrap4/jquery.easing.1.3.js"></script>-->
                <!--<script src="bootstrap4/jquery.skitter.min.js"></script>-->

                <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
                <script src="lib/vidgal/js/vidgal.js"></script>
                <script>
                    $('#btn_llamenos').click(function() {
                        var nombre = $('#nombre').val();
                        var celular = $('#celular').val();
                        var correo = $('#correo').val();
                        var mensaje = $('#mensaje').val();
                        var captcha = grecaptcha.getResponse();
                        if(nombre == '' || nombre == ' ') {
                            $('.btn_llamenos_bad').css('top', '40px');
                            $('.btn_llamenos_bad').html('<strong>Tiene que colocar un nombre</strong>, intentelo de nuevo.');
                            $('#nombre').focus();
                            setTimeout(function() {
                                $('.btn_llamenos_bad').css('top', '-100px');
                            }, 3500);
                        } else if(celular == '' || celular == ' ') {
                            $('.btn_llamenos_bad').css('top', '40px');
                            $('.btn_llamenos_bad').html('<strong>Tiene que colocar un celular</strong>, intentelo de nuevo.');
                            $('#celular').focus();
                            setTimeout(function() {
                                $('.btn_llamenos_bad').css('top', '-100px');
                            }, 3500);
                        } else if(correo == '' || correo == ' ') {
                            $('.btn_llamenos_bad').css('top', '40px');
                            $('.btn_llamenos_bad').html('<strong>Tiene que colocar un correo valido</strong>, intentelo de nuevo.');
                            $('#correo').focus();
                            setTimeout(function() {
                                $('.btn_llamenos_bad').css('top', '-100px');
                            }, 3500);
                        } else if(mensaje == '' || mensaje == ' ') {
                            $('.btn_llamenos_bad').css('top', '40px');
                            $('.btn_llamenos_bad').html('<strong>Tiene que colocar un mensaje</strong>, intentelo de nuevo.');
                            $('#mensaje').focus();
                            setTimeout(function() {
                                $('.btn_llamenos_bad').css('top', '-100px');
                            }, 3500);
                        } else if(captcha.length == 0) {
                            $('.btn_llamenos_bad').css('top', '40px');
                            $('.btn_llamenos_bad').html('<strong>Tiene que verificar que no es un robot</strong>');
                            setTimeout(function() {
                                $('.btn_llamenos_bad').css('top', '-100px');
                            }, 3500);
                        } else {
                            $('#nombre').val('');
                            $('#celular').val('');
                            $('#correo').val('');
                            $('#mensaje').val('');
                            grecaptcha.reset();
                            var datos = {
                                nombre : nombre,
                                celular : celular,
                                correo : correo,
                                mensaje : mensaje,
                                captcha: captcha
                            };
                            $.ajax({
                                url: "btn_llamenos.php",
                                async: true,
                                type: 'POST',
                                data: datos,
                                success: function(result) {
                                    $('.btn_cerrar_modal').click();
                                    if (result == 1) {
                                        $('.btn_llamenos_good').css('top', '40px');
                                        $('.btn_llamenos_good').html('<strong>El mensaje se ha enviado correctamente</strong>, nos comunicaremos en breve con usted.');
                                        setTimeout(function() {
                                            $('.btn_llamenos_good').css('top', '-100px');
                                        }, 3500);
                                    } else {
                                        $('.btn_llamenos_bad').css('top', '40px');
                                        $('.btn_llamenos_bad').html('<strong>No se ha podido enviar el mensaje</strong>, intentelo de nuevo.');
                                        setTimeout(function() {
                                            $('.btn_llamenos_bad').css('top', '-100px');
                                        }, 3500);
                                    }
                                }
                            });
                        }
                    });
                </script>

                <script>
                    /* No se puede cambiar el orden de este script */
                  $(function() {

                    vidgal({
                            
                            sub_botones: true,
                                        
                            auto: true,
                            
                            der_botones: true,
                            
                            izq_botones: true,

                            sub_botones_background_color: '#000',

                            sub_botones_size: 3,

                            //efectos:true o un numero del 0 - 55 para escojer el efectos o no mostrar nada
                            
                        });


                    /*$('.skitter-large').skitter({
                      interval:4000,
                      velocity:2,
                      preview:true,
                      stop_over:false,
                      progressbar:true
                    });*/
                  });

                    
                </script>
                <!--<script src="bootstrap4/app.js"></script>-->
                <?php 
                    echo $array_libs[4];
                    echo $array_libs[5];
                ?>
            <?php
        } elseif($a == 2 || $a == 3 || $a == 7 || $a == 9 || $a == 10 || $a == 11 || $a == 14 || $a == 19 || $a == 21 || $a == 22) { /* admindmtxhiddenlink.php */
            ?>
                <?php 
                    echo $array_libs[0];
                    echo $array_libs[1];
                    echo $array_libs[2];
                    echo $array_libs[3];
                    echo $array_libs[6];
                    echo $array_libs[7];
                    echo $array_libs[8];
                    echo $array_libs[9];
                ?>
            <?php
        } elseif($a == 4) { /* cambiarpw.php */
            ?>
                <?php 
                    echo $array_libs[0];
                    echo $array_libs[1];
                    echo $array_libs[2];
                    echo $array_libs[3];
                    echo $array_libs[6];
                    echo $array_libs[7];
                    echo $array_libs[8];
                    echo $array_libs[9];
                    echo $array_libs[4];
                ?>
            <?php
        } elseif($a == 5) { /* carrito.php */
            ?>
                <?php
                    echo $array_libs[10];
                    echo $array_libs[0];
                    echo $array_libs[1];
                    echo $array_libs[2];
                    echo $array_libs[3];
                    echo $array_libs[4];
                    echo $array_libs[5];
                ?>
            <?php
        } elseif($a == 6) { /* compra.php */
            ?>
                <?php
                    echo $array_libs[10];
                    echo $array_libs[0];
                    echo $array_libs[1];
                    echo $array_libs[2];
                    echo $array_libs[3];
                ?>
            <?php
        } elseif($a == 8 || $a == 18 || $a == 27) { /* contact.php */
            ?>
                <?php
                    echo $array_libs[0];
                    echo $array_libs[1];
                    echo $array_libs[2];
                    echo $array_libs[3];
                    echo $array_libs[4];
                    echo $array_libs[5];
                ?>
            <?php
        } elseif ($a == 12 || $a == 13 || $a == 24 || $a == 26) { /* edicionperfil.php */
            ?>
                <?php
                    echo $array_libs[0];
                    echo $array_libs[1];
                    echo $array_libs[2];
                    echo $array_libs[3];
                ?>
            <?php
        } elseif($a == 15 || $a == 17 || $a == 20) { /* login.php */
            ?>
                <?php
                    echo $array_libs[0];
                    echo $array_libs[1];
                    echo $array_libs[2];
                    echo $array_libs[3];
                    echo $array_libs[4];
                ?>
            <?php
        } elseif ($a == 16) { /* mailmtx.php */
            ?>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
            <?php
        } elseif ($a == 23) { /* productos.php */
            ?>
                <?php
                echo $array_libs[6];
                echo $array_libs[1];
                echo $array_libs[4];
                ?>
                <script src="js/cloud-zoom.1.0.2.min.js"></script>
            <?php
        } elseif ($a == 25) { /* registro.php */
            ?>
                <?php
                echo $array_libs[1];
                echo $array_libs[4];
                ?>
                <script>
                    (function(i, s, o, g, r, a, m) {
                        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function() {
                            (i[r].q = i[r].q || []).push(arguments)
                        }, i[r].l = 1 * new Date(); a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0]; a = 1; a.src = g; m.parentNode.insertBefore(a, m)
                    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
                    ga('create', 'UA-51826906-1', 'jreesuk.github.io');
                    ga('send', 'pageview');
                </script>
                <script>
                  function d1(selectTag) {
                    if(selectTag.value == 'Empresa') {
                      document.getElementById('r1').disabled = false;
                    }else{
                      document.getElementById('r1').disabled = true;
                    }
                  }
                </script>
                <?php echo $array_libs[5]; ?>
                <script>
                   window.dataLayer = window.dataLayer || [];
                   function gtag(){dataLayer.push(arguments);}
                   gtag('js', new Date());
                   
                   gtag('config', 'UA-111188390-1');
                </script>
                <script src="lib/jquery.js"></script>
                <script src="lib/entropizer.js"></script>
                <script src="lib/demo/bootstrap.min.js"></script>
                <script src="dist/js/jquery-entropizer.min.js"></script>
                <script>
                   $('#meter1').entropizer({ target: '#password' });
                </script>
            <?php
        }
    }

    public function boton_flotante() {
        if(isset($_SESSION["llamanos"])) {
            if($_SESSION["llamanos"] == 1) {
              ?>
                <div id="mitoast" style="position: absolute; top: 100px; right: 20px;z-index: 1040;background: #333;padding: 10px;border-radius: 10px;color: white;transition: all 0.5s;">
                    El mensaje se ha enviado correctamente, nos comunicaremos en breve con usted
                </div>
                <script>
                  var toast = document.getElementById('mitoast');
                  setTimeout(function(){
                    toast.style.opacity = "0";
                  }, 3000);
                  setTimeout(function(){
                    toast.style.display = "none";
                  }, 3500);
                </script>
              <?php
              unset($_SESSION["llamanos"]);
            } else {
              ?>
                <div id="mitoast" style="position: absolute; top: 100px; right: 20px;z-index: 1040;background: #333;padding: 10px;border-radius: 10px;color: white;transition: all 0.5s;">
                    No se ha podido enviar el mensaje, intentelo de nuevo
                </div>
                <script>
                  var toast = document.getElementById('mitoast');
                  setTimeout(function(){
                    toast.style.opacity = "0";
                  }, 3000);
                  setTimeout(function(){
                    toast.style.display = "none";
                  }, 3500);
                </script>
              <?php
              unset($_SESSION["llamanos"]);
            }
          }

        ?>
        <!--<form method="post" action="btn_llamenos.php" style="margin-top: 20px;">-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                Quieres que te llamemos?
              </div>
              <div class="modal-body">
                <div class="col-12" style="text-align: center;">
                  Utilice este formulario para aclarar alguna posible duda que pueda tener de nuestros productos o del proceso de compra que se maneja actualmente en la plataforma.
                </div>
                
                  <div class="col-12 col-sm-12 col-md-6">
                    <input class="col-sm-12" type="text" required id="nombre" name="nombre" placeholder="Nombres y Apellidos" style="border-radius: 5px;padding: 5px;border: 1px solid #039be5;">
                  </div>
                  <div class="col-12 col-sm-12 col-md-6">
                    <input class="col-sm-12 celular_llamenos" type="number" required id="celular" name="celular" placeholder="Celular" style="border-radius: 5px;margin-top: 0px;padding: 5px;border: 1px solid #039be5;" minlength="10" maxlength="10">
                  </div>
                  <div class="col-sm-12">
                    <input class="col-sm-12" type="email" required id="correo" name="correo" placeholder="Correo" style="border-radius: 5px;margin-top: 10px;padding: 5px;border: 1px solid #039be5;">
                  </div>
                  <div class="col-sm-12">
                    <textarea class="col-sm-12" required id="mensaje" name="mensaje" placeholder="Mensaje" style="border-radius: 5px;margin-top: 10px;padding: 5px;border: 1px solid #039be5;max-width: 100%;min-width: 100%;"></textarea>
                  </div>
                  <div class="col-sm-12">
                    <div class="g-recaptcha" style="transform: scale(0.8);margin-left: 100px;" data-sitekey="6Lcyry4UAAAAAF0evGdXbSr5yR5y4khwyfAn7G-_"> 
                    </div>
                  </div>
                  <div style="text-align: center;width: 100%;">
                    <button id="btn_llamenos" style="margin-top: 10px;">
                      Enviar
                    </button>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn_cerrar_modal" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <div class="alert alert-success btn_llamenos_good" style="position: fixed;z-index: 9999;right: 40px;top: -100px;transition: all 0.5s;"></div>
        <div class="alert alert-danger btn_llamenos_bad" style="position: fixed;z-index: 9999;right: 40px;top: -100px;transition: all 0.5s;"></div>
        <!--</form>-->
        <div class="te_llamamos" data-toggle="modal" data-target="#exampleModal" style="display: none;">
          <span class="glyphicon glyphicon-phone-alt" style="transform: rotate(90deg);"></span> ¿Te llamamos?
        </div>
        <?php
    }

    public function footer() {
        ?>
        <footer>
            <div class="row row-footer-wrapper">
                <div class="col s12 footer-wrapper">
                    <div class="col s12 m6 l4 tarjeta-footer-wrapper">
                        <div class="col s12">
                            <h5 class="tarjeta-footer-titulo">Ayuda</h5>
                            <div class="col s12 item-tarjeta-footer-wrapper no-padding">
                                <a href="#!" class="item-tarjeta-footer-link">
                                    <p class="item-tarjeta-footer">
                                        Chatea con nosotros
                                    </p>
                                </a>
                                <a href="mailto:info@digitalmtx.com" class="item-tarjeta-footer-link">
                                    <p class="item-tarjeta-footer">
                                        Escribenos un correo
                                    </p>
                                </a>
                                <a href="contact.php" class="item-tarjeta-footer-link">
                                    <p class="item-tarjeta-footer">
                                        Contacto PBX: 552 2190
                                    </p>
                                </a>
                                <a href="http://www.facebook.com/DigitalMTX" class="item-tarjeta-footer-link">
                                    <p class="item-tarjeta-footer">
                                        Visita nuestra página en Facebook
                                    </p>
                                </a>
                                <a href="https://api.whatsapp.com/send?phone=573117325343&text=Quiero comprar un producto que ví en su página web" class="item-tarjeta-footer-link">
                                    <p class="item-tarjeta-footer">
                                        Escribenos en Whatsapp: (+57)315-349-74-88  
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l4 tarjeta-footer-wrapper">
                        <div class="col s12">
                            <h5 class="tarjeta-footer-titulo">Accesos rápidos</h5>
                            <div class="col s12 item-tarjeta-footer-wrapper no-padding">
                                <a href="contact.php" class="item-tarjeta-footer-link">
                                    <p class="item-tarjeta-footer">
                                        Contáctanos
                                    </p>
                                </a>
                                <a href="registro.php" class="item-tarjeta-footer-link">
                                    <p class="item-tarjeta-footer">
                                        Registrate
                                    </p>
                                </a>
                                <a href="mailto:info@digitalmtx.com" class="item-tarjeta-footer-link">
                                    <p class="item-tarjeta-footer">
                                        Atención al cliente
                                    </p>
                                </a>
                                <a href="tienda.php" class="item-tarjeta-footer-link">
                                    <p class="item-tarjeta-footer">
                                        Tienda
                                    </p>
                                </a>
                                <a href="nosotros.php" class="item-tarjeta-footer-link">
                                    <p class="item-tarjeta-footer">
                                        Nosotros
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 l4 tarjeta-footer-wrapper">
                        <div class="col s12">
                            <h5 class="tarjeta-footer-titulo">Políticas</h5>
                            <div class="col s12 item-tarjeta-footer-wrapper no-padding">
                                <a href="#modal_politicas" class="item-tarjeta-footer-link modal-trigger">
                                    <p class="item-tarjeta-footer">
                                        Política de privacidad
                                    </p>    
                                </a>
                                <a href="#modal_politicas" class="item-tarjeta-footer-link modal-trigger">
                                    <p class="item-tarjeta-footer">
                                        Política de devoluciones
                                    </p>
                                </a>
                                <a href="#modal_politicas" class="item-tarjeta-footer-link modal-trigger">
                                    <p class="item-tarjeta-footer">
                                        Política de garantía
                                    </p>
                                </a>
                                <a href="#modal_politicas" class="item-tarjeta-footer-link modal-trigger">
                                    <p class="item-tarjeta-footer">
                                        Términos y condiciones
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="modal_politicas" class="modal modal-fixed-footer">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col s12 titulo-modal-te-llamamos">
                                    <h4>Nuestras Políticas</h4>
                                </div>
                                <div class="col s12 texto-modal-te-llamamos">
                                    <iframe src="politicas.pdf"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-endfooter-wrapper">
                <div class="col s12 endfooter-wrapper">
                    <div class="col s12 m6 l4 tarjeta-endfooter-wrapper white-text">
                        <div class="col s12 center">
                            <img src="img/logo_blanco.png" style="height: 75px;">
                        </div>
                    </div>
                    <div class="col s12 m6 l4 tarjeta-endfooter-wrapper white-text">
                        <div class="col s12 center">
                            <img src="https://irp-cdn.multiscreensite.com/936978bd/dms3rep/multi/mobile/logo-305918b6.png" style="height: 75px;">
                        </div>
                    </div>
                    <div class="col s12 l4 tarjeta-endfooter-wrapper white-text">
                        <div class="col s12">
                            <a href="tienda.php" class="item-tarjeta-footer-link">
                                <p class="item-tarjeta-endfooter">
                                    Tienda
                                </p>
                            </a>
                            <a href="contact.php" class="item-tarjeta-footer-link">
                                <p class="item-tarjeta-endfooter">
                                    Contáctenos
                                </p>
                            </a>
                            <a href="politicas.pdf" class="item-tarjeta-footer-link">
                                <p class="item-tarjeta-endfooter">
                                    Términos y condiciones
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="row row-footer-wrapper">
            <div class="col s12 postfooter-wrapper">
                Hecho con <i class="material-icons">favorite</i> por <a href="https://grupotecnologico.org">GrupoTecnologico</a>
            </div>
        </div>
        
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Términos de uso</h4>
              </div>
              <div class="modal-body">
                <h2 class="text-center">POLÍTICA DE TRATAMIENTO DE DATOS PERSONALES
                DIGITAL MTX SAS</h2>
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
                  <a href="http://www.digitalmtx.com">Digital MTX</a>
                  <br><br>
                  Atentamente:
                  <br><br>
                  DIGITAL MTX SAS
                  <br><br>
                  DOMICILIO Calle 77 # 16A 38 of 305
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
              </div>
            </div>
          </div>
        </div>
        <?php
    }

}
?>