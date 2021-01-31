<?php
date_default_timezone_set('America/Bogota');
$hora_actual = date("h:i a");
$td = $total_data + 0001;
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                <a href="?controller=garanty&method=listGaranty" class="btn btn-danger"><<</a>
                REGISTRO DE GARANTIAS
                <small>Aqui puedes registrar la garantia y decides si la apruebas o no</small>
            </h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php if(isset($billFailed)){ ?>
                    <div class="alert alert-danger"><?php echo $billFailed['error']?></div>
                <?php }elseif(isset($failedError)) { ?>
                    <div class="alert alert-danger"><?php echo $failedError['error']?></div>
                <?php } ?>    
                <div class="card">
                    <div class="header">
                        <h2>
                            Ingresar Garantías
                        </h2>
                    </div>
                    <div class="body">
                        <form action="?controller=garanty&method=findBill" method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Numero_Factura o sello del producto</label>
                                            <input type="text" class="form-control" name="NumFactura" required autofocus value="<?php echo isset($_POST['NumFactura']) ? $_POST['NumFactura'] : '' ?>">
                                        </div>
                                        <?php if(isset($error)){ ?>
                                            <div class="text-danger"><?php echo $error['error']?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group form-float">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger my-3">Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="?controller=garanty&method=save" method="POST" id="form_validation" novalidate>
                            <?php if (!empty($details)) { ?>
                                <button type="button" class="btn btn-danger waves-effect m-r-20" data-toggle="modal" data-target="#largeModal">Garantías Asociadas</button>
                            <?php } ?>
                            <h1>Detalle de factura: <?php echo isset($bills[0]) ? $bills[0]->Numero_Factura : '' ?></h1>
                            <input type="hidden" name="Numero_Factura" value="<?php echo isset($bills) ? $bills[0]->Numero_Factura : '' ?>">
                            <input type="hidden" name="Empleado" value="<?php echo $_SESSION['user']->nombre ?>">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Numero Garantia</label>
                                            <input type="text" class="form-control" name="No_garantia" value="<?php echo "G-" . $td; ?>" readonly required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Fecha</label>
                                            <input type="text" class="form-control" name="Fecha_ingreso" value="<?php echo date('d/m/Y') ?>" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Hora</label>
                                            <input type="text" class="form-control" name="Hora_ingreso" value="<?php echo $hora_actual ?>" readonly required>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Punto de Venta</label>
                                            <input type="text" class="form-control" name="Punto_Venta" required readonly value="<?php echo isset($bills[0]) ? $bills[0]->centro : "" ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Fecha de Compra</label>
                                            <input type="text" class="form-control" name="Fecha_Compra" required readonly value="<?php echo isset($bills[0]) ? $bills[0]->fecha_factura : '' ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Cedula </label>
                                            <input type="text" autofocus class="form-control" name="Identificacion_Cliente" id="Identificacion_Cliente" value="<?php echo isset($bills[0]) ? $bills[0]->Identificacion_Cliente : '' ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Nombre de cliente </label>
                                            <input type="text" class="form-control" name="Nombre_Cliente" id="Nombre_Cliente" required readonly value="<?php echo isset($bills[0]) ? $bills[0]->Nombre_Cliente : '' ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-sm-4" id="select2lista">   
                                </div>-->
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Correo<small class="text-danger">*</small></label>
                                            <input type="email" class="form-control" name="Correo_Cliente" id="Correo_Cliente" value="<?php echo isset($bills[0]) ? $bills[0]->Correo_Cliente : '' ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Direccion </label>
                                            <input type="text" class="form-control" name="Direccion_Cliente" id="Direccion_Cliente" value="<?php echo isset($bills[0]) ? $bills[0]->Direccion_Cliente : '' ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <h3>Productos</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>¿Se aprueba <br>la garantia?</th>
                                            <th>Tiempo de garantia</th>
                                            <th>Codigo</th>
                                            <th>Descripcion</th>
                                            <th>Referencia</th>
                                            <th>Sello</th>
                                            <th>Marca</th>
                                            <th>Cantidad</th>
                                            <th>Proveedor</th>
                                            <th>Fecha proveedor</th>
                                            <th>Observacion del cliente</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($failedError)){ ?>
                                            <div class="alert alert-danger">
                                                <?php echo $failedError['errorGaranty']?>
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($bills)) {
                                            $i = 0;
                                            $productos = [];
                                            foreach ($bills as $key => $bif) {
                                                $productos = [
                                                    'Codigo' => $bif->codigo,
                                                    'Descripcion' => $bif->nombre,
                                                    'Referencia' => $bif->Referencia,
                                                    'Sello' => $bif->Descripcion_Comentarios,
                                                    'Marca' => $bif->marca,
                                                    'Cantidad' => $bif->Cantidad,
                                                    'garantia' => $bif->garantia
                                                ];
                                        ?>
                                                <tr>
                                                    <td>
                                                        <div class="demo-checkbox form-line">
                                                            <?php
                                                                if($productos['garantia'] == "0" || $productos['garantia'] == "Probado" || $productos['garantia'] == "0 meses"){
                                                            ?>
                                                            <input size="2" type="checkbox" id="md_checkbox_<?php echo $key + 1; ?>" class="chk-col-red" name="Aprobacion_Garantia[]" value="SI" onchange="javascript:habilitarCampos(<?php echo $key + 1?>);" disabled/>
                                                            <label for="md_checkbox_<?php echo $key + 1; ?>">SI</label>
                                                        <?php } else{ ?>
                                                            <input size="2" type="checkbox" id="md_checkbox_<?php echo $key + 1; ?>" class="chk-col-red" name="Aprobacion_Garantia[]" value="SI" onchange="javascript:habilitarCampos(<?php echo $key + 1?>);" />
                                                            <label for="md_checkbox_<?php echo $key + 1; ?>">SI</label>
                                                        <?php } ?>    
                                                        </div>
                                                    </td>
                                                    <td
                                                    <?php
                                                        if ($productos['garantia'] == "0" || $productos['garantia'] == "Probado" || $productos['garantia'] == "0 meses") { ?>
                                                            style="background-color: red; color: white;"
                                                        <?php } 
                                                    ?>
                                                    >
                                                        <span id="time1_<?php echo $key + 1?>" style="display: block;"><?php echo isset($productos['garantia']) ? $productos['garantia'] : '' ?></span>
                                                        <input type="text" size="5" name="time[]" class="form-control"  value="<?php echo isset($productos['garantia']) ? $productos['garantia'] : '' ?>" disabled readonly id="time_<?php echo $key + 1 ?>" style="display: none;" >
                                                    </td>
                                                    <td>
                                                        <span id="Codigo_Producto1_<?php echo $key+1 ?>" style="display: block;"><?php echo isset($productos['Codigo']) ? $productos['Codigo'] : '' ?></span>
                                                        
                                                        <input size="5" type="text" class="form-control" name="Codigo_Producto[]" id="Codigo_Producto_<?php echo $key+1 ?>" disabled readonly value="<?php echo isset($productos['Codigo']) ? $productos['Codigo'] : '' ?>" style="display: none;">
                                                        
                                                    </td>
                                                    <td>
                                                        <span id="Descripcion_Producto1_<?php echo $key + 1 ?>" style="display: block;"><?php echo isset($productos['Descripcion']) ? $productos['Descripcion'] : '' ?></span>
                                                        <textarea rows="5" type="text" class="form-control" name="Descripcion_Producto[]" id="Descripcion_Producto_<?php echo $key + 1 ?>" disabled readonly style="display: none;"><?php echo isset($productos['Descripcion']) ? $productos['Descripcion'] : '' ?></textarea>
                                                        
                                                    </td>
                                                    <td>
                                                        <span id="Referencia1_<?php echo $key + 1 ?>" style="display: block;"><?php echo isset($productos['Referencia']) ? $productos['Referencia'] : '' ?></span>
                                                        <input size="5" type="text" class="form-control" name="Referencia[]" disabled readonly value="<?php echo isset($productos['Referencia']) ? $productos['Referencia'] : '' ?>" id="Referencia_<?php echo $key + 1 ?>" style="display: none;">
                                                        
                                                    </td>
                                                    <td>
                                                        <span id="Sello_Producto1_<?php echo $key + 1 ?>" style="display: block;"><?php echo isset($productos['Sello']) ? $productos['Sello'] : '' ?></span>
                                                        <textarea rows="5" type="text" class="form-control" name="Sello_Producto[]" disabled readonly id="Sello_Producto_<?php echo $key + 1 ?>" style="display: none;"><?php echo isset($productos['Sello']) ? $productos['Sello'] : '' ?></textarea>
                                                        
                                                    </td>
                                                    <td>
                                                        <span id="Marca_Producto1_<?php echo $key + 1?>" style="display: block;"><?php echo isset($productos['Marca']) ? $productos['Marca'] : '' ?></span>
                                                        <input size="5" type="text" class="form-control" name="Marca_Producto[]" disabled readonly value="<?php echo isset($productos['Marca']) ? $productos['Marca'] : '' ?>" id="Marca_Producto_<?php echo $key + 1?>" style="display: none;">
                                                        
                                                        <input type="hidden" name="fecha_factura" value="<?php echo $bills[0]->fecha_factura ?>">
                                                    </td>
                                                    <td>
                                                        <span id="Cantidad_Producto1_<?php echo $key + 1 ?>" style="display: block;" ><?php echo isset($productos['Cantidad']) ? $productos['Cantidad'] : '' ?></span>
                                                        <input size="5" type="text" class="form-control" name="Cantidad_Producto[]" id="Cantidad_Producto_<?php echo $key + 1 ?>" disabled readonly value="<?php echo isset($productos['Cantidad']) ? $productos['Cantidad'] : '' ?>" style="display: none;">
                                                    </td>
                                                    <td id="content1_<?php echo $key + 1?>" style="visibility: hidden;">
                                                        <select name="Codigo_Proveedor[]" id="Codigo_Proveedor_<?php echo $key + 1 ?>" disabled class="form-control">
                                                            <option value="">Seleccione</option>
                                                            <?php foreach($providers as $provider){ ?>
                                                                <option value="<?php echo $provider->id?>"><?php echo $provider->id?></option>
                                                            <?php } ?>    
                                                        </select>
                                                    </td>
                                                    <td id="content2_<?php echo $key + 1?>" style="visibility: hidden;">
                                                        <input size="5" type="date" name="Fecha_Proveedor[]" class="form-control" disabled id="Fecha_Proveedor_<?php echo $key + 1 ?>">
                                                    </td>
                                                    <td id="content3_<?php echo $key + 1?>" style="visibility: hidden;">
                                                        <textarea size="5" rows="4" class="form-control no-resize" name="Observacion_Cliente[]" disabled id="Observacion_Cliente_<?php echo $key + 1 ?>"></textarea>
                                                    </td>
                                                </tr>
                                        <?php }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Flete(S/N)</label>
                                        <div class="demo-checkbox">
                                            <input type="radio" name="Flete" id="md_checkbox_21" class="radio-col-red" value="SI" onchange="javascript:ocultContent()" />
                                            <label for="md_checkbox_21">SI</label>
                                            <input type="radio" name="Flete" id="md_checkbox_22" class="radio-col-red" value="NO" onchange="javascript:showContent()" checked />
                                            <label for="md_checkbox_22">NO</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="content" style="display:none">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <p>
                                            <b>Departamento</b>
                                        </p>
                                        <select name="Departamento" class="form-control show-tick" id="lista1">
                                            <option value="0">Seleccione..</option>
                                            <?php foreach ($departaments as $departament) { ?>
                                                <option value="<?php echo $departament->Departamento ?>"><?php echo $departament->Departamento ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div id="select2lista" class="col-sm-6">

                                    </div>
                                    <!--<div class="col-sm-4">
                                        <p>
                                            <b>Municipio</b>
                                        </p>
                                        <select name="Municipio" class="form-control show-tick" >
                                            <option value="">Seleccione..</option>
                                            <option value="Cundinamarca">Cundinamarca</option>
                                            <option value="Bogota D.C">Bogota D.C</option>
                                            <option value="Comuna 12">Comuna 12</option>
                                            <option value="Miraflores">Miraflores</option>
                                        </select>
                                    </div>-->

                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label>Valor Flete </label>
                                                <input type="number" class="form-control" name="Valor_Flete">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label>Numero Guia </label>
                                                <input type="number" class="form-control" name="No_Guia">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>
                                            <b>Transportadora</b>
                                        </p>
                                        <select name="Transportadora" class="form-control show-tick">
                                            <option value="">Seleccione..</option>
                                            <?php foreach ($conveyors as $conveyor) { ?>
                                                <option value="<?php echo $conveyor->Transportadora ?>"><?php echo $conveyor->Transportadora ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Observacion Empleado<small class="text-danger">*</small></label>
                                            <textarea rows="4" class="form-control no-resize" name="Observacion_Empleado" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            <!-- Textarea -->
            <!--#END# Switch Button -->
        </div>
        <?php if (!empty($details)) {?>
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <?php foreach ($details as $detail) { ?>
                        <div class="modal-header bg-red">
                            <h4 class="modal-title" id="largeModalLabel">Numero Garantia: <?php echo $detail->No_garantia?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="largeModalLabel">Fecha ingreso</h4>
                                    <p><?php echo $detail->Fecha_ingreso ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Hora ingreso</h4>
                                    <p><?php echo $detail->Hora_ingreso ?></p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Numero Factura</h4>
                                    <p><?php echo $detail->Numero_Factura ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Punto Venta</h4>
                                    <p><?php echo $detail->Punto_Venta ?></p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Fecha Compra</h4>
                                    <p><?php echo $detail->Fecha_Compra ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Nombre Cliente</h4>
                                    <p><?php echo $detail->Nombre_Cliente?></p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Nombre Cliente</h4>
                                    <p><?php echo $detail->Fecha_Compra ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Identificacion Cliente</h4>
                                    <p><?php echo $detail->Identificacion_Cliente?></p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Correo Cliente</h4>
                                    <p><?php echo $detail->Correo_Cliente ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Direccion Cliente</h4>
                                    <p><?php echo $detail->Direccion_Cliente?></p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Flete</h4>
                                    <p><?php echo $detail->Flete?></p>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Valor Flete</h4>
                                    <p><?php echo $detail->Flete?></p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">No_Guia</h4>
                                    <p><?php echo $detail->No_Guia ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Transportadora</h4>
                                    <p><?php echo $detail->Flete?></p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Observacion Empleado</h4>
                                    <p><?php echo $detail->Observacion_Empleado ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Empleado</h4>
                                    <p><?php echo $detail->Empleado?></p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Codigo Producto</h4>
                                    <p><?php echo $detail->Codigo_Producto ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Descripcion Producto</h4>
                                    <p><?php echo $detail->Descripcion_Producto?></p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Marca Producto</h4>
                                    <p><?php echo $detail->Marca_Producto ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Sello Producto</h4>
                                    <p><?php echo $detail->Sello_Producto?></p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Aprobacion Garantia</h4>
                                    <p><?php echo $detail->Aprobacion_Garantia ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Observacion Cliente</h4>
                                    <p><?php echo $detail->Observacion_Cliente?></p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Referencia Producto</h4>
                                    <p><?php echo $detail->Referencia ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="modal-title" id="defaultModalLabel">Observacion Final</h4>
                                    <p><?php echo $detail->Observacion_Final?></p>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <h1 class="modal-title" id="defaultModalLabel"><b>Estado</b></h1>
                                    <p><b><?php echo $detail->Estado ?></b></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>    
                    </div>
                </div>
            </div>
        <?php } ?>
</section>
<script type="text/javascript">
    function habilitarCampos(key){

        tiempo = document.getElementById("time_"+ key);
        codigo = document.getElementById("Codigo_Producto_"+ key);
        descripcion = document.getElementById("Descripcion_Producto_"+ key);
        referencia = document.getElementById("Referencia_"+ key);
        sello = document.getElementById("Sello_Producto_"+ key);
        marca = document.getElementById("Marca_Producto_"+ key);
        cantidad = document.getElementById("Cantidad_Producto_"+ key);

        content1 = document.getElementById("content1_"+ key);
        content2 = document.getElementById("content2_"+ key);
        content3 = document.getElementById("content3_"+ key);
        
        codigoProveedor = document.getElementById("Codigo_Proveedor_"+ key);
        fechaProveedor = document.getElementById("Fecha_Proveedor_"+ key);
        observacion = document.getElementById("Observacion_Cliente_"+ key);
        checkbox = document.getElementById("md_checkbox_"+ key);

        /////////////////////////////////////////////////////////////
        tiempo1 = document.getElementById("time1_"+ key);
        codigo1 = document.getElementById("Codigo_Producto1_"+ key);
        descripcion1 = document.getElementById("Descripcion_Producto1_"+ key);
        referencia1 = document.getElementById("Referencia1_"+ key);
        sello1 = document.getElementById("Sello_Producto1_"+ key);
        marca1 = document.getElementById("Marca_Producto1_"+ key);
        cantidad1 = document.getElementById("Cantidad_Producto1_"+ key);

        if(checkbox.checked){
          tiempo.style.display = 'block';
          tiempo.disabled = false;
          tiempo.readonly = true;
          //------------------------//
          tiempo1.style.display = 'none';

          codigo.style.display = 'block';
          codigo.disabled = false;
          codigo.readonly = true;
          //------------------------//
          codigo1.style.display = 'none';

          descripcion.style.display = 'block';
          descripcion.disabled = false;
          descripcion.readonly = true;
          //----------------------------//
          descripcion1.style.display = 'none';

          referencia.style.display = 'block';
          referencia.disabled = false;
          referencia.readonly = true;
          //---------------------------//
          referencia1.style.display = 'none';

          sello.style.display = 'block';
          sello.disabled = false;
          sello.readonly = true;
          //--------------------------//
          sello1.style.display = 'none';

          marca.style.display = 'block';
          marca.disabled = false;
          marca.readonly = true;
          //---------------------------//
          marca1.style.display = 'none';

          cantidad.style.display = 'block';
          cantidad.disabled = false;
          cantidad.readonly = true;
          //-----------------------------//
          cantidad1.style.display = 'none';

          content1.style.visibility = 'visible';
          content2.style.visibility = 'visible';
          content3.style.visibility = 'visible';

          //codigoProveedor.style.display = 'block';
          codigoProveedor.disabled = false;
          fechaProveedor.disabled = false;
          observacion.disabled = false;

          codigoProveedor.required = true;
          fechaProveedor.required = true;
          observacion.required = true;
          //alert(key);
        }else{
            tiempo.style.display = 'none';
            tiempo.disabled = true;
            tiempo.readonly = false;
            //-----------------------//
            tiempo1.style.display = 'block';

            codigo.style.display = 'none';
            codigo.disabled = true;
            codigo.readonly = false;
            //-----------------------//
            codigo1.style.display = 'block';

            descripcion.style.display = 'none';
            descripcion.disabled = true;
            descripcion.readonly = false;
            //-------------------------//
            descripcion1.style.display = 'block';

            referencia.style.display = 'none';
            referencia.disabled = true;
            referencia.readonly = false;
            //-------------------------//
            referencia1.style.display = 'block';

            sello.style.display = 'none';
            sello.disabled = true;
            sello.readonly = false;
            //------------------------//
            sello1.style.display = 'block';

            marca.style.display = 'none';
            marca.disabled = true;
            marca.readonly = false;
            //-------------------------//
            marca1.style.display = 'block';

            cantidad.style.display = 'none';
            cantidad.disabled = true;
            cantidad.readonly = false;
            //----------------------------//
            cantidad1.style.display = 'block';
            
            //codigoProveedor.disabled = true;
            
            content1.style.visibility = 'hidden';
            content2.style.visibility = 'hidden';
            content3.style.visibility = 'hidden';

            fechaProveedor.value = "";
            observacion.value = "";
            codigoProveedor.value = "";
            
            codigoProveedor.disabled = true;
            fechaProveedor.disabled = true;
            observacion.disabled = true;

            codigoProveedor.required = false;
            fechaProveedor.required = false;
            observacion.required = false;
        }
    }
</script>
<!-- <script type="text/javascript">
    $(function() {
        $("#Identificacion_Cliente").autocomplete({
            source: "personal.php",
            minLength: 2,
            select: function(event, ui) {
                event.preventDefault();
                $('#Identificacion_Cliente').val(ui.item.Identificacion_Cliente);
                $('#Correo_Cliente').val(ui.item.Correo_Cliente);
                $('#Nombre_Cliente').val(ui.item.Nombre_Cliente);
                $("#Identificacion_Cliente").focus();
            }
        });
    });
</script> -->
<!--<script>
    document.getElementById("Codigo_Producto").onchange = function() {
        alerta2()
    };

    function alerta2() {
        // Creando el objeto para hacer el request
        var request = new XMLHttpRequest();

        // Objeto PHP que consultaremos
        request.open("POST", "Views/Garanty/services.php");

        // Definiendo el listener
        request.onreadystatechange = function() {
            // Revision si fue completada la peticion y si fue exitosa
            if (this.readyState === 4 && this.status === 200) {

                var data = JSON.parse(this.responseText);
                var data = data.toString().split(",");
                // Ingresando la respuesta obtenida del PHP
                document.getElementById("id_producto").value = data[0];
                document.getElementById("Descripcion_Producto").value = data[1];

            }
        };

        // Recogiendo la data del HTML
        var myForm = document.getElementById("form_validation");
        var formData = new FormData(myForm);

        // Enviando la data al PHP
        request.send(formData);
    }
</script>
<script>
    document.getElementById("Identificacion_Cliente").onchange = function() {
        alerta()
    };

    function alerta() {
        // Creando el objeto para hacer el request
        var request = new XMLHttpRequest();
        // Objeto PHP que consultaremos
        request.open("POST", "Views/Garanty/servicesclients.php");

        // Definiendo el listener
        request.onreadystatechange = function() {

            // Revision si fue completada la peticion y si fue exitosa
            if (this.readyState === 4 && this.status === 200) {
                // Ingresando la respuesta obtenida del PHP
                var data = JSON.parse(this.responseText);
                var data = data.toString().split(",");
                //alert(data[0]);
                //contenidosRecibidos = this.responseText.replace(contenidosRecibidos,'"]');

                document.getElementById("id").value = data[0];
                document.getElementById("Correo_Cliente").value = data[1];
                document.getElementById("Nombre_Cliente").value = data[2];

            }
        };


        // Recogiendo la data del HTML
        var myForm = document.getElementById("form_validation");
        var formData = new FormData(myForm);

        // Enviando la data al PHP
        request.send(formData);
    }
</script>-->


    <!-- jQuery UI -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    
    
<script type='text/javascript' >
    $( function() {

        $("#Codigo_Producto").autocomplete({
            source: function( request, response ) {
                console.log("je");
                $.ajax({
                    url: "fetchData.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                $('#Codigo_Producto').val(ui.item.label); // display the selected text
                $('#Descripcion_Producto').val(ui.item.value); // save selected id to input
                $('#selectuser_id1').val(ui.item.value); // save selected id to input
                $('#selectuser_id2').val(ui.item.codigo); // save selected id to input
                $('#selectuser_id3').val(ui.item.value); // save selected id to input
                $('#selectuser_id4').val(ui.item.value); // save selected id to input
                return false;
            }
        });

    });
        </script>

<script type="text/javascript">
    function showContent() {
        //Verificacion del la informacion que se mostrara en cuando el checkbox se igual a si
        element = document.getElementById("content");
        check = document.getElementById("md_checkbox_21");
        if (check.checked) {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    }
</script>
<script type="text/javascript">
    function ocultContent() {
        //Verificacion del la informacion que se mostrara en cuando el checkbox se igual a si
        element = document.getElementById("content");
        check = document.getElementById("md_checkbox_22");
        if (check.checked) {
            element.style.display = 'none';
        } else {
            element.style.display = 'block';
        }
    }
</script>
<script src="Assets/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#lista1').val(0);
        recargarLista();

        $('#lista1').change(function() {
            recargarLista();
        });
    })
</script>
<script type="text/javascript">
    function recargarLista() {
        $.ajax({
            type: "POST",
            url: "Views/Garanty/datos.php",
            data: "Municipio=" + $('#lista1').val(),
            success: function(r) {
                $('#select2lista').html(r);
            }
            //console.log(data);
        });
    }
</script>
