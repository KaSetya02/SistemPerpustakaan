<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perpus_model extends CI_Model {

	//query login
	public function getLoginData($usr,$psw)
	{
		//khusus PHP deprecated
		$u = $usr;
		$p = md5($psw);
		$q_cek_login = $this->db->get_where('tb_login', array('username' => $u, 'password' => $p));
		if(count($q_cek_login->result())>0)
		{
			foreach($q_cek_login->result() as $qck)
			{
				if($qck->stts=='petugas')
				{
					$sess_data['logged_in'] = 'yes';
					$sess_data['stts'] = 'petugas';
					$sess_data['username']=$u;
					$this->session->set_userdata($sess_data);
					header('location:'.base_url().'petugas/home');
				}
				else if($qck->stts=='admin')
				{
					$sess_data['logged_in'] = 'yes';
					$sess_data['stts'] = 'admin';
					$sess_data['username']=$u;
					$this->session->set_userdata($sess_data);
					header('location:'.base_url().'admin/home');
				}

			}
		}
		else
		{
			header('location:'.base_url().'web/log');
		}
	}

}

/* End of file Perpus_model.php */
/* Location: ./application/models/Perpus_model.php */