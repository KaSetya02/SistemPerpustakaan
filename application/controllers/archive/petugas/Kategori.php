<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends MY_Controller {

	public function __construct()
		{
			parent::__construct();
			//$this->Security_model->login_check();
		}
	public function index()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		/*jika status login Yes dan status admin tampilkan*/
		if(!empty($cek) && $stts=='petugas')
		{
			/*layout*/	
			$data['title']='Daftar Kategori';
			$data['pointer']="Kategori";
			$data['classicon']="fa fa-book";
			$data['main_bread']="Data Kategori";
			$data['sub_bread']="Daftar Kategori";
			$data['desc']="Data Master Kategori, Menampilkan data Kategori buku";

			/*data yang ditampilkan*/
			$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
			//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
			//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
			//$data['isi']=$this->Anggota_model->get_all();
			//$data['js']=$this->load->view('admin/anggota/js');
			$tmp['content']=$this->load->view('petugas/kategori/View_kategori',$data, TRUE);
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
				$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
				if($this->form_validation->run()==FALSE)
				{
					$data['title']='Tambah Kategori';
					$data['pointer']="Kategori";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Kategori";
					$data['sub_bread']="Tambah Kategori";
					$data['desc']="form untuk Input data Ktegori";

					/*data yang ditampilkan*/
					$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
					//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					//$data['isi']=$this->Anggota_model->get_all();
					//$data['js']=$this->load->view('admin/anggota/js');
					$tmp['content']=$this->load->view('petugas/kategori/Create_kategori',$data, TRUE);
					$this->load->view('petugas/layout',$tmp);
				}
			 	else
				{
		            $data = array('id_kategori' => '',
		                          'kategori' => $this->input->post('kategori')
		                        );
					$quer=$this->Buku_model->insertData('tb_kategori',$data);
					redirect("petugas/Kategori","refresh");	
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
				$id = $this->input->get('id_kategori',true);	
				$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Edit Kategori';
					$data['pointer']="Kategori";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Kategori";
					$data['sub_bread']="Edit Kategori";
					$data['desc']="Form untuk melakukan edit data kategori buku";

					/*data yang ditampilkan*/
					$data['kategori'] = $this->Buku_model->get_detail1('tb_kategori','id_kategori',$id);
					//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					$tmp['content']=$this->load->view('petugas/kategori/Edit_kategori',$data,true);
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
				$id = $this->input->post('id_kategori');	
				$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Edit Kategori';
					$data['pointer']="Kategori";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Kategori";
					$data['sub_bread']="Edit Kategori";
					$data['desc']="Form untuk melakukan edit kategori";

					/*data yang ditampilkan*/
					$data['kategori'] = $this->Buku_model->get_detail1('tb_kategori','id_kategori',$id);
					//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					$tmp['content']=$this->load->view('petugas/kategori/Edit_kategori',$data,true);
					$this->load->view('petugas/layout',$tmp);
				}
			 	else
				{
					$id = $this->input->post('id_kategori');	
					$field='id_kategori';
		            $data = array(
		                          'kategori' => $this->input->post('kategori')
		                        );
					$quer=$this->Buku_model->updateData1('tb_kategori',$data,$field,$id);
					redirect("petugas/Kategori","refresh");	
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
			$field='id_kategori';
			$id = $this->input->get('id_kategori',true);	
  			$query = $this->Buku_model->delete('tb_kategori',$field,$id);					
			if ($query)
				{
					$this->session->set_flashdata("message","berhasil");
					redirect("petugas/Kategori","refresh");
				}
			else
				{
					$this->session->set_flashdata("message","gagal");
					redirect("petugas/Kategori","refresh");
				}
 		}
}