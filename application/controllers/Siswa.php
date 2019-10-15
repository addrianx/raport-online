<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_controller{

	public function __construct()
	{
		parent::__construct();
		
	    $this->load->database();
	    $this->load->model('Siswa_model');
	    $this->load->library('form_validation');
	    $this->load->helper(array('url','form','menu_helper','session'));


		if($this->session->userdata['state']){
		  if($this->session->userdata['sesi']=='siswa'){
			  return true;
				}else if($this->session->userdata['sesi']=='admin'){
					redirect('admin');
				}else if($this->session->userdata['sesi']=='guru'){
					redirect('guru');
				}
		  }else{
			redirect('login');
		}

	}

	public function set_pass(){
		$data['judul'] = 'Setting Password';
		$emailSiswa=$this->session->userdata['email'];
		$data['password'] = $this->Siswa_model->get_password('siswa')->where(['email'=>$emailSiswa])->get()->row_array();
			if($data['password']==TRUE){
				redirect('siswa');
			}else{
				redirect('siswa');
			}
			exit;
		
	}

	public function index()
	{
		$data['Judul'] = 'Halaman Siswa';
		$data['session'] = $this->session->userdata();
		$data['user'] = $this->Siswa_model->fetch_get_where_table('siswa', 'email', $data['session']['email'])->row_array();
		$data['biodata'] = $this->Siswa_model->fetch_joined_data_siswa('siswa', 'biodata_siswa', 'siswa.no_siswa=biodata_siswa.no_siswa')->where('biodata_siswa.no_siswa', $data['user']['no_siswa'])->get()->row_array();
		//var_dump($data['user']['no_siswa']);
		// $data['biodata'] = $this->db->select('*')->from('siswa')->join('biodata_siswa', 'siswa.no_siswa = biodata_siswa.no_siswa', 'left')->get()->row_array();
		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menus-siswa',$data);
		$this->load->view('siswa/index', $data);
		$this->load->view('templates/footer');
	}


	public function absensi()
	{
		$data['Judul'] = 'Absensi';
		$data['session'] = $this->session->userdata();
		$data['user'] = $this->Siswa_model->fetch_get_where_table('siswa', 'email', $data['session']['email'])->row_array();
		$data['absensi'] = $this->Siswa_model->fetch_joined_data_siswa('siswa', 'cabang_kelas', 'siswa.kode_kelas=cabang_kelas.kode_kelas')->where('siswa.kode_kelas', $data['user']['kode_kelas'])->get()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menus-siswa',$data);
		$this->load->view('siswa/absensi', $data);
		$this->load->view('templates/footer');		
	}


	public function daftar_nilai()
	{
		$data['Judul'] = 'Daftar Nilai';
		$data['session'] = $this->session->userdata();
		$data['user'] = $this->Siswa_model->fetch_get_where_table('siswa', 'email', $data['session']['email'])->row_array();
		$data['nilai'] = $this->Siswa_model->fetch_joined_data_siswa('nilai', 'mata_pelajaran', 'nilai.matpel_id=mata_pelajaran.matpel_id')->where('no_siswa', $data['user']['no_siswa'])->get()->result_array();

		$matpel_id = [];
		foreach($data['nilai'] as $matpelid){
			$matpel_id = $matpelid['matpel_id'];
		} 


		$this->load->view('templates/header', $data);
		$this->load->view('templates/menus-siswa',$data);
		$this->load->view('siswa/daftar-nilai', $data);
		$this->load->view('templates/footer');
	}

	public function detail_nilai($id)
	{
		$data['Judul'] = 'Detail Nilai';
		$data['session'] = $this->session->userdata();
		$data['user'] = $this->Siswa_model->fetch_get_where_table('siswa', 'email', $data['session']['email'])->row_array();
		$data['nilai'] = $this->Siswa_model->fetch_joined_data_siswa('nilai', 'mata_pelajaran', 'nilai.matpel_id=mata_pelajaran.matpel_id')->where('nl_id', $id)->get()->row_array();

		$harian=$data['nilai']['harian']; 
		$data['splith']=explode(',', $harian);

		$tugas=$data['nilai']['tugas']; 
		$data['splitt']=explode(',', $tugas);

		$mandiri=$data['nilai']['mandiri']; 
		$data['splitm']=explode(',', $mandiri);

		$uts=$data['nilai']['uts']; 
		$data['splitut']=explode(',', $uts);

		$uas=$data['nilai']['uas']; 
		$data['splitua']=explode(',', $uas);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menus-siswa',$data);
		$this->load->view('siswa/detail-nilai', $data);
		$this->load->view('templates/footer');
	}


	public function tugas_siswa()
	{
		$data['Judul'] = 'Tugas Siswa';
		$data['session'] = $this->session->userdata();
		$data['user'] = $this->Siswa_model->fetch_get_where_table('siswa', 'email', $data['session']['email'])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menus-siswa',$data);
		$this->load->view('siswa/tugas-siswa', $data);
		$this->load->view('templates/footer');
	}

	function edit_biodata(){
		$data['Judul'] = 'Tugas Siswa';
		$data['gender'] = array('laki-laki', 'perempuan');
		$data['agama'] = array('islam', 'kristen', 'hindu', 'budha', 'lainnya');
		$data['darah'] = array('a', 'b', 'ab', 'o');
		$data['session'] = $this->session->userdata();
		$data['user'] = $this->Siswa_model->fetch_get_where_table('siswa', 'email', $data['session']['email'])->row_array();
		$data['biodata'] = $this->Siswa_model->fetch_joined_data_siswa('siswa', 'biodata_siswa', 'siswa.no_siswa=biodata_siswa.no_siswa')->where('biodata_siswa.no_siswa', $data['user']['no_siswa'])->get()->row_array();
		$biodata = $data['biodata'];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menus-siswa',$data);
		$this->load->view('siswa/biodata-siswa', $data);
		$this->load->view('templates/footer');

		if($this->input->post()){
			//var_dump($_POST); exit;
			$data = [
				'tempat_lahir' => htmlspecialchars(ucfirst($_POST['tempat_lahir'],TRUE)),
				'tanggal_lahir' => htmlspecialchars(ucfirst($_POST['tanggal'],TRUE)),
				'jenis_kelamin' => htmlspecialchars(ucfirst($_POST['gender'],TRUE)),
				'agama' => htmlspecialchars(ucfirst($_POST['agama'],TRUE)),
				'golongan_darah' => htmlspecialchars(ucfirst($_POST['goldarah'],TRUE)),
				'nama_ayah' => htmlspecialchars(ucfirst($_POST['ayah'],TRUE)),
				'nama_ibu' => htmlspecialchars(ucfirst($_POST['ibu'],TRUE)),
				'alamat' => htmlspecialchars(ucfirst($_POST['alamat'],TRUE))
			];
			$this->db->set($data);
			$this->db->where('no_siswa', $biodata['no_siswa']);
			echo $this->db->update('biodata_siswa');
			$this->session->set_flashdata(array('css'=>'alert-success','alert'=>'Biodata <strong>'.$biodata['nama_siswa'].'</strong> Berhasil Diperbarui !'));
			redirect('siswa/edit_biodata');
		}		
 
	}

	public function setting(){
		$data['Judul'] = 'Setting';
		$data['session'] = $this->session->userdata();
		$data['user'] = $this->Siswa_model->fetch_get_where_table('siswa', 'email', $data['session']['email'])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menus-siswa',$data);
		$this->load->view('siswa/setting', $data);
		$this->load->view('templates/footer');
	}

	public function logout(){
    $this->session->unset_userdata('login');
    $this->session->sess_destroy();
    redirect('login');
  }

}