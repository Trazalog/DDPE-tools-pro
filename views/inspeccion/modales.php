<style>
/* .frm-save{
    display: none;
} */
#formEscaneoDocu .addFotosMasiva button{
    margin-top: 12%;
    margin-bottom: 2%;
}
#formEscaneoDocu .addFotos button{
    margin-top: 25%;
}
</style>
<!-- Modal CHOFER -->
<div class="modal modal-fade" id="mdl-chofer">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Chofer</h4>
            </div>
            <form id="formChofer" action="#">
            <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label>DNI(<strong style="color: #dd4b39">*</strong>):</label>
                        <input id="mdl-dni" class="form-control" type="number" name="dni" required>
                    </div>
                    <div class="form-group">
                        <label>Nombre(<strong style="color: #dd4b39">*</strong>):</label>
                        <input id="mdl-nombre" class="form-control" type="text" name="nombre" required>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregar(this,'Chofer')">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN MODAL CHOFER -->
<!-- Modal EMPRESA -->
<div class="modal modal-fade" id="mdl-empresa">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Empresa</h4>
            </div>
            <input id="tipoEmpresa" type="hidden" name="tipoEmpresa">
            <form id="formEmpresa" action="#">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label>Cuit(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="number" id="mdl-cuit" class="form-control" type="text" name="cuit" required>
                    </div>
                    <div class="form-group">
                        <label>Razon Social(<strong style="color: #dd4b39">*</strong>):</label>
                        <input id="mdl-razon_social" class="form-control" type="text" name="razon_social" required>
                    </div>
                    <div class="form-group">
                        <label>Número:</label>
                        <input id="mdl-num_esta" class="form-control" type="text" name="num_establecimiento">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregar(this,'Empresa')">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN MODAL EMPRESA -->
<!-- Modal ESTABLECIMIENTO -->
<div class="modal modal-fade" id="mdl-establecimiento">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Establecimiento</h4>
            </div>
            <form id="formEstablecimiento" action="#">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label>Número Establecimiento(<strong style="color: #dd4b39">*</strong>):</label>
                        <input id="mdl-num_esta-esta" class="form-control" type="text" name="num_establecimiento" required>
                    </div>
                    <div class="form-group">
                        <label>Razon Social(<strong style="color: #dd4b39">*</strong>):</label>
                        <input id="mdl-razon_social-esta" class="form-control" type="text" name="razon_social" required>
                    </div>
                    <div class="form-group">
                        <label>Cuit(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="number" id="mdl-cuit-esta" class="form-control" type="text" name="cuit" required>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregar(this,'Empresa')">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN MODAL ESTABLECIMIENTO -->
<!-- Modal DEPOSITO -->
<div class="modal modal-fade" id="mdl-deposito">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Depósito</h4>
            </div>
            <form id="formDeposito" action="#">
                <input id="empr_id_destino" type="hidden" name="empr_id">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label>Calle(<strong style="color: #dd4b39">*</strong>):</label>
                        <input id="calle" class="form-control" type="text" name="calle" required>
                    </div>
                    <div class="form-group">
                        <label>Altura(<strong style="color: #dd4b39">*</strong>):</label>
                        <input id="altura" class="form-control" type="number" name="altura" required>
                    </div>
                    <div class="form-group">
                        <label>Departamento(<strong style="color: #dd4b39">*</strong>):</label>
                        <div class="input-group" style="width: 100%;">
                            <select class="form-control select2 select2-hidden-accesible" name="depa_id" id="depa_id" required style="width: 100%;">
                                <option value="" disabled selected>-Seleccionar-</option>	
                                <?php
                                if(!empty($departamentos)){ 
                                    foreach ($departamentos as $depa) {
                                        echo "<option data-json='".json_encode($depa)."' value='".$depa->tabl_id."'>".$depa->valor."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregar(this,'Deposito')">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN MODAL DEPOSITO -->
<!-- Modal Escanear Documentacion -->
<div class="modal modal-fade" id="mdl-documentacion">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Escaneo Documentación</h4>
            </div>
            <div class="panel-subheading" style="text-align: right">
                <label><?php echo $this->session->userdata['first_name'].' '.$this->session->userdata['last_name'].' - '.date('m/d/Y H:i:s')?></label>
            </div> 
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
            <?php if(isset($escaneoInfoId)){ ?>
                        <?php
                            $formulario = getForm($escaneoInfoId); //instacio formulario si se cargo en el paso Escaneo Documentacion
                            echo "<div id='formEscaneoDocu' data-form='11'>";
                            echo $formulario;
                            echo "</div>";
                        ?>
            <?php }else{ ?>

                    <div id="formEscaneoDocu" class="frm-new" data-form="11"></div>

            <?php } ?>
                </div>
            </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                <div class="col-md-6 col-sm-12 col-md-offset-6" style="text-align:right;margin-top: 20px;">
                    <button id="btn-cierreEscaneo" type="button" class="btn btn-success" data-dismiss="modal">Hecho</button>

                    <!-- <button type="button" id="btn-accion" class="btn btn-primary btn-guardar"
                        onclick="frmGuardar($('.frm-new').find('form'))">Guardar</button> -->
                </div>
            </div>
            <!-- ************************************************************ -->
        </div>
    </div>
</div>

<!-- FIN MODAL Escanear Documentacion -->
<!-- Modal Acta Inspeccion manual -->
<div class="modal modal-fade" id="mdl-actaInspeccionManual">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Carga acta inspeccion realizada manualmente</h4>
            </div>
            <div class="panel-subheading" style="text-align: right">
                <label><?php echo $this->session->userdata['first_name'].' '.$this->session->userdata['last_name'].' - '.date('m/d/Y H:i:s')?></label>
            </div> 
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div id="formActaManualInspeccion" class="frm-new" data-form="69"></div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="col-md-6 col-sm-12 col-md-offset-6" style="text-align:right;margin-top: 20px;">
                    <button id="btn-cierreActaInspeccionManual" type="button" class="btn btn-success" data-dismiss="modal">Hecho</button>
                </div>
            </div>
            <!-- ************************************************************ -->
        </div>
    </div>
</div>
<!-- FIN MODAL Acta infraccion en calle -->
<!-- Modal ZOOM PREVIEW -->
<div class="modal modal-fade" id="mdl-zoomPreview">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Vista Previa</h4>
            </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" style="text-align:center">
                            <div id="zoomPreviewContainer">

                                <img src="lib\imageForms\preview.png" height="368" id="zoomPreview" data-magnify-src="">
                            </div>
                        </div>
                        <div class="col-md-12" style="text-align:center; margin-top: 10px">
                            <button type="button" onclick="acercar()" title="Acercar">
                                <i class="fa fa-plus"></i>
                            </button>
                            
                            <button type="button" onclick="alejar()" title="Alejar">
                                <i class="fa fa-minus"></i>
                            </button>

                        </div>    

                        </div>
                    </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                </div>
        </div>
    </div>
</div>
<!-- FIN MODAL ZOOM PREVIEW -->
<!-- Modal VER PERMISO -->
<div class="modal modal-fade" id="mdl-verDetallePermiso">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalle Permiso de Tránsito</h4>
            </div>
            <form id="formVerDetallePermiso" action="#">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>N° de Permiso:</label>
                                <input id="modalVerPermiso" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>N° de Solicitud:</label>
                                <input id="modalVerSolicitud" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>Lugar de Emisión:</label>
                                <input id="modalVerEmision" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>Doc. Sanitaria Tipo:</label>
                                <input id="modalVerDocSanitaria" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>Hora de Salida:</label>
                                <input id="modalVerHoraSalida" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>Nombre de Establecimiento:</label>
                                <input id="modalVerOrigen" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>Establecimiento N°:</label>
                                <input id="modalVerOrigenNumero" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>CUIT del Establecimiento:</label>
                                <input id="modalVerOrigenCuit" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>Producto/s:</label>
                                <input id="modalVerProductos" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>Peso Neto:</label>
                                <input id="modalVerNeto" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>Peso Bruto:</label>
                                <input id="modalVerBruto" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>Temperatura:</label>
                                <input id="modalVerTemperatura" class="form-control" type="text" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN MODAL VER PERMISO -->
<!-- Modal VER DESTINO -->
<div class="modal modal-fade" id="mdl-verDetalleDestino">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalle del destino</h4>
            </div>
            <form id="formVerDetalleDestino" action="#">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>Empresa Destino:</label>
                                <input id="modalVerDestino" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>Depósito Destino:</label>
                                <input id="modalVerDepositoDestino" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-sx-12">
                            <div class="form-group">
                                <label>Producto/s para la empresa destino:</label>
                                <textarea id="modalVerProductosDestino" class="form-control" readonly></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN MODAL VER DESTINO -->
<!-- Modal VER TERMICO -->
<div class="modal modal-fade" id="mdl-verDetalleTermico">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalle del Térmico</h4>
            </div>
            <form id="formVerDetalleTermico" action="#">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>Patente Térmico:</label>
                                <input id="modalVerPatenteTermico" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label>N° Habilitación SENASA:</label>
                                <input id="modalVerSENASATermico" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-sx-12">
                            <div class="form-group">
                                <label>N° de Precintos:</label>
                                <input type="text" id="modalVerNroPrecintos" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN MODAL VER TERMICO -->
<script>
    //SCRIPTS MODAL ZOOM VISTA PREVIA
    //Scripts para hacer zoom en la imagen seleccionada
    function acercar() {
        var zoomPreview = document.getElementById("zoomPreview");
        var container = document.getElementById("zoomPreviewContainer");

        //Chequeamos que no exceda el ancho del contenedor
        if(container.clientWidth > (zoomPreview.clientWidth + 80)){

            zoomPreview.style.height = (zoomPreview.clientHeight + 40) + "px";
        }
    }
    function alejar() {
        var zoomPreview = document.getElementById("zoomPreview");
        var currHeight = zoomPreview.clientHeight;
        
        zoomPreview.style.height = (currHeight - 40) + "px";
    }
    //RESETEO A ALTURA ESTANDAR
    $('#mdl-zoomPreview').on('hidden.bs.modal', function (e) {
        $("#zoomPreview").height(368);
    });
</script>
<!-- FIN MODAL ZOOM PREVIEW -->

<script>
//Script para altas rapidas de todos los modales
//
    function agregar(elem,recurso){
        //Obtengo el ID del formulario del que se llamo la funcion
        var idForm = "#" + $(elem).closest('form').attr('id');
        var form = $(idForm)[0];
        var datos = new FormData(form);
        var data = formToObject(datos);
        if(!frm_validar(idForm)){
            alertify.error("No completo todos los campos requeridos!");
            return;
        }
        wo();
        $.ajax({
            type: "POST",
            url: "<?php echo SICP; ?>inspeccion/agregar"+recurso,
            data:{ data },
            success: function (response) {
                resp = JSON.parse(response);
                wc();
                if(resp.status){
                    //Busco id del modal y lo cierro
                    var modal = $(elem).closest('.modal').attr('id');
                    $("#"+modal).modal('hide');
                    alertify.success("Guardado con éxito!");
                    //actualizo combos luego de agregar opcion y la selecciono
                    switch(recurso){
                        case "Deposito":
                            dataResp = JSON.parse(resp.data);
                
                            depo_id_new = dataResp.respuesta.resultado[0].depo_id;
                            var direccion = $("#calle").val() + " - " + $("#altura").val();
                            
                            var newOpc = new Option(direccion, depo_id_new, true, true);
                            $('#depo_destino').append(newOpc).trigger('change');
                            //Limpio form
                            $('#calle').val('');
                            $('#altura').val('');
                            $('#departamento').val(null).trigger('change');
                        break;

                        case "Chofer":
                            var chofer = $("#mdl-dni").val() + " " + $("#mdl-nombre").val();
                            var newOpc = new Option(chofer, $("#mdl-dni").val(), true, true);
                            $("#nom_chofer").val($("#mdl-nombre").val());
                            $('#doc_chofer').append(newOpc).trigger('change');
                            //Limpio form
                            $('#mdl-dni').val('');
                            $('#mdl-nombre').val('');
                        break;

                        case "Empresa":
                            switch ($('#tipoEmpresa').val()) {
                                case 'Empresa':
                                    var empresa = $("#mdl-razon_social").val();
                                    var newOpc = new Option(empresa, $("#mdl-cuit").val(), true, true);
                                    $('#empre_destino').append(newOpc).trigger('change');

                                    //Limpio form
                                    $('#mdl-cuit').val('');
                                    $('#mdl-razon_social').val('');
                                    $('#mdl-num_esta').val('');
                                break;

                                case 'Transportista':
                                    var empresa = $("#mdl-razon_social").val();
                                    var newOpc = new Option(empresa, $("#mdl-cuit").val(), true, true);
                                    $('#transportista').append(newOpc).trigger('change');

                                    //Limpio form
                                    $('#mdl-cuit').val('');
                                    $('#mdl-razon_social').val('');
                                    $('#mdl-num_esta').val('');
                                break;

                                case 'Establecimiento':
                                    var empresa = $("#mdl-razon_social-esta").val();
                                    var newOpc = new Option(empresa, $("#mdl-cuit-esta").val(), true, true);
                                    $("#esta_num").val($("#mdl-num_esta-esta").val());
                                    $('#esta_nom').append(newOpc).trigger('change');

                                    //Limpio form aca, porque separe los modales
                                    $('#mdl-cuit-esta').val('');
                                    $('#mdl-razon_social-esta').val('');
                                    $('#mdl-num_esta-esta').val('');
                                break;
                                
                                case 'Emisor':
                                    var empresa = $("#mdl-razon_social").val();
                                    var newOpc = new Option(empresa, $("#mdl-cuit").val(), true, true);
                                    $('#emisor').append(newOpc).trigger('change');

                                    //Limpio form
                                    $('#mdl-cuit').val('');
                                    $('#mdl-razon_social').val('');
                                    $('#mdl-num_esta').val('');
                                break;

                                case 'Destino':
                                    var empresa = $("#mdl-razon_social").val();
                                    var newOpc = new Option(empresa, $("#mdl-cuit").val(), true, true);
                                    $('#destino').append(newOpc).trigger('change');

                                    //Limpio form
                                    $('#mdl-cuit').val('');
                                    $('#mdl-razon_social').val('');
                                    $('#mdl-num_esta').val('');
                                break;
                                default:
                                    break;
                            }
                        break;

                    }

                }else{
                    if(resp.data.includes("already exists")){
                        alertify.error("Este registro ya fue ingresado!");
                    }else{
                        alertify.error("Se produjo un error al agregar!");
                    }
                }
            },
            error: function(result){
                wc();
                alertify.error("Se produjo un error al agregar!");
            }
        });
    }
    
$(document).ready(function () {
    //Cantidad de documentos solo digitos
    $("#cant_doc").attr("type","number");
});
//Variable de estado para agregar contenido dinamicamente
indice = 2;
indexFiles = 2;

function agregarFotos(){
    var modeloInput = "<div class='col-xs-12 col-sm-6 col-md-3'>"+
                    "<label>Foto "+indice+":</label>"+
                    "<div class='form-group imgConte centrar'>"+
                        "<label for='foto_"+indice+"'>"+
                        "<div class='imgEdit'>"+
                            "<input class='form-control' type='file' id='foto_"+indice+"'  name='-file-fotos[]' onchange='previewFile(this)' accept='image/*' capture/>"+
                        "</div>"+
                        "<div class='imgPreview'>"+
                            "<div id='vistaPrevia_foto_"+indice+"' style='background-image: url(lib/imageForms/camera_2.png);'></div>"+
                        "</div>"+
                        "</label>"+
                    "</div>"+
                    "</div>";
    indice++;
    $(".addFotos").before(modeloInput);
}
function agregarArchivos(){
    var modeloInputFile = "<div class='col-sm-12 col-md-6'>"+
                        "<div class='form-group'>"+
                            "<label>PDF "+indexFiles+":</label>"+
                            "<input class='form-control' id='archivo_"+indexFiles+"' type='file' name='-file-archivos[]'>"+
                        "</div>"+
                    "</div>";
    $(".addFiles").before(modeloInputFile);
    indexFiles++;
}
</script>