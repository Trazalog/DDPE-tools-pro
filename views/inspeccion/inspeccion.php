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
    font-size: 20px;
}
</style>
<!--_______ FORMULARIO PERMISO DE TRANSITO BOX 1______-->
<div class="row">
<div class="col-md-6">
    <div class="box box-primary" id="boxPermisoTransito">
        <div class="box-header with-border">
            <div class="box-tittle">
                <h4>Permiso de tránsito</h4>
            </div>
        </div>
        <!--_____________________________________________-->

        <div class="box-body">

            <form class="formPermiso" id="formPermiso">

                <!--Solicitud-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="Solicitud">Solicitud N°(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="text" class="form-control requerido" name="soli_num" id="soli_num" placeholder="Ingrese número de solicitud..." required/>
                    </div>
                </div>
                <!--________________-->

                <!-- Lugar de Emisión -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="emision">Lugar de emisión(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="text" class="form-control" name="emision" id="emision" placeholder="Ingrese lugar de emisión..." required />
                    </div>
                </div>
                <!--________________-->

                <!--Hora de Salida-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    <label for="salida">Hora de Salida(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="time" class="form-control" name="salida" id="salida" placeholder="Ingrese hora de salida..." required />
                    </div>
                </div>
                <!--________________-->

                <!--Fecha-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    <label for="fecha">Fecha(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Ingrese fecha..." required />
                    </div>
                </div>
                <!--________________-->

                <!--DOC. Sanitaria Tipo-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="doc_sanitaria">Doc. Sanitaria Tipo(<strong style="color: #dd4b39">*</strong>):</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" class='form-check-input' name="doc_sanitaria" required />
                        <label class="form-check-label" for="">PT</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class='form-check-input' name="doc_sanitaria" required />
                        <label class="form-check-label" for="">PCR</label>
                    </div>
                </div>
                <!--________________-->

            </form>
            <!--_________________ Agregar_________________-->
                <div class="form-group text-right">
                    <button type="button" class="btn btn-outline-dark" onclick="agregarPermiso()" >Agregar</button>
                </div>                
            <!--__________________________________-->
            <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center">
                <h4>Permisos:</h4>
                <div id="sec_permisos"></div>
                <hr>
            </div>

            <?php $this->load->view(SICP.'inspeccion/mosaicoBarrera.php') ?>
            <hr>
            <?php $this->load->view(SICP.'inspeccion/mosaicoDocumentacion.php') ?>
        </div><!-- FIN box-body -->
    
    </div><!-- FIN box-primary -->
</div>
<!--_______ FIN FORMULARIO PERMISO DE TRANSITO BOX 1 ______-->

<!--_______ FORMULARIO INSPECCION BOX 2______-->
<div class="col-md-6">
    <div class="box box-primary" id="boxInspeccion">
        <div class="box-header with-border">
            <div class="box-tittle">
                <h4>Pre Carga de Datos</h4>
            </div>
        </div>
        <!--_____________________________________________-->

        <div class="box-body">

            <form class="formInspeccion" id="formInspeccion">

                <!--DNI Chofer-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="doc_chofer">DNI Chofer(<strong style="color: #dd4b39">*</strong>):</label>
                    <div class="input-group">
                        <select class="form-control select2 select2-hidden-accesible" name="doc_chofer" id="doc_chofer" onChange="seChofer(this)">
                            <option value="" disabled selected>-Seleccionar-</option>	
                            <?php
                            if(!empty($choferes)){
                                foreach ($choferes as $chof) {
                                    echo "<option data-json='".json_encode($chof)."' value='".$chof->dni."'>".$chof->dni."</option>";
                                }
                            }
                            ?>
                        </select>
                        <span id="add_chofer" class="input-group-addon" data-toggle="modal" data-target="#mdl-chofer"><i class="fa fa-plus"></i></span>
                    </div>
                </div>
                <!--________________-->

                <!-- Nombre CHOFER -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="nom_chofer">Nombre Chofer(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="text" class="form-control" name="nom_chofer" id="nom_chofer" placeholder="" readonly/>
                    </div>
                </div>
                <!--________________-->

                <!--Patente Tractor-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    <label for="patente">Patente Tractor(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control" name="patente" id="patente" placeholder="Ingrese Patente Tractor..." />
                    </div>
                </div>
                <!--________________-->

                <!--N° SENASA-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    <label for="num_senasa">N° SENASA(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control" name="num_senasa" id="num_senasa" placeholder="Ingrese N° SENASA..." />
                    </div>
                </div>
                <!--________________-->
                
                <!--Establecimiento N°-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    <label for="esta_num">Establecimiento N°(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control" name="esta_num" id="esta_num" placeholder="Ingrese Establecimiento N°..." readonly/>
                    </div>
                </div>
                <!--________________-->

                <!--Nombre Establecimiento-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="esta_nom">Nombre Establecimiento(<strong style="color: #dd4b39">*</strong>):</label>
                        <div class="input-group">
                            <select class="form-control select2 select2-hidden-accesible" name="esta_nom" id="esta_nom" onChange="seEstable(this)">
                                <option value="" disabled selected>-Seleccionar-</option>	
                                <?php
                                if(!empty($establecimientos)){ 
                                    foreach ($establecimientos as $esta) {
                                        echo "<option data-json='".json_encode($esta)."' value='".$esta->id."'>".$esta->nombre."</option>";
                                    }
                                }
                                ?>
                            </select>
                            <span id="add_establecimiento" class="input-group-addon" data-toggle="modal" data-target="#mdl-establecimiento"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>
                </div>
                <!--________________-->

                <!--Empresa Destino-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="empre_destino">Empresa Destino(<strong style="color: #dd4b39">*</strong>):</label>
                        <div class="input-group">
                        <select class="form-control select2 select2-hidden-accesible" name="empre_destino" id="empre_destino" onChange="seEmpresa(this)">
                            <option value="" disabled selected>-Seleccionar-</option>	
                            <?php
                            if(!empty($empresas)){ 
                                foreach ($empresas as $emp) {
                                    echo "<option data-json='".json_encode($emp)."' value='".$emp->cuit."'>".$emp->razon_social."</option>";
                                }
                            }
                            ?>
                        </select>
                            <span id="add_empresa" class="input-group-addon" data-toggle="modal" data-target="#mdl-empresa"><i class="fa fa-plus"></i></span>
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
                            <?php
                            if(!empty($depositos)){ 
                                foreach ($depositos as $depo) {
                                    echo "<option data-json='".json_encode($depo)."' value='".$depo->depo_id."'>".$depo->calle." - ".$depo->altura."</option>";
                                }
                            }
                            ?>
                        </select>
                            <span id="add_deposito" class="input-group-addon" data-toggle="modal" data-target="#mdl-deposito"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>                    
                </div>
                <!--_________________ Agregar_________________-->
                <div class="form-group text-right">
                    <button type="button" class="btn btn-outline-dark" onclick="agregarDestino()" >Agregar</button>
                </div>                
                 <!--__________________________________-->

                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center">
                    <h4>Empresa Destino:</h4>
                    <div id="sec_destinos"></div>
                <hr>
                </div>
                <!--________________-->
                <!--Transportista-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="transportista">Transportista(<strong style="color: #dd4b39">*</strong>):</label>
                        <div class="input-group">
                            <select class="form-control select2 select2-hidden-accesible" name="transportista" id="transportista">
                                <option value="" disabled selected>-Seleccionar-</option>	
                                <?php
                                if(!empty($empresas)){ 
                                    foreach ($empresas as $emp) {
                                        echo "<option data-json='".json_encode($emp)."' value='".$emp->cuit."'>".$emp->razon_social."</option>";
                                    }
                                }
                                ?>
                            </select>
                            <span id="add_transportista" class="input-group-addon" data-toggle="modal" data-target="#mdl-transportista"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>                    
                </div>
                <!--________________-->
                <!--Producto-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="producto">Producto/s(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control" name="producto" id="producto" placeholder="Ingrese Producto..." />
                    </div>                    
                </div>
                <!--________________-->
                <!--Termico Patente-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="term_patente">Térmico Patente(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control" name="term_patente" id="term_patente" placeholder="Ingrese Térmico Patente..." />
                    </div>                    
                </div>
                <!--________________-->
                <!--Temperatura-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="temperatura">Temperatura(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control" name="temperatura" id="temperatura" placeholder="Ingrese Temperatura..." />
                    </div>                    
                </div>
                <!--________________-->
                <!--Precintos-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="precintos">Precintos N°(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control" name="precintos" id="precintos" placeholder="Ingrese Precintos..." />
                    </div>                    
                </div>
                <!--________________-->
                <!--_________________ Agregar_________________-->
                <div class="form-group text-right">
                    <button type="button" class="btn btn-outline-dark" onclick="agregarTermico()" >Agregar</button>
                </div>                
                 <!--__________________________________-->
                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center">
                    <h4>Térmico:</h4>
                    <div id="sec_termico"></div>
                </div>
                <!--________________-->
                <!--Precintos-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="observaciones">Observaciones:</label>
                        <textarea class="form-control" row="3" name="observaciones" id="observaciones" placeholder="Observaciones..." ></textarea>
                    </div>                    
                </div>
                <!--________________-->
            </form>
            
            </div>
            <!--_________________ GUARDAR_________________-->
            <div class="modal-footer">
                        <div class="form-group text-right">
            <button type="button" class="btn btn-primary" onclick="guardar('nueva')" >Guardar</button>
                    </div>                
            <!--__________________________________-->

        </div>

    </div> <!--FIN box-primary-->
</div>
<!--_______ FIN FORMULARIO INSPECCION BOX 2______-->
</div>
<script>
//
//Document READY
//Instancias select2 combo box
//
$(document).ready(function() {
    $('.select2').select2();
});

//
//Script's seccion destino
//
function agregarDestino(){
    //Informamos el campo vacio 
    var reporte = validarCamposDestino();
                            
    if(reporte == ''){
        var empre_destino = $("#empre_destino").val();
        var depo_destino = $('#depo_destino').val();

        var datos = {};
        datos.empre_destino = empre_destino;
        datos.depo_destino = depo_destino;
        var div = `<div class='form-group permTransito' data-json='${JSON.stringify(datos)}'>
                        <span> 
                        <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                        | ${empre_destino} - ${depo_destino}
                        </span>
                </div>`;
        $('#sec_destinos').append(div);
        //Limpio luego de agregar
        $("#empre_destino").val('');
        $("#depo_destino").val('');
    }else{
        alert(reporte);
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
    $(e.target).closest('div').remove();		
});
//
//FIN Script's seccion destino
/****************************************************** */
/****************************************************** */
//
//Scripts Permisos transito
//
var accion;
    function agregarPermiso(){
			//Informamos el campo vacio 
			var reporte = validarCamposPermiso();
									
			if(reporte == ''){
                // if(accion != 'editar'){
                    var soli_num = $("#soli_num").val();
                    // var descDepo = $("#depo_origen_id option:selected").text();
                    var emision = $('#emision').val();
                    var salida = $('#salida').val();
                    var fecha = $("#fecha").val();

                    var datos = {};
                    datos.soli_num = soli_num;
                    datos.emision = emision;
                    datos.salida = salida;
                    datos.fecha = fecha;

                    var div = `<div class='form-group permTransito' data-json='${JSON.stringify(datos)}'>
                                    <span> 
                                    <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                                    <i class='fa fa-fw fa-edit text-light-blue' style='cursor: pointer; margin-left: 12px;' title='Editar'></i> 
                                    | ${soli_num} - ${emision} - ${salida} - ${fecha}
                                    </span>
                            </div>`;
                    $('#sec_permisos').append(div);
                    //Limpio luego de agregar
                    $("#soli_num").val('');
                    $("#emision").val('');
                    $("#salida").val('');
                    $("#fecha").val('');
                // }else{
                //     $('#sec_permisos').find()
                // }
			}else{
					alert(reporte);
			}
	}
    function validarCamposPermiso(){
        var valida = '';
        //Numero de solicitud
		if($("#soli_num").val() == ""){
			valida = "Complete Numero de solicitud!";
		}
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
		// if($("#depo_id").attr() == null){
		// 	valida = "Seleccione un tipo de Doc. sanitaria!";
		// }
		return valida;
    }

    $(document).on("click",".fa-edit",function(e) {
        // accion = "editar";
        var data =	JSON.parse($(e.target).closest('div').attr('data-json'));
        $("#soli_num").val(data.soli_num);
        $("#emision").val(data.emision);
        $("#salida").val(data.salida);
        $("#fecha").val(data.fecha);
        $(e.target).closest('div').remove();

	});
//FIN Script's seccion permisos transito
/***************************************************** */
/***************************************************** */
//
//Scripts Termico
//
    function agregarTermico(){
			//Informamos el campo vacio 
			var reporte = validarCamposTermico();
									
			if(reporte == ''){
                var term_patente = $("#term_patente").val();
                // var descDepo = $("#depo_origen_id option:selected").text();
                var temperatura = $('#temperatura').val();
                var precintos = $('#precintos').val();

                var datos = {};
                datos.term_patente = term_patente;
                datos.temperatura = temperatura;
                datos.precintos = precintos;

                var div = `<div class='form-group permTransito' data-json='${JSON.stringify(datos)}'>
                                <span> 
                                <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i> 
                                | ${term_patente} - ${temperatura} - ${precintos}
                                </span>
                        </div>`;
                $('#sec_termico').append(div);
                //Limpio luego de agregar
                $("#term_patente").val('');
                $("#temperatura").val('');
                $("#precintos").val('');
			}else{
				alert(reporte);
			}
	}
    function validarCamposTermico(){
        var valida = '';
        //Térmico Patente
		if($("#term_patente").val() == ""){
			valida = "Complete Térmico Patente!";
		}
        //Temperatura
		if($("#temperatura").val() == ""){
			valida = "Complete Temperatura!";
		}
        //Precintos
		if($("#precintos").val() == ""){
			valida = "Complete Precintos!";
		}
		return valida;
    }
//FIN Script's seccion termico
/***************************************************** */
/***************************************************** */
//
//Scripts SELECTS
//
//Acutalizo datos de chofer
function seChofer(elem){
    var nomChofer = JSON.parse($(elem).find(":selected").attr("data-json")).nombre;
    $("#nom_chofer").val(nomChofer);
}
function seEstable(elem){
    var nomChofer = JSON.parse($(elem).find(":selected").attr("data-json")).nombre;
    $("#nom_chofer").val(nomChofer);
}

//Script apra inicio de formulario 11
//Escaneo doucmentacion
detectarForm();
initForm();
</script>