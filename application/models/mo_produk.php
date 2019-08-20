<?php

/* membuat class dengan nama Mbrand_model */

class Mo_produk extends CI_Model {
    /* membuat encapsulasi untuk properties %table */

    private $table;
    private $brand;
    private $kategory;
    
    private $warna;

    public function __construct() {
        parent::__construct();
        $this->table = "m_produk"; //setting di dalam $this->table dalah nama tabel sesuai di databasenya
        $this->brand = "m_brand"; //setting di dalam $this->table dalah nama tabel sesuai di databasenya
        $this->kategory = "m_kategory"; //setting di dalam $this->table dalah nama tabel sesuai di databasenya
        $this->warna = "m_warna";
    }

    /* mendapatkan semua data dan hasilnya sebuah array */

    public function getAll() {
        return $this->db->get($this->table)->result_array();
    }

    function checkData($param) {
        $this->db->where("kode_produk", $param);
        $result = $this->db->get($this->table)->num_rows();
        return $result;
    }

    function getGridData() {
        $query = "
                 SELECT a.*,                        
                        b.nama_brand as brand,
                        c.nama_kategory as kategory,
                        d.nama_warna as warna,
                      
                        
                 FROM $this->table a 
                 LEFT JOIN $this->brand b ON a.id_brand = b.id_brand    
                 LEFT JOIN $this->kategory c ON a.id_kategory = c.id_kategory    
                 LEFT JOIN $this->warna d ON a.id_warna = d.id_warna    
                 ";
        return $this->db->query($query);
    }

    function insert($record) {
        $this->db->insert($this->table, $record);
    }

    function getby_id($id) {
        $this->db->where("id_produk", $id);
        return $this->db->get($this->table);
    }

    function update($id, $record) {
        $this->db->where("id_produk", $id);
        $this->db->update($this->table, $record);
    }

    function delete($id) {
        $this->db->delete($this->table, array("id_produk" => $id)
        );
    }

}
