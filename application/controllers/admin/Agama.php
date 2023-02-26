<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);

class Agama extends CI_Controller {

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
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data['title']='Daftar Agama';
            $data['pointer']="Agama";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Data Agama";
            $data['sub_bread']="Daftar Agama";
            $data['desc']="Data Master Agama, Menampilkan data Agama";

            /*data yang ditampilkan*/
            $data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
            //$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
            //$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
            //$data['isi']=$this->Anggota_model->get_all();
            //$data['js']=$this->load->view('admin/anggota/js');
            $tmp['content']=$this->load->view('admin/agama/View_agama',$data, TRUE);
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
                $this->form_validation->set_rules('agama', 'agama', 'trim|required');

                if($this->form_validation->run()==FALSE)
                {
                    $data['title']='Tambah Agama';
                    $data['pointer']="Agama";
                    $data['classicon']="fa fa-book";
                    $data['main_bread']="Data Agama";
                    $data['sub_bread']="Tambah Agama";
                    $data['desc']="form untuk Input data Agama";

                    /*data yang ditampilkan*/
                    //$data['data_provinsi'] = $this->Buku_model->getAllData("tb_provinsi");
                    //$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
                    $data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
                    //$data['isi']=$this->Anggota_model->get_all();
                    //$data['js']=$this->load->view('admin/anggota/js');
                    $tmp['content']=$this->load->view('admin/agama/Create_agama',$data, TRUE);
                    $this->load->view('admin/layout',$tmp);
                }
                else
                {
                    $data = array('id_agama' => '',
                                  'agama' => $this->input->post('agama')
                                );
                    $quer=$this->Buku_model->insertData('tb_agama',$data);
                    redirect("admin/Agama","refresh");   
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
                $id = $this->input->get('id_agama',true);    
                $this->form_validation->set_rules('agama', 'agama', 'trim|required');

                if($this->form_validation->run()==FALSE)
                {
                    //$data ['err'] = validation_errors();
                    $data['title']='Edit Agama';
                    $data['pointer']="Agama";
                    $data['classicon']="fa fa-book";
                    $data['main_bread']="Data Agama";
                    $data['sub_bread']="Edit Agama";
                    $data['desc']="Form untuk melakukan edit data Agama";

                    /*data yang ditampilkan*/
                    //$data['provinsi'] = $this->Buku_model->get_detail1('tb_provinsi','id_provinsi',$id);
                    //$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
                    $data['agama'] = $this->Buku_model->get_detail1('tb_agama','id_agama',$id);
                    $tmp['content']=$this->load->view('admin/agama/Edit_agama',$data,true);
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
                $id = $this->input->post('id_agama');    
                $this->form_validation->set_rules('agama', 'agama', 'trim|required');
                if($this->form_validation->run()==FALSE)
                {
                    //$data ['err'] = validation_errors();
                    $data['title']='Edit Agama';
                    $data['pointer']="Agama";
                    $data['classicon']="fa fa-book";
                    $data['main_bread']="Data Agama";
                    $data['sub_bread']="Edit Agama";
                    $data['desc']="Form untuk melakukan edit Agama";

                    /*data yang ditampilkan*/
                    $data['agama'] = $this->Buku_model->get_detail1('tb_agama','id_agama',$id);
                    //$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
                    //$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
                    $tmp['content']=$this->load->view('admin/provinsi/Edit_anggota',$data,true);
                    $this->load->view('admin/layout',$tmp);
                }
                else
                {
                    $id = $this->input->post('id_agama');    
                    $field='id_agama';
                    $data = array(
                                  'agama' => $this->input->post('agama')
                                );
                    $quer=$this->Buku_model->updateData1('tb_agama',$data,$field,$id);
                    redirect("admin/Agama","refresh");   
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
            $field='id_agama';
            $id = $this->input->get('id_agama',true);    
            $query = $this->Buku_model->delete('tb_agama',$field,$id);                   
            if ($query)
                {
                    $this->session->set_flashdata("message","berhasil");
                    redirect("admin/Agama","refresh");
                }
            else
                {
                    $this->session->set_flashdata("message","gagal");
                    redirect("admin/Agama","refresh");
                }
        }
}
?>