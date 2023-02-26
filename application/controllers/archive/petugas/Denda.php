<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Denda extends MY_Controller {
	
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
			$data['title']='Daftar Denda';
			$data['pointer']="Denda";
			$data['classicon']="fa fa-book";
			$data['main_bread']="Data Denda";
			$data['sub_bread']="Daftar Denda";
			$data['desc']="Data Master Denda, Menampilkan data Denda";

			/*data yang ditampilkan*/
			$data['data_denda'] = $this->Buku_model->getAllData("tb_denda");
			//$data['isi']=$this->Anggota_model->get_all();
			//$data['js']=$this->load->view('admin/denda/js');
			$tmp['content']=$this->load->view('petugas/denda/View_denda',$data, TRUE);
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
				$this->form_validation->set_rules('denda', 'denda', 'required');
				$this->form_validation->set_rules('status', 'status', 'required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Daftar Denda';
					$data['pointer']="Denda";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Denda";
					$data['sub_bread']="Tambah Denda";
					$data['desc']="Data Master Denda, Menampilkan data denda";

					/*data yang ditampilkan*/
					$data['data_denda'] = $this->Buku_model->getAllData("tb_denda");
					$tmp['content']=$this->load->view('petugas/denda/Create_denda',$data,true);
					$this->load->view('petugas/layout',$tmp);
				}
			 	else
				{
					
		            $data = array('id_denda' =>'',
		                          'denda' => $this->input->post('denda'),
		                          'status' => $this->input->post('status'),
		                        );
					$query=$this->Buku_model->insertData('tb_denda',$data);
						redirect("petugas/Denda/index","refresh");	
					
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
				$id = $this->input->get('id_denda',true);	
				$this->form_validation->set_rules('denda', 'denda', 'required');
				$this->form_validation->set_rules('status', 'status', 'required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Daftar Denda';
					$data['pointer']="Denda";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Denda";
					$data['sub_bread']="Edit Denda";
					$data['desc']="Form untuk melakukan edit data denda";

					/*data yang ditampilkan*/
					$data['denda'] = $this->Buku_model->get_detail1('tb_denda','id_denda',$id);
					$tmp['content']=$this->load->view('petugas/denda/Edit_denda',$data,true);
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
				$id = $this->input->post('id_denda');	
				$this->form_validation->set_rules('denda', 'denda', 'required');
				$this->form_validation->set_rules('status', 'status', 'required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Daftar Denda';
					$data['pointer']="Denda";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Denda";
					$data['sub_bread']="Edit Denda";
					$data['desc']="Form untuk melakukan edit data denda";

					/*data yang ditampilkan*/
					$data['denda'] = $this->Buku_model->get_detail1('tb_denda','id_denda',$id);
					$tmp['content']=$this->load->view('petugas/denda/Edit_denda',$data,true);
					$this->load->view('petugas/layout',$tmp);
				}
			 	else
				{
					$id = $this->input->post('id_denda');	
					$field='id_denda';
		            $data = array(
		                          'denda' => $this->input->post('denda'),
		                          'status' => $this->input->post('status'),
		                        );
					$quer=$this->Buku_model->updateData1('tb_denda',$data,$field,$id);
					redirect("petugas/Denda","refresh");	
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
			$id = $this->input->get('id_denda',true);
			$field='id_denda';
  			$query = $this->Buku_model->delete('tb_denda',$field,$id);					
			if ($query)
				{
					$this->session->set_flashdata("message","berhasil");
					redirect("petugas/Denda","refresh");
				}
			else
				{
					$this->session->set_flashdata("message","gagal");
					redirect("petugas/Denda","refresh");
				}
 		}
}