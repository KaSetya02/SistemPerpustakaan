<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kembali extends CI_Controller {

    public function __construct()
        {
            parent::__construct();
            //$this->Security_model->login_check();
        }
    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data['title']='Form Kembali';
            $data['pointer']="admin/Kembali";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Form Kembali";
            $data['sub_bread']="Form Kembali";
            $data['desc']="Data Master Kembali, Menampilkan data yang akan di Kemblikan";

            /*data yang ditampilkan*/
           /*data yang ditampilkan*/
           $id_pinjam=$this->input->get('id_pinjam');
           $data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
            $data['data_pinjam'] = $this->Buku_model->get_detail1("tb_pinjam","id_pinjam",$id_pinjam);
            //$data['isi']=$this->Anggota_model->get_all();
            //$data['js']=$this->load->view('admin/anggota/js');
            $tmp['content']=$this->load->view('admin/kembali/Form_kembali',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }
    public function View_dt_pinjam($id_pinjam2=0)
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data['title']='Daftar Detail Peminjaman';
            $data['pointer']="admin/pinjam/View_dt_pinjam";
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
            $tmp['content']=$this->load->view('admin/Kembali/View_detail_pinjam_kembali',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }
     public function detail_kembali()
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data['title']='Daftar Detail Kembali';
            $data['pointer']="Kembali";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Data Detail Pinjam";
            $data['sub_bread']="Daftar Detail Pinjam";
            $data['desc']="Data Master Detail Kembali, Menampilkan data Detail yang akan di Kemblikan";

            /*data yang ditampilkan*/
            $data['data_detail'] = $this->Buku_model->getAllData("tb_detail_pinjam");
            $data['data_pinjam'] = $this->Buku_model->getAllData("tb_pinjam");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            //$data['data_dt_buku']=$this->Buku_model->getAllData("tb_detail_buku");
            //$data['js']=$this->load->view('admin/anggota/js');
            $tmp['content']=$this->load->view('admin/kembali/Detail_kembali',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }
     public function kembalikan()
    {
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {

            /*layout 
            $data['title']='Daftar Buku Kembali';
            $data['pointer']="Kembali";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Data buku Kembali";
            $data['sub_bread']="Daftar Buku Kembali";
            $data['desc']="Data Buku Kembali, Menampilkan data Buku yang di Kemblikan";
            */ $
            $sekarang = date('Y-m-d ');
            //$id=2;
            //echo $sekarang;
            $id=$this->input->get('id_detail_pinjam');
            //echo $id;
            $this->db->where('id_detail_pinjam',$id);
            $query=$this->db->get('tb_detail_pinjam')->result();
            //$this->Buku_model->get_detail1("tb_detail_pinjam","id_pinjam",$id);
            foreach ($query as $key => $row)
            {
                $id_pinjam=$row->id_pinjam;
                $r=$row->id_buku;
                $nobok=$row->no_buku;
            }
            $this->db->where('id_pinjam',$id_pinjam);
            $query1=$this->db->get('tb_pinjam')->result();
            //$this->Buku_model->get_detail1("tb_detail_pinjam","id_pinjam",$id);
            foreach ($query1 as $key => $row1)
            {
                $tgl_kembali=$row1->tgl_kembali;
               echo  $SLS=((strtotime($sekarang)-strtotime($tgl_kembali))/(60*60*24));
            }
            //pilih denda yang aktif
            $this->db->where('status','A');
            $query11=$this->db->get('tb_denda')->result();
            //$this->Buku_model->get_detail1("tb_detail_pinjam","id_pinjam",$id);
            foreach ($query11 as $key => $row11)
            {
                $id_denda=$row11->id_denda;
                $d=$row11->denda;
            }
            if ($SLS>0) {
                $jumlahdenda=$d*$SLS;
            }
            else
            {
                $SLS=0;
                $jumlahdenda=0;
            }
            //$id_pinjam2=$id_pinjam;
            $kem = array('id_kembali'=>'',
                'id_pinjam' => $id_pinjam,
                        'tgl_dikembalikan'=>$sekarang,
                        'terlambat'=>$SLS,
                        'id_denda'=>$id_denda,
                        'denda'=> $jumlahdenda );
                    $insert=$this->Buku_model->insertData('tb_kembali',$kem);
            $this->db->set('status',1);
            $this->db->where('id_buku',$r);
            $this->db->where('no_buku',$nobok);
            $this->db->update('tb_detail_buku');
            //update flag detail pinjam
            $this->db->set('flag',1);
            $this->db->where('id_detail_pinjam',$id);
            $this->db->update('tb_detail_pinjam');
                    //redirect('admin/View_dt_pinjam/'.$id_pinjam2,'refresh');
                    //$data['denda']=$jumlahdenda;
            //data yang ditampilkan
            $id_pinjam=$this->input->get('id_pinjam',true);
            $data['data_kembali'] = $this->Buku_model->getAllData("tb_kembali");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            $data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
            $data['data_pinjam']=$this->Buku_model->getAllData("tb_pinjam");
            $data['data_dt_pinjam']=$this->Buku_model->getAllData("tb_detail_pinjam"); 
            $data['data_detail_pinjam1'] = $this->Buku_model->get_detail1("tb_detail_pinjam","id_pinjam",$id_pinjam);
            $tmp['content']=$this->load->view('admin/kembali/Buku_kembali',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }
}
?>