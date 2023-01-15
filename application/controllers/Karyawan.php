<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

public function __construct()
{
      parent::__construct();
      $this->load->model('Models','m');
}
	
public function index()
{
	$select = $this->db->select('*, sum(nilai_plus+nilai_isi) as nilai_akhir, max(nilai_isi) as nilai_max, min(nilai_isi) as nilai_min, count(users.username) as total_resume');
	$select = $this->db->join('resume_buku', 'users.username=resume_buku.username');
	$select = $this->db->where('kode_karyawan', $this->session->userdata('kode_karyawan'));
	$select = $this->db->group_by('resume_buku.username');
	$data['read_karyawan'] = $this->m->Get_All('users',$select);
	$data['nilai_akhir'] = 0;
	$data['nilai_max'] = 0;
	$data['nilai_min'] = 0;
	$data['total_resume'] = 0;
	foreach ($data['read_karyawan'] as $r){
		$data['nilai_akhir'] = $r->nilai_akhir;
		$data['nilai_max'] = $r->nilai_max;
		$data['nilai_min'] = $r->nilai_min;
		$data['total_resume'] = $r->total_resume;
	}
	$this->load->view('karyawan/index',$data);
}  	
public function Bonus()
{
	$select = $this->db->select('*, sum(nilai_plus+nilai_isi) as nilai_akhir, max(nilai_isi) as nilai_max, min(nilai_isi) as nilai_min, count(users.username) as total_resume');
	$select = $this->db->join('resume_buku', 'users.username=resume_buku.username');
	$select = $this->db->where('users.username', $this->session->userdata('username'));
	$select = $this->db->group_by('resume_buku.username');
	$data['read_karyawan'] = $this->m->Get_All('users',$select);
	$data['nilai_akhir'] = 0;
	$data['nilai_max'] = 0;
	$data['nilai_min'] = 0;
	$data['total_resume'] = 0;
	foreach ($data['read_karyawan'] as $r){
		$data['nilai_akhir'] = $r->nilai_akhir;
		$data['nilai_max'] = $r->nilai_max;
		$data['nilai_min'] = $r->nilai_min;
		$data['total_resume'] = $r->total_resume;
	}
	$this->load->view('karyawan/bonus',$data);
}  

public function indikatorNilai()
	{
		$this->load->view('karyawan/indikator-nilai');
	}
	
public function ResumeBuku()
{
    $data['tahun']=date('Y');
    if(isset($_POST['tahun'])){
      $data['tahun']=$this->input->post('tahun');
    }
	$this->load->view('karyawan/resume-buku',$data);
}

public function AddResumeBuku($bulan,$tahun)
{
    $data['bulan']=$bulan;
    $data['tahun']=$tahun;
	$select = $this->db->select('*');
	$data['read_gr'] = $this->m->Get_All('genre',$select);
	$this->load->view('karyawan/resume-buku-add',$data);
}

public function AddResumeBukuAction()
{
  		$data=array(
	        'username'		=>	$this->session->userdata('username'),
  			'judul'		    =>	$this->input->post('judul'),
			'id_genre'		    =>	$this->input->post('id_genre'),
  			'no_isbn'	    =>	$this->input->post('isbn'),
  			'penulis'	    =>	$this->input->post('penulis'),
  			'penerbit'	  	=>	$this->input->post('penerbit'),
  			'tahun_terbit'	=>	$this->input->post('tahun_terbit'),
  			'resume'	    =>	$this->input->post('resume_buku'),
        	'bulan'	     	=>	$this->input->post('bulan'),
  			'tahun'	      	=>	$this->input->post('tahun')
	);
	$this->m->Save($data, 'resume_buku');
	redirect('Karyawan/ResumeBuku');
}

	public function EditResumeBuku($id)
{
	$select = $this->db->select('*');
	$select = $this->db->where('id_buku',$id);
	$data['read_resume_buku'] = $this->m->Get_All('resume_buku',$select);
	$select = $this->db->select('*');
	$data['read_gr'] = $this->m->Get_All('genre',$select);

	$this->load->view('karyawan/resume-buku-edit',$data);
}

	public function EditResumeBukuAction()
{
	$where=array(
			'id_buku'			=> $this->input->post('id_buku')
		);
	$data=array(
			'judul'		=>	$this->input->post('judul'),
			'id_genre'	=>	$this->input->post('id_genre'),
			'no_isbn'	=>	$this->input->post('isbn'),
			'penulis'	=>	$this->input->post('penulis'),
			'penerbit'	=>	$this->input->post('penerbit'),
			'tahun_terbit'	=>	$this->input->post('tahun_terbit'),
			'resume'	=>	$this->input->post('resume_buku'),
	);
	$this->m->Update($where,$data,'resume_buku');
	redirect(base_url().'Karyawan/ResumeBuku');
}

	public function ViewResumeBuku($id)
{
	$select = $this->db->select('*');
	$select = $this->db->where('id_buku',$id);
	$data['read_resume_buku'] = $this->m->Get_All('resume_buku',$select);
	$this->load->view('karyawan/resume-buku-view',$data);
}

public function profile()
{	
	$select = $this->db->select('*');
	$select = $this->db->join('jabatan', 'karyawan.id_jabatan=jabatan.id');
	$select = $this->db->where('kode_karyawan',$this->session->userdata('kode_karyawan'));
	$data['read_karyawan'] = $this->m->Get_All('karyawan',$select);
	$this->load->view('karyawan/profile',$data);
}

function UpdateProfile()
	{
		$where=array(
			'kode_karyawan'			=>	$this->input->post('kode_karyawan')
		);
		$data=array(
			'nama_lengkap'	=>	$this->input->post('nama_lengkap'),
			'jk'			=>	$this->input->post('jk'),
			'alamat'		=>	$this->input->post('alamat'),
			'no_hp'	=>	$this->input->post('no_hp'),
		);
	
		$this->m->Update($where, $data, 'karyawan');
		redirect('karyawan/profile');
	}


public function NilaiResume()
{
	$data['tahun']=date('Y');
    if(isset($_POST['tahun'])){
      $data['tahun']=$this->input->post('tahun');
    }
	$select = $this->db->select('*');
	$select = $this->db->group_by('bulan');
	$select = $this->db->where('username',$this->input->get('username'));
	$data['read_resume'] = $this->m->Get_All('resume_buku',$select);
	$this->load->view('karyawan/nilai-resume',$data);
}


}
?>
