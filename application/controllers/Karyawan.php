<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Karyawan extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->model('M_Karyawan');
			$this->load->helper(array('form', 'url'));
		}
		
		function index() {
			$data['karyawan'] = $this->M_Karyawan->tampil_data();
			$data['divisi'] = $this->M_Karyawan->get_divisi();
			
			$this->load->view('head');
			$this->load->view('nav');
			$this->load->view('karyawan/view',$data);
			$this->load->view('foot');
		}

		function addData() {
			$config['upload_path'] = './image/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = true;
			
			$this->load->library('upload',$config);
	
			if ( ! $this->upload->do_upload('berkas')){
				$error = array('error' => $this->upload->display_errors());
				echo var_dump($error);
			}else{
				$data = array('upload_data' => $this->upload->data());
				
				$datax = array(
					'nik' => $this->input->post('NIK'),
					'nama' => $this->input->post('NAMA'),
					'divisi' => $this->input->post('DIVISI'),
					'insert_date' => 'NOW()',
					'foto' => $data['upload_data']['file_name']
				);
	
				$this->M_Karyawan->tambah($datax,'karyawan');
				
				echo "sukses";
			}
		}

		function loadData() {
			$result = $this->M_Karyawan->tampil_data();
			
			echo "
				<div class='table-responsive'>
					<table class='table table-bordered' width='100%' cellspacing='0'>
						<tr>
							<th width='20px'>NO</th>
							<th>NIK</th>
							<th>NAMA</th>
							<th>DIVISI</th>
							<th>FOTO</th>
							<th>ACTION</th>
        				</tr>";
						
			$no = 1;
			foreach($result as $r) {
				echo "
						<tr>
							<td> $no </td>
							<td> $r->nik </td>
							<td> $r->nama </td>
							<td> $r->division </td>
							<td> <img src='./image/$r->foto' width='100px'/></td>
							<td>
							<a href='`.base_url().`karyawan/edit/$r->nik' class='btn btn-primary btn-sm'>Edit</a>
							<a href='`.base_url().`karyawan/delete/$r->nik' class='btn btn-danger btn-sm'>Delete</a>
							</td>
						</tr>
				";
				$no++;
			}

			echo "
					</table>
				</div>";
		}
	}
?>