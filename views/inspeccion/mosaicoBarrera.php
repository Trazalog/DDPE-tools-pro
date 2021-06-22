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
  display: block;
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
.fotos{
    float: left;
    margin-right: 10px;
    display: block;
}
#expandedImg{
  margin-right: auto;
  margin-left:auto;
  display: block;
  max-width: 250px;
}
</style>
<!-- FIN CSS -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label>Fotos de Barrera</label>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="fotos">
            <?php foreach ($imgBarrera->items as $key => $value) {
                echo "<img class='thumbnail fotos barrera' height='51' width='45' src='imgTEST/$value->imgCodif' alt='' onclick='preview(this)'>";
            } ?>
        </div>
    </div>
</div>

<!-- FUNCIONES -->
<script>
function preview(imgs) {
  //La marco porque fue seleccionada
  $(imgs).toggleClass("selected");
  // Tomo el elemento para la vista previa
  var expandImg = document.getElementById("expandedImg");
  // En caso de tener texto
  // var imgText = document.getElementById("imgtext");
  // Le asigno la misma src al elemento de la vista previa
  expandImg.src = imgs.src;
  //Uso el valor del atributo alt de la imagen
  // imgText.innerHTML = imgs.alt;
  // (Se puede ocultar con CSS, cambiar .contenedor{display:none})
  // expandImg.parentElement.style.display = "block";
}
</script>