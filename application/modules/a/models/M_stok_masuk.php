<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_stok_masuk extends CI_Model {

    public function all(){
      $q=$this->db->select('b.*,k.kategori,sm.w_insert,sm.jumlah,sm.id')
      ->join('barang b','b.kode_barang=sm.kode_barang')
      ->join('kategori k','k.kode_kategori=b.kode_kategori')
      ->join('supplier s','s.kode_supplier=sm.kode_supplier')
      ->get('stok_masuk sm');
      return $q;
    }







}
