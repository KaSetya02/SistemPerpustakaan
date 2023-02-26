<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Provinsi extends CI_Controller {

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
			$data['title']='Daftar Provinsi';
			$data['pointer']="Provinsi";
			$data['classicon']="fa fa-book";
			$data['main_bread']="Data Provinsi";
			$data['sub_bread']="Daftar Provinsi";
			$data['desc']="Data Master Provinsi, Menampilkan data Provinsi";

			/*data yang ditampilkan*/
			$data['data_provinsi'] = $this->Buku_model->getAllData("tb_provinsi");
			//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
			//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
			//$data['isi']=$this->Anggota_model->get_all();
			//$data['js']=$this->load->view('admin/anggota/js');
			$tmp['content']=$this->load->view('petugas/provinsi/View_provinsi',$data, TRUE);
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
				$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
				$this->form_validation->set_rules('kota', 'kota', 'trim|required');
				if($this->form_validation->run()==FALSE)
				{
					$data['title']='Tambah Provinsi';
					$data['pointer']="Provinsi";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Provinsi";
					$data['sub_bread']="Tambah Provinsi";
					$data['desc']="form untuk Input data Provinsi";

					/*data yang ditampilkan*/
					$data['data_provinsi'] = $this->Buku_model->getAllData("tb_provinsi");
					//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					//$data['isi']=$this->Anggota_model->get_all();
					//$data['js']=$this->load->view('admin/anggota/js');
					$tmp['content']=$this->load->view('petugas/provinsi/Create_provinsi',$data, TRUE);
					$this->load->view('petugas/layout',$tmp);
				}
			 	else
				{
		            $data = array('id_provinsi' => '',
		                          'nama_provinsi' => $this->input->post('provinsi'),
		                          'kota' => $this->input->post('kota')
		                        );
					$quer=$this->Buku_model->insertData('tb_provinsi',$data);
					redirect("petugas/Provinsi","refresh");	
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
				$id = $this->input->get('id_provinsi',true);	
				$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
				$this->form_validation->set_rules('kota', 'kota', 'trim|required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Edit Anggota';
					$data['pointer']="Anggota";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Anggota";
					$data['sub_bread']="Edit Anggota";
					$data['desc']="Form untuk melakukan edit data Anggota Perpustakaan";

					/*data yang ditampilkan*/
					$data['provinsi'] = $this->Buku_model->get_detail1('tb_provinsi','id_provinsi',$id);
					//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					$tmp['content']=$this->load->view('petugas/provinsi/Edit_provinsi',$data,true);
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
				$id = $this->input->post('id_provinsi');	
				$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
				$this->form_validation->set_rules('kota', 'kota', 'trim|required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Edit Provinsi';
					$data['pointer']="Provinsi";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Provinsi";
					$data['sub_bread']="Edit Provinsi";
					$data['desc']="Form untuk melakukan edit Provinsi";

					/*data yang ditampilkan*/
					$data['provinsi'] = $this->Buku_model->get_detail1('tb_provinsi','id_provinsi',$id);
					//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					$tmp['content']=$this->load->view('petugas/provinsi/Edit_anggota',$data,true);
					$this->load->view('petugas/layout',$tmp);
				}
			 	else
				{
					$id = $this->input->post('id_provinsi');	
					$field='id_provinsi';
		            $data = array(
		                          'nama_provinsi' => $this->input->post('provinsi'),
		                          'kota' => $this->input->post('kota')
		                        );
					$quer=$this->Buku_model->updateData1('tb_provinsi',$data,$field,$id);
					redirect("petugas/Provinsi","refresh");	
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
			$field='id_provinsi';
			$id = $this->input->get('id_provinsi',true);	
  			$query = $this->Buku_model->delete('tb_provinsi',$field,$id);					
			if ($query)
				{
					$this->session->set_flashdata("message","berhasil");
					redirect("petugas/Provinsi","refresh");
				}
			else
				{
					$this->session->set_flashdata("message","gagal");
					redirect("petugas/Provinsi","refresh");
				}
 		}
}