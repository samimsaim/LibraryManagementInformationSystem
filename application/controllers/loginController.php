<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller{
	function __construct(){
		parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
	}

	public function index(){
		$this->load->view('login');
	}
	public function auth(){
		$error_user  = $error_pass = $username = $password= '';
        $error = false;
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            // ----------------- user email -----------------------
            if(empty($username)){
                $error_user = "لطفاً نام کاربری خود را وارد کنید!";
                $error = true;
            }else{
                if(strlen($username) < 5){
                    $error_user = "نام کاربری شما کمتر از پنج حرف است";
                    $error = true;
                }
            }
            // ----------------- user pass -------------------------
            if(empty($password)){
                $error_pass = "لطفاً رمز عبور خود را وارد نمایمد!";
                $error = true;
            }else{
                if(strlen($password)<5){
                    $error_pass = "رمز عبور شما کمتر از پنج حرف است!";
                    $error = true;
                }
            }
        }
        if(!$error){
            $this->load->model('login_model');
            $this->login_model->check();
        }else{
            $Field = array(
                'error_user'=>$error_user,
                'error_pass'=>$error_pass
            );
            $this->load->view('login',array('data'=>$_POST,'Error'=>$Field));
        }
	}
}

?>