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
  display: none;
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
  top: 10px;
  right: 15px;
  color: white;
  font-size: 35px;
  cursor: pointer;
}
/* THUMBNAIL */
.selected{
    opacity : 0.2 !important;
} 
</style>
<!-- FIN CSS -->
<!-- The grid: four columns -->
<div class="row">
    <!-- <div class="col col-sm-1 col-md-4 col-xl-3"> -->
    <?php foreach ($imgsCodf->items as $key => $value) {
        echo "<div class='col col-sm-1 col-md-1 col-xl-1'><img class='thumbnail' height='51' width='45' src='imgTEST/$value->imgCodif' alt='' onclick='preview(this)'></div>";
    } ?>
    <!-- </div> -->
</div>

<!-- The expanding image container -->
<div class="col-sm-1 col-md-2 col-xl-3">
    <div class="contenedor">
    <!-- Close the image -->
    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

    <!-- Expanded image -->
    <img height="229" width="203" id="expandedImg" style="">

    <!-- Image text -->
    <div id="imgtext"></div>
    </div>
</div>
<!-- FUNCIONES -->
<script>
function preview(imgs) {
  //La marco porque fue seleccionada
  $(imgs).toggleClass("selected");
  // Get the expanded image
  var expandImg = document.getElementById("expandedImg");
  // Get the image text
  var imgText = document.getElementById("imgtext");
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Use the value of the alt attribute of the clickable image as text inside the expanded image
  imgText.innerHTML = imgs.alt;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";
}
</script>