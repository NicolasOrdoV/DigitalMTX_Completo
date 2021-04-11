<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    LISTA DE SERVICIONES TECNICAS PARA PREFINALIZAR
                    <small>Aqui puedes visualisar los detalles de los servicios tecnicos y dar una solucion previa.</small>
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Servicios pendientes por prefinalizar
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable <?php echo $_SESSION['cargo'] == "Administrador" ? 'js-exportable ' : 'js-basic-example' ?>">
                                    <thead>
                                        <tr>
                                            <th>No</th>                                       
                                            <th>Serie</th>
                                            <th>Marca</th>
                                            <th>Estado</th>
                                            <th>Modelo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($details as $service) { ?>
                                            <tr>
                                                <td><?php echo $service->consecutivo ?></td>
                                                <td><?php echo $service->serie ?></td>
                                                <td><?php echo $service->marca ?></td>
                                                <td><?php echo $service->estado ?></td>
                                                <td><?php echo $service->modelo ?></td>
                                                <td>
                                                    <div class="row clearfix">
                                                        <?php if ($service->estado == "Reparación terminada") { ?>
                                                            <div class="col-sm-6">
                                                                <a href='?controller=service&method=detailsPreFinish&id=<?php echo $service->id ?>&name=<?php echo $service->modelo ?>' class="btn btn-warning"><i class="material-icons">add</i></a>
                                                            </div>
                                                        <?php }elseif($service->estado == "En reparación"){ ?>
                                                            <div class="col-sm-6">
                                                                <a href='?controller=service&method=detailsReparation&id=<?php echo $service->id_sv ?>&name=<?php echo $service->modelo ?>' class="btn btn-success"><i class="material-icons">add</i></a>
                                                            </div>
                                                        <?php } ?>    
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php }?>
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