<?php $this->load->view(SICP."inspeccion/modales.php"); ?>
<style>
.input-group-addon:hover{
    cursor: pointer;
    background-color: #04d61d !important;
}
.input-group-addon{
    background-color: #05b513 !important;
    color: white;
}
.form-check-inline{
    display: inline;
    margin: 10px;
}
.permTransito{
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
.btnZoom {
  height: 40px;
}
#sec_permisos, #sec_destinos, #sec_termicos{
    background-color: #88888833;
}
.titDataDinamica{
    font-weight: 700;
}
/* Style the images inside the grid */ 
.col img {
  opacity: 0.8;
  cursor: pointer;
}

.col img:hover {
  opacity: 1;
}

 /* Clear floats after the columns */ 
.row:after {
  content: "";
  display: table;
  clear: both;
}

 /* The expanding image container (positioning is needed to position the close button and the text) */ 
.contenedor {
  display: inline-flex;
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
</style>
<div class="nav-tabs-custom ">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#formReprecintado_tab" data-toggle="tab" aria-expanded="false">Formulario</a></li>
        <li style="display:none !important;" class="privado"><a href="#actaInfraccion_tab" data-toggle="tab" aria-expanded="false">Acta de Infracción</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="formReprecintado_tab">
            <!--_______ FORMULARIO PERMISO DE TRANSITO BOX 1______-->
            <form class="formAlertaPCC" id="formAlertaPCC">
                <div class="row">
                    <input type="hidden" name="contador" id="contador" >
                    <div class="col-md-5 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12 box-tittle">
                            <h3>Fotos de Barrera</h3>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="fotos">
                            <?php foreach ($imgsBarrera as $key => $value) {
                                echo "<img class='thumbnail fotos barrera' height='51' width='45' src='$value' alt='' onclick='preview(this)'>";
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $this->load->view(SICP.'inspeccion/mosaicoDocumentacion.php') ?>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-12 centrar">
                        <div class="contenedor">
                            <!-- Expanded image -->
                            <img src="lib\imageForms\preview.png" id="expandedImg" style="">
                            <!-- Zoom Modal Button -->
                            <button type="button" class="btn btn-outline-dark btnZoom" data-toggle="modal" data-target="#mdl-zoomPreview" title="Zoom"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="caja" id="boxPermisoTransito">
                            <div class="box-tittle centrar">
                                <h3>Permiso de tránsito</h3>
                            </div>
                            <input type="text" class="form-control hidden" name="petr_id" id="petr_id" value="<?php echo $petr_id?>">
                            <!--Solicitud-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="Solicitud">N° de Permiso(<strong style="color: #dd4b39">*</strong>):</label>
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
                                        <input type="radio" class='form-check-input' name="doc_sanitaria" value="PT" />
                                        <label class="form-check-label" for="">PT</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class='form-check-input' name="doc_sanitaria" value="PTR" />
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
                            <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="producto">Producto/s(<strong style="color: #dd4b39">*</strong>):</label>
                                    <textarea class="form-control" name="productos" id="producto" placeholder="Ingrese producto/s"></textarea>
                                </div>                    
                            </div> -->
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
                            <!-- div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="kilos">Kilos(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control onlyNumbers" name="kilos" id="kilos" placeholder="Ingrese kilos"/>
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
                                    <input class="form-control onlyNumbers" name="bruto" id="brutoPermiso"/>
                                </div>                    
                            </div>
                            <!--________________-->

                            <!--Temperatura-->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="temperatura">Temperatura(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input type="number" class="form-control" id="temperatura"/>
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
                                    
                                </div>
                            <hr>
                            </div>

                            <!--_________________ Agregar_________________-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group text-right">
                                    <button type="button" class="btn btn-primary" onclick="agregarPermiso()" >Agregar</button>
                                </div>
                            </div>                     
                            <!--__________________________________-->
                            <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                                 <h4 class="titDataDinamica">Permisos:</h4>
                                <div id="sec_permisos">
                                    <?php 
                                    if(!empty($preCargaInspecciones)){
                                        foreach ($preCargaInspecciones as $key) {
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
                                    ?>
                                </div>
                                <hr>
                            </div>
                        </div><!-- FIN box-primary -->
                    </div>
                    <!--_______ FIN FORMULARIO PERMISO DE TRANSITO BOX 1 ______-->

                    <!--_______ FORMULARIO INSPECCION BOX 2______-->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="caja" id="boxInspeccion">
                            <!--DNI Chofer-->
                            <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                                <label for="doc_chofer">DNI Chofer(<strong style="color: #dd4b39">*</strong>):</label>
                                <div class="input-group">
                                    <select class="form-control select2 select2-hidden-accesible choferes" name="chof_id" id="doc_chofer" required>
                                        <option value="" disabled selected>-Seleccionar-</option>	
                                    </select>
                                    <span id="add_chofer" class="input-group-addon" data-toggle="modal" data-target="#mdl-chofer"><i class="fa fa-plus"></i></span>
                                </div>
                            </div>
                            <!--________________-->

                            <!-- Nombre CHOFER -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="nom_chofer">Nombre del Chofer(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input type="text" class="form-control" name="nom_chofer" id="nom_chofer" placeholder="" readonly/>
                                </div>
                            </div>
                            <!--________________-->

                            <!--Patente Tractor-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group has-feedback">
                                <label for="patenteTractor">Patente de Tractor(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control limited" name="patente_tractor" id="patenteTractor" placeholder="Ingrese patente tractor" required/>
                                </div>
                            </div>
                            <!--________________-->
                            
                            <!--Transportista-->
                            <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                                <div class="form-group">
                                    <label for="transportista">Transportista(<strong style="color: #dd4b39">*</strong>):</label>
                                    <div class="input-group">
                                        <select class="form-control select2 select2-hidden-accesible empresa" id="transportista" required>
                                            <option value="" disabled selected></option>
                                        </select>
                                        <span id="add_transportista" class="input-group-addon" data-toggle="modal" data-target="#mdl-empresa" onclick="$('#tipoEmpresa').val('Transportista')"><i class="fa fa-plus"></i></span>
                                    </div>
                                </div>                    
                            </div>
                            <!--________________-->
                            
                            <!--Teléfono Transportista-->
                            <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                                <div class="form-group">
                                    <label for="telTransportista">Teléfono Transportista:</label>
                                    <input class="form-control limited" name="telTransportista" id="telTransportista" placeholder="Ingrese teléfono" value="<?php echo isset($preCargaDatos->tel_transportista) ? $preCargaDatos->tel_transportista : '' ?>" required/>
                                </div>                    
                            </div>
                            <!--________________-->

                            <!--E-mail Transportista-->
                            <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                                <div class="form-group">
                                    <label for="emailTransportista">E-mail Transportista(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input type="text" class="form-control" name="emailTransportista" id="emailTransportista" placeholder="Ingrese correo" value="<?php echo isset($preCargaDatos->email_transportista) ? $preCargaDatos->email_transportista : '' ?>" required/>
                                </div>                    
                            </div>
                            <!--________________-->


                            <!--Termico Patente-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="term_patente">Patente Térmico(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control limited" id="term_patente" placeholder="Ingrese térmico patente" value="<?php echo isset($preCargaDatos->patente_tractor) ? $preCargaDatos->patente_tractor : $patente ?>"/>
                                </div>                    
                            </div>
                            <!--________________-->

                            <!--N° SENASA-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                <label for="num_senasa">N° hab. SENASA(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control limitedChars" name="nro_senasa" id="num_senasa" placeholder="Ingrese N° SENASA" value="<?php echo isset($preCargaDatos->nro_senasa) ? $preCargaDatos->nro_senasa : null ?>" required/>
                                </div>
                            </div>
                            <!--________________-->

                            <!--Precintos-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="precintos">N° de Precintos(<strong style="color: #dd4b39">*</strong>):</label>
                                    <input class="form-control limited" id="precintos" placeholder="Ingrese precintos" />
                                </div>                    
                            </div>
                            <!--________________-->
                            <!--_________________ Agregar_________________-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group text-right">
                                    <button type="button" class="btn btn-primary" onclick="agregarTermico()" >Agregar</button>
                                </div>
                            </div>                
                            <!--__________________________________-->
                            <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                                 <h4 class="titDataDinamica">Térmico:</h4>
                                <div id="sec_termicos">
                                    <?php 
                                    if(!empty($preCargaDatos->termicos->termico)){
                                        foreach ($preCargaDatos->termicos->termico as $key) {
                                    ?>
                                        <div class='form-group termicos' data-json='<?php echo json_encode($key) ?>'>
                                            <span>
                                                <i class='fa fa-fw fa-eye text-light-blue' style='cursor: pointer;' title='Ver detalle' onclick='verTermico(this)'></i> 
                                                <i class='fa fa-fw fa-edit text-light-blue' style='cursor: pointer;' title='Editar' onclick='editarTermico(this)'></i> 
                                                <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                                                <?php echo "| $key->patente - $key->precintos" ?>
                                            </span>
                                        </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <hr>
                            </div>
                            <!--________________-->
                            
                        </div> <!--FIN box-primary-->
                    </div><!--FIN col-->
                <!--_______ FIN FORMULARIO INSPECCION BOX 2______-->
                </div><!-- FIN row-->
                <div class="row">
                    <?php if(userNick() != 'inspector_calle_ddpe'){ ?>
                    <!--Bruto-->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="bruto">Bruto:</label>
                            <input class="form-control neto onlyNumbers" name="bruto" id="bruto" placeholder="Bruto" />
                        </div>                    
                    </div>
                    <!--________________-->
                    <!--Tara-->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="tara">Tara:</label>
                            <input class="form-control neto onlyNumbers" name="tara" id="tara" placeholder="Tara" />
                        </div>                    
                    </div>
                    <!--________________-->
                    <!--Neto-->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="neto">Neto:</label>
                            <input class="form-control" id="neto" placeholder="Neto" readonly/>
                        </div>                    
                    </div>
                    <!--________________-->
                    <!--Ticket-->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="ticket">Ticket:</label>
                            <input class="form-control" name="ticket" id="ticket" placeholder="Ingrese ticket" />
                        </div>                    
                    </div>
                    <!--________________-->
                    <?php } ?>
                    <!--Departamento-->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label>Departamento(<strong style="color: #dd4b39">*</strong>):</label>
                            <div class="input-group" style="width: 100%;">
                                <select class="form-control select2 select2-hidden-accesible" name="depa_idActa" id="depa_idActa" required style="width: 100%;">
                                    <option value="" disabled selected>-Seleccionar-</option>	
                                    <?php
                                    if(!empty($departamentos)){ 
                                        foreach ($departamentos as $depa) {
                                            echo "<option data-json='".json_encode($depa)."' value='".$depa->tabl_id."'>".$depa->valor."</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--________________-->
                    <!--Localidad-->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="localidad">Localidad(<strong style="color: #dd4b39">*</strong>):</label>
                            <input class="form-control" name="localidad" id="localidad" placeholder="Ingrese Localidad" required/>
                        </div>                    
                    </div>
                    <!--________________-->
                    
                    <!--Inspectores-->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="inspectores">Inspectores(<strong style="color: #dd4b39">*</strong>):</label>
                            <input class="form-control" name="inspectores" id="inspectores" placeholder="Ingrese Inspectores" required/>
                        </div>                    
                    </div>
                    <!--________________-->

                    <!--Se constituyen en-->
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="dondeConstituyen">Se constituyen en(<strong style="color: #dd4b39">*</strong>):</label>
                            <input class="form-control" name="dondeConstituyen" id="dondeConstituyen" value="Punto de control de productos cárnicos y derivados de la Pcia. de San Juan" readonly/>
                        </div>                    
                    </div>
                    <!--________________-->

                    <!--Con domicilio en-->
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="domicilio">Con domicilio en(<strong style="color: #dd4b39">*</strong>):</label>
                            <input class="form-control" name="domicilio" id="domicilio" placeholder="Ingrese Domicilio" value="Calle 11 y Punta del Monte" required/>
                        </div>                    
                    </div>
                    <!--________________-->
                    
                    <!--Propiedad de-->
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label for="propiedad">Propiedad de(<strong style="color: #dd4b39">*</strong>):</label>
                            <input class="form-control" name="propiedad" id="propiedad" placeholder="Ingrese a quién pertenece" value="DDP" required/>
                        </div>                    
                    </div>
                    <!--________________-->
                    
                    <!--Siendo atendido por-->
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label for="quienAtendio">Siendo atendido por(<strong style="color: #dd4b39">*</strong>):</label>
                            <input class="form-control" name="quienAtendio" id="quienAtendio" placeholder="Ingrese por quién fue atendido" required/>
                        </div>                    
                    </div>
                    <!--________________-->
                    
                    <!--En su caracter de-->
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label for="caracterAtendio">En su carácter de(<strong style="color: #dd4b39">*</strong>):</label>
                            <input class="form-control" name="caracterAtendio" id="caracterAtendio" placeholder="Ingrese el caracter del que atendió" value="Chofer" required/>
                        </div>                    
                    </div>
                    <!--________________-->

                    <!--Proceden a-->
                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <div class="form-group">
                            <label for="procedenAccion">Proceden a:</label>
                            <textarea class="form-control" name="procedenAccion" id="procedenAccion" placeholder=""></textarea>
                        </div>                    
                    </div>
                    <!--________________-->
                    
                    <!--Observaciones-->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="observacionesInfraccion">Observaciones:</label>
                            <textarea class="form-control" name="observacionesInfraccion" id="observacionesInfraccion" placeholder="Observaciones"><?php echo isset($preCargaDatos->observaciones) ? $preCargaDatos->observaciones : null; ?></textarea>
                        </div>                    
                    </div>
                    <!--________________-->
                    <div class="col-md-6 col-sm-6 col-xs-12 ocultar">
                        <div class="form-group">
                            <label for="tpoInfraccion">Tipos Infracción</label>
                            <select class="form-control select2 select2-hidden-accesible" name="tpoInfraccion[]" id="tpoInfraccion" style="width: 100%;" multiple>
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
                    <!--Fecha Acta-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="fechaActa">Fecha(<strong style="color: #dd4b39">*</strong>):</label>
                            <input type="date" class="form-control" name="fechaActa" id="fechaActa" required/>
                        </div>
                    </div>
                    <!--________________-->
                    <!--Hora Acta-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="horaActa">Hora(<strong style="color: #dd4b39">*</strong>):</label>
                            <input type="time" class="form-control" name="horaActa" id="horaActa" required/>
                        </div>
                    </div>
                    <!--________________-->
                    <!--DNI Acta-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="dniActa">DNI:</label>
                            <input type="number" class="form-control" name="dniActa" id="dniActa" placeholder="Ingrese DNI"/>
                        </div>
                    </div>
                    <!--________________-->
                    <!--Nombre y Apellido Depositario Acta-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="direccionActa">Nombre y Apellido Depositario:</label>
                            <input type="text" class="form-control" name="nyaDepositario" id="nyaDepositario" placeholder="Ingrese Depositario" />
                        </div>
                    </div>
                    <!--________________-->
                    <!--Domicilio Legal Acta-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="domiLegalActa">Domicilio Legal:</label>
                            <input type="text" class="form-control" name="domiLegalActa" id="domiLegalActa" placeholder="Ingrese Domicilio Legal" />
                        </div>
                    </div>
                    <!--________________-->
                    <!--Domicilio Comercial Acta-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="domiComercialActa">Domicilio comercial:</label>
                            <input type="text" class="form-control" name="domiComercialActa" id="domiComercialActa" placeholder="Ingrese Domicilio Comercial"/>
                        </div>
                    </div>
                    <!--________________-->
                    <!--Teléfono-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="telefonoActa">Teléfono:</label>
                            <input type="number" class="form-control" name="telefonoActa" id="telefonoActa" placeholder="Ingrese Teléfono" />
                        </div>
                    </div>
                    <!--________________-->
                    <!--Correo Electrónico-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="correoActa">Correo Electrónico:</label>
                            <input type="text" class="form-control" name="correoActa" id="correoActa" placeholder="Ingrese Correo Electrónico" />
                        </div>
                    </div>
                    <!--________________-->
                    <!--Detalle de la infracción-->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="detalleInfraccionActa">Detalle de la infracción:</label>
                            <textarea class="form-control" name="detalleInfraccionActa" id="detalleInfraccionActa"></textarea>
                        </div>                    
                    </div>
                    <!--________________-->
                    <!--Características Organolepticas-->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="caractOrganolepticasActa">Características Organólepticas:</label>
                            <textarea class="form-control" name="caractOrganolepticasActa" id="caractOrganolepticasActa"></textarea>
                        </div>                    
                    </div>
                    <!--________________-->
                    <!--Caracteristicas del Depósito-->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="caractDeposito">Características del Depósito:</label>
                            <textarea class="form-control" name="caractDeposito" id="caractDeposito" placeholder="Ingrese Caracteristicas del Depósito"></textarea>
                        </div>
                    </div>
                    <!--________________-->
                    <!--Tipo de Cámara-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="tipoCamaraActa">Tipo de Cámara:</label>
                            <input type="text" class="form-control" name="tipoCamaraActa" id="tipoCamaraActa" placeholder="Ingrese Tipo de Cámara" />
                        </div>
                    </div>
                    <!--________________-->
                    <!--T° Actual Cámara-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="tempCamaraActa">T° Actual Cámara:</label>
                            <input type="number" class="form-control" name="tempCamaraActa" id="tempCamaraActa" placeholder="Ingrese T° Actual Cámara" />
                        </div>
                    </div>
                    <!--________________-->
                    <!--Cant de Fajas-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="cant_fajas">Cant de Fajas:</label>
                            <input type="text" class="form-control" name="cant_fajas" id="cant_fajas" placeholder="Ingrese Cant de Fajas" />
                        </div>
                    </div>
                    <!--________________-->
                </div>
            </form>
        </div><!-- FIN .tab-pane -->
        <div class="tab-pane" id="actaInfraccion_tab">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php $this->load->view(SICP."actas/acta_infraccion_inspeccion.php"); ?>
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
    $('#doc_chofer').select2({
        ajax: {
            url: "<?php echo SICP; ?>inspeccion/buscaChoferes",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    patron: params.term, // parámetro búsqueda que recibe el controlador
                    page: params.page
                };
            },
            processResults: function (data, params) {
                
                params.page = params.page || 1;
                
                var results = [];
                $.each(data, function(i, obj) {
                    results.push({
                        id: obj.dni,
                        text: obj.nombre,
                        fec_alta: obj.fec_alta
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
        language: "es",
        placeholder: 'Buscar chofer',
        minimumInputLength: 3,
        maximumInputLength: 8,
        dropdownCssClass: "choferes",
        templateResult: function (chofer) {

            if (chofer.loading) {
                return "Buscando choferes...";
            }

            var $container = $(
                "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__meta'>" +
                    "<div class='select2-result-repository__title'></div>" +
                    "<div class='select2-result-repository__description'></div>" +
                "</div>" +
                "</div>"
            );

            $container.find(".select2-result-repository__title").text(chofer.id);
            $container.find(".select2-result-repository__description").text(chofer.text);

            return $container;
        },
        templateSelection: function (chofer) {
            return chofer.id || chofer.text;
        },
        language: {
            noResults: function() {
                return '<option>No hay coincidencias</option>';
            },
            inputTooShort: function () {
                return 'Ingrese 3 o mas dígitos para comenzar la búsqueda'; 
            },
            inputTooLong: function () {
                return 'Hasta 8 dígitos permitidos'; 
            }
        },
        escapeMarkup: function(markup) {
            return markup;
        },
    });
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

    //Script para inicio de formulario 11
    //Escaneo documentacion
    detectarForm();
    initForm();

    //Selecciono opciones guardadas en los combo's
    //DNI CHOFER
    dni_chofer = "<?php echo isset($preCargaDatos->chof_id) ? $preCargaDatos->chof_id : null ?>";
    chofer = "<?php echo isset($preCargaDatos->chofer) ? $preCargaDatos->chofer : null ?>";

    dniOpc = new Option(chofer, dni_chofer, true, true);
    opcion = {'id': dni_chofer, 'text': chofer};
    if(_isset(dni_chofer)){
        $('#doc_chofer').append(dniOpc).trigger('change');
        $('#doc_chofer').trigger({
            type: 'select2:select',
            params: {
                data: opcion
            }
        });
    }
    //EMPRESA ORIGEN
    // empr_origen = "<?php echo isset($origen) ? $origen->cuit : null ?>";
    // empr_origen_nombre = "<?php echo isset($origen) ? $origen->razon_social : null ?>";
    // empr_origen_num = "<?php echo isset($origen) ? $origen->num_establecimiento : null ?>";
    
    // opcion = {'id': empr_origen, 'text': empr_origen_nombre, 'num_esta': empr_origen_num};

    // emprOpc = new Option(empr_origen_nombre, empr_origen, true, true);

    // $('#esta_nom').append(emprOpc).trigger('change');
    // $('#esta_nom').trigger({
    //     type: 'select2:select',
    //     params: {
    //         data: opcion
    //     }
    // });

    //EMPRESA TRANSPORTISTA
    empr_trasnp = "<?php echo isset($transportista) ? $transportista->cuit : null ?>";
    empr_trasnp_nombre = "<?php echo isset($transportista) ? $transportista->razon_social : null ?>";

    transpOpc = new Option(empr_trasnp_nombre, empr_trasnp, true, true);
    if(_isset(empr_trasnp)) $('#transportista').append(transpOpc).trigger('change');
    
    //DEPARTAMENTO
    depa_id = "<?php echo isset($preCargaDatos->depa_id) ? $preCargaDatos->depa_id : null ?>";
    if(_isset(depa_id)) $("#depa_idActa").val(depa_id).trigger('change');

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
    //Fechas
    $('.formatoFecha').inputmask({
        alias: "datetime",
        inputFormat: "dd-mm-yyyy"
    });

    //Renombro el BOTON de guardar
    $('#btnHecho').text('Imprimir acta de infracción');

});//FIN document.ready
/******************************************************************************* */
//
//VALIDACIONES CARACTERES PERMITIDOS
//
//Limito cantidad de caracteres DNI chofer
$('#doc_chofer').select2().on('select2:open', function() {
    $('.select2-search__field').attr('maxlength', 8);
});
//Filtro para solo numero en combo box DNI Chofer
//KeyCode: 8 = Borrar, 0 = Nada, 9 = Tab, 48-57 = N° izq, 96-105 = N° der, 37-40 = flechas
$(document).on("keydown", ".choferes", function(e) {
    if (e.which != 8 && e.which != 0 && e.which != 9 && e.which != 13 && (e.which < 48 || e.which > 57) && (e.which < 96 || e.which > 105) && (e.which < 37 || e.which > 40)) {
        e.preventDefault();
        alert("Ingrese dígitos únicamente");
    }
});
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
        datos.razon_social = empre_destino;
        datos.productos = $("#productosDestino").val();
        direccion = depo_destino.split(" - ");
        datos.calle = direccion[0];
        datos.altura = direccion[1];

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
$(document).on("click",".fa-trash",function(e) {
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
function agregarPermiso(){
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
                debugger;
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
        valida = "Complete Número de solicitud!";
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
    }
    //Fecha
    if($("#fecha").val() == ""){
        valida = "Seleccione una Fecha!";
    }
    //Documentacion sanitaria
    if($("input[name='doc_sanitaria']:checked").val() == null){
        valida = "Seleccione un tipo de Doc. sanitaria!";
    }
    //Producto
    if($("#producto").val() == ""){
        valida = "Seleccione una Producto!";
    }
    //Peso Neto
    if($("#netoPermiso").val() == ""){
        valida = "Seleccione una Peso Neto!";
    }
    //Peso Bruto
    if($("#brutoPermiso").val() == ""){
        valida = "Seleccione una Peso Bruto!";
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
        $("#kilos").val(data.kilos);
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
    $("#modalVerProductos").val(data.tipr_id);
    $("#modalVerEstadoProductos").val(data.estado);
    $("#modalVerNeto").val(data.neto);
    $("#modalVerBruto").val(data.bruto);
    $("#modalVerTemperatura").val(data.temperatura);
    $("#mdl-verDetallePermiso").modal('show');
}
//FIN Script's seccion permisos transito
/***************************************************** */
/***************************************************** */
//
//Scripts Termico
//
var editandoTermico = false;
function agregarTermico(){
    //Informamos el campo vacio 
    var reporte = validarCamposTermico();
                            
    if(reporte == ''){
        var nro_senasa = $('#num_senasa').val();
        var precintos = $('#precintos').val();
        var term_patente = $("#term_patente").val();
        // var descDepo = $("#depo_origen_id option:selected").text();

        var datos = {};
        datos.nro_senasa = nro_senasa;
        datos.precintos = precintos;
        datos.term_id = term_patente;

        var div = `<div class='form-group termicos' data-json='${JSON.stringify(datos)}'>
                        <span> 
                        <i class='fa fa-fw fa-eye text-light-blue' style='cursor: pointer;' title='Ver detalle' onclick='verTermico(this)'></i> 
                        <i class='fa fa-fw fa-edit text-light-blue' style='cursor: pointer;' title='Editar' onclick='editarTermico(this)'></i>
                        <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i> 
                        | ${term_patente} - ${precintos}
                        </span>
                </div>`;
        $('#sec_termicos').append(div);
        //Limpio luego de agregar
        $("#term_patente").val('');
        $("#num_senasa").val('');
        $("#precintos").val('');
        alertify.success("Térmico agregado correctamente!");
        editandoTermico = false;
    }else{
        notificar('Cuidado',reporte,'warning');
    }
}
function validarCamposTermico(){
    var valida = '';
    //Térmico Patente
    if($("#term_patente").val() == ""){
        valida = "Complete Térmico Patente!";
    }
    //Número SENASA
    if($("#num_senasa").val() == ""){
        valida = "Complete N° de Habilitación SENASA!";
    }
    //Precintos
    if($("#precintos").val() == ""){
        valida = "Complete Precintos!";
    }
    return valida;
}
function editarTermico(tag){
    if(!editandoTermico){
        var data =	$(tag).closest('div').attr('data-json');
        aux = data.replace("patente", "term_id");
        var json = JSON.parse(aux);

        $("#term_patente").val(json.term_id);
        $("#num_senasa").val(json.nro_senasa);
        $("#precintos").val(json.precintos);
        $(tag).closest('div').remove();
        editandoTermico = true;
    }else{
        notificar('Cuidado',"Ya se esta editando un <b>TÉRMICO</b>!",'warning');
    }
}
function verTermico(tag){
    var data =	$(tag).closest('div').attr('data-json');
    aux = data.replace("patente", "term_id");
    var json = JSON.parse(aux);

    $("#modalVerPatenteTermico").val(json.term_id);
    $("#modalVerSENASATermico").val(json.nro_senasa);
    $("#modalVerNroPrecintos").val(json.precintos);
    $("#mdl-verDetalleTermico").modal('show');
}
//FIN Script's seccion termico
/***************************************************** */
/***************************************************** */
//
//Scripts SELECTS que actualizan combos o inputs
//
//Actualizo nombre del chofer
$('#doc_chofer').on('select2:select', function (e) {
    var data = e.params.data;
    $("#nom_chofer").val(data.text);
    $("#quienAtendio").val(data.text);
});
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
//FIN Scripts SELECTS

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
/***************************************************** */
//Comienzo scripts preparacion y cierre tarea
//Guardado de formulario y limpieza de datos en BD
//Cierre formulario
async function cerrarTareaform(){

    //obtengo el formulario de la inspeccion
    var dataForm = new FormData($('#formAlertaPCC')[0]);
    dataForm.append('case_id', $("#caseId").val());
    dataForm.append('tipo', 'infraccion');
    dataForm.append('inspValida', 'incorrecta');
    
    //Guardo formulario de escaneo documentacion, se valido en cerrarTarea()
    var newInfoID = await frmGuardarConPromesa($('#formEscaneoDocu').find('form'));
    dataForm.append('info_id_doc', newInfoID);

    //Limpio la data pre cargada si existiera para evitar errores
    limpiarDataPreCargada().then((result) => {
        console.log(result);
    }).catch((err) => {
        console.log(err);
    });

    //Guardo los datos del formulario para no perderlos en reload
    //obtengo los permisos
    permisos = [];
    $('#sec_permisos div.permTransito').each(function(i, obj) {
        var json = JSON.parse($(obj).attr('data-json'));
        json.case_id = case_id;
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
            json.case_id= case_id;
            empresas.push(json);

        });
    });

    //obtengo transportista
    transp = {};
    transp.rol = "TRANSPORTISTA";
    transp.empr_id = $("#transportista").val();
    transp.case_id = $("#caseId").val();
    transp.depo_id = "";
    empresas.push(transp);

    //obtengo los termicos
    // reemplazo el nombre patente que trae en la vuelta del service
    termicos = [];
    $('#sec_termicos div.termicos').each(function(i, obj) {
        var aux = $(obj).attr('data-json');
        aux = aux.replace("patente", "term_id");
        var json = JSON.parse(aux);
        json.case_id = $("#caseId").val();
        termicos[i] = json;
    });

    //obtengo el tipo de infraccion
    infraccion = {};
 /*    if($('#tpoInfraccion').val() != null){
        infraccion.case_id = $("#caseId").val();
        infraccion.tiin_id = $("#tpoInfraccion").val();
    } */

    infraccion.case_id = $("#caseId").val();
    infraccion.depositario = $("#nyaDepositario").val();
    infraccion.documento = $("#dniActa").val();
    infraccion.domicilio_legal = $("#domiLegalActa").val();
    infraccion.domicilio_comercial = $("#domiComercialActa").val();
    infraccion.telefono = $("#telefonoActa").val();
    infraccion.email = $("#correoActa").val();
    infraccion.detalle_infraccion = $("#detalleInfraccionActa").val();
    infraccion.caracteristicas_organolepticas = $("#caractOrganolepticasActa").val();
    infraccion.caracteristicas_deposito = $("#caractDeposito").val();
    infraccion.tipo_camara = $("#tipoCamaraActa").val();
    infraccion.temperatura_actual = $("#tempCamaraActa").val();
    infraccion.fecha_hora = $("#fechaActa").val() + " " + $("#horaActa").val();
    infraccion.observacion_infraccion = $('#observacionesInfraccion').val();

    //Obtengo los tipos de infracciones
    tiposInfraccion = {};
    if($('#tpoInfraccion').select2('data').length > 0){
        tiposInfracciones = $('#tpoInfraccion').select2('data');
        for (let i = 0; i < tiposInfracciones.length; i++) {
            tiposInfraccion[i] = {"tiin_id": tiposInfracciones[i].id,"case_id": case_id};
        }
    }

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
            console.log("Se guardo el formulario de alerta PCC correctamente");
            resp = JSON.parse(data);
            if(data){
                console.log("Se creo contador correctamente");
                $("#contador").val(resp.contador);
            }
            //Guardo los permisos, empresas, termicos e infraccion si hubiese
            $.ajax({
                type: 'POST',
                data: {permisos, empresas, termicos, infraccion, tiposInfraccion},
                url: "<?php echo SICP; ?>inspeccion/guardarDatosInspeccion",
                success: function(data) {
                    resp = JSON.parse(data);
                    if(data){
                        resp.info_id = newInfoID;
                        resolve(resp);
                    }else{
                        console.log(resp.message);
                        reject(data);
                    }
                },
                error: function(data) {
                    wc();
                    reject(data);
                }
            });

        },
        error: function(data) {
            wc();
            alert("Error al guardar formulario de la inspección");
            reject(data);
        }
        });
    });
    return await guardadoCompleto;
}


function cerrarTarea() {
    wo();
    if(!frm_validar('#formAlertaPCC')){
        wc();
        Swal.fire(
            'Error..',
            'Debes completar los campos obligatorios (*)',
            'error'
        );
        return;
    }
    //
    //Validacion Escaneo Documentacion
    //
    if($("select[name=doc_impo]").val() == "" || $("#cant_doc").val() == ""){
        wc();
        Swal.fire(
            'Error..',
            'Debes completar el formulario de escaneo documentación (*)',
            'error'
        );
        return;
    }
    //
    //VALIDACION PERMISOS DE TRANSITO
    //
    if ( !$('#sec_permisos').children().length > 0 ) { 
        wc();
        Swal.fire(
            'Error..',
            'No se agregaron permisos de tránsito (*)',
            'error'
        );
        return;
    }
    //
    //VALIDACION EMPRESAS DESTINO
    //
 /*    if ( !$('#sec_destinos').children().length > 0 ) {
        wc();
        Swal.fire(
            'Error..',
            'No se agregaron empresas de destino (*)',
            'error'
        );
        return;
    } */
    //
    //VALIDACION TERMICOS
    //
    if ( !$('#sec_termicos').children().length > 0 ) {
        
        wc();
        Swal.fire(
            'Error..',
            'No se agregaron térmicos (*)',
            'error'
        );
        return;
    }
    //Una vez validado el formulario, lo guardo
    cerrarTareaform().then((result) => {
        
        var dataForm = new FormData($('#formAlertaPCC')[0]);
        dataForm.append('frm_info_id', result.info_id);
        // var acta_info_id = $('#formActaInfraccion .frm').attr('data-ninfoid');
        
        // dataForm.append('acta_info_id', acta_info_id);
        dataForm.append('doc_impositiva', $("select[name=doc_impo]").val());

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
                wc();
                alert("Error al finalizar tarea");
            }
        });
    }).catch((err) => {
        wc();
        error("Error!",err.message);
    });
}
//
// Limpio Informacion pre cargada para no tener errores con PK de las tablas
async function limpiarDataPreCargada () {
let limpiadoCompleto = new Promise( function(resolve,reject){
    caseId = {"case_id" : $("#caseId").val()};
    $.ajax({
        type: 'POST',
        data: {caseId},
        cache: false,
        dataType: "json",
        url: "<?php echo SICP; ?>inspeccion/limpiarDataPreCargada",
        success: function(data) { 

            if(data.status){
                console.log(data.message);
                resolve("Se limpio la data pre - cargada correctamente");
            }else{
                console.log(data.message);
                reject("Error al limpiar la data pre - cargada");
            }
             
        },
        error: function(data) {
            reject("Error al limpiar la data pre - cargada");
        }
    });
});

return await limpiadoCompleto;
}
//FIN Scripts Cierre tarea
/***************************************************** */
/***************************************************** */
//
//Bloque para validar
//
function showValidar(tag){
    if(tag.value == "correcta"){
        $("#bloque_validar").hide();
        $('#tpoInfraccion').val(null).trigger('change');
    }else{
        $("#bloque_validar").show();
    }
}
/****************************************************** */
//Show vista previa acta infraccion en calle
$(document).on('change',"input[name='-file-acta_infraccion']",function() {
    if(this.files && this.files[0]){
        var reader = new FileReader();

        reader.addEventListener("load", function (e) {
            $('#imgActaInfraccion').attr('src', e.target.result);
            $('#imgActaInfraccion').hide();
            $('#imgActaInfraccion').fadeIn(850);   
        }, false);

        reader.readAsDataURL(this.files[0]);
    }
});
/***************************************************** */
//
//Scripts Imprimir ACTA 
//
function imprimirActa(){
    
    //Completo datos en el acta antes de imprimir
    $(".acta_contador").text($("#contador").val());
    $(".acta_caseId").text($("#case_id").val());
    $(".acta_chofer").text($("#nom_chofer").val());
    $(".acta_dniChofer").text($("#doc_chofer").val());
    $(".acta_patenteTractor").text($("#patenteTractor").val());
    // $(".acta_numSenasa").text($("#num_senasa").val());
    $(".acta_cantFajas").text($("#cant_fajas").val());
    $(".acta_observaciones").text($("#observacionesInfraccion").val());
    // $(".acta_origenNro").text($("#esta_num").val());
    // $(".acta_estaOrigen").text($("#esta_nom").select2('data')[0].text);
    $(".acta_transportista").text($('#transportista').select2('data')[0].text);
    // $(".acta_productos").text($("#producto").val());
    $(".acta_bruto").text($("#bruto").val());
    $(".acta_tara").text($("#tara").val());
    $(".acta_ticket").text($("#ticket").val());
    $(".acta_tpoDocumentacion").text($("select[name='doc_impo']").select2('data')[0].text);
    $(".acta_depto").text($("#depa_idActa").select2('data')[0].text);
    $(".acta_localidad").text($("#localidad").val());
    $(".acta_inspectores").text($("#inspectores").val());
    $(".acta_puntoControl").text($("#dondeConstituyen").val());
    $(".acta_puntoControlDomicilio").text($("#domicilio").val());
    $(".acta_propiedadDe").text($("#propiedad").val());
    $(".acta_quienAtendio").text($("#quienAtendio").val());
    $(".acta_caracter").text($("#caracterAtendio").val());
    $(".acta_procedenA").text($("#procedenAccion").val());
    $(".acta_telTransportista").text($("#telTransportista").val());
    $(".acta_emailTransportista").text($("#emailTransportista").val());

    //Datos de infraccion
    //arma solo los datos que ingresan para imprimir el acta de infraccion
    infoInfraccion = "";
    infoCaracteristicasInfraccion = "";
    texto ="";

    if($("#nyaDepositario").val())
    {
        texto = "Quedando como Depositario Judicial de la mercadería en cuestión, el señor/a "; 
        infoInfraccion += texto.concat($("#nyaDepositario").val());
    }

    if($("#dniActa").val()){
        texto = ", D.N.I. N° "; 

        infoInfraccion +=  texto.concat($("#dniActa").val());   
    }

    if($("#telefonoActa").val()){
        texto = ", Teléfono  "; 

        infoInfraccion += texto.concat($("#telefonoActa").val());   
    }

    if($("#correoActa").val()){
        texto = ", correo electrónico  "; 

        infoInfraccion += texto.concat($("#correoActa").val());   
    }

    if($("#domiLegalActa").val()){
        texto = ", con domicilio legal "; 

        infoInfraccion += texto.concat($("#domiLegalActa").val());   
    }
 
    if($("#domiComercialActa").val()){
        texto = ", domicilio comercial "; 

        infoInfraccion +=texto.concat($("#domiComercialActa").val());   
    }
   
    $(".acta_infoInfraccion").text(infoInfraccion);
    
    if($("#caractOrganolepticasActa").val()){
        texto = " Con las características organolépticas que se describen a continuación "; 

        infoCaracteristicasInfraccion +=texto.concat($("#caractOrganolepticasActa").val());   
    }

    if($("#caractDeposito").val()){
        texto = ", en un depósito con las siguientes características: "; 

        infoCaracteristicasInfraccion +=texto.concat($("#caractDeposito").val());   
    }

    if($("#tempCamaraActa").val()){
        texto = ", y registrándose la siguiente temperatura "; 

        infoCaracteristicasInfraccion +=texto.concat($("#tempCamaraActa").val());   
    }

    $(".acta_infoCaracteristicasInfraccion").text(infoCaracteristicasInfraccion);
    
    $(".acta_fecha").text(dateFormat($("#fechaActa").val()));
    $(".acta_hora").text($("#horaActa").val());
    $(".acta_diaInspeccion").text(moment($("#fechaActaInspeccion").val()).format('D'));
    $(".acta_mesInspeccion").text(moment($("#fechaActaInspeccion").val()).format('MMMM'));
    $(".acta_anioInspeccion").text(moment($("#fechaActaInspeccion").val()).format('Y'));
    $(".acta_horaInspeccion").text($("#horaActa").val());
   

    //Valído
    // if($('input[name=inspValida]:checked').val() == 'incorrecta'){
    //     $(".acta_infraccion").text($('#tpoInfraccion').select2('data')[0].text);
    // }
    tiposInfraccion = "";
    if($('#tpoInfraccion').select2('data').length > 0){
        tiposInfracciones = $('#tpoInfraccion').select2('data');
        for (let i = 0; i < tiposInfracciones.length; i++) {
            tiposInfraccion += tiposInfracciones[i].text + "; ";
        }
    }

    $(".acta_tposInfracciones").text(tiposInfraccion.slice(0, -1));



    infoPrecintos = "";
    infoSenasa = "";
    $('#sec_termicos div.termicos').each(function(i, obj) {
        aux = $(obj).attr('data-json');
        json = JSON.parse(aux);
        infoPrecintos += json.precintos + " ";
        infoSenasa += json.nro_senasa + "; ";
    });
    $(".acta_precintos").text(infoPrecintos);
    $(".acta_numSenasa").text(infoSenasa);

    infoDestino = "";
    $('#sec_destinos div.empreDestino').each(function(i, obj) {
        aux = $(obj).attr('data-json');
        json = JSON.parse(aux);
        infoDestino += json.razon_social+". ";
    });
    $(".acta_destinos").text(infoDestino);

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

/* 
    infoPermisos = "";
    infoProductos = "";
    infoOrigen = "";
    infoOrigenNums = "";
    infoTemperatura = "";
    $('#sec_permisos div.permTransito').each(function(i, obj) {
        aux = $(obj).attr('data-json');
        json = JSON.parse(aux);
        infoPermisos += json.tipo + "; ";
        infoProductos +=  json.productos + "; ";
        infoOrigen += json.origen_nom + "; ";
        infoOrigenNums += json.origen_num + "; ";
        infoTemperatura += json.temperatura + "; ";
    });
    $(".acta_docSanitaria").text(infoPermisos);
    $(".acta_docSanitaria").text(infoPermisos);
    $(".acta_productos").text(infoProductos);
    $(".acta_origenNombres").text(infoOrigen);
    $(".acta_origenNumeros").text(infoOrigenNums);
    $(".acta_temperaturas").text(infoTemperatura); */

    var base = "<?php echo base_url()?>";
    
    $("#actaInfraccionPCC").printThis({
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
//Show vista previa de las imagenes en escaneo de documentación
//Genero el contenedor de la vista previa y se lo pego al contenedor del mosaico de imagenes
$("#btn-cierreEscaneo").on('click', function() {
    $("#mosaicoDocumentos img").remove();

    $("#formEscaneoDocu").find("input[type=file]").each(function(index, field){
        if ($(field)[0].files[0]) {
            (function(){
                let file = $(field)[0].files[0];
                let htmlVistaPrevia = $("<img class='thumbnail fotos documentacion' height='51' width='45' src='' alt='' onclick='preview(this)'>");
                let reader = new FileReader();
                $("#mosaicoDocumentos").append(htmlVistaPrevia);

                reader.onload = function () {
                    $(htmlVistaPrevia).attr('src', reader.result);
                }
                reader.readAsDataURL(file);
            }());
        }
    });
});
/***************************************************** */
</script>
