<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_model{


  function auth_login($table, $where)
  {
   return $this->db->get_where($table, $where);
  }




}