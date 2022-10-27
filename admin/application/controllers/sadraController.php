<?php
class sadraController extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('nawyat_maktobModel');


    }
    function index($message = null, $type = null,$result=" لست مکاتیب صادره"){
        $data=$this->nawyat_maktobModel->getSadra();
       
        $this->load->view('include/header.inc.php',array('result'=>$result));
        $this->load->view('sadra',array('data'=>$data,'Message' => $message, 'Type' => $type));
        $this->load->view('include/footer.inc.php');
  	}
    function sadraDetail(){
      $id=$_GET['id'];
      $data=$this->nawyat_maktobModel->getSadraById($id);
      $this->load->view('include/header.inc.php');
      $this->load->view('sadraDetail',array('data'=>$data));
      $this->load->view('include/footer.inc.php');
    }
  }
  ?>
