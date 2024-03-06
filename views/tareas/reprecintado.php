<?php $this->load->view(SICP."inspeccion/modales.php"); ?>
<style>
.input-group-addon:hover{
    cursor: pointer;
    background-color: #04d61d !important;
}
.input-group-addon{
    background-color: #05b513 !important;
    color: white !important;
}
.form-check-inline{
    display: inline;
    margin: 10px;
}
.dataTemporal{
    min-height: 20px;
    text-align: center;
}
.caja{
    margin-top: 15px;
}
.centrar{
    text-align: center;
}
.ocultar .has-feedback .form-control-feedback{
    display: none !important;
}
.frm-save{
    display: none;
}

/* ESTILOS VISTA PREVIA */
.col img {
  opacity: 0.8;
  cursor: pointer;
}
.col img:hover {
  opacity: 1;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
.contenedor {
  display: inline-flex;
}
#imgtext {
  position: absolute;
  bottom: 15px;
  left: 15px;
  color: white;
  font-size: 20px;
}
.closebtn {
  position: absolute;
  left: 2%;
  color: white;
  font-size: 35px;
  display: flex;
  cursor: pointer;
}
/* THUMBNAIL */
.selected{
    opacity : 0.2 !important;
} 
.fotos{
    float: left;
    margin-right: 10px;
    display: block;
}
#expandedImg{
  margin-right: auto;
  margin-left:auto;
  display: block;
  max-width: 60%;
}
/* FIN ESTILOS VISTA PREVIA */
.btnZoom {
  height: 40px;
}
</style>
<div class="nav-tabs-custom ">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#formReprecintado_tab" data-toggle="tab" aria-expanded="false">Formulario</a></li>
        <li style="display:none !important;" class="privado"><a href="#actaInfraccion_tab" data-toggle="tab" aria-expanded="false">Acta de Infracción</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="formReprecintado_tab">
            <!--_______ FORMULARIO PERMISO DE TRANSITO BOX 1______-->
            <form class="formReprecintado" id="formReprecintado">
                <div class="row">
                <input type="hidden" name="contador" id="contador" >
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="caja" id="boxPermisoTransito">                            
                            <input type="text" class="form-control hidden" name="petr_id" id="petr_id" value="<?php echo $petr_id?>">
                            <input type="text" class="form-control hidden" name="reprecintado" id="reprecintado" value="true">
                            <input type="text" class="form-control hidden" name="info_id_doc" id="info_id_doc" value="<?php echo $inspeccion->info_id_doc ?>">
                            <input type="text" class="form-control hidden" name="info_id_acta" id="info_id_acta" value="<?php echo isset($inspeccion->info_id_acta) ? $inspeccion->info_id_acta : '' ?>">
                            <!-- Bloque campos necesarios para cierre de reprecintado-->
                            <input type="text" name="patente_tractor" id="patente_tractor" value="<?php echo isset($inspeccion->patente_tractor) ? $inspeccion->patente_tractor : '' ?>" hidden/>
                            <input type="text" name="chof_id" id="chof_id" value="<?php echo isset($inspeccion->chof_id) ? $inspeccion->chof_id : '' ?>" hidden/>
                            <input type="text" name="emailTransportista" id="emailTransportista" value="<?php echo isset($inspeccion->email_transportista) ? $inspeccion->email_transportista : '' ?>" hidden/>
                            <input type="text" name="telTransportista" id="telTransportista" value="<?php echo isset($inspeccion->tel_transportista) ? $inspeccion->tel_transportista : '' ?>" hidden/>
                            <input type="text" name="depa_idActa" id="depa_idActa" value="<?php echo isset($inspeccion->depa_id) ? $inspeccion->depa_id : '' ?>" hidden/>
                            <input type="text" name="localidad" id="localidad" value="<?php echo isset($inspeccion->localidad) ? $inspeccion->localidad : '' ?>" hidden/>
                            <input type="text" name="localidad" id="localidad" value="<?php echo isset($inspeccion->localidad) ? $inspeccion->localidad : '' ?>" hidden/>
                            <input type="text" name="dondeConstituyen" id="dondeConstituyen" value="<?php echo isset($inspeccion->se_constituye) ? $inspeccion->se_constituye : '' ?>" hidden/>
                            <input type="text" name="domicilio" id="domicilio" value="<?php echo isset($inspeccion->domicilio_constituye) ? $inspeccion->domicilio_constituye : '' ?>" hidden/>
                            <input type="text" name="propiedad" id="propiedad" value="<?php echo isset($inspeccion->propiedad_de) ? $inspeccion->propiedad_de : '' ?>" hidden/>
                            <input type="text" name="quienAtendio" id="quienAtendio" value="<?php echo isset($inspeccion->atendidos_por) ? $inspeccion->atendidos_por : '' ?>" hidden/>
                            <input type="text" name="caracterAtendio" id="caracterAtendio" value="<?php echo isset($inspeccion->caracter_de) ? $inspeccion->caracter_de : '' ?>" hidden/>
                            <input type="text" name="procedenAccion" id="procedenAccion" value="<?php echo isset($inspeccion->proceden_a) ? $inspeccion->proceden_a : '' ?>" hidden/>
                            <input type="text" name="fechaActaInspeccion" id="fechaActaInspeccion" value="<?php echo isset($fechaInspeccion) ? $fechaInspeccion : '' ?>" hidden/>
                            <input type="text" name="horaActaInspeccion" id="horaActaInspeccion" value="<?php echo isset($horaInspeccion) ? $horaInspeccion : '' ?>" hidden/>
                            <input type="text" name="ticket" id="ticket" value="<?php echo isset($inspeccion->ticket) ? $inspeccion->ticket : '' ?>" hidden/>
                            <input type="text" name="observaciones" id="observaciones" value="<?php echo isset($inspeccion->observaciones) ? $inspeccion->observaciones : '' ?>" hidden/>                            
                            <input type="text" name="tara" id="tara" value="<?php echo isset($inspeccion->tara) ? $inspeccion->tara : '' ?>" hidden/>                            
                            <input type="text" name="bruto" id="bruto" value="<?php echo isset($inspeccion->bruto) ? $inspeccion->bruto : '' ?>" hidden/>                            
                            <input type="text" name="inspectores" id="inspectores" value="<?php echo isset($inspeccion->inspectores) ? $inspeccion->inspectores : '' ?>" hidden/>                            
                            <input type="text" name="resultado" id="resultado" value="<?php echo isset($inspeccion->resultado) ? $inspeccion->resultado : '' ?>" hidden/>                            
                            <!-- FIN Bloque campos necesarios para cierre de reprecintado-->
                            <div class="box-tittle centrar">
                                <h3>Permiso de tránsito</h3>
                            </div>
                            <input type="text" class="form-control hidden" name="petr_id" id="petr_id" value="<?php echo $petr_id?>">
                            <input type="hidden" name="reprecintado" id="reprecintado" value="true">
                            <!--Permiso-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="perm_num">N° de Permiso(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input type="text" class="form-control requerido alfanumerico" id="permi_num" placeholder="Ingrese número de permiso"/>
                                </div>
                            </div>
                            <!--________________-->

                            <!--Solicitud-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="Solicitud">N° de Solicitud(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input type="text" class="form-control requerido alfanumerico" id="soli_num" placeholder="Ingrese número de solicitud"/>
                                </div>
                            </div>
                            <!--________________-->

                            <!-- Lugar de Emisión -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="emision">Lugar de emisión(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input type="text" class="form-control" id="emision" placeholder="Ingrese lugar de emisión"/>
                                </div>
                            </div>
                            <!--________________-->
                            
                            <!--DOC. Sanitaria Tipo-->
                            <div class="col-md-6 col-sm-6 col-xs-6" style="display: contents;">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <label for="doc_sanitaria">Doc. Sanitaria Tipo(<strong style="color: #dd4b39">*</strong>):</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-check">
                                        <input type="radio" class='form-check-input' name="doc_sanitaria" value="PT"/>
                                        <label class="form-check-label" for="">PT</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class='form-check-input' name="doc_sanitaria" value="PTR"/>
                                        <label class="form-check-label" for="">PTR</label>
                                    </div>
                                </div>
                            </div>
                            <!--________________-->

                            <!--Hora de Salida-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                <label for="salida">Hora de Salida(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input type="time" class="form-control" id="salida" placeholder="Ingrese hora de salida"/>
                                </div>
                            </div>
                            <!--________________-->

                            <!--Fecha-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                <label for="fecha">Fecha del Permiso(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control formatoFecha" id="fecha"/>
                                </div>
                            </div>
                            <!--________________-->

                            <!--Nombre Establecimiento-->
                            <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                                <div class="form-group">
                                    <label for="esta_nom" style="font-size:13px !important">Nombre de Establecimiento(<strong style="color: #dd4b39">*</strong>):</label>
                                    <div class="input-group">
                                        <select class="form-control select2 select2-hidden-accesible empresa" id="esta_nom" required>
                                            <option value="" disabled selected></option>	
                                        </select>
                                        <span id="add_establecimiento" class="input-group-addon" data-toggle="modal" data-target="#mdl-establecimiento" onclick="$('#tipoEmpresa').val('Establecimiento')"><i class="fa fa-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!--________________-->
                            
                            <!--Establecimiento N°-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="esta_num">Establecimiento N°(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control" name="esta_num" id="esta_num" placeholder="Establecimiento N°" readonly/>
                                </div>
                            </div>
                            <!--________________-->

                            <!--Producto-->
                            <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                                <div class="form-group">
                                    <label for="producto">Producto(<strong style="color: #dd4b39">*</strong>):</label>
                                    <div class="input-group" style="width: 100%">
                                        <select class="form-control select2 select2-hidden-accesible producto" name="tipr_id" id="tipr_id" style="width: 100%">
                                            <option value="" disabled selected>- Seleccionar -</option>
                                            <?php
                                                if(!empty($productos)){ 
                                                    foreach ($productos as $prod) {
                                                        echo "<option data-json='".json_encode($prod)."' value='".$prod->tabl_id."'>".$prod->descripcion."</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--________________-->

                           <!--Estado de Producto-->
                            <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                                <div class="form-group">
                                    <label for="estado_producto">Estado del Producto(<strong style="color: #dd4b39">*</strong>):</label>
                                    <div class="input-group" style="width: 100%">
                                        <select class="form-control select2 select2-hidden-accesible estado_producto" name="estado_pr_id" id="estado_pr_id" style="width: 100%">
                                            <option value="" disabled selected>- Seleccionar -</option>
                                            <?php
                                                if(!empty($estados_productos)){ 
                                                    foreach ($estados_productos as $estados) {
                                                        echo "<option data-json='".json_encode($estados)."' value='".$estados->tabl_id."'>".$estados->descripcion."</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                            <!--Kilos-->
                            <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="kilos">Kilos(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control onlyNumbers" name="kilos" id="kilos" placeholder="Ingrese kilos"/>
                                </div>                    
                            </div> -->
                            <!--________________-->

                            <!--Producto-->
                            <!-- <div class="col-md-12 col-sm-12 col-xs-12 ocultar">
                                <div class="form-group">
                                    <label for="producto">Producto/s(<strong style="color: #dd4b39">*</strong>):</label>
                                    <textarea class="form-control" name="productos" id="producto" placeholder="Ingrese producto/s"></textarea>
                                </div>                    
                            </div> -->
                            <!--________________-->

                            <!--Neto-->
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="neto">Peso Neto(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control onlyNumbers" id="netoPermiso"/>
                                </div>                    
                            </div>
                            <!--________________-->

                            <!--Bruto-->
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="bruto">Peso Bruto(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control onlyNumbers" id="brutoPermiso"/>
                                </div>                    
                            </div>
                            <!--________________-->

                            <!--Temperatura-->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="temperatura">Temperatura(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control onlyNumbersT" id="temperatura" placeholder="Ingrese temperatura" />
                                </div>                    
                            </div>
                            <!--________________-->

                            <!--Empresa Destino-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="empre_destino">Empresa Destino(<strong style="color: #dd4b39">*</strong>):</label>
                                    <div class="input-group">
                                        <select class="form-control select2 select2-hidden-accesible empresa" name="empre_destino" id="empre_destino">
                                            <option value="" disabled selected></option>
                                        </select>
                                        <span id="add_empresa" class="input-group-addon" data-toggle="modal" data-target="#mdl-empresa" onclick="$('#tipoEmpresa').val('Empresa')"><i class="fa fa-plus"></i></span>
                                    </div>
                                </div>                    
                            </div>
                            <!--________________-->

                            <!--Depósito Destino-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="depo_destino">Depósito Destino(<strong style="color: #dd4b39">*</strong>):</label>
                                    <div class="input-group">
                                        <select class="form-control select2 select2-hidden-accesible" name="depo_destino" id="depo_destino">
                                            <option value="" disabled selected>-Seleccionar-</option>
                                        </select>
                                        <span id="add_deposito" class="input-group-addon" data-toggle="modal" data-target="#mdl-deposito"><i class="fa fa-plus"></i></span>
                                    </div>
                                </div>                    
                            </div>

                            <!--Producto-->
                            <!-- <div class="col-md-12 col-sm-12 col-xs-12 ocultar">
                                <div class="form-group">
                                    <label for="productosDestino">Producto/s para la empresa de destino(<strong style="color: #dd4b39">*</strong>):</label>
                                    <textarea class="form-control" name="productosDestino" id="productosDestino" placeholder="Ingrese producto/s para la empresa de destino"></textarea>
                                </div>                    
                            </div> -->
                            <!--________________-->

                            <!--_________________ Agregar_________________-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div style="margin-top: 25px;" class="form-group text-right">
                                    <button type="button" class="btn btn-primary" onclick="agregarDestino()" >Agregar Destino</button>
                                </div>
                            </div>                
                            <!--__________________________________-->

                            <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                                 <h4 class="titDataDinamica">Empresa Destino:</h4>
                                <div id="sec_destinos">
                                  <!--   <?php 
                                    if(!empty($destinos)){
                                        foreach ($destinos as $key) {
                                    ?>
                                        <div class='form-group empreDestino' data-json='<?php echo json_encode($key) ?>'>
                                            <span>
                                                <i class='fa fa-fw fa-eye text-light-blue' style='cursor: pointer;' title='Ver detalle' onclick="verDestino(this)"></i> 
                                                <i class='fa fa-fw fa-edit text-light-blue' style='cursor: pointer;' title='Editar' onclick='editarDestino(this)'></i> 
                                                <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                                                <?php echo "| $key->razon_social - $key->calle - $key->altura" ?>
                                            </span>
                                        </div>
                                    <?php
                                        }
                                    }
                                    ?> -->
                                </div>
                            <hr>
                            </div>
                            <!--________________-->

                            <!--_________________ Agregar_________________-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group text-right">
                                    <button type="button" class="btn btn-primary" onclick="agregarPermiso()" >Agregar Permiso</button>
                                </div>
                            </div>                     
                            <!--__________________________________-->
                            <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                                 <h4 class="titDataDinamica">Permisos:</h4>
                                <div id="sec_permisos">
                              <!--       <?php 
                                    if(!empty($preCargaDatos->permisos_transito->permiso_transito)){
                                        foreach ($preCargaDatos->permisos_transito->permiso_transito as $key) {
                                    ?>
                                        <div class='form-group permTransito' data-json='<?php echo json_encode($key) ?>'>
                                            <span> 
                                                <i class='fa fa-fw fa-eye text-light-blue' style='cursor: pointer;' title='Ver detalle' onclick='verPermiso(this)'></i> 
                                                <i class='fa fa-fw fa-edit text-light-blue' style='cursor: pointer;' title='Editar' onclick='editarPermiso(this)'></i>
                                                <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                                                <?php echo "| <span class='numPermiso'>$key->soli_num</span> - $key->perm_id" ?>
                                            </span>
                                        </div>
                                    <?php
                                        }
                                    }
                                    ?> -->
                                </div>
                                <hr>
                            </div>
                        </div><!-- FIN #boxPermisoTransito -->
                    </div>
                    <!--_______ FIN FORMULARIO PERMISO DE TRANSITO BOX 1 ______-->
                    
                    <!--_______ FORMULARIO INSPECCION BOX 2______-->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <!--Inspectores-->
                        <div style="margin-top: 50px;" class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="inspectores_reprecintado">Inspectores(<strong style="color: #dd4b39">*</strong>):</label>
                                <input class="form-control" name="inspectores_reprecintado" id="inspectores_reprecintado" placeholder="Ingrese Inspectores" value="<?php echo isset($inspeccion->inspectores_reprecintado) ? $inspeccion->inspectores : null; ?>"/>
                            </div>                    
                        </div>
                        <!--________________-->
                        <div class="caja" id="boxInspeccion">
                            <!--Bruto-->
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="bruto_reprecintado">Bruto:</label>
                                    <input class="form-control neto onlyNumbers" name="bruto_reprecintado" id="bruto_reprecintado" value="<?php echo isset($inspeccion->bruto_reprecintado) ? $inspeccion->bruto : null; ?>"/>
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Tara-->
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="tara_reprecintado">Tara:</label>
                                    <input class="form-control neto onlyNumbers" name="tara_reprecintado" id="tara_reprecintado" value="<?php echo isset($inspeccion->tara_reprecintado) ? $inspeccion->tara : null; ?>"/>
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Neto-->
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="neto">Neto:</label>
                                    <input class="form-control" id="neto" readonly/>
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Ticket-->
                            <div class="col-md-12 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="ticket_reprecintado">Ticket:</label>
                                    <input class="form-control" name="ticket_reprecintado" id="ticket_reprecintado" value="<?php echo isset($inspeccion->ticket_reprecintado) ? $inspeccion->ticket : null; ?>"/>
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Nro de Precintos de cierre-->
                            <div class="col-md-12 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="nroPrecintosCierre">Nro de Precintos de cierre(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control limited" name="nroPrecintosCierre" id="nroPrecintosCierre" placeholder="Ingrese Precintos"/>
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Observaciones Reprecintado-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="observaciones_reprecintado">Observaciones:</label>
                                    <textarea class="form-control" name="observaciones_reprecintado" id="observacionesReprecintado" placeholder="Observaciones"></textarea>
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--Valida Inspeccion-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="inspValida">¿Inspección correcta?:</label>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class='form-check-input' name="inspValida" value="correcta" onchange="showValidar(this)"/>
                                        <label class="form-check-label" for="">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class='form-check-input' name="inspValida" value="incorrecta" onchange="showValidar(this)"/>
                                        <label class="form-check-label" for="">No</label>
                                    </div>
                                </div>
                            </div>
                            <!--________________-->
                            <!--Bloque Validar-->
                            <div id="bloque_validar" style="display:none;">
                            <div class="col-md-12 col-sm-12 col-xs-12 ocultar">
                                <div class="form-group">
                                    <label for="tpoInfraccion">Tipos Infracción(<strong style="color: #dd4b39">*</strong>):</label>
                                    <select class="form-control select2 select2-hidden-accesible" name="tpoInfraccion[]" id="tpoInfraccion" required style="width: 100%;" multiple>
                                        <?php
                                        if(!empty($infracciones)){
                                            foreach ($infracciones as $tipos) {
                                                echo "<option data-json='".json_encode($tipos)."' value='".$tipos->tabl_id."'>".$tipos->descripcion."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="cant_fajas">Cantidad de fajas(<strong style="color: #dd4b39">*</strong>):</label>
                                        <input type="number" class="form-control" name="cant_fajas" id="cant_fajas" placeholder="Ingrese N° fajas" required/>
                                    </div>
                                </div>
                            </div>                    
                            <!--________________-->
                        </div> <!--FIN box-primary-->
                    </div><!--FIN col-->
                <!--_______ FIN FORMULARIO INSPECCION BOX 2______-->
                </div><!-- FIN row-->
                <div class="row" style="display: none">
                    <!--Fecha Acta-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="fechaActa">Fecha(<strong style="color: #dd4b39">*</strong>):</label>
                            <input type="date" class="form-control" name="fechaActa" id="fechaActa" required/>
                        </div>
                    </div>
                    <!--________________-->
                </div>
            </form>
        </div><!-- FIN .tab-pane -->
        <div class="tab-pane" id="actaInspeccion_tab">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php $this->load->view(SICP."actas/acta_inspeccion.php"); ?>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="actaInfraccion_tab">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php $this->load->view(SICP."actas/acta_infraccion.php"); ?>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="actaReprecintado_tab">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php $this->load->view(SICP."actas/acta_reprecintado.php"); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
//
//Document READY
//Instancias select2 combo box
//
$(document).ready(function() {
    $('.select2').select2();
    //Seccion de trigger para los cambios
    //Mustra bloque validar si es correcta
    // showValidar($('#resultado').val());
    
    //Calcula neto anterior
    $(".neto").trigger('change');

    //Script para inicio de formulario 11
    //Escaneo documentacion
    detectarForm();
    initForm();
    
    //Renombro el BOTON de guardar
    $('#btnHecho').text('Imprimir acta');

    //MÁSCARAS
    //Bruto y Tara
    $(".onlyNumbers").inputmask({ regex: "[0-9.,]*" });

    $('.empresa').select2({
        ajax: {
            url: "<?php echo SICP; ?>inspeccion/buscaEmpresas",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    patron: params.term, // parámetro búsqueda
                    page: params.page
                };
            },
            processResults: function (data, params) {
    
                params.page = params.page || 1;
                
                var results = [];
                $.each(data, function(i, obj) {
                    results.push({
                        id: obj.cuit,
                        text: obj.razon_social,
                        num_esta: obj.num_establecimiento
                    });
                });
                return {
                    results: results,
                    pagination: {
                        more: (params.page * 30) < results.length
                    }
                };
            }
        },
        placeholder: 'Buscar empresa',
        minimumInputLength: 3,
        templateResult: function (empresa) {

            if (empresa.loading) {
                return "Buscando empresas...";
            }

            var $container = $(
                "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__meta'>" +
                    "<div class='select2-result-repository__title'></div>" +
                    "<div class='select2-result-repository__description'></div>" +
                "</div>" +
                "</div>"
            );

            $container.find(".select2-result-repository__title").text(empresa.id);
            $container.find(".select2-result-repository__description").text(empresa.text);

            return $container;
        },
        templateSelection: function (empresa) {
            return empresa.text;
        },
        language: {
            noResults: function() {
                return '<option>No hay coincidencias</option>';
            },
            inputTooShort: function () {
                return 'Ingrese 3 o mas dígitos para comenzar la búsqueda'; 
            }
        },
        escapeMarkup: function(markup) {
            return markup;
        },
    });
    //Deshabilito los depositos destino hasta que se elija una empresa destino
    $("#depo_destino").prop("disabled", true);

    //MÁSCARAS
    //Lugar de Emision A-Z, 0-9 y space
    $("#emision").inputmask({ regex: "[a-zA-Z0-9 ]*" });
    //Solicitud N° y N° de Permiso
    $(".alfanumerico").inputmask({ regex: "[0-9/a-zA-Z -]*" });
    // N° SENASA: 0-9, /, ',' y -
    $(".limitedChars").inputmask({ regex: "[0-9/,-]*" });
    //PRECINTOS y Patentes: 0-9, A-Z, space, / y -
    $(".limited").inputmask({ regex: "[0-9/a-zA-Z -]*" });
    //Bruto y Tara
    $(".onlyNumbers").inputmask({ regex: "[0-9.,]*" });
    //Temperaturas
    $(".onlyNumbersT").inputmask({ regex: "[0-9.,-]*" });
    //Fechas
    $('.formatoFecha').inputmask({
        alias: "datetime",
        inputFormat: "dd-mm-yyyy"
    });

    //Renombro el BOTON de guardar
    $('#btnHecho').text('Imprimir acta');

});//FIN document.ready
//Actualizo neto cuando se cargue Bruto y Tara
$(".neto").on("change", function () {
    bruto = $("#bruto").val();
    tara = $("#tara").val();

    if(bruto != '' && tara != ''){
        neto = bruto - tara;
        if(neto > 0){
            $('#neto').val(neto);
        }else{
            $("#bruto").val('');
            $("#tara").val('');
            alert("El peso bruto es menor al peso tara");
        }
    }
});
//Actualizo neto cuando se cargue Bruto y Tara
$(".netoRepre").on("change", function () {
    bruto = $("#bruto_reprecintado").val();
    tara = $("#tara").val();

    if(bruto != '' && tara != ''){
        neto = bruto - tara;
        if(neto > 0){
            $('#neto_reprecintado').val(neto);
        }else{
            $("#bruto").val('');
            $("#tara").val('');
            alert("El peso bruto es menor al peso tara");
        }
    }
});
//
//Comienzo scripts preparacion y cierre tarea
//Guardado de formulario
//Cierre formulario
async function cerrarTareaform(){

    //obtengo el formulario de la inspeccion
    var dataForm = new FormData($('#formReprecintado')[0]);
    var frm_info_id = $('#info_id_doc').val();
    
    dataForm.append('case_id', $("#caseId").val());
    dataForm.append('info_id_doc', frm_info_id);
    dataForm.append('tipo', 'reprecintado');

    dataForm.append('fec_inspeccion', $("#fechaActaInspeccion").val() + " " + $("#horaActaInspeccion").val());

    var fechaHoraActual = new Date();

    //obtengo fecha y hora actual en la que se hace el reprecintado
    var formatoFechaHora = fechaHoraActual.getFullYear() + '-' +
                       ('0' + (fechaHoraActual.getMonth() + 1)).slice(-2) + '-' +
                       ('0' + fechaHoraActual.getDate()).slice(-2) + ' ' +
                       ('0' + fechaHoraActual.getHours()).slice(-2) + ':' +
                       ('0' + fechaHoraActual.getMinutes()).slice(-2) + ':' +
                       ('0' + fechaHoraActual.getSeconds()).slice(-2);

    dataForm.append('fec_reprecintado', formatoFechaHora);

    //Guardo los datos del formulario para no perderlos en reload
    //obtengo los permisos
    permisos = [];
    $('#sec_permisos div.permTransito').each(function(i, obj) {
        var json = JSON.parse($(obj).attr('data-json'));
        json.case_id = case_id;
        json.reprecintado = true;
        permisos[i] = json;
    });

    //obtengo los destinos
    empresas = [];
    permisos.forEach(function(permiso) {
        var empresasAsociadas = permiso.empresas;
        var perm_id = permiso.perm_id;
        empresasAsociadas.forEach(function(empresa) {
            json = empresa;
            json.perm_id = perm_id;
            empresas.push(json);
        });
    });

    //validacion para que no agregue termicos nuevos en la inspeccion
    var reprecintado = true; 

    //Guardo la inspeccion
    let guardadoCompleto = new Promise( function(resolve,reject){
            $.ajax({
            type: 'POST',
            data: dataForm,
            cache: false,
            contentType: false,
            processData: false,
            url: "<?php echo SICP; ?>inspeccion/agregarInspeccion",
            success: function(data) {
                resp = JSON.parse(data);
                if(data){
                    console.log("Se creo contador correctamente");
                    $("#contador").val(resp.contador);
                }
                else 
                {
                    console.log('error crear contador');
                }
                //Guardo los permisos, empresas, termicos e infraccion si hubiese
                $.ajax({
                    type: 'POST',
                    data: {permisos, empresas, case_id, reprecintado},
                    url: "<?php echo SICP; ?>inspeccion/guardarDatosInspeccion",
                    success: function(data) {
                        resp = JSON.parse(data);
                        if(resp.status){
                            //resp.info_id = newInfoID;
                            //resp.info_id_acta = info_id_acta;//Foto del acta en papel realizada offline
                            resolve(resp);
                        }else{
                            console.log(resp.message);
                            reject(resp);
                        }
                    },
                    error: function(data) {
                        wc();
                        reject(data);
                    }
                });
                console.log("Se guardo el formulario de la inspección correctamente");
                resolve("Correcto");

            },
            error: function(data) {
                alert("Error al guardar formulario de la inspección");
                reject("Error");
            }
        });
    });
    return await guardadoCompleto;
}


function cerrarTarea() {
    wo();
    if(!frm_validar('#formReprecintado')){
        Swal.fire(
            'Error..',
            'Debes completar los campos obligatorios (*)',
            'error'
        );
        wc();
        return;
    }

    //Una vez validado el formulario, lo guardo
    cerrarTareaform().then((result) => {        
        var dataForm = new FormData($('#formReprecintado')[0]);
        frm_info_id = $('#info_id_doc').val();
        dataForm.append('frm_info_id', frm_info_id);        
        var id = $('#taskId').val();
        $.ajax({
            type: 'POST',
            data: dataForm,
            cache: false,
            contentType: false,
            processData: false,
            url: '<?php base_url() ?>index.php/<?php echo BPM ?>Proceso/cerrarTarea/' + id,
            success: function(data) {
                wc();
                imprimirActa();
            },
            error: function(data) {
                alert("Error al finalizar tarea");
            }
        });
    }).catch((err) => {
        wc();
        console.log(err);
        alert("Error al finalizar tarea");
    });
}
//FIN Scripts Cierre tarea
/***************************************************** */
/***************************************************** */
//
//Bloques para validar
//
function showValidar(resultado){
    if(resultado.value == "correcta"){
        $("#bloque_validar").hide();
        $('#tpoInfraccion').val(null).trigger('change');
        $('#btnHecho').text('Imprimir Acta de Inspección');
    }else{
        $("#bloque_validar").show();
        $('#btnHecho').text('Imprimir Acta de Infracción');
    }
}
/***************************************************** */
//
//Scripts Imprimir ACTA
//
function imprimirActa(){

    var idActa = "#actaReprecintado";
    //Completo datos en el acta antes de imprimir

    $(".acta_contador").text($("#contador").val());
    $(".acta_caseId").text($("#case_id").val());
    $(".acta_chofer").text($("#nom_chofer").val());
    $(".acta_dniChofer").text($("#doc_chofer").val());
    $(".acta_patenteTractor").text($("#patenteTractor").val());
    // $(".acta_numSenasa").text($("#num_senasa").val());
    $(".acta_cantFajas").text($("#cant_fajas").val());
    $(".acta_observaciones").text($("#observacionesReprecintado").val());
    $(".acta_origenNro").text($("#esta_num").val());
    $(".acta_estaOrigen").text($("#esta_nom").val());
    $(".acta_transportista").text($('#transportista').val());
    $(".acta_bruto").text($("#bruto_reprecintado").val());
    $(".acta_tara").text($("#tara_reprecintado").val());
    $(".acta_ticket").text($("#ticket_reprecintado").val());
    // $(".acta_depto").text($("#depa_idActa").val());
    $(".acta_localidad").text($("#localidad").val());
    $(".acta_inspectores").text($("#inspectores_reprecintado").val());
    $(".acta_puntoControl").text($("#dondeConstituyen").val());
    $(".acta_puntoControlDomicilio").text($("#domicilio").val());
    $(".acta_propiedadDe").text($("#propiedad").val());
    $(".acta_quienAtendio").text($("#quienAtendio").val());
    $(".acta_caracter").text($("#caracterAtendio").val());
    $(".acta_procedenA").text($("#procedenAccion").val());
    $(".acta_telTransportista").text($("#telTransportista").val());
    $(".acta_emailTransportista").text($("#emailTransportista").val());
    $(".acta_nyaDepositario").text($("#nyaDepositario").val());
    $(".dniActa").text($("#dniActa").val());
    $(".telefonoActa").text($("#telefonoActa").val());
    $(".correoActa").text($("#correoActa").val());
    // $(".direccionLegalActa").text($("#domiLegalActa").val());
    // $(".direccionComercialActa").text($("#domiComercialActa").val());
    // $(".acta_caractOrganolepticas").text($("#caractOrganolepticasActa").val());
    // $(".acta_caractDeposito").text($("#caractDeposito").val());
    // $(".acta_tempCamaraActa").text($("#tempCamaraActa").val());
    $(".acta_diaInspeccion").text(moment($("#fechaActaInspeccion").val()).format('D'));
    $(".acta_mesInspeccion").text(moment($("#fechaActaInspeccion").val()).format('MMMM'));
    $(".acta_anioInspeccion").text(moment($("#fechaActaInspeccion").val()).format('Y'));
    $(".acta_horaInspeccion").text($("#horaActaInspeccion").val());

    /**
     * @author Pablo kenny
     * Comprobar si existe formulario de Instancia Reprecintado
     * @description Este fragmento de código verifica si la variable instReprecintado tiene una longitud mayor a 0.
     * Si es así, crea un nuevo objeto Date para obtener la hora actual, extrae la hora y los minutos de él, y los guarda en la variable time.
     * Luego, actualiza el texto de elementos en la página con los valores de las variables observacionesReprecintado, nroPrecintosCierre y time.
     */
    const instReprecintado = $("#formReprecintado");
    const $actaHoraInspeccion = $(".acta_horaInspeccion");
    const $actaObservaciones = $(".acta_observaciones");
    const $actaPrecintos = $(".acta_precintos");

    if (instReprecintado.length > 0) {
        const now = new Date();
        const hour = now.getHours();
        const minute = now.getMinutes();
        const time = `${hour}:${minute}`;

        $actaHoraInspeccion.text(time);

        const observaciones = $("#observacionesReprecintado").val();
        $actaObservaciones.text(observaciones);

        const nroPrecintosCierre = $("#nroPrecintosCierre").val();
        $actaPrecintos.text(nroPrecintosCierre);
    }

   
    infoTodos = "";
    infoPermisos = "";
    infoProductos = "";
    infoOrigen = "";
    infoOrigenNums = "";
    infoTemperatura = "";
    $('#sec_permisos div.permTransito').each(function(i, obj) {
        if (i < 3) {
            aux = $(obj).attr('data-json');
            json = JSON.parse(aux);

            infoTodos += "Tipo de PT " + json.tipo + " | ";
            infoTodos += "N° de Permiso " + json.perm_id + " | ";            
            infoTodos += "Producto " + json.productos + " | ";
            infoTodos += "Temperatura " + json.temperatura + " | ";
            infoTodos += "Empresa de Origen " + json.origen_nom + " | ";
            var empresasAsociadas = json.empresas;
            empresasAsociadas.forEach(function(empresa) {
                infoTodos += " Destino " +  empresa.razon_social + " | ";
                infoTodos += " Domicilio " +  empresa.calle + ", " + empresa.altura + " | " ;
            });
        }
        infoTodos += "<br>";
    });
    $(".acta_docSanitaria").html(infoTodos);
       

    //Valído
    if($('input[name=inspValida]:checked').val() == 'incorrecta'){
        tiposInfraccion = "";
        if($('#tpoInfraccion').select2('data').length > 0){
            tiposInfracciones = $('#tpoInfraccion').select2('data');
            for (let i = 0; i < tiposInfracciones.length; i++) {
                tiposInfraccion += tiposInfracciones[i].text + "; ";
            }
        }
        
        $(".acta_tposInfracciones").text(tiposInfraccion.slice(0, -1));
        idActa = '#actaInfraccion';
    }

    var base = "<?php echo base_url()?>";

    $(idActa).printThis({
        debug: false,
        importCSS: false,
        importStyle: true,
        loadCSS: "",
        base: base,
        pageTitle : "TRAZALOG TOOLS",
        afterPrint: function(){
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
        }
    });

};

//
//Script's seccion destino
//
var editandoDestino = false;// Utilizo para que no se pierdan los permisos al editar
function agregarDestino(){
    //Informamos el campo vacio 
    var reporte = validarCamposDestino();
                            
    if(reporte == ''){
        var empre_destino = $('#empre_destino').find(':selected').text();
        var depo_destino = $('#depo_destino').find(':selected').text();

        var datos = {};
        datos.rol = "DESTINO";
        datos.empr_id = $("#empre_destino").val();
        datos.depo_id = $("#depo_destino").val();
        datos.reprecintado = $("#reprecintado").val();
        datos.razon_social = empre_destino;
        datos.productos = $("#productosDestino").val();
        direccion = depo_destino.split(" - ");
        datos.calle = direccion[0];
        datos.altura = direccion[1];
        datos.depo_destino = depo_destino;

        var div = `<div class='form-group empreDestino' data-json='${JSON.stringify(datos)}'>
                        <span> 
                        <i class='fa fa-fw fa-eye text-light-blue' style='cursor: pointer;' title='Ver detalle' onclick='verDestino(this)'></i> 
                        <i class='fa fa-fw fa-edit text-light-blue' style='cursor: pointer;' title='Editar' onclick='editarDestino(this)'></i>
                        <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                        | ${empre_destino} - ${depo_destino}
                        </span>
                </div>`;
        $('#sec_destinos').append(div);
        //Limpio luego de agregar
        $('#empre_destino').val(null).trigger('change');
        $('#depo_destino').val(null).trigger('change');
        $("#productosDestino").val('');
        alertify.success("Destino agregado correctamente!");
        editandoDestino = false;
    }else{
        notificar('Cuidado',reporte,'warning');
    }
}
function validarCamposDestino(){
    var valida = '';
    //Empresa destino
    if($("#empre_destino").val() == ""){
        valida = "Seleccione Empresa Destino!";
    }
    //Deposito Destino
    if($("#depo_destino").val() == ""){
        valida = "Seleccione Deposito Destino!";
    }
    return valida;
}
//Funcion para eliminar el registro en ambas SECCIONES
$(document).off("click", ".fa-trash").on("click", ".fa-trash", function(e) {
    if (confirm('¿Desea borrar el registro?')) {
        $(e.target).closest('div').remove();		
    }
});
function editarDestino(tag){
    if(!editandoDestino){
        var data =	JSON.parse($(tag).closest('div').attr('data-json'));
        emprVal = data.cuit;
        emprNombre = data.razon_social;
        depo_direccion = data.calle + " - " + data.altura;
        depo_id = data.depo_id;

        opcion = {'id': emprVal, 'text': emprNombre};
        // opcDepo = {'id': depo_id, 'text': depo_direccion};

        emprOpc = new Option(emprNombre, emprVal, true, true);
        // emprDepo = new Option(depo_direccion, depo_id, true, true);
        
        // $('#depo_destino').append(emprDepo).trigger('change');
        // $('#depo_destino').trigger({
        //     type: 'select2:select',
        //     params: {
        //         data: opcion
        //     }
        // });
        $('#empre_destino').append(emprOpc).trigger('change');
        $('#empre_destino').trigger({
            type: 'select2:select',
            params: {
                data: opcion
            }
        });
        $("#productosDestino").val(data.productos);
        $(tag).closest('div').remove();
        editandoDestino = true;
    }else{
        notificar('Cuidado',"Ya se esta editando una empresa de <b>DESTINO</b>!",'warning');
    }
}
function verDestino(tag){
    var data =	JSON.parse($(tag).closest('div').attr('data-json'));
    
    $("#modalVerDestino").val(data.razon_social);
    $("#modalVerDepositoDestino").val(data.calle + " - " + data.altura);
    $("#modalVerProductosDestino").val(data.productos);
    $("#mdl-verDetalleDestino").modal('show');
}


//Arma tabla de empresas asociadas a un permiso cuando editas.
function armaTablaEmpresas(e){

e.forEach(function(element) {
    var datos = {};
    datos.rol = "DESTINO";
    datos.empr_id = element.empr_id;
    datos.depo_id = element.depo_id;
    datos.razon_social = element.razon_social;
    datos.productos = element.productos;
    var direccion = element.depo_destino;

    var div = `<div class='form-group empreDestino' data-json='${JSON.stringify(datos)}'>
                        <span> 
                        <i class='fa fa-fw fa-eye text-light-blue' style='cursor: pointer;' title='Ver detalle' onclick='verDestino(this)'></i> 
                        <i class='fa fa-fw fa-edit text-light-blue' style='cursor: pointer;' title='Editar' onclick='editarDestino(this)'></i>
                        <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                        | ${element.razon_social} - ${element.depo_destino}
                        </span>
                </div>`;
    $('#sec_destinos').append(div);
  });
}

//obtiene datos de la tabla empresa destino para agregar a un permiso
function obtieneEmpresasDestinos(){
                //
                //VALIDACION tabla EMPRESAS DESTINO
                //
                if ( !$('#sec_destinos').children().length > 0 ) {
                    wc();
                    Swal.fire(
                        'Error..',
                        'No se agregaron empresas de destino (*)',
                        'error'
                    );
                    return;
                }else {
                    //obtengo destinos desde la tabla
                        empresas = [];
                        $('#sec_destinos div.empreDestino').each(function(i, obj) {
                            var aux = $(obj).attr('data-json');
                            aux = aux.replace("cuit", "empr_id");
                            var json = JSON.parse(aux);
                            json.case_id = case_id;
                            empresas[i] = json;
                        });
                }
                $('#sec_destinos').children().remove();
                return empresas;
}
//
//FIN Script's seccion destino
/****************************************************** */
/****************************************************** */
//
//Scripts Permisos transito
//
var editando = false;// Utilizo para que no se pierdan los permisos al editar
async function agregarPermiso(){

    //Informamos el campo vacio 
    var reporte = validarCamposPermiso();
    
    if(reporte == ''){

    //valida si existe el permiso
        validarPermiso($("#permi_num").val()).then((result) => {
                var soli_num = $("#soli_num").val();
                var permi_num = $("#permi_num").val();
                // var descDepo = $("#depo_origen_id option:selected").text();
                var emision = $('#emision').val();
                var salida = $('#salida').val();
                var fecha = $("#fecha").val();
                var tipo = $('input[name=doc_sanitaria]:checked').val();
                var origen = $("#esta_nom").select2('data')[0].id;
                var origen_nom = $("#esta_nom").select2('data')[0].text;
                var origen_num = $("#esta_num").val();
                var tipr_id = $("#tipr_id").select2('data')[0].id;
                var productos = $("#tipr_id").select2('data')[0].text;
                // var productos = $("#producto").val();
                //var kilos = $("#kilos").val(); 
                var netoPermiso = $("#netoPermiso").val(); 
                var brutoPermiso = $("#brutoPermiso").val(); 
                var temperatura = $("#temperatura").val(); 
                var estado = $("#estado_pr_id").select2('data')[0].text; 
                var estado_pr_id = $("#estado_pr_id").select2('data')[0].id;

                //datos de empresas destino
                empresas = obtieneEmpresasDestinos();

                var datos = {};
                datos.perm_id = permi_num;
                datos.soli_num = soli_num;
                datos.lugar_emision = emision;
                datos.fecha_hora_salida = fecha +" "+salida;
                datos.tipo = tipo;
                datos.origen = origen;
                datos.origen_nom = origen_nom;
                datos.origen_num = origen_num;
                datos.productos = productos;
                datos.tipr_id = tipr_id;
                //datos.kilos = kilos;
                datos.neto = netoPermiso;
                datos.bruto = brutoPermiso;
                datos.temperatura = temperatura;
                datos.estado = estado;
                datos.estado_pr_id = estado_pr_id ;
                datos.empresas =  empresas;

                var div = `<div class='form-group permTransito' data-json='${JSON.stringify(datos)}'>
                                <span> 
                                <i class='fa fa-fw fa-eye text-light-blue' style='cursor: pointer;' title='Ver detalle' onclick='verPermiso(this)'></i> 
                                <i class='fa fa-fw fa-edit text-light-blue' style='cursor: pointer;' title='Editar' onclick='editarPermiso(this)'></i>
                                <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                                | <span class='numPermiso'>${soli_num}</span> - ${permi_num}
                                </span>
                        </div>`;
                $('#sec_permisos').append(div);
                //Limpio luego de agregar
                // $("#soli_num").val('');
                // $("#emision").val('');
                // $("#salida").val('');
                // $("#fecha").val('');
                // $('input[name=doc_sanitaria]:checked').prop('checked',false);

                editando = false;
                alertify.success("Permiso de tránsito agregado correctamente!");

        }).catch((err) => {
           notificar('Error!',  'Permiso Existente','warning');
        });
}else{
            notificar('Cuidado',reporte,'warning');
        }
   
}

//evalua si el permiso ya existe en la base
async function validarPermiso(num_permiso){

    let validacionPermiso = new Promise((resolve,reject) => {
        $.ajax({
            type: "POST",
            data: {num_permiso},
            cache: false,
            dataType: "json",
            url:"<?php echo SICP; ?>inspeccion/validacionPermiso",
            success: function (rsp) {
                //si trae perm_id existe el permiso
                if(_isset(rsp.perm_id)){
                    reject(rsp);
                }else{
                    resolve(rsp);
                } 
            },
            error: function (rsp) {
                Swal.fire('Oops...','No se guardo formulario dinámico','error');
                reject("Ocurrió un error al gurdar el formulario dinámico");
            }
        });
    });
    return await validacionPermiso; 
}

function validarCamposPermiso(){
    var valida = '';
    //Numero de solicitud
    if($("#soli_num").val() == ""){
        valida = "Complete Numero de solicitud!";
    }
    //Valido que el numero de permiso no se ingreso previamente
    $(".numPermiso").each(function (i, val) { 
        if($(val).text() == $("#soli_num").val()){
            valida = "N° de Permiso ya fue ingresado!";
        }
    });
    //Lugar de emision
    if($("#emision").val() == ""){
        valida = "Complete Lugar de emision!";
    }
    //Hora de salida
    if($("#salida").val() == ""){
        valida = "Seleccione una Hora de salida!";
        return valida;
    }
    //Fecha
    if($("#fecha").val() == ""){
        valida = "Seleccione una Fecha!";
        return valida;
    }
    //Documentacion sanitaria
    if($("input[name='doc_sanitaria']:checked").val() == null){
        valida = "Seleccione un tipo de Doc. sanitaria!";
        return valida;
    }
    //Peso Neto
    if($("#netoPermiso").val() == ""){
        valida = "Seleccione un Peso Neto!";
        return valida;
    }
    //Select de Producto
    var prod = $("#tipr_id option:selected");
    if (prod.val() == "") {
        valida = "Seleccione un Producto!";
        return valida;
    }
    //Peso Bruto
    if($("#brutoPermiso").val() == ""){
        valida = "Seleccione un Peso Bruto!";
        return valida;
    }
    bruto = $("#brutoPermiso").val();
    neto = $("#netoPermiso").val();

    tara = bruto - neto;
    if(tara < 0){
        valida = "El peso bruto es menor al peso neto"; 
        return valida;
    }
    //Temperatura
    if($("#temperatura").val() == ""){
        valida = "Seleccione una Temperatura!";
    }
    //Fecha de salida
    if(!Inputmask.isValid($("#fecha").val(), { alias: "datetime", inputFormat: "dd-mm-yyyy"})){
        valida = "El formato de la fecha del permiso es incorrecto!";
    }
    return valida;
}

function editarPermiso(tag){
    if(!editando){
        var data =	JSON.parse($(tag).closest('div').attr('data-json'));

        armaTablaEmpresas(data.empresas);
        $("#soli_num").val(data.soli_num);
        $("#permi_num").val(data.perm_id);
        $("#emision").val(data.lugar_emision);
        aux = data.fecha_hora_salida.split(" ");
        $("#salida").val(aux[1]);
        $("#fecha").val(aux[0]);
        $("input[name=doc_sanitaria][value='"+data.tipo+"']").prop("checked",true);
        $("#producto").val(data.productos);
        $("#netoPermiso").val(data.neto);
        $("#brutoPermiso").val(data.bruto);
        $("#temperatura").val(data.temperatura);
        $("#estado_pr_id").val(data.estado_pr_id);
        emprVal = data.origen;
        emprNombre = data.origen_nom;
        emprNum = data.origen_num;

        opcion = {'id': emprVal, 'text': emprNombre, 'num_esta': emprNum};

        emprOpc = new Option(emprNombre, emprVal, true, true);

        $('#esta_nom').append(emprOpc).trigger('change');
        $('#esta_nom').trigger({
            type: 'select2:select',
            params: {
                data: opcion
            }
        });
        $(tag).closest('div').remove();
        editando = true;
    }else{
        notificar('Cuidado',"Ya se esta editando un <b>PERMISO DE TRÁNSITO</b>!",'warning');
    }
}

function verPermiso(tag){
    var data =	JSON.parse($(tag).closest('div').attr('data-json'));
    $("#modalVerPermiso").val(data.perm_id);
    $("#modalVerSolicitud").val(data.soli_num);
    $("#modalVerEmision").val(data.lugar_emision);
    $("#modalVerDocSanitaria").val(data.tipo);
    $("#modalVerHoraSalida").val(data.fecha_hora_salida);
    $("#modalVerOrigen").val(data.origen_nom);
    $("#modalVerOrigenCuit").val(data.origen);
    $("#modalVerOrigenNumero").val(data.origen_num);
    $("#modalVerProductos").val(data.productos);
    $("#modalVerEstadoProductos").val(data.estado);
    $("#modalVerNeto").val(data.neto);
    $("#modalVerBruto").val(data.bruto);
    $("#modalVerTemperatura").val(data.temperatura);
    $("#mdl-verDetallePermiso").modal('show');
}
//FIN Script's seccion permisos transito
/***************************************************** */

$('#esta_nom').on('select2:select', function (e) {
    var data = e.params.data;
    $("#esta_num").val(data.num_esta);
});

//Cargo listado de depositos para empresa destino seleccionada
$("#empre_destino").on('change', function(){
    //asigno la empresa al modal para altas rapidas
    $("#empr_id_destino").val($("#empre_destino").val());
    //Habilito el combo box
    $("#depo_destino").prop("disabled", false);
    //limpio opciones del combo
    $('#depo_destino').html('').select2({data: {id:null, text: null}});
    //Cargo los depositos coincidientes con la empresa destino seleccionada
    destino = {};
    destino.empr_id = $("#empre_destino").val();
    $.ajax({
        type: 'POST',
        data: {destino},
        url: "<?php echo SICP; ?>inspeccion/getDepositos",
        success: function(data) {
            if(data != 'null'){
                datos = JSON.parse(data);
                
                $.each(datos, function(i, obj) {
                    depo_id = obj.depo_id;
                    direccion = obj.calle + " - " + obj.altura;

                    newOpc = new Option(direccion, depo_id, false, false);
                    $('#depo_destino').append(newOpc);
                });
                $('#depo_destino').trigger('change');

            }else{
                console.log("Sin depositos relacionados a esta empresa destino");
            }
        },
        error: function(data) {
            alert("Error al obtener depositos");
        }
    });
});
</script>
