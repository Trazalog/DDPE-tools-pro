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
/* THUMBNAIL */
.selected{
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
</style>
<!-- FIN CSS -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label>Fotos de Barrera</label>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="fotos">
            <?php foreach ($imgsBarrera as $key => $value) {
                echo "<img class='thumbnail fotos barrera' height='51' width='45' src='$value' alt='' onclick='preview(this)'>";
            } ?>
        </div>
    </div>
</div>

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