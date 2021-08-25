<?php defined('BASEPATH') or exit('No direct script access allowed');

class Inspeccion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Inspecciones');
    }

    public function index()
    {
      $this->load->view('test');
    }

	/**
	* Ingreso por barrera
	* @param array 
	* @return bool
	*/
    public function ingresoBarrera(){
        $this->load->view('barrera/barrera');
    }

    /* COMPONENTE INSPECCION */
    public function inspecciones(){

        $this->load->view('inspeccion/inspeccion',$data);
    }
    /* FIN COMPONENTE INSPECCION */
    /**
	* Guarda Chofer
	* @param array datos chofer
	* @return bool true o false segun resultado de servicio de guardadobuscarChoferes
	*/
    public function agregarChofer(){

        $data = $this->input->post('data');
        $data['usuario_app'] = userNick();
        
		$resp = $this->Inspecciones->agregarChofer($data);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
    /**
	* Busca Choferes que coincidan con un patron ingresado
	* @param array patron ingresado en pantalla
	* @return array listado de choferes coincidentes con el criterio de busqueda
	*/
    public function buscaChoferes(){

        $dato = $this->input->get('patron');
        
		$resp = $this->Inspecciones->buscaChoferes($dato);
        
		if ($resp) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
    /**
	* Guarda Empresa, lo reutilizo para establecimiento, empresa y transportista
	* @param array datos Empresa
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarEmpresa(){

        $data = $this->input->post('data');
        $data['usuario_app'] = userNick();
        
		$resp = $this->Inspecciones->agregarEmpresa($data);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Busca empresas que coincidan con un patron ingresado
	* @param string patron ingresado
	* @return array listado de empresas coincidentes con patron
	*/
    public function buscaEmpresas(){

        $dato = $this->input->get('patron');
        
		$resp = $this->Inspecciones->buscaEmpresas($dato);
        
		if ($resp) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
    /**
	* Guarda deposito
	* @param array datos deposito
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarDeposito(){

        $data = $this->input->post('data');
        
		$resp = $this->Inspecciones->agregarDeposito($data);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Busca depositos por id de empresa
	* @param string empr_id
	* @return array listado de depositos coincidentes con id
	*/
    public function getDepositos(){

        $dato = $this->input->post('destino');
        
		$resp = $this->Inspecciones->getDepositos($dato['empr_id']);
        
		if ($resp) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Obtiene inspeccion por case_id
	* @param string case_id
	* @return array informacion cargada para un inspeccion
	*/
    public function getInspeccion(){

        $caseId = $this->input->post('caseId');
        
		$resp = $this->Inspecciones->getInspeccion($caseId['case_id']);
        
		if ($resp) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Alta de una inspeccion
	* @param array datos inspeccion
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarInspeccion(){
		
        $data['case_id'] = $this->input->post('case_id');
		$data['patente_tractor'] =  !empty($this->input->post('patente_tractor'))? $this->input->post('patente_tractor') : "";
		$data['nro_senasa'] =  !empty($this->input->post('nro_senasa'))? $this->input->post('nro_senasa') : "";
		$data['productos'] =  !empty($this->input->post('productos'))? $this->input->post('productos') : "";
		$data['reprecintado'] =  !empty($this->input->post('reprecintado'))? $this->input->post('reprecintado') : "false";
		$data['bruto'] =  !empty($this->input->post('bruto'))? $this->input->post('bruto') : "";
		$data['tara'] =  !empty($this->input->post('tara'))? $this->input->post('tara') : "";
		$data['ticket'] =  !empty($this->input->post('ticket'))? $this->input->post('ticket') : "";
		$data['resultado'] =  !empty($this->input->post('inspValida'))? $this->input->post('inspValida') : "";
		$data['cant_fajas'] =  !empty($this->input->post('cant_fajas'))? $this->input->post('cant_fajas') : "";
		$data['bruto_reprecintado'] =  !empty($this->input->post('bruto_reprecintado'))? $this->input->post('bruto_reprecintado') : "";
		$data['ticket_reprecintado'] =  !empty($this->input->post('ticket_reprecintado'))? $this->input->post('ticket_reprecintado') : "";
        $data['usuario_app'] = userNick();
		$data['petr_id'] =  !empty($this->input->post('petr_id'))? $this->input->post('petr_id') : "";
		$data['chof_id'] =  !empty($this->input->post('chof_id'))? $this->input->post('chof_id') : "";
		$data['inca_id'] =  !empty($this->input->post('inca_id'))? $this->input->post('inca_id') : "";
		$data['observaciones'] =  !empty($this->input->post('observaciones'))? $this->input->post('observaciones') : "";
		$data['info_id_doc'] =  !empty($this->input->post('info_id_doc'))? $this->input->post('info_id_doc') : "";

		$resp = $this->Inspecciones->agregarInspeccion($data);
        
		if ($resp['status']) {
			
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Guarda todos la informacion relacionada con la inspeccion
	* @param array con permisos,empresas y termicos
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function guardarDatosInspeccion(){
		
		$permisos = $this->input->post('permisos');
        $empresas = $this->input->post('empresas');
		$termicos = $this->input->post('termicos');
		$infraccion = $this->input->post('infraccion');

		//Agrego permisos
		$rspPermisos = $this->Inspecciones->agregarPermisos($permisos);

		//Agrego empresas
		$respEmpresas = $this->Inspecciones->agregarEmpresas($empresas);

		//Agrego termicos a la tabla termicos
		$this->Inspecciones->agregarTermicos($termicos);

		//Luego los agrego a tabla inspecciones_termicos
		$respTermInspeccion = $this->Inspecciones->agregarTermicosInspeccion($termicos);

		//Puede o no tener una infraccion asociada
		if(!empty($infraccion)){
			$respInfraccion = $this->Inspecciones->agregarInfraccion($infraccion);
		}
		
        //Armo mensajeria para reportar respuestas de los servicios
		if ($respTermInspeccion['status'] && $rspPermisos['status'] && $respEmpresas['status']) {
			$resp['status'] = true;
			$resp['message'] = "Se agregaron permisos, empresas y termicos correctamente";

			if($respInfraccion['status']){
				$resp['msjInfraccion'] = "Se agrego la infraccion correctamente";
			}else{
				$resp['msjInfraccion'] = $respInfraccion['data'];
			}
			echo json_encode($resp);
		} else {
			$resp['status'] = false;
			$resp['message'] = "Se produjo un error guardando los datos";
			$resp['permisos'] = $rspPermisos['data'];
			$resp['empresas'] = $respEmpresas['data'];
			$resp['termicos'] = $respTermInspeccion['data'];

			if($respInfraccion['status']){
				$resp['msjInfraccion'] = "Se agrego la infraccion correctamente";
			}else{
				$resp['msjInfraccion'] = $respInfraccion['data'];
			}
			echo json_encode($resp);
		}
    }

	/**
	* Elimina permiso de la inspeccion
	* @param array perm_id
	* @return bool true o false segun resultado de servicio de borrado
	*/
    public function eliminarPermiso(){

        $data = $this->input->post('data');
        
		$resp = $this->Inspecciones->eliminarPermiso($data);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }

	/**
	* Elimina empresa de la inspeccion
	* @param array perm_id
	* @return bool true o false segun resultado de servicio de borrado
	*/
    public function eliminarEmpresa(){

        $data = $this->input->post('data');
        
		$resp = $this->Inspecciones->eliminarEmpresa($data);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }

	/**
	* Elimina termico de la inspeccion
	* @param array perm_id
	* @return bool true o false segun resultado de servicio de borrado
	*/
    public function eliminarTermico(){

        $data = $this->input->post('data');
        
		$resp = $this->Inspecciones->eliminarTermico($data);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Limpia las tablas anexas a inspeccion
	* @param array con permisos,empresas y termicos
	* @return bool true o false segun resultado de servicio de borrado
	*/
    public function limpiarDataPreCargada(){
		
		$caseId = $this->input->post('caseId');

		//Elimino permisos de inspeccion
		$rspPermisos = $this->Inspecciones->eliminarPermiso($caseId);

		//Elimino empresas de inspeccion
		$respEmpresas = $this->Inspecciones->eliminarEmpresa($caseId);
		
		//Elimino termicos de inspeccion
		$respTermicos = $this->Inspecciones->eliminarTermico($caseId);
		
        
		if ($respTermicos['status'] && $rspPermisos['status'] && $respEmpresas['status']) {
			$resp['status'] = true;
			$resp['message'] = "Se limpiaron las tablas permisos_transito, inspecciones_empresas y inspecciones_termicos correctamente";
			echo json_encode($resp);
		} else {
			$resp['status'] = false;
			$resp['message'] = "Se produjo un error guardando los datos";
			$resp['permisos'] = $rspPermisos['data'];
			$resp['empresas'] = $respEmpresas['data'];
			$resp['termicos'] = $respTermicos['data'];
			echo json_encode($resp);
		}
    }
	/**
	* Alta de un documento
	* @param array datos documento
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarDocumento(){
		
		$data['fec_emision'] = date('Y-m-d');
		$data['num_documento'] =  !empty($this->input->post('num_documento'))? $this->input->post('num_documento') : "";
        $data['usuario_app'] = userNick();
		$data['tido_id'] =  !empty($this->input->post('tido_id'))? $this->input->post('tido_id') : "";
		$data['imag_id'] =  !empty($this->input->post('imag_id'))? $this->input->post('imag_id') : "";
		$data['empr_id_emisor'] =  !empty($this->input->post('empr_id_emisor'))? $this->input->post('empr_id_emisor') : "";
		$data['empr_id_destino'] =  !empty($this->input->post('empr_id_destino'))? $this->input->post('empr_id_destino') : "";
        $data['case_id'] = $this->input->post('case_id');

		$resp = $this->Inspecciones->agregarDocumento($data);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Alta de detalle para un documento
	* @param array datos del detalle del documento
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function guardarDetallesDocumentos(){
		$detalles = $this->input->post('detalles');

		$resp = $this->Inspecciones->guardarDetallesDocumentos($detalles);

		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Eliminar documento
	* @param array con permisos,empresas y termicos
	* @return bool true o false segun resultado de servicio de borrado
	*/
    public function eliminarDocumento(){
		
		$documento = $this->input->post('documento');

		// $resp = $this->Inspecciones->eliminarDocumento($documento);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
}
