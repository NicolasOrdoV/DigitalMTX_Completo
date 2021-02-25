<?php
date_default_timezone_set('America/Bogota');
$hora_actual = date("h:i a");
$td = $total_data + 0001;
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                <a href="?controller=service" class="btn btn-danger"><<</a>
                REGISTRO DE SERVICIO TECNICO
                <small>Aqui puedes registrar el servicio tecnico dando las especificaciones necesarias</small>
            </h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                <div class="card">
                    <div class="header">
                        <h2>
                            Ingresar Orden de servicio
                        </h2>
                    </div>
                    <div class="body">
                        <form action="?controller=service&method=save" method="POST" id="form_validation" novalidate>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Numero Garantia</label>
                                            <input type="text" class="form-control" name="consecutivo" value="<?php echo "SV-" . $td; ?>" readonly required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Fecha</label>
                                            <input type="text" class="form-control" name="fecha" value="<?php echo date('d/m/Y') ?>" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Hora</label>
                                            <input type="text" class="form-control" name="hora" value="<?php echo $hora_actual ?>" readonly required>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3>Datos del cliente</h3>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>NIT o CC:</label>                             
                                            <input list="Id" autofocus class="form-control input-medium ui-autocomplete-input" name="identificacion_cliente" id="identificacion_cliente" value="" autocomplete="off" required>
                                            <datalist id="Id">
                                                <?php foreach ($users as $user) { ?>
                                                    <option value="<?php echo $user->identificacion ?>"><?php echo $user->identificacion ?></option>
                                                <?php } ?>
                                            </datalist>        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <label>¿No existe el cliente en la base de datos? Puedes registrarlo aqui </label>
                                        <a href="?controller=client&method=newClient" class="btn btn-danger">+Crear cliente</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">    
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Nombre de cliente </label>
                                            <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-sm-4" id="select2lista">   
                                </div>-->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Telefono de cliente </label>
                                            <input type="number" class="form-control" name="telefono_cliente" id="telefono_cliente" value="" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Direccion de cliente </label>
                                            <input type="text" class="form-control" name="direccion_cliente" id="direccion_cliente" value="" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Correo<small class="text-danger">*</small></label>
                                            <input type="email" class="form-control" name="correo_cliente" id="correo_cliente" value="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2>Informacion del producto      <button class="btn btn-danger" type="button" id="adicional" name="adicional">+Agregar producto</button></h2>
                            <div id="table">
                                <button type="button" id="eliminar" class="btn btn-danger float-right">X</button>
                               <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label>¿Tiene codigo de DTX? Digitelo</label>
                                                <!-- <input list="IdP" autofocus class="form-control input-medium ui-autocomplete-input" name="codigo_producto" id="codigo_producto" value="" autocomplete="off" required> -->
                                                <input type="number"  name="codigo_producto[]" id="codigo_producto" class="form-control">
                                               <!--  <datalist id="IdP">
                                                    <?php foreach ($products as $product) { ?>
                                                        <option value="<?php echo $product->codigo ?>"><?php echo $product->codigo ?></option>
                                                    <?php } ?>
                                                </datalist>   -->  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label>Serie</label>
                                                <input type="text" class="form-control" value="" name="serie[]" id="serie" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label>Tipo de equipo</label>
                                                <input type="text" class="form-control" value="" name="tipo_equipo[]" id="tipo_equipo" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label>Marca</label>
                                                <input list="mark" class="form-control" value="" name="marca[]" id="marca" value="" required>
                                                <datalist id="mark">
                                                    <option>Seleccione...</option>
                                                    <?php foreach ($marks as $mark) { ?>
                                                        <option value="<?php echo $mark->nombre?>"><?php echo $mark->nombre?></option>
                                                    <?php } ?>
                                                </datalist>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label>Modelo</label>
                                                <textarea rows="3" class="form-control" value="" name="modelo[]" id="modelo" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Observacion Cliente<small class="text-danger">*</small></label>
                                            <textarea rows="4" class="form-control no-resize" name="observacion_cliente" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Observacion Equipo<small class="text-danger">*</small></label>
                                            <textarea rows="4" class="form-control no-resize" name="observacion_equipo" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Fecha estimada<small class="text-danger">*</small></label>
                                            <input type="date" type="date" class="form-control" name="fecha_pactada" id="fecha_pactada" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Tecnico asignado<small class="text-danger">*</small></label>
                                            <select class="form-control" name='tecnico_asignado' required>
                                                <option>Seleccione</option>
                                                <option value="PEPE">Pepe</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Monto estimado<small class="text-danger">*</small></label>
                                            <input type="number" class="form-control" name="monto" id="monto" required>
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
</section>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>

<script type="text/javascript">        
    $(function(){
        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
        $("#adicional").on('click', function(){
            $("#table").clone().appendTo("#table");
        });
     
        // Evento que selecciona la fila y la elimina 
        $(document).on("click","#eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
        });
    });
</script>
<!-- <script type="text/javascript">
    $(function() {
        $("#identificacion_cliente").autocomplete({
            source: "users.php",
            minLength: 2,
            select: function(event, ui) {
                event.preventDefault();
                $('#identificacion_cliente').val(ui.item.identificacion);
                $('#correo_cliente').val(ui.item.correo);
                $('#nombre_cliente').val(ui.item.nombre);
                $('#direccion_cliente').val(ui.item.direccion);
                $('#telefono_cliente').val(ui.item.telefono);
                $("#identificacion_cliente").focus();
            }
        });
    });
</script> -->
<!-- <script type="text/javascript">
    $(function() {
        $("#codigo_producto").autocomplete({
            source: "products.php",
            minLength: 2,
            select: function(event, ui) {
                event.preventDefault();
                $('#codigo_producto').val(ui.item.codigo);
                $('#marca').val(ui.item.marca);
                $('#tipo_equipo').val(ui.item.tipo);
                $("#codigo_producto").focus();
            }
        });
    });
</script> -->
<script>
    document.getElementById("identificacion_cliente").onchange = function() {
        alerta()
    };

    function alerta() {
        // Creando el objeto para hacer el request
        var request = new XMLHttpRequest();
        // Objeto PHP que consultaremos
        request.open("POST", "Views/Service/servicesclients.php");

        // Definiendo el listener
        request.onreadystatechange = function() {

            // Revision si fue completada la peticion y si fue exitosa
            if (this.readyState === 4 && this.status === 200) {
                // Ingresando la respuesta obtenida del PHP
                var data = JSON.parse(this.responseText);
                var data = data.toString().split(",");
                //alert(data[0]);
                //contenidosRecibidos = this.responseText.replace(contenidosRecibidos,'"]');

                document.getElementById("correo_cliente").value = data[0];
                document.getElementById("nombre_cliente").value = data[1];
                document.getElementById("direccion_cliente").value = data[2];
                document.getElementById("telefono_cliente").value = data[3];

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
    document.getElementById("codigo_producto").onchange = function() {
        alerta2()
    };

    function alerta2() {
        // Creando el objeto para hacer el request
        var request = new XMLHttpRequest();

        // Objeto PHP que consultaremos
        request.open("POST", "Views/Service/servicesproducts.php");

        // Definiendo el listener
        request.onreadystatechange = function() {
            // Revision si fue completada la peticion y si fue exitosa
            if (this.readyState === 4 && this.status === 200) {

                var data = JSON.parse(this.responseText);
                var data = data.toString().split(",");
                // Ingresando la respuesta obtenida del PHP
                document.getElementById("modelo").value = data[0];
                document.getElementById("tipo_equipo").value = data[1];
                document.getElementById("marca").value = data[2];

            }
        };

        // Recogiendo la data del HTML
        var myForm = document.getElementById("form_validation");
        var formData = new FormData(myForm);

        // Enviando la data al PHP
        request.send(formData);
    }
</script>