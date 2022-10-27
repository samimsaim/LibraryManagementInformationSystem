<?php
class makatebController extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('makatebModel');

    }
    function index($message = null, $type = null,$result=" لست مکاتیب"){
  	      $data=$this->makatebModel->getMakateb();
          $this->load->view('include/header.inc.php',array('result'=>$result));
          $this->load->view('makateb',array('data'=>$data,'Message' => $message, 'Type' => $type));
          $this->load->view('include/footer.inc.php');
  	}
    function addmakateb(){
      $this->load->view('include/header.inc.php');
      $this->load->view('addmakateb');
      $this->load->view('include/footer.inc.php');
    }
    function checkAddMakateb(){
        $error_shomaraiMaktob = $error_date = $error_shuba = $error_mursal = $error_typeOfMaktob = $error_mursalAlai = $error_saderaNumber = $error_dosyaArchive = $error_waredaNumber = $error_ejraat= $error_hedayat = $error_mulahezat ='';
        $error = false;
        if (isset($_POST['addMaktob'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['shomaraiMaktob'])) {
                $error_shomaraiMaktob = 'لطفاً ا شماره عریصخ را وارد نماید';
                $error = true;
            }
            if (empty($_POST['date'])) {
                $error_date = 'لطفاً  تاریخ را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['shuba'])) {
                $error_shuba = 'لطفاً  نمبر مکتوب را وارد نمبر!';
                $error = true;
            }
            if (empty($_POST['mursal'])) {
                $error_mursal = 'لطفاً آ مرسل را وارد نماید';
                $error = true;
            }
            if (empty($_POST['typeOfMaktob'])) {
                $error_typeOfMaktob = 'لطفاً  نوعیت مکتوب را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['mursalAlai'])) {
                $error_mursalAlai = 'لطفاً  مرسل الیه را وارد نماید';
                $error = true;
            }
          
            if (empty($_POST['dosyaArchive'])) {
                $error_dosyaArchive = 'لطفاً ا دوسیه آرشیف را وارد نماید!';
                $error = true;
            }
            
            if (empty($_POST['ejraat'])) {
                $error_ejraat = 'لطفاً  اجرات را وارد نماید!';
                $error = true;
            } 
           
            if (empty($_POST['mulahezat'])) {
                $error_mulahezat = 'لطفاً  ملاحظات را وارد نماید!';
                $error = true;
            } 

            if (empty($_POST['khulasMatlab'])) {
                $error_khulasMatlab = 'لطفاً  خلاصخ مطب را وارد نماید!';
                $error = true;
            } 
            if (empty($_POST['bakhsheTahrerat'])) {
                $error_bakhsheTahrerat = 'لطفاً  بخش تحریرات را وارد نماید!';
                $error = true;
            }
             if (empty($_POST['hedayat'])) {
                $error_hedayat = 'لطفاً  بخش تحریرات را وارد نماید!';
                $error = true;
            } 
            }
          
        if (!$error) {
            $fields_data = array(
                'shumara_maktob' => $_POST['shomaraiMaktob'],
                'date' => $_POST['date'],
                'mursal' => $_POST['mursal'],
                'mursal_elai' => $_POST['mursalAlai'],
                'khulas_matlab' => $_POST['khulasMatlab'],
                'ID_nawyat_maktob' => $_POST['typeOfMaktob'],
                'ID_shuba_marbuta'=>$_POST['shuba'],
                'ID_dosya_archive'=> $_POST['dosyaArchive'],
                'ejraat'=> $_POST['ejraat'],
                'mulahezat'=> $_POST['mulahezat'],
                'tahrerat'=> $_POST['bakhsheTahrerat'],
                'hedayat'=> $_POST['hedayat'],
               
            );
           $data= $this->makatebModel->insertMakateb($fields_data);
           if($data){
            redirect('makatebController/index');
           }
        } else {
            $this->load->view('include/header.inc.php');
            $this->load->view('addMakateb', array(
                'error_shomaraiMaktob' => $error_shomaraiMaktob,
                'error_date' => $error_date,
                'error_mursal' => $error_mursal,
                'error_mursalAlai'=>$error_mursalAlai,
                'error_khulasMatlab'=>$error_khulasMatlab,
                'error_typeOfMaktob'=>$error_typeOfMaktob,
                'error_shuba'=>$error_shuba,
                'error_dosyaArchive'=>$error_dosyaArchive,
                'error_ejraat' => $error_ejraat,
                'error_mulahezat' => $error_mulahezat,
                'error_bakhsheTahrerat' => $error_bakhsheTahrerat,
                'error_hedayat' => $error_hedayat,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }
    function editmakateb(){
       $id=$_GET['id'];
      $makateb=$this->makatebModel->getMAkatebById($id);
      $this->load->view('include/header.inc.php');
	  $this->load->view('editMakateb',array('makateb'=>$makateb));
      $this->load->view('include/footer.inc.php');
    }
   function checkEditMakateb(){
        $error_shomaraiMaktob = $error_date = $error_shuba = $error_mursal = $error_typeOfMaktob = $error_mursalAlai = $error_saderaNumber = $error_dosyaArchive = $error_waredaNumber = $error_ejraat= $error_hedayat = $error_mulahezat ='';
        $error = false;
        if (isset($_POST['addMaktob'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['shomaraiMaktob'])) {
                $error_shomaraiMaktob = 'لطفاً ا شماره عریصخ را وارد نماید';
                $error = true;
            }
            if (empty($_POST['date'])) {
                $error_date = 'لطفاً  تاریخ را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['shuba'])) {
                $error_shuba = 'لطفاً  نمبر مکتوب را وارد نمبر!';
                $error = true;
            }
            if (empty($_POST['mursal'])) {
                $error_mursal = 'لطفاً آ مرسل را وارد نماید';
                $error = true;
            }
            if (empty($_POST['typeOfMaktob'])) {
                $error_typeOfMaktob = 'لطفاً  نوعیت مکتوب را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['mursalAlai'])) {
                $error_mursalAlai = 'لطفاً  مرسل الیه را وارد نماید';
                $error = true;
            }
          
            if (empty($_POST['dosyaArchive'])) {
                $error_dosyaArchive = 'لطفاً ا دوسیه آرشیف را وارد نماید!';
                $error = true;
            }
            
            if (empty($_POST['ejraat'])) {
                $error_ejraat = 'لطفاً  اجرات را وارد نماید!';
                $error = true;
            } 
           
            if (empty($_POST['mulahezat'])) {
                $error_mulahezat = 'لطفاً  ملاحظات را وارد نماید!';
                $error = true;
            } 

            if (empty($_POST['khulasMatlab'])) {
                $error_khulasMatlab = 'لطفاً  خلاصخ مطب را وارد نماید!';
                $error = true;
            } 
            if (empty($_POST['bakhsheTahrerat'])) {
                $error_bakhsheTahrerat = 'لطفاً  بخش تحریرات را وارد نماید!';
                $error = true;
            }
             if (empty($_POST['hedayat'])) {
                $error_hedayat = 'لطفاً  بخش تحریرات را وارد نماید!';
                $error = true;
            } 
            }
          
        if (!$error) {
            $fields_data = array(
                'shumara_maktob' => $_POST['shomaraiMaktob'],
                'date' => $_POST['date'],
                'mursal' => $_POST['mursal'],
                'mursal_elai' => $_POST['mursalAlai'],
                'khulas_matlab' => $_POST['khulasMatlab'],
                'ID_nawyat_maktob' => $_POST['typeOfMaktob'],
                'ID_shuba_marbuta'=>$_POST['shuba'],
                'ID_dosya_archive'=> $_POST['dosyaArchive'],
                'ejraat'=> $_POST['ejraat'],
                'mulahezat'=> $_POST['mulahezat'],
                'tahrerat'=> $_POST['bakhsheTahrerat'],
                'hedayat'=> $_POST['hedayat'],
               
            );
           $data= $this->makatebModel->editMakateb($_POST['id'],$fields_data);
           if($data){
            redirect('makatebController/index');
           }
        } else {
            $this->load->view('include/header.inc.php');
            $this->load->view('addMakateb', array(
                'error_shomaraiMaktob' => $error_shomaraiMaktob,
                'error_date' => $error_date,
                'error_mursal' => $error_mursal,
                'error_mursalAlai'=>$error_mursalAlai,
                'error_khulasMatlab'=>$error_khulasMatlab,
                'error_typeOfMaktob'=>$error_typeOfMaktob,
                'error_shuba'=>$error_shuba,
                'error_dosyaArchive'=>$error_dosyaArchive,
                'error_ejraat' => $error_ejraat,
                'error_mulahezat' => $error_mulahezat,
                'error_bakhsheTahrerat' => $error_bakhsheTahrerat,
                'error_hedayat' => $error_hedayat,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }
    function makatebDetail(){
      $id=$_GET['id'];
	  $makateb=$this->makatebModel->getMakatebById($id);
      $this->load->view('include/header.inc.php');
      $this->load->view('makatebDetail',array('makateb'=>$makateb));
			$this->load->view('include/footers.inc.php');
      $this->load->view('include/footer.inc.php');
    }
   function deleteMakateb(){
    $id=$_GET['id'];
    $this->makatebModel->deleteMAkateb($id);
    redirect('makatebController/index');
  }

  }
  ?>
