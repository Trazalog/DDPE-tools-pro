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

<script>
detectarForm();
initForm();

$(document).ready(function () {
    //Cantidad de coumentos solo digitos
    $("#cant_doc").attr("type","number");
});

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
        console.log('Formulario guardado con exito. Info ID: '+ info_id);

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