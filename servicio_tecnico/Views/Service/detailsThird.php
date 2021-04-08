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
                                <div class="col-sm-2">
                                    <h5>Codigo del producto</h5>
                                    <p><?php echo $data[0]->codigo_producto?></p>
                                </div>
                                <div class="col-sm-3">
                                    <h5>modelo</h5>
                                    <p><?php echo $data[0]->modelo?></p>
                                </div>
                                <div class="col-sm-2">
                                    <h5>Serie</h5>
                                    <p><?php echo $data[0]->serie?></p>
                                </div>
                                <div class="col-sm-2">
                                    <h5>Tipo de equipo</h5>
                                    <p><?php echo $data[0]->tipo_equipo?></p>
                                </div>
                                <div class="col-sm-2">
                                    <h5>Marca</h5>
                                    <p><?php echo $data[0]->marca?></p>
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
                                        <input type="hidden" name="id_sv" value="<?php echo $data[0]->idS?>">
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <label>¿A que tercero se remitira?</label>
                                                <select name="nombre_tercero" class="form-control show-tick">
                                                    <option>Seleccione...</option>
                                                    <?php foreach($providers as $proveedor){ ?>
                                                        <option value="<?php echo $proveedor->Nombre_Proveedor ?>"><?php echo $proveedor->Nombre_Proveedor ?></option>
                                                    <?php } ?>
                                                </select>    
                                            </div>
                                            <div class="col-sm-6">
                                                <label>¿El proveedor no esta en la lista? Por favor registrelo aqui</label>
                                                <a href="?controller=third&method=new&id=<?php echo $id?>" class="btn btn-danger">+Crear tercero</a>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <label>Numero orden del tercero<small class="text-danger">*</small></label>
                                                <input type="text" name="orden_tercero" class="form-control" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Monto del tercero<small class="text-danger">*</small></label>
                                                <input type="number" name="monto_tercero" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <label>¿Por que se remite al tercero?<small class="text-danger">*</small></label>
                                                <textarea rows="4" class="form-control" name="observacion_razon_tercero" required></textarea>
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
