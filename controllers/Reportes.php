<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/modules/' . SICP . "reports/historico_camiones/Historico_camiones.php";
require_once('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * - Controller general para todos los reportes del submodulo
 *
 * @autor Hugo Gallardo
 */
class Reportes extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(SICP . 'koolreport/Opcionesfiltros');
    $this->load->model(SICP . 'Ingresosbarrera');
    $this->load->model(SICP . 'Sicpoatareas');
    $this->load->helper('sesion_helper');
    //valido la sesion en caso de inactividad
    validarInactividad();
  }

  /**
   * - Levanta vista reporte de Historico de camiones
   * - Recarga con datos filtrados
   * @param
   * @return view historico_camiones
   * 
   */

function historicoCamiones()
{
  $data = $this->input->post('data');

  $tipo_producto = $data['tipo_producto'] != "TODOS" ? empresa(). '-tipos_producto' . $data['tipo_producto'] : 'TODOS';

  $data = [
    'fec_desde' => $data['fec_desde'],
    'fec_hasta' => $data['fec_hasta'],
    'cuit_origen' => $data['cuit_origen'],
    'cuit_destino' => $data['cuit_destino'],
    'transportista' => $data['transportista'],
    'resultado' => $data['resultado'],
    'tipo_producto' => $tipo_producto,
  ];

  log_message('DEBUG', '#TRAZA | SICPOA | REPORTES | historicoCamiones() | $data: >> ' . json_encode($data));

  $json = $this->Opcionesfiltros->getHistoricoCamiones($data);

  $reporte = new Historico_camiones($json);
  $reporte->run()->render();
}
  

  /**
   * Devuelve tipo de producto en un desplegable
   * @param
   * @return array con tipo de productos
   */
  function getTipoProducto()
  {
    $resp = $this->Opcionesfiltros->getTipoProducto();

    if ($rsp['status']) {
      echo selectBusquedaAvanzada('noco_id', 'noco_id', $rsp['data'], 'codigo', 'codigo');
    } else echo 'Sin Productos...';
  }

  /**
   * Devuelve modal con info detalle de reporte de camiones
   * @param array con info para buscar la data a mosstrar
   * @return view para modal
   */
  function detaReporte()
  {
    $caseId = $this->input->post('caseId');
    $tareaData = $this->getXCaseId($caseId);

    $data['petr_id'] = $tareaData->petr_id;
    $data['inspeccion'] = $this->getPreCargaDatos($caseId);
    // $data['inspeccion'] = $this->getPreCargaDatos($tareaData->case_id);
    $empresas = $data['inspeccion']->empresas->empresa;

    //Separo las empresas por su rol
    if (!empty($empresas)) {

      foreach ($empresas as $key => $value) {

        if ($value->rol == "DESTINO") {
          $data['destinos'][$key] = $value;
        } elseif ($value->rol == "ORIGEN") {
          $data['origen'] = $value;
        } elseif ($value->rol == "TRANSPORTISTA") {
          $data['transportista'] = $value;
        }
      }
    }

    $formulario = $this->Ingresosbarrera->getFormularios($tareaData->petr_id);
    $escaneoInfoId = $formulario['data'][0]->forms->form[0]->info_id;
    $data['escaneoInfoId'] = $escaneoInfoId; // Lo mando a la vista para instaciar formulario en modal

    if (isset($escaneoInfoId)) {
      $data['formEscaneo'] =  $this->getFormEscaneoDocu($escaneoInfoId);
    }

    return $this->load->view(SICP . 'tareas/infraccionPCC', $data);
  }

  /**
   * Devuelve info de Pedido trabajo
   * @param string case_id
   * @return
   */
  public function getXCaseId($case_id)
  {
    //$case_id = $tarea->caseId;

    $aux = $this->rest->callAPI("GET", REST_PRO . "/pedidoTrabajo/xcaseid/" . $case_id);
    $data_generico = json_decode($aux["data"]);
    $aux = $data_generico->pedidoTrabajo;
    return $aux;
  }

  /**
   * Obtengo la informacion de la inspeccion precargada
   * @param int case_id
   * @return array informacion pre cargada en paso Pre - Carga de Datos
   */
  public function getPreCargaDatos($case_id)
  {

    $url = REST_SICP . "/inspeccion/id/" . $case_id;

    $aux = $this->rest->callAPI("GET", $url);
    $resp = json_decode($aux['data']);

    log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | getPreCargaDatos() >> ");

    return $resp->inspeccion;
  }

  /**
   * Obtengo las imagenes cargadas en Escaneo Documentacion guardadas en instancias_formularios
   * @param array info_id
   * @return array Imagenes relacionadas con el info_id
   */
  function getImgsEscaneoDocu($info_id)
  {
    if ($info_id) {
      $imagenes = array();
      $this->load->model(FRM . 'Forms');
      $res = $this->Forms->obtener($info_id);

      foreach ($res->items as $dato) {
        if (isset($dato->valor4_base64)) {
          $rec = stream_get_contents($dato->valor4_base64);
          $ext = $this->obtenerExtension($dato->valor);
          array_push($imagenes, $ext . $rec);
        }
      }
    }
    return $imagenes;
  }

  /**
   * Funcion para obtener la extension del archivo codificado
   * @param array nombre archivo con su extension
   * @return array cabecera para la url lsito para usar en atributo src
   */
  function obtenerExtension($archivo)
  {
    $ext = explode('.', $archivo);
    switch (strtolower($ext[1])) {
      case 'jpg':
        $ext = 'data:image/jpg;base64,';
        break;
      case 'png':
        $ext = 'data:image/png;base64,';
        break;
      case 'jpeg':
        $ext = 'data:image/jpeg;base64,';
        break;
      case 'pjpeg':
        $ext = 'data:image/pjpeg;base64,';
        break;
      case 'wbmp':
        $ext = 'data:image/vnd.wap.wbmp;base64,';
        break;
      case 'webp':
        $ext = 'data:image/webp;base64,';
        break;
      case 'pdf':
        $ext = 'data:application/pdf;base64,';
        break;
      case 'doc':
        $ext = 'data:application/msword;base64,';
        break;
      case 'xls':
        $ext = 'data:application/vnd.ms-excel;base64,';
        break;
      case 'docx':
        $ext = 'data:application/vnd.openxmlformats-officedocument.wordprocessingml.document;base64,';
        break;
      case 'txt':
        $ext = 'data:text/plain;base64,';
        break;
      case 'csv':
        $ext = 'data:text/csv;base64,';
        break;
      default:
        $ext = "";
    }
    return $ext;
  }

  /**
   * - Genera Archivo Excel con la data filtrada en la vista
   * - Descarga el excel automaticamente
   * - NOTA: Se genera de esta manera debido a que no se puede descargar un archivo
   * - directamente como respuesta de un ajax porque infringe politicas de seguridad
   * @param
   * @return view Historico Camiones
   */
  public function exportarExcelHistorico()
  {

    $data['desde'] = $this->input->get('fec1');
    $data['hasta'] = $this->input->get('fec2');
    $data['depo_id'] = $this->input->get('depo');
    $data['arti_id'] = $this->input->get('arti');
    $data['tipo_mov'] = $this->input->get('tpoMov');
    $data['lote_id'] = $this->input->get('lote');

    $json = $this->Opcionesfiltros->getHistoricoArticulos($data);

    $spreadsheet = new Spreadsheet(); // Creo la instancia de Spreadsheet
    $sheet = $spreadsheet->getActiveSheet(); // Me posiciono en la hoja activa

    //Formateo del Excel con la data de la consulta
    //Formateo titulo
    $sheet->setCellValue('A1', 'Reporte de Artículos Vencidos');
    $sheet->getStyle('A1')->getFont()->setSize(20);
    $sheet->getStyle('A1')->getFont()->setBold(true);
    $sheet->getStyle('A1:C1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('B4C6E7');


    //Formateo Headers tabla y rellenado
    $sheet->getStyle('A3:I3')->getFont()->setBold(true);
    $sheet->setCellValue('A3', "Referencia");
    $sheet->setCellValue('B3', "Código Artículo");
    $sheet->setCellValue('C3', "Descripción");
    $sheet->setCellValue('D3', "Lote");
    $sheet->setCellValue('E3', "Cantidad");
    $sheet->setCellValue('F3', "Stock");
    $sheet->setCellValue('G3', "Depósito");
    $sheet->setCellValue('H3', "Fecha");
    $sheet->setCellValue('I3', "Tipo Movimiento");
    $sheet->getColumnDimension('A')->setWidth(13);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);
    $sheet->getColumnDimension('D')->setAutoSize(true);
    $sheet->getColumnDimension('E')->setAutoSize(true);
    $sheet->getColumnDimension('F')->setAutoSize(true);
    $sheet->getColumnDimension('G')->setAutoSize(true);
    $sheet->getColumnDimension('H')->setAutoSize(true);
    $sheet->getColumnDimension('I')->setAutoSize(true);
    $sheet->getStyle('A3:I3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('D9D9D9');

    //Relleno la Tabla
    $i = 4;
    foreach ($json as $key => $value) {

      $aux = explode("T", $value->fec_alta);
      $fecha = date("d-m-Y", strtotime($aux[0]));

      $sheet->setCellValue('A' . $i, $value->referencia);
      $sheet->setCellValue('B' . $i, $value->codigo);
      $sheet->setCellValue('C' . $i, $value->descripcion);
      $sheet->setCellValue('D' . $i, $value->lote);
      $sheet->setCellValue('E' . $i, $value->cantidad);
      $sheet->setCellValue('F' . $i, $value->stock_actual);
      $sheet->setCellValue('G' . $i, $value->deposito);
      $sheet->setCellValue('H' . $i, $fecha);
      $sheet->setCellValue('I' . $i, $value->tipo_mov);
      $i++;
    }

    $writer = new Xlsx($spreadsheet); // instancio Xlsx

    $filename = 'Reporte_Histórico_Artículos'; // Nombre del archivo con el cual sera descargado

    header('Content-Type: application/vnd.ms-excel'); // generamos las cabeceras para que el navegador interprete de que tipo de archivo se trata
    header('Content-Disposition: attachment;filename="' . $filename . "_" . date('d-m-Y') . '.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');  // descargamos el excel generado
  }
  /**
   * Obtengo los datos cargadas en el escaneo de documentacion guardados en instancias_formularios
   * @param array info_id
   * @return array datos relacionadas con el info_id
   */
  function getFormEscaneoDocu($info_id)
  {
    if ($info_id) {
      $formEscaneo = array();
      $this->load->model(FRM . 'Forms');
      $res = $this->Forms->obtener($info_id);

      foreach ($res->items as $key => $dato) {
        if (isset($dato->valor4_base64)) {
          $rec = stream_get_contents($dato->valor4_base64);
          $ext = obtenerExtension($dato->valor);

          if ($dato->tipo_dato == 'image') {
            $formEscaneo['imagenes'][$key]['inst_id'] = $dato->inst_id;
            $formEscaneo['imagenes'][$key]['imagen'] = $ext . $rec;
          } else {
            $formEscaneo['archivos'][$key]['inst_id'] = $dato->inst_id;
            $formEscaneo['archivos'][$key]['descripcion'] = $dato->valor;
            $formEscaneo['archivos'][$key]['archivo'] = $ext . $rec;
          }
        } else {
          if (!empty($dato->valor)) {
            if ($dato->tipo_dato == 'select') {
              foreach ($dato->values as $key => $valor) {
                if ($dato->valor == $valor->value) {
                  $formEscaneo['datos'][$dato->name]['descripcion'] = $valor->label;
                }
              }
            }
            $formEscaneo['datos'][$dato->name]['valor'] = $dato->valor;
          }
        }
      }
    }
    return $formEscaneo;
  }
}
