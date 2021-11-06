<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_data_users extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_users');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='a'){
						$d['title'] ='Data Users';
						$d['content']='data_users/view';
						$d['data']=$this->m_users->all();
						$this->load->view('a_home',$d);
				}else {
					  $this->session->set_flashdata('f_error','Invalid Username or Password');
					  redirect('a_login/logout');
				}

			}

			public function cari_user()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='a'){
								$id['id_account'] = $this->input->post('id_account');

								$q=$this->db->get_where('users_account',$id);
								$row=$q->num_rows();
								if($row>0){
									foreach ($q->result() as $dt) {
										$d['id_account']=$dt->id_account;
										$d['username']=$dt->username;
										$d['alamat']=$dt->alamat;
										$d['telephone']=$dt->telephone;
										$d['nama_lengkap']=$dt->nama_lengkap;
										$d['email']=$dt->email;
										$d['aktif']=$dt->aktif;
									}
								}else {
									$d['id_account']='';
									$d['username']='';
									$d['nama_lengkap']='';
									$d['alamat']='';
									$d['email']='';
									$d['telephone']='';
									$d['aktif']='';
								}
								echo json_encode($d);
					}else {
						  redirect('a_login/logout');
					}

				}

			public function simpan()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='a'){
						    date_default_timezone_set('Asia/Makassar');
								$id['id_account'] = $this->input->post('id_account');
								$dt['username'] = $this->input->post('username');
								$dt['email'] = $this->input->post('email');
								$dt['alamat'] = $this->input->post('alamat');
								$dt['nama_lengkap'] = $this->input->post('nama_lengkap');
								$dt['telephone'] = $this->input->post('telephone');
								$dt['aktif'] = $this->input->post('aktif');
								$q=$this->db->get_where('users_account',$id)->num_rows();
								if($q>0){
									$this->db->update('users_account',$dt,$id);
									echo "Data Sukses DiUpdate";
								}
					}else {
						  redirect('a_login/logout');
					}

				}

				public function simpan_password()
					{
						$cek=$this->session->userdata('status');
						$level=$this->session->userdata('level');
						if($cek=='login' && $level=='a'){
							    date_default_timezone_set('Asia/Makassar');
									$id['id_account'] = $this->input->post('id_account_password');
									$dt['password'] = md5($this->input->post('password'));
									$q=$this->db->get_where('users_account',$id)->num_rows();
									if($q>0){
										$this->db->update('users_account',$dt,$id);
										echo "Data Sukses DiUpdate";
									}
						}else {
							  redirect('a_login/logout');
						}

					}


					public function hapus()
						{
							$cek=$this->session->userdata('status');
							$level=$this->session->userdata('level');
							if($cek=='login' && $level=='a'){
										$id['id_account'] = $this->input->post('id_account');
										$this->db->delete('users_account',$id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('a_login/logout');
							}

						}

	}

	?>
