<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);

class Petugas extends MY_Controller {
	
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
			$data['title']='Daftar Petugas';
			$data['pointer']="Petugas";
			$data['classicon']="fa fa-book";
			$data['main_bread']="Data Petugas";
			$data['sub_bread']="Daftar Petugas";
			$data['desc']="Data Master Petugas, Menampilkan data Petugas Perpustakaan";

			/*data yang ditampilkan*/
			$data['data_petugas'] = $this->Buku_model->getAllData("tb_petugas");
			//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
			$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
			//$data['isi']=$this->Anggota_model->get_all();
			//$data['js']=$this->load->view('admin/petugas/js');
			$tmp['content']=$this->load->view('admin/petugas/View_petugas',$data, TRUE);
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
				$this->form_validation->set_rules('id_petugas', 'id_petugas', 'required');
				$this->form_validation->set_rules('nama', 'nama', 'required');
				$this->form_validation->set_rules('jk', 'jk', 'required');
				$this->form_validation->set_rules('alamat', 'alamat', 'required');
				$this->form_validation->set_rules('agama', 'agama', 'required');
				$this->form_validation->set_rules('hp', 'hp', 'required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Daftar Petugas';
					$data['pointer']="Petugas";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Petugas";
					$data['sub_bread']="Tambah Petugas";
					$data['desc']="Data Master Petugas, Menampilkan data Petugas Perpustakaan";

					/*data yang ditampilkan*/
					$data['data_petugas'] = $this->Buku_model->getAllData("tb_petugas");
					//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					$tmp['content']=$this->load->view('admin/petugas/Create_petugas',$data,true);
					$this->load->view('admin/layout',$tmp);
				}
			 	else
				{
					$gambar=$_FILES['foto']['name'];
					if (empty($gambar))
					{
								$this->db->where('id_petugas',$this->input->post('id_petugas'));
								$isi=$this->db->count_all_results('tb_petugas');
								if ($isi == 0) {

									$data = array('id_petugas' => $this->input->post('id_petugas'),
					                          'nama' => $this->input->post('nama'),
					                          'password'=> $this->input->post('pass'),
					                          'img'=> '',
					                          'jenis_kelamin' => $this->input->post('jk'),
					                          'alamat' => $this->input->post('alamat'),
					                          'id_agama' => $this->input->post('agama'),                        
					                          'hp' => $this->input->post('hp'),
					                          'ket' => $this->input->post('ket'),
					                        	);
												$quer=$this->Buku_model->insertData('tb_petugas',$data);
									$pass=md5($this->input->post('pass'));
									$data2 = array('username' => $this->input->post('id_petugas'),
													'password'=>$pass,
													'stts'=>$this->input->post('stts'));
									$quer1=$this->Buku_model->insertData('tb_login',$data2);
									redirect("admin/petugas","refresh");
								}
								else
								{
									$data['title']='Daftar Petugas';
									$data['pointer']="Petugas";
									$data['classicon']="fa fa-book";
									$data['main_bread']="Data Petugas";
									$data['sub_bread']="Tambah Petugas";
									$data['desc']="Data Master Petugas, Menampilkan data Petugas Perpustakaan";

									/*data yang ditampilkan*/
									$data['data_petugas'] = $this->Buku_model->getAllData("tb_petugas");
									$data['pesan'] = "Id anggota telah ada silahkan ganti";
									$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
									$tmp['content']=$this->load->view('admin/petugas/Create_petugas',$data,true);
									$this->load->view('admin/layout',$tmp);
								}	
					}
					else
					{
						$alphanum="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
						$nama=str_shuffle($alphanum);//random nama dengan alphanum
						$config['file_name'] = $nama; 
						$config['upload_path'] = "gambar_petugas"; // lokasi penyimpanan file
						$config['allowed_types'] = 'gif|jpg|JPEG|png|JPEG|BMP|bmp'; // format foto yang diizinkan 
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						//$this->upload->do_upload('foto');
						if( !$this->upload->do_upload('foto'))
						{
							//echo $$_FILES['file_name'];
							$data['pesan']=$this->upload->display_errors();
							$data['title']='Daftar Petugas';
							$data['pointer']="Petugas";
							$data['classicon']="fa fa-book";
							$data['main_bread']="Data Petugas";
							$data['sub_bread']="Tambah Petugas";
							$data['desc']="Data Master Petugas, Menampilkan data Petugas Perpustakaan";

							/*data yang ditampilkan*/
							$data['data_petugas'] = $this->Buku_model->getAllData("tb_petugas");
							//$data['pesan'] = "Id anggota telah ada silahkan ganti";
							$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
							$tmp['content']=$this->load->view('admin/petugas/Create_petugas',$data,true);
							$this->load->view('admin/layout',$tmp);
							
						}
						else
						{
								$this->db->where('id_petugas',$this->input->post('id_petugas'));
								$isi=$this->db->count_all_results('tb_petugas');
								if ($isi == 0) {

									$data = array('id_petugas' => $this->input->post('id_petugas'),
					                          'nama' => $this->input->post('nama'),
					                          'password'=> $this->input->post('pass'),
					                          'img'=> $this->upload->file_name,
					                          'jenis_kelamin' => $this->input->post('jk'),
					                          'alamat' => $this->input->post('alamat'),
					                          'id_agama' => $this->input->post('agama'),                        
					                          'hp' => $this->input->post('hp'),
					                          'ket' => $this->input->post('ket'),
					                        	);
												$quer=$this->Buku_model->insertData('tb_petugas',$data);
									$pass=md5($this->input->post('pass'));
									$data2 = array('username' => $this->input->post('id_petugas'),
													'password'=>$pass,
													'stts'=>$this->input->post('stts'));
									$quer1=$this->Buku_model->insertData('tb_login',$data2);
									redirect("admin/petugas","refresh");
								}
								else
								{
									$data['title']='Daftar Petugas';
									$data['pointer']="Petugas";
									$data['classicon']="fa fa-book";
									$data['main_bread']="Data Petugas";
									$data['sub_bread']="Daftar Petugas";
									$data['desc']="Data Master Petugas, Menampilkan data Petugas Perpustakaan";

									/*data yang ditampilkan*/
									$data['data_petugas'] = $this->Buku_model->getAllData("tb_petugas");
									$data['pesan'] = "Id anggota telah ada silahkan ganti";
									$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
									$tmp['content']=$this->load->view('admin/petugas/Create_petugas',$data,true);
									$this->load->view('admin/layout',$tmp);
								}
						}
					}
		            /**/	
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
				$id = $this->input->get('id_petugas',true);	
				$this->form_validation->set_rules('nama', 'nama', 'required');
				$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
				$this->form_validation->set_rules('alamat', 'alamat', 'required');
				$this->form_validation->set_rules('agama', 'agama', 'required');
				$this->form_validation->set_rules('hp', 'hp', 'required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Edit Petugas';
					$data['pointer']="Petugas";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Petugas";
					$data['sub_bread']="Edit Petugas";
					$data['desc']="Form untuk melakukan edit data Petugas Perpustakaan";

					/*data yang ditampilkan*/
					$data['petugas'] = $this->Buku_model->get_detail1('tb_petugas','id_petugas',$id);
					$data['login'] = $this->Buku_model->get_detail1("tb_login","username",$id);
					$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					$tmp['content']=$this->load->view('admin/petugas/Edit_petugas',$data,true);
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
				$id = $this->input->post('id_petugas');	
				$this->form_validation->set_rules('nama', 'nama', 'required');
				$this->form_validation->set_rules('jk', 'jk', 'required');
				$this->form_validation->set_rules('alamat', 'alamat', 'required');
				$this->form_validation->set_rules('agama', 'agama', 'required');
				$this->form_validation->set_rules('hp', 'hp', 'required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Edit Petugas';
					$data['pointer']="Petugas";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Petugas";
					$data['sub_bread']="Edit Petugas";
					$data['desc']="Form untuk melakukan edit data Petugas Perpustakaan";

					/*data yang ditampilkan*/
					$data['petugas'] = $this->Buku_model->get_detail1('tb_petugas','id_petugas',$id);
					//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					$tmp['content']=$this->load->view('admin/petugas/Edit_petugas',$data,true);
					$this->load->view('admin/layout',$tmp);
				}
			 	else
				{
					$gambar=$_FILES['foto']['name'];
					if (empty($gambar))
					{
						$id = $this->input->post('id_petugas');	
						$field='id_petugas';
			            $data = array(
			                          		'nama' => $this->input->post('nama'),
					                          'password'=> $this->input->post('pass'),
					                          'jenis_kelamin' => $this->input->post('jk'),
					                          'alamat' => $this->input->post('alamat'),
					                          'id_agama' => $this->input->post('agama'),                        
					                          'hp' => $this->input->post('hp'),
					                          'ket' => $this->input->post('ket')
			                        );
						$quer=$this->Buku_model->updateData1('tb_petugas',$data,$field,$id);
									$pass=md5($this->input->post('pass'));
									$data2 = array(
													'password'=>$pass,
													'stts'=>$this->input->post('stts'));
						$quer1=$this->Buku_model->updateData1('tb_login',$data2,'username',$id);
						redirect("admin/Petugas","refresh");
					}	
					else
					{
						$id = $this->input->post('id_petugas');
						$alphanum="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
						$nama=str_shuffle($alphanum);//random nama dengan alphanum
						$config['file_name'] = $nama; 
						$config['upload_path'] = "gambar_petugas"; // lokasi penyimpanan file
						$config['allowed_types'] = 'gif|jpg|JPEG|png|JPEG|BMP|bmp'; // format foto yang diizinkan 
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						//$this->upload->do_upload('foto');
						if( !$this->upload->do_upload('foto'))
						{
							//echo $$_FILES['file_name'];
							$data['pesan']=$this->upload->display_errors();
							$data['title']='Edit Petugas';
							$data['pointer']="Petugas";
							$data['classicon']="fa fa-book";
							$data['main_bread']="Data Petugas";
							$data['sub_bread']="Edit Petugas";
							$data['desc']="Form untuk melakukan edit data Petugas Perpustakaan";

							/*data yang ditampilkan*/
							$data['petugas'] = $this->Buku_model->get_detail1('tb_petugas','id_petugas',$id);
							$data['login'] = $this->Buku_model->get_detail1("tb_login","username",$id);
							$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
							$tmp['content']=$this->load->view('admin/Petugas/Edit_petugas',$data,true);
							$this->load->view('admin/layout',$tmp);
						}
						else
						{
						$data = array(
			                          		'nama' => $this->input->post('nama'),
					                          'password'=> $this->input->post('pass'),
					                          'img'=> $this->upload->file_name,
					                          'jenis_kelamin' => $this->input->post('jk'),
					                          'alamat' => $this->input->post('alamat'),
					                          'id_agama' => $this->input->post('agama'),                        
					                          'hp' => $this->input->post('hp'),
					                          'ket' => $this->input->post('ket')
			                        );
						$quer=$this->Buku_model->updateData1('tb_petugas',$data,'id_petugas',$id);
									$pass=md5($this->input->post('pass'));
									$data2 = array(
													'password'=>$pass,
													'stts'=>$this->input->post('stts'));
						$quer1=$this->Buku_model->updateData1('tb_login',$data2,'username',$id);
						redirect("admin/Petugas","refresh");
						}
					}
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
			$field='id_petugas';
			$id = $this->input->get('id_petugas',true);	
  			$query = $this->Buku_model->delete('tb_petugas',$field,$id);	
  			$query1 = $this->Buku_model->delete('tb_login','username',$id);					
			if ($query)
				{
					$this->session->set_flashdata("message","berhasil");
					redirect("admin/Petugas","refresh");
				}
			else
				{
					$this->session->set_flashdata("message","gagal");
					redirect("admin/Petugas","refresh");
				}
 		}
}