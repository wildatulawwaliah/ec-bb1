<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
        parent::__construct();
			  $this->load->database('default');
    }

	public function index()
	{
		$status=$this->session->userdata('status');
		if($status=='login'){$login='1';}else {$login='0';}
		$d['login']=$login;
		$d['content']='v_home';
		$this->load->view('home',$d);
	}

	public function load_barang(){
		$nama_barang=$this->input->post('nama_barang');
		$kategori=$this->input->post('kategori');
		$output='';
		$q=$this->db->query("SELECT b.*,s.stok FROM barang b LEFT JOIN stok s ON s.kode_barang=b.kode_barang WHERE b.nama_barang LIKE '%$nama_barang%' AND b.kode_kategori LIKE '%$kategori%'");
		foreach ($q->result() as $db) {
			$kategori=$this->db->select('kategori')->where('kode_kategori',$db->kode_kategori)->get('kategori')->row()->kategori;
			$gambar=$this->db->select('image')->where('kode_barang',$db->kode_barang)->get('barang_image')->row()->image;
			if(empty($db->stok)){$stok=0;}else {$stok=$db->stok;}
			$output.='<div class="col-lg-4 col-sm-6 mb-5" >';
			$output.='<div class="barang-wrap">';
			$output.='<a class="barang-box" href="'.base_url().'home/detail/'.$db->kode_barang.'">';
			$output.='<div class="barang-kategori"><h5>'.$kategori.'</h5></div>';
			$output.='<img class="barang-img" src="'.base_url().'assets/img/barang/'.$gambar.'" alt="'.$db->nama_barang.'">';
			$output.='<div class="barang-desc">';
			$output.='<h4>'.$db->nama_barang.'</h4><h5>Rp.'.toRp($db->harga_jual).'</h5><p>Stok: '.$stok.' '.$db->satuan.'</p>';
			$output.='</div></a></div></div>';
		}
		echo $output;
	}

	public function detail(){
		$status=$this->session->userdata('status');
		if($status=='login'){$login='1';}else {$login='0';}
		$d['login']=$login;
		$kode_barang=$this->uri->segment(3);
		$q=$this->db->query("SELECT b.*,s.stok FROM barang b LEFT JOIN stok s ON s.kode_barang=b.kode_barang WHERE b.kode_barang='$kode_barang'");
		foreach ($q->result() as $db) {
			$kategori=$this->db->select('kategori')->where('kode_kategori',$db->kode_kategori)->get('kategori')->row()->kategori;
			$gambar=$this->db->select('image')->where('kode_barang',$db->kode_barang)->get('barang_image')->row()->image;
			if(empty($db->stok)){$stok=0;}else {$stok=$db->stok;}
			$d['kode_barang']=$db->kode_barang;
			$d['gambar']=$gambar;
			$d['kategori']=$kategori;
			$d['nama_barang']=$db->nama_barang;
			$d['stok']=$stok;
			$d['satuan']=$db->satuan;
			$d['harga']=$db->harga_jual;
			$d['deskripsi']=$db->deskripsi;
		}
		$d['content']='v_detail_barang';
		$this->load->view('home',$d);


	}

}
