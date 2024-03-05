<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* - Clase de donde se enviaran los datos necesarios para el filtrado
* - Devuelve ademas los datos ya filtrados
*
* @autor Hugo Gallardo
*/
class Opcionesfiltros extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    // $this->load->helper('wso2_helper');
    // $this->load->helper('sesion_helper');
  }


  /**
	* Listado tipo de infracciones
	* @param
	* @return array listado con tipos de infracciones
	*/
  public function getTipoProducto(){

    $url = REST_CORE."/tabla/888-tipos_producto/empresa/";
    $aux = $this->rest->callAPI("GET",$url);
    return $aux;
}

  /**
  * Develve info filtrada por parametros recibidos
  * @param array parametros para filtrar la lista
  * @return array con datos filtrados
  */
  function getHistoricoCamiones($data)
  {
    log_message('DEBUG','#TRAZA | SICPOA | OPCIONESFILTROS | getHistoricoArticulos($data) | $data: >> '.json_encode($data));
    $fec_desde = !empty($data['fec_desde']) ? date("Y-m-d", strtotime($data["fec_desde"])) : "";
    $fec_hasta = !empty($data['fec_hasta']) ? date("Y-m-d", strtotime($data["fec_hasta"])) : "";
    $cuit_origen = !empty($data["cuit_origen"]) ? $data['cuit_origen'] : 'TODOS';
    $cuit_destino = !empty($data["cuit_destino"]) ? $data['cuit_destino'] : 'TODOS';
    $cuit_transporte = !empty($data["cuit_transporte"]) ? $data['cuit_transporte'] : 'TODOS';
    $resultado = !empty($data["resultado"]) ? $data['resultado'] : 'TODOS';
    $tipo_producto = !empty($data["tipo_producto"]) ? $data['tipo_producto'] : 'TODOS';
    //conversion por si hay espacios
    $patente = !empty($data["termico"]) ? urlencode($data['termico']) : 'TODOS';
    

    $url = '/inspecciones/avanzado/desde/'.$fec_desde.'/hasta/'.$fec_hasta.'/origen/'.$cuit_origen.'/destino/'.$cuit_destino.'/transporte/'.$cuit_transporte.'/resultado/'.$resultado.'/producto/'.$tipo_producto.'/patente/'.$patente;

    $aux = $this->rest->callAPI("GET",REST_SICP.$url);

    $aux = json_decode($aux["data"]);
    return $aux->inspecciones->inspeccion;
  }
}
