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
        // si esta vencida la sesion redirige al login
		$data = $this->session->userdata();
		// log_message('DEBUG','#Main/login | '.json_encode($data));
		if(!$data['email']){
			log_message('DEBUG','#TRAZA|DASH|CONSTRUCT|ERROR  >> Sesion Expirada!!!');
			redirect(DNATO.'main/login');
		}
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
    /**
	* Alta de una inspeccion
	* @param array datos de la inspeccion
	* @return bool
	*/
    public function agregarInspeccion($data){
        
        $post['_post_inspeccion'] = $data;
        $url = REST_SICP."/inspeccion";

        $aux = $this->rest->callAPI("POST",$url,$post);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | agregarInspeccion()  resp: >> " . json_encode($aux));

        return $aux;
    }
    /**
	* Agrega los permisos de transito de una inspeccion
	* @param array datos permisos de transito
	* @return bool true or false
	*/
    public function agregarPermisos($data){

        $batch_req = [];
        foreach ($data as $key) {
            $aux["perm_id"] = $key['perm_id'];
            $aux["lugar_emision"] = $key['lugar_emision'];
            $aux["fecha_hora_salida"] = $key['fecha_hora_salida'];
            $aux["tipo"] = $key['tipo'];
            $aux["usuario_app"] = userNick();
            $aux["case_id"] = $key['case_id'];


            $batch_req['_post_inspeccion_permiso_batch_req']['_post_inspeccion_permiso'][] = $aux;
        }

        $url = REST_SICP."/_post_inspeccion_permiso_batch_req";
        $rsp = $this->rest->callApi('POST', $url, $batch_req);
        
        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | agregarPermisos()  resp: >> " . json_encode($rsp));
        return $rsp;
    }
    /**
	* Agrega los destinos de una inspeccion
	* @param array datos destinos
	* @return bool true or false
	*/
    public function agregarEmpresas($data){

        $batch_req = [];
        foreach ($data as $key) {
            $aux["rol"] = $key['rol'];
            $aux["empr_id"] = $key['empr_id'];
            $aux["case_id"] = $key['case_id'];
            $aux["usuario_app"] = userNick();
            $aux["depo_id"] = $key['depo_id'];


            $batch_req['_post_inspeccion_empresa_batch_req']['_post_inspeccion_empresa'][] = $aux;
        }

        $url = REST_SICP."/_post_inspeccion_empresa_batch_req";
        $rsp = $this->rest->callApi('POST', $url, $batch_req);
        
        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | agregarEmpresas()  resp: >> " . json_encode($rsp));
        return $rsp;
    }
    /**
	* Agrega los termicos de una inspeccion
	* @param array datos termicos
	* @return bool true or false
	*/
    public function agregarTermicosInspeccion($data){

        $batch_req = [];
        foreach ($data as $key) {
            $aux["temperatura"] = $key['temperatura'];
            $aux["precintos"] = $key['precintos'];
            $aux["usuario_app"] = userNick();
            $aux["case_id"] = $key['case_id'];
            $aux["term_id"] = $key['term_id'];


            $batch_req['_post_inspeccion_termico_batch_req']['_post_inspeccion_termico'][] = $aux;
        }

        $url = REST_SICP."/_post_inspeccion_termico_batch_req";
        $rsp = $this->rest->callApi('POST', $url, $batch_req);
        
        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | agregarTermicosInspeccion()  resp: >> " . json_encode($rsp));
        return $rsp;
    }
    /**
	* Alta de termicos
	* @param array datos termicos
	* @return 
	*/
    public function agregarTermicos($data){
        
        $url = REST_SICP."/termico";

        foreach ($data as $key) {
            $aux["patente"] = $key['term_id'];
            $aux["usuario_app"] = userNick();


            $post['_post_termico'] = $aux;
            $this->rest->callApi('POST', $url, $post);
        }
        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | agregarTermicos() ");
    }
}
