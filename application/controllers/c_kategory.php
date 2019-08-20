<?php

defined('BASEPATH') or exit('No direct script access allowed');


/* class dengan nama C_kategory */

class C_kategory extends CI_Controller
{
    /* fungsi construct ini akan di load terlebih dahulu, sebelum fungsi index
     * umumnya di dalam fungsi ini berupa settingan awal
     */

    function __construct()
    {
        parent::__construct();
        /* mulai load C_kategory_model.php di folder model */
        $this->load->model('Mo_kategory', 'kategory');
        $this->load->model('Mo_global', 'global');
        /* cara pemanggilan C_kategory menjadi kategory */
        /* selesai load C_kategory_model.php di folder model */
    }


    /* fungsi index yang di load pertama pada saat controller C_kategory di akses */

    public function index()
    {

        $data['head'] = 'Kategori';
        $data['subhead'] = 'List Data Kategori';
        $data['kategori'] = $this->global->getAll('m_kategori')->result();
        // $this->load->view('template/headB', $data);
        // $this->load->view('template/menuB', $data);
        // $this->load->view('template/sidebarB', $data);
        $this->load->view('backend/kategori/homeKategori', $data);
        // $this->load->view('template/footerB', $data);
    }

    /* fungsi untuk mendapatkan data dan menampilkan di tabel pada file home.php */

    public function add($id = null)
    {
        $data['head'] = 'Kategori';
        $data['subhead'] = 'Tambah Kategori';
        $data['link'] = base_url('addkor');
        // $this->load->view('template/headB', $data);
        // $this->load->view('template/menuB', $data);
        // $this->load->view('template/sidebarB', $data);
        $this->load->view('backend/kategori/addKategoriB', $data);
        // $this->load->view('template/footerB', $data);
    }

    public function edit($id = null)
    {
        $data['head'] = 'Kategori';
        $data['subhead'] = 'Edit Kategori';
        $data['link'] = base_url('edkor');
        $where = array('id_kategori' => $id);
        $data['k'] = $this->global->getAll('m_kategori', $where)->row();

        // print_r($data['k']);

        // $this->load->view('template/headB', $data);
        // $this->load->view('template/menuB', $data);
        // $this->load->view('template/sidebarB', $data);
        $this->load->view('backend/kategori/addKategoriB', $data);
        // $this->load->view('template/footerB', $data);
    }

    public function addpost()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == TRUE) {
            $record = array(
                "nama_kategori" => $this->input->post('nama'),
            );
            $insert = $this->global->insert('m_kategori', $record);
            if ($insert > 0) {
                $json = array(
                    'hasil' => 1,
                    'pesan' => 'data berhasil ditambahkan'
                );
            } else {
                $json = array(
                    'hasil' => 0,
                    'pesan' => 'data gagal ditambahkan'
                );
            }
        } else {
            $json = array(
                'hasil' => 0,
                'pesan' => 'data gagal ditambahkan'
            );
        }

        echo json_encode($json);
    }

    function editpost()
    {
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == TRUE) {
            $record = array(
                "nama_kategori" => $this->input->post('nama'),
            );
            $where = array('id_kategori' => $this->input->post('id'));
            $update = $this->global->update('m_kategori', $record, $where);
            if ($update > 0) {
                $this->session->set_flashdata('sukses', 'data berhasil diubah');
                redirect(base_url('index.php/c_kategory'));
            } else {
                $this->session->set_flashdata('gagal', 'data gagal diubah');
                redirect(base_url('index.php/c_kategory'));
            }
        } else {
            $data['head'] = 'Kategori';
            $data['subhead'] = 'Edit Kategori';
            $data['link'] = base_url('index.php/c_kategory/editpost');
            $this->load->view('template/headB', $data);
            $this->load->view('template/menuB', $data);
            $this->load->view('template/sidebarB', $data);
            $this->load->view('backend/kategori/addKategoriB', $data);
            $this->load->view('template/footerB', $data);
        }
    }

    /* fungsi untuk delete data */

    public function remove()
    {
        $id = $this->input->post('id_kategory'); // menangkap post dari form.php ketika edit data, dengan properties namenya adalah id_kategory
        $this->kategory->delete($id); /* mengakses model kategory, lalu ke fungsi delete dengan parameter sebuah id */

        /* membuat array, yang akan dikonversi menjadi json untuk kebutuhan ajax */
        $jsonmsg = array(
            "msg" => 'Delete Data Succces',
            "hasil" => true
        );

        /* konversi array json, yang akan terkirim ke form.php */
        echo json_encode($jsonmsg);
    }
}
