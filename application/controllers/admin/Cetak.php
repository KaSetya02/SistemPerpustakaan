<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);

class Cetak extends MY_Controller {


	public function __construct(){
		parent::__construct();

		$this->load->model('Buku_model');
	}

	public function buku()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		/*jika status login Yes dan status admin tampilkan*/
		if(!empty($cek) && $stts=='admin')
		{
			/*layout*/	
			$data['title']='Cetak Barcode Buku';
			$data['pointer']="Cetak/buku";
			$data['classicon']="fa fa-book";
			$data['main_bread']="Data Buku";
			$data['sub_bread']="Daftar Buku";
			$data['desc']="Data Master Buku, Menampilkan data Buku Perpustakaan";

			/*data yang ditampilkan*/
			$data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
			$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
			$data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
			$data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
			$data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
			$data['model'] = $this->Buku_model;
			/*masukan data kedalam view */
			//$data['js']=$this->load->view('admin/buku/js');
			$tmp['content']=$this->load->view('admin/cetak/R_buku',$data, TRUE);
			$this->load->view('admin/layout',$tmp);
		}
		else
		/*jika status login NO atau status bukan admin kembalikan ke login*/
		{
			header('location:'.base_url().'web/log');
		}
	
	}

public function cetak_kartu()
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data['title']='Cetak Kartu Anggota Per Kelas';
            $data['pointer']="Cetak/cetak_kartu";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Data Kelas";
            $data['sub_bread']="Daftar Kelas";
            $data['desc']="Data Kelas, Menampilkan data Kelas yang akan dicetak";

            /*data yang ditampilkan*/
            //$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
            $data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
            //$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
            //$data['isi']=$this->Anggota_model->get_all();
            //$data['js']=$this->load->view('admin/anggota/js');
            $tmp['content']=$this->load->view('admin/cetak/R_kelas',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

	public function barcode_buku()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
        $this->load->library('M_pdf');
        	$id_buku = $this->input->get('id_buku', TRUE);	
       		$data['data_stok_buku'] = $this->Buku_model->get_data_barcode($id_buku);
            $data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
            $data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
            $data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
            $data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
            $data['model'] = $this->Buku_model;
            $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            $this->load->view('admin/cetak/cetak_barcode_buku',$data);


          //  $pdfFilePath = 'cetak.pdf';

          //   // $this->m_pdf->pdf->SetHTMLHeader('<img src="' . base_url() . 'assets/logo.png"/>');
          // //  $this->m_pdf->pdf->SetHTMLFooter('<img src="' . base_url() . 'assets/header.jpg"/>');
          //   $tmp=$this->load->view('admin/cetak/cetak_barcode_buku',$data, TRUE);
          //   $this->m_pdf->showImageErrors=true;
          //   $this->m_pdf->pdf->AddPage('L','','','',30,20,50,30,5,0);

          //   $this->m_pdf->pdf->WriteHTML($tmp);
          //   $this->m_pdf->pdf->Output($pdfFilePath, "I");
             }
        else
        {
            header('location:'.base_url().'web/log');
        }
	
	}


	public function barcode_kartu()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {

        	$id_kelas = $this->input->get('id_kelas', TRUE);	
       		$data['data_kartu'] = $this->Buku_model->get_data_kartu($id_kelas);
            $this->load->view('admin/cetak/cetak_kartu_anggota',$data);


          //  $pdfFilePath = 'cetak.pdf';

          //   // $this->m_pdf->pdf->SetHTMLHeader('<img src="' . base_url() . 'assets/logo.png"/>');
          // //  $this->m_pdf->pdf->SetHTMLFooter('<img src="' . base_url() . 'assets/header.jpg"/>');
          //   $tmp=$this->load->view('admin/cetak/cetak_barcode_buku',$data, TRUE);
          //   $this->m_pdf->showImageErrors=true;
          //   $this->m_pdf->pdf->AddPage('L','','','',30,20,50,30,5,0);

          //   $this->m_pdf->pdf->WriteHTML($tmp);
          //   $this->m_pdf->pdf->Output($pdfFilePath, "I");
             }
        else
        {
            header('location:'.base_url().'web/log');
        }
	
	}




	function barcode()
	{
		$id_buku = $this->input->get('id_buku', TRUE);
		//kita load library nya ini membaca file Zend.php yang berisi loader
		//untuk file yang ada pada folder Zend
		$this->load->library('Zend');

		//load yang ada di folder Zend
		$this->zend->load('Zend/Barcode');

		//generate barcodenya
		//$kode = 12345abc;
		Zend_Barcode::render('code128', 'image', array('text'=>$id_buku), array());
	}
	
	function barcode_anggota()
	{
		$id_anggota = $this->input->get('id_anggota', TRUE);
		//kita load library nya ini membaca file Zend.php yang berisi loader
		//untuk file yang ada pada folder Zend
		$this->load->library('Zend');

		//load yang ada di folder Zend
		$this->zend->load('Zend/Barcode');

		//generate barcodenya
		//$kode = 12345abc;
		Zend_Barcode::render('code128', 'image', array('text'=>$id_anggota), array());
	}
	


}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */