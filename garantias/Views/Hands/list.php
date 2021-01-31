<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                LISTA DE FACTURAS
                <small>Consulta las facturas actuales y carga las nuevas que se generen</small>
            </h2>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header row">
                        <div class="col-sm-6">
                            <h2>Facturas</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <?php if (isset($_SESSION['recepcion'])&&$_SESSION['recepcion']==TRUE || isset($_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'])&&$_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']==TRUE) { ?>
                                <a href="?controller=handtohand&method=new1" class="btn btn-danger float-right">+Agregar</a>
                            <?php } ?>    
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable <?php echo $_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997'] ? 'js-exportable' : 'js-basic-example' ?>">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>fecha factura</th>
                                        <th>nit</th>
                                        <th>vendedor</th>
                                        <th>Numero factura</th>
                                        <th>Centro costo</th>
                                        <th>Referencia</th>
                                        <th>Cantidad</th>
                                        <th>neto</th>
                                        <th>Descripcion comentarios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bills as $bill) { ?>
                                        <tr>
                                            <td><?php echo $bill->id ?></td>
                                            <td><?php echo $bill->fecha_facturaG ?></td>
                                            <td><?php echo $bill->nit ?></td>
                                            <td><?php echo $bill->vendedor ?></td>
                                            <td><?php echo $bill->Numero_Factura ?></td>
                                            <td><?php echo $bill->Centro_costo ?></td>
                                            <td><?php echo $bill->Referencia ?></td>
                                            <td><?php echo $bill->Cantidad ?></td>
                                            <td><?php echo $bill->neto ?></td>
                                            <td><?php echo $bill->Descripcion_Comentarios ?></td>
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
