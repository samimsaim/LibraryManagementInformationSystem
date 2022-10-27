<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class MY_Controller extends CI_Controller{
        function __construct(){
            parent::__construct();

            $login = $this->session->userdata('login');
            if(!empty($login)) {
                if($login != true){
                    redirect('LoginController/index');
                }else{
                    if($this->session->userdata('lock') == true){
                        redirect('LoginController/lockScreen');
                    }
                }
            }else{
                if(isset($_SESSION['lock'])){
                    $_SESSION['lock'] = false;
                }
                redirect('LoginController/index');
            }
        }
    }

