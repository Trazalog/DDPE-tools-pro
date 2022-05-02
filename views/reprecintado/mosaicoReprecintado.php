<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="input-group">
            <h3>Fotos de Documentación</h3>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div id="mosaicoImagenes" class="fotos">
            <?php
            if(!empty($formEscaneo['imagenes'])){
                foreach ($formEscaneo['imagenes'] as $key => $value) {
                    echo "<img class='thumbnail fotos documentacion' height='51' width='45' src='".$value['imagen']."' alt='' onclick='preview(this)'>";
                }
            } 
            ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="input-group">
            <h3>Archivos de Documentación</h3>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div id="mosaicoArchivos" class="fotos">
            <?php
            if(!empty($formEscaneo['archivos'])){
                foreach ($formEscaneo['archivos'] as $key => $value) {
                    echo "<a download='".$value['descripcion']."' href='".$value['archivo']."' class='help-button col-sm-4 download' title='Descargar Archivo' download>";
                    echo "<img class='thumbnail fotos documentacion' height='51' width='45' src='lib\imageForms\previewPDF.svg' alt='' onclick='preview(this)'>";
                    echo "</a>";
                }
            } 
            ?>
        </div>
    </div>
</div>
<hr>
<!-- image container -->
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