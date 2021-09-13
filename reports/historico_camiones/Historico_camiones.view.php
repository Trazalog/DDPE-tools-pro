<?php
  use \koolreport\widgets\koolphp\Table;
  use \koolreport\widgets\google\ColumnChart;
?>
<style>
  .input-group-addon:hover{
    cursor: pointer;
    background-color: #04d61d !important;
  }
  .input-group-addon{
      background-color: #05b513 !important;
      color: white !important;
  }
</style>

<div id="reportContent" class="report-content">
  <div class="box box-primary">

    <div class="box-header with-border">
        <div class="box-tittle">
            <h4>Reporte Camiones</h4>
        </div>
    </div>

    <div class="box-body">

      <!-- _____ GRUPO 1 _____ -->
        <div class="col-md-12">

            <div class="form-group">

              <div class="col-md-4 col-md-6 mb-4 mb-lg-0">
                <label style="padding-left: 20%;">Fecha Desde <strong class="text-danger">*</strong> :</label>
                <div class="input-group date">
                  <a class="input-group-addon" id="daterange-btn" title="Más fechas">
                    <i class="fa fa-magic"></i>
                    <span></span>
                  </a>
                  <input type="date" class="form-control pull-right" id="datepickerDesde" name="datepickerDesde" placeholder="Desde">
                </div>
              </div>

              <div class="col-md-4 col-md-6 mb-4 mb-lg-0">
                <label style="padding-left: 20%;">Fecha Hasta <strong class="text-danger">*</strong> :</label>
                <div class="input-group date">
                  <a class="input-group-addon" id="daterange-btn" title="Más fechas">
                    <i class="fa fa-magic"></i>
                    <span></span>
                  </a>
                  <input type="date" class="form-control pull-right" id="datepickerHasta" name="datepickerHasta" placeholder="Hasta">
                </div>
              </div>

            </div>

        </div>
      <!-- _____ GRUPO 1 _____ -->

      <div class="col-md-12">
        <br>
      </div>

      <!-- _____ GRUPO 2 _____ -->
        <div class="col-md-12">

            <div class="form-group">

              <div class="col-md-4 col-md-6 mb-4 mb-lg-0">
                <label for="origen" class="form-label">Origen:</label>
                <select class="form-control empresa" id="origen" name="origen">
                </select>
              </div>

              <div class="col-md-4 col-md-6 mb-4 mb-lg-0">
                <label for="destino" class="form-label">Destino:</label>
                <select class="form-control empresa" id="destino" name="destino">
                </select>
              </div>

            </div>
        </div>
      <!-- _____ GRUPO 2 _____ -->

      <div class="col-md-12">
        <br>
      </div>

      <!-- _____ GRUPO 3 _____ -->
        <div class="col-md-12">

          <div class="form-group">

            <div class="col-md-4 col-md-6 mb-4 mb-lg-0">
              <label for="transportista" class="form-label">Transportista:</label>
              <select class="form-control empresa" id="transportista" name="transportista">
              </select>
            </div>

            <div class="col-md-4 col-md-6 mb-4 mb-lg-0">
              <label for="resultado" class="form-label">Resultado:</label>
              <?php  echo selectFromCore('resultado', 'Seleccione Resultado', '888-tipos_resultado', '') ?>

            </div>

          </div>
        </div>
      <!-- _____ GRUPO 3 _____ -->

      <div class="col-md-12">
        <br>
      </div>

      <!-- _____ GRUPO 4 _____ -->
        <div class="col-md-12">

          <div class="form-group">
            <div class="col-md-4 col-md-6 mb-4 mb-lg-0">
              <label for="producto" class="form-label">Tipo de producto:</label>
              <?php  echo selectFromCore('producto', 'Seleccione tipo de Producto', '888-tipos_producto', '') ?>
            </div>
          </div>

        </div>
      <!-- _____ GRUPO 4 _____ -->

      <div class="col-md-12">
        <br>
      </div>

      <!--_______ TABLA _______-->
        <div class="col-md-12">
          <?php
          Table::create(array(
            "dataStore" => $this->dataStore('data_historico_table'),
            // "themeBase" => "bs4",
            // "showFooter" => true, // cambiar true por "top" para ubicarlo en la parte superior
            // "headers" => array(
            //   array(
            //     "Reporte de Producción" => array("colSpan" => 6),
            //     // "Other Information" => array("colSpan" => 2),
            //   )
            // ), // Para desactivar encabezado reemplazar "headers" por "showHeader"=>false
            // "showHeader" => false,

            "columns" => array(
                array(
                  "label" => "Ver",
                  "value" => function() {
                    return '<i class="fa fa-search text-light-blue"  style="cursor: pointer;margin: 3px;" title="Ver Pedido" onclick=""></i>';
                  }
                ),
                "case_id" => array(
                  "label" => "Nº Insp"
                ),
                array(
                  "label" => "F. Barrera",
                  "value" => function($row) {
                    $aux = explode("T",$row["fec_alta"]);
                    $row["fec_alta"] = date("d-m-Y",strtotime($aux[0]));
                    return $row["fec_alta"];
                  },
                  "type" => "date"
                ),
                "neto" => array(
                  "label" => "Peso"
                ),
                "nombre" => array(
                  "label" => "Chofer"
                ),
                "termicos" => array(
                  "label" => "Térmicos"
                ),
                "razon_social_origen" => array(
                  "label" => "Orígen"
                ),
                "destinos" => array(
                  "label" => "Destino"
                ),
                "razon_social_transporte" => array(
                  "label" => "Transportista"
                ),
                "tipos_productos" => array(
                  "label" => "T. Producto"
                ),
                "resultado" => array(
                  "label" => "Resultado"
                )
            ),
            "cssClass" => array(
              "table" => "table-scroll table-responsive dataTables_wrapper form-inline dt-bootstrap dataTable table table-bordered table-striped table-hover display",
              "th" => "sorting"
            ),
            "paging"=>array(
              "pageSize"=>10,
              "pageIndex"=>0,
            ),
            "options"=>array(
              "searching"=>true
            ),
            "searchOnEnter" => true,
            "searchMode" => "or"
          ));
          ?>
        </div>
      <!--_______ TABLA _______-->

      <!--_______ BOTONES _______-->
        <div id="acciones" class="" style="float: right !important;">
          <!-- <button type="button" class="btn btn-success" onclick="exportarPDF()">Imprimir</button>
          <button type="button" class="btn btn-primary" onclick="exportarExcel()">Exportar a Excel</button> -->
          <button type="button" class="btn btn-primary" onclick="filtrar()">FILTRAR</button>
        </div>
      <!--_______ BOTONES _______-->


    </div>

  </div>
</div>

<script>
  // Llena selects empresas
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
            return empresa.text + ' ' + empresa.id + '';
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

  // Llena tabla con la informacion filtrada
    function filtrar() {
      wo();
      var data = buscaDatos();
      if (!data) {
        alert('Seleccione fechas por favor...');
        return;
      }
      $.ajax({
          type: 'POST',
          data:{data},
          url: "<?php echo SICP; ?>reportes/historicoCamiones",
          success: function(result) {
                $('#reportContent').empty();
                $('#reportContent').html(result);
                wc();
          },
          error: function(result){
                    
          },
          complete: function(){
                    
          }
      });
    }

  // Recolecta los datos de los filtros
    function buscaDatos() {

      desde = $("#datepickerDesde").val();
      hasta = $("#datepickerHasta").val();
      if (desde == "" || hasta == "") {
        return false;
      }
      origen = $("#origen").val();
      if (origen == null) {
        origen = 'TODOS';
      }
      destino = $("#destino").val();
      if (destino == null) {
        destino = 'TODOS';
      }
      transportista = $("#transportista").val();
      if (transportista == null) {
        transportista = 'TODOS';
      }
      resultado = $("#resultado>option:selected").val();
      if (resultado == 0) {
        resultado = 'TODOS';
      }
      producto = $("#producto>option:selected").val();
      if (producto == 0) {
        producto = 'TODOS';
      }
      var data = {};
      data.fec_desde = desde;
      data.fec_hasta = hasta;
      data.cuit_origen = origen;
      data.cuit_destino = destino;
      data.cuit_transporte = transportista;
      data.resultado = resultado;
      data.tipo_producto = producto;

      return data;
    }
  // Levanta modal detalle de reporte
    $(document).on("click", ".fa-search", function() {

      let case_id = $(this).parents("tr").find("td").eq(1).html();
      let caseId = case_id.trim();
      var data = {};
      data.caseId = caseId;
      $("#modalBodyDetalle").load("<?php echo base_url(SICP); ?>reportes/detaReporte", data);
      $("#modalDetalle").modal('show');

    });

  // Muestra el thumbnail en tamaño grande
    function preview(imgs) {
      // Tomo el elemento para la vista previa
      var expandImg = document.getElementById("expandedImg");
      // Le asigno la misma src al elemento de la vista previa
      expandImg.src = imgs.src;
    }

  // Exporta a Excel
    // function exportarExcel(){

      //window.open("<?php //echo base_url(ALM); ?>Reportes/excelTest?fec1="+fec1+"&fec2="+fec2+"&depo="+depo+"&arti="+arti+"&tpoArt="+tpoArt+"&estado="+estado);
    // }

  // Imprimir ACTA
    function imprimirActa(){
      var base = "<?php echo base_url(); ?>";
      $('#actaInfraccion').printThis({
          debug: false,
          importCSS: true,
          importStyle: true,
          loadCSS: "",
          base: base,
          pageTitle : "TRAZALOG TOOLS",
      });
    }

  // cierra modal detalle de reporte
    function cerrarModal(){
      $("#modalDetalle").modal('hide');
    }

</script>

<div class='modal fade bs-example-modal-lg' id='modalDetalle' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel'>
  <div class='modal-dialog modal-lg' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' onclick='cerrarModal()' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title' id='myModalLabel'>Detalle Inspección</h4>
      </div>
      <div class='modal-body modalBodyDetalle' id='modalBodyDetalle'>

      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' onclick='cerrarModal()'>Cancelar</button>
        <button type='button' class='btn btn-primary' onclick='imprimirActa()'>Imprimir</button>
      </div>
    </div>
  </div>
</div>
