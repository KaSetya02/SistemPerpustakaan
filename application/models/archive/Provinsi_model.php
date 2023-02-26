<?php
class Provinsi_model extends CI_Model 
{
    function get_all()
		{
            $data = array();
     		$Q = $this->db->get('tb_provinsi');
     		
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
            $this->db->where('id_provinsi',$id);
            $this->db->limit(1);
            $Q = $this->db->get('tb_provinsi');
            
            if ($Q->num_rows() > 0)
                {
                    $data = $Q->row_array();
                }

            $Q->free_result();    
            return $data; 
        }
 	
 	function add()
        {
            // $this->db->select('RIGHT(tb_provinsi.id_provinsi,6) as kode1', FALSE);
            // $this->db->order_by('id_provinsi','DESC');
            // $this->db->limit(1);
            // $query = $this->db->get('tb_provinsi');
            // //cek dulu apakah ada sudah ada kode di tabel.
            // if($query->num_rows() <> 0)
            // {
            //     //jika kode ternyata sudah ada.
            //     $data = $query->row();
            //     $kode = intval($data->kode1) + 1;
            // }
            // else
            // {
            //     //jika kode belum ada
            //     $kode = 1;
            // }
            // $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT);
            // $kodejadi = "ANGG".$kodemax;
            $data = array('nama_provinsi' => $this->input->post('nama_propinsi'),
                          'kota' => $this->input->post('kota')
                        );
            $action = $this->db->insert('tb_provinsi', $data);  
            return $action;
        }
    function update($id)
        {
            $data = array(
                          'nama_provinsi' => $this->input->post('nama_propinsi'),
                          'kota' => $this->input->post('kota'),                       
                        );
            $this->db->where('id_provinsi', $id);
            $action = $this->db->update('tb_provinsi', $data); 
            return $action;
        }
    function delete($id)
        {
            $this->db->where('id_provinsi', $id);
            $action = $this->db->delete('tb_provinsi');    
            return $action;
        }
}
?>