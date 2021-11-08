<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_barang extends CI_Model {

    public function all($params = null){
      $this->db->select('b.*,k.kategori')
      ->join('kategori k','k.kode_kategori=b.kode_kategori');
      if (!is_null($params)) {
        $this->db->where(['k.id_user' => $params]);
      }
      return $this->db->get('barang b');
    }







}
