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
        
        $url = REST_SICP."/empresas/patron/".urlencode($dato);

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
            $aux["fecha_hora_salida"] = date_format(date_create($key['fecha_hora_salida']),'Y-m-d H:i:s');
            $aux["tipo"] = $key['tipo'];
            $aux["usuario_app"] = userNick();
            $aux["case_id"] = $key['case_id'];
            $aux["soli_num"] = $key['soli_num'];
            $aux["origen"] = $key['origen'];
            $aux["productos"] = $key['productos'];
            $aux["neto"] = $key['neto'];
            $aux["bruto"] = $key['bruto'];
            $aux["temperatura"] = $key['temperatura'];

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
            $aux["productos"] = $key['productos'];


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
        /**
	* Agregar una infraccion a la inspeccion
	* @param array datos termicos
	* @return 
	*/
    public function agregarInfraccion($data){

        $data["usuario_app"] = userNick();

        $post['_post_inspeccion_infraccion'] = $data;
        $url = REST_SICP."/inspeccion/infraccion";

        $aux = $this->rest->callAPI("POST",$url,$post);
        
        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | agregarInfraccion() ");
    }
    /**
	* Baja de un permiso en una inspeccion
	* @param array perm_id del permiso
	* @return bool
	*/
    public function eliminarPermiso($data){
        
        $post['_delete_inspeccion_permiso'] = $data;
        $url = REST_SICP."/inspeccion/permiso";

        $aux = $this->rest->callAPI("DELETE",$url,$post);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | eliminarPermiso()  resp: >> " . json_encode($aux));

        return $aux;
    }
    /**
	* Baja de una empresa en una inspeccion
	* @param array datos del permiso
	* @return bool
	*/
    public function eliminarEmpresa($data){
        
        $post['_delete_inspeccion_empresa'] = $data;
        $url = REST_SICP."/inspeccion/empresa";

        $aux = $this->rest->callAPI("DELETE",$url,$post);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | eliminarEmpresa()  resp: >> " . json_encode($aux));

        return $aux;
    }
    /**
	* Baja de un termico en una inspeccion
	* @param array datos del termico
	* @return bool
	*/
    public function eliminarTermico($data){
        
        $post['_delete_inspeccion_termico'] = $data;
        $url = REST_SICP."/inspeccion/termico";

        $aux = $this->rest->callAPI("DELETE",$url,$post);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | eliminarTermico()  resp: >> " . json_encode($aux));

        return $aux;
    }
    /**
	* Alta de documento
	* @param array datos del documento
	* @return bool
	*/
    public function agregarDocumento($data){
        
        $post['_post_documento'] = $data;
        $url = REST_SICP."/documento";

        $aux = $this->rest->callAPI("POST",$url,$post);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | agregarDocumento()  resp: >> " . json_encode($aux));

        return $aux;
    }
    /**
	* Alta de los detalles de documento
	* @param array datos de los detalles del documento
	* @return bool
	*/
    public function guardarDetallesDocumentos($data){
        
        $url = REST_SICP."/_post_docdetlist_batch_req";
        $batch_req = [];

        foreach ($data as $key) {
            $aux['cantidad'] = $key['cantidad'];
            $aux['precio_unitario'] =  $key['precio_unitario'];
            $aux['unidades'] =  $key['unidades'];
            $aux['descuento'] =  $key['descuento'];
            $aux['usuario_app'] = userNick();
            $aux['docu_id'] = $key['num_documento'];
            $aux['tido_id'] = $key['tido_id'];
            $aux['tipr_id'] = $key['tipr_id'];
            $aux['unme_id'] = $key['unme_id'];

            $batch_req['_post_docdetlist_batch_req']['_post_docdetlist'][] = $aux;

        }
        
        $rsp = $this->rest->callApi('POST', $url, $batch_req);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | guardarDetallesDocumentos() ".json_encode($rsp));
        return $rsp;
    }
    /**
	* Obtengo la informacion de la inspeccion cargada
	* @param int case_id
	* @return array informacion de la inspeccion ya sea la inspeccion o pre carga
	*/
    public function getInspeccion($case_id){
        
        $url = REST_SICP."/inspeccion/id/".$case_id;

        $aux = $this->rest->callAPI("GET",$url);
        $resp = json_decode($aux['data']);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | getInspeccion() >> ");

        return $resp->inspeccion;
    }
    /**
	* Baja de un documento en una inspeccion
	* @param array case_id
	* @return bool
	*/
    public function eliminarDocumento($data){
        
        $post['_delete_inspeccion_documento'] = $data;
        $url = REST_SICP."/documento";

        $aux = $this->rest->callAPI("DELETE",$url,$post);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | eliminarDocumento()  resp: >> " . json_encode($aux));

        return $aux;
    }
    /**
	* Edicion de documento
	* @param array datos del documento a editar
	* @return bool
	*/
    public function editarDocumento($data){
        
        $url = REST_SICP."/documento";

            $aux['num_documento'] = $data['num_documento'];
            $aux['fec_emision'] =  $data['fec_emision'];
            $aux['usuario_app'] = userNick();
            $aux['tido_id'] = $data['tido_id'];
            $aux['imag_id'] = $data['imag_id'];
            $aux['empr_id_emisor'] = $data['empr_id_emisor'];
            $aux['empr_id_destino'] = $data['empr_id_destino'];

            $post['_put_documento'] = $aux;
            $rsp = $this->rest->callApi('PUT', $url, $post);
        

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | editarDocumento() ".json_encode($rsp));
        return $rsp;
    }
    /**
	* Edicion del detalle de un documento
	* @param array datos del documento
	* @return bool
	*/
    public function editarDetalleDocumento($detalle){
        
        $url = REST_SICP."/documento/detalle";

            $aux['cantidad'] = $detalle['cantidad'];
            $aux['precio_unitario'] =  !empty($detalle['precio_unitario']) ? $detalle['precio_unitario'] : '';
            $aux['descuento'] =  $detalle['descuento'];
            $aux['usuario_app'] = userNick();
            $aux['tipr_id'] = $detalle['tipr_id'];
            $aux['unme_id'] = $detalle['unme_id'];
            $aux['dedo_id'] = $detalle['dedo_id'];
            $aux['unidades'] =  $detalle['unidades'];


            $post['_put_documento_detalle'] = $aux;
            $rsp = $this->rest->callApi('PUT', $url, $post);
        

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | editarDetalleDocumento() ");
        return $rsp;
    }
    /**
	* Alta de documento
	* @param array datos del documento
	* @return bool
	*/
    public function agregarDetalleDocumento($data){
        
        $url = REST_SICP."/documento/detalle";

        $aux['cantidad'] = $data['cantidad'];
        $aux['precio_unitario'] =  !empty($data['precio_unitario']) ? $data['precio_unitario'] : '';
        $aux['unidades'] =  $data['unidades'];
        $aux['descuento'] =  $data['descuento'];
        $aux['usuario_app'] = userNick();
        $aux['docu_id'] = $data['num_documento'];
        $aux['tido_id'] = $data['tido_id'];
        $aux['tipr_id'] = $data['tipr_id'];
        $aux['unme_id'] = $data['unme_id'];


        $post['_post_documento_detalle'] = $aux;
        $rsp = $this->rest->callApi('POST', $url, $post);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | agregarDetalleDocumento() >>".json_encode($rsp));
        return $rsp;
    }
    /**
	* Baja de un detalle de documento en una inspeccion
	* @param array dedo_id
	* @return bool true or false 
	*/
    public function eliminarDetalleDocumento($data){
        
        $post['_delete_documento_detalle'] = $data;
        $url = REST_SICP."/documento/detalle";

        $aux = $this->rest->callAPI("DELETE",$url,$post);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | eliminarDocumento()  resp: >> " . json_encode($aux));

        return $aux;
    }
    /**
        * Agregar batch con los tipos de infracciones
        * @param array datos termicos
        * @return 
	*/
    public function agregarTiposInfraccion($data){

        $url = REST_SICP."/_post_inspeccion_infraccion_detalle_batch_req";
        $batch_req = [];

        foreach ($data as $key) {
            $aux['tiin_id'] = $key['tiin_id'];
            $aux['case_id'] =  $key['case_id'];
            $aux['usuario_app'] = userNick();

            $batch_req['_post_inspeccion_infraccion_detalle_batch_req']['_post_inspeccion_infraccion_detalle'][] = $aux;

        }
        
        $rsp = $this->rest->callApi('POST', $url, $batch_req);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | agregarTiposInfraccion() ".json_encode($rsp));
        return $rsp;
    }
}
