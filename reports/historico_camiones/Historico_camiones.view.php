<?php
  use \koolreport\widgets\koolphp\Table;
  use \koolreport\widgets\google\ColumnChart;
?>

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
              <?php  echo selectFromCore('resultado', 'Seleccione Resultado', '888-888-tipos_resultado', '') ?>
              </select>
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
              "referencia" => array(
                "label" => "Acciones"
                ),
                "inspeccion" => array(
                  "label" => "Nº Insp"
                ),
                "codigo" => array(
                  "label" => "F. Barrera"
                ),
                "peso" => array(
                  "label" => "Peso"
                ),
                "descripcion" => array(
                  "label" => "Chofer"
                ),
                "lote" => array(
                  "label" => "Térmicos"
                ),
                "cantidad" => array(
                  "label" => "Orígen"
                ),
                "stock_actual" => array(
                  "label" => "Destino"
                ),
                "deposito" => array(
                  "label" => "Transportista"
                ),
                "deposito" => array(
                  "label" => "T. Producto"
                ),
                "deposito" => array(
                  "label" => "Resultado"
                )
            ),
            "cssClass" => array(
              "table" => "table-scroll table-responsive dataTables_wrapper form-inline dt-bootstrap dataTable table table-bordered table-striped table-hover display",
              "th" => "sorting"
            )
          ));
          ?>
        </div>
      <!--_______ TABLA _______-->

      <!--_______ BOTONES _______-->
        <div id="acciones" class="" style="float: right !important;">
        <button type="button" class="btn btn-success" onclick="detaReporte()">Detalle</button>
          <button type="button" class="btn btn-success" onclick="exportarPDF()">Imprimir</button>
          <button type="button" class="btn btn-primary" onclick="exportarExcel()">Exportar a Excel</button>
          <button type="button" class="btn btn-primary" onclick="filtrar()">FILTRAR</button>
        </div>
      <!--_______ BOTONES _______-->


    </div>

  </div>
</div>

<script>
// llena selects empresas
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

  function filtrar() {
    var data = {};
    data.desde = $("#datepickerDesde").val();
    data.hasta = $("#datepickerHasta").val();
    data.origen = $("#origen").val();
    data.destino = $("#destino").val();
    data.transportista = $("#transportista").val();
    data.resultado = $("#resultado>option:selected").val();
    data.producto = $("#producto>option:selected").val();
    //data.producto = $("#resultado>option:selected").val();

    $.ajax({
        type: 'POST',
        data:{data},
        url: "<?php echo SICP; ?>reportes/historicoCamiones",
        success: function(result) {

        },
        error: function(result){
                  
        },
        complete: function(){
                  
        }
    });
  }

  function detaReporte() {

    var data = {};
    data.prioridad = "normal";
    data.fec_asignacion = "2021-08-20 13:23:13.451";
    data.idUsuarioAsignado = "802";
    data.usuarioAsignado = "Nombre Apellido";
    data.fec_vencimiento = "";
    data.descripcion = "-";
    data.color = "#00A65A";
    data.nombreProceso = "SICPOA";
    data.nombreTarea = "Reprecintado";
    data.processId = "6077057098910977968";
    data.caseId = "13041";
    data.taskId = "240563";
    
    $("#modalBodyDetalle").load("<?php echo base_url(REST_SICP); ?>/reportes/detaReporte", data);

      // $.ajax({
      //     type: 'POST',
      //     data:{ data },
      //     url:  "<?php //echo SICP; ?>reportes/detaReporte",
      //     success: function(result) {

      //           // levanto modal con img de Codigo
      //           $("#modalDetalle").modal('show');

      //     },
      //     error: function(result){
                    
      //     },
      //     complete: function(){

      //     }
      // });
  }


//Exporta a Excel
  function exportarExcel(){

    window.open("<?php echo base_url(ALM); ?>Reportes/excelTest?fec1="+fec1+"&fec2="+fec2+"&depo="+depo+"&arti="+arti+"&tpoArt="+tpoArt+"&estado="+estado);
  }

  //Exporta a PDF ppara imprimir
  function exportarPDF(){
      $(function(){
          $('').printThis({
              debug: false,
              importCSS: true,
              importStyle: true,
              loadCSS: "<?php echo base_url('lib/bower_components/bootstrap/dist/css/bootstrap.min.css')?>",
              // loadCSS: "lib/bower_components/bootstrap/dist/css/bootstrap.min.css",
              copyTagClasses: true,
              pageTitle : "TRAZALOG TOOLS",
              header: "<h1 style='text-align: center;'>Reporte Camiones</h1>",
              footer: $("#reportContent").clone().children().find('table').css('display','block').get(0),
              beforePrint: function(){
                $("table.dataTable thead .sorting:after").attr('display','none');
              },
              afterPrint: function(){
                $("table.dataTable thead .sorting:after").attr('display','block');
              }
          });
      });
  }

</script>


<div class='modal fade' id='modalDetalle' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' onclick='' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title' id='myModalLabel'>Impresión de Etiqueta</h4>
      </div>
      <div class='modal-body modalBodyDetalle' id='modalBodyDetalle'>

      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' onclick=''>Cancelar</button>
        <button type='button' class='btn btn-primary' onclick=''>Imprimir</button>
      </div>
    </div>
  </div>
</div>
