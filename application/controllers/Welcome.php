<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class welcome extends CI_Controller {
	public static function index() {
		$this->load->view('welcome_message');
	}

	public static function coba() {
		$data = array(
			'nama' => 'Muallim',
			'umur' => 23
		);

		$this->load->view('coba',$data);
	
		echo "pah";
	}
}