<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('Login_model');
    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url', 'session'));

    
    if(@$this->session->userdata['state']){
      redirect($this->session->userdata['sesi']);
    }else{
      return false;
    }
  }


  public function index()
  {
      $data['title'] = 'Login Admin';
      
      $this->load->view('login/header' ,$data);
      $this->load->view('login/login', $data);
      $this->load->view('login/footer');
  }


  public function login_cek()
  {
      $email = htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
      $password = htmlspecialchars($this->input->post('pass',TRUE),ENT_QUOTES);
      $where = array('email' => $email);

      $check_admin = $this->Login_model->auth_login("admin", $where);
      $check_siswa= $this->Login_model->auth_login("siswa", $where);
      $check_guru= $this->Login_model->auth_login("guru", $where);

      if($check_admin->num_rows()>0){

        // cek datalogin admin
        $data = $check_admin->row_array();
             
        if(password_verify($password, $data['pass'])){ 
          $data_session = array(
            'nama' => $email,
            'sesi' => $data['status'],
            'state' => "login"
          );
          $this->session->set_userdata($data_session);
     
          if($this->session->userdata('sesi')=="admin"){
              redirect(base_url('admin'));
          }
        }else{
          $this->session->set_flashdata(array('alert'=>'Password Anda Salah !', 'css'=>'alert-danger'));
        redirect('login');
        } //endif admin password_verify

      }elseif($check_guru->num_rows() > 0){
        // cek datalogin guru
        $data=$check_guru->row_array();
        if(password_verify($password, $data['pass'])){

        $data_session = array(
          'nama' => $data['nama_guru'],
          'kode_guru' => $data['kode_guru'],
          'sesi' => $data['status'],
          'state' => "login"
        );
        $this->session->set_userdata($data_session);

        if($this->session->userdata('sesi')=="guru"){
            redirect(base_url('guru'));
        }
      }else{
        $this->session->set_flashdata(array('alert'=>'Password Anda Salah !', 'css'=>'alert-danger'));
        redirect('login');
      } //endif guru password_verify

    }elseif($check_siswa->num_rows() > 0){
      // cek datalogin siswa
      $data=$check_siswa->row_array();

      if($data['pass']==false){
        $data_session = array(
          'email' => $data['email'],
          'status' => $data['status']
        );
        $this->session->set_userdata($data_session);
        redirect('set_password');
      }else{
        if(password_verify($password, $data['pass'])){
        $data_session = array(
        'email' => $data['email'],
        'kelas' => $data['id_kelas'],
        'sesi' => $data['status'],
        'state' => "login"
        );
        $this->session->set_userdata($data_session);
      if($this->session->userdata('sesi')=="siswa"){
        redirect(base_url('siswa'));
      }else{
      redirect('login');
      }
    }else{
      $this->session->set_flashdata(array('alert'=>'Password Anda Salah !', 'css'=>'alert alert-danger'));
        redirect('login');
    } //endif siswa password_verify
      }
      


      
    }else{
        $this->session->set_flashdata(array('alert'=>'Email Tidak terdaftar', 'css'=>'alert-danger'));
        redirect('login');
    } //endif check condition

 } //closing login_cek


function forgot(){
  $data['title'] = 'Reset Password';

  $this->load->view('login/header',$data);
  $this->load->view('login/forgot', $data);
  $this->load->view('login/footer');

}

function send_mail(){
  
    $this->form_validation->set_rules('reset', 'Email Reset', 'trim|required|valid_email');

    if ($this->form_validation->run() == FALSE)
    {
       $this->session->set_flashdata(array('css'=>'alert-danger','alert'=>'Email address not valid'));
       redirect('login/forgot');
    }
    else
    {
       $this->session->set_flashdata(array('css'=>'alert-success','alert'=>'Email Berhasil Dikirm check inbox'));
       redirect('login/forgot');
    }
}
}//closing class