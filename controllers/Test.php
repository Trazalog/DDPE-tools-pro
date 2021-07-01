<?php defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tests');
    }

    /*MODULO IMAGE FORMS DINAMICO */
    public function index()
    {
      $this->load->view('test');
    }

    public function view()
    {
        $data = $this->input->get();
        $this->load->view('testView', $data);
    }

    /* COMPONENTE MOSAICO */
    public function mosaicoImagenes(){
        $data['imgsCodf'] = $this->Tests->imagenesCodificadas();
        $this->load->view('mosaicoImagenes',$data);
    }
    /* FIN COMPONENTE MOSAICO */
}
