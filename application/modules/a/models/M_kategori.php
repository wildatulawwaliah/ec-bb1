<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_kategori extends CI_Model {
  
    public function all($params = null){
      if (!is_null($params)) {
        return $this->db->get_where('kategori', ['id_user' => $params]);
      }
      $q=$this->db->get('kategori');
      return $q;
    }

}
