<!-- Modal Documentos cargados en fotos -->
<div class="modal modal-fade" id="mdl-documentos">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Documentos</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="fotos">
                        <?php foreach ($imgsDocumentacion as $key => $value) {
                            $inst_id = array('inst_id' => $value['inst_id']);
                            echo "<div class='iconoBorde'>";
                            echo "<img class='thumbnail fotos modalDocs' height='51' width='45' data-json='".json_encode($inst_id)."' src='".$value['imagen']."' alt='' onclick='previewModal(this)'>";
                            echo "<span style='display:none' class='delete ".$value['inst_id']."'></span>";
                            echo "</div>";
                        } ?>
                        </div>
                    </div>
                    <hr>
                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="contenedor">

                            <!-- Visor imagen expandido -->
                            <img src="lib\imageForms\preview.png" id="expandedImg" style="">

                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="col-md-6 col-sm-12 col-md-offset-6" style="text-align:right;margin-top: 20px;">
                    <button type="button" class="btn btn-danger cierraModalDocumentos" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- ************************************************************ -->
        </div>
    </div>
</div>
<!-- FUNCIONES -->
<script>
$(document).ready(function () {
    $(document).on('click','.modalDocs', function () {
        data = JSON.parse($(this).parents('tr').attr('data-json'));
        $("." + data.imag_id).show();
    });
    $(".cierraModalDocumentos").on('click', function () {
        $("span.delete").hide();
    });
});
function previewModal(imgs) {
    //Quito clase selected
    //$('.fotos').removeClass("selected");

    //Marco la foto seleccionada
    //$(imgs).toggleClass("selected");

    // Tomo el elemento para la vista previa
    var expandImg = document.getElementById("expandedImg");

    // Le asigno la misma src al elemento de la vista previa
    expandImg.src = imgs.src;
    
    //Asigno el inst_id de la imagen seleccionada
    //data = JSON.parse($(".fotos .selected").attr('data-json'));
    //$("#imag_id").val(data.inst_id);
}
</script>
<!-- FIN MODAL Documentos cargados en fotos -->
