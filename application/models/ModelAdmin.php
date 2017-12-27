<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAdmin extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function TampilData()
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

  public function InsertGuru($data)
  {
    $this->db->insert('guru',$data);
  }
}
