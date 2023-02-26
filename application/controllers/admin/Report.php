<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);

class Report extends CI_Controller {

    public function __construct()
        {
            parent::__construct();
            $this->load->model('mread');
        }
    public function index()
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
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
            $tmp['content']=$this->load->view('admin/report/View_report_buku',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
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
        if(!empty($cek) && $stts=='admin')
        {
        $this->load->library('M_pdf');
            $data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
            $data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
            $data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
            $data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
            $data['model'] = $this->Buku_model;
            $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            $this->load->view('admin/report/View_report_buku_pdf',$data);


            $pdfFilePath = 'cetak.pdf';

            $this->m_pdf->pdf->SetHTMLHeader('<img src="' . base_url() . 'assets/kop3.png"/>');
          //  $this->m_pdf->pdf->SetHTMLFooter('<img src="' . base_url() . 'assets/header.jpg"/>');
            $tmp=$this->load->view('admin/report/View_report_buku_pdf',$data, TRUE);

            $this->m_pdf->pdf->AddPage('L','','','',1,1,2,30,2,0);

            $this->m_pdf->pdf->WriteHTML($tmp);
            $this->m_pdf->pdf->Output($pdfFilePath, "I");
             }
        else
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
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data['title']='Report';
            $data['pointer']="Report";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Data Report";
            $data['sub_bread']="Daftar Report";
            $data['desc']="Data Report per Bulan, Menampilkan data buku per Bulan";
            /*data yang ditampilkan*/
            $id_buku=$this->input->get('id_buku');
            echo  $id_detail_pinjam=$this->input->post('id_detail_pinjam');
            $data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
            $data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
            $data['data_pinjam'] = $this->Buku_model->getAllData("tb_pinjam");
            $data['data_detail_pinjam'] = $this->Buku_model->getAllData("tb_detail_pinjam");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            $data['data_kembali'] = $this->Buku_model->getAllData("tb_kembali");
            $data['model'] = $this->Buku_model;
            $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            //$this->Buku_model->generatePdf($kolom, $data,"Laporan Data Siswa");
            $tmp['content']=$this->load->view('admin/report/kembali/View_report_kembali',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

     public function pdf_kembali()
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            $this->load->library('M_pdf');
            $id_buku=$this->input->get('id_buku');
            echo  $id_detail_pinjam=$this->input->post('id_detail_pinjam');
            $data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
            $data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
            $data['data_pinjam'] = $this->Buku_model->getAllData("tb_pinjam");
            $data['data_detail_pinjam'] = $this->Buku_model->getAllData("tb_detail_pinjam");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            $data['data_kembali'] = $this->Buku_model->getAllData("tb_kembali");
            $data['model'] = $this->Buku_model;
            $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            $this->load->view('admin/report/kembali/View_report_kembali_pdf',$data);

            $pdfFilePath = 'cetak1.pdf';

            $this->m_pdf->pdf->SetHTMLHeader('<img src="' . base_url() . 'assets/kop3.png"/>');
          //  $this->m_pdf->pdf->SetHTMLFooter('<img src="' . base_url() . 'assets/header.jpg"/>');
            $tmp=$this->load->view('admin/report/kembali/View_report_kembali_pdf',$data, TRUE);

            $this->m_pdf->pdf->AddPage('L','','','',1,1,2,30,2,0);

            $this->m_pdf->pdf->WriteHTML($tmp);
            $this->m_pdf->pdf->Output($pdfFilePath, "I");

        }
        else
        {
            header('location:'.base_url().'web/log');
        }
    }
      public function excel(){
        $ambildata = $this->mread->export_kontak();
        $data_kategori = $this->Buku_model->getAllData("tb_kategori");
        $data_penerbit= $this->Buku_model->getAllData("tb_penerbit");
        $data_pengarang= $this->Buku_model->getAllData("tb_pengarang");
        $data_rak= $this->Buku_model->getAllData("tb_rak");
        $data_detail_buku= $this->Buku_model->getAllData("tb_detail_buku");
        $data_buku = $this->Buku_model->getAllData("tb_buku");
        $model = $this->Buku_model;
        if(count($data_buku)>0)
        {
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                  ->setCreator("Corro Team") //creator
                    ->setTitle("Para Pejuang Aplikom");  //file title

            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object

            $objget->setTitle('Sample Sheet'); //sheet title
            
            $objget->getStyle("A1:K1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '92d050')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );

            //table header
            $cols = array("A","B","C","D","E","F","G","H","I","J","K");
            
            $val = array("NO","ID Buku ","ISBN","Judul Buku","Kategori","Penerbit","Pengarang","Rak","Tahun","Stok","Keterangan");
            
            for ($a=0;$a<11; $a++) 
            {
                $objset->setCellValue($cols[$a].'1', $val[$a]);
                
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(8); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25); // Kontak
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
            }
            
            $baris  = 2;
            $no=1;
            foreach ($data_buku->result() as $frow)
            {    
                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A".$baris, $no); //membaca data nama
                $objset->setCellValue("B".$baris, $frow->id_buku); //membaca data nama
                $objset->setCellValue("C".$baris, $frow->ISBN); //membaca data alamat
                $objset->setCellValue("D".$baris, $frow->judul); //membaca data kontak
                foreach ($data_kategori->result() as $key => $kat) 
                {
                   $idkt=$frow->id_kategori;
                   if ($kat->id_kategori==$idkt) 
                   {
                   $objset->setCellValue("E".$baris, $kat->kategori); //membaca data kontak   
                   }
               }
                foreach ($data_penerbit->result() as $key => $pnr) 
                {
                $idkt1=$frow->id_penerbit;
                   if ($pnr->id_penerbit==$idkt1) 
                   {
                   $objset->setCellValue("F".$baris, $pnr->nama_penerbit); //membaca data kontak   
                   }
               }
                foreach ($data_pengarang->result() as $key => $png) 
                {
                   $idkt2=$frow->id_pengarang;
                   if ($png->id_pengarang==$idkt2) 
                   {
                   $objset->setCellValue("G".$baris, $png->nama_pengarang); //membaca data kontak   
                   }
                }
                foreach ($data_rak->result()  as $op2) 
                {
                    $idkt3=$frow->no_rak;
                      if($op2->no_rak==$idkt3)
                      {
                          $objset->setCellValue("H".$baris, $op2->nama_rak); 
                      }
                  }
                $objset->setCellValue("I".$baris, $frow->thn_terbit); //membaca data alamat
                $objset->setCellValue("J".$baris, $frow->stok);
                $objset->setCellValue("K".$baris, $frow->ket); 
                
                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('K1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                
                $baris++;
                $no++;
            }
            
            $objPHPExcel->getActiveSheet()->setTitle('Data Export');

            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Data".date("Y-m-d H:i:s").".xls");       
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache

            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('php://output');
        }else
        {
            redirect('Excel');
        }
    } 


    public function excel1(){
        $ambildata = $this->mread->export_kontak();
        $data_kelas = $this->Buku_model->getAllData("tb_kelas");
        $data_anggota= $this->Buku_model->getAllData("tb_anggota");
        $data_pinjam= $this->Buku_model->getAllData("tb_pinjam");
        $data_detail_pinjam= $this->Buku_model->getAllData("tb_detail_pinjam");
        $data_detail_buku= $this->Buku_model->getAllData("tb_detail_buku");
        $data_buku = $this->Buku_model->getAllData("tb_buku");
        $data_kembali = $this->Buku_model->getAllData("tb_kembali");
        $model = $this->Buku_model;
        if(count($data_buku)>0)
        {
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                  ->setCreator("Corro Team") //creator
                    ->setTitle("Para Pejuang Aplikom");  //file title

            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object

            $objget->setTitle('Sample Sheet'); //sheet title
            
            $objget->getStyle("A1:K1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '92d050')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );

            //table header
            $cols = array("A","B","C","D","E","F","G","H","I","J","K");
            
            $val = array("NO","ID Anggota ","Nama ","Kelas","Judul Buku","No. Buku","Tanggal Pinjam","Tanggal Kembali","Tanggal Dikembalikan","Telat","Denda");
            
            for ($a=0;$a<11; $a++) 
            {
                $objset->setCellValue($cols[$a].'1', $val[$a]);
                
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(8); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15); // Kontak
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
            }
            
            $baris  = 2;
            $no=1;
            foreach ($data_pinjam->result() as $frow)
            {
                if ($frow->status==1) 
                {
                $pinjam=$frow->id_pinjam;
                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A".$baris, $no); //membaca data nama
                foreach ($data_anggota->result() as $key => $anggota)
                 {
                    $ida=$frow->id_anggota;
                    if ($anggota->id_anggota==$ida) 
                    {
                        $objset->setCellValue("B".$baris, $anggota->id_anggota); //membaca data nama
                        $objset->setCellValue("C".$baris, $anggota->nama); //membaca data alamat
                        $idkl=$anggota->id_kelas;
                    }
                 }
                foreach ($data_kelas->result() as $key => $kelas) {
                   if ($kelas->id_kelas==$idkl)
                    {
                        $objset->setCellValue("D".$baris, $kelas->kelas); //membaca data kontak                      
                    }
                }
                foreach ($data_detail_pinjam->result() as $key => $dtpinjam) 
                {
                   if ($dtpinjam->id_pinjam==$pinjam) 
                   {
                    $idbku=$dtpinjam->id_buku;
                    $nobku=$dtpinjam->no_buku;
                    foreach ($data_buku->result() as $key => $buku) 
                    {
                        if ($buku->id_buku==$idbku) 
                        {
                            foreach ($data_detail_buku->result() as $key => $dtbuku) 
                            {
                                if ($dtbuku->no_buku==$nobku && $dtbuku->id_buku==$idbku) 
                                {
                                    $objset->setCellValue("E".$baris, $buku->judul); //membaca data kontak
                                    $objset->setCellValue("F".$baris, $dtbuku->no_buku); //membaca data kontak  
                                }
                            }
                        }
                    } 
                   }
                }
                $objset->setCellValue("G".$baris, $frow->tgl_pinjam); //membaca data kontak   
                $objset->setCellValue("H".$baris, $frow->tgl_kembali); 
                foreach ($data_kembali->result() as $key => $kembali) 
                {
                    if ($kembali->id_pinjam==$pinjam) 
                    {
                       $objset->setCellValue("I".$baris, $kembali->tgl_dikembalikan); //membaca data alamat
                       $objset->setCellValue("J".$baris, $kembali->terlambat);
                       $objset->setCellValue("K".$baris, $kembali->denda);
                    }
                } 
                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('K1:K'.$baris)->getNumberFormat()->setFormatCode('0');
                
                $baris++;
                $no++;
                }
            }
            
            $objPHPExcel->getActiveSheet()->setTitle('Data Export');

            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Data".date("Y-m-d H:i:s").".xls");       
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache

            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('php://output');
        }else
        {
            redirect('Excel');
        }
    }  
    

     
}
?>