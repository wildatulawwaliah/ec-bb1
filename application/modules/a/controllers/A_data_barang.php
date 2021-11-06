<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class a_data_barang extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_barang');
    }

		public function index()
			{
				error_reporting(0);
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='a'){
						$d['title'] ='Data Produk';
						$d['content']='data_barang/view';
						$d['data']=$this->m_barang->all();
						$this->load->view('a_home',$d);
				}else {
					  $this->session->set_flashdata('f_error','Invalid Username or Password');
					  redirect('a_login/logout');
				}

			}


			public function create_kode(){
				$row=$this->db->get('barang')->num_rows();
				if($row>0){
					$kodebarang=$this->db->select_max('kode_barang')->get('barang')->row()->kode_barang;
					$kode=substr($kodebarang,2);
					$kode='B'.str_pad(($kode+1), 5, '0', STR_PAD_LEFT);
				}else {
					$kode='B00001';
				}
				return $kode;
			}

			public function add()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='a'){
							$d['title']='Tambah Barang';
							$d['kode_barang']=$this->create_kode();
							$d['content']='data_barang/add';
							$this->load->view('a_home',$d);
					}else {
							redirect('a_login/logout');
					}

				}

				public function edit()
					{
						$cek=$this->session->userdata('status');
						$level=$this->session->userdata('level');
						if($cek=='login' && $level=='a'){
								$d['title']='Edit Barang';
								$d['kode_barang']=$this->input->get('kode_barang');
								$d['content']='data_barang/edit';
								$this->load->view('a_home',$d);
						}else {
								redirect('a_login/logout');
						}

					}

			public function cari_barang()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='a'){
								$id['kode_barang'] = $this->input->post('kode');
								$q=$this->db->get_where('barang',$id);
								$row=$q->num_rows();
								if($row>0){
									foreach ($q->result() as $dt) {
										$d['nama_barang']=$dt->nama_barang;
										$d['kategori']=$dt->kode_kategori;
										$d['harga_jual']=$dt->harga_jual;
										$d['harga_pokok']=$dt->harga_pokok;
										$d['diskon']=$dt->diskon;
										$d['satuan']=$dt->satuan;
										$d['deskripsi']=$dt->deskripsi;
									}
								}else {
									$d['nama_barang']='';
									$d['kategori']='';
									$d['harga_jual']='';
									$d['harga_pokok']='';
									$d['diskon']='';
									$d['satuan']='';
									$d['deskripsi']='';
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
						    error_reporting(0);
								$kode_barang=$this->input->post('kode_barang');
								$id['kode_barang'] = $kode_barang;
								$dt['kode_barang'] = $kode_barang;
								$dt['nama_barang'] = $this->input->post('nama_barang');
								$dt['kode_kategori'] = $this->input->post('kategori');
								$dt['harga_pokok'] = $this->input->post('harga_pokok');
								$dt['harga_jual'] = $this->input->post('harga_jual');
								$dt['diskon'] = $this->input->post('diskon');
								$dt['satuan'] = $this->input->post('satuan');
								$dt['deskripsi'] = $this->input->post('deskripsi');

								$files = $_FILES;
	              $count = count($_FILES['userfile']['name']);
	              for($i=0; $i<$count; $i++)
	                {
	                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
	                $config['upload_path'] = 'assets/img/barang/';
	                $config['allowed_types'] = 'gif|jpg|png|jpeg';
	                $config['max_size'] = '2000000';
	                $config['remove_spaces'] = false;
	                $config['overwrite'] = true;
	                $config['max_width'] = '';
	                $config['max_height'] = '';
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                $this->upload->do_upload();
	                $filename = $_FILES['userfile']['name'];
	                $images[] = $filename;
	                }


								$filename = implode(',',$images);

								$q=$this->db->get_where('barang',$id)->num_rows();
								if($q>0){
									if($filename!='' ){
									$this->db->delete('barang_image',$id);
									$filename1 = explode(',',$filename);
									foreach($filename1 as $file){
									$file_data = array(
									'image' => $file,
									'kode_barang' => $kode_barang
									);
									$this->db->insert('barang_image', $file_data);
									}
									}
									$this->db->update('barang',$dt,$id);
									echo "Data Sukses DiUpdate";
								}else {
									if($filename!='' ){
									$filename1 = explode(',',$filename);
									foreach($filename1 as $file){
									$file_data = array(
									'image' => $file,
									'kode_barang' => $kode_barang
									);
									$this->db->insert('barang_image', $file_data);
									}
									}
									$this->db->insert('barang',$dt);
									$ds['kode_barang'] = $kode_barang;
									$this->db->insert('stok',$ds);
									echo "Data Sukses DiSimpan";
								}
					}else {
						  redirect('a_login/logout');
					}

				}


					public function hapus()
						{
							error_reporting(0);
							$cek=$this->session->userdata('status');
							$level=$this->session->userdata('level');
							if($cek=='login' && $level=='a'){
										$id['kode_barang'] = $this->input->post('kode');
										$qg=$this->db->select('image')->get_where('barang_image',$id);
										foreach ($qg->result() as $dg) {
											$file='assets/img/barang/'.$dg->image;
											unlink($file);
										}
										$this->db->delete('barang',$id);
										$this->db->delete('barang_image',$id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('a_login/logout');
							}

						}


						public function hapus_gambar()
							{
								error_reporting(0);
								$cek=$this->session->userdata('status');
								$level=$this->session->userdata('level');
								if($cek=='login' && $level=='a'){
											$id['id'] = $this->input->post('id');
											$gambar=$this->db->select('image')->get_where('barang_image',$id)->row()->image;
											$file='assets/img/barang/'.$gambar;
											unlink($file);
											$this->db->delete('barang_image',$id);
											echo "Data Sukses Dihapus";
								}else {
									  redirect('a_login/logout');
								}

							}

	}

	?>
