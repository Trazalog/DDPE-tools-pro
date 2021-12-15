<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ingreso_barrera extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ingresosbarrera');

        // si esta vencida la sesion redirige al login
		$data = $this->session->userdata();
		if(!$data['email']){
			log_message('DEBUG','#TRAZA|DASH|CONSTRUCT|ERROR  >> Sesion Expirada!!!');
			redirect(DNATO.'main/login');
		}
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

        //obtengo la data de la instancia del formulario dinamico
        //Le asigno la patente del ingreso por barrera
        foreach ($data['pedidos'] as $key) {
            $key->patente = $this->Ingresosbarrera->getFormIngresoBarrera($key->info_id)->formulario->items->item[4]->valor;
        }
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
        $puntosControl = $this->Ingresosbarrera->getPuntosControl();
        foreach ($puntosControl  as $key) {
            if($key->tabl_id == $this->session->userdata['puntoControl']){
                $data['puntoControl'] = $key->valor;
            }
        }
        
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
            'fec_inicio' => date('Y-m-d'),
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
                $this->BonitaProcess($petr_id, $proceso->nombre_bpm);
                
                echo json_encode($rsp);

            } else {
                log_message('ERROR', '#TRAZA | #SICPOA | Ingreso_barrera | >> guardarPedidoTrabajo   >> lanzar_bpm viene false');
            }

        } elseif ($status == false) {

            log_message('ERROR', '#TRAZA | #SICPOA | Ingreso_barrera | >> guardarPedidoTrabajo  >> ERROR al guardar pedido de trabajo Status false');

            $this->eliminarPedidoTrabajo($petr_id);

            echo json_encode($rsp);

        } else {

            log_message('ERROR', '#TRAZA | #SICPOA | Ingreso_barrera | >> guardarPedidoTrabajo  >> ERROR TREMENDO');

            $this->eliminarPedidoTrabajo($petr_id);

            echo json_encode($rsp);


        }

    }

    public function BonitaProcess($petr_id,$id_bpm_process){
      
        $data = array(
            'p_petrId' => $petr_id);

        $rsp = $this->Ingresosbarrera->lanzarBonitaProcess($data, $id_bpm_process);
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
    * Elimina el pedido de trabajo y el case en bonita
    * @param $petr_id y $case_id
    * @return bool
	*/
    public function eliminarIngresoBarreraLanzado()
    {
        $petr_id = $this->input->post('petr_id');
        $case_id = $this->input->post('case_id');

        //Id del proceso desde la tabla pro.procesos
        $processId = $this->Ingresosbarrera->procesos()->proceso->nombre_bpm;

        $data['_delete_pedidotrabajo'] = array(
            'petr_id' => $petr_id,
        );

        $respPetr = $this->Ingresosbarrera->eliminarPedidoTrabajo($data);

        if ($respPetr['status']) {

           log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | eliminarPedidoTrabajo() >> Ingreso por barrera eliminado correctamente');

           //una vez que cerramos el ingreso en barrera(pedido de trabajo) procedemos a cerrar el Case si este esta abierto
           $respCaso = $this->bpm->eliminarCaso($processId, $case_id);

           if ($respCaso['status']) {

               log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | eliminarCaso() >> Caso e Ingreso por barrera eliminados correctamente');
               
               echo json_encode($respCaso);

            } else {
                
                log_message('ERROR', '#TRAZA | #SICPOA | Sicpoatareas | eliminarCaso()  >> Error al eliminar CASE en BONITA');

                echo json_encode($respCaso);
           }
        } else {
            
            log_message('ERROR', '#TRAZA | #SICPOA | Sicpoatareas | eliminarPedidoTrabajo() >> Error al eliminar Ingreso por barrera');

            echo json_encode($respPetr);
        }
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

    public function cambiarEstado()
    {
        $post  = $this->input->post();
        $rsp = $this->Ingresosbarrera->cambiarEstado($post['petrId'], $post['estado']);
        echo json_encode($rsp);
    }
    /**
	* Trae comentarios segun Case_id
	*@param case_id (metodo GET)
    *@return view componete comentarios
	*/
    public function cargar_detalle_comentario(){

        $case_id = $this->input->get('case_id');    
        
        $data_aux = ['case_id' => $case_id, 'comentarios' => $this->bpm->ObtenerComentarios($case_id)];
        
        $data['comentarios'] = $this->load->view(BPM.'tareas/componentes/comentarios', $data_aux, true);
        
        echo $data['comentarios'];
    }
    
    
    /**
        * Trae trazabilidad de un pedido segun case_id
        *@param case_id ,processId. (metodo GET)
        *@return array componete BPM trazabilidad
    */
    public function cargar_detalle_linetiempo(){
    
        $case_id = $this->input->get('case_id');               
            
        //Id del proceso desde la tabla pro.procesos
        $processId = $this->Ingresosbarrera->procesos()->proceso->nombre_bpm;
    
        //LINEA DE TIEMPO
        $data['timeline'] =$this->bpm->ObtenerLineaTiempo($processId, $case_id);
    
        echo timeline($data['timeline']);
     
    }
    
    /**
        * Trae formularios asociados al pedido de trabajo segun petr_id
        *@param case_id ,petr_id, processId. (metodo GET)
        *@return array forularios
    */
    public function cargar_detalle_formulario(){
    
        $case_id = $this->input->get('case_id');        
        $petr_id = $this->input->get('petr_id');

        //Id del proceso desde la tabla pro.procesos
        $processId = $this->Ingresosbarrera->procesos()->proceso->nombre_bpm;

        $data['formularios'] = $this->Ingresosbarrera->getFormularios($petr_id)['data'];
        
        $this->load->view(BPM.'pedidos_trabajo/tbl_formularios_pedido', $data);
       
    
    }

    /**
        * Trae información pertinente a la inspeccion para ser impresa
        *@param 
        *@return array view con datos de la inspeccion
    */
    public function cargar_detalle_acta(){
    
        $this->load->model('Sicpoatareas');
        $case_id = $this->input->get('case_id');
        $petr_id = $this->input->get('petr_id');

        // $data['petr_id'] = $petr_id;
        $data['inspeccion'] = $this->Sicpoatareas->getPreCargaDatos($case_id);

        //Separo las empresas por su rol
        $empresas = $data['inspeccion']->empresas->empresa;

        if(!empty($empresas)){
            foreach($empresas as $key => $value){
                
                if($value->rol == "DESTINO"){
                    $data['destinos'][$key] = $value;

                }elseif ($value->rol == "ORIGEN") {
                    $data['origen'] = $value;

                }elseif($value->rol == "TRANSPORTISTA"){
                    $data['transportista'] = $value;

                }
            }
        }

        $puntosControl = $this->Ingresosbarrera->getPuntosControl();
        foreach ($puntosControl  as $key) {
            if($key->tabl_id == $this->session->userdata['puntoControl']){
                $data['infoPuntoControl']['domicilio'] = $key->valor2;
                $data['infoPuntoControl']['nombre'] = $key->descripcion;
            }
        }
        
        $formulario = $this->Ingresosbarrera->getFormularios($petr_id);
        $escaneoInfoId = $formulario['data'][0]->forms->form[0]->info_id;
        $data['escaneoInfoId'] = $escaneoInfoId;// Lo mando a la vista para instaciar formulario en modal

        if(isset($escaneoInfoId)){
            $formEscaneo =  $this->Sicpoatareas->getFormEscaneoDocu($escaneoInfoId);
            $data['imgsEscaneo'] = $formEscaneo['imagenes'];
            $data['datosEscaneo'] = $formEscaneo['datos'];
        }
        if($data['inspeccion']->resultado == 'incorrecta'){
            $this->load->view(SICP . "actas/acta_infraccion", $data);
        }else{
            $this->load->view(SICP . "actas/acta_inspeccion", $data);
        }
    }
}
