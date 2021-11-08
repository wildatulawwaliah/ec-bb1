<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Login*/
$route['a_login'] = 'a/a_login';
$route['a_login/cek_login'] = 'a/a_login/cek_login';
$route['a_login/logout'] = 'a/a_login/logout';
$route['registrasi'] = 'a/a_login/registrasi';
$route['reg-vendor'] = 'a/a_login/reg_vendor';
$route['change-status/(:num)'] = 'a/a_data_admin/change_status/$1';
/*End Login*/

/*Home*/
$route['a_home'] = 'a/a_home';
/*End Home*/

/*Data Admin*/
$route['a_data_pesanan'] = 'a/a_data_pesanan';
$route['a_data_pesanan/tambah'] = 'a/a_data_pesanan/tambah';
$route['a_data_pesanan/simpan'] = 'a/a_data_pesanan/simpan';
$route['a_data_pesanan/cari_detail'] = 'a/a_data_pesanan/cari_detail';
$route['a_data_pesanan/cari_pesanan'] = 'a/a_data_pesanan/cari_pesanan';
$route['a_data_pesanan/edit'] = 'a/a_data_pesanan/edit';
$route['a_data_pesanan/hapus'] = 'a/a_data_pesanan/hapus';
/*End Data Admin*/

/*Data Barang*/
$route['a_data_barang'] = 'a/a_data_barang';
$route['a_data_barang/add'] = 'a/a_data_barang/add';
$route['a_data_barang/simpan'] = 'a/a_data_barang/simpan';
$route['a_data_barang/cari_barang'] = 'a/a_data_barang/cari_barang';
$route['a_data_barang/edit'] = 'a/a_data_barang/edit';
$route['a_data_barang/hapus'] = 'a/a_data_barang/hapus';
$route['a_data_barang/hapus_gambar'] = 'a/a_data_barang/hapus_gambar';
/*End Data Barang*/

/*Data Kategori*/
$route['a_data_kategori'] = 'a/a_data_kategori';
$route['a_data_kategori/tambah'] = 'a/a_data_kategori/tambah';
$route['a_data_kategori/simpan'] = 'a/a_data_kategori/simpan';
$route['a_data_kategori/cari_kategori'] = 'a/a_data_kategori/cari_kategori';
$route['a_data_kategori/edit'] = 'a/a_data_kategori/edit';
$route['a_data_kategori/hapus'] = 'a/a_data_kategori/hapus';
/*End Data Kategori*/

/*Data Bank*/
$route['a_data_bank'] = 'a/a_data_bank';
$route['a_data_bank/tambah'] = 'a/a_data_bank/tambah';
$route['a_data_bank/simpan'] = 'a/a_data_bank/simpan';
$route['a_data_bank/cari_bank'] = 'a/a_data_bank/cari_bank';
$route['a_data_bank/edit'] = 'a/a_data_bank/edit';
$route['a_data_bank/hapus'] = 'a/a_data_bank/hapus';
/*End Data Bank*/

/*Data Supplier*/
$route['a_data_vendor'] = 'a/a_data_supplier';
$route['a_data_supplier/tambah'] = 'a/a_data_supplier/tambah';
$route['a_data_supplier/simpan'] = 'a/a_data_supplier/simpan';
$route['a_data_supplier/cari_supplier'] = 'a/a_data_supplier/cari_supplier';
$route['a_data_supplier/edit'] = 'a/a_data_supplier/edit';
$route['a_data_supplier/hapus'] = 'a/a_data_supplier/hapus';
/*End Data Supplier*/

/*Data Stok Awal*/
$route['a_data_stok_awal'] = 'a/a_data_stok_awal';
$route['a_data_stok_awal/add'] = 'a/a_data_stok_awal/add';
$route['a_data_stok_awal/simpan'] = 'a/a_data_stok_awal/simpan';
$route['a_data_stok_awal/cari_stok_awal'] = 'a/a_data_stok_awal/cari_stok_awal';
$route['a_data_stok_awal/edit'] = 'a/a_data_stok_awal/edit';
$route['a_data_stok_awal/hapus'] = 'a/a_data_stok_awal/hapus';
$route['a_data_stok_awal/hapus_gambar'] = 'a/a_data_stok_awal/hapus_gambar';
$route['a_data_stok_awal/publish'] = 'a/a_data_stok_awal/publish';
/*End Data Stok Awal*/

/*Data Stok Masuk*/
$route['a_data_stok_masuk'] = 'a/a_data_stok_masuk';
$route['a_data_stok_masuk/tambah'] = 'a/a_data_stok_masuk/tambah';
$route['a_data_stok_masuk/simpan'] = 'a/a_data_stok_masuk/simpan';
$route['a_data_stok_masuk/cari_stok'] = 'a/a_data_stok_masuk/cari_stok';
$route['a_data_stok_masuk/edit'] = 'a/a_data_stok_masuk/edit';
$route['a_data_stok_masuk/hapus'] = 'a/a_data_stok_masuk/hapus';
$route['a_data_stok_masuk/cari_barang'] = 'a/a_data_stok_masuk/cari_barang';
/*End Data Stok Masuk*/

/*Data Users*/
$route['a_data_users'] = 'a/a_data_users';
$route['a_data_users/tambah'] = 'a/a_data_users/tambah';
$route['a_data_users/simpan'] = 'a/a_data_users/simpan';
$route['a_data_users/simpan_password'] = 'a/a_data_users/simpan_password';
$route['a_data_users/cari_user'] = 'a/a_data_users/cari_user';
$route['a_data_users/edit'] = 'a/a_data_users/edit';
$route['a_data_users/hapus'] = 'a/a_data_users/hapus';
/*End Data Users*/

/*Data Admin*/
$route['a_data_admin'] = 'a/a_data_admin';
$route['a_data_admin/tambah'] = 'a/a_data_admin/tambah';
$route['a_data_admin/simpan'] = 'a/a_data_admin/simpan';
$route['a_data_admin/cari_admin'] = 'a/a_data_admin/cari_admin';
$route['a_data_admin/edit'] = 'a/a_data_admin/edit';
$route['a_data_admin/hapus'] = 'a/a_data_admin/hapus';
/*End Data Admin*/

/*Data Admin*/
$route['a_data_setting'] = 'a/a_data_setting';
$route['a_data_setting/simpan'] = 'a/a_data_setting/simpan';
$route['a_data_setting/reset_database'] = 'a/a_data_setting/reset_database';
/*End Data Admin*/

/*Data Stok*/
$route['a_data_stok'] = 'a/a_data_stok';
/*End Data Stok*/

/*Data Laporan*/
$route['a_laporan_stok'] = 'a/a_laporan_stok';
$route['a_laporan_penjualan'] = 'a/a_laporan_penjualan';
$route['a_laporan_penjualan/cetak'] = 'a/a_laporan_penjualan/cetak';

/*End Laporan*/
