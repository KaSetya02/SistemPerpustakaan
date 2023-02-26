<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penerbit extends CI_Controller {

	
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
            $data['title']='Daftar Penerbit';
            $data['pointer']="Penerbit";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Data Penerbit";
            $data['sub_bread']="Daftar Penerbit";
            $data['desc']="Data Master Penerbit, Menampilkan data Penerbit";

            /*data yang ditampilkan*/
            $data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
            $data['data_provinsi'] = $this->Buku_model->getAllData("tb_provinsi");
            //$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
            //$data['isi']=$this->Anggota_model->get_all();
            //$data['js']=$this->load->view('admin/anggota/js');
            $tmp['content']=$this->load->view('petugas/penerbit/View_penerbit',$data, TRUE);
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
                $this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required');
                $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
                if($this->form_validation->run()==FALSE)
                {
                    $data['title']='Tambah Penerbit';
                    $data['pointer']="Penerbit";
                    $data['classicon']="fa fa-book";
                    $data['main_bread']="Data Penerbit";
                    $data['sub_bread']="Tambah Penerbit";
                    $data['desc']="form untuk Input data Penerbit";

                    /*data yang ditampilkan*/
                    $data['data_provinsi'] = $this->Buku_model->getAllData("tb_provinsi");
                    $data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
                    //$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
                    //$data['isi']=$this->Anggota_model->get_all();
                    //$data['js']=$this->load->view('admin/anggota/js');
                    $tmp['content']=$this->load->view('petugas/penerbit/Create_penerbit',$data, TRUE);
                    $this->load->view('petugas/layout',$tmp);
                }
                else
                {
                    $data = array('id_penerbit' => '',
                                  'nama_penerbit' => $this->input->post('penerbit'),
                                  'id_provinsi' => $this->input->post('provinsi')
                                );
                    $quer=$this->Buku_model->insertData('tb_penerbit',$data);
                    redirect("petugas/Penerbit","refresh");   
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
        if(!empty($cek) && $stts=='petugas')
        {       
                $id = $this->input->get('id_penerbit',true);    
                $this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required');
                $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
                if($this->form_validation->run()==FALSE)
                {
                    //$data ['err'] = validation_errors();
                    $data['title']='Edit penerbit';
                    $data['pointer']="Penerbit";
                    $data['classicon']="fa fa-book";
                    $data['main_bread']="Data Penerbit";
                    $data['sub_bread']="Edit Penerbit";
                    $data['desc']="Form untuk melakukan edit data Penerbit Buku";

                    /*data yang ditampilkan*/
                    $data['penerbit'] = $this->Buku_model->get_detail1('tb_penerbit','id_penerbit',$id);
                    $data['data_provinsi'] = $this->Buku_model->getAllData("tb_provinsi");
                    //$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
                    $tmp['content']=$this->load->view('petugas/penerbit/Edit_penerbit',$data,true);
                    $this->load->view('petugas/layout',$tmp);
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
        if(!empty($cek) && $stts=='petugas')
        {       
                $id = $this->input->post('id_penerbit');    
                $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
                $this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required');
                if($this->form_validation->run()==FALSE)
                {
                    //$data ['err'] = validation_errors();
                    $data['title']='Edit Penerbit';
                    $data['pointer']="Penerbit";
                    $data['classicon']="fa fa-book";
                    $data['main_bread']="Data Penerbit";
                    $data['sub_bread']="Edit Penerbit";
                    $data['desc']="Form untuk melakukan edit Penerbit";

                    /*data yang ditampilkan*/
                    $data['penerbit'] = $this->Buku_model->get_detail1('tb_penerbit','id_penerbit',$id);
                    $data['data_provinsi'] = $this->Buku_model->getAllData("tb_provinsi");
                    //$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
                    //$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
                    $tmp['content']=$this->load->view('petugas/penerbit/Edit_penerbit',$data,true);
                    $this->load->view('petugas/layout',$tmp);
                }
                else
                {
                    $id = $this->input->post('id_penerbit');    
                    $field='id_penerbit';
                    $data = array(
                                  'nama_penerbit' => $this->input->post('penerbit'),
                                  'id_provinsi' => $this->input->post('provinsi')
                                );
                    $quer=$this->Buku_model->updateData1('tb_penerbit',$data,$field,$id);
                    redirect("petugas/Penerbit","refresh");   
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
            $field='id_penerbit';
            $id = $this->input->get('id_penerbit',true);    
            $query = $this->Buku_model->delete('tb_penerbit',$field,$id);                   
            if ($query)
                {
                    $this->session->set_flashdata("message","berhasil");
                    redirect("petugas/Penerbit","refresh");
                }
            else
                {
                    $this->session->set_flashdata("message","gagal");
                    redirect("petugas/Penerbit","refresh");
                }
        }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */