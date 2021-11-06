<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class a_data_stok extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_stok');
    }

		public function index()
			{
				error_reporting(0);
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='a'){
						$d['title'] ='Data Stok';
						$d['content']='data_stok/view';
						$d['data']=$this->m_stok->all();
						$this->load->view('a_home',$d);
				}else {
					  $this->session->set_flashdata('f_error','Invalid Username or Password');
					  redirect('a_login/logout');
				}

			}


	}

	?>
