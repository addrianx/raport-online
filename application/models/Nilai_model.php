<?php


class Nilai_model extends CI_model{


public function getIdNilai()
{
    $this->db->select('nl.nl_id, nl.no_siswa, nl.kode_kelas, nl.matpel_id, siswa.nama_siswa, mata_pelajaran.nama_matpel');
    $this->db->from('nilai AS nl');
    $this->db->join ('siswa', 'siswa.no_siswa = nl.no_siswa' , 'left' );
    $this->db->join('mata_pelajaran', 'nl.matpel_id = mata_pelajaran.matpel_id', 'left');
    $this->db->order_by('nama_siswa', 'ASC');
    return $query = $this->db->get()->result_array();
}



public function listEntitasSiswa()
{
  $this->db->select('no_siswa, nama_siswa, kode_kelas');
  $this->db->from('siswa');
  return $query = $this->db->get()->result_array();
}




// public function getMataPelajaran()
// {
//   $this->db->select('*');
//   $this->db->from('mata_pelajaran');
//   return $query = $this->db);
// }




public function listKelasSiswa()
{
  $this->db->select('*');
  $this->db->from('kelas');
  return $query = $this->db->get()->result_array();
}



public function getNilai()
{
   return $this->db->get("nilai")->result_array();
}




public function getNilaiById($id)
{
  $this->db->select('*');
  $this->db->from('nilai');
  $this->db->where('no_siswa', $id);
  return $query = $this->db->get()->row_array();
}

public function getDataNilaiById($id, $matpel)
{
  $this->db->select('*');
  $this->db->from('nilai');
  $this->db->where(array('no_siswa'=> $id, 'matpel_id'=>$matpel));
  return $query = $this->db->get()->row_array();
}



public function listMataPelajaran()
{
  $this->db->select('*');
  $this->db->from('mata_pelajaran');
  return $query = $this->db->get()->result_array();
}





public function tambah_nilai_matpel($kelas, $matpel)
{
  $query = $this->db->select('no_siswa')->where('id_kelas', $kelas)->get('siswa')->result_array();

  foreach ($query as $key => $val) {
    $data = [
        "no_siswa" => $val['no_siswa'],
        "id_kelas" => $kelas,
        "id_matpel" => $matpel
    ];
    $this->db->insert('nilai', $data);  
  }
}



public function ubah_nilai_harian($id, $implode)
{
  $data = [
      "harian" => $implode
  ];

  $this->db->where('no_siswa', $this->input->post('no_siswa'));
  $this->db->update('nilai', $data);
}
}

