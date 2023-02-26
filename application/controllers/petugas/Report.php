<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);

class Report extends CI_Controller {

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
            $data['title']='Report';
            $data['pointer']="Report";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Data Report";
            $data['sub_bread']="Daftar Report";
            $data['desc']="Data Report per Kategori, Menampilkan data buku per Kategori";
            /*data yang ditampilkan*/
            $data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
            $data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
            $data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
            $data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
            $data['model'] = $this->Buku_model;
            $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            //$this->Buku_model->generatePdf($kolom, $data,"Laporan Data Siswa");
            $tmp['content']=$this->load->view('petugas/report/View_report_buku',$data, TRUE);
            $this->load->view('petugas/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

      public function pengembalian()
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='petugas')
        {
            /*layout*/  
            $data['title']='Report';
            $data['pointer']="Report";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Data Report";
            $data['sub_bread']="Daftar Report";
            $data['desc']="Data Report per Kategori, Menampilkan data buku per Kategori";
            /*data yang ditampilkan*/
            $data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
            $data['data_pinjam'] = $this->Buku_model->getAllData("tb_pinjam");
            $data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
            $data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
            $data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
            $data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
            $data['model'] = $this->Buku_model;
            $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            //$this->Buku_model->generatePdf($kolom, $data,"Laporan Data Siswa");
            $tmp['content']=$this->load->view('petugas/report/View_report_buku',$data, TRUE);
            $this->load->view('petugas/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }
    public function pdfkan(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='petugas')
        {
        $this->load->library('M_pdf');
            $data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
            $data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
            $data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
            $data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
            $data['model'] = $this->Buku_model;
            $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            $this->load->view('petugas/report/View_report_buku_pdf',$data);


            $pdfFilePath = 'cetak.pdf';

            $this->m_pdf->pdf->SetHTMLHeader('<img src="' . base_url() . 'assets/kop3.png"/>');
          //  $this->m_pdf->pdf->SetHTMLFooter('<img src="' . base_url() . 'assets/header.jpg"/>');
            $tmp=$this->load->view('petugas/report/View_report_buku_pdf',$data, TRUE);

            $this->m_pdf->pdf->AddPage('L','','','',1,1,2,30,2,0);

            $this->m_pdf->pdf->WriteHTML($tmp);
            $this->m_pdf->pdf->Output($pdfFilePath, "I");
             }
        else
        {
            header('location:'.base_url().'web/log');
        }

    }

     public function cetak_grafik(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='petugas')
        {
        $this->load->library('M_pdf');
            $data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
            $data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
            $data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
            $data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
            $data['model'] = $this->Buku_model;
            $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            $this->load->view('petugas/report/View_report_buku_pdf',$data);


            $pdfFilePath = 'cetak.pdf';

            $this->m_pdf->pdf->SetHTMLHeader('<img src="' . base_url() . 'assets/logo.png"/>');
          //  $this->m_pdf->pdf->SetHTMLFooter('<img src="' . base_url() . 'assets/header.jpg"/>');
            $tmp=$this->load->view('petugas/report/View_report_buku_pdf',$data, TRUE);

            $this->m_pdf->pdf->AddPage('L','','','',30,20,50,30,5,0);

            $this->m_pdf->pdf->WriteHTML($tmp);
            $this->m_pdf->pdf->Output($pdfFilePath, "I");
             }
        else
        {
            header('location:'.base_url().'web/log');
        }

    }


          
    //  public function cetak()
    // {
    //     $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
    //     $cek = $this->session->userdata('logged_in');
    //     $stts = $this->session->userdata('stts');
    //     /*jika status login Yes dan status admin tampilkan*/
    //     if(!empty($cek) && $stts=='petugas')
    //     {
    //         $this->load->helper('pdf_helper');
    //         $data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
    //         $data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
    //         $data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
    //         $data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
    //         $data['model'] = $this->Buku_model;
    //         $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
    //         $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
    //         $this->load->view('petugas/report/View_report_buku_pdf',$data);
    //     }
    //     else
    //     {
    //         header('location:'.base_url().'web/log');
    //     }
    // }   
}
?>