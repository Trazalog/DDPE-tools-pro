<style>
.frm-save{
    display: none;
}
#escaneoDocumentacion .addFotosMasiva button{
    margin-top: 12%;
    margin-bottom: 2%;
}
#escaneoDocumentacion .addFotos button{
    margin-top: 25%;
}
</style>
<!-- COMIENZO FORM ESCANEO DOCUMENTACION-->
<div class="panel">
    <div class="panel-body" id="escaneoDocumentacion">
        <div class="row">
            <div id="formDocumentacion" class="frm-new" data-form="11"></div>
        </div>
        <input style="display: none;" id="altaMasivaFotos" class='form-control' type='file' name='altaMasivaFotos[]' accept='image/*' multiple onchange="crearVistaPreviaImagenes(this)"/>
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
indexFiles = 2;

function agregarFotos(){
    var modeloInput = "<div class='col-xs-12 col-sm-6 col-md-3'>"+
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
function agregarArchivos(){
    var modeloInputFile = "<div class='col-sm-12 col-md-6'>"+
                        "<div class='form-group'>"+
                            "<label>PDF "+indexFiles+":</label>"+
                            "<input class='form-control' id='archivo_"+indexFiles+"' type='file' name='-file-archivos[]'>"+
                        "</div>"+
                    "</div>";
    $(".addFiles").before(modeloInputFile);
    indexFiles++;
}
async function cerrarTareaform(){
    resp = {};
    if (!frm_validar('#formDocumentacion')) {
  
        Swal.fire('Oops...','Debes completar los campos obligatorios (*)','error');
        resp.confirma = false;

        return new Promise(reject => {reject(resp)});
    }else{
        resp.confirma = true;
        resp.info_id = await frmGuardarConPromesa($('#formDocumentacion').find('form'));
        console.log('Formulario guardado con éxito. Info ID: '+ resp.info_id);

        return new Promise(resolve => {resolve(resp)}); 
    }
}
  
async function cerrarTarea() {
    wo();
   var confirma = await cerrarTareaform();

    if(!resp.confirma){
        return;
    }
 
    var id = $('#taskId').val();
    var dataForm = new FormData();
   
    dataForm.append('frm_info_id', resp.info_id);

    $.ajax({
        type: 'POST',
        data: dataForm,
        cache: false,
        contentType: false,
        processData: false,
        url: '<?php base_url() ?>index.php/<?php echo BPM ?>Proceso/cerrarTarea/' + id,
        success: function(data) {
            wc();
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
            wc();
            error('',"Se produjo un error al cerrar la tarea");
        }
    });
}
//Script apra el alta masiva de imagenes
//Utilizo el evento para levantar la ventana de carga
function agregarfotosMasivas(tag){
    $("#altaMasivaFotos").click();
}
//Crea la vista previa de las imagenes seleccionadas
function crearVistaPreviaImagenes(tag){
    for(var i=0; i < tag.files.length; i++){
        agregarFotosVistaPrevia(i);
    }
}
//Genera el HTML de la vista previa y transfiere el archivo al input generado
function agregarFotosVistaPrevia(indiceListadoArchivo){
    let container = new DataTransfer();
    var modeloInput = "<div class='col-xs-12 col-sm-6 col-md-3'>"+
            "<label>Foto "+indice+":</label>"+
            "<div class='form-group imgConte centrar'>"+
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
    $(".addFotos").before(modeloInput);
    let inputImagen = document.querySelector("#foto_"+indice);
    let contenedorImagenes = document.querySelector("#altaMasivaFotos");

    container.items.add(contenedorImagenes.files[indiceListadoArchivo]);
    inputImagen.files = container.files;

    $("#foto_"+indice).trigger('change');
    indice++;
}
</script>