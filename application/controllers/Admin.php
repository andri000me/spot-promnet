<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }

  public function halamanGuru()
  {
    $data['title'] = "SPOT | Data Guru";
    $query = $this->ModelAdmin->TampilData();
		$data['data_guru'] = $query->result_array();
    $this->load->view('admin_halaman_guru', $data);
  }

  public function tambahGuru()
  {
    $data['title'] = "SPOT | Tambah Guru";
    $query = $this->ModelAdmin->TampilMapel();
		$data['mapel'] = $query->result_array();
    $this->load->view('admin_tambah_guru', $data);
  }

  public function prosesTambahGuru()
	{
		$this->form_validation->set_rules('NIP','NIP','required');
		$this->form_validation->set_rules('idMapel','Mapel','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('hp','No HP','required');
    $this->form_validation->set_rules('alamat','Alamat','required');

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'idGuru'=>'null',
				'NIP'=>$this->input->post('NIP'),
				'idMapel'=>$this->input->post('idMapel'),
				'namaGuru'=>$this->input->post('nama'),
				'password'=>$this->input->post('password'),
				'noHP'=>$this->input->post('hp'),
        'alamat'=>$this->input->post('alamat')
			);
			$this->ModelAdmin->InsertGuru($insertData);
			redirect('Index');
		} else {
			$this->load->view('admin_tambah_guru');
		}
	}

}
