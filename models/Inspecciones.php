<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
* Modelo de Inspecciones 
*
* @autor Rogelio Sanchez
*/
class Inspecciones extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
	* Alta rapida de un chofer 
	* @param array datos de chofer
	* @return bool
	*/
    public function agregarChofer($data){
        
        $post['_post_chofer'] = $data;
        $url = REST_SICP."/chofer";

        $aux = $this->rest->callAPI("POST",$url,$post);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | agregarChofer()  resp: >> " . json_encode($aux));

        return $aux;
    }

    /**
	* Busca choferes coincidentes con un criterio de búsqueda 
	* @param string patron en digitos numéricos
	* @return array listado de choferes coincidentes
	*/
    public function buscaChoferes($dato){
        
        $url = REST_SICP."/choferes/patron/".$dato;

        $aux = $this->rest->callAPI("GET",$url);
        $resp = json_decode($aux['data']);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | buscaChoferes()  resp: >> " . json_encode($resp));

        return $resp->choferes->chofer;
    }

    /**
	* Alta rapida de una empresa, establecimiento, transportista(son todas empresas) 
	* @param array datos de empresa
	* @return bool
	*/
    public function agregarEmpresa($data){
        
        $post['_post_empresa'] = $data;
        $url = REST_SICP."/empresa";

        $aux = $this->rest->callAPI("POST",$url,$post);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | agregarEmpresa()  resp: >> " . json_encode($aux));

        return $aux;
    }

    /**
	* Busca empresas coincidentes con un patron 
	* @param string patron
	* @return array listado de empresas coincidentes con patron
	*/
    public function buscaEmpresas($dato){
        
        $url = REST_SICP."/empresas/patron/".$dato;

        $aux = $this->rest->callAPI("GET",$url);
        $resp = json_decode($aux['data']);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | buscaEmpresas()  resp: >> " . json_encode($resp));

        return $resp->empresas->empresa;
    }

    /**
	* Alta rapida de un deposito
	* @param array datos de deposito
	* @return bool
	*/
    public function agregarDeposito($data){
        
        $post['_post_deposito_empresa'] = $data;
        $url = REST_SICP."/deposito/empresa";

        $aux = $this->rest->callAPI("POST",$url,$post);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | agregarDeposito()  resp: >> " . json_encode($aux));

        return $aux;
    }
    /**
	* Busca depositos para empresa destino seleccionada 
	* @param string empr_id
	* @return array listado de depositos coincidentes con empr_id
	*/
    public function getDepositos($dato){
        
        $url = REST_SICP."/depositos/empresa/".$dato;

        $aux = $this->rest->callAPI("GET",$url);
        $resp = json_decode($aux['data']);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | getDepositos()  resp: >> " . json_encode($resp));

        return $resp->depositos->deposito;
    }
}
