<?php

/* membuat class dengan nama Mcustomer_model */

class mo_transaksi extends CI_Model {
    /* membuat encapsulasi untuk properties %table */

    private $table;
    private $customer;
    private $sales;
    private $rumah;

    public function __construct() {
        parent::__construct();
        $this->table = "m_transaksi"; //setting di dalam $this->table dalah nama tabel sesuai di databasenya
        $this->customer = "m_customer"; //setting di dalam $this->table dalah nama tabel sesuai di databasenya
        $this->sales = "m_sales"; 
        $this->rumah = "m_rumah"; 

    }


    public function getAll() {
        return $this->db->get($this->table)->result_array();
    }

    function checkData($param) {
        $this->db->where("no_transaksi", $param);
        $result = $this->db->get($this->table)->num_rows();
        return $result;
    }

    function getGridData() {
        $query = "
                 SELECT a.*,                        
                        b.nama_customer as customer,
                        c.nama_sales as sales,
                        d.nama_rumah as rumah
                 FROM $this->table a 
                 LEFT JOIN $this->customer b ON a.id_customer = b.id_customer    
                 LEFT JOIN $this->sales c ON a.id_sales = c.id_sales    
                 LEFT JOIN $this->rumah d ON a.id_rumah = d.id_rumah    
                 ";
        return $this->db->query($query);
    }

    function insert($record) {
        $this->db->insert($this->table, $record);
    }

    function getby_id($id) {
        $this->db->where("id_transaksi", $id);
        return $this->db->get($this->table);
    }

    function update($id, $record) {
        $this->db->where("id_transaksi", $id);
        $this->db->update($this->table, $record);
    }

    function delete($id) {
        $this->db->delete($this->table, array("id_transaksi" => $id)
        );
    }

}
