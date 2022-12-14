<?php

class PublisherController extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('PublisherModel');
	}

	function index($message = null, $type = null){
        $data=$this->PublisherModel->getPublisher();
		$this->load->view('include/header.inc.php');
		$this->load->view('publishers',array('data'=>$data,'Message' => $message, 'Type' => $type));
		$this->load->view('include/footer.inc.php');
	}
    function addPublisher(){
        $result=$this->PublisherModel->addPublisher();
        if($result){
            redirect('PublisherController/index');
        }else{
            echo "not";
        } 
    }
    function deletePublisher(){
        $id=$_GET['id'];
        $result=$this->PublisherModel->deletePublisher($id);
         if($result){
            PublisherController::index("پابلیشر مورد نظر موفقانه حذف شد", 'success');
        }else{
            PublisherController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
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
    function updatePublisher(){
        $id=$_POST['publisher_id'];
        $data=array(
            'publisher_name'=>$_POST['publisher'],
            'publisher_address'=>$_POST['address'],
            
        );
        $this->PublisherModel->updatePublisher($id,$data);
        redirect('PublisherController/index');
    }

	}
?>