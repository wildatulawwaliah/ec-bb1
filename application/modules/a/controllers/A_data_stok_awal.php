<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class a_data_stok_awal extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('m_stok_awal');
	}

	public function index()
	{
				// error_reporting(0);
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login' && $level=='a'){
			$d['title'] ='Data Stok Awal';
			$d['content']='data_stok_awal/view';
			$d['data']=$this->m_stok_awal->all();
			$this->load->view('a_home',$d);
		}else {
			$this->session->set_flashdata('f_error','Invalid Username or Password');
			redirect('a_login/logout');
		}

	}

	public function create_id(){
		$row=$this->db->get('barang_awal')->num_rows();
		if($row>0){
			$idba=$this->db->select_max('id_ba')->get('barang_awal')->row()->id_ba;
			$id=substr($idba,2);
			$id='BA'.str_pad(($id+1), 5, '0', STR_PAD_LEFT);
		}else {
			$id='BA00001';
		}
		return $id;
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
			$d['title']='Tambah Data Stok Awal';
			$d['id_ba']=$this->create_id();
			$d['content']='data_stok_awal/add';
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
			$d['title']='Edit Data Stok Awal';
			$d['id_ba']=$this->input->get('id_ba');
			$d['content']='data_stok_awal/edit';
			$this->load->view('a_home',$d);
		}else {
			redirect('a_login/logout');
		}

	}


	public function cari_stok_awal()
	{
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login' && $level=='a'){
			$id['id_ba'] = $this->input->post('id_ba');
			$q=$this->db->get_where('barang_awal',$id);
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

			$q=$this->db->get_where('stok_awal',$id);
			$row=$q->num_rows();
			if($row>0){
				foreach ($q->result() as $dt) {
					$d['supplier']=$dt->kode_supplier;
					$d['stok']=$dt->stok_awal;
				}
			}else {
				$d['supplier']='';
				$d['stok']='';
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
			error_reporting(0);
			$id_ba=$this->input->post('id_ba');
			$id['id_ba'] = $id_ba;
			$dt['id_ba'] = $id_ba;
			$dt['nama_barang'] = $this->input->post('nama_barang');
			$dt['kode_kategori'] = $this->input->post('kategori');
			$dt['harga_pokok'] = $this->input->post('harga_pokok');
			$dt['harga_jual'] = $this->input->post('harga_jual');
			$dt['diskon'] = $this->input->post('diskon');
			$dt['satuan'] = $this->input->post('satuan');
			$dt['deskripsi'] = $this->input->post('deskripsi');

			$dsa['id_ba'] = $id_ba;
			$dsa['stok_awal'] = $this->input->post('stok');
			$dsa['kode_supplier'] = $this->input->post('supplier');
			$dsa['id_user'] = $this->session->userdata('id_user');


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

			$q=$this->db->get_where('barang_awal',$id)->num_rows();
			if($q>0){
				if($filename!='' ){
					$this->db->delete('barang_image_awal',$id);
					$filename1 = explode(',',$filename);
					foreach($filename1 as $file){
						$file_data = array(
							'image' => $file,
							'id_ba' => $id_ba
						);
						$this->db->insert('barang_image_awal', $file_data);
					}
				}
				$dsa['w_update'] = date('Y-m-d H:i:s');
				$this->db->update('barang_awal',$dt,$id);
				$this->db->update('stok_awal',$dsa,$id);
				echo "Data Sukses DiUpdate";
			}else {
				if($filename!='' ){
					$filename1 = explode(',',$filename);
					foreach($filename1 as $file){
						$file_data = array(
							'image' => $file,
							'id_ba' => $id_ba
						);
						$this->db->insert('barang_image_awal', $file_data);
					}
				}
				$dsa['w_insert'] = date('Y-m-d H:i:s');
				$this->db->insert('barang_awal',$dt);
				$this->db->insert('stok_awal',$dsa);
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
			$id['id_ba'] = $this->input->post('id_ba');
			$qg=$this->db->select('image')->get_where('barang_image_awal',$id);
			foreach ($qg->result() as $dg) {
				$file='assets/img/barang/'.$dg->image;
				unlink($file);
			}
			$this->db->delete('barang_awal',$id);
			$this->db->delete('barang_image_awal',$id);
			$this->db->delete('stok_awal',$id);
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
			$gambar=$this->db->select('image')->get_where('barang_image_awal',$id)->row()->image;
			$file='assets/img/barang/'.$gambar;
			unlink($file);
			$this->db->delete('barang_image_awal',$id);
			echo "Data Sukses Dihapus";
		}else {
			redirect('a_login/logout');
		}

	}

	public function publish()
	{
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login' && $level=='a'){
			$id_user=$this->session->userdata('id_user');
			$q_sa=$this->db->select('*')->get_where('stok_awal', ['publish' => "0"]);
			$row=$q_sa->num_rows();
			if($row>0){
				foreach ($q_sa->result() as $dsa) {
					$kode_barang=$this->create_kode();
					$this->db->query("INSERT INTO barang(kode_barang,nama_barang,kode_kategori,satuan,harga_pokok,harga_jual,diskon) SELECT '$kode_barang',nama_barang,kode_kategori,satuan,harga_pokok,harga_jual,diskon FROM barang_awal WHERE id_ba='$dsa->id_ba'");
					$this->db->query("INSERT INTO barang_image(kode_barang,image) SELECT '$kode_barang',image FROM barang_image_awal WHERE id_ba='$dsa->id_ba'");
					$this->db->query("INSERT INTO stok(kode_barang,stok) SELECT '$kode_barang',stok_awal FROM stok_awal WHERE id_ba='$dsa->id_ba'");
					$this->db->query("UPDATE stok_awal SET kode_barang='$kode_barang' WHERE id_ba='$dsa->id_ba'");
				}
				$this->db->query("UPDATE stok_awal SET publish='1',publish_by='$id_user' WHERE id_ba is NOT NULL");
				echo "Data Stok Awal Sukses Terpublish";
			}else{
				echo "Tidak ada data Stok Awal";
			}
		}else {
			redirect('a_login/logout');
		}

	}

}

?>
