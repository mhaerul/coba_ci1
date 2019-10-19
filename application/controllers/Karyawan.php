<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('M_Karyawan');
	}
	
	function index() {
		$data['karyawan'] = $this->M_Karyawan->tampil_data();
		$data['divisi'] = $this->M_Karyawan->get_divisi();
		
		$this->load->view('head');
		$this->load->view('nav');
		$this->load->view('karyawan/view',$data);
		$this->load->view('foot');
	}

	function load_ajax() {
		$data['karyawan'] = $this->M_Karyawan->tampil_data();
		echo json_encode($data);
	}

	function addData() {
		echo var_dump($_POST);
	}
}