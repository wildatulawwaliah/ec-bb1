<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign_in extends CI_Controller {
	function __construct() {
        parent::__construct();
			  $this->load->database('default');
    }

	public function index()
	{
		$status=$this->session->userdata('status');
		if($status=='login'){$login='1';}else {$login='0';}
		$d['login']=$login;
		$d['title']='Sign In';
		$d['content']='v_sign_in';
		$this->load->view('home',$d);
	}

	public function cek()
		{
				$id['username'] = $this->input->post('username');
				$id['password'] = md5($this->input->post('password'));
				$id['aktif']='1';
				$q=$this->db->get_where('users_account',$id);
				$cek=$q->num_rows();
				if($cek>0){
					foreach ($q->result() as $dt) {
						$data_session = array(
						'username' => $dt->username,
						'nama_lengkap' => $dt->nama_lengkap,
						'status' => "login",
						'level' => "u",
						'id_account'=>$dt->id_account
						);
					}
					$this->session->set_userdata($data_session);
					echo "1";
				}else {
					echo "0";
				}

		}

}
