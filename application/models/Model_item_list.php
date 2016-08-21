<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_item_list extends CI_Model {
	var $tabel = 'm_produk';//variabel tabelnya
	public function vendor() {
		$result = $this->db->get("m_vendor")->result();

		return $result;

	}
	public function buat_kode() {
		$years                = date('Y');// tahun
		$get_3_number_of_year = substr($years, 0);// mengambil 3 angka dari sebelah kanan pada tahun sekarang

		$this->db->select('RIGHT(kd_produk,6) as kode', FALSE);
		$this->db->order_by('kd_produk', 'DESC');
		//$this->db->limit(1);
		$query  = $this->db->get('m_produk')->num_rows();
		$query1 = $this->db->get('m_produk')->result();
		$maxid  = $query1[0];
		//cek dulu apakah ada sudah ada kode di tabel.
		if ($query <> 0) {
			//jika kode ternyata sudah ada.
			$data = $query;
			$kode = intval($data)+1;
		} else {
			//jika kode belum ada
			$kode = 1;

		}
		$kodemax  = str_pad($kode, 6, "0", STR_PAD_LEFT);
		$kodejadi = "P".$get_3_number_of_year.$kodemax;
		return $kodejadi;
	}
	public function produk($kd_produk) {
		//$this->db->select('gambar')->result();
		return $this->db->get_where('m_produk', array('kd_produk' => $kd_produk));

	}
	function view($offset, $pencarian, $num) {

		/*variable num dan offset digunakan untuk mengatur jumlah
		data yang akan dipaging, yang kita panggil di controller*/

		//$query = $this->db->get("m_produk",$num, $offset);
		//return $query->result();

		if ($pencarian) {

			$query = $this->db->or_like(array('kd_produk' => $pencarian, 'nama_produk' => $pencarian, 'upc' => $pencarian));

		}
		$query = $this->db->count_all_results('m_produk');

		if ($pencarian) {
			$query = $this->db->or_like(array('kd_produk' => $pencarian, 'nama_produk' => $pencarian, 'upc' => $pencarian));

		}

		$query = $this->db->get('m_produk', $offset, $num);

		return $query->result();

	}
	public function dept() {

		$result = $this->db->get("m_dept")->result();
		return $result;

	}
	public function type() {
		$result = $this->db->get('pack')->result();

		return $result;

	}
	public function buat_po() {
		$years                = date('Y');// tahun
		$get_3_number_of_year = substr($years, 0);// mengambil 3 angka dari sebelah kanan pada tahun sekarang

		$this->db->select('RIGHT(no_po,6) as kode', FALSE);
		$this->db->order_by('no_po', 'DESC');
		//$this->db->limit(1);
		$query  = $this->db->get('m_po')->num_rows();
		$query1 = $this->db->get('m_po')->result();
		$maxid  = $query1[0];
		//cek dulu apakah ada sudah ada kode di tabel.
		if ($query <> 0) {
			//jika kode ternyata sudah ada.
			$data = $query;
			$kode = intval($data)+1;
		} else {
			//jika kode belum ada
			$kode = 1;

		}
		$kodemax  = str_pad($kode, 6, "0", STR_PAD_LEFT);
		$kodejadi = "P0.".$get_3_number_of_year.$kodemax;
		return $kodejadi;
	}
	public function auto() {
		$result = $this->db->get("m_produk")->result();
		return $result;
	}

	function vendor1() {

		$vendor = $this->db->get('m_vendor');
		return $vendor->result_array();

	}

	function get_all_produk() {

		$query = $this->db->get('m_vendor');

		return $query->result();

	}
	function tampil_po($kode = FALSE) {
		$query = $this->db->get_where('m_po_detail', array('no_po' => $kode));

		$query->result_array();
		return $query;

	}
}