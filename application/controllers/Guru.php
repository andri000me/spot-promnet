<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }

  public function halamanMateri()
  {

    $limit = 3;
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);

		$data_materi = $this->ModelGuru->GetAllMateri($limit,$offset)->result();

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
		$this->table->set_heading("ID","Judul","Deskripsi","Lokasi","Aksi");

		foreach ($data_materi as $materi) {
			$this->table->add_row(
				$materi->idMateri,
				$materi->judulFile,
				$materi->deskripsi,
				$materi->lokasiFile,
        anchor(base_url().$materi->lokasiFile,'Lihat','class="btn btn-success btn-sm"')." ".anchor('Guru/halamanHapusMateri/'.$materi->idMateri,'Hapus','class="btn btn-danger btn-sm"')
			);
		}

		$numrows = $this->ModelGuru->CountAllMateri();

		$config['base_url'] = base_url().'index.php/Guru/halamanMateri';
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
		$data['title'] = 'SPOT | Data Materi';
		$data['pages'] = $this->pagination->create_links();

		$this->load->view('guru_halaman_materi', $data);
  }

  public function halamanTambahMateri()
  {
    $data['title'] = "SPOT | Tambah Materi";
    $data['username'] = $this->session->userdata('username');
    $this->load->view('guru_tambah_materi',$data);
  }

  public function prosesTambahMateri()
  {
    $deskripsi = $this->input->post('deskripsi');
    $id = $this->input->post('id');
    $config['upload_path'] = './assets/uploads';
    $config['allowed_types'] = 'pdf';
    $config['max_size'] = 0;

    $this->load->library('upload', $config);

    if(!$this->upload->do_upload())
    {
      $data['message'] = $this->upload->display_errors();
    }else{
      $data['upload_data'] = $this->upload->data();
      $data['message'] = 'Upload gambar sukses!';
    }

    $query = $this->ModelGuru->LihatGuru($id)->result_array();
    foreach ($query as $guru) {
      $idGuru =  $guru['idGuru'];
    }
    $this->get_uri_image($deskripsi,$idGuru);
    $this->halamanMateri();
  }

  public function get_uri_image($deskripsi,$idGuru)
  {
    $filename = $this->ModelGuru->fetch_document(FCPATH.'assets/uploads');
    foreach ($filename as $row) {
      $insertData = array(
        'idMateri'=>null,
        'idGuru'=>$idGuru,
        'judulFile'=>$row,
        'deskripsi'=>$deskripsi,
  			'lokasiFile'=>'assets/uploads/'.$row
  		);
    }
    $this->ModelGuru->InsertFilename($insertData);
  }

}
