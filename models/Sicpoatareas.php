<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Sicpoatareas extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(SICP . 'Ingresosbarrera');
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

            $aux = new StdClass();
            $aux->color = 'warning';//primary //secondary // success // danger // warning // info // light // dark //white 
            $aux->texto = "Estado: $aux_pedido->estado ";
            $array['info'][] = $aux;

            $aux = new StdClass();
            $aux->color = 'primary';
            $aux->texto = "Fecha Inicio: ".formatFechaPG( $aux_pedido->fec_inicio);
            $array['info'][] = $aux;

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
                $tareaData = $this->getXCaseId($tarea);
                
                $data['imgsBarrera'] = $this->getImgsBarrera($tareaData->info_id);
                $data['departamentos'] = $this->getDepartamentos();
                $data['petr_id'] = $tareaData->petr_id;

                return $this->load->view(SICP . 'tareas/preCargaDatos', $data, true);
        
                log_message('DEBUG', "#TRAZA | #SICPOA | Sicpoatareas | desplegarVista()  tarea->nombreTarea: >> " . $tarea->nombreTarea);

            break;
     
            //paso 2
            case 'Escaneo documentacion':
 
                     
                return $this->load->view(SICP . 'tareas/escaneoDocumentacion', $data, true);

                log_message('DEBUG', "#TRAZA | #SICPOA | Sicpoatareas | desplegarVista()  tarea->nombreTarea: >> " . $tarea->nombreTarea);
              
                         
            break;

            //paso 3 // cambiado este por 4
            case 'Inspección en PCC':
                $tareaData = $this->getXCaseId($tarea);

                $data['imgsBarrera'] = $this->getImgsBarrera($tareaData->info_id);
                $data['departamentos'] = $this->getDepartamentos();
                $data['petr_id'] = $tareaData->petr_id;
                $data['infracciones'] = $this->getInfracciones();
                $data['preCargaDatos'] = $this->getPreCargaDatos($tareaData->case_id);
                
                $empresas = $data['preCargaDatos']->empresas->empresa;

                //Separo las empresas por su rol
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
                    $data['preDataCargada'] = true;
                }else{
                    $data['preDataCargada'] = false;
                }
                
                //Es el info_id del formulario de escaneo documentacion
                //que puede o no estar cargado a la hora de la inspeccion
                $formulario = $this->Ingresosbarrera->getFormularios($tareaData->petr_id);
                $escaneoInfoId = $formulario['data'][0]->forms->form[0]->info_id;
                $data['escaneoInfoId'] = $escaneoInfoId;// Lo mando a la vista apra instaciar formulario en modal

                if(isset($escaneoInfoId)){
                    $data['imgsEscaneo'] = $this->getImgsEscaneoDocu($escaneoInfoId);
                }
                
                return $this->load->view(SICP . 'tareas/inspeccionPCC', $data, true);

                log_message('DEBUG', "#TRAZA | #SICPOA | Sicpoatareas | desplegarVista()  tarea->nombreTarea: >> " . $tarea->nombreTarea);
              
            break;

            //paso 3
            case 'Alerta de camión que no paso por PCC':
                $tareaData = $this->getXCaseId($tarea);

                $data['imgsBarrera'] = $this->getImgsBarrera($tareaData->info_id);
                $data['departamentos'] = $this->getDepartamentos();
                $data['petr_id'] = $tareaData->petr_id;
                $data['infracciones'] = $this->getInfracciones();
                $data['preCargaDatos'] = $this->getPreCargaDatos($tareaData->case_id);

                $empresas = $data['preCargaDatos']->empresas->empresa;

                //Separo las empresas por su rol
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
                    $data['preDataCargada'] = true;
                }else{
                    $data['preDataCargada'] = false;
                }

                //Es el info_id del formulario de escaneo documentacion
                //que puede o no estar cargado a la hora de la inspeccion
                $formulario = $this->Ingresosbarrera->getFormularios($tareaData->petr_id);
                $escaneoInfoId = $formulario['data'][0]->forms->form[0]->info_id;
                $data['escaneoInfoId'] = $escaneoInfoId;// Lo mando a la vista para instaciar formulario en modal

                if(isset($escaneoInfoId)){
                    $data['imgsEscaneo'] = $this->getImgsEscaneoDocu($escaneoInfoId);
                }

                return $this->load->view(SICP . 'tareas/alertaPCC', $data, true);
             
                log_message('DEBUG', "#TRAZA | #SICPOA | Sicpoatareas | desplegarVista()  tarea->nombreTarea: >> " . $tarea->nombreTarea);
              
                break;

            //paso 4       
            case 'Reprecintado':
                $tareaData = $this->getXCaseId($tarea);

                $data['petr_id'] = $tareaData->petr_id;
                $data['inspeccion'] = $this->getPreCargaDatos($tareaData->case_id);
                $empresas = $data['inspeccion']->empresas->empresa;

                //Separo las empresas por su rol
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

                $formulario = $this->Ingresosbarrera->getFormularios($tareaData->petr_id);
                $escaneoInfoId = $formulario['data'][0]->forms->form[0]->info_id;
                $data['escaneoInfoId'] = $escaneoInfoId;// Lo mando a la vista para instaciar formulario en modal

                if(isset($escaneoInfoId)){
                    $data['imgsEscaneo'] = $this->getImgsEscaneoDocu($escaneoInfoId);
                }

                return $this->load->view(SICP . 'tareas/reprecintado', $data, true);

                log_message('DEBUG', "#TRAZA | #SICPOA | Sicpoatareas | desplegarVista()  tarea->nombreTarea: >> " . $tarea->nombreTarea);
              

                break;
            //paso 5
            case 'Carga de Documentación':

                $tareaData = $this->getXCaseId($tarea);

                $data['imgsDocumentacion'] = $this->getImgsDocumentacion($tareaData->info_id);
                $data['petr_id'] = $tareaData->petr_id;
                $data['facturas'] = $this->getTiposFacturas();
                $data['productos'] = $this->getProductos();
                $data['un_medidas'] = $this->getMedidas();
                $data['inspeccion'] = $this->getPreCargaDatos($tareaData->case_id);
                
                $empresas = $data['inspeccion']->empresas->empresa;

                //Separo las empresas por su rol
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
                    $data['preDataCargada'] = true;
                }else{
                    $data['preDataCargada'] = false;
                }
                
                //Es el info_id del formulario de escaneo documentacion
                //que puede o no estar cargado a la hora de la inspeccion
                $formulario = $this->Ingresosbarrera->getFormularios($tareaData->petr_id);
                $escaneoInfoId = $formulario['data'][0]->forms->form[0]->info_id;
                $data['escaneoInfoId'] = $escaneoInfoId;// Lo mando a la vista apra instaciar formulario en modal

                if(isset($escaneoInfoId)){
                    $data['imgsEscaneo'] = $this->getImgsEscaneoDocu($escaneoInfoId);
                }
                
                return $this->load->view(SICP . 'tareas/cargaDocumentacion', $data, true);
                // return $this->load->view(SICP . 'documentacion/nuevoDocumento', $data, true);

                log_message('DEBUG', "#TRAZA | #SICPOA | Sicpoatareas | desplegarVista()  tarea->nombreTarea: >> " . $tarea->nombreTarea);
              
            break;
            //default           
            default:
                                             
            log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | desplegarVista() DEFAULT  tarea->nombreTarea: >> ' . $tarea->nombreTarea);

                break;
        }
    }

    // Guardar registro Pedido de Trabajo form
    public function guardarForms($data)
    {
        $url = REST_PRO . '/pedidoTrabajo/tarea/form';
        $rsp = $this->rest->callApi('POST', $url, $data);
        
        if ($rsp['status']) {

            log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | guardarForms()  >> SE GUARDO CORRECTAMENTE');
            
        } else {
            
            log_message('ERROR', '#TRAZA | #SICPOA | Sicpoatareas | guardarForms()  >> ERROR AL GUARDAR FORM');
            
        }

        return $rsp;
    }


    public function getContrato($tarea, $form){

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
        
                $contrato["resultadoInspeccion"]  = true;
                
                log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | getContrato()  >> contrato '.json_encode($contrato));
                return $contrato;
            
            break;
    
            //paso 2
            case 'Escaneo documentacion':
        
                $data['_post_pedidotrabajo_tarea_form'] = array(
        
                    "nom_tarea" => "$nom_tarea",
                    "task_id" => $task_id,
                    "usuario_app" => $user_app,
                    "case_id" => $case_id,
                    "info_id" => $form['frm_info_id']
            
                );
                
                $rsp = $this->guardarForms($data);

                $contrato["erroresDocumentacion"]  = $rsp['status'];
                
                log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | getContrato()  >> contrato '.json_encode($contrato));

                return $contrato;
            
            break;

            //paso 3
            case 'Inspección en PCC':

                $data['_post_pedidotrabajo_tarea_form'] = array(
                    "nom_tarea" => "$nom_tarea",
                    "task_id" => $task_id,
                    "usuario_app" => $user_app,
                    "case_id" => $case_id,
                    "info_id" => $form['frm_info_id']
                );
                
                $rsp = $this->guardarForms($data);

                if($form['doc_impositiva'] == 'Parcial'){
                    $contrato["erroresDocumentacion"]  = false;
                }else{
                    $contrato["erroresDocumentacion"]  = true;
                }
                $contrato["petrId"]  = $form['petr_id'];
                $contrato["reprecintado"]  = $form['reprecintado'];
                $contrato["resultadoInspeccion"]  = $form['inspValida'];

                
                log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | getContrato()  >> contrato '.json_encode($contrato));

                return $contrato;
                
            break;

          
            //paso 3
            case 'Alerta de camión que no paso por PCC':

                //Acta infraccion en calle
                $data['_post_pedidotrabajo_tarea_form'] = array(
        
                    "nom_tarea" => "$nom_tarea"." Acta infracción",
                    "task_id" => $task_id,
                    "usuario_app" => $user_app,
                    "case_id" => $case_id,
                    "info_id" => $form['acta_info_id']

                );

                $resp = $this->guardarForms($data);
        
                log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | getContrato() AlertaPCC  >> Acta infraccion status: '.json_encode($resp['status']));

                //Escaneo Documentacion
                $data['_post_pedidotrabajo_tarea_form'] = array(
        
                    "nom_tarea" => "$nom_tarea",
                    "task_id" => $task_id,
                    "usuario_app" => $user_app,
                    "case_id" => $case_id,
                    "info_id" => $form['frm_info_id']

                );
                
                $rsp = $this->guardarForms($data);

                if($form['doc_impositiva'] == 'Parcial'){
                    $contrato["erroresDocumentacion"]  = false;
                }else{
                    $contrato["erroresDocumentacion"]  = true;
                }
                
                log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | getContrato() AlertaPCC >> contrato '.json_encode($contrato));

                return $contrato;
    
            break;

        //paso 4
        case 'Reprecintado':       
        
            $contrato["erroresDocumentacion"]  = true;
            
            log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | getContrato()  >> contrato '.json_encode($contrato));
            return $contrato;
        
        break;

            default:
                # code...
            break;
            }
        }
    /**
	* Obtengo las imagenes cargadas en Ingreso Barrera guardadas en instancias_formularios
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
	* Obtengo las imagenes cargadas en Escaneo Documentacion guardadas en instancias_formularios
	* @param array info_id
	* @return array Imagenes relacionadas con el info_id
	*/
    function getImgsEscaneoDocu($info_id){
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
    /**
	*  Listado de departamentos
	* @param
	* @return array departamentos
	*/
    public function getDepartamentos(){
        
        $this->db->select('A.*');
		$this->db->from('core.tablas A');
		// $this->db->where('A.empr_id', empresa());
        $this->db->where('eliminado', false);
		$this->db->where('tabla', 'departamentos_sanjuan');
		$this->db->order_by('valor');


		$query = $this->db->get();

		if ($query && $query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
		
    }
    /**
	* Listado tipo de infracciones
	* @param
	* @return array listado con tipos de infracciones
	*/
    public function getInfracciones(){

        $url = REST_CORE."/tabla/tipos_infraccion/empresa/";

        $aux = $this->rest->callAPI("GET",$url);
        $resp = json_decode($aux['data']);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | getInfracciones()  resp: >> " . json_encode($resp));

        return $resp->tablas->tabla;
    }
    /**
	* Obtengo la informacion de la inspeccion precargada
	* @param int case_id
	* @return array informacion pre cargada en paso Pre - Carga de Datos
	*/
    public function getPreCargaDatos($case_id){

        $url = REST_SICP."/inspeccion/id/".$case_id;

        $aux = $this->rest->callAPI("GET",$url);
        $resp = json_decode($aux['data']);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | getPreCargaDatos() >> ");

        return $resp->inspeccion;
    }
    /**
	* Listado tipos de facturas 
	* @param  
	* @return array listado con tipos de facturas
	*/
    public function getTiposFacturas(){
        
        $url = REST_CORE."/tabla/888-tipos_documento/empresa/";

        $aux = $this->rest->callAPI("GET",$url);
        $resp = json_decode($aux['data']);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | getTiposFacturas()  resp: >> " . json_encode($resp));

        return $resp->tablas->tabla;
    }
    /**
	* Listado productos 
	* @param  
	* @return array listado con productos
	*/
    public function getProductos(){
        
        $url = REST_CORE."/tabla/888-tipos_producto/empresa/";

        $aux = $this->rest->callAPI("GET",$url);
        $resp = json_decode($aux['data']);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | getTiposFacturas()  resp: >> " . json_encode($resp));

        return $resp->tablas->tabla;
    }
    /**
	* Listado unidades de medida 
	* @param  
	* @return array listado con unidades de medida
	*/
    public function getMedidas(){
        
        $url = REST_CORE."/tabla/888-unidades_medida/empresa/";

        $aux = $this->rest->callAPI("GET",$url);
        $resp = json_decode($aux['data']);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | getTiposFacturas()  resp: >> " . json_encode($resp));

        return $resp->tablas->tabla;
    }
    /**
	* Obtengo las imagenes cargadas en el escaneo de documentacion guardadas en instancias_formularios
	* @param array info_id
	* @return array Imagenes relacionadas con el info_id
	*/
    function getImgsDocumentacion($info_id){
        if($info_id){
            $documentacion = array();
            $this->load->model(FRM . 'Forms');
            $res = $this->Forms->obtener($info_id);

            foreach ($res->items as $key => $dato) {
                if(isset($dato->valor4_base64)){
                    $rec = stream_get_contents($dato->valor4_base64);
                    $ext = $this->obtenerExtension($dato->valor);
                    
                    $documentacion[$key]['inst_id'] = $dato->inst_id;
                    $documentacion[$key]['imagen'] = $ext.$rec;
                    // array_push($documentacion, $ext.$rec);
                }
            }
        }
        return $documentacion;
    }
}