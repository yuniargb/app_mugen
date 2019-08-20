<?php

class Mo_kategory extends CI_Model {
    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = "m_kategory";
    }

    public function getAll() {
        return $this->db->get($this->table)->result_array();
    }

    function checkData($param){
        $this->db->where("nama_kategory",$param);
        $result= $this->db->get($this->table)->num_rows();  
        return $result;
    }
    
    function getGridData() {
        $query = "
                 SELECT a.*                        
                 FROM $this->table a   
                 ";
        return $this->db->query($query);      
    }
  
    function insert($record) {
        $this->db->insert($this->table, $record);
    }

    function getby_id($id) {
        $this->db->where("id_kategory", $id);
        return $this->db->get($this->table);
    }

    function update($id, $record) {
        $this->db->where("id_kategory", $id);
        $this->db->update($this->table, $record);
    }

    function delete($id) {
        $this->db->delete($this->table, array("id_kategory" => $id)
        );
    }

}
