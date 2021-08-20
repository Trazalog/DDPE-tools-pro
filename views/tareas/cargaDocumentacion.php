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
                    <th>Acciones</th>
                    <th>Número</th>
                    <th>Emisor</th>
                    <th>Destinatario</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Monto Bruto</th>
                    <th>Fotos</th>
                </thead>
                <tbody >
                
                </tbody>
            </table>
            <!--_______ FIN TABLA DOCUMENTOS ______-->
        </div>
    </div>
</div>
<script>
// Config Tabla
DataTable($('#tabla_documentos'));
var accion = '';

$("#btnAgregar").on('click', function () {
    $("#tablaDocumentosBox").hide();
    $('#formAgregarDoc').show();
    accion = "nuevo";
    
    //Reemplazo los botones standard de la notificacion
    $(".btn-success.btnNotifEstandar").text("Guardar");
    $(".btn-success.btnNotifEstandar").attr("onclick","guardarDetalle()");
    $(".btn-primary.btnNotifEstandar").attr("onclick","cerrarDetalle()");
});
</script>