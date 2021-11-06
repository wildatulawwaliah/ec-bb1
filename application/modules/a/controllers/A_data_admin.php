<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_data_admin extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_admin');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='a'){
						$d['title'] ='Data Admin';
						$d['content']='data_admin/view';
						$d['data']=$this->m_admin->all();
						$this->load->view('a_home',$d);
				}else {
					  $this->session->set_flashdata('f_error','Invalid Username or Password');
					  redirect('a_login/logout');
				}

			}

			public function cari_admin()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='a'){
								$id['id_user'] = $this->input->post('id_user');

								$q=$this->db->get_where('users',$id);
								$row=$q->num_rows();
								if($row>0){
									foreach ($q->result() as $dt) {
										$d['id_user']=$dt->id_user;
										$d['username']=$dt->username;
										$d['nama_lengkap']=$dt->nama_lengkap;
										$d['password']=$dt->password;
										$d['level']=$dt->level;
										$d['aktif']=$dt->aktif;
									}
								}else {
									$d['id_user']='';
									$d['username']='';
									$d['nama_lengkap']='';
									$d['password']='';
									$d['level']='';
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
								$id['id_user'] = $this->input->post('id_user');
								$dt['username'] = $this->input->post('username');
								$dt['password'] = md5($this->input->post('password'));
								$dt['nama_lengkap'] = $this->input->post('nama_lengkap');
								$dt['level'] = $this->input->post('level');
								$dt['aktif'] = $this->input->post('aktif');
								$q=$this->db->get_where('users',$id)->num_rows();
								if($q>0){
									$this->db->update('users',$dt,$id);
									echo "Data Sukses DiUpdate";
								}else {
									$this->db->insert('users',$dt);
									echo "Data Sukses DiSimpan";
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
										$id['id_user'] = $this->input->post('id_user');
										$this->db->delete('users',$id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('a_login/logout');
							}

						}

	}

	?>
