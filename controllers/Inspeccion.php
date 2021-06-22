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
        $data['establecimientos'] = $this->Inspecciones->getEstablecimientos();
        $data['choferes'] = $this->Inspecciones->getChoferes();
        $data['empresas'] = $this->Inspecciones->getEmpresas();
        $data['depositos'] = $this->Inspecciones->getDepositos();
        $data['imgBarrera'] = $this->Inspecciones->getFotosBarrera();
        // $data['imgDocu'] = $this->Inspecciones->getFotosDocumentacion(); CAMBIAR
        $data['imgDocu'] = $this->Inspecciones->getFotosBarrera();
        
        $this->load->view('inspeccion/inspeccion',$data);
    }
    /* FIN COMPONENTE INSPECCION */
    /**
	* Guarda Chofer
	* @param array dni y nombre chofer
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarChofer(){

        $data = $this->input->post('datos');
        $data['usuario_app'] = userNick();
        log_message("ERROR", "DATA agregarChofer >>".json_encode($data));
		// $resp = $this->Inspecciones->agregarChofer($data);
        $resp = true;
		if ($resp != null) {
			return json_encode(true);
		} else {
			return json_encode(false);
		}
    }
    /**
	* Guarda Establecimiento
	* @param array nombre Establecimiento
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarEstablecimiento(){

        $data = $this->input->post('datos');
        $data['usuario_app'] = userNick();
        log_message("ERROR", "DATA agregarEstablecimiento >>".json_encode($data));
		// $resp = $this->Inspecciones->agregarEstablecimiento($data);
        $resp = true;
		if ($resp != null) {
			return json_encode(true);
		} else {
			return json_encode(false);
		}
    }
    /**
	* Guarda Empresa
	* @param array nombre Empresa
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarEmpresa(){

        $data = $this->input->post('datos');
        $data['usuario_app'] = userNick();
        log_message("ERROR", "DATA agregarEmpresa >>".json_encode($data));
		// $resp = $this->Inspecciones->agregarEmpresa($data);
        $resp = true;
		if ($resp != null) {
			return json_encode(true);
		} else {
			return json_encode(false);
		}
    }
    /**
	* Guarda Deposito
	* @param array nombre Deposito
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarDeposito(){

        $data = $this->input->post('datos');
        $data['usuario_app'] = userNick();
        log_message("ERROR", "DATA agregarDeposito >>".json_encode($data));
		// $resp = $this->Inspecciones->agregarDeposito($data);
        $resp = true;
		if ($resp != null) {
			return json_encode(true);
		} else {
			return json_encode(false);
		}
    }
    /**
	* Guarda Transportista
	* @param array nombre Transportista
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarTransportista(){

        $data = $this->input->post('datos');
        $data['usuario_app'] = userNick();
        log_message("ERROR", "DATA agregarTransportista >>".json_encode($data));
		// $resp = $this->Inspecciones->agregarTransportista($data);
        $resp = true;
		if ($resp != null) {
			return json_encode(true);
		} else {
			return json_encode(false);
		}
    }
}
