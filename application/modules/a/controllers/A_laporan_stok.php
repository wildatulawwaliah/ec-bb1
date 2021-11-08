<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class a_laporan_stok extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_stok');
				$this->load->library('pdf');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && ($level=='a' || $level == 'v')) {
					$nama_toko=$this->db->select('nama_toko')->where('id','system')->get('setting')->row()->nama_toko;
					$motto=$this->db->select('motto')->where('id','system')->get('setting')->row()->motto;
					$pdf = new FPDF('p','mm','A4');
					// membuat halaman baru
					$pdf->AddPage();
					// setting jenis font yang akan digunakan
					$pdf->SetFont('Arial','B',16);
					// mencetak string
					$pdf->Cell(190,7,$nama_toko,0,1,'C');
					$pdf->SetFont('Arial','B',13);
					$pdf->Cell(190,7,$motto,0,1,'C');
					$pdf->Cell(10,7,'',0,1);
					$pdf->SetFont('Arial','B',12);
					$pdf->Cell(190,7,'Laporan Stok Barang per '.date('d-m-Y'),0,1,'C');

					// Memberikan space kebawah agar tidak terlalu rapat
					$pdf->Cell(10,3,'',0,1);

					$pdf->SetFont('Arial','B',10);
					$pdf->Cell(25,6,'Kode',1,0,'C');
					$pdf->Cell(80,6,'Nama Barang',1,0,'C');
					$pdf->Cell(40,6,'Kategori',1,0,'C');
					$pdf->Cell(20,6,'Satuan',1,0,'C');
					$pdf->Cell(20,6,'Stok',1,1,'C');

					$pdf->SetFont('Arial','',10);

					$stok = $this->m_stok->all($level == 'v' ? $this->session->userdata('id_user') : NULL)->result();
					foreach ($stok as $dt){
							$pdf->Cell(25,6,$dt->kode_barang,1,0,'C');
							$pdf->Cell(80,6,$dt->nama_barang,1,0);
							$pdf->Cell(40,6,$dt->kategori,1,0);
							$pdf->Cell(20,6,$dt->satuan,1,0,'C');
							$pdf->Cell(20,6,$dt->stok,1,1,'C');
					}

					$pdf->Output("LaporanStok-".date('d-m-Y').".pdf","I");
				}else {
					  $this->session->set_flashdata('f_error','Invalid Username or Password');
					  redirect('a_login/logout');
				}

			}


	}

	?>
