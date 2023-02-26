<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_kategori extends CI_Model {

	public function __construct()	{
		$this->load->database();
	}

	
	// Menampilkand data berita
	public function daftar_kategori() {
		$query = $this->db->query('SELECT * from tb_kategori');
		return $query->result_array();
	}
	/*public function foto($data) {
		$query = $this->db->query("SELECT * from tb_login where username = '$data'");
		return $query->result_array();
	}*/
	// Model untuk menambah 
	public function tambah($data) {
		return $this->db->insert('tb_kategori', $data);
	}
	
	 /*public function get(){
 		return $this->db->get('agama');
		
	 }
	 
	  public function jurusan(){
 		return $this->db->get('jurusan');
		
	 }
	public function get_provinsi() {
  
		  $query = $this->db->get('provinsi');
		  return $query->result();
  
  }*/
  
  /* fungsi untuk memanggil data pada table kota*/
 /*public function get_kota() {
  
		  $query = $this->db->get('kabupaten');
		  return $query->result();
  
  }*/

	/*public function read_data($id_kategori) {
		$query=$this->db->query("SELECT * FROM tb_kategori where id_kategori='".$id_kategori."' limit 1");
		
			return $query->result_array();	*/
	public function read_data($id_kategori = FALSE) {
		if ($id_kategori === FALSE)	{
			$query = $this->db->query('SELECT * from tb_kategori where 
								    
								   tb_kategori.id_kategori=tb_kategori.id_kategori and tb_kategori.kategori=tb_kategori.kategori 
								  ');
		
			return $query->result_array();
	}
		 $query = $this->db->get_where('tb_kategori', array('id_kategori' => $id_kategori,) );
 		return $query->row_array();
	}
	public function edit_data($data) {
		$this->db->where('id_kategori', $data['id_kategori']);
		return $this->db->update('tb_kategori', $data);
	}
	
	public function delete($id) {
		$this->db->where('id_kategori',$id);
		return $this->db->delete('tb_kategori');
	}
	public function cari($key)
	{
		$data=array();
		$this->db->select('*');
		$this->db->like('id_kategori',$key);
		$this->db->order_by('id_kategori desc');
		$q=$this->db->get('tb_kategori');
		if ($q->num_rows()>0)
		{
			foreach ($q->result_array() as $row)
			{
				$data[]=$row;
			}
		}
		$q->free_result();
		return $data;
	}
	
}