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
        $data['empr_id'] = empresa();
        
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

        // $dato = $this->input->get('empr_id');
		$dato = empresa();
        
		$resp = $this->Inspecciones->getDepositos($dato);
        
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
		$data['resultado'] =  !empty($this->input->post('resultado'))? $this->input->post('resultado') : "";
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
	* Guarda permisos de transito
	* @param array datos permisos de transito
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarPermisos(){
		
        $data = $this->input->post('permisos');
        
		$resp = $this->Inspecciones->agregarPermisos($data);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Guarda destinos
	* @param array datos destinos
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarEmpresas(){
		
        $data = $this->input->post('empresas');
        
		$resp = $this->Inspecciones->agregarEmpresas($data);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Guarda termicos
	* @param array datos termicos
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarTermicos(){
		
        $data = $this->input->post('termicos');
        
		$resp = $this->Inspecciones->agregarTermicos($data);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
    /**
	* Ingreso por barrera
	* @param array 
	* @return bool
	*/
    public function ingresoBarrera(){
        $this->load->view('barrera/barrera');
    }
}
