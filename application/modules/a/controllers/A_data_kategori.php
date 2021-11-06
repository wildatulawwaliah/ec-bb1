<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_data_kategori extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_kategori');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='a'){
						$d['title'] ='Data Kategori';
						$d['content']='data_kategori/view';
						$d['data']=$this->m_kategori->all();
						$this->load->view('a_home',$d);
				}else {
					  $this->session->set_flashdata('f_error','Invalid Username or Password');
					  redirect('a_login/logout');
				}

			}

			public function buat_kode(){
				$row=$this->db->get('kategori')->num_rows();
				if($row>0){
					$kode_kategori=$this->db->select_max('kode_kategori')->get('kategori')->row()->kode_kategori;
					$kode=substr($kode_kategori,2);
					$kode='KG'.str_pad(($kode+1), 3, '0', STR_PAD_LEFT);
				}else {
					$kode='KG001';
				}
				return $kode;
			}

			public function tambah()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='a'){
							$d['kode_kategori']=$this->buat_kode();
							echo json_encode($d);
					}else {
							redirect('a_login/logout');
					}

				}

			public function cari_kategori()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='a'){
								$id['kode_kategori'] = $this->input->post('kode');

								$q=$this->db->get_where('kategori',$id);
								$row=$q->num_rows();
								if($row>0){
									foreach ($q->result() as $dt) {
										$d['kode_kategori']=$dt->kode_kategori;
										$d['kategori']=$dt->kategori;
									}
								}else {
									$d['kode_kategori']='';
									$d['kategori']='';
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
								$id['kode_kategori'] = $this->input->post('kode');
								$dt['kode_kategori'] = $this->input->post('kode');
								$dt['kategori'] = $this->input->post('kategori');
								$dt['id_user'] = $this->session->userdata('id_user');
								$q=$this->db->get_where('kategori',$id)->num_rows();
								if($q>0){
									$dt['w_update'] =date('Y-m-d H:i:s');
									$this->db->update('kategori',$dt,$id);
									echo "Data Sukses DiUpdate";
								}else {
									$dt['w_insert'] =date('Y-m-d H:i:s');
									$this->db->insert('kategori',$dt);
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
										$id['kode_kategori'] = $this->input->post('kode');
										$this->db->delete('kategori',$id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('a_login/logout');
							}

						}

	}

	?>
