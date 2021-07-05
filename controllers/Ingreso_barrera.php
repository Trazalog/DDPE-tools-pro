<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ingreso_barrera extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ingresosbarrera');
    }

    /**
	* Index: carga pantalla con listado de ingresos por barrera
	* @param array 
	* @return 
	*/
    public function index(){
       
        $data['unidad_medida_tiempo'] = $this->Ingresosbarrera->seleccionarUnidadMedidaTiempo()['data'];

        $data['clientes'] = $this->Ingresosbarrera->getClientes(empresa())['data'];

        $data['pedidos'] = $this->Ingresosbarrera->obtener(empresa())['data'];

        $url_info= $_SERVER["REQUEST_URI"];

        $components = parse_url($url_info);

        parse_str($components['query'], $results);
    
        $proccessname = $results['proccessname']; 

        $this->session->set_userdata('proccessname', $proccessname);

      $this->load->view('ingresoBarrera/listar_ingresos_barrera', $data);
    }

    /**
	* carga la vista con el formulario del ingreso por barrera
	* @param array 
	* @return string carga vista para el modal con formulario ingreso por barrera
	*/
    public function view_ingreso(){
       
        $data['unidad_medida_tiempo'] = $this->Ingresosbarrera->seleccionarUnidadMedidaTiempo()['data'];
        $data['clientes'] = $this->Ingresosbarrera->getClientes(empresa())['data'];

        $url_info= $_SERVER["REQUEST_URI"];

        $components = parse_url($url_info);

        parse_str($components['query'], $results);
    
        $this->load->view('ingresoBarrera/ingreso_barrera', $data);
     
    }


    public function cargar_datos_detalle(){

    }
    
  
    /**
	* Lanza el proceso de guardado del ingreso por barrera en BPM bonita, IDEM guardarPedidoTrabajo()
	* @param array 
	* @return string guarda el formulario de ingreso por barrera y lanza el proceso en bonita
	*/
    public function guardarIngresoBarrera(){

        $proccessname = $this->session->userdata('proccessname');
        $empr_id = empresa();
        $user_app = userNick();
        $proceso = $this->Ingresosbarrera->procesos()->proceso;
        // $esin_id = $proceso->esin_id;

        $lanzar_bpm = $proceso->lanzar_bpm;
        $info_id = $this->input->post('info_id');

        $data['_post_pedidotrabajo'] = array(

            'cod_proyecto' => $proceso->nombre."->".$info_id,
            'descripcion' => $proceso->descripcion,
            'estado' => $proceso->esin_id,
            'objetivo' => "6",
            'fec_inicio' => "2021-06-29",
            'fec_entrega' => "2021-12-31",
            'usuario_app' => $user_app,
            'umti_id' => "unidad_medida_tiempoMeses",
            'info_id' => $this->input->post('info_id'),
            'proc_id' =>  $proccessname,
            'empr_id' => $empr_id,
            'clie_id' => "6",
            'tipt_id' => "tipos_pedidos_trabajoneumaticos", 

        );

        $rsp = $this->Ingresosbarrera->guardarPedidoTrabajo($data);
        
        $status = ($rsp['status']);

        $dato  = json_decode($rsp['data']);

        $petr_id  = $dato->respuesta->petr_id;

        if ($status == true) {

            // $respuesta = json_encode($rsp);

            // echo $respuesta;

            if ($lanzar_bpm == "true") {
                $this->BonitaProcess($petr_id);
                
                echo json_encode($rsp);

            } else {
                log_message('DEBUG', '#TRAZA | #SICPOA | Ingreso_barrera | >> guardarPedidoTrabajo   >> lanzar_bpm viene false');
            }

        } elseif ($status == false) {

            log_message('ERROR', '#TRAZA | #SICPOA | Ingreso_barrera | >> guardarPedidoTrabajo  >> ERROR al guardar pedido de trabajo Status false');

            $this->eliminarPedidoTrabajo($petr_id);

            echo json_encode($rsp);

        } else {

            log_message('DEBUG', '#TRAZA | #SICPOA | Ingreso_barrera | >> guardarPedidoTrabajo  >> ERROR TREMENDO');

            $this->eliminarPedidoTrabajo($petr_id);

            echo json_encode($rsp);


        }

    }

    public function BonitaProcess($petr_id){
      
        $data = array(
            'p_petrId' => $petr_id);

        $rsp = $this->Ingresosbarrera->lanzarBonitaProcess($data);
        $case_id = json_decode($rsp['data']['caseId']);

        if ($case_id) {
            log_message('DEBUG', '#TRAZA | #SICPOA | Ingreso_barrera | >> BonitaProcess  >> TODO OK - se lanzo proceso correctamente');
            $this->ActualizarCaseId($case_id, $petr_id);
        }else{
            log_message('ERROR', '#TRAZA | #SICPOA | Ingreso_barrera | >> BonitaProcess  >> ERROR AL LANZAR BONITA PROCESS');
            $this->eliminarPedidoTrabajo($petr_id);
        }
        return;
    }

    public function ActualizarCaseId($case_id, $petr_id)
    {

		$str_case_id = (string) $case_id;

        $data['_put_pedidotrabajo'] = array(

            "case_id" => $str_case_id,
            "petr_id" => $petr_id,

        );

        $rsp = $this->Ingresosbarrera->ActualizarCaseId($data);

        if (!$rsp) {

            log_message('ERROR', '#TRAZA | #SICPOA | Ingreso_barrera | >> ActualizarCaseId  >> ERROR AL ACTUALIZAR');

            return $rsp;

        } else {
            log_message('DEBUG', '#TRAZA | #SICPOA | Ingreso_barrera | >> ActualizarCaseId  >> TODO OK - se actualizo CaseId del pedido');

        }

    }

    public function eliminarPedidoTrabajo($petr_id)
    {
        $data['_delete_pedidotrabajo'] = array(
            'petr_id' => $petr_id,
        );

        $data = $this->Ingresosbarrera->eliminarPedidoTrabajo($data);

    }
		/**
		* Levanta pantalla Planificacion de Pedido de Trabajo
		* @param
		* @return
		*/
    public function dash()
    {
      $this->load->view('pedidos_trabajo/dash', $data);
    }
		/**
		* Agrega componente Pedidos Trabajo(en Planificacion Trabajos)
		* @param
		* @return 
		*/
    public function pedidosTrabajos($emprId)
    {

        $data['ots'] = $this->Ingresosbarrera->obtener($emprId)['data'];
        $this->load->view('pedidos_trabajo/lista_pedidos', $data);
    }
		/**
		* Agrega componente Hitos(en Planificacion Trabajos) si envia datos.
		* sino es asi,trae el listado de hitos guardados para ese pedido ese trabajo
		* @param
		* @return view listado de hitos de un pedido de trabajo
		*/
    public function hitos($petrId)
    {
        $post = $this->input->post();
        if($post)
        {
            $rsp = $this->Ingresosbarrera->guardarHito($petrId, $post);
            echo json_encode($rsp);
        }else{
						$data['hitos'] = $this->Ingresosbarrera->obtenerHitosXPedido($petrId)['data'];
					// AGREGADO DE MERGE DE CHECHO
						$data['info_id']="0".$this->Ingresosbarrera->obtenerInfoId($petrId)['data'];
						$data['petr_id'] = "0".$petrId;
					// FIN AGREGADO DE MERGE DE CHECHO
            $this->load->view('pedidos_trabajo/lista_hitos', $data);
        }
    }

    public function hito($hitoId = false)
    {  
        if($hitoId){
            $data['hito'] = $this->Ingresosbarrera->obtenerHito($hitoId)['data'][0];
            $this->load->view('pedidos_trabajo/detalle_hito', $data);
        }else{
            $this->load->view('pedidos_trabajo/form_hito');
        }
    }

    public function cambiarEstado()
    {
        $post  = $this->input->post();
        $rsp = $this->Ingresosbarrera->cambiarEstado($post['petrId'], $post['estado']);
        echo json_encode($rsp);
    }
}
