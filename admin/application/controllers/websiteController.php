<?php
/**
*
*/
class WebsiteController extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('WebsiteModel');
	}

    public function index($message = null, $type = null,$result=" تماس با ما")
	{
		$data=$this->WebsiteModel->getContact();
		$this->load->view('include/header.inc.php',array('result'=>$result));
		$this->load->view('contactUs',array("data"=>$data,'Message' => $message, 'Type' => $type));
		$this->load->view('include/footer.inc.php');
	}

   function checkAddContact(){
        $result=$this->WebsiteModel->addContact();
        if($result){
            WebsiteController::index(" آدرس مورد نظر موفقانه اضافه شد", 'success');
        }else{
            WebsiteController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }

    public function Time($message = null, $type = null,$data="اوقات کاری"){
        $result=$this->WebsiteModel->getTime();
        $this->load->view('include/header.inc.php',array('result'=>$data));
        $this->load->view('time',array('data'=>$result,'Message' => $message, 'Type' => $type));
        $this->load->view('include/footer.inc.php');
    }
 function checkAddTime(){
        $result=$this->WebsiteModel->addTime();
        if($result){
            WebsiteController::Time(" زمان نظر موفقانه اضافه شد", 'success');
        }else{
            WebsiteController::Time("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
      function checkEditTime(){
        $id=$_POST['id'];
        $data=array(
            'day'=>$_POST['day'],
            'time'=>$_POST['time'],
        );
        $result=$this->WebsiteModel->updateTime($id,$data);
        if($result){
            WebsiteController::time("زمان مورد نظر موفقانه ویرایش شد", 'success');
        }else{
            WebsiteController::time("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
	public function addUser(){
	$this->load->view('include/header.inc.php');
	$this->load->view('addUser');
	$this->load->view('include/footer.inc.php');
    }
  function opinion($result="نظریات"){
        $data=$this->WebsiteModel->getOpinion();
        $this->load->view('include/header.inc.php',array('result'=>$result));
        $this->load->view('opinion',array('data'=>$data));
        $this->load->view('include/footer.inc.php');
  }
  function checkEditContact(){
        $id=$_POST['id'];
        $data=array(
            'phone'=>$_POST['phone'],
            'email'=>$_POST['email'],
            'address'=>$_POST['address'],

        );
        $result=$this->WebsiteModel->updateContact($id,$data);
        if($result){
            WebsiteController::index("آدرس مورد نظر موفقانه ویرایش شد", 'success');
        }else{
            WebsiteController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }

    function editUser($data,$userId){
        $result = $this->usersModel->update_user($data,$userId);
        if ($result) {
            UsersController::index("کاربر مورد نظر شما موفقانه ویرایش شد!", 'success');
        } else {
            UsersController::index("کابر مورد نظر شما متاسفانه ویرایش نشد!", 'failed');
        }
    }

    public function deleteContact(){
        $id=$_GET['id'];
        $result = $this->WebsiteModel->delete_contact($id);
        if($result){
            WebsiteController::index("آدرس مورد نظر موفقانه حذف شد!", 'success');
        }else{
            WebsiteController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
     public function deleteTime(){
        $id=$_GET['id'];
        $result = $this->WebsiteModel->deleteTime($id);
        if($result){
            WebsiteController::Time("زمان مورد نظر موفقانه حذف شد!", 'success');
        }else{
            WebsiteController::Time("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }

	public function privilege(){
		$userPriv=$this->usersModel->getPrivilege();
		$this->load->view('include/header.inc.php');
		$this->load->view('usersPrivelage',array('user'=>$userPriv));
		$this->load->view('include/footer.inc.php');
	}

    public function addPrivilege(){
        $result=$this->usersModel->addPrivilege();
        if($result){
            redirect('usersController/privilege');
        }else{
            echo "not";
        }
    }

	public function updatePrivilege()
	{	$id=$_GET['id'];
		$priv=$this->usersModel->get_privelage($id);
		$this->load->view('include/header.inc.php');
		$this->load->view('editPrivilege', array('priv'=>$priv));
		$this->load->view('include/footer.inc.php');

	}

	public function editPrivilege(){
		$id=$_POST['priv_id'];
		$this->usersModel->editPrivilege($id);
		 redirect('usersController/privilege');
	}

	public function deletePrivilege(){
		$id=$_GET['id'];
		$this->usersModel->deletePrivilege($id);
		redirect('usersController/privilege');
	}
    function aboutUs($result="درباره ما"){
        $data=$this->usersModel->getAbout();
        $this->load->view('include/header.inc.php',array('result'=>$result));
        $this->load->view('aboutUs', array('data'=>$data));
        $this->load->view('include/footer.inc.php');
    }
    function viewOpinion($result="نظریات"){
        $id=$_GET['id'];
        $data=$this->WebsiteModel->getOpinionById($id);
         $this->load->view('include/header.inc.php',array('result'=>$result));
        $this->load->view('viewOpinion', array('data'=>$data));
        $this->load->view('include/footer.inc.php');
    }
    function aprove(){
        $id=$_GET['id'];
        $data=$this->WebsiteModel->getAprove($id);
        foreach($data as $row){
            $data=array(
                'name'=>$row->name,
                'lname'=>$row->lname,
                'uni'=>$row->uni,
                'email'=>$row->email,
                'detail'=>$row->detail,
                'aprove'=>1,
            );
        }
        $result=$this->WebsiteModel->updateAprove($id,$data);
        if($result){
            redirect('WebsiteController/Opinion');
        }
    }
     function disaprove(){
        $id=$_GET['id'];
        $data=$this->WebsiteModel->getAprove($id);
        foreach($data as $row){
            $data=array(
                'name'=>$row->name,
                'lname'=>$row->lname,
                'uni'=>$row->uni,
                'email'=>$row->email,
                'detail'=>$row->detail,
                'aprove'=>0,
            );
        }
        $result=$this->WebsiteModel->updateAprove($id,$data);
        if($result){
            redirect('WebsiteController/Opinion');
        }
    }
}
?>
