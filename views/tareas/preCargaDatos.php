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
    font-size: 15px;
}
.caja{
    margin-top: 15px;
}
.centrar{
    text-align: center;
}
</style>
<!--_______ FORMULARIO PERMISO DE TRANSITO BOX 1______-->
<form class="formPreCarga" id="formPreCarga">
<div class="row">
    <div class="col-md-6">
     <div class="caja" id="boxPermisoTransito">
        <div class="box-tittle centrar">
            <h3>Permiso de tránsito</h3>
        </div>
        <!--<div class="box-body"> -->
        <input type="text" class="form-control hidden" name="petr_id" id="petr_id" value="<?php echo $petr_id?>">

                <!--Solicitud-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="Solicitud">Solicitud N°(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="text" class="form-control requerido limitedChars" id="soli_num" placeholder="Ingrese número de solicitud..."/>
                    </div>
                </div>
                <!--________________-->

                <!-- Lugar de Emisión -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="emision">Lugar de emisión(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="text" class="form-control limitedNumbers" id="emision" placeholder="Ingrese lugar de emisión..."/>
                    </div>
                </div>
                <!--________________-->

                <!--Hora de Salida-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    <label for="salida">Hora de Salida(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="time" class="form-control" id="salida" placeholder="Ingrese hora de salida..."/>
                    </div>
                </div>
                <!--________________-->

                <!--Fecha-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    <label for="fecha">Fecha(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="date" class="form-control" id="fecha" placeholder="Ingrese fecha..."/>
                    </div>
                </div>
                <!--________________-->

                <!--DOC. Sanitaria Tipo-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="doc_sanitaria">Doc. Sanitaria Tipo(<strong style="color: #dd4b39">*</strong>):</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" class='form-check-input' name="doc_sanitaria" value="PT"/>
                        <label class="form-check-label" for="">PT</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class='form-check-input' name="doc_sanitaria" value="PTR"/>
                        <label class="form-check-label" for="">PTR</label>
                    </div>
                </div>
                <!--________________-->

            <!--_________________ Agregar_________________-->
                <div class="form-group text-right">
                    <button type="button" class="btn btn-outline-dark" onclick="agregarPermiso()" >Agregar</button>
                </div>                
            <!--__________________________________-->
            <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                <h4>Permisos:</h4>
                <div id="sec_permisos"></div>
                <hr>
            </div>

            <?php $this->load->view(SICP.'inspeccion/mosaicoBarrera.php') ?>
            <hr>
            <!-- The expanding image container -->
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="contenedor">
                <!-- Boton para ocultar imagen -->
                <!-- <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span> -->

                <!-- Expanded image -->
                <img src="lib\imageForms\preview.png" id="expandedImg" style="">

                <!-- Image text -->
                <!-- <div id="imgtext"></div> -->
                </div>
            </div>
        <!--</div> FIN box-body -->
    
    </div><!-- FIN box-primary -->
</div>
<!--_______ FIN FORMULARIO PERMISO DE TRANSITO BOX 1 ______-->

<!--_______ FORMULARIO INSPECCION BOX 2______-->
<div class="col-md-6">
    <div class="caja" id="boxInspeccion">
        <!-- <div class="box-body"> -->

                <!--DNI Chofer-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="doc_chofer">DNI Chofer(<strong style="color: #dd4b39">*</strong>):</label>
                    <div class="input-group">
                        <select class="form-control select2 select2-hidden-accesible choferes" name="chof_id" id="doc_chofer" required>
                            <option value="" disabled selected></option>
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
                    <div class="form-group has-feedback">
                    <label for="patenteTractor">Patente Tractor(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control limited" name="patente_tractor" id="patenteTractor" placeholder="Ingrese Patente Tractor..." required/>
                    </div>
                </div>
                <!--________________-->

                <!--N° SENASA-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    <label for="num_senasa">N° SENASA(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="text" class="form-control limitedChars" name="nro_senasa" id="num_senasa" placeholder="Ingrese N° SENASA..." required/>
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
                            <select class="form-control select2 select2-hidden-accesible empresa" name="esta_nom" id="esta_nom">
                                <option value="" disabled selected>-Seleccionar-</option>	
                                <?php
                                if(!empty($establecimientos)){ 
                                    foreach ($establecimientos as $esta) {
                                        echo "<option data-json='".json_encode($esta)."' value='".$esta->id."'>".$esta->nombre."</option>";
                                    }
                                }
                                ?>
                            </select>
                            <span id="add_establecimiento" class="input-group-addon" data-toggle="modal" data-target="#mdl-empresa" onclick="$('#tipoEmpresa').val('Establecimiento')"><i class="fa fa-plus"></i></span>
                        </div>
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
                <div class="form-group text-right">
                    <button type="button" class="btn btn-outline-dark" onclick="agregarDestino()" >Agregar</button>
                </div>                
                 <!--__________________________________-->

                <div class="col-md-12 col-sm-12 col-xs-12 centrar">
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
                            <select class="form-control select2 select2-hidden-accesible empresa" name="transportista" id="transportista">
                                <option value="" disabled selected></option>	
                            </select>
                            <span id="add_transportista" class="input-group-addon" data-toggle="modal" data-target="#mdl-empresa" onclick="$('#tipoEmpresa').val('Transportista')"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>                    
                </div>
                <!--________________-->
                <!--Producto-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="producto">Producto/s(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control" name="productos" id="producto" placeholder="Ingrese Producto..." required/>
                    </div>                    
                </div>
                <!--________________-->
                <!--Termico Patente-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="term_patente">Térmico Patente(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control limited" id="term_patente" placeholder="Ingrese Térmico Patente..." />
                    </div>                    
                </div>
                <!--________________-->
                <!--Temperatura-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="temperatura">Temperatura(<strong style="color: #dd4b39">*</strong>):</label>
                        <input type="number" class="form-control" id="temperatura" placeholder="Ingrese Temperatura..." />
                    </div>                    
                </div>
                <!--________________-->
                <!--Precintos-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="precintos">Precintos N°(<strong style="color: #dd4b39">*</strong>):</label>
                        <input class="form-control limitedChars" id="precintos" placeholder="Ingrese Precintos..." />
                    </div>                    
                </div>
                <!--________________-->
                <!--_________________ Agregar_________________-->
                <div class="form-group text-right">
                    <button type="button" class="btn btn-outline-dark" onclick="agregarTermico()" >Agregar</button>
                </div>                
                 <!--__________________________________-->
                <div class="col-md-12 col-sm-12 col-xs-12 centrar">
                    <h4>Térmico:</h4>
                    <div id="sec_termicos"></div>
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
            
            </div>
        <!-- </div> -->

    </div> <!--FIN box-primary-->
</div><!--FIN col-->
<!--_______ FIN FORMULARIO INSPECCION BOX 2______-->
</div>
</form>
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
    if (e.which != 8 && e.which != 0 && e.which != 9 && (e.which < 48 || e.which > 57) && (e.which < 96 || e.which > 105) && (e.which < 37 || e.which > 40)) {
        e.preventDefault();
        alert("Ingrese dígitos únicamente");
    }
});
//Filtro para NUMEROS, "/ -" inputs
//KeyCode: 111 = / , 109 = -
$(document).on("keydown", ".limitedChars", function(e) {
    if (e.which != 8 && e.which != 0 && e.which != 9 && e.which != 109 && e.which != 111 && (e.which < 48 || e.which > 57) && (e.which < 96 || e.which > 105) && (e.which < 37 || e.which > 40)) {
        e.preventDefault();
        alert("Caracteres válidos: 0-9, / y -");
    }
});
//Filtro para PRECINTOS N° A-Z, /, - y flechas
//KeyCode:
$(document).on("keydown", ".limited", function(e) {
    if (e.which != 8 && e.which != 0 && e.which != 9 && e.which != 109 && (e.which < 48 || e.which > 57) && (e.which < 96 || e.which > 105) && (e.which < 37 || e.which > 40) && (e.which < 65 || e.which > 90)) {
        e.preventDefault();
        alert("Caracteres válidos: A-Z, 0-9 y -");
    }
});
//Filtro para inputs A-Z, - y flechas
//KeyCode: Ñ = 192
$(document).on("keydown", ".limitedNumbers", function(e) {
    if (e.which != 8 && e.which != 0 && e.which != 9 && e.which != 109 && e.which != 192 && (e.which < 37 || e.which > 40) && (e.which < 65 || e.which > 90)) {
        e.preventDefault();
        alert("Caracteres válidos: A-Z y -");
    }
});
//
//Script's seccion destino
//
function agregarDestino(){
    //Informamos el campo vacio 
    var reporte = validarCamposDestino();
                            
    if(reporte == ''){
        var empre_destino = $('#empre_destino').find(':selected').text();
        var depo_destino = $('#depo_destino').find(':selected').text();

        var datos = {};
        datos.rol = "DESTINO";
        datos.empr_id = $("#empre_destino").val();
        datos.case_id = $("#caseId").val();
        datos.depo_id = $("#depo_destino").val();

        var div = `<div class='form-group empreDestino' data-json='${JSON.stringify(datos)}'>
                        <span> 
                        <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                        | ${empre_destino} - ${depo_destino}
                        </span>
                </div>`;
        $('#sec_destinos').append(div);
        //Limpio luego de agregar
        $('#empre_destino').val(null).trigger('change');
        $('#depo_destino').val(null).trigger('change');
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
                    var tipo = $('input[name=doc_sanitaria]:checked').val();

                    var datos = {};
                    datos.perm_id = soli_num;
                    datos.lugar_emision = emision;
                    datos.fecha_hora_salida = fecha +" "+salida;
                    datos.tipo = tipo;
                    datos.case_id = $("#caseId").val(); 

                    var div = `<div class='form-group permTransito' data-json='${JSON.stringify(datos)}'>
                                    <span> 
                                    <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i>
                                    <i class='fa fa-fw fa-edit text-light-blue' style='cursor: pointer;' title='Editar'></i> 
                                    | ${soli_num} - ${tipo} - ${emision} - ${salida} ${fecha}
                                    </span>
                            </div>`;
                    $('#sec_permisos').append(div);
                    //Limpio luego de agregar
                    $("#soli_num").val('');
                    $("#emision").val('');
                    $("#salida").val('');
                    $("#fecha").val('');
                    $('input[name=doc_sanitaria]:checked').prop('checked',false);
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
		if($("input[name='doc_sanitaria']:checked").val() == null){
			valida = "Seleccione un tipo de Doc. sanitaria!";
		}
		return valida;
    }

    $(document).on("click",".fa-edit",function(e) {
        // accion = "editar";
        var data =	JSON.parse($(e.target).closest('div').attr('data-json'));
        $("#soli_num").val(data.perm_id);
        $("#emision").val(data.lugar_emision);
        aux = data.fecha_hora_salida.split(" ");
        $("#salida").val(aux[1]);
        $("#fecha").val(aux[0]);
        $("input[name=doc_sanitaria][value='"+data.tipo+"']").prop("checked",true);
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
                var temperatura = $('#temperatura').val();
                var precintos = $('#precintos').val();
                var term_patente = $("#term_patente").val();
                // var descDepo = $("#depo_origen_id option:selected").text();

                var datos = {};
                datos.temperatura = temperatura;
                datos.precintos = precintos;
                datos.case_id = $("#caseId").val();
                datos.term_id = term_patente;

                var div = `<div class='form-group termicos' data-json='${JSON.stringify(datos)}'>
                                <span> 
                                <i class='fa fa-fw fa-trash text-light-blue' style='cursor: pointer;' title='Eliminar'></i> 
                                | ${term_patente} - ${temperatura} - ${precintos}
                                </span>
                        </div>`;
                $('#sec_termicos').append(div);
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
//Scripts SELECTS que actualizan combos o inputs
//
//Actualizo nombre del chofer
$('#doc_chofer').on('select2:select', function (e) {
    var data = e.params.data;
    $("#nom_chofer").val(data.text);
});
$('#esta_nom').on('select2:select', function (e) {
    var data = e.params.data;
    $("#esta_num").val(data.id);
});
//Cargo listado de depositos para empresa destino seleccionada
$("#empre_destino").on('select2:select', function(){
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

                    direccion = obj.calle + " - " + obj.altura;
                    newOpc = new Option(direccion, 1, false, false);
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
//Script para inicio de formulario 11
//Escaneo doucmentacion
$(document).ready(function () {
    
    detectarForm();
    initForm();
});
//
//Cierre formulario
async function cerrarTareaform(){
    debugger;
    //obtengo el formulario de la inspeccion
    var dataForm = new FormData($('#formPreCarga')[0]);
    dataForm.append('case_id', $("#caseId").val());
    correcto = ""; //Confirma que todo se guardo correctamente para cerrar tarea

    //Guardo los datos del formulario para no perderlos en reload
    //obtengo los permisos
    permisos = [];
    $('#sec_permisos div.permTransito').each(function(i, obj) {
        var json = JSON.parse($(obj).attr('data-json'));
        permisos[i] = json;
    });

    //obtengo los destinos
    empresas = [];
    $('#sec_destinos div.empreDestino').each(function(i, obj) {
        var json = JSON.parse($(obj).attr('data-json'));
        empresas[i] = json;
    });
    //obtengo origen
    origen = {};
    origen.rol = "ORIGEN";
    origen.empr_id = $("#esta_nom").val();
    origen.case_id = $("#caseId").val();
    origen.depo_id = "";
    empresas.push(origen);
    
    //obtengo transportista
    transp = {};
    transp.rol = "TRANSPORTISTA";
    transp.empr_id = $("#transportista").val();
    transp.case_id = $("#caseId").val();
    transp.depo_id = "";
    empresas.push(transp);
    
    //obtengo los termicos
    termicos = [];
    $('#sec_termicos div.termicos').each(function(i, obj) {
        var json = JSON.parse($(obj).attr('data-json'));
        termicos[i] = json;
    });

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
                console.log("Se guardo el formulario de PreCarga correctamente");
                
                //Guardo los permisos, empresas y termicos
                $.ajax({
                    type: 'POST',
                    data: {permisos, empresas, termicos},
                    url: "<?php echo SICP; ?>inspeccion/guardarDatosInspeccion",
                    success: function(data) {
                        resp = JSON.parse(data);
                        if(resp.status){
                            console.log(resp.message);
                            resolve("Correcto");
                        }else{
                            console.log(resp.message);
                            reject("Error");
                        }
                    },
                    error: function(data) {
                        alert("Error al guardar datos del formulario");
                        reject("Error");
                    }
                });

            },
            error: function(data) {
                alert("Error al guardar formulario de PreCarga");
                reject("Error");
            }
        });
    });
    return await guardadoCompleto;
}
    

function cerrarTarea() {

    if(!frm_validar('#formPreCarga')){
        console.log("Error al validar Formulario");
				Swal.fire(
					'Error..',
					'Debes completar los campos obligatorios (*)',
					'error'
				);
        return;
    }
    //
    //VALIDACION PERMISOS DE TRANSITO
    //
    if ( !$('#sec_permisos').children().length > 0 ) { 
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
    if ( !$('#sec_destinos').children().length > 0 ) {
        Swal.fire(
					'Error..',
					'No se agregaron empresas de destino (*)',
					'error'
				);
        return;
    }
    //
    //VALIDACION TERMICOS
    //
    if ( !$('#sec_termicos').children().length > 0 ) {
        
        Swal.fire(
					'Error..',
					'No se agregaron térmicos (*)',
					'error'
				);
        return;
    }
    //Una vez validado el formulario, lo guardo
    cerrarTareaform().then((result) => {
        console.log(result);
        //No uso formulario dinámico
        var dataForm = new FormData();

        var id = $('#taskId').val();

        $.ajax({
            type: 'POST',
            data: dataForm,
            cache: false,
            contentType: false,
            processData: false,
            url: '<?php base_url() ?>index.php/<?php echo BPM ?>Proceso/cerrarTarea/' + id,
            success: function(data) {
                //wc();
                //back();
                linkTo('<?php echo BPM ?>Proceso/');
                setTimeout(() => {
                Swal.fire(
                    
                        'Perfecto!',
                        'Se finalizó la tarea correctamente!',
                        'success'
                    )
        	  }, 13000);

            },
            error: function(data) {
                alert("Error al finalizar tarea");
            }
        });
        
    }).catch((err) => {
        console.log(err);
        alert("Error al finalizar tarea");
    });
}
</script>
