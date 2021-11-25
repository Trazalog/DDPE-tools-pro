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
.frm-save{
    display: none;
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
<div class="nav-tabs-custom ">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#formReprecintado_tab" data-toggle="tab" aria-expanded="false">Formulario</a></li>
        <li style="display:none !important;" class="privado"><a href="#actaInfraccion_tab" data-toggle="tab" aria-expanded="false">Acta de Infracción</a></li>
        <li style="display:none !important;" class="privado"><a href="#actaInspeccion_tab" data-toggle="tab" aria-expanded="false">Acta de Inspección</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="formReprecintado_tab">
            <!--_______ FORMULARIO PERMISO DE TRANSITO BOX 1______-->
            <form class="formInspeccion" id="formInspeccion">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="caja" id="boxPermisoTransito">
                            <div class="box-tittle centrar">
                                <h3>Permiso de tránsito</h3>
                            </div>
                            <input type="text" class="form-control hidden" name="petr_id" id="petr_id" value="<?php echo $petr_id?>">
                            <!--Solicitud-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="Solicitud">N° de Permiso(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input type="text" class="form-control requerido alfanumerico" id="soli_num" placeholder="Ingrese número de solicitud"/>
                                </div>
                            </div>
                            <!--________________-->

                            <!-- Lugar de Emisión -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="emision">Lugar de emisión(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input type="text" class="form-control" id="emision" placeholder="Ingrese lugar de emisión"/>
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
                                <label for="fecha">Fecha(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input type="date" class="form-control" id="fecha" placeholder="Ingrese fecha"/>
                                </div>
                            </div>
                            <!--________________-->

                            <!--DOC. Sanitaria Tipo-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label for="doc_sanitaria">Doc. Sanitaria Tipo(<strong style="color: #dd4b39">*</strong>):</label>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class='form-check-input' name="doc_sanitaria" value="PT"/>
                                    <label class="form-check-label" for="">PT</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class='form-check-input' name="doc_sanitaria" value="PTR"/>
                                    <label class="form-check-label" for="">PTR</label>
                                </div>
                            </div>
                            <!--________________-->

                            <!--_________________ Agregar_________________-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group text-right">
                                    <button type="button" class="btn btn-primary" onclick="agregarPermiso()" >Agregar</button>
                                </div>
                            </div>                     
                            <!--__________________________________-->
                            <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                                 <h4 class="titDataDinamica">Permisos:</h4>
                                <div id="sec_permisos">
                                    <?php 
                                    if(!empty($preCargaDatos->permisos_transito->permiso_transito)){
                                        foreach ($preCargaDatos->permisos_transito->permiso_transito as $key) {
                                    ?>
                                        <div class='form-group permTransito' data-json='<?php echo json_encode($key) ?>'>
                                            <span> 
                                                <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                                                <i class='fa fa-fw fa-edit text-light-blue' style='cursor: pointer;' title='Editar'></i> 
                                                <?php echo "| <span class='numPermiso'>$key->perm_id</span> - $key->tipo - $key->lugar_emision - $key->fecha_hora_salida" ?>
                                            </span>
                                        </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <hr>
                            </div>

                            <?php $this->load->view(SICP.'inspeccion/mosaicoBarrera.php') ?>
                            <hr>
                            <?php $this->load->view(SICP.'inspeccion/mosaicoDocumentacion.php') ?>
                        </div><!-- FIN box-primary -->
                    </div>
                    <!--_______ FIN FORMULARIO PERMISO DE TRANSITO BOX 1 ______-->

                    <!--_______ FORMULARIO INSPECCION BOX 2______-->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="caja" id="boxInspeccion">
                            <!--DNI Chofer-->
                            <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                                <div class="form-group">
                                    <label for="doc_chofer">DNI Chofer(<strong style="color: #dd4b39">*</strong>):</label>
                                    <div class="input-group">
                                        <select class="form-control select2 select2-hidden-accesible choferes" name="chof_id" id="doc_chofer" data-bv-notempty data-bv-notempty-message="Campo Obligatorio *">
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
                                    <label for="nom_chofer">Nombre Chofer(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input type="text" class="form-control" name="nom_chofer" id="nom_chofer" placeholder="" readonly/>
                                </div>
                            </div>
                            <!--________________-->

                            <!--Patente Tractor-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label for="patenteTractor">Patente Tractor(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control limited" name="patente_tractor" id="patenteTractor" placeholder="Ingrese Patente Tractor" value="<?php echo isset($preCargaDatos->patente_tractor) ? $preCargaDatos->patente_tractor : $patente ?>" required/>
                                </div>
                            </div>
                            <!--________________-->

                            <!--Nombre Establecimiento-->
                            <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                                <div class="form-group">
                                    <label for="esta_nom">Establecimiento(<strong style="color: #dd4b39">*</strong>):</label>
                                    <div class="input-group">
                                        <select class="form-control select2 select2-hidden-accesible empresa" id="esta_nom" required>
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
                                    <input class="form-control" name="esta_num" id="esta_num" placeholder="Establecimiento N°" readonly/>
                                </div>
                            </div>
                            <!--________________-->

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

                            <!--_________________ Agregar_________________-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div style="margin-top: 25px;" class="form-group text-right">
                                    <button type="button" class="btn btn-primary" onclick="agregarDestino()" >Agregar</button>
                                </div>
                            </div>                
                            <!--__________________________________-->

                            <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                                 <h4 class="titDataDinamica">Empresa Destino:</h4>
                                <div id="sec_destinos">
                                    <?php 
                                    if(!empty($destinos)){
                                        foreach ($destinos as $key) {
                                    ?>
                                        <div class='form-group empreDestino' data-json='<?php echo json_encode($key) ?>'>
                                            <span> 
                                                <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                                                <?php echo "| $key->razon_social - $key->calle - $key->altura" ?>
                                            </span>
                                        </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            <hr>
                            </div>
                            <!--________________-->
                            <!--Transportista-->
                            <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                                <div class="form-group">
                                    <label for="transportista">Transportista(<strong style="color: #dd4b39">*</strong>):</label>
                                    <div class="input-group">
                                        <select class="form-control select2 select2-hidden-accesible empresa" id="transportista" required>
                                            <option value="" disabled selected></option>
                                        </select>
                                        <span id="add_transportista" class="input-group-addon" data-toggle="modal" data-target="#mdl-empresa" onclick="$('#tipoEmpresa').val('Transportista')"><i class="fa fa-plus"></i></span>
                                    </div>
                                </div>                    
                            </div>
                            <!--________________-->

                            <!--N° SENASA-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="num_senasa">N° SENASA(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control limitedChars" name="nro_senasa" id="num_senasa" placeholder="Ingrese N° SENASA" value="<?php echo isset($preCargaDatos->nro_senasa) ? $preCargaDatos->nro_senasa : null ?>" required/>
                                </div>
                            </div>
                            <!--________________-->

                            <!--Producto-->
                            <div class="col-md-12 col-sm-12 col-xs-12 ocultar">
                                <div class="form-group">
                                    <label for="producto">Producto/s(<strong style="color: #dd4b39">*</strong>):</label>
                                    <textarea class="form-control" name="productos" id="producto" placeholder="Ingrese producto/s" required></textarea>
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Termico Patente-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="term_patente">Térmico Patente(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control limited" id="term_patente" placeholder="Ingrese térmico patente" />
                                </div>                    
                            </div>
                            <!--________________-->

                            <!--Temperatura-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="temperatura">Temperatura(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input type="number" class="form-control" id="temperatura" placeholder="Ingrese temperatura" />
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Precintos-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="precintos">Precintos N°(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control limited" id="precintos" placeholder="Ingrese precintos" />
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--_________________ Agregar_________________-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group text-right">
                                    <button type="button" class="btn btn-primary" onclick="agregarTermico()" >Agregar</button>
                                </div>
                            </div>                
                            <!--__________________________________-->
                            <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                                 <h4 class="titDataDinamica">Térmico:</h4>
                                <div id="sec_termicos">
                                    <?php 
                                    if(!empty($preCargaDatos->termicos->termico)){
                                        foreach ($preCargaDatos->termicos->termico as $key) {
                                    ?>
                                        <div class='form-group termicos' data-json='<?php echo json_encode($key) ?>'>
                                            <span> 
                                                <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                                                <?php echo "| $key->patente - $key->temperatura - $key->precintos" ?>
                                            </span>
                                        </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <hr>
                            </div>
                            <!--________________-->
                            <!--Observaciones-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="observaciones">Observaciones:</label>
                                    <textarea class="form-control" name="observaciones" id="observaciones" placeholder="Observaciones"><?php echo isset($preCargaDatos->observaciones) ? $preCargaDatos->observaciones : null; ?></textarea>
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Requiere Reprecintado-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="reprecintado">¿Requiere Reprecintado?(<strong style="color: #dd4b39">*</strong>):</label>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class='form-check-input' name="reprecintado" value="true" required/>
                                        <label class="form-check-label" for="">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class='form-check-input' name="reprecintado" value="false" required/>
                                        <label class="form-check-label" for="">No</label>
                                    </div>
                                </div>
                            </div>
                            <!--________________-->
                            <!--Bruto-->
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="bruto">Bruto:</label>
                                    <input class="form-control neto onlyNumbers" name="bruto" id="bruto" placeholder="Bruto" />
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Tara-->
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="tara">Tara:</label>
                                    <input class="form-control neto onlyNumbers" name="tara" id="tara" placeholder="Tara" />
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Neto-->
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="neto">Neto:</label>
                                    <input class="form-control" id="neto" placeholder="Neto" readonly/>
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Ticket-->
                            <div class="col-md-12 col-sm-12 col-xs-6">
                                <div class="form-group">
                                    <label for="ticket">Ticket:</label>
                                    <input class="form-control" name="ticket" id="ticket" placeholder="Ingrese ticket" />
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Valida Inspeccion-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="inspValida">¿Inspección correcta?:</label>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class='form-check-input' name="inspValida" value="correcta" onchange="showValidar(this)"/>
                                        <label class="form-check-label" for="">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class='form-check-input' name="inspValida" value="incorrecta" onchange="showValidar(this)"/>
                                        <label class="form-check-label" for="">No</label>
                                    </div>
                                </div>
                            </div>
                            <!--________________-->
                            <!--Bloque Validar-->
                            <div id="bloque_validar" style="display:none;">
                                <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                                    <div class="form-group">
                                        <label for="tpoInfraccion">Tipos Infracción(<strong style="color: #dd4b39">*</strong>):</label>
                                        <select class="form-control select2 select2-hidden-accesible" name="tpoInfraccion" id="tpoInfraccion" required>
                                            <option value="" disabled selected>-Seleccionar infracción-</option>	
                                            <?php
                                            if(!empty($infracciones)){
                                                foreach ($infracciones as $tipos) {
                                                    echo "<option data-json='".json_encode($tipos)."' value='".$tipos->tabl_id."'>".$tipos->descripcion."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="cant_fajas">Cantidad de fajas(<strong style="color: #dd4b39">*</strong>):</label>
                                        <input type="number" class="form-control" name="cant_fajas" id="cant_fajas" placeholder="Ingrese N° fajas" required/>
                                    </div>
                                </div>
                            </div>                    
                            <!--________________-->
                        </div> <!--FIN box-primary-->
                    </div><!--FIN col-->
                <!--_______ FIN FORMULARIO INSPECCION BOX 2______-->
                </div><!-- FIN row-->
            </form>
        </div><!-- FIN .tab-pane -->
        <div class="tab-pane" id="actaInspeccion_tab">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php $this->load->view(SICP."actas/acta_inspeccion.php"); ?>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="actaInfraccion_tab">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php $this->load->view(SICP."actas/acta_infraccion_inspeccion.php"); ?>
                </div>
            </div>
        </div>
    </div>
</div>
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

    //Script para inicio de formulario 11
    //Escaneo documentacion
    detectarForm();
    initForm();

    //Selecciono opciones guardadas en los combo's
    //DNI CHOFER
    dni_chofer = "<?php echo isset($preCargaDatos->chof_id) ? $preCargaDatos->chof_id : null ?>";
    chofer = "<?php echo isset($preCargaDatos->chofer) ? $preCargaDatos->chofer : null ?>";

    dniOpc = new Option(chofer, dni_chofer, true, true);
    opcion = {'id': dni_chofer, 'text': chofer};

    $('#doc_chofer').append(dniOpc).trigger('change');
    $('#doc_chofer').trigger({
        type: 'select2:select',
        params: {
            data: opcion
        }
    });
    //EMPRESA ORIGEN
    empr_origen = "<?php echo isset($origen) ? $origen->cuit : null ?>";
    empr_origen_nombre = "<?php echo isset($origen) ? $origen->razon_social : null ?>";
    empr_origen_num = "<?php echo isset($origen) ? $origen->num_establecimiento : null ?>";
    
    opcion = {'id': empr_origen, 'text': empr_origen_nombre, 'num_esta': empr_origen_num};

    emprOpc = new Option(empr_origen_nombre, empr_origen, true, true);

    $('#esta_nom').append(emprOpc).trigger('change');
    $('#esta_nom').trigger({
        type: 'select2:select',
        params: {
            data: opcion
        }
    });

    //EMPRESA TRANSPORTISTA
    empr_trasnp = "<?php echo isset($transportista) ? $transportista->cuit : null ?>";
    empr_trasnp_nombre = "<?php echo isset($transportista) ? $transportista->razon_social : null ?>";

    transpOpc = new Option(empr_trasnp_nombre, empr_trasnp, true, true);
    $('#transportista').append(transpOpc).trigger('change');

    //MÁSCARAS
    //Lugar de Emision A-Z, 0-9 y space
    $("#emision").inputmask({ regex: "[a-zA-Z0-9 ]*" });
    //Solicitud N°
    $(".alfanumerico").inputmask({ regex: "[0-9a-zA-Z]*" });
    // N° SENASA: 0-9, /, ',' y -
    $(".limitedChars").inputmask({ regex: "[0-9/,-]*" });
    //PRECINTOS y Patentes: 0-9, A-Z, space, / y -
    $(".limited").inputmask({ regex: "[0-9/a-zA-Z -]*" });
    //Bruto y Tara
    $(".onlyNumbers").inputmask({ regex: "[0-9.,]*" });

    //Renombro el BOTON de guardar
    $('#btnHecho').text('Imprimir acta');

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
function agregarDestino(){
    //Informamos el campo vacio 
    var reporte = validarCamposDestino();
                            
    if(reporte == ''){
        var empre_destino = $('#empre_destino').find(':selected').text();
        var depo_destino = $('#depo_destino').find(':selected').text();

        var datos = {};
        datos.rol = "DESTINO";
        datos.empr_id = $("#empre_destino").val();
        datos.depo_id = $("#depo_destino").val();

        var div = `<div class='form-group empreDestino' data-json='${JSON.stringify(datos)}'>
                        <span> 
                        <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                        | ${empre_destino} - ${depo_destino}
                        </span>
                </div>`;
        $('#sec_destinos').append(div);
        //Limpio luego de agregar
        $('#empre_destino').val(null).trigger('change');
        $('#depo_destino').val(null).trigger('change');
        alertify.success("Destino agregado correctamente!");
    }else{
        alert(reporte);
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
        // var descDepo = $("#depo_origen_id option:selected").text();
        var emision = $('#emision').val();
        var salida = $('#salida').val();
        var fecha = $("#fecha").val();
        var tipo = $('input[name=doc_sanitaria]:checked').val();

        var datos = {};
        datos.perm_id = soli_num;
        datos.lugar_emision = emision;
        datos.fecha_hora_salida = fecha +" "+salida;
        datos.tipo = tipo;

        var div = `<div class='form-group permTransito' data-json='${JSON.stringify(datos)}'>
                        <span> 
                        <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                        <i class='fa fa-fw fa-edit text-light-blue' style='cursor: pointer;' title='Editar'></i> 
                        | <span class='numPermiso'>${soli_num}</span> - ${tipo} - ${emision} - ${fecha} ${salida}
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
        alert(reporte);
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
    return valida;
}

$(document).on("click",".fa-edit",function(e) {
    if(!editando){
        var data =	JSON.parse($(e.target).closest('div').attr('data-json'));
        $("#soli_num").val(data.perm_id);
        $("#emision").val(data.lugar_emision);
        aux = data.fecha_hora_salida.split(" ");
        $("#salida").val(aux[1]);
        $("#fecha").val(aux[0]);
        $("input[name=doc_sanitaria][value='"+data.tipo+"']").prop("checked",true);
        $(e.target).closest('div').remove();
        editando = true;
    }else{
        alert("Ya se esta editando un permiso!");
    }
});
//FIN Script's seccion permisos transito
/***************************************************** */
/***************************************************** */
//
//Scripts Termico
//
function agregarTermico(){
    //Informamos el campo vacio 
    var reporte = validarCamposTermico();
                            
    if(reporte == ''){
        var temperatura = $('#temperatura').val();
        var precintos = $('#precintos').val();
        var term_patente = $("#term_patente").val();
        // var descDepo = $("#depo_origen_id option:selected").text();

        var datos = {};
        datos.temperatura = temperatura;
        datos.precintos = precintos;
        datos.term_id = term_patente;

        var div = `<div class='form-group termicos' data-json='${JSON.stringify(datos)}'>
                        <span> 
                        <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i> 
                        | ${term_patente} - ${temperatura} - ${precintos}
                        </span>
                </div>`;
        $('#sec_termicos').append(div);
        //Limpio luego de agregar
        $("#term_patente").val('');
        $("#temperatura").val('');
        $("#precintos").val('');
        alertify.success("Térmico agregado correctamente!");
    }else{
        alert(reporte);
    }
}
function validarCamposTermico(){
    var valida = '';
    //Térmico Patente
    if($("#term_patente").val() == ""){
        valida = "Complete Térmico Patente!";
    }
    //Temperatura
    if($("#temperatura").val() == ""){
        valida = "Complete Temperatura!";
    }
    //Precintos
    if($("#precintos").val() == ""){
        valida = "Complete Precintos!";
    }
    return valida;
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
//Actualizo neto cuando se cargue Bruto y Tara
$(".neto").on("change", function () {
    bruto = $("#bruto").val();
    tara = $("#tara").val();

    if(bruto != '' && tara != ''){
        neto = bruto - tara;
        if(neto > 0){
            $('#neto').val(neto);
        }else{
            $("#bruto").val('');
            $("#tara").val('');
            alert("El peso bruto es menor al peso tara");
        }
    }
});
//Comienzo scripts preparacion y cierre tarea
//Guardado de formulario y limpieza de datos en BD
//Cierre formulario
async function cerrarTareaform(){

    //obtengo el formulario de la inspeccion
    var dataForm = new FormData($('#formInspeccion')[0]);
    var frm_info_id = $('#formEscaneoDocu .frm').attr('data-ninfoid');
    
    dataForm.append('case_id', $("#caseId").val());
    dataForm.append('info_id_doc', frm_info_id);

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
        json.case_id = $("#caseId").val();
        permisos[i] = json;
    });

    //obtengo los destinos
    empresas = [];
    $('#sec_destinos div.empreDestino').each(function(i, obj) {
        var aux = $(obj).attr('data-json');
        aux = aux.replace("cuit", "empr_id");
        var json = JSON.parse(aux);
        json.case_id = $("#caseId").val();
        empresas[i] = json;
    });
    //obtengo origen
    origen = {};
    origen.rol = "ORIGEN";
    origen.empr_id = $("#esta_nom").val();
    origen.case_id = $("#caseId").val();
    origen.depo_id = "";
    empresas.push(origen);
    
    //obtengo transportista
    transp = {};
    transp.rol = "TRANSPORTISTA";
    transp.empr_id = $("#transportista").val();
    transp.case_id = $("#caseId").val();
    transp.depo_id = "";
    empresas.push(transp);
    
    //obtengo los termicos
    // reemplazo el nombre patente que trae en la vuelta del service
    termicos = [];
    $('#sec_termicos div.termicos').each(function(i, obj) {
        var aux = $(obj).attr('data-json');
        aux = aux.replace("patente", "term_id");
        var json = JSON.parse(aux);
        json.case_id = $("#caseId").val();
        termicos[i] = json;
    });

    //obtengo el tipo de infraccion
    infraccion = {};
    if($('#tpoInfraccion').val() != null){
        infraccion.case_id = $("#caseId").val();
        infraccion.tiin_id = $("#tpoInfraccion").val();
    }

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
                console.log("Se guardo el formulario de la inspección correctamente");
                
                //Guardo los permisos, empresas, termicos e infraccion si hubiese
                $.ajax({
                    type: 'POST',
                    data: {permisos, empresas, termicos, infraccion},
                    url: "<?php echo SICP; ?>inspeccion/guardarDatosInspeccion",
                    success: function(data) {
                        resp = JSON.parse(data);
                        if(resp.status){
                            //Guardo formulario de escaneo documentacion, se valido en cerrarTarea()
                            $('#formEscaneoDocu .frm-save').click();

                            console.log(resp.message);
                            resolve("Correcto");
                        }else{
                            console.log(resp.message);
                            reject("Error");
                        }
                    },
                    error: function(data) {
                        wc();
                        alert("Error al guardar datos del formulario");
                        reject("Error");
                    }
                });

            },
            error: function(data) {
                wc();
                alert("Error al guardar formulario de la inspección");
                reject("Error");
            }
        });
    });
    return await guardadoCompleto;
}
    

function cerrarTarea() {
    wo();
    if(!frm_validar('#formInspeccion')){
        wc();
        Swal.fire(
            'Error..',
            'Debes completar los campos obligatorios (*)',
            'error'
        );
        return;
    }
    //
    //Validacion Escaneo Documentacion
    //
    if($("select[name=doc_impo]").val() == "" || $("#cant_doc").val() == ""){
        wc();
        Swal.fire(
            'Error..',
            'Debes completar el formulario de escaneo documentación (*)',
            'error'
        );
        return;
    }
    //
    //VALIDACION PERMISOS DE TRANSITO
    //
    if ( !$('#sec_permisos').children().length > 0 ) { 
        wc();
        Swal.fire(
            'Error..',
            'No se agregaron permisos de tránsito (*)',
            'error'
        );
        return;
    }
    //
    //VALIDACION EMPRESAS DESTINO
    //
    if ( !$('#sec_destinos').children().length > 0 ) {
        wc();
        Swal.fire(
            'Error..',
            'No se agregaron empresas de destino (*)',
            'error'
        );
        return;
    }
    //
    //VALIDACION TERMICOS
    //
    if ( !$('#sec_termicos').children().length > 0 ) {
        wc();
        Swal.fire(
            'Error..',
            'No se agregaron térmicos (*)',
            'error'
        );
        return;
    }
    //Una vez validado el formulario, lo guardo
    cerrarTareaform().then((result) => {
        
        var dataForm = new FormData($('#formInspeccion')[0]);
        var frm_info_id = $('#formEscaneoDocu .frm').attr('data-ninfoid');

        dataForm.append('frm_info_id', frm_info_id);
        dataForm.append('doc_impositiva', $("select[name=doc_impo]").val());
        
        var id = $('#taskId').val();

        $.ajax({
            type: 'POST',
            data: dataForm,
            cache: false,
            contentType: false,
            processData: false,
            url: '<?php base_url() ?>index.php/<?php echo BPM ?>Proceso/cerrarTarea/' + id,
            success: function(data) {

                imprimirActa();

            },
            error: function(data) {
                wc();
                alert("Error al finalizar tarea");
            }
        });
        
    }).catch((err) => {
        wc();
        console.log(err);
        alert("Error al finalizar tarea");
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
//FIN Scripts Cierre tarea
/***************************************************** */
/***************************************************** */
//
//Bloques para validar
//
function showValidar(tag){
    if(tag.value == "correcta"){
        $("#bloque_validar").hide();
        $('#tpoInfraccion').val(null).trigger('change');
    }else{
        $("#bloque_validar").show();
    }
}
/***************************************************** */
//
//Scripts Imprimir ACTA 
//
function imprimirActa(){

    var idActa = "#actaInspeccionPCC";
    //Completo datos en el acta antes de imprimir
    $(".acta_caseId").text($("#case_id").val());
    $(".acta_chofer").text($("#nom_chofer").val());
    $(".acta_dniChofer").text($("#doc_chofer").val());
    $(".acta_patenteTractor").text($("#patenteTractor").val());
    $(".acta_numSenasa").text($("#num_senasa").val());
    $(".acta_cantFajas").text($("#cant_fajas").val());
    $(".acta_observaciones").text($("#observaciones").val());
    $(".acta_origenNro").text($("#esta_num").val());
    $(".acta_estaOrigen").text($("#esta_nom").select2('data')[0].text);
    $(".acta_transportista").text($('#transportista').select2('data')[0].text);
    $(".acta_productos").text($("#producto").val());
    $(".acta_bruto").text($("#bruto").val());
    $(".acta_tara").text($("#tara").val());
    $(".acta_ticket").text($("#ticket").val());

    //Valído
    if($('#tpoInfraccion').val() != null){
        $(".acta_infraccion").text($('#tpoInfraccion').select2('data')[0].text);
        idActa = '#actaInfraccionPCC';
    }


    infoTemperatura = "";
    $('#sec_termicos div.termicos').each(function(i, obj) {
        aux = $(obj).attr('data-json');
        json = JSON.parse(aux);
        infoTemperatura += json.temperatura + " ";
    });
    $(".acta_temperaturas").text(infoTemperatura);

    infoPrecintos = "";
    $('#sec_termicos div.termicos').each(function(i, obj) {
        aux = $(obj).attr('data-json');
        json = JSON.parse(aux);
        infoPrecintos += json.precintos + " ";
    });
    $(".acta_precintos").text(infoPrecintos);

    infoDestino = "";
    $('#sec_destinos div.empreDestino').each(function(i, obj) {
        aux = $(obj).attr('data-json');
        json = JSON.parse(aux);
        infoDestino += json.razon_social+". ";
    });
    $(".acta_destinos").text(infoDestino);

    infoPermisos = "";
    $('#sec_permisos div.permTransito').each(function(i, obj) {
        aux = $(obj).attr('data-json');
        json = JSON.parse(aux);
        infoPermisos += json.tipo + " ";
    });
    $(".acta_docSanitaria").text(infoPermisos);

    var base = "<?php echo base_url()?>";
    
    $(idActa).printThis({
        debug: false,
        importCSS: false,
        importStyle: true,
        loadCSS: "",
        base: base,
        pageTitle : "TRAZALOG TOOLS",
        afterPrint: function(){
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
        }
    });

};
/****************************************************** */
//Show vista previa de las imagenes en escaneo de documentación
//Genero el contenedor de la vista previa y se lo pego al contenedor del mosaico de imagenes
$("#btn-cierreEscaneo").on('click', function() {
    $("#mosaicoDocumentos img").remove();

    $("#formEscaneoDocu").find("input[type=file]").each(function(index, field){
        if ($(field)[0].files[0]) {
            (function(){
                let file = $(field)[0].files[0];
                let htmlVistaPrevia = $("<img class='thumbnail fotos documentacion' height='51' width='45' src='' alt='' onclick='preview(this)'>");
                let reader = new FileReader();
                $("#mosaicoDocumentos").append(htmlVistaPrevia);

                reader.onload = function () {
                    $(htmlVistaPrevia).attr('src', reader.result);
                }
                reader.readAsDataURL(file);
            }());
        }
    });
});
/***************************************************** */
</script>
