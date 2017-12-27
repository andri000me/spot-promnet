<?php $this->load->view('header_admin'); ?>


<div class="container" id="container">
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills float-right mt-3">
        <li class="nav-item">
          <a class='nav-link active' href='<?php echo base_url(); ?>index.php/Index'>BERANDA</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Admin/halamanGuru'>GURU</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Admin/halamanSiswa'>SISWA</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Admin/halamanAkun'>AKUN</a>
        </li>
        <li class="nav-item logout">
          <a class="nav-link btn btn-danger" href="<?php echo base_url(); ?>index.php/Login/prosesLogout">LOGOUT</a>
        </li>
      </ul>
    </nav>
    <div class="logo">
      <img src="<?php echo base_url(); ?>assets/img/logo-diskes.png" alt="Kemenkes Logo">
    </div>
  </div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card text-center">
        <div class="card-header">
          &nbsp;
        </div>
        <div class="card-body">
          <h5 class="card-title">Selamat datang, <?php echo $username; ?></h5>
          <p class="card-text">Proses distribusi pekerja tidak tetap akan dilakukan secara otomatis.</p>
          <a href="index.php?menu=distribusi_process" class="btn btn-lg btn-success mt-4 mb-4">DISTRIBUSI</a>
        </div>
        <div class="card-footer text-muted">
          2017 &copy; Dinas Kesehatan. All rights reserved
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('footer'); ?>
