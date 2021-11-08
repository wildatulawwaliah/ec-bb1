<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_supplier extends CI_Model {

    public function all(){
      return $this->db->from('supplier')->join('users', 'supplier.id_user = users.id_user and users.aktif = 1')->get();
      // $this->db->get('supplier');
      
      // return $q;
    }

}
