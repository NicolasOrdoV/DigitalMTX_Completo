<?php
date_default_timezone_set('America/Bogota');
$hora_actual = date("h:i a"); ?> 
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <a href="?controller=service&method=third" class="btn btn-danger"><<</a>
                    DETALLES DE SERVICIO A TERCEROS
                    <small>Aqui puedes visualisar el detalle de los servicios de terceros para asignar la persona con la que el producto estara en revision</small>
                </h2>
            </div> 
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <h5>Consecutivo servicio</h5>
                                    <h1><?php echo $data[0]->consecutivo?></h1>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h5>Observaciones del cliente</h5>
                                    <p><?php echo $data[0]->observacion_cliente?></p>
                                </div>
                                <div  class="col-sm-6">
                                    <h5>Observacion del equipo:</h5>
                                    <p><?php echo $data[0]->observacion_equipo ?></p>
                                </div>
                            </div> 
                            <div class="row clearfix">
                                <div class="col-sm-12"> 
                                    <form action="?controller=service&method=saveThird" method="POST" id="form_validation">
                                        <input type="hidden" name="id_sv" value="<?php echo $data[0]->id?>">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <label>¿A que tercero se remitira?<small class="text-danger">*</small></label>
                                                <select name="nombre_tercero1" class="form-control show-tick">
                                                    <option>Seleccione...</option>
                                                    <?php foreach($providers as $proveedor){ ?>
                                                        <option value="<?php echo $proveedor->Nombre_Proveedor ?>"><?php echo $proveedor->Nombre_Proveedor ?></option>
                                                    <?php } ?>
                                                </select>    
                                            </div>
                                            <div class="col-sm-12">
                                                <label>¿El proveedor no esta en la lista? Por favor escribalo de manera manual</label>
                                                <input type="text" class="form-control" name="nombre_tercero2">
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">

                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <button class="btn btn-danger">Registrar tercero</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
    </section>
