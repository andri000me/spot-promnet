<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelGuru extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function LihatGuru($nip)
  {
    $this->db->where('NIP',$nip);
    return $this->db->get('guru');
  }

  public function CountAllMateri()
  {
    return $this->db->count_all('materi');
  }

  public function GetAllMateri($limit, $start)
  {
    $this->db->limit($limit, $start);
    return $this->db->get('materi');
  }

  function fetch_document($path)
  {
    return get_filenames($path);
  }

  public function InsertFilename($filename)
  {
    $this->db->insert('materi',$filename);
  }

}
