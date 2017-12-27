<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function index()
  {
    if($this->session->userdata('admin') == TRUE) {
			$data['title'] = 'Halaman Admin';
			$data['username'] = $this->session->userdata('admin');

			$this->load->view('halaman_admin');
		}else if($this->session->userdata('guru') == TRUE) {
			$data['title'] = 'Halaman Guru';
			$data['username'] = $this->session->userdata('guru');

			$this->load->view('halaman_guru');
		}else if($this->session->userdata('siswa') == TRUE) {
			$data['title'] = 'Halaman Siswa';
			$data['username'] = $this->session->userdata('siswa');

			$this->load->view('halaman_siswa');
		}else{
			$data['title'] = 'Halaman Login';
			$this->load->view('login_form', $data);
		}
  }


}
