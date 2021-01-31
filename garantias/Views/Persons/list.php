<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    LISTA DE EMPLEADOS
                    <small>Aqui puedes visualisar los empleados que de manera vigente trabajan contigo</small>
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header row">
                            <div class="col-sm-6">
                                <h2>Empleados</h2>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="?controller=person&method=new1" class="btn btn-danger">+Agregar</a>
                            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Rol</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($persons as $person) { ?>
                                            <tr>
                                                <td><?php echo $person->nombre ?></td>
                                                <td><?php echo $person->apellidos ?></td>
                                                <td><?php echo $person->correo ?></td>
                                                <td><?php echo $person->telefono ?></td>
                                                <td><?php echo $person->cargo ?></td>
                                            </tr>
                                        <?php } ?>
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