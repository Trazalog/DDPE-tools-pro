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
        // $estado = urldecode($data['estado']);
        // $localidad = urldecode($data['localidad']);
        $post['_post_acta_notificacion'] = $data;
        log_message('DEBUG','#TRAZA| TRAZ-TOOLS | VALORES | guardarActa()  $post: >> '.json_encode($post));
        // $post['_post_proveedor']['estado'] = $estado;
        // $post['_post_proveedor']['localidad'] = $localidad;
        $resource = '/actaNotificacion';
        $url = REST_SICP . $resource;
        var_dump($url);
        $aux = $this->rest->callApi("POST", $url, $post); 
        return $aux;
    }
}
