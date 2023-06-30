<style>
#div_ingreso_barrera .frm-save, #form-dinamico .frm-save{
    display: none;
}
.panel-subheading{
    text-align: right;
}
.correcto{
    border: 6px solid #9cdd9b !important;
}
.incorrecto{
    border: 6px solid #ff8989 !important;
}
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Nuevo Ingreso por Barrera</h3>
    </div>
    <div class="panel-subheading">
        <label><?php echo $this->session->userdata['first_name'].' '.$this->session->userdata['last_name'].' - '.date('d/m/Y H:i:s')?></label>
        </br>
        <label>Barrera de Ingreso: <?php echo $puntoControl; ?></label>
        </br>
    </div> 
    <div class="panel-body" id="div_ingreso_barrera">
        <div id="escaneoIngresoBarrera" class="col-md-12">
            <div class="frm-new" data-form="12"></div>
            <!-- Se guarda la imagen original para poder comprimirla -->
            <div>
                <img style="margin-top: 5px; display:none" id="originalImage"  src=""  crossorigin="anonymous" />
            </div>
            <div class="form-group">
                <div class="col-md-6 col-sm-12 col-md-offset-6" style="text-align:right;margin-top: 20px;">
                    <button type="button" class="btn btn-danger" onclick="cerrarModal()">Cerrar</button>

                    <button type="button" id="btn-accion" class="btn btn-primary btn-guardar" onclick="cierraPedidoTrabajo()">Guardar</button>
                </div>
            </div>

            <!-- ************************************************************ -->
        </div>
    </div>
</div>


<script>
function cerrarModal() {

    $('#mdl-ingreso').modal('hide');

}


$('#minimizar_tarea').click(function() {
    $('#div_tarea').toggle(1000);
});
$('#minimizar_pedido_trabajo').click(function() {
    $('#div_pedido_trabajo').toggle(1000);
});

detectarForm();
initForm();

var guardarPedidoTrabajo = function(info_id = null) {

    $('#mdl-ingreso').modal('hide')
    var idForm = $("#div_ingreso_barrera").find('form').attr('id');

    var formData = new FormData($('#'+idForm)[0]);
    formData.append('info_id', info_id);
    
    for(const [key,value] of formData.entries()){
        console.log(`${key} = ${value}`);
    }
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: '<?php echo base_url(SICP) ?>Ingreso_barrera/guardarIngresoBarrera',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(rsp) {  
            var result = rsp.status.toString(); 

            if (rsp.status) {
                
                linkTo();
                Swal.fire(
                    'Guardado!',
                    'El formulario de ingreso por barrera se guardo correctamente',
                    'success'
                );


            } else {
                Swal.fire(
                    'Oops...',
                    'No se guardo formulario ingreso por barrera',
                    'error'
                )
                console.log("Error al guardar formulario de ingreso por barrera");
            }
        },
        error: function(rsp) {
            console.log(rsp); 
            var result = rsp.status.toString(); 
            
            console.log('status esta en saliendo por error:' + result);
            
            console.log("Error al guardar formulario");
            Swal.fire(
                'Oops...',
                'No se guardo formulario',
                'error'
                )
            },
        complete: () => {
            wc();
        }
    });
}
//Primero recorro el formulario colocando las clases de correcto e incorrecto
//Luego reporto el error
async function cierraPedidoTrabajo(){
    idFormDinamico = "#"+$('.frm-new').find('form').attr('id');
    $('.imgConte').each(function(i, obj) {
        imgPreview = $(obj).find('.imgPreview');
    
        $(imgPreview).removeClass('incorrecto');
        $(imgPreview).removeClass('correcto');

        input = $(obj).find('input');

        if(input.val() == '' && ($(input).attr("data-bv-notempty-message") != undefined && $(input).attr("data-bv-notempty-message") != false)){
            $(imgPreview).toggleClass('incorrecto');
        }else{
            $(imgPreview).toggleClass('correcto');
        }
    });

    //Validaciones CAMPOS OBLIGATORIOS Formulario 
    // if($("input[name='-file-perm_transito'").val() == ''){
    //     Swal.fire(
    //         'Oops...',
    //         'Debe cargar la foto del permiso de tránsito (*)',
    //         'error'
    //     );
    //     return;
    // }
    if($("#dominio").val() == ''){
        Swal.fire(
            'Oops...',
            'Debe completar la Patente/Dominio del tractor (*)',
            'error'
        );
        return;
    }
    /*if($("input[name='-file-pat_tractor'").val() == ''){
        Swal.fire(
            'Oops...',
            'Debe cargar la foto de la patente del tractor (*)',
            'error'
        );
        return;
    }
    if($("input[name='-file-pat_termico'").val() == ''){
        Swal.fire(
            'Oops...',
            'Debe cargar la foto de la patente del térmico (*)',
            'error'
        )
        return;
    }
    if($("input[name='-file-temperatura'").val() == ''){
        Swal.fire(
            'Oops...',
            'Debe cargar la foto de la temperatura (*)',
            'error'
        )
        return;
    }
    if($("input[name='-file-precinto_1'").val() == ''){
        Swal.fire(
            'Oops...',
            'Debe cargar la foto del precinto 1 (*)',
            'error'
        )
        return;
    }
    if($("input[name='-file-docu_firmado'").val() == ''){
        Swal.fire(
            'Oops...',
            'Debe cargar la foto del documento firmado (*)',
            'error'
        )
        return;
    }*/

    // frmGuardar($('.frm-new').find('form'),guardarPedidoTrabajo,false);
    wo();
    var newInfoID = await frmGuardarConPromesa($(idFormDinamico));
    guardarPedidoTrabajo(newInfoID);
}
//Variable de estado para agregar contenido dinamicamente
indiceAdjuntos = 1;

function agregarAdjuntos(){
    var modeloInput = "<div class='col-sm-12 col-md-6'>"+
                    "<label>Adjunto:</label>"+
                    "<div class='form-group imgConte'>"+
                        "<label for='adjunto_"+indiceAdjuntos+"'>"+
                        "<div class='imgEdit'>"+
                            "<input class='form-control' type='file' id='adjunto_"+indiceAdjuntos+"'  name='-file-adjunto[]' onchange='previewFile(this)' accept='image/*' capture/>"+
                        "</div>"+
                        "<div class='imgPreview'>"+
                            "<div id='vistaPrevia_adjunto_"+indiceAdjuntos+"' style='background-image: url(lib/imageForms/camera_2.png);'></div>"+
                        "</div>"+
                        "</label>"+
                    "</div>"+
                    "</div>";
    // $("#formDocumentacion").find("fieldset").append(modeloInput);
    indiceAdjuntos++;
    $(".addFotos").before(modeloInput);
}
////////////////////////////////////////////////////////////////////////////////////////////////
// Script para la redimension y la compresion de las imagenes
/* REDIMENSIONADORES Tamaño y Calidad */
var resizingFactor = 0.50;
var quality = 0.50;
//La asigno de este modo para evitar propagacion del evento
var funcionCompresora = () => {compressImage(originalImage, resizingFactor, quality, idInput);}
//Vinculacion del evento al input para tomar la imagen subida
$("#escaneoIngresoBarrera").on("change", 'input[type="file"]', async (e) => {
    Swal.fire({
        title: 'Comprimiendo imagen',
        html: 'Aguarde unos instantes...',
        onBeforeOpen: () => {
            Swal.showLoading();
        }
    });
    idInput = $(e.currentTarget).attr('id');
    var [file] = e.currentTarget.files;
    // Variable que almacena la imagen original
    var originalImage = document.querySelector("#originalImage");
    originalImage.src = await fileToDataUri(file);
    
    // comprimiendo la imagen cargada
    originalImage.addEventListener("load", funcionCompresora ,false);
});
//Se dibuja el canvas con la imagen comprimida, con lso parametros enviados
// Se vuelva a asignar al mismo input de donde provino la llamada
function compressImage(imgToCompress, resizingFactor, quality, idInput) {
    let fileInputElement = document.getElementById(idInput);
    var compressedImageBlob;
    let container = new DataTransfer();
    
    const canvas = document.createElement("canvas");
    const context = canvas.getContext("2d");

    const originalWidth = imgToCompress.width;
    const originalHeight = imgToCompress.height;

    const canvasWidth = originalWidth * resizingFactor;
    const canvasHeight = originalHeight * resizingFactor;

    canvas.width = canvasWidth;
    canvas.height = canvasHeight;

    context.drawImage(
        imgToCompress,
        0,
        0,
        originalWidth * resizingFactor,
        originalHeight * resizingFactor
    );

    canvas.toBlob(
        (blob) => {
            if (blob) {
                let file = new File([blob], fileInputElement.files[0].name,{type: fileInputElement.files[0].type, lastModified: new Date().getTime()});
                container.items.add(file);
                fileInputElement.files = container.files;
                if(Swal.isLoading()){   
                    Swal.hideLoading();
                    Swal.clickConfirm();
                }
            }
        },
        fileInputElement.files[0].type,
        quality
    );
}
//Realiza la lectura de la imagen cargada en el input
function fileToDataUri(field) {
    return new Promise((resolve) => {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            resolve(reader.result);
        });
        reader.readAsDataURL(field);
    });
}
</script>