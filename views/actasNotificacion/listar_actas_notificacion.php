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
								// $tipo = $rsp->tipo;
								$texto = $rsp->texto;
								// $fec_inicio = $rsp->fec_inicio;
								// $estado = $rsp->estado;
								// $case_id = $rsp->case_id;
								// $proc_id = $rsp->proc_id;
								// $tipo_trabajo = $rsp->tipo_trabajo;
								// $dir_entrega = $rsp->dir_entrega;
								// $patente = $rsp->patente;

								echo "<tr id='$acno_id' data-json='" . json_encode($rsp) . "'>";

								echo "<td class='text-center text-light-blue'>";
								echo '<i class="fa fa-trash-o" style="cursor: pointer;margin: 3px;" title="Eliminar ingreso por barrera" onclick="#"></i>';
								echo '<i class="fa fa-print" style="cursor: pointer; margin: 3px;" title="Imprimir acta" onclick="#"></i>';
								echo "</td>";
								echo '<td class="text-center">'.$acno_id.'</td>';
								echo '<td class="text-center">'.formatFechaPG($fec_hora).'</td>';
								echo '<td class="text-center">'.$texto.'</td>';
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
</script>