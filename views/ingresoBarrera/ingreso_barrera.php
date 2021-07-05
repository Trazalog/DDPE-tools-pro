<style>
.frm-save {
    display: none;
}
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Nuevo Ingreso por Barrera</h3>
    </div>
    <div class="panel-body" id="div_ingreso_barrera">
        <div class="col-md-12">
            <div class="frm-new" data-form="12"></div>

            <div class="form-group">
                <div class="col-md-6 col-sm-12 col-md-offset-6" style="text-align:right;margin-top: 20px;">
                    <button type="button" class="btn btn-danger" onclick="cerrarModal()">Cerrar</button>

                    <button type="button" id="btn-accion" class="btn btn-primary btn-guardar"
                        onclick="frmGuardar($('.frm-new').find('form'),guardarPedidoTrabajo)">Guardar</button>
                </div>

            </div>

            <!-- ************************************************************ -->
        </div>
    </div>
</div>


<script>


$("#clie_id").change(function() {
    debugger;
    nuevaDireccion = $(this).children(':selected').data('dir');
    console.log(nuevaDireccion);

    $(this).next('input').focus().val(nuevaDireccion);
    $('#dir_entrega').val(nuevaDireccion);
});



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
        
         console.log('status esta en saliendo por success:' + result);

            if (rsp.status) {
                console.log("Exito al guardar Formulario");
                Swal.fire(
                    'Guardado!',
                    'El Pedido de Trabajo se Guardo Correctamente',
                    'success'
                )
                $('#'+idForm)[0].reset();
                linkTo('<?php echo BPM ?>Proceso/');

            } else {
                Swal.fire(
                    'Oops...',
                    'No se Guardo Pedido de Trabajo',
                    'error'
                )
                console.log("Error al guardar Formulario de Pedido de trabajo");
            }
        },

        error: function(rsp) {
            console.log(rsp); 
            var result = rsp.status.toString(); 
        
        console.log('status esta en saliendo por error:' + result);

            console.log("Error al guardar Formulario");
            Swal.fire(
                'Oops...',
                'No se Guardo Formulario',
                'error'
            )
        },
        complete: function() {
            wc();
        }
    });
}
</script>