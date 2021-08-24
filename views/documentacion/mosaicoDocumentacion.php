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
  max-width: 60%;
}
</style>
<!-- FIN CSS -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label>Seleccione una foto</label>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <input type="hidden" name="imag_id" id="imag_id">

        <div class="fotos">
            <?php foreach ($imgsDocumentacion as $key => $value) {
                $inst_id = array('inst_id' => $value['inst_id']);
                echo "<img class='thumbnail fotos documentacion' height='51' width='45' data-json='".json_encode($inst_id)."' src='".$value['imagen']."' alt='' onclick='preview(this)'>";
            } ?>
        </div>
    </div>
</div>
<hr>
<div class="col-sm-12 col-md-12 col-xl-12">
    <div class="contenedor">

    <!-- Visor imagen expandido -->
    <img src="lib\imageForms\preview.png" id="expandedImg" style="">

    </div>
</div>
<!--________________-->
<!-- FUNCIONES -->
<script>
function preview(imgs) {
    //Quito clase selected
    $('.fotos').removeClass("selected");

    //Marco la foto seleccionada
    $(imgs).toggleClass("selected");

    // Tomo el elemento para la vista previa
    var expandImg = document.getElementById("expandedImg");

    // Le asigno la misma src al elemento de la vista previa
    expandImg.src = imgs.src;
    
    //Asigno el inst_id de la imagen seleccionada
    data = JSON.parse($(".fotos .selected").attr('data-json'));
    $("#imag_id").val(data.inst_id);
}
</script>