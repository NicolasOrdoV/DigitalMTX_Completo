<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                LISTA DE SERVICIOS TECNICOS
                <small>Consulta los servicios</small>
            </h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header row">
                        <div class="col-sm-6">
                            <h2>Servicios tecnicos</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <?php if(isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE || isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE){ ?>
                                <a href="?controller=service&method=excelComplete" class="btn btn-danger float-right">Generar Excel de todo el proceso</a>
                            <?php } ?>    
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable <?php echo isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE ? 'js-exportable' : 'js-basic-example' ?>">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Fecha servicio</th>
                                        <th>Hora servicio</th>
                                        <th>Cliente</th>
                                        <th>Correo</th>
                                        <th>Estado</th>    
                                        <th>Detalles</th>                
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $service) { ?>
                                        <tr>
                                            <td><?php echo $service->consecutivo?></td>
                                            <td><?php echo $service->fecha ?></td>
                                            <td><?php echo $service->hora ?></td>
                                            <td><?php echo $service->nombre_cliente ?></td>
                                            <td><?php echo $service->correo_cliente ?></td>
                                            <td><?php echo $service->estado ?></td>
                                            <td>
                                                <div class="row clearfix">
                                                    <div class="col-xs-12">
                                                        <form action="?controller=service&method=details" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $service->id_sv ?>">
                                                            <input type="hidden" name="name" value="<?php echo $service->modelo ?>">
                                                            <button type="submit" class="btn btn-warning"><i class="material-icons">visibility</i></button>
                                                        </form>
                                                        <br>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>    
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>