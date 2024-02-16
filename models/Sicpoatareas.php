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
        $data_generico = json_decode($aux_pedido["data"]);
        $aux_pedido = $data_generico->pedidoTrabajo;

        //Obtengo la patente / dominio del tractor
        if(isset($data_generico)){
            $patente = $this->getPatenteTractor($data_generico->pedidoTrabajo->info_id);
        }
        //Oculto el tag del case en bandeja
        $array['tagCase'] = 'oculto';
        
        if(isset($case_id)){

            $aux = new StdClass();
            $aux->color = 'warning';//primary //secondary // success // danger // warning // info // light // dark //white 
            $aux->texto = "Estado: $aux_pedido->estado ";
            $aux->estilo = "font-size: 15px";
            $array['info'][] = $aux;

            $aux = new StdClass();
            $aux->color = 'primary';
            $aux->texto = "Fecha Inicio: ".formatFechaPG( $aux_pedido->fec_inicio);
            $aux->estilo = "font-size: 15px";
            $array['info'][] = $aux;

            $aux = new StdClass();
            $aux->color = 'danger';
            $aux->texto = "Dominio: ".$patente;
            $aux->estilo = "font-size: 15px";
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
   
    /**
	* Se obtiene la informacion necesaria para cargar la cabecera del pedido de trabajo(ingreso por barrera)
	* @param array $tarea datos del pedido de trabajo
	* @return array cabecera del pedido de trabajo con los datos enviados
	*/
    public function desplegarCabecera($tarea){
        $pedidoTrabajo = $this->getXCaseId($tarea);
        $tarea->inspeccion = $this->getPreCargaDatos($tarea->caseId);
        $tarea->imgsBarrera = $this->getImgsBarrera($pedidoTrabajo->info_id);
        $resp = infoproceso($tarea);
        return $resp;
    }

    public function desplegarVista($tarea){
        switch ($tarea->nombreTarea) {
            //paso 1
            case 'Pre - Carga de Datos':
                $tareaData = $this->getXCaseId($tarea);
                
                $data['imgsBarrera'] = $this->getImgsBarrera($tareaData->info_id);
                $data['patente'] =  $this->getPatenteTractor($tareaData->info_id);
                $data['departamentos'] = $this->getDepartamentos();
                $data['petr_id'] = $tareaData->petr_id;
                $data['productos'] = $this->getProductos();
                $data['estados_productos'] = $this->getEstadosProductos();

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
                $data['patente'] =  $this->getPatenteTractor($tareaData->info_id);
                $data['productos'] = $this->getProductos();
                $data['estados_productos'] = $this->getEstadosProductos();

                $puntosControl = $this->Ingresosbarrera->getPuntosControl();
                foreach ($puntosControl  as $key) {
                    if($key->tabl_id == $this->session->userdata['puntoControl']){
                        $data['infoPuntoControl']['domicilio'] = $key->valor2;
                        $data['infoPuntoControl']['nombre'] = $key->descripcion;
                    }
                }
                $empresas = $data['preCargaDatos']->empresas->empresa;
                $permisos = $data['preCargaDatos']->permisos_transito->permiso_transito;

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

                //empresas asociadas a un permiso
                // Crear un arreglo para almacenar las empresas por perm_id
                $empresasPorPermiso = [];
                $empresasDestino= $data['destinos'];
                // Agrupar las empresas por perm_id
                foreach ($empresasDestino as $empresa) {
                    $perm_id = $empresa->perm_id;
                    if (!isset($empresasPorPermiso[$perm_id])) {
                        $empresasPorPermiso[$perm_id] = [];
                    }
                    $empresasPorPermiso[$perm_id][] = $empresa;
                }

                // Combinar los permisos con las empresas asociadas
                foreach ($permisos as $permiso) {
                    $perm_id = $permiso->perm_id;
                    if (isset($empresasPorPermiso[$perm_id])) {
                        $permiso->empresas = $empresasPorPermiso[$perm_id];
                    }
                }

                // Guardar la combinación en $data['preCargaInspecciones']
                $data['preCargaInspecciones'] = $permisos;

                //Formateo la fecha de inspeccion para los input's
                $fecAux = explode(' ',$data['preCargaDatos']->fec_inspeccion);
                $data['horaInspeccion'] = $fecAux[1];
                $data['fechaInspeccion'] = $fecAux[0];
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
                $data['patente'] =  $this->getPatenteTractor($tareaData->info_id);
                $data['productos'] = $this->getProductos();
                $data['estados_productos'] = $this->getEstadosProductos();

                $empresas = $data['preCargaDatos']->empresas->empresa;
                $permisos = $data['preCargaDatos']->permisos_transito->permiso_transito;

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

                 //empresas asociadas a un permiso
                // Crear un arreglo para almacenar las empresas por perm_id
                $empresasPorPermiso = [];
                $empresasDestino= $data['destinos'];
                // Agrupar las empresas por perm_id
                foreach ($empresasDestino as $empresa) {
                    $perm_id = $empresa->perm_id;
                    if (!isset($empresasPorPermiso[$perm_id])) {
                        $empresasPorPermiso[$perm_id] = [];
                    }
                    $empresasPorPermiso[$perm_id][] = $empresa;
                }

                // Combinar los permisos con las empresas asociadas
                foreach ($permisos as $permiso) {
                    $perm_id = $permiso->perm_id;
                    if (isset($empresasPorPermiso[$perm_id])) {
                        $permiso->empresas = $empresasPorPermiso[$perm_id];
                    }
                }

                // Guardar la combinación en $data['preCargaInspecciones']
                $data['preCargaInspecciones'] = $permisos;


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
                $data['infracciones'] = $this->getInfracciones();
                $data['departamentos'] = $this->getDepartamentos();
                $data['productos'] = $this->getProductos();
                $data['estados_productos'] = $this->getEstadosProductos();

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

                //Formateo la fecha de inspeccion para los input's
                $fecAux = explode(' ',$data['inspeccion']->fec_inspeccion);
                $data['horaInspeccion'] = $fecAux[1];
                $data['fechaInspeccion'] = $fecAux[0];

                $puntosControl = $this->Ingresosbarrera->getPuntosControl();
                foreach ($puntosControl  as $key) {
                    if($key->tabl_id == $this->session->userdata['puntoControl']){
                        $data['infoPuntoControl']['domicilio'] = $key->valor2;
                        $data['infoPuntoControl']['nombre'] = $key->descripcion;
                    }
                }
                
                $formulario = $this->Ingresosbarrera->getFormularios($tareaData->petr_id);
                $escaneoInfoId = $formulario['data'][0]->forms->form[0]->info_id;
                $data['escaneoInfoId'] = $escaneoInfoId;// Lo mando a la vista para instaciar formulario en modal

                if(isset($escaneoInfoId)){
                    $data['formEscaneo'] =  $this->getFormEscaneoDocu($escaneoInfoId);
                }
                
                return $this->load->view(SICP . 'tareas/reprecintado', $data, true);

                log_message('DEBUG', "#TRAZA | #SICPOA | Sicpoatareas | desplegarVista()  tarea->nombreTarea: >> " . $tarea->nombreTarea);
              

                break;
            //paso 5
            case 'Carga de Documentación':

                $tareaData = $this->getXCaseId($tarea);

                $data['inspeccion'] = $this->getPreCargaDatos($tareaData->case_id);
                $data['documentacion'] = $this->getDocumentacion($data['inspeccion']->info_id_doc);
                $data['petr_id'] = $tareaData->petr_id;
                $data['facturas'] = $this->getTiposFacturas();
                $data['productos'] = $this->getProductos();
                $data['un_medidas'] = $this->getMedidas();
                
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

                //Obtengo un array con los ID's de las imagenes seleccionadas
                $aux = $data['inspeccion']->documentos->documento;
                $data['imag_ids'] = array();

                if(!empty($aux)){
                    foreach ($aux as $key => $value) {
                        array_push($data['imag_ids'], $value->imag_id);
                    }
                }
                return $this->load->view(SICP . 'tareas/cargaDocumentacion', $data, true);

                log_message('DEBUG', "#TRAZA | #SICPOA | Sicpoatareas | desplegarVista()  tarea->nombreTarea: >> " . $tarea->nombreTarea);
              
            break;

            //paso 6
            case 'Notificar Infracción en PCC':

                $tareaData = $this->getXCaseId($tarea);

                $data['petr_id'] = $tareaData->petr_id;
                $data['inspeccion'] = $this->getPreCargaDatos($tareaData->case_id);
                $data['imgsBarrera'] = $this->getImgsBarrera($tareaData->info_id);
                
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
                    $data['formEscaneo'] =  $this->getFormEscaneoDocu($escaneoInfoId);
                }

                //Obtengo la imagen del Acta Infraccion
                foreach($formulario['data'][0]->forms->form as $forms){
                    if(strpos($forms->nom_tarea, 'Acta infracción')){
                        $actaInfraccionInfoId = $forms->info_id;
                    }
                }
        
                if(isset($actaInfraccionInfoId)){
                    $data['imgInfraccion'] = $this->getImgInfraccion($actaInfraccionInfoId);
                }

                return $this->load->view(SICP . 'tareas/infraccionPCC', $data, true);

                log_message('DEBUG', "#TRAZA | #SICPOA | Sicpoatareas | desplegarVista()  tarea->nombreTarea: >> " . $tarea->nombreTarea);

            break;
            
            //paso 6
            case 'Notificar Infracción en Calle':

                $tareaData = $this->getXCaseId($tarea);

                $data['petr_id'] = $tareaData->petr_id;
                $data['inspeccion'] = $this->getPreCargaDatos($tareaData->case_id);
                $data['imgsBarrera'] = $this->getImgsBarrera($tareaData->info_id);

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
                    $data['formEscaneo'] =  $this->getFormEscaneoDocu($escaneoInfoId);
                }

                return $this->load->view(SICP . 'tareas/infraccionPCC', $data, true);

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

                $data['_post_pedidotrabajo_tarea_form'] = array(
                    "nom_tarea" => "$nom_tarea Foto acta en papel",
                    "task_id" => $task_id,
                    "usuario_app" => $user_app,
                    "case_id" => $case_id,
                    "info_id" => $form['info_id_acta']
                );
                
                $rsp = $this->guardarForms($data);

                if($form['doc_impositiva'] == 'Total'){
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
                //Se quito el formulario dinamico del acta infraccion en calle, asique comento el guardado del formulario
                //Acta infraccion en calle
                // $data['_post_pedidotrabajo_tarea_form'] = array(
        
                //     "nom_tarea" => "$nom_tarea"." Acta infracción",
                //     "task_id" => $task_id,
                //     "usuario_app" => $user_app,
                //     "case_id" => $case_id,
                //     "info_id" => $form['frm_info_id']

                // );

                // $resp = $this->guardarForms($data);
        
                // log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | getContrato() AlertaPCC  >> Acta infraccion status: '.json_encode($resp['status']));

                //Escaneo Documentacion
                $data['_post_pedidotrabajo_tarea_form'] = array(
        
                    "nom_tarea" => "$nom_tarea". " Escaneo Documentación",
                    "task_id" => $task_id,
                    "usuario_app" => $user_app,
                    "case_id" => $case_id,
                    "info_id" => $form['frm_info_id']

                );
                
                $rsp = $this->guardarForms($data);

                if($form['doc_impositiva'] == 'Total'){
                    $contrato["erroresDocumentacion"]  = false;
                }else{
                    $contrato["erroresDocumentacion"]  = true;
                }
                
                log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | getContrato() AlertaPCC >> contrato '.json_encode($contrato));

                return $contrato;
    
            break;

        //paso 4
        case 'Reprecintado':       
            
            $data['_post_pedidotrabajo_tarea_form'] = array(
                "nom_tarea" => "$nom_tarea",
                "task_id" => $task_id,
                "usuario_app" => $user_app,
                "case_id" => $case_id,
                "info_id" => $form['frm_info_id']
            );
            
            $rsp = $this->guardarForms($data);

            $contrato["erroresDocumentacion"]  = true;
            
            log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | getContrato()  >> contrato '.json_encode($contrato));
            
            return $contrato;
        
        break;

        //paso 5
        case 'Carga de Documentación':       
            
            $data['_post_pedidotrabajo_tarea_form'] = array(
                "nom_tarea" => "$nom_tarea",
                "task_id" => $task_id,
                "usuario_app" => $user_app,
                "case_id" => $case_id,
                "info_id" => $form['frm_info_id']
            );
            
            $rsp = $this->guardarForms($data);

            $contrato["erroresDocumentacion"]  = true;
            
            log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | getContrato()  >> contrato '.json_encode($contrato));

            return $contrato;
        
        break;

        //paso 6
        case 'Notificar Infracción en PCC':
            
            $data['_post_pedidotrabajo_tarea_form'] = array(
                "nom_tarea" => "$nom_tarea",
                "task_id" => $task_id,
                "usuario_app" => $user_app,
                "case_id" => $case_id,
                "info_id" => $form['frm_info_id']
            );
            
            $rsp = $this->guardarForms($data);
        
            $contrato["erroresDocumentacion"]  = true;
            
            log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | getContrato()  >> contrato '.json_encode($contrato));

            return $contrato;
        
        break;

            default:
               log_message('DEBUG', '#TRAZA | #SICPOA | Sicpoatareas | getContrato()  >> NO ESPECIFICASTE BIEN EL CASE ');
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
                if(isset($dato->valor4_base64)  && $dato->tipo_dato == 'image'){
                    $rec = stream_get_contents($dato->valor4_base64);
                    $ext = obtenerExtension($dato->valor);
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
                if(isset($dato->valor4_base64) && $dato->tipo_dato == 'image'){
                    $rec = stream_get_contents($dato->valor4_base64);
                    $ext = obtenerExtension($dato->valor);
                    array_push($imagenes, $ext.$rec);
                }
            }
        }
        return $imagenes;
    }
    /**
	*  Listado de departamentos
	* @param
	* @return array departamentos
	*/
    public function getDepartamentos(){
        
        $url = REST_CORE."/tabla/departamentos_sanjuan/empresa/".empresa();

        $aux = $this->rest->callAPI("GET",$url);
        $resp = json_decode($aux['data']);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | getDepartamentos()  resp: >> " . json_encode($resp));

        return $resp->tablas->tabla;
		
    }
    /**
	* Listado tipo de infracciones
	* @param
	* @return array listado con tipos de infracciones
	*/
    public function getInfracciones(){

        $url = REST_CORE."/tabla/tipos_infraccion/empresa/".empresa();

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

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | getPreCargaDatos() ");

        return $resp->inspeccion;
    }
    /**
	* Listado tipos de facturas 
	* @param  
	* @return array listado con tipos de facturas
	*/
    public function getTiposFacturas(){
        
        $url = REST_CORE."/tabla/tipos_documento/empresa/".empresa();

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
        
        $url = REST_CORE."/tabla/tipos_producto/empresa/".empresa();

        $aux = $this->rest->callAPI("GET",$url);
        $resp = json_decode($aux['data']);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | getTiposFacturas()  resp: >> " . json_encode($resp));

        return $resp->tablas->tabla;
    }

        /**
	* Listado estados de productos 
	* @param  
	* @return array listado con los estados de los productos
	*/
    public function getEstadosProductos(){
        
        $url = REST_CORE."/tabla/estados_producto/empresa/".empresa();

        $aux = $this->rest->callAPI("GET",$url);
        $resp = json_decode($aux['data']);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | getEstadosProductos()  resp: >> " . json_encode($resp));

        return $resp->tablas->tabla;
    }

    /**
	* Listado unidades de medida 
	* @param  
	* @return array listado con unidades de medida
	*/
    public function getMedidas(){
        
        $url = REST_CORE."/tabla/unidades_medida/empresa/".empresa();

        $aux = $this->rest->callAPI("GET",$url);
        $resp = json_decode($aux['data']);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | getTiposFacturas()  resp: >> " . json_encode($resp));

        return $resp->tablas->tabla;
    }
    /**
	* Obtengo imagenes y archivos cargados en el escaneo de documentacion guardadas en instancias_formularios
    * NOTA: Se quito por requisito la visualizacion de archivos.
	* @param array info_id
	* @return array Imagenes relacionadas con el info_id
	*/
    function getDocumentacion($info_id){
        if($info_id){
            $documentacion = array();
            $this->load->model(FRM . 'Forms');
            $res = $this->Forms->obtener($info_id);

            foreach ($res->items as $key => $dato) {
                if(isset($dato->valor4_base64)){
                    $rec = stream_get_contents($dato->valor4_base64);
                    $ext = obtenerExtension($dato->valor);

                    if($dato->tipo_dato == 'image'){
                        $documentacion['imagenes'][$key]['inst_id'] = $dato->inst_id;
                        $documentacion['imagenes'][$key]['imagen'] = $ext.$rec;
                        $documentacion['imagenes'][$key]['descripcion'] = $dato->valor;
                    }
                    // }else{
                    //     $documentacion['archivos'][$key]['inst_id'] = $dato->inst_id;
                    //     $documentacion['archivos'][$key]['descripcion'] = $dato->valor;
                    //     $documentacion['archivos'][$key]['archivo'] = $ext.$rec;
                    // }
                }
            }
        }
        return $documentacion;
    }
    /**
	* Obtengo la imagen cargada en el acta de infraccion en calle guardada en instancias_formularios
	* @param array info_id
	* @return array Imagen acta infraccion en calle
	*/
    function getImgInfraccion($info_id){
        if($info_id){
            $infraccion = array();
            $this->load->model(FRM . 'Forms');
            $res = $this->Forms->obtener($info_id);

            foreach ($res->items as $key => $dato) {
                if(isset($dato->valor4_base64)){
                    $rec = stream_get_contents($dato->valor4_base64);
                    $ext = obtenerExtension($dato->valor);
                    
                    array_push($infraccion, $ext.$rec);
                }
            }
        }
        return $infraccion;
    }
    /**
	* Obtengo los datos cargadas en el escaneo de documentacion guardados en instancias_formularios
	* @param array info_id
	* @return array datos relacionadas con el info_id
	*/
    function getFormEscaneoDocu($info_id){
        if($info_id){
            $formEscaneo = array();
            $this->load->model(FRM . 'Forms');
            $res = $this->Forms->obtener($info_id);

            foreach ($res->items as $key => $dato) {
                if(isset($dato->valor4_base64)){
                    $rec = stream_get_contents($dato->valor4_base64);
                    $ext = obtenerExtension($dato->valor);
                    
                    if($dato->tipo_dato == 'image'){
                        $formEscaneo['imagenes'][$key]['inst_id'] = $dato->inst_id;
                        $formEscaneo['imagenes'][$key]['imagen'] = $ext.$rec;
                    }else{
                        $formEscaneo['archivos'][$key]['inst_id'] = $dato->inst_id;
                        $formEscaneo['archivos'][$key]['descripcion'] = $dato->valor;
                        $formEscaneo['archivos'][$key]['archivo'] = $ext.$rec;
                    }
                }else{
                    if(!empty($dato->valor)){
                        if($dato->tipo_dato == 'select'){
                            foreach ($dato->values as $key => $valor) {
                                if($dato->valor == $valor->value){
                                    $formEscaneo['datos'][$dato->name]['descripcion'] = $valor->label;
                                }
                            }
                        }
                        $formEscaneo['datos'][$dato->name]['valor'] = $dato->valor;
                    }
                }
            }
        }
        return $formEscaneo;
    }
    /**
	* Obtengo  patente / dominio cargada en Ingreso Barrera guardada en instancias_formularios
	* @param array info_id
	* @return array con patente / dominio guardado en forumlario
	*/
    function getPatenteTractor($info_id){
        $patente = '';
        $url = REST_FRM."/formulario/".$info_id;

        $aux = $this->rest->callAPI("GET",$url);
        $resp = json_decode($aux['data'])->formulario->items;

        foreach ($resp->item as $dato) {
            if($dato->name == 'dominio'){
                $patente = $dato->valor;
            }
        }

        return $patente;
    }
}