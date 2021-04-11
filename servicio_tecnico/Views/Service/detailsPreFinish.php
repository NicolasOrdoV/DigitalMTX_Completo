<?php
date_default_timezone_set('America/Bogota');
$hora_actual = date("h:i a"); ?> 
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <a href="?controller=service&method=prefinish" class="btn btn-danger"><<</a>
                    PRE FINALIZACION
                    <small>Aqui puedes visualisar el detalle de los servicios realizados para dar una solucion previa</small>
                </h2>
            </div> 
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Detalle del servicio</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <h5>Consecutivo servicio</h5>
                                    <h1><?php echo $data[0]->consecutivo?></h1>
                                </div>
                                <div class="col-sm-3">
                                    <h5>Telefono del cliente para contacto:</h5>
                                    <p><?php echo $data[0]->telefono_cliente ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <h5>¿Se paso a un tercero? Este es el monto pactado</h5>
                                    <p><?php echo $data[0]->monto_tercero ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <h5>monto inicial:</h5>
                                    <p><?php echo $data[0]->monto ?></p>
                                </div>
                            </div>
                            <div class="row clearfix">
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
                                <div class="col-sm-12">
                                    <table class="table table-striped">
                                        <thead class="bg-red">
                                            <tr>
                                                <th>Fecha tecnico</th>
                                                <th>Hora tecnico</th>
                                                <th><h5>Observaciones del tecnico</h5></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data as $observation){ ?>
                                                <tr>
                                                    <td><?php echo $observation->fecha_tec?></td>
                                                    <td><?php echo $observation->hora_tec?></td>
                                                    <td><?php echo $observation->informe_tecnico ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12"> 
                                    <form action="?controller=service&method=savePre" method="POST" id="form_validation">
                                        <input type="hidden" name="id" value="<?php echo $data[0]->idsv?>">
                                        <input type="hidden" name="id_sv" value="<?php echo $data[0]->id?>">
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <label>Estado del tecnico<small class="text-danger">*</small></label>
                                                <select name="estado" class="form-control show-tick" required>
                                                    <option value="">Seleccione..</option>
                                                    <option value="Pre finalizado para entrega al cliente">Pre finalizado para entrega al cliente</option> 
                                                    <option value="Pre-finalizado para nota crédito">Pre-finalizado para nota crédito</option> 
                                                    <option value="Pre finalizado para caso cerrado">Pre finalizado para caso cerrado</option> 
                                                </select>    
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Monto final para cobrar<small class="text-danger">*</small></label>
                                                <input type="number" name="monto_final" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <button class="btn btn-danger">Registrar prefinalizacion</button>
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
