<?php
date_default_timezone_set('America/Bogota');
$hora_actual = date("h:i a"); ?> 
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <a href="?controller=service&method=story" class="btn btn-danger"><<</a>
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
                            <?php foreach($data as $product){ ?>
                                <div class="row clearfix">
                                    <div class="col-sm-2">
                                        <h5>Codigo del producto</h5>
                                        <p><?php echo $product->codigo_producto?></p>
                                    </div>
                                    <div class="col-sm-2">
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
                                    <div class="col-sm-2">
                                        <h5>Tipo de servicio</h5>
                                        <p><?php echo $product->tipo_servicio ?></p>
                                    </div>
                                </div>
                            <?php } ?>
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
                                            <table class="table">
                                                <thead class="bg-red">
                                                    <th>Fechas</th>
                                                    <th>Horas</th>
                                                    <th>Observaciones</th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($data as $consecutive){?>
                                                    <tr>
                                                        <td><?php echo $consecutive->fecha?></td>
                                                        <td><?php echo $consecutive->hora?></td>
                                                        <td><?php echo $consecutive->estado?></td>
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
            <!-- #END# Input -->
        </div>
    </section>
