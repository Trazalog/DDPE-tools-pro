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
.dataTemporal{
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

/* ESTILOS VISTA PREVIA */
.col img {
  opacity: 0.8;
  cursor: pointer;
}
.col img:hover {
  opacity: 1;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
.contenedor {
  display: inline-flex;
}
#imgtext {
  position: absolute;
  bottom: 15px;
  left: 15px;
  color: white;
  font-size: 20px;
}
.closebtn {
  position: absolute;
  left: 2%;
  color: white;
  font-size: 35px;
  display: flex;
  cursor: pointer;
}
/* THUMBNAIL */
.selected{
    opacity : 0.2 !important;
} 
.fotos{
    float: left;
    margin-right: 10px;
    display: block;
}
#expandedImg{
  margin-right: auto;
  margin-left:auto;
  display: block;
  max-width: 60%;
}
/* FIN ESTILOS VISTA PREVIA */
.btnZoom {
  height: 40px;
}
#add_docu{
    display: none;
}
</style>
<!--_______ FORMULARIO PERMISO DE TRANSITO BOX 1______-->
<form class="formInfraccionPCC" id="formInfraccionPCC">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="caja" id="boxPermisoTransito">
                <div class="box-tittle centrar">
                    <h3>Permiso de tránsito</h3>
                </div>
                <input type="text" class="form-control hidden" name="petr_id" id="petr_id" value="<?php echo $petr_id?>">
                <input type="text" class="form-control hidden" name="reprecintado" id="reprecintado" value="<?php echo $inspeccion->reprecintado ?>">
                <input type="text" class="form-control hidden" name="info_id_doc" id="info_id_doc" value="<?php echo $inspeccion->info_id_doc ?>">
                <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                    <h4>Permisos:</h4>
                    <div id="sec_permisos">
                        <?php 
                        if(!empty($inspeccion->permisos_transito->permiso_transito)){
                            foreach ($inspeccion->permisos_transito->permiso_transito as $key) {
                        ?>
                            <div class='form-group dataTemporal' data-json='<?php echo json_encode($key) ?>'>
                                <span> 
                                    <?php echo "$key->perm_id - $key->tipo - $key->lugar_emision - $key->fecha_hora_salida" ?>
                                </span>
                            </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <hr>
                </div>
                <?php $this->load->view(SICP.'reprecintado/mosaicoReprecintado.php') ?>
            </div><!-- FIN box-primary -->
        </div>
        <!--_______ FIN FORMULARIO PERMISO DE TRANSITO BOX 1 ______-->

        <!--_______ FORMULARIO INSPECCION BOX 2______-->
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="caja" id="boxInspeccion">
                <!--DNI Chofer-->
                <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                    <div class="form-group">
                        <label for="doc_chofer">DNI Chofer:</label>
                        <input type="text" class="form-control" name="chof_id" id="doc_chofer" value="<?php echo isset($inspeccion->chof_id) ? $inspeccion->chof_id : null ?>" readonly/>
                    </div>
                </div>
                <!--________________-->

                <!-- Nombre CHOFER -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="nom_chofer">Nombre Chofer:</label>
                        <input type="text" class="form-control" name="nom_chofer" id="nom_chofer" value="<?php echo isset($inspeccion->chofer) ? $inspeccion->chofer : null ?>" readonly/>
                    </div>
                </div>
                <!--________________-->

                <!--Patente Tractor-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group has-feedback">
                        <label for="patenteTractor">Patente Tractor:</label>
                        <input class="form-control" name="patente_tractor" id="patenteTractor" value="<?php echo isset($inspeccion->patente_tractor) ? $inspeccion->patente_tractor : null ?>" readonly/>
                    </div>
                </div>
                <!--________________-->

                <!--N° SENASA-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="num_senasa">N° SENASA:</label>
                        <input class="form-control limitedChars" name="nro_senasa" id="num_senasa" value="<?php echo isset($inspeccion->nro_senasa) ? $inspeccion->nro_senasa : null ?>" readonly/>
                    </div>
                </div>
                <!--________________-->
                
                <!--Establecimiento N°-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="esta_num">Establecimiento N°:</label>
                        <input class="form-control" name="esta_num" id="esta_num" value="<?php echo isset($origen->cuit) ? $origen->cuit : null ?>" readonly/>
                    </div>
                </div>
                <!--________________-->

                <!--Nombre Establecimiento-->
                <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                    <div class="form-group">
                        <label for="esta_nom">Establecimiento:</label>
                        <input class="form-control" name="esta_nom" id="esta_nom" value="<?php echo isset($origen->razon_social) ? $origen->razon_social : null ?>" readonly/>
                    </div>
                </div>
                <!--________________-->

                <!--Seccion Destinos-->
                <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                    <h4>Empresa Destino:</h4>
                    <div id="sec_destinos">
                        <?php 
                        if(!empty($destinos)){
                            foreach ($destinos as $key) {
                        ?>
                            <div class='form-group empreDestino dataTemporal' data-json='<?php echo json_encode($key) ?>'>
                                <span> 
                                    <?php echo "$key->razon_social - $key->calle - $key->altura" ?>
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
                        <label for="transportista">Transportista:</label>
                        <input class="form-control" name="transportista" id="transportista" value="<?php echo isset($transportista->razon_social) ? $transportista->razon_social : null ?>" readonly/>
                    </div>                    
                </div>
                <!--________________-->

                <!--Producto-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="producto">Producto/s:</label>
                        <input class="form-control" name="productos" id="producto" value="<?php echo isset($inspeccion->productos) ? $inspeccion->productos : null; ?>" readonly/>
                    </div>                    
                </div>
                <!--________________-->

                <!--Seccion termicos-->
                <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                    <h4>Térmico:</h4>
                    <div id="sec_termicos">
                        <?php 
                        if(!empty($inspeccion->termicos->termico)){
                            foreach ($inspeccion->termicos->termico as $key) {
                        ?>
                            <div class='form-group termicos dataTemporal' data-json='<?php echo json_encode($key) ?>'>
                                <span> 
                                    <?php echo "$key->patente - $key->temperatura - $key->precintos" ?>
                                </span>
                            </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <!--________________-->
                <!--Observaciones-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="observaciones">Observaciones:</label>
                        <textarea class="form-control" row="3" name="observaciones" id="observaciones" placeholder="Observaciones" readonly><?php echo isset($inspeccion->observaciones) ? $inspeccion->observaciones : null; ?></textarea>
                    </div>                    
                </div>
                <!--________________-->

                <!--Cantidad Documentos-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group has-feedback">
                        <label for="cant_documentos">Cantidad de Documentos:</label>
                        <input class="form-control" name="cant_doc" id="cant_documentos" value="<?php echo isset($formEscaneo['datos']['cant_doc']) ? $formEscaneo['datos']['cant_doc'] : null ?>" readonly/>
                    </div>
                </div>
                <!--________________-->

                <!--Doc. Impositiva-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="doc_impositiva">Doc. Impositiva:</label>
                        <input class="form-control" name="doc_impo" id="doc_impositiva" value="<?php echo isset($formEscaneo['datos']['doc_impo']) ? $formEscaneo['datos']['doc_impo'] : null ?>" readonly/>
                    </div>
                </div>
                <!--________________-->
                
                <?php if(!empty($imgInfraccion)){ ?>
                    <!--Acta Infraccion-->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="input-group">
                                <label>Acta infracción en calle:</label>
                            </div>
                                <div class="col-sm-12 col-md-12 col-xl-12">
                                    <div class="contenedor">
                                        <img id="imgActaInfraccion" class='thumbnail fotos' height='51' width='45' src='<?php echo $imgInfraccion[0] ?>' alt='' onclick='preview(this)'>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!--________________-->
                <?php } ?>
                <!--Pesaje Inspección -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="pesaje_inspeccion">Pesaje Inspección:</label>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label for="bruto">Bruto:</label>
                            <input class="form-control neto" name="bruto" id="bruto" value="<?php echo isset($inspeccion->bruto) ? $inspeccion->bruto : null; ?>" readonly/>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label for="tara">Tara:</label>
                            <input class="form-control neto" name="tara" id="tara" value="<?php echo isset($inspeccion->tara) ? $inspeccion->tara : null; ?>" readonly/>
                        </div>
                    </div> 
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label for="neto">Neto:</label>
                            <input class="form-control" name="neto" id="neto" readonly/>
                        </div>
                    </div> 
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label for="ticket">Ticket:</label>
                            <input class="form-control" name="ticket" id="ticket" value="<?php echo isset($inspeccion->ticket) ? $inspeccion->ticket : null; ?>" readonly/>
                        </div>
                    </div>                     
                </div>
                <!--________________-->
                
                <!--Pesaje Reprecintado -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="pesaje_inspeccion">Pesaje Reprecintado:</label>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label for="bruto">Bruto:</label>
                            <input class="form-control netoRepre" name="bruto_reprecintado" id="bruto_reprecintado" value="<?php echo isset($inspeccion->bruto_reprecintado) ? $inspeccion->bruto_reprecintado : null; ?>" readonly/>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label for="tara_reprecintado">Tara:</label>
                            <input class="form-control netoRepre" name="tara_reprecintado" id="tara_reprecintado" value="<?php echo isset($inspeccion->tara_reprecintado) ? $inspeccion->tara_reprecintado : null; ?>" readonly/>
                        </div>
                    </div> 
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label for="neto_reprecintado">Neto:</label>
                            <input class="form-control" name="neto_reprecintado" id="neto_reprecintado" readonly/>
                        </div>
                    </div> 
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label for="ticket_reprecintado">Ticket:</label>
                            <input class="form-control" name="ticket_reprecintado" id="ticket_reprecintado" value="<?php echo isset($inspeccion->ticket_reprecintado) ? $inspeccion->ticket_reprecintado : null; ?>" readonly/>
                        </div>
                    </div>                     
                </div>
                <!--________________-->

                <!--Valida Inspeccion-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="inspValida">¿Inspección correcta?:</label>
                        <input class="form-control" name="inspValida" id="resultado" value="<?php echo isset($inspeccion->resultado) ? $inspeccion->resultado : null; ?>" readonly/>
                    </div>
                </div>
                <!--________________-->
                <!--Bloque Validar-->
                <div id="bloque_validar" style="display:none;">
                    <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                        <div class="form-group">
                            <label for="tpoInfraccion">Tipo infracción:</label>
                            <input type="text" class="form-control" name="tpoInfraccion" id="tpoInfraccion" value="<?php echo isset($inspeccion->infracciones->infraccion) ? $inspeccion->infracciones->infraccion[0]->tipo_infraccion : null; ?>" readonly/>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="cant_fajas">Cantidad de fajas:</label>
                            <input type="number" class="form-control" name="cant_fajas" id="cant_fajas" value="<?php echo isset($inspeccion->cant_fajas) ? $inspeccion->cant_fajas : null; ?>" readonly/>
                        </div>
                    </div>
                </div>                    
                <!--________________-->
            </div> <!--FIN box-primary-->
        </div><!--FIN col-->
    <!--_______ FIN FORMULARIO INSPECCION BOX 2______-->
    </div><!-- FIN row-->
</form>
<script>
//
//Document READY
//Instancias select2 combo box
//
$(document).ready(function() {
    //Seccion de trigger para los cambios
    //Mustra bloque validar si es correcta
    showValidar($('#resultado').val());
    //Calcula neto anterior
    $(".neto").trigger('change');
    $(".netoRepre").trigger('change');
});//FIN document.ready

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
        }
    }
});
//Actualizo neto cuando se cargue Bruto y Tara
$(".netoRepre").on("change", function () {
    bruto = $("#bruto_reprecintado").val();
    tara = $("#tara").val();

    if(bruto != '' && tara != ''){
        neto = bruto - tara;
        if(neto > 0){
            $('#neto_reprecintado').val(neto);
        }else{
            $("#bruto").val('');
            $("#tara").val('');
        }
    }
});
//
//Comienzo scripts preparacion y cierre tarea
//Guardado de formulario
//Cierre formulario
async function cerrarTareaform(){

    //obtengo el formulario de la inspeccion
    var dataForm = new FormData($('#formInfraccionPCC')[0]);
    var frm_info_id = $('#info_id_doc').val();
    
    dataForm.append('case_id', $("#caseId").val());
    dataForm.append('info_id_doc', frm_info_id);

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
                resolve("Correcto");

            },
            error: function(data) {
                alert("Error al guardar formulario de la inspección");
                reject("Error");
            }
        });
    });
    return await guardadoCompleto;
}


function cerrarTarea() {

    if(!frm_validar('#formInfraccionPCC')){
        console.log("Error al validar Formulario");
				Swal.fire(
					'Error..',
					'Debes completar los campos obligatorios (*)',
					'error'
				);
        return;
    }

    //Una vez validado el formulario, lo guardo
    cerrarTareaform().then((result) => {
        
        var dataForm = new FormData($('#formInfraccionPCC')[0]);
        var frm_info_id = $('#info_id_doc').val();
        dataForm.append('frm_info_id', frm_info_id);
        
        var id = $('#taskId').val();

        $.ajax({
            type: 'POST',
            data: dataForm,
            cache: false,
            contentType: false,
            processData: false,
            url: '<?php base_url() ?>index.php/<?php echo BPM ?>Proceso/cerrarTarea/' + id,
            success: function(data) {
                
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
                alert("Error al finalizar tarea");
            }
        });
    }).catch((err) => {
        console.log(err);
        alert("Error al finalizar tarea");
    });
}
//FIN Scripts Cierre tarea
/***************************************************** */
/***************************************************** */
//
//Bloques para validar
//
function showValidar(resultado){
    if(resultado == "correcta"){
        $("#bloque_validar").hide();
    }else{
        $("#bloque_validar").show();
    }
}
</script>
