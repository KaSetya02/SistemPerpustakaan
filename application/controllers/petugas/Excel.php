<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Excel extends CI_Controller {

	
    public function __construct()
    {
        parent::__construct();
        $this->load->library('tools');
        $this->load->helper(array('form','url'));
        $this->load->database();
    }
	public function index()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		/*jika status login Yes dan status admin tampilkan*/
		if(!empty($cek) && $stts=='petugas')
		{
	        $this->load->library('tools');
	       
	       	/*layout*/	
			$data['title']='Import - Export Excel';
			$data['pointer']="Excel";
			$data['classicon']="fa fa-book";
			$data['main_bread']="Import - Export";
			$data['sub_bread']="Excel to PHP";
			$data['desc']="Import Export Data Excel ke PHP";
			//$file='./tb_anggota.xls';
			//$this->tools->importdata($file,'tb_anggota',5,FALSE);        
	        //$this->tools->exportdata('client','tes','tes2','dataexport',FALSE);
	     
	        $tmp['content']=$this->load->view('petugas/toolphpexcel',$data, TRUE);
			$this->load->view('petugas/layout',$tmp);
        }
		else
		/*jika status login NO atau status bukan admin kembalikan ke login*/
		{
			header('location:'.base_url().'web/log');
		}
	}
    

    public function importdata()
    {
        $tb=$this->input->post('tb1');
        $fl=$this->input->post('file');
        $br=$this->input->post('mulai');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xls|xlsx';
        $config['max_size'] = 1024 * 8;
        $config['encrypt_name'] = TRUE;
 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        
        if ($this->upload->do_upload('file'))        
        {
            $data = $this->upload->data();
            $nama=$data['file_name'];

            
            if(file_exists("./uploads/".$nama))
            {
                $file="./uploads/".$nama;

                $this->tools->importdata($file,$tb,$br,FALSE);
                unlink($file);
                echo json_encode('Berhasil import data');                
            }else{
                echo json_encode('Gagal, karena kesalahan file atau file tidak ditemukan');
            }
        }else{
                 $error = array('error' => $this->upload->display_errors());
                // echo '<div class="alert alert-danger">'.$error['error'].'</div>';

            echo json_encode('<div class="alert alert-danger">'.$error['error'].'</div>');
        }
        
    }
    
    public function importdata_ai()
    {
        $tb=$this->input->post('tb1');
        $fl=$this->input->post('file');
        $br=$this->input->post('mulai');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xls|xlsx';
        $config['max_size'] = 1024 * 8;
        $config['encrypt_name'] = TRUE;
 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        
        if ($this->upload->do_upload('file'))        
        {
            $data = $this->upload->data();
            $nama=$data['file_name'];

            
            if(file_exists("./uploads/".$nama))
            {
                $file="./uploads/".$nama;

                $this->tools->importdata_ai($file,$tb,$br,FALSE);
                unlink($file);
                echo json_encode('Berhasil import data');                
            }else{
                echo json_encode('Gagal, karena kesalahan file atau file tidak ditemukan');
            }
        }else{
                 $error = array('error' => $this->upload->display_errors());
                // echo '<div class="alert alert-danger">'.$error['error'].'</div>';

            echo json_encode('<div class="alert alert-danger">'.$error['error'].'</div>');
        }
        
    }

    function exportdata()
    {
        $tb=$this->input->post('tb1');
        $title=$this->input->post('title');
        $desc=$this->input->post('description');
        
        //$tb='client';
        //$title='tes';
        //$desc='tes';
        $namafile="Export ".$tb."-".time();
        $folderpath="./";
        $this->tools->exportdata($tb,$title,$desc,$namafile,$folderpath);
        if(file_exists("./".$namafile.'.xls'))
        {
            echo json_encode('<a href="'.base_url().$namafile.'.xls" target="_blank"> Download File</a>');
        }else{
            echo json_encode('Gagal, karena kesalahan file atau file '.$namafile.'.xls tidak ditemukan');
        }
    }
    

   
    
    
}
