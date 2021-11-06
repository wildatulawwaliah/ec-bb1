<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_data_stok_masuk extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_stok_masuk');
    }

		public function index()
			{

				error_reporting(0);
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='a'){
						$d['title'] ='Data Stok Masuk';
						$d['content']='data_stok_masuk/view';
						$d['data']=$this->m_stok_masuk->all();
						$this->load->view('a_home',$d);
				}else {
					  $this->session->set_flashdata('f_error','Invalid Username or Password');
					  redirect('a_login/logout');
				}

			}

			public function cari_stok_masuk()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='a'){
								$id['id'] = $this->input->post('id');

								$q=$this->db->get_where('stok_masuk',$id);
								$row=$q->num_rows();
								if($row>0){
									foreach ($q->result() as $dt) {
										$d['id']=$dt->id;
										$d['barang']=$dt->kode_barang;
										$d['supplier']=$dt->kode_supplier;
										$d['jumlah']=$dt->jumlah;
									}
								}else {
									$d['barang']='';
									$d['supplier']='';
									$d['jumlah']='';
								}
								echo json_encode($d);
					}else {
						  redirect('a_login/logout');
					}

				}

				public function cari_barang()
					{
						$query=$this->input->post('query');
						$output = '';
			      $q = $this->db->query("SELECT b.*,k.kategori FROM barang b LEFT JOIN kategori k ON k.kode_kategori=b.kode_kategori WHERE (kode_barang LIKE '%".$query."%') OR nama_barang LIKE '%".$query."%'");
						$row=$q->num_rows();
						$output = '<ul class="list-unstyled">';
			      if($row > 0)
			      {
								 foreach ($q->result() as $dt) {
  			                $output .= '<li><b>'.$dt->kode_barang.'<b> - '.$dt->nama_barang.' - '.$dt->kategori.'</li>';
								 }
			      }
			      else
			      {
			           $output .= '<li>Country Not Found</li>';
			      }
			      $output .= '</ul>';
			      echo $output;

					}

			public function simpan()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='a'){
						    date_default_timezone_set('Asia/Makassar');
								$id['id'] = $this->input->post('id');
								$dt['kode_barang'] = $this->input->post('kode_barang');
								$dt['kode_supplier'] = $this->input->post('supplier');
								$dt['jumlah'] = $this->input->post('jumlah');
								$dt['id_user'] = $this->session->userdata('id_user');
								$q=$this->db->get_where('stok_masuk',$id)->num_rows();
								if($q>0){
									$dt['w_update'] =date('Y-m-d H:i:s');
									$this->db->update('stok_masuk',$dt,$id);
									echo "Data Sukses DiUpdate";
								}else {
									$dt['w_insert'] =date('Y-m-d H:i:s');
									$this->db->insert('stok_masuk',$dt);
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
										$id['id'] = $this->input->post('id');
										$this->db->delete('stok_masuk',$id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('a_login/logout');
							}

						}

	}

	?>
