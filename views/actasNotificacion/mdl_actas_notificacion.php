<!-- Modal del ingreso por barrera -->
<div class="modal modal-fade" id="mdl-acta-nuevo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="xmodal-body">
                <div class="modal-header bg-blue">
                    <button type="button" class="close close_modal_edit" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:white;">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <form class="" id="formActa">
                        <!--Fecha y Hora-->
                        <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="fec_hora">Fecha y Hora(<strong style="color: #dd4b39">*</strong>):</label>
                                <input type="datetime-local" class="form-control requerido" name="fec_hora" id="fec_hora" placeholder="Ingrese Fecha y Hora...">
                            </div>
                        </div> -->
                        <!--________________-->
                        <!--Fecha Acta-->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="fechaActa">Fecha(<strong style="color: #dd4b39">*</strong>):</label>
                                <input type="date" class="form-control" name="fechaActa" id="fechaActa" required/>
                            </div>
                        </div>
                        <!--________________-->
                        <!--Hora Acta-->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="horaActa">Hora(<strong style="color: #dd4b39">*</strong>):</label>
                                <input type="time" class="form-control" name="horaActa" id="horaActa" required/>
                            </div>
                        </div>
                        <!--________________-->
                        <!-- Texto -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="texto">Texto(<strong style="color: #dd4b39">*</strong>):</label>
                                <textarea class="form-control requerido" name="texto" id="texto" placeholder="Ingrese Texto..." rows="25"></textarea>
                            </div>
                        </div>
                        <!--________________-->                        
                    </form>
                </div>
                <div class="modal-footer">
                <!-- <div class="col-sm-6"> -->
                    <div class="form-group text-right">
                        <button type="" class="btn btn-default cerrarModalEdit" id="" data-dismiss="modal">Cerrar</button>
                        <button type="" class="btn btn-primary habilitar" data-dismiss="modal" id="btnsave_edit" onclick="guardarActa()">Imprimir</button>
                    </div>
                <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin modal ingreso por barrera -->
<script>
    function guardarActa() {
        // if( !validarCampos('formActa') ){
        //     return;
        // }
        // infraccion.depositario = $("#nyaDepositario").val();
        // infraccion.fecha_hora = $("#fechaActa").val() + " " + $("#horaActa").val();
        base = "<?php echo base_url()?>";
        var recurso = "";
        var form = $('#formActa')[0];
        var datos = new FormData(form);
        var datos = formToObject(datos);
        recurso = '<?php echo base_url(SICP); ?>Actas_notificacion/guardarActa';
        wo();
        $.ajax({
            type: 'POST',
            data:{ datos },
            dataType: 'JSON',
            url: recurso,
            success: function(result) {
                // $("#cargar_tabla").load("index.php/core/Acta/listarProveedores");
                $("#mdl-acta-nuevo").modal('hide');
                form.reset();
                // $("#botonAgregar").removeAttr("disabled");
                // alertify.success("Acta agregada con éxito");
                wc();
            },
            error: function(result){
                wc();
                alertify.error("Error agregando Acta");
            }            
        });
    }
</script>