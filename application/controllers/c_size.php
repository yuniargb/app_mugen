<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_size extends CI_Controller {
	
	function __construct() {
		parent:: __construct();
		$this->load->model('mo_size', 'size');	
	}
	
	
	
	public function index() {
		$data = array(
			"base" => base_url(),
			"url_grid" => site_url('c_size/grid'),
			"url_add" => site_url('c_size/add'),
			"url_edit" => site_url('c_size/edit'),
			"url_delete" => site_url('c_size/remove'),
			);
			$this->load->view('v_size/home', $data);
			$this->load->view('v_size/confirm_delete', $data);
	
	}
	
public function grid() {
	echo json_encode(array("data" => $this->size->getGridData()->result()
	));
	
}
		
		

	
	function add() {
		$data['title'] = 'Add - Size';
		$data['default']['nama_size'] = '';
		$data['url_post']=site_url('c_size/addpost');
		$data['url_index']=site_url('c_size');
		$data['id']=0;
		$this->load->view('v_size/form', $data);
	}
	
	public function addpost() {
		$this->form_validation->set_rules('nama_size', 'Nama', 'required');
		if ($this->form_validation->run() == TRUE) {
			$nama = $this->input->post('nama_size');
			$record = array(
				"nama_size" => $nama,
			);
			$checkdata = $this->size->checkdata($nama);
			if ($checkdata > 0) {
				$valid = 'false';
				$message = 'data already exist';
				$err_nama_size= "Nama size Sudah ada";
			} else {
				$this->size->insert($record);
				$valid ='true';
				$message = "Insert data, success";
				$err_nama_size = null;
			}
			$jsonmsg = array (
				"msg"  => $message,
				"hasil" => $valid,
				"err_nama_size" => $err_nama_size,
			);
		} else {
			$jsonmsg = array (
				"msg" => 'Insert Data Failed',
				"hasil" =>'false',
				"err_nama_size" => form_error('nama_size'),
			);
		}
		echo json_encode($jsonmsg);
	}
	
	function edit($id) {
		$row = $this->size->getby_id($id)->row();
		$data['title'] = 'Edit - Size';
		$data['default']['nama_size'] = $row->nama_size;
		$data['url_post'] = site_url('c_size/editpost');
		$data['url_index'] = site_url('c_size');
		$data['id'] = $id;
		$this->load->view('v_size/form', $data);
	}
	
	function editpost() {
		$this->form_validation->set_rules('nama_size', 'Nama', 'required');
		if ($this->form_validation->run() == TRUE) {
			$id = $this->input->post('id');
			$nama = $this->input->post('nama_size');
			$record = array (
				"nama_size" => $nama,
			);
			$this->size->update($id,$record);
			$jsonmsg = array (
				"msg"  => 'Update Data Success',
				"hasil" => 'true',
				"err_nama_size" => null,
			);
		} else {
			$jsonmsg = array (
				"msg"  => 'Update Data Failed',
				"hasil" => 'false',
				"err_nama_size" => form_error('nama_size'),
			);
		}
		echo json_encode($jsonmsg);
	}
	
	public function remove() {
		$id = $this->input->post('id_size');
		$this->size->delete($id);
		$jsonmsg = array(
			"msg"  => 'Delete Data Success',
			"hasil" => 'true',
		);
	echo json_encode($jsonmsg);
	}
}	