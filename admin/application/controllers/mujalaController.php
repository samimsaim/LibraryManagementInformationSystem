<?php
class MujalaController extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mujalaModel');
		$this->load->model('FacultyModel');
		$this->load->model('usersModel');
    }
	function index($message = null, $type = null,$result="مجلات"){
		$fac=$this->FacultyModel->facultyList();
		$panel=$this->mujalaModel->getPanel();
		$mag=$this->mujalaModel->getMag();
        $this->load->view('include/header.inc.php',array('result'=>$result));
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
            MujalaController::index("مجله مورد نظر موفقانه  اضافه شد", 'success');
        }else{
            MujalaController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
	}
	function checkAddPanal(){
		$data=array(
			'wp_name'=>$_POST['name'],
			'mag_no'=>$_POST['number'],

		);
		$result=$this->mujalaModel->addPanals($data);
				if($result){
						MujalaController::panal("پنل مورد نظر موفقانه اضافه شد", 'success');
				}else{
						MujalaController::panal("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
				}
	}
	function checkEditMujala(){
		$id=$_POST['mag_id'];
        $data=array(
            'mag_no'=>$_POST['number'],
            'teacher_name'=>$_POST['techarName'],
            'faculty_id'=>$_POST['faculty'],
            'issue_year'=>$_POST['date'],
        );
        $result=$this->mujalaModel->updateMujala($id,$data);
        if($result){
            MujalaController::index("مجله مورد نظر موفقانه  اضافه شد", 'success');
        }else{
            MujalaController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
	}
	function exMujala($message = null, $type = null,$result="مجلات بیرونی"){
		$data=$this->mujalaModel->getExMujala();
		$this->load->view('include/header.inc.php',array('result'=>$result));
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
			'em_name' => $_POST['em_name'],
			'reference' => $_POST['reference'],
			'em_number' => $_POST['em_number'],
			'issue_year' => $_POST['issue_year'],
		);
		$this->mujalaModel->updateExMujala($id,$data);
		redirect('MujalaController/exMujala');

	}
	function panal($message=null,$type=null,$result="هیئت تحریر"){
		$panal=$this->mujalaModel->getPanal();
		$mag=$this->mujalaModel->getMag();
		$this->load->view('include/header.inc.php',array('result'=>$result));
		$this->load->view('panal',array('panal'=>$panal,'mag'=>$mag,'Message' => $message, 'Type' => $type));
		$this->load->view('include/footer.inc.php');
	}
	function checkAdd
	(){
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
	function updatePanel(){
		$id=$_POST['wp_id'];
		$data=array(
			'wp_name'=>$_POST['wp_name'],
			'mag_no'=>$_POST['mag_no'],
		);
		$result=$this->mujalaModel->updatePanel($id,$data);
		if($result){
			MujalaController::panal("مجله مورد نظر موفقانه ویرایش شد",'success');
		}else {
			MujalaController::panal("کاربر مورد نظر شما متاسفانه ویرایش نشد. لطفاً دوباره کوشش نماید!", 'failed');;
		}
	}
	function getPanel($dat="هیئت تحریر"){
		$id=$_GET['id'];

		$data=$this->mujalaModel->getMaga($id);
		foreach($data as $row){
		 $row->mag_no;
		}
		$result=$this->mujalaModel->writingPan($row->mag_no);
		$this->load->view('include/header.inc.php',array('result'=>$dat));
		$this->load->view('panalList',array('result'=>$result));
		$this->load->view('include/footer.inc.php');



	}

}
?>
