<?php

defined('BASEPATH') or exit('No direct script access allowed');


/* class dengan nama C_kategory */

class C_kategory extends CI_Controller
{
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
     public function ajax_list()
    {
        $list = $this->kategory->get_datatables();
        $data = array();
        $no = isset($_POST['start']);
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $l->id_kategori;
            $row[] = $l->nama_kategori;
            $row[] = '<a href="'. base_url('eddkor/' . $l->id_kategori) .'" class="btn btn-warning menus">Edit</a>
                                            <form class="form-data" method="post" action="'. base_url('hakor').'">
                                                <input type="hidden" name="id" value="'. $l->id_kategori.'">
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => isset($_POST['draw']),
                        "recordsTotal" => $this->kategory->count_all(),
                        "recordsFiltered" => $this->kategory->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function kats($al)
    {

        $head = 'Kategori';
        $subhead = 'List Data Kategori';
        $kategori = $this->global->getAll('m_kategori')->result_array();


        if($al == 'ads'){
            $pes = 'Data berhasil ditambahkan!';
            $stat = 1;
        }elseif($al == 'adg'){
            $pes = 'Data gagal ditambahkan!';
            $stat = 0;
        }elseif($al == 'eds'){
            $pes = 'Data berhasil dubah!';
            $stat = 1;
        }elseif($al == 'edg'){
            $pes = 'Data gagal dubah!';
            $stat = 0;
        }elseif($al == 'res'){
            $pes = 'Data berhasil dihapus!';
            $stat = 1;
        }elseif($al == 'reg'){
            $pes = 'Data gagal dihapus!';
            $stat = 0;
        }else{
            $pes = '';
            $stat = 1;
        }

        echo '<div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">';
                    echo '<h3>'.$head.'</h3>';
                echo '</div>
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">';
                    echo '<h2>'. $subhead .'</h2>';
                echo '<div style="float: right;">
                        <a class="btn btn-success menus" href="'.base_url('takor') .'">Tambah</a>
                    </div>
                        <div class="clearfix"></div>
                    <div class="x_content">
                        <div class="bs-example-popovers" id="alert" >';
                            if($pes != ''){
                                if($stat == 1){
                                    echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        '.$pes.'
                                    </div>';
                                    } 
                                if($stat == 0){ 
                                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        '.$pes.'
                                    </div>';
                                    } 
                                }
                        echo '</div>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID Kategori</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>';
                        echo '</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
	$("#datatable").DataTable({
		"processing": true, //Feature control the processing indicator.
		"serverSide": true, //Feature control DataTables" server-side processing mode.
		"order": [], //Initial no order.

		// Load data for the table"s content from an Ajax source
		"ajax": {
			"url": baseUrl("datak"),
			"type": "POST"
		},

		//Set column definition initialisation properties.
		"columnDefs": [{
			"targets": [0], //first column / numbering column
			"orderable": false, //set not orderable
		}, ],
    });
});
</script>';
        // $this->load->view('backend/kategori/homeKategori', $data);
    }

    /* fungsi untuk mendapatkan data dan menampilkan di tabel pada file home.php */

    public function add($id = null)
    {
        $head = 'Kategori';
        $subhead = 'Tambah Kategori';
        $link = base_url('addkor');

         echo '<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>'.$head.'</h3>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>'.$subhead.'</h2>
                            <div style="float: right;">
                                <a class="btn btn-danger menus" href="'.base_url('kor/dis').'">Kembali</a>
                            </div>
                            <!-- <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left form-data" action="'. $link .'" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="hidden" id="first-name" name="id" value=" required="required" class="form-control col-md-7 col-xs-12">
                                        <input type="text" id="first-name" name="nama" value="" required="required" class="form-control col-md-7 col-xs-12">
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

    public function edit($id = null)
    {
        $head = 'Kategori';
        $subhead = 'Edit Kategori';
        $link = base_url('edkor');
        $where = array('id_kategori' => $id);
        $k = $this->global->getAll('m_kategori', $where)->row_array();
        
        echo '<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>'.$head.'</h3>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>'.$subhead.'</h2>
                            <div style="float: right;">
                                <a class="btn btn-danger menus" href="'.base_url('kor/dis').'">Kembali</a>
                            </div>
                            <!-- <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left form-data" action="'. $link .'" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="hidden" id="first-name" name="id" value="'.$k['id_kategori'].'" required="required" class="form-control col-md-7 col-xs-12">
                                        <input type="text" id="first-name" name="nama" value="'.$k['nama_kategori'].'" required="required" class="form-control col-md-7 col-xs-12">
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
                    'to' => 'kor/ads'
                );
                
            } else {
                $json = array(
                    'hasil' => 0,
                    'pesan' => 'data gagal ditambahkan',
                    'to' => 'kor/adg'
                );
            }
        } else {
            $json = array(
                'hasil' => 0,
                'pesan' => 'data gagal ditambahkan',
                'to' => 'kor/adg'
            );
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
                    'to' => 'kor/eds'
                );
            } else {
                $json = array(
                    'hasil' => 0,
                    'pesan' => 'data gagal ubah',
                    'to' => 'kor/edg'
                );
            }
        } else {
           $json = array(
                'hasil' => 0,
                'pesan' => 'data gagal ubah',
                'to' => 'kor/edg'
            );
        }
         echo json_encode($json);
    }

    /* fungsi untuk delete data */

    public function remove()
    {
        $id = $this->input->post('id');
        $where = array('id_kategori' => $id);
        $delete = $this->global->delete('m_kategori',$where);
        if ($delete > 0) {
            $json = array(
                'hasil' => 1,
                'pesan' => 'data berhasil hapus',
                'to' => 'kor/res'
            );
        } else {
            $json = array(
                'hasil' => 0,
                'pesan' => 'data gagal hapus',
                'to' => 'kor/reg'
            );
        }

        /* konversi array json, yang akan terkirim ke form.php */
        echo json_encode($json);
    }
}
