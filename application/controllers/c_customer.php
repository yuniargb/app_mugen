<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_customer extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('mo_customer', 'customer');
    }

    public function index() {
        $data = array(
            "base" => base_url(),
            "url_grid" => site_url('c_customer/grid'),
            "url_add" => site_url('c_customer/add'),
            "url_edit" => site_url('c_customer/edit'),
            "url_delete" => site_url('c_customer/remove'),
        );
        $this->load->view('v_customer/home', $data);
        $this->load->view('v_customer/confirm_delete', $data);
    }

    public function grid() {
        echo json_encode(array("data" => $this->customer->getGridData()->result()
        ));
    }

    function add() {
        $data['title'] = 'Add - Cus';
        $data['default']['nama_customer'] = '';
        $data['default']['telpon'] = '';
        $data['default']['alamat'] = '';
        $data['default']['email'] = '';
        $data['default']['jk'] = '';
        
        $data['url_post'] = site_url('c_customer/addpost');
        $data['url_index'] = site_url('c_customer');
        $data['id'] = 0;
        $this->load->view('v_customer/form', $data);
    }

    public function addpost() {
        $this->form_validation->set_rules('nama_customer', 'Nama', 'required');
        if ($this->form_validation->run() == TRUE) {
            $nama = $this->input->post('nama_customer');
            $telpon = $this->input->post('telpon');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $jk = $this->input->post('jk');
            


            $record = array(
                "nama_customer" => $nama,
                "telpon" => $telpon,
                "alamat" => $alamat,
                "email" => $email,
                "jk" => $jk,
                
            );
            $checkdata = $this->customer->checkdata($nama);
            if ($checkdata > 0) {
                $valid = 'false';
                $message = 'data already exist';
                $err_nama_customer = "Name customer Sudah ada";
            } else {
                $this->customer->insert($record);
                $valid = 'true';
                $message = "Insert data, success";
                $err_nama_customer = null;
            }
            $jsonmsg = array(
                "msg" => $message,
                "hasil" => $valid,
                "err_nama_customer" => $err_nama_customer,
            );
        } else {
            $jsonmsg = array(
                "msg" => 'Insert Data Failed',
                "hasil" => 'false',
                "err_nama_customer" => form_error('nama_customer'),
            );
        }
        echo json_encode($jsonmsg);
    }

    function edit($id) {
        $row = $this->customer->getby_id($id)->row();
        $data['title'] = 'Edit - Sales';
        $data['default']['nama_customer'] = $row->nama_customer;
        $data['default']['alamat'] = $row->alamat;
        $data['default']['telpon'] = $row->telpon;
        $data['default']['email'] = $row->email;
        $data['default']['jk'] = $row->jk;
        $data['url_post'] = site_url('c_customer/editpost');
        $data['url_index'] = site_url('c_customer');
        $data['id'] = $id;
        $this->load->view('v_customer/form', $data);
    }

    function editpost() {
        $this->form_validation->set_rules('nama_customer', 'Nama', 'required');
        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama_customer');
            $telpon = $this->input->post('telpon');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $jk = $this->input->post('jk');


            $record = array(
                "nama_customer" => $nama,
                "telpon" => $telpon,
                "alamat" => $alamat,
                "email" => $email,
                "jk" => $jk,
            );
            $this->customer->update($id, $record);
            $jsonmsg = array(
                "msg" => 'Update Data Success',
                "hasil" => 'true',
                "err_nama_customer" => null,
                
            );
        } else {
            $jsonmsg = array(
                "msg" => 'Update Data Failed',
                "hasil" => 'false',
                "err_nama_customer" => form_error('nama_customer'),
            );
        }
        echo json_encode($jsonmsg);
    }

    public function remove() {
        $id = $this->input->post('id_customer');
        $this->customer->delete($id);
        $jsonmsg = array(
            "msg" => 'Delete Data Success',
            "hasil" => 'true',
        );
        echo json_encode($jsonmsg);
    }

}
