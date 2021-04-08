<?php
date_default_timezone_set('America/Bogota');
$hora_actual = date("h:i a"); ?> 
<section class="content">
        <div class="container-fluid">
            <div class="block-header"> 
                <h2>
                    <a href="?controller=service&method=detailsThird&id=<?php echo $id?>" class="btn btn-danger"><<</a>
                    REGISTRAR NUEVOS TERCEROS
                    <small>Aqui puedes registrar un nuevo tercero para tenerlo consignado en la base de datos.</small>
                </h2>
            </div> 
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">  
                                    <form action="?controller=third&method=save" method="POST" id="form_validation">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <label>Nombre del nuevo tercero<small class="text-danger">*</small></label>
                                                <input type="text" name="Nombre_Proveedor" class="form-control" required>    
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
