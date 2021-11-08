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

		public function registrasi()
		{
			if ($this->input->post()) {
				$this->form_validation->set_rules('username','Username','required|is_unique[users.username]');
				$this->form_validation->set_rules('password','Password','required');
				$this->form_validation->set_rules('nama','Nama','required');
				$this->form_validation->set_rules('nama_vendor','Nama Vendor','required|is_unique[supplier.supplier]');
				$this->form_validation->set_error_delimiters('<div style="color:rgb(209, 18, 18);margin-top:-15px;">', '</div>');
	  			$this->form_validation->set_message('required', '*Enter %s');
	  			$this->form_validation->set_message('is_unique', '*%s is not valid');
	  			if ($this->form_validation->run() == true) {
	  				$this->m_login->db->insert('users', [
	  					'username' => $this->input->post('username'),
	  					'password' => md5($this->input->post('password')),
	  					'level' => 'v',
	  					'nama_lengkap' => $this->input->post('nama'),
	  					'aktif' => 1
	  				]);
	  				$id = $this->m_login->db->insert_id();
	  				$this->m_login->db->insert('supplier', [
	  					'kode_supplier' => $this->buat_kode(),
	  					'supplier' => $this->input->post('nama_vendor'),
	  					'id_user' => $id,
	  				]);
	  				redirect('a_login');
	  			}
			}
			$this->load->view('registrasi');
		}

		private function buat_kode(){
			$row = $this->m_login->db->get('supplier')->num_rows();
			if($row>0){
				$kode_supplier=$this->m_login->db->select_max('kode_supplier')->get('supplier')->row()->kode_supplier;
				$kode=substr($kode_supplier,2);
				$kode='SP'.str_pad(($kode+1), 3, '0', STR_PAD_LEFT);
			}else {
				$kode='SP001';
			}
			return $kode;
		}

	}

	?>
