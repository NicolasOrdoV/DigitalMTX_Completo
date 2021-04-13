<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                HISTORICOS DE REVISIONES TECNICAS
                <small>Consulta los servicios</small>
            </h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header row">
                        <div class="col-sm-6">
                            <h2>Revisiones tecnicas</h2>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable <?php echo isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE ||isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE ? 'js-exportable' : 'js-basic-example' ?>">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Fecha revision</th>
                                        <th>Hora revision</th>
                                        <th>Marca producto</th>  
                                        <th>Estado</th>
                                        <th>Detalles</th>                
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dates as $service) { ?>
                                        <tr>
                                            <td><?php echo $service->consecutivo?></td>
                                            <td><?php echo $service->fecha ?></td>
                                            <td><?php echo $service->hora ?></td>
                                            <td><?php echo $service->marca ?></td>
                                            <td><?php echo $service->estado ?></td>
                                            <td>
                                                <div class="row clearfix">
                                                    <div class="col-xs-12">
                                                        <form action="?controller=revision&method=detailsStory" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $service->id_sv ?>">
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