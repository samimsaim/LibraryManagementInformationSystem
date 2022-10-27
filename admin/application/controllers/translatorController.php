<?php

class TranslatorController extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('translatorModel');
	}

	function index($message = null, $type = null, $result="مترجم"){
        $data=$this->translatorModel->getTranslator();
		$this->load->view('include/header.inc.php',array('result'=>$result));
		$this->load->view('translators',array('data'=>$data,'Message' => $message, 'Type' => $type));
		$this->load->view('include/footer.inc.php');
	}
    function addTranslator(){
        $result=$this->translatorModel->addTranslator();
        if($result){
            TranslatorController::index("مترجم مورد نظر موفقانه  اضافه شد", 'success');
        }else{
            TranslatorController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
    function deleteTranslator(){
        $id=$_GET['id'];
        $result=$this->translatorModel->deleteTranslator($id);
        if($result){
            TranslatorController::index("مترجم مورد نظر موفقانه حذف شد", 'success');
        }else{
            TranslatorController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
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
    function updatetranslator(){
        $id=$_POST['translator_id'];
        $data=array(
            'translator_name'=>$_POST['translator_name'],
            'update_at'=>date('Y-m-d'),
        );
        $result=$this->translatorModel->updatetranslator($id,$data);
        if($result){
            TranslatorController::index("مترجم مورد نظر موفقانه  ویرایش شد", 'success');
        }else{
            TranslatorController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }

	}
?>
