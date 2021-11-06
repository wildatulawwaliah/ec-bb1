<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_bank extends CI_Model {

    public function all(){
      $q=$this->db->get('bank');
      return $q;
    }

}
