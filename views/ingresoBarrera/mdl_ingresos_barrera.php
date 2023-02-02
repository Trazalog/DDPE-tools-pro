<!-- Modal del ingreso por barrera -->
<div class="modal modal-fade" id="mdl-ingreso">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="xmodal-body">
                <?php 
                   echo comp('frm-ingreso', base_url(SICP."Ingreso_barrera/view_ingreso"), true);
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Fin modal ingreso por barrera -->
<!-- Modal edición Ingreso por Barrera -->
<div class="modal modal-fade" id="mdl-editarIngresoBarrera">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="xmodal-body">
                <div id="cuerpoModalIngreso">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal edición -->
<!-- Modal vista del formulario dinamico cargado en cada paso del proceso -->
<div class="modal modal-fade" id="mdl-form-dinamico" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <br>
            <div class="xmodal-body">
                <br>
                <div id="form-dinamico" data-frm-id="">
                </div>
                <br>
            </div>
            <br>
            <div class="modal-footer">
                <br>
                <button type="button" class="btn" onclick="cerrarModalform()">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- FIN Modal vista del formulario dinamico -->