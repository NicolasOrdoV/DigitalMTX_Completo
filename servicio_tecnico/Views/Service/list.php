
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                LISTA DE SERVICIOS TECNICOS
                <small>Consulta los servicios</small>
            </h2>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header row">
                        <div class="col-sm-6">
                            <h2>Servicios tecnicos</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <?php if (isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE) { ?>
                                <a href="?controller=service&method=newService" class="btn btn-danger float-right">+Agregar</a>
                            <?php }elseif(isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE){ ?>
                                <a href="?controller=garanty&method=excelComplete" class="btn btn-danger float-right">Generar Excel de todo el proceso</a>
                            <?php } ?>    
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>No</th>
                                        <th>Fecha servicio</th>
                                        <th>Hora servicio</th>
                                        <th>Cliente</th>
                                        <th>Correo</th>
                                        <th>Estado</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($services as $service) { ?>
                                            <td>
                                                <a href="#" class="btn btn-success">+</a>
                                                <a href="#" class="btn btn-success">+</a>
                                            </td>
                                            <td><?php $service->consecutivo?></td>
                                            <td><?php $service->fecha ?></td>
                                            <td><?php $service->hora ?></td>
                                            <td><?php $service->nombre_cliente ?></td>
                                            <td><?php $service->correo_cliente ?></td>
                                            <td><?php $service->estado ?></td>
                                        <?php } ?>
                                    </tr>
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