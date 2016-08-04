<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller{
	public function index(){
		$d['title'] = 'Login System';
		$d['judul'] = 'Test';
		$this->load->view('home', $d);
	}

	function masuk()
	{
		$nip = $this->input->post('nip');
		$pass = md5($this->input->post('pass'));

		$cek = $this->model_login->cek($nip, $pass);
		if($cek->num_rows() == 1)
		{
			foreach($cek->result() as $data){
				$sess_data['id'] = $data->id;
				$sess_data['nip'] = $data->nip;
				$sess_data['nama'] = $data->nama;
				$sess_data['foto'] = $data->foto;
				$sess_data['role'] = $data->role;
				$this->session->set_userdata($sess_data);
			}

			if($this->session->userdata('role') == 'super-user')
			{
				redirect('super');
			}
			elseif($this->session->userdata('role') == 'admin')
			{
				redirect('admin');
			}
			elseif($this->session->userdata('role') == 'user')
			{
				redirect('user');
			}
		}
		else
		{
			$this->session->set_flashdata('pesan', 'Maaf, kombinasi username dengan password salah.');
			redirect('login');
		}
	}

	function keluar()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
