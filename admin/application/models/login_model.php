<?php
class Login_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	public function check(){
		$username = $this->input->post('username');
        $password = $this->input->post('password');
        $rememberMe = $this->input->post('rememberMe');
        $this->db->select('username','password');
        $this->db->where('username',$username);
        $this->db->where('password',sha1($password));
        $this->db->from('users');
        $is = $this->db->count_all_results();
        $query = $this->db->query("select * from users WHERE username ='".$username."'");
        $result = $query->result();
        if($is > 0){
            foreach($result as $rows)
                $data_session = array('id'=>$rows->user_id,'username'=>$username,'name'=>$rows->name,'lname'=>$rows->last_name,'gender'=>$rows->gender,'image'=>$rows->image,'attSizeFirst'=>0,'attSizeSecond'=>0,'privilege'=>$rows->privilege,'login'=>true,'lock'=>false);
                $this->session->set_userdata($data_session);
                redirect("mainPageController/index");
        }else{
            $this->load->view('login' ,array('error'=>true));
        }
	}
}
?>
