<?php
date_default_timezone_set('America/Bogota');
$hora_actual = date("h:i a"); ?> 
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <a href="?controller=service&method=finish" class="btn btn-danger"><<</a>
                    FINALIZACION
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
                                <div class="col-sm-6">
                                    <h5>Consecutivo servicio</h5>
                                    <h1><?php echo $data[0]->consecutivo?></h1>
                                </div>
                                <div class="col-sm-6">
                                    <h5>Estado del servicio</h5>
                                    <p><?php echo $data[0]->estado?></p>
                                </div>
                            </div>
                            <?php foreach($data as $product){ ?>
                                <div class="row clearfix">
                                    <div class="col-sm-2">
                                        <h5>Codigo del producto</h5>
                                        <p><?php echo $product->codigo_producto?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>modelo</h5>
                                        <p><?php echo $product->modelo?></p>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Serie</h5>
                                        <p><?php echo $product->serie?></p>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Tipo de equipo</h5>
                                        <p><?php echo $product->tipo_equipo?></p>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Marca</h5>
                                        <p><?php echo $product->marca?></p>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row clearfix">
                                <div class="col-sm-12">                                   
                                    <table class="table">
                                        <thead class="bg-red">
                                            <tr>
                                                <th>Tecnico asignado</th>
                                                <th>Fecha prevista</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data as $finish){ ?>
                                                <tr>
                                                    <td><?php echo $finish->tecnico_asignado ?></td>
                                                    <td><?php echo $finish->fecha ?></td>
                                                    <td><?php echo $finish->estado ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-12 text-left">                          
                                    <?php
                                        $suma = 0;
                                        foreach ($data as $s) {
                                           $suma += $s->monto_final;
                                        }
                                        //echo $num;
                                        echo '<h2>Monto: $'.$data[0]->monto.'</h2>
                                              <h2>Monto final: $'.$suma.'</h2>';     
                                    ?>                                    
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12"> 
                                    <form action="?controller=service&method=saveFi" method="POST" id="form_validation">
                                        <?php foreach($data as $id){ ?>
                                            <input type="hidden" name="id[]" value="<?php echo $id->id?>">
                                        <?php } ?>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <label>Estado final<small class="text-danger">*</small></label>
                                                <select name="estado" class="form-control show-tick" required>
                                                    <option value="">Seleccione..</option>
                                                    <option value="Finalizado para entrega al cliente">Finalizado para entrega al cliente</option> 
                                                    <option value="Finalizado para nota crédito">Finalizado para nota crédito</option> 
                                                    <option value="Finalizado para caso cerrado">Finalizado para caso cerrado</option> 
                                                </select>    
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <button class="btn btn-danger">Registrar finalizacion</button>
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
