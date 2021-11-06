<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_login extends CI_Controller {
	  function __construct() {
        parent::__construct();
				$this->load->model('m_login');
				$this->load->library('encryption');
    }

		public function index()
			{
				$this->load->view('a_login');
			}

		function cek_login(){

			  $username = $this->input->post('username');
			  $password = $this->input->post('password');

				$this->form_validation->set_rules('username','Username','required');
				$this->form_validation->set_rules('password','Password','required');

				$this->form_validation->set_error_delimiters('<div style="color:rgb(209, 18, 18);margin-top:-15px;">', '</div>');
  			$this->form_validation->set_message('required', '*Enter %s');


				if($this->form_validation->run() == false){
					$this->load->view('a_login');
				}else {
						$where = array(
					   'username' => $username,
					   'password' => md5($password),
						 'aktif' 	=> '1'
					   );
					  $q= $this->db->get_where('users',$where);
						$cek=$q->num_rows();
					  if($cek > 0){
								foreach ($q->result() as $dt) {
									$data_session = array(
		 					    'username' => $dt->username,
									'nama_lengkap' => $dt->nama_lengkap,
		 					    'status' => "login",
									'level' => $dt->level,
									'id_user'=>$dt->id_user
		 					    );
								}
							   $this->session->set_userdata($data_session);
							   redirect(base_url("a_home"));
					  }else{
							   $this->session->set_flashdata('f_error','Invalid Username or Password');
								 redirect('a_login');
					  }
				}


		 }

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('a_login');
		}

	}

	?>
