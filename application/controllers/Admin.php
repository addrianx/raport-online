<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_controller{



  public function __construct()
  {

    parent::__construct();
    $this->load->database();
    $this->load->model('Admin_model');
    $this->load->model('Nilai_model');
    $this->load->library('form_validation');
    $this->load->helper(array('form','menu_helper','session'));

    //
    // Variabel lain2
    $this->navcolor = $this->db->select('color_nav')->from('settings')->where('email', $this->session->userdata['nama'])->get()->row_array();
    $this->bgcolor = $this->db->select('bg_color')->from('settings')->where('email', $this->session->userdata['nama'])->get()->row_array();


    //Cek Sesi jika admin sudah login
    if($this->session->userdata['state']){

      //Jika admin sudah ada di session biarkan akses halaman
      if($this->session->userdata['sesi']=='admin'){
        return true;
      //Jika user yang login adalah guru, redirect ke controller guru
      }else if($this->session->userdata['sesi']=='guru'){
        redirect('guru');
      //Jika user yang login adalah siswa, redirect ke controller siswa
      }else{
        redirect('siswa');
      }

    //Jika user yang login tidak terdaftar di hak akses manapun, "tendang" ke halaman login
    }else{
      redirect('login');
    }

  }



  public function logout(){
    $this->session->unset_userdata('login');
    $this->session->sess_destroy();
    redirect('login');
  }





  public function index(){

    $status = $this->Admin_model->get_user_status('admin','status','admin')->get()->row_array();
    $this->session->set_userdata('status', $status);
    $status = $this->session->userdata('status');

  
    $data['Judul'] = 'Dashboard Admin';
    $data['siswa'] = $this->Admin_model->fetch_tabel_join('siswa','cabang_kelas', 'siswa.kode_kelas = cabang_kelas.kode_kelas')->order_by('nama_siswa', 'asc')->limit('5')->get()->result_array();
    $data['guru'] = $this->Admin_model->fetch_tabel_join('guru', 'mata_pelajaran', 'guru.matpel_id = mata_pelajaran.matpel_id')->get()->result_array();
    $data['jumlahSiswa'] = $this->db->count_all('siswa');
    $data['jumlahGuru'] = $this->db->count_all('guru');
    $data['jumlahPelajaran'] = $this->db->count_all('mata_pelajaran');
    $data['jumlahKelas'] = $this->db->count_all('cabang_kelas');


    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu-admin',$data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/bottom');
    $this->load->view('templates/footer');

  }


// ======================================================================
// fungsi fungsi yang berhubungan dengan management siswa
// ======================================================================
 
  public function daftar_siswa(){

    $data['Judul'] = 'Daftar Siswa';
    $data['siswa'] = $this->Admin_model->fetch_tabel_join('siswa','cabang_kelas', 'siswa.kode_kelas = cabang_kelas.kode_kelas')->order_by('nama_siswa', 'asc')->get()->result_array();
    $data['guru'] = $this->Admin_model->fetch_tabel_join('guru','mata_pelajaran', 'guru.matpel_id = mata_pelajaran.matpel_id')->order_by('nama_guru','asc')->get()->result_array();
    $data['kelas'] = $this->db->select('*')->from('kelas')->get()->result_array();
    
    $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|trim');

    if($this->form_validation->run()==false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu-admin',$data);
      $this->load->view('admin/daftar-siswa', $data);
      $this->load->view('templates/footer');
    }else{
      $kode_kelas = $this->input->post('nama_kelas');

      $data['siswa'] = $this->Admin_model->fetch_tabel_join('siswa','cabang_kelas', 'siswa.kode_kelas = cabang_kelas.kode_kelas')->where('siswa.kode_kelas', $kode_kelas)->get()->result_array();
      $data['guru'] = $this->Admin_model->getDataGuru();
      $data['kelas'] = $this->db->select('*')->from('kelas')->get()->result_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu-admin',$data);
      $this->load->view('admin/daftar-siswa', $data);
      $this->load->view('templates/footer');
    }  

  }



  public function sortirCabKelas(){

    $kode_kelas = $this->input->post('kode_kelas');
    echo json_encode($this->db->get_where('cabang_kelas', ['no_kelas'=>$kode_kelas])->result_array()); 

  }




  public function tambah_siswa(){
    $data['Judul'] = 'Tambah Data Siswa';

    $data['kelas'] = $this->Admin_model->fetch_tabel_join('siswa','cabang_kelas', 'siswa.kode_kelas = cabang_kelas.kode_kelas')->order_by('nama_siswa', 'asc')->get()->result_array();
    $data['no_kelas'] = $this->db->select('*')->from('kelas')->order_by('no_kelas', 'asc')->get()->result_array();
    

      $this->form_validation->set_rules('no_siswa', 'No Id Siswa', 'required|trim');
      $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required|trim');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

      if ($this->form_validation->run() == FALSE) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu-admin', $data);
         $this->load->view('admin/tambah-siswa', $data);
         $this->load->view('templates/footer.php');

      }else{

        $config['upload_path'] = './public/images/user/siswa';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '256';



        $this->load->library('upload', $config);



        if (!$this->upload->do_upload('foto')) {
          $errors = array('error' => $this->upload->display_errors());
          $post_image = 'unknown.png';
        }else{
          $data = array('upload_data' => $this->upload->data());
          $post_image = $this->upload->data('file_name');
        }
         $this->Admin_model->tambahDataSiswa($post_image);
         $this->session->set_flashdata('flash', 'Berhasil');
         redirect('admin/daftar-siswa');

      }

  }


  function fetchDataNamaKelas(){
    $noklas = $this->input->post('noklas');
    echo json_encode($this->db->get_where('cabang_kelas', ['no_kelas'=>$noklas])->result_array());
  }
  
  function abc(){
    return "Return abc";
  }

  public function edit_siswa($id){   

    $data['Judul'] = 'Edit Data Siswa';
    $data['siswa'] = $this->Admin_model->fetch_tabel_join('siswa','cabang_kelas', 'siswa.kode_kelas = cabang_kelas.kode_kelas')->where('siswa_id', $id)->get()->row_array();
    $data['kelas'] = $this->Admin_model->fetch_tabel('kelas')->order_by('no_kelas', 'asc')->get()->result_array();
    //var_dump($data['siswa']['kode_kelas']);

    $this->form_validation->set_rules('no_siswa', 'No Id Siswa', 'required');
    $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');



    if ($this->form_validation->run() == FALSE) {
       $this->load->view('templates/header', $data);
       $this->load->view('templates/menu-admin', $data);
       $this->load->view('admin/edit-siswa', $data);
       $this->load->view('templates/footer.php');
    }else{
      //simpan data sensitif di session
      // var_dump($_POST); 
      // if(!$_POST['kode_kelas']){
      //   echo "kosong";
      // }
      // exit;
      $data = array(
        'id_siswa' => $data['siswa']['siswa_id'],
        'foto' => $data['siswa']['foto'],
        'kode_kelas' => $data['siswa']['kode_kelas'],
        'status' => $data['siswa']['status']
      );

      $this->session->set_userdata($data);

      // upload foto

        $config['upload_path'] = './public/images/user/siswa';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '256';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $gambarStock = $this->session->userdata('foto');

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
          $errors = array('error' => $this->upload->display_errors());
          $post_image = $gambarStock;
        }else{
          if($gambarStock != 'unknown.png'){
            unlink(FCPATH . "public/images/user/siswa/" . $gambarStock );
          }

          $data = array('upload_data' => $this->upload->data());
          $post_image = $this->upload->data('file_name');

        }

       
      //simpan data ke db
        if($_POST['kode_kelas']==true){
          $nama_kelas = $_POST['nama_kelas'];
          $this->Admin_model->ubahDataSiswa($post_image, $nama_kelas);
        }else{
          $nama_kelas = $data['kode_kelas'];
          $this->Admin_model->ubahDataSiswa($post_image, $nama_kelas);
        }
       
       $this->session->set_flashdata(array('css'=>'alert-success', 'alert'=>'Data Berhasil Diupdate'));
       $this->session->unset_userdata($data);
       redirect('admin/daftar_siswa');

    }

  }

  

  public function detail_siswa($id){
    $data['Judul'] = 'Detail Data Siswa';
    $data['siswa'] = $this->Admin_model->getSiswaById($id);


    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu-admin',$data);
    $this->load->view('admin/detail-siswa', $data);
    $this->load->view('templates/footer.php');

  }



// ======================================================================
// fungsi fungsi yang berhubungan dengan management kelas
// ======================================================================



  public function daftar_kelas(){

    $data['Judul'] = 'Daftar Kelas';
    $data['kelas'] = $this->Admin_model->fetch_tabel('kelas')->get()->result_array();
    $data['kelasall'] = $this->db->get('cabang_kelas')->result_array();
    $kode_kelas = '';
    $mata_pel = '';
    $cabkel = $this->db->select('*')->from('cabang_kelas')->where(array($kode_kelas, $mata_pel))->get_compiled_select(); 
              
      $this->form_validation->set_rules('no_kelas', 'No kelas', 'trim|required');
      
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu-admin', $data);
        $this->load->view('admin/daftar-kelas', $data);
        $this->load->view('templates/footer');
      }else{
        $kode_kelas = $this->input->post('no_kelas');
        $data['kelasall'] = $this->db->get_where('cabang_kelas', ['no_kelas'=>$kode_kelas])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu-admin',$data);
        $this->load->view('admin/daftar-kelas', $data);
        $this->load->view('templates/footer');

      }

  }



  public function tambah_kelas(){

    $kelas = $this->input->post('no_kelas_list', true);
    $kode_kelas = htmlspecialchars($this->input->post('kode_kelas', true));
    $nama_kelas = htmlspecialchars($this->input->post('nama_kelas', true));

    $data = [
      'no_kelas' => $kelas,
      'nama_kelas' => $nama_kelas,
      'kode_kelas' => $kode_kelas
    ];

    $this->db->insert('cabang_kelas', $data);
    $this->session->set_flashdata(array('flash'=>'Kelas Baru Berhasil Ditambahkan','css'=>'alert-success'));
    redirect('admin/daftar-kelas');

  }


  public function edit_kelas(){

    $kelas = $this->input->post('no_kelas_edit', true);
    $kode_kelas = htmlspecialchars($this->input->post('kode_kelas', true));
    $nama_kelas = htmlspecialchars($this->input->post('nama_kelas', true));
    $id = $this->input->post('id', true);
    
    $data = [
      'no_kelas' => $kelas,
      'nama_kelas' => $nama_kelas,
      'kode_kelas' => $kode_kelas
    ];

    $this->db->set($data);
    $this->db->where('id_cab' ,$id);
    $this->db->update('cabang_kelas');
    $this->session->set_flashdata(array('flash'=>'Data Kelas Berhasil Dirubah','css'=>'alert-success'));
    redirect('admin/daftar-kelas');
  }


  public function hapus_kelas($id){

    $this->db->where('id_cab' ,$id);
    $this->db->delete('cabang_kelas');
    $this->session->set_flashdata(array('flash'=>'Data Kelas Telah Dihapus','css'=>'alert-success'));
    redirect('admin/daftar-kelas');

  }


  public function daftarKelasAjax(){
    echo json_encode($this->db->select('*')->from('kelas')->get()->result_array());
  }


  public function daftarKelasById(){
    $id = $this->input->post('idk');
    echo json_encode($this->db->get_where('cabang_kelas', array('id_cab' => $id))->row_array());
  }



  public function hapusSiswa($id){

    $this->Admin_model->hapusSiswaById($id);
    $this->session->set_flashdata('flash', 'Dihapus');
    redirect('admin/daftar-siswa');

  }









// ======================================================
// ======================================================
// ======================================================
// Controlller Nilai
// ======================================================
// ======================================================
// ======================================================  





  public function daftar_nilai(){

    $data['Judul'] = 'Daftar Nilai';
    $id_kelas = $this->input->get('kelas_sort');
    $data['id_nilai'] = $this->Nilai_model->getIdNilai();
    //$data['nilai'] = $this->test_Data(); 
    $data['sortKelas'] = $this->db->get('kelas')->result_array();
    $data['kelas'] = $this->Admin_model->fetch_tabel_join('siswa','cabang_kelas', 'siswa.kode_kelas = cabang_kelas.kode_kelas')->order_by('nama_siswa', 'asc')->get()->result_array();
    $data['matpel'] = $this->Admin_model->fetch_tabel('mata_pelajaran')->get()->result_array();
    $data['sort'] = $this->input->post('kelas_sort');
    
    $this->form_validation->set_rules('no_kelas', 'No kelas', 'trim|required');
    $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'trim|required');
    $this->form_validation->set_rules('mata_pelajaran', 'Mata Pelajaran', 'trim|required');
    $this->form_validation->set_rules('pengajar', 'Pengajar', 'trim|required');

    if($this->form_validation->run() === false)
    {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu-admin', $data);
      $this->load->view('admin/daftar-nilai',$data);
      $this->load->view('templates/footer');      
    }
    else
    {
      $value = [
        'kode_kelas'=> $_POST['nama_kelas'],
        'matpel_id' => $_POST['mata_pelajaran'],
        'kode_guru'=> $_POST['pengajar']
      ];
      $data['daftarNilai'] = $this->db->select('*')->from('nilai')->where($value)->order_by('no_siswa', 'asc')->get()->result_array();       
      
      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu-admin', $data);
      $this->load->view('admin/daftar-nilai',$data);
      $this->load->view('templates/footer');          
    }
  }



  public function test_data($data){
        //var_dump($_POST); exit;
        $data=[
          'kode_kelas'=> $_POST['kode_kelas'],
          'matpel_id' => $_POST['matpel_id'],
          'kode_guru'=> $_POST['pengajar']
        ];
        //var_dump($data); exit;
       
      echo json_encode($this->db->select('*')->from('nilai')->where($data)->order_by('no_siswa', 'asc')->get()->result_array());
    }  


public function getDataAjax(){

  if($this->input->is_ajax_request())
  {
    echo json_encode($this->Nilai_model->getNilaiById($_POST['id']));
  }
  else
  {
    echo '<h2>You Dont Have Permission To access This Page</h2>';
  }

}


public function getDataNilaiAjax(){

  if($this->input->is_ajax_request())
  {
    $id = $_POST['id'];
    $matpel = $_POST['matpel'];
    echo json_encode($this->Nilai_model->getDataNilaiById($id, $matpel)); exit;
  }
  else
  {
    echo '<h2>You Dont Have Permission To access This Page</h2>';
  }

}


public function getDataSiswaAjax()
{
  if($this->input->is_ajax_request()){
    echo json_encode($this->Nilai_model->listEntitasSiswa());
  }else{
    echo '<h2>Hayooo ! mau apa :V :V</h2>';
  }
}





public function getMatapelajaranAjax(){
  if($this->input->is_ajax_request()){
  echo json_encode($this->Nilai_model->listMataPelajaran());
  }else{
    echo '<h2>Hayooo ! mau apa :V :V</h2>';
  }
}

public function DeleteNilaiSiswa()
{
  if($this->input->is_ajax_request()){
    $id = $_POST['id'];
    $this->db->where_in('id', $id);
    echo $this->db->get_compiled_delete('nilai'); exit;
  }else{
    echo '<h1>This worked !</h1>';
  }
}


public function getDataKelasAjax(){
  echo json_encode($this->Nilai_model->listKelasSiswa());
}





public function getKodeGuruAjax(){
  if($this->input->is_ajax_request()){
    $matpel_id = $this->input->post('matpel_id');
    echo json_encode($this->db->select('*')->from('guru')->join('mata_pelajaran', 'guru.matpel_id = mata_pelajaran.matpel_id', 'left')->where('guru.matpel_id', $matpel_id)->get()->result_array());
  }else{
    echo '<h2>Hayooo ! mau apa :V :V</h2>';
  }
}


public function getDataSubKelas(){
  $kode_kelas = $this->input->post('kode_kelas');
  echo json_encode($this->Admin_model->getDataKelasFilter($kode_kelas)->result_array());
}



public function updateNilaiHarian()
{

  $kode_siswa = $this->input->post('no_siswa');
  $kode_guru = $this->input->post('kode_guru');
  $matpel_id = $this->input->post('matpel_id');
 
  $nilai = array();
  $nilai = $this->input->post();
  
  unset($nilai['no_siswa']);
  unset($nilai['kode_guru']);
  unset($nilai['matpel_id']);

  $nilai = $this->input->post('nilai');
  $implode = implode(',', $nilai); 
  $explode = explode(',', $implode); 
  $implode = implode(',', $explode); 
  $data = [
    'harian' => $implode
  ];

  $this->db->set($data);
  $this->db->where('no_siswa', $kode_siswa);
  $this->db->where('kode_guru', $kode_guru);
  $this->db->where('matpel_id', $matpel_id);
  $this->db->update('nilai');

  $this->session->set_flashdata(array('flash'=>'Nilai Harian Telah Diupdate', 'css'=>'alert-success'));
  redirect('admin/daftar-nilai');

}





public function updateNilaiTugas()
{
  $kode_siswa = $this->input->post('no_siswa');
  $kode_guru = $this->input->post('kode_guru');
  $matpel_id = $this->input->post('matpel_id');
 
  $nilai = array();
  $nilai = $this->input->post();
  
  unset($nilai['no_siswa']);
  unset($nilai['kode_guru']);
  unset($nilai['matpel_id']);

  $nilai = $this->input->post('nilai');
  $implode = implode(',', $nilai); 
  $explode = explode(',', $implode); 
  $implode = implode(',', $explode); 
  $data = [
    'tugas' => $implode
  ];
 
  $this->db->set($data);
  $this->db->where('no_siswa', $kode_siswa);
  $this->db->where('kode_guru', $kode_guru);
  $this->db->where('matpel_id', $matpel_id);
  $this->db->update('nilai');

  $this->session->set_flashdata(array('flash'=>'Nilai Tugas Telah Diupdate', 'css'=>'alert-success'));
  redirect('admin/daftar-nilai');
}



public function updateNilaiMandiri()
{

  $kode_siswa = $this->input->post('no_siswa');
  $kode_guru = $this->input->post('kode_guru');
  $matpel_id = $this->input->post('matpel_id');
 
  $nilai = array();
  $nilai = $this->input->post();
  
  unset($nilai['no_siswa']);
  unset($nilai['kode_guru']);
  unset($nilai['matpel_id']);

  $nilai = $this->input->post('nilai');
  $implode = implode(',', $nilai); 
  $explode = explode(',', $implode); 
  $implode = implode(',', $explode); 
  $data = [
    'mandiri' => $implode
  ];
 
  $this->db->set($data);
  $this->db->where('no_siswa', $kode_siswa);
  $this->db->where('kode_guru', $kode_guru);
  $this->db->where('matpel_id', $matpel_id);
  $this->db->update('nilai'); 

  $this->session->set_flashdata(array('flash'=>'Nilai Mandiri Telah Diupdate', 'css'=>'alert-success'));
  redirect('admin/daftar-nilai');
}


public function updateNilaiUts()
{

  $kode_siswa = $this->input->post('no_siswa');
  $kode_guru = $this->input->post('kode_guru');
  $matpel_id = $this->input->post('matpel_id');
 
  $nilai = array();
  $nilai = $this->input->post();
  
  unset($nilai['no_siswa']);
  unset($nilai['kode_guru']);
  unset($nilai['matpel_id']);

  $nilai = $this->input->post('nilai');
  $implode = implode(',', $nilai); 
  $explode = explode(',', $implode); 
  $implode = implode(',', $explode); 
  $data = [
    'uts' => $implode
  ];
 
  $this->db->set($data);
  $this->db->where('no_siswa', $kode_siswa);
  $this->db->where('kode_guru', $kode_guru);
  $this->db->where('matpel_id', $matpel_id);
  $this->db->update('nilai');

  $this->session->set_flashdata(array('flash'=>'Nilai Uts Telah Diupdate', 'css'=>'alert-success'));
  redirect('admin/daftar-nilai');
}


public function updateNilaiUas()
{

  $kode_siswa = $this->input->post('no_siswa');
  $kode_guru = $this->input->post('kode_guru');
  $matpel_id = $this->input->post('matpel_id');
 
  $nilai = array();
  $nilai = $this->input->post();
  
  unset($nilai['no_siswa']);
  unset($nilai['kode_guru']);
  unset($nilai['matpel_id']);

  $nilai = $this->input->post('nilai');
  $implode = implode(',', $nilai); 
  $explode = explode(',', $implode); 
  $implode = implode(',', $explode); 
  
  $data = [
    'uas' => $implode
  ];
 
  $this->db->set($data);
  $this->db->where('no_siswa', $kode_siswa);
  $this->db->where('kode_guru', $kode_guru);
  $this->db->where('matpel_id', $matpel_id);
  $this->db->update('nilai'); 

  $this->session->set_flashdata(array('flash'=>'Nilai Mandiri Telah Diupdate', 'css'=>'alert-success'));
  redirect('admin/daftar-nilai');
}



public function hapus_nilai_matpel()
{
  $no_siswa = $this->input->post('no_siswa');
  $kode_guru = $this->input->post('kode_guru');

  $this->db->where('no_siswa', $no_siswa);
  $this->db->where('kode_guru', $kode_guru);
  $this->db->delete('nilai');

  $this->session->set_flashdata(array('flash'=>'Nilai Siswa Telah Dihapus', 'css'=>'alert-success'));
  redirect('admin/daftar-nilai');
}



public function tambahDataNilai()
{
  $kelas = $this->input->post('kelas');
  $sub_kelas = $this->input->post('sub_kelas');
  $matpel = $this->input->post('matpel');
  $guru = $this->input->post('guru');
  $siswa_kelas = $this->db->select('no_siswa')->from('siswa')->where('kode_kelas', $sub_kelas)->get()->result_array();

  foreach ($siswa_kelas as $siswa) {
    # code...
    $data_siswa = $siswa['no_siswa'];
    
    $data = [
      'no_siswa' => $data_siswa,
      'kode_kelas' => $sub_kelas,
      'matpel_id' => $matpel,
      'kode_guru' => $guru
    ];
   //var_dump($data); exit;
   $this->db->insert('nilai', $data);
  }
  
  $this->session->set_flashdata(array('flash'=>'Nilai Siswa Per kelas Berhasil Ditambah', 'css' => 'alert-success'));
  redirect('admin/daftar-nilai');

}





// public function sort_nilai_siswa()
// {
//   $data_kelas = $this->input->post('kelas_sort');
//   $id_kelas = $data_kelas;
//   $this->Nilai_model->get_sort_nilai($limit, $offset, $id_kelas);
//   $this->session->set_flashdata('flash', 'Menampilkan Nilai Untuk Kelas '.$id_kelas);
//   redirect('admin/daftar-nilai');
// }









// ======================================================
// ======================================================
// ======================================================
// Controlller Guru
// ======================================================
// ======================================================
// ======================================================



public function daftar_guru()

{
  $data['Judul'] = 'Daftar Guru';
  $data['guru'] =  $this->Admin_model->fetch_tabel_join('guru', 'mata_pelajaran', 'guru.matpel_id = mata_pelajaran.matpel_id')->get()->result_array();

  $this->load->view('templates/header', $data);
  $this->load->view('templates/menu-admin',$data);
  $this->load->view('admin/daftar-guru', $data);
  $this->load->view('templates/footer');

}



// ======================================================================

// ======================================================================





public function tambah_guru()

{
  $data['Judul'] = 'Tambah Data Guru';

    $this->form_validation->set_rules('kd_guru', 'Kode Guru', 'required');
    $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');



    if ($this->form_validation->run() == FALSE) {
       $this->load->view('templates/header', $data);
       $this->load->view('templates/menu-admin', $data);
       $this->load->view('admin/tambah-guru', $data);
       $this->load->view('templates/footer.php');
    }else{
      $config['upload_path'] = './public/images/user/guru';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '256';
      $config['max_width'] = '1024';
      $config['max_width'] = '768';
      $config['file_name'] = uniqid();

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('foto')) {
        $errors = array('error' => $this->upload->display_errors());
        $post_image = 'unknown.png';
      }else{
        $data = array('upload_data' => $this->upload->data());
        $post_image = $this->upload->data('file_name');

      }
       $this->Admin_model->tambahDataGuru($post_image);
       $this->session->set_flashdata('flash', 'Berhasil');
       redirect('admin/daftar-guru');

    }
}



// ======================================================================

// ======================================================================





public function edit_guru($id)

{   
  $data['Judul'] = 'Edit Data Guru';
  $data['guru'] = $this->Admin_model->fetch_tabel_join('guru', 'mata_pelajaran', 'guru.matpel_id = mata_pelajaran.matpel_id')->where('guru_id',$id)->get()->row_array();
  $data['mata_pelajaran'] = $this->Admin_model->fetch_tabel('mata_pelajaran')->get()->result_array();
  

  $this->form_validation->set_rules('id_guru', 'Kode Guru', 'required');
  $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
  $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

  if ($this->form_validation->run() == FALSE) {
     $this->load->view('templates/header', $data);
     $this->load->view('templates/menu-admin', $data);
     $this->load->view('admin/edit-guru', $data);
     $this->load->view('templates/footer.php');
  }else{

      //simpan data sensitif di session

      $data = array(

        'id_guru' => $data['guru']['guru_id'],
        'foto' => $data['guru']['foto'],
        'status' => 'guru'
      );

      $this->session->set_userdata($data);

      $config['upload_path'] = './public/images/user/guru';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '756';


      $gambarStock = $this->session->userdata('foto');


      $this->load->library('upload', $config);


      if (!$this->upload->do_upload('foto')) {
        $errors = array('error' => $this->upload->display_errors());
        $post_image = $gambarStock;
      }else{
        if($gambarStock != 'unknown.png'){
          unlink(FCPATH . "public/images/user/guru/" . $gambarStock );
        }
        $data = array('upload_data' => $this->upload->data());
        $post_image = $this->upload->data('file_name');
      }

     $this->Admin_model->ubahDataGuru($post_image);
     $this->session->unset_userdata($data);
     $this->session->set_flashdata(array('flash'=>'Data Guru Berhasil Diupdate','css'=>'alert-success'));
     redirect('admin/daftar_guru');
  }

}






//
//fungsi fungsi mata pelajaran
//
public function mata_pelajaran()
{
  $data['Judul'] = 'Mata Pelajaran';
  $data['mata_pelajaran'] = $this->db->get('mata_pelajaran')->result_array();

  $this->load->view('templates/header.php', $data);
  $this->load->view('templates/menu-admin', $data);
  $this->load->view('admin/mata-pelajaran.php', $data);
  $this->load->view('templates/footer.php');

}



public function tambah_mata_pelajaran()
{
  $kode_matpel = $this->input->post('kode');
  $nama_matpel = $this->input->post('nama');


  $data = [
    'nama_matpel' => $nama_matpel,
    'id_matpel' => $kode_matpel
  ];

  
  $this->db->insert('mata_pelajaran', $data);
  $this->session->set_flashdata(array('flash'=>'Mata Pelajaran Telah Ditambahkan','css'=>'alert-success'));
  redirect('admin/mata_pelajaran');
}



public function edit_mata_pelajaran()
{

  $kode_matpel = $this->input->post('kode');
  $nama_matpel = $this->input->post('nama');
  $matpel_id = $this->input->post('hidden');

  $data = [
    'nama_matpel' => $nama_matpel,
    'id_matpel' => $kode_matpel
  ];


  $this->db->set($data);
  $this->db->where('matpel_id', $matpel_id);
  $this->db->update('mata_pelajaran');
  $this->session->set_flashdata(array('flash'=>'Data Mata Pelajaran Telah Dirubah','css'=>'alert-success'));
  redirect('admin/mata_pelajaran');
}



public function hapus_mata_pelajaran($matpel_id)
{
  $this->db->where('matpel_id', $matpel_id);
  $this->db->delete('mata_pelajaran');
  $this->session->set_flashdata(array('flash'=>'Data Mata Pelajaran Telah Dihapus','css'=>'alert-success'));
  redirect('admin/mata_pelajaran');
}


public function getDataMatpel()
{
  $id_matpel = $this->input->post('id');
  echo json_encode($this->db->get_where('mata_pelajaran', array('matpel_id' => $id_matpel))->row_array());
}





//
//Fungsi fungsi pengaturan halaman
//
public function setting()

{
  $data['Judul'] = 'Setting';

  $this->load->view('templates/header.php', $data);
  $this->load->view('templates/menu-admin', $data);
  $this->load->view('admin/settings.php', $data);
  $this->load->view('templates/footer.php');

}

public function setting_sidebar()

{
  $data['Judul'] = 'Sidebar Setting';
  $data['user'] = $this->db->get_where('admin', ['email'=>$this->session->userdata['nama']])->row_array();
  $data['navcolor'] = $this->db->select('color_nav')->from('settings')->where('email', $this->session->userdata['nama'])->get()->row_array();

  $data['bgcolor'] = $this->db->select('bg_color')->from('settings')->where('email', $this->session->userdata['nama'])->get()->row_array();

  
  $this->load->view('templates/header.php', $data);
  $this->load->view('templates/menu-admin', $data);
  $this->load->view('admin/settings/sidebar.php', $data);
  $this->load->view('templates/footer.php');

}

public function setting_submit()

{
  $data['user'] = $this->db->get_where('admin', ['email'=>$this->session->userdata['nama']])->row_array();
  $email = $data['user']['email'];

  $nav_color = $this->input->post('nvcolor');
  $bg_color = $this->input->post('bg_color');

  // $config['upload_path'] = './public/img/side-bg';
  // $config['allowed_types'] = 'gif|jpg|png';
  // $config['max_size'] = '512';

  // $this->load->library('upload', $config);

  // if ( ! $this->upload->do_upload('image'))
  // {
  //     $error = array('error' => $this->upload->display_errors());
  //     echo "Upload Error";
  // }
  // else
  // {
  //     $data = array('upload_data' => $this->upload->data());
  // }


  $data = [
    'color_nav' => $nav_color,
    'bg_color' => $bg_color
  ];

  $this->db->set($data);
  $this->db->where('email', $email);
  $this->db->update('settings');
  $this->session->set_flashdata(array('flash'=>'Pengaturan Sidebar Telah Dirubah','css'=>'alert-success'));
  redirect('admin/setting/setting-sidebar');

}


public function ganti_password()
{
  $data['Judul'] = 'Ganti Password';
  $data['user'] = $this->db->get_where('admin', ['email'=>$this->session->userdata['nama']])->row_array();


  $this->form_validation->set_rules('current_pass', 'Password Lama', 'required|trim');
  $this->form_validation->set_rules('new_pass', 'Password Baru', 'required|trim|min_length[8]|matches[repeat_new_pass]');
  $this->form_validation->set_rules('repeat_new_pass', 'Ulangi Password Baru', 'required|trim|min_length[8]|matches[new_pass]');

  if($this->form_validation->run()==false){
    $this->load->view('templates/header.php', $data);
    $this->load->view('templates/menu-admin', $data);
    $this->load->view('admin/settings/ubah-password.php', $data);
    $this->load->view('templates/footer.php');
  }else{
    $current_pass = $this->input->post('current_pass');
    $new_pass = $this->input->post('new_pass');
    
    if(password_verify($current_pass, $data['user']['pass'])){
      $pass_hashed = password_hash($new_pass, PASSWORD_DEFAULT);

      $this->db->set('pass', $pass_hashed);
      $this->db->where('email', $data['user']['email']);
      $this->db->update('admin');
      $this->session->set_flashdata(array('alert'=>'Password '.$data['user']['email'].' Berhasil Dirubah','css'=>'alert-success'));
      redirect('admin/setting/ubah-password');
    }else{
      $this->session->set_flashdata(array('alert'=>'Password Lama Anda Tidak Benar','css'=>'alert-danger'));
      redirect('admin/setting/ubah-password');
    }
  }

}



}