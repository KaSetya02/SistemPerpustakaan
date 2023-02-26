<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pinjam extends MY_Controller 
{
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
			$data['title']='Daftar Peminjaman';
			$data['pointer']="Pinjam";
			$data['classicon']="fa fa-book";
			$data['main_bread']="Data Peminjaman";
			$data['sub_bread']="Daftar Peminjaman";
			$data['desc']="Data Master Peminjaman, Menampilkan data Peminjaman Buku";

			/*data yang ditampilkan*/
			$data['data_pinjam'] = $this->Buku_model->getAllData("tb_pinjam");
			$data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
			$data['anggota'] = $this->Buku_model->getAllData("tb_anggota");
			$data['model'] = $this->Buku_model;
			//$data['isi']=$this->Anggota_model->get_all();
			//$data['js']=$this->load->view('admin/anggota/js');
			//$tmp['content']=$this->load->view('petugas/pinjam/View_pinjam',$data, TRUE);
			$tmp['content']=$this->load->view('petugas/pinjam/View_pinjam',$data, TRUE);
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
				//$this->form_validation->set_rules('tgl_pinjam', 'tgl_pinjam', 'required');
				$this->form_validation->set_rules('id_anggota', 'id_anggota', 'required');
				$this->form_validation->set_rules('tgl_kembali', 'tgl_kembali', 'required');
				//$this->form_validation->set_rules('id_buku', ' id buku', 'required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Daftar Peminjaman';
					$data['pointer']="Pinjam";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Input Peminjaman";
					$data['sub_bread']="Input Peminjaman";
					$data['desc']="form untuk melakukan peminjaman";

					/*data yang ditampilkan*/
					$data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
					$data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
					$tmp['content']=$this->load->view('petugas/pinjam/Create_pinjam',$data, TRUE);
					$this->load->view('petugas/layout',$tmp);
				}
			 	else
				{
		            $tgl=date('y-m-d');
		            $data = array('id_pinjam' => '',
		                          'tgl_pinjam' => $tgl,
		                          'id_anggota' => $this->input->post('id_anggota'),
		                          'tgl_kembali' => $this->input->post('tgl_kembali'),
		                          'status'=>0
		                        );
		            $insert=$this->Buku_model->insertData('tb_pinjam',$data);
		            redirect('petugas/Pinjam','refresh');
				}
		}
		else
		{
			header('location:'.base_url().'web/log');
		}
	}
	public function createdet()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		$this->form_validation->set_rules('id_buku','ID Number','required');
		//$this->form_validation->set_rules('no_buku','Book Number','required');
		if ($this->form_validation->run()==false) {
					$id_pinjam=$this->session->userdata('id_pinjam');

					$data['title']='Input detail Peminjaman';
					$data['pointer']="Pinjam";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Input detail Peminjaman";
					$data['sub_bread']="Input detail Peminjaman";
					$data['desc']="form untuk melakukan peminjaman";

					/*data yang ditampilkan*/
					$data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
					$data['pinjam'] = $this->Buku_model->get_detail1("tb_pinjam","id_pinjam",$id_pinjam);
					$data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
					$tmp['content']=$this->load->view('petugas/pinjam/Create_detail_pinjam',$data, TRUE);
					$this->load->view('petugas/layout',$tmp);
		}
		else
		{
			$det= array('id_detail_pinjam' => '',
						'id_pinjam'=> $this->session->userdata('id_pinjam'),
						'id_buku'=> $this->input->post('id_buku'),
						'flag'=> 2);
			$insert=$this->Buku_model->insertData('tb_detail_pinjam',$det);
			$this->db->where('flag',2);
		    $d1=$this->db->get('tb_detail_pinjam')->result();
		    foreach ($d1 as $key1 => $value1)
		    {
	        	$id_detail_pinjam=$value1->id_detail_pinjam;
		    }
		      $dataa1=array('id_detail_pinjam' => $id_detail_pinjam,
		      				'id_buku' => $this->input->post('id_buku'));
            		$this->session->set_userdata($dataa1);
		            //update status jadi 0 lagi
		            $this->db->set('flag',0);
		            $this->db->where('id_detail_pinjam',$this->session->userdata('id_detail_pinjam'));
		            $this->db->update('tb_detail_pinjam');
		    redirect('petugas/Pinjam/updatedetnobuku');
		}
	}
	public function updatedetnobuku()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		$this->form_validation->set_rules('no_buku','Book Number','required');
		//$this->form_validation->set_rules('no_buku','Book Number','required');
		if ($this->form_validation->run()==false) {
					$id_detail_pinjam=$this->session->userdata('id_detail_pinjam');
					$id_pinjam=$this->session->userdata('id_pinjam');
					$data['title']='Input detail Peminjaman no buku';
					$data['pointer']="Pinjam/updatedetnobuku";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Input detail Peminjaman";
					$data['sub_bread']="Input detail Peminjaman";
					$data['desc']="form untuk melakukan peminjaman";

					/*data yang ditampilkan*/
					$data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
					$data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
					$data['detail_pinjam'] = $this->Buku_model->get_detail1("tb_detail_pinjam","id_detail_pinjam",$id_detail_pinjam);
					$data['pinjam'] = $this->Buku_model->get_detail1("tb_pinjam","id_pinjam",$id_pinjam);
					$data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
					//echo $id_detail_pinjam;
					$tmp['content']=$this->load->view('petugas/pinjam/Create_detail_pinjam_nobuku',$data, TRUE);
					$this->load->view('petugas/layout',$tmp);
		}
		else
		{
		            //update status jadi 0 lagi
					$id_pinjam2=$this->session->userdata('id_pinjam');
					$this->db->set('no_buku',$this->input->post('no_buku'));
		            $this->db->where('id_detail_pinjam',$this->session->userdata('id_detail_pinjam'));
		            $this->db->update('tb_detail_pinjam');
		            //select jum sesuai id pinjam
		            $this->db->where('id_pinjam',$id_pinjam2);
		            $data=$this->db->get('tb_pinjam')->result();
		            foreach ($data as $key => $value) {
		            	$jum=$value->total_buku;
		            	$jum1=$jum+1;
		            	//echo $jum1;
		            }
		            //update jumlah buku
		            $this->db->set('total_buku',$jum1);
		            $this->db->where('id_pinjam',$id_pinjam2);
		            $this->db->update('tb_pinjam');
		            //update status dipinjam
		            $this->db->set('status',0);
		            $this->db->where('id_buku',$this->session->userdata('id_buku'));
		            $this->db->where('no_buku',$this->input->post('no_buku'));
		            $this->db->update('tb_detail_buku');
		            //echo $id_pinjam2;
		    		redirect('petugas/Pinjam/View_dt_pinjam/'.$id_pinjam2,'refresh');
		}
	}
	public function View_dt_pinjam($id_pinjam2=0)
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		/*jika status login Yes dan status admin tampilkan*/
		if(!empty($cek) && $stts=='petugas')
		{
			/*layout*/	
			$data['title']='Daftar Detail Peminjaman';
			$data['pointer']="Pinjam";
			$data['classicon']="fa fa-book";
			$data['main_bread']="Data Peminjaman";
			$data['sub_bread']="Daftar Peminjaman";
			$data['desc']="Ddta detail pinjam";

			/*data yang ditampilkan*/
			$id_pinjam1=$this->input->get('id_pinjam');
			if ($id_pinjam1=='') {
				$id_pinjam1=$id_pinjam2;
			}
			if ($id_pinjam1!='') {
				$id = array('id_pinjam' => $id_pinjam1);
				$this->session->set_userdata($id);
				$id_pinjam=$this->session->userdata('id_pinjam');
				//echo $id_pinjam;
			}
			$data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
			$data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
			$data['data_detail_pinjam1'] = $this->Buku_model->get_detail123("tb_detail_pinjam","id_pinjam",$id_pinjam1);
			$tmp['content']=$this->load->view('petugas/pinjam/View_detail_pinjam',$data, TRUE);
			$this->load->view('petugas/layout',$tmp);
		}
		else
		/*jika status login NO atau status bukan admin kembalikan ke login*/
		{
			header('location:'.base_url().'web/log');
		}
	}
	public function Edit_pinjam()
	{ 
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
  		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='petugas')
		{		
				
				$this->form_validation->set_rules('id_anggota', 'Member', 'required');
				$this->form_validation->set_rules('tgl_kembali', 'Date', 'required');
				if($this->form_validation->run()==FALSE)
				{
					$id=$this->input->get('id_pinjam');
					$dt=array('id_pinjam' => $id);
					$this->session->set_userdata($dt);
					//$data ['err'] = validation_errors();
					$data['title']='Edit Pinjam';
					$data['pointer']="Pinjam";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Pinjam";
					$data['sub_bread']="Edit Pinjam";
					$data['desc']="Form untuk melakukan edit data Peminjaman Perpustakaan";

					/*data yang ditampilkan*/
					$data['pinjam'] = $this->Buku_model->get_detail1("tb_pinjam","id_pinjam",$id);
					$data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
					$tmp['content']=$this->load->view('petugas/pinjam/Edit_pinjam',$data, TRUE);
					$this->load->view('petugas/layout',$tmp);
				}
				else
				{
					$id_pinjam=$this->session->userdata('id_pinjam');
					echo $id_pinjam;
					$field="id_pinjam";
					$data = array('id_anggota' => $this->input->post('id_anggota'),
									'tgl_kembali'=>  $this->input->post('tgl_kembali'));
					$this->Buku_model->updateData1('tb_pinjam',$data,$field,$id_pinjam);
					redirect('petugas/Pinjam','refresh');
				}
		}
		else
		{
			header('location:'.base_url().'web/log');
		}
 	}
 	public function delete_det()
		{
			$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
			$id = $this->input->get('id_detail_pinjam',true);	
			$field='id_detail_pinjam';
			$this->db->where('id_detail_pinjam',$id);
			$dd=$this->db->get('tb_detail_pinjam')->result();
			foreach ($dd as $key => $value) {
				$no=$value->no_buku;
				$id_buku=$value->id_buku;
				$id_pinjam=$value->id_pinjam;
			}
			//update sttat detail buku
			$this->db->set('status',1);
			$this->db->where('id_buku',$id_buku);
			$this->db->where('no_buku',$no);
			$this->db->update('tb_detail_buku');
			// ambil data jumla
			$this->db->where('id_pinjam',$id_pinjam);
			$ww=$this->db->get('tb_pinjam')->result();
			foreach ($ww as $key => $value1) {
				$jum=$value1->total_buku;
				$jum1=$jum-1;
			}
			//kurangi satu jumlah buku
			$this->db->set('total_buku',$jum1);
			$this->db->where('id_pinjam',$id_pinjam);
			$this->db->update('tb_pinjam');
  			$query = $this->Buku_model->delete('tb_detail_pinjam',$field,$id);					
			redirect('petugas/Pinjam/View_dt_pinjam/'.$id_pinjam,'refresh');
 		}
	 	public function hapus_pinjam()
		{
			
			$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
			$cek = $this->session->userdata('logged_in');
			$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='petugas')
			{
				$id_pinjam=$this->input->get('id_pinjam',TRUE);
				$hapus = array('id_pinjam' => $id_pinjam);
				$this->Buku_model->deleteData('tb_pinjam',$hapus);
				$this->Buku_model->deleteData('tb_detail_pinjam',$hapus);
				 redirect('petugas/Pinjam','refresh');
			}
			else
			{
				header('location:'.base_url().'web/log');
			}
		}
		public function hapus_pinjam_kembali()
		{
			
			$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
			$cek = $this->session->userdata('logged_in');
			$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='petugas')
			{
				$id_pinjam=$this->input->get('id_pinjam',TRUE);
				$hapus = array('id_pinjam' => $id_pinjam);
				$this->Buku_model->deleteData('tb_pinjam',$hapus);
				$this->Buku_model->deleteData('tb_detail_pinjam',$hapus);
				redirect('petugas/Pinjam','refresh');
			}
			else
			{
				header('location:'.base_url().'web/log');
			}
		}
}