<?php
class Anggota_model extends CI_Model 
{
    function get_all()
		{
            $data = array();
     		$Q = $this->db->get('tb_anggota');
     		
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
            $this->db->where('id_anggota',$id);
            $this->db->limit(1);
            $Q = $this->db->get('tb_anggota');
            
            if ($Q->num_rows() > 0)
                {
                    $data = $Q->row_array();
                }

            $Q->free_result();    
            return $data; 
        }
 	
 	function add()
        {
            $this->db->select('RIGHT(tb_anggota.id_anggota,6) as kode1', FALSE);
            $this->db->order_by('id_anggota','DESC');
            $this->db->limit(1);
            $query = $this->db->get('tb_anggota');
            //cek dulu apakah ada sudah ada kode di tabel.
            if($query->num_rows() <> 0)
            {
                //jika kode ternyata sudah ada.
                $data = $query->row();
                $kode = intval($data->kode1) + 1;
            }
            else
            {
                //jika kode belum ada
                $kode = 1;
            }
            $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT);
            $kodejadi = "ANGG".$kodemax;
            $data = array('id_anggota' => $kodejadi,
                          'nama' => $this->input->post('nama'),
                          'id_kelas' => $this->input->post('id_kelas'),
                          'id_agama' => $this->input->post('id_agama'),
                          'jenis_kelamin' =>$this->input->post('jk'),
                          'alamat' => $this->input->post('Alamat'),
                          'hp' => $this->input->post('hp'),
                          'ket' => $this->input->post('ket'),
                        );
            $action = $this->db->insert('tb_anggota', $data);  
            return $action;
        }
    function update($id)
        {
            $data = array(
                          'nama' => $this->input->post('nama'),
                          'id_kelas' => $this->input->post('id_kelas'),
                          'id_agama' => $this->input->post('id_agama'),
                          'jenis_kelamin' =>$this->input->post('jk'),
                          'alamat' => $this->input->post('Alamat'),
                          'hp' => $this->input->post('hp'),
                          'ket' => $this->input->post('ket'),
                        );
            $this->db->where('id_anggota', $id);
            $action = $this->db->update('tb_anggota', $data); 
            return $action;
        }
    function delete($id)
        {
            $this->db->where('id_anggota', $id);
            $action = $this->db->delete('tb_anggota');    
            return $action;
        }
}
?>