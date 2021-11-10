<style>
.frm-save{
    display: none;
}
</style>
<!-- COMIENZO FORM ESCANEO DOCUMENTACION-->
<div class="panel">
    <div class="panel-body" id="escaneoDocumentacion">
        <div class="row">
            <div id="formDocumentacion" class="frm-new" data-form="11"></div>
        </div>
    </div>
</div>
<!-- FIN FORM ESCANEO DOCUMENTACION -->
<!-- <div id="hackeo">
    <button onclick="addInput()">TEST!</button>
</div> -->
<script>
detectarForm();
initForm();

$(document).ready(function () {
    //Cantidad de documentos solo digitos
    $("#cant_doc").attr("type","number");
});
// function addInput(){
//     var modeloInput = "<div class='col-sm-12 col-md-6'>"+
//                     "<label>Foto TEST:</label>"+
//                     "<div class='form-group imgConte'>"+
//                         "<label for='test'>"+
//                         "<div class='imgEdit'>"+
//                             "<input class='form-control' type='file' id='test'  name='-file-test' onchange='previewFile(this)' accept='image/*' capture/>"+
//                         "</div>"+
//                         "<div class='imgPreview'>"+
//                             "<div id='vistaPrevia_test' style='background-image: url(lib/imageForms/camera_2.png);'></div>"+
//                         "</div>"+
//                         "</label>"+
//                     "</div>"+
//                     "</div>";
//     $("#formDocumentacion").find("fieldset").append(modeloInput);
// }
function cerrarTareaform(){

    if (!frm_validar('#formDocumentacion')) {
  
        Swal.fire(
            'Oops...',
            'Debes completar los campos obligatorios (*)',
            'error'
        );

        return false;
    }else{

        $('#formDocumentacion .frm-save').click();
        var info_id = $('#formDocumentacion .frm').attr('data-ninfoid');
        console.log('Formulario guardado con éxito. Info ID: '+ info_id);

        return true; 
    }
  }
    

function cerrarTarea() {
   var confirma = cerrarTareaform();

    if(!confirma){
        return;
    }

    var id = $('#taskId').val();

    var frm_info_id = $('#formDocumentacion .frm').attr('data-ninfoid');

    var dataForm = new FormData();
   
    dataForm.append('frm_info_id', frm_info_id);


    $.ajax({
        type: 'POST',
        data: dataForm,
        cache: false,
        contentType: false,
        processData: false,
        url: '<?php base_url() ?>index.php/<?php echo BPM ?>Proceso/cerrarTarea/' + id,
        success: function(data) {
            //wc();
            //back();
            linkTo('<?php echo BPM ?>Proceso/');
            setTimeout(() => {
            Swal.fire(
                
                    'Perfecto!',
                    'Se finalizó la tarea correctamente!',
                    'success'
                )
		  }, 13000);
    
        },
        error: function(data) {
            alert("Error");
        }
    });
}
</script>