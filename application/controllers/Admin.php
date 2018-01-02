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

    $limit = 3;
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);

		$data_guru = $this->ModelAdmin->GetAllGuru($limit,$offset)->result();

    $this->load->library('table');
    $template = array(
            'table_open'            => '<table border="0" cellpadding="4" cellspacing="0" id="table" class="table table-striped">',

            'thead_open'            => '<thead>',
            'thead_close'           => '</thead>',

            'heading_row_start'     => '<tr>',
            'heading_row_end'       => '</tr>',
            'heading_cell_start'    => '<th>',
            'heading_cell_end'      => '</th>',

            'tbody_open'            => '<tbody>',
            'tbody_close'           => '</tbody>',

            'row_start'             => '<tr>',
            'row_end'               => '</tr>',
            'cell_start'            => '<td>',
            'cell_end'              => '</td>',

            'row_alt_start'         => '<tr>',
            'row_alt_end'           => '</tr>',
            'cell_alt_start'        => '<td>',
            'cell_alt_end'          => '</td>',

            'table_close'           => '</table>'
    );

    $this->table->set_template($template);
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading("ID","Mapel","NIP","Nama","No HP","Alamat","Aksi");

		foreach ($data_guru as $guru) {
			$this->table->add_row(
				$guru->idGuru,
				$guru->namaMapel,
				$guru->NIP,
				$guru->namaGuru,
				$guru->noHP,
				$guru->alamat,
        anchor('Admin/halamanUbahGuru/'.$guru->idGuru,'Ubah','class="btn btn-success btn-sm"')." ".anchor('Admin/hapusGuru/'.$guru->idGuru,'Hapus','class="btn btn-danger btn-sm"')
			);
		}

		$numrows = $this->ModelAdmin->CountAllGuru();

		$config['base_url'] = base_url().'index.php/Admin/halamanGuru';
		$config['total_rows'] = $numrows;
		$config['per_page'] = $limit;
		$config['uri_segment'] = $uri_segment;

    $config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination">';
    $config['full_tag_close'] 	= '</ul></nav></div>';
    $config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
    $config['num_tag_close'] 	= '</span></li>';
    $config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close'] 	= '</span></li>';
    $config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close'] 	= '</span></li>';

		$this->pagination->initialize($config);

		$data['table'] = $this->table->generate();
		$data['title'] = 'SPOT | Data Guru';
		$data['pages'] = $this->pagination->create_links();

		$this->load->view('admin_halaman_guru', $data);
  }

  public function halamanSiswa()
  {

    $limit = 3;
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);

		$data_siswa = $this->ModelAdmin->GetAllSiswa($limit,$offset)->result();

    $this->load->library('table');
    $template = array(
            'table_open'            => '<table border="0" cellpadding="4" cellspacing="0" id="table" class="table table-striped">',

            'thead_open'            => '<thead>',
            'thead_close'           => '</thead>',

            'heading_row_start'     => '<tr>',
            'heading_row_end'       => '</tr>',
            'heading_cell_start'    => '<th>',
            'heading_cell_end'      => '</th>',

            'tbody_open'            => '<tbody>',
            'tbody_close'           => '</tbody>',

            'row_start'             => '<tr>',
            'row_end'               => '</tr>',
            'cell_start'            => '<td>',
            'cell_end'              => '</td>',

            'row_alt_start'         => '<tr>',
            'row_alt_end'           => '</tr>',
            'cell_alt_start'        => '<td>',
            'cell_alt_end'          => '</td>',

            'table_close'           => '</table>'
    );

    $this->table->set_template($template);
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading("ID","Kelas","NIS","Nama","Alamat","Aksi");

		foreach ($data_siswa as $siswa) {
			$this->table->add_row(
				$siswa->idSiswa,
				$siswa->namaKelas,
				$siswa->NIS,
				$siswa->namaSiswa,
				$siswa->alamatSiswa,
        anchor('Admin/halamanUbahSiswa/'.$siswa->idSiswa,'Ubah','class="btn btn-success btn-sm"')." ".anchor('Admin/hapusSiswa/'.$siswa->idSiswa,'Hapus','class="btn btn-danger btn-sm"')
			);
		}

		$numrows = $this->ModelAdmin->CountAllSiswa();

		$config['base_url'] = base_url().'index.php/Admin/halamanSiswa';
		$config['total_rows'] = $numrows;
		$config['per_page'] = $limit;
		$config['uri_segment'] = $uri_segment;

    $config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination">';
    $config['full_tag_close'] 	= '</ul></nav></div>';
    $config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
    $config['num_tag_close'] 	= '</span></li>';
    $config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close'] 	= '</span></li>';
    $config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close'] 	= '</span></li>';

		$this->pagination->initialize($config);

		$data['table'] = $this->table->generate();
		$data['title'] = 'SPOT | Data Siswa';
		$data['pages'] = $this->pagination->create_links();

		$this->load->view('admin_halaman_siswa', $data);
  }

  public function halamanAkun()
  {
    $query = $this->ModelAdmin->TampilDataGuru();
    $data['guru'] = $query->result_array();

    $query = $this->ModelAdmin->TampilDataSiswa();
		$data['siswa'] = $query->result_array();

		$this->load->view('admin_halaman_akun', $data);
  }

  public function halamanTambahGuru()
  {
    $data['title'] = "SPOT | Tambah Guru";
    $query = $this->ModelAdmin->TampilMapel();
		$data['mapel'] = $query->result_array();
    $this->load->view('admin_tambah_guru', $data);
  }

  public function halamanTambahSiswa()
  {
    $data['title'] = "SPOT | Tambah Siswa";
    $query = $this->ModelAdmin->TampilKelas();
		$data['kelas'] = $query->result_array();
    $this->load->view('admin_tambah_siswa', $data);
  }

  public function halamanUbahGuru($id)
  {
    $data['title'] = "SPOT | Ubah Guru";
    $query = $this->ModelAdmin->LihatGuru($id);
		$data['guru'] = $query->result_array();
    $query = $this->ModelAdmin->TampilMapel();
		$data['mapel'] = $query->result_array();
    $this->load->view('admin_ubah_guru', $data);
  }

  public function halamanUbahPasswordGuru($id)
  {
    $data['title'] = "SPOT | Ubah Guru";
    $query = $this->ModelAdmin->LihatGuru($id);
		$data['guru'] = $query->result_array();
    $this->load->view('admin_ubah_password_guru', $data);
  }

  public function halamanUbahPasswordSiswa($id)
  {
    $data['title'] = "SPOT | Ubah Siswa";
    $query = $this->ModelAdmin->LihatSiswa($id);
		$data['siswa'] = $query->result_array();
    $this->load->view('admin_ubah_password_siswa', $data);
  }

  public function halamanUbahSiswa($id)
  {
    $data['title'] = "SPOT | Ubah Siswa";
    $query = $this->ModelAdmin->LihatSiswa($id);
		$data['siswa'] = $query->result_array();
    $query = $this->ModelAdmin->TampilKelas();
		$data['kelas'] = $query->result_array();
    $this->load->view('admin_ubah_siswa', $data);
  }

  public function hapusGuru($id)
  {
    $this->ModelAdmin->HapusGuru($id);
		redirect('Admin/halamanGuru');
  }

  public function hapusSiswa($id)
  {
    $this->ModelAdmin->HapusSiswa($id);
		redirect('Admin/halamanSiswa');
  }

  public function prosesTambahGuru()
	{
		$this->form_validation->set_rules('NIP','NIP','required');
		$this->form_validation->set_rules('idMapel','Mapel','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('hp','No HP','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $password = random_string('alnum', 8);

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'idGuru'=>NULL,
				'NIP'=>$this->input->post('NIP'),
				'idMapel'=>$this->input->post('idMapel'),
				'namaGuru'=>$this->input->post('nama'),
				'password'=>$password,
				'noHP'=>$this->input->post('hp'),
        'alamat'=>$this->input->post('alamat')
			);
			$this->ModelAdmin->InsertGuru($insertData);
			redirect('Admin/halamanGuru');
		} else {
			$this->load->view('admin_tambah_guru');
		}
	}

  public function prosesTambahSiswa()
	{
		$this->form_validation->set_rules('NIS','NIS','required');
		$this->form_validation->set_rules('idKelas','Kelas','required');
		$this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $password = random_string('alnum', 8);

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'idSiswa'=>NULL,
				'NIS'=>$this->input->post('NIS'),
				'idKelas'=>$this->input->post('idKelas'),
				'namaSiswa'=>$this->input->post('nama'),
				'password'=>$password,
        'alamatSiswa'=>$this->input->post('alamat')
			);
			$this->ModelAdmin->InsertSiswa($insertData);
			redirect('Admin/halamanSiswa');
		} else {
			$this->load->view('admin_tambah_siswa');
		}
	}

  public function prosesUbahGuru()
	{
    $id = $this->input->post('id');
		$this->form_validation->set_rules('NIP','NIP','required');
		$this->form_validation->set_rules('idMapel','Mapel','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('hp','No HP','required');
    $this->form_validation->set_rules('alamat','Alamat','required');

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'NIP'=>$this->input->post('NIP'),
				'idMapel'=>$this->input->post('idMapel'),
				'namaGuru'=>$this->input->post('nama'),
				'noHP'=>$this->input->post('hp'),
        'alamat'=>$this->input->post('alamat')
			);
			$this->ModelAdmin->UbahGuru($insertData,$id);
			redirect('Admin/halamanGuru');
		} else {
			$this->load->view('admin_ubah_guru');
		}
	}

  public function prosesUbahPasswordGuru()
	{
    $id = $this->input->post('id');
		$this->form_validation->set_rules('NIP','NIP','required');
		$this->form_validation->set_rules('password','Pasword','required');

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'NIP'=>$this->input->post('NIP'),
				'password'=>$this->input->post('password')
			);
			$this->ModelAdmin->UbahPasswordGuru($insertData,$id);
			redirect('Admin/halamanAkun');
		} else {
			$this->load->view('admin_ubah_password_guru');
		}
	}

  public function prosesUbahPasswordSiswa()
	{
    $id = $this->input->post('id');
		$this->form_validation->set_rules('NIS','NIS','required');
		$this->form_validation->set_rules('password','Pasword','required');

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'NIS'=>$this->input->post('NIS'),
				'password'=>$this->input->post('password')
			);
			$this->ModelAdmin->UbahPasswordSiswa($insertData,$id);
			redirect('Admin/halamanAkun');
		} else {
			$this->load->view('admin_ubah_password_siswa');
		}
	}

  public function prosesUbahSiswa()
	{
    $id = $this->input->post('id');
		$this->form_validation->set_rules('NIS','NIS','required');
		$this->form_validation->set_rules('idKelas','Kelas','required');
		$this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('alamat','Alamat','required');

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'NIS'=>$this->input->post('NIS'),
				'idKelas'=>$this->input->post('idKelas'),
				'namaSiswa'=>$this->input->post('nama'),
        'alamatSiswa'=>$this->input->post('alamat')
			);
			$this->ModelAdmin->UbahSiswa($insertData,$id);
			redirect('Admin/halamanSiswa');
		} else {
			$this->load->view('admin_ubah_siswa');
		}
	}

  public function halaman404()
  {
    $data['title'] = "SPOT | Halaman tidak ditemukan";
    $this->load->view('404', $data);
  }


}
