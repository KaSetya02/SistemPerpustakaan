<?php
class Penerbit_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function Get_all($table)
    {
        return $this->db->get($table)->result();
    }
    function add($table,$data)
    {
        $action = $this->db->insert($table, $data);  
        return $action;
    }
    function Get_by_id($table,$col,$id)
    {
        $this->db->where($col,$id);
        $Q=$this->db->get($table);
        $data = $Q->row_array();
        return $data;
    }
     function Update($table,$data,$id,$col)
    {
        $this->db->where($col,$id);
        $action=$this->db->update($table,$data);
        return $action;
    }
     function Delete($table,$id)
    {
        $this->db->where('id_penerbit', $id);
       $aks= $this->db->delete($table);
       return $aks;
    }
}
?>
