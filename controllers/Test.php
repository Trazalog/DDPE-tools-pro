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
      $this->load->view('test');
    }

    public function view()
    {
        $data = $this->input->get();
        $this->load->view('testView', $data);
    }

    public function recibeData(){
        if (!empty($_FILES)) {
     
            $file = $_FILES['file']['tmp_name'];          //3             
              
            $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
             
            $targetFile =  $targetPath. $_FILES['file']['name'];  //5
         
            move_uploaded_file($file,$targetFile); //6
             
        }
        echo json_encode("true");
    }
}
