<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_data_supplier extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_supplier');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='a'){
						$d['title'] ='Data Vendor';
						$d['content']='data_supplier/view';
						$d['data']=$this->m_supplier->all();
						$this->load->view('a_home',$d);
				}else {
					  $this->session->set_flashdata('f_error','Invalid Username or Password');
					  redirect('a_login/logout');
				}

			}

			public function buat_kode(){
				$row=$this->db->get('supplier')->num_rows();
				if($row>0){
					$kode_supplier=$this->db->select_max('kode_supplier')->get('supplier')->row()->kode_supplier;
					$kode=substr($kode_supplier,2);
					$kode='SP'.str_pad(($kode+1), 3, '0', STR_PAD_LEFT);
				}else {
					$kode='SP001';
				}
				return $kode;
			}

			public function tambah()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='a'){
							$d['kode_supplier']=$this->buat_kode();
							echo json_encode($d);
					}else {
							redirect('a_login/logout');
					}

				}

			public function cari_supplier()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='a'){
								$id['kode_supplier'] = $this->input->post('kode');

								$q=$this->db->get_where('supplier',$id);
								$row=$q->num_rows();
								if($row>0){
									foreach ($q->result() as $dt) {
										$d['kode_supplier']=$dt->kode_supplier;
										$d['supplier']=$dt->supplier;
									}
								}else {
									$d['kode_supplier']='';
									$d['supplier']='';
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
								$id['kode_supplier'] = $this->input->post('kode');
								$dt['kode_supplier'] = $this->input->post('kode');
								$dt['supplier'] = $this->input->post('supplier');
								$dt['id_user'] = $this->session->userdata('id_user');
								$q=$this->db->get_where('supplier',$id)->num_rows();
								if($q>0){
									$dt['w_update'] =date('Y-m-d H:i:s');
									$this->db->update('supplier',$dt,$id);
									echo "Data Sukses DiUpdate";
								}else {
									$dt['w_insert'] =date('Y-m-d H:i:s');
									$this->db->insert('supplier',$dt);
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
										$id['kode_supplier'] = $this->input->post('kode');
										$this->db->delete('supplier',$id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('a_login/logout');
							}

						}

	}

	?>
