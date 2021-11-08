<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_home extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index()
	{
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login' && $level=='a'){
			$d['title'] ='Dashboard';
			$d['content']='a_dashboard';
			$this->load->view('a_home',$d);
		}
		elseif($cek=='login' && $level=='v') {
			$d['title'] ='Dashboard';
			$d['content']='dashboard-vendor';
			$this->load->view('a_home',$d);
		}
		else {
			$this->session->set_flashdata('f_error','Invalid Username or Password');
			redirect('a_login');
		}
	}

}

?>
