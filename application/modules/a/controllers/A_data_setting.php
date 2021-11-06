<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class a_data_setting extends CI_Controller {
	function __construct() {
        parent::__construct();
    }

		public function index()
			{
				// error_reporting(0);
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='a'){
						$d['title'] ='Setting System';
						$d['content']='setting/view';
						$id['id']='system';
						$data=$this->db->get_where('setting',$id);
						foreach ($data->result() as $dt) {
							$d['nama_toko']=$dt->nama_toko;
							$d['telephone']=$dt->telephone;
							$d['motto']=$dt->motto;
						}
						$this->load->view('a_home',$d);
				}else {
					  $this->session->set_flashdata('f_error','Invalid Username or Password');
					  redirect('a_login/logout');
				}

			}

				public function simpan()
					{
						$cek=$this->session->userdata('status');
						$level=$this->session->userdata('level');
						if($cek=='login' && $level=='a'){
							    error_reporting(0);
									$id['id'] = 'system';
									$dt['nama_toko'] = $this->input->post('nama_toko');
									$dt['telephone'] = $this->input->post('telephone');
									$dt['motto'] = $this->input->post('motto');
									$this->db->update('setting',$dt,$id);
									echo "System Sukses diUpdate";

						}else {
							  redirect('a_login/logout');
						}

					}

					public function reset_database()
						{
							$cek=$this->session->userdata('status');
							$level=$this->session->userdata('level');
							if($cek=='login' && $level=='a'){
								    error_reporting(0);
										$this->db->query("TRUNCATE barang");
										$this->db->query("TRUNCATE barang_awal");
										$this->db->query("TRUNCATE barang_image");
										$this->db->query("TRUNCATE barang_image_awal");
										$this->db->query("TRUNCATE history_tambah_stok");
										$this->db->query("TRUNCATE stok");
										$this->db->query("TRUNCATE stok_awal");
										$this->db->query("TRUNCATE stok_masuk");
										$this->db->query("TRUNCATE kategori");
										$this->db->query("TRUNCATE bank");
										$this->db->query("TRUNCATE supplier");
										$this->db->query("TRUNCATE users_account");
										$this->db->query("TRUNCATE users_account_keranjang");
										$this->db->query("TRUNCATE pembelian");
										$this->db->query("TRUNCATE pembelian_detail");
										echo "System Sukses diReset";

							}else {
								  redirect('a_login/logout');
							}

						}

	}

	?>
