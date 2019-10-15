<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Set_password extends CI_controller{

  public function __construct(){
    parent::__construct();
    $this->load->database();
    $this->load->model('Login_model');
    $this->load->model('Siswa_model');
    $this->load->library('form_validation', 'session');
    $this->load->helper(array('form', 'url'));
  }

  public function index(){
  	$data['title'] = 'Setting Password';
  	$data['data_session'] = $this->session->userdata;

  	$this->load->view('login/header', $data);
  	$this->load->view('siswa/setup_pass', $data);
  	$this->load->view('login/footer');
  }

  public function save_password(){
  	$password = htmlspecialchars($this->input->post('password1', TRUE),ENT_QUOTES);
  	$email = $this->session->userdata['email'];

  	//var_dump($password); exit;

  	$this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]');
  	$this->form_validation->set_rules('password2', 'Password Konfirmasi', 'required');

  	if($this->form_validation->run() == FALSE){
  		$this->session->set_flashdata(['css'=>'alert-danger', 'alert'=>'Password Konfirmasi Tidak Sama']);
	  	redirect('set_password');
  	}else{
  		$password = password_hash($password, PASSWORD_DEFAULT);
  		//var_dump($password);
	  	$this->db->set('pass', $password);
	  	$this->db->where(['email'=>$email]);
	  	$this->db->update('siswa');

	  	$this->session->set_flashdata(['css'=>'alert-success', 'alert'=>'Berhasil Menambahkan Password, Silahkan Login !']); 
	  	redirect('login');
  	}


  }

}