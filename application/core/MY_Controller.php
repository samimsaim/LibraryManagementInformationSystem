<?php

    class MY_Controller extends CI_Controller{
        function __construct(){
            parent::__construct();

            $login = $this->session->userdata('login');
            if(!empty($login)) {
                if($login != true){
                    redirect('login/index');
                }
            }else{
                redirect('login/index');
            }
        }
    }

?>