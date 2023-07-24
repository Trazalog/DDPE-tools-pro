<?php $this->load->view(SICP."inspeccion/modales.php"); ?>
<style>
.input-group-addon:hover{
    cursor: pointer;
    background-color: #04d61d !important;
}
.input-group-addon{
    background-color: #05b513 !important;
    color: white !important;
}
.form-check-inline{
    display: inline;
    margin: 10px;
}
.permTransito{
    min-height: 20px;
    text-align: center;
}
.caja{
    margin-top: 15px;
}
.centrar{
    text-align: center;
}
.ocultar .has-feedback .form-control-feedback{
    display: none !important;
}
.btnZoom {
  height: 40px;
}
#sec_permisos, #sec_destinos, #sec_termicos{
    background-color: #88888833;
}
.titDataDinamica{
    font-weight: 700;
}
</style>
<!--_______ FORMULARIO PERMISO DE TRANSITO BOX 1______-->
<form class="formPreCarga" id="formPreCarga">
    <div class="row">
        <?php $this->load->view(SICP.'inspeccion/mosaicoBarrera.php') ?>
        <!-- The expanding image container -->
        <div class="col-sm-6 col-md-6 col-xl-6">
            <div class="contenedor">
                <!-- Expanded image -->
                <img src="lib\imageForms\preview.png" id="expandedImg" style="">

                <!-- Zoom Modal Button -->
                <button type="button" class="btn btn-outline-dark btnZoom" data-toggle="modal" data-target="#mdl-zoomPreview" title="Zoom"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="caja" id="boxPermisoTransito">
                <div class="box-tittle centrar">
                    <h3>Permiso de tránsito</h3>
                </div>
                <!--<div class="box-body"> -->
                <input type="text" class="form-control hidden" name="petr_id" id="petr_id" value="<?php echo $petr_id?>">

                <!--Permiso-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="Permiso">N° de Permiso(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="text" class="form-control requerido alfanumerico" id="permi_num" placeholder="Ingrese número de permiso"/>
                    </div>
                </div>
                <!--________________-->

                <!--Solicitud-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="Solicitud">N° de Solicitud(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="text" class="form-control requerido alfanumerico" id="soli_num" placeholder="Ingrese número de solicitud"/>
                    </div>
                </div>
                <!--________________-->

                <!-- Lugar de Emisión -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="emision">Lugar de Emisión(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="text" class="form-control" id="emision" placeholder="Ingrese lugar de emisión"/>
                    </div>
                </div>
                <!--________________-->

                <!--DOC. Sanitaria Tipo-->
                <div class="col-md-6 col-sm-6 col-xs-6" style="display: contents;">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <label for="doc_sanitaria">Doc. Sanitaria Tipo(<strong style="color: #dd4b39">*</strong>):</label>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-check">
                            <input type="radio" class='form-check-input' name="doc_sanitaria" value="PT"/>
                            <label class="form-check-label" for="">PT</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class='form-check-input' name="doc_sanitaria" value="PTR"/>
                            <label class="form-check-label" for="">PTR</label>
                        </div>
                    </div>
                </div>
                <!--________________-->

                <!--Hora de Salida-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    <label for="salida">Hora de Salida(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="time" class="form-control" id="salida" placeholder="Ingrese hora de salida"/>
                    </div>
                </div>
                <!--________________-->

                <!--Fecha-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    <label for="fecha">Fecha del Permiso(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control formatoFecha" id="fecha"/>
                    </div>
                </div>
                <!--________________-->
                                        
                <!--Nombre Establecimiento-->
                <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                    <div class="form-group">
                        <label for="esta_nom" style="font-size:13px !important">Nombre de Establecimiento(<strong style="color: #dd4b39">*</strong>):</label>
                        <div class="input-group">
                            <select class="form-control select2 select2-hidden-accesible empresa" name="esta_nom" id="esta_nom">
                                <option value="" disabled selected></option>
                            </select>
                            <span id="add_establecimiento" class="input-group-addon" data-toggle="modal" data-target="#mdl-establecimiento" onclick="$('#tipoEmpresa').val('Establecimiento')"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>
                </div>
                <!--________________-->

                <!--Establecimiento N°-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    <label for="esta_num">Establecimiento N°(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control" name="esta_num" id="esta_num" placeholder="Ingrese Establecimiento N°" readonly/>
                    </div>
                </div>
                <!--________________-->
                
                <!--Producto-->
                <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                    <div class="form-group">
                        <label for="producto">Producto(<strong style="color: #dd4b39">*</strong>):</label>
                        <div class="input-group" style="width: 100%">
                            <select class="form-control select2 select2-hidden-accesible producto" name="tipr_id" id="tipr_id" style="width: 100%">
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
                <!--Estado de Producto-->
                <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                    <div class="form-group">
                        <label for="estado_producto">Estado del Producto(<strong style="color: #dd4b39">*</strong>):</label>
                        <div class="input-group" style="width: 100%">
                            <select class="form-control select2 select2-hidden-accesible estado_producto" name="estado_pr_id" id="estado_pr_id" style="width: 100%">
                                <option value="" disabled selected>- Seleccionar -</option>
                                <?php
                                    if(!empty($estados_productos)){ 
                                        foreach ($estados_productos as $estados) {
                                            echo "<option data-json='".json_encode($estados)."' value='".$estados->tabl_id."'>".$estados->descripcion."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div> 
                <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="producto">Producto/s(<strong style="color: #dd4b39">*</strong>):</label>
                        <textarea class="form-control" name="productos" id="producto" placeholder="Ingrese producto/s" required></textarea>
                    </div>                    
                </div> -->
                <!--________________-->
                <!--Kilos-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="kilos">Kilos(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control onlyNumbers" name="kilos" id="kilos" placeholder="Ingrese kilos"/>
                    </div>                    
                </div>
                <!--________________-->

                <!--Neto-->
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label for="neto">Peso Neto(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control onlyNumbers" id="neto" placeholder="Ingrese peso neto"/>
                    </div>                    
                </div>
                <!--________________-->

                <!--Bruto-->
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label for="bruto">Peso Bruto(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control onlyNumbers" name="bruto" id="bruto" placeholder="Ingrese peso bruto" />
                    </div>                    
                </div>
                <!--________________-->

                <!--Temperatura-->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="temperatura">Temperatura(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="number" class="form-control" id="temperatura" placeholder="Ingrese temperatura" />
                    </div>                    
                </div>
                <!--________________-->

                <!--_________________ Agregar_________________-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-primary" onclick="agregarPermiso()" >Agregar Permiso</button>
                    </div>
                </div>                
                <!--__________________________________-->
                <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                    <h4 class="titDataDinamica">Permisos:</h4>
                    <div id="sec_permisos"></div>
                    <hr>
                </div>
            <!--</div> FIN box-body -->
        
            </div><!-- FIN box-primary -->
        </div>
        <!--_______ FIN FORMULARIO PERMISO DE TRANSITO BOX 1 ______-->
        <!--_______ FORMULARIO INSPECCION BOX 2______-->
        <div class="col-md-6">
            <div class="caja" id="boxInspeccion">
                <!-- <div class="box-body"> -->

                        <!--DNI Chofer-->
                        <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                            <div class="form-group">
                                <label for="doc_chofer">DNI Chofer(<strong style="color: #dd4b39">*</strong>):</label>
                                <div class="input-group">
                                    <select class="form-control select2 select2-hidden-accesible choferes" name="chof_id" id="doc_chofer" required>
                                        <option value="" disabled selected></option>
                                    </select>
                                    <span id="add_chofer" class="input-group-addon" data-toggle="modal" data-target="#mdl-chofer"><i class="fa fa-plus"></i></span>
                                </div>
                            </div>
                        </div>
                        <!--________________-->

                        <!-- Nombre CHOFER -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="nom_chofer">Nombre del Chofer(<strong style="color: #dd4b39">*</strong>):</label>
                                <input type="text" class="form-control" name="nom_chofer" id="nom_chofer" placeholder="" readonly/>
                            </div>
                        </div>
                        <!--________________-->

                        <!--Patente Tractor-->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group has-feedback">
                            <label for="patenteTractor">Patente de Tractor(<strong style="color: #dd4b39">*</strong>):</label>
                                <input class="form-control limited" name="patente_tractor" id="patenteTractor" placeholder="Ingrese Patente Tractor" value="<?php echo isset($patente) ? $patente : null ?>" required/>
                            </div>
                        </div>
                        <!--________________-->

                        <!--Transportista-->
                        <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                            <div class="form-group">
                                <label for="transportista">Transportista(<strong style="color: #dd4b39">*</strong>):</label>
                                <div class="input-group">
                                    <select class="form-control select2 select2-hidden-accesible empresa" name="transportista" id="transportista" required>
                                        <option value="" disabled selected></option>	
                                    </select>
                                    <span id="add_transportista" class="input-group-addon" data-toggle="modal" data-target="#mdl-empresa" onclick="$('#tipoEmpresa').val('Transportista')"><i class="fa fa-plus"></i></span>
                                </div>
                            </div>                    
                        </div>
                        <!--________________-->

                        <!--Teléfono Transportista-->
                        <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                            <div class="form-group">
                                <label for="telTransportista">Teléfono Transportista(<strong style="color: #dd4b39">*</strong>):</label>
                                <input class="form-control limited" name="telTransportista" id="telTransportista" placeholder="Ingrese teléfono" required/>
                            </div>                    
                        </div>
                        <!--________________-->

                        <!--E-mail Transportista-->
                        <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                            <div class="form-group">
                                <label for="emailTransportista">E-mail Transportista(<strong style="color: #dd4b39">*</strong>):</label>
                                <input type="text" class="form-control" name="emailTransportista" id="emailTransportista" placeholder="Ingrese correo" required/>
                            </div>                    
                        </div>
                        <!--________________-->

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <hr>
                        </div>
                        <!--Empresa Destino-->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="empre_destino">Empresa Destino(<strong style="color: #dd4b39">*</strong>):</label>
                                <div class="input-group">
                                    <select class="form-control select2 select2-hidden-accesible empresa" name="empre_destino" id="empre_destino">
                                        <option value="" disabled selected></option>
                                    </select>
                                    <span id="add_empresa" class="input-group-addon" data-toggle="modal" data-target="#mdl-empresa" onclick="$('#tipoEmpresa').val('Empresa')"><i class="fa fa-plus"></i></span>
                                </div>
                            </div>                    
                        </div>
                        <!--________________-->

                        <!--Depósito Destino-->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="depo_destino">Depósito Destino(<strong style="color: #dd4b39">*</strong>):</label>
                                <div class="input-group">
                                    <select class="form-control select2 select2-hidden-accesible" name="depo_destino" id="depo_destino">
                                        <option value="" disabled selected>-Seleccionar-</option>
                                    </select>
                                    <span id="add_deposito" class="input-group-addon" data-toggle="modal" data-target="#mdl-deposito"><i class="fa fa-plus"></i></span>
                                </div>
                            </div>                    
                        </div>
                        <!--Producto-->
                        <!-- <div class="col-md-12 col-sm-12 col-xs-12 ocultar">
                            <div class="form-group">
                                <label for="productosDestino">Producto/s para la empresa de destino(<strong style="color: #dd4b39">*</strong>):</label>
                                <textarea class="form-control" name="productosDestino" id="productosDestino" placeholder="Ingrese producto/s para la empresa de destino"></textarea>
                            </div>                    
                        </div> -->
                        <!--________________-->
                        
                        <!--_________________ Agregar_________________-->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div style="margin-top: 25px;" class="form-group text-right">
                                <button type="button" class="btn btn-primary" onclick="agregarDestino()" >Agregar Destino</button>
                            </div>
                        </div>                
                        <!--__________________________________-->

                        <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                            <h4 class="titDataDinamica">Empresa Destino:</h4>
                            <div id="sec_destinos"></div>
                        <hr>
                        </div>
                        <!--________________-->

                        <!--Termico Patente-->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="term_patente">Patente Térmico(<strong style="color: #dd4b39">*</strong>):</label>
                                <input class="form-control limited" id="term_patente" placeholder="Ingrese patente del térmico" />
                            </div>                    
                        </div>
                        <!--________________-->

                        <!--N° SENASA-->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                            <label for="num_senasa">N° hab. SENASA(<strong style="color: #dd4b39">*</strong>):</label>
                                <input type="text" class="form-control limitedChars" name="nro_senasa" id="num_senasa" placeholder="Ingrese N° de habilitación SENASA" required/>
                            </div>
                        </div>
                        <!--________________-->

                        <!--Precintos-->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="precintos">N° de Precintos(<strong style="color: #dd4b39">*</strong>):</label>
                                <input class="form-control limited" id="precintos" placeholder="Ingrese precintos" />
                            </div>                    
                        </div>
                        <!--________________-->
                        <!--_________________ Agregar_________________-->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group text-right">
                                <button type="button" class="btn btn-primary" onclick="agregarTermico()" >Agregar Térmico</button>
                            </div>
                        </div>              
                        <!--__________________________________-->
                        <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                            <h4 class="titDataDinamica">Térmico:</h4>
                            <div id="sec_termicos"></div>
                            <hr>
                        </div>
                        <!--________________-->
                    </div>
                <!-- </div> -->

            </div> <!--FIN box-primary-->
        </div><!--FIN col-->
    <!--_______ FIN FORMULARIO INSPECCION BOX 2______-->
    </div>
</form>
<script>
//
//Document READY
//Instancias select2 combo box
//
$(document).ready(function() {
    $('.select2').select2();
    $('#doc_chofer').select2({
        ajax: {
            url: "<?php echo SICP; ?>inspeccion/buscaChoferes",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    patron: params.term, // parámetro búsqueda que recibe el controlador
                    page: params.page
                };
            },
            processResults: function (data, params) {
                
                params.page = params.page || 1;
                
                var results = [];
                $.each(data, function(i, obj) {
                    results.push({
                        id: obj.dni,
                        text: obj.nombre,
                        fec_alta: obj.fec_alta
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
        language: "es",
        placeholder: 'Buscar chofer',
        minimumInputLength: 3,
        maximumInputLength: 8,
        dropdownCssClass: "choferes",
        templateResult: function (chofer) {

            if (chofer.loading) {
                return "Buscando choferes...";
            }

            var $container = $(
                "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__meta'>" +
                    "<div class='select2-result-repository__title'></div>" +
                    "<div class='select2-result-repository__description'></div>" +
                "</div>" +
                "</div>"
            );

            $container.find(".select2-result-repository__title").text(chofer.id);
            $container.find(".select2-result-repository__description").text(chofer.text);

            return $container;
        },
        templateSelection: function (chofer) {
            return chofer.id || chofer.text;
        },
        language: {
            noResults: function() {
                return '<option>No hay coincidencias</option>';
            },
            inputTooShort: function () {
                return 'Ingrese 3 o mas dígitos para comenzar la búsqueda'; 
            },
            inputTooLong: function () {
                return 'Hasta 8 dígitos permitidos'; 
            }
        },
        escapeMarkup: function(markup) {
            return markup;
        },
    });
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
                        num_esta: obj.num_establecimiento
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
    //Deshabilito los depositos destino hasta que se elija una empresa destino
    $("#depo_destino").prop("disabled", true);

    //MÁSCARAS
    //Lugar de Emision A-Z, 0-9 y space
    $("#emision").inputmask({ regex: "[a-zA-Z0-9 ]*" });
    //Solicitud N° y N° de Permiso
    $(".alfanumerico").inputmask({ regex: "[0-9/a-zA-Z -]*" });
    // N° SENASA: 0-9, /, ',' y -
    $(".limitedChars").inputmask({ regex: "[0-9/,-]*" });
    //PRECINTOS y Patentes: 0-9, A-Z, space, / y -
    $(".limited").inputmask({ regex: "[0-9/a-zA-Z -]*" });
    //Bruto, Tara y Neto
    $(".onlyNumbers").inputmask({ regex: "[0-9.,]*" });
    //Fechas
    $('.formatoFecha').inputmask({
        alias: "datetime",
        inputFormat: "dd-mm-yyyy"
    });

});//FIN document.ready
/******************************************************************************* */
//
//VALIDACIONES CARACTERES PERMITIDOS
//
//Limito cantidad de caracteres DNI chofer
$('#doc_chofer').select2().on('select2:open', function() {
    $('.select2-search__field').attr('maxlength', 8);
});
//Filtro para solo numero en combo box DNI Chofer
//KeyCode: 8 = Borrar, 0 = Nada, 9 = Tab, 48-57 = N° izq, 96-105 = N° der, 37-40 = flechas
$(document).on("keydown", ".choferes", function(e) {
    if (e.which != 8 && e.which != 0 && e.which != 9 && e.which != 13 && (e.which < 48 || e.which > 57) && (e.which < 96 || e.which > 105) && (e.which < 37 || e.which > 40)) {
        e.preventDefault();
        alert("Ingrese dígitos únicamente");
    }
});
//
//Script's seccion destino
//
var editandoDestino = false;// Utilizo para que no se pierdan los permisos al editar
function agregarDestino(){
    //Informamos el campo vacio 
    var reporte = validarCamposDestino();
                            
    if(reporte == ''){
        var empre_destino = $('#empre_destino').find(':selected').text();
        var depo_destino = $('#depo_destino').find(':selected').text();

        var datos = {};
        datos.rol = "DESTINO";
        datos.empr_id = $("#empre_destino").val();
        datos.case_id = $("#caseId").val();
        datos.depo_id = $("#depo_destino").val();
        datos.razon_social = empre_destino;
        datos.productos = $("#productosDestino").val();
        direccion = depo_destino.split(" - ");
        datos.calle = direccion[0];
        datos.altura = direccion[1];

        var div = `<div class='form-group empreDestino' data-json='${JSON.stringify(datos)}'>
                        <span>
                        <i class='fa fa-fw fa-eye text-light-blue' style='cursor: pointer;' title='Ver detalle' onclick='verDestino(this)'></i> 
                        <i class='fa fa-fw fa-edit text-light-blue' style='cursor: pointer;' title='Editar' onclick='editarDestino(this)'></i> 
                        <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                        | ${empre_destino} - ${depo_destino}
                        </span>
                </div>`;
        $('#sec_destinos').append(div);
        //Limpio luego de agregar
        $('#empre_destino').val(null).trigger('change');
        $('#depo_destino').val(null).trigger('change');
        $("#productosDestino").val('');
        alertify.success("Destino agregado correctamente!");
        editandoDestino = false;
    }else{
        notificar('Cuidado',reporte,'warning');
    }
}
function validarCamposDestino(){
    var valida = '';
    //Empresa destino
    if($("#empre_destino").val() == ""){
        valida = "Seleccione Empresa Destino!";
    }
    //Deposito Destino
    if($("#depo_destino").val() == ""){
        valida = "Seleccione Deposito Destino!";
    }
    return valida;
}
//Funcion para eliminar el registro en ambas SECCIONES
$(document).on("click",".fa-trash",function(e) {
    if (confirm('¿Desea borrar el registro?')) {
        $(e.target).closest('div').remove();		
    }
});
function editarDestino(tag){
    if(!editandoDestino){
        var data =	JSON.parse($(tag).closest('div').attr('data-json'));
        emprVal = data.cuit;
        emprNombre = data.razon_social;
        depo_direccion = data.calle + " - " + data.altura;
        depo_id = data.depo_id;

        opcion = {'id': emprVal, 'text': emprNombre};
        // opcDepo = {'id': depo_id, 'text': depo_direccion};

        emprOpc = new Option(emprNombre, emprVal, true, true);
        // emprDepo = new Option(depo_direccion, depo_id, true, true);
        
        // $('#depo_destino').append(emprDepo).trigger('change');
        // $('#depo_destino').trigger({
        //     type: 'select2:select',
        //     params: {
        //         data: opcion
        //     }
        // });
        $('#empre_destino').append(emprOpc).trigger('change');
        $('#empre_destino').trigger({
            type: 'select2:select',
            params: {
                data: opcion
            }
        });
        $("#productosDestino").val(data.productos);
        $(tag).closest('div').remove();
        editandoDestino = true;
    }else{
        notificar('Cuidado',"Ya se esta editando una empresa de <b>DESTINO</b>!",'warning');
    }
}
function verDestino(tag){
    var data =	JSON.parse($(tag).closest('div').attr('data-json'));
    
    $("#modalVerDestino").val(data.razon_social);
    $("#modalVerDepositoDestino").val(data.calle + " - " + data.altura);
    $("#modalVerProductosDestino").val(data.productos);
    $("#mdl-verDetalleDestino").modal('show');
}
//
//FIN Script's seccion destino
/****************************************************** */
/****************************************************** */
//
//Scripts Permisos transito
//
var editando = false;// Utilizo para que no se pierdan los permisos al editar
function agregarPermiso(){
    //Informamos el campo vacio 
    var reporte = validarCamposPermiso();
                            
    if(reporte == ''){
        
        var soli_num = $("#soli_num").val();
        var permi_num = $("#permi_num").val();
        // var descDepo = $("#depo_origen_id option:selected").text();
        var emision = $('#emision').val();
        var salida = $('#salida').val();
        var fecha = $("#fecha").val();
        var tipo = $('input[name=doc_sanitaria]:checked').val();
        var origen = $("#esta_nom").select2('data')[0].id;
        var origen_nom = $("#esta_nom").select2('data')[0].text;
        var origen_num = $("#esta_num").val();
        var productos = $("#tipr_id").select2('data')[0].text;
        var tipr_id = $("#tipr_id").select2('data')[0].id;
        var kilos = $("#kilos").val(); 
        var neto = $("#neto").val(); 
        var bruto = $("#bruto").val(); 
        var temperatura = $("#temperatura").val();
        var estado = $("#estado_pr_id").select2('data')[0].text; 
        var estado_pr_id = $("#estado_pr_id").select2('data')[0].id;

        var datos = {};
        datos.perm_id = permi_num;
        datos.soli_num = soli_num;
        datos.lugar_emision = emision;
        datos.fecha_hora_salida = fecha +" "+salida;
        datos.tipo = tipo;
        datos.case_id = $("#caseId").val(); 
        datos.origen = origen;
        datos.origen_nom = origen_nom;
        datos.origen_num = origen_num;
        datos.productos = productos;
        datos.tipr_id = tipr_id;
        datos.kilos = kilos;
        datos.neto = neto;
        datos.bruto = bruto;
        datos.temperatura = temperatura;
        datos.estado = estado;
        datos.estado_pr_id = estado_pr_id ; 

        var div = `<div class='form-group permTransito' data-json='${JSON.stringify(datos)}'>
                        <span> 
                        <i class='fa fa-fw fa-eye text-light-blue' style='cursor: pointer;' title='Ver detalle' onclick='verPermiso(this)'></i> 
                        <i class='fa fa-fw fa-edit text-light-blue' style='cursor: pointer;' title='Editar' onclick='editarPermiso(this)'></i> 
                        <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                        | <span class='numPermiso'>${soli_num}</span> - ${permi_num}
                        </span>
                </div>`;
        $('#sec_permisos').append(div);
        //Limpio luego de agregar
        // $("#soli_num").val('');
        // $("#emision").val('');
        // $("#salida").val('');
        // $("#fecha").val('');
        // $('input[name=doc_sanitaria]:checked').prop('checked',false);
        editando = false;
        alertify.success("Permiso de tránsito agregado correctamente!");
    }else{
        notificar('Cuidado',reporte,'warning');
    }
}
function validarCamposPermiso(){
    var valida = '';
    //Numero de solicitud
    if($("#soli_num").val() == ""){
        valida = "Complete Numero de solicitud!";
    }
    //Valido que el numero de permiso no se ingreso previamente
    $(".numPermiso").each(function (i, val) { 
        if($(val).text() == $("#soli_num").val()){
            valida = "N° de Permiso ya fue ingresado!";
        }
    });
    //Lugar de emision
    if($("#emision").val() == ""){
        valida = "Complete Lugar de emision!";
    }
    //Hora de salida
    if($("#salida").val() == ""){
        valida = "Seleccione una Hora de salida!";
    }
    //Fecha
    if($("#fecha").val() == ""){
        valida = "Seleccione una Fecha!";
    }
    //Documentacion sanitaria
    if($("input[name='doc_sanitaria']:checked").val() == null){
        valida = "Seleccione un tipo de Doc. sanitaria!";
    }
    //Fecha de salida
    if(!Inputmask.isValid($("#fecha").val(), { alias: "datetime", inputFormat: "dd-mm-yyyy"})){
        valida = "El formato de la fecha del permiso es incorrecto!";
    }
    return valida;
}

function editarPermiso(tag){
    if(!editando){
        var data =	JSON.parse($(tag).closest('div').attr('data-json'));
        $("#soli_num").val(data.soli_num);
        $("#permi_num").val(data.perm_id);
        $("#emision").val(data.lugar_emision);
        aux = data.fecha_hora_salida.split(" ");
        $("#salida").val(aux[1]);
        $("#fecha").val(aux[0]);
        $("input[name=doc_sanitaria][value='"+data.tipo+"']").prop("checked",true);
        $("#producto").val(data.productos);
        $("#netoPermiso").val(data.neto);
        $("#brutoPermiso").val(data.bruto);
        $("#temperatura").val(data.temperatura);
        $("#estado_pr_id").val(data.estado);
        emprVal = data.origen;
        emprNombre = data.origen_nom;
        emprNum = data.origen_num;

        opcion = {'id': emprVal, 'text': emprNombre, 'num_esta': emprNum};

        emprOpc = new Option(emprNombre, emprVal, true, true);

        $('#esta_nom').append(emprOpc).trigger('change');
        $('#esta_nom').trigger({
            type: 'select2:select',
            params: {
                data: opcion
            }
        });
        $(tag).closest('div').remove();
        editando = true;
    }else{
        notificar('Cuidado',"Ya se esta editando un <b>PERMISO DE TRÁNSITO</b>!",'warning');
    }
}
function verPermiso(tag){
    var data =	JSON.parse($(tag).closest('div').attr('data-json'));
    $("#modalVerPermiso").val(data.perm_id);
    $("#modalVerSolicitud").val(data.soli_num);
    $("#modalVerEmision").val(data.lugar_emision);
    $("#modalVerDocSanitaria").val(data.tipo);
    $("#modalVerHoraSalida").val(data.fecha_hora_salida);
    $("#modalVerOrigen").val(data.origen_nom);
    $("#modalVerOrigenCuit").val(data.origen);
    $("#modalVerOrigenNumero").val(data.origen_num);
    $("#modalVerProductos").val(data.tipr_id);
    $("#modalVerNeto").val(data.neto);
    $("#modalVerBruto").val(data.bruto);
    $("#modalVerEstadoProductos").val(data.estado);
    $("#modalVerTemperatura").val(data.temperatura);
    $("#mdl-verDetallePermiso").modal('show');
}
//FIN Script's seccion permisos transito
/***************************************************** */
/***************************************************** */
//
//Scripts Termico
//
var editandoTermico = false;
function agregarTermico(){
    //Informamos el campo vacio 
    var reporte = validarCamposTermico();
                            
    if(reporte == ''){
        var nro_senasa = $('#num_senasa').val();
        var precintos = $('#precintos').val();
        var term_patente = $("#term_patente").val();

        var datos = {};
        datos.nro_senasa = nro_senasa;
        datos.precintos = precintos;
        datos.case_id = $("#caseId").val();
        datos.term_id = term_patente;

        var div = `<div class='form-group termicos' data-json='${JSON.stringify(datos)}'>
                        <span>
                        <i class='fa fa-fw fa-eye text-light-blue' style='cursor: pointer;' title='Ver detalle' onclick='verTermico(this)'></i> 
                        <i class='fa fa-fw fa-edit text-light-blue' style='cursor: pointer;' title='Editar' onclick='editarTermico(this)'></i>  
                        <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i> 
                        | ${term_patente} - ${nro_senasa}
                        </span>
                </div>`;
        $('#sec_termicos').append(div);
        //Limpio luego de agregar
        $("#term_patente").val('');
        $("#num_senasa").val('');
        $("#precintos").val('');
        alertify.success("Térmico agregado correctamente!");
        editandoTermico = false;
    }else{
        notificar('Cuidado',reporte,'warning');
    }
}
function validarCamposTermico(){
    var valida = '';
    //Térmico Patente
    if($("#term_patente").val() == ""){
        valida = "Complete Térmico Patente!";
    }
    //Número SENASA
    if($("#num_senasa").val() == ""){
        valida = "Complete N° de Habilitación SENASA!";
    }
    //Precintos
    if($("#precintos").val() == ""){
        valida = "Complete Precintos!";
    }
    return valida;
}
function editarTermico(tag){
    if(!editandoTermico){
        var data =	$(tag).closest('div').attr('data-json');
        aux = data.replace("patente", "term_id");
        var json = JSON.parse(aux);

        $("#term_patente").val(json.term_id);
        $("#num_senasa").val(json.nro_senasa);
        $("#precintos").val(json.precintos);
        $(tag).closest('div').remove();
        editandoTermico = true;
    }else{
        notificar('Cuidado',"Ya se esta editando un <b>TÉRMICO</b>!",'warning');
    }
}
function verTermico(tag){
    var data =	$(tag).closest('div').attr('data-json');
    aux = data.replace("patente", "term_id");
    var json = JSON.parse(aux);

    $("#modalVerPatenteTermico").val(json.term_id);
    $("#modalVerSENASATermico").val(json.nro_senasa);
    $("#modalVerNroPrecintos").val(json.precintos);
    $("#mdl-verDetalleTermico").modal('show');
}
//FIN Script's seccion termico
/***************************************************** */
/***************************************************** */
//
//Scripts SELECTS que actualizan combos o inputs
//
//Actualizo nombre del chofer
$('#doc_chofer').on('select2:select', function (e) {
    var data = e.params.data;
    $("#nom_chofer").val(data.text);
    $("#quienAtendio").val(data.text);
});
$('#esta_nom').on('select2:select', function (e) {
    var data = e.params.data;
    $("#esta_num").val(data.num_esta);
});
//Cargo listado de depositos para empresa destino seleccionada
$("#empre_destino").on('change', function(){
    //asigno la empresa al modal para altas rapidas
    $("#empr_id_destino").val($("#empre_destino").val());
    //Habilito el combo box
    $("#depo_destino").prop("disabled", false);
    //limpio opciones del combo
    $('#depo_destino').html('').select2({data: {id:null, text: null}});
    //Cargo los depositos coincidientes con la empresa destino seleccionada
    destino = {};
    destino.empr_id = $("#empre_destino").val();

    $.ajax({
        type: 'POST',
        data: {destino},
        url: "<?php echo SICP; ?>inspeccion/getDepositos",
        success: function(data) {
            if(data != 'null'){
                datos = JSON.parse(data);
                
                $.each(datos, function(i, obj) {
                    depo_id = obj.depo_id;
                    direccion = obj.calle + " - " + obj.altura;

                    newOpc = new Option(direccion, depo_id, false, false);
                    $('#depo_destino').append(newOpc);
                });
                $('#depo_destino').trigger('change');

            }else{
                console.log("Sin depositos relacionados a esta empresa destino");
            }
        },
        error: function(data) {
            alert("Error al obtener depositos");
        }
    });
});

//Cierre formulario
async function cerrarTareaform(){
    
    //obtengo el formulario de la inspeccion
    var dataForm = new FormData($('#formPreCarga')[0]);
    dataForm.append('case_id', $("#caseId").val());
    correcto = ""; //Confirma que todo se guardo correctamente para cerrar tarea

    //Limpio la data pre cargada si existiera para evitar errores
    limpiarDataPreCargada().then((result) => {
        console.log(result);
    }).catch((err) => {
        console.log(err);
    });

    //Guardo los datos del formulario para no perderlos en reload
    //obtengo los permisos
    permisos = [];
    $('#sec_permisos div.permTransito').each(function(i, obj) {
        var json = JSON.parse($(obj).attr('data-json'));
        permisos[i] = json;
    });
debugger;
    //obtengo los destinos
    empresas = [];
    $('#sec_destinos div.empreDestino').each(function(i, obj) {
        var json = JSON.parse($(obj).attr('data-json'));
        empresas[i] = json;
    });
    //obtengo origen
    //EL ORIGEN ES MULTIPLE AHORA, SE CARGA EN LOS PERMISOS DE TRANSITO
    // origen = {};
    // origen.rol = "ORIGEN";
    // origen.empr_id = $("#esta_nom").val();
    // origen.case_id = $("#caseId").val();
    // origen.depo_id = "";
    // empresas.push(origen);
    
    //obtengo transportista
    transp = {};
    transp.rol = "TRANSPORTISTA";
    transp.empr_id = $("#transportista").val();
    transp.case_id = $("#caseId").val();
    transp.depo_id = "";
    empresas.push(transp);
    
    //obtengo los termicos
    termicos = [];
    $('#sec_termicos div.termicos').each(function(i, obj) {
        var json = JSON.parse($(obj).attr('data-json'));
        termicos[i] = json;
    });

    //Guardo la inspeccion
    let guardadoCompleto = new Promise( function(resolve,reject){
            $.ajax({
            type: 'POST',
            data: dataForm,
            cache: false,
            contentType: false,
            processData: false,
            url: "<?php echo SICP; ?>inspeccion/agregarInspeccion",
            success: function(data) {
                result = JSON.parse(data);
                if(result.status){

                    console.log("Se guardo el formulario de PreCarga correctamente");

                    //Guardo los permisos, empresas y termicos
                    $.ajax({
                        type: 'POST',
                        data: {permisos, empresas, termicos},
                        url: "<?php echo SICP; ?>inspeccion/guardarDatosInspeccion",
                        success: function(data) {
                            resp = JSON.parse(data);
                            if(resp.status){
                                console.log(resp.message);
                                resolve(resp);
                            }else{
                                console.log(resp.message);
                                reject(resp);
                            }
                        },
                        error: function(data) {
                            wc();
                            reject(data);
                        }
                    });
                }else{
                    wc();
                    reject(result);
                }

            },
            error: function(data) {
                wc();
                reject(data);
            }
        });
    });
    return await guardadoCompleto;
}
    

function cerrarTarea() {
    wo();
    if(!frm_validar('#formPreCarga')){
        Swal.fire(
            'Error..',
            'Debes completar los campos obligatorios (*)',
            'error'
        );
        wc();
        return;
    }
    //
    //VALIDACION PERMISOS DE TRANSITO
    //
    if ( !$('#sec_permisos').children().length > 0 ) { 
        Swal.fire(
            'Error..',
            'No se agregaron permisos de tránsito (*)',
            'error'
        );
        wc();
        return;
    }
    //
    //VALIDACION EMPRESAS DESTINO
    //
    if ( !$('#sec_destinos').children().length > 0 ) {
        Swal.fire(
            'Error..',
            'No se agregaron empresas de destino (*)',
            'error'
        );
        wc();
        return;
    }
    //
    //VALIDACION TERMICOS
    //
    if ( !$('#sec_termicos').children().length > 0 ) {
        Swal.fire(
            'Error..',
            'No se agregaron térmicos (*)',
            'error'
        );
        wc();
        return;
    }
    //Una vez validado el formulario, lo guardo
    cerrarTareaform().then((result) => {
        
        //No uso formulario dinámico
        var dataForm = new FormData();

        var id = $('#taskId').val();

        $.ajax({
            type: 'POST',
            data: dataForm,
            cache: false,
            contentType: false,
            processData: false,
            url: '<?php base_url() ?>index.php/<?php echo BPM ?>Proceso/cerrarTarea/' + id,
            success: function(data) {
                wc();
                const confirm = Swal.mixin({
					customClass: {
						confirmButton: 'btn btn-primary'
					},
					buttonsStyling: false
				});

                confirm.fire({
                    title: 'Perfecto!',
                    text: "Se finalizó la tarea correctamente!",
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'Hecho'
                }).then((result) => {
                    
                    linkTo('<?php echo BPM ?>Proceso/');
                    
                });

            },
            error: function(data) {
                wc();
                alert("Error al finalizar tarea");
            }
        });
        
    }).catch((err) => {
        wc();
        error("Error!",err.message);
    });
}
//
// Limpio Informacion pre cargada para no tener errores con PK de las tablas
async function limpiarDataPreCargada () {
    let limpiadoCompleto = new Promise( function(resolve,reject){
        caseId = {"case_id" : $("#caseId").val()};
        $.ajax({
            type: 'POST',
            data: {caseId},
            cache: false,
            dataType: "json",
            url: "<?php echo SICP; ?>inspeccion/limpiarDataPreCargada",
            success: function(data) { 

                if(data.status){
                    console.log(data.message);
                    resolve("Se limpio la data pre - cargada correctamente");
                }else{
                    console.log(data.message);
                    reject("Error al limpiar la data pre - cargada");
                }
                 
            },
            error: function(data) {
                reject("Error al limpiar la data pre - cargada");
            }
        });
    });

    return await limpiadoCompleto;
}
</script>
