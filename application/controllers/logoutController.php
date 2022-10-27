<?php
class LogoutController extends CI_Controller{
	function index(){
//		session_destroy();
        unset($_SESSION['login']);
        unset($_SESSION['id']);
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),null, time() - 3600);
        }
        redirect('loginController/index');
	}
}
?>