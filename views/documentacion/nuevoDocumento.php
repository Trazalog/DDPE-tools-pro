<style>
.input-group-addon:hover{
    cursor: pointer;
    background-color: #04d61d !important;
}
.input-group-addon{
    background-color: #05b513 !important;
    color: white !important;
}
.ocultar .has-feedback .form-control-feedback{
    display: none !important;
}
</style>
<!--_______ FORMULARIO PERMISO DE TRANSITO BOX 1______-->
<div id="formAgregarDoc" style="display:none">
    <form class="formDocumentacion" id="formDocumentacion">
        <div class="row">
            <!--_______ COMIENZO 1° COLUMNA______-->
            <div class="col-md-6">
                <!-- <div class="box-tittle centrar">
                    <h3>Nuevo Documento</h3>
                </div> -->
                <input type="text" class="form-control hidden" name="petr_id" id="petr_id" value="<?php echo $petr_id?>">

                <!-- Mosaico de miniaturas con vista expandida y inst_id -->
                <?php $this->load->view(SICP.'documentacion/mosaicoDocumentos.php') ?>

            </div><!--FIN col-md-->
            <!--_______ Fin 1° COLUMNA ______-->

            <!--_______ COMIENZO 2° COLUMNA ______-->
            <div class="col-md-6">
                <!--Tipo-->
                <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                    <div class="form-group has-feedback">
                        <label for="tipo_documento">Tipo(<strong style="color: #dd4b39">*</strong>):</label>
                        <div class="input-group" style="width: 100%">
                            <select class="form-control select2 select2-hidden-accesible tipo_documento" name="tido_id" id="tipo_documento" style="width: 100%" data-bv-notempty data-bv-notempty-message="Campo Obligatorio *">
                                <option value="" disabled selected>- Seleccionar -</option>
                                <?php
                                    if(!empty($facturas)){ 
                                        foreach ($facturas as $tipos) {
                                            echo "<option data-json='".json_encode($tipos)."' value='".$tipos->tabl_id."'>".$tipos->descripcion."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!--________________-->

                <!--Número-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group has-feedback">
                        <label for="numero">Número(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control limitedChars" name="num_documento" id="numero" placeholder="Ingrese numero" data-bv-notempty data-bv-notempty-message="Campo Obligatorio *"/>
                    </div>
                </div>
                <!--________________-->

                <!--Emisor-->
                <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                    <div class="form-group has-feedback">
                        <label for="emisor">Emisor(<strong style="color: #dd4b39">*</strong>):</label>
                        <div class="input-group">
                            <select class="form-control select2 select2-hidden-accesible empresa" name="empr_id_emisor" id="emisor" style="width: 100%" data-bv-notempty data-bv-notempty-message="Campo Obligatorio *">
                                <option value="" disabled selected>- Seleccionar -</option>	
                            </select>
                            <span id="add_emisor" class="input-group-addon" data-toggle="modal" data-target="#mdl-empresa"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>                    
                </div>
                <!--________________-->

                <!--Destino-->
                <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                    <div class="form-group has-feedback">
                        <label for="destino">Destino(<strong style="color: #dd4b39">*</strong>):</label>
                        <div class="input-group">
                            <select class="form-control select2 select2-hidden-accesible empresa" name="empr_id_destino" id="destino" style="width: 100%" data-bv-notempty data-bv-notempty-message="Campo Obligatorio *">
                                <option value="" disabled selected>- Seleccionar -</option>	
                            </select>
                            <span id="add_destino" class="input-group-addon" data-toggle="modal" data-target="#mdl-empresa"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>                    
                </div>
                <!--________________-->
                <hr>
                <!--Producto-->
                <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                    <div class="form-group">
                        <label for="producto">Producto:</label>
                        <div class="input-group" style="width: 100%">
                            <select class="form-control select2 select2-hidden-accesible producto" name="tipr_id" id="producto" style="width: 100%">
                                <option value="" disabled selected>- Seleccionar -</option>
                                <?php
                                    if(!empty($productos)){ 
                                        foreach ($productos as $prod) {
                                            echo "<option data-json='".json_encode($prod)."' value='".$prod->tabl_id."'>".$prod->descripcion."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!--________________-->

                <!--U. Medida-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="medida">U. Medida:</label>
                        <div class="input-group" style="width: 100%">
                            <select class="form-control select2 select2-hidden-accesible medidas" name="unme_id" id="medidas" style="width: 100%">
                                <option value="" disabled selected>- Seleccionar -</option>
                                <?php
                                    if(!empty($un_medidas)){ 
                                        foreach ($un_medidas as $medidas) {
                                            echo "<option data-json='".json_encode($medidas)."' value='".$medidas->tabl_id."'>".$medidas->descripcion."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!--________________-->

                <!--Cantidad-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input class="form-control onlyNumbers" name="cantidad" id="cantidad" placeholder="Ingrese cantidad"/>
                    </div>
                </div>
                <!--________________-->

                <!--Unidades-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="unidades">Unidades:</label>
                        <input class="form-control onlyNumbers" name="unidades" id="unidades" placeholder="Ingrese unidades"/>
                    </div>
                </div>
                <!--________________-->

                <!--Precio Unitario-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="num_senasa">Precio Unitario:</label>
                        <input type="text" class="form-control limitedChars" name="precio_unitario" id="precio_unitario" placeholder="Ingrese precio unitario"/>
                    </div>
                </div>
                <!--________________-->

                <!--Descuento-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="descuento">Descuento:</label>
                        <input class="form-control onlyNumbers" name="descuento" id="descuento" placeholder="Ingrese descuento"/>
                    </div>
                </div>
                <!--________________-->
                
                <!--_________________ Agregar_________________-->
                <div class="form-group text-right">
                    <button type="button" class="btn btn-outline-dark" onclick="agregarProducto()" >Agregar</button>
                </div>                
                <!--__________________________________-->

            </div><!--FIN col-md-->
            <!--_______ Fin 2° COLUMNA ______-->
            
            <!--_______ COMIENZO 3° COLUMNA ______-->
            <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                <h3>Lineas:</h3>
                <div id="sec_productos">
                    <!-- ______ TABLA PRODUCTOS ______ -->
                    <table id="tabla_productos" class="table table-bordered table-striped">
                        <thead class="thead-dark" bgcolor="#eeeeee">
                            <th>Acciones</th>
                            <th>Producto</th>
                            <th>Medida</th>
                            <th>Cantidad</th>
                            <th>Unidades</th>
                            <th>P. Unitario</th>
                            <th>Descuento</th>
                            <th>P. Total</th>
                        </thead>
                        <tbody >
                        
                        </tbody>
                    </table>
                    <!--_______ FIN TABLA PRODUCTOS ______-->
                </div>
            </div>
            <!--_______ Fin 3° COLUMNA ______-->

        </div><!--FIN row-->
    </form>
</div>
<script>
// Config Tabla
DataTable($('#tabla_productos'));

$(document).ready(function () {
    $('.select2').select2();
    $('.empresa').select2({
        ajax: {
            url: "<?php echo SICP; ?>inspeccion/buscaEmpresas",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    patron: params.term, // parámetro búsqueda
                    page: params.page
                };
            },
            processResults: function (data, params) {
    
                params.page = params.page || 1;
                
                var results = [];
                $.each(data, function(i, obj) {
                    results.push({
                        id: obj.cuit,
                        text: obj.razon_social,
                    });
                });
                return {
                    results: results,
                    pagination: {
                        more: (params.page * 30) < results.length
                    }
                };
            }
        },
        placeholder: 'Buscar empresa',
        minimumInputLength: 3,
        templateResult: function (empresa) {

            if (empresa.loading) {
                return "Buscando empresas...";
            }

            var $container = $(
                "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__meta'>" +
                    "<div class='select2-result-repository__title'></div>" +
                    "<div class='select2-result-repository__description'></div>" +
                "</div>" +
                "</div>"
            );

            $container.find(".select2-result-repository__title").text(empresa.id);
            $container.find(".select2-result-repository__description").text(empresa.text);

            return $container;
        },
        templateSelection: function (empresa) {
            return empresa.text;
        },
        language: {
            noResults: function() {
                return '<option>No hay coincidencias</option>';
            },
            inputTooShort: function () {
                return 'Ingrese 3 o mas dígitos para comenzar la búsqueda'; 
            }
        },
        escapeMarkup: function(markup) {
            return markup;
        },
    });
    //Selecciono opciones guardadas en los combo's
    //EMPRESA ORIGEN
    empr_origen = "<?php echo isset($origen) ? $origen->cuit : null ?>";
    empr_origen_nombre = "<?php echo isset($origen) ? $origen->razon_social : null ?>";

    opcion = {'id': empr_origen, 'text': empr_origen_nombre};

    emprOpc = new Option(empr_origen_nombre, empr_origen, true, true);

    $('#emisor').append(emprOpc).trigger('change');
    $('#emisor').trigger({
        type: 'select2:select',
        params: {
            data: opcion
        }
    });
});
/******************************************************************************* */
//
//VALIDACIONES CARACTERES PERMITIDOS
//
//Filtro para NUMEROS, "/ -" inputs
//KeyCode: 111 = / , 109 = -
$(document).on("keydown", ".limitedChars", function(e) {
    if (e.which != 8 && e.which != 0 && e.which != 9 && e.which != 13 && e.which != 109 && e.which != 111 && e.which != 188 && (e.which < 48 || e.which > 57) && (e.which < 96 || e.which > 105) && (e.which < 37 || e.which > 40)) {
        e.preventDefault();
        alert("Caracteres válidos: 0-9, '/' , '-' y ','");
    }
});
//Filtro para solo numeros
//KeyCode: . = 110, . = 190
$(document).on("keydown", ".onlyNumbers", function(e) {
    if (e.which != 8 && e.which != 0 && e.which != 9 && e.which != 13 && e.which != 110 && e.which != 190 && (e.which < 48 || e.which > 57) && (e.which < 96 || e.which > 105) && (e.which < 37 || e.which > 40)) {
        e.preventDefault();
        alert("Caracteres validos: 0-9 y .");
    }
});
//Scripts para manipular data en tabla intermedia
//
//Agregar la informacion a la tabla
function agregarProducto(){
   //Informamos el campo vacio 
   var reporte = validarCampos();
                                
    if(reporte == ''){
        form = $('#formDocumentacion')[0];
        datos = new FormData(form);
        data = formToObject(datos);

        //Armo JSON para la fila
        producto = $('#producto').find(':selected').text();
        medida = $('#medidas').find(':selected').text();

        tabla = $('#tabla_productos').DataTable();

        //Caso remito no los tengo en cuenta
        if($("#tipo_documento") != '888-tipos_documentoREMITO'){
            
            precio_total = data.precio_unitario * data.unidades;
            //Puede poseer o no descuento
            if(data.descuento){
                precio_total -= data.descuento;
            }   
        }
        fila = "<tr data-json= '"+ JSON.stringify(data) +"'>" +
                '<td><button  type="button" title="Editar"  class="btn btn-primary btn-circle btnEditar" data-toggle="modal" data-target="#modaleditar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>&nbsp<button type="button" title="Eliminar" class="btn btn-primary btn-circle btnEliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true" ></span></button>&nbsp' +
                '<td>' + producto + '</td>' +
                '<td>' + medida + '</td>' +
                '<td>' + data.cantidad + '</td>' +
                '<td>' + data.unidades + '</td>' +
                '<td>' + data.precio_unitario + '</td>' +
                '<td>' + data.descuento + '</td>' +
                '<td>' + precio_total + '</td>' +
            '</tr>';
        tabla.row.add($(fila)).draw();

        //Limpio los inputs y combos
        $('#producto').val(null).trigger('change');
        $('#medidas').val(null).trigger('change');
        $('#cantidad').val('');
        $('#unidades').val('');
        $('#precio_unitario').val('');
        $('#descuento').val('');
        
        alertify.success(`Se agrego ${producto} correctamente!`);
    }else{
        Swal.fire(
            'Error..',
            reporte,
            'error'
        );
    }             
}
function validarCampos(){
        var valida = '';
        //Producto
		if($("#producto").val() == null){
			valida = "Seleccione producto!";
		}
        //Unidad de Medida
		if($("#medidas").val() == null){
			valida = "Seleccione unidad de medida!";
		}
        //Tipo Documento
		if($("#tipo_documento").val() == null){
			valida = "Seleccione tipo de documento!";
		}
        //Numero documento
		if($("#numero").val() == ""){
			valida = "Seleccione número de documento!";
		}
        //Cantidad
		if($("#cantidad").val() == ""){
			valida = "Complete cantidad!";
		}
        //Unidades
		if($("#unidades").val() == ""){
			valida = "Complete unidades!";
		}
        if($("#tipo_documento") == '888-tipos_documentoREMITO'){
            //Precio Unitario
            if($("#precio_unitario").val() == ""){
                valida = "Complete precio unitario!";
            }
        }
		return valida;
    }
//Fin scripts para agregar en tabla intermedia
//
//Eliminar registro tabla intermedia
//
$(document).on('click','.btnEliminar', function () {
    tabla = $('#tabla_productos').DataTable();
    tabla.row( $(this).parents('tr') ).remove().draw(); 
    alertify.success("Registro eliminado con exito!");
});
//
//Editar registro tabla intermedia
//
$(document).on('click','.btnEditar', function () {
    //Obtengo la fila
    tabla = $('#tabla_productos').DataTable();
    row = $(this).parents('tr');

    //Data parseada en json
    nodo = tabla.row(row).node();
    data = JSON.parse($(nodo).attr('data-json'));

    // le paso la data a los inputs
    $('#cantidad').val(data.cantidad);
    $('#unidades').val(data.unidades);
    $('#precio_unitario').val(data.precio_unitario);
    $('#descuento').val(data.descuento);
    
    //Selecciono producto
    $('#producto').val(data.tipr_id).trigger('change');
    //Selecciono Unidad de medida
    $('#medidas').val(data.unme_id).trigger('change');

    //elimino la row
    tabla.row( $(this).parents('tr') ).remove().draw(); 
    
});
//
//Fin scripts para manipular data en tabla intermedia
//
$("#tipo_documento").on('change', function () {
    if(this.value == '888-tipos_documentoREMITO'){
        $("#precio_unitario").prop("readonly", 'readonly');
        $("#descuento").prop("readonly", 'readonly');
        $("#precio_unitario").val("");
        $("#descuento").val("");
    }else{
        $("#precio_unitario").prop("readonly", false);
        $("#descuento").prop("readonly", false);
    }
});
//Permite moverme entre la pnatalla principal y la de agregar/editar
function cerrarDetalle(){
    
    $('#formAgregarDoc').hide();
    $("#tablaDocumentosBox").show();

    //Limpio formularios y tabla
    $('#tabla_productos').DataTable().clear().draw();// Tabla
    $('#formDocumentacion').trigger("reset");//input's
    //selects
    $('#producto').val(null).trigger('change');
    $('#medidas').val(null).trigger('change');
    $('#tipo_documento').val(null).trigger('change');
    $('.fotos').removeClass("selected");

    //Actualizo la tabla de la vista principal
    actualizaTablaDocumentos();

    //Reemplazo los botones standard de la notificacion
    $(".btn-success.btnNotifEstandar").text("Hecho");
    $(".btn-success.btnNotifEstandar").attr("onclick","existFunction('cerrarTarea')");
    $(".btn-primary.btnNotifEstandar").attr("onclick","cerrar()");
}

function guardarDetalle(){
    //VALIDACIONES
    //valido el formulario
    if(!frm_validar('#formDocumentacion')){
        Swal.fire(
            'Error..',
            'Debes completar los campos obligatorios (*)',
            'error'
        );
        return;
    }
    //Valido seleccion de foto
    if(!$('.fotos').hasClass("selected")){
        Swal.fire(
            'Error..',
            'Debe seleccionar una foto!',
            'error'
        );
        return;
    }
    //valído tabla no vacia
    tabla = $('#tabla_productos').DataTable(); 
    if ( ! tabla.data().any() ) {
        Swal.fire(
            'Error..',
            'No se cargaron datos en la tabla!',
            'error'
        );
        return;
    }
    //Luego de validar, guardo los formularios
    //Accion discrimina si guarda todo junto o solo edita detalles
    if(accion == "nuevo"){
        agregarDocumento().then((result) => {

            alertify.success(`Se cargo la documentacion correctamente!`);
            cerrarDetalle();

        }).catch((err) => {
            console.log(err);
        });
    }
    //Luego de guardar cierro el detalle del documento
    //Vuelvo a la pantalla principal de la tarea
    
}
//
// Guardo la documentacion cargada y su respectivo detalle
async function agregarDocumento () {

    tabla = $('#tabla_productos').DataTable();

    //tomo el formulario
    datos = new FormData($('#formDocumentacion')[0]);
    datos.append('case_id', $("#caseId").val());

    let documento = new Promise( function(resolve,reject){
        
        $.ajax({
            type: 'POST',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            url: "<?php echo SICP; ?>inspeccion/agregarDocumento",
            success: function(data) { 
                console.log("Se agrego el documento correctamente");
                rsp = JSON.parse(data);
                //Si es correcto, guardo los detalles de los documentos
                if(rsp.status){

                    //Loopeo sobre las filas de la tabla
                    detalles = [];
                    tabla.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
                        var datos = this.data();
                        nodo = this.node();
                        
                        var json = JSON.parse($(nodo).attr('data-json'));
                  
                        detalles[rowIdx] = json;
                    });

                    $.ajax({
                        type: 'POST',
                        data: {detalles},
                        dataType: "json",
                        url: "<?php echo SICP; ?>inspeccion/guardarDetallesDocumentos",
                        success: function(resp) {
                            
                            resolve("Se agrego el documento y su detalle correctamente");
                        
                        },
                        error: function(data) {
                            alert("Error al agregar los detalles del documento");
                            reject("Error");
                        }
                    });

                }else{
                    console.log(rsp.message);
                    reject("Error al agregar el documento");
                }
                 
            },
            error: function(data) {
                reject("Error al agregar el documento");
            }
        });
    });

    return await documento;
}
</script>