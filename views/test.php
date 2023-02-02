<style>
#escaneoDocumentacion .frm-save, #ingreso_barrera .frm-save{
    display: none;
}
</style>
<!-- COMIENZO FORM ESCANEO DOCUMENTACION-->
<!-- <div class="panel">
    <div class="panel-body" id="escaneoDocumentacion">
        <div class="row">
            <div id="formDocumentacion" class="frm-new" data-form="11"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-12 col-md-offset-6" style="text-align:right;margin-top: 20px;">
                    <button type="button" id="btn-accion" class="btn btn-primary btn-guardar" onclick="cierreTest()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="hackeo">
    <button onclick="addInput()">TEST!</button>
</div> -->
<!-- FIN FORM ESCANEO DOCUMENTACION -->

<!-- <div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Test Formularios</h3>
        </div>
        <div class="panel-body" id="ingreso_barrera">
            <div class="row">
                <?php 
                // $formulario = getForm(2295); //Ulitmo test con compresion 2212
                // echo $formulario;
                ?>
            </div>
        </div>
    </div>
</div> -->
<!-- COMIENZO FORM IngresoBarrera-->
<div class="panel">
    <div class="panel-body" id="escaneoIngresoBarrera">
        <div class="row">
            <div id="formIngresoBarrera" class="frm-new" data-form="11"></div>
        </div>
    </div>
</div>
<!-- FIN FORM IngresoBarrera -->
<script>
detectarForm();
initForm();
//Variable de estado para agregar contenido dinamicamente
indice = 2;
function agregarFotos(){
    var modeloInput = "<div class='col-sm-12 col-md-6'>"+
                    "<label>Foto "+indice+":</label>"+
                    "<div class='form-group imgConte'>"+
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
</script>
