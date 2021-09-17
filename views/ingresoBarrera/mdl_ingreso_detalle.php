<style>
.modal-dialog,.modal-dialog img { 
    width:50%;
    height:75%;
    margin:2 auto;
}

</style>
<input id="tarea" data-info="" class="hidden">
<input type="text" class="form-control hidden" id="asignado" value="">
<input type="text" class="form-control hidden" id="taskId" value="">
<input type="text" class="form-control hidden" id="caseId" value="">

<div class="nav-tabs-custom ">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="false">Trazabilidad</a></li>
        <li class="privado"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Comentarios</a></li>
        <!-- <li class="privado"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Información</a></li> -->
        <!-- <li class="privado"><a href="#tab_5" data-toggle="tab" aria-expanded="true">Formulario</a></li> -->
    </ul>
    <div class="tab-content">
  
        <!-- <div class="tab-pane" id="tab_1"> -->
            <?php //echo $info ?>
        <!-- </div> -->
                <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
            <div id="cargar_comentario"></div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane active" id="tab_3">
            <div id="cargar_trazabilidad"></div>
        </div>

        <!-- /.tab-pane -->
        <!-- <div class="tab-pane" id="tab_5">
            <div id="cargar_form"></div>
        </div> -->
    </div>
</div>