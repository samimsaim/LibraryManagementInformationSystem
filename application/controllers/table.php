<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Controller {

	Public function __construct() { 
        parent::__construct(); 
         
        $this->load->model('Tablemodel');
         
	} 

	public function index()
	{
        $data['posts'] = $this->Tablemodel->posts();
		$this->load->view('include/header.inc.php');
        $this->load->view('tablepage',$data);
        $this->load->view('include/footer.inc.php');
	}

	public function savedata()
    {
        If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
            redirect('table');
        }
        
        $id = $this->input->post('category_id',true);
        $title = $this->input->post('category_name',true);
        
        $fields = array(
                    'category_name' => $title,
                  );
        
        $this->Tablemodel->posts_save($id,$fields);
        
        echo "Successfully saved";
          
    }

}