<section class="content"> 
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                <a href="?controller=service" class="btn btn-danger"><<</a>
                EDICION DE SERVICIO TECNICO
                <small>Aqui puedes registrar el servicio tecnico dando las especificaciones necesarias</small>
            </h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                <div class="card">
                    <div class="header">
                        <h2>
                            Editar Orden de servicio
                        </h2>
                    </div>
                    <div class="body">
                        <form action="?controller=service&method=saveEdit" method="POST" id="form_validation" novalidate>
                            <input type="hidden" name="id" value="<?php echo $data[0]->id_sv?>">
                            <input type="hidden" name="idDetail" value="<?php echo $data[0]->idDetail?>">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <h2>CONSECUTIVO: <?php echo $data[0]->consecutivo ?></h2>
                                    <input type="hidden" class="form-control" name="consecutivo" value="<?php echo $data[0]->consecutivo ?>">
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Fecha</label>
                                            <input type="text" class="form-control" name="fecha" value="<?php echo $data[0]->fecha ?>" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Hora</label>
                                            <input type="text" class="form-control" name="hora" value="<?php echo $data[0]->hora ?>" readonly required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3>Datos del cliente</h3>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>NIT o CC:</label>                             
                                            <input class="form-control" name="identificacion_cliente" id="identificacion_cliente" value="<?php echo $data[0]->identificacion_cliente ?>" required readonly>       
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">    
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Nombre de cliente </label>
                                            <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente" required readonly value="<?php echo $data[0]->nombre_cliente?>">
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-sm-4" id="select2lista">   
                                </div>-->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Telefono de cliente </label>
                                            <input type="number" class="form-control" name="telefono_cliente" id="telefono_cliente" value="<?php echo $data[0]->telefono_cliente?>" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Direccion de cliente </label>
                                            <input type="text" class="form-control" name="direccion_cliente" id="direccion_cliente" value="<?php echo $data[0]->direccion_cliente?>" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Correo<small class="text-danger">*</small></label>
                                            <input type="email" class="form-control" name="correo_cliente" id="correo_cliente" value="<?php echo $data[0]->correo_cliente?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2>Informacion del producto  <button class="btn btn-danger" type="button" id="adicional" name="adicional">+Agregar producto</button></h2>
                            <input type="hidden" name="contador" id="contador" value="0">
                            <?php foreach ($data as $product) {?>
                                <div id="table">
                                   <div class="tde" data-section="section0">
                                        <button type="button" id="eliminar" class="btn btn-danger float-right">X</button>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label>¿Tiene codigo de DTX? Digitelo</label>
                                                        <input type="number"  name="codigo_producto[]" id="codigo_producto" class="form-control codigo_producto" value="<?php echo $product->codigo_producto?>">
                                                    </div>
                                                </div> 
                                            </div>
                                        </div> 
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label>Serie<small class="text-danger">*</small></label>
                                                        <input type="text" class="form-control" name="serie[]" id="serie" required value="<?php echo $product->serie?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label>Tipo de equipo<small class="text-danger">*</small></label>
                                                        <input type="text" class="form-control tipo_equipo" value="<?php echo $product->tipo_equipo?>" name="tipo_equipo[]" id="tipo_equipo" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label>Marca<small class="text-danger">*</small></label>
                                                        <input list="mark" class="form-control marca" value="<?php echo $product->marca?>" name="marca[]" id="marca" required>
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
                                                        <label>Modelo<small class="text-danger">*</small></label>
                                                        <input type="text" class="form-control modelo" value="<?php echo $product->modelo?>" name="modelo[]" id="modelo" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                   </div>
                                   <hr>
                                </div>
                            <?php } ?>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Observacion Cliente<small class="text-danger">*</small></label>
                                            <textarea rows="4" class="form-control no-resize" name="observacion_cliente" required><?php echo $data[0]->observacion_cliente?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Observacion Equipo<small class="text-danger">*</small></label>
                                            <textarea rows="4" class="form-control no-resize" name="observacion_equipo" required><?php echo $data[0]->observacion_equipo?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Fecha estimada<small class="text-danger">*</small></label>
                                            <input type="date" type="date" class="form-control" name="fecha_pactada" id="fecha_pactada" required value="<?php echo $data[0]->fecha_pactada?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Tecnico asignado<small class="text-danger">*</small></label>
                                            <select class="form-control" name='tecnico_asignado' required>
                                                <option><?php echo $data[0]->tecnico_asignado?></option>
                                                <?php foreach($technicals as $technical) { ?>
                                                    <option value="<?php echo $technical->nombre." ".$technical->apellidos ?>"><?php echo $technical->nombre." ".$technical->apellidos ?></option>
                                                <?php } ?> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Monto estimado<small class="text-danger">*</small></label>
                                            <input type="number" class="form-control" name="monto" id="monto" required value="<?php echo $data[0]->monto ?>">
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
            var i = $("#contador").val();
            i++;
            $("#table div:eq(0)").clone().attr("data-section", 'section'+i).appendTo("#table").find('input').val('');
            $("#contador").val(i);
            console.log(i);
        });
     
        // Evento que selecciona la fila y la elimina 
        $(document).on("click","#eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
        });
    });
</script>

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
<script type="text/javascript">
    //var i = document.getElementById('contador').value;

    $("#table").on('change', '.codigo_producto', function() {
        var codigo = $(this).val();
        var parent = $(this).closest('.tde').data('section');
        alerta2(codigo, parent);
    })

    function alerta2(codigo, parent) {
        // Creando el objeto para hacer el request
        var request = new XMLHttpRequest();

        // Objeto PHP que consultaremos
        request.open("POST", "Views/Service/servicesproducts.php?codigo="+codigo);

        // Definiendo el listener
        request.onreadystatechange = function() {
            // Revision si fue completada la peticion y si fue exitosa
            if (this.readyState === 4 && this.status === 200) {

                var data = JSON.parse(this.responseText);
                var data = data.toString().split(",");
                // Ingresando la respuesta obtenida del PHP
                $("div[data-section="+parent+"] .modelo").val(data[0])
                $("div[data-section="+parent+"] .tipo_equipo").val(data[1])
                $("div[data-section="+parent+"] .marca").val(data[2])
            }
        };

        // Recogiendo la data del HTML
        var myForm = document.getElementById("form_validation");
        var formData = new FormData(myForm);

        // Enviando la data al PHP
        request.send(formData);
    }
</script>