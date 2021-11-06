<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	function __construct() {
        parent::__construct();
			  $this->load->database('default');
				$this->load->library('pdf');
    }

	public function index()
	{
		$status=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($status=='login' && $level=='u'){
			$id_account=$this->session->userdata('id_account');
			$id['id_account']=$id_account;
			if($status=='login'){$login='1';}else {$login='0';}
			$d['title']='Profile';
			$d['id_account']=$id_account;
			$data=$this->db->get_where('users_account',$id);
			foreach ($data->result() as $dt) {
				$d['username']=$dt->username;
				$d['nama_lengkap']=$dt->nama_lengkap;
				$d['email']=$dt->email;
				$d['alamat']=$dt->alamat;
				$d['telephone']=$dt->telephone;
			}
			$d['login']=$login;
			$d['content']='v_profile';
			$this->load->view('home',$d);
		}else {
			redirect('profile/sign_out');
		}

	}

	public function pembayaran()
	{
		$status=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($status=='login' && $level=='u'){
			$id_account=$this->session->userdata('id_account');
			if($status=='login'){$login='1';}else {$login='0';}
			$d['login']=$login;
			$d['title']='Pembayaran';
			$data=$this->db->query("SELECT * FROM pembelian WHERE id_account='$id_account'");
			$count=$data->num_rows();
			$d['data']=$data;
			$d['count']=$count;
			$d['content']='v_pembelian';
			$this->load->view('home',$d);
		}else {
			redirect('profile/sign_out');
		}
	}

	public function pemesanan()
	{
		$status=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($status=='login' && $level=='u'){
			$id_account=$this->session->userdata('id_account');
			if($status=='login'){$login='1';}else {$login='0';}
			$d['login']=$login;
			$d['title']='pemesanan';
			$data=$this->db->query("SELECT k.*,b.nama_barang,b.satuan,b.harga_jual FROM users_account_keranjang k LEFT JOIN barang b ON b.kode_barang=k.kode_barang WHERE k.id_account='$id_account'");
			$count=$data->num_rows();
			$d['data']=$data;
			$d['count']=$count;
			$d['content']='v_keranjang';
			$this->load->view('home',$d);
		}else {
			redirect('profile/sign_out');
		}
	}

	public function beli()
	{
		$status=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($status=='login' && $level=='u'){
			$id_account=$this->session->userdata('id_account');
			if($status=='login'){$login='1';}else {$login='0';}
			$d['login']=$login;
			$d['title']='Pembelian';
			$data=$this->db->query("SELECT k.*,b.nama_barang,b.satuan,b.harga_jual FROM users_account_keranjang k LEFT JOIN barang b ON b.kode_barang=k.kode_barang WHERE k.id_account='$id_account'");
			$count=$data->num_rows();
			$d['data']=$data;
			$d['count']=$count;
			$d['content']='v_beli';
			$this->load->view('home',$d);
		}else {
			redirect('profile/sign_out');
		}
	}

	public function beli_quick()
		{
				date_default_timezone_set('Asia/Makassar');
				$kode_barang=$this->input->post('kode_barang');
				$jumlah=$this->input->post('jumlah');
				$id_account=$this->session->userdata('id_account');

				$dt['id_account'] = $id_account;
				$dt['kode_barang'] = $kode_barang;
				$dt['jumlah'] = $jumlah;
				$dt['w_insert'] =date('Y-m-d H:i:s');

				$id['kode_barang']=$kode_barang;
				$id['id_account']=$id_account;
				$this->db->insert('users_account_keranjang',$dt);
				echo "1";

		}

	public function simpan_keranjang()
		{
				date_default_timezone_set('Asia/Makassar');
				$kode_barang=$this->input->post('kode_barang');
				$jumlah=$this->input->post('jumlah');
				$id_account=$this->session->userdata('id_account');

				$dt['id_account'] = $id_account;
				$dt['kode_barang'] = $kode_barang;
				$dt['jumlah'] = $jumlah;
				$dt['w_insert'] =date('Y-m-d H:i:s');

				$id['kode_barang']=$kode_barang;
				$id['id_account']=$id_account;
				$cek=$this->db->get_where('users_account_keranjang',$id)->num_rows();
				if($cek>0){
					$this->db->query("UPDATE users_account_keranjang SET jumlah=jumlah+$jumlah WHERE kode_barang='$kode_barang' AND id_account='$id_account'");
				}else {
					$this->db->insert('users_account_keranjang',$dt);
				}
				echo "1";

		}

		public function bayar()
			{
					date_default_timezone_set('Asia/Makassar');
					$tgl=date('Y-m-d');
					$id_account=$id_account=$this->session->userdata('id_account');
					$no_transaksi=$id_account.strtoupper(uniqid());
					$contact=$this->input->post('contact');
					$alamat=$this->input->post('alamat');
					$total_bayar=$this->input->post('total_bayar');

					 $files = $_FILES;
					 $config['upload_path']="assets/img/bukti_bayar/";
					 $config['allowed_types'] = 'gif|jpg|png|jpeg';
					 $config['max_size'] = '2000000';
					 $config['remove_spaces'] = false;
					 $config['overwrite'] = true;
					 $config['max_width'] = '';
					 $config['max_height'] = '';
					 $this->load->library('upload',$config);
					 $this->upload->initialize($config);
					 $this->upload->do_upload();

					 $dt['no_transaksi'] = $no_transaksi;
					 $dt['tgl'] = $tgl;
					 $dt['id_account'] = $id_account;
					 $dt['alamat_tujuan'] = $alamat;
					 $dt['contact_alt'] = $contact;
					 $dt['img_pembayaran'] = $files['userfile']['name'];
					 $dt['total_bayar'] = $total_bayar;
					 $dt['w_insert'] =date('Y-m-d H:i:s');

					 $keranjang=$this->db->where('id_account',$id_account)->get('users_account_keranjang');
					 foreach ($keranjang->result() as $k) {
						 $harga=$this->db->select('harga_jual')->where('kode_barang',$k->kode_barang)->get('barang')->row()->harga_jual;
						 $jumlah=$k->jumlah;
						 $total=$harga*$jumlah;
						 $pd['no_transaksi']=$no_transaksi;
						 $pd['kode_barang']=$k->kode_barang;
						 $pd['jumlah']=$jumlah;
						 $pd['total']=$total;
						 $this->db->insert('pembelian_detail',$pd);
					 }

					 $this->db->delete('users_account_keranjang',array('id_account' => $id_account ));
					 $this->db->insert('pembelian',$dt);
					 echo "1";

			}

		public function hapus_keranjang()
			{
				$cek=$this->session->userdata('status');
				if($cek=='login'){
							$id['id'] = $this->input->post('id');
							$this->db->delete('users_account_keranjang',$id);
							echo "1";
				}else {
						redirect('profile/sign_out');
				}

			}

			public function update_data()
				{
								date_default_timezone_set('Asia/Makassar');
								$id['id_account'] = $this->input->post('id_account');
								$dt['nama_lengkap'] = $this->input->post('nama_lengkap');
								$dt['email'] = $this->input->post('email');
								$dt['alamat'] = $this->input->post('alamat');
								$dt['telephone'] = $this->input->post('telephone');
								$dt['w_update'] =date('Y-m-d H:i:s');
								$this->db->update('users_account',$dt,$id);
								echo "Data Sukses DiUpdate!";

				}

		public function update_password()
		{
						date_default_timezone_set('Asia/Makassar');
						$id['id_account'] = $this->input->post('id_account_password');
						$dt['password'] = md5($this->input->post('password'));
						$dt['w_update'] =date('Y-m-d H:i:s');
						$this->db->update('users_account',$dt,$id);
						echo "Password Sukses DiUpdate!";

		}

		public function cetak_pembelian(){
			$no_transaksi=$this->input->get('no_transaksi');
			$nama_toko=$this->db->select('nama_toko')->where('id','system')->get('setting')->row()->nama_toko;
			$motto=$this->db->select('motto')->where('id','system')->get('setting')->row()->motto;
			$pdf = new FPDF('p','mm','A4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',12);
			// mencetak string
			$pdf->Cell(190,5,$nama_toko,0,1,'C');
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(190,5,$motto,0,1,'C');
			$pdf->Cell(10,5,'',0,1);
			$pdf->SetFont('Arial','',9);

			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(7,3,'',0,1);
			$pembelian=$this->db->query("SELECT * FROM pembelian WHERE no_transaksi='$no_transaksi'");
			foreach ($pembelian->result() as $dt) {
				$total_bayar=$dt->total_bayar;
				$pdf->Cell(190,5,'No. Transaksi: '.$dt->no_transaksi,0,1,'L');
				$pdf->Cell(190,5,'Alamat Tujuan: '.$dt->alamat_tujuan,0,1,'L');
				$pdf->Cell(190,5,'Contact Alt.: '.$dt->contact_alt,0,1,'L');
				$pdf->Cell(190,5,'Tgl: '.datetime($dt->w_insert),0,1,'L');
			}
			$pdf->Cell(5,3,'',0,1);

			$pdf->SetFont('Arial','B',9);
			$pdf->Cell(25,6,'Kode Barang',1,0,'C');
			$pdf->Cell(60,6,'Nama Barang',1,0,'C');
			$pdf->Cell(40,6,'Harga',1,0,'C');
			$pdf->Cell(20,6,'Jumlah',1,0,'C');
			$pdf->Cell(40,6,'Total',1,1,'C');

			$pdf->SetFont('Arial','',9);

			$detail_pembelian = $this->db->query("SELECT pd.*,b.nama_barang,b.harga_jual FROM pembelian_detail pd JOIN barang b ON b.kode_barang=pd.kode_barang WHERE pd.no_transaksi='$no_transaksi'");
			foreach ($detail_pembelian->result() as $pd){
					$pdf->Cell(25,6,$pd->kode_barang,1,0,'C');
					$pdf->Cell(60,6,$pd->nama_barang,1,0);
					$pdf->Cell(40,6,'Rp. '.toRp($pd->harga_jual),1,0);
					$pdf->Cell(20,6,$pd->jumlah,1,0,'C');
					$pdf->Cell(40,6,'Rp. '.toRp($pd->total),1,1,'C');
			}
			$pdf->Cell(10,3,'',0,1);
			$pdf->Cell(190,5,'Total Bayar : Rp.'.toRp($total_bayar),0,1,'L');
			$pdf->Output("BuktiTransaksi-".date('d-m-Y').".pdf","I");
		}

		public function sign_out()
		{
			$this->session->sess_destroy();
			redirect('sign_in');
		}

}
