<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_stok extends CI_Model {

    public function all(){
      $q=$this->db->select('b.*,k.kategori,sa.stok')
      ->join('barang b','b.kode_barang=sa.kode_barang')
      ->join('kategori k','k.kode_kategori=b.kode_kategori')
      ->get('stok sa');
      return $q;
    }







}
