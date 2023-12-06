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
		// $fechaHoraString = $datos['fechaActa'] . ' ' . $datos['horaActa'];
		$acta['fec_hora'] = date('Y-m-d H:i:s', strtotime($fechaHoraString));
		$acta['texto'] = $data['texto'];
		$acta['usuario_app'] = userNick();
		$acta['empr_id'] = empresa();
		// $timestamp = strtotime($acta['fec_hora']);
        // $acta['fec_hora'] = $timestamp ;
		// $acta['fec_hora'] = date('Y-m-d\TH:i', $timestamp);
		// $acta['fec_hora'] = date('Y-m-d H:i:s', $acta['fec_hora']);

        // var_dump($acta);
		$resp = $this->Actasnotificacion->guardarActa($acta);
		/* Actualizo o creo nuevo registro en core.tablas con 'numerador_actas_sicpoa' */
		if($resp['status']){
			$datos['tabla'] = $tabla;
			if(!$nro){
				$datos['valor'] = 'contador';
				$datos['valor2'] = '1';
				$datos['valor3'] = '';
				$datos['descripcion'] = $tabla;
				$resp = $this->Valores->guardarValor($datos);
			}
			else 
			{
				$dato['valor'] = 'contador';
				$dato['valor2'] = strval($nuevoNro);
				$dato['valor3'] = '';
				$dato['descripcion'] = $tabla;
				$dato['tabl_id'] = $nro[0]->tabl_id;
				$resp = $this->Valores->editarValor($dato);
			}

			$resp['contador'] = $acta['nro'];
		}
		echo json_encode($resp);
    	log_message('ERROR', '#TRAZA | ACTAS | guardarActa() >> $datos: '.$acta);
	}
    
  
}
