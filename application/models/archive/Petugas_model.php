<?php
class Petugas_model extends CI_Model 
{

	function get_all()
		{
     		$data = array();
			$this->db->select('*');
			$this->db->order_by('id_petugas desc');
     		$Q = $this->db->get('tb_petugas');
			
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
           // return $this->db->get($table)->result();
            $this->db->where('id_petugas',$id);
            $this->db->limit(1);
            $Q = $this->db->get('tb_petugas');
            
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
                            'id_petugas' => $this->input->post('id_petugas'),
                            'nama' => $this->input->post('nama'),
                            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                            'alamat' => $this->input->post('alamat'),
                            'id_agama' => $this->input->post('id_agama'),
                            'hp' => $this->input->post('hp'),
                            'ket' => $this->input->post('ket')
                            
        );
        $action = $this->db->insert("tb_petugas", $data);
        return $action;
        }
        function update($id)
        {
            $data = array(
                            //'id_petugas' => $this->input->post('id_petugas'),
                            'nama' => $this->input->post('nama'),
                            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                            'alamat' => $this->input->post('alamat'),
                            'id_agama' => $this->input->post('id_agama'),
                            'hp' => $this->input->post('hp'),
                            'ket' => $this->input->post('ket'),
                        );

            $this->db->where('id_petugas', $id);
            $action = $this->db->update('tb_petugas', $data);    
            return $action;
        }
    
    function delete($id)
        {
            $this->db->where('id_petugas', $id);
            $action = $this->db->delete('tb_petugas');   
            return $action;
        }   
    }
?>