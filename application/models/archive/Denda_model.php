<?php
class Denda_model extends CI_Model 
{
   function __construct()
    {
        parent::__construct();
    }  
    function get_all()
		{
            $data = array();
     		$Q = $this->db->get('tb_denda');
     		
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
        function get_id($id)
        {
            $this->db->where('id_denda',$id);
            $this->db->limit(1);
            $Q = $this->db->get('tb_denda');
            
            if ($Q->num_rows() > 0)
                {
                    $data = $Q->row_array();
                }

            $Q->free_result();    
            return $data; 
        }
    function add()
        {
            $data = array(
                'id_denda' => $this->input->post('id_denda'),
                'denda' => $this->input->post('denda'),
                'status' => $this->input->post('status')
                        );
            $action = $this->db->insert('tb_denda', $data);  
            return $action;
        }
    function update($id)
        {
             $data = array(
                          'denda' => $this->input->post('denda'),
                          'status' => $this->input->post('status')
                        );
            $this->db->where('id_denda', $id);
            $action = $this->db->update('tb_denda', $data); 
            return $action;
        }
    function delete($id)
        {
            $this->db->where('id_denda', $id);
            $action = $this->db->delete('tb_denda');    
            return $action;
        }
}
?>