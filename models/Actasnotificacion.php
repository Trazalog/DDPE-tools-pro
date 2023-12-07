<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Actasnotificacion extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function obtenerActas($emprId){
        $url = REST_SICP . "/actasNotificacion/$emprId";
        // var_dump($url);
        return wso2($url);
    }

    /**
    * Genera un valor nuevo
    * @param array con datos del valor
    * @return ID valor generado
    */
    public function guardarActa($data){
        $post['_post_acta_notificacion'] = $data;
        log_message('DEBUG','#TRAZA| TRAZ-TOOLS | ACTAS | guardarActa()  $post: >> '.json_encode($post));
        $resource = '/actaNotificacion';
        $url = REST_SICP . $resource;
        $aux = $this->rest->callApi("POST", $url, $post); 
        return $aux;
    }

    /**
    * Borrado lógico de valor por ID
    * @param	int $acno_id
    * @return bool true o false resultado del servicio
    */
    function eliminarActa($acno_id)
    {
      $post['_delete_valor'] = array("acno_id" => $acno_id);
      log_message('DEBUG','#TRAZA | TRAZ-TOOLS | VALORES | eliminarActa() $post: >> '.json_encode($post));
      $aux = $this->rest->callAPI("DELETE",REST_SICP."/actaNotificacion", $post);
      return $aux;
    }
}
