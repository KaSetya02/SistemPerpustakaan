<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);

class Home extends MY_Controller {
	//home default
	public function index(){
		$data['title']='Admin Home';
		$data['pointer']="Home";
		$data['classicon']="fa fa-home";
		$data['main_bread']="Home";
		$data['sub_bread']="Dashboard";
		$data['desc']="Overview";
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		
		$year=date('Y');
		$data['januari']=$this->Buku_model->get_jml_peminjaman(''.$year.'-01-01', ''.$year.'-01-31')->total;
		$data['februari']=$this->Buku_model->get_jml_peminjaman(''.$year.'-02-01', ''.$year.'-02-31')->total;
		$data['maret']=$this->Buku_model->get_jml_peminjaman(''.$year.'-03-01', ''.$year.'-03-31')->total;
		$data['april']=$this->Buku_model->get_jml_peminjaman(''.$year.'-04-01', ''.$year.'-04-31')->total;
		$data['mei']=$this->Buku_model->get_jml_peminjaman(''.$year.'-05-01', ''.$year.'-05-31')->total;
		$data['juni']=$this->Buku_model->get_jml_peminjaman(''.$year.'-06-01', ''.$year.'-06-31')->total;
		$data['juli']=$this->Buku_model->get_jml_peminjaman(''.$year.'-07-01', ''.$year.'-07-31')->total;
		$data['agustus']=$this->Buku_model->get_jml_peminjaman(''.$year.'-08-01', ''.$year.'-08-31')->total;
		$data['september']=$this->Buku_model->get_jml_peminjaman(''.$year.'-09-01', ''.$year.'-09-31')->total;
		$data['oktober']=$this->Buku_model->get_jml_peminjaman(''.$year.'-10-01', ''.$year.'-10-31')->total;
		$data['november']=$this->Buku_model->get_jml_peminjaman(''.$year.'-11-01', ''.$year.'-11-31')->total;
		$data['desember']=$this->Buku_model->get_jml_peminjaman(''.$year.'-12-01', ''.$year.'-12-31')->total;

		// /*line chart */
    	$data['buku_pinjam']=$this->Buku_model->buku_pinjam();
    	$data['kategori_pinjam']=$this->Buku_model->kategori_pinjam();
    	$data['kelas_pinjam']=$this->Buku_model->kelas_pinjam();
    
    	$data['warna']=	array('#f56954','#00a65a','#f39c12','#00c0ef','#3c8dbc','#d2d6de', '#d9f442','#561d84','#f90ec3', '#31f7a4');
		$tmp['content']=$this->load->view('admin/home',$data, TRUE);
		$this->load->view('admin/layout',$tmp);
	}
}
/* End of file admin.php */
/* Location: ./application/controllers/admin.php */