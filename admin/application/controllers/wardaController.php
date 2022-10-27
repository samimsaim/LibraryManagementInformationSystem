<?php
class wardaController extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('nawyat_maktobModel');

    }
    function index($message = null, $type = null,$result=" لست مکاتیب وارده"){
         $data=$this->nawyat_maktobModel->getWarda();

        $this->load->view('include/header.inc.php',array('result'=>$result));
        $this->load->view('warda',array('data'=>$data,'Message' => $message, 'Type' => $type));
        $this->load->view('include/footer.inc.php');
  	}
  }
  ?>
