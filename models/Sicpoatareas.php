<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Sicpoatareas extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function map($tarea)
    {
        $ci =& get_instance();
        $nom_tarea = $tarea->nombreTarea;
        $task_id = $tarea->taskId;
        $case_id = $tarea->caseId;
        $user_app = userNick();
        $aux_pedido = $this->rest->callAPI("GET",REST_PRO."/pedidoTrabajo/xcaseid/".$case_id);
        $data_generico =json_decode($aux_pedido["data"]);
        $aux_pedido = $data_generico->pedidoTrabajo;
        

        
        if(isset($case_id)){
            
            // $aux = new StdClass();
            // $aux->color = 'success'; //primary //secondary // success // danger // warning // info // light // dark //white 
            // $aux->texto = "N° Codigo:  $aux_pedido->cod_proyecto";
            // $array['info'][] = $aux;

            // $aux = new StdClass();
            // $aux->color = 'primary';
            // $aux->texto = "Objetivo:  $aux_pedido->objetivo   $aux_pedido->unidad_medida";
            // $array['info'][] =$aux;

            $aux = new StdClass();
            $aux->color = 'warning';
            $aux->texto = "Estado: $aux_pedido->estado ";
            $array['info'][] = $aux;

            $aux = new StdClass();
            $aux->color = 'danger';
            $aux->texto = "Fecha Inicio: ".formatFechaPG( $aux_pedido->fec_inicio);
            $array['info'][] = $aux;

            // $aux = new StdClass();
            // $aux->color = 'default';
            // $aux->texto = "Fecha Entrega: ".formatFechaPG( $aux_pedido->fec_entrega);
            // $array['info'][] = $aux;

            $array['descripcion'] =  $aux_pedido->descripcion;
        }else{

          //  $data = $this->Notapedidios->getXCaseId($tarea->caseId);

            $aux = new StdClass();
            $aux->color = 'warning';
            $aux->texto = "N° Pedido: ".$data['pema_id'];
            $array['info'][] = $aux;

            $aux = new StdClass();
            $aux->color = 'warning';
            $aux->texto = "Estado: ".$data['estado'];
            $array['info'][] = $aux;

            $aux = new StdClass();
            $aux->color = 'default';
            $aux->texto = "Fecha: ".formatFechaPG($data['fecha']);
            $array['info'][] = $aux;

            $aux = new StdClass();
            $aux->color = 'default';
            $aux->texto = "Justificacion: ".$data['justificacion'];
            $array['info'][] = $aux;

        }


        return $array;
    }

     public function getXCaseId($tarea)
    {
        $case_id = $tarea->caseId;

        $aux = $this->rest->callAPI("GET",REST_PRO."/pedidoTrabajo/xcaseid/".$case_id);
        $data_generico = json_decode($aux["data"]);
        $aux = $data_generico->pedidoTrabajo;
        return $aux;
    }
   

    public function desplegarCabecera($tarea)
    {
        $resp = infoproceso($tarea);
        return $resp;
    }

    public function desplegarVista($tarea)
    {
        switch ($tarea->nombreTarea) {
            //paso 1
            case 'Pre - Carga de Datos':
                $info_id = $this->getXCaseId($tarea)->info_id;
                $data['imgsBarrera'] = $this->getImgsBarrera($info_id);

                return $this->load->view(SICP . 'tareas/preCargaDatos', $data, true);
        
                log_message('DEBUG', "#TRAZA | #SICPOA | Sicpoatareas | desplegarVista()  tarea->nombreTarea: >> " . $tarea->nombreTarea);

            break;
     
            //paso 2
            case 'Inspección en PCC':
                $info_id = $this->getXCaseId($tarea)->info_id;
                $data['imgsBarrera'] = $this->getImgsBarrera($info_id);
                
                return $this->load->view(SICP . 'tareas/inspeccionPCC', $data, true);

                log_message('DEBUG', "#TRAZA | #SICPOA | Sicpoatareas | desplegarVista()  tarea->nombreTarea: >> " . $tarea->nombreTarea);
              
            break;
            //paso 2
            case 'Escaneo documentacion':
 
                     
                return $this->load->view(SICP . 'tareas/escaneoDocumentacion', $data, true);

                log_message('DEBUG', "#TRAZA | #SICPOA | Sicpoatareas | desplegarVista()  tarea->nombreTarea: >> " . $tarea->nombreTarea);
              
                         
            break;

            //paso 2
            case 'Alerta de camión que no paso por PCC':
                $info_id = $this->getXCaseId($tarea)->info_id;
                $data['imgsBarrera'] = $this->getImgsBarrera($info_id);
                
                return $this->load->view(SICP . 'tareas/alertaPCC', $data, true);
             
                log_message('DEBUG', "#TRAZA | #SICPOA | Sicpoatareas | desplegarVista()  tarea->nombreTarea: >> " . $tarea->nombreTarea);
              
                break;
            //paso 2       
            case 'Reprecintado':
                $info_id = $this->getXCaseId($tarea)->info_id;
                $data['docu_sanitaria'] = array('PT', 'PCR');
                return $this->load->view(SICP . 'tareas/alertaPCC', $data, true);

                log_message('DEBUG', "#TRAZA | #SICPOA | Sicpoatareas | desplegarVista()  tarea->nombreTarea: >> " . $tarea->nombreTarea);
              

                break;             
            //default           
            default:
            
            //return $this->load->view(YUDIPROC . 'tareas/pedido_reparacion_neumaticos/view_aprueba_reparacion', $data, true);
                                             
            log_message('DEBUG', 'YUDI Default view-Default- Nombre de tarea>' . $tarea->nombreTarea);

                break;
        }
    }

    // Guardar guardar Pedido de Trabajo
    public function guardarForms($data)
    {
        $url = REST_PRO . '/pedidoTrabajo/tarea/form';
        $rsp = $this->rest->callApi('POST', $url, $data);
        return $rsp;
        
        if (!$rsp) {

            log_message('ERROR', '#TRAZA | #SICPOA | Sicpoatareas | guardarForms()  >> ERROR AL GUARDAR FORM');

        } else {
            log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | guardarForms()  >> SE GUARDO CORRECTAMENTE');

        }

    }


    public function getContrato($tarea, $form){

        $ci =& get_instance();
        $nom_tarea = $tarea->nombreTarea;
        $task_id = $tarea->taskId;
        $case_id = $tarea->caseId;
        $user_app = userNick();
        $aux = $this->rest->callAPI("GET",REST_PRO."/pedidoTrabajo/xcaseid/".$case_id);
        $data_generico = json_decode($aux["data"]);
        $aux = $data_generico->pedidoTrabajo;

        switch ($tarea->nombreTarea) {

            //paso 1
            case 'Pre - Carga de Datos':       

            $data['_post_pedidotrabajo_tarea_form'] = array(

                    "nom_tarea" => "$nom_tarea",
                    "task_id" => $task_id,
                    "usuario_app" => $user_app,
                    "case_id" => $case_id,
                    "info_id" => $form['frm_info_id']
            
                );
                // "_post_inspeccion":{
                //     "case_id":"2",
                //     "patente_tractor":"pat-222",
                //     "nro_senasa":"23233",
                //     "productos":"carnicos",
                //     "reprecintado":"false",
                //     "bruto":"34",
                //     "tara":"44",
                //     "ticket":"ticket",
                //     "resultado":"resultado",
                //     "cant_fajas":"",
                //     "bruto_reprecintado":"10",
                //     "ticket_reprecintado":"ticket_reprecintado",
                //     "usuario_app":"usuario_app",
                //     "petr_id":"130",
                //     "chof_id":"27888888",
                //     "inca_id":"",
                //     "observaciones":"observaciones"
                //  }
    
            $rsp = $this->Yudiproctareas->guardarForms($data);
        
            if (!$rsp) {
        
                log_message('ERROR', '#TRAZA | #BPM >> guardarForms  >> ERROR AL GUARDAR FORM - Revisión Inicial');
        
            } else {
                log_message('DEBUG', '#TRAZA | #BPM >> guardarForms  >> GUARDADO OK FORM - Revisión Inicial');
        
            }
                    
        
                $contrato["apruebaTrabajo"]  = $form['result'];

                return $contrato;
            
            break;
    
            //paso 2
            case 'Inspección en PCC':
            
                    
            log_message('DEBUG', 'YUDI Reparacion -Escariado');
            
                $contrato["apruebaEscariado"]  = $form['result'];
                        
                return $contrato;
                
                
            break;

        //paso 4 "Cabina" view_preparacion_banda
        case 'Relleno, Corte de  Banda y Embandado':
 
            log_message('DEBUG', 'YUDI Reparacion view-Preparacion de Banda->' . $tarea->nombreTarea);
    
            $data['_post_pedidotrabajo_tarea_form'] = array(
    
                "nom_tarea" => "$nom_tarea",
                "task_id" => $task_id,
                "usuario_app" => $user_app,
                "case_id" => $case_id,
                "info_id" => $form['frm_info_id']
               
        
            );
        
        
            $rsp = $this->Yudiproctareas->guardarForms($data);
        
            if (!$rsp) {
        
                log_message('ERROR', '#TRAZA | #BPM >> guardarForms  >> ERROR AL GUARDAR FORM - Preparacion de Banda');
        
            } else {
                log_message('DEBUG', '#TRAZA | #BPM >> guardarForms  >> GUARDADO OK FORM - Preparacion de Banda');
        
            }
    
            break;

          
        //paso 5
        case 'Autoclave':

            log_message('DEBUG', 'YUDI Reparacion view-Vulcanización en autoclave->' . $tarea->nombreTarea);
    
            $data['_post_pedidotrabajo_tarea_form'] = array(
    
                "nom_tarea" => "$nom_tarea",
                "task_id" => $task_id,
                "usuario_app" => $user_app,
                "case_id" => $case_id,
                "info_id" => $form['frm_info_id']
                
        
            );
        
        
            $rsp = $this->Yudiproctareas->guardarForms($data);
        
            if (!$rsp) {
        
                log_message('ERROR', '#TRAZA | #BPM >> guardarForms  >> ERROR AL GUARDAR FORM - Vulcanización en autoclave');
        
            } else {
                log_message('DEBUG', '#TRAZA | #BPM >> guardarForms  >> GUARDADO OK FORM - Vulcanización en autoclave');
        
            }
    
            break;

        //paso 6
        case 'Pintado y acabado final':

            log_message('DEBUG', 'YUDI Reparacion view-Pintado y acabado final->' . $tarea->nombreTarea);
    
            if ($form['result'] == 'ok') {

                log_message('DEBUG', 'YUDI Reparacion -Pintado y acabado final contrato', json_encode($form['result'],true) );

                $contrato["retornaAPaso"]  = $form['result'];
                    
                            
                        return $contrato;
        
                break;


            }else {

                
                $data['_post_pedidotrabajo_tarea_form'] = array(
    
                    "nom_tarea" => "$nom_tarea",
                    "task_id" => $task_id,
                    "usuario_app" => $user_app,
                    "case_id" => $case_id,
                    "info_id" => $form['frm_info_id']
                    
            
                );
            
            
                $rsp = $this->Yudiproctareas->guardarForms($data);
            
                if (!$rsp) {
            
                    log_message('ERROR', '#TRAZA | #BPM >> guardarForms  >> ERROR AL GUARDAR FORM - Pintado y acabado final');
            
                } else {
                    log_message('DEBUG', '#TRAZA | #BPM >> guardarForms  >> GUARDADO OK FORM - Pintado y acabado final');
            
                }

                log_message('DEBUG', 'YUDI Reparacion -Pintado y acabado final contrato', json_encode($form['result'],true) );

                $contrato["retornaAPaso"]  = $form['result'];
                    
                            
                        return $contrato;
        
                break;
            }

        case 'Despacho':

            log_message('DEBUG', 'YUDI Reparacion view- Reparacion -Despacho->' . $tarea->nombreTarea);
            
            $data['_post_pedidotrabajo_tarea_form'] = array(
    
                "nom_tarea" => "$nom_tarea",
                "task_id" => $task_id,
                "usuario_app" => $user_app,
                "case_id" => $case_id,
                "info_id" => $form['frm_info_id']
                
        
            );
        
        
            $rsp = $this->Yudiproctareas->guardarForms($data);
        
            if (!$rsp) {
        
                log_message('ERROR', '#TRAZA | #BPM >> guardarForms  >> ERROR AL GUARDAR FORM - YUDI -Despacho');
        
            } else {
                log_message('DEBUG', '#TRAZA | #BPM >> guardarForms  >> GUARDADO OK FORM - YUDI -Despacho');
        
            }
        
            $contrato["controlTrabajoTerminado"]  = $form['result'];
            
                
            return $contrato;
    
            break;

            default:
                # code...
            break;
            }
        }
    /**
	* Obtengo las imagenes cargadas en Imgres Barrera guardadas en instancias_formularios
	* @param array info_id
	* @return array Imagenes relacionadas con el info_id
	*/
    function getImgsBarrera($info_id){
        if($info_id){
            $imagenes = array();
            $this->load->model(FRM . 'Forms');
            $res = $this->Forms->obtener($info_id);

            foreach ($res->items as $dato) {
                if(isset($dato->valor4_base64)){
                    $rec = stream_get_contents($dato->valor4_base64);
                    $ext = $this->obtenerExtension($dato->valor);
                    array_push($imagenes, $ext.$rec);
                }
            }
        }
        return $imagenes;
    }

    /**
	* Funcion para obtener la extension del archivo codificado
	* @param array nombre archivo con su extension
	* @return array cabecera para la url lsito para usar en atributo src
	*/
    function obtenerExtension($archivo){
        $ext = explode('.',$archivo);
            switch(strtolower($ext[1])){
                case 'jpg': $ext = 'data:image/jpg;base64,';break;
                case 'png': $ext = 'data:image/png;base64,';break;
                case 'jpeg': $ext = 'data:image/jpeg;base64,';break;
                case 'pjpeg': $ext = 'data:image/pjpeg;base64,';break;
                case 'wbmp': $ext = 'data:image/vnd.wap.wbmp;base64,';break;
                case 'webp': $ext = 'data:image/webp;base64,';break;
                case 'pdf': $ext = 'data:application/pdf;base64,';break;
                case 'doc': $ext = 'data:application/msword;base64,';break;
                case 'xls': $ext = 'data:application/vnd.ms-excel;base64,';break;
                case 'docx': $ext = 'data:application/vnd.openxmlformats-officedocument.wordprocessingml.document;base64,';break;
                case 'txt': $ext = 'data:text/plain;base64,';break;
                case 'csv': $ext = 'data:text/csv;base64,';break;
                default: $ext = "";
            }
        return $ext;
    }
   
}