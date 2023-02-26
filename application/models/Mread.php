<?php    
class Mread extends CI_Model{

    function export_kontak(){
        $query = $this->db->query("SELECT * from tb_login");
        
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}