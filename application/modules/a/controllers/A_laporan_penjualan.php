<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class a_laporan_penjualan extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->library('pdf');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='a'){
						$d['title'] ='Laporan Penjualan';
						$d['content']='laporan/v_laporan_penjualan';
						$this->load->view('a_home',$d);
				}else {
					  $this->session->set_flashdata('f_error','Invalid Username or Password');
					  redirect('a_login/logout');
				}

			}

		public function cetak()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='a'){

					$tgl_awal=tosql($this->input->get('tgl_awal'));
					$tgl_akhir=tosql($this->input->get('tgl_akhir'));
					$nama_toko=$this->db->select('nama_toko')->where('id','system')->get('setting')->row()->nama_toko;
					$motto=$this->db->select('motto')->where('id','system')->get('setting')->row()->motto;
					$pdf = new FPDF('p','mm','A4');
					// membuat halaman baru
					$pdf->AddPage();
					// setting jenis font yang akan digunakan
					$pdf->SetFont('Arial','B',10);
					// mencetak string
					$pdf->Cell(190,7,$nama_toko,0,1,'C');
					$pdf->SetFont('Arial','B',9);
					$pdf->Cell(190,7,$motto,0,1,'C');
					$pdf->Cell(10,3,'',0,1);
					$pdf->SetFont('Arial','B',8);
					$pdf->Cell(190,7,'Laporan Penjualan per '.todate($tgl_awal).' s/d '.todate($tgl_akhir),0,1,'C');

					// Memberikan space kebawah agar tidak terlalu rapat
					$pdf->Cell(10,3,'',0,1);

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(25,6,'No. Transaksi',1,0,'C');
					$pdf->Cell(20,6,'Tgl',1,0,'C');
					$pdf->Cell(40,6,'Customer',1,0,'C');
					$pdf->Cell(20,6,'Kontak',1,0,'C');
					$pdf->Cell(20,6,'Total Bayar',1,0,'C');
					$pdf->Cell(25,6,'Status',1,0,'C');
					$pdf->Cell(40,6,'Keterangan',1,1,'C');

					$pdf->SetFont('Arial','',6);

					$penjualan = $this->db->select('*')->where("(tgl BETWEEN '$tgl_awal' AND '$tgl_akhir')")->get('pembelian')->result();
					foreach ($penjualan as $dt){
						  $nama_lengkap=$this->db->select('nama_lengkap')->where('id_account',$dt->id_account)->get('users_account')->row()->nama_lengkap;
							$pdf->Cell(25,6,$dt->no_transaksi,1,0,'C');
							$pdf->Cell(20,6,$dt->tgl,1,0,'C');
							$pdf->Cell(40,6,$nama_lengkap,1,0);
							$pdf->Cell(20,6,$dt->contact_alt,1,0,'C');
							$pdf->Cell(20,6,'Rp. '.toRp($dt->total_bayar),1,0,'L');
							$pdf->Cell(25,6,$dt->status,1,0,'C');
							$pdf->Cell(40,6,$dt->keterangan,1,1,'C');
					}

					$pdf->Output("LaporanPenjualan-".date('d-m-Y').".pdf","I");
				}else {
					  $this->session->set_flashdata('f_error','Invalid Username or Password');
					  redirect('a_login/logout');
				}

			}


	}

	?>
