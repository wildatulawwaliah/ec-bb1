<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_supplier extends CI_Model {

    public function all(){
      $q=$this->db->get('supplier');
      return $q;
    }

}
