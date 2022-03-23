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
//Variable de estado para agregar contenido dinamicamente
indice = 2;

function agregarFotos(){
    var modeloInput = "<div class='col-sm-12 col-md-6'>"+
                    "<label>Foto "+indice+":</label>"+
                    "<div class='form-group imgConte'>"+
                        "<label for='foto_"+indice+"'>"+
                        "<div class='imgEdit'>"+
                            "<input class='form-control' type='file' id='foto_"+indice+"'  name='-file-fotos[]' onchange='previewFile(this)' accept='image/*' capture/>"+
                        "</div>"+
                        "<div class='imgPreview'>"+
                            "<div id='vistaPrevia_foto_"+indice+"' style='background-image: url(lib/imageForms/camera_2.png);'></div>"+
                        "</div>"+
                        "</label>"+
                    "</div>"+
                    "</div>";
    indice++;
    $(".addFotos").before(modeloInput);
}
function cerrarTareaform(){

    if (!frm_validar('#formDocumentacion')) {
  
        Swal.fire(
            'Oops...',
            'Debes completar los campos obligatorios (*)',
            'error'
        );

        return false;
    }else{

        frmGuardar($('#formDocumentacion').find('form'),false,false);
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
            
            const confirm = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });

            confirm.fire({
                title: 'Perfecto!',
                text: "Se finalizó la tarea correctamente!",
                type: 'success',
                showCancelButton: false,
                confirmButtonText: 'Hecho'
            }).then((result) => {
                
                linkTo('<?php echo BPM ?>Proceso/');
                
            });
    
        },
        error: function(data) {
            alert("Error");
        }
    });
}
</script>