<?php $this->load->view('header_admin'); ?>


<div class="container" id="container">
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills float-right mt-3">
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Index'>BERANDA</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Admin/halamanGuru'>GURU</a>
        </li>
        <li class="nav-item">
          <a class='nav-link active' href='<?php echo base_url(); ?>index.php/Admin/halamanSiswa'>SISWA</a>
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
      <!-- <img src="<?php echo base_url(); ?>assets/img/logo-diskes.png"> -->
      <h1>SPOT</h1>
    </div>
  </div>
<div class="container" id="menu-top">
  <div class="row">
    <div class="col-md-11">
      <h4>Data Siswa</h4>
    </div>
    <div class="col-md-1">
      <a href="<?php echo base_url(); ?>index.php/Admin/halamanTambahSiswa" class="btn btn-success">Tambah</a>
    </div>
  </div>
</div>

<div class="table-responsive pt-3">
  <?php
      echo $table;
      echo "<br>";
      echo $pages;
    ?>
</div>

<?php $this->load->view('footer'); ?>
