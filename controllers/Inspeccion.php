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
	* Ingreso por barrera
	* @param array 
	* @return bool
	*/
    public function ingresoBarrera(){
        $this->load->view('barrera/barrera');
    }
}
