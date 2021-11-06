<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_account extends CI_Controller {
	function __construct() {
        parent::__construct();
			  $this->load->database('default');
    }

	public function index()
	{
		$status=$this->session->userdata('status');
		if($status=='login'){$login='1';}else {$login='0';}
		$d['login']=$login;
		$d['title']='Buat Akun';
		$d['content']='v_create_account';
		$this->load->view('home',$d);
	}

	public function simpan()
		{
						date_default_timezone_set('Asia/Makassar');
						$dt['username'] = $this->input->post('username');
						$dt['nama_lengkap'] = $this->input->post('nama_lengkap');
						$dt['email'] = $this->input->post('email');
						$dt['alamat'] = $this->input->post('alamat');
						$dt['telephone'] = $this->input->post('telephone');
						$dt['password'] = md5($this->input->post('password'));
						$dt['w_insert'] =date('Y-m-d H:i:s');
						$this->db->insert('users_account',$dt);
						echo "Akun berhasil dibuat. Silahkan Sign In!";

		}

		public function cek_username()
			{
					date_default_timezone_set('Asia/Makassar');
					$id['username'] = $this->input->post('username');
					$q=$this->db->get_where('users_account',$id)->num_rows();
					if($q>0){
						echo "1";
					}

			}

}
