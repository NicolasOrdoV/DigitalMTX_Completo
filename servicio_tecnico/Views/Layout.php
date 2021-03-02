<?php
//var_dump($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Digital MTX Dashboard</title>
    <!-- Favicon-->
    <link rel="icon" href="../garantias/Assets/img/logo-rojo.png">

    <!-- Google Fonts -->
    <link href="../garantias/Assets/fonts/fonts1.css" rel="stylesheet" type="text/css">
    <link href="../garantias/Assets/fonts/icons1.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../garantias/Assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../garantias/Assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <!-- <link href="Assets/plugins/animate-css/animate.css" rel="stylesheet" /> -->

    <!-- Morris Chart Css-->
    <link href="../garantias/Assets/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <!-- <link href="Assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" /> 
 -->
    <!-- Bootstrap DatePicker Css -->
    <!-- <link href="Assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" /> -->

    <!-- Wait Me Css -->
    <link href="../garantias/Assets/plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <!-- <link href="Assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" /> -->

    <!-- JQuery DataTable Css -->
    <link href="../garantias/Assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Sweet Alert Css -->
    <!-- <link href="Assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
 -->
    <!-- Custom Css -->
    <link href="../garantias/Assets/css/styleAdmin.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../garantias/Assets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Por favor espere...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
            </div>
            
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../garantias/Assets/img/user.png" width="48" height="48" alt="User" />
                </div>
                <br><br>
                            <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                            if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE )  {
                                echo $_SESSION['nombre'];
                            } elseif (isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE || isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) {
                                echo $_SESSION['nombre']; 
                            }
                        ?>        
                    </div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="../paneladm.php"><i class="material-icons">input</i>Volver Panel</a></li>
                            <li><a href="../salir.php"><i class="material-icons">input</i>Cerrar sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">Menu de navegación</li>
                    <li class="active">
                        <a href="?controller=dashboard">
                            <i class="material-icons">home</i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <?php if (  isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ) { ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Ordenes de servicio tecnico</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span>Anexo orden de servicio</span>
                                </a>
                                
                            </li>
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span>Informacion de servicio tecnico</span>
                                </a> 
                            </li>
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span>Finalizacion</span>
                                </a> 
                            </li>
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span><b>Servicios a terceros</b></span>
                                </a>
                                
                            </li>
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span>Historico de garantias finalizadas</span>
                                </a> 
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_paste</i>
                            <span>Tipo de equipo</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span>Registro tipo de equipo</span>
                                </a>
                                
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_paste</i>
                            <span>Repuestos</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span>Registro repuestos</span>
                                </a>
                                
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">build</i>
                            <span>Revision de productos SV</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span>Anexo de revisiones</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span>Historicos de productos revisados por servicio tecnico</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php }elseif (isset($_SESSION['tecnico'])&&$_SESSION['tecnico']==TRUE) { ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">build</i>
                            <span>Revision de productos SV</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="?controller=revision&name=<?php echo $_SESSION['nombre'] ?>" class="menu-toggle">
                                    <span>Anexo de revisiones</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span>Historicos de productos revisados por servicio tecnico</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php }elseif (isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) { ?> 
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Ordenes de servicio tecnico</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="?controller=service" class="menu-toggle">
                                    <span>Anexo orden de servicio</span>
                                </a>
                                
                            </li>
                            <li>
                                <a href="?controller=service&method=prefinish" class="menu-toggle">
                                    <span>Informacion de servicio tecnico</span>
                                </a> 
                            </li>
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span>Finalizacion</span>
                                </a> 
                            </li>
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span><b>Servicios a terceros</b></span>
                                </a>
                                
                            </li>
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span>Historico de garantias finalizadas</span>
                                </a> 
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_paste</i>
                            <span>Tipo de equipo</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span>Registro tipo de equipo</span>
                                </a>
                                
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_paste</i>
                            <span>Repuestos</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#" class="menu-toggle">
                                    <span>Registro repuestos</span>
                                </a>
                                
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('Y');?> <a href="javascript:void(0);">Digital MTX</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <!-- #END# Right Sidebar -->
    </section>
</body>
</html>