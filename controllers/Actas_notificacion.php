<?php defined('BASEPATH') or exit('No direct script access allowed');

class Actas_notificacion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Actasnotificacion');
        // si esta vencida la sesion redirige al login
		$data = $this->session->userdata();
		if(!$data['email']){
			log_message('DEBUG','#TRAZA|DASH|CONSTRUCT|ERROR  >> Sesion Expirada!!!');
			redirect(DNATO.'main/login');
		}
    }

    /**
	* Index: carga pantalla con listado de actas
	* @param array 
	* @return 
	*/
    public function index(){
        $data['actas'] = $this->Actasnotificacion->obtenerActas(empresa())['data'];
        $this->load->view('actasNotificacion/listar_actas_notificacion', $data);
    }

    /**
	* Guarda acta
	* @param array acta
	* @return bool true o false segun resultado de servicio de guardado
	*/
	function guardarActa()
	{
		$acta = $this->input->post('datos');
        // $fechita => date('Y-m-d H:i:s', strtotime($acta['fec_hora']))
        // $acta['fec_hora'] = $fechita;
		$acta['usuario_app'] = userNick();
		$acta['empr_id'] = empresa();
        // $valorAcnoId = '7';
        // 'acno_id' => (int)$valorAcnoId
		// $acta['acno_id'] = (int)$valorAcnoId;
		$acta['acno_id'] = '7';
        // var_dump($acta);
		$resp = $this->Actasnotificacion->guardarActa($acta);
		echo json_encode($resp);
    	log_message('ERROR', '#TRAZA | ACTAS | guardarActa() >> $datos: '.$acta);
	}
    
  
}
