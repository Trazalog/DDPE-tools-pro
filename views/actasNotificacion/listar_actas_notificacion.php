<div class="box box-primary">
    <div class="box-header with-border">
        <h4 class="box-title">Listado de Actas de Notificación</h4>
    </div>
    <div class="box-body">
		<button class="btn btn-block btn-primary" style="width: 100px; margin-top: 10px;" onclick="$('#mdl-acta-nuevo').modal('show')">Agregar</button>
		<div class="box-body table-scroll table-responsive">
			<table id="tbl-actas" class="table table-striped table-hover">
				<thead>
					<tr>
						<th class="text-center">Acciones</th>
						<th class="text-center">Número de Acta</th>
						<th class="text-center">Fecha y Hora</th>
						<th class="text-center">Texto</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if(!empty($actas)){
							foreach($actas as $rsp){
								$acno_id = $rsp->acno_id;
								$fec_hora = $rsp->fec_hora;
								$fecha_objeto = DateTime::createFromFormat('Y-m-d\TH:i:s.uP', $fec_hora);
								$fecha_formateada = $fecha_objeto->format('d-m-Y H:i:s:u');
								$texto = $rsp->texto;
								$texto_corto = strlen($texto) > 100 ? substr($texto, 0, 100) . '...' : $texto;
								echo "<tr id='$acno_id' data-json='" . json_encode($rsp) . "'>";
								echo "<td class='text-center text-light-blue'>";
								echo '<i class="fa fa-trash-o" style="cursor: pointer;margin: 3px;" title="Eliminar acta" onclick="confirmaEliminar(this)"></i>';
								// echo '<i class="fa fa-print" style="cursor: pointer; margin: 3px;" title="Imprimir acta" onclick="#"></i>';
								echo "</td>";
								echo '<td class="text-center">'.$acno_id.'</td>';
								echo '<td class="text-center">'.$fecha_formateada.'</td>';
								echo '<td class="text-center">'.$texto_corto.'</td>';
								echo '</tr>';
							}
						}else{
							echo "<tr><td>No hay datos para mostrar</td></tr>";
						}
					?>
				</tbody>
			</table>
		</div>
    </div>
</div>
<!-- MODAL AGREGAR INGRESO POR BARRERA -->
<?php $this->load->view('actasNotificacion/mdl_actas_notificacion'); ?>
<!-- FIN MODAL AGREGAR INGRESO POR BARRERA -->

<!-- ACTA -->
  <!-- <div id="actaImprimir" style="display:none"></div> -->
<!-- FIN ACTA -->
<script>
	function abrirModalNuevo() {
		// $("#modalDetalle").modal('show');
	}

	function confirmaEliminar(tag){
		dataJson = JSON.parse($(tag).closest('tr').attr('data-json'));
		datosActa = {"acno_id" : dataJson.acno_id} ;
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
			eliminarActa(datosActa);
		} else if ( result.dismiss === Swal.DismissReason.cancel ) {
			//acción si se cancela la confimación
		}
		});

		}

		//
		//Elimina el Ingreso por barrera, es lo mismo que pedido de trabajo
		//
		function eliminarActa(datosActa) {
			$.ajax({
				type: 'POST',
				data: datosActa,
				url: '<?php echo SICP ?>Actas_notificacion/eliminarActa',
				success: function(rsp) {
					resp = JSON.parse(rsp);					
					if(resp.status){
					setTimeout(() => {
						Swal.fire(
							'Perfecto!',
							'Se elimino el acta correctamente!',
							'success'
						)
					}, 5000);
					}else{
						Swal.fire(
							'Error!',
							'Se produjo un error al eliminar acta',
							'error'
						)
					}
				},
				error: function(rsp) {
					Swal.fire(
						'Error!',
						'Se produjo un error al eliminar acta',
						'error'
					)
				}
			});
		}
</script>