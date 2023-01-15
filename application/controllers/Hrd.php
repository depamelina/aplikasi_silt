<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hrd extends CI_Controller {

public function __construct()
  {
    parent::__construct();
    $this->load->model('Models','m');
  }

	public function index()
	{
	$select = $this->db->select('*, sum(nilai_plus+nilai_isi) as nilai_akhir, max(nilai_isi) as nilai_max, min(nilai_isi) as nilai_min, count(resume_buku.judul) as total_resume');
	$select = $this->db->join('resume_buku', 'users.username=resume_buku.username');
	$data['read_karyawan'] = $this->m->Get_All('users',$select);
	$this->load->view('hrd/index',$data);
	}

	public function indikatorNilai()
	{
		$this->load->view('hrd/indikator-nilai');
	}

	public function ResumeBuku()
	{
    $data['tahun']=date('Y');
    if(isset($_POST['tahun'])){
      $data['tahun']=$this->input->post('tahun');
    }
    $select = $this->db->select('*');
	$select = $this->db->where('kode_karyawan >','1');
    $data['read_users'] = $this->m->Get_All('users',$select);
	$this->load->view('hrd/resume-buku',$data);
	}

	public function ResumeBukuVerifikasi($id_buku)
	{
    $where=array(
			'id_buku'			=> $id_buku
		);
		$data=array(
			'status'		=>	'1',
		);
		$this->m->Update($where,$data,'resume_buku');
		redirect('Hrd/ResumeBuku');
	}

  public function ViewResumeBuku($id)
	{
		$select = $this->db->select('*');
		$select = $this->db->where('id_buku',$id);
		$data['read_resume_buku'] = $this->m->Get_All('resume_buku',$select);

		$this->load->view('hrd/resume-buku-view',$data);
	}

 public function NilaiResume()
 {
	$data['tahun']=date('Y');
    if(isset($_POST['tahun'])){
      $data['tahun']=$this->input->post('tahun');
    }
    $select = $this->db->select('*, sum(nilai_plus+nilai_isi) as nilai_akhir');
	$select = $this->db->join('resume_buku', 'users.username=resume_buku.username');
	$select = $this->db->where('kode_karyawan >','1');
	$select = $this->db->group_by('resume_buku.username');
	$select = $this->db->order_by('nilai_akhir', 'DESC');
	$data['read_karyawan'] = $this->m->Get_All('users',$select);
	$this->load->view('hrd/nilai-resume',$data);
 }

 public function DetailNilai()
 {
	$data['tahun']=date('Y');
    if(isset($_POST['tahun'])){
      $data['tahun']=$this->input->post('tahun');
    }
	$select = $this->db->select('*');
	$data['read_nilai'] = $this->m->Get_All('nilai',$select);
	$select = $this->db->select('*');
	$data['read_judul'] = $this->m->Get_All('resume_buku',$select);

	$this->load->view('hrd/detail-nilai',$data);
 }

 public function DetailNilai2()
{
    $data['tahun']=date('Y');
    if(isset($_POST['tahun'])){
      $data['tahun']=$this->input->post('tahun');
    }
	$select = $this->db->select('*');
	$select = $this->db->where('username',$this->input->get('username'));
	$select = $this->db->group_by('bulan');
	$data['read_resume'] = $this->m->Get_All('resume_buku',$select);
	$this->load->view('hrd/detail-nilai2',$data);
}



 public function CreatePoin()
	{
		$where=array(
			'id_buku'		=>	$this->input->post('id_buku')
		);
		$data=array(
			'nilai_plus'		=>	$this->input->post('nilai_plus'),
			'nilai_isi'			=>	$this->input->post('nilai_isi')
			);		
		$this->m->Update($where, $data, 'resume_buku');
		$resume_buku = $this->db->select('*');
		$resume_buku = $this->db->where($where);
		$resume_buku = $this->db->group_by('username');
		$resume_buku = $this->m->Get_All('resume_buku',$resume_buku);
		redirect('hrd/DetailNilai2?username='.$resume_buku[0]->username);
	}


 public function profile()
{	
	$select = $this->db->select('*');
	$select = $this->db->join('jabatan', 'karyawan.id_jabatan=jabatan.id');
	$select = $this->db->where('kode_karyawan','1');
	$data['read_karyawan'] = $this->m->Get_All('karyawan',$select);
	$this->load->view('hrd/profile',$data);
}

public function DataKaryawan()
{	
	$select = $this->db->select('*');
	$select = $this->db->join('jabatan', 'karyawan.id_jabatan=jabatan.id');
	//$select = $this->db->where('kode_karyawan >','1');
	$data['read_karyawan'] = $this->m->Get_All('karyawan',$select);
	$select = $this->db->select('*');
	$data['read_jb'] = $this->m->Get_All('jabatan',$select);
	$this->load->view('hrd/data-karyawan',$data);
}

public function CreateKaryawan()
	{
		$data=array(
			'nama_lengkap'		=>	$this->input->post('nama_lengkap'),
			'nik'				=>	$this->input->post('nik'),
			'jk'				=>	$this->input->post('jk'),
			'id_jabatan'		=>	$this->input->post('id_jabatan'),
			'alamat'			=>	$this->input->post('alamat'),
			'no_hp'	            =>	$this->input->post('no_hp')
			);		
		$this->m->Save($data, 'karyawan');
		redirect('hrd/DataKaryawan');
	}

	function UpdateKaryawan()
	{
		$where=array(
			'kode_karyawan'		=>	$this->input->post('kode_karyawan')
		);
		$data=array(
			'nama_lengkap'		=>	$this->input->post('nama_lengkap'),
			'nik'				=>	$this->input->post('nik'),
			'jk'				=>	$this->input->post('jk'),
			'id_jabatan'		=>	$this->input->post('id_jabatan'),
			'alamat'			=>	$this->input->post('alamat'),
			'no_hp'	            =>	$this->input->post('no_hp')
			);	
	
		$this->m->Update($where, $data, 'karyawan');
		redirect('hrd/DataKaryawan');
	}

	function DeleteKaryawan()
	{
		
		$where=array(
			'kode_karyawan'		=>	$this->input->post('kode_karyawan')
		);
		$this->m->Delete($where,'karyawan');
		redirect(base_url().'hrd/DataKaryawan');
	}

	public function DataJabatan()
{	
	$select = $this->db->select('*');
	$data['read_jb'] = $this->m->Get_All('jabatan',$select);
	$this->load->view('hrd/data-jabatan',$data);
}


	public function CreateJabatan()
	{
		$data=array(
			'jabatan'		=>	$this->input->post('jabatan'),
		);
		$this->m->Save($data, 'jabatan');
		redirect('hrd/DataJabatan');
	}

	function UpdateJabatan()
	{
		$where=array(
			'id'		=>	$this->input->post('id')
		);
		$data=array(
			'jabatan'		=>	$this->input->post('jabatan'),
			);	
	
		$this->m->Update($where, $data, 'jabatan');
		redirect('hrd/DataJabatan');
	}

	function DeleteJabatan()
	{
		
		$where=array(
			'id'		=>	$this->input->post('id')
		);
		$this->m->Delete($where,'jabatan');
		redirect(base_url().'hrd/DataJabatan');
	}


	public function DataGenre()
{	
	$select = $this->db->select('*');
	$data['read_gn'] = $this->m->Get_All('genre',$select);
	$this->load->view('hrd/data-genre',$data);
}


	public function CreateGenre()
	{
		$data=array(
			'genre_buku'		=>	$this->input->post('genre_buku'),
		);
		$this->m->Save($data, 'genre');
		redirect('hrd/DataGenre');
	}

	function UpdateGenre()
	{
		$where=array(
			'id'		=>	$this->input->post('id')
		);
		$data=array(
			'genre_buku'		=>	$this->input->post('genre_buku'),
			);	
	
		$this->m->Update($where, $data, 'genre');
		redirect('hrd/DataGenre');
	}

	function DeleteGenre()
	{
		
		$where=array(
			'id'		=>	$this->input->post('id')
		);
		$this->m->Delete($where,'genre');
		redirect('hrd/DataGenre');
	}

	public function DataUser()
	{	
		$select = $this->db->select('*');
		$data['read_karyawan'] = $this->m->Get_All('users',$select);
		$select = $this->db->select('*');
		$data['read_jb'] = $this->m->Get_All('jabatan',$select);
		$select = $this->db->select('*');
		$data['read_kar'] = $this->m->Get_All('karyawan',$select);
		$this->load->view('hrd/data-user',$data);
	}

	public function CreateUser()
	{
		$data=array(
			'kode_karyawan'	=>	$this->input->post('kode_karyawan'),
			'fullname'		=>	$this->input->post('fullname'),
			'username'		=>	$this->input->post('username'),
			'password'		=>	$this->input->post('password'),
			'level'			=>	$this->input->post('level'),
			'active'		=>	$this->input->post('active'),
			'color1'		=>	$this->input->post('color1'),
			'color2'		=>	$this->input->post('color2'),
			'gradient'		=>	$this->input->post('gradient'),
		);
		$this->m->Save($data, 'users');
		redirect('hrd/DataUser');
	}

	function UpdateUser()
	{
		$where=array(
			'username'		=>	$this->input->post('username')
		);
		$data=array(
			'kode_karyawan'	=>	$this->input->post('kode_karyawan'),
			'fullname'		=>	$this->input->post('fullname'),
			'username'		=>	$this->input->post('username'),
			'password'		=>	$this->input->post('password'),
			'level'			=>	$this->input->post('level'),
			'active'		=>	$this->input->post('active'),
			'color1'		=>	$this->input->post('color1'),
			'color2'		=>	$this->input->post('color2'),
			'gradient'		=>	$this->input->post('gradient'),
			);	
	
		$this->m->Update($where, $data, 'users');
		redirect('hrd/DataUser');
	}

	function DeleteUser()
	{
		
		$where=array(
			'kode_karyawan'		=>	$this->input->post('kode_karyawan')
		);
		$this->m->Delete($where,'users');
		redirect(base_url().'hrd/DataUser');
	}



	public function getKaryawan()
	{
		$where = array(
			'kode_karyawan' => $this->input->get('kode_karyawan')
		);
		$data['getKaryawan'] = $this->m->Get_Where($where, 'karyawan');
		$this->load->view('hrd/getKaryawan', $data);
	}

 public function Laporan()
 {
	$data['dari'] = date('Y-m-d');
	$data['sampai'] = date('Y-m-d', strtotime($data['dari']. ' + 1 months'));
	$select = $this->db->select('*');
	$select = $this->db->where('kode_karyawan >','1');
    $data['read_users'] = $this->m->Get_All('users',$select);
	$this->load->view('hrd/laporan',$data);
}

public function LaporanKeseluruhan()
{
   $data['dari'] = date('Y-m-d');
   $data['sampai'] = date('Y-m-d', strtotime($data['dari']. ' + 1 months'));
   $select = $this->db->select('*');
   $select = $this->db->where('kode_karyawan >','1');
   $data['read_users'] = $this->m->Get_All('users',$select);
   $this->load->view('hrd/laporan-keseluruhan',$data);
}


public function CetakLaporan(){
	// $data['dari'] = $_GET['dari'];
	// $data['sampai'] = $_GET['sampai'];
	$select = $this->db->select('*');
	$data['read_users'] = $this->m->Get_All('users',$select);
	$select = $this->db->select('*');
	$select = $this->db->join('users', 'resume_buku.username=users.username');
	$select = $this->db->where('users.fullname',$this->input->get('fullname'));
	$select = $this->db->group_by('bulan');
	$data['read_resume'] = $this->m->Get_All('resume_buku',$select);
	$this->load->view('hrd/cetak-laporan',$data);
}

public function CetakLaporan2(){
	$select = $this->db->select('*');
	$data['read_resume'] = $this->m->Get_All('resume_buku',$select);
	$select = $this->db->select('*, sum(nilai_plus+nilai_isi) as nilai_akhir');
	$select = $this->db->join('resume_buku', 'users.username=resume_buku.username');
	$select = $this->db->where('kode_karyawan >','1');
	$select = $this->db->group_by('resume_buku.username');
	$data['read_karyawan'] = $this->m->Get_All('users',$select);
	$this->load->view('hrd/cetak-laporan2',$data);
}


}
?>
