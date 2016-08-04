<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('role') <> 'admin')
		{
			redirect('login');
		}
	}

	public function index(){
		$d['title'] = 'Admin';
		$d['judul'] = 'System Test';
		$d['nama'] = $this->session->userdata('nama');
		$d['page'] = 'admin';



		$this->load->view('admin/home');
		$this->load->view('logout', $d);

	}
}
