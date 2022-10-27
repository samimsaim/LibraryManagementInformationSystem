<?php
class makatebController extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('makatebModel');
        $this->load->model('ID_nawyat_maktobModel');
				  $this->load->model('ID_shuba_marbutaModel');
    }

	function index($message = null, $type = null,$result="لیست مکاتیب"){
	    $data=$this->makatebModel->getMakateb();

        $this->load->view('include/header.inc.php',array('result'=>$result));
        $this->load->view('makateb',array('data'=>$data,'Message' => $message, 'Type' => $type));
        $this->load->view('include/footer.inc.php');
	}
  function makatebDetail($result="معلومات مکاتیب"){
    $id=$_GET['id'];
    $data=$this->makatebModel->getID_shumara_maktobById($id);
    $this->load->view('include/header.inc.php',array('result'=>$result));
    $this->load->view('makatebDetail',array('data'=>$data));
    $this->load->view('include/footer.inc.php');
  }
	function addmakateb($result="اضافه کردن مکتوب"){
		$ID_nawyat_maktob=$this->makatebModel->getID_nawyat_maktob();
		$ID_shuba_marbuta=$this->makatebModel->getID_shuba_marbuta();
		$ID_ID_dosya_archive=$this->makatebModel->getID_ID_dosya_archive();
		$this->load->view('include/header.inc.php',array('result'=>$result));
        $this->load->view('addMakateb',array('ID_nawyat_maktob'=>$ID_nawyat_maktob,'ID_shuba_marbuta'=>$ID_shuba_marbuta,'ID_ID_dosya_archive'=>$ID_ID_dosya_archive));
        $this->load->view('include/footers.inc.php');
	}
	function availableMakateb($result="مکاتیب موجود"){
	        $data=$this->makatebModel->getMakateb();
	        $ID_nawyat_maktob=$this->ID_nawyat_maktobModel->getID_nawyat_maktob();
	        $this->load->view('include/header.inc.php',array('result'=>$result));
	        $this->load->view('availableMakateb',array('data'=>$data,'ID_nawyat_maktob'=>$ID_nawyat_maktob));
	        $this->load->view('include/footer.inc.php');
	    }
	function editMakateb($result="ویرایش"){
			      $id=$_GET['ID_shumara_maktob'];
			      $makateb=$this->makatebModel->getMakatebById($id);
			        $mursal=$this->makatebModel->getMursal();
			        $mursal_elai=$this->makatebModel->getMursal_elai();
			        $khulas_matlab=$this->makatebModel->getKhulas_matlab();
			        $ID_nawyat_maktob=$this->makatebModel->getID_nawyat_maktob();
			        $ID_shuba_marbuta=$this->makatebModel->getID_shuba_marbuta();
							$ID_ID_dosya_archive=$this->makatebModel->getID_ID_dosya_archive();
							$ejraat=$this->makatebModel->getEjraat();
							$mulahezat=$this->makatebModel->getMulahezat();
							$hedayat=$this->makatebModel->getHedayat();
			        $this->load->view('include/header.inc.php',array('result'=>$result));
			        $this->load->view('editmakateb',array('mursal'=>$mursal,'mursal_elai'=>$mursal_elai,'khulas_matlab'=>$khulas_matlab,'ID_nawyat_maktob'=>$ID_nawyat_maktob,'ID_shuba_marbuta'=>$ID_shuba_marbuta,'ID_ID_dosya_archive'=>$ID_ID_dosya_archive ,'ejraat'=>$ejraat ,'mulahezat'=>$mulahezat ,'hedayat'=>$hedayat));
			        $this->load->view('include/footers.inc.php');
			    }
					function deleteMakateb(){
					        $id=$_GET['ID_shumara_maktob'];
					        $data=$this->makatebModel->deleteMakateb($id);
					        if($data){
					            $dat=$this->makatebModel->deleteHedayat($id);
					        }
					        if($dat){
					            $result=$this->makatebModel->deleteID_shuba_marbuta($id);
					        }
					        if($result){
					            makatebController::index("مکتوب مورد نظر موفقانه حذف شد", 'success');
					        }else{
					            makatebController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
					        }
					    }
							function checkAddMakateb(){
							        $error_ID_shumara_maktob = $error_date = $error_mursal = $error_mursal_elai = $error_ID_nawyat_maktob = $error_ID_shuba_marbuta = $error_ID_ID_dosya_archive = $error_ejraat = $error_khulas_matlab = $error_hedayat =
											;
							        $error = false;
							        if (isset($_POST['addMakateb'])) {


							            // -------------- Form validation -----------------
							            if (empty($_POST['ID_shumara_maktob'])) {
							                $error_ID_shumara_maktob = 'لطفاً شماره مکتوب را وارد نماید';
							                $error = true;
							            }
							            if (empty($_POST['date'])) {
							                $error_date = 'لطفاً  تاریخ ثبت را وارد نماید';
							                $error = true;
							            }
							            if (empty($_POST['mursal'])) {
							                $error_mursal = 'لطفاً مرسل را وارد نماید';
							                $error = true;
							            }
							            if (empty($_POST['mursal_elai'])) {
							                $error_mursal_elai = 'لطفاً  مرسل الیه را وارد نماید';
							                $error = true;
							            }

							            if (empty($_POST['ID_nawyat_maktob'])) {
							                $error_ID_nawyat_maktob = 'لطفاً  نوعیت مکتوب را وارد نماید';
							                $error = true;
							            }
							            if (empty($_POST['ID_shuba_marbuta'])) {
							                $error_ID_shuba_marbuta = 'لطفاً شعبه مربوطه را وارد نماید';
							                $error = true;
							            }
							            if (empty($_POST['ID_ID_dosya_archive'])) {
							                $error_ID_ID_dosya_archive = 'لطفاً دوسیه آرشیف را وارد نماید';
							                $error = true;
							            }
							            if (empty($_POST['ejraat'])) {
							                $error_ejraat = 'لطفاً اجرات را وارد نماید';
							                $error = true;
							            }
							            if (empty($_POST['khulas_matlab'])) {
							                $error_khulas_matlab = 'لطفاً خلاصه مطلب را وارد نماید';
							                $error = true;
							            }
							            if (empty($_POST['hedayat'])) {
							                $error_hedayat = 'لطفاً  هدایت مربوطه را وارد نماید';
							                $error = true;
							            }

							                        $error = true;
							                }

							            $data = array(
							                "ID_shumara_maktob" => $_POST['ID_shumara_maktob'],
							                "mursal" => $_POST['mursal'],
							                "date" => $_POST['date'],
							                "mursal_elai" => $_POST['mursal_elai'],
							                "ID_nawyat_maktob" => $_POST['ID_nawyat_maktob'],
							                "ID_shuba_marbuta" => $_POST['ID_shuba_marbuta'],
							                "ID_ID_dosya_archive" => $_POST['ID_ID_dosya_archive'],
							                "ejraat" => $_POST['ejraat'],
							                "khulas_matlab" => $_POST['khulas_matlab'],
							                "hedayat" => $_POST['hedayat'],
							            );

							            $ID_shumara_maktob=$this->makatebModel->insertMakateb($data);

							           if($result){
							            makatebController::index("مکتوب مورد نظر موفقانه اضافه شد", 'success');
							        }else{
							            makatebController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید", 'failed');
							        }
							             else {
							            $hedayat=$this->makatebModel->getHedayat();
											$ID_nawyat_maktob=$this->makatebModel->getID_nawyat_maktob();
											$ID_shuba_marbuta=$this->makatebModel->getID_shuba_marbuta();
											$ID_ID_dosya_archive=$this->makatebModel->getID_ID_dosya_archive();
							            $this->load->view('include/header.inc.php');
							            $this->load->view('addMakateb', array(
							                'ID_shumara_maktob' => $ID_shumara_maktob,
							                'mursal' => $mursal,
							                'mursal_elai' => $error_mursal_elai,
							                'ID_nawyat_maktob' => $ID_nawyat_maktob,
							                'khulas_matlab' => $khulas_matlab,
															'ID_shuba_marbuta' => $ID_shuba_marbuta,
															'ID_ID_dosya_archive' => $ID_ID_dosya_archive,
															'ejraat' => $ejraat,
															'mulahezat' => $mulahezat,
															'hedayat' => $hedayat,
							                'error_ID_shumara_maktob' => $error_ID_shumara_maktob,
							                'error_date' => $error_date,
							                'error_mursal' => $error_mursal,
							                'error_ID_nawyat_maktob' => $error_ID_nawyat_maktob,
							                'error_khulas_matlab' => $error_khulas_matlab,
							                'error_ID_shuba_marbuta' => $error_ID_shuba_marbuta,
							                'error_ID_ID_dosya_archive' => $error_ID_ID_dosya_archive,
							                'error_ejraat' => $error_ejraat,
							                'error_mulahezat' => $error_mulahezat,
							                'error_hedayat' => $error_hedayat,
							                'Field_data' => $_POST
							            ));
							            $this->load->view('include/footers.inc.php');
							        }
							        }
											function checkEditMakateb(){
	 														$error_shumara_maktob = $error_date = $error_mursal = $error_mursal_elai = $error_khulas_matlab = $error_ID_nawyat_maktob = $error_ID_shuba_marbuta = $error_ID_dosya_archive = $error_ejraat = $error_mulahezat=$error_hedayat;
											        $error = false;
											        if (isset($_POST['addMakateb'])) {


											            // -------------- Form validation -----------------
																	if (empty($_POST['shumara_maktob'])) {
											                $error_shumara_maktob = 'لطفاً شماره مکتوب را وارد نماید';
											                $error = true;
											            }
											            if (empty($_POST['date'])) {
											                $error_date = 'لطفاً  تاریخ ثبت را وارد نماید';
											                $error = true;
											            }
											            if (empty($_POST['mursal'])) {
											                $error_mursal = 'لطفاً مرسل را وارد نماید';
											                $error = true;
											            }
											            if (empty($_POST['mursal_elai'])) {
											                $error_mursal_elai = 'لطفاً  مرسل الیه را وارد نماید';
											                $error = true;
											            }

											            if (empty($_POST['$ID_nawyat_maktob'])) {
											                $error_ID_nawyat_maktob = 'لطفاً  نوعیت مکتوب را وارد نماید';
											                $error = true;
											            }
											            if (empty($_POST['shuba_marbuta'])) {
											                $error_publisher = 'لطفاً شعبه مربوطه را وارد نماید';
											                $error = true;
											            }
											            if (empty($_POST['ID_dosya_archive'])) {
											                $error_ID_dosya_archive = 'لطفاً دوسیه آرشیف را وارد نماید';
											                $error = true;
											            }
											            if (empty($_POST['ejraat'])) {
											                $error_ejraat = 'لطفاً اجرات را وارد نماید';
											                $error = true;
											            }
											            if (empty($_POST['khulas_matlab'])) {
											                $error_khulas_matlab = 'لطفاً خلاصه مطلب را وارد نماید';
											                $error = true;
											            }
											            if (empty($_POST['hedayat'])) {
											                $error_hedayat = 'لطفاً  هدایت مربوطه را وارد نماید';
											                $error = true;
											            }

											        }
											        //------------------------------------------------

											            $shumara_maktob=$_POST['shumara_maktob'];
											            $data = array(
																		"shumara_maktob" => $_POST['shumara_maktob'],
																		"mursal" => $_POST['mursal'],
																		"date" => $_POST['date'],
																		"mursal_elai" => $_POST['mursal_elai'],
																		"ID_nawyat_maktob" => $_POST['ID_nawyat_maktob'],
																		"ID_shuba_marbuta" => $_POST['ID_shuba_marbuta'],
																		"ID_dosya_archive" => $_POST['ID_dosya_archive'],
																		"ejraat" => $_POST['ejraat'],
																		"khulas_matlab" => $_POST['khulas_matlab'],
																		"hedayat" => $_POST['hedayat'],
											            );

											             $this->makatebModel->updateMakateb($shumara_maktob,$data);

																	 	$this->load->view('include/header.inc.php');
																	 	$this->load->view('addMakateb', array(
																	 			'shumara_maktob' => $shumara_maktob,
																	 			'mursal' => $mursal,
																	 			'mursal_elai' => $error_mursal_elai,
																	 			'ID_nawyat_maktob' => $ID_nawyat_maktob,
																	 			'khulas_matlab' => $khulas_matlab,
																	 			'ID_shuba_marbuta' => $ID_shuba_marbuta,
																	 			'ID_dosya_archive' => $ID_dosya_archive,
																	 			'ejraat' => $ejraat,
																	 			'mulahezat' => $mulahezat,
																	 			'hedayat' => $hedayat,
																	 			'error_shumara_maktob' => $error_shumara_maktob,
																	 			'error_date' => $error_date,
																	 			'error_mursal' => $error_mursal,
																	 			'error_ID_nawyat_maktob' => $error_ID_nawyat_maktob,
																	 			'error_khulas_matlab' => $error_khulas_matlab,
																	 			'error_ID_shuba_marbuta' => $error_ID_shuba_marbuta,
																	 			'error_ID_dosya_archive' => $error_ID_dosya_archive,
																	 			'error_ejraat' => $error_ejraat,
																	 			'error_mulahezat' => $error_mulahezat,
																	 			'error_hedayat' => $error_hedayat,
																	 			'Field_data' => $_POST
											            ));
											            $this->load->view('include/footers.inc.php');
											        }
											        }


}
?>
