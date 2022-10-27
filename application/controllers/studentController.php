<?php
class StudentController extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('StudentModel');
		$this->load->model('usersModel');
		$this->load->model('FacultyModel');
    }
	function index($message = null, $type = null){
        $student=$this->StudentModel->getStudent();
        $this->load->view('include/header.inc.php');
        $this->load->view('students',array('student'=>$student,'Message' => $message, 'Type' => $type));
        $this->load->view('include/footer.inc.php');
	}
	function addStudent(){
		$fac=$this->FacultyModel->facultyList();
		$dep=$this->FacultyModel->departmentList();
		$this->load->view('include/header.inc.php');
		$this->load->view('addStudent',array('fac'=>$fac,'dep'=>$dep));
		$this->load->view('include/footer.inc.php');
	}
	 function getDepartments(){
        $facId = $_POST["facId"];
        $deps = $this->StudentModel->getDepOfFaculty($facId);
        echo json_encode($deps);
    }
	function checkAddStudent(){
        $error_name = $error_father_name = $error_id = $error_date = $error_faculty_name = $error_department = $error_current_resident = $error_original_resident = $error_phone = $error_email=$error_photo='';
        $error = false;
        if (isset($_POST['addStudent'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً ا نام خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['fatherName'])) {
                $error_father_name = 'لطفاً  نام پدر خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['id'])) {
                $error_id = 'لطفاً  آی دی خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['date'])) {
                $error_date = 'لطفاً  تاریخ را وارد نماید';
                $error = true;
            }
            if (empty($_POST['faculty'])) {
                $faculty_name = 'لطفاً  پوهنخی را وارد نماید';
                $error = true;
            }
            if (empty($_POST['department'])) {
                $error_department = 'لطفاً  دیپارتمینت را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['currentResident'])) {
                $error_current_resident = 'لطفاً  سکونت فعلی را وارد نماید';
                $error = true;
            }
            if (empty($_POST['originalResident'])) {
                $error_original_resident = 'لطفاً  سکونت اصلی را وارد نماید';
                $error = true;
            }
            if (empty($_POST['phone'])) {
                $error_phone = 'لطفاً  شماره تماس را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['email'])) {
                $error_email = 'لطفاً  ایمیل آدرس خود را وارد نماید!';
                $error = true;
            }
              // ------------------------ Image validation ---------------
            if (isset($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
                if ($_FILES["photo"]["type"] != "image/jpeg" && $_FILES["photo"]["type"] != "image/png") {
                    $error_photo = "Please select jpeg| jpg| png files";
                    $error = true;
                }
            } else {
                switch ($_FILES["photo"]["error"]) {
                    case UPLOAD_ERR_INI_SIZE:
                        $error_photo = "This photo has larger size";
                        $error = true;
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $error_photo = "The photo is larger than the script allows.";
                        $error = true;
                        break;
                    case UPLOAD_ERR_NO_FILE:
//                        $error_photo = "شما هیج عکس انتخاب نکرده اید";
//                        $error = true;
                        break;
                    default:
                        $error_photo = "Please contact to server manager !";
                        $error = true;
                }
            }
            // ---------------------------------------------------------

        }
        //------------------------------------------------
        if(!$error) {
            $destination = "C:/xampp/htdocs/library/assets/img/students/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image = "assets/img/students/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
            if (empty($_FILES["photo"]["name"])) {
                $image = "";
            }
            $data = array(
                "name" => $_POST['name'],
                "f_name" => $_POST['fatherName'],
                "date" => date('Y:m:d'),
                "id_no" => $_POST['id'],
                "faculty_id" => $_POST['faculty'],
                "department_id" => $_POST['department'],
                "detail" => $_POST['detail'],
                "current_resident" => $_POST['currentResident'],
                "original_resident" => $_POST['originalResident'],
                "phone_no" => $_POST['phone'],
                'photo'=>$image,
                "email_address" => $_POST['email'],
               
            );

            $result=$this->StudentModel->insertStudent($data);
            if($result){
            	redirect('StudentController/index');
            }
        }
             else {
            $fac=$this->FacultyModel->facultyList();
		    $dep=$this->FacultyModel->departmentList();;
            $this->load->view('include/header.inc.php');
            $this->load->view('addStudent', array(
                'fac' => $fac,
                'dep' => $dep,
                'error_name'=>$error_name,
                'error_father_name' => $error_father_name,
                'error_id' => $error_id,
                'error_date' => $error_date,
                'faculty_name' => $faculty_name,
                'error_department' => $error_department,
                'error_phone' => $error_phone,
                'error_email' => $error_email,
                'error_current_resident' => $error_current_resident,
                'error_original_resident' => $error_original_resident,
                'error_photo'=>$error_photo,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }
    function studentDetail(){
        $id=$_GET['id'];
        $students=$this->StudentModel->getStudentById($id);
        foreach ($students as $row ) {
             $fac_id=$row->faculty_id;
             $dep_id=$row->department_id;
        }
        $fac=$this->StudentModel->getFac($fac_id);
        $dep=$this->StudentModel->getDep($dep_id);
        $this->load->view('include/header.inc.php');
        $this->load->view('studentDetail',array('student'=>$students,'fac'=>$fac,'dep'=>$dep));
        $this->load->view('include/footer.inc.php');

    }
    function deleteStudent(){
        $id=$_GET['id'];
        $result=$this->StudentModel->deleteStudent($id);
        $result = $this->usersModel->delete_user($id);
        if($result){
            StudentController::index("شاگر مورد نظر موفقانه حذف شد", 'success');
        }else{
            StudentController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
    function editStudent(){
        $id=$_GET['id'];
        $students=$this->StudentModel->getStudentById($id);
        foreach ($students as $row ) {
             $fac_id=$row->faculty_id;
             $dep_id=$row->department_id;
        }
        $facs=$this->StudentModel->getFac($fac_id);
        $deps=$this->StudentModel->getDep($dep_id);
        $fac=$this->FacultyModel->facultyList();
        $dep=$this->FacultyModel->departmentList();
        $this->load->view('include/header.inc.php');
        $this->load->view('editStudent',array('student'=>$students,'faculty'=>$facs,'department'=>$deps,'fac'=>$fac,'dep'=>$dep));
        $this->load->view('include/footer.inc.php');
    }
    function checkEditStudent(){
         $error_name = $error_father_name = $error_id = $error_date = $error_faculty_name = $error_department = $error_current_resident = $error_original_resident = $error_phone = $error_email=$error_photo='';
        $error = false;
        if (isset($_POST['addStudent'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً ا نمبر ثبت را وارد نماید';
                $error = true;
            }
            if (empty($_POST['fatherName'])) {
                $error_father_name = 'لطفاً  تاریخ ثبت را وارد نماید';
                $error = true;
            }
            if (empty($_POST['id'])) {
                $error_id = 'لطفاً  عنوان کتاب را وارد نماید';
                $error = true;
            }
            if (empty($_POST['date'])) {
                $error_date = 'لطفاً  ویرایش را وارد نماید';
                $error = true;
            }
            if (empty($_POST['faculty'])) {
                $faculty_name = 'لطفاً  نویسنده را انتخاب نماید';
                $error = true;
            }
            if (empty($_POST['department'])) {
                $error_department = 'لطفاً  مترجم را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['currentResident'])) {
                $error_current_resident = 'لطفاً  ناشر را انتخاب نماید';
                $error = true;
            }
            if (empty($_POST['originalResident'])) {
                $error_original_resident = 'لطفاً  تعداد جلد را وارد نماید';
                $error = true;
            }
            if (empty($_POST['phone'])) {
                $error_phone = 'لطفاً  تعداد صفحه را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['email'])) {
                $error_email = 'لطفاً  نوعیت خریداری را انتخاب نماید!';
                $error = true;
            }
              // ------------------------ Image validation ---------------
            if (isset($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
                if ($_FILES["photo"]["type"] != "image/jpeg" && $_FILES["photo"]["type"] != "image/png") {
                    $error_photo = "Please select jpeg| jpg| png files";
                    $error = true;
                }
            } else {
                switch ($_FILES["photo"]["error"]) {
                    case UPLOAD_ERR_INI_SIZE:
                        $error_photo = "This photo has larger size";
                        $error = true;
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $error_photo = "The photo is larger than the script allows.";
                        $error = true;
                        break;
                    case UPLOAD_ERR_NO_FILE:
//                        $error_photo = "شما هیج عکس انتخاب نکرده اید";
//                        $error = true;
                        break;
                    default:
                        $error_photo = "Please contact to server manager !";
                        $error = true;
                }
            }
            // ---------------------------------------------------------

        }
        //------------------------------------------------
        if(!$error) {
            $destination = "C:/xampp/htdocs/library/assets/img/students/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image = "assets/img/students/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
            if (empty($_FILES["photo"]["name"])) {
                $image = "";
            }
            $data = array(
                "name" => $_POST['name'],
                "f_name" => $_POST['fatherName'],
                "date" => date('Y:m:d'),
                "id_no" => $_POST['id'],
                "faculty_id" => $_POST['faculty'],
                "department_id" => $_POST['department'],
                "detail" => $_POST['detail'],
                "current_resident" => $_POST['currentResident'],
                "original_resident" => $_POST['originalResident'],
                "phone_no" => $_POST['phone'],
                'photo'=>$image,
                "email_address" => $_POST['email'],
               
            );
            $id=$_POST['id'];
            $result=$this->StudentModel->EditStudent($id,$data);
             if($result){
            StudentController::index("شاگر مورد نظر موفقانه حذف شد", 'success');
        }else{
            StudentController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
        }
             else {
            $fac=$this->FacultyModel->facultyList();
            $dep=$this->FacultyModel->departmentList();;
            $this->load->view('include/header.inc.php');
            $this->load->view('addStudent', array(
                'fac' => $fac,
                'dep' => $dep,
                'error_name'=>$error_name,
                'error_father_name' => $error_father_name,
                'error_id' => $error_id,
                'error_date' => $error_date,
                'error_faculty_name' => $error_faculty_name,
                'error_department' => $error_department,
                'error_phone' => $error_phone,
                'error_email' => $error_email,
                'error_current_resident' => $error_current_resident,
                'error_original_resident' => $error_original_resident,
                'error_photo'=>$error_photo,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }
    function otherMember(){
        $student=$this->StudentModel->getOtherStudent();
        $this->load->view('include/header.inc.php');
        $this->load->view('otherStudent',array('student'=>$student));
        $this->load->view('include/footer.inc.php');
    }
    function checkAddExStudent(){
        $result=$this->StudentModel->addExStudent();
        if($result){
            redirect('StudentController/otherMember');
        }else{
            echo "not";
        } 
    }
    function deleteExStudent(){
        $id=$_GET['id'];
        $result=$this->StudentModel->deleteExStudent($id);
        if($result){
        redirect('StudentController/otherMember');
    }
    }
    function updateOthMem(){
         
        if(isset($_POST['add_roll'])){
            $id=$_POST['om_id'];
            $data=array(
            'name'=>$_POST['name'],
            'f_name'=>$_POST['f_name'],
            'phone_no'=>$_POST['phone_no'],
            'reference'=>$_POST['reference'],
            );
        }
        $result=$this->StudentModel->updateOthMem($id,$data);
        if($result){
            redirect('StudentController/otherMember');
        }
    }
}
?>