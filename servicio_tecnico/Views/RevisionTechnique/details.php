<?php
date_default_timezone_set('America/Bogota');
$hora_actual = date("h:i a"); ?> 
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <a href="?controller=revision&name=<?php echo $_SESSION['nombre'] ?>" class="btn btn-danger"><<</a>
                    DETALLES DE SERVICIO
                    <small>Aqui puedes visualisar el detalle de los servicios para empezar a reparar y dar tus conclusiones</small>
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
                            <?php if(isset($consecutives)){ ?>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <table class="table">
                                                <thead class="bg-red">
                                                    <th>Fechas</th>
                                                    <th>Horas</th>
                                                    <th>Observaciones</th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($consecutives as $consecutive){?>
                                                    <tr>
                                                        <td><?php echo $consecutive->fecha_tec?></td>
                                                        <td><?php echo $consecutive->hora_tec?></td>
                                                        <td><?php echo $consecutive->informe_tecnico?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                               <?php } ?>
                            <?php if($data[0]->estado == "Tramite" || $data[0]->estado == "Sin revisar" || $data[0]->estado == "En reparación"){?>   
                            <div class="row clearfix">
                                <div class="col-sm-12"> 
                                    <form action="?controller=revision&method=save" method="POST" id="form_validation">
                                        <input type="hidden" name="id_sv" value="<?php echo $data[0]->idDetalle?>">
                                        <input type="hidden" name="Id_Empleado" value="<?php echo $_SESSION['id']?>
                                        ">
                                        <input type="hidden" name="fecha_tec" class="form-control" value="<?php echo date('Y/m/d') ?>">
                                         <input type="hidden" name="hora_tec" class="form-control" value="<?php echo $hora_actual ?>">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize" name="informe_tecnico" required></textarea>
                                                <label class="form-label">Observacion tecnico</label>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <label>Estado del tecnico<small class="text-danger">*</small></label>
                                                <select name="estado_tecnico" class="form-control show-tick" required>
                                                    <option value="">Seleccione..</option>
                                                    <option value="En reparación">En reparación</option>
                                                    <option value="Reparación terminada">Reparación terminada</option>
                                                    <option value="Emitir nota crédito">Emitir nota crédito</option>
                                                    <option value="Se pasa a un tercero">Se pasa a un tercero</option>
                                                </select>    
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <button class="btn btn-danger">Registrar observación</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
    </section>
