<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_data_bank extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_bank');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='a'){
						$d['title'] ='Data Bank';
						$d['content']='data_bank/view';
						$d['data']=$this->m_bank->all();
						$this->load->view('a_home',$d);
				}else {
					  $this->session->set_flashdata('f_error','Invalid Username or Password');
					  redirect('a_login/logout');
				}

			}

			public function buat_kode(){
				$row=$this->db->get('bank')->num_rows();
				if($row>0){
					$kode_bank=$this->db->select_max('kode_bank')->get('bank')->row()->kode_bank;
					$kode=substr($kode_bank,2);
					$kode='BK'.str_pad(($kode+1), 3, '0', STR_PAD_LEFT);
				}else {
					$kode='BK001';
				}
				return $kode;
			}

			public function tambah()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='a'){
							$d['kode_bank']=$this->buat_kode();
							echo json_encode($d);
					}else {
							redirect('a_login/logout');
					}

				}

			public function cari_bank()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='a'){
								$id['kode_bank'] = $this->input->post('kode');

								$q=$this->db->get_where('bank',$id);
								$row=$q->num_rows();
								if($row>0){
									foreach ($q->result() as $dt) {
										$d['kode_bank']=$dt->kode_bank;
										$d['bank']=$dt->bank;
										$d['norek']=$dt->norek;
									}
								}else {
									$d['kode_bank']='';
									$d['bank']='';
									$d['norek']='';
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
								$id['kode_bank'] = $this->input->post('kode');
								$dt['kode_bank'] = $this->input->post('kode');
								$dt['bank'] = $this->input->post('bank');
								$dt['norek'] = $this->input->post('norek');
								$dt['id_user'] = $this->session->userdata('id_user');
								$q=$this->db->get_where('bank',$id)->num_rows();
								if($q>0){
									$dt['w_update'] =date('Y-m-d H:i:s');
									$this->db->update('bank',$dt,$id);
									echo "Data Sukses DiUpdate";
								}else {
									$dt['w_insert'] =date('Y-m-d H:i:s');
									$this->db->insert('bank',$dt);
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
										$id['kode_bank'] = $this->input->post('kode');
										$this->db->delete('bank',$id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('a_login/logout');
							}

						}

	}

	?>
