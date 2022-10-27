<?php

class AuthorController extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('authorModel');
	}

	function index($message = null, $type = null){
        $data=$this->authorModel->getAuthors();
		$this->load->view('include/header.inc.php');
		$this->load->view('authors',array('data'=>$data,'Message' => $message, 'Type' => $type));
		$this->load->view('include/footer.inc.php');
	}
    function addAuthor(){
        $result=$this->authorModel->addAuthor();
        if($result){
            AuthorController::index("نویسنده مورد نظر موفقانه اضافه شد!", 'success');
        }else{
            AuthorController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
    function deleteAuthor(){
        $id=$_GET['id'];
        $result=$this->authorModel->deleteAuthor($id);
         if($result){
            AuthorController::index("کاربر مورد نظر شما موفقانه حذف شد!", 'success');
        }else{
            AuthorController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
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
    function updateAuthor(){
        $id=$_POST['author_id'];
        $data=array(
            'author_name'=>$_POST['author'],
        );
        $this->authorModel->updateAuthor($id,$data);
        redirect('AuthorController/index');
    }

	}
?>