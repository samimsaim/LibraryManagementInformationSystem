<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainPageController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mainPageModel');
		$this->load->helper("url");
        $this->load->library("pagination");
	}
	public function index(){
  $config['base_url'] = site_url('MainPageController/book');
        $config['total_rows'] = $this->mainPageModel->record_count();
        $config['per_page'] = "4";
        $config["uri_segment"] = 3;
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['book'] = $this->mainPageModel->fetch_data($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
	   $result=$this->mainPageModel->aboutUs();
        // $data=$this->mainPageModel->getBooks();
		$this->load->view('include/header.inc.php');
		$this->load->view('index',array('data'=>$data,'result'=>$result));
		$this->load->view('include/footer.inc.php');
	}
function book(){
       $config['base_url'] = site_url('MainPageController/book');
        $config['total_rows'] = $this->mainPageModel->record_count();
        $config['per_page'] = "6";
        $config["uri_segment"] = 3;
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['book'] = $this->mainPageModel->fetch_data($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

      // $data=$this->mainPageModel->book();
      $this->load->view('include/header.inc.php');
    $this->load->view('book',array('data'=>$data));
    $this->load->view('include/footer.inc.php');
    }
function fetch()
 {
  $output = '';
  $query = '';
  $this->load->model('ajaxsearch_model');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }

  $data = $this->ajaxsearch_model->fetch_data($query);
  $output .= '

  ';
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
    <div  class="col-lg-4 col-md-6 col-12">
       <div class="single-item" style="margin-top:80px;">
      <div class="single-item-image overlay-effect">
      <a href="#"><img style="height: 150px; width: 200px;" src="'.base_url().'admin/'.$row->image.'" alt=""></a>
            </div>
         <div class="single-item-text">
                              <h4><a href="#">'.$row->book_title .'</a></h4>
                                    <div class="single-item-text-info">
                                         <span>چاپ <span>'. $row->edition .' </span></span><br>
                                        <span>نمبر ثبت<span>'.$row->record_id.'</span></span>
                                    </div>

                                    <div class="single-item-content">
                                      
                                    </div>
                                </div>
                            </div>
                            </dive>
                            </div>
    ';
   }
  }
  else
  {
   $output .= '<tr>
       <td colspan="5">کتاب مورد نظر یافت نشد</td>
      </tr>';
  }
  $output .= '</table>';
  echo $output;
 }
    function aboutUs(){
		$data=$this->mainPageModel->aboutUs();
		$this->load->view('include/header.inc.php');
		$this->load->view('courses',array('data'=>$data));
        $this->load->view('include/footer.inc.php');

    }
     function contactUs(){
        $data=$this->mainPageModel->address();
      $this->load->view('include/header.inc.php');
    $this->load->view('contactUs',array('data'=>$data));
    $this->load->view('include/footer.inc.php');
    }
    function opinion(){
        $data=$this->mainPageModel->address();
        $this->load->view('include/header.inc.php');
        $this->load->view('opinion',array('data'=>$data));
        $this->load->view('include/footer.inc.php');
    }
    
 
    function aboutxUs(){
    	$this->load->model('mainPageModel');
    	$data=$this->mainPageModel->aboutUs();
    	$this->load->view('include/header.inc.php');
		$this->load->view('aboutUs',array('data'=>$data));
		$this->load->view('include/footer.inc.php');
    }
   
     
    function checkAddDetail(){
        $error_name = $error_lname = $error_uni= $error_email = $error_detail='';
        $error = false;
        if (isset($_POST['addDetail'])) {

              if (empty($_POST['name'])) {
                $error_name = 'لطفاً نام خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['lname'])) {
                $error_lname = 'لطفاً ا تخلص خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['uni'])) {
                $error_uni = 'لطفاً  پوهنتون خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['email'])) {
                $error_email = 'لطفاً  ایمیل خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['detail'])) {
                $error_detail = 'لطفاً  نظر خود را وارد نماید';
                $error = true;
            }

        }
        //------------------------------------------------
        if(!$error) {

            $data = array(
                "name" => $_POST['name'],
                "lname" => $_POST['lname'],
                "uni" => $_POST['uni'],
                "email" => $_POST['email'],
                "detail" => $_POST['detail'],

            );

            $result=$this->mainPageModel->insertDetail($data);

           if($result){
            MainPageController::opinion("کتاب مورد نظر مو نظر موفقانه اضافه شد", 'success');
        }else{
            BookController::opinion("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
            } else {
            $this->load->view('include/header.inc.php');
            $this->load->view('opinion', array(
                'error_name' => $error_name,
                'error_email' => $error_email,
                'error_lname' => $error_lname,
                'error_uni' => $error_uni,
                'error_detail' => $error_detail,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
}

}
?>
