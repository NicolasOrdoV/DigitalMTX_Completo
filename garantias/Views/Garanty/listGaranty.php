
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                LISTA DE GARANTÍAS
                <small>Consulta las garantías</small>
            </h2>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header row">
                        <div class="col-sm-6">
                            <h2>Garantías</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <?php if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) { ?>
                                <a href="?controller=garanty&method=new1" class="btn btn-danger float-right">+Agregar</a>
                            <?php }elseif(isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE){ ?>
                                <a href="?controller=garanty&method=excelComplete" class="btn btn-danger float-right">Generar Excel de todo el proceso</a>
                            <?php } ?>    
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable <?php echo $_SESSION['user']->cargo == "Administrador" ? 'js-exportable' : 'js-basic-example' ?>">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>No</th>
                                        <th>Fecha garantia</th>
                                        <th>Hora garantia</th>
                                        <th>Numero de factura</th>
                                        <th>Cliente</th>
                                        <th>Correo</th>
                                        <th>Aprobacion Garantia</th>
                                        <th>Estado</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($garanties as $key => $garanty) {
                                        if ($garanty->Estado == 'Tramite' ||
                                        $garanty->Estado == 'Pendiente por servicio tecnico' ||
                                        $garanty->Estado == 'Solucionado por servicio tecnico') { ?>
                                            <tr>
                                                <td>
                                                    <?php if ($garanty->Aprobacion_Garantia == 'SI' && $garanty->Estado == 'Tramite') { ?>
                                                            <div class="row clearfix">
                                                                <div class="col-xs-12">
                                                                    <form action="?controller=garanty&method=consecutive" method="POST">
                                                                        <input type="hidden" name="id" value="<?php echo $garanty->Id_Garantia ?>">
                                                                        <button type="submit" class="btn btn-primary"><i class="material-icons">assignment</i></button>
                                                                    </form>
                                                                    <br>
                                                                    <form action="?controller=garanty&method=ticket" method="POST">
                                                                        <input type="hidden" name="id" value="<?php echo $garanty->Id_Garantia ?>">
                                                                        <button type="submit" class="btn btn-success"><i class="material-icons">theaters</i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                <?php }else{ ?>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-12"> 
                                                            <form action="?controller=garanty&method=details" method="POST">
                                                                <input type="hidden" name="id" value="<?php echo $garanty->idD ?>">
                                                                <input type="hidden" name="name" value="<?php echo $garanty->DescripcionP?>">
                                                                <button type="submit" class="btn btn-warning"><i class="material-icons">+</i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                <?php } ?>    
                                                </td>
                                                <td><?php echo $garanty->No_garantia ?></td>
                                                <td><?php echo $garanty->Fecha_ingreso ?></td>
                                                <td><?php echo $garanty->Hora_ingreso ?></td>
                                                <td><?php echo $garanty->Numero_Factura ?></td>
                                                <td><?php echo $garanty->Nombre_Cliente ?></td>
                                                <td style="font-size: 10px"><?php echo $garanty->Correo_Cliente ?></td>
                                                <td><?php echo $garanty->Aprobacion_Garantia ?></td>
                                                <td><?php echo $garanty->Estado ?></td>
                                            </tr>
                                   <?php } 
                                   }?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
    </div>
</section>