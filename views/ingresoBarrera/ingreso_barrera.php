<style>
.frm-save {
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
        <label>Punto de control: <?php echo $puntoControl; ?></label>
        </br>
    </div> 
    <div class="panel-body" id="div_ingreso_barrera">
        <div class="col-md-12">
            <div class="frm-new" data-form="12"></div>

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

var guardarPedidoTrabajo = function() {

    $('#mdl-ingreso').modal('hide')
    var idForm = $("#div_ingreso_barrera").find('form').attr('id');

    var formData = new FormData($('#'+idForm)[0]);
    formData.append('info_id', $('#'+idForm).attr('data-ninfoid'));

    wo();
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: '<?php echo base_url(SICP) ?>Ingreso_barrera/guardarIngresoBarrera',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(rsp) {
         console.log(rsp);   
         var result = rsp.status.toString(); 

            if (rsp.status) {
                
                Swal.fire(
                    'Guardado!',
                    'El formulario de ingreso por barrera se guardo correctamente',
                    'success'
                );
                $('#'+idForm)[0].reset();
                linkTo('<?php echo BPM ?>Proceso/');

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
        complete: function() {
            wc();
        }
    });
}
//Primero recorro el formulario colocando las clases de correcto e incorrecto
//Luego reporto el error
function cierraPedidoTrabajo(){
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
    if($("#perm_transito").val() == ''){
        Swal.fire(
            'Oops...',
            'Debe cargar la foto del permiso de tránsito (*)',
            'error'
        );
        return;
    }
    if($("#pat_tractor").val() == ''){
        Swal.fire(
            'Oops...',
            'Debe cargar la foto de la patente del tractor (*)',
            'error'
        );
        return;
    }
    if($("#pat_termico").val() == ''){
        Swal.fire(
            'Oops...',
            'Debe cargar la foto de la patente del térmico (*)',
            'error'
        )
        return;
    }
    if($("#temperatura").val() == ''){
        Swal.fire(
            'Oops...',
            'Debe cargar la foto de la temperatura (*)',
            'error'
        )
        return;
    }
    if($("#precinto_1").val() == ''){
        Swal.fire(
            'Oops...',
            'Debe cargar la foto del precinto 1 (*)',
            'error'
        )
        return;
    }
    if($("#docu_firmado").val() == ''){
        Swal.fire(
            'Oops...',
            'Debe cargar la foto del documento firmado (*)',
            'error'
        )
        return;
    }

    frmGuardar($('.frm-new').find('form'),guardarPedidoTrabajo);
}
</script>