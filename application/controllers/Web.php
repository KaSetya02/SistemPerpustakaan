<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);

class Web extends CI_Controller {


	public function _construct()
	{
		session_start();
		parent::__construct();
		$this->load->model('Perpus_model');
	}
	public function index(){
		$data['title']='Home Perpustakaan';
		$tmp['content']=$this->load->view('global/home',$data, TRUE);
		$this->load->view('global/layout',$tmp);
	}

	//halaman login
	public function log()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{

			//buat atribut form
			$frm['username'] = array('name' => 'username',
				'id' => 'username',
				'type' => 'text',
				'value' => '',
				'class' => 'form-control',
				'placeholder' => 'Username'
			);
			$frm['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => '',
				'class' => 'form-control',
				'placeholder' => 'Password'
			);

			$frm['title']='Login & Register';
			$tmp['content']=$this->load->view('global/login',$frm);
	
		}
		else
		{
			$st = $this->session->userdata('stts');
			echo $s = $this->session->userdata('username');
			if($st=='admin')
			{				
				header('location:'.base_url().'admin/Home');
			}
			else if($st=='petugas')
			{
				header('location:'.base_url().'petugas/Home');
			}
		
		}
	}
	
	//mengambil data login
	public function login()
	{
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		$this->Perpus_model->getLoginData($u,$p);
	}
	
	//logout
	public function logout()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			
			header('location:'.base_url().'web/log');
		}
		else
		{
			
			$this->session->sess_destroy();
			header('location:'.base_url().'web/log');
			
		}
	}

}

/* End of file web.php */
/* Location: ./application/controllers/web.php */