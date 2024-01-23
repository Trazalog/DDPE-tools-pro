<?php defined('BASEPATH') or exit('No direct script access allowed');

class Actas_notificacion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Actasnotificacion');
		$this->load->model('core/Valores');
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
		// var_dump($data['actas']);
        $this->load->view('actasNotificacion/listar_actas_notificacion', $data);
    }

    /**
	* Guarda acta
	* @param array acta
	* @return bool true o false segun resultado de servicio de guardado
	*/
	function guardarActa()
	{
		$data = $this->input->post('datos');
		$tabla = 'numerador_actas_sicpoa';
		$nro = $this->Valores->getValor($tabla);
		if (!$nro) {
			$acta['acno_id'] = '1';
		} else {
			$nuevoNro = $nro[0]->valor2 + 1;
			$acta['acno_id'] = strval($nuevoNro);
		}
		$fechaHoraString = $data['fechaActa'] . ' ' . $data['horaActa'];
		$acta['fec_hora'] = date('Y-m-d H:i:s', strtotime($fechaHoraString));
		$acta['texto'] = $data['texto'];
		$acta['usuario_app'] = userNick();
		$acta['empr_id'] = empresa();

		$resp = $this->Actasnotificacion->guardarActa($acta);
		/* Actualizo o creo nuevo registro en core.tablas con 'numerador_actas_sicpoa' */
		if($resp['status']){
			$datos['tabla'] = $tabla;
			if(!$nro){
				$datos['valor'] = 'contador';
				$datos['valor2'] = '1';
				$datos['valor3'] = '';
				$datos['descripcion'] = $tabla;
				$rsp = $this->Valores->guardarValor($datos);
			}
			else 
			{
				$dato['valor'] = 'contador';
				$dato['valor2'] = strval($nuevoNro);
				$dato['valor3'] = '';
				$dato['descripcion'] = $tabla;
				$dato['tabl_id'] = $nro[0]->tabl_id;
				$rsp = $this->Valores->editarValor($dato);
			}
		}
    	
		if($resp){
			log_message('DEBUG', '#TRAZA | ACTAS | guardarActa() >> $datos: '.$acta);
			echo json_encode($acta);
		}else{
			log_message('ERROR', '#TRAZA | #SICPOA | ACTAS | >> guardarActa()  >> ERROR TREMENDO');
			echo json_encode($rsp);
		}
	}

	/**
	* Borrado lógico de acta por ID
	* @param
	* @return bool true o false
	*/
	public function eliminarActa()
	{
		log_message('INFO','#TRAZA | ACTAS | eliminarActa() >> ');
		$acno_id = $this->input->post('acno_id');
		$resp = $this->Actasnotificacion->eliminarActa($acno_id);
		echo json_encode($resp);
	}
	
	/**
        * Trae información pertinente al acta de notificacion para ser impresa
        *@param 
        *@return array view con datos de la notificacion
    */
    public function cargar_detalle_acta(){

        $acno_id = $this->input->get('acno_id');
        $data['acta_notificacion'] = $this->Actasnotificacion->getPreCargaDatos($acno_id);
        //Formateo la fecha de inspeccion para los input's
        $fecAux = explode(' ', $data['acta_notificacion']->fec_hora);
        $data['horaInspeccion'] = $fecAux[1];
        $data['diaInspeccion'] = date('d',strtotime($fecAux[0]));
        $data['mesInspeccion'] = date('m',strtotime($fecAux[0]));
        $data['anioInspeccion'] = date('Y',strtotime($fecAux[0]));

		$this->load->view(SICP . "actas/acta_notificacion", $data);
    }  
}
