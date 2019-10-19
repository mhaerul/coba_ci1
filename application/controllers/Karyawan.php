<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('M_Karyawan');
	}
	
	function index() {
		$data['karyawan'] = $this->M_Karyawan->tampil_data();
		$this->load->view('head');
		$this->load->view('nav');
		$this->load->view('karyawan/view',$data);
		$this->load->view('foot');
	}
}