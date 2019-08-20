<?php

class Mo_slider extends CI_Model
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = "m_slider";
    }

    // Fungsi untuk melakukan proses upload file
    public function upload()
    {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('input_gambar')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    function checkData($param)
    {
        $this->db->where($param);
        $result = $this->db->get($this->table)->num_rows();
        return $result;
    }

    function getGridData()
    {
        $query = "SELECT a.*                        
                 FROM $this->table a   
                 ";
        return $this->db->query($query);
    }

    function insert($record)
    {
        $this->db->insert($this->table, $record);
    }

    function getby_id($id)
    {
        $this->db->where("id_slider", $id);
        return $this->db->get($this->table);
    }

    function update($id, $record)
    {
        $this->db->where("id_slider", $id);
        $this->db->update($this->table, $record);
    }

    function delete($id)
    {
        $this->db->delete(
            $this->table,
            array("id_slider" => $id)
        );
    }
}
