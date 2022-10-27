<?php
class araizController extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('araizModel');

    }
    function index($message = null, $type = null,$result=" لست عرایض"){
  	      $data=$this->araizModel->getAraiz();
          $this->load->view('include/header.inc.php',array('result'=>$result));
          $this->load->view('araiz',array('data'=>$data,'Message' => $message, 'Type' => $type));
          $this->load->view('include/footer.inc.php');
  	}
    function addAraiz(){
      $this->load->view('include/header.inc.php');
      $this->load->view('addAraiz');
      $this->load->view('include/footer.inc.php');
    }
    function checkAddAraiz(){
        $error_shomaraiAreza = $error_date = $error_maktobNumber = $error_mursal = $error_typeOfMaktob = $error_mursalAlai = $error_saderaNumber = $error_dosyaArchive = $error_waredaNumber = $error_ejrat= $error_qaidWareda = $error_mulahezat =$error_khulasMatlab=$error_ejrat=$error_sadra_number =$error_bakhsheTahrerat ='';
        $error = false;
        if (isset($_POST['addAraiz'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['shomaraiAreza'])) {
                $error_shomaraiAreza = 'لطفاً ا شماره عریصخ را وارد نماید';
                $error = true;
            }
            if (empty($_POST['date'])) {
                $error_date = 'لطفاً  تاریخ را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['maktobNumber'])) {
                $error_maktobNumber = 'لطفاً  نمبر مکتوب را وارد نمبر!';
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
            
            if (empty($_POST['ejrat'])) {
                $error_ejrat = 'لطفاً  اجرات را وارد نماید!';
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
             if (empty($_POST['ejrat'])) {
                $error_ejrat = 'لطفاً  بخش تحریرات را وارد نماید!';
                $error = true;
            } 
             if (empty($_POST['sadra_number'])) {
                $error_sadra_number = 'لطفاً  بخش تحریرات را وارد نماید!';
                $error = true;
            } 
            }
          
        if (!$error) {
            $fields_data = array(
                'shumara_ariza' => $_POST['shomaraiAreza'],
                'date' => $_POST['date'],
                'shumara_maktob' => $_POST['maktobNumber'],
                'ID_nwyat_maktob' => $_POST['typeOfMaktob'],
                'mursal' => $_POST['mursal'],
                'mursal_elai'=>$_POST['mursalAlai'],
                'ID_dosya_archive'=> $_POST['dosyaArchive'],
                'ejraat'=> $_POST['ejrat'],
                'mulahezat'=> $_POST['mulahezat'],
                'khulas_matlab'=> $_POST['khulasMatlab'],
                'tahrerat'=> $_POST['bakhsheTahrerat'],
                'id_ejrat'=> $_POST['ejrat'],
                'sadra_number'=> $_POST['sadra_number'],
               
            );
           $data= $this->araizModel->insertAraiz($fields_data);
           if($data){
            redirect('araizController/index');
           }
        } else {
            $this->load->view('include/header.inc.php');
            $this->load->view('addAraiz', array(
                'error_shomaraiAreza' => $error_shomaraiAreza,
                'error_date' => $error_date,
                'error_maktobNumber' => $error_maktobNumber,
                'error_mursal'=>$error_mursal,
                'error_typeOfMaktob'=>$error_typeOfMaktob,
                'error_mursalAlai'=>$error_mursalAlai,
                'error_saderaNumber'=>$error_saderaNumber,
                'error_dosyaArchive'=>$error_dosyaArchive,
                'error_waredaNumber' => $error_waredaNumber,
                'error_ejrat' => $error_ejrat,
                'error_qaidWareda' => $error_qaidWareda,
                'error_mulahezat' => $error_mulahezat,
                'error_khulasMatlab' => $error_khulasMatlab,
                'error_bakhsheTahrerat' => $error_bakhsheTahrerat,
                'error_ejrat' => $error_ejrat,
                'error_sadra_number' => $error_sadra_number,

                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }
    function editaraiz(){
       $id=$_GET['id'];
      $araiz=$this->araizModel->getAraizById($id);
      $naweatMaktob=$this->araizModel->getNaweatMaktob($id);
      $makateb=$this->araizModel->getMaktob($id);
      $this->load->view('include/header.inc.php');
      $this->load->view('editaraiz',array('naweatMaktob'=>$naweatMaktob,'araiz'=>$araiz,'makateb'=>$makateb));
      $this->load->view('include/footer.inc.php');
    }
       function checkEditAraiz(){
        $error_shomaraiAreza = $error_date = $error_maktobNumber = $error_mursal = $error_typeOfMaktob = $error_mursalAlai = $error_saderaNumber = $error_dosyaArchive = $error_waredaNumber = $error_ejrat= $error_qaidWareda = $error_mulahezat =$error_khulasMatlab=$error_ejrat=$error_sadra_number =$error_bakhsheTahrerat ='';
        $error = false;
        if (isset($_POST['addAraiz'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['shomaraiAreza'])) {
                $error_shomaraiAreza = 'لطفاً ا شماره عریصخ را وارد نماید';
                $error = true;
            }
            if (empty($_POST['date'])) {
                $error_date = 'لطفاً  تاریخ را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['maktobNumber'])) {
                $error_maktobNumber = 'لطفاً  نمبر مکتوب را وارد نمبر!';
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
            
            if (empty($_POST['ejrat'])) {
                $error_ejrat = 'لطفاً  اجرات را وارد نماید!';
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
             if (empty($_POST['ejrat'])) {
                $error_ejrat = 'لطفاً  بخش تحریرات را وارد نماید!';
                $error = true;
            } 
             if (empty($_POST['sadra_number'])) {
                $error_sadra_number = 'لطفاً  بخش تحریرات را وارد نماید!';
                $error = true;
            } 
            }
          
        if (!$error) {
            $id=$_POST['id'];
            $fields_data = array(
                'shumara_ariza' => $_POST['shomaraiAreza'],
                'date' => $_POST['date'],
                'shumara_maktob' => $_POST['maktobNumber'],
                'ID_nwyat_maktob' => $_POST['typeOfMaktob'],
                'mursal' => $_POST['mursal'],
                'mursal_elai'=>$_POST['mursalAlai'],
                'ID_dosya_archive'=> $_POST['dosyaArchive'],
                'ejraat'=> $_POST['ejrat'],
                'mulahezat'=> $_POST['mulahezat'],
                'khulas_matlab'=> $_POST['khulasMatlab'],
                'tahrerat'=> $_POST['bakhsheTahrerat'],
                'id_ejrat'=> $_POST['ejrat'],
                'sadra_number'=> $_POST['sadra_number'],
               
            );
           $data= $this->araizModel->updateAraiz($id,$fields_data);
           if($data){
            redirect('araizController/index');
           }
        } else {
            $this->load->view('include/header.inc.php');
            $this->load->view('editAraiz', array(
                'error_shomaraiAreza' => $error_shomaraiAreza,
                'error_date' => $error_date,
                'error_maktobNumber' => $error_maktobNumber,
                'error_mursal'=>$error_mursal,
                'error_typeOfMaktob'=>$error_typeOfMaktob,
                'error_mursalAlai'=>$error_mursalAlai,
                'error_saderaNumber'=>$error_saderaNumber,
                'error_dosyaArchive'=>$error_dosyaArchive,
                'error_waredaNumber' => $error_waredaNumber,
                'error_ejrat' => $error_ejrat,
                'error_qaidWareda' => $error_qaidWareda,
                'error_mulahezat' => $error_mulahezat,
                'error_khulasMatlab' => $error_khulasMatlab,
                'error_bakhsheTahrerat' => $error_bakhsheTahrerat,
                'error_ejrat' => $error_ejrat,
                'error_sadra_number' => $error_sadra_number,

                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }
    function araizDetail(){
      $id=$_GET['id'];
      $araiz=$this->araizModel->getAraizById($id);
      $naweatMaktob=$this->araizModel->getNaweatMaktob($id);
      $archive=$this->araizModel->getArchive($id);
      $makateb=$this->araizModel->getMaktob($id);
      $this->load->view('include/header.inc.php');
      $this->load->view('araizDetail',array('naweatMaktob'=>$naweatMaktob,'araiz'=>$araiz,'archive'=>$archive,'makateb'=>$makateb));
      $this->load->view('include/footer.inc.php');
    }
   function deleteAraiz(){
    $id=$_GET['id'];
    $this->araizModel->deleteAraiz($id);
    redirect('araizController/index');
  }
  }
  ?>
