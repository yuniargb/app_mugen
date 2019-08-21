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
        $this->load->library('parser');
        $this->load->model('Mo_kategory', 'kategory');
        $this->load->model('Mo_global', 'global');
        /* cara pemanggilan C_kategory menjadi kategory */
        /* selesai load C_kategory_model.php di folder model */
    }


    /* fungsi index yang di load pertama pada saat controller C_kategory di akses */

    public function index()
    {

        $head = 'Kategori';
        $subhead = 'List Data Kategori';
        $kategori = $this->global->getAll('m_kategori')->result_array();

        // print_r($kategori);
        
        // $json = array(
        //     'head'      => 'Kategori',
        //     'subhead'   => 'List Data Kategori',
        //     'kategori'  => $this->global->getAll('m_kategori')->result()
        // );
        // $data = ('Actions', "<div class=\"text-center\"><a class=\"tip\" title='' href='"  "'><i class=\"fa fa-list\"></i></a> <a class=\"tip\" title='' href='' data-toggle='modal' data-target='#myModal'><i class=\"fa fa-users\"></i></a> <a class=\"tip\" title='' href='' data-toggle='modal' data-target='#myModal'><i class=\"fa fa-plus-circle\"></i></a> <a class=\"tip\" title='' href='' data-toggle='modal' data-target='#myModal'><i class=\"fa fa-edit\"></i></a> <a href='#' class='tip po' title='<b></b>' data-content=\"<p></p><a class='btn btn-danger po-delete' href=''></a> <button class='btn po-close'></button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i></a></div>", 'id');

        echo '<div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">';
                    echo '<h3>'.$head.'</h3>';
                echo '</div>
                </div>
                <div class="clearfix"></div>';
                    echo '<h2>List Data '. $head .'</h2>';
                echo '<div style="float: right;">
                        <a class="btn btn-success menus" href="'.base_url('takor') .'">Tambah</a>
                    </div>
                        <div class="clearfix"></div>
                    <div class="x_content">
                        <div class="bs-example-popovers" id="alert" >
                        </div>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Kategori</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach ($kategori as $msg) {
                                echo '<tr>
                                    <td>'. $msg['id_kategori'] .'</td>
                                    <td>'. $msg['nama_kategori'] .'</td>
                                    <td>
                                        <a href="'. base_url('eddkor/' . $msg['id_kategori']) .'" class="btn btn-warning menus">Edit</a>
                                        <a href="'. base_url('hakor' . $msg['id_kategori']) .'" class="btn btn-danger menus">Hapus</a>
                                    </td>
                                </tr>';
                            }
                        echo '</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';


        
        // $this->load->view('backend/kategori/homeKategori', $data);

        
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
        
        $this->load->view('backend/kategori/addKategoriB', $data);
        
    }

    public function form(){
        echo '<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $head ?></h3>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><?= $subhead ?></h2>
                            <div style="float: right;">
                                <a class="btn btn-danger menus" href="<?= base_url('kor') ?>">Kembali</a>
                            </div>
                            <!-- <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left form-data" action="<?= $link ?>" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="hidden" id="first-name" name="id" value="<?= (isset($k)) ? $k->id_kategori : '' ?>" required="required" class="form-control col-md-7 col-xs-12">
                                        <input type="text" id="first-name" name="nama" value="<?= (isset($k)) ? $k->nama_kategori : '' ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';
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
                    'pesan' => 'data berhasil ditambahkan',
                    'to' => 'kor'
                );
                $this->session->set_flashdata('sukses', 'data berhasil disimpan');
            } else {
                $json = array(
                    'hasil' => 0,
                    'pesan' => 'data gagal ditambahkan',
                    'to' => 'kor'
                );
                $this->session->set_flashdata('gagal', 'data gagal disimpan');
            }
        } else {
            $json = array(
                'hasil' => 0,
                'pesan' => 'data gagal ditambahkan',
                'to' => 'kor'
            );
            $this->session->set_flashdata('gagal', 'data gagal disimpan');
        }
        echo json_encode($json);
    }

    public function editpost()
    {
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == TRUE) {
            $record = array(
                "nama_kategori" => $this->input->post('nama'),
            );
            $where = array('id_kategori' => $this->input->post('id'));
            $update = $this->global->update('m_kategori', $record,$where);
            if ($update > 0) {
                $json = array(
                    'hasil' => 1,
                    'pesan' => 'data berhasil ubah',
                    'to' => 'kor'
                );
                $this->session->set_flashdata('sukses', 'data berhasil disimpan');
            } else {
                $json = array(
                    'hasil' => 0,
                    'pesan' => 'data gagal ubah',
                    'to' => 'kor'
                );
                $this->session->set_flashdata('gagal', 'data gagal diubah');
            }
        } else {
           $json = array(
                'hasil' => 0,
                'pesan' => 'data gagal ubah',
                'to' => 'kor'
            );
            $this->session->set_flashdata('gagal', 'data gagal diubah');
        }
         echo json_encode($json);
    }

    /* fungsi untuk delete data */

    public function remove($id)
    {
        $record = array(
            "nama_kategori" => $this->input->post('nama'),
        );
        $where = array('id_kategori' => $id);
        $delete = $this->global->delete('m_kategori',$where);
        if ($delete > 0) {
            $json = array(
                'hasil' => 1,
                'pesan' => 'data berhasil hapus',
                'to' => 'kor'
            );
        } else {
            $json = array(
                'hasil' => 0,
                'pesan' => 'data gagal hapus',
                'to' => 'kor'
            );
        }

        /* konversi array json, yang akan terkirim ke form.php */
        echo json_encode($json);
    }
}
