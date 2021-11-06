<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_kategori extends CI_Model {
  
    public function all(){
      $q=$this->db->get('kategori');
      return $q;
    }

}
