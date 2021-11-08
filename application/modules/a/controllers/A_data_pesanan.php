<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_data_pesanan extends CI_Controller {
	function __construct() {
        parent::__construct();
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='a'){
						$d['title'] ='Data Pesanan';
						$d['content']='data_pesanan/view';
						$d['data']=$this->db->get('pembelian');
						$this->load->view('a_home',$d);
				}
				elseif( $cek=='login' && $level=='v') {
					$d['title'] ='Data Pesanan';
					$d['content']='data_pesanan/view';
					$this->db->from('pembelian');
					$this->db->join('pembelian_detail', 'pembelian_detail.no_transaksi = pembelian.no_transaksi');
					$this->db->join('barang', 'pembelian_detail.kode_barang = barang.kode_barang');
					$this->db->join('kategori', 'kategori.kode_kategori = barang.kode_kategori');
					$this->db->where(['kategori.id_user' => $this->session->userdata('id_user')]);
					$this->db->group_by('pembelian.no_transaksi');
					$d['data'] = $this->db->get();
					$this->load->view('a_home',$d);
				}
				else {
					  $this->session->set_flashdata('f_error','Invalid Username or Password');
					  redirect('a_login/logout');
				}

			}

			public function cari_detail()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='a'){
								$no_transaksi=$this->input->post('no_transaksi');
								$id['no_transaksi'] = $no_transaksi;

								$qp=$this->db->get_where('pembelian',$id);
								$rowp=$qp->num_rows();
								if($rowp>0){
									$op='';
									foreach ($qp->result() as $dp) {
										$op.='<table>';
						        $op.='<tr><td>No. Transaksi</td><td>&nbsp;&nbsp; : &nbsp;&nbsp;  </td><td>'.$dp->no_transaksi.'</td></tr>';
										$op.='<tr><td>Alamat Tujuan</td><td>&nbsp;&nbsp; : &nbsp;&nbsp;  </td><td>'.$dp->alamat_tujuan.'</td></tr>';
										$op.='<tr><td>Contact Alt.</td><td>&nbsp;&nbsp; : &nbsp;&nbsp;  </td><td>'.$dp->contact_alt.'</td></tr>';
										$op.='<tr><td>Bukti Pembayaran</td><td>&nbsp;&nbsp; : &nbsp;&nbsp;  </td><td><img src="'.base_url().'assets/img/bukti_bayar/'.$dp->img_pembayaran.'" height="100px" width="100px"></img></td></tr>';
						        $op.='</table>';

										$qpd=$this->db->query("SELECT pd.*,b.nama_barang,b.harga_jual,b.satuan FROM pembelian_detail pd JOIN barang b ON b.kode_barang=pd.kode_barang WHERE pd.no_transaksi='$no_transaksi'");
										$op.='<br><table id="table_barang" class="table table-stripedtable-bordered">
											<thead>
												<tr>
													<th>No</th>
													<th>Kode Barang</th>
													<th>Nama Barang</th>
													<th>Harga Jual</th>
													<th>Jumlah</th>
													<th>Satuan</th>
													<th>Total</th>
												</tr>
											</thead>';
									 $op.='<tbody>';
									 $i=1;
									 foreach ($qpd->result() as $dpd) {
										$op.= '<tr>';
	 		              $op.= '<td class="center">'.$i++.'</td>';
	 		              $op.= '<td class="center">'.$dpd->kode_barang.'</td>';
	 		              $op.= '<td class="center">'.$dpd->nama_barang.'</td>';
	 		              $op.= '<td class="center">Rp. '.toRp($dpd->harga_jual).'</td>';
	 		              $op.= '<td class="center">'.$dpd->jumlah.'</td>';
										$op.= '<td class="center">'.$dpd->satuan.'</td>';
	 		              $op.= '<td class="center">Rp. '.toRp($dpd->total).'</td>';
	 		           	  $op.= '</tr>';

									 }
									 $op.='</tbody></table>';
									}
								}else {
									$op='';
								}
								echo json_encode(array('pembelian' => $op));
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
								$status=$this->input->post('status');
								$no_transaksi=$this->input->post('no_transaksi');
								$id_user=$this->session->userdata('id_user');
								$id['no_transaksi'] =$no_transaksi;
								$dt['status'] = $status;
								$dt['keterangan'] = $this->input->post('keterangan');
								$dt['id_user'] = $id_user;
								$dt['w_update'] =date('Y-m-d H:i:s');

								$q=$this->db->where('no_transaksi',$no_transaksi)->get('pembelian_detail');
								if($status=='Dikirim'){
									foreach ($q->result() as $d) {
										$this->db->query("UPDATE stok SET stok=stok-$d->jumlah WHERE kode_barang='$d->kode_barang'");
									}
								}else {
									foreach ($q->result() as $d) {
										$this->db->query("UPDATE stok SET stok=stok+$d->jumlah WHERE kode_barang='$d->kode_barang'");
									}
								}

								$this->db->update('pembelian',$dt,$id);
								echo "Data Sukses DiUpdate";
					}else {
						  redirect('a_login/logout');
					}

				}

	}

	?>
