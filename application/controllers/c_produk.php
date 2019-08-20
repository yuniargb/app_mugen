<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_produk extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mo_produk', 'produk');
        $this->load->model('mo_brand', 'brand');
        $this->load->model('mo_warna', 'warna');
        $this->load->model('mo_kategory', 'kategory');
        
    }

    public function index() {
        $data = array(
            "base" => base_url(),
            "url_grid" => site_url('c_produk/grid'),
            "url_add" => site_url('c_produk/add'),
            "url_edit" => site_url('c_produk/edit'),
            "url_delete" => site_url('c_produk/remove'),
        );
        $this->load->view('v_produk/home', $data);
        $this->load->view('v_produk/confirm_delete', $data);
    }

    public function grid() {
        echo json_encode(array(
            "data" => $this->produk->getGridData()->result()
        ));
    }

    function add() {
        $data['title'] = 'Add - Produk';
        $data['default']['kode_produk'] = '';
        $data['default']['nama_produk'] = '';

        $resultkategory = $this->kategory->getAll();
        $i = 0;
        foreach ($resultkategory as $rowkategory) {
            $data['default']['id_kategory'][-1]['value'] = NULL;
            $data['default']['id_kategory'][-1]['display'] = '- Please Select -';
            $data['default']['id_kategory'][$i]['value'] = $rowkategory['id_kategory'];
            $data['default']['id_kategory'][$i]['display'] = $rowkategory['nama_kategory'];
            $i++;
        }

        $resultbrand = $this->brand->getAll();
        $j = 0;
        foreach ($resultbrand as $rowbrand) {
            $data['default']['id_brand'][-1]['value'] = NULL;
            $data['default']['id_brand'][-1]['display'] = '- Please Select -';
            $data['default']['id_brand'][$j]['value'] = $rowbrand['id_brand'];
            $data['default']['id_brand'][$j]['display'] = $rowbrand['nama_brand'];
            $j++;
        }

        
        $resultwarna = $this->warna->getAll();
        $l = 0;
        foreach ($resultwarna as $rowwarna) {
            $data['default']['id_warna'][-1]['value'] = NULL;
            $data['default']['id_warna'][-1]['display'] = '- Please Select -';
            $data['default']['id_warna'][$l]['value'] = $rowwarna['id_warna'];
            $data['default']['id_warna'][$l]['display'] = $rowwarna['nama_warna'];
            $l++;
        }

        $data['default']['bahan_produk'] = '';
        $data['default']['berat_produk'] = '';
        $data['default']['gambar_produk'] = '';
        $data['default']['deskripsi_produk'] = '';
        $data['default']['stok'] = '';
        $data['url_post'] = site_url('c_produk/addpost');
        $data['url_index'] = site_url('c_produk');
        $data['id'] = 0;

        $this->load->view('v_produk/form', $data);
    }

    public function addpost() {
        $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('id_kategory', 'Kategory', 'required');
        $this->form_validation->set_rules('id_brand', 'Brand', 'required');
        $this->form_validation->set_rules('gambar_produk', 'Size', 'required');
        $this->form_validation->set_rules('id_warna', 'Warna', 'required');
        $this->form_validation->set_rules('bahan_produk', 'Bahan Produk', 'required');
        $this->form_validation->set_rules('berat_produk', 'Berat Produk', 'required');
        $this->form_validation->set_rules('gambar_produk', 'Gambar Produk', 'required');
        $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');

        if ($this->form_validation->run() == TRUE) {
            $kode_produk = $this->input->post('kode_produk');
            $nama_produk = $this->input->post('nama_produk');
            $kategory = $this->input->post('id_kategory');
            $brand = $this->input->post('id_brand');
            $gambar_produk = $this->input->post('gambar_produk');
            $id_warna = $this->input->post('id_warna');
            $bahan_produk = $this->input->post('bahan_produk');
            $berat_produk = $this->input->post('berat_produk');
            $gambar_produk = $this->input->post('gambar_produk');
            $deskripsi_produk = $this->input->post('deskripsi_produk');
            $stok = $this->input->post('stok');

            $record = array(
                "kode_produk" => $kode_produk,
                "nama_produk" => $nama_produk,
                "id_kategory" => $kategory,
                "id_brand" => $brand,
                 "gambar_produk" => $gambar_produk,
                "id_warna" => $id_warna,
                "bahan_produk" => $bahan_produk,
                "berat_produk" => $berat_produk,
                "gambar_produk" => $gambar_produk,
                "deskripsi_produk" => $deskripsi_produk,
                "stok" => $stok,
                
                
            );

            $checkdata = $this->produk->checkData($kode_produk);
            if ($checkdata > 0) {
                $valid = 'false';
                $message = 'Data already exist';
                $err_kode_produk = "Kode Produk Sudah ada pada master produk";
            } else {
                $valid = 'true';
                $message = 'Insert data success';
                $err_kode_produk = null;
                $this->produk->insert($record);
            }

            $jsonmsg = array(
                "msg" => $message,
                "hasil" => $valid,
                "err_kode_produk" => $err_kode_produk,
                "err_nama_produk" => NULL,
                "err_kategory" => null,
                "err_id_brand" => null,
                "err_id_warna" => null,
                
                "err_bahan_produk" => null,
                "err_berat_produk" => null,
                "err_gambar_produk" => null,
                "err_deskripsi_produk" => null,
                "err_stok" => null,
            );
        } else {
            $jsonmsg = array(
                "msg" => 'Insert Data Failed',
                "hasil" => 'false',
                "err_nama_produk" => form_error('nama_produk'),
                "err_kode_produk" => form_error('kode_produk'),
                "err_id_warna" => form_error('id_warna'),
                "err_id_kategory" => form_error('id_kategory'),
                "err_id_brand" => form_error('id_brand'),
                
                "err_bahan_produk" => form_error('bahan_produk'),
                "err_berat_produk" => form_error('berat_produk'),
                "err_gambar_produk" => form_error('gambar_produk'),
                "err_deskripsi_produk" => form_error('deskripsi_produk'),
                "err_stok" => form_error('stok'),
            );
        }
        echo json_encode($jsonmsg);
    }

    function edit($id) {
        $row = $this->produk->getby_id($id)->row();

        $data['title'] = 'Edit - Produk';
        $data['default']['kode_produk'] = $row->kode_produk;
        $data['default']['nama_produk'] = $row->nama_produk;

        $resultkategory = $this->kategory->getAll();
        $i = 0;
        foreach ($resultkategory as $rowkategory) {
            $data['default']['id_kategory'][$i]['value'] = $rowkategory['id_kategory'];
            $data['default']['id_kategory'][$i]['display'] = $rowkategory['nama_kategory'];
            if ($row->id_kategory == $rowkategory['id_kategory']) {
                $data['default']['id_kategory'][$i]['selected'] = "SELECTED";
            }
            $i++;
        }

        $resultbrand = $this->brand->getAll();
        $j = 0;
        foreach ($resultbrand as $rowbrand) {
            $data['default']['id_brand'][$j]['value'] = $rowbrand['id_brand'];
            $data['default']['id_brand'][$j]['display'] = $rowbrand['nama_brand'];
            if ($row->id_brand == $rowbrand['id_brand']) {
                $data['default']['id_brand'][$j]['selected'] = "SELECTED";
            }
            $j++;
        }

       

        $resultwarna = $this->warna->getAll();
        $l = 0;
        foreach ($resultwarna as $rowwarna) {
            $data['default']['id_warna'][$l]['value'] = $rowwarna['id_warna'];
            $data['default']['id_warna'][$l]['display'] = $rowwarna['nama_warna'];
            if ($row->id_warna == $rowwarna['id_warna']) {
                $data['default']['id_warna'][$l]['selected'] = "SELECTED";
            }
            $l++;
        }


        $data['default']['bahan_produk'] = $row->bahan_produk;
        $data['default']['berat_produk'] = $row->berat_produk;
        $data['default']['gambar_produk'] = $row->gambar_produk;
        $data['default']['deskripsi_produk'] = $row->deskripsi_produk;
        $data['default']['stok'] = $row->stok;
        $data['url_post'] = site_url('c_produk/editpost');
        $data['url_index'] = site_url('c_produk');
        $data['id'] = $id;
        $this->load->view('v_produk/form', $data);
    }

    function editpost() {
        $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('id_brand', 'Brand', 'required');
        $this->form_validation->set_rules('id_warna', 'Alamat', 'required');
        $this->form_validation->set_rules('id_kategory', 'Kategory', 'required');
        $this->form_validation->set_rules('gambar_produk', 'Gambar produk', 'required');
        $this->form_validation->set_rules('bahan_produk', 'Bahan Produk', 'required');
        $this->form_validation->set_rules('berat_produk', 'Berat Produk', 'required');
        $this->form_validation->set_rules('deskripsi_produk', 'Berat Produk', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');

        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id');
            $kode_produk = $this->input->post('kode_produk');
            $nama_produk = $this->input->post('nama_produk');
            $kategory = $this->input->post('id_kategory');
            $id_brand = $this->input->post('id_brand');
            $gambar_produk = $this->input->post('gambar_produk');
            $id_warna = $this->input->post('id_warna');
            $bahan_produk = $this->input->post('bahan_produk');
            $berat_produk = $this->input->post('berat_produk');
            $deskripsi_produk = $this->input->post('deskripsi_produk');
            $stok = $this->input->post('stok');

            $record = array(
                "kode_produk" => $kode_produk,
                "nama_produk" => $nama_produk,
                "id_kategory" => $kategory,
                "id_brand" => $id_brand,
                "gambar_produk" => $gambar_produk,
                "id_warna" => $id_warna,
                "bahan_produk" => $bahan_produk,
                "berat_produk" => $berat_produk,
                "deskripsi_produk" => $deskripsi_produk,
                "stok" => $stok,
            );


            $this->produk->update($id, $record);

            $jsonmsg = array(
                "msg" => 'Update Data Success',
                "hasil" => 'true',
                "err_kode_produk" => null,
                "err_nama_produk" => null,
                "err_id_warna" => null,
                "err_id_kategory" => null,
                "err_id_brand" => null,
                "err_gambar_produk" => null,
                "err_stok" => null,
                "err_deskripsi_produk" => null,
                "err_bahan_produk" => null,
                "err_berat_produk" => null,
            );
        } else {
            $jsonmsg = array(
                "msg" => 'Update Data Failed',
                "hasil" => 'false',
                "err_nama_produk" => form_error('nama_produk'),
                "err_kode_produk" => form_error('kode_produk'),
                "err_id_kategory" => form_error('id_kategory'),
                "err_id_brand" => form_error('id_brand'),
                "err_gambar_produk" => form_error('gambar_produk'),
                "err_id_warna" => form_error('id_warna'),
                "err_bahan_produk" => form_error('bahan_produk'),
                "err_berat_produk" => form_error('berat_produk'),
                "err_deskripsi_produk" => form_error('deskripsi_produk'),
                "err_stok" => form_error('stok'),
               
            );
        }
        echo json_encode($jsonmsg);
    }

    public function remove() {
        $id = $this->input->post('id_produk');
        $this->produk->delete($id);
        $jsonmsg = array(
            "msg" => 'Delete Data Succces',
            "hasil" => false
        );
        echo json_encode($jsonmsg);
    }

}
