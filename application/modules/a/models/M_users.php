<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_users extends CI_Model {

    public function all(){
      $q=$this->db->get('users_account');
      return $q;
    }

}
