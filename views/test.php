<style>
#escaneoDocumentacion .frm-save, #ingreso_barrera .frm-save{
    display: none;
}
</style>
<!-- COMIENZO FORM ESCANEO DOCUMENTACION-->
<!-- <div class="panel">
    <div class="panel-body" id="escaneoDocumentacion">
        <div class="row">
            <div id="formDocumentacion" class="frm-new" data-form="11"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-12 col-md-offset-6" style="text-align:right;margin-top: 20px;">
                    <button type="button" id="btn-accion" class="btn btn-primary btn-guardar" onclick="cierreTest()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="hackeo">
    <button onclick="addInput()">TEST!</button>
</div> -->
<!-- FIN FORM ESCANEO DOCUMENTACION -->

<!-- <div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Test Formularios</h3>
        </div>
        <div class="panel-body" id="ingreso_barrera">
            <div class="row">
                <?php 
                // $formulario = getForm(2285); //Ulitmo test con compresion 2212
                // echo $formulario;
                ?>
            </div>
        </div>
    </div>
</div> -->
<!-- COMIENZO FORM IngresoBarrera-->
<div class="panel">
    <div class="panel-body" id="escaneoIngresoBarrera">
        <div class="row">
            <div id="formIngresoBarrera" class="frm-new" data-form="12"></div>
        </div>
    </div>
</div>
<div>
    <img style="margin-top: 5px; display:none" id="originalImage"  src=""  crossorigin="anonymous" />
</div>
<!-- FIN FORM IngresoBarrera -->
<script>
detectarForm();
initForm();
/* REDIMENSIONADORES Tamaño y Calidad */
var resizingFactor = 0.50;
var quality = 0.50;
//La asigno de este modo para evitar propagacion del evento
var funcionCompresora = () => {compressImage(originalImage, resizingFactor, quality, idInput);}
//Vinculacion del evento al input para tomar la imagen subida
$(document).on("change", '#escaneoIngresoBarrera input[type="file"]', async (e) => {
    Swal.fire({
        title: 'Comprimiendo imagen',
        html: 'Aguarde unos instantes...',
        onBeforeOpen: () => {
            Swal.showLoading ();
        }
    });
    idInput = $(e.currentTarget).attr('id');
    var [file] = e.currentTarget.files;
    // Variable que almacena la imagen original
    var originalImage = document.querySelector("#originalImage");
    originalImage.src = await fileToDataUri(file);
    
    // comprimiendo la imagen cargada
    originalImage.addEventListener("load", funcionCompresora ,false);

    console.log("Termino");
    $(this).off('change');
});
//Se dibuja el canvas con la imagen comprimida, con lso parametros enviados
// Se vuelva a asignar al mismo input de donde provino la llamada
function compressImage(imgToCompress, resizingFactor, quality, idInput) {
    let fileInputElement = document.getElementById(idInput);
    var compressedImageBlob;
    let container = new DataTransfer();
    // Funcion que muestra la imagen comprimida
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
                console.log(fileInputElement.files);
            }
        },
        "image/jpeg",
        quality
    );
}

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
