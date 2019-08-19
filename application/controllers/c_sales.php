<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_sales extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('mo_sales', 'sales');
    }

    public function index() {
        $data = array(
            "base" => base_url(),
            "url_grid" => site_url('c_sales/grid'),
            "url_add" => site_url('c_sales/add'),
            "url_edit" => site_url('c_sales/edit'),
            "url_delete" => site_url('c_sales/remove'),
        );
        $this->load->view('v_sales/home', $data);
        $this->load->view('v_sales/confirm_delete', $data);
    }

    public function grid() {
        echo json_encode(array("data" => $this->sales->getGridData()->result()
        ));
    }

    function add() {
        $data['title'] = 'Add - Cus';
        $data['default']['nama_sales'] = '';
        $data['default']['telpon'] = '';
        $data['default']['alamat'] = '';
        $data['default']['email'] = '';
        $data['default']['jk'] = '';
        
        $data['url_post'] = site_url('c_sales/addpost');
        $data['url_index'] = site_url('c_sales');
        $data['id'] = 0;
        $this->load->view('v_sales/form', $data);
    }

    public function addpost() {
        $this->form_validation->set_rules('nama_sales', 'Nama', 'required');
        if ($this->form_validation->run() == TRUE) {
            $nama = $this->input->post('nama_sales');
            $telpon = $this->input->post('telpon');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $jk = $this->input->post('jk');
            


            $record = array(
                "nama_sales" => $nama,
                "telpon" => $telpon,
                "alamat" => $alamat,
                "email" => $email,
                "jk" => $jk,
                
            );
            $checkdata = $this->sales->checkdata($nama);
            if ($checkdata > 0) {
                $valid = 'false';
                $message = 'data already exist';
                $err_nama_sales = "Name sales Sudah ada";
            } else {
                $this->sales->insert($record);
                $valid = 'true';
                $message = "Insert data, success";
                $err_nama_sales = null;
            }
            $jsonmsg = array(
                "msg" => $message,
                "hasil" => $valid,
                "err_nama_sales" => $err_nama_sales,
            );
        } else {
            $jsonmsg = array(
                "msg" => 'Insert Data Failed',
                "hasil" => 'false',
                "err_nama_sales" => form_error('nama_sales'),
            );
        }
        echo json_encode($jsonmsg);
    }

    function edit($id) {
        $row = $this->sales->getby_id($id)->row();
        $data['title'] = 'Edit - Sales';
        $data['default']['nama_sales'] = $row->nama_sales;
        $data['default']['alamat'] = $row->alamat;
        $data['default']['telpon'] = $row->telpon;
        $data['default']['email'] = $row->email;
        $data['default']['jk'] = $row->jk;
        $data['url_post'] = site_url('c_sales/editpost');
        $data['url_index'] = site_url('c_sales');
        $data['id'] = $id;
        $this->load->view('v_sales/form', $data);
    }

    function editpost() {
        $this->form_validation->set_rules('nama_sales', 'Nama', 'required');
        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama_sales');
            $telpon = $this->input->post('telpon');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $jk = $this->input->post('jk');


            $record = array(
                "nama_sales" => $nama,
                "telpon" => $telpon,
                "alamat" => $alamat,
                "email" => $email,
                "jk" => $jk,
            );
            $this->sales->update($id, $record);
            $jsonmsg = array(
                "msg" => 'Update Data Success',
                "hasil" => 'true',
                "err_nama_sales" => null,
                
            );
        } else {
            $jsonmsg = array(
                "msg" => 'Update Data Failed',
                "hasil" => 'false',
                "err_nama_sales" => form_error('nama_sales'),
            );
        }
        echo json_encode($jsonmsg);
    }

    public function remove() {
        $id = $this->input->post('id_sales');
        $this->sales->delete($id);
        $jsonmsg = array(
            "msg" => 'Delete Data Success',
            "hasil" => 'true',
        );
        echo json_encode($jsonmsg);
    }

}
