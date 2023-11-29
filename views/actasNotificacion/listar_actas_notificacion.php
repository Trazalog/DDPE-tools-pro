<div class="box box-primary">
    <div class="box-header with-border">
        <h4 class="box-title">Listado de Ingresos por Barrera</h4>
    </div>
    <div class="box-body">
			<button class="btn btn-block btn-primary" style="width: 100px; margin-top: 10px;" onclick="$('#mdl-ingreso').modal('show')">Agregar</button>
			<div class="box-body table-scroll table-responsive">
				<table id="tbl-actas" class="table table-striped table-hover">
					<thead>
							<tr>
									<th class="text-center">Acciones</th>
									<th class="text-center">Número de Pedido</th>
                  <th class="text-center">Dominio</th>
									<th class="text-center">Fecha de Inicio</th>
									<th class="text-center">Estado</th>
							</tr>
					</thead>
					<tbody>
						<?php
            if(!empty($actas)){
							foreach($actas as $rsp){

								$petr_id = $rsp->petr_id;
								$nombre_cliente = $rsp->nombre;
								// $tipo = $rsp->tipo;
								$descripcion = $rsp->descripcion;
								$fec_inicio = $rsp->fec_inicio;
                                $estado = $rsp->estado;
                                $case_id = $rsp->case_id;
                                $proc_id = $rsp->proc_id;
                                $tipo_trabajo = $rsp->tipo_trabajo;
                                $dir_entrega = $rsp->dir_entrega;
                                $patente = $rsp->patente;

								echo "<tr id='$petr_id' data-json='" . json_encode($rsp) . "'>";

								echo "<td class='text-center text-light-blue'>";
								echo '<i class="fa fa-trash-o" style="cursor: pointer;margin: 3px;" title="Eliminar ingreso por barrera" onclick="confirmaEliminar(this)"></i>';
								echo '<i class="fa fa-print" style="cursor: pointer; margin: 3px;" title="Imprimir acta" onclick="imprimirActa(this)"></i>';
								echo '<i class="fa fa-search"  style="cursor: pointer;margin: 3px;" title="Ver Pedido" onclick="verPedido(this)"></i>';
								echo "</td>";
								echo '<td class="text-center">'.$petr_id.'</td>';
                                echo '<td class="text-center">'.$patente.'</td>';
								echo '<td class="text-center">'.formatFechaPG($fec_inicio).'</td>';
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