<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_data extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function jumlah_baris($table){
      $row=$this->db->get($table)->num_rows();
      return $row;
    }







}
