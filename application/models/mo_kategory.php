<?php

class Mo_kategory extends CI_Model
{
    var $table = 'm_kategori';
    var $column_order = array('','id_kategori','nama_kategori'); //set column field database for datatable orderable
    var $column_search =array('id_kategori','nama_kategori'); //set column field database for datatable searchable 
    var $order = array('id_kategori' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
    }

     private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if(isset($_POST['length']) != -1)
        $this->db->limit(isset($_POST['length']), isset($_POST['start']));
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // public function getAll()
    // {
    //     return $this->db->get($this->table)->result_array();
    // }

    // function checkData($param)
    // {
    //     $this->db->where("nama_kategori", $param);
    //     $result = $this->db->get($this->table)->num_rows();
    //     return $result;
    // }

    // function getGridData()
    // {
    //     $query = "
    //              SELECT a.*                        
    //              FROM $this->table a   
    //              ";
    //     return $this->db->query($query);
    // }

    // function insert($record)
    // {
    //     $this->db->insert($this->table, $record);
    // }

    // function getby_id($id)
    // {
    //     $this->db->where("id_kategory", $id);
    //     return $this->db->get($this->table);
    // }

    // function update($id, $record)
    // {
    //     $this->db->where("id_kategory", $id);
    //     $this->db->update($this->table, $record);
    // }

    // function delete($id)
    // {
    //     $this->db->delete(
    //         $this->table,
    //         array("id_kategory" => $id)
    //     );
    // }
}
