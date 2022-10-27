<?php

class ProcurmentController extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('ProcurementModel');
	}

	function index($message = null, $type = null){
        $data=$this->ProcurementModel->getprocurment();
		$this->load->view('include/header.inc.php');
		$this->load->view('procurments',array('data'=>$data,'Message' => $message, 'Type' => $type));
		$this->load->view('include/footer.inc.php');
	}
    function addProcurment(){
        $result=$this->ProcurementModel->addProcurment();
        if($result){
            redirect('procurmentController/index');
        }else{
            echo "not";
        } 
    }
    function deleteProcurement(){
        $id=$_GET['id'];
        $result=$this->ProcurementModel->deleteProcurement($id);
         if($result){
            procurmentController::index("تمویل کننده مورد نظر موفقانه حذف شد", 'success');
        }else{
            procurmentController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
    function editAuthor(){
        $id=$_GET['id'];
        $data=$this->authorModel->getAuthors();
        $result=$this->authorModel->getAuthorById($id);
        $this->load->view('include/header.inc.php');
        $this->load->view('authors',array('data'=>$data,'result'=>$result));
        $this->load->view('include/footer.inc.php');

    }
    function updateProcurment(){
        $id=$_POST['procurement_id'];
        $data=array(
            'procurement_name'=>$_POST['procurment'],
        );
        $this->ProcurementModel->updateProcurment($id,$data);
        redirect('ProcurmentController/index');
    }

	}
?>