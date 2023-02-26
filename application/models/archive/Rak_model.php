<?php
class Rak_model extends CI_Model 
{
    function get_all()
		{
            $data = array();
     		$Q = $this->db->get('tb_rak');
     		
			if ($Q->num_rows() > 0) 
				{
       				foreach ($Q->result_array() as $row) 
						{
         					$data[] = $row;
       					}
    			}
				
    		$Q->free_result();  
    		return $data; 
 		}
    function get_detail_by_id($id)
        {
            $this->db->where('no_rak',$id);
            $this->db->limit(1);
            $Q = $this->db->get('tb_rak');
            
            if ($Q->num_rows() > 0)
                {
                    $data = $Q->row_array();
                }

            $Q->free_result();    
            return $data; 
        }
 	
 	function tambah_rak()
        {
            $data = array(
			'no_rak'=>$this->input->post('no_rak'),
			'nama_rak' => $this->input->post('nama_rak')
                        );
            $action = $this->db->insert('tb_rak', $data);  
            return $action;
        }
    function update($id)
        {
            $no_rak=$this->input->post('no_rak');
            $nama_rak=$this->input->post('nama_rak');
            $data = array('nama_rak' => $this->input->post('nama_rak')
                        );
           // $where = array(
           // 'no_rak' => $id,
        //);
            $this->db->where('no_rak', $no_rak);
            //$this->Rak_model->update($where,$data,'tb_rak');
            $action = $this->db->update('tb_rak', $data); 
            return $action;
        }
    function delete($id)
        {
            $this->db->where('no_rak', $id);
            $action = $this->db->delete('tb_rak');    
            return $action;
        }
}
?>