<?php
class MujalaController extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mujalaModel');
		$this->load->model('FacultyModel');
		$this->load->model('usersModel');
    }
	function index($message = null, $type = null){
		$fac=$this->FacultyModel->facultyList();
		$panel=$this->mujalaModel->getPanel();
		$mag=$this->mujalaModel->getMag();
        $this->load->view('include/header.inc.php');
        $this->load->view('mujala',array('fac'=>$fac,'panel'=>$panel,'mag'=>$mag,'Message' => $message, 'Type' => $type));
        $this->load->view('include/footer.inc.php');
	}
	function addMujala(){
		$this->load->view('include/header.inc.php');
        $this->load->view('addMujala');
        $this->load->view('include/footer.inc.php');
	}
	function checkAddMujala(){
		$result=$this->mujalaModel->addMujala();
        if($result){
            redirect('MujalaController/index');
        }else{
            echo "not";
        }
	}
	function exMujala($message = null, $type = null){
		$data=$this->mujalaModel->getExMujala();
		$this->load->view('include/header.inc.php');
		$this->load->view('exMujala',array('data'=>$data,'Message' => $message, 'Type' => $type));
		$this->load->view('include/footer.inc.php');

	}
	function addExMujala(){
		$this->load->view('include/header.inc.php');
		$this->laod->view('addExMujala');
		$this->load->view('include/footer.inc.php');
	}
	function checkAddExMujala(){
		$result=$this->mujalaModel->addExMujala();
        if($result){
            redirect('MujalaController/exMujala');
        }else{
            echo "not";
        } 
	}
	function deleteExMujala(){
		$id=$_GET['id'];
		$result=$this->mujalaModel->deleteExMujala($id);
		if($result){
            MujalaController::exMujala("مجله مورد نظر موفقانه حذف شد", 'success');
        }else{
            MujalaController::exMujala("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
	}
	function deleteMujala(){
	   	$id=$_GET['id'];
		$result=$this->mujalaModel->deleteMujala($id);
		if($result){
            MujalaController::index("مجله مورد نظر موفقانه حذف شد", 'success');
        }else{
            MujalaController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
	}
	function updateExMujala(){
		$id=$_POST['em_id'];
		$data=array(
			'em_name'=>$_POST['em_name'],
			'reference'=>$_POST['reference'],
			'em_number'=>$_POST['em_number'],
			'issue_year'=>$_POST['issue_year'],
		);
		$this->mujalaModel->updateExMujala($id,$data);
		redirect('MujalaController/exMujala');
		
	}
	function panal(){
		$panal=$this->mujalaModel->getPanal();
		$mag=$this->mujalaModel->getMag();
		$this->load->view('include/header.inc.php');
		$this->load->view('panal',array('panal'=>$panal,'mag'=>$mag));
		$this->load->view('include/footer.inc.php');
	}
	function checkAddPanal(){
		$result=$this->mujalaModel->addPanal();
        if($result){
            redirect('MujalaController/panal');
        }else{
            echo "not";
        }
	}
	function deletePanal(){
		$id=$_GET['id'];
		$result=$this->mujalaModel->deletePanal($id);
		if($result){
			redirect('MujalaController/panal');
		}
	}
	function getPanel(){
		$id=$_GET['id'];

		$data=$this->mujalaModel->getMaga($id);
		foreach($data as $row){
		 $row->mag_no;
		}
		$result=$this->mujalaModel->writingPan($row->mag_no);
		$this->load->view('include/header.inc.php');
		$this->load->view('panalList',array('result'=>$result));
		$this->load->view('include/footer.inc.php');



	}
	
}
?>