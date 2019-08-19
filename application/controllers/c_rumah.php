<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_rumah extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('mo_rumah', 'rumah');
    }

    public function index() {
        $data = array(
            "base" => base_url(),
            "url_grid" => site_url('c_rumah/grid'),
            "url_add" => site_url('c_rumah/add'),
            "url_edit" => site_url('c_rumah/edit'),
            "url_delete" => site_url('c_rumah/remove'),
        );
        $this->load->view('v_rumah/home', $data);
        $this->load->view('v_rumah/confirm_delete', $data);
    }

    public function grid() {
        echo json_encode(array("data" => $this->rumah->getGridData()->result()
        ));
    }

    function add() {
        $data['title'] = 'Add - Rumah';
        $data['default']['nama_rumah'] = '';
        $data['default']['kode_kawasan'] = '';
        $data['default']['kode_blok'] = '';
        $data['default']['harga'] = '';
        $data['default']['luas_tanah'] = '';
        $data['default']['luas_bangunan'] = '';
        $data['default']['gambar'] = '';
        
        $data['url_post'] = site_url('c_rumah/addpost');
        $data['url_index'] = site_url('c_rumah');
        $data['id'] = 0;
        $this->load->view('v_rumah/form', $data);
    }

    public function addpost() {
        $this->form_validation->set_rules('nama_rumah', 'Nama', 'required');
        if ($this->form_validation->run() == TRUE) {
            $nama = $this->input->post('nama_rumah');
            $kode_kawasan = $this->input->post('kode_kawasan');
            $kode_blok = $this->input->post('kode_blok');
            $harga = $this->input->post('harga');
            $luas_tanah = $this->input->post('luas_tanah');
            $luas_bangunan = $this->input->post('luas_bangunan');
            $gambar = $this->input->post('gambar');
            


            $record = array(
                "nama_rumah" => $nama,
                "kode_kawasan" => $kode_kawasan,
                "kode_blok" => $kode_blok,
                "harga" => $harga,
                "luas_tanah" => $luas_tanah,
                "luas_bangunan" => $luas_bangunan,
                "gambar" => $gambar,
                
            );
            $checkdata = $this->rumah->checkdata($nama);
            if ($checkdata > 0) {
                $valid = 'false';
                $message = 'data already exist';
                $err_nama_rumah = "Name rumah Sudah ada";
            } else {
                $this->rumah->insert($record);
                $valid = 'true';
                $message = "Insert data, success";
                $err_nama_rumah = null;
            }
            $jsonmsg = array(
                "msg" => $message,
                "hasil" => $valid,
                "err_nama_rumah" => $err_nama_rumah,
            );
        } else {
            $jsonmsg = array(
                "msg" => 'Insert Data Failed',
                "hasil" => 'false',
                "err_nama_rumah" => form_error('nama_rumah'),
            );
        }
        echo json_encode($jsonmsg);
    }

    function edit($id) {
        $row = $this->rumah->getby_id($id)->row();
        $data['title'] = 'Edit - Rumah';
        $data['default']['nama_rumah'] = $row->nama_rumah;
        $data['default']['kode_blok'] = $row->kode_blok;
        $data['default']['kode_kawasan'] = $row->kode_kawasan;
        $data['default']['harga'] = $row->harga;
        $data['default']['luas_tanah'] = $row->luas_tanah;
        $data['default']['luas_bangunan'] = $row->luas_bangunan;
        $data['default']['gambar'] = $row->gambar;
        $data['url_post'] = site_url('c_rumah/editpost');
        $data['url_index'] = site_url('c_rumah');
        $data['id'] = $id;
        $this->load->view('v_rumah/form', $data);
    }

    function editpost() {
        $this->form_validation->set_rules('nama_rumah', 'Nama', 'required');
        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama_rumah');
            $kode_kawasan = $this->input->post('kode_kawasan');
            $kode_blok = $this->input->post('kode_blok');
            $harga = $this->input->post('harga');
            $luas_tanah = $this->input->post('luas_tanah');
            $luas_bangunan = $this->input->post('luas_bangunan');
            $gambar = $this->input->post('gambar');


            $record = array(
                "nama_rumah" => $nama,
                "kode_kawasan" => $kode_kawasan,
                "kode_blok" => $kode_blok,
                "harga" => $harga,
                "luas_tanah" => $luas_tanah,
                "luas_bangunan" => $luas_bangunan,
                "gambar" => $gambar,
            );
            $this->rumah->update($id, $record);
            $jsonmsg = array(
                "msg" => 'Update Data Success',
                "hasil" => 'true',
                "err_nama_rumah" => null,
                
            );
        } else {
            $jsonmsg = array(
                "msg" => 'Update Data Failed',
                "hasil" => 'false',
                "err_nama_rumah" => form_error('nama_rumah'),
            );
        }
        echo json_encode($jsonmsg);
    }

    public function remove() {
        $id = $this->input->post('id_rumah');
        $this->rumah->delete($id);
        $jsonmsg = array(
            "msg" => 'Delete Data Success',
            "hasil" => 'true',
        );
        echo json_encode($jsonmsg);
    }

}
