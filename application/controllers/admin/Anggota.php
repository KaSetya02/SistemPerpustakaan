<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);

class Anggota extends MY_Controller {
	
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
		if(!empty($cek) && $stts=='admin')
		{
			/*layout*/	
			$data['title']='Daftar Anggota';
			$data['pointer']="Anggota";
			$data['classicon']="fa fa-book";
			$data['main_bread']="Data Anggota";
			$data['sub_bread']="Daftar Anggota";
			$data['desc']="Data Master Anggota, Menampilkan data Anggota Perpustakaan";

			/*data yang ditampilkan*/
			$data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
			$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
			$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
			//$data['isi']=$this->Anggota_model->get_all();
			$tmp['content']=$this->load->view('admin/anggota/View_anggota',$data, TRUE);
			$this->load->view('admin/layout',$tmp);
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
		if(!empty($cek) && $stts=='admin')
		{		
				$this->form_validation->set_rules('id_anggota', 'id_anggota', 'required');
				$this->form_validation->set_rules('nama', 'nama', 'required');
				$this->form_validation->set_rules('kelas', 'kelas', 'required');
				$this->form_validation->set_rules('agama', 'agama', 'required');
				$this->form_validation->set_rules('jk', 'jk', 'required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Daftar Anggota';
					$data['pointer']="Anggota";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Anggota";
					$data['sub_bread']="Input Anggota";
					$data['desc']="Data Master Anggota, Menampilkan data Anggota Perpustakaan";

					/*data yang ditampilkan*/
					$data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
					$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					$tmp['content']=$this->load->view('admin/anggota/Create_anggota',$data,true);
					$this->load->view('admin/layout',$tmp);
				}
			 	else
				{
					$this->db->select('RIGHT(tb_anggota.id_anggota,6) as kode1', FALSE);
		            $this->db->order_by('id_anggota','DESC');
		            $this->db->limit(1);
		            $query = $this->db->get('tb_anggota');
		            //cek dulu apakah ada sudah ada kode di tabel.
		            if($query->num_rows() == 0)
		            {
		            	  $kode=$this->input->post('id_anggota');
		            	  $data = array('id_anggota' => $kode,
		                          'nama' => $this->input->post('nama'),
		                          'id_kelas' => $this->input->post('kelas'),
		                          'id_agama' => $this->input->post('agama'),
		                          'jenis_kelamin' =>$this->input->post('jk'),
		                          'alamat' => $this->input->post('alamat'),
		                          'hp' => $this->input->post('hp'),
		                          'ket' => $this->input->post('ket'),
		                        );
		            $query=$this->Buku_model->insertData('tb_anggota',$data);
						if ($query)
						{
							//$this->session->set_flashdata("message","berhasil!!!");
							redirect("admin/Anggota","refresh");	
						}
						else
						{
							 $this->session->set_flashdata("message","<div class='callout callout-info'>
                <h4>Info!</h4>
                <p>Tambah Anggota gagal, harap cek kembali!</p>
                </div>");
							redirect("admin/Anggota/create","refresh");	
						}
			                // //jika kode ternyata sudah ada.
			                // $data = $query->row();
			                // $kode = intval($data->kode1) + 1;
			        }
		            else
		            {
		                // //jika kode belum ada
		                // $kode = 1;
		               $this->session->set_flashdata("message","<div class='callout callout-info'>
                <h4>Info!</h4>
                <p>ID Anggota sudah pernah di tambahkan</p>
                </div>");
						redirect("admin/Anggota/create","refresh");	
		              
		            }
		            // $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT);
		            // $kodejadi = "ANGG".$kodemax;
		            
					
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
		if(!empty($cek) && $stts=='admin')
		{		
				$id = $this->input->get('id_anggota',true);	
				$this->form_validation->set_rules('nama', 'nama', 'required');
				$this->form_validation->set_rules('kelas', 'kelas', 'required');
				$this->form_validation->set_rules('agama', 'agama', 'required');
				$this->form_validation->set_rules('jk', 'jk', 'required');
				$this->form_validation->set_rules('hp', 'hp', 'required');
				$this->form_validation->set_rules('alamat', 'alamat', 'required');
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
					$data['anggota'] = $this->Buku_model->get_detail1('tb_anggota','id_anggota',$id);
					$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					$tmp['content']=$this->load->view('admin/anggota/Edit_anggota',$data,true);
					$this->load->view('admin/layout',$tmp);
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
		if(!empty($cek) && $stts=='admin')
		{		
				$id = $this->input->post('id_anggota');	
				$this->form_validation->set_rules('nama', 'nama', 'required');
				$this->form_validation->set_rules('kelas', 'kelas', 'required');
				$this->form_validation->set_rules('agama', 'agama', 'required');
				$this->form_validation->set_rules('jk', 'jk', 'required');
				$this->form_validation->set_rules('hp', 'hp', 'required');
				$this->form_validation->set_rules('alamat', 'alamat', 'required');
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
					$data['anggota'] = $this->Buku_model->get_detail1('tb_anggota','id_anggota',$id);
					$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					$tmp['content']=$this->load->view('admin/anggota/Edit_anggota',$data,true);
					$this->load->view('admin/layout',$tmp);
				}
			 	else
				{
					$id = $this->input->post('id_anggota');	
					$field='id_anggota';
		            $data = array(
		                          'nama' => $this->input->post('nama'),
		                          'id_kelas' => $this->input->post('kelas'),
		                          'id_agama' => $this->input->post('agama'),
		                          'jenis_kelamin' =>$this->input->post('jk'),
		                          'alamat' => $this->input->post('alamat'),
		                          'hp' => $this->input->post('hp'),
		                          'ket' => $this->input->post('keterangan'),
		                        );
					$quer=$this->Buku_model->updateData1('tb_anggota',$data,$field,$id);
					redirect("admin/Anggota","refresh");	
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
			$id = $this->input->get('id_anggota',true);
			$field="id_anggota";
  			$query = $this->Buku_model->delete('tb_anggota',$field,$id);					
			if ($query)
				{
					$this->session->set_flashdata("message","berhasil");
					redirect("admin/Anggota","refresh");
				}
			else
				{
					$this->session->set_flashdata("message","gagal");
					redirect("admin/Anggota","refresh");
				}
 		}
}