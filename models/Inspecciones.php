<?php defined('BASEPATH') or exit('No direct script access allowed');

class Inspecciones extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
	* Trae listado de choferes 
	* @param 
	* @return array con listado de choferes
	*/
    public function getChoferes(){
        
        $url = REST_SICP."/choferes";

        $aux = $this->rest->callAPI("GET",$url);
        $aux = json_decode($aux["data"]);

        log_message('DEBUG', "#TRAZA | #SICPOA | Inspecciones | getChoferes()  aux: >> " . json_encode($aux));

        return $aux->choferes->chofer;
    }
    
    public function getEstablecimientos(){
        
        $url = "http://localhost:8080/establecimientos";

        $aux = $this->rest->callAPI("GET",$url);
        $aux = json_decode($aux["data"]);

        return $aux->establecimientos->establecimiento;
    }

    public function getEmpresas(){
        
        $url = "http://localhost:8080/empresas";

        $aux = $this->rest->callAPI("GET",$url);
        $aux = json_decode($aux["data"]);

        return $aux->empresas->empresa;
    }

    public function getFotosBarrera(){
        
        $url = "http://localhost:8080/fotosBarrera";

        $aux = $this->rest->callAPI("GET",$url);
        $aux = json_decode($aux["data"]);

        return $aux->fotos->foto;
    }
    public function getDepositos(){
        
        $url = "http://localhost:8080/depositos";

        $aux = $this->rest->callAPI("GET",$url);
        $aux = json_decode($aux["data"]);

        return $aux->depositos->deposito;
    }
}
