<?php
date_default_timezone_set('America/Bogota');
$hora_actual = date("h:i a"); ?> 
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <a href="?controller=service&method=third" class="btn btn-danger"><<</a>
                    DETALLES DE SERVICIO A TERCEROS TERMINADOS
                    <small>Aqui puedes visualisar el detalle de los servicios de terceros de culminaron y se cambia el estado segun la valoracion de dicho tercero</small>
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
                                <div class="col-sm-4">
                                    <h5>Observaciones del cliente</h5>
                                    <p><?php echo $data[0]->observacion_cliente?></p>
                                </div>
                                <div  class="col-sm-4">
                                    <h5>Observacion del equipo:</h5>
                                    <p><?php echo $data[0]->observacion_equipo ?></p>
                                </div>
                                <div  class="col-sm-4">
                                    <h5>Monto del tercero:</h5>
                                    <p><?php echo $data[0]->monto_tercero ?></p>
                                </div>
                            </div> 
                            <div class="row clearfix">
                                <div class="col-sm-12"> 
                                    <form action="?controller=service&method=saveThirdComing" method="POST" id="form_validation">
                                        <input type="hidden" name="id_sv" value="<?php echo $data[0]->idS?>">
                                         <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <label>Estado final del tercero<small class="text-danger">*</small></label>
                                                <select name="estado_tecnico" class="form-control show-tick" required>
                                                    <option value="">Seleccione..</option>
                                                    <option value="Reparación terminada">Reparación terminada</option>
                                                    <option value="Emitir nota crédito">Emitir nota crédito</option>
                                                </select>    
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <button class="btn btn-danger">Registrar estado de tercero</button>
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
