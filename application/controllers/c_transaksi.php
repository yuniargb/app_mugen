<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_transaksi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mo_transaksi', 'transaksi');
        $this->load->model('mo_customer', 'customer');
        $this->load->model('mo_sales', 'sales');
        $this->load->model('mo_rumah', 'rumah');
    }

    public function index() {
        $data = array(
            "base" => base_url(),
            "url_grid" => site_url('c_transaksi/grid'),
            "url_add" => site_url('c_transaksi/add'),
            "url_edit" => site_url('c_transaksi/edit'),
            "url_delete" => site_url('c_transaksi/remove'),
        );
        $this->load->view('v_transaksi/home', $data);
        $this->load->view('v_transaksi/confirm_delete', $data);
    }

    public function grid() {
        echo json_encode(array(
            "data" => $this->transaksi->getGridData()->result()
        ));
    }

    function add() {
        $data['title'] = 'Add - Transaksi';
        
        //$counter = $this->transaksi->getmax_transaksi();
        //$temp = "00000" . $counter;
        //$nomor = substr($temp, -5);
        //$nomortrx = 'B-' . date('y') . '-' . $nomor;
       // $data['default']['no_transaksi'] = $nomortrx;
       // $data['default']['readonly_no_transaksi'] = 'readonly'; 
        
        $data['default']['no_transaksi'] = '';
        $data['default']['tgl_transaksi'] = '';
        $data['default']['tgl_pesan'] = '';

        //  CUSTOMER 
        $resultcustomer = $this->customer->getAll();
        $i = 0;
        foreach ($resultcustomer as $rowcustomer) {
            $data['default']['id_customer'][-1]['value'] = NULL;
            $data['default']['id_customer'][-1]['display'] = '- Please Select -';
            $data['default']['id_customer'][$i]['value'] = $rowcustomer['id_customer'];
            $data['default']['id_customer'][$i]['display'] = $rowcustomer['nama_customer'];
            $i++;
        }

        //SALES
        $resultsales = $this->sales->getAll();
        $j = 0;
        foreach ($resultsales as $rowsales) {
            $data['default']['id_sales'][-1]['value'] = NULL;
            $data['default']['id_sales'][-1]['display'] = '- Please Select -';
            $data['default']['id_sales'][$j]['value'] = $rowsales['id_sales'];
            $data['default']['id_sales'][$j]['display'] = $rowsales['nama_sales'];
            $j++;
        }
        //RUMAH
        $resultrumah = $this->rumah->getAll();
        $k = 0;
        foreach ($resultrumah as $rowrumah) {
            $data['default']['id_rumah'][-1]['value'] = NULL;
            $data['default']['id_rumah'][-1]['display'] = '- Please Select -';
            $data['default']['id_rumah'][$k]['value'] = $rowrumah['id_rumah'];
            $data['default']['id_rumah'][$k]['display'] = $rowrumah['nama_rumah'];
            $k++;
        }

        $data['default']['harga'] = '';
        $data['url_post'] = site_url('c_transaksi/addpost');
        $data['url_index'] = site_url('c_transaksi');
        $data['id'] = 0;

        $this->load->view('v_transaksi/form', $data);
    }

    public function addpost() {
        $this->form_validation->set_rules('no_transaksi', 'Nomor Transaksi', 'required');
        $this->form_validation->set_rules('tgl_transaksi', 'Tanggal Transaksi', 'required');
        $this->form_validation->set_rules('tgl_pesan', 'Tanggal Pesan', 'required');
        $this->form_validation->set_rules('id_customer', 'Customer', 'required');
        $this->form_validation->set_rules('id_sales', 'Sales', 'required');
        $this->form_validation->set_rules('id_rumah', 'Rumah', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == TRUE) {
            $no_transaksi = $this->input->post('no_transaksi');
            $tgl_transaksi = date('Y-m-d', strtotime($this->input->post('tgl_transaksi')));
            $tgl_pesan = date('Y-m-d', strtotime($this->input->post('tgl_pesan')));
            $customer = $this->input->post('id_customer');
            $sales = $this->input->post('id_sales');
            $rumah = $this->input->post('id_rumah');
            $harga = $this->input->post('harga');

            $record = array(
                "no_transaksi" => $no_transaksi,
                "tgl_transaksi" => $tgl_transaksi,
                "tgl_pesan" => $tgl_pesan,
                "id_customer" => $customer,
                "id_sales" => $sales,
                "id_rumah" => $rumah,
                "harga" => $harga,
            );

            $checkdata = $this->transaksi->checkData($no_transaksi);
            if ($checkdata > 0) {
                $valid = 'false';
                $message = 'Data already exist';
                $err_no_transaksi = "Nomor Transaksi sudah ada ";
            } else {
                $valid = 'true';
                $message = 'Insert data success';
                $err_no_transaksi = null;
                $this->transaksi->insert($record);
            }


            $jsonmsg = array(
                "msg" => $message,
                "hasil" => $valid,
                "err_no_transaksi" => $err_no_transaksi,
                "err_tgl_transaksi" => null,
                "err_tgl_pesan" => null,
                "err_customer" => null,
                "err_id_sales" => null,
                "err_id_rumah" => null,
                "err_harga" => null,
            );
        } else {
            $jsonmsg = array(
                "msg" => 'Insert Data Failed',
                "hasil" => 'false',
                "err_no_transaksi" => form_error('no_transaksi'),
                "err_tgl_transaksi" => form_error('tgl_transaksi'),
                "err_tgl_pesan" => form_error('tgl_pesan'),
                "err_id_customer" => form_error('id_customer'),
                "err_id_sales" => form_error('id_sales'),
                "err_id_rumah" => form_error('id_rumah'),
                "err_harga" => form_error('harga'),
            );
        }
        echo json_encode($jsonmsg);
    }

    function edit($id) {
        $row = $this->transaksi->getby_id($id)->row();

        $data['title'] = 'Edit - Transaksi';
        $data['default']['no_transaksi'] = $row->no_transaksi;
        $data['default']['tgl_transaksi'] = date('d-m-Y', strtotime($row->tgl_transaksi));
        $data['default']['tgl_pesan'] = date('d-m-Y', strtotime($row->tgl_pesan));


        $resultcustomer = $this->customer->getAll();
        $i = 0;
        foreach ($resultcustomer as $rowcustomer) {
            $data['default']['id_customer'][$i]['value'] = $rowcustomer['id_customer'];
            $data['default']['id_customer'][$i]['display'] = $rowcustomer['nama_customer'];
            if ($row->id_customer == $rowcustomer['id_customer']) {
                $data['default']['id_customer'][$i]['selected'] = "SELECTED";
            }
            $i++;
        }

        $resultsales = $this->sales->getAll();
        $j = 0;
        foreach ($resultsales as $rowsales) {
            $data['default']['id_sales'][$j]['value'] = $rowsales['id_sales'];
            $data['default']['id_sales'][$j]['display'] = $rowsales['nama_sales'];
            if ($row->id_sales == $rowsales['id_sales']) {
                $data['default']['id_sales'][$j]['selected'] = "SELECTED";
            }
            $j++;
        }
        $resultrumah = $this->rumah->getAll();
        $k = 0;
        foreach ($resultrumah as $rowrumah) {
            $data['default']['id_rumah'][$k]['value'] = $rowrumah['id_rumah'];
            $data['default']['id_rumah'][$k]['display'] = $rowrumah['nama_rumah'];
            if ($row->id_rumah == $rowrumah['id_rumah']) {
                $data['default']['id_rumah'][$k]['selected'] = "SELECTED";
            }
            $k++;
        }

        $data['default']['harga'] = $row->harga;
        $data['url_post'] = site_url('c_transaksi/editpost');
        $data['url_index'] = site_url('c_transaksi');
        $data['id'] = $id;
        $this->load->view('v_transaksi/form', $data);
    }

    function editpost() {
        $this->form_validation->set_rules('no_transaksi', 'Nomor Transaksi', 'required');
        $this->form_validation->set_rules('tgl_transaksi', 'Tanggal Transaksi', 'required');
        $this->form_validation->set_rules('tgl_pesan', 'Tanggal Pesan', 'required');
        $this->form_validation->set_rules('id_customer', 'Customer', 'required');
        $this->form_validation->set_rules('id_sales', 'Sales', 'required');
        $this->form_validation->set_rules('id_rumah', 'Rumah', 'required');
        $this->form_validation->set_rules('harga', 'Harga ', 'required');

        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id');
            $no_transaksi = $this->input->post('no_transaksi');
            $tgl_transaksi = date('Y-m-d', strtotime($this->input->post('tgl_transaksi')));
            $tgl_pesan = date('Y-m-d', strtotime($this->input->post('tgl_pesan')));
            $id_customer = $this->input->post('id_customer');
            $id_sales = $this->input->post('id_sales');
            $id_rumah = $this->input->post('id_rumah');
            $harga = $this->input->post('harga');

            $record = array(
                "no_transaksi" => $no_transaksi,
                "tgl_transaksi" => $tgl_transaksi,
                "tgl_pesan" => $tgl_pesan,
                "id_customer" => $id_customer,
                "id_sales" => $id_sales,
                "id_rumah" => $id_rumah,
                "harga" => $harga,
            );


            $this->transaksi->update($id, $record);

            $jsonmsg = array(
                "msg" => 'Update Data Success',
                "hasil" => 'true',
                "err_no_transaksi" => null,
                "err_tgl_transaksi" => null,
                "err_tgl_pesan" => null,
                "err_id_customer" => null,
                "err_id_sales" => null,
                "err_id_rumah" => null,
                "err_harga" => null,
            );
        } else {
            $jsonmsg = array(
                "msg" => 'Update Data Failed',
                "hasil" => 'false',
                "err_no_transaksi" => form_error('no_transaksi'),
                "err_tgl_transaksi" => form_error('tgl_transaksi'),
                "err_tgl_pesan" => form_error('tgl_pesan'),
                "err_id_customer" => form_error('id_customer'),
                "err_id_sales" => form_error('id_sales'),
                "err_id_rumah" => form_error('id_rumah'),
                "err_harga" => form_error('harga'),
            );
        }
        echo json_encode($jsonmsg);
    }

    public function remove() {
        $id = $this->input->post('id_transaksi');
        $this->transaksi->delete($id);
        $jsonmsg = array(
            "msg" => 'Delete Data Succces',
            "hasil" => false
        );
        echo json_encode($jsonmsg);
    }

}
