<!-- COMIENZO FORM ESCANEO DOCUMENTACION-->
<div class="panel">
    <div class="panel-body" id="escaneoDocumentacion">
        <div class="row">
            <div id="formDocumentacion" class="frm-new" data-form="11"></div>
        </div>
    </div>
</div>
<div id="hackeo">
    <button onclick="addInput()">TEST!</button>
</div>
<!-- FIN FORM ESCANEO DOCUMENTACION -->

<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Test Formularios</h3>
        </div>
        <div class="panel-body" id="ingreso_barrera">
            <div class="row">
                <?php 
                $formulario = getForm(741); //Ulitmo test doble archivo
                echo $formulario;
                ?>
            </div>
        </div>
    </div>
</div>
<script>
detectarForm();
initForm();
var index = 2;
var indexFiles = 2;
$(document).ready(function () {
    //Cantidad de documentos solo digitos
    $("#cant_doc").attr("type","number");
});
function agregarFotos(){
    var modeloInput = "<div class='col-sm-12 col-md-6'>"+
                    "<label>Foto "+index+":</label>"+
                    "<div class='form-group imgConte'>"+
                        "<label for='fotos_"+index+"'>"+
                        "<div class='imgEdit'>"+
                            "<input class='form-control' type='file' id='fotos_"+index+"'  name='-file-fotos[]' onchange='previewFile(this)' accept='image/*' capture/>"+
                        "</div>"+
                        "<div class='imgPreview'>"+
                            "<div id='vistaPrevia_fotos_"+index+"' style='background-image: url(lib/imageForms/camera_2.png);'></div>"+
                        "</div>"+
                        "</label>"+
                    "</div>"+
                    "</div>";
    $(".addFotos").before(modeloInput);
    index++;
}
function agregarArchivos(){
    var modeloInput = "<div class='col-sm-12 col-md-6'>"+
                        "<div class='form-group'>"+
                            "<label>PDF "+indexFiles+":</label>"+
                            "<input class='form-control' id='archivo_"+indexFiles+"' type='file' name='-file-archivos[]'>"+
                        "</div>"+
                    "</div>";
    $(".addFiles").before(modeloInput);
    indexFiles++;
}
</script>
