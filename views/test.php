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
                $formulario = getForm(412); //Ulitmo test doble imagen
                echo $formulario;
                ?>
            </div>
        </div>
    </div>
</div>
<script>
detectarForm();
initForm();

$(document).ready(function () {
    //Cantidad de documentos solo digitos
    $("#cant_doc").attr("type","number");
});
function addInput(){
    var modeloInput = "<div class='col-sm-12 col-md-6'>"+
                    "<label>Foto TEST:</label>"+
                    "<div class='form-group imgConte'>"+
                        "<label for='test'>"+
                        "<div class='imgEdit'>"+
                            "<input class='form-control' type='file' id='test'  name='-file-test' onchange='previewFile(this)' accept='image/*' capture/>"+
                        "</div>"+
                        "<div class='imgPreview'>"+
                            "<div id='vistaPrevia_test' style='background-image: url(lib/imageForms/camera_2.png);'></div>"+
                        "</div>"+
                        "</label>"+
                    "</div>"+
                    "</div>";
    $("#formDocumentacion").find("fieldset").append(modeloInput);
}
</script>
