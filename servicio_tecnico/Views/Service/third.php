<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                LISTA DE SERVICIOS TECNICOS REMITIDOS A TERCEROS
                <small>Consulta los servicios</small>
            </h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header row">
                        <div class="col-sm-6">
                            <h2>Servicios tecnicos remitidos a terceros</h2>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable <?php echo isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE ? 'js-exportable' : 'js-basic-example' ?>">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>No</th>
                                        <th>Fecha servicio</th>
                                        <th>Hora servicio</th>
                                        <th>Producto</th>
                                        <th>Modelo</th>
                                        <th>Estado</th>                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $service) { ?>
                                        <tr>
                                            <td>
                                                <div class="row clearfix">
                                                    <?php if($service->estado == 'Se pasa a un tercero'){ ?>
                                                        <div class="col-xs-12">
                                                            <form action="?controller=service&method=detailsThird" method="POST">
                                                                <input type="hidden" name="id" value="<?php echo $service->id ?>">
                                                                <button type="submit" class="btn btn-warning"><i class="material-icons">add</i></button>
                                                            </form>
                                                            <br>
                                                        </div>
                                                    <?php }elseif($service->estado == 'Tercero remitido'){ ?>
                                                        <div class="col-xs-12">
                                                            <form action="?controller=service&method=detailsThirdComing" method="POST">
                                                                <input type="hidden" name="id" value="<?php echo $service->id ?>">
                                                                <button type="submit" class="btn bg-black"><i class="material-icons">done</i></button>
                                                            </form>
                                                            <br>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <td><?php echo $service->consecutivo?></td>
                                            <td><?php echo $service->fecha ?></td>
                                            <td><?php echo $service->hora ?></td>
                                            <td><?php echo $service->modelo ?></td>
                                            <td><?php echo $service->tipo_equipo ?></td>
                                            <td><?php echo $service->estado ?></td>
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