<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAdmin extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function TampilGuru()
  {
    $this->db->select('*');
    $this->db->from('guru');
    $this->db->join('mapel', 'mapel.idMapel = guru.idMapel');
    return $this->db->get();
  }

  public function TampilMapel()
  {
    return $this->db->get('mapel');
  }

  public function TampilDataGuru()
  {
    return $this->db->get('guru');
  }

  public function TampilDataSiswa()
  {
    return $this->db->get('siswa');
  }

  public function TampilKelas()
  {
    return $this->db->get('kelas');
  }

/* ================================================================ */

  public function LihatGuru($id)
  {
    $this->db->select('*');
    $this->db->from('guru');
    $this->db->join('mapel', 'mapel.idMapel = guru.idMapel');
    $this->db->where('idGuru',$id);
    return $this->db->get();
  }

  public function LihatSiswa($id)
  {
    $this->db->select('*');
    $this->db->from('siswa');
    $this->db->join('kelas', 'kelas.idKelas = siswa.idKelas');
    $this->db->where('idSiswa',$id);
    return $this->db->get();
  }

/* ================================================================ */

  public function InsertGuru($data)
  {
    $this->db->insert('guru',$data);
  }

  public function InsertSiswa($data)
  {
    $this->db->insert('siswa',$data);
  }

/* ================================================================ */

  public function UbahGuru($data,$id)
  {
    $this->db->where('idGuru',$id);
    $this->db->update('guru',$data);
  }

  public function UbahPasswordGuru($data,$id)
  {
    $this->db->where('idGuru',$id);
    $this->db->update('guru',$data);
  }

  public function UbahSiswa($data,$id)
  {
    $this->db->where('idSiswa',$id);
    $this->db->update('siswa',$data);
  }

  public function UbahPasswordSiswa($data,$id)
  {
    $this->db->where('idSiswa',$id);
    $this->db->update('siswa',$data);
  }

/* ================================================================ */

  public function HapusGuru($id)
  {
    $this->db->where('idGuru',$id);
    $this->db->delete('guru');
  }

  public function HapusSiswa($id)
  {
    $this->db->where('idSiswa',$id);
    $this->db->delete('siswa');
  }


  public function CountAllGuru()
  {
    return $this->db->count_all('guru');
  }

  public function GetAllGuru($limit, $start)
  {
    $this->db->limit($limit, $start);
    $this->db->select('*');
    $this->db->from('guru');
    $this->db->join('mapel', 'mapel.idMapel = guru.idMapel');
    return $this->db->get();
  }

  public function CountAllSiswa()
  {
    return $this->db->count_all('siswa');
  }

  public function GetAllSiswa($limit, $start)
  {
    $this->db->limit($limit, $start);
    $this->db->select('*');
    $this->db->from('siswa');
    $this->db->join('kelas', 'kelas.idKelas = siswa.idKelas');
    return $this->db->get();
  }
}
