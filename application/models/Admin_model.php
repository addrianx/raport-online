<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_model{

   public function fetch_tabel($tabel)
   {
      return $this->db->select('*')->from($tabel);
   }


   public function fetch_tabel_join($tabel, $tabel2, $statement)
   {
      return $this->db->select('*')->from($tabel)->join($tabel2, $statement, 'left');
   }


   public function get_user_status($tabel, $column, $data)
   {
      return $this->db->select('*')->from($tabel)->where($column, $data); 
   }


   public function get_join_where()
   {
      return $this->db->select('*')->from('siswa')->join('cabang_kelas', 'siswa.kode_kelas = cabang_kelas.kode_kelas', 'left'); 
   }





   public function joinTableNilai()
   {
      $this->db->select('*');
      $this->db->from('nilai');
      $this->db->join('nilai_harian', 'nilai.nl_id = nilai_harian.nh_id', 'left');
      $this->db->join('nilai_tugas', 'nilai_harian.nh_id = nilai_tugas.nt_id', 'left');
      $this->db->join('nilai_mandiri', 'nilai_tugas.nt_id = nilai_mandiri.nm_id', 'left');
      $this->db->join('nilai_uts', 'nilai_mandiri.nm_id = nilai_uts.nut_id', 'left');
      $this->db->join('nilai_uas', 'nilai_uts.nut_id = nilai_uas.nua_id', 'left');
      $query = $this->db->get();
      return $query->result_array();
   }





   public function getDataKelasFilter($kode_kelas)
   {
      $this->db->select('*');
      $this->db->from('cabang_kelas');
      $this->db->where('no_kelas', $kode_kelas);
      return $query = $this->db->get();
   }

   public function hapusSiswaById($id)
   {
      $this->db->where('siswa_id', $id);
      $this->db->delete('siswa');
   }



   public function tambahDataSiswa($post_image)
   {
      $data = [
         "no_siswa" => $this->input->post('no_siswa', true),
         "nama_siswa" => ucfirst($this->input->post('nama_siswa', true)),
         "email" => $this->input->post('email', true),
         "kode_kelas" => $this->input->post('kode_kelas', true),
         "no_telepon" => $this->input->post('no_telepon', true),
         "foto" => $post_image,
         "status" => 'siswa'
      ];
      $this->db->insert('siswa', $data);
   }




   public function ubahDataSiswa($post_image, $nama_kelas)
   {
      $data = [
         "no_siswa" => htmlspecialchars($this->input->post('no_siswa', true)),
         "nama_siswa" => htmlspecialchars(ucfirst($this->input->post('nama_siswa', true))),
         "email" => htmlspecialchars($this->input->post('email', true)),
         "no_telepon" => htmlspecialchars($this->input->post('no_telepon', true)),
         "kode_kelas" => $nama_kelas,
         "foto" => $post_image
      ];

      $this->db->where('siswa_id', $this->session->userdata('id_siswa'));
      $this->db->update('siswa', $data);
   }






   public function ubahDataGuru($post_image)
   {
      $data = [
         "id_guru" => $this->input->post('id_guru', true),
         "nama_guru" => ucfirst($this->input->post('nama_guru', true)),
         "email" => $this->input->post('email', true),
         "matpel_id" => $this->input->post('mata_pelajaran', true),
         "foto" => $post_image
      ];

      $this->db->set($data);
      $this->db->where('guru_id', $this->session->userdata('id_guru'));
      $this->db->update('guru', $data);
   }

   // public function getNamaGuru($id)
   // {
   //    $this->db->select('*');
   //    $this->db->from('guru');
   //    $this->db->join('mata_pelajaran', 'guru.matpel_id = mata_pelajaran.matpel_id', 'left');
   //    $this->db->where('guru_id', $id);
   //    return $query = $this->db->get();   
   // }





}