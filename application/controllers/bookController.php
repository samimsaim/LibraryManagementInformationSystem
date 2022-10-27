<?php
class BookController extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('bookModel');
		$this->load->model('usersModel');
    }

	function index($message = null, $type = null){
		    $data=$this->bookModel->getBooks();
        $this->load->view('include/header.inc.php');
        $this->load->view('books',array('data'=>$data,'Message' => $message, 'Type' => $type));
        $this->load->view('include/footer.inc.php');
	}
  function bookDetail(){
    $id=$_GET['id'];
    $data=$this->bookModel->getBookById($id);
    $this->load->view('include/header.inc.php');
    $this->load->view('bookDetail',array('data'=>$data));
    $this->load->view('include/footer.inc.php');
  }
	function addBook(){
		$author=$this->bookModel->getBookAuthor();
		$category=$this->bookModel->getBookCategory();
		$procurment=$this->bookModel->getBookProcurement();
		$publisher=$this->bookModel->getBookPublisher();
		$translator=$this->bookModel->getBookTranslator();
		$this->load->view('include/header.inc.php');
        $this->load->view('addBook',array('author'=>$author,'category'=>$category,'procurment'=>$procurment,'publisher'=>$publisher,'translator'=>$translator));
        $this->load->view('include/footer.inc.php');
	}
	function checkAddBook(){
        $error_record_number = $error_date = $error_title = $error_edition = $error_author_id = $error_translator = $error_publisher = $error_valuem = $error_number_of_page = $error_percurement=$error_category=$error_price='';
        $error = false;
        if (isset($_POST['addBook'])) {
       
              
            // -------------- Form validation -----------------
            if (empty($_POST['recordNumber'])) {
                $error_record_number = 'لطفاً ا نمبر ثبت را وارد نماید';
                $error = true;
            }
            if (empty($_POST['date'])) {
                $error_date = 'لطفاً  تاریخ ثبت را وارد نماید';
                $error = true;
            }
            if (empty($_POST['title'])) {
                $error_title = 'لطفاً  عنوان کتاب را وارد نماید';
                $error = true;
            }
            if (empty($_POST['edition'])) {
                $error_edition = 'لطفاً  ویرایش را وارد نماید';
                $error = true;
            }
            // if (empty($_POST['authorId'])) {
            //     $error_author_id = 'لطفاً  نویسنده را انتخاب نماید';
            //     $error = true;
            // }
            if (empty($_POST['translator'])) {
                $error_translator = 'لطفاً  مترجم را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['publisher'])) {
                $error_publisher = 'لطفاً  ناشر را انتخاب نماید';
                $error = true;
            }
            if (empty($_POST['valuemNumber'])) {
                $error_valuem = 'لطفاً  تعداد جلد را وارد نماید';
                $error = true;
            }
            if (empty($_POST['page'])) {
                $error_number_of_page = 'لطفاً  تعداد صفحه را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['procurement'])) {
                $error_percurement = 'لطفاً  نوعیت خریداری را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['category'])) {
                $error_category = 'لطفاً  کتگوری را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['price'])) {
                $error_price = 'لطفاً قیمت را وارد نماید!';
                $error = true;
            }
           
        }
        //------------------------------------------------
        if(!$error) {

            $data = array(
                "record_id" => $_POST['recordNumber'],
                "book_title" => $_POST['title'],
                "date" => $_POST['date'],
                "publisher_id" => $_POST['publisher'],
                "no_of_volume" => $_POST['valuemNumber'],
                "no_of_pages" => $_POST['page'],
                "procurement_id" => $_POST['procurement'],
                "category_id" => $_POST['category'],
                "edition" => $_POST['edition'],
                "price" => $_POST['price'],
            );

            $book_id=$this->bookModel->insertBook($data);
             $author=$_POST['author'];
            $i=0;
            foreach ($author as $key ) {
            $data=array(
              'author_id'=>$author[$i],
              'book_id'=>$book_id,
            );
            $this->bookModel->insertBookAuthor($data);
            $i++;
           }
                $translator_id=array(
                    'book_id'=>$book_id,
                    'translator_id'=>$_POST['translator'],
                );
                $this->bookModel->insertTranslator($translator_id);
                redirect('BookController/index');
            }
            
                
         
             else {
            $author=$this->bookModel->getBookAuthor();
		    $category=$this->bookModel->getBookCategory();
		    $procurment=$this->bookModel->getBookProcurement();
		    $publisher=$this->bookModel->getBookPublisher();
		    $translator=$this->bookModel->getBookTranslator();
            $this->load->view('include/header.inc.php');
            $this->load->view('addBook', array(
                'author' => $author,
                'category' => $category,
                'procurment' => $procurment,
                'publisher' => $publisher,
                'translator' => $translator,
                'error_record_number' => $error_record_number,
                'error_date' => $error_date,
                'error_title' => $error_title,
                'error_edition' => $error_edition,
                'error_author_id' => $error_author_id,
                'error_translator' => $error_translator,
                'error_publisher' => $error_publisher,
                'error_valuem' => $error_valuem,
                'error_number_of_page' => $error_number_of_page,
                'error_percurement' => $error_percurement,
                'error_category' => $error_category,
                'error_price' => $error_price,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }
    function deleteBook(){
        $id=$_GET['id'];
        $result=$this->bookModel->deleteBook($id);
        if($result){
            BookController::index("کتاب مورد نظر موفقانه حذف شد", 'success');
        }else{
            BookController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
    function editBook(){
        $id=$_GET['id'];
        $book=$this->bookModel->getBookById($id);
        $author=$this->bookModel->getBookAuthor();
        $category=$this->bookModel->getBookCategory();
        $procurment=$this->bookModel->getBookProcurement();
        $publisher=$this->bookModel->getBookPublisher();
        $translator=$this->bookModel->getBookTranslator();
        $this->load->view('include/header.inc.php');
        $this->load->view('editBook',array('author'=>$author,'category'=>$category,'procurment'=>$procurment,'publisher'=>$publisher,'translator'=>$translator,'book'=>$book));
        $this->load->view('include/footer.inc.php');
    }
    function checkEditBook(){
         $error_record_number = $error_date = $error_title = $error_edition = $error_author_id = $error_translator = $error_publisher = $error_valuem = $error_number_of_page = $error_percurement=$error_category=$error_price='';
        $error = false;
        if (isset($_POST['addBook'])) {
        $id=$_POST['id'];
              
            // -------------- Form validation -----------------
            if (empty($_POST['recordNumber'])) {
                $error_record_number = 'لطفاً ا نمبر ثبت را وارد نماید';
                $error = true;
            }
            if (empty($_POST['date'])) {
                $error_date = 'لطفاً  تاریخ ثبت را وارد نماید';
                $error = true;
            }
            if (empty($_POST['title'])) {
                $error_title = 'لطفاً  عنوان کتاب را وارد نماید';
                $error = true;
            }
            if (empty($_POST['edition'])) {
                $error_edition = 'لطفاً  ویرایش را وارد نماید';
                $error = true;
            }
            
            if (empty($_POST['translator'])) {
                $error_translator = 'لطفاً  مترجم را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['publisher'])) {
                $error_publisher = 'لطفاً  ناشر را انتخاب نماید';
                $error = true;
            }
            if (empty($_POST['valuemNumber'])) {
                $error_valuem = 'لطفاً  تعداد جلد را وارد نماید';
                $error = true;
            }
            if (empty($_POST['page'])) {
                $error_number_of_page = 'لطفاً  تعداد صفحه را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['procurement'])) {
                $error_percurement = 'لطفاً  نوعیت خریداری را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['category'])) {
                $error_category = 'لطفاً  کتگوری را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['price'])) {
                $error_price = 'لطفاً قیمت را وارد نماید!';
                $error = true;
            }
           
        }
        //------------------------------------------------
        if(!$error) {

            $data = array(
                "record_id" => $_POST['recordNumber'],
                "book_title" => $_POST['title'],
                "date" => $_POST['date'],
                "publisher_id" => $_POST['publisher'],
                "no_of_volume" => $_POST['valuemNumber'],
                "no_of_pages" => $_POST['page'],
                "procurement_id" => $_POST['procurement'],
                "category_id" => $_POST['category'],
                "edition" => $_POST['edition'],
                "price" => $_POST['price'],
            );
            
            $this->bookModel->updateBook($bookId,$data);
             $author=$_POST['author'];
            $i=0;
            foreach ($author as $key ) {
            $data=array(
              'author_id'=>$author[$i],
              'book_id'=>$_POST['id'],
            );
            $this->bookModel->updateBookAuthor($id,$data);
            $i++;
           }
                $translator_id=array(
                    'book_id'=>$_['id'],
                    'translator_id'=>$_POST['translator'],
                );
                $this->bookModel->updateTranslator($id,$translator_id);
                redirect('BookController/index');
            }
            
                
         
             else {
            $author=$this->bookModel->getBookAuthor();
            $category=$this->bookModel->getBookCategory();
            $procurment=$this->bookModel->getBookProcurement();
            $publisher=$this->bookModel->getBookPublisher();
            $translator=$this->bookModel->getBookTranslator();
            $this->load->view('include/header.inc.php');
            $this->load->view('addBook', array(
                'author' => $author,
                'category' => $category,
                'procurment' => $procurment,
                'publisher' => $publisher,
                'translator' => $translator,
                'error_record_number' => $error_record_number,
                'error_date' => $error_date,
                'error_title' => $error_title,
                'error_edition' => $error_edition,
                'error_author_id' => $error_author_id,
                'error_translator' => $error_translator,
                'error_publisher' => $error_publisher,
                'error_valuem' => $error_valuem,
                'error_number_of_page' => $error_number_of_page,
                'error_percurement' => $error_percurement,
                'error_category' => $error_category,
                'error_price' => $error_price,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }
}
?>