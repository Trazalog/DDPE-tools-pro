<?php defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tests');
    }

    // public function test()
    // {

    // }

    // public function wso()
    // {

    // }

    public function index()
    {
        log_message('DEBUG','#TRAZA|TEST| estoy en Index ');
      $this->load->view('test');
    }

    public function view()
    {
        $data = $this->input->get();
        $this->load->view('testView', $data);
    }
}
