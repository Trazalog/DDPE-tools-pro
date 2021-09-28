<div class="box box-primary">
    <div class="box-header with-border">
        <h4 class="box-title">Listado de Ingresos por Barrera</h4>
    </div>
    <div class="box-body">
			<button class="btn btn-block btn-primary" style="width: 100px; margin-top: 10px;" onclick="$('#mdl-ingreso').modal('show')">Agregar</button>
			<div class="box-body table-scroll table-responsive">
				<table id="tbl-pedidos" class="table table-striped table-hover">
					<thead>
							<tr>
									<th class="text-center">Acciones</th>
									<th class="text-center">Número de Pedido</th>
									<th class="text-center">Fecha de Inicio</th>
									<th class="text-center">Estado</th>
							</tr>
					</thead>
					<tbody>
						<?php
							foreach($pedidos as $rsp){

								$petr_id = $rsp->petr_id;
								$nombre_cliente = $rsp->nombre;
								$tipo = $rsp->tipo;
								$descripcion = $rsp->descripcion;
								$fec_inicio = $rsp->fec_inicio;
                $estado = $rsp->estado;
                $case_id = $rsp->case_id;
                $proc_id = $rsp->proc_id;
                $tipo_trabajo = $rsp->tipo_trabajo;
                $dir_entrega = $rsp->dir_entrega;

								echo "<tr id='$petr_id' data-json='" . json_encode($rsp) . "'>";

								echo "<td class='text-center text-light-blue'>";
								echo '<i class="fa fa-trash-o" style="cursor: pointer;margin: 3px;" title="Eliminar ingreso por barrera" onclick="confirmaEliminar(this)"></i>';
								// echo '<i class="fa fa-print" style="cursor: pointer; margin: 3px;" title="Imprimir Comprobante"></i>';
								echo '<i class="fa fa-search"  style="cursor: pointer;margin: 3px;" title="Ver Pedido" onclick="verPedido(this)"></i>';
								echo "</td>";
								echo '<td class="text-center">'.$petr_id.'</td>';
								echo '<td class="text-center">'.formatFechaPG($fec_inicio).'</td>';
								switch ($estado) {
                  case 'estados_procesosPROC_EN_CURSO':
                    echo '<td class="text-center"><span data-toggle="tooltip" title="" class="badge bg-green">EN CURSO</span></td>';

                    break;

                  case 'estados_sicpoaINGRESADO':
                    echo '<td class="text-center"><span data-toggle="tooltip" title="" class="badge bg-blue">INGRESADO</span></td>';

                    break;

                  case 'estados_sicpoaREPRECINTADO':
                    echo '<td class="text-center"><span data-toggle="tooltip" title="" class="badge bg-yellow">REPRECINTADO</span></td>';

                    break;

                  case 'estados_sicpoaCORRECTO':
                    echo '<td class="text-center"><span data-toggle="tooltip" title="" class="badge bg-green">CORRECTO</span></td>';

                    break;

                  case 'estados_sicpoaINFRACCION':
                    echo '<td class="text-center"><span data-toggle="tooltip" title="" class="badge bg-red">INFRACCION</span></td>';

                    break;

                  case 'estados_sicpoaINFRACCION_CALLE':
                    echo '<td class="text-center"><span data-toggle="tooltip" title="" class="badge bg-red">INFRACCION EN CALLE</span></td>';

                    break;

                  default:
                    echo '<td class="text-center"><button type="button" class="btn btn-secondary">'.$estado.'</button></td>';
                    break;
                }
								echo '</tr>';
						}
						?>
					</tbody>
				</table>
			</div>
    </div>
</div>
<?php
  
        //informacion del proceso
        $data['info'] = '';#$this->load->view(BPM.'tareas/componentes/informacion',$data['tarea'], true);

        //LINEA DE TIEMPO
        $data['timeline'] =$this->bpm->ObtenerLineaTiempo($tarea->processId, $case_id);

        //COMENTARIOS DEL PEDIDO
        $data_aux = ['case_id' => $case_id, 'comentarios' => $this->bpm->ObtenerComentarios($case_id)];
        $data['comentarios'] = $this->load->view(BPM.'tareas/componentes/comentarios', $data_aux, true);
        
        // $data['formularios'] = $this->Pedidotrabajos->getFormularios($petr_id);

        
?>
<!-- The Modal -->
<div class="modal modal-fade" id="mdl-vista">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="xmodal-body">
                <?php $this->load->view(SICP.'ingresoBarrera/mdl_ingreso_detalle', $data); ?>
            </div>
            <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
    </div>
</div>
<!-- MODAL AGREGAR INGRESO POR BARRERA -->
<?php $this->load->view('ingresoBarrera/mdl_ingresos_barrera'); ?>
<!-- FIN MODAL AGREGAR INGRESO POR BARRERA -->
<script>

$('#tbl-pedidos').DataTable({
        "order": [[ 0, "desc" ]]
	});

function verPedido(tag) {

  dataJson = JSON.parse($(tag).closest('tr').attr('data-json'));

  comments = "<?php echo base_url(SICP); ?>Ingreso_barrera/cargar_detalle_comentario?petr_id=" + dataJson.petr_id + "&case_id=" + dataJson.case_id;
  timeline = "<?php echo base_url(SICP); ?>Ingreso_barrera/cargar_detalle_linetiempo?case_id=" + dataJson.case_id;

  wo();

  $("#cargar_comentario").empty();
  $("#cargar_comentario").load(comments);

  $("#cargar_trazabilidad").empty();
  $("#cargar_trazabilidad").load(timeline,function () {
    $('#mdl-vista').modal('show');
    wc();
  });

	} 
//
//Confirmación con SWAL2 para eliminar el ingreso por barrera
//
function confirmaEliminar(tag){

  dataJson = JSON.parse($(tag).closest('tr').attr('data-json'));

  datosIngreso = {"petr_id" : dataJson.petr_id, "case_id" : dataJson.case_id} ;

  const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        });

  swalWithBootstrapButtons.fire({
    title: 'Confirmación',
    text: "Esta acción no puede ser revertida!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Eliminar',
    cancelButtonText: 'Cancelar',
    reverseButtons: true
  }).then((result) => {
    
    if (result.value) {
      eliminarIngreso(datosIngreso);
    } else if ( result.dismiss === Swal.DismissReason.cancel ) {
      //acción si se cancela la confimación
    }
  });

}
//
//Elimina el Ingreso por barrera, es lo mismo que pedido de trabajo
//
function eliminarIngreso(datosIngreso) {

  $.ajax({
    type: 'POST',
    data: datosIngreso,
    url: '<?php echo SICP ?>Ingreso_barrera/eliminarIngresoBarreraLanzado',
    success: function(rsp) {

      resp = JSON.parse(rsp);
      
      if(resp.status){

        linkTo('<?php  echo SICP ?>/Ingreso_barrera?proccessname=DDPE-SICPOA/');
        setTimeout(() => {
            Swal.fire(
                'Perfecto!',
                'Se elimino el ingreso por barrera correctamente!',
                'success'
            )
        }, 5000);
      }else{
        Swal.fire(
            'Error!',
            'Se produjo un error al eliminar ingreso por barrera',
            'error'
        )
      }
    },
    error: function(rsp) {
      Swal.fire(
          'Error!',
          'Se produjo un error al eliminar ingreso por barrera',
          'error'
      )
    }
  });
}
</script>




