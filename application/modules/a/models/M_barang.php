<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_barang extends CI_Model {

    public function all(){
      $q=$this->db->select('b.*,k.kategori')->join('kategori k','k.kode_kategori=b.kode_kategori')->get('barang b');
      return $q;
    }







}
