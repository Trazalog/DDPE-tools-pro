<!-- The grid: four columns -->
<!-- <div class="row"> -->
    <div class="col-md-5 col-sm-6 col-xs-6">
        <div class="col-md-8 col-sm-8 col-xs-8">
            <h3 id="tituloDocumentacion">Fotos de Documentación</h3>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2" style="margin-top: 20px;margin-bottom: 10px;margin-left: -20px;">
            <span id="add_docu" class="input-group-addon" data-toggle="modal" data-target="#mdl-documentacion"><i class="fa fa-plus"></i></span>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <div id="mosaicoDocumentos" class="fotos">
            <?php
            if(!empty($imgsEscaneo)){
                foreach ($imgsEscaneo as $key => $value) {
                    echo "<img class='thumbnail fotos documentacion' height='51' width='45' src='$value' alt='' onclick='preview(this)'>";
                }
            } 
            ?>
        </div>
    </div>
<!-- </div> -->
<!-- FUNCIONES -->
<script>
function preview(imgs) {
  //La marco porque fue seleccionada
  $(imgs).toggleClass("selected");
  
  //Reseteo los valores del ancho del modal

  // Tomo el elemento para la vista previa
  var expandImg = document.getElementById("expandedImg");

  //Tomo el elemento del modal
  var zoomImg = document.getElementById("zoomPreview");
  // Le asigno la misma src al elemento de la vista previa y al zoom
  expandImg.src = imgs.src;
  zoomImg.src = imgs.src;//VISTA PREVIA ZOOM MODAL
}
</script>