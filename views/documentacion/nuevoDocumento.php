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
                        <input class="form-control" name="num_documento" id="numero" placeholder="Ingrese numero" data-bv-notempty data-bv-notempty-message="Campo Obligatorio *"/>
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
                            <span id="add_emisor" class="input-group-addon" data-toggle="modal" data-target="#mdl-empresa" onclick="$('#tipoEmpresa').val('Emisor')"><i class="fa fa-plus"></i></span>
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
                            <span id="add_destino" class="input-group-addon" data-toggle="modal" data-target="#mdl-empresa" onclick="$('#tipoEmpresa').val('Destino')"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>                    
                </div>
                <!--________________-->
                <hr>
                <!--Producto-->
                <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                    <div class="form-group">
                        <label for="producto">Producto(<strong style="color: #dd4b39">*</strong>):</label>
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
                        <label for="medida">U. Medida(<strong style="color: #dd4b39">*</strong>):</label>
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
                        <label for="cantidad">Cantidad(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control onlyNumbers" name="cantidad" id="cantidad" placeholder="Ingrese cantidad"/>
                    </div>
                </div>
                <!--________________-->

                <!--Unidades-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="unidades">Unidades:</label>
                        <input class="form-control" name="unidades" id="unidades" placeholder="Ingrese unidades"/>
                    </div>
                </div>
                <!--________________-->

                <!--Precio Unitario-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="precio_unitario">Precio Unitario(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="text" class="form-control" name="precio_unitario" id="precio_unitario" placeholder="Ingrese precio unitario"/>
                    </div>
                </div>
                <!--________________-->

                <!--Descuento-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="descuento">Descuento(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control" name="descuento" id="descuento" placeholder="Ingrese descuento"/>
                    </div>
                </div>
                <!--________________-->

                <!--Detalle Documento ID-->
                <input type="hidden" name="dedo_id" id="dedo_id">
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
                            <th style="width: 10% !important">Acciones</th>
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
    //Mascaras de los inputs
    $("#descuento").inputmask("percentage");
    $("#cantidad").inputmask("numeric");
    $("#unidades").inputmask("numeric");
    $("#precio_unitario").inputmask({alias: "numeric" ,prefix: "$ "});
});
/******************************************************************************* */
//Scripts para manipular data en tabla intermedia
//
//Agregar la informacion a la tabla
function agregarProducto(){
   //Informamos el campo vacio 
   var reporte = validarCampos();
                                
    if(reporte == ''){
        //Pantalla cargando
        wo();

        //Tomo los datos
        form = $('#formDocumentacion')[0];
        datos = new FormData(form);
        data = formToObject(datos);
        //Si la operacion es agregar en la edicion, el service responde con el dedo_id
        //se lo agrego al json que se asigna al data-json en la tabla
        dedo_id = "";

        //Armo JSON para la fila
        producto = $('#producto').find(':selected').text();
        medida = $('#medidas').find(':selected').text();

        tabla = $('#tabla_productos').DataTable();

        //Caso remito no los tengo en cuenta
        precio_total = "";
        if(!$("#tipo_documento").val().toUpperCase().includes('REMITO')){

            precio_unitario = data.precio_unitario.split(" ");
            precio_total = precio_unitario[1] * data.cantidad;
            
            //Puede poseer o no descuento
            if(data.descuento){
                aux = data.descuento.split(" ");
                descuento =  precio_total * (aux[0] / 100);
                precio_total -= descuento;
            }   
        }
        fila = "<tr data-json= '"+ JSON.stringify(data) +"'>" +
                '<td><button  type="button" title="Editar"  class="btn btn-primary btn-circle btnEditar" data-toggle="modal" data-target="#modaleditar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>&nbsp<button type="button" title="Eliminar" class="btn btn-primary btn-circle btnEliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true" ></span></button>&nbsp' +
                '<td>' + producto + '</td>' +
                '<td>' + medida + '</td>' +
                '<td>' + data.cantidad + '</td>' +
                '<td>' + data.unidades + '</td>' +
                '<td>$ ' + data.precio_unitario + '</td>' +
                '<td>' + data.descuento + '</td>' +
                '<td>$ ' + precio_total + '</td>' +
            '</tr>';

        //Si la accion es editar y posee dedo_id, puedo editar directamente el detalle del documento
        //Si no posee dedo_id y es accion editar, agrego el detalle del documento
        //Remuevo los simbolos agregados por el INPUTMASK
        //DESCUENTO
        descuento = data.descuento.split(" ");
        descuento = descuento[0] / 100 ;

        //PRECIO UNITARIO
        precio_unitario = data.precio_unitario.split(" ");
        precio_unitario = precio_unitario[1];

        data.precio_unitario = precio_unitario;
        data.descuento = descuento;

        if(accion == "editar"){

            if(data.dedo_id != ""){
                $.ajax({
                    type: 'POST',
                    data: {data},
                    dataType: "json",
                    url: "<?php echo SICP; ?>inspeccion/editarDetalleDocumento",
                    success: function(resp) {

                        if(resp.status){
                            //Agrego la fila a la tabla
                            tabla.row.add($(fila)).draw();

                            //Limpio los inputs y combos
                            $('#producto').val(null).trigger('change');
                            $('#medidas').val(null).trigger('change');
                            $('#cantidad').val('');
                            $('#unidades').val('');
                            $('#precio_unitario').val('');
                            $('#descuento').val('');
                            alertify.success("Se editó el detalle correctamente");
                        }else{
                            alertify.error("Error al agregar detalle");
                        }
                        //Cierro pantalla carga
                        wc();
                    },
                    error: function(data) {
                        //Cierro pantalla carga
                        wc();
                        alertify.error("Error al agregar detalle");
                    }
                });

            }else{

                $.ajax({
                    type: 'POST',
                    data: {data},
                    dataType: "json",
                    url: "<?php echo SICP; ?>inspeccion/agregarDetalleDocumento",
                    success: function(resp) {

                        if(resp.status){

                            jsonDataResp = JSON.parse(resp.data);
                            data.dedo_id = jsonDataResp.respuesta.dedo_id;

                            //Agrego la fila a la tabla
                            tabla.row.add($(fila)).draw();

                            //Limpio los inputs y combos
                            $('#producto').val(null).trigger('change');
                            $('#medidas').val(null).trigger('change');
                            $('#cantidad').val('');
                            $('#unidades').val('');
                            $('#precio_unitario').val('');
                            $('#descuento').val('');

                            alertify.success("Se editó el detalle correctamente");
                        }else{
                            alertify.error("Error al agregar detalle");
                        }

                        //Cierro pantalla carga
                        wc();
                    },
                    error: function(data) {
                        //Cierro pantalla carga
                        wc();
                        alertify.error("Error al agregar detalle");
                    }
                });
            }
        }else{

            //Agrego la fila a la tabla
            tabla.row.add($(fila)).draw();

            //Limpio los inputs y combos
            $('#producto').val(null).trigger('change');
            $('#medidas').val(null).trigger('change');
            $('#cantidad').val('');
            $('#unidades').val('');
            $('#precio_unitario').val('');
            $('#descuento').val('');

            //Cierro pantalla carga
            wc();
            alertify.success(`Se agrego ${producto} correctamente!`);
        }

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
		// if($("#unidades").val() == ""){
		// 	valida = "Complete unidades!";
		// }
        if(! $("#tipo_documento").val().toUpperCase().includes('REMITO')){
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

    if (confirm('¿Desea borrar el registro?')) {

        tabla = $('#tabla_productos').DataTable();

        if(accion == "editar"){
            
            datos = JSON.parse($(this).parents('tr').attr('data-json'));
            filaEliminar = this;
            dedo_id = {"dedo_id" : datos.dedo_id};
            
            $.ajax({
                    type: 'POST',
                    data: {dedo_id},
                    dataType: "json",
                    url: "<?php echo SICP; ?>inspeccion/eliminarDetalleDocumento",
                    success: function(resp) {

                        if(resp.status){

                            tabla.row( $(filaEliminar).parents('tr') ).remove().draw(); 
                            alertify.success("Registro eliminado correctamente!");

                        }else{
                            alertify.error("Error al eliminar detalle");
                        }
                    
                    },
                    error: function(data) {
                        alertify.error("Error al eliminar detalle");
                    }
                });
        }else{

            tabla.row( $(this).parents('tr') ).remove().draw(); 
            alertify.success("Registro eliminado correctamente!");
        }
    }
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
    $('#dedo_id').val(data.dedo_id);

    //Selecciono producto
    $('#producto').val(data.tipr_id).trigger('change');
    //Selecciono Unidad de medida
    $('#medidas').val(data.unme_id).trigger('change');

    //Los nombres de los atributos del objeto son diferentes en la accion agregar y editar
    if(accion == "editar"){
        //Selecciono producto
        $('#producto').val(data.tipo_producto_id).trigger('change');
        //Selecciono Unidad de medida
        $('#medidas').val(data.unidad_medida_id).trigger('change');
    }

    //elimino la row
    tabla.row( $(this).parents('tr') ).remove().draw(); 
    
});
//
//Fin scripts para manipular data en tabla intermedia
//
$("#tipo_documento").on('change', function () {
    if(this.value.toUpperCase().includes('REMITO')){
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
    $('.iconoDocs').hide();//oculta el icono de seleccionada

    //Actualizo la tabla de la vista principal
    actualizaTablaDocumentos();

    //Reemplazo los botones standard de la notificacion
    $("#btnHecho").text("Hecho");
    $("#btnCerrarVistaNotificacion").text("Cerrar");
    $("#btnHecho").attr("onclick","existFunction('cerrarTarea')");
    $("#btnCerrarVistaNotificacion").attr("onclick","cerrar()");
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

            alertify.success(result);
            cerrarDetalle();

        }).catch((err) => {
            console.log(err);
        });
    }else{
        editarDocumento().then((result) => {
            alertify.success(result);
            cerrarDetalle();

        }).catch((err) => {
            alertify.error(result);
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
                
                rsp = JSON.parse(data);
                //Si es correcto, guardo los detalles de los documentos
                if(rsp.status){

                    //Loopeo sobre las filas de la tabla
                    //Formateo precio_unitario y descuento porque tiene los prefijos
                    detalles = [];
                    tabla.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
                        var datos = this.data();
                        nodo = this.node();
                        
                        var json = JSON.parse($(nodo).attr('data-json'));

                        descuento = json.descuento.split(" ");
                        descuento = descuento[0] / 100 ;

                        precio_unitario = json.precio_unitario.split(" ");
                        precio_unitario = precio_unitario[1];

                        json.precio_unitario = precio_unitario;
                        json.descuento = descuento;

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
// Editar la documentacion cargada
async function editarDocumento () {

    tabla = $('#tabla_productos').DataTable();

    //tomo el formulario
    datos = new FormData($('#formDocumentacion')[0]);
    datos.append('case_id', $("#caseId").val());

    let docEdit = new Promise( function(resolve,reject){
        
        $.ajax({
            type: 'POST',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            url: "<?php echo SICP; ?>inspeccion/editarDocumento",
            success: function(data) { 
                
                rsp = JSON.parse(data);

                if(rsp.status){
    
                    resolve("Se editó el documento correctamente");
                        
                }else{
                    reject("Error al agregar el documento");
                }
                
            },
            error: function(data) {
                reject("Error al agregar el documento");
            }
        });
    });

    return await docEdit;
}
</script>