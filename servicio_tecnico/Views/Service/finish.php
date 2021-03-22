<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    LISTA DE SERVICIONES TECNICAS PARA FINALIZAR
                    <small>Aqui puedes visualisar los detalles de los servicios tecnicos y dar una solucion definitiva.</small>
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Servicios pendientes por finalizar
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
                                        <?php foreach ($data as $service) { ?>
                                            <tr>
                                                <td><?php echo $service->consecutivo ?></td>
                                                <td><?php echo $service->serie ?></td>
                                                <td><?php echo $service->marca ?></td>
                                                <td><?php echo $service->estado ?></td>
                                                <td><?php echo $service->modelo ?></td>
                                                <td>
                                                    <div class="row clearfix">
                                                        <?php if($service->estado == 'Pre finalizado para entrega al cliente' || $service->estado == 'Pre-finalizado para nota crédito' || $service->estado == 'Pre finalizado para caso cerrado'){ ?>
                                                        <div class="col-sm-6">
                                                            <a href='?controller=service&method=detailsFinish&id=<?php echo $service->id_sv ?>' class="btn bg-pink"><i class="material-icons">add</i></a>
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