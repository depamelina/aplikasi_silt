<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
    }

	public function index()
	{
		$this->Login();
	}
	public function masuk()
	{
		$this->load->view('mkt/index');
	}

	/** --Login-- **/
	public function login()
	{
		$this->load->view('log/index');
	}
	public function cek_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		$select = $this->db->select('*');
		$select = $this->db->where('username',$username);
		$login = $this->m->Get_All('users',$select);
		if(count($login)>0){
			foreach ($login as $d) {
				$password_hash = $d->password;
				$level = $d->level;
				if(password_verify($password, $password_hash)) {
					$data=array(
						'username' => $d->username,
						'kode_karyawan' => $d->kode_karyawan,
						'fullname' => $d->fullname,
						'level' => $d->level,
						'foto' => $d->foto,
						'color1' => $d->color1,
						'color2' => $d->color2,
						'gradient' => $d->gradient,
					);
					$this->session->set_userdata($data);
					echo ucfirst($d->level);
				}else{
					echo 'false';
				}
			}
		}else{
			echo "false";
		}
	}
	/** --Login-- **/

	/** --Logout-- **/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	/** --Logout-- **/

}
