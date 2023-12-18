<?php defined('BASEPATH') or exit('No direct script access allowed');

class Inspeccion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Inspecciones');
		$this->load->model('core/Valores');    
		// $this->load->model(REST_CORE . 'core/Valores');
		// si esta vencida la sesion redirige al login
		$data = $this->session->userdata();
		// log_message('DEBUG','#Main/login | '.json_encode($data));
		if(!$data['email']){
			log_message('DEBUG','#TRAZA|DASH|CONSTRUCT|ERROR  >> Sesion Expirada!!!');
			redirect(DNATO.'main/login');
		}
    }

	/**
	* Ingreso por barrera
	* @param array 
	* @return bool
	*/
    public function ingresoBarrera(){

		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | ingresoBarrera()");
        $this->load->view('barrera/barrera');
    }
    /**
	* Guarda Chofer
	* @param array datos chofer
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarChofer(){

		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | agregarChofer()");

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
	* Busca Choferes en SIPE que coincidan con un patron ingresado
	* @param array patron ingresado en pantalla
	* @return array listado de choferes coincidentes con el criterio de busqueda
	*/
    public function buscaChoferes(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | buscaChoferes()");

        $dato = $this->input->get('patron');        
		
		$resp = $this->Inspecciones->buscaChoferesSIPE($dato);

		echo json_encode($resp);
    }
    /**
	* Guarda Empresa, lo reutilizo para establecimiento, empresa y transportista
	* @param array datos Empresa
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarEmpresa(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | agregarEmpresa()");

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
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | buscaEmpresas()");

        $dato = $this->input->get('patron');
        
		$resp = $this->Inspecciones->buscaEmpresasAFIP($dato);
        
		echo json_encode($resp);
    }
    /**
	* Guarda deposito
	* @param array datos deposito
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarDeposito(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | agregarDeposito()");

        $data = $this->input->post('data');
        
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
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | getDepositos()");

        $dato = $this->input->post('destino');
        
		$resp = $this->Inspecciones->getDepositos($dato['empr_id']);
        
		if ($resp) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Obtiene inspeccion por case_id
	* @param string case_id
	* @return array informacion cargada para un inspeccion
	*/
    public function getInspeccion(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | getInspeccion()");

        $caseId = $this->input->post('caseId');
        
		$resp = $this->Inspecciones->getInspeccion($caseId['case_id']);
        
		if ($resp) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Alta de una inspeccion
	* @param array datos inspeccion
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarInspeccion(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | agregarInspeccion()");
		
        $data['case_id'] = $this->input->post('case_id');
		$data['patente_tractor'] =  !empty($this->input->post('patente_tractor'))? $this->input->post('patente_tractor') : "";
		$data['nro_senasa'] =  !empty($this->input->post('nro_senasa'))? $this->input->post('nro_senasa') : "";
		$data['kilos'] = ""; /* !empty($this->input->post('kilos'))? $this->input->post('kilos') :  "";*/
		$data['reprecintado'] =  !empty($this->input->post('reprecintado'))? $this->input->post('reprecintado') : "false";
		$data['bruto'] =  !empty($this->input->post('bruto'))? $this->input->post('bruto') : "";
		$data['tara'] =  !empty($this->input->post('tara'))? $this->input->post('tara') : "";
		$data['ticket'] =  !empty($this->input->post('ticket'))? $this->input->post('ticket') : "";
		$data['resultado'] =  !empty($this->input->post('inspValida'))? $this->input->post('inspValida') : "";
		$data['cant_fajas'] =  !empty($this->input->post('cant_fajas'))? $this->input->post('cant_fajas') : "";
		$data['bruto_reprecintado'] =  !empty($this->input->post('bruto_reprecintado'))? $this->input->post('bruto_reprecintado') : "";
		$data['ticket_reprecintado'] =  !empty($this->input->post('ticket_reprecintado'))? $this->input->post('ticket_reprecintado') : "";
        $data['usuario_app'] = userNick();
		$data['petr_id'] =  !empty($this->input->post('petr_id'))? $this->input->post('petr_id') : "";
		$data['chof_id'] =  !empty($this->input->post('chof_id'))? $this->input->post('chof_id') : "";
		$data['inca_id'] =  !empty($this->input->post('inca_id'))? $this->input->post('inca_id') : "";
		$data['observaciones'] =  !empty($this->input->post('observaciones'))? $this->input->post('observaciones') : "";
		$data['info_id_doc'] =  !empty($this->input->post('info_id_doc'))? $this->input->post('info_id_doc'): "";
		$data['email_transportista'] =  !empty($this->input->post('emailTransportista'))? $this->input->post('emailTransportista') : "";
		$data['tel_transportista'] =  !empty($this->input->post('telTransportista'))? $this->input->post('telTransportista') : "";
		$data['departamento'] =  !empty($this->input->post('depa_idActa'))? $this->input->post('depa_idActa') : "";
		$data['localidad'] =  !empty($this->input->post('localidad'))? $this->input->post('localidad') : "";
		$data['inspectores'] =  !empty($this->input->post('inspectores'))? $this->input->post('inspectores') : "";
		$data['se_constituye'] =  !empty($this->input->post('dondeConstituyen'))? $this->input->post('dondeConstituyen') : "";
		$data['domicilio_constituye'] =  !empty($this->input->post('domicilio'))? $this->input->post('domicilio') : "";
		$data['propiedad_de'] =  !empty($this->input->post('propiedad'))? $this->input->post('propiedad') : "";
		$data['atendidos_por'] =  !empty($this->input->post('quienAtendio'))? $this->input->post('quienAtendio') : "";
		$data['caracter_de'] =  !empty($this->input->post('caracterAtendio'))? $this->input->post('caracterAtendio') : "";
		$data['proceden_a'] =  !empty($this->input->post('procedenAccion'))? $this->input->post('procedenAccion') : "";
		$data['fec_inspeccion'] =  !empty($this->input->post('fec_inspeccion'))? $this->input->post('fec_inspeccion') : date("Y-m-d H:i:s");
		$data['info_id_acta'] =  !empty($this->input->post('info_id_acta'))? $this->input->post('info_id_acta') : "";
		

		$resp = $this->Inspecciones->agregarInspeccion($data);
		        
		if ($resp['status']) {

			$data['tipo'] =  !empty($this->input->post('tipo'))? $this->input->post('tipo') : "";
			/* Agregado de numerador de actas  */
			$tabla = 'numerador_actas_sicpoa';
			$nro = $this->Valores->getValor($tabla);
			if (!$nro) {
				
				if($data['tipo'] == 'inspeccion' ){
					$numerador['tipo'] = 'inspeccion';
				}
				if($data['tipo'] == 'reprecintado' ){
					$numerador['tipo'] = 'reprecintado';
				}
				if($data['tipo'] == 'infraccion' ){
					$numerador['tipo'] = 'infraccion';
				}
				$numerador['nro'] = '1';
				$numerador['case_id'] = $data['case_id'];
			} else {

				if($data['tipo'] == 'inspeccion' ){
					$numerador['tipo'] = 'inspeccion';
				}
				if($data['tipo'] == 'reprecintado' ){
					$numerador['tipo'] = 'reprecintado';
				}
				if($data['tipo'] == 'infraccion' ){
					$numerador['tipo'] = 'infraccion';
				}
				$nuevoNro = $nro[0]->valor2 + 1;
				$numerador['nro'] = strval($nuevoNro);
				$numerador['case_id'] =  $data['case_id'];
			}
			//Agrego numerador
			$respnumerador = $this->Inspecciones->agregarNumerador($numerador);

			/* Actualizo o creo nuevo registro en core.tablas con 'numerador_actas_sicpoa' */
			if($respnumerador['status']){
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

				$resp['contador'] = $numerador['nro'];
			}

			echo json_encode($resp);

		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Guarda todos la informacion relacionada con la inspeccion
	* @param array con permisos,empresas y termicos
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function guardarDatosInspeccion(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | guardarDatosInspeccion()");
		
		$case_id = $this->input->post('case_id');
		$permisos = $this->input->post('permisos');
        $empresas = $this->input->post('empresas');
		$termicos = $this->input->post('termicos');
		$infraccion = $this->input->post('infraccion');
		$tiposInfraccion = $this->input->post('tiposInfraccion');

		//Agrego permisos
		$rspPermisos = $this->Inspecciones->agregarPermisos($permisos);

		//Agrego empresas
		$respEmpresas = $this->Inspecciones->agregarEmpresas($empresas);

		//Agrego termicos a la tabla termicos
		$this->Inspecciones->agregarTermicos($termicos);

		//Luego los agrego a tabla inspecciones_termicos
		$respTermInspeccion = $this->Inspecciones->agregarTermicosInspeccion($termicos);

		//Puede o no tener una infraccion asociada
		if(!empty($infraccion)){
			$respInfraccion = $this->Inspecciones->agregarInfraccion($infraccion);
		}
		if(!empty($tiposInfraccion)){
			$resptiposInfraccion = $this->Inspecciones->agregarTiposInfraccion($tiposInfraccion);
		}

        //Armo mensajeria para reportar respuestas de los servicios
		if ($respTermInspeccion['status'] && $rspPermisos['status'] && $respEmpresas['status']) {
			
			$resp['status'] = true;
			$resp['message'] = "Se agregaron permisos, empresas y termicos correctamente";

			if($respInfraccion['status']){
				$resp['msjInfraccion'] = "Se agrego la infraccion correctamente";
			}else{
				$resp['msjInfraccion']['data'] = $respInfraccion['data'];
				$resp['msjInfraccion']['message'] = "Se produjo un error al guardar los datos de la infracción";
			}
			if($resptiposInfraccion['status']){
				$resp['msjTiposInfraccion'] = "Se agregaron los tipos de infracciones correctamente";
			}else{
				$resp['msjTiposInfraccion']['data'] = $resptiposInfraccion['data'];
				$resp['msjTiposInfraccion']['message'] = "Se produjo un error al guardar los tipos de infracciones";
			}
			echo json_encode($resp);
		} else {
			/*En caso de fallar alguna operacion de guardado de los datos anexos a la inspeccion, armo un arreglo con la respuesta correspondiente.
			para luego informarla al usuario en la pantalla */
			$resp['status'] = false;
			$resp['message'] = "Se produjo un error guardando los datos: ";
			//EVALUO RESPUESTA TERMICOS
			if(!$respTermInspeccion['status']){
				if(stripos($respTermInspeccion['data'], "inspecciones_termicos_pk")){ 
					$resp['message'] .= "<br> -> <b>Error</b> al agregar los termicos asociados a la inspección.<br> <b>Información duplicada!</b> <br>";
				}else{
					$resp['message'] .= "<br> -> <b>Error</b> al agregar los termicos asociados a la inspección.<br>";
				}
			}
			//EVALUO RESPUESTA PERMISOS DE TRANSITO
			if(!$rspPermisos['status']){
				if(stripos($rspPermisos['data'], "permisos_transito_pk")){ 
					$resp['message'] .= "<br> -> <b>Error</b> al agregar los permisos de tránsito.<br> <b>Información duplicada!</b> <br>";
				}else{
					$resp['message'] .= "<br> -> <b>Error</b> al agregar los permisos de tránsito. <br>";
				}
			}
			//EVALUO RESPUESTA EMPRESAS DE DESTINO
			if(!$respEmpresas['status']){
				if(stripos($respEmpresas['data'], "inspecciones_empresas_pk")){ 
					$resp['message'] .= "<br> -> <b>Error</b> al agregar las empresas de destino.<br> <b>Información duplicada!</b> <br>";
				}else{
					$resp['message'] .= "<br> -> <b>Error</b> al agregar las empresas de destino. <br>";
				}
			}
			$resp['message'] .= "<br>Por favor, revise la información cargada.";
			$resp['permisos'] = $rspPermisos['data'];
			$resp['empresas'] = $respEmpresas['data'];
			$resp['termicos'] = $respTermInspeccion['data'];

			if($respInfraccion['status']){
				$resp['msjInfraccion'] = "Se agrego la infraccion correctamente";
			}else{
				$resp['msjInfraccion'] = $respInfraccion['data'];
			}
			if($resptiposInfraccion['status']){
				$resp['msjTiposInfraccion'] = "Se agregaron los tipos de infracciones correctamente";
			}else{
				$resp['msjTiposInfraccion'] = $resptiposInfraccion['data'];
			}
			echo json_encode($resp);
		}
    }

	/**
	* Elimina permiso de la inspeccion
	* @param array perm_id
	* @return bool true o false segun resultado de servicio de borrado
	*/
    public function eliminarPermiso(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | eliminarPermiso()");

        $data = $this->input->post('data');
        
		$resp = $this->Inspecciones->eliminarPermiso($data);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }

	/**
	* Elimina empresa de la inspeccion
	* @param array perm_id
	* @return bool true o false segun resultado de servicio de borrado
	*/
    public function eliminarEmpresa(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | eliminarEmpresa()");

        $data = $this->input->post('data');
        
		$resp = $this->Inspecciones->eliminarEmpresa($data);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }

	/**
	* Elimina termico de la inspeccion
	* @param array perm_id
	* @return bool true o false segun resultado de servicio de borrado
	*/
    public function eliminarTermico(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | eliminarTermico()");

        $data = $this->input->post('data');
        
		$resp = $this->Inspecciones->eliminarTermico($data);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Limpia las tablas anexas a inspeccion
	* @param array con permisos,empresas y termicos
	* @return bool true o false segun resultado de servicio de borrado
	*/
    public function limpiarDataPreCargada(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | limpiarDataPreCargada()");
		
		$caseId = $this->input->post('caseId');

		//Elimino permisos de inspeccion
		$rspPermisos = $this->Inspecciones->eliminarPermiso($caseId);

		//Elimino empresas de inspeccion
		$respEmpresas = $this->Inspecciones->eliminarEmpresa($caseId);
		
		//Elimino termicos de inspeccion
		$respTermicos = $this->Inspecciones->eliminarTermico($caseId);
		
        
		if ($respTermicos['status'] && $rspPermisos['status'] && $respEmpresas['status']) {
			$resp['status'] = true;
			$resp['message'] = "Se limpiaron las tablas permisos_transito, inspecciones_empresas y inspecciones_termicos correctamente";
			echo json_encode($resp);
		} else {
			$resp['status'] = false;
			$resp['message'] = "Se produjo un error guardando los datos";
			$resp['permisos'] = $rspPermisos['data'];
			$resp['empresas'] = $respEmpresas['data'];
			$resp['termicos'] = $respTermicos['data'];
			echo json_encode($resp);
		}
    }
	/**
	* Alta de un documento
	* @param array datos documento
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function agregarDocumento(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | agregarDocumento()");
		
		$data['fec_emision'] = date('Y-m-d',strtotime($this->input->post('fec_emision')));
		$data['num_documento'] =  !empty($this->input->post('num_documento'))? $this->input->post('num_documento') : "";
        $data['usuario_app'] = userNick();
		$data['tido_id'] =  !empty($this->input->post('tido_id'))? $this->input->post('tido_id') : "";
		$data['imag_id'] =  !empty($this->input->post('imag_id'))? $this->input->post('imag_id') : "";
		$data['empr_id_emisor'] =  !empty($this->input->post('empr_id_emisor'))? $this->input->post('empr_id_emisor') : "";
		$data['empr_id_destino'] =  !empty($this->input->post('empr_id_destino'))? $this->input->post('empr_id_destino') : "";
        $data['case_id'] = $this->input->post('case_id');

		$resp = $this->Inspecciones->agregarDocumento($data);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Alta de detalle para un documento
	* @param array datos del detalle del documento
	* @return bool true o false segun resultado de servicio de guardado
	*/
    public function guardarDetallesDocumentos(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | guardarDetallesDocumentos()");
		$detalles = $this->input->post('detalles');

		$resp = $this->Inspecciones->guardarDetallesDocumentos($detalles);

		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Eliminar documento
	* @param array con permisos,empresas y termicos
	* @return bool true o false segun resultado de servicio de borrado
	*/
    public function eliminarDocumento(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | eliminarDocumento()");
		
		$documento = $this->input->post('documento');

		$resp = $this->Inspecciones->eliminarDocumento($documento);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Edicion del detalle para un documento
	* @param array datos a editar del detalle de un documento
	* @return bool true o false segun resultado de servicio
	*/
    public function editarDetalleDocumento(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | editarDetalleDocumento()");
		$detalle = $this->input->post('data');

		$resp = $this->Inspecciones->editarDetalleDocumento($detalle);

		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Eliminar documento
	* @param array con permisos,empresas y termicos
	* @return bool true o false segun resultado de servicio de borrado
	*/
    public function eliminarDetalleDocumento(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | eliminarDetalleDocumento()");
		
		$dedo_id = $this->input->post('dedo_id');

		$resp = $this->Inspecciones->eliminarDetalleDocumento($dedo_id);
        
		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Alta del detalle para un documento
	* @param array con datos para agregar al documento
	* @return bool true o false segun resultado de servicio
	*/
    public function agregarDetalleDocumento(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | agregarDetalleDocumento()");
		$detalle = $this->input->post('data');

		$resp = $this->Inspecciones->agregarDetalleDocumento($detalle);

		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
	/**
	* Edicion del detalle para un documento
	* @param array datos a editar del detalle de un documento
	* @return bool true o false segun resultado de servicio
	*/
    public function editarDocumento(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | editarDocumento()");

		$data['fec_emision'] = date('Y-m-d',strtotime($this->input->post('fec_emision')));
		$data['num_documento'] =  !empty($this->input->post('num_documento'))? $this->input->post('num_documento') : "";
        $data['usuario_app'] = userNick();
		$data['tido_id'] =  !empty($this->input->post('tido_id'))? $this->input->post('tido_id') : "";
		$data['imag_id'] =  !empty($this->input->post('imag_id'))? $this->input->post('imag_id') : "";
		$data['empr_id_emisor'] =  !empty($this->input->post('empr_id_emisor'))? $this->input->post('empr_id_emisor') : "";
		$data['empr_id_destino'] =  !empty($this->input->post('empr_id_destino'))? $this->input->post('empr_id_destino') : "";

		$resp = $this->Inspecciones->editarDocumento($data);

		if ($resp['status']) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }
		/**
	* Trae el peso de la bascula
	* @return integer peso de la bascula
	*/
    public function getPesoBascula(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | getPesoBascula()");
        
		$resp = $this->Inspecciones->getPesoBascula();
        
		echo json_encode($resp);
    }

	/**
	* verifica si un permiso existe o no
	* @return bool true o false segun resultado de servicio
	*/
    public function validacionPermiso(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | validacionPermiso()");
		$numero_permiso = $this->input->post('num_permiso');

		$resp = $this->Inspecciones->validacionPermiso($numero_permiso);

		if ($resp->perm_id) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }

	/**
	* Obtiene termicos por patron de busqueda
	* @param string patente
	* @return array patentes que coincidan con el patron ingresado
	*/
    public function buscatermicos(){
		log_message('DEBUG', "#TRAZA | #SICPOA | Inspeccion | getPatenteTermico()");

        $patente = $this->input->get('patron');
        
		$resp = $this->Inspecciones->getPatenteTermico($patente);
        
		if ($resp) {
			echo json_encode($resp);
		} else {
			echo json_encode($resp);
		}
    }

}
