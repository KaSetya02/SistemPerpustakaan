<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rak extends MY_Controller {
	
	public function __construct()
		{
			parent::__construct();
			//$this->Security_model->login_check();
		}
	public function index(){
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		/*jika status login Yes dan status admin tampilkan*/
		if(!empty($cek) && $stts=='petugas')
		{
			/*layout*/	
			$data['title']='Daftar Rak';
			$data['pointer']="Rak";
			$data['classicon']="fa fa-book";
			$data['main_bread']="Data Rak";
			$data['sub_bread']="Daftar Rak";
			$data['desc']="Data Master Rak, Menampilkan data Rak Perpustakaan";

			/*data yang ditampilkan*/
			$data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
			$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
			//$data['isi']=$this->Anggota_model->get_all();
			//$data['js']=$this->load->view('admin/anggota/js');
			$tmp['content']=$this->load->view('petugas/rak/View_rak',$data, TRUE);
			$this->load->view('petugas/layout',$tmp);
		}
		else
		/*jika status login NO atau status bukan admin kembalikan ke login*/
		{
			header('location:'.base_url().'web/log');
		}
	}
	public function create()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='petugas')
		{	
				$this->form_validation->set_rules('nama_rak', 'nama_rak', 'required');
				$this->form_validation->set_rules('kategori', 'kategori', 'required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Daftar Rak';
					$data['pointer']="Rak";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Rak";
					$data['sub_bread']="Tambah Rak";
					$data['desc']="Data Master Rak, Menampilkan data Rak Perpustakaan";

					/*data yang ditampilkan*/
					$data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
					$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
					$tmp['content']=$this->load->view('petugas/rak/Create_rak',$data, TRUE);
					$this->load->view('petugas/layout',$tmp);
				}
			 	else
				{
					/*$this->db->select('RIGHT(tb_anggota.id_anggota,6) as kode1', FALSE);
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
		            $kodejadi = "ANGG".$kodemax;*/
		            $data = array('no_rak' => '',
		                          'nama_rak' => $this->input->post('nama_rak'),
		                          'id_kategori' => $this->input->post('kategori'),
		                        );
					$query=$this->Buku_model->insertData('tb_rak',$data);
					//if ($query)
					//{
						//$this->session->set_flashdata("message","berhasil!!!");
						redirect("petugas/Rak","refresh");	
					//}
					/*else
					{
						$this->session->set_flashdata("message","gagal!!!");
						redirect("admin/Rak/create","refresh");	
					}*/
				}
		}
		else
		{
			header('location:'.base_url().'web/log');
		}
	}
	
	public function edit()
	{ 
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
  		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='petugas')
		{		
				$id = $this->input->get('no_rak',true);	
				$this->form_validation->set_rules('nama_rak', 'nama_rak', 'required');
				$this->form_validation->set_rules('kategori', 'kategori', 'required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Edit Rak';
					$data['pointer']="Rak";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Rak";
					$data['sub_bread']="Edit Rak";
					$data['desc']="Form untuk melakukan edit data Rak Perpustakaan";

					/*data yang ditampilkan*/
					$data['rak'] = $this->Buku_model->get_detail1('tb_rak','no_rak',$id);
					$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
					$tmp['content']=$this->load->view('petugas/rak/Edit_rak',$data,true);
					$this->load->view('petugas/layout',$tmp);
				}
		}
		else
		{
			header('location:'.base_url().'web/log');
		}
 	}
 	public function update()
	{ 
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
  		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='petugas')
		{		
				$id = $this->input->post('id_rak');	
				$this->form_validation->set_rules('nama_rak', 'nama_rak', 'required');
				$this->form_validation->set_rules('kategori', 'kategori', 'required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Edit Rak';
					$data['pointer']="Rak";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Rak";
					$data['sub_bread']="Edit Rak";
					$data['desc']="Form untuk melakukan edit data Rak Perpustakaan";

					/*data yang ditampilkan*/
					$data['rak'] = $this->Buku_model->get_detail1('tb_rak','no_rak',$id);
					$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
					$tmp['content']=$this->load->view('petugas/rak/Edit_rak',$data,true);
					$this->load->view('petugas/layout',$tmp);
				}
			 	else
				{
					$id = $this->input->post('no_rak');	
					$field='no_rak';
		            $data = array(
		                          'nama_rak' => $this->input->post('nama_rak'),
		                          'id_kategori' => $this->input->post('kategori'),
		                        );
					$quer=$this->Buku_model->updateData1('tb_rak',$data,$field,$id);
					redirect("petugas/Rak","refresh");	
				}
		}
		else
		{
			header('location:'.base_url().'web/log');
		}
 	}
 	public function delete()
		{
			$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
			$id = $this->input->get('no_rak',true);	
			$field='no_rak';
  			$query = $this->Buku_model->delete('tb_rak',$field,$id);					
			if ($query)
				{
					$this->session->set_flashdata("message","berhasil");
					redirect("petugas/Rak","refresh");
				}
			else
				{
					$this->session->set_flashdata("message","gagal");
					redirect("petugas/Rak","refresh");
				}
 		}
}