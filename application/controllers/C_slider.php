<?php

defined('BASEPATH') or exit('No direct script access allowed');


/* class dengan nama C_size */

class C_slider extends CI_Controller
{
    /* fungsi construct ini akan di load terlebih dahulu, sebelum fungsi index
     * umumnya di dalam fungsi ini berupa settingan awal
     */

    function __construct()
    {
        parent::__construct();
        /* mulai load C_size_model.php di folder model */
        $this->load->model('Mo_slider', 'slider');
        /* cara pemanggilan C_size menjadi size */
        /* selesai load C_size_model.php di folder model */
    }


    /* fungsi index yang di load pertama pada saat controller C_size di akses */

    public function index()
    {

        /* setting array key untuk di home.php agar urlnya dinamis, maka 
         * ketika copy home.php hanya mengubah parameternya di controller saja
         */
        $data = array(
            "base" => base_url(),
            "url_grid" => site_url('c_slider/grid'),
            "url_add" => site_url('c_slider/add'),
            "url_edit" => site_url('c_slider/edit'),
            "url_delete" => site_url('c_slider/remove'),
        );
        $this->load->view('v_slider/home', $data);
        /* mengakses folder v_slider, lalu ke file home.php, 
         * dengan mengirim variabel data yang isinya array */
        $this->load->view('v_slider/confirm_delete', $data);
        /* mengakses folder v_slider, lalu ke file confirm_delete.php,
         *  dengan mengirim variabel data yang isinya array */
    }

    /* fungsi untuk mendapatkan data dan menampilkan di tabel pada file home.php */

    public function grid()
    {
        echo json_encode(array(
            "data" => $this->slider->getGridData()->result()
        ));
    }

    /* fungsi ini akan mengakses form untuk kebutuhan add 
     * data, lalu setting array terhadap inputannya
     */

    function add()
    {
        $data['title'] = 'Add - Slider'; //setting judul, yang akan berubah di form.php
        $data['default']['nama'] = ''; // setting input dengan nama, ini untuk nama_size defaultnya kosong
        $data['url_post'] = site_url('C_slider/addpost'); //membuat url_post dengan parameter ke controllernya lalu ke fungsi addpost,dalam fungsi addpost akan menyisiplkan ke database
        $data['url_index'] = site_url('C_slider'); //membuat url_index dengan parameter balik lagi ke controllernya, otomatis akan masuk ke fungsi index
        $data['id'] = 0; //pads saat add data, id dibuat menjadi 0

        $this->load->view('v_slider/form', $data);
        /* mengakses folder v_size, lalu ke file form.php, 
         * dengan mengirim variabel data yang isinya array */
    }


    /* fungsi untuk post data ketika melakukan add data, fungsi ini akan masuk ke database */

    public function addpost()
    {
        $this->form_validation->set_rules('judul', 'Nama', 'required'); //pengecekan, jika properties input nama kosong, data tidak akan tersimpan,dan field tersebut harus diisi
        $this->form_validation->set_rules('deskripsi', 'Nama', 'required'); //pengecekan, jika properties input nama kosong, data tidak akan tersimpan,dan field tersebut harus diisi
        $this->form_validation->set_rules('gambar', 'Nama', 'required'); //pengecekan, jika properties input nama kosong, data tidak akan tersimpan,dan field tersebut harus diisi
        if ($this->form_validation->run() == TRUE) { // jika field yang dibutuhkan telah terisi maka nilai true
            $judul = $this->input->post('judul'); // menangkap post dari form.php ketika add data, dengan properties namenya adalah nama
            $deskripsi = $this->input->post('deskripsi'); // menangkap post dari form.php ketika add data, dengan properties namenya adalah nama
            $gambar = $this->input->post('gambar'); // menangkap post dari form.php ketika add data, dengan properties namenya adalah nama

            /* membuat record sebuah array, array ini akan masuk ke database */
            $record = array(
                "judul_slider" => $judul,
                "deskripsi_slider" => $deskripsi,
                "gambar_slider" => $gambar,
            );
            $upload = $this->GambarModel->upload();
            if ($upload['result'] == "success") { // Jika proses upload sukses
                $checkdata = $this->slider->checkdata($record); // melakukan pengecekan data
                if ($checkdata > 0) { /* jika data bernilai lebih dari 0, maka data tidak tersimpan, karena sudah ada */
                    $valid = 'false';
                    $message = 'data already exist';
                    $err_name = "Data sudah ada";
                } else { /* jika data belum ada,maka berhasil di simpan */
                    $this->slider->insert($record);
                    $valid = 'true';
                    $message = "Insert data, success";
                    $err_name = null;
                }

                /* membuat array, yang akan dikonversi menjadi json untuk kebutuhan ajax */
                $jsonmsg = array(
                    "msg" => $message,
                    "hasil" => $valid,
                    "err_nama" => $err_name,
                );
            } else { // Jika proses upload gagal
                // Echo hasil dari proses dengan tanda pemisah <|>
                echo "FAILED<|>" . $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        } else {
            /* membuat array, yang akan dikonversi menjadi json untuk kebutuhan ajax */
            $jsonmsg = array(
                "msg" => 'Insert Data Failed',
                "hasil" => 'false',
                "err_nama" => form_error('slider'),
            );
        }

        /* konversi array json, yang akan terkirim ke form.php */
        echo json_encode($jsonmsg);
    }

    /* fungsi edit ini akan mensetting nilai-nilai di form ketika mengklik tombol edit */

    public function edit($id)
    {
        $row = $this->slider->getby_id($id)->row(); /* mendapatkan nilai data berdasarkan id, dan berupa row, yaitu 1 data */
        $data['title'] = 'Edit - Slider';
        $data['default']['nama'] = $row->id_slider; /* setting isi properties nama dengan datanya */

        $data['url_post'] = site_url('c_slider/editpost'); //membuat url_post dengan parameter ke controllernya lalu ke fungsi editpost,dalam fungsi addpost akan menyisiplkan ke database
        $data['url_index'] = site_url('c_slider'); //membuat url_index dengan parameter balik lagi ke controllernya, otomatis akan masuk ke fungsi index
        $data['id'] = $id; /* id akan bernilai sesuai data yang di edit */
        $this->load->view('v_slider/form', $data); /* mengakses folder v_size, lalu ke file form.php, dengan mengirim variabel data yang isinya array */
    }

    /* fungsi untuk post data ketika melakukan edit data, fungsi ini akan masuk ke database */

    public function editpost()
    {
        $this->form_validation->set_rules('judul', 'Nama', 'required'); //pengecekan, jika properties input nama kosong, data tidak akan tersimpan,dan field tersebut harus diisi
        $this->form_validation->set_rules('deskripsi', 'Nama', 'required'); //pengecekan, jika properties input nama kosong, data tidak akan tersimpan,dan field tersebut harus diisi
        $this->form_validation->set_rules('gambar', 'Nama', 'required'); //pengecekan, jika properties input nama kosong, data tidak akan tersimpan,dan field tersebut harus diisi
        if ($this->form_validation->run() == TRUE) { // jika field yang dibutuhkan telah terisi maka nilai true
            $id = $this->input->post('id_slider'); // menangkap post dari form.php ketika edit data, dengan properties namenya adalah id
            $judul = $this->input->post('judul'); // menangkap post dari form.php ketika add data, dengan properties namenya adalah nama
            $deskripsi = $this->input->post('deskripsi'); // menangkap post dari form.php ketika add data, dengan properties namenya adalah nama
            $gambar = $this->input->post('gambar'); // menangkap post dari form.php ketika add data, dengan properties namenya adalah nama

            /* membuat record sebuah array, array ini akan masuk ke database */
            $record = array(
                "judul_slider" => $judul,
                "deskripsi_slider" => $deskripsi,
                "gambar_slider" => $gambar,
            );

            /* update ke database dengan memanggil model size, ke fungsi edit, dan mengirim parameter sebuah id, dan datanya berupa record */
            $this->slider->update($id, $record);

            /* membuat array, yang akan dikonversi menjadi json untuk kebutuhan ajax */
            $jsonmsg = array(
                "msg" => 'Update Data Success',
                "hasil" => 'true',
                "err_nama" => null,
            );
        } else {
            /* membuat array, yang akan dikonversi menjadi json untuk kebutuhan ajax */
            $jsonmsg = array(
                "msg" => 'Update Data Failed',
                "hasil" => 'false',
                "err_nama" => form_error('slider'),
            );
        }
        /* konversi array json, yang akan terkirim ke form.php */
        echo json_encode($jsonmsg);
    }

    /* fungsi untuk delete data */

    public function remove()
    {
        $id = $this->input->post('id_slider'); // menangkap post dari form.php ketika edit data, dengan properties namenya adalah id_size
        $this->slider->delete($id); /* mengakses model size, lalu ke fungsi delete dengan parameter sebuah id */

        /* membuat array, yang akan dikonversi menjadi json untuk kebutuhan ajax */
        $jsonmsg = array(
            "msg" => 'Delete Data Succces',
            "hasil" => true
        );

        /* konversi array json, yang akan terkirim ke form.php */
        echo json_encode($jsonmsg);
    }
}
