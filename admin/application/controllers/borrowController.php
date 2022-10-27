<?php
class borrowController extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('borrowModel');

    }
    function index($message = null, $type = null,$result="قرضدار ها"){
        $data=$this->borrowModel->getBorrow();
        $this->load->view('include/header.inc.php',array('result'=>$result));
        $this->load->view('borrow',array('borrow'=>$data,'Message' => $message, 'Type' => $type));
        $this->load->view('include/footer.inc.php');
    }
    function addBorrow($result="اضافه نمودن قرض"){
        $book=$this->borrowModel->getBook();
        $this->load->view('include/header.inc.php',array('result'=>$result));
        $this->load->view('addBorrow',array('book'=>$book));
        $this->load->view('include/footer.inc.php');
    }
    function getStudent(){
        $facId = $_POST["facId"];
        if($facId==0){
        $dep = $this->borrowModel->getStudent();
    }elseif($facId==1){
            $dep = $this->borrowModel->getExStudent();
     }
        echo json_encode($dep);




    }
    function checkAddBorrow(){
        $error_book = $error_type = $error_student = $error_checkin = $error_checkout = $error_collateral ='';
        $error = false;
        if (isset($_POST['addBorrow'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['book'])) {
                $error_book = 'لطفاً ا نام  کتاب را وارد نماید';
                $error = true;
            }
            if (empty($_POST['student'])) {
                $error_student = 'لطفاً  نام شاگرد را انتخاب نماید';
                $error = true;
            }
            if (empty($_POST['checkin'])) {
                $error_checkin = 'لطفاً  تاریخ قرض کتاب را وارد نماید';
                $error = true;
            }
            if (empty($_POST['checkout'])) {
                $error_checkout = 'لطفاً  تاریخ برگشت کتاب را واردنمید';
                $error = true;
            }
            if (empty($_POST['collateral'])) {
                $error_collateral = 'لطفاً  ضمانت را واردنمید';
                $error = true;
            }

        }
        //------------------------------------------------
        if(!$error) {
            $data = array(
                "book_id" => $_POST['book'],
                "type" => $_POST['type'],
                "borrower_id" => $_POST['student'],
                "check_in" => $_POST['checkin'],
                "check_out" => $_POST['checkout'],
                "collateral" => $_POST['collateral'],
                'checks'=>$_POST['check'],
                "user_name" => $_SESSION['name'],
            );

            $result=$this->borrowModel->insertBorrow($data);
             if($result){
            borrowController::index("قرض گیرنده مورد نظر موفقانه  اضافه شد", 'success');
        }else{
            borrowController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
        }
             else {
            $book=$this->borrowModel->getBook();
            $this->load->view('include/header.inc.php');
            $this->load->view('addBorrow', array(
                'book' => $book,
                'error_book'=>$error_book,
                'error_type' => $error_type,
                'error_student' => $error_student,
                'error_checkin' => $error_checkin,
                'error_checkout' => $error_checkout,
                'error_collateral' => $error_collateral,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }
    function deleteBorrow(){
        $id=$_GET['id'];
        $result=$this->borrowModel->deleteBorrow($id);
        if($result){
            borrowController::index("قرض گیرنده مورد نظر موفقانه حذف شد", 'success');
        }else{
            borrowController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
    function BorrowDetail($result="معلومات قرضدار"){
        $id=$_GET['id'];
        $borrow=$this->borrowModel->getBorrowById($id);
        $this->load->view('include/header.inc.php',array('result'=>$result));
        $this->load->view('borrowDetail',array('data'=>$borrow));
        $this->load->view('include/footer.inc.php');
    }
    function editBorrow($result="ویرایش"){
        $id=$_GET['id'];
        $book=$this->borrowModel->getBook();
        $borrow=$this->borrowModel->getBorrowById($id);
        $this->load->view('include/header.inc.php',array('result'=>$result));
        $this->load->view('editBorrow',array('book'=>$book,'borrow'=>$borrow));
        $this->load->view('include/footer.inc.php');
    }
    function checkEditBorrow(){
           $error_book = $error_type = $error_student = $error_checkin = $error_checkout = $error_collateral ='';
        $error = false;
        if (isset($_POST['addBorrow'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['book'])) {
                $error_book = 'لطفاً ا نام  کتاب را وارد نماید';
                $error = true;
            }
            // if (empty($_POST['type'])) {
            //     $error_type = 'لطفاً  نوعیت شاگرد را انتخاب نماید';
            //     $error = true;
            // }
            if (empty($_POST['student'])) {
                $error_student = 'لطفاً  نام شاگرد را انتخاب نماید';
                $error = true;
            }
            if (empty($_POST['checkin'])) {
                $error_checkin = 'لطفاً  تاریخ قرض کتاب را وارد نماید';
                $error = true;
            }
            if (empty($_POST['checkout'])) {
                $error_checkout = 'لطفاً  تاریخ برگشت کتاب را واردنمید';
                $error = true;
            }
            if (empty($_POST['collateral'])) {
                $error_collateral = 'لطفاً  ضمانت را واردنمید';
                $error = true;
            }

        }
        //------------------------------------------------
        if(!$error) {
            $this->db->from('jarema');
            $amount=$this->db->get()->result();
            foreach($amount as $key)
            if($_POST['checkout'] < date('Y-m-d')){
                 $jarema=$_POST['checkout'];
                 // $res=$_POST['jaremaa'];
                $dat1=date('d', strtotime(date($jarema)));
                $mont1=date('m', strtotime(date($jarema)));
                $year1=date('Y', strtotime(date($jarema)));
                $dat2=date('d', strtotime(date('Y-m-d')));
                $mont2=date('m', strtotime(date('Y-m-d')));
                $year2=date('Y', strtotime(date('Y-m-d')));
                $day=$dat2-$dat1;
                $mont=$mont2-$mont1;
                $year=$year2-$year1;
                $result=$day+($mont*30)+($year*365);
            }else{
                $result=0;
            }
            $data = array(
                "book_id" => $_POST['book'],
                "type" => $_POST['type'],
                "borrower_id" => $_POST['student'],
                "check_in" => $_POST['checkin'],
                "check_out" => $_POST['checkout'],
                "collateral" => $_POST['collateral'],
                'checks'=>$_POST['check'],
                 'jarema'=>($result*$key->amount),
                "user_name" => $_SESSION['name'],
            );
            $id=$_POST['id'];
            $result=$this->borrowModel->editBorrow($id,$data);
             if($result){
            borrowController::index("قرض گیرنده مورد نظر موفقانه  ویرایش شد", 'success');
        }else{
            borrowController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
        }
             else {
            $book=$this->borrowModel->getBook();
            $this->load->view('include/header.inc.php');
            $this->load->view('addBorrow', array(
                'book' => $book,
                'error_book'=>$error_book,
                'error_type' => $error_type,
                'error_student' => $error_student,
                'error_checkin' => $error_checkin,
                'error_checkout' => $error_checkout,
                'error_collateral' => $error_collateral,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }
    function lend($result="کتاب های قرض گرفته شده"){
        $dat=$this->borrowModel->lend();

        $this->load->view('include/header.inc.php',array('result'=>$result));
        $this->load->view('lendView', array('data'=>$dat));
        $this->load->view('include/footer.inc.php');



    }


}
?>
