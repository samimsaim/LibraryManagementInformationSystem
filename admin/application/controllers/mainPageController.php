<?php

class MainPageController extends MY_Controller{

	function __construct(){
		parent::__construct();
		// $this->load->model('mainPageModel');
	}

	function index($message = null, $type = null,$result="صفحه اصلی"){

		$this->load->view('include/header.inc.php',array('result'=>$result));
		$this->load->view('mainPage');
		// $this->load->view('include/footer.inc.php');
	}
	

	}
?>
