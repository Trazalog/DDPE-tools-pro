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
                            echo "<img class='thumbnail fotos' height='51' width='45' data-json='".json_encode($inst_id)."' src='".$value['imagen']."' alt='' onclick='previewModal(this)'>";
                            echo "<span style='display:none' class='delete ".$value['inst_id']."'></span>";
                            echo "</div>";
                        } ?>
                        </div>
                    </div>
                    <hr>
                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="contenedor">

                            <!-- Visor imagen expandido -->
                            <img src="lib\imageForms\preview.png" id="expandedImgModal" style="">

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
<!-- FIN MODAL Documentos cargados en fotos -->
<!-- Modal ZOOM PREVIEW -->
<div class="modal modal-fade" id="mdl-zoomPreview">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Vista Previa</h4>
            </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="zoomPreviewContainer" style="text-align:center">

                                <img src="lib\imageForms\preview.png" height="368" id="zoomPreview">
                            </div>
                        </div>
                        <div class="col-md-12" style="text-align:center; margin-top: 10px">
                            <button type="button" onclick="acercar()" title="Acercar">
                                <i class="fa fa-plus"></i>
                            </button>
                            
                            <button type="button" onclick="alejar()" title="Alejar">
                                <i class="fa fa-minus"></i>
                            </button>

                        </div>    

                        </div>
                    </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                </div>
        </div>
    </div>
</div>
<!-- FIN MODAL ZOOM PREVIEW -->
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
    // Tomo el elemento para la vista previa
    var expandImg = document.getElementById("expandedImgModal");

    // Le asigno la misma src al elemento de la vista previa
    expandImg.src = imgs.src;

}
//SCRIPTS MODAL ZOOM VISTA PREVIA
    //Scripts para hacer zoom en la imagen seleccionada
    function acercar() {
        var zoomPreview = document.getElementById("zoomPreview");
        var container = document.getElementById("zoomPreviewContainer");

        //Chequeamos que no exceda el ancho del contenedor
        if(container.clientWidth > (zoomPreview.clientWidth + 80)){

            zoomPreview.style.height = (zoomPreview.clientHeight + 40) + "px";
        }
    }
    function alejar() {
        var zoomPreview = document.getElementById("zoomPreview");
        var currHeight = zoomPreview.clientHeight;
        
        zoomPreview.style.height = (currHeight - 40) + "px";
    }
    //RESETEO A ALTURA ESTANDAR
    $('#mdl-zoomPreview').on('hidden.bs.modal', function (e) {
        $("#zoomPreview").height(368);
    });
</script>

