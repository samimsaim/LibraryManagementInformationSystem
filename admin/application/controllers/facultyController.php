<?php

class FacultyController extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('FacultyModel');
	}

	function index($message = null, $type = null, $result="پوهنحًی ها"){
		$fac=$this->FacultyModel->facultyList();
		$dep=$this->FacultyModel->departmentList();
		$this->load->view('include/header.inc.php',array('result'=>$result));
		$this->load->view('faculty', array('fac'=>$fac,'dep'=>$dep,'Message' => $message, 'Type' => $type));
		$this->load->view('include/footer.inc.php');
	}

	function addFaculty(){
		$result=$this->FacultyModel->addFaculty();
        if($result){
            redirect('FacultyController/index');
        }else{
            echo "not";
        }
	}
    function addDepartment(){
        $result=$this->FacultyModel->addDepartment();
        if($result){
            redirect('FacultyController/index');
        }else{
            echo "not";
        }
    }
    function deleteFaculty(){
        if(isset($_POST['deleteFac'])){
            $id = $_POST["fac_id"];
            $check = $this->FacultyModel->checkHasDep($id);
            if($check == 0){
                $result = $this->FacultyModel->deleteFacultyDeps($id);
                if($result){
                    $res = $this->FacultyModel->deleteFaculty($id);
                    if($res){
                        FacultyController::index("پوهنحًی مورد نظر شما موفقانه حذف گردید!", 'success');
                    } else {
                        FacultyController::index("پوهنحًی مورد نظر شما متاسفانه حذف نگردید, لطفاً دوباره کوشش نماید!", 'failed');
                    }
                }
            }else{
                $result = $this->FacultyModel->deleteFaculty($id);
                if($result){
                    FacultyController::index("پوهنحًی مورد نظر شما موفقانه حذف گردید!", 'success');
                } else {
                    FacultyController::index("پوهنحًی مورد نظر شما متاسفانه حذف نگردید, لطفاً دوباره کوشش نماید!", 'failed');
                }
            }
        }
    }

    function deleteDep(){
        $id = $_GET['id'];
        $result = $this->FacultyModel->deleteDepartment($id);
        if ($result) {
            FacultyController::index("دیپارتمنت مورد نظر شما موفقانه حذف شد!", 'success');
        } else {
            FacultyController::index("دیپارتمنت مورد نظر شما متاسفانه حذف نگردید, لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
}

?>
