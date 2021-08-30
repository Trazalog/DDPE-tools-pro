<?php $this->load->view(SICP."inspeccion/modales.php"); ?>
<?php $this->load->view(SICP."documentacion/nuevoDocumento.php"); ?>
<div id="tablaDocumentosBox">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12">
            <h3 style="display: inline-block;">Documentación</h3>
            <button type="button" id="btnAgregar" class="btn btn-primary" aria-label="Left Align" style="margin-left: 20px;margin-bottom: 10px;">
                    Agregar
            </button>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- ______ TABLA DOCUMENTOS ______ -->
            <table id="tabla_documentos" class="table table-bordered table-striped">
                <thead class="thead-dark" bgcolor="#eeeeee">
                    <th style="width: 10%;">Acciones</th>
                    <th>Número</th>
                    <th>Emisor</th>
                    <th>Destinatario</th>
                    <th>Tipo</th>
                    <th style="width: 10%;">Fecha</th>
                    <th>Monto Bruto</th>
                    <th>Fotos</th>
                </thead>
                <tbody >
                    <?php
                        if(!empty($inspeccion->documentos)){ 
                            foreach ($inspeccion->documentos->documento as $docu) {
                                $aux = explode("+",$docu->fec_emision);
                                $fec_emision = date("d-m-Y",strtotime($aux[0]));
                                
                                echo "<tr data-json='".json_encode($docu)."' >";
                                echo '<td><button  type="button" title="Editar"  class="btn btn-primary btn-circle btnEditarDocu"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>&nbsp<button type="button" title="Eliminar" class="btn btn-primary btn-circle btnEliminarDocu"><span class="glyphicon glyphicon-trash" aria-hidden="true" ></span></button>&nbsp';
                                echo '<td>'.$docu->num_documento.'</td>';
                                echo '<td>'.$docu->razon_social.' ('.$docu->cuit.')</td>';
                                echo '<td>'.$docu->razon_social_destino.' ('.$docu->cuit_destino.')</td>';
                                echo '<td>'.$docu->tipo_documento.'</td>';
                                echo '<td>'.$fec_emision.'</td>';
                                echo '<td>'.$docu->monto.'</td>';
                                echo '<td>'.'</td>';
                                echo '</tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
            <!--_______ FIN TABLA DOCUMENTOS ______-->
        </div>
    </div>
</div>
<script>
// Config Tabla
DataTable($('#tabla_documentos'));
//Determina la accion en la pantalla de carga
var accion = '';


function actualizaTablaDocumentos(){
    wo();
    caseId = {"case_id" : $("#caseId").val()};
    $.ajax({
        type: 'POST',
        data: {caseId},
        cache: false,
        dataType: "json",
        url: "<?php echo SICP; ?>inspeccion/getInspeccion",
        success: function(data) { 

            if(!$.isEmptyObject(data.documentos)){
                tabla = $('#tabla_documentos').DataTable();
                tabla.clear().draw();// Limpio Tabla
                
                $.each(data.documentos.documento, function (i, value) {
                    
                    fec = value.fec_emision.split("+");
                    fecha = new Date(fec[0]);
                    
                    dia = fecha.getDate();
                    mes = fecha.getMonth()+1;
                    anio = fecha.getFullYear();

                    if(dia<10){dia='0'+dia;} 
                    if(mes<10){mes='0'+mes;}
                    
                    fec_emision = dia+'-'+mes+'-'+anio;

                    if(value.monto == null){
                        monto = "";
                    }else{
                        monto = value.monto;
                    }
                    fila = "<tr data-json= '"+ JSON.stringify(value) +"'>" +
                            '<td><button  type="button" title="Editar"  class="btn btn-primary btn-circle btnEditarDocu"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>&nbsp<button type="button" title="Eliminar" class="btn btn-primary btn-circle btnEliminarDocu"><span class="glyphicon glyphicon-trash" aria-hidden="true" ></span></button>&nbsp' +
                            '<td>' + value.num_documento + '</td>' +
                            '<td>' + value.razon_social + " (" + value.cuit + ")" + '</td>' +
                            '<td>' + value.razon_social_destino + " (" + value.cuit_destino + ")" + '</td>' +
                            '<td>' + value.tipo_documento + '</td>' +
                            '<td>' + fec_emision + '</td>' +
                            '<td>' + monto + '</td>' +
                            '<td>' + '</td>' +
                        '</tr>';
                    tabla.row.add($(fila)).draw();
                });
                wc();
                console.log("Actualizando tabla con documentos cargados");


            }else{
                console.log("No hay documentos cargados para esta inspección");
            } 
        },
        error: function(data) {
            console.log("No hay documentos cargados para esta inspección");
        }
    });
}
//SCRIPTS MANIPULACION DE TABLA
//
//Muestra pantalla de agregar documento
//
$("#btnAgregar").on('click', function () {
    $("#tablaDocumentosBox").hide();
    $('#formAgregarDoc').show();
    accion = "nuevo";
    
    //Reemplazo los botones standard de la notificacion
    $(".btn-success.btnNotifEstandar").text("Guardar");
    $(".btn-primary.btnNotifEstandar").text("Volver");
    $(".btn-success.btnNotifEstandar").attr("onclick","guardarDetalle()");
    $(".btn-primary.btnNotifEstandar").attr("onclick","cerrarDetalle()");
});
//
//Muestra pantalla de editar un documento
//
$(document).on('click','.btnEditarDocu', function () {
    $("#tablaDocumentosBox").hide();
    $('#formAgregarDoc').show();
    accion = "editar";

    tabla = $('#tabla_productos').DataTable();
    datos = JSON.parse($(this).parents('tr').attr('data-json'));

    //Asigno los valores a los inputs y combos
    $('#numero').val(datos.num_documento);
    $('#tipo_documento').val(datos.tido_id).trigger('change');

    //Selecciono opciones guardadas en los combo's
    //EMPRESA ORIGEN
    opcion = {'id': datos.cuit, 'text': datos.razon_social};
    emprOpc = new Option(datos.razon_social, datos.cuit, true, true);

    $('#emisor').append(emprOpc).trigger('change');
    $('#emisor').trigger({
        type: 'select2:select',
        params: {
            data: opcion
        }
    });
    //EMPRESA DESTINO
    opcionDestino = {'id': datos.cuit_destino, 'text': datos.razon_social_destino};
    emprDestinoOpc = new Option(datos.razon_social_destino, datos.cuit_destino, true, true);

    $('#destino').append(emprDestinoOpc).trigger('change');
    $('#destino').trigger({
        type: 'select2:select',
        params: {
            data: opcionDestino
        }
    });

    //Obtengo los detalles y loopeo sobre esto en caso de no estar vacio el objeto
    detalles = datos.detalles_documento.detalle_documento;

    if(!$.isEmptyObject(detalles)){
       
        $.each(detalles, function (i, value) { 
                
            //Caso remito no los tengo en cuenta
            precio_total = "";
            if(datos.tido_id != '888-tipos_documentoREMITO'){
            
                precio_total = value.precio_unitario * value.cantidad;
                //Puede poseer o no descuento
                if(value.descuento){
                    descuento = precio_total * value.descuento;
                    value.descuento = value.descuento * 100;
                    precio_total -= descuento;
                }   
            }else{
                value.precio_unitario = "";
                value.descuento = "";
            }

            if(value.unidades == null){
                value.unidades = "";
            }
            fila = "<tr data-json= '"+ JSON.stringify(value) +"'>" +
                    '<td><button  type="button" title="Editar"  class="btn btn-primary btn-circle btnEditar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>&nbsp<button type="button" title="Eliminar" class="btn btn-primary btn-circle btnEliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true" ></span></button>&nbsp' +
                    '<td>' + value.tipo_producto + '</td>' +
                    '<td>' + value.unidad_medida + '</td>' +
                    '<td>' + value.cantidad + '</td>' +
                    '<td>' + value.unidades + '</td>' +
                    '<td>$ ' + value.precio_unitario + '</td>' +
                    '<td>% ' + value.descuento + '</td>' +
                    '<td>' + precio_total + '</td>' +
                '</tr>';
            tabla.row.add($(fila)).draw();
                
        });
    }


    //Reemplazo los botones standard de la notificacion
    $(".btn-success.btnNotifEstandar").text("Editar");
    $(".btn-primary.btnNotifEstandar").text("Volver");
    $(".btn-success.btnNotifEstandar").attr("onclick","editarDetalle()");
    $(".btn-primary.btnNotifEstandar").attr("onclick","cerrarDetalle()");
});
//
//Eliminar registro tabla intermedia
//
$(document).on('click','.btnEliminarDocu', function () {
    tabla = $('#tabla_documentos').DataTable();
    //Obtengo la fila
    row = $(this).parents('tr');

    //Data parseada en json
    nodo = tabla.row(row).node();
    data = JSON.parse($(nodo).attr('data-json'));

    //JSON con data a eliminar
    documento = {"num_documento" : data.num_documento, "tido_id" : data.tido_id};

    $.ajax({
        type: 'POST',
        data: {documento},
        cache: false,
        dataType: "json",
        url: "<?php echo SICP; ?>inspeccion/eliminarDocumento",
        success: function(data) { 

            if(data.status){
                
                tabla.row( $(this).parents('tr') ).remove().draw(); 
                alertify.success("Registro eliminado con exito!");
                console.log("Actualizando tabla con documentos cargados");

            }else{
                alertify.error("Error al eliminar registro");
            } 
        },
        error: function(data) {
            alertify.error("Error al eliminar registro");
        }
    });
});
//
//FIN SCRIPTS MANIPULACION TABLA
</script>