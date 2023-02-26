<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengarang extends MY_Controller {

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
			$data['title']='Daftar Pengarang';
			$data['pointer']="Pengarang";
			$data['classicon']="fa fa-book";
			$data['main_bread']="Data Pengarang";
			$data['sub_bread']="Daftar Pengarang";
			$data['desc']="Data Master Pengarang, Menampilkan data Pengarang buku";

			/*data yang ditampilkan*/
			$data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
			//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
			//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
			//$data['isi']=$this->Anggota_model->get_all();
			//$data['js']=$this->load->view('admin/anggota/js');
			$tmp['content']=$this->load->view('petugas/pengarang/View_pengarang',$data, TRUE);
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
				$this->form_validation->set_rules('nama_pengarang', 'nama_pengarang', 'trim|required');
				if($this->form_validation->run()==FALSE)
				{
					$data['title']='Tambah Pengarang';
					$data['pointer']="Pengarang";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Pengarang";
					$data['sub_bread']="Tambah Pengarang";
					$data['desc']="form untuk Input data Pengarang";

					/*data yang ditampilkan*/
					$data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
					//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					//$data['isi']=$this->Anggota_model->get_all();
					//$data['js']=$this->load->view('admin/anggota/js');
					$tmp['content']=$this->load->view('petugas/pengarang/Create_pengarang',$data, TRUE);
					$this->load->view('petugas/layout',$tmp);
				}
			 	else
				{
		            $data = array('id_pengarang' => '',
		                          'nama_pengarang' => $this->input->post('nama_pengarang')
		                        );
					$quer=$this->Buku_model->insertData('tb_pengarang',$data);
					redirect("petugas/Pengarang","refresh");	
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
				$id = $this->input->get('id_pengarang',true);	
				$this->form_validation->set_rules('nama_pengarang', 'nama_pengarang', 'trim|required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Edit Pengarang';
					$data['pointer']="Pengarang";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Pengarang";
					$data['sub_bread']="Edit Pengarang";
					$data['desc']="Form untuk melakukan edit data Pengarang buku";

					/*data yang ditampilkan*/
					$data['pengarang'] = $this->Buku_model->get_detail1('tb_pengarang','id_pengarang',$id);
					//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					$tmp['content']=$this->load->view('petugas/pengarang/Edit_pengarang',$data,true);
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
				$id = $this->input->post('id_pengarang');	
				$this->form_validation->set_rules('nama_pengarang', 'nama_pengarang', 'trim|required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Edit Pengarang';
					$data['pointer']="Pengarang";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Pengarang";
					$data['sub_bread']="Edit Pengarang";
					$data['desc']="Form untuk melakukan edit pengarang buku";

					/*data yang ditampilkan*/
					$data['pengarang'] = $this->Buku_model->get_detail1('tb_pengarang','id_pengarang',$id);
					//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					$tmp['content']=$this->load->view('petugas/pengarang/Edit_pengarang',$data,true);
					$this->load->view('petugas/layout',$tmp);
				}
			 	else
				{
					$id = $this->input->post('id_pengarang');	
					$field='id_pengarang';
		            $data = array(
		                          'nama_pengarang' => $this->input->post('nama_pengarang')
		                        );
					$quer=$this->Buku_model->updateData1('tb_pengarang',$data,$field,$id);
					redirect("petugas/Pengarang","refresh");	
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
			$field='id_pengarang';
			$id = $this->input->get('id_pengarang',true);	
  			$query = $this->Buku_model->delete('tb_pengarang',$field,$id);					
			if ($query)
				{
					$this->session->set_flashdata("message","berhasil");
					redirect("petugas/Pengarang","refresh");
				}
			else
				{
					$this->session->set_flashdata("message","gagal");
					redirect("petugas/Pengarang","refresh");
				}
 		}
}