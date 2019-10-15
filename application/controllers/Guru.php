<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller(){

public function __construct(){
    parent::__construct(){
        $this->load->database();
        $this->load->model('Guru_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form','menu_helper','session'));  
    }
}    



} //Class Closed Tag