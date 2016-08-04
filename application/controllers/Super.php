<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super extends CI_Controller{
	function __construct(){

		parent::__construct();
		$this->load->library('form_validation');
		  $this->load->model('model_item_list');

		if($this->session->userdata('role') <> 'super-user')

		{
			redirect('login');
		}

	}

	public function index(){


		$d['nama'] = $this->session->userdata('nama');
		$d['foto'] = $this->session->userdata('foto');
		$d['page'] = 'super';
		$this->load->view('super/atas',$d);
		$this->load->view('super/home',$d);
		//$this->load->view('logout', $d);
	}
	public function item_input()
	{
		//$this->load->database();
		$this->load->model('model_item_list');

		$kode['kode'] = $this->model_item_list->buat_kode();
		$d['nama'] = $this->session->userdata('nama');
		$d['foto'] = $this->session->userdata('foto');
		$d['page'] = 'super';
		$d['dept']= $this->model_item_list->dept();
			$d['vendor']= $this->model_item_list->vendor();
	//$dept=$this->model_item_list->dept();
		$this->load->view('super/atas',$d);
		$this->load->view('super/home',$d);
		$this->load->view('super/item_input',$kode,$d);


	}
	public function item_list($offset=0)
	{



		$this->load->model('model_item_list');
		$jml = $this->db->get('m_produk');

			$pencarian = $this->input->post('pencarian');
			$config['base_url'] = base_url().'index.php/super/item_list/';

			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = 10; /*Jumlah data yang dipanggil perhalaman*/
			$config['uri_segment'] = 3;	/*data selanjutnya di parse diurisegmen 3*/

			/*Class bootstrap pagination yang digunakan*/
			$config['full_tag_open'] = "<div class='pagination pagination-centered'>";
    		$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='readonly'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

			$this->pagination->initialize($config);

			$data['halaman'] = $this->pagination->create_links();
			/*membuat variable halaman untuk dipanggil di view nantinya*/
			$data['offset'] = $offset;

			$data['data'] = $this->model_item_list->view($config['per_page'],$pencarian, $offset);

			//	$data= $this->model_item_list->view($pencarian,$offset,$data);
			/*memanggil view pagination*/

	$d['nama'] = $this->session->userdata('nama');
	$d['foto'] = $this->session->userdata('foto');
	$d['page'] = 'super';





		$this->load->view('super/atas',$d);
		$this->load->view('super/home',$d);
		$this->load->view('super/item_list',$data,$d);
	}
	public function item_edit()
	{
$this->load->model('model_item_list');
		$kd_produk=$this->uri->segment(3);
		$data['produk'] = $this->model_item_list->produk($kd_produk)->row_array();

		$d['nama'] = $this->session->userdata('nama');
		$d['foto'] = $this->session->userdata('foto');
		$d['page'] = 'super';
		$d['dept']= $this->model_item_list->dept();
		$d['vendor']= $this->model_item_list->vendor();
		//$this->load->model('item_list');
		$this->load->view('super/atas',$d);
		$this->load->view('super/home',$d);
		$this->load->view('super/update_item',$data,$d);
	}
	public function simpan_item()
	{

	$databarang =array('kd_produk'=>$this->input->post('kodebarang'),
	'upc'=>$this->input->post('upc'),
	'nama_produk'=>$this->input->post('namaproduk'),
	'vendor'=>$this->input->post('vendor'),
	'dept'=>$this->input->post('dept'),
	'qty_iner'=>$this->input->post('qtyiner'),
	'qty_carton'=>$this->input->post('qtycarton'),
	'qty_palet'=>$this->input->post('qtypalet'),
	'cbm'=>$this->input->post('cbm')
);
$this->db->insert('m_produk',$databarang);
$s ="<script>
  alert('Menambahkan Data Berhasil');
  window.location.href = 'item_list';
</script>";
	echo $s;

	}
	public function simpan_update_item()
	{
	  $kd_produk=$this->input->post('kd_produk');
		$databarang =array('kd_produk'=>$this->input->post('kodebarang'),
		'upc'=>$this->input->post('upc'),
		'nama_produk'=>$this->input->post('namaproduk'),
		'vendor'=>$this->input->post('vendor'),
		'dept'=>$this->input->post('dept'),
		'qty_iner'=>$this->input->post('qtyiner'),
		'qty_carton'=>$this->input->post('qtycarton'),
		'qty_palet'=>$this->input->post('qtypalet'),
		'cbm'=>$this->input->post('cbm')
	);
	$this->db->where('kd_produk', $kd_produk);
	$this->db->update('m_produk',$databarang);
$s ="<script>
  alert('Update Data Berhasil');
  window.location.href = 'item_list';
</script>";
	echo $s;
//	redirect('super/item_list');


	}
}
