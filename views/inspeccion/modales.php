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
                            <label>Nombre(<strong style="color: #dd4b39">*</strong>):</label>
                            <input class="form-control" type="text" name="nombre">
                        </div>
                        <div class="form-group">
                            <label>DNI(<strong style="color: #dd4b39">*</strong>):</label>
                            <input class="form-control" type="text" name="dni">
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
                        <label>Nombre(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control" type="text" name="nombre_esta">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarEstablecimiento(this,'Establecimiento')">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN MODAL ESTABLECIMIENTO -->
<!-- Modal EMPRESA -->
<div class="modal modal-fade" id="mdl-empresa">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Empresa</h4>
            </div>
            <form id="formEmpresa" action="#">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control" type="text" name="nombre_empr">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarEmpresa(this,'Empresa')">Agregar</button>
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
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control" type="text" name="nombre_depo">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarDeposito(this,'Deposito')">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN MODAL DEPOSITO -->
<!-- Modal TRANSPORTISTA -->
<div class="modal modal-fade" id="mdl-transportista">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Transportista</h4>
            </div>
            <form id="formTransportista" action="#">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre Transportista(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control" type="text" name="transp_nom">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarTransportista(this,'Transportista')">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN MODAL TRANSPORTISTA -->
<!-- Modal Escanear Documentacion -->
<div class="modal modal-fade" id="mdl-documentacion">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Escaneo Documentacion</h4>
            </div>
            <form id="formDocumentacion" action="#">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="frm-new" data-form="11"></div>
                    </div>
                </div>
                <!-- Modal footer -->
                <!-- <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarTransportista(this,'Transportista')">Agregar</button>
                </div> -->
            </form>
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

                wc();
                alertify.success("Guardado con éxito!");
            },
            error: function(result){
                wc();
                alertify.error("Se produjo un Error!");
            }
        });
    }
</script>