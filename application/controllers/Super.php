<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super extends CI_Controller {
	function __construct() {

		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('model_item_list');
		$this->load->library('upload');

		if ($this->session->userdata('role') <> 'super-user') {
			redirect('login');
		}

	}
	public function barcode() {
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode

	}

	public function index() {

		$d['nama'] = $this->session->userdata('nama');
		$d['foto'] = $this->session->userdata('foto');
		$d['page'] = 'super';
		$this->load->view('super/atas', $d);
		$this->load->view('super/home', $d);
		//$this->load->view('logout', $d);
	}
	public function item_input() {
		//$this->load->database();
		$this->load->model('model_item_list');

		$kode['kode'] = $this->model_item_list->buat_kode();
		$d['nama']    = $this->session->userdata('nama');
		$d['foto']    = $this->session->userdata('foto');
		$d['page']    = 'super';
		$d['dept']    = $this->model_item_list->dept();
		$d['vendor']  = $this->model_item_list->vendor();
		$d['pack']    = $this->model_item_list->type();

		//$dept=$this->model_item_list->dept();
		$this->load->view('super/atas', $d);

		$this->load->view('super/item_input', $kode, $d);
		$this->load->view('super/home', $d);

	}
	public function item_list($offset = 0) {
		$this->load->library('encryption');
		$this->load->model('model_item_list');
		$jml = $this->db->get('m_produk');

		$pencarian          = $this->input->post('pencarian');
		$config['base_url'] = base_url().'/super/item_list/';

		$config['total_rows']  = $jml->num_rows();
		$config['per_page']    = 10;/*Jumlah data yang dipanggil perhalaman*/
		$config['uri_segment'] = 3;/*data selanjutnya di parse diurisegmen 3*/
		//Zend_Barcode::render('code128', 'image', array('text' => '1233'), array());
		//require_once ('./application/libraries/Zend/Barcode.php');
		//adjust the above path to the correct location

		/*Class bootstrap pagination yang digunakan*/
		$config['full_tag_open']    = "<div class='pagination pagination-right'>";
		$config['full_tag_close']   = "</ul>";
		$config['num_tag_open']     = '<li>';
		$config['num_tag_close']    = '</li>';
		$config['cur_tag_open']     = "<li class='readonly'><li class='active'><a href='#'>";
		$config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open']    = "<li>";
		$config['next_tagl_close']  = "</li>";
		$config['prev_tag_open']    = "<li>";
		$config['prev_tagl_close']  = "</li>";
		$config['first_tag_open']   = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open']    = "<li>";
		$config['last_tagl_close']  = "</li>";

		$this->pagination->initialize($config);

		$data['halaman'] = $this->pagination->create_links();
		/*membuat variable halaman untuk dipanggil di view nantinya*/
		$data['offset'] = $offset;

		$data['data'] = $this->model_item_list->view($config['per_page'], $pencarian, $offset);

		//	$data= $this->model_item_list->view($pencarian,$offset,$data);
		$this->load->model('model_item_list');
		//$this->model_item_list->produk()->row_array();
		$upc = $this->db->get('m_produk');

		/*memanggil view pagination*/

		$d['nama'] = $this->session->userdata('nama');
		$d['foto'] = $this->session->userdata('foto');
		$d['page'] = 'super';

		$this->load->view('super/atas', $d);

		$this->load->view('super/item_list', $data, $d);
		$this->load->view('super/home', $d);
	}
	public function item_edit() {

		$this->load->model('model_item_list');
		$kd_produk = $this->uri->segment(3);

		$data['produk'] = $this->model_item_list->produk($kd_produk)->row_array();

		$d['nama']   = $this->session->userdata('nama');
		$d['foto']   = $this->session->userdata('foto');
		$d['page']   = 'super';
		$d['dept']   = $this->model_item_list->dept();
		$d['vendor'] = $this->model_item_list->vendor();
		$d['pack']   = $this->model_item_list->type();
		//$this->load->model('item_list');
		$this->load->view('super/atas', $d);

		$this->load->view('super/update_item', $data, $d);
		$this->load->view('super/home', $d);
	}
	public function simpan_item() {
		$kd_produk               = $this->input->post('kodebarang');
		$nmfile                  = "file_".$kd_produk;//nama file saya beri nama langsung dan diikuti fungsi kode
		$config['upload_path']   = './gambar/';//path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';//type yang dapat diakses bisa anda sesuaikan
		$config['overwrite']     = TRUE;
		$config['max_size']      = '2048';//maksimum besar file 2M
		$config['max_width']     = '1890';//lebar maksimum 1288 px
		$config['max_height']    = '890';//tinggi maksimu 768 px
		$config['file_name']     = $nmfile;//nama yang terupload nantinya
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		//$this->upload->do_upload('gambar');

		if (!$this->upload->do_upload('gambar')) {
			echo $this->upload->display_errors();

			//$this->load->view('v_upload', $error);
		} else {
			$gbr        = $this->upload->data();
			$databarang = array(

				'kd_produk'   => $this->input->post('kodebarang'),
				'upc'         => $this->input->post('upc'),
				'nama_produk' => $this->input->post('namaproduk'),
				'kd_vendor'   => $this->input->post('vendor'),
				'dept'        => $this->input->post('dept'),
				'qty_iner'    => $this->input->post('qtyiner'),
				'type'        => $this->input->post('type'),
				'qty_carton'  => $this->input->post('qtycarton'),
				'qty_palet'   => $this->input->post('qtypalet'),
				'cbm'         => $this->input->post('cbm'),
				'gambar'      => $gbr['file_name'],
			);

			$this->db->insert('m_produk', $databarang);
			$s = "<script>
  alert('Menambahkan Data Berhasil');
  window.location.href = 'item_list';
</script>";
			echo $s;
		}

	}
	public function simpan_update_item() {
		$kd_produk               = $this->input->post('kd_produk');
		$nmfile                  = "file_".$kd_produk;//nama file saya beri nama langsung dan diikuti fungsi kode
		$config['upload_path']   = './gambar/';//path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';//type yang dapat diakses bisa anda sesuaikan
		$config['overwrite']     = TRUE;
		$config['max_size']      = '3048';//maksimum besar file 3M
		$config['max_width']     = '18900';//lebar maksimum 1288 px
		$config['max_height']    = '8900';//tinggi maksimu 768 px
		$config['file_name']     = $nmfile;//nama yang terupload nantinya
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('gambar')) {
			echo $error = $this->upload->display_errors();

			//$this->load->view('v_upload', $error);
		} else {
			$gbr        = $this->upload->data();
			$databarang = array('kd_produk' => $this->input->post('kodebarang'),
				'upc'                          => $this->input->post('upc'),
				'nama_produk'                  => $this->input->post('namaproduk'),
				'kd_vendor'                    => $this->input->post('vendor'),
				'dept'                         => $this->input->post('dept'),
				'type'                         => $this->input->post('type'),
				'qty_iner'                     => $this->input->post('qtyiner'),
				'qty_carton'                   => $this->input->post('qtycarton'),
				'qty_palet'                    => $this->input->post('qtypalet'),
				'cbm'                          => $this->input->post('cbm'),
				'gambar'                       => $gbr['file_name'],
			);

			$this->db->where('kd_produk', $kd_produk);
			$this->db->update('m_produk', $databarang);
			$s = "<script>
  alert('Update Data Berhasil');
  window.location.href = 'item_list';
</script>";
			echo $s;

		}
	}
	function create_po() {
		//$kode  = $this->input->post('kode', TRUE);//variabel kunci yang di bawa dari input text id kode

		$kode['kode'] = $this->model_item_list->buat_po();

		//$query = $this->model_item_list->auto();//query model
		$d['nopo']   = $this->input->post($kode);
		$d['nama']   = $this->session->userdata('nama');
		$d['nip']    = $this->session->userdata('nip');
		$d['foto']   = $this->session->userdata('foto');
		$d['page']   = 'super';
		$d['dept']   = $this->model_item_list->dept();
		$d['produk'] = $this->model_item_list->get_all_produk();
		//$data['po']  = $this->model_item_list->tampil_po();

		$this->load->view('super/atas', $d);
		$this->load->view('super/inbound_PO', $kode, $d);
		$this->load->view('super/home', $d);

	}
	function simpan_po() {
		if (isset($_POST['simpan'])) {
			$data_PO = array('no_po' => $this->input->post('no'),
				'vendor'                => $this->input->post('ven'),
				'kd_produk'             => $this->input->post('kd'),
				'nama_produk'           => $this->input->post('namapro'),
				'qty'                   => $this->input->post('qty'),
				'tgl'                   => $this->input->post('tgl'),
				'user'                  => $this->input->post('user')
			);
			$this->db->insert('m_po_detail', $data_PO);
			$s = "<script>
  alert('Menambahkan Data Berhasil');
  window.location.href = 'create_PO';
</script>";
			echo $s;

		}
		if (isset($_POST['simpanpo'])) {
			$kode     = $this->input->post('no');
			$data_PO1 = array('no_po' => $this->input->post('no'),
				'vendor'                 => $this->input->post('ven'),
				'kd_produk'              => $this->input->post('kd'),
				'nama_produk'            => $this->input->post('namapro'),
				'qty'                    => $this->input->post('qty'),
				'tgl'                    => $this->input->post('tgl'),
				'user'                   => $this->input->post('user')
			);
			$this->db->insert('m_po_detail', $data_PO1);

			$this->db->where('no_po', $kode);
			$this->db->from('m_po_detail');
			echo $jml = $this->db->count_all_results();

			$this->db->select_sum('qty');
			$this->db->from('m_po_detail');
			$this->db->where('no_po', $kode);
			$qty = $this->db->get()->row()->qty;
			echo $qty;

			$data_PO = array('no_po' => $this->input->post('no'),

				'jml_item' => $jml,
				'jml_qty'  => $qty,

			);

			$this->db->insert('m_po', $data_PO);
			$s = "<script>
  alert('Menambahkan Data Berhasil');
  window.location.href = 'create_PO';
</script>";
			echo $s;

		}

	}
	function add_ajax_kab($ven_vendor) {
		$data['produk'] = $this->model_item_list->get_all_produk();
		$query          = $this->db->get_where('m_produk', array('kd_vendor' => $ven_vendor));
		$data           = "<option value=''></option>";
		foreach ($query->result() as $value) {
			$data .= "<option value='".$value->kd_produk."'>".$value->kd_produk."</option>";
		}
		echo $data;
	}

	function add_ajax_kec($kd_kdproduk) {
		$data['produk'] = $this->model_item_list->get_all_produk();
		$query          = $this->db->get_where('m_produk', array('kd_produk' => $kd_kdproduk));

		foreach ($query->result() as $value) {
			$data .= "<option value='".$value->nama_produk."'>".$value->nama_produk."</option>";
		}
		echo $data;

	}

}
