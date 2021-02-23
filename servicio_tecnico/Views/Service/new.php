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
                        <form action="?controller=garanty&method=save" method="POST" id="form_validation" novalidate>
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
                                            <label>NIT O CC </label>
                                            <input type="text" autofocus class="form-control" name="identificacion_Cliente" id="Identificacion_Cliente">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <label>¿No existe el cliente en la base de datos? Puedes registrarlo aqui </label>
                                        <a href="#" class="btn btn-danger">+Crear cliente</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">    
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Nombre de cliente </label>
                                            <input type="text" class="form-control" name="nombre_cliente" id="Nombre_Cliente" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-sm-4" id="select2lista">   
                                </div>-->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Telefono de cliente </label>
                                            <input type="text" class="form-control" name="telefono_cliente" id="Telefono_Cliente" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Direccion de cliente </label>
                                            <input type="text" class="form-control" name="direccion_cliente" id="Direccion_Cliente" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Correo<small class="text-danger">*</small></label>
                                            <input type="email" class="form-control" name="correo_cliente" id="Correo_Cliente" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2>Informacion del producto<button class="btn btn-danger">+Agregar producto</button></h2>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>¿Tiene codigo de DTX? Digitelo</label>
                                            <input type="number" class="form-control" name="codigo_producto" id="codigo_producto">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <div class="form-group form-float">
                                        <button class="btn btn-danger float-right">X</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Serie</label>
                                            <input type="number" class="form-control" name="serie" id="serie">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Tipo de equipo</label>
                                            <input type="text" class="form-control" name="tipo_equipo" id="tipo_equipo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Marca</label>
                                            <select class="form-control" name="marca">
                                                <option>Seleccione...</option>
                                                <?php foreach ($marks as $mark) { ?>
                                                    <option value="<?php echo $mark->nombre?>"><?php echo $mark->nombre?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Modelo</label>
                                            <input type="text" class="form-control" name="modelo" id="modelo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
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
                                            <input type="date" type="date" class="form-control" name="fecha_pactada" id="fecha_pactada">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Tecnico asignado<small class="text-danger">*</small></label>
                                            <select class="form-control">
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
                                            <input type="number" class="form-control" name="monto" id="monto">
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
<!-- <script type="text/javascript">
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
</script> -->
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


<!----Funcionalidad de mostrar y ocultar la opcion de flete----->
<!-- <script type="text/javascript">
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
</script> -->

<!--Funcionalidad de filtracion de departamentos y municipios------------------>
<!-- <script src="Assets/js/jquery-2.2.4.min.js"></script>
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
</script> -->