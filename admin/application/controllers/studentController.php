<?php
class araizController extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('araizModel');
;
    }

	function index($message = null, $type = null,$result="لست عرایض"){
	    $data=$this->araizModel->getaraiz();

        $this->load->view('include/header.inc.php',array('result'=>$result));
        $this->load->view('araiz',array('data'=>$data,'Message' => $message, 'Type' => $type));
        $this->load->view('include/footer.inc.php');
	}
  function araizDetail($result="معلومات عرایض"){
    $id=$_GET['id'];
    $data=$this->araizModel->getID_shumara_arizaById($id);
    $this->load->view('include/header.inc.php',array('result'=>$result));
    $this->load->view('araizDetail',array('data'=>$data));
    $this->load->view('include/footer.inc.php');
  }
	function addaraiz($result="اضافه کردن مکتوب"){
		$ID_nawyat_maktob=$this->araizModel->getID_nawyat_maktob();
		$ID_shuba_marbuta=$this->araizModel->getID_shuba_marbuta();
		$ID_ID_dosya_archive=$this->araizModel->getID_ID_dosya_archive();
		$this->load->view('include/header.inc.php',array('result'=>$result));
        $this->load->view('addaraiz',array('ID_nawyat_maktob'=>$ID_nawyat_maktob,'ID_shuba_marbuta'=>$ID_shuba_marbuta,'ID_ID_dosya_archive'=>$ID_ID_dosya_archive));
        $this->load->view('include/footers.inc.php');
	}
	function availablearaiz($result="مکاتیب موجود"){
	        $data=$this->araizModel->getaraiz();
	        $ID_nawyat_maktob=$this->ID_nawyat_maktobModel->getID_nawyat_maktob();
	        $this->load->view('include/header.inc.php',array('result'=>$result));
	        $this->load->view('availablearaiz',array('data'=>$data,'ID_nawyat_maktob'=>$ID_nawyat_maktob));
	        $this->load->view('include/footer.inc.php');
	    }
	function editaraiz($result="ویرایش"){
			      $id=$_GET['ID_shumara_ariza'];
			      $araiz=$this->araizModel->getaraizById($id);
			        $mursal=$this->araizModel->getMursal();
			        $mursal_elai=$this->araizModel->getMursal_elai();
			        $khulas_matlab=$this->araizModel->getKhulas_matlab();
			        $ID_nawyat_maktob=$this->araizModel->getID_nawyat_maktob();
			        $ID_shuba_marbuta=$this->araizModel->getID_shuba_marbuta();
							$ID_ID_dosya_archive=$this->araizModel->getID_ID_dosya_archive();
							$ejraat=$this->araizModel->getEjraat();
							$mulahezat=$this->araizModel->getMulahezat();
							$hedayat=$this->araizModel->getHedayat();
			        $this->load->view('include/header.inc.php',array('result'=>$result));
			        $this->load->view('editaraiz',array('mursal'=>$mursal,'mursal_elai'=>$mursal_elai,'khulas_matlab'=>$khulas_matlab,'ID_nawyat_maktob'=>$ID_nawyat_maktob,'ID_shuba_marbuta'=>$ID_shuba_marbuta,'ID_ID_dosya_archive'=>$ID_ID_dosya_archive ,'ejraat'=>$ejraat ,'mulahezat'=>$mulahezat ,'hedayat'=>$hedayat));
			        $this->load->view('include/footers.inc.php');
			    }
					function deletearaiz(){
					        $id=$_GET['ID_shumara_ariza'];
					        $data=$this->araizModel->deletearaiz($id);
					        if($data){
					            $dat=$this->araizModel->deleteHedayat($id);
					        }
					        if($dat){
					            $result=$this->araizModel->deleteID_shuba_marbuta($id);
					        }
					        if($result){
					            araizController::index("مکتوب مورد نظر موفقانه حذف شد", 'success');
					        }else{
					            araizController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
					        }
					    }



}
?>
