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
</style>
<div class="nav-tabs-custom ">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#formReprecintado_tab" data-toggle="tab" aria-expanded="false">Formulario</a></li>
        <li style="display:none !important;" class="privado"><a href="#actaInfraccion_tab" data-toggle="tab" aria-expanded="false">Acta de Infracción</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="formReprecintado_tab">
            <!--_______ FORMULARIO PERMISO DE TRANSITO BOX 1______-->
            <form class="formReprecintado" id="formReprecintado">
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
                                   
                                    //echo var_dump($inspeccion->reprecintado);
                                    
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
                            <!--Inspectores-->
                            <div style="margin-top: 50px;" class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="inspectores">Inspectores(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control" name="inspectores" id="inspectores" placeholder="Ingrese Inspectores" value="<?php echo $inspeccion->inspectores ?>"/>
                                </div>                    
                            </div>
                            <!--________________-->
                        </div><!-- FIN #boxPermisoTransito -->
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
                            <!--Bruto-->
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="bruto">Bruto:</label>
                                    <input class="form-control neto onlyNumbers" name="bruto" id="bruto" value="<?php echo isset($inspeccion->bruto) ? $inspeccion->bruto : null; ?>"/>
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Tara-->
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="tara">Tara:</label>
                                    <input class="form-control neto onlyNumbers" name="tara" id="tara" value="<?php echo isset($inspeccion->tara) ? $inspeccion->tara : null; ?>"/>
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Neto-->
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="neto">Neto:</label>
                                    <input class="form-control" id="neto" readonly/>
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Ticket-->
                            <div class="col-md-12 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="ticket">Ticket:</label>
                                    <input class="form-control" name="ticket" id="ticket" value="<?php echo isset($inspeccion->ticket) ? $inspeccion->ticket : null; ?>"/>
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Bruto Reprecintado-->
                            <!-- <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="bruto">Bruto:</label>
                                    <input class="form-control netoRepre onlyNumbers" name="bruto_reprecintado" id="bruto_reprecintado"/>
                                </div>                    
                            </div> -->
                            <!--________________-->
                            <!--Neto Reprecintdo-->
                            <!-- <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="neto_reprecintado">Neto:</label>
                                    <input type="number" class="form-control" id="neto_reprecintado" readonly/>
                                </div>                    
                            </div> -->
                            <!--________________-->
                            <!--Ticket Reprecintado-->
                            <!-- <div class="col-md-12 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="ticket">Ticket:</label>
                                    <input class="form-control" name="ticket_reprecintado" id="ticket_reprecintado"/>
                                </div>                    
                            </div> -->
                            <!--________________-->
                            <!--Nro de Precintos de cierre-->
                            <div class="col-md-12 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="nroPrecintosCierre">Nro de Precintos de cierre(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control onlyNumbers" name="nroPrecintosCierre" id="nroPrecintosCierre" placeholder="Ingrese Precintos"/>
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Observaciones Reprecintado-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="observaciones">Observaciones:</label>
                                    <textarea class="form-control" name="observaciones" id="observacionesReprecintado" placeholder="Observaciones"></textarea>
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
                            <div class="col-md-12 col-sm-12 col-xs-12 ocultar">
                                <div class="form-group">
                                    <label for="tpoInfraccion">Tipos Infracción(<strong style="color: #dd4b39">*</strong>):</label>
                                    <select class="form-control select2 select2-hidden-accesible" name="tpoInfraccion[]" id="tpoInfraccion" required style="width: 100%;" multiple>
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
                                <div class="col-md-12 col-sm-12 col-xs-12">
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
                <div class="row" style="display: none">
                    <!--Fecha Acta-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="fechaActa">Fecha(<strong style="color: #dd4b39">*</strong>):</label>
                            <input type="date" class="form-control" name="fechaActa" id="fechaActa" required/>
                        </div>
                    </div>
                    <!--________________-->
                </div>
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
                    <?php $this->load->view(SICP."actas/acta_infraccion.php"); ?>
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
    //Seccion de trigger para los cambios
    //Mustra bloque validar si es correcta
    // showValidar($('#resultado').val());
    
    //Calcula neto anterior
    $(".neto").trigger('change');

    //Script para inicio de formulario 11
    //Escaneo documentacion
    detectarForm();
    initForm();
    
    //Renombro el BOTON de guardar
    $('#btnHecho').text('Imprimir acta');

    //MÁSCARAS
    //Bruto y Tara
    $(".onlyNumbers").inputmask({ regex: "[0-9.,]*" });

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
            alert("El peso bruto es menor al peso tara");
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
            alert("El peso bruto es menor al peso tara");
        }
    }
});
//
//Comienzo scripts preparacion y cierre tarea
//Guardado de formulario
//Cierre formulario
async function cerrarTareaform(){

    //obtengo el formulario de la inspeccion
    var dataForm = new FormData($('#formReprecintado')[0]);
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
    wo();
    if(!frm_validar('#formReprecintado')){
        Swal.fire(
            'Error..',
            'Debes completar los campos obligatorios (*)',
            'error'
        );
        wc();
        return;
    }

    //Una vez validado el formulario, lo guardo
    cerrarTareaform().then((result) => {
        
        var dataForm = new FormData($('#formReprecintado')[0]);
        frm_info_id = $('#info_id_doc').val();

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
                wc();
                imprimirActa();

            },
            error: function(data) {
                alert("Error al finalizar tarea");
            }
        });
    }).catch((err) => {
        wc();
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
    if(resultado.value == "correcta"){
        $("#bloque_validar").hide();
        $('#tpoInfraccion').val(null).trigger('change');
        $('#btnHecho').text('Imprimir Acta de Inspección');
    }else{
        $("#bloque_validar").show();
        $('#btnHecho').text('Imprimir Acta de Infracción');
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
    // $(".acta_numSenasa").text($("#num_senasa").val());
    $(".acta_cantFajas").text($("#cant_fajas").val());
    $(".acta_observaciones").text($("#observaciones").val());
    $(".acta_origenNro").text($("#esta_num").val());
    $(".acta_estaOrigen").text($("#esta_nom").val());
    $(".acta_transportista").text($('#transportista').val());
    $(".acta_bruto").text($("#bruto").val());
    $(".acta_tara").text($("#tara").val());
    $(".acta_ticket").text($("#ticket").val());
    $(".acta_depto").text($("#depa_idActa").val());
    $(".acta_localidad").text($("#localidad").val());
    $(".acta_inspectores").text($("#inspectores").val());
    $(".acta_puntoControl").text($("#dondeConstituyen").val());
    $(".acta_puntoControlDomicilio").text($("#domicilio").val());
    $(".acta_propiedadDe").text($("#propiedad").val());
    $(".acta_quienAtendio").text($("#quienAtendio").val());
    $(".acta_caracter").text($("#caracterAtendio").val());
    $(".acta_procedenA").text($("#procedenAccion").val());
    $(".acta_telTransportista").text($("#telTransportista").val());
    $(".acta_emailTransportista").text($("#emailTransportista").val());
    $(".acta_nyaDepositario").text($("#nyaDepositario").val());
    $(".dniActa").text($("#dniActa").val());
    $(".telefonoActa").text($("#telefonoActa").val());
    $(".correoActa").text($("#correoActa").val());
    // $(".direccionLegalActa").text($("#domiLegalActa").val());
    // $(".direccionComercialActa").text($("#domiComercialActa").val());
    // $(".acta_caractOrganolepticas").text($("#caractOrganolepticasActa").val());
    // $(".acta_caractDeposito").text($("#caractDeposito").val());
    // $(".acta_tempCamaraActa").text($("#tempCamaraActa").val());

    /**
     * @author Pablo kenny
     * Comprobar si existe formulario de Instancia Reprecintado
     * @description Este fragmento de código verifica si la variable instReprecintado tiene una longitud mayor a 0.
     * Si es así, crea un nuevo objeto Date para obtener la hora actual, extrae la hora y los minutos de él, y los guarda en la variable time.
     * Luego, actualiza el texto de elementos en la página con los valores de las variables observacionesReprecintado, nroPrecintosCierre y time.
     */
    const instReprecintado = $("#formReprecintado");
    const $actaHoraInspeccion = $(".acta_horaInspeccion");
    const $actaObservaciones = $(".acta_observaciones");
    const $actaPrecintos = $(".acta_precintos");

    if (instReprecintado.length > 0) {
        const now = new Date();
        const hour = now.getHours();
        const minute = now.getMinutes();
        const time = `${hour}:${minute}`;

        $actaHoraInspeccion.text(time);

        const observaciones = $("#observacionesReprecintado").val();
        $actaObservaciones.text(observaciones);

        const nroPrecintosCierre = $("#nroPrecintosCierre").val();
        $actaPrecintos.text(nroPrecintosCierre);
    }

   
       

    //Valído
    if($('input[name=inspValida]:checked').val() == 'incorrecta'){
        tiposInfraccion = "";
        if($('#tpoInfraccion').select2('data').length > 0){
            tiposInfracciones = $('#tpoInfraccion').select2('data');
            for (let i = 0; i < tiposInfracciones.length; i++) {
                tiposInfraccion += tiposInfracciones[i].text + "; ";
            }
        }
        
        $(".acta_tposInfracciones").text(tiposInfraccion.slice(0, -1));
        idActa = '#actaInfraccion';
    }

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
</script>
