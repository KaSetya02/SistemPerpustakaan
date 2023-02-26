<?php
class Pengarang_model extends CI_Model 
{
    function get_all()
		{
            $data = array();
     		$Q = $this->db->get('tb_pengarang');
     		
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
            $this->db->where('id_pengarang',$id);
            $this->db->limit(1);
            $Q = $this->db->get('tb_pengarang');
            
            if ($Q->num_rows() > 0)
                {
                    $data = $Q->row_array();
                }

            $Q->free_result();    
            return $data; 
        }
 	
 	function add()
        {
            $data = array('id_pengarang' => '',
                          'nama_pengarang' => $this->input->post('nama'),
                          //'id_agama' => $this->input->post('id_agama'),
                          //'jenis_kelamin' =>'',
                          //'alamat' => $this->input->post('Alamat'),
                          //'hp' => $this->input->post('hp'),
                          //'ket' => $this->input->post('ket'),
                        );
            $action = $this->db->insert('tb_pengarang', $data);  
            return $action;
        }
    function update($id)
        {
            $data = array(
                          'nama_pengarang' => $this->input->post('nama'),
                        );
            $this->db->where('id_pengarang', $id);
            $action = $this->db->update('tb_pengarang', $data); 
            return $action;
        }
    function delete($id)
        {
            $this->db->where('id_pengarang', $id);
            $action = $this->db->delete('tb_pengarang');    
            return $action;
        }
}
?>