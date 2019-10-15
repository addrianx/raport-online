<?php

class Siswa_model extends CI_model{

   public function __construct()
   {
      parent::__construct();
   }

   public function fetch_all_table($table){
      return $this->db->select('*')->from($table)->get()->result_array();
   }

   public function fetch_get_where_table($table, $statement1, $statement2){
      return $this->db->get_where($table, [$statement1=>$statement2]);
   }

   public function fetch_joined_data_siswa($table, $table2, $statement){
      return $this->db->select('*')->from($table)->join($table2, $statement, 'left');
   }

   public function get_password($table){
      return $this->db->select('pass')->from($table);
   }

}