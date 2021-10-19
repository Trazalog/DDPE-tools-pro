<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ingresosbarrera extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function seleccionarUnidadMedidaTiempo(){
        $resource = '/tablas/unidad_medida_tiempo';
        $url = REST_CORE . $resource;
        return wso2($url);
    }

   //Obtiene datos de clientes 
    public function getClientes($empr_id){
        $resource = "/clientes/porEmpresa/$empr_id/porEstado/ACTIVO";
        $url = REST_CORE . $resource;
        return wso2($url);                                
    }
    
    /**
	* Obtiene los formularios asociados a un pedido de trabajo por petr_id
	* @param array $data petr_id
	* @return array data formularios asociados
	*/
    public function getFormularios($petr_id){
        $resource = "/pedidoTrabajo/petr_id/$petr_id";
        $url = REST_PRO . $resource;
        return wso2($url);     
                                   
    }

    /**
	* Guardo el formulario de pedido de trabajo HARCODEADO para SICPOA
	* @param array $data harcodeada
	* @return array con respuesta del service y petr_id
	*/
    public function guardarPedidoTrabajo($data){
        $url = REST_PRO . '/pedidoTrabajo';
        $rsp = $this->rest->callApi('POST', $url, $data);
        return $rsp;
    }
    /**
	* Elimino el ingreso por barrera(pedido de trabajo)
	* @param array $petr_id
	* @return array petr_id
	*/
    public function eliminarPedidoTrabajo($data)
    {
        $url = REST_PRO . "/pedidoTrabajo";
        return wso2($url, 'DELETE', $data);
    }

    /**
	* Lanza el proceso ingreso por barrera en BPM bonita
	* @param array contrato con petr_id y nombre_bpm que es el id del proceso en bonita a lanzar
	* @return string guarda el formulario de ingreso por barrera y lanza el proceso en bonita
	*/
    public function lanzarBonitaProcess($contract,$id_bpm_process){
        $rsp =  $this->bpm->lanzarProceso($id_bpm_process, $contract);
        log_message("ERROR","#TRAZA | #SICPOA | Ingresosbarrera | lanzarBonitaProcess  >> ".json_encode($rsp));
        
        return $rsp;
    }

    /**
	* Obtengo la informacion relacionada al proceso guardada en pro.procesos
	* @param $processname (se obtiene de la data del usuario processname que se le carga desde el menú)
	* @return array datos del proceso asociado
	*/
    public function procesos(){
        $proccessname = $this->session->userdata('proccessname');

        $resource = "/proceso/nombre/$proccessname/empresa/" . empresa();

        $url = REST_PRO . $resource;
        
        $array = $this->rest->callApi('GET', $url);

        return json_decode($array['data']);
    }

    public function ActualizarCaseId($data){
        $url = REST_PRO . "/pedidoTrabajo";
        $rsp = $this->rest->callApi('PUT', $url, $data);
        return $rsp;

    }

    public function obtener($emprId){
        $url = REST_PRO . "/pedidoTrabajo/$emprId";
        return wso2($url);
    }

    public function obtenerHitosXPedido($petrId){
        $url = REST_TST . "/pedidostrabajo/hitos/$petrId";
        return wso2($url);
    }

    public function obtenerHito($hitoId){
        $url = REST_TST . "/hitos/$hitoId";
        return wso2($url);
    }

    public function mapHito($data){
        $data['fec_inicio'] = date('Y-m-d', strtotime($data['fec_inicio'])) . '+00:00:00';
        $data['documento'] = isset($data['documento']) ? $data['documento'] : '';
        return payToStr($data);
    }

    public function guardarHito($petrId, $data){
        $data['petr_id'] = $petrId;
        $xdata['_post_hitos'] = $this->mapHito($data);
        $url = REST_TST."/hitos";
        return wso2($url, 'POST', $xdata);
    }

    public function cambiarEstado($petrId, $estado){
        $data['_put_pedidoTrabajo_estado'] = array('estado' => $estado, 'petr_id'=>"$petrId");
        $url = REST_PRO."/pedidoTrabajo/estado";
        return wso2($url, 'PUT', $data);
	}

	public function obtenerInfoId($petrId){
        $url = REST_PRO . "/info_id/$petrId";
        return wso2($url);
	}
     /**
	* Obtengo la informacion guardada en el ingreso por barrera
	* @param $info_id
	* @return array datos gaurdado en instancias_formularios
	*/
    public function getFormIngresoBarrera($info_id){

        $resource = "/formulario/" . $info_id;

        $url = REST_FRM . $resource;
        
        $array = $this->rest->callApi('GET', $url);

        return json_decode($array['data']);
    }
}
