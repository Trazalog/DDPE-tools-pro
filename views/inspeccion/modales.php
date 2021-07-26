<style>
.frm-save{
    display: none;
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Escaneo Documentacion</h4>
            </div>
            <div class="panel-subheading" style="text-align: right">
                <label><?php echo $this->session->userdata['first_name'].' '.$this->session->userdata['last_name'].' - '.date('m/d/Y H:i:s')?></label>
            </div> 
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="frm-new" data-form="11"></div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                <div class="col-md-6 col-sm-12 col-md-offset-6" style="text-align:right;margin-top: 20px;">
                    <button type="button" class="btn btn-danger" onclick="cerrarModal()">Cerrar</button>

                    <button type="button" id="btn-accion" class="btn btn-primary btn-guardar"
                        onclick="frmGuardar($('.frm-new').find('form'))">Guardar</button>
                </div>
            </div>

            <!-- ************************************************************ -->
        </div>
    </div>
</div>
<!-- FIN MODAL Escanear Documentacion -->

<script>
//Script para altas rapidas de todos los modales
//
    function agregar(elem,recurso){
        //Obtengo el ID del formulario del que se llamo la funcion
        var idForm = $(elem).closest('form').attr('id');
        var form = $('#'+idForm)[0];
        var datos = new FormData(form);
        var data = formToObject(datos);

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
                            var direccion = $("#calle").val() + " - " + $("#altura").val();
                            var newOpc = new Option(direccion, 1, true, true);
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
                                break;

                                case 'Establecimiento':
                                    var empresa = $("#mdl-razon_social").val();
                                    var newOpc = new Option(empresa, $("#mdl-cuit").val(), true, true);
                                    $("#esta_num").val($("#mdl-num_esta").val());
                                    $('#esta_nom').append(newOpc).trigger('change');
                                break;

                                case 'Transportista':
                                    var empresa = $("#mdl-razon_social").val();
                                    var newOpc = new Option(empresa, $("#mdl-cuit").val(), true, true);
                                    $('#transportista').append(newOpc).trigger('change');
                                break;

                                default:
                                    break;
                            }
                            //Limpio form
                            $('#mdl-cuit').val('');
                            $('#mdl-razon_social').val('');
                            $('#mdl-num_esta').val('');
                        break;

                    }

                }else{
                    alertify.error("Se produjo un error al agregar!");
                }
            },
            error: function(result){
                wc();
                alertify.error("Se produjo un error al agregar!");
            }
        });
    }

    function cerrarModal() {
        $('#mdl-documentacion').modal('hide');
    }
</script>