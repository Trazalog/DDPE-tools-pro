<!--CSS-->
<style>
 /* Style the images inside the grid */ 
.col img {
  opacity: 0.8;
  cursor: pointer;
}

.col img:hover {
  opacity: 1;
}

 /* Clear floats after the columns */ 
.row:after {
  content: "";
  display: table;
  clear: both;
}

 /* The expanding image container (positioning is needed to position the close button and the text) */ 
.contenedor {
  display: inline-flex;
}

 /* Expanding image text */ 
#imgtext {
  position: absolute;
  bottom: 15px;
  left: 15px;
  color: white;
  font-size: 20px;
}

 /* Closable button inside the image */ 
.closebtn {
  position: absolute;
  left: 2%;
  color: white;
  font-size: 35px;
  display: flex;
  cursor: pointer;
}
/* THUMBNAIL */
.selected{
    opacity : 0.2 !important;
} 
.used{
    opacity : 0.2 !important;
}
.fotos{
    float: left;
    margin-right: 10px;
    display: block;
}
#expandedImg{
  margin-right: auto;
  margin-left:auto;
  display: block;
  max-width: 60%;
}
.iconoBorde{
  display: inline-flex;
}
.delete {
  position: relative;
  vertical-align: middle;
  display: inline-block;
}
    
.delete::after {
  font-family: "FontAwesome";
  content: "\f058";
  position:absolute;
  top: -5px;
  right:5px;
  height: 20px;
  width: 20px;
  color: #05b513;
  font-weight: 900;
}
.btnZoom {
  height: 40px;
}
</style>
<!-- FIN CSS -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label>Seleccione una foto (<strong style="color: #dd4b39">*</strong>)</label>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <input type="hidden" name="imag_id" id="imag_id">

        <div class="fotos">
          <?php foreach ($documentacion['imagenes'] as $key => $value) {
              $inst_id = array('inst_id' => $value['inst_id']);
              echo "<div class='iconoBorde'>";
              echo "<img class='thumbnail fotos documentacion ". (in_array($value['inst_id'],$imag_ids) ? "used" : null) ."' height='51' width='45' data-json='".json_encode($inst_id)."' src='".$value['imagen']."' alt='".$value['descripcion']."' onclick='preview(this)'>";
              echo "<span style='display:none' id='".$value['inst_id']."' class='delete iconoDocs'></span>";
              echo "</div>";
          } ?>
        </div>
    </div>
</div>
<div class="row" style="display:none">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label>Seleccione un archivo (<strong style="color: #dd4b39">*</strong>)</label>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="fotos">
          <?php foreach ($documentacion['archivos'] as $key => $value) {
              $inst_id = array('inst_id' => $value['inst_id']);
              echo "<div class='iconoBorde'>";
              echo "<a download='".$value['descripcion']."' href='".$value['archivo']."' class='help-button col-sm-4 download' title='Descargar Archivo' download>";
              echo "<img class='thumbnail fotos documentacion ". (in_array($value['inst_id'],$imag_ids) ? "used" : null) ."' height='51' width='45' data-json='".json_encode($inst_id)."' src='lib\imageForms\previewPDF.svg' alt='' onclick='previewFile(this)'>";
              echo "<span style='display:none' id='".$value['inst_id']."' class='delete iconoDocs'></span>";
              echo "</a>";
              echo "</div>";
          } ?>
        </div>
    </div>
</div>
<hr>
<div class="col-sm-12 col-md-12 col-xl-12">
    <div class="contenedor">
      <!-- Visor imagen expandido -->
      <img src="lib\imageForms\preview.png" id="expandedImg" style="" data-magnify-src="">
      
      <!-- Zoom Modal Button -->
      <div class="botoneraAcciones" style="width: 4%;">
        <button type="button" class="btn btn-outline-dark btnZoom" data-toggle="modal" data-target="#mdl-zoomPreview" title="Zoom"><i class="fa fa-search"></i></button>
        <a id="linkDescargaImagen" style="color: black;" download='' href='' title='Descargar Archivo' download>
          <button type="button" class="btn btn-outline-dark btnZoom" data-toggle="modal" title="Descargar">
            <i class="fa fa-download"></i>
          </button>
        </a>
      </div>
    </div>
</div>
<!--________________-->
<!-- FUNCIONES -->
<script>
function preview(imgs) {
    if(!$(imgs).hasClass("used")){
      debugger;
      //Quito clase selected
      $('.fotos').removeClass("selected");

      //Marco la foto seleccionada
      $(imgs).toggleClass("selected");

      // Tomo el elemento para la vista previa
      var expandImg = document.getElementById("expandedImg");

      //Tomo el elemento del modal
      var zoomImg = document.getElementById("zoomPreview");
      
      // Le asigno la misma src al elemento de la vista previa y al zoom
      expandImg.src = imgs.src;
      zoomImg.src = imgs.src;//VISTA PREVIA ZOOM MODAL
      $("#linkDescargaImagen").attr('href',imgs.src);
      $("#linkDescargaImagen").attr('download',$(imgs).attr('alt'));
      //Asigno el inst_id de la imagen seleccionada
      data = JSON.parse($(".fotos .selected").attr('data-json'));
      $("#imag_id").val(data.inst_id);

      //Instancio la lupa con la url de la imagen
      $('#expandedImg').magnify({
        speed: 200,
        src: imgs.src
      });
    }else{
      alertify.error("Esta foto ya fue transcripta!");
    }
}
// No genero vista previa, solo actualiza imag_id 
function previewFile(imgs) {
    if(!$(imgs).hasClass("used")){
      //Quito clase selected
      $('.fotos').removeClass("selected");

      //Marco la foto seleccionada
      $(imgs).toggleClass("selected");

      //Asigno el inst_id de la imagen seleccionada
      data = JSON.parse($(".fotos .selected").attr('data-json'));
      $("#imag_id").val(data.inst_id);

    }else{
      alertify.error("Este documento ya fue transcripto!");
    }
}
</script>