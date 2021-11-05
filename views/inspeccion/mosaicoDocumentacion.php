<!-- The grid: four columns -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="input-group">
            <label>Fotos de Documentacion</label>
            <span id="add_docu" class="input-group-addon" data-toggle="modal" data-target="#mdl-documentacion"><i class="fa fa-plus"></i></span>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
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
</div>
<hr>
<!-- The expanding image container -->
<div class="col-sm-12 col-md-12 col-xl-12">
    <div class="contenedor">
        <!-- Boton para ocultar imagen -->
        <!-- <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span> -->

        <!-- Expanded image -->
        <img src="lib\imageForms\preview.png" id="expandedImg" style="">
        
        <!-- Zoom Modal Button -->
        <button type="button" class="btn btn-outline-dark btnZoom" data-toggle="modal" data-target="#mdl-zoomPreview" title="Zoom"><i class="fa fa-search"></i></button>
    </div>
</div>