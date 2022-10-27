<?php

class CategoryController extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('categoryModel');
	}

	function index($message = null, $type = null, $result="کتگوری"){
        $data=$this->categoryModel->getGetegory();
		$this->load->view('include/header.inc.php',array('result'=>$result));
		$this->load->view('categories',array('data'=>$data,'Message' => $message, 'Type' => $type));
		$this->load->view('include/footer.inc.php');
	}
    function addCategory(){
        $result=$this->categoryModel->addCategory();
        if($result){
            CategoryController::index("کتگوری مورد نظر موفقانه  اضافه شد", 'success');
        }else{
            CategoryController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
    function deleteCategory(){
        $id=$_GET['id'];
        $result=$this->categoryModel->deleteCategory($id);
        if($result){
            CategoryController::index("کتگوری مورد نظر موفقانه حذف شد", 'success');
        }else{
            CategoryController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
   function test(){
    echo $_GET['id'];
   }
    function editAuthor(){
        $id=$_GET['id'];
        $data=$this->authorModel->getAuthors();
        $result=$this->authorModel->getAuthorById($id);
        $this->load->view('include/header.inc.php');
        $this->load->view('authors',array('data'=>$data,'result'=>$result));
        $this->load->view('include/footer.inc.php');

    }
    function updateCategory(){
        $id=$_POST['category_id'];
        $data=array(
            'category_name'=>$_POST['category'],
        );
        $result=$this->categoryModel->updateCategory($id,$data);
        if($result){
            CategoryController::index("کتگوری مورد نظر موفقانه  ویرایش شد", 'success');
        }else{
            CategoryController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }

    }

	}
?>
