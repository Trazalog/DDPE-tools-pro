<!-- <link rel="stylesheet" href="lib/imageForms/styleImgForm.css"> -->
<!-- Test Form HARCODE-->
<?php //echo getForm(35);?>
<!-- FIN TEST -->

<!-- COMIENZO 2 VER FORM VACIO-->
<!-- <div class="container">
    <div class="row">
        <div class="frm-new" data-form="40"></div>
    </div>
</div> -->
<div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Test Formularios</h3>
    </div>
    <div class="panel-body" id="ingreso_barrera">
        <div class="row">
            <?php 
            $formulario = getForm(412); //Ulitmo test doble imagen
            echo $formulario;
            ?>
        </div>
    </div>
</div>
</div>
<!-- TEST-->
<!-- <h2>Prueba Foto</h2> -->
<!-- <form id="imagen" class="dropzone"></form>         -->
<!-- <input id="imagen" class="dropzone" type="file" accept="image/*" capture> -->
<!-- FIN TEST -->
<script>
detectarForm();
initForm();
</script>
