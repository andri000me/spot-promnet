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
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
			$data['title'] = 'Halaman Admin';
			$data['username'] = $this->session->userdata('username');

			$this->load->view('dashboard_admin', $data);
		}else if($this->session->userdata('role') == 'guru' && $this->session->userdata('login') == TRUE) {
			$data['title'] = 'Halaman Guru';
			$data['username'] = $this->session->userdata('username');

			$this->load->view('halaman_guru', $data);
		}else if($this->session->userdata('role') == 'siswa' && $this->session->userdata('login') == TRUE) {
			$data['title'] = 'Halaman Siswa';
			$data['username'] = $this->session->userdata('username');

			$this->load->view('halaman_siswa', $data);
		}else{
			$data['title'] = 'Halaman Login';
			$this->load->view('login_form', $data);
		}
  }


}
