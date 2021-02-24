<section class="content">
    <div class="container-fluid">
        <!-- Input -->
        <div class="block-header">
            <h2>
                <a href="?controller=service" class="btn btn-danger"><<</a>
                REGISTRO DE CLIENTES
                <small>Aqui puedes registrar los clientes que no esten en la base de datos</small>
            </h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-red">
                        <h2>Registrar Nuevo Cliente</h2>
                    </div>
                    <div class="body">
                        <form action="?controller=client&method=save" method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" class="form-control" name="identificacion"></input>
                                            <label class="form-label">Cedula</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control " name="nombre"></input>
                                            <label class="form-label">Nombres</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control " name="apellido"></input>
                                            <label class="form-label">Apellidos</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="direccion"></input>
                                            <label class="form-label">Direccion</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" class="form-control " name="telefono"></input>
                                            <label class="form-label">Telefono</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" class="form-control " name="correo"></input>
                                            <label class="form-label">Correo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Guardar Cliente </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
</section>