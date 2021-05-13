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
                                    <h2>CONSECUTIVO: <?php echo "SV-".$td ?></h2>
                                    <input type="hidden" class="form-control" name="consecutivo" value="<?php echo "SV-" . $td; ?>">
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
                            <h2>Informacion del producto  <button class="btn btn-danger" type="button" id="adicional" name="adicional">+Agregar producto</button></h2>
                            <input type="hidden" name="contador" id="contador" value="0">
                            <div id="table">
                               <div class="tde" data-section="section0">
                                    <button type="button" id="eliminar" class="btn btn-danger float-right">X</button>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>¿Tiene codigo de DTX? Digitelo</label>
                                                    <input type="number"  name="codigo_producto[]" id="codigo_producto" class="form-control codigo_producto">
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Tipo de servicio<small class="text-danger">*</small></label>
                                                    <select name="tipo_servicio[]" id="tipo_servicio" class="form-control tipo_servicio" required>
                                                        <option>Seleccione...</option>
                                                        <?php foreach($types as $type){ ?>
                                                            <option value="<?php echo $type->tipo_servicio." - ". $type->precio?>"><?php echo $type->tipo_servicio." - $". $type->precio?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>    
                                        </div>
                                    </div> 
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Serie<small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" value="" name="serie[]" id="serie" required>
                                                </div>
                                            </div>
                                        </div>                                       
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Marca<small class="text-danger">*</small></label>
                                                    <input list="mark" class="form-control marca" value="" name="marca[]" id="marca" value="" required>
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
                                                    <input type="text" class="form-control modelo" value="" name="modelo[]" id="modelo" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Tipo de equipo<small class="text-danger">*</small></label>
                                                    <select class="form-control tipo_equipo" name="tipo_equipo[]" id="tipo_equipo0" required>
                                                        <option value="">Seleccione...</option>
                                                        <?php foreach($products as $p){ ?>
                                                            <option value="<?php echo $p->categoria?>"><?php echo $p->categoria?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="especificaciones" id="especificaciones0" style="visibility: collapse;">
                                            <h3>Especificaciones del servicio</h3>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th><label>SI</label></th>
                                                        <th><label>NO</label></th>
                                                        <th>Observaciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Memoria RAM</td>
                                                        <td><input type="checkbox" name="ram[]" class="ramSI" id="ram0" value=""></td>
                                                        <td><input type="checkbox" name="ram[]" class="ramNO" id="ram0" value=""></td>
                                                        <td><textarea rows="2" name="obRam[]" class="form-control no-resize obRam"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Disco duro</td>
                                                        <td><input type="checkbox" name="disco[]" class="discoSI" id="disco0" value=""></td>
                                                        <td><input type="checkbox" name="disco[]" class="discoNO" id="disco0" value=""></td>
                                                        <td><textarea rows="2" name="obDisco[]" class="form-control no-resize obDisco"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Daño fisico</td>
                                                        <td><input type="checkbox" name="danoFisico[]" class="danoSI" id="dano0" value=""></td>
                                                        <td><input type="checkbox" name="danoFisico[]" class="danoNO" id="dano0" value=""></td>
                                                        <td><textarea rows="2" name="obDanoFisico[]" class="form-control no-resize obDano"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Procesador</td>
                                                        <td><input type="checkbox" name="procesador[]" class="procesadorSI" id="procesador0" value=""></td>
                                                        <td><input type="checkbox" name="procesador[]" class="procesadorNO" id="procesador0" value=""></td>
                                                        <td><textarea rows="2" name="obProcesador[]" class="form-control no-resize obProc"></textarea></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> 
                               </div>
                               <hr>
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
                                                <option>Seleccione...</option>
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
                                            <input type="number" class="form-control" value="" name="monto" id="monto" required>
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

        $('#table').on('change','.tipo_equipo',function(){
            var select = $('#tipo_equipo0').val();
            var ramSI = $("#especificaciones0").find('.ramSI').val('');
            var ramNO = $("#especificaciones0").find('.ramNO').val('');
            var obRam = $("#especificaciones0").find('.obRam').val('');
            var discoSI = $("#especificaciones0").find('.discoSI').val('');
            var discoNO = $("#especificaciones0").find('.discoNO').val('');
            var obDisco = $("#especificaciones0").find('.obDisco').val('');
            var danoSI = $("#especificaciones0").find('.danoSI').val('');
            var danoNO = $("#especificaciones0").find('.danoNO').val('');
            var obDano = $("#especificaciones0").find('.obDano').val('');
            var procesadorSI = $("#especificaciones0").find('.procesadorSI').val('');
            var procesadorNO = $("#especificaciones0").find('.procesadorNO').val('');
            var obProcesador = $("#especificaciones0").find('.obProc').val('');
            if (select == 'PANTALLAS' || select == 'CELULARES' || select == 'TORRE' || select == 'COMPUTADOR' || select == 'TABLET') {
                $('#especificaciones0').css("visibility" , "visible");
                ramSI.closest('.tde').find('.ramSI').val('SI').prop('checked',false);
                ramNO.closest('.tde').find('.ramNO').val('NO').prop('checked',false);
                discoSI.closest('.tde').find('.discoSI').val('SI').prop('checked',false);
                discoNO.closest('.tde').find('.discoNO').val('NO').prop('checked',false);
                danoSI.closest('.tde').find('.danoSI').val('SI').prop('checked',false);
                danoNO.closest('.tde').find('.danoNO').val('NO').prop('checked',false);
                procesadorSI.closest('.tde').find('.procesadorSI').val('SI').prop('checked',false);
                procesadorNO.closest('.tde').find('.procesadorNO').val('NO').prop('checked',false);
            }else{
                $('#especificaciones0').css("visibility" , "collapse");

                ramSI.closest('.tde').find('.ramSI').val('');
                ramNO.closest('.tde').find('.ramNO').val('');
                obRam.closest('.tde').find('.obRam').val('');
                discoSI.closest('.tde').find('.discoSI').val('');
                discoNO.closest('.tde').find('.discoNO').val('');
                obDisco.closest('.tde').find('.obDisco').val('');
                danoSI.closest('.tde').find('.danoSI').val('');
                danoNO.closest('.tde').find('.danoNO').val('');
                obDano.closest('.tde').find('.obDano').val('');
                procesadorSI.closest('.tde').find('.procesadorSI').val('');
                procesadorNO.closest('.tde').find('.procesadorNO').val('');
                obProcesador.closest('.tde').find('.obProc').val('');
            }   
        });

        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
        $("#adicional").on('click', function(){
            var i = $("#contador").val();
            i++;
            var seccion = $("#table div:eq(0)").clone().attr("data-section", 'section'+i);
            seccion.appendTo("#table").find('input').val('');

            seccion.closest('.tde').find(".tipo_equipo").attr('id','tipo_equipo'+i);
            seccion.closest('.tde').find(".ramSI").attr('id','ram'+i);
            seccion.closest('.tde').find(".ramNO").attr('id','ram'+i);
            seccion.closest('.tde').find(".discoSI").attr('id','disco'+i);
            seccion.closest('.tde').find(".discoNO").attr('id','disco'+i);
            seccion.closest('.tde').find(".danoSI").attr('id','dano'+i);
            seccion.closest('.tde').find(".danoNO").attr('id','dano'+i);
            seccion.closest('.tde').find(".procesadorSI").attr('id','procesador'+i);
            seccion.closest('.tde').find(".procesadorNO").attr('id','procesador'+i);
            //-------------------------------------------------------------------------------
            seccion.closest('.tde').find('.especificaciones').attr('id','especificaciones'+i).css("visibility" , "collapse");
            $('#table').on('change','#tipo_equipo'+i,function(){
                var select = $("#tipo_equipo"+i).val();
                var ramSI = $("#especificaciones"+i).find('.ramSI').val('');
                var ramNO = $("#especificaciones"+i).find('.ramNO').val('');
                var obRam = $("#especificaciones"+i).find('.obRam').val('');
                var discoSI = $("#especificaciones"+i).find('.discoSI').val('');
                var discoNO = $("#especificaciones"+i).find('.discoNO').val('');
                var obDisco = $("#especificaciones"+i).find('.obDisco').val('');
                var danoSI = $("#especificaciones"+i).find('.danoSI').val('');
                var danoNO = $("#especificaciones"+i).find('.danoNO').val('');
                var obDano = $("#especificaciones"+i).find('.obDano').val('');
                var procesadorSI = $("#especificaciones"+i).find('.procesadorSI').val('');
                var procesadorNO = $("#especificaciones"+i).find('.procesadorNO').val('');
                var obProcesador = $("#especificaciones"+i).find('.obProc').val('');

                if (select == 'PANTALLAS' || select == 'CELULARES' || select == 'TORRE' || select == 'COMPUTADOR' || select == 'TABLET') {
                    $("#especificaciones"+i).css("visibility" , "visible");
                    ramSI.closest('.tde').find('.ramSI').val('SI').prop('checked',false);
                    ramNO.closest('.tde').find('.ramNO').val('NO').prop('checked',false);
                    discoSI.closest('.tde').find('.discoSI').val('SI').prop('checked',false);
                    discoNO.closest('.tde').find('.discoNO').val('NO').prop('checked',false);
                    danoSI.closest('.tde').find('.danoSI').val('SI').prop('checked',false);
                    danoNO.closest('.tde').find('.danoNO').val('NO').prop('checked',false);
                    procesadorSI.closest('.tde').find('.procesadorSI').val('SI').prop('checked',false);
                    procesadorNO.closest('.tde').find('.procesadorNO').val('NO').prop('checked',false);
                }else{
                    $("#especificaciones"+i).css("visibility" , "collapse");
                    ramSI.closest('.tde').find('.ramSI').val('');
                    ramNO.closest('.tde').find('.ramNO').val('');
                    obRam.closest('.tde').find('.obRam').val('');
                    discoSI.closest('.tde').find('.discoSI').val('');
                    discoNO.closest('.tde').find('.discoNO').val('');
                    obDisco.closest('.tde').find('.obDisco').val('');
                    danoSI.closest('.tde').find('.danoSI').val('');
                    danoNO.closest('.tde').find('.danoNO').val('');
                    obDano.closest('.tde').find('.obDano').val('');
                    procesadorSI.closest('.tde').find('.procesadorSI').val('');
                    procesadorNO.closest('.tde').find('.procesadorNO').val('');
                    obProcesador.closest('.tde').find('.obProc').val('');
                }   
            });
            $("#contador").val(i);
        });

        $('#table').on('change', '.tipo_servicio',function(){
            ActualizarMonto();
        });

        function ActualizarMonto(){
            var valor = 0;
            var temp = 0;
            $('.tipo_servicio').each(function(indice,elemento){
                temp = parseInt($(elemento).val().split(" - ")[1]);
                valor += temp;
            });
            $("#monto").val(valor);
        }

        // Evento que selecciona la fila y la elimina 
        $(document).on("click","#eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
            ActualizarMonto();
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