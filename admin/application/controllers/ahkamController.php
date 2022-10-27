<?php
class ahkamController extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('ahkam_wa_hedayatModel');

    }
    function index($message = null, $type = null,$result=" لست احکام"){
  	      $data=$this->ahkam_wa_hedayatModel->getAhkam_wa_hedayat();
          $this->load->view('include/header.inc.php',array('result'=>$result));
          $this->load->view('ahkam',array('data'=>$data,'Message' => $message, 'Type' => $type));
          $this->load->view('include/footer.inc.php');
  	}
    function addmAhkam(){
          $this->load->view('include/header.inc.php');
          $this->load->view('addHukom');
          $this->load->view('include/footer.inc.php');
    }
     function checkAddHukm(){
        $error_shomaraiMaktob = $error_date = $error_khulasMatlab = $error_mursal = $error_typeOfMaktob = $error_mursalAlai = $error_saderaNumber = $error_dosyaArchive =  $error_ejraat=  $error_mulahezat ='';
        $error = false;
        if (isset($_POST['addHukm'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['shomaraiMaktob'])) {
                $error_shomaraiMaktob = 'لطفاً ا شماره عریصخ را وارد نماید';
                $error = true;
            }
            if (empty($_POST['date'])) {
                $error_date = 'لطفاً  تاریخ را وارد نماید!';
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
            
            if (empty($_POST['khulasMatlab'])) {
                $error_khulasMatlab = 'لطفاً  اجرات را وارد نماید!';
                $error = true;
            } 
           
            if (empty($_POST['mulahezat'])) {
                $error_mulahezat = 'لطفاً  ملاحظات را وارد نماید!';
                $error = true;
            } 
            if (empty($_POST['bakhsheTahrerat'])) {
                $error_bakhsheTahrerat = 'لطفاً  بخش تحریرات را وارد نماید!';
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
                'mulahezat'=> $_POST['mulahezat'],
                'ID_dosya_archive'=> $_POST['dosyaArchive'],
                'tahrerat'=> $_POST['bakhsheTahrerat'], 
            );
           $data= $this->ahkam_wa_hedayatModel->insertHukm($fields_data);
           if($data){
            redirect('ahkamController/index');
           }
        } else {
            $this->load->view('include/header.inc.php');
            $this->load->view('addHukom', array(
                'error_shomaraiMaktob' => $error_shomaraiMaktob,
                'error_date' => $error_date,
                'error_mursal' => $error_mursal,
                'error_mursalAlai'=>$error_mursalAlai,
                'error_khulasMatlab'=>$error_khulasMatlab,
                'error_typeOfMaktob'=>$error_typeOfMaktob,
                'error_dosyaArchive'=>$error_dosyaArchive,
                'error_mulahezat' => $error_mulahezat,
                'error_bakhsheTahrerat' => $error_bakhsheTahrerat,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }
     function editAhkam(){
       $id=$_GET['id'];
      $ahkam=$this->ahkam_wa_hedayatModel->getAhkamById($id);
      $this->load->view('include/header.inc.php');
      $this->load->view('editAhkam',array('ahkam'=>$ahkam));
      $this->load->view('include/footer.inc.php');
    }
         function checkEditHukm(){
        $error_shomaraiMaktob = $error_date = $error_khulasMatlab = $error_mursal = $error_typeOfMaktob = $error_mursalAlai = $error_saderaNumber = $error_dosyaArchive =  $error_ejraat=  $error_mulahezat ='';
        $error = false;
        if (isset($_POST['addHukm'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['shomaraiMaktob'])) {
                $error_shomaraiMaktob = 'لطفاً ا شماره عریصخ را وارد نماید';
                $error = true;
            }
            if (empty($_POST['date'])) {
                $error_date = 'لطفاً  تاریخ را وارد نماید!';
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
            
            if (empty($_POST['khulasMatlab'])) {
                $error_khulasMatlab = 'لطفاً  اجرات را وارد نماید!';
                $error = true;
            } 
           
            if (empty($_POST['mulahezat'])) {
                $error_mulahezat = 'لطفاً  ملاحظات را وارد نماید!';
                $error = true;
            } 
            if (empty($_POST['bakhsheTahrerat'])) {
                $error_bakhsheTahrerat = 'لطفاً  بخش تحریرات را وارد نماید!';
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
                'mulahezat'=> $_POST['mulahezat'],
                'ID_dosya_archive'=> $_POST['dosyaArchive'],
                'tahrerat'=> $_POST['bakhsheTahrerat'], 
            );
           $data= $this->ahkam_wa_hedayatModel->EditHukm($_POST['id'],$fields_data);
           if($data){
            redirect('ahkamController/index');
           }
        } else {
            $this->load->view('include/header.inc.php');
            $this->load->view('addHukom', array(
                'error_shomaraiMaktob' => $error_shomaraiMaktob,
                'error_date' => $error_date,
                'error_mursal' => $error_mursal,
                'error_mursalAlai'=>$error_mursalAlai,
                'error_khulasMatlab'=>$error_khulasMatlab,
                'error_typeOfMaktob'=>$error_typeOfMaktob,
                'error_dosyaArchive'=>$error_dosyaArchive,
                'error_mulahezat' => $error_mulahezat,
                'error_bakhsheTahrerat' => $error_bakhsheTahrerat,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }
     function ahkamDetail(){
      $id=$_GET['id'];
      $ahkam=$this->ahkam_wa_hedayatModel->getAhkamById($id);
      $this->load->view('include/header.inc.php');
      $this->load->view('ahkamDetail',array('ahkam'=>$ahkam));
      $this->load->view('include/footers.inc.php');
    }

    function deleteAhkam(){
    $id=$_GET['id'];
    $this->ahkam_wa_hedayatModel->deleteAhkam($id);
    redirect('ahkamController/index');
  }

  }
  ?>
